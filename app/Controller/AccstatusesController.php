<?php
App::uses('AppController', 'Controller');
/**
 * Accstatuses Controller
 *
 * @property Accstatus $Accstatus
 */
class AccstatusesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Accstatus->recursive = 0;
		$this->set('accstatuses', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Accstatus->id = $id;
		if (!$this->Accstatus->exists()) {
			throw new NotFoundException(__('Invalid accstatus'));
		}
		$this->set('accstatus', $this->Accstatus->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accstatus->create();
			if ($this->Accstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The accstatus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accstatus could not be saved. Please, try again.'));
			}
		}
		$accstatustitles = $this->Accstatus->Accstatustitle->find('list');
		$this->set(compact('accstatustitles'));
	}

/**
 * 	$this->layout = false;
        $this->Accstatus->id = $id;
		if (!$this->Accstatus->exists()) {
			throw new NotFoundException(__('Invalid accstatus'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The accstatus has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accstatus could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accstatus->read(null, $id);
		}
		$accstatustitles = $this->Accstatus->Accstatustitle->find('list');
		$this->set(compact('accstatustitles'));
	}
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($sitecode = null,$transmonth = null ) {
		$this->layout = false;
        
        $this->Accstatus->contain();
        $existId = $this->Accstatus->find('all',array('conditions'=>array('Accstatus.sitecode'=>$sitecode,'Accstatus.transmonth'=>$transmonth)));
        //pr($existId);
        
        if(sizeof($existId) > 0) {
            $id = $existId[0]['Accstatus']['id'];
            $this->Accstatus->id = $id;
    		if (!$this->Accstatus->exists()) {
    			throw new NotFoundException(__('Invalid accstatus'));
    		}
    		if ($this->request->is('post') || $this->request->is('put')) {
    			if ($this->Accstatus->save($this->request->data)) {
    				$this->Session->setFlash(__('The accstatus has been saved'));
    				$this->redirect(array('action' => 'index'));
    			} else {
    				$this->Session->setFlash(__('The accstatus could not be saved. Please, try again.'));
    			}
    		} else {
    			$this->request->data = $this->Accstatus->read(null, $id);
                $this->request->data['Accstatus']['accstatustitle_id'] = 2;
    		}
        }else {
            $this->request->data['Accstatus']['sitecode'] = $sitecode;
            $this->request->data['Accstatus']['transmonth'] = $transmonth;
            $this->request->data['Accstatus']['accstatustitle_id'] = 2;
        }
		$accstatustitles = $this->Accstatus->Accstatustitle->find('list');
		$this->set(compact('accstatustitles'));
	}
    /*
     * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function editJson( ) {
		$this->layout = false;
        
        
		
		if ($this->request->is('post') || $this->request->is('put')) {
		  if ($this->Accstatus->save($this->request->data)) {
				$this->Session->setFlash(__('The accstatus has been saved'));
				$this->redirect(array('action' => 'index'));
 			} else {
				$this->Session->setFlash(__('The accstatus could not be saved. Please, try again.'));
 			}
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
		$this->Accstatus->id = $id;
		if (!$this->Accstatus->exists()) {
			throw new NotFoundException(__('Invalid accstatus'));
		}
		if ($this->Accstatus->delete()) {
			$this->Session->setFlash(__('Accstatus deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accstatus was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
