<?php
App::uses('AppController', 'Controller');
/**
 * Districts Controller
 *
 * @property District $District
 */
class DistrictsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->District->recursive = 0;
		$this->set('districts', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->District->id = $id;
		if (!$this->District->exists()) {
			throw new NotFoundException(__('Invalid district'));
		}
		$this->set('district', $this->District->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->District->create();
			if ($this->District->save($this->request->data)) {
				$this->Session->setFlash(__('The district has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The district could not be saved. Please, try again.'));
			}
		}
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->District->id = $id;
		if (!$this->District->exists()) {
			throw new NotFoundException(__('Invalid district'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->District->save($this->request->data)) {
				$this->Session->setFlash(__('The district has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The district could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->District->read(null, $id);
		}
		$states = $this->District->State->find('list');
		$this->set(compact('states'));
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
		$this->District->id = $id;
		if (!$this->District->exists()) {
			throw new NotFoundException(__('Invalid district'));
		}
		if ($this->District->delete()) {
			$this->Session->setFlash(__('District deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('District was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
