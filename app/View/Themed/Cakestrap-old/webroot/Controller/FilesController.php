<?php
App::uses('AppController', 'Controller');
/**
 * Files Controller
 *
 * @property File $File
 */
class FilesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->File->recursive = 0;
		$this->set('files', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->File->exists($id)) {
			throw new NotFoundException(__('Invalid file'));
		}
		$options = array('conditions' => array('File.' . $this->File->primaryKey => $id));
		$this->set('file', $this->File->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->File->create();
			if ($this->File->save($this->request->data)) {
				$this->Session->setFlash(__('The file has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The file could not be saved. Please, try again.'), 'flash/error');
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
		if (!$this->File->exists($id)) {
			throw new NotFoundException(__('Invalid file'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->File->save($this->request->data)) {
				$this->Session->setFlash(__('The file has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The file could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('File.' . $this->File->primaryKey => $id));
			$this->request->data = $this->File->find('first', $options);
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
		$this->File->id = $id;
		if (!$this->File->exists()) {
			throw new NotFoundException(__('Invalid file'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->File->delete()) {
			$this->Session->setFlash(__('File deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('File was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
