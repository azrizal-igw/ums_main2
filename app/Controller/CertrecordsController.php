<?php
App::uses('AppController', 'Controller');

/**
 * Certrecords Controller
 *
 * @property Certrecord $Certrecord
 */

class CertrecordsController extends AppController {
	// public $components = array('Paginator');

	var $helpers =  array('Html', 'Ajax','Javascript','Form');
	var $components = array( 'RequestHandler','Cookie' );

	public function jasperuserdetails($mod, $site, $icno, $name, $datefrom, $dateto) {
		$this->autoRender = false;
		if ($icno == '0') { 
			$icno = '%'; 
		}
		else {
			$icno = '%'.$icno.'%';
		}
		if ($name == '0') {
			$name = '%';
		}
		else {
			$name = '%'.$name.'%';
		}
		
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Configuration.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'Parser.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'JasperServer.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Integration'.DS.'RequestJasper.php';

		try {
			$datenow = date('YmdHis');
			$filename = "report_".$mod."_".$datenow.".pdf";
			$jasper = new Adl\Integration\RequestJasper();
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			readfile($filename);

			if ($mod == 'userdetails') {
				$report_unit = "/reports/cms/reguser2_1_1_1_2_1_1_1";	
			}
			else if ($mod == 'browsings') {
				$report_unit = "/reports/cms/reguser2_1_1_1_2_1_1_1_1_2";
			}
			else if ($mod == 'receipts') {
				$report_unit = "/reports/cms/reguser2_1_1_1_2_1_1_1_1_2_1";
			}
			$report_format="PDF";

			$date1 = 1000 * strtotime($datefrom);
			$date2 = 1000 * strtotime($dateto);

			if ($mod == 'userdetails') {
				$report_params = array(
					'site' => $site,
					'icno' => $icno,
					'name' => $name,
					'datefrom' => $date1,
					'dateto' => $date2				
				);  
			}
			else if ($mod == 'browsings') {
				$report_params = array(
					'icno' => $icno,
					'sitecode' => $site,
					'datefrom' => $date1,
					'dateto' => $date2				
				);  				
			}		
			else if ($mod == 'receipts') {
				$report_params = array(
					'icno' => $icno,
					'site' => $site,
					'datefrom' => $date1,
					'dateto' => $date2				
				);  							
			}
			echo $jasper->run($report_unit,$report_format,$report_params);
		} 
		catch (\Exception $e) {
			echo $e->getMessage();
			die;
		}
	}



	public function print_usages($site, $icno, $datefrom, $dateto, $service) {
		$this->autoRender = false;
		if ($icno == '0') {
			$icno = '%';
		}
		else {
			$icno = '%'.$icno.'%';
		}
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Configuration.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'Parser.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'JasperServer.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Integration'.DS.'RequestJasper.php';
		try {
			$datenow = date('YmdHis');
			$filename = "cert_".$datenow.".pdf";
			$jasper = new Adl\Integration\RequestJasper();
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			readfile($filename);
			$report_unit = "/reports/cms/Template1_4_4_2_3_1"; // userlist_usages
			$report_format="PDF";

			$date1 = 1000 * strtotime($datefrom);
			$date2 = 1000 * strtotime($dateto);

			$report_params = array(
				'datefrom' => $date1,
				'dateto' => $date2,			
				'icno' => $icno,
				'service' => $service,			
				'sitecode' => $site
			);  
			echo $jasper->run($report_unit,$report_format,$report_params);
		} 
		catch (\Exception $e) {
			echo $e->getMessage();
			die;
		}		
	}
	
	
	
	
	// public function jasperbrowsings($site, $icno, $datefrom, $dateto) {	
	// }




	// public function jasperreceipts($icno, $site, $datefrom, $dateto) {
	// }



	
	
	public function updatestatus() {
		// $print = $this->request->data['status_print'];
		// $paid = $this->request->data['status_paid'];


		$data['msg'] = array('status' => 1, 'message' => 'Status for Paid and Print is updated.');
		return json_encode($data);		
	}





