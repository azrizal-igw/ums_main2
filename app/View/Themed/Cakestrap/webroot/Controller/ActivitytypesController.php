<?php
App::uses('AppController', 'Controller');
/**
 * Activitytypes Controller
 *
 * @property Activitytype $Activitytype
 */
class ActivitytypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Activitytype->recursive = 0;
		$this->set('activitytypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Activitytype->exists($id)) {
			throw new NotFoundException(__('Invalid activitytype'));
		}
		$options = array('conditions' => array('Activitytype.' . $this->Activitytype->primaryKey => $id));
		$this->set('activitytype', $this->Activitytype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Activitytype->create();
			if ($this->Activitytype->save($this->request->data)) {
				$this->Session->setFlash(__('The activitytype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The activitytype could not be saved. Please, try again.'), 'flash/error');
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	   $this->layout = false;
		if (!$this->Activitytype->exists($id)) {
			throw new NotFoundException(__('Invalid activitytype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//if ($this->Activitytype->save($this->request->data)) {
				//$this->Session->setFlash(__('The activitytype has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                
                
                $this->loadModel('ChemicalsActivitytype');
                $this->ChemicalsActivitytype->deleteAll(array('ChemicalsActivitytype.activitytype_id'=>$id));
               // pr($this->request->data);
                foreach($this->request->data['ChemicalsActivitytypes'] as $data){
                     
                    if($data['chemical_id'] == null or $data['chemical_id'] == ''){
                        $this->Activitytype->Chemical->saveAll(array('Chemical'=>array('name'=>$data['name'])));
                        $data['chemical_id'] = $this->Activitytype->Chemical->getLastInsertID();
                    }
                     
                     $this->ChemicalsActivitytype->saveAll(array('ChemicalsActivitytype'=>array('activitytype_id'=>$id,'chemical_id'=>$data['chemical_id'],'quantity'=>$data['quantity'])));
                }
                
			//} else {
				//$this->Session->setFlash(__('The activitytype could not be saved. Please, try again.'), 'flash/error');
			//}
            $this->autoRender = false;
		} else {
            $this->Activitytype->contain();
			$options = array('conditions' => array('Activitytype.' . $this->Activitytype->primaryKey => $id));
			$this->request->data = $this->Activitytype->find('first', $options);
            
            $this->loadModel('ChemicalsActivitytypes');
            $activitytypes_chemicals = $this->ChemicalsActivitytypes->find('all',array('conditions'=>array('ChemicalsActivitytypes.activitytype_id'=>$id)));
            //pr($activitytypes_chemicals);
            
           // $this->Activitytype->Chemical->contain();
            $chemicalsTmp = $this->Activitytype->Chemical->find('all',array(
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
            
            $this->set(compact('chemicals','chemicals2','activitytypes_chemicals'));
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
		$this->Activitytype->id = $id;
		if (!$this->Activitytype->exists()) {
			throw new NotFoundException(__('Invalid activitytype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Activitytype->delete()) {
			$this->Session->setFlash(__('Activitytype deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Activitytype was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
