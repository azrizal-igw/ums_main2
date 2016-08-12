<?php
App::uses('AppController', 'Controller');
/**
 * Threegs Controller
 *
 * @property Threeg $Threeg
 */
class ThreegsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Threeg->recursive = 0;
		$this->set('threegs', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Threeg->id = $id;
		if (!$this->Threeg->exists()) {
			throw new NotFoundException(__('Invalid threeg'));
		}
		$this->set('threeg', $this->Threeg->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Threeg->create();
			if ($this->Threeg->save($this->request->data)) {
				$this->Session->setFlash(__('The threeg has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threeg could not be saved. Please, try again.'));
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
		$this->Threeg->id = $id;
		if (!$this->Threeg->exists()) {
			throw new NotFoundException(__('Invalid threeg'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Threeg->save($this->request->data)) {
				$this->Session->setFlash(__('The threeg has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The threeg could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Threeg->read(null, $id);
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
		$this->Threeg->id = $id;
		if (!$this->Threeg->exists()) {
			throw new NotFoundException(__('Invalid threeg'));
		}
		if ($this->Threeg->delete()) {
			$this->Session->setFlash(__('Threeg deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Threeg was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
