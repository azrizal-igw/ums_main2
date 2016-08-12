<?php
App::uses('AppController', 'Controller');
/**
 * Eventlogs Controller
 *
 * @property Eventlog $Eventlog
 */
class EventlogsController extends AppController {

/**
 * index method
 *
 * @return void
 */

	public function index($sitecode = null) {
	
		if($this->request->data) {
				$this->Session->write('Eventlog_searching',$this->request->data);
		} else if($this->Session->read('Eventlog_searching')) {
				$this->request->data= $this->Session->read('Eventlog_searching');
				
		}

		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Eventlog_searching']);	
			$this->data = null;
		}
		
		
		if (isset($_SESSION['Eventlog_searching'])) {
			if ( $this->request->data['Eventlog']['icno'] != null){
				$conditions['Eventlog.icno like'] =  "%".$this->request->data['Eventlog']['icno']."%";
			}
			
			if ($this->request->data['Eventlog']['processname'] != null){
				$conditions['Eventlog.processname like'] = "%".$this->request->data['Eventlog']['processname']."%";
			}
			
			if ($this->request->data['Eventlog']['url'] != null){
				$conditions['Eventlog.url like'] = "%".$this->request->data['Eventlog']['url']."%";
			}
			
			if ($this->request->data['Eventlog']['windowtitle'] != null){
				$conditions['Eventlog.windowtitle like'] = "%".$this->request->data['Eventlog']['windowtitle']."%";
			}
			
			$time1=$this->request->data['Eventlog']['time1']['year']."-".$this->request->data['Eventlog']['time1']['month']."-".$this->request->data['Eventlog']['time1']['day']." ".$this->request->data['Eventlog']['time1']['hour'].":".$this->request->data['Eventlog']['time1']['min'].":00";
			$time2=$this->request->data['Eventlog']['time2']['year']."-".$this->request->data['Eventlog']['time2']['month']."-".$this->request->data['Eventlog']['time2']['day']." ".$this->request->data['Eventlog']['time2']['hour'].":".$this->request->data['Eventlog']['time2']['min'].":00";

			$conditions['Eventlog.time >='] = $time1;
			$conditions['Eventlog.time <='] = $time2;
			
		
		}
		$conditions['Eventlog.sitecode'] = $this->Session->read('Site.sitecode');
		// $this->paginate['limit'] = 50;
		$eventlogs=$this->paginate($conditions);
		$this->set(compact('eventlogs'));

	}	

	public function manager_index($sitecode = null) {
	
		if($this->request->data) {
				$this->Session->write('Eventlog_searching',$this->request->data);
		} else if($this->Session->read('Eventlog_searching')) {
				$this->request->data= $this->Session->read('Eventlog_searching');
				
		}

		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Eventlog']);	
			$this->data = null;
		}
		
		if ($this->Session->read('Site.sitecode') != null ){
			$conditions['Eventlog.sitecode'] = $this->Session->read('Auth.User.sitecode');
		}	
		
		if ( $this->request->data['Eventlog']['icno'] != null){
			$conditions['Eventlog.icno like'] =  "%".$this->request->data['Eventlog']['icno']."%";
		}
		
		if ($this->request->data['Eventlog']['processname'] != null){
			$conditions['Eventlog.processname like'] = "%".$this->request->data['Eventlog']['processname']."%";
		}
		
		if ($this->request->data['Eventlog']['url'] != null){
			$conditions['Eventlog.url like'] = "%".$this->request->data['Eventlog']['url']."%";
		}
		
		if ($this->request->data['Eventlog']['windowtitle'] != null){
			$conditions['Eventlog.windowtitle like'] = "%".$this->request->data['Eventlog']['windowtitle']."%";
		}
		
		// $this->paginate['limit'] = 50;
		$eventlogs=$this->paginate($conditions);
		$this->set(compact('eventlogs'));

	}	
		
/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Eventlog->id = $id;
		if (!$this->Eventlog->exists()) {
			throw new NotFoundException(__('Invalid eventlog'));
		}
		$this->set('eventlog', $this->Eventlog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Eventlog->create();
			if ($this->Eventlog->save($this->request->data)) {
				$this->Session->setFlash(__('The eventlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eventlog could not be saved. Please, try again.'));
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
		$this->Eventlog->id = $id;
		if (!$this->Eventlog->exists()) {
			throw new NotFoundException(__('Invalid eventlog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Eventlog->save($this->request->data)) {
				$this->Session->setFlash(__('The eventlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The eventlog could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Eventlog->read(null, $id);
		}
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Eventlog->id = $id;
		if (!$this->Eventlog->exists()) {
			throw new NotFoundException(__('Invalid eventlog'));
		}
		if ($this->Eventlog->delete()) {
			$this->Session->setFlash(__('Eventlog deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Eventlog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
