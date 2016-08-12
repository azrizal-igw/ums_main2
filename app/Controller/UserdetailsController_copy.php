<?php
App::uses('AppController', 'Controller');
/**
 * Userdetails Controller
 *
 * @property Userdetail $Userdetail
 */
class UserdetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Userdetail->recursive = 0;
		$this->set('userdetails', $this->paginate('Userdetail', array('Userdetail.sitecode' =>$this->Auth->user('sitecode'))));
		
	}
	
/**
 * admin index method
 *
 * @return void
 */
	public function admin_index() {   
	
		$this->Userdetail->recursive = 0;
		// $this->set('userdetails', $this->paginate());
		// pr($this->paginate() );
		
		$search = '';
		$and =' ';
				
		if(isset($this->data)){ 
			
		
			if($this->data['Userdetail']['icno'] != '') {
				$search .= "Userdetail.icno like '%".$this->data['Userdetail']['icno']."%'";
				$and = ' and ';
			}

			if($this->data['Userdetail']['name'] != '') {
				$search .= $and." Userdetail.name like '%".$this->data['Userdetail']['name']."%'";	
			}	
		}
		
		if ($search == '') {
			$this->set('userdetails', $this->paginate('Userdetail'));
		} else {
			$this->set('userdetails', $this->paginate('Userdetail',array($search) ));
		}
		
		
		
	}
	
/**
 *index pdf method
 *
 * @return void
 */
	public function viewdetailpdf($id=null) {  
		$this->response->type('pdf'); //call pdf important 2.1
		$this->layout = 'pdf'; 
		$this->Userdetail->read(null,$id);
		//pr($id);
		//$headers=$this->Userdetail->find('all');
		$userdetails=$this->Userdetail->find('all',array('conditions'=>array('Userdetail.id'=>$id)));
		//pr($users);
		//foreach($users as $key=> $user){
		//$data=$user['Userdetail'];
		//}
		//pr($data);
		$this->set(compact('data','userdetails'));
		
	}
	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		$this->set('userdetail', $this->Userdetail->read(null, $id));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Userdetail->create();
			$this->request->data['Userdetail']['sitecode'] = $this->Auth->user('sitecode');
			
			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved'));
				pr($this->request->data);
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		}
		$states = $this->Userdetail->State->find('list');
		$genders = $this->Userdetail->Gender->find('list',array('fields'=>'eng'));
		$races = $this->Userdetail->Race->find('list',array('fields'=>'eng'));
		$nationalities = $this->Userdetail->Nationality->find('list',array('fields'=>'eng'));
		$occupations = $this->Userdetail->Occupation->find('list',array('fields'=>'eng'));
		$educations = $this->Userdetail->Education->find('list',array('fields'=>'eng'));
		$incomes = $this->Userdetail->Income->find('list',array('fields'=>'eng'));
		$usertypes = $this->Userdetail->Usertype->find('list',array('fields'=>'eng'));
		$ictknowledges = $this->Userdetail->Ictknowledge->find('list',array('fields'=>'eng'));
		$transports = $this->Userdetail->Transport->find('list',array('fields'=>'eng'));
		$fixlines = $this->Userdetail->Fixline->find('list',array('fields'=>'eng'));
		$bbands = $this->Userdetail->Bband->find('list',array('fields'=>'eng'));
		$mobiles = $this->Userdetail->Mobile->find('list',array('fields'=>'eng'));
		$threegs = $this->Userdetail->Threeg->find('list',array('fields'=>'eng'));
		$trainings = $this->Userdetail->Training->find('list');
		$this->set(compact('states', 'genders', 'races', 'nationalities', 'occupations', 'educations', 'incomes', 'usertypes', 'ictknowledges', 'transports', 'fixlines', 'bbands', 'mobiles', 'threegs', 'trainings'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Userdetail->read(null, $id);
		}
		$states = $this->Userdetail->State->find('list');
		$genders = $this->Userdetail->Gender->find('list',array('fields'=>'eng'));
		$races = $this->Userdetail->Race->find('list',array('fields'=>'eng'));
		$nationalities = $this->Userdetail->Nationality->find('list',array('fields'=>'eng'));
		$occupations = $this->Userdetail->Occupation->find('list',array('fields'=>'eng'));
		$educations = $this->Userdetail->Education->find('list',array('fields'=>'eng'));
		$incomes = $this->Userdetail->Income->find('list',array('fields'=>'eng'));
		$usertypes = $this->Userdetail->Usertype->find('list',array('fields'=>'eng'));
		$ictknowledges = $this->Userdetail->Ictknowledge->find('list',array('fields'=>'eng'));
		$transports = $this->Userdetail->Transport->find('list',array('fields'=>'eng'));
		$fixlines = $this->Userdetail->Fixline->find('list',array('fields'=>'eng'));
		$bbands = $this->Userdetail->Bband->find('list',array('fields'=>'eng'));
		$mobiles = $this->Userdetail->Mobile->find('list',array('fields'=>'eng'));
		$threegs = $this->Userdetail->Threeg->find('list',array('fields'=>'eng'));
		$trainings = $this->Userdetail->Training->find('list');
		$this->set(compact('states', 'genders', 'races', 'nationalities', 'occupations', 'educations', 'incomes', 'usertypes', 'ictknowledges', 'transports', 'fixlines', 'bbands', 'mobiles', 'threegs', 'trainings'));
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
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		if ($this->Userdetail->delete()) {
			$this->Session->setFlash(__('Userdetail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Userdetail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function userdetailpdf() {
		//Configure::write('debug',0);
		$this->response->type('pdf'); //call pdf important 2.1
			$this->layout = 'pdf'; 
		$dataall = $this->Userdetail->find('all',array(
														'order' => array('name' => 'ASC'),
														'fields'=>array(
																		'Userdetail.name',
																		'Userdetail.icno',
																		'Userdetail.hp_no',
																		'Userdetail.registered_date',
																		'Usertype.bm')));
		//$users = $this->Userdetail->find('all');
		//foreach($users as $key=> $newuser){
		// $datas[$key]=array('user'=>$newuser['Userdetail'],'type'=>$newuser['Usertype']);
		//}
		
		//	pr($dataall);	
		//	pr($datas);		
		$this->set(compact('dataall'));
				
	}
}
?>