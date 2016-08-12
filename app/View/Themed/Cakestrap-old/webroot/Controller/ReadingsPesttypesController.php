<?php
App::uses('AppController', 'Controller');
/**
 * ReadingsPesttypes Controller
 *
 * @property ReadingsPesttype $ReadingsPesttype
 */
class ReadingsPesttypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ReadingsPesttype->recursive = 0;
		$this->set('readingsPesttypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ReadingsPesttype->exists($id)) {
			throw new NotFoundException(__('Invalid readings pesttype'));
		}
		$options = array('conditions' => array('ReadingsPesttype.' . $this->ReadingsPesttype->primaryKey => $id));
		$this->set('readingsPesttype', $this->ReadingsPesttype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
            $this->layout = false;
		if ($this->request->is('post')) {
			$this->ReadingsPesttype->create();
			if ($this->ReadingsPesttype->save($this->request->data)) {
				//$this->Session->setFlash(__('The readings pesttype has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
                            $this->autoRender = false;
			} else {
				$this->Session->setFlash(__('The readings pesttype could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
                    $readings = $this->ReadingsPesttype->Reading->find('list');
                    $pesttypes = $this->ReadingsPesttype->Pesttype->find('list');
                    $jobs = $this->ReadingsPesttype->Job->find('list');
                    $this->set(compact('readings', 'pesttypes', 'jobs'));
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
		if (!$this->ReadingsPesttype->exists($id)) {
			throw new NotFoundException(__('Invalid readings pesttype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ReadingsPesttype->save($this->request->data)) {
				$this->Session->setFlash(__('The readings pesttype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The readings pesttype could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ReadingsPesttype.' . $this->ReadingsPesttype->primaryKey => $id));
			$this->request->data = $this->ReadingsPesttype->find('first', $options);
		}
		$readings = $this->ReadingsPesttype->Reading->find('list');
		$pesttypes = $this->ReadingsPesttype->Pesttype->find('list');
		$jobs = $this->ReadingsPesttype->Job->find('list');
		$this->set(compact('readings', 'pesttypes', 'jobs'));
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
		$this->ReadingsPesttype->id = $id;
		if (!$this->ReadingsPesttype->exists()) {
			throw new NotFoundException(__('Invalid readings pesttype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ReadingsPesttype->delete()) {
			$this->Session->setFlash(__('Readings pesttype deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Readings pesttype was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
