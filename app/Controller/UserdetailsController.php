<?php
App::uses('AppController', 'Controller');
/**
 * Userdetails Controller
 *
 * @property Userdetail $Userdetail
 */
class UserdetailsController extends AppController {



/**
 * index method
 *
 * @return void
 */
	public function index($sitecode = null) {
		//	Configure::write('debug',1);
		//	pr($this->Session->read('ym'));
		//	pr($this->Session->read('Site.sitecode'));
		$sitecode = trim($this->Session->read('Site.sitecode'));




		if ($this->request->data) {
			$this->Session->write('Userdetail_searching', $this->request->data);
		} 
		else if($this->Session->read('Userdetail_searching')) {
			$this->request->data= $this->Session->read('Userdetail_searching');
		}




		//when "Reset" button is clicked, clear the session of searching
		if (isset($_POST['default'])){	
			unset($_SESSION['Userdetail_searching']);	
			$this->data = null;
		}




		// Jam; kenapa bila nak buat condition invaliduser != '1' takk jalan?? 
		// siap ada undefined variable...
		// tapi bila buat invalid user = '0' jalan????
	    $conditions['Userdetail.invaliduser'] = '0'; 
	    $conditions['Userdetail.sitecode'] = $sitecode; //admin

		if (isset($_SESSION['Userdetail_searching'])) {

			// clicking the search button
			// pr($_SESSION['Userdetail_searching']); die();

			// echo '1 '.$this->request->data['Userdetail']['registered_date1']['day'].' day';
			// echo '2 '.$this->request->data['Userdetail']['registered_date1']['month'].' month';
			// echo '3 '.$this->request->data['Userdetail']['registered_date1']['year'].' year';
			// die();

			if ($this->request->data['Userdetail']['icno'] != null){
				$conditions['Userdetail.icno like'] =  "%".$this->request->data['Userdetail']['icno']."%";
			}
			if ($this->request->data['Userdetail']['name'] != null){
				$conditions['Userdetail.name like'] = "%".$this->request->data['Userdetail']['name']."%";
			}



			$start_day = $this->request->data['Userdetail']['registered_date1']['day'] ? $this->request->data['Userdetail']['registered_date1']['day']:'%';
			$start_month = $this->request->data['Userdetail']['registered_date1']['month'] ? $this->request->data['Userdetail']['registered_date1']['month']:'%';
			$start_year = $this->request->data['Userdetail']['registered_date1']['year'] ? $this->request->data['Userdetail']['registered_date1']['year']:'%';

			$end_day = $this->request->data['Userdetail']['registered_date2']['day']?$this->request->data['Userdetail']['registered_date2']['day']:'%';
			$end_month = $this->request->data['Userdetail']['registered_date2']['month']?$this->request->data['Userdetail']['registered_date2']['month']:'%';
			$end_year = $this->request->data['Userdetail']['registered_date2']['year']?$this->request->data['Userdetail']['registered_date2']['year']:'%';
			




			if ($this->request->data['Userdetail']['registered_date1']['day'] != null || $this->request->data['Userdetail']['registered_date1']['month'] != null || $this->request->data['Userdetail']['registered_date1']['year'] != null) {
				$this->Session->write('start', $start_year.'-'.$start_month.'-'.$start_day);
			}
			// else {
			// 	if(!empty($this->Session->read('start'))) {
			// 		$this->Session->delete('start');
			// 	}
			// }


			if ($this->request->data['Userdetail']['registered_date2']['day'] != null || $this->request->data['Userdetail']['registered_date2']['month'] != null || $this->request->data['Userdetail']['registered_date2']['year'] != null) {
				$this->Session->write('end', $end_year.'-'.$end_month.'-'.$end_day);	
			}
			// else {
			// 	if(!empty($this->Session->read('end'))) {
			// 		$this->Session->delete('end');
			// 	}				
			// }

			// $starttime = $this->request->data['Userdetail']['registered_date1']['year']."-".$this->request->data['Userdetail']['registered_date1']['month']."-".$this->request->data['Userdetail']['registered_date1']['day'];
			// $endtime = $this->request->data['Userdetail']['registered_date2']['year']."-".$this->request->data['Userdetail']['registered_date2']['month']."-".$this->request->data['Userdetail']['registered_date2']['day'];

			// $this->Session->write('start', $starttime);
			// $this->Session->write('end', $endtime);

			/*
			if ($this->Session->read('start')){
				$conditions['Userdetail.registered_date >='] = $this->Session->read('start');
				$conditions['Userdetail.registered_date <='] = $this->Session->read('end');
			} 
			else {
				$conditions['Userdetail.registered_date >='] = date('Y-m-d');
				$conditions['Userdetail.registered_date <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
			}
			*/


			if ($this->Session->read('start')){
				$conditions['date_format(Userdetail.registered_date, "%Y-%m-%d") >='] = $this->Session->read('start');
				$conditions['date_format(Userdetail.registered_date, "%Y-%m-%d") <='] = $this->Session->read('end');
			} 
			// else {
			// 	$conditions['date_format(Userdetail.registered_date, "%Y-%m-%d") >='] = date('Y-m-d');
			// 	$conditions['date_format(Userdetail.registered_date, "%Y-%m-%d") <='] = date('Y-m-d h:i',mktime(0, 0, 0, date("m"), date("d") +1,   date("Y")));
			// }	

		}
		$order['Userdetail.registered_date'] = 'ASC'; 
		$order['Userdetail.icno'] = 'ASC';
		$this->paginate = array(
            'Userdetail' => array(
            	'fields' => array(
            		'Userdetail.icno',
            		'Userdetail.name',
            		'Gender.id',
            		'Gender.bm',
            		'Userdetail.age',
            		'Occupation.id',
            		'Occupation.bm',
            		'Userdetail.registered_date',
            		'Userdetail.active',
            		'Usertype.bm',
            		'Userdetail.sitecode',
            		'Userdetail.id',
            	),
                'conditions' => $conditions,
                'order' => $order,
                'limit' => 20
            )
        );
        $this->Userdetail->recursive = 0;
        $userdetails = $this->paginate('Userdetail');
        // pr($userdetails); die();
		$genders = array('2'=>'Perempuan','1'=>'Lelaki');
		$occupations = $this->Userdetail->Occupation->find('list',array('fields'=>'bm'));
		$groups = $this->Auth->User('group_id');
		$this->set(compact('userdetails','genders','occupations', 'groups', 'sitecode'));
	}	





/**
 * main_stat index method
 *
 * @return void
 */	




