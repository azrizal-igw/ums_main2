<?php
App::uses('AppController', 'Controller');
/**
 * Nationalities Controller
 *
 * @property Nationality $Nationality
 */
class NationalitiesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Nationality->recursive = 0;
		$this->set('nationalities', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Nationality->id = $id;
		if (!$this->Nationality->exists()) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		$this->set('nationality', $this->Nationality->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Nationality->create();
			if ($this->Nationality->save($this->request->data)) {
				$this->Session->setFlash(__('The nationality has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nationality could not be saved. Please, try again.'));
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
		$this->Nationality->id = $id;
		if (!$this->Nationality->exists()) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Nationality->save($this->request->data)) {
				$this->Session->setFlash(__('The nationality has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The nationality could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Nationality->read(null, $id);
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
		$this->Nationality->id = $id;
		if (!$this->Nationality->exists()) {
			throw new NotFoundException(__('Invalid nationality'));
		}
		if ($this->Nationality->delete()) {
			$this->Session->setFlash(__('Nationality deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Nationality was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
