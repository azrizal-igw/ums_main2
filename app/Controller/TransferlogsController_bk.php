<?php
App::uses('AppController', 'Controller');
/**
 * Transferlogs Controller
 *
 * @property Transferlog $Transferlog
 */
class TransferlogsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Transferlog->recursive = 0;
		$this->set('transferlogs', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		$this->set('transferlog', $this->Transferlog->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Transferlog->create();
			if ($this->Transferlog->save($this->request->data)) {
				$this->Session->setFlash(__('The transferlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transferlog could not be saved. Please, try again.'));
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
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Transferlog->save($this->request->data)) {
				$this->Session->setFlash(__('The transferlog has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The transferlog could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Transferlog->read(null, $id);
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
		$this->Transferlog->id = $id;
		if (!$this->Transferlog->exists()) {
			throw new NotFoundException(__('Invalid transferlog'));
		}
		if ($this->Transferlog->delete()) {
			$this->Session->setFlash(__('Transferlog deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Transferlog was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
