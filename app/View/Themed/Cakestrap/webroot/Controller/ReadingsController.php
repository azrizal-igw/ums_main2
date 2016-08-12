<?php
App::uses('AppController', 'Controller');
/**
 * Readings Controller
 *
 * @property Reading $Reading
 */
class ReadingsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Reading->recursive = 0;
		$this->set('readings', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Reading->exists($id)) {
			throw new NotFoundException(__('Invalid reading'));
		}
		$options = array('conditions' => array('Reading.' . $this->Reading->primaryKey => $id));
		$this->set('reading', $this->Reading->find('first', $options));
               
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Reading->create();
			if ($this->Reading->save($this->request->data)) {
				$this->Session->setFlash(__('The reading has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reading could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$partitions = $this->Reading->Partition->find('list');
		$jobs = $this->Reading->Job->find('list');
		$pesttypes = $this->Reading->Pesttype->find('list');
		$this->set(compact('partitions', 'jobs', 'pesttypes'));
	}

        public function add_reading(){
            $this->autoRender = false;
            
            
            
            if ($this->request->is('post') ) {
                
                /*Change data array format POST /post
                {
                    name:  'username',  //name of field (column in db)
                    pk:    1            //primary key (record id)
                    value: 'superuser!' //new value
                }*/
                
                $submitted_data['Reading'] = array(
                    'tan_metrik'=>$this->request->data['value'],
                    'id'=>$this->request->data['pk'],
                );
                /* End Change */
            
                $this->Reading->save($submitted_data);
            }
            /*
            $this->loadModel('ReadingsPesttype');
           // $this->ReadingsPesttype->deleteAll(array('ReadingsPesttype.reading_id'=>$this->request->data['Reading']['id']));
            foreach($this->request->data['Pesttype'] as $pesttype_id=>$count){
                if($count != null and $count != '' and $count != 0){ 
                    $this->ReadingsPesttype->saveAll(array(
                         'ReadingsPesttype'=>array(
                             'reading_id'=>$this->request->data['Reading']['id'],
                             'project_id'=>$this->request->data['Reading']['project_id'],
                             'pesttype_id'=>$pesttype_id,
                             'count'=>$count,
                             'job_id'=>$this->request->data['Reading']['job_id']
                         )));
                }
            }
            */
            
        }
/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null,$pesttype_id =null,$job_id=null,$project_id = null) {
	   $this->layout = false;
		if (!$this->Reading->exists($id)) {
			throw new NotFoundException(__('Invalid reading'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//if ($this->Reading->save($this->request->data)) {
			//	$this->Session->setFlash(__('The reading has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
		//	} else {
		//		$this->Session->setFlash(__('The reading could not be saved. Please, try again.'), 'flash/error');
		//	}
        
           // pr($this->request->data);
            $this->loadModel('ReadingsPest');
            $this->ReadingsPest->deleteAll(array('ReadingsPest.reading_id'=>$id,'ReadingsPest.pesttype_id'=>$pesttype_id));
            
            $totalPest = 0;
            foreach($this->request->data['ReadingsPest'] as $i=> $rp){
                /*
                if($rp['pest_id'] == null or $rp['pest_id'] == ''){
                    $this->Reading->Pest->saveAll(array('Pest'=>array('name'=>$rp['name'])));
                    $rp['pest_id'] = $this->Reading->Pest->getLastInsertID();
                }
                */
                $this->ReadingsPest->saveAll(array(
                    'ReadingsPest'=>array(
                        'reading_id'=>$id,
                        'pest_id'=>$rp['pest'],
                        'count'=>$rp['count'],
                        'pesttype_id'=>$pesttype_id
                    )
                ));
                
                $totalPest += $rp['count'];
            }
            
            $this->loadModel('ReadingsPesttype');
            $this->ReadingsPesttype->deleteAll(array('ReadingsPesttype.reading_id'=>$id,'ReadingsPesttype.pesttype_id'=>$pesttype_id));
            $this->ReadingsPesttype->saveAll(array(
                    'ReadingsPesttype'=>array(
                        'reading_id'=>$id,
                        'count'=>$totalPest,
                        'pesttype_id'=>$pesttype_id,
                        'job_id' =>$job_id,
                        'project_id' =>$project_id
                    )
                ));
            
            $this->ReadingsPesttype->contain();    
            echo json_encode($this->ReadingsPesttype->find('first',array('conditions'=>array('ReadingsPesttype.reading_id'=>$id,'ReadingsPesttype.pesttype_id'=>$pesttype_id))));
            
            $this->autoRender = false;
		} else {
			$options = array('conditions' => array('Reading.' . $this->Reading->primaryKey => $id));
			$this->request->data = $this->Reading->find('first', $options);
            
           //	$partitions = $this->Reading->Partition->find('list');
    	//	$jobs = $this->Reading->Job->find('list');
       // $this->Reading->Pest->contain();
    		$pests = $this->Reading->Pest->find('list',array('fields'=>array('id','name')));
            //pr($pestsTmp);
        
        
        $this->loadModel('ReadingsPest');
        //$this->ReadingsPest->contain('Pest');
        $readingsPests = $this->ReadingsPest->find('all',array('conditions'=>array('ReadingsPest.reading_id'=>$id,'ReadingsPest.pesttype_id'=>$pesttype_id)));
            
        for($i=1;$i<=200;$i++){
            $count_pest[$i] = $i;
        }
        
   		$this->set(compact('readingsPests', 'pests','count_pest'));
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
		$this->Reading->id = $id;
		if (!$this->Reading->exists()) {
			throw new NotFoundException(__('Invalid reading'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Reading->delete()) {
			$this->Session->setFlash(__('Reading deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Reading was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
