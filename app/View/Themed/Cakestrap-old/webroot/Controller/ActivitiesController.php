<?php
App::uses('AppController', 'Controller');
/**
 * Activities Controller
 *
 * @property Activity $Activity
 */
class ActivitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Activity->recursive = 0;
		$this->set('activities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
		$this->set('activity', $this->Activity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->layout = false;
		if ($this->request->is('post')) {
			$this->Activity->create();
                         $this->autoRender = false;
                         
            $activitytypes = $this->Activity->Activitytype->find('first',array(
                'conditions'=>array(
                    'Activitytype.id'=>$this->request->data['Activity']['activitytype_id']
                ),
                'contain'=>array(
                    'Chemical'
                )
            ));
            
            //$this->request->data['Chemical']
            
			if ($this->Activity->save($this->request->data)) {
                $id = $this->Activity->getLastInsertID();
                            
                            
                $cheActv = array();
                foreach($activitytypes['Chemical'] as $ch){
                    //pr($activitytypes);
                    unset($ch['ChemicalsActivitytype']['id']);
                    unset($ch['ChemicalsActivitytype']['activitytype_id']);
                    $ch['ChemicalsActivitytype']['activity_id'] = $id;
                    $cheActv[] = $ch['ChemicalsActivitytype'];
                }
                
                $this->loadModel('ChemicalsActivity');
                $this->ChemicalsActivity->saveAll($cheActv);
                
                $this->Activity->contain('Activitytype');
                $activity = $this->Activity->findById($id);
                echo json_encode($activity);
                           
			} else {
				$this->Session->setFlash(__('The activity could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
                    $activitytypes = $this->Activity->Activitytype->find('list');
                    //$jobs = $this->Activity->Job->find('list');
                   // $chemicals = $this->Activity->Chemical->find('list');
                    $this->set(compact('activitytypes'));
                }
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id) {
        $this->layout = false;
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Activity->save($this->request->data)) {
				//$this->Session->setFlash(__('The activity has been saved'), 'flash/success');
			///	$this->redirect(array('action' => 'index'));
                $this->autoRender = false;
                $this->Activity->contain('Activitytype');
                $activity = $this->Activity->findById($this->request->data['Activity']['id']);
                echo json_encode($activity);
                
			} else {
				$this->Session->setFlash(__('The activity could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			$this->request->data = $this->Activity->find('first', $options);
            
            $activitytypes = $this->Activity->Activitytype->find('list');
    		$jobs = $this->Activity->Job->find('list');
    		$chemicals = $this->Activity->Chemical->find('list');
    		$this->set(compact('activitytypes', 'jobs', 'chemicals'));
		}
		
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Activity->id = $id;
		if (!$this->Activity->exists()) {
			throw new NotFoundException(__('Invalid activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Activity->delete()) {
			$this->Session->setFlash(__('Activity deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Activity was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
    
    public function edit_chemical($id = null ) {
        $this->layout = false;
		if (!$this->Activity->exists($id)) {
			throw new NotFoundException(__('Invalid activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//if ($this->Activitytype->save($this->request->data)) {
				//$this->Session->setFlash(__('The activity has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                
                
                $this->loadModel('ChemicalsActivity');
                $this->ChemicalsActivity->deleteAll(array('ChemicalsActivity.activity_id'=>$id));
               // pr($this->request->data);
                foreach($this->request->data['ChemicalsActivity'] as $data){
                     
                    if($data['chemical_id'] == null or $data['chemical_id'] == ''){
                        $this->Activity->Chemical->saveAll(array('Chemical'=>array('name'=>$data['name'])));
                        $data['chemical_id'] = $this->Activity->Chemical->getLastInsertID();
                    }
                     
                     $this->ChemicalsActivity->saveAll(array('ChemicalsActivity'=>array('activity_id'=>$id,'chemical_id'=>$data['chemical_id'],'quantity'=>$data['quantity'])));
                }
                
			//} else {
				//$this->Session->setFlash(__('The activitytype could not be saved. Please, try again.'), 'flash/error');
			//}
            $this->autoRender = false;
		} else {
            $this->Activity->contain();
			$options = array('conditions' => array('Activity.' . $this->Activity->primaryKey => $id));
			$this->request->data = $this->Activity->find('first', $options);
            
            $this->loadModel('ChemicalsActivity');
            $activity_chemicals = $this->ChemicalsActivity->find('all',array('conditions'=>array('ChemicalsActivity.activity_id'=>$id)));
            //pr($activitytypes_chemicals);
            
           // $this->Activitytype->Chemical->contain();
            $chemicalsTmp = $this->Activity->Chemical->find('all',array(
                'contain'=>array(
                    'Source' =>array(
                        'conditions'=>array(
                            'Source.model'=>'Chemical',
                            'Source.type' => 4
                        )
                    )
                )
            ));
            
            foreach($chemicalsTmp as $data){
                $img = (isset($data['Source'][0])?$data['Source'][0]['path']:'');
                $chemicals[] = array('value'=>$data['Chemical']['id'],'label'=>$data['Chemical']['name'],'image'=>$img);
                $chemicals2[$data['Chemical']['id']] = array('value'=>$data['Chemical']['id'],'label'=>$data['Chemical']['name'],'image'=>$img);
            }
            
            $this->set(compact('chemicals','chemicals2','activity_chemicals'));
		}
    }
}
