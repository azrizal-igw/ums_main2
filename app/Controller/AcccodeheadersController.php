<?php
App::uses('AppController', 'Controller');
/**
 * Acccodeheaders Controller
 *
 * @property Acccodeheader $Acccodeheader
 */
class AcccodeheadersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Acccodeheader->recursive = 0;
		$this->set('acccodeheaders', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Acccodeheader->id = $id;
		if (!$this->Acccodeheader->exists()) {
			throw new NotFoundException(__('Invalid acccodeheader'));
		}
		$this->set('acccodeheader', $this->Acccodeheader->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Acccodeheader->create();
			if ($this->Acccodeheader->save($this->request->data)) {
				$this->Session->setFlash(__('The acccodeheader has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acccodeheader could not be saved. Please, try again.'));
			}
		}
		$acccodes = $this->Acccodeheader->Acccode->find('list');
		$this->set(compact('acccodes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Acccodeheader->id = $id;
		if (!$this->Acccodeheader->exists()) {
			throw new NotFoundException(__('Invalid acccodeheader'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Acccodeheader->save($this->request->data)) {
				$this->Session->setFlash(__('The acccodeheader has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acccodeheader could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Acccodeheader->read(null, $id);
		}
		$acccodes = $this->Acccodeheader->Acccode->find('list');
		$this->set(compact('acccodes'));
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
		$this->Acccodeheader->id = $id;
		if (!$this->Acccodeheader->exists()) {
			throw new NotFoundException(__('Invalid acccodeheader'));
		}
		if ($this->Acccodeheader->delete()) {
			$this->Session->setFlash(__('Acccodeheader deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acccodeheader was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
