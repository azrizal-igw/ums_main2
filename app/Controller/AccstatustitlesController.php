<?php
App::uses('AppController', 'Controller');
/**
 * Accstatustitles Controller
 *
 * @property Accstatustitle $Accstatustitle
 */
class AccstatustitlesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Accstatustitle->recursive = 0;
		$this->set('accstatustitles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Accstatustitle->id = $id;
		if (!$this->Accstatustitle->exists()) {
			throw new NotFoundException(__('Invalid accstatustitle'));
		}
		$this->set('accstatustitle', $this->Accstatustitle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accstatustitle->create();
			if ($this->Accstatustitle->save($this->request->data)) {
				$this->Session->setFlash(__('The accstatustitle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accstatustitle could not be saved. Please, try again.'));
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
		$this->Accstatustitle->id = $id;
		if (!$this->Accstatustitle->exists()) {
			throw new NotFoundException(__('Invalid accstatustitle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accstatustitle->save($this->request->data)) {
				$this->Session->setFlash(__('The accstatustitle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accstatustitle could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accstatustitle->read(null, $id);
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
		$this->Accstatustitle->id = $id;
		if (!$this->Accstatustitle->exists()) {
			throw new NotFoundException(__('Invalid accstatustitle'));
		}
		if ($this->Accstatustitle->delete()) {
			$this->Session->setFlash(__('Accstatustitle deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accstatustitle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
