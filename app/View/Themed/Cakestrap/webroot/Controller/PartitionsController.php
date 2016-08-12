<?php
App::uses('AppController', 'Controller');
/**
 * Partitions Controller
 *
 * @property Partition $Partition
 */
class PartitionsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Partition->recursive = 0;
		$this->set('partitions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Partition->exists($id)) {
			throw new NotFoundException(__('Invalid partition'));
		}
		$options = array('conditions' => array('Partition.' . $this->Partition->primaryKey => $id));
		$this->set('partition', $this->Partition->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($project_id = false) {
	   $this->layout = false;
		if ($this->request->is('post')) {
			$this->Partition->create();
            $this->request->data['Partition']['project_id'] = $project_id;
			if ($this->Partition->save($this->request->data)) {
			//	$this->Session->setFlash(__('The partition has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                 $this->Partition->contain();
                echo json_encode($this->Partition->findById($this->Partition->getLastInsertID()));
                $this->autoRender = false;
			} else {
				$this->Session->setFlash(__('The partition could not be saved. Please, try again.'), 'flash/error');
			}
		}
		//$locations = $this->Partition->Location->find('list');
		$this->set(compact('location_id'));
	}
        
    public function add_reading($project_id = null ) {
            $this->layout = false;
		if ($this->request->is('post')) {
			$this->Partition->create();
            $this->request->data['Partition']['project_id'] = $project_id;
			if ($this->Partition->save($this->request->data)) {
			    // $this->autoRender = false;
				//$this->Session->setFlash(__('The partition has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                                $this->autoRender = false;
                                $partition_id = $this->Partition->getLastInsertID();
                                $data = array('Reading'=>array(
                                    'job_id'=>$this->request->data['Partition']['job_id'],
                                    'partition_id'=>$partition_id,
                                    'tan_metrik'=>$this->request->data['Partition']['tan_metrik']
                                   ));
                                
                                $this->Partition->Reading->save($data);
                                $reading_id =  $this->Partition->Reading->getLastInsertID();
                                $data['Reading']['id'] =  $reading_id ;
                                $data['Partition']['name'] =  $this->request->data['Partition']['name'];
                                
                                echo json_encode($data);
			} else {
				$this->Session->setFlash(__('The partition could not be saved. Please, try again.'), 'flash/error');
			}
		}else{
		//$locations = $this->Partition->Location->find('list',array('conditions'=>array('Location.id'=>$location_id)));
		//$this->set(compact('locations'));
                }
	}
    
    
     
    /**
 * update_tanmetrix method - x-editable
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function update_tanmetrix($id = null) {
	    $this->layout = false;
		if (!$this->Partition->exists($id)) {
			throw new NotFoundException(__('Invalid partition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            /*Change data array format POST /post
            {
                name:  'username',  //name of field (column in db)
                pk:    1            //primary key (record id)
                value: 'superuser!' //new value
            }*/
            
            $submitted_data['Partition'] = array(
                'tan_metrik'=>$this->request->data['value'],
                'id'=>$this->request->data['pk'],
            );
            /* End Change */
            
             
			if ($this->Partition->save($submitted_data)) {
			//	$this->Session->setFlash(__('The partition has been saved'), 'flash/success');
			//	$this->redirect(array('action' => 'index'));
            
                echo json_encode( $submitted_data);
			} else {
			//	$this->Session->setFlash(__('The partition could not be saved. Please, try again.'), 'flash/error');
			}
            $this->autoRender = false;
		} else {
			$options = array('conditions' => array('Partition.' . $this->Partition->primaryKey => $id));
			$this->request->data = $this->Partition->find('first', $options);
		}
		
	}


    /**
 * edit method - x-editable
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function update_name($id = null) {
	    $this->layout = false;
		if (!$this->Partition->exists($id)) {
			throw new NotFoundException(__('Invalid partition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            /*Change data array format POST /post
            {
                name:  'username',  //name of field (column in db)
                pk:    1            //primary key (record id)
                value: 'superuser!' //new value
            }*/
            
            $submitted_data['Partition'] = array(
                'name'=>$this->request->data['value'],
                'id'=>$this->request->data['pk'],
            );
            /* End Change */
            
             
			if ($this->Partition->save($submitted_data)) {
			//	$this->Session->setFlash(__('The partition has been saved'), 'flash/success');
			//	$this->redirect(array('action' => 'index'));
            
                echo json_encode( $submitted_data);
			} else {
			//	$this->Session->setFlash(__('The partition could not be saved. Please, try again.'), 'flash/error');
			}
            $this->autoRender = false;
		} else {
			$options = array('conditions' => array('Partition.' . $this->Partition->primaryKey => $id));
			$this->request->data = $this->Partition->find('first', $options);
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
		if (!$this->Partition->exists($id)) {
			throw new NotFoundException(__('Invalid partition'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Partition->save($this->request->data)) {
			//	$this->Session->setFlash(__('The partition has been saved'), 'flash/success');
			//	$this->redirect(array('action' => 'index'));
            
            echo json_encode($this->request->data);
			} else {
			//	$this->Session->setFlash(__('The partition could not be saved. Please, try again.'), 'flash/error');
			}
            $this->autoRender = false;
		} else {
			$options = array('conditions' => array('Partition.' . $this->Partition->primaryKey => $id));
			$this->request->data = $this->Partition->find('first', $options);
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
		$this->autoRender = false;
        $this->Partition->id = $id;
		if (!$this->Partition->exists()) {
			throw new NotFoundException(__('Invalid partition'));
		}
		//$this->request->onlyAllow('post', 'delete');
		if ($this->Partition->delete()) {
			//$this->Session->setFlash(__('Partition deleted'), 'flash/success');
			//$this->redirect(array('action' => 'index'));
		}
	//	$this->Session->setFlash(__('Partition was not deleted'), 'flash/error');
		//$this->redirect(array('action' => 'index'));
	}
}