	public function main_stat($ym = null, $sitecode = null) {
	
	// $sitecode = $this->Session->read('Site.sitecode');
	    if ($sitecode == null)
		{
		$sitecode = $this->Session->read('Site.sitecode');
		}
	
	    if ($ym == null)
		{
		$ym = date('Ym');
		}
	//	pr($ym);
		$strQuery = "select 'Pelawat bulan ini' as type,year(registered_date)*100+month(registered_date) as ym,count(icno) cnt \n".
					"from userdetails \n".
					"where substring(sitecode,1,1) <> 'X' \n".
					"and usertype_id = '1' \n".
					"and year(registered_date)*100+month(registered_date) = '".$ym."' \n".
					"and sitecode like '".$sitecode."%' \n".
					"group by year(registered_date)*100+month(registered_date) \n".
					"union all \n".
					"select 'Ahli bulan ini' as type,year(registered_date)*100+month(registered_date) as ym,count(icno) cnt \n".
					"from userdetails \n".
					"where substring(sitecode,1,1) <> 'X' \n".
					"and usertype_id <> '1' \n".
					"and year(registered_date)*100+month(registered_date) = '".$ym."' \n".
					"and sitecode like '".$sitecode."%' \n".
					"group by year(registered_date)*100+month(registered_date) \n".
					"union all \n".
					"select 'Jumlah ahli PJK' as type,'' as ym,count(icno) cnt \n".
					"from userdetails \n".
					"where substring(sitecode,1,1) <> 'X' \n".
					"and usertype_id <> '1' \n".
					"and sitecode like '".$sitecode."%' \n".
					"union all \n".
					"select 'Penggunaan bulan ini' as type,year(time_start)*100+month(time_start) as ym,count(icno) cnt \n".
					"from browsings \n".
					"where substring(sitecode,1,1) <> 'X' \n".
					"and year(time_start)*100+month(time_start) = '".$ym."' \n".
					"and sitecode like '".$sitecode."%' \n".
					"group by year(time_start)*100+month(time_start) \n".
					"union all \n".
					"select 'Pelatih bulan ini' as type,year(starttime)*100+month(starttime) as ym,count(b.userdetail_id) cnt \n".
					"from trainings a,userdetails_trainings b \n".
					"where substring(a.sitecode,1,1) <> 'X' \n".
					"and a.id = b.training_id \n".
					"and year(starttime)*100+month(starttime) = '".$ym."' \n".
					"and sitecode like '".$sitecode."%' \n".
					"group by year(starttime)*100+month(starttime)";
		// pr($strQuery);
		
		$ds = $this->Userdetail->query($strQuery);		
		
		// pr($ds);
		
		$this->set(compact('ds'));
	}
	



/**
 *index pdf method
 *
 * @return void
 */
	public function viewdetailpdf($id=null) {  
		$this->response->type('pdf'); //call pdf important 2.1
		$this->layout = 'pdf'; 
		$this->Userdetail->read(null,$id);
		//pr($id);
		//$headers=$this->Userdetail->find('all');
		$userdetails=$this->Userdetail->find('all',array('conditions'=>array('Userdetail.id'=>$id)));
		//pr($users);
		//foreach($users as $key=> $user){
		//$data=$user['Userdetail'];
		//}
		//pr($data);
		$this->set(compact('data','userdetails'));
		
	}
	

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		$this->set('userdetail', $this->Userdetail->read(null, $id));
		
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Userdetail->create();
						
