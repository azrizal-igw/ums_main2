<?php
App::uses('AppController', 'Controller');
/**
 * Ictknowledges Controller
 *
 * @property Ictknowledge $Ictknowledge
 */
class IctknowledgesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Ictknowledge->recursive = 0;
		$this->set('ictknowledges', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Ictknowledge->id = $id;
		if (!$this->Ictknowledge->exists()) {
			throw new NotFoundException(__('Invalid ictknowledge'));
		}
		$this->set('ictknowledge', $this->Ictknowledge->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Ictknowledge->create();
			if ($this->Ictknowledge->save($this->request->data)) {
				$this->Session->setFlash(__('The ictknowledge has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ictknowledge could not be saved. Please, try again.'));
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
		$this->Ictknowledge->id = $id;
		if (!$this->Ictknowledge->exists()) {
			throw new NotFoundException(__('Invalid ictknowledge'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ictknowledge->save($this->request->data)) {
				$this->Session->setFlash(__('The ictknowledge has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ictknowledge could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Ictknowledge->read(null, $id);
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
		$this->Ictknowledge->id = $id;
		if (!$this->Ictknowledge->exists()) {
			throw new NotFoundException(__('Invalid ictknowledge'));
		}
		if ($this->Ictknowledge->delete()) {
			$this->Session->setFlash(__('Ictknowledge deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Ictknowledge was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
