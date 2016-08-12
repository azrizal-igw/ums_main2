<?php
App::uses('AppController', 'Controller');
/**
 * Trainings Controller
 *
 * @property Training $Training
 */
class TrainingsController extends AppController {
var $name = 'Trainings';
var $helpers =  array('Html', 'Ajax','Javascript','Form');
var $components = array( 'RequestHandler','Cookie' );

var $uses = array('Training','UserdetailsTraining','Module');

/**
 * testpdf method
 *
 * 
 */
 public function testpdf() {
 $this->response->type('pdf'); //call pdf important 2.1
 $this->layout = 'pdf'; //this will use the pdf.ctp layout  '''important'''
 $datas=$this->Training->find('all');
 $this->set(compact('datas'));
	

}

/**
 * index method
 *
 * @return void
 */

	public function index($sitecode = null) { 

		//$courses = $this->Training->Course->find('list');
		$courses = $this->Training->Course->find('list', array('conditions' => array('Course.active' => '1')));

		if($this->request->data) {
			$this->Session->write('Training_searching',$this->request->data);
		} 
		else if($this->Session->read('Training_searching')) {
			$this->request->data = $this->Session->read('Training_searching');			
		}
		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['trainings_searching']);	
			$this->data = null;
		}				
		$conditions['Training.sitecode'] = $this->Session->read('Site.sitecode'); //admin
				
		if ($this->request->is('post')){
		
			$starttime=$this->request->data['Training']['tdate1']['year']."-".$this->request->data['Training']['tdate1']['month']."-".$this->request->data['Training']['tdate1']['day'];
			$endtime=$this->request->data['Training']['tdate2']['year']."-".$this->request->data['Training']['tdate2']['month']."-".$this->request->data['Training']['tdate2']['day'];
			
			$this->Session->write('start',$starttime);
			$this->Session->write('end',$endtime);
			
			if ($this->Session->read('start')){
				// $conditions['Training.StartTime >='] = $this->Session->read('start');
				// $conditions['Training.StartTime <='] = $this->Session->read('end');
				$conditions['str_to_date(`Training`.`StartTime`, "%Y-%m-%d") >='] = $this->Session->read('start');
				$conditions['str_to_date(`Training`.`StartTime`, "%Y-%m-%d") <='] = $this->Session->read('end');					
			} 
		
			if ( $this->request->data['Training']['course_id'] != null){
				$conditions['Training.course_id like'] =  "%".$this->request->data['Training']['course_id']."%";
			}
			
			if ( $this->request->data['Training']['module_id'] != null){
				// $conditions['Training.module_id like'] =  "%".$this->request->data['module_id']."%";
				$conditions['Training.module_id like'] =  "%".$this->request->data['Training']['module_id']."%";
			}		

		}
		
		// echo $this->Session->read('Auth.User.group_id'); die();		
		$trainings=$this->paginate($conditions);
		$trainings= Set::sort($trainings, '{n}.Training.StartTime', 'desc'); // sort by Training.StartTime
		
		$this->set(compact('trainings','courses', 'modules'));
	}
	

	
	
	
	
	
	function listmodule() {
		$this->layout = false;
		pr($this->data);
		if(empty($this->data['Training']['course_id'] )) {
			$modules = $this->Module->find('list', array('order'=>'name ASC'));	
		} else {
			$modules  = $this->Module->find('list',array('conditions'=>'Module.course_id='.$this->data['Training']['course_id'],'order'=>array('Module.name ASC')));
			//$modules  = $this->Module->find('list',array('conditions'=>array('Module.course_id' => $this->data['Training']['course_id'],'Module.active' => '1'),'order'=>array('Module.name ASC')));
		}
		$this->set(compact('modules'));
	}




	/**
 * Jadual
 * 
 */



	public function schedules() {
	
	$this->layout = false; 
	$this->Training->recursive = 0;
		$this->set('trainings', $this->paginate());
			
	}


	

	public function datafeed($method = null , $id =null) {
		$postdata = $this->request->data;
		//pr($postdata);
		//echo $method;
		$this->set(compact('method','postdata','id'));
	}
	





	public function edit2 ( $id=null , $start=null , $end=null, $isallday=null,$title=null ) {
	    $this->layout = false;     
		$this->set(compact('id','start','end','isallday','title'));	
		$trainings = $this->Training->find('all');
		
		$courses = $this->Training->Course->find('list');
		$this->Training->Module->contain('Course');
		
		$modules = $this->Training->Module->find('all');
		$this->set(compact('trainings','courses','modules'));
		
		//pr($modules);
	}
	
	