			// check if session sitecode is not empty 
			if (!$this->Auth->user('sitecode')) {
				$this->request->data['Userdetail']['sitecode'] = $this->Auth->user('sitecode');
			}			
								
			// calculate age based on dob input
			$day = $this->request->data['Userdetail']['dob']['day'];
			$month = $this->request->data['Userdetail']['dob']['month'];
			$year = $this->request->data['Userdetail']['dob']['year'];
			$dob = $year.'-'.$month.'-'.$day;

		    list($year, $month, $day) = explode("-", $dob);
		    $year_diff  = date("Y") - $year;
		    $month_diff = date("m") - $month;
		    $day_diff   = date("d") - $day;

		    if ($day_diff < 0 || $month_diff < 0) {
		        $year_diff--;
			}     
			$this->request->data['Userdetail']['age'] = $year_diff;			

			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved'));
				//$this->redirect(array('action' => 'index'));
			} 
			else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		}
		$states = $this->Userdetail->State->find('list');
		$genders = $this->Userdetail->Gender->find('list',array('fields'=>'eng'));
		$races = $this->Userdetail->Race->find('list',array('fields'=>'eng'));
		$nationalities = $this->Userdetail->Nationality->find('list',array('fields'=>'eng'));
		$occupations = $this->Userdetail->Occupation->find('list',array('fields'=>'eng'));
		$educations = $this->Userdetail->Education->find('list',array('fields'=>'eng'));
		$incomes = $this->Userdetail->Income->find('list',array('fields'=>'eng'));
		$usertypes = $this->Userdetail->Usertype->find('list',array('fields'=>'eng'));
		$ictknowledges = $this->Userdetail->Ictknowledge->find('list',array('fields'=>'eng'));
		$transports = $this->Userdetail->Transport->find('list',array('fields'=>'eng'));
		$fixlines = $this->Userdetail->Fixline->find('list',array('fields'=>'eng'));
		$bbands = $this->Userdetail->Bband->find('list',array('fields'=>'eng'));
		$mobiles = $this->Userdetail->Mobile->find('list',array('fields'=>'eng'));
		$threegs = $this->Userdetail->Threeg->find('list',array('fields'=>'eng'));
		// $trainings = $this->Userdetail->Training->find('list');
		$this->set(compact('states', 'genders', 'races', 'nationalities', 'occupations', 'educations', 'incomes', 'usertypes', 'ictknowledges', 'transports', 'fixlines', 'bbands', 'mobiles', 'threegs'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
					
			// calculate age based on dob input
			$day = $this->request->data['Userdetail']['dob']['day'];
			$month = $this->request->data['Userdetail']['dob']['month'];
			$year = $this->request->data['Userdetail']['dob']['year'];
			$dob = $year.'-'.$month.'-'.$day;

		    list($year, $month, $day) = explode("-", $dob);
		    $year_diff  = date("Y") - $year;
		    $month_diff = date("m") - $month;
		    $day_diff   = date("d") - $day;

		    if ($day_diff < 0 || $month_diff < 0) {
		        $year_diff--;
			}     
			$this->request->data['Userdetail']['age'] = $year_diff;		

			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The userdetail has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The userdetail could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Userdetail->read(null, $id);
		}
		$states = $this->Userdetail->State->find('list');
		$genders = $this->Userdetail->Gender->find('list',array('fields'=>'eng'));
		$races = $this->Userdetail->Race->find('list',array('fields'=>'eng'));
		$nationalities = $this->Userdetail->Nationality->find('list',array('fields'=>'eng'));
		$occupations = $this->Userdetail->Occupation->find('list',array('fields'=>'eng'));
		$educations = $this->Userdetail->Education->find('list',array('fields'=>'eng'));
		$incomes = $this->Userdetail->Income->find('list',array('fields'=>'eng'));
		$usertypes = $this->Userdetail->Usertype->find('list',array('fields'=>'eng'));
		$ictknowledges = $this->Userdetail->Ictknowledge->find('list',array('fields'=>'eng'));
		$transports = $this->Userdetail->Transport->find('list',array('fields'=>'eng'));
		$fixlines = $this->Userdetail->Fixline->find('list',array('fields'=>'eng'));
		$bbands = $this->Userdetail->Bband->find('list',array('fields'=>'eng'));
		$mobiles = $this->Userdetail->Mobile->find('list',array('fields'=>'eng'));
		$threegs = $this->Userdetail->Threeg->find('list',array('fields'=>'eng'));
		$trainings = $this->Userdetail->Training->find('list');
		$this->set(compact('states', 'genders', 'races', 'nationalities', 'occupations', 'educations', 'incomes', 'usertypes', 'ictknowledges', 'transports', 'fixlines', 'bbands', 'mobiles', 'threegs', 'trainings'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
	
		$this->Userdetail->id = $id;
		if (!$this->Userdetail->exists()) {
			throw new NotFoundException(__('Invalid userdetail'));
		}
		if ($this->Userdetail->delete()) {
			$this->Session->setFlash(__('Userdetail deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Userdetail was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function setinvaliduser($id = null) {
	
		$this->Userdetail->id = $id;
		// pr($this->request->data);
		if (!$this->Userdetail->exists()) 
			throw new NotFoundException(__('Invalid userdetail'));
		else
			{
			$this->Userdetail->saveField('invaliduser',"1");
			$this->Session->setFlash(__('Userdetail was set as invalid'));
			}	
		
		
		$this->redirect(array('action' => 'index'));
	}
	
	public function userdetailpdf() {
		//Configure::write('debug',0);
		$this->response->type('pdf'); //call pdf important 2.1
			$this->layout = 'pdf'; 
		$dataall = $this->Userdetail->find('all',array(
														'order' => array('name' => 'ASC'),
														'fields'=>array(
																		'Userdetail.name',
																		'Userdetail.icno',
																		'Userdetail.hp_no',
																		'Userdetail.registered_date',
																		'Usertype.bm')));
		//$users = $this->Userdetail->find('all');
		//foreach($users as $key=> $newuser){
		// $datas[$key]=array('user'=>$newuser['Userdetail'],'type'=>$newuser['Usertype']);
		//}
		
		//	pr($dataall);	
		//	pr($datas);		
		$this->set(compact('dataall'));
				
	}



	public function addtrainer() {
		if ($this->request->is('post')) {
			$this->request->data['Userdetail']['status_trainer'] = 1;
			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The Trainer has been saved'));
				$this->redirect(array('action' => 'addtrainer'));
			} 
			else {
				$this->Session->setFlash(__('The Trainer could not be saved. Please, try again.'));
			}
		}		
	}

}
?>