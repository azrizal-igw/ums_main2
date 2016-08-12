<?php
App::uses('AppController', 'Controller');
/**
 * Receipts Controller
 *
 * @property Receipt $Receipt
 */
class ReceiptsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index($sitecode=null) {

		if($this->request->data) {
			$this->Session->write('Receipt_searching',$this->request->data);
		} 
		else if($this->Session->read('Receipt_searching')) {
			$this->request->data= $this->Session->read('Receipt_searching');
		}
		
		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Receipt_searching']);	
			$this->data = null;
		}

		if (isset($_SESSION['Receipt_searching'])) {
			// if ($this->request->is('post')) {
			$bill_time1=$this->request->data['Receipt']['bill_time1']['year']."-".$this->request->data['Receipt']['bill_time1']['month']."-".$this->request->data['Receipt']['bill_time1']['day']." ".$this->request->data['Receipt']['bill_time1']['hour'].":".$this->request->data['Receipt']['bill_time1']['min'].":00";
			$bill_time2=$this->request->data['Receipt']['bill_time2']['year']."-".$this->request->data['Receipt']['bill_time2']['month']."-".$this->request->data['Receipt']['bill_time2']['day']." ".$this->request->data['Receipt']['bill_time2']['hour'].":".$this->request->data['Receipt']['bill_time2']['min'].":00";

			$conditions['Receipt.bill_time >='] = $bill_time1;
			$conditions['Receipt.bill_time <='] = $bill_time2;
			
			if ($this->request->data['Receipt']['icno'] != null) {
				$conditions['Receipt.icno like'] =  "%".$this->request->data['Receipt']['icno']."%";
			}
			if ($this->request->data['Receipt']['receiptno'] != null){
				$conditions['Receipt.receiptno like'] =  "%".$this->request->data['Receipt']['receiptno']."%";
			}
		}		
		$conditions['Receipt.sitecode'] = $this->Session->read('Site.sitecode');

		// $receipts = $this->paginate($conditions);
		$order['Receipt.bill_time'] = 'DESC'; 
		$this->paginate = array(
			'Receipt' => array(
				'fields' => array(
					'Receipt.id',
					'Receipt.receiptno',
					'Receipt.icno',
					'Receipt.browsing_time_start',
					'Receipt.bill_time',
					'Receipt.charge',
					'Receipt.paid',
					'Receipt.acct',
					'Receipt.note',
					'Receipt.sitecode',
					'Receipt.created',
					'Receipt.modified',
				),
				'conditions' => $conditions,
				'order' => $order,
				'limit' => 20
			)
		);
		$receipts = $this->paginate('Receipt');
		$sitecode = trim($this->Session->read('Site.sitecode'));
		$this->set(compact('receipts', 'sitecode'));	
	}



	/**
	 * view method
	 *
	 * @param string $id
	 * @return void
	 */


	public function view($id = null) {
		$this->Receipt->id = $id;
		if (!$this->Receipt->exists()) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		$this->set('receipt', $this->Receipt->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Receipt->create();
			if ($this->Receipt->save($this->request->data)) {
				$this->Session->setFlash(__('The receipt has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The receipt could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Receipt->id = $id;
		if (!$this->Receipt->exists()) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Receipt->save($this->request->data)) {
				$this->Session->setFlash(__('The receipt has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The receipt could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Receipt->read(null, $id);
		}
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
		$this->Receipt->id = $id;
		if (!$this->Receipt->exists()) {
			throw new NotFoundException(__('Invalid receipt'));
		}
		if ($this->Receipt->delete()) {
			$this->Session->setFlash(__('Receipt deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Receipt was not deleted'));
		$this->redirect(array('action' => 'index'));
	}



/**
 * calculate method
 *
 * @param string $sitecode
 * @param date transdate_start 
 * @param date transdate_end , ex:20121201
 * @return $sum_paid
 */
	public function calculate($sitecode = null , $transdate_start = null, $transdate_end = null) {
		
		$transdate_start = date('Y-m-d',strtotime($transdate_start));
		$transdate_end = date('Y-m-d',strtotime($transdate_end));
		
		$receipts = $this->Receipt->find('list',array('fields'=>'Receipt.paid','conditions'=>array("Receipt.bill_time  BETWEEN '".$transdate_start."' and '".$transdate_end ."'",'Receipt.sitecode'=>$sitecode)));
		$sum_paid = 0;
		foreach ($receipts as $id=>$receipt) {
			$sum_paid += $receipt;
		}
		
		return $sum_paid;
	}

}