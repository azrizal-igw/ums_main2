<?php
App::uses('AppController', 'Controller');
/**
 * ChemicalsActivities Controller
 *
 * @property ChemicalsActivity $ChemicalsActivity
 */
class ChemicalsActivitiesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChemicalsActivity->recursive = 0;
		$this->set('chemicalsActivities', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ChemicalsActivity->exists($id)) {
			throw new NotFoundException(__('Invalid chemicals activity'));
		}
		$options = array('conditions' => array('ChemicalsActivity.' . $this->ChemicalsActivity->primaryKey => $id));
		$this->set('chemicalsActivity', $this->ChemicalsActivity->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChemicalsActivity->create();
			if ($this->ChemicalsActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The chemicals activity has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemicals activity could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$chemicals = $this->ChemicalsActivity->Chemical->find('list');
		$activities = $this->ChemicalsActivity->Activity->find('list');
		$this->set(compact('chemicals', 'activities'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ChemicalsActivity->exists($id)) {
			throw new NotFoundException(__('Invalid chemicals activity'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChemicalsActivity->save($this->request->data)) {
				$this->Session->setFlash(__('The chemicals activity has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemicals activity could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ChemicalsActivity.' . $this->ChemicalsActivity->primaryKey => $id));
			$this->request->data = $this->ChemicalsActivity->find('first', $options);
		}
		$chemicals = $this->ChemicalsActivity->Chemical->find('list');
		$activities = $this->ChemicalsActivity->Activity->find('list');
		$this->set(compact('chemicals', 'activities'));
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
		$this->ChemicalsActivity->id = $id;
		if (!$this->ChemicalsActivity->exists()) {
			throw new NotFoundException(__('Invalid chemicals activity'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ChemicalsActivity->delete()) {
			$this->Session->setFlash(__('Chemicals activity deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chemicals activity was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
