<?php
App::uses('AppController', 'Controller');
/**
 * Adminhistories Controller
 *
 * @property Adminhistory $Adminhistory
 */
class AdminhistoriesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Adminhistory->recursive = 0;
		$this->set('adminhistories', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Adminhistory->id = $id;
		if (!$this->Adminhistory->exists()) {
			throw new NotFoundException(__('Invalid adminhistory'));
		}
		$this->set('adminhistory', $this->Adminhistory->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Adminhistory->create();
			if ($this->Adminhistory->save($this->request->data)) {
				$this->Session->setFlash(__('The adminhistory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adminhistory could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Adminhistory->id = $id;
		if (!$this->Adminhistory->exists()) {
			throw new NotFoundException(__('Invalid adminhistory'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Adminhistory->save($this->request->data)) {
				$this->Session->setFlash(__('The adminhistory has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The adminhistory could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Adminhistory->read(null, $id);
		}
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
		$this->Adminhistory->id = $id;
		if (!$this->Adminhistory->exists()) {
			throw new NotFoundException(__('Invalid adminhistory'));
		}
		if ($this->Adminhistory->delete()) {
			$this->Session->setFlash(__('Adminhistory deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Adminhistory was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
