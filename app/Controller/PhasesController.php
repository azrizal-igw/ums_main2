<?php
App::uses('AppController', 'Controller');
/**
 * Phases Controller
 *
 * @property Phase $Phase
 */
class PhasesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Phase->recursive = 0;
		$this->set('phases', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Phase->id = $id;
		if (!$this->Phase->exists()) {
			throw new NotFoundException(__('Invalid phase'));
		}
		$this->set('phase', $this->Phase->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Phase->create();
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'));
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
		$this->Phase->id = $id;
		if (!$this->Phase->exists()) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Phase->save($this->request->data)) {
				$this->Session->setFlash(__('The phase has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The phase could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Phase->read(null, $id);
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
		$this->Phase->id = $id;
		if (!$this->Phase->exists()) {
			throw new NotFoundException(__('Invalid phase'));
		}
		if ($this->Phase->delete()) {
			$this->Session->setFlash(__('Phase deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Phase was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
