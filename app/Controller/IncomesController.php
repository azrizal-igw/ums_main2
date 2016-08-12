<?php
App::uses('AppController', 'Controller');
/**
 * Incomes Controller
 *
 * @property Income $Income
 */
class IncomesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Income->recursive = 0;
		$this->set('incomes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Income->id = $id;
		if (!$this->Income->exists()) {
			throw new NotFoundException(__('Invalid income'));
		}
		$this->set('income', $this->Income->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Income->create();
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
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
		$this->Income->id = $id;
		if (!$this->Income->exists()) {
			throw new NotFoundException(__('Invalid income'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Income->save($this->request->data)) {
				$this->Session->setFlash(__('The income has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The income could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Income->read(null, $id);
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
		$this->Income->id = $id;
		if (!$this->Income->exists()) {
			throw new NotFoundException(__('Invalid income'));
		}
		if ($this->Income->delete()) {
			$this->Session->setFlash(__('Income deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Income was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
