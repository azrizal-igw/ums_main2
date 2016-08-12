<?php
App::uses('AppController', 'Controller');
/**
 * Mukims Controller
 *
 * @property Mukim $Mukim
 */
class MukimsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mukim->recursive = 0;
		$this->set('mukims', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Mukim->id = $id;
		if (!$this->Mukim->exists()) {
			throw new NotFoundException(__('Invalid mukim'));
		}
		$this->set('mukim', $this->Mukim->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mukim->create();
			if ($this->Mukim->save($this->request->data)) {
				$this->Session->setFlash(__('The mukim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mukim could not be saved. Please, try again.'));
			}
		}
		$districts = $this->Mukim->District->find('list');
		$this->set(compact('districts'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Mukim->id = $id;
		if (!$this->Mukim->exists()) {
			throw new NotFoundException(__('Invalid mukim'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mukim->save($this->request->data)) {
				$this->Session->setFlash(__('The mukim has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mukim could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Mukim->read(null, $id);
		}
		$districts = $this->Mukim->District->find('list');
		$this->set(compact('districts'));
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
		$this->Mukim->id = $id;
		if (!$this->Mukim->exists()) {
			throw new NotFoundException(__('Invalid mukim'));
		}
		if ($this->Mukim->delete()) {
			$this->Session->setFlash(__('Mukim deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mukim was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
/**
 * listmukim method
 *
 */
	public function listmukim() {
		
	}
	
	
}
