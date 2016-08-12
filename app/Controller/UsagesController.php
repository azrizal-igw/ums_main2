<?php
App::uses('AppController', 'Controller');
/**
 * Usages Controller
 *
 * @property Usage $Usage
 */
class UsagesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index($sitecode = null) {
		$this->Usage->recursive = 0;
		$sitecode = trim($this->Session->read('Site.sitecode'));
		$conditions = array();
		$conditions['Usage.sitecode'] = $sitecode; 

		// when triggering search button
		if ($this->request->data) {
			$this->Session->write('usage_searching',$this->request->data);
		} 		
		else if ($this->Session->read('usage_searching')) {
			$this->request->data = $this->Session->read('usage_searching');
		}

 		// clear the session searching
		if (isset($this->request->data['Usage']['reset'])) {	
            $this->Session->delete('usage_searching');
            $this->request->data = null;
		}  		

		if (isset($_SESSION['usage_searching'])) {
			// search icno
			if ($this->request->data['Usage']['icno'] != null) {
				$conditions['Usage.icno like'] = "%".$this->request->data['Usage']['icno']."%";
			}
			// search service type
			if ($this->request->data['Usage']['service_id'] != null) {
				$conditions['Usage.service_id ='] = $this->request->data['Usage']['service_id'];
			}
			// search start and end date
			$starttime = $this->request->data['Usage']['transdate_from']['year']."-".$this->request->data['Usage']['transdate_from']['month']."-".$this->request->data['Usage']['transdate_from']['day']." ";
			$endtime = $this->request->data['Usage']['transdate_to']['year']."-".$this->request->data['Usage']['transdate_to']['month']."-".$this->request->data['Usage']['transdate_to']['day']." ";
			$this->Session->write('start', $starttime);
			$this->Session->write('end', $endtime);
			if ($this->Session->read('start')){
				$conditions['date_format(Usage.transdate, "%Y-%m-%d") >='] = $this->Session->read('start');
				$conditions['date_format(Usage.transdate, "%Y-%m-%d") <='] = $this->Session->read('end');
			} 
			else {
				$conditions['date_format(Usage.transdate, "%Y-%m-%d") >='] = date('Y-m-d');
				$conditions['date_format(Usage.transdate, "%Y-%m-%d") <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
			}				
		}

		// pr($this->request->data); die();
		// pr($conditions); die();

 	    $this->paginate = array(
 	    	'conditions' => $conditions,
	    	'order' => array('Usage.id' => 'DESC'),
	        'limit' => 20
	    );		
 	    
		$usages = $this->paginate();
		$services = $this->Usage->Service->find('list', array('order' => array('Service.name' => 'ASC')));
		$this->set(compact('usages', 'services', 'sitecode'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Usage->id = $id;
		if (!$this->Usage->exists()) {
			throw new NotFoundException(__('Invalid usage'));
		}
		$this->set('usage', $this->Usage->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Usage->create();
			if ($this->Usage->save($this->request->data)) {
				$this->Session->setFlash(__('The usage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usage could not be saved. Please, try again.'));
			}
		}
		$services = $this->Usage->Service->find('list');
		$this->set(compact('services'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Usage->id = $id;
		if (!$this->Usage->exists()) {
			throw new NotFoundException(__('Invalid usage'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usage->save($this->request->data)) {
				$this->Session->setFlash(__('The usage has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The usage could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Usage->read(null, $id);
		}
		$services = $this->Usage->Service->find('list');
		$this->set(compact('services'));
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
		$this->Usage->id = $id;
		if (!$this->Usage->exists()) {
			throw new NotFoundException(__('Invalid usage'));
		}
		if ($this->Usage->delete()) {
			$this->Session->setFlash(__('Usage deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Usage was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
