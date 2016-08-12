<?php
App::uses('AppController', 'Controller');
/**
 * Jobs Controller
 *
 * @property Job $Job
 */
class JobsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Job->recursive = 0;
		$this->set('jobs', $this->paginate());
                
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		$options = array(
            'conditions' => array('Job.' . $this->Job->primaryKey => $id),
            'contain'=>array(
                'Activity'=>array(
                    'Chemical',
                    'Source'=>array(
                        'conditions' => array(
                            'Source.model'=>'Activity',
                            'Source.type'=>2
                        )
                    )
                ),
                'Project',
                'Reading',
                
            )
        );
       // pr($this->Job->find('first', $options));
		$this->set('job', $this->Job->find('first', $options));
                
                //partition
                $this->loadModel('Partition');
                $partition = $this->Partition->find('list',array('fields'=>array('Partition.id','Partition.name')));
                
                $this->set('partition', $partition);
                
                $this->set('pesttypes', $this->Job->Reading->Pesttype->find('list'));
                
                //Readings_pesttypes
                $this->loadModel('ReadingsPesttype');
                $this->ReadingsPesttype->contain();
                $readings_pesttypes = $this->ReadingsPesttype->find('all',array('conditions'=>array('ReadingsPesttype.job_id'=>$id)));
                $readings_pesttypes = Set::combine($readings_pesttypes,'{n}.ReadingsPesttype.pesttype_id','{n}.ReadingsPesttype','{n}.ReadingsPesttype.reading_id');
                $this->set('readings_pesttypes', $readings_pesttypes);
    
                $activitytypes = $this->Job->Activity->Activitytype->find('list');
                $this->set(compact('activitytypes'));

	}
        
        /**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function detail_json($id = null) {
                $this->autoRender = false;
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
                
                
                
                //$this->Job->contain('Partition');
		$job = $this->Job->find('first', $options);
                $job['Reading']= Set::combine($job['Reading'],'{n}.id','{n}');
                //pr($job);
                
                //locationn
                $this->loadModel('Location');
                $locations = $this->Location->find('all',array('conditions'=>array('project_id'=>$job['Job']['id'])));
                //$job['Location'] = $locations;
               // echo json_encode($job);
                //pr($locations);
	}

/**
 * add method
 *
 * @return void
 */
	public function add($project_id = null,$year = null,$month = null,$day = null ) {
                $this->layout = false;
		if ($this->request->is('post') and $project_id != null) {
			$this->Job->create();
            $date_job = explode('-',$this->request->data['Job']['date']);
                        
            unset($this->request->data['Job']['date']);
            $this->request->data['Job']['project_id'] = $project_id;
            $this->request->data['Job']['date']['day'] = $date_job[0];
            $this->request->data['Job']['date']['month'] = $date_job[1];
            $this->request->data['Job']['date']['year'] = $date_job[2];
            //pr($this->request->data);
			if ($this->Job->save($this->request->data)) {
				//$this->Session->setFlash(__('The job has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                                $lastInsertId = $this->Job->getLastInsertID() ;
                                //locationn
                                $this->loadModel('Partition');
                                $locations = $this->Partition->find( 'all',array(
                                        'conditions'=>array(
                                            'Partition.project_id'=>$project_id
                                        )
                                    )
                                );
               
                                //foreach($locations as $location ){
                                    foreach($locations as $partition ){
                                        $partition = $partition['Partition'];
                                        $this->Job->Reading->saveAll(array('Reading'=>array('tan_metrik'=>$partition['tan_metrik'],'partition_id'=>$partition['id'],'job_id'=>$lastInsertId)));
                                    } 
                               // }
                                
                                $this->Job->contain('Location');
                                echo json_encode($this->Job->findById($lastInsertId));
                                $this->autoRender = false;
			} else {
				$this->Session->setFlash(__('The job could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
                    //$locations = $this->Job->Location->find('list',array('conditions'=>array('Location.project_id'=>$project_id)));
                    //$users = $this->Job->User->find('list');
                    //$this->set(compact('users','locations'));
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
		if (!$this->Job->exists($id)) {
			throw new NotFoundException(__('Invalid job'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
            
            $this->autoRender = false;
            $date_job = explode('-',$this->request->data['Job']['date']);
                        
            unset($this->request->data['Job']['date']);
            //$this->request->data['Job']['project_id'] = $project_id;
            $this->request->data['Job']['date']['day'] = $date_job[0];
            $this->request->data['Job']['date']['month'] = $date_job[1];
            $this->request->data['Job']['date']['year'] = $date_job[2];
            
			if ($this->Job->save($this->request->data)) {
				//$this->Session->setFlash(__('The job has been saved'), 'flash/success');
			//	$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The job could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
            $this->Job->contain();
			$options = array('conditions' => array('Job.' . $this->Job->primaryKey => $id));
			$this->request->data = $this->Job->find('first', $options);
		}
		//$projects = $this->Job->Project->find('list');
		//$users = $this->Job->User->find('list');
		//$this->set(compact('projects', 'users'));
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
		$this->Job->id = $id;
		if (!$this->Job->exists()) {
			throw new NotFoundException(__('Invalid job'));
		}
	//	$this->request->onlyAllow('post', 'delete');
		if ($this->Job->delete()) {
		//	$this->Session->setFlash(__('Job deleted'), 'flash/success');
		//	$this->redirect(array('action' => 'index'));
		}
		//$this->Session->setFlash(__('Job was not deleted'), 'flash/error');
		//$this->redirect(array('action' => 'index'));
	}
}
