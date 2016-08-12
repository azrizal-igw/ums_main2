<?php
App::uses('AppController', 'Controller');
/**
 * Pesttypes Controller
 *
 * @property Pesttype $Pesttype
 */
class PesttypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pesttype->recursive = 0;
		$this->set('pesttypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pesttype->exists($id)) {
			throw new NotFoundException(__('Invalid pesttype'));
		}
		$options = array('conditions' => array('Pesttype.' . $this->Pesttype->primaryKey => $id));
		$this->set('pesttype', $this->Pesttype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Pesttype->create();
			if ($this->Pesttype->save($this->request->data)) {
				$this->Session->setFlash(__('The pesttype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pesttype could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$readings = $this->Pesttype->Reading->find('list');
		$this->set(compact('readings'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Pesttype->exists($id)) {
			throw new NotFoundException(__('Invalid pesttype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Pesttype->save($this->request->data)) {
				$this->Session->setFlash(__('The pesttype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The pesttype could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Pesttype.' . $this->Pesttype->primaryKey => $id));
			$this->request->data = $this->Pesttype->find('first', $options);
		}
		$readings = $this->Pesttype->Reading->find('list');
		$this->set(compact('readings'));
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
		$this->Pesttype->id = $id;
		if (!$this->Pesttype->exists()) {
			throw new NotFoundException(__('Invalid pesttype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pesttype->delete()) {
			$this->Session->setFlash(__('Pesttype deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pesttype was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
