<?php
App::uses('AppController', 'Controller');
/**
 * ReadingsPests Controller
 *
 * @property ReadingsPest $ReadingsPest
 */
class ReadingsPestsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ReadingsPest->recursive = 0;
		$this->set('readingsPests', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReadingsPest->exists($id)) {
			throw new NotFoundException(__('Invalid readings pest'));
		}
		$options = array('conditions' => array('ReadingsPest.' . $this->ReadingsPest->primaryKey => $id));
		$this->set('readingsPest', $this->ReadingsPest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ReadingsPest->create();
			if ($this->ReadingsPest->save($this->request->data)) {
				$this->Session->setFlash(__('The readings pest has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The readings pest could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$readings = $this->ReadingsPest->Reading->find('list');
		$pests = $this->ReadingsPest->Pest->find('list');
		$jobs = $this->ReadingsPest->Job->find('list');
		$projects = $this->ReadingsPest->Project->find('list');
		$pesttypes = $this->ReadingsPest->Pesttype->find('list');
		$this->set(compact('readings', 'pests', 'jobs', 'projects', 'pesttypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ReadingsPest->exists($id)) {
			throw new NotFoundException(__('Invalid readings pest'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReadingsPest->save($this->request->data)) {
				$this->Session->setFlash(__('The readings pest has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The readings pest could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ReadingsPest.' . $this->ReadingsPest->primaryKey => $id));
			$this->request->data = $this->ReadingsPest->find('first', $options);
		}
		$readings = $this->ReadingsPest->Reading->find('list');
		$pests = $this->ReadingsPest->Pest->find('list');
		$jobs = $this->ReadingsPest->Job->find('list');
		$projects = $this->ReadingsPest->Project->find('list');
		$pesttypes = $this->ReadingsPest->Pesttype->find('list');
		$this->set(compact('readings', 'pests', 'jobs', 'projects', 'pesttypes'));
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
		$this->ReadingsPest->id = $id;
		if (!$this->ReadingsPest->exists()) {
			throw new NotFoundException(__('Invalid readings pest'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReadingsPest->delete()) {
			$this->Session->setFlash(__('Readings pest deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Readings pest was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