	public function index() {
		$this->Certrecord->recursive = 0;
 	    $this->paginate = array(
	    	'order' => array('Certrecord.id' => 'DESC'),
	        'limit' => 20
	    );
 	    $certrecords = array();
	    $search = array();
 		$conditions = array();
 		$conditions_or = array();
		$s_month = 0;
		$s_year = 0;	
		$type = 0;

		// have search value
		if (!empty($this->request->data)) { 
			// pr($this->request->data); die();
        	$this->Session->write('certrecords', $this->request->data);  
        	$status = 1; // have records   
		}
		else {
			$status = 0;
		}

 		// clear the session searching
		if (isset($this->request->data['Certrecord']['reset'])) {	
            $this->Session->delete('certrecords');
            $this->request->data = null;
		}  		

		// have search session
		if ($this->Session->check('certrecords')) { 
			$status = 1;
			$search = $this->Session->read('certrecords'); 

			
			// lists sites by checking user
			if ($this->Session->read('Auth.User.group_id') == 4) { // manager
				$conditions['Certrecord.location_id'] = $this->Session->read('Auth.User.sitecode');				
			}
			else if ($this->Session->read('Auth.User.group_id') == 7) { // regional manager
				
				// print_r($this->Session->read('Auth.User.region'));
				// die();
				
				if ($this->Session->read('Auth.User.region')) {
					// echo $this->Session->read('Auth.User.region');
					$region = implode(',', $this->Session->read('Auth.User.region'));
					// print_r($region); die();
					// $conditions = "Site.region_id IN ($region)";
					// $conditions["Site.region_id"] = "IN ($region)";
					$conditions["Site.region_id"] = $region;
				}
			}
			
					
			// search type
			if ($search['Certrecord']['type_list'] != null) {
				$conditions['Certrecord.type_id'] = $search['Certrecord']['type_list'];
			}
			// search course
			if ($search['Certrecord']['course_id'] != null) {
				$conditions['Certrecord.course_id'] = $search['Certrecord']['course_id'];
			}
			// search course
			if ($search['Certrecord']['course_id'] != null) {
				$conditions['Certrecord.course_id'] = $search['Certrecord']['course_id'];
			}


			// // search site
			// if ($search['Certrecord']['sitecode'] != null) {
			// 	$conditions['Certrecord.location_id'] = $search['Certrecord']['sitecode'];
			// }



			// search month
			if ($search['Certrecord']['month']['month'] != null) {
				$conditions['DATE_FORMAT(`Certrecord.certdate`, "%m")'] = $search['Certrecord']['month']['month'];
				$s_month = $search['Certrecord']['month']['month'];
			}
			// search year
			if ($search['Certrecord']['year']['year'] != null) {
				$conditions['DATE_FORMAT(`Certrecord.certdate`, "%Y")'] = $search['Certrecord']['year']['year'];
				$s_year = $search['Certrecord']['year']['year'];
			}
			// search icno / name
			if ($search['Certrecord']['icno_name'] != null) {
				$conditions_or['Userdetail.icno like'] = "%".$search['Certrecord']['icno_name']."%";
				$conditions_or['Userdetail.name like'] = "%".$search['Certrecord']['icno_name']."%";
			}	
			// $certrecords = $this->paginate($conditions);	
		    $certrecords = $this->paginate(array(
		    	'and' => $conditions,
				'or' => $conditions_or
		    ));
		    $type = $search['Certrecord']['type_list'];
		    // pr($certrecords); die();

	 		// check if update status print and paid is triggered
			if (isset($this->request->data['Certrecord']['update-status'])) {	
	            // $this->Session->delete('certrecords');
	            // $this->request->data = null;
			}
		}
		else {
			$search['Certrecord']['month']['month'] = date('m');
			$search['Certrecord']['year']['year'] = date('Y');
		}  
		$this->loadModel('Course'); 
		$courses = $this->Course->find('list', array('conditions' => array('Course.id' => array(9,10))));
		$this->loadModel('Site');
		$sites = $this->Site->find('list', array(
			'fields' => array('Site.id', 'dropdown_sitename'),
			'order' => array(
				'Site.id' => 'ASC'
			)
		));
	    $this->set(compact('certrecords', 'status', 'courses', 'sites', 'search', 's_month', 's_year', 'type'));
	}




