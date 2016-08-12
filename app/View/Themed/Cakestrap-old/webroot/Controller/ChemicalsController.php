<?php
App::uses('AppController', 'Controller');
/**
 * Chemicals Controller
 *
 * @property Chemical $Chemical
 */
class ChemicalsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Chemical->recursive = 0;
		$this->set('chemicals', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Chemical->exists($id)) {
			throw new NotFoundException(__('Invalid chemical'));
		}
		$options = array('conditions' => array('Chemical.' . $this->Chemical->primaryKey => $id));
		$this->set('chemical', $this->Chemical->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	   $this->layout = false;
		if ($this->request->is('post')) {
			$this->Chemical->create();
			if ($this->Chemical->save($this->request->data)) {
				$this->Session->setFlash(__('The chemical has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemical could not be saved. Please, try again.'), 'flash/error');
			}
            $this->AutoRender = false;
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
		if (!$this->Chemical->exists($id)) {
			throw new NotFoundException(__('Invalid chemical'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Chemical->save($this->request->data)) {
				$this->Session->setFlash(__('The chemical has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemical could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Chemical.' . $this->Chemical->primaryKey => $id));
			$this->request->data = $this->Chemical->find('first', $options);
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
		$this->Chemical->id = $id;
		if (!$this->Chemical->exists()) {
			throw new NotFoundException(__('Invalid chemical'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Chemical->delete()) {
			$this->Session->setFlash(__('Chemical deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chemical was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
