<?php
App::uses('AppController', 'Controller');
/**
 * Races Controller
 *
 * @property Race $Race
 */
class RacesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Race->recursive = 0;
		$this->set('races', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Race->id = $id;
		if (!$this->Race->exists()) {
			throw new NotFoundException(__('Invalid race'));
		}
		$this->set('race', $this->Race->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Race->create();
			if ($this->Race->save($this->request->data)) {
				$this->Session->setFlash(__('The race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race could not be saved. Please, try again.'));
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
		$this->Race->id = $id;
		if (!$this->Race->exists()) {
			throw new NotFoundException(__('Invalid race'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Race->save($this->request->data)) {
				$this->Session->setFlash(__('The race has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The race could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Race->read(null, $id);
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
		$this->Race->id = $id;
		if (!$this->Race->exists()) {
			throw new NotFoundException(__('Invalid race'));
		}
		if ($this->Race->delete()) {
			$this->Session->setFlash(__('Race deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Race was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