	// update if user click button paid or print
	public function update_status() {
		$this->autoRender = false;

        // update paid status
        $paid_id = explode(',', $this->request->data['paid_id']);
        if (!empty($paid_id)) {
        	$total_paid = 0;
	        foreach ($paid_id as $ids) {
	        	$paid_split = explode('_', $ids);
	        	if ($paid_split[1] == 5) {
	        		$value = '5.00';
	        	}
	        	else {
	        		$value = '0.00';
	        	}
	            $cond = array(                        
	                'Certrecord.id' => $paid_split[0],
	            );                         
	            $update = $this->Certrecord->updateAll(array("Certrecord.status_paid" => $value), $cond); 
				if ($update) {
					$total_paid += 1;
				}     	
	        }
        }
		// update print status
		$ids = explode(',', $this->request->data['print_id']);
        if (!empty($ids)) {
        	$total_print = 0;
	        foreach ($ids as $id) { // loop cert record id
	        	$print_split = explode('_', $id);
	            $cond = array(                        
	                'Certrecord.id' => $print_split[0],
	            );                         
	            $update = $this->Certrecord->updateAll(array("Certrecord.status_print" => $print_split[1]), $cond); 
				if ($update) {
					$total_print += 1;
				}
	        }
		}
		$data['msg'] = array('message' => 'Cert successfully updated.', 'status' => 1);
		return json_encode($data);

	}




