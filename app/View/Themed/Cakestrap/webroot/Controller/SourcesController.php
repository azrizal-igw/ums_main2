<?php
App::uses('AppController', 'Controller');
/**
 * Sources Controller
 *
 * @property Source $Source
 */
class SourcesController extends AppController {
public function beforeFilter() {
    parent::beforeFilter();

    // For CakePHP 2.0
   //$this->Auth->allow('add');

    // For CakePHP 2.1 and up
    $this->Auth->allow('add');
}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Source->recursive = 0;
		$this->set('sources', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Source->exists($id)) {
			throw new NotFoundException(__('Invalid source'));
		}
		$options = array('conditions' => array('Source.' . $this->Source->primaryKey => $id));
		$this->set('source', $this->Source->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->autoRender = false;
			$this->Source->create();
            $this->Source->deleteAll(array('Source.model'=>$this->request->data['Detail']['model'],'Source.foreign_key'=>$this->request->data['Detail']['foreign_key'],
                'Source.type'=>array(3,4)
            ));
			if ($this->Source->saveAll($this->request->data['Source'])) {
			//	$this->Session->setFlash(__('The photo has been saved'), 'flash/success');
				//$this->redirect(array('action' => 'index'));
	      	} else {
			//	$this->Session->setFlash(__('The photo could not be saved. Please, try again.'), 'flash/error');
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
		if (!$this->Source->exists($id)) {
			throw new NotFoundException(__('Invalid source'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Source->save($this->request->data)) {
				$this->Session->setFlash(__('The source has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The source could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Source.' . $this->Source->primaryKey => $id));
			$this->request->data = $this->Source->find('first', $options);
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
		$this->Source->id = $id;
		if (!$this->Source->exists()) {
			throw new NotFoundException(__('Invalid source'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Source->delete()) {
			$this->Session->setFlash(__('Source deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Source was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
}
