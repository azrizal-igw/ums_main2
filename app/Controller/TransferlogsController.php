<?php
App::uses('AppController', 'Controller');
/**
 * Transferlogs Controller
 *
 * @property Transferlog $Transferlog
 */
class TransferlogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($sitecode = null) {
	
		if($this->request->data) {
				$this->Session->write('Transferlog_searching',$this->request->data);
		} else if($this->Session->read('Transferlog_searching')) {
				$this->request->data= $this->Session->read('Transferlog_searching');
				
		}

		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Transferlog']);	
			$this->data = null;
		}
		
		$conditions['Transferlog.sitecode'] = $this->Session->read('Site.sitecode');
		
		
		if ($this->request->is('post')) {
			
			
			$time1=$this->request->data['Transferlog']['time1']['year']."-".$this->request->data['Transferlog']['time1']['month']."-".$this->request->data['Transferlog']['time1']['day']." ".$this->request->data['Transferlog']['time1']['hour'].":".$this->request->data['Transferlog']['time1']['min'].":00";
			$time2=$this->request->data['Transferlog']['time2']['year']."-".$this->request->data['Transferlog']['time2']['month']."-".$this->request->data['Transferlog']['time2']['day']." ".$this->request->data['Transferlog']['time2']['hour'].":".$this->request->data['Transferlog']['time2']['min'].":00";

			$conditions['Transferlog.sitetime >='] = $time1;
			$conditions['Transferlog.sitetime <='] = $time2;
			
		}
		// $this->paginate['limit'] = 50;
		$transferlogs=$this->paginate($conditions);
		$this->set(compact('transferlogs'));

	}
	
	public function manager_index($sitecode = null) {
	
		if($this->request->data) {
				$this->Session->write('Transferlog_searching',$this->request->data);
		} else if($this->Session->read('Transferlog_searching')) {
				$this->request->data= $this->Session->read('Transferlog_searching');
				
		}

		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Transferlog']);	
			$this->data = null;
		}
		
		
		
		// $this->paginate['limit'] = 50;
		$transferlogs=$this->paginate($conditions);
		$this->set(compact('Transferlogs'));

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		$this->set('transferlog', $this->Transferlog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transferlog->create();
			if ($this->Transferlog->save($this->request->data)) {
				$this->Session->setFlash(__('The transferlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transferlog could not be saved. Please, try again.'));
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
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transferlog->save($this->request->data)) {
				$this->Session->setFlash(__('The transferlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transferlog could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transferlog->read(null, $id);
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
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		if ($this->Transferlog->delete()) {
			$this->Session->setFlash(__('Transferlog deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Transferlog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
