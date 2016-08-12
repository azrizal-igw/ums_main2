<?php
App::uses('AppController', 'Controller');
/**
 * Pests Controller
 *
 * @property Pest $Pest
 */
class PestsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Pest->recursive = 0;
		$this->set('pests', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Pest->exists($id)) {
			throw new NotFoundException(__('Invalid pest'));
		}
		$options = array('conditions' => array('Pest.' . $this->Pest->primaryKey => $id));
		$this->set('pest', $this->Pest->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
        $this->layout = false;
		if ($this->request->is('post')) {
		  $this->autoRender = false;
			$this->Pest->create();
			if ($this->Pest->save($this->request->data)) {
				//$this->Session->setFlash(__('The pest has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The pest could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
		  
          $readings = $this->Pest->Reading->find('list');
		  $this->set(compact('readings'));
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
        $this->layout = false;
		if (!$this->Pest->exists($id)) {
			throw new NotFoundException(__('Invalid pest'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->autoRender = false;
            if ($this->Pest->save($this->request->data)) {
				//$this->Session->setFlash(__('The pest has been saved'), 'flash/success');
			//	$this->redirect(array('action' => 'index'));
			} else {
			//	$this->Session->setFlash(__('The pest could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Pest.' . $this->Pest->primaryKey => $id));
			$this->request->data = $this->Pest->find('first', $options);

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
		$this->Pest->id = $id;
		if (!$this->Pest->exists()) {
			throw new NotFoundException(__('Invalid pest'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Pest->delete()) {
			$this->Session->setFlash(__('Pest deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Pest was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