/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		// $this->set('training', $this->Training->read(null, $id));
		$training = $this->Training->read(null, $id);
		$group = $this->Auth->User('group_id');

		if ($this->request->is('post') || $this->request->is('put')) {
			// unfinalize button is clicked
			if (isset($this->request->data['unfinalize'])) {					
				$this->Training->save(array(
					'id' => $id, 
					'finalize' => 0,
					'finalizetime' => date('Y-m-d H:i:s'),
					'finalizedby' => $this->Auth->user('id')					
				));		
				// delete  table finalizeuserinfos
				$this->loadModel('Finalizeuserinfo');
	            $this->Finalizeuserinfo->deleteAll(array(
	                'Finalizeuserinfo.training_id' => $id,
	            ));				
				$this->Session->setFlash(__('The training has been unfinalized.', true));
				$this->redirect(array('action'=>'view', $id));				
			}
			
			
			// finalize
			// finalize button is clicked
			if (isset($this->request->data['finalize'])) {	
				// update data training to active
				$this->Training->save(array(
					'id' => $id, 
					'finalize' => 1,
					'finalizetime' => date('Y-m-d H:i:s'),
					'finalizedby' => $this->Auth->user('id')
				));  

				// query trainee info
				$this->loadModel('UserdetailsTraining');
				$userdetails_trainings = $this->UserdetailsTraining->find('all', array(
					'conditions' => array('UserdetailsTraining.training_id' => $id),
                    'joins' => array(
                        array(
                            'table'=>'userdetails',
                            'alias' => 'Userdetail',                        
                            'conditions' => array(
                                'UserdetailsTraining.userdetail_id = Userdetail.id',
                            ),
                            'type'=>'left'                                                  
                        )
                    ),
                    'fields' => array(
                    	'UserdetailsTraining.id',
						'Userdetail.id',
                    	'Userdetail.age',
                    	'Userdetail.gender_id',
                    	'Userdetail.occupation_id',
                    	'Userdetail.education_id',
                    	'Userdetail.race_id'
                    )
				));

				if (!empty($userdetails_trainings)) {
					foreach ($userdetails_trainings as $userdetails_training) {
						// insert data into table finalizeuserinfos
						$this->loadModel('Finalizeuserinfo');
						$this->Finalizeuserinfo->create();
						$finalizes = array(
							'Finalizeuserinfo' => array(
								'training_id' => $id,
								'userdetail_id' => $userdetails_training['Userdetail']['id'],
								'age' => $userdetails_training['Userdetail']['age'],
								'gender_id' => $userdetails_training['Userdetail']['gender_id'],
								'occupation_id' => $userdetails_training['Userdetail']['occupation_id'],
								'education_id' => $userdetails_training['Userdetail']['education_id'],
								'race_id' => $userdetails_training['Userdetail']['race_id']
							)
						);
						$this->Finalizeuserinfo->save($finalizes);		
					}
				}
				$this->Session->setFlash(__('The training has been finalized.', true));
				$this->redirect(array('action'=>'view', $id));					
			}				
			
		}
		// pr($training); die();
		$this->set(compact('training', 'group'));
	}
	
	
	
	

/**
 * add method
 *
 * @return void
 */
	public function add() {

	//	$courses = $this->Training->Course->find('list', array('order'=>'name ASC'));
		$courses = $this->Training->Course->find('list', array('conditions'=>array('Course.active'=>1),'order'=>'id ASC'));			

		if ($this->request->is('post')) {
			$this->Training->create();
			$this->request->data['Training']['sitecode'] = $this->Auth->user('sitecode');
			$this->request->data['Training']['user_id'] = $this->Auth->user('id');
			// pr($this->request->data);
			
			$this->request->data['Training']['EndTime']['day'] = $this->request->data['Training']['StartTime']['day'];
			$this->request->data['Training']['EndTime']['month'] = $this->request->data['Training']['StartTime']['month'];
			$this->request->data['Training']['EndTime']['year'] = $this->request->data['Training']['StartTime']['year'];

			// set capacity equal to 0 when 1st time save
			$this->request->data['Training']['capacity'] = 0;
			
			if ($this->Training->save($this->request->data)) {
				
				$this->Session->setFlash(__('The training has been saved'));
				//$this->redirect(array('action' => 'index'));
				$id = $this->Training->getLastInsertId();
				$this->redirect(array('action' => 'addtrainees', $id));
			} else {
				$this->Session->setFlash(__('The training could not be saved. Please, try again.'));
			}
		}
		
        $targets = $this->Training->Target->find('list');
		// $users = $this->Training->User->find('list');
		// $userdetails = $this->Training->Userdetail->find('list');
		// $this->set(compact('courses', 'modules', 'users', 'userdetails'));
		$this->set(compact('courses', 'modules', 'targets'));
	}





