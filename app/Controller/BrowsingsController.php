<?php
App::uses('AppController', 'Controller');
/**
 * Browsings Controller
 *
 * @property Browsing $Browsing
 */
class BrowsingsController extends AppController {

var $uses = array('Browsing','Receipt');//enable get database like belongto in model
var $paginate = array('limit' => 10 );
 

/**
 * index method
 *
 * @return void
 */
	public function index($sitecode = null) {
		if($this->request->data) {
			$this->Session->write('Browsing_searching',$this->request->data);
		} 
		else if($this->Session->read('Browsing_searching')) {
			$this->request->data= $this->Session->read('Browsing_searching');	
		}
		
		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])) {	
			unset($_SESSION['Browsing_searching']);	
			$this->data = null;
		}
		
		if (isset($_SESSION['Browsing_searching'])) {
			$starttime=$this->request->data['Browsing']['time_start']['year']."-".$this->request->data['Browsing']['time_start']['month']."-".$this->request->data['Browsing']['time_start']['day']." ".$this->request->data['Browsing']['time_start']['hour'].":".$this->request->data['Browsing']['time_start']['min'].":00";
			$endtime=$this->request->data['Browsing']['time_end']['year']."-".$this->request->data['Browsing']['time_end']['month']."-".$this->request->data['Browsing']['time_end']['day']." ".$this->request->data['Browsing']['time_end']['hour'].":".$this->request->data['Browsing']['time_end']['min'].":00";
			$this->Session->write('start',$starttime);
			$this->Session->write('end',$endtime);
			if ($this->Session->read('start')){
				$conditions['Browsing.time_start >='] = $this->Session->read('start');
				$conditions['Browsing.time_end <='] = $this->Session->read('end');
			} 
			else {
				$conditions['Browsing.time_start >='] = date('Y-m-d h:i:s');
				$conditions['Browsing.time_end <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
			}
				
			if ($this->request->data['Browsing']['icno'] != null){
				$conditions['Browsing.icno like'] =  "%".$this->request->data['Browsing']['icno']."%";
			}
		}
		
		// if ($this->Session->read('start')){
			// $conditions['Browsing.time_start >='] = $this->Session->read('start');
			// $conditions['Browsing.time_end <='] = $this->Session->read('end');
		// } else {
			// $conditions['Browsing.time_start >='] = date('Y-m-d h:i:s');
			// $conditions['Browsing.time_end <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
		// }
		
		$conditions['Browsing.sitecode'] = $this->Session->read('Site.sitecode'); //admin


		//	$this->paginate['limit'] = 20;
		// $browsings = $this->paginate($conditions);

		$order['Browsing.time_end'] = 'DESC'; 
		$order['Browsing.id'] = 'DESC';		
		$this->paginate = array(
			'Browsing' => array(
				'fields' => array(
					'Browsing.id', 
					'Browsing.icno',
					'Browsing.pcno',
					'Browsing.rate_per_hour',
					'Browsing.time_start',
					'Browsing.time_end',
					'Browsing.type',
					'Browsing.browse_status',
					'Browsing.acct',
					'Browsing.paid',
					'Browsing.sitecode',
				),
				'conditions' => $conditions,
				'order' => $order,
				'limit' => 20
			)
		);
		$browsings = $this->paginate('Browsing');
		$groups = $this->Auth->User('group_id');
		$sitecode = trim($this->Session->read('Site.sitecode'));
		$this->set(compact('browsings', 'groups', 'sitecode'));			
	}	 
	 
	
	
