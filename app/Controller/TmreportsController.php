<?php
App::uses('AppController', 'Controller');
/**
 * Tmreports Controller
 *
 * @property Tmreport $Tmreport
 */
class TmreportsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tmreport->recursive = 0;
		$this->set('tmreports', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tmreport->id = $id;
		if (!$this->Tmreport->exists()) {
			throw new NotFoundException(__('Invalid tmreport'));
		}
		$this->set('tmreport', $this->Tmreport->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tmreport->create();
			if ($this->Tmreport->save($this->request->data)) {
				$this->Session->setFlash(__('The tmreport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tmreport could not be saved. Please, try again.'));
			}
		}
		$users = $this->Tmreport->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Tmreport->id = $id;
		if (!$this->Tmreport->exists()) {
			throw new NotFoundException(__('Invalid tmreport'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tmreport->save($this->request->data)) {
				$this->Session->setFlash(__('The tmreport has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tmreport could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Tmreport->read(null, $id);
		}
		$users = $this->Tmreport->User->find('list');
		$this->set(compact('users'));
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
		$this->Tmreport->id = $id;
		if (!$this->Tmreport->exists()) {
			throw new NotFoundException(__('Invalid tmreport'));
		}
		if ($this->Tmreport->delete()) {
			$this->Session->setFlash(__('Tmreport deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tmreport was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
