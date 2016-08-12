<?php
App::uses('AppController', 'Controller');
/**
 * Promotions Controller
 *
 * @property Promotion $Promotion
 */
class PromotionsController extends AppController {
	public $helpers = array('PhpExcel');  
/**
 * index method
 *
 * @return void
 */
	public function index($sitecode = null) {
//	Configure::write('debug',2);
		if($this->request->data) {
				$this->Session->write('Promotion_searching',$this->request->data);
		} else if($this->Session->read('Promotion_searching')) {
				$this->request->data= $this->Session->read('Promotion_searching');
				
		}
	
			//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Promotion_searching']);	
			$this->data = null;
		}
//		pr($this->request->data);
		if (isset($_SESSION['Promotion_searching'])) {
			
			$starttime=$this->request->data['Promotion']['eventdate1']['year']."-".$this->request->data['Promotion']['eventdate1']['month']."-".$this->request->data['Promotion']['eventdate1']['day'];
			$endtime=$this->request->data['Promotion']['eventdate2']['year']."-".$this->request->data['Promotion']['eventdate2']['month']."-".$this->request->data['Promotion']['eventdate2']['day'];
			
			$this->Session->write('start',$starttime);
			$this->Session->write('end',$endtime);
			
			if ($this->Session->read('start')){
				$conditions['Promotion.eventdate >='] = $this->Session->read('start');
				$conditions['Promotion.eventdate <='] = $this->Session->read('end');
			} 
			//else {
			//	$conditions['Promotion.eventdate >='] = date('Y-m-d h:i:s');
			//	$conditions['Promotion.eventdate <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
			//}
			
			if ( $this->request->data['Promotion']['name'] != null){
			$conditions['Promotion.name like'] =  "%".$this->request->data['Promotion']['name']."%";
			}
		}
		
		$conditions['Promotion.sitecode'] = $this->Session->read('Site.sitecode'); //admin
		$promotions=$this->paginate($conditions);
		$promotions= Set::sort($promotions, '{n}.Promotion.eventdate', 'desc'); // sort by Training.StartTime
		$this->set(compact('promotions'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
      
		$this->set('promotion', $this->Promotion->read(null, $id));
	}

	public function generateexcel() {
	Configure::write('debug',2);
		$this->Promotion->recursive = -1;
		$promotions = $this->Promotion->find('all');
		
		//pr($promotions);
		$this->set(compact('promotions'));
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Promotion->create();
			$this->request->data['Promotion']['sitecode'] = $this->Auth->user('sitecode');
			$this->request->data['Promotion']['user_id'] = $this->Auth->user('id');
			if ($this->Promotion->save($this->request->data)) {
				$this->Session->setFlash(__('The promotion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		}
		$targets = $this->Promotion->Target->find('list');
		$users = $this->Promotion->User->find('list');
		$this->set(compact('targets', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		$this->request->data['Promotion']['user_id'] = $this->Auth->user('id');
			if ($this->Promotion->save($this->request->data)) {
				$this->Session->setFlash(__('The promotion has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promotion could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Promotion->read(null, $id);
		}
		$targets = $this->Promotion->Target->find('list');
		$users = $this->Promotion->User->find('list');
		$this->set(compact('targets', 'users'));
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
		$this->Promotion->id = $id;
		if (!$this->Promotion->exists()) {
			throw new NotFoundException(__('Invalid promotion'));
		}
		if ($this->Promotion->delete()) {
			$this->Session->setFlash(__('Promotion deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Promotion was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