/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Browsing->id = $id;
		if (!$this->Browsing->exists()) {
			throw new NotFoundException(__('Invalid browsing'));
		}
		$this->set('browsing', $this->Browsing->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
	$this->request->data['Browsing']['sitecode'] = $this->Auth->user('sitecode');
	// $this->request->data['Browsing']['localid']=$this->request->data['Browsing']['id'];
	
   // pr($this->Auth->user('id'));
		if ($this->request->is('post')) {
			//$this->request->data['Browsing']['sitecode'] = $this->Auth->user('sitecode');
			print_r($this->request->data);
			$this->Browsing->create();
			
			if ($this->Browsing->save($this->request->data)) {
			    
				$this->Session->setFlash(__('The browsing has been saved'));
				//to update localid to be same as id
				$lastbrowsingid = $this->Browsing->getLastInsertId();
				$this->Browsing->query('UPDATE browsings SET localid = id WHERE id= '.$lastbrowsingid);
				//to insert receipt information
				$strbilltime = $this->data['Browsing']['bill_time']['year']."-".$this->data['Browsing']['bill_time']['month']."-".$this->data['Browsing']['bill_time']['day']." ".$this->data['Browsing']['bill_time']['hour'].":".$this->data['Browsing']['bill_time']['min'].":00";
				$strtimestart = $this->data['Browsing']['time_start']['year']."-".$this->data['Browsing']['time_start']['month']."-".$this->data['Browsing']['time_start']['day']." ".$this->data['Browsing']['time_start']['hour'].":".$this->data['Browsing']['time_start']['min'].":00";
				$receipts = array('Receipt'=>array('receiptno'=>$this->data['Browsing']['receiptno'],'icno'=>$this->data['Browsing']['icno'],'admindetail_localid'=>$this->Auth->user('id'),'browsing_localid'=>$lastbrowsingid,'browsing_time_start'=>$strtimestart,'bill_time'=>$strbilltime,'charge'=>$this->data['Browsing']['charge'],'paid'=>$this->data['Browsing']['paid'],'acct'=>$this->data['Browsing']['acct'],'note'=>$this->data['Browsing']['note'],'sitecode'=>$this->data['Browsing']['sitecode']));
				$this->Receipt->save($receipts);
				pr($receipts);
				// $strbilltime = $this->data['Browsing']['bill_time']['year']."-".$this->data['Browsing']['bill_time']['month']."-".$this->data['Browsing']['bill_time']['day']." ".$this->data['Browsing']['bill_time']['hour'].":".$this->data['Browsing']['bill_time']['min'].":00";
				// $strtimestart = $this->data['Browsing']['time_start']['year']."-".$this->data['Browsing']['time_start']['month']."-".$this->data['Browsing']['time_start']['day']." ".$this->data['Browsing']['time_start']['hour'].":".$this->data['Browsing']['time_start']['min'].":00";
				// $strQuery = "INSERT INTO receipts (receiptno,icno,admindetail_localid,browsing_localid,browsing_time_start,bill_time,charge,paid,acct,note,sitecode) values ('".
				            // $this->data[Browsing][receiptno]."','".$this->data[Browsing][icno]."','".$this->Auth->user('id')."','".$lastbrowsingid."','".$strtimestart."','".$strbilltime."','".$this->data[Browsing][charge]."','".$this->data[Browsing][paid]."','".$this->data[Browsing][acct]."','".$this->data[Browsing][note]."','".$this->data[Browsing][sitecode]."')";
		
				// $this->Browsing->query($strQuery);
				//to show index after save
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The browsing could not be saved. Please, try again.'));
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
		$this->Browsing->id = $id;
		if (!$this->Browsing->exists()) {
			throw new NotFoundException(__('Invalid browsing'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Browsing->save($this->request->data)) {
				$this->Session->setFlash(__('The browsing has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The browsing could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Browsing->read(null, $id);
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
		$this->Browsing->id = $id;
		if (!$this->Browsing->exists()) {
			throw new NotFoundException(__('Invalid browsing'));
		}
		if ($this->Browsing->delete()) {
			$this->Session->setFlash(__('Browsing deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Browsing was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
		/**
 * browse pdf method
 *
 * @param string $id
 * @return void
 */
	public function browsepdf() {
	//Configure::write('debug',0);
	$this->response->type('pdf'); //call pdf important 2.1
	$this->layout = 'pdf'; 
	
  	$options['joins'] = array(
		array('table' => 'userdetails',
			'alias' => 'Userdetail',
			'type' => 'LEFT',
			'conditions' => array(
				'Userdetail.icno = Browsing.icno',
			)
		),
		array('table' => 'receipts',
			'alias' => 'Receipt',
			'type' => 'LEFT',
			'conditions' => array(
				'Receipt.browsing_localid = Browsing.localid',
			)
		)
	);
	$options['fields'] = array('icno','time_start','time_end','pcno','Userdetail.name','Receipt.paid');

	$browses=$this->Browsing->find('all',$options);
	
	//pr($browses);
	
	$this->set(compact('browses'));
	}
	
	/**
 * browsing report method
 *
 * @param string $id
 * @return void
 */
	public function browsingreport($icno=null) {
		//Configure::write('debug',0);
		$this->response->type('pdf'); //call pdf important 2.1
		$this->layout = 'pdf'; 	
		$first='2010-01-01 10:16:43';//test first
		$last='2013-06-30 10:16:43';//test last
		$this->Browsing->read(null,$icno);
		//Configure::write('debug',0);
	$this->response->type('pdf'); //call pdf important 2.1
	$this->layout = 'pdf'; 
	
  	$options['joins'] = array(
		array('table' => 'userdetails',
			'alias' => 'Userdetail',
			'type' => 'LEFT',
			'conditions' => array(
				'Userdetail.icno = Browsing.icno',
			)
		),
		array('table' => 'receipts',
			'alias' => 'Receipt',
			'type' => 'LEFT',
			'conditions' => array(
				'Receipt.browsing_localid = Browsing.localid',
			)
		)
	);
	$options['fields'] = array('icno','time_start','time_end','pcno','sitecode','acct','Userdetail.name','Receipt.paid');
	$options['conditions'] = array('Browsing.icno'=>$icno,'Browsing.time_start >='=>$first,'Browsing.time_start <='=>$last);

	$browses=$this->Browsing->find('all',$options);
	
	//pr($icno);
	//pr($browses);
	
	$this->set(compact('browses','icno','first','last'));
		
	}
	
	
}

?>