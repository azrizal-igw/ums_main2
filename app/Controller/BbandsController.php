<?php
App::uses('AppController', 'Controller');
/**
 * Bbands Controller
 *
 * @property Bband $Bband
 */
class BbandsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Bband->recursive = 0;
		$this->set('bbands', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Bband->id = $id;
		if (!$this->Bband->exists()) {
			throw new NotFoundException(__('Invalid bband'));
		}
		$this->set('bband', $this->Bband->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Bband->create();
			if ($this->Bband->save($this->request->data)) {
				$this->Session->setFlash(__('The bband has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bband could not be saved. Please, try again.'));
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
		$this->Bband->id = $id;
		if (!$this->Bband->exists()) {
			throw new NotFoundException(__('Invalid bband'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Bband->save($this->request->data)) {
				$this->Session->setFlash(__('The bband has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The bband could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Bband->read(null, $id);
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
		$this->Bband->id = $id;
		if (!$this->Bband->exists()) {
			throw new NotFoundException(__('Invalid bband'));
		}
		if ($this->Bband->delete()) {
			$this->Session->setFlash(__('Bband deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Bband was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
