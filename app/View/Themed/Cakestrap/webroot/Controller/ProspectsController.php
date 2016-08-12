<?php
App::uses('AppController', 'Controller');
/**
 * Prospects Controller
 *
 * @property Prospect $Prospect
 */
class ProspectsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Prospect->recursive = 0;
		$this->set('prospects', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Prospect->exists($id)) {
			throw new NotFoundException(__('Invalid prospect'));
		}
		$options = array('conditions' => array('Prospect.' . $this->Prospect->primaryKey => $id));
		$this->set('prospect', $this->Prospect->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Prospect->create();
			if ($this->Prospect->save($this->request->data)) {
				$this->Session->setFlash(__('The prospect has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prospect could not be saved. Please, try again.'), 'flash/error');
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
		if (!$this->Prospect->exists($id)) {
			throw new NotFoundException(__('Invalid prospect'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Prospect->save($this->request->data)) {
				$this->Session->setFlash(__('The prospect has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The prospect could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Prospect.' . $this->Prospect->primaryKey => $id));
			$this->request->data = $this->Prospect->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Prospect->id = $id;
		if (!$this->Prospect->exists()) {
			throw new NotFoundException(__('Invalid prospect'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Prospect->delete()) {
			$this->Session->setFlash(__('Prospect deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Prospect was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
