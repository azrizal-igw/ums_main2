<?php
App::uses('AppController', 'Controller');
/**
 * Sites Controller
 *
 * @property Site $Site
 */
class SitesController extends AppController {

var $helpers =  array('Html','Form');
var $components = array( 'RequestHandler');

public function beforeFilter() {
    parent::beforeFilter();
    $this->Auth->allow('*');
}
/**
 * index method
 *
 * @return void
 */
	public function index($state_id=null) {     
	//$this->Session->setflash($this->Session->read('Auth.User.name'));
	pr($this->Form);
	
	
		$this->Site->recursive = 0;
		$states = $this->Site->State->find('list');
		$this->set('sites',$this->paginate("Site",array('Site.state_id'=>$state_id)));  //filter site where state id == ""idbrowser""
		$this->set(compact('states','state_id'));  //,send to .ctp
		}
/**
 * search method
 *
 * @return void
 */
	public function search($act = null,$view = 'index') {
		$condition = '';		
		$status_region = 0;
		if (!$this->Session->read('Auth.User.region')) {
			$region = implode(',', $this->Session->read('Auth.User.region'));
			$status_region = 1;
		}

		// echo $status_region; die();


		/*
		if (!empty($this->Session->read('Auth.User.region'))) {
			$region = implode(',', $this->Session->read('Auth.User.region'));
			$condition = "Site.region_id IN ($region)";			
		}
		else {
			$condition = "";
		}
		*/
		



		
		if ($this->request->is('post')) {
			if(!empty($this->data['Site']['search'])) {
				if ($status_region == 1) {
					$condition .= "Site.id like '%".$this->data['Site']['search']."%' or Site.name like '%".$this->data['Site']['search']."%'";
					$condition .= "AND Site.region_id IN ($region) ";					
				}
				else {
					$condition .= "Site.id like '%".$this->data['Site']['search']."%' or Site.name like '%".$this->data['Site']['search']."%'";
				}
			}
		}
		else {
			if ($status_region == 1) {
				$condition .= "Site.region_id IN ($region)";	
			}	
		}




		$this->Site->contain('State','District','Phase','Region');
		$this->Site->recursive = 0;
		$this->set('sites', $this->paginate('Site',$condition));


		// pr($this->paginate('Site',$condition)); die();
		$this->set(compact('act','view'));
	}


	/**
 * perform_action method - to redirect where admin select site
 *
 * @return void
 */
	public function perform_action($sitecode =null,$act = null,$view = null) {
	
		if ($act != null and $sitecode != null){
		
			$site = $this->Site->findById($sitecode );
			$this->Session->write('Site.sitecode', $sitecode);
			$this->Session->write('Site.name', strtoupper($site['Site']['name']));
			$this->redirect(array('controller'=>$act,'action' => $view,$sitecode));
		} else {
			$this->redirect(array('action' => 'search'));
		}
	}






	public function listsite(){
		// $this->User->recursive = 0;      
		$cond[] = array();
		if ($this->request->is('post') || $this->Session->read('Auth.User.Search.Site')){
			if ($this->request->is('post')){
				$this->Session->write('Auth.User.Search.Site',$this->request->data);
				$this->request->params['named']['paged'] = 1;
			} 
			else {
				$this->request->data = $this->Session->read('Auth.User.Search.Site');
			}

			/* Search by Site Name */  
			if($this->request->data['Site']['name'] != null){
				$cond['Site.name LIKE'] = '%'.$this->request->data['Site']['name'].'%';
			}

			/* Search by Phase */
			if($this->request->data['Site']['phase_id'] != null){
				$cond['Site.phase_id LIKE'] = '%'.$this->request->data['Site']['phase_id'].'%';
			} else{
				$cond['Site.phase_id LIKE'] = '%'.$this->Session->read('Auth.User.phase');
			}
			/* Search by Phase */
			if($this->request->data['Site']['region_id'] != null){
				$cond['Site.region_id LIKE'] = '%'.$this->request->data['Site']['region_id'].'%';
			} 
		} 
		else {
			/* Nothing Happen */
		}
		
		 /*  Find Staff name  */
		if (isset($this->request->data['Site']['manager'])){
			$listManager = $this->Site->User->find('list',array(
				'conditions'=>array(
					'User.name LIKE' => '%'.$this->request->data['Site']['manager'].'%'
				),
				'fields' => array(
						'User.sitecode'
					)
				)
			);
			$cond['Site.id'] = $listManager;
		}



		if ($this->Auth->User('group_id') == 7) { // regional manager (filter by regions)
			$region = implode(',', $this->Session->read('Auth.User.region'));
			$cond = "Region.id IN ($region)";
		}




		$this->set('phases',$this->Site->Phase->find('list'));
		$this->set('regions',$this->Site->Region->find('list'));
		$sites = $this->paginate('Site', $cond);
		$this->set('site',$sites);
		// pr($this->paginate('Site'));
		// die();
	}
	






/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		$this->set('site', $this->Site->read(null, $id));
	}

/**
 * add method
 *
 * @param state_id
 *
 * @return void
 */
	public function add($state_id=null) {
		
		if ($this->request->is('post')) {
			$this->request->data['Site']['state_id']=$state_id;
			$this->Site->create();
			if ($this->Site->save($this->request->data)) {
				$this->Session->setFlash(__('The site has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'));
			}
			
		}
		
		$states = $this->Site->State->find('list');
		$districts = $this->Site->District->find('list',array('conditions'=>array('District.state_id' =>$state_id)));  //filter district id 
		$this->set(compact('states','districts','state_id'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {    //jika request itu "ada"
			if ($this->Site->save($this->request->data)) {                //jika save request data
				$this->Session->setFlash(__('The site has been saved'));
				$this->redirect(array('action' => 'index'));      //jump to index
			} else {
				$this->Session->setFlash(__('The site could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Site->read(null, $id);  //get site id from browser
		}
		
		$states = $this->Site->State->find('list');
		$districts = $this->Site->District->find('list');
		$this->set(compact('states','districts'));
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
		$this->Site->id = $id;
		if (!$this->Site->exists()) {
			throw new NotFoundException(__('Invalid site'));
		}
		if ($this->Site->delete()) {
			$this->Session->setFlash(__('Site deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Site was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function listdistrict(){  //function optional ajax ------- not Use anymore ---------
		//$this->layout = 'ajax';
		$districts = $this->Site->District->find('list',array('conditions'=>array('District.state_id'=>$this->request->data['Site']['state_id'])));
		$mukims = $this->Site->District->Mukim->find('list',array('conditions'=>array('Mukim.district_id'=>$this->request->data['Site']['district_id'])));
		//pr($this->request->data);
		$this->set(compact('districts'));
		$this->set(compact('mukims'));
		//pr($states );
	}
	public function listmukim(){ //function optional ajax
		$this->layout = 'ajax';
		$mukims = $this->Site->District->Mukim->find('list',array('conditions'=>array('Mukim.district_id'=>$this->request->data['Site']['district_id'])));
		$this->set(compact('mukims'));
		//pr($states );
	}
	
}