	public function edit($id = null) {
		$this->Certrecord->id = $id;
		if (!$this->Certrecord->exists()) {
			throw new NotFoundException(__('Invalid certrecord'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

            $this->request->data['Certrecord']['status_paid'] = $this->request->data['Certrecord']['status_paid']; 
            $this->request->data['Certrecord']['status_print'] = $this->request->data['Certrecord']['status_print']; 

            // update date paid if status paid is more than 0.00
            if ($this->request->data['Certrecord']['status_paid'] > 0) {
            	$this->request->data['Certrecord']['paid_date'] = date('Y-m-d H:i:s');
            }
            // update print date if printed is 1 (yes)
            if ($this->request->data['Certrecord']['status_print'] == 1) {
            	$this->request->data['Certrecord']['print_date'] = date('Y-m-d H:i:s');
            }
            
			if ($this->Certrecord->save($this->request->data)) {
				$this->Session->setFlash(__('The certrecord has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certrecord could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Certrecord->read(null, $id);
		}
	}





	public function print_cert($cert_id) {	
		$this->autoRender = false;
		$j = '';
		$ids = explode('_', $cert_id);
		foreach ($ids as $key => $value) {
			$j .= $value.',';
			// update status and date print
            $cond = array(                        
                'Certrecord.id' => $value,
            );                         
            $date = date('Y-m-d H:i:s');
            $update = $this->Certrecord->updateAll(array("Certrecord.status_print" => 1, "Certrecord.print_date" => "'$date'"), $cond);			
		}
		$i = substr($j, 0, -1);
		

		// print the cert records for jasper
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Configuration.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'Parser.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'JasperServer.php';
		include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Integration'.DS.'RequestJasper.php';

		try {
			$datenow = date('YmdHis');
			$filename = "cert_".$datenow.".pdf";
			$jasper = new Adl\Integration\RequestJasper();
			header('Content-type: application/pdf');
			header('Content-Disposition: attachment; filename="'.$filename.'"');
			readfile($filename);
			$report_unit = "/reports/cms/test_1_1";
			$report_format="PDF";
			$report_params = array(
				'id' => $i				
			);  
			echo $jasper->run($report_unit,$report_format,$report_params);
		} 
		catch (\Exception $e) {
			echo $e->getMessage();
			die;
		}
	}

	
	
	public function paid_cert() {
		$this->autoRender = false;		
        $paid_id = explode('_', $this->request->data['id']);		
		// $paid_id = array(347,348);
        if (!empty($paid_id)) {
	        foreach ($paid_id as $id) {
	            $cond = array(                        
	                'Certrecord.id' => $id,
	            );                         
	            $date = date('Y-m-d H:i:s');
	            $update = $this->Certrecord->updateAll(array("Certrecord.status_paid" => "5.00", "Certrecord.paid_date" => "'$date'"), $cond);
	        }
        }	
		$data['msg'] = array('message' => 'Cert successfully paid.', 'status' => 1);
		return json_encode($data);        	
	}
	



	public function addtrainer() {
		if ($this->request->is('post')) {
			$this->loadModel('Userdetail');
			$this->Userdetail->create();
			$this->request->data['Userdetail']['localid'] = 0;
            // $this->request->data['Userdetail']['icno'] = $this->request->data['Certrecord']['trainer_icno'];  
            $this->request->data['Userdetail']['name'] = $this->request->data['Certrecord']['trainer_name'];
            $this->request->data['Userdetail']['address'] = 0;
            $this->request->data['Userdetail']['city'] = 0;
            $this->request->data['Userdetail']['state_id'] = 0;
            $this->request->data['Userdetail']['gender_id'] = 0;
            $this->request->data['Userdetail']['age'] = 0;
            $this->request->data['Userdetail']['race_id'] = 0;
            $this->request->data['Userdetail']['naionality_id'] = 0;
            $this->request->data['Userdetail']['occupation_id'] = 0;
            $this->request->data['Userdetail']['education_id'] = 0;
            $this->request->data['Userdetail']['income_id'] = 0;
            $this->request->data['Userdetail']['oku'] = 0;
            $this->request->data['Userdetail']['registered_date'] = date('Y-m-d');
            $this->request->data['Userdetail']['active'] = 0;
            $this->request->data['Userdetail']['usertype_id'] = 0;
            $this->request->data['Userdetail']['tel_no'] = 0;
            $this->request->data['Userdetail']['hp_no'] = $this->request->data['Certrecord']['trainer_mobile']; 
            $this->request->data['Userdetail']['email'] = 0;

            $this->request->data['Userdetail']['ictknowledge_id'] = 0;
            $this->request->data['Userdetail']['distance'] = 0;
            $this->request->data['Userdetail']['transport_id'] = 0;
            $this->request->data['Userdetail']['time_to_cbc'] = 0;
            $this->request->data['Userdetail']['household'] = 0;
            $this->request->data['Userdetail']['fixline_cust'] = 0;
            $this->request->data['Userdetail']['fixline_id'] = 0;
            $this->request->data['Userdetail']['fixline_num'] = 0;
            $this->request->data['Userdetail']['bband_cust'] = 0;
            $this->request->data['Userdetail']['bband_id'] = 0;
            $this->request->data['Userdetail']['bband_num'] = 0;
            $this->request->data['Userdetail']['computer'] = 0;

            $this->request->data['Userdetail']['mobile_cust'] = 0;
            $this->request->data['Userdetail']['mobile_id'] = 0;
            $this->request->data['Userdetail']['mobile_num'] = 0;
            $this->request->data['Userdetail']['threeg_cust'] = 0;
            $this->request->data['Userdetail']['threeg_id'] = 0;
            $this->request->data['Userdetail']['threeg_num'] = 0;
            $this->request->data['Userdetail']['cardno'] = 0;
            $this->request->data['Userdetail']['other_site'] = 0;
            $this->request->data['Userdetail']['dob'] = $this->request->data['Certrecord']['trainer_dob'];
            $this->request->data['Userdetail']['entry_dt'] = 0;
            $this->request->data['Userdetail']['mod_dt'] = 0;
            $this->request->data['Userdetail']['sendstatus'] = 0;
            $this->request->data['Userdetail']['sitecode'] = $this->request->data['Certrecord']['trainer_sitecode'];
            $this->request->data['Userdetail']['invaliduser'] = 0;

			if ($this->Userdetail->save($this->request->data)) {
				$this->Session->setFlash(__('The Trainer has been saved'));
				$this->redirect(array('action' => 'addtrainer'));
			} 
			else {
				$this->Session->setFlash(__('The Trainer could not be saved. Please, try again.'));
			}
		}
	}




	public function generatecert() {		
		$this->autoRender = false;



		$data = array();
		$type_id = $this->request->data['type']; // 0 - Participant | 1 - Trainer
		// $type_id = 1;

		// get lists of intel courses and total modules (combine course id and total modules)
		$sql = "select c.id, c.course_code, ";
		$sql .="(select count(m.id) from modules m where m.course_id = c.id) total ";
		$sql .="from courses c where c.id in (9, 10) ";
		$rs = $this->Certrecord->query($sql, $cachequeries = false);	
		foreach ($rs as $r) {
			$id_total[$r['c']['id']] = $r[0]['total'];
		}

		// check user that taken course and module (must finalize) intel (exclude also user that already get the cert)
		$this->loadModel('UserdetailsTraining');
		$intel = $this->UserdetailsTraining->find('all', array(
			'conditions' => array(
				'Training.course_id' => array(9, 10),
				'Training.finalize' => 1, // intel training must be finalize
				'Training.sitecode' => $this->Session->read('Auth.User.sitecode'),
				'concat(concat(UserdetailsTraining.userdetail_id,"_"), cast(Training.course_id as char)) not in (SELECT trainee_course_id FROM certrecords)',
				// 'Userdetail.status_trainer' => $type_id // check whether trainee or trainer attending the training
			),
			'fields' => array(
				'UserdetailsTraining.userdetail_id',
				'Training.id',
				'Training.course_id',
				'Training.module_id',
				'Training.sitecode',
				'Userdetail.dob',
				'Userdetail.age',
				'Userdetail.gender_id',
				'Userdetail.occupation_id',
				'Userdetail.education_id',
				'Userdetail.race_id',
				'Userdetail.sitecode',
				'Course.id',
				'Course.course_code',
				'Course.name',
			),
		));
		// pr($intel); die();

		$course_count = array();
		if (!empty($intel)) {
			foreach ($intel as $i) {
				// kira brp module userdetail_id ambil utk specific course
				$course_count[$i['UserdetailsTraining']['userdetail_id']][$i['Training']['course_id']] += 1;
				// check if all modules is completed
				// get latest training for cert date
			}			
		}
		// print_r($course_count); die();

		// do a comparison whether each trainee completed all the modul or not
		$user_completed = array();
		foreach ($course_count as $userdetail_id => $course) {
			foreach ($course as $course_id => $total_modul) {
				if ($total_modul == $id_total[$course_id]) {
					$user_completed[$userdetail_id] = array($userdetail_id, $course_id);
				}
				else {
				}
			}
		}
		// print_r($user_completed); die(); // 8 records

		if (!empty($user_completed)) {
			foreach ($user_completed as $completed) {
				// check at userdetails whether the id is exist or not
				$this->loadModel('Userdetail');
				$check_userdetail = $this->Userdetail->find('first', array(
					'conditions' => array(
						'Userdetail.id' => $completed
					)
				));
				if (!empty($check_userdetail)) {
					// select max training to get finalize date 
					$this->loadModel('UserdetailsTraining');
					$this->UserdetailsTraining->recursive = 0;
					// check userdetails
					$userdetails = $this->UserdetailsTraining->find('all', array(
						'fields' => array(
							'max(Training.StartTime) as certdate',
							'Training.course_id',
							'Training.sitecode',				
							'Course.course_code',
							'UserdetailsTraining.userdetail_id',
							'Userdetail.dob',
							'Userdetail.age',
							'Userdetail.gender_id',
							'Userdetail.occupation_id',
							'Userdetail.education_id',
							'Userdetail.race_id',					
						),
						'conditions' => array(
							'Course.id' => $completed[1],
							// 'Userdetail.id' => $completed[0]
							'UserdetailsTraining.userdetail_id' => $completed[0]
						),
					));
					// print_r($userdetails); die();

					if (!empty($userdetails)) {
						// check whether participant/trainer
						$certdate = $userdetails[0][0]['certdate'];
						$userdetail_id = $userdetails[0]['UserdetailsTraining']['userdetail_id'];
						$course_id = $userdetails[0]['Training']['course_id'];
						$sitecode = $userdetails[0]['Training']['sitecode'];
						$dob = $userdetails[0]['Userdetail']['dob'];
						$age = $userdetails[0]['Userdetail']['age'];
						$gender_id = $userdetails[0]['Userdetail']['gender_id'];
						$occupation_id = $userdetails[0]['Userdetail']['occupation_id'];
						$education_id = $userdetails[0]['Userdetail']['education_id'];
						$race_id = $userdetails[0]['Userdetail']['race_id'];

						// calculate age based on date of birth
						if ($dob != '0000-00-00') {
							$birthDate = explode("-", $dob);
							$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y")-$birthDate[0])-1):(date("Y")-$birthDate[0]));
						}
						else {
							$age = 0;
						}
						// generate new certnumber TM-IEB-02/15-0001
						$course_code = $userdetails[0]['Course']['course_code'];
						// check length of course code
						$course_code_length = strlen($course_code);

						// generate cert number
						$month = date('m');
						$year = date('y');
						$sqlnew = "select case when max(substring(certnumber, -4)) is null then 1 ";
						$sqlnew .="else max(substring(certnumber, -4))+1 end as newNo ";
						$sqlnew .="from certrecords ";
						$sqlnew .="where substring(certnumber, 4, $course_code_length) = '$course_code' ";
						$sqlnew .="and substring(certnumber, -10, 2) = $month ";
						$sqlnew .="and substring(certnumber, -7, 2) = $year ";
						$rsnew = $this->Certrecord->query($sqlnew, $cachequeries = false);
						$certno = $rsnew[0][0]['newNo'];

						//format cert number
						if ($type_id == 0) { // Participant
							$certnumber = 'TM-'.strtoupper($course_code).'-'.date('m/y').'-'.sprintf("%04d", $certno);
						}
						else if ($type_id == 1) { // Trainer
							$certnumber = 'TM-'.strtoupper($course_code).'-M-'.date('m/y').'-'.sprintf("%04d", $certno);	
						}
						// echo $certnumber; die();					
					}
					// no userdetails
					else {
						$certnumber = 0;
						$certdate = '0000-00-00';
						$userdetail_id = 0;
						$course_id = 0;
						$sitecode = 0;
						$age = 0;
						$gender_id = 0;
						$occupation_id = 0;
						$education_id = 0;
						$race_id = 0;
					}

					// check if trainee already insert into certrecords table
					$this->loadModel('Certrecord');
					$check_cert = $this->Certrecord->find('first', array(
						'conditions' => array(
							'Certrecord.trainee_id' => $userdetail_id, // Userdetail ID
							'Certrecord.course_id' => $course_id, // Course ID
							'Certrecord.location_id' => $sitecode // Sitecode
						)
					));

					// insert into certrecords if not record in certrecords
					if (empty($check_cert)) {
						$this->Certrecord->saveAll(array(
							'Certrecord' => array(
								'trainee_course_id' => $userdetail_id.'_'.$course_id,
								'trainee_id' => $userdetail_id,
								'course_id' => $course_id,
								'location_id' => $sitecode,
								'certnumber' => $certnumber,
								'certdate' => $certdate, // finalizedtime of last training
								'age' => $age,
								'gender_id' => $gender_id,
								'occupation_id' => $occupation_id,
								'education_id' => $education_id,
								'race_id' => $race_id,
								'type_id' => $type_id,
								'created' => date('Y-m-d H:i:s'),
							),
						));
						// $total = count($save);
					}
				}
				$data['msg'] = array('status' => 1, 'message' => 'Process complete!');					
			}
		}
		else {
			$data['msg'] = array('status' => 0, 'message' => 'No data to process.');
		}
		return json_encode($data);
	}



	public function view($id = null) {
		$this->Certrecord->id = $id;
		if (!$this->Certrecord->exists()) {
			throw new NotFoundException(__('Invalid certrecord'));
		}
		$this->set('certrecord', $this->Certrecord->read(null, $id));
	}



	public function add() {
		if ($this->request->is('post')) {
			$this->Certrecord->create();
			if ($this->Certrecord->save($this->request->data)) {
				$this->Session->setFlash(__('The certrecord has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The certrecord could not be saved. Please, try again.'));
			}
		}
		$traineeCourses = $this->Certrecord->TraineeCourse->find('list');
		$trainees = $this->Certrecord->Trainee->find('list');
		$courses = $this->Certrecord->Course->find('list');
		$locations = $this->Certrecord->Location->find('list');
		$genders = $this->Certrecord->Gender->find('list');
		$occupations = $this->Certrecord->Occupation->find('list');
		$educations = $this->Certrecord->Education->find('list');
		$races = $this->Certrecord->Race->find('list');
		$this->set(compact('traineeCourses', 'trainees', 'courses', 'locations', 'genders', 'occupations', 'educations', 'races'));
	}




	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Certrecord->id = $id;
		if (!$this->Certrecord->exists()) {
			throw new NotFoundException(__('Invalid certrecord'));
		}
		if ($this->Certrecord->delete()) {
			$this->Session->setFlash(__('Certrecord deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Certrecord was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	
}
