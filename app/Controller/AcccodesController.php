<?php
App::uses('AppController', 'Controller');
/**
 * Acccodes Controller
 *
 * @property Acccode $Acccode
 */
class AcccodesController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Acccode->recursive = 0;
		$this->set('acccodes', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Acccode->id = $id;
		if (!$this->Acccode->exists()) {
			throw new NotFoundException(__('Invalid acccode'));
		}
		$this->set('acccode', $this->Acccode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Acccode->create();
			if ($this->Acccode->save($this->request->data)) {
				$this->Session->setFlash(__('The acccode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acccode could not be saved. Please, try again.'));
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
		$this->Acccode->id = $id;
		if (!$this->Acccode->exists()) {
			throw new NotFoundException(__('Invalid acccode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Acccode->save($this->request->data)) {
				$this->Session->setFlash(__('The acccode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The acccode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Acccode->read(null, $id);
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
		$this->Acccode->id = $id;
		if (!$this->Acccode->exists()) {
			throw new NotFoundException(__('Invalid acccode'));
		}
		if ($this->Acccode->delete()) {
			$this->Session->setFlash(__('Acccode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Acccode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
