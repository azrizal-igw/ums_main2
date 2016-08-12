<?php
App::uses('AppController', 'Controller');
/**
 * ChemicalsActivitytypes Controller
 *
 * @property ChemicalsActivitytype $ChemicalsActivitytype
 */
class ChemicalsActivitytypesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->ChemicalsActivitytype->recursive = 0;
		$this->set('chemicalsActivitytypes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->ChemicalsActivitytype->exists($id)) {
			throw new NotFoundException(__('Invalid chemicals activitytype'));
		}
		$options = array('conditions' => array('ChemicalsActivitytype.' . $this->ChemicalsActivitytype->primaryKey => $id));
		$this->set('chemicalsActivitytype', $this->ChemicalsActivitytype->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->ChemicalsActivitytype->create();
			if ($this->ChemicalsActivitytype->save($this->request->data)) {
				$this->Session->setFlash(__('The chemicals activitytype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemicals activitytype could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$chemicals = $this->ChemicalsActivitytype->Chemical->find('list');
		$activitytypes = $this->ChemicalsActivitytype->Activitytype->find('list');
		$this->set(compact('chemicals', 'activitytypes'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->ChemicalsActivitytype->exists($id)) {
			throw new NotFoundException(__('Invalid chemicals activitytype'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->ChemicalsActivitytype->save($this->request->data)) {
				$this->Session->setFlash(__('The chemicals activitytype has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The chemicals activitytype could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('ChemicalsActivitytype.' . $this->ChemicalsActivitytype->primaryKey => $id));
			$this->request->data = $this->ChemicalsActivitytype->find('first', $options);
		}
		$chemicals = $this->ChemicalsActivitytype->Chemical->find('list');
		$activitytypes = $this->ChemicalsActivitytype->Activitytype->find('list');
		$this->set(compact('chemicals', 'activitytypes'));
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
		$this->ChemicalsActivitytype->id = $id;
		if (!$this->ChemicalsActivitytype->exists()) {
			throw new NotFoundException(__('Invalid chemicals activitytype'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->ChemicalsActivitytype->delete()) {
			$this->Session->setFlash(__('Chemicals activitytype deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Chemicals activitytype was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
