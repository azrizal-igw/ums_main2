<?php
App::uses('AppController', 'Controller');
/**
 * Usertypes Controller
 *
 * @property Usertype $Usertype
 */
class UsertypesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Usertype->recursive = 0;
		$this->set('usertypes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usertype->id = $id;
		if (!$this->Usertype->exists()) {
			throw new NotFoundException(__('Invalid usertype'));
		}
		$this->set('usertype', $this->Usertype->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usertype->create();
			if ($this->Usertype->save($this->request->data)) {
				$this->Session->setFlash(__('The usertype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usertype could not be saved. Please, try again.'));
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
		$this->Usertype->id = $id;
		if (!$this->Usertype->exists()) {
			throw new NotFoundException(__('Invalid usertype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usertype->save($this->request->data)) {
				$this->Session->setFlash(__('The usertype has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usertype could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Usertype->read(null, $id);
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
		$this->Usertype->id = $id;
		if (!$this->Usertype->exists()) {
			throw new NotFoundException(__('Invalid usertype'));
		}
		if ($this->Usertype->delete()) {
			$this->Session->setFlash(__('Usertype deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usertype was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
