<?php
App::uses('AppController', 'Controller');
/**
 * Fixlines Controller
 *
 * @property Fixline $Fixline
 */
class FixlinesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Fixline->recursive = 0;
		$this->set('fixlines', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Fixline->id = $id;
		if (!$this->Fixline->exists()) {
			throw new NotFoundException(__('Invalid fixline'));
		}
		$this->set('fixline', $this->Fixline->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Fixline->create();
			if ($this->Fixline->save($this->request->data)) {
				$this->Session->setFlash(__('The fixline has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fixline could not be saved. Please, try again.'));
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
		$this->Fixline->id = $id;
		if (!$this->Fixline->exists()) {
			throw new NotFoundException(__('Invalid fixline'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Fixline->save($this->request->data)) {
				$this->Session->setFlash(__('The fixline has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The fixline could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Fixline->read(null, $id);
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
		$this->Fixline->id = $id;
		if (!$this->Fixline->exists()) {
			throw new NotFoundException(__('Invalid fixline'));
		}
		if ($this->Fixline->delete()) {
			$this->Session->setFlash(__('Fixline deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Fixline was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
