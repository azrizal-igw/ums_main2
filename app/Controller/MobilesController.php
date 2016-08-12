<?php
App::uses('AppController', 'Controller');
/**
 * Mobiles Controller
 *
 * @property Mobile $Mobile
 */
class MobilesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mobile->recursive = 0;
		$this->set('mobiles', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Mobile->id = $id;
		if (!$this->Mobile->exists()) {
			throw new NotFoundException(__('Invalid mobile'));
		}
		$this->set('mobile', $this->Mobile->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Mobile->create();
			if ($this->Mobile->save($this->request->data)) {
				$this->Session->setFlash(__('The mobile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mobile could not be saved. Please, try again.'));
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
		$this->Mobile->id = $id;
		if (!$this->Mobile->exists()) {
			throw new NotFoundException(__('Invalid mobile'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Mobile->save($this->request->data)) {
				$this->Session->setFlash(__('The mobile has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mobile could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Mobile->read(null, $id);
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
		$this->Mobile->id = $id;
		if (!$this->Mobile->exists()) {
			throw new NotFoundException(__('Invalid mobile'));
		}
		if ($this->Mobile->delete()) {
			$this->Session->setFlash(__('Mobile deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Mobile was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