/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			// $this->request->data['Training']['user_id'] = $this->Auth->user('id');
		
			// check total trainees
			$data = $this->Training->read(null, $id);
			$total = 0;
			if (!empty($data['Userdetail'])) {
				$total = count($data['Userdetail']);
			} 			

			$this->request->data['Training']['EndTime']['day'] = $this->request->data['Training']['StartTime']['day'];
			$this->request->data['Training']['EndTime']['month'] = $this->request->data['Training']['StartTime']['month'];
			$this->request->data['Training']['EndTime']['year'] = $this->request->data['Training']['StartTime']['year'];		
			$this->request->data['Training']['capacity'] = $total;

			if ($this->Training->save($this->request->data)) {
				$this->Session->setFlash(__('The training has been saved'));
				$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__('The training could not be saved. Please, try again.'));
			}
		} 
		else {
			$this->request->data = $this->Training->read(null, $id);			
		}

	//	$courses = $this->Training->Course->find('list');
		$courses = $this->Training->Course->find('list', array('conditions' => array('Course.active' => '1')));
	//	$modules = $this->Training->Module->find('list');
		$modules = $this->Training->Module->find('list', array('conditions' => array('Module.active' => '1')));
		// $users = $this->Training->User->find('list');
		$targets = $this->Training->Target->find('list');
		// $userdetails = $this->Training->Userdetail->find('list');
		$this->set(compact('courses', 'modules', 'users','targets'));
	}




	
	public function addtrainees($trainingId = null) {
		$this->Training->id = $trainingId;	
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		$training = $this->Training->read(null, $trainingId);

		// count total existing trainees
		$total_trainees = count($training['Userdetail']);
		// echo $total_trainees; die();
		
		$course_id = $training['Training']['course_id'];
		$module_id = $training['Training']['module_id'];
		
		// $this->UserdetailsTraining->recursive = 0;
		// $this->set('userdetailsTrainings', $this->paginate());
		
		if ($this->request->is('post') || $this->request->is('put')) {
			// search button is clicked
			if (isset($this->request->data['search'])) {
			    // $this->loadModel('Userdetail');
				// $conditions = array("Userdetail.sitecode" =>  $this->Session->read('Site.sitecode'),"Userdetail.name like" =>"%".$this->request->data['Training']['name']."%","Userdetail.icno like" =>"%".$this->request->data['Training']['icno']."%");
				// $userdetails = $this->Userdetail->find('list',array('conditions'=>$conditions,'fields'=>array('id','name_ic')));
				
				$sitecode = $this->Session->read('Site.sitecode');
				$name = $this->request->data['Training']['name'];
				$icno = $this->request->data['Training']['icno'];
											
				/*
				// searching userdetail yg x pernah ambil course n modul intel
				$name_ic = 'CONCAT(userdetails.name, " (", userdetails.icno, ")")';
				$sql = "select id,  name, icno from userdetails where sitecode = '$sitecode' ";
				$sql .="and icno like '%$icno%' and name like '%$name%' ";
				$sql .="and invaliduser != 1 ";
				$sql .="and id not in (select b.userdetail_id from trainings a,userdetails_trainings b where a.id = b.training_id ";
				$sql .="and a.module_id = $module_id and a.module_id in ('41','42','43','44','45','91')) ";				
				$sql .="order by id desc limit 20";
				$userdetails = $this->Training->Userdetail->query($sql); 	
				*/
				
				// dissearching userdetail from taken same course and module intel again
				if ($course_id == 9 || $course_id == 10 || $course_id == 17) {
					$sql = "select id, name, icno from userdetails where sitecode = '$sitecode' ";
					$sql .="and icno like '%$icno%' and name like '%$name%' ";
					$sql .="and invaliduser != 1 ";
					$sql .="and id not in (select b.userdetail_id from trainings a, userdetails_trainings b where a.id = b.training_id ";
					$sql .="and a.course_id = $course_id and a.module_id = $module_id) ";				
					$sql .="order by id desc limit 20";
				}

				// userdetail of non intel training can take many training of same course and module except current training
				else {
					$sql = "select id, name, icno from userdetails where sitecode = '$sitecode' ";
					$sql .="and icno like '%$icno%' and name like '%$name%' ";
					$sql .="and invaliduser != 1 ";
					$sql .="and id not in (select b.userdetail_id from trainings a, userdetails_trainings b where a.id = b.training_id ";
					$sql .="and a.course_id = $course_id and a.module_id = $module_id and b.training_id = $trainingId) ";				
					$sql .="order by id desc limit 20";
				}
				$userdetails = $this->Training->Userdetail->query($sql); 				
			}
			
			// submit button is clicked and there's checked trainees
			if (isset($this->request->data['submit']) && !empty($this->request->data['Userdetail']['Userdetail'])) {					
				$total_new = 0;
				foreach ($this->request->data['Userdetail']['Userdetail'] as $userdetail) {
					if (!$this->UserdetailsTraining->hasAny(array('training_id' => $trainingId,'userdetail_id' => $userdetail))) {
						$total_new++;
						$this->UserdetailsTraining->create();
						$trainees = array('UserdetailsTraining'=>array('training_id'=>$trainingId,'userdetail_id'=>$userdetail,'user_id'=>$this->Auth->user('id')));
						$this->UserdetailsTraining->saveAll($trainees);			
					}			
				}
				// update capacity
				$this->Training->saveField('capacity', $total_trainees + $total_new);  

				$this->Session->setFlash(__('The training has been saved'));
				$this->redirect(array('action' => 'addtrainees', $trainingId));				
			}
			
			
			
			// finalize button is clicked
			if (isset($this->request->data['finalize'])) {	
				// update data training to active
				$this->Training->save(array(
					'id' => $trainingId, 
					'finalize' => 1,
					'finalizetime' => date('Y-m-d H:i:s'),
					'finalizedby' => $this->Auth->user('id')
				));  

				// query trainee info
				$this->loadModel('UserdetailsTraining');
				$userdetails_trainings = $this->UserdetailsTraining->find('all', array(
					'conditions' => array('UserdetailsTraining.training_id' => $trainingId),
                    'joins' => array(
                        array(
                            'table'=>'userdetails',
                            'alias' => 'Userdetail',                        
                            'conditions' => array(
                                'UserdetailsTraining.userdetail_id = Userdetail.id',
                            ),
                            'type'=>'left'                                                  
                        )
                    ),
                    'fields' => array(
                    	'UserdetailsTraining.id',
						'Userdetail.id',
                    	'Userdetail.age',
                    	'Userdetail.gender_id',
                    	'Userdetail.occupation_id',
                    	'Userdetail.education_id',
                    	'Userdetail.race_id'
                    )
				));

				if (!empty($userdetails_trainings)) {
					foreach ($userdetails_trainings as $userdetails_training) {
						// insert data into table finalizeuserinfos
						$this->loadModel('Finalizeuserinfo');
						$this->Finalizeuserinfo->create();
						$finalizes = array(
							'Finalizeuserinfo' => array(
								'training_id' => $trainingId,
								'userdetail_id' => $userdetails_training['Userdetail']['id'],
								'age' => $userdetails_training['Userdetail']['age'],
								'gender_id' => $userdetails_training['Userdetail']['gender_id'],
								'occupation_id' => $userdetails_training['Userdetail']['occupation_id'],
								'education_id' => $userdetails_training['Userdetail']['education_id'],
								'race_id' => $userdetails_training['Userdetail']['race_id']
							)
						);
						$this->Finalizeuserinfo->save($finalizes);		
					}
				}
				$this->Session->setFlash(__('The training has been finalized.', true));
				$this->redirect(array('action'=>'addtrainees', $trainingId));					
			}			

			
			// unfinalize button is clicked
			if (isset($this->request->data['unfinalize'])) {	
				// udpate data training		
				$this->Training->save(array(
					'id' => $trainingId, 
					'finalize' => 0,
					'finalizetime' => date('Y-m-d H:i:s'),
					'finalizedby' => $this->Auth->user('id')					
				));		

				// delete  table finalizeuserinfos
				$this->loadModel('Finalizeuserinfo');
	            $this->Finalizeuserinfo->deleteAll(array(
	                'Finalizeuserinfo.training_id' => $trainingId,
	            ));

				$this->Session->setFlash(__('The training has been unfinalized.', true));
				$this->redirect(array('action'=>'addtrainees', $trainingId));				
			}
			
		}
		else {
			// $this->request->data = $this->Training->read(null, $trainingId);
		}
		$group = $this->Auth->User('group_id');
		$this->set(compact('training', 'courses', 'modules', 'users', 'userdetails', 'group'));		
		// $this->set(compact('courses', 'modules', 'users', 'userdetails'));
	}








	
	public function deltrainees($trainingId = null,$userId = null) 
	{
	   // $trainees = $this->UserdetailsTraining->find('list',array('conditions'=>array('training_id' => $trainingId,'userdetail_id' => $userId)));
		// pr($trainees);
		// $this->UserdetailsTraining->delete($trainees);
		$this->UserdetailsTraining->deleteAll(array('training_id' => $trainingId,'userdetail_id' => $userId));	

		// update capacity
		$this->Training->id = $trainingId;	
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}		 
		$training = $this->Training->read(null, $trainingId);
		$total = count($training['Userdetail']);
		$this->Training->saveField('capacity', $total);
		$this->redirect(array('action' => 'addtrainees', $trainingId));
	}
	




/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Training->id = $id;
		if (!$this->Training->exists()) {
			throw new NotFoundException(__('Invalid training'));
		}
		if ($this->Training->delete()) {
			$this->Session->setFlash(__('Training deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Training was not deleted'));
		$this->redirect(array('action' => 'index'));
	}




}
