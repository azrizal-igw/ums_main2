<?php
App::uses('AppController', 'Controller');
/**
 * Admindetails Controller
 *
 * @property Admindetail $Admindetail
 */
class AdmindetailsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Admindetail->recursive = 0;
		$this->set('admindetails', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Admindetail->id = $id;
		if (!$this->Admindetail->exists()) {
			throw new NotFoundException(__('Invalid admindetail'));
		}
		$this->set('admindetail', $this->Admindetail->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Admindetail->create();
			if ($this->Admindetail->save($this->request->data)) {
				$this->Session->setFlash(__('The admindetail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admindetail could not be saved. Please, try again.'));
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
		$this->Admindetail->id = $id;
		if (!$this->Admindetail->exists()) {
			throw new NotFoundException(__('Invalid admindetail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Admindetail->save($this->request->data)) {
				$this->Session->setFlash(__('The admindetail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The admindetail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Admindetail->read(null, $id);
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
		$this->Admindetail->id = $id;
		if (!$this->Admindetail->exists()) {
			throw new NotFoundException(__('Invalid admindetail'));
		}
		if ($this->Admindetail->delete()) {
			$this->Session->setFlash(__('Admindetail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Admindetail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
