<?php
App::uses('AppController', 'Controller');
/**
 * UserdetailsTrainings Controller
 *
 * @property UserdetailsTraining $UserdetailsTraining
 */
class UserdetailsTrainingsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->UserdetailsTraining->recursive = 0;
		$this->set('userdetailsTrainings', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->UserdetailsTraining->id = $id;
		if (!$this->UserdetailsTraining->exists()) {
			throw new NotFoundException(__('Invalid userdetails training'));
		}
		$this->set('userdetailsTraining', $this->UserdetailsTraining->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->UserdetailsTraining->create();
			if ($this->UserdetailsTraining->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetails training has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetails training could not be saved. Please, try again.'));
			}
		}
		$trainings = $this->UserdetailsTraining->Training->find('list');
		$userdetails = $this->UserdetailsTraining->Userdetail->find('list');
		$users = $this->UserdetailsTraining->User->find('list');
		$this->set(compact('trainings', 'userdetails', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->UserdetailsTraining->id = $id;
		if (!$this->UserdetailsTraining->exists()) {
			throw new NotFoundException(__('Invalid userdetails training'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->UserdetailsTraining->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetails training has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetails training could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->UserdetailsTraining->read(null, $id);
		}
		$trainings = $this->UserdetailsTraining->Training->find('list');
		$userdetails = $this->UserdetailsTraining->Userdetail->find('list');
		$users = $this->UserdetailsTraining->User->find('list');
		$this->set(compact('trainings', 'userdetails', 'users'));
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
		$this->UserdetailsTraining->id = $id;
		if (!$this->UserdetailsTraining->exists()) {
			throw new NotFoundException(__('Invalid userdetails training'));
		}
		if ($this->UserdetailsTraining->delete()) {
			$this->Session->setFlash(__('Userdetails training deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Userdetails training was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
