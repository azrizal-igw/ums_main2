<?php

App::uses('AppController', 'Controller');
App::uses('CakeNumber', 'Utility');
/**
 * Acctransactions Controller
 *
 * @property Acctransaction $Acctransaction
 */

class AcctransactionsController extends AppController {
	var $uses = array('Accbalance','Acctransaction','Acccodebalance','Receipt','Accstatus');
	//var $helpers =  array('Html', 'Ajax','Javascript','Form');
	
	public function beforeFilter() {
		parent::beforeFilter();
	//	$this->Auth->allow();
	}







/**
 * index method
 *
 * @return void
 */
	public function index ( ) {
	   

	   
	   
		// parameter
		// ---------
		// sitecode
		// transdate
		// drcr
		// acccode_id
		// url
		// event



		
		$transdate = $this->request->data('transdate');
		$sitecode = $this->request->data('sitecode');
		$acccode_id = $this->request->data('acccode_id');
		$drcr = $this->request->data('drcr');
		

		/*
		$transdate = '20150407';
		$sitecode = 'C05C008';
		$acccode_id = 7;
		$drcr = 'dr';
		*/



       	$this->autoRender = false;
		$this->Acctransaction->recursive = 2;
		//print_r($this->data);
		$transdate = ($transdate == null ? date('Ymd'): $transdate); 
		//$transdate = ( isset($this->data['theDate1'] )? $this->data['theDate1']:$transdate ); 
		
	
		
		/** Filter data **/
		$filter = array('Acctransaction.transdate'=>$transdate,'Acctransaction.sitecode'=>$sitecode);
		if ($acccode_id != null) {
			$filter['Acccode.parent_id'] = $acccode_id;
		} 
        if ($drcr != null) {
			$filter['Acctransaction.drcr'] = $drcr;
		}


		// $filter['Uploadfile.acctransaction_id'] = 136885;
        // $this->Acctransaction->contain(array('Acccode', 'Uploadfile'));
        // $this->Acctransaction->contain('Acccode');
        // $this->Acctransaction->contain('Uploadfile');
        // $this->Acctransaction->contain();


		// $path = $this->webroot;
		// $path = 'testing';
		$path = Router::url('/', true);
		$sql = $this->Acctransaction->find('all', array(
			'conditions' => $filter,
			'contain' => array(
				'Acccode',
				'Uploadfile'				
			),
		));
		
		// pr($path); die();
		// pr($sql); die();

		// echo json_encode($sql, array('path' => $path));
		echo json_encode(compact('sql', 'path'));

		/** end **/
		
        //$sum_receipt = $this->calculate($this->Auth->user('sitecode'),$today,$tomorrow) ;
       // $acccodes = $this->Acctransaction->Acccode->find('list',array('conditions'=>array('Acccode.reportas'=>$drcr)));
		//pr($sum_receipt);
	//	$this->set(compact('today','tomorrow','yesterday','sum_receipt','transdate','drcr','acccode_id','amount','acccodes'));
	}








/**
 * add method
 * @param date $transdate
 * @param string drcr ( Debit or Credit )
 * @return void
 */
	public function add($transdate = null, $drcr = null, $acccode = null) {	




		$this->layout = false;
		$transdate = ($transdate == null ? date('Ymd'):$transdate);
				





		if ($this->request->is('post')) {
			$this->autoRender = false;





			// check file size 1st or the checking is not work
			// post_max_size @ php.ini | local 10MB | live 8MB
	        $max_post_size = ini_get('post_max_size');
	        $content_length = $_SERVER['CONTENT_LENGTH'] / 1024 / 1024;
	        if ($content_length > $max_post_size ) {
				$data = array('success' => 0, 'msg' => "The acctransaction could not be saved. File size over server limit $max_post_size.");	
				echo json_encode($data);				                
	        }
			else {





				//check edit permission
				$editpermission = $this->Acctransaction->accstatus( $this->request->data['Acctransaction']['transdate'] , $this->Auth->user('sitecode'));





				if ($editpermission['edit_permission'] == false) {
					$data = array('success' => 0, 'msg' => "Can't add new , this account has been closed/submitted");
					echo json_encode($data);
				} 
				else {
					$check_type = 0;
					$check_size = 0;





					// check if upload is selected
					if (!empty($this->request->data['Acctransaction']['file']['name'])) {





						// get file info 								
						$uploadData = $this->request->data['Acctransaction']['file'];
						$ext = pathinfo($uploadData['name'], PATHINFO_EXTENSION);
						$filename = trim($this->Auth->user('sitecode')).'-'.trim($transdate).'-'.date('YmdHis').'.'.$ext;





						// check file type
						$allowed_types = array('jpg', 'png', 'pdf');
						if (!in_array(strtolower($ext), $allowed_types)) {
							$data = array('success' => 0, 'msg' => 'The acctransaction could not be saved. Please ensure the file type is allowed.');
						}
						else {
							$check_type = 1; // pass
						}



						// check file size (not over 5mb)
						$MAXIMUM_FILESIZE = 5 * 1024 * 1024; 
						if ($uploadData['size'] > $MAXIMUM_FILESIZE) {
							$data = array('success' => 0, 'msg' => 'The acctransaction could not be saved. Please ensure the file size is not over 5mb.');						
						}
						else {
							$check_size = 1;
						}

					}





					// not selected file upload
					else {
						$check_type = 2;
						$check_size = 2;
					}




					// insert new transaction
					$this->Acctransaction->create();
					$this->request->data['Acctransaction']['user_id'] = $this->Auth->user('id');
					$this->request->data['Acctransaction']['sitecode'] = $this->Auth->user('sitecode');	





					// if file upload is not selecting only save the record
					if ($check_type == 2 && $check_size == 2) {
						$this->Acctransaction->save($this->request->data);
						echo json_encode(array('success' => 1));
					}





					// if check on file upload is pass
					else if ($check_type == 1 && $check_size == 1) {
						// insert info transaction into database			
						if ($result = $this->Acctransaction->save($this->request->data)) {	

							// upload file to the server
							$uploaddir = $_SERVER['DOCUMENT_ROOT'].$this->webroot."app/webroot/img/account/";
							if (move_uploaded_file($uploadData['tmp_name'], $uploaddir.$filename)) {
								$status_upload = 1;
							}
							else {
								$status_upload = 0;
							}
							// insert upload file info into database
							if ($status_upload == 1) {
								$tran_id = $this->Acctransaction->getLastInsertId();
								$this->loadModel('Uploadfile');
				                $info = array(
				                    'user_id' => $this->Auth->user('id'),
				                    'acctransaction_id' => $tran_id,
				                    'sitecode' => $this->Auth->user('sitecode'),
				                    'type' => $uploadData['type'],
				                    'file' => $filename,
				                );
				                $this->Uploadfile->save($info);
							}	
							echo json_encode(array('success' => 1, 'msg' => 'Transaction insert successfully.'));
						}
						else {
	                		echo json_encode(array('success' => 0, 'msg' => 'Fail to insert data.'));													
						}   
			  	    } 





			  	    else {
			  	    	echo json_encode(array('success' => 0, 'msg' => $data['msg']));
			  	    }





				} // end check permission	


			}	




		}
		// end if form is submitted





		//$drcrs = array('dr'=>'Duit Masuk','cr'=>'Duit Keluar');		
		$this->request->data['Acctransaction']['drcr'] = (isset($this->request->data['Acctransaction']['drcr'])?$this->request->data['Acctransaction']['drcr']:$drcr);
		$this->request->data['Acctransaction']['acccode_id'] = $acccode;
        
        if ($acccode != null) {
            $acccodes = $this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'2','parent_id'=>$acccode)));
            $parent = $this->Acctransaction->Acccode->findById($acccode);
           	$this->set(compact('parent'));
        } 
        else {
            $drcr = ($drcr == 'dr')?1:2;
            $this->Acctransaction->Acccode->contain();
            $listParent = $this->Acctransaction->Acccode->find('all',array('conditions'=>array('level'=>'1','reportas'=>$drcr)));
             $listParent = Set::combine($listParent, '{n}.Acccode.id','{n}.Acccode.id');
             //pr($listParent);
            $acccodes = $this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'2','parent_id'=>$listParent)));        
        }		        
		$sitecode = $this->Auth->user('sitecode');        
		$users = $this->Acctransaction->User->find('list');
		$this->set(compact('acccodes', 'users','transdate','drcrs','drcr','sitecode','acccode'));
	}
   





/**
 * edit method
 *
 * @param date $transdate
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
	   	$this->layout = false;
		$this->Acctransaction->id = $id;



		//$transdate = ( $transdate == null ? date('Ymd'):$transdate );		
		if (!$this->Acctransaction->exists()) {
			throw new NotFoundException(__('Invalid acctransaction'));
		}

		// if form is submitted
		if ($this->request->is('post') || $this->request->is('put')) {
			$this->autoRender = false;	




	        $max_post_size = ini_get('post_max_size');
	        $content_length = $_SERVER['CONTENT_LENGTH'] / 1024 / 1024;
	        if ($content_length > $max_post_size ) {
				$data = array('success' => 0, 'msg' => "The acctransaction could not be saved. File size over server limit $max_post_size.");	
				echo json_encode($data);				                
	        }
			else {



				//check edit permission
				$editpermission = $this->Acctransaction->accstatus($this->request->data['Acctransaction']['transdate'], $this->Auth->user('sitecode'));
				if ($editpermission['edit_permission'] == false) {
					//$this->Session->setFlash(__("Can't add new , this account has been closed"));
					echo json_encode(array('success' => 0, 'msg' => "Can't edit, this account has been closed/submited"));
					//throw new NotFoundException(__('Invalid acctransaction'));
				} 
				else {





					$check_type = 0;
					$check_size = 0;





					// check if upload is selected
					if (!empty($this->request->data['Acctransaction']['file']['name'])) {





						$transdate = $this->request->data['Acctransaction']['transdate'];
						// get file info 								
						$uploadData = $this->request->data['Acctransaction']['file'];
						$ext = pathinfo($uploadData['name'], PATHINFO_EXTENSION);
						$filename = trim($this->Auth->user('sitecode')).'-'.trim($transdate).'-'.date('YmdHis').'.'.$ext;





						// check file type
						$allowed_types = array('jpg', 'png', 'pdf');
						if (!in_array(strtolower($ext), $allowed_types)) {
							$data = array('success' => 0, 'msg' => 'The acctransaction could not be saved. Please ensure the file type is allowed.');
						}
						else {
							$check_type = 1; // pass
						}



						// check file size (not over 5mb)
						$MAXIMUM_FILESIZE = 5 * 1024 * 1024; 
						if ($uploadData['size'] > $MAXIMUM_FILESIZE) {
							$data = array('success' => 0, 'msg' => 'The acctransaction could not be saved. Please ensure the file size is not over 5mb.');						
						}
						else {
							$check_size = 1;
						}

					}
					// not selected file upload
					else {
						$check_type = 2;
						$check_size = 2;
					}






					// // check if upload is selected
					// if (!empty($this->request->data['Acctransaction']['file']['name'])) {

					// 	// get file info 								
					// 	$uploadData = $this->request->data['Acctransaction']['file'];
					// 	$ext = pathinfo($uploadData['name'], PATHINFO_EXTENSION);
					// 	$filename = trim($this->Auth->user('sitecode')).'-'.trim($this->request->data['Acctransaction']['transdate']).'-'.date('YmdHis').'.'.$ext;

					// 	// upload original file
					// 	$uploaddir = $_SERVER['DOCUMENT_ROOT'].$this->webroot."app/webroot/img/account/";
					// 	if (move_uploaded_file($uploadData['tmp_name'], $uploaddir.$filename)) {
					// 		$upload = 1;
					// 	}  
					// 	else {
					// 		$upload = 0;
					// 	}	

					// 	// insert upload file info into database
					// 	$this->loadModel('Uploadfile');
		   //              $data = array(
		   //                  'user_id' => $this->Auth->user('id'),
		   //                  'acctransaction_id' => $id,
		   //                  'sitecode' => $this->Auth->user('sitecode'),
		   //                  'type' => $uploadData['type'],
		   //                  'file' => $filename,
		   //                  // 'file_resize' => 1,
		   //              );	
		   //              $this->Uploadfile->save($data);					
					// }	






					// if file upload is not selecting only save the record
					if ($check_type == 2 && $check_size == 2) {
						if ($this->Acctransaction->save($this->request->data)) {
						    echo json_encode(array('success' => 1, 'msg' => "Data is updated."));	 
			            } 
			            else {
							echo json_encode(array('success' => 0, 'msg' => "The acctransaction could not be saved. Please, try again."));
						}						
						// $this->Acctransaction->save($this->request->data);
						// echo json_encode(array('success' => 1));
					}





					// if check on file upload is pass
					else if ($check_type == 1 && $check_size == 1) {





						// insert info transaction into database			
						if ($result = $this->Acctransaction->save($this->request->data)) {	
							// upload file to the server
							$uploaddir = $_SERVER['DOCUMENT_ROOT'].$this->webroot."app/webroot/img/account/";
							if (move_uploaded_file($uploadData['tmp_name'], $uploaddir.$filename)) {
								$status_upload = 1;
							}
							else {
								$status_upload = 0;
							}
							// insert upload file info into database
							if ($status_upload == 1) {
								$tran_id = $this->Acctransaction->getLastInsertId();
								$this->loadModel('Uploadfile');
				                $info = array(
				                    'user_id' => $this->Auth->user('id'),
				                    'acctransaction_id' => $this->request->data['Acctransaction']['id'],
				                    'sitecode' => $this->Auth->user('sitecode'),
				                    'type' => $uploadData['type'],
				                    'file' => $filename,
				                );
				                $this->Uploadfile->save($info);
							}	
							echo json_encode(array('success' => 1, 'msg' => 'Transaction insert successfully.'));
						}




						else {
	                		echo json_encode(array('success' => 0, 'msg' => 'Fail to insert data.'));													
						}   
			  	    } 





			  	    else {
			  	    	echo json_encode(array('success' => 0, 'msg' => $data['msg']));
			  	    }




					// update transaction info
					// if ($this->Acctransaction->save($this->request->data)) {
					//     echo json_encode(array('success' => 1, 'msg' => "New data was add."));	 
		   //          } 
		   //          else {
					// 	echo json_encode(array('success'=>0,'msg'=>"The acctransaction could not be saved. Please, try again."));
					// }




					
				} // end edit permission



			}




		} 
		else {




			// $sql = $this->Acctransaction->find('all', array(
			// 	'conditions' => $filter,
			// 	'contain' => array(
			// 		'Acccode',
			// 		'Uploadfile'				
			// 	),
			// ));
			// $this->Acctransaction->contain(array('Acccode', 'Uploadfile'));
			// $sql = $this->Acctransaction->read(null, $id);
			// pr($sql); die();





		    // $this->Acctransaction->contain('Acccode');
			$this->Acctransaction->contain(array('Acccode', 'Uploadfile'));		    
			$this->request->data = $this->Acctransaction->read(null, $id);
		}
        //$drcrs = array('dr'=>'Duit Masuk','cr'=>'Duit Keluar');
		//	$acccodes = $this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'2','parent_id'=>$this->request->data['Acccode'])));
		//$users = $this->Acctransaction->User->find('list');
		//$this->set(compact('acccodes', 'users','drcrs','transdate'));
	}









/**
 * entry method
 *
 * @return void
 */
	public function entry ( $transdate = null) {
	
        if ( $this->Auth->user('group_id') == 4) {
            $sites = $this->Acctransaction->Site->find('list',array('conditions'=>array('id'=>$this->Auth->user('sitecode'))));
        } else {
           // $sites = $this->Acctransaction->Site->find('list'); 
           $sites = $this->Acctransaction->Site->find('list',array('fields'=>array('id','dropdown_sitename'))); 
		}
        
        //$sites = $this->Acctransaction->Site->find('list'); 
		$transdate  = ($transdate == null?date('Ymd'):$transdate );
		$year = substr($transdate,0,4);
		$month = substr($transdate,4,2);
		
		$incomeHeader =  $this->Acctransaction->Acccode->find('list',array('conditions'=>array('parent_id'=>0,'reportas'=>1)));
		$expenseHeader = $this->Acctransaction->Acccode->find('list',array('conditions'=>array('parent_id'=>0,'reportas'=>2)));
		
        $this->set(compact('sites','incomeHeader','expenseHeader','year','month'));
	}
	





    /**
 * entry method
 *
 * @return void
 */
	public function accview ( ) {
        $incomeHeader =  $this->Acctransaction->Acccode->find('list',array('conditions'=>array('parent_id'=>0,'reportas'=>1)));
		
		$expenseHeader =	 $this->Acctransaction->Acccode->find('list',array('conditions'=>array('parent_id'=>0,'reportas'=>2)));
        $this->set(compact('incomeHeader','expenseHeader','acccodeheaders','numDay','year','month'));
	}
	
	
	
	
	
    
    public function accJson($transdate = null) {
        $this->layout = 'ajax';
        
        if( $this->Auth->user('group_id') == 1  or $this->Auth->user('group_id') == 5 or  $this->Auth->user('group_id') == 7 or $this->Auth->user('group_id') == 2) {
            $this->Session->write('Auth.User.sitecode',$this->data['sitecode'] );
        }

        $acc = $this->Acctransaction->expenseHeader($this->data['transmonth'], $this->Auth->user('sitecode'));
        $this->Acctransaction->Acccode->contain();
        $acc['income'] =  $this->Acctransaction->Acccode->find('all',array('fields'=>array('Acccode.id','Acccode.name'),'conditions'=>array('Acccode.parent_id'=>0,'Acccode.reportas'=>1),'order'=>array('Acccode.reportas_seq')));
        $this->Acctransaction->Acccode->contain();
        $acc['expense'] =	 $this->Acctransaction->Acccode->find('all',array('fields'=>array('Acccode.id','Acccode.name'),'conditions'=>array('Acccode.parent_id'=>0,'Acccode.reportas'=>2),'order'=>array('Acccode.reportas_seq')));
        // pr($acc); die();
        $this->set('acc',$acc);
    }

	
    
    




/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null , $transdate = null) {
	
		$transdate = ( $transdate == null ? date('Ymd'):$transdate );
		
		$this->Acctransaction->id = $id;
		if (!$this->Acctransaction->exists()) {
			throw new NotFoundException(__('Invalid acctransaction'));
		}

		$this->set('acctransaction', $this->Acctransaction->read(null, $id));
		$this->set(compact('transdate'));
	}














/**
 * delete method
 *
 * @param string $id    
 * @param date $transdate
 * @return void
 */
	public function delete($id = null,$transdate = null ,$drcr =null,$acccode =null) {
	
	
		$transdate = ( $transdate == null ? date('Ymd'):$transdate );
		
		//check edit permission
		$editpermission = $this->Acctransaction->accstatus( substr($transdate,0,6) , $this->Auth->user('sitecode'));
		if ( $editpermission['edit_permission'] == false) {
			$this->Session->setFlash(__("Can't delete , this account has been closed/submited"));
			$this->redirect(array('action' => 'view',$id,$transdate));

			if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
			}
			$this->Acctransaction->id = $id;
	        $this->request->data = $this->Acctransaction->read(null, $id);
			if (!$this->Acctransaction->exists()) {
				throw new NotFoundException(__('Invalid acctransaction'));
			}
			
			if ($this->Acctransaction->delete()) {
				//$this->Session->setFlash(__('Acctransaction deleted'));
	            //$this->request->data = $this->Acctransaction->read(null, $id);
				//$this->Session->setFlash(__('The acctransaction has been saved'));
	                //$this->Acctransaction->afterSave(true,$id);
	            //$acccodes = $this->Acctransaction->Acccode->findById($this->request->data['Acctransaction']['acccode_id']);
	                
	           //$action = array('controller'=>'acctransactions','action'=>'index',$transdate ,$drcr);
			//	$this->closepopup($transdate,$acccodes['Acccode']['parent_id'], $this->Auth->user('sitecode'),$action);
				//$this->redirect(array('action' => 'closepopup',null,$transdate,$drcr));
			}
			//$this->Session->setFlash(__('Acctransaction was not deleted'));
			//$this->redirect(array('action' => 'index',$transdate ));
		}
	

	}





	public function deleteFile($id = null) {
        $this->autoRender = false;		
        $this->loadModel('Uploadfile');
        $i = $this->Uploadfile->find('first', array('conditions' => array('Uploadfile.acctransaction_id' => $id)));
        if (!empty($i)) {
        	// delete attachment from server
			$dir = $_SERVER['DOCUMENT_ROOT'].$this->webroot."app/webroot/img/account/";
			if (unlink($dir.$i['Uploadfile']['file'])) {
				$data['file'] = 1;
			}
			else {
				$data['file'] = 0;
			}
			// delete record from database	
			$sql = $this->Uploadfile->deleteAll(array('Uploadfile.acctransaction_id' => $id));
			if ($sql) {
				$this->Acctransaction->contain(array('Acccode', 'Uploadfile'));	
				$data = $this->Acctransaction->read(null, $id);
				$data['success'] = 1;
				$data['msg'] = 'Attachment was deleted';
			 	echo json_encode($data);
			}
			else {
				echo json_encode(array('success' => 0, 'msg' => "The acctransaction could not be delete. Please, try again."));
			}		
		}
		else {
			echo json_encode(array('success' => 0, 'msg' => "The acctransaction could not be delete. Please, try again."));
		}
	}






/**
 * delete method
 *
 * @param string $id    
 * @param date $transdate
 * @return void
 */
	public function deleteJson($id = null) {	
        $this->autoRender = false;
        if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Acctransaction->contain('Acccode');
		$this->Acctransaction->id = $id;
        $data = $this->Acctransaction->read(null, $id);
       // pr($data);

        //check edit permission
		$editpermission = $this->Acctransaction->accstatus(  $data['Acctransaction']['transdate'], $data['Acctransaction']['sitecode']);
		//pr($editpermission );
		if ( $editpermission['edit_permission'] == false) {
			echo json_encode(array('success'=>0,'msg'=>"Can't delete , this account has been closed/submited"));
			//$this->redirect(array('action' => 'view',$id,$transdate));
		} 
		else {
			if (!$this->Acctransaction->exists()) {
				throw new NotFoundException(__('Invalid acctransaction'));
			}			
			if ($this->Acctransaction->delete()) {




	   //      	// delete attachment from server
				// $dir = $_SERVER['DOCUMENT_ROOT'].$this->webroot."app/webroot/img/account/";
				// if (unlink($dir.$i['Uploadfile']['file'])) {
				// 	$data['file'] = 1;
				// }
				// else {
				// 	$data['file'] = 0;
				// }
				// // delete record from database	
				// $sql = $this->Uploadfile->deleteAll(array('Uploadfile.acctransaction_id' => $id));




				$data['success'] = 1;
				$data['msg'] = 'Acctransaction was deleted';
			 	echo json_encode( $data);
			} 
			else {
					//$this->Session->setFlash(__('The acctransaction could not be saved. Please, try again.'));
				echo json_encode(array('success'=>0,'msg'=>"The acctransaction could not be delete. Please, try again."));
			}
		}
			
	
	}


	
	




	public function listdaydetail ($tahun=null,$bulan=null,$hari=null) {
	
		if ($hari==null){
			$hari=date('d');
		}
		if ($bulan==null){
			$bulan=date('m');
		}
		if ($tahun==null){
			$tahun=date('Y');
		}
		
			
		   
		$tarikh=$tahun.$bulan.$hari;
	//pr($first);
	//pr($last);
	
		$headers=$this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'1')));
		$acctransactions=$this->Acctransaction->find(
			'all',
			 array(
				'order' => array('transdate' => 'ASC'),
				'conditions'=>array('transdate' =>$tarikh )
			  //'group'=>'transdate',
              //'fields'=>array('sum(amount) AS total_sum')
				 ));
		 
		
		
		$this->Acctransaction->read(null,$hari,$bulan,$tahun);
		$this->set(compact('acctransactions','headers','hari','bulan','tahun'));
  	
		//pr($bulan);
		if ($this->request->is('post')){
			$hari=$this->data['Acctransaction']['created']['day'];
			$bulan=$this->data['Acctransaction']['mob']['month'];
			$tahun=$this->data['Acctransaction']['Year']['year'];
			$this->redirect(array('controller' => 'acctransactions', 'action' => 'listdaydetail',$tahun,$bulan,$hari));	
		}
	}






	public function listmonthdetail ($bulan=null,$tahun=null) {
	//pr($this->request->data);
		if ($this->request->data){
			$bulan=$this->request->data['Acctransaction']['mob']['month'];
			$tahun=$this->request->data['Acctransaction']['Year']['year'];
			}
		
		(!isset($bulan)?$bulan=date('m'):"");
		(!isset($tahun)?$tahun=date('Y'):"");
	
		$first = $tahun.$bulan."01";
		$bulan2=$bulan+1;
	   
		if ($bulan2>=10){
			if ($bulan2==13){
				$last = $tahun."12"."32";
			}else{
				$last = $tahun.$bulan2."01";
			}
		}
		if ($bulan2<10){
			$last = $tahun."0".$bulan2."01";
		}
			
		$headers=$this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'1')));
		$acctransactions=$this->Acctransaction->find('all',array(
						'order' => array('transdate' => 'ASC'),
						'conditions'=>array('transdate >=' => $first,'transdate <' => $last )
						// 'conditions'=>array('transdate >=' => 20121120,'transdate <' => 20121122 )
					   //'group'=>'transdate',
					   //'fields'=>array('sum(amount) AS total_sum')
						));
		$ds=array();
		$dr=array();
		$cr=array();
		$jumlahdebit=0;
		$jumlahcredit=0;
		
		foreach($acctransactions as $key=>$row):
			$date=$row['Acctransaction']['transdate'];
			$parentid = $row['Acccode']['parent_id'];
			$amount=$row['Acctransaction']['amount'];
					
			$ds[$date]['transdate']=$row['Acctransaction']['transdate'];
			if (!isset($ds[$date]['debit'])){$ds[$date]['debit']=null;}
			if (!isset($ds[$date]['credit'])){$ds[$date]['credit']=null;}
			if (!isset($ds[$date]['dr'][$parentid])){$ds[$date]['dr'][$parentid]=null;}
			if (!isset($ds[$date]['cr'][$parentid])){$ds[$date]['cr'][$parentid]=null;}
			if (!isset($ds[$date]['baki'])){$ds[$date]['baki']=null;}
			
		
			if ($row['Acctransaction']['drcr']=='dr'){
				$ds[$date]['debit']+=$amount;
				$ds[$date]['dr'][$parentid]+=$amount;
				$jumlahdebit+=$amount;
				
				foreach($headers as $p=>$header):
					if (!isset($dr[$p])){
						$dr[$p]=null;
						}
					if ($parentid==$p){
						$dr[$p]+=$amount;
						}
				endforeach;
			
			}
			
			if($row['Acctransaction']['drcr']=='cr'){
				$ds[$date]['credit']+=$amount;
				$ds[$date]['cr'][$parentid]+=$amount;
				$jumlahcredit+=$amount;
				
				foreach($headers as $p=>$header):
					if (!isset($cr[$p])){
						$cr[$p]=null;
					}
					if ($parentid==$p){
						$cr[$p]+=$amount;
					}
				endforeach;
			}
		
			//pr($cr);
			//get new array baki
			$ds[$date]['totaldebit']=$jumlahdebit;;
			$ds[$date]['totalcredit']=$jumlahcredit;
			$ds[$date]['baki']=$jumlahdebit-$jumlahcredit;
		endforeach;
	
	

	/*get data from browser
	$this->Acctransaction->read(null,$tahun,$bulan);*/
	
		$this->set(compact('acctransactions','headers','bulan','tahun','ds','dr','cr'));pr($dr);
		if ($this->request->is('post')) {
			$bulan=$this->data['Acctransaction']['mob']['month'];
			$tahun=$this->data['Acctransaction']['Year']['year'];
		}
	}
		
		
		
	public function listmonthdetailpdf ($tahun=null,$bulan=null) {//////////////////////////////////////////////////////////////////
	$this->Acctransaction->read(null,$tahun,$bulan);
	$this->response->type('pdf'); //call pdf important 2.1
					$this->layout = 'pdf'; 
	
	(!isset($tahun)?$tahun=date('Y'):"");
  	(!isset($bulan)?$bulan=date('m'):"");
	
	
	$first = $tahun.$bulan."01";
	$bulan2=$bulan+1;
   
	if ($bulan2>=10){
		if ($bulan2==13){
			$last = $tahun."12"."32";
		}else{
			$last = $tahun.$bulan2."01";
		}
	}
	if ($bulan2<10){
		$last = $tahun."0".$bulan2."01";
	}
		
	$headers=$this->Acctransaction->Acccode->find('list',array('conditions'=>array('level'=>'1')));
	$acctransactions=$this->Acctransaction->find('all',array(
                                                             'order' => array('transdate' => 'ASC'),
															'conditions'=>array('transdate >=' => $first,'transdate <' => $last )
		                                                    // 'conditions'=>array('transdate >=' => 20121120,'transdate <' => 20121122 )
			                                                   //'group'=>'transdate',
                                                               //'fields'=>array('sum(amount) AS total_sum')
                                                      ));
		$ds=array();
		$dr=array();
		$cr=array();
		$jumlahdebit=0;
		$jumlahcredit=0;
		
foreach($acctransactions as $key=>$row):
		$date=$row['Acctransaction']['transdate'];
		$parentid = $row['Acccode']['parent_id'];
		$amount=$row['Acctransaction']['amount'];
				
		$ds[$date]['transdate']=$row['Acctransaction']['transdate'];
		if (!isset($ds[$date]['debit'])){$ds[$date]['debit']=null;}
	    if (!isset($ds[$date]['credit'])){$ds[$date]['credit']=null;}
		if (!isset($ds[$date]['dr'][$parentid])){$ds[$date]['dr'][$parentid]=null;}
		if (!isset($ds[$date]['cr'][$parentid])){$ds[$date]['cr'][$parentid]=null;}
		if (!isset($ds[$date]['baki'])){$ds[$date]['baki']=null;}
		
		
	 	if ($row['Acctransaction']['drcr']=='dr'){
	     	$ds[$date]['debit']+=$amount;
			$ds[$date]['dr'][$parentid]+=$amount;
			$jumlahdebit+=$amount;
			
			foreach($headers as $p=>$header):
				if (!isset($dr[$p])){
					$dr[$p]=null;
					}
				if ($parentid==$p){
					$dr[$p]+=$amount;
					}
			
			endforeach;
			
		}
		if($row['Acctransaction']['drcr']=='cr'){
	 		$ds[$date]['credit']+=$amount;
			$ds[$date]['cr'][$parentid]+=$amount;
			$jumlahcredit+=$amount;
			foreach($headers as $p=>$header):
				if (!isset($cr[$p])){
					$cr[$p]=null;
					}
				if ($parentid==$p){
					$cr[$p]+=$amount;
					}
			endforeach;
		}
		
	//pr($cr);
		//get new array baki
	$ds[$date]['totaldebit']=$jumlahdebit;;
	$ds[$date]['totalcredit']=$jumlahcredit;
	$ds[$date]['baki']=$jumlahdebit-$jumlahcredit;
endforeach;
	
	

	/*get data from browser
	$this->Acctransaction->read(null,$tahun,$bulan);*/
	
	$this->set(compact('acctransactions','headers','bulan','tahun','ds','dr','cr'));
  	
}
			
		
	/**
 * financial method
 *
 * 
 */
	public function financial ($page=null) {
	$headers = $this->Acccodebalance->Acccode->find('list',array(
																	
																	'conditions'=>array('level'=>1)
																	));
	
	$month=array(
				'Jan'=>201201,
				'Feb'=>201202,
				'Mar'=>201203,
				'Apr'=>201204,
				'May'=>201205,
				'Jun'=>201206,
				'Jul'=>201207,
				'Aug'=>201208,
				'Sep'=>201209,
				'Oct'=>201210,
				'Nov'=>201211,
				'Dec'=>201212);
				
	
	
	foreach($month as $keymon=> $mon):
	$detail[$mon] =$this->accheaderdetail($mon, $this->Auth->user('sitecode'));
	endforeach;
	$this->set(compact('detail','month','page','headers'));
	
	}
	
	public function financialpdf () {
					//Configure::write('debug',0);
					$this->response->type('pdf'); //call pdf important 2.1
					$this->layout = 'pdf'; 
					$headers = $this->Acccodebalance->Acccode->find('list',array('conditions'=>array('level'=>1)));
					$month=array(
								'Jan'=>201201,
								'Feb'=>201202,
								'Mar'=>201203,
								'Apr'=>201204,
								'May'=>201205,
								'Jun'=>201206,
								'Jul'=>201207,
								'Aug'=>201208,
								'Sep'=>201209,
								'Oct'=>201210,
								'Nov'=>201211,
								'Dec'=>201212);
				
	//for ($i =1 ;$i=<12;$i++){
	//$transmonth ='201204';
	foreach($month as $keymon=> $mon):
	$detail[$mon] =$this->accheaderdetail($mon, $this->Auth->user('sitecode'));
	endforeach;
	$this->set(compact('detail','month','headers'));
	
	}
	
	
	
	/**
 * listmonth method
 *
 * @param transmonth ex : 201204,201203
 */
	public function listmonth ( $transmonth = null) {
		
		$transmonth = ($transmonth == null?date('Ym'):$transmonth);
		$transmonth = ( !empty($this->data)? $this->data['Acctransaction']['Year']['year'].$this->data['Acctransaction']['mob']['month']:$transmonth );
			
		$lastmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) - 1, 1 , substr($transmonth,0,4)));
		$thismonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) , 1 , substr($transmonth,0,4)));
		$nextmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) + 1, 1 , substr($transmonth,0,4)));
		
		$accdetail = $this->accdetail($transmonth,$this->Auth->user('sitecode'));
		
		
		$this->set(compact('lastmonth_transmonth','thismonth_transmonth','nextmonth_transmonth','accdetail'));
	}
	
/**
 * listmonth method : level admin
 *
 * @param transmonth ex : 201204,201203
 */
	public function admin_listmonth ( $transmonth = null ,$sitecode = null ) {
		
		$transmonth = ($transmonth == null?date('Ym'):$transmonth);
		$transmonth = ( !empty($this->data)? $this->data['Acctransaction']['Year']['year'].$this->data['Acctransaction']['mob']['month']:$transmonth );
			
		$lastmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) - 1, 1 , substr($transmonth,0,4)));
		$thismonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) , 1 , substr($transmonth,0,4)));
		$nextmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) + 1, 1 , substr($transmonth,0,4)));
		
		$accdetail = $this->accdetail($transmonth,$sitecode);
		
		
		$this->set(compact('lastmonth_transmonth','thismonth_transmonth','nextmonth_transmonth','accdetail','sitecode'));
	}

/**
 * listyear method : list yearly account transaction
 *
 * @param transyear ex : 2012,2013
 */
	public function listyear ( $transyear = null) {
		
		$transyear = ($transyear == null?date('Y'):$transyear);
		//$transyear = ( !empty($this->data)? $this->data['Acctransaction']['Year']['year'].$this->data['Acctransaction']['mob']['month']:$transmonth );
		
		for ($i=1;$i <= 12 ; $i++ ) {
			
			$transmonth = date('Ym',mktime(0, 0, 0, $i, 1 , $transyear));
			$accdetails[$transmonth] = $this->accdetail($transmonth,$this->Auth->user('sitecode'));
			
			if ( date('m') == $i and $transyear == date('Y')) {
				
				break;
			}
			
		
		}
	
		$this->set(compact('accdetails','transyear'));
	}
	

/**
 * admin_listyear method : list yearly account transaction for level admin
 *
 * @param transyear ex : 2012,2013
 */
	public function admin_listyear ( $transyear = null, $sitecode = null ) {
		
		$sitecode = ( !empty($this->data)? $this->data['Acctransaction']['site']:$sitecode );
		
		
			
			$this->request->data['Acctransaction']['site'] = $sitecode;
			$transyear = ($transyear == null?date('Y'):$transyear);
			//pr($this->request->data);
			//$transyear = ( !empty($this->data)? $this->data['Acctransaction']['Year']['year'].$this->data['Acctransaction']['mob']['month']:$transmonth );

			
			for ($i=1;$i <= 12 ; $i++ ) {
				
				$transmonth = date('Ym',mktime(0, 0, 0, $i, 1 , $transyear));
				if ( $sitecode != null ) {
					$accdetails[$transmonth] = $this->accdetail($transmonth,$sitecode);
				} else {
					$accdetails[$transmonth] = $this->admin_accdetail($transmonth,$sitecode);
				}
				
				if ( date('m') == $i and $transyear == date('Y')) {
					
					break;
				}
				
			
			}
			//pr($accdetail);
			$this->set(compact('accdetails'));
		
		$sites = $this->Acctransaction->Site->find('list');
		//pr($sites);
		$this->set(compact('sites','sitecode','transyear'));
	}
	
	
/**
 * closeaccount method
 *
 * @param transmonth ex : 201204,201203
 */
 
	public function closeaccount( $transmonth = null , $sitecode = null) {
		
		if ( $transmonth == null ) {
			$this->Session->setFlash(__("Can't close this account"));
		} 

		$sitecode = ( $sitecode == null ? $this->Auth->user('sitecode'):$sitecode );

		if (  $this->accstatus( $transmonth , $this->Auth->user('sitecode')) == 'open'  and  $transmonth != date('Ym') ) {
			$accdetail = $this->accdetail( $transmonth,$sitecode  );
			
			$this->Accbalance->save(array('code'=>'H','transmonth'=>$transmonth,'bf'=>$accdetail['accbalance_hand']['bf'],'dr'=>$accdetail['accbalance_hand']['dr'],'cr'=>$accdetail['accbalance_hand']['cr'],'bal'=>$accdetail['accbalance_hand']['bal'],'sitecode'=>$sitecode));
			$this->Accbalance->save(array('code'=>'B','transmonth'=>$transmonth,'bf'=>$accdetail['accbalance_bank']['bf'],'dr'=>$accdetail['accbalance_bank']['dr'],'cr'=>$accdetail['accbalance_bank']['cr'],'bal'=>$accdetail['accbalance_bank']['bal'],'sitecode'=>$sitecode));
		
			foreach ( $accdetail['acccodes'] as $id=>$acc ) {
				$this->Acccodebalance->save(array('acccode_id'=>$id,'transmonth'=>$transmonth,'dr'=>$acc['dr'],'cr'=>$acc['cr'],'sitecode'=>$sitecode));
			}
			
			$this->Closedaccount->save(array('Closedaccount'=>array('sitecode'=>$sitecode,'transmonth'=>$transmonth)));
			
			$nextmonth_transmonth = date('Ym',mktime(0, 0, 0, substr($transmonth,4,2) + 1, 1 , substr($transmonth,0,4)));
			//echo 'ayam';
			
			
			$i =0;
			if ( $nextmonth_transmonth < date('Ym') ) {
			
				do {
				
					if ( $this->accstatus( $nextmonth_transmonth , $this->Auth->user('sitecode')) == 'closed' )  {
						$this->update_bf( $nextmonth_transmonth , $sitecode  ) ;
					
					} else {
						$this->redirect(array('action' => 'listmonth',$transmonth ));
						exit;
					
					}
					
					$nextmonth_transmonth = date('Ym',mktime(0, 0, 0, substr($nextmonth_transmonth,4,2) + 1, 1 , substr($nextmonth_transmonth,0,4)));
					
					
				} while ( $nextmonth_transmonth < date('Ym') );
			
			} else {
				$this->Session->setFlash(__("Can't close this account"));
			}
		}
		$this->redirect(array('action' => 'listmonth',$transmonth,$sitecode ));
		
	}
	
/**
 * transmonth method
 *
 * @param transmonth ex : 201204,201203
 */
 
	public function accdetail( $transmonth = null , $sitecode = null ) {
	
		$data =array();
		$this->Acctransaction->contain();
		
		$transmonth = ($transmonth == null?date('Ym'):$transmonth);
		$lastmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) - 1, 1 , substr($transmonth,0,4)));
		$thismonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) , 1 , substr($transmonth,0,4)));
		$nextmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) + 1, 1 , substr($transmonth,0,4)));
		
		/** Check account close or not **/
		$closedacc = $this->accstatus($transmonth,$sitecode);
			
		if ($closedacc == 'closed') {
		
			$this->Accbalance->contain();
			$accbalance_hand = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($thismonth_transmonth,0,6),"Accbalance.code='H'","Accbalance.sitecode='".$sitecode."'")));
			$accbalance_bank = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($thismonth_transmonth,0,6),"Accbalance.code='B'","Accbalance.sitecode='".$sitecode."'")));
		
			$accbalance_bank = $accbalance_bank[0]['Accbalance'];
			
			$this->Acccodebalance->contain('Acccode');
			$acccodebalances = $this->Acccodebalance->find('all',array('fields','conditions'=>array('Acccodebalance.transmonth ='.substr($thismonth_transmonth,0,6),"Acccodebalance.sitecode='".$sitecode."'")));
			
			foreach ($acccodebalances as $acccodebalance) {
				$cccodes[$acccodebalance['Acccode']['id']] = array('name'=>$acccodebalance['Acccode']['name'],'dr'=>$acccodebalance['Acccodebalance']['dr'],'cr'=>$acccodebalance['Acccodebalance']['cr']);
			}
			
			$accbalance_hand = $accbalance_hand[0]['Accbalance'];
			
			
		} else if ($closedacc == 'open') {
		
			$accbalance_bank = array('dr'=>0,'cr'=>0,'bal'=>0,'bf'=>0);
			
			$acccodes = $this->Acccodebalance->Acccode->find('list',array('fields'=>array('id','name')));
			foreach ($acccodes as $id=>$acccode) {
				$cccodes[$id] = array('name'=>$acccode,'dr'=>0,'cr'=>0);
			}

			$accbalance = array();
			$acctransactions = $this->Acctransaction->find('all',array('conditions'=>array('Acctransaction.transdate >='.$thismonth_transmonth,'Acctransaction.transdate <'.$nextmonth_transmonth,"Acctransaction.sitecode='".$sitecode."'")));
			
			$accbalance_hand = array('dr'=>0,'cr'=>0,'bal'=>0,'bf'=>0);
			$accbalance_bank = array('dr'=>0,'cr'=>0,'bal'=>0,'bf'=>0);
			
			foreach ( $acctransactions as $acctransaction) {
				$code =substr($acctransaction['Acctransaction']['acccode_id'],0,1);

				$cccodes[$acctransaction['Acctransaction']['acccode_id']][$acctransaction['Acctransaction']['drcr']] += $acctransaction['Acctransaction']['amount'];
				if (isset($acccodebalances[$acctransaction['Acctransaction']['acccode_id']][$acctransaction['Acctransaction']['drcr']])) {
					$acccodebalances[$acctransaction['Acctransaction']['acccode_id']][$acctransaction['Acctransaction']['drcr']] += $acctransaction['Acctransaction']['amount'];
				}
				
				if ($code == 'H') {
					$accbalance_hand[$acctransaction['Acctransaction']['drcr']] += $acctransaction['Acctransaction']['amount']; 
					
				} elseif ($code == 'B') {
				
					if ( $acctransaction['Acctransaction']['drcr'] == 'cr' ) {
						$accbalance_hand['cr'] += $acctransaction['Acctransaction']['amount']; 
						$accbalance_bank['dr'] += $acctransaction['Acctransaction']['amount']; 
						
					} elseif ( $acctransaction['Acctransaction']['drcr'] == 'dr' ) {
						$accbalance_hand['dr'] += $acctransaction['Acctransaction']['amount']; 
						$accbalance_bank['cr'] += $acctransaction['Acctransaction']['amount']; 
					}
									
				}
			}
			
			$accbalance_lastmonth_hand = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($lastmonth_transmonth,0,6),"Accbalance.code='H'","Accbalance.sitecode='".$sitecode."'")));
			$accbalance_lastmonth_bank = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($lastmonth_transmonth,0,6),"Accbalance.code='B'","Accbalance.sitecode='".$sitecode."'")));
			
			if (!empty($accbalance_lastmonth_hand ) or !empty($accbalance_lastmonth_bank )) {
				$accbalance_hand['bf'] = (!empty($accbalance_lastmonth_hand )?$accbalance_lastmonth_hand[0]['Accbalance']['bal']:'error : No record');
				$accbalance_bank['bf'] = (!empty($accbalance_lastmonth_bank )?$accbalance_lastmonth_bank[0]['Accbalance']['bal']:'error : No record');
			} else {
				$accbalance_hand['bf'] = 0;
				$accbalance_bank['bf'] = 0;
			}
			
			$accbalance_hand['bal'] = $accbalance_hand['bf'] + $accbalance_hand['dr'] - $accbalance_hand['cr'];
			$accbalance_bank['bal'] = $accbalance_bank['bf'] + $accbalance_bank['dr'] - $accbalance_bank['cr'];
			
		}
	
		return array('acccodes'=>$cccodes,'accbalance_hand'=>$accbalance_hand,'accbalance_bank'=>$accbalance_bank,'accclosed'=>$closedacc);

	}
	
/**
 *  method
 *
 * @param transmonth ex : 201204,201203
 */
 
	public function accheaderdetail( $transmonth = null , $sitecode = null ) {
	
		$accdetails = $this->accdetail( $transmonth, $sitecode);
		$acccodes = $this->Acccodebalance->Acccode->find('list',array('fields'=>array('id','name','parent_id')));
		
		$accheaderdetail =array();
		$totalAllDr =0;
		$totalAllCr =0;
		
		foreach ($acccodes[0] as $id=>$name) {
			//pr($name);
			
			$totalDr = 0;
			$totalCr = 0;
			
			foreach($acccodes[$id] as $idChild=>$nameChild){
			//pr($nameChild);
				
			   // $accdetails['acccodes'][$idChild]['name'];
				
				$totalDr += (isset($accdetails['acccodes'][$idChild]['dr'])?$accdetails['acccodes'][$idChild]['dr']:0);
				$totalCr += (isset($accdetails['acccodes'][$idChild]['cr'])?$accdetails['acccodes'][$idChild]['cr']:0);
				
			}
			$totalAllDr += $totalDr;
			$totalAllCr += $totalCr;
			$accheaderdetail[$id] = array('name'=>$name,'dr'=>$totalDr,'cr'=>$totalCr);
		}
		$accheaderdetails['detail'] = $accheaderdetail;
		$accheaderdetails['total'] = array('dr'=>$totalAllDr,'cr'=>$totalAllCr);
		$accheaderdetails['bakisemasa'] = $totalAllDr-$totalAllCr;//baki bulan lepas belum ada
		return $accheaderdetails;

	}		
/**
 * admin_accdetail method : get all account
 *
 * @param transmonth ex : 201204,201203
 */
 
	public function admin_accdetail( $transmonth = null  ) {
	
		$data =array();
		$this->Acctransaction->contain();
		
		$transmonth = ($transmonth == null?date('Ym'):$transmonth);
		$lastmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) - 1, 1 , substr($transmonth,0,4)));
		$thismonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) , 1 , substr($transmonth,0,4)));
		$nextmonth_transmonth = date('Ymd',mktime(0, 0, 0, substr($transmonth,4,2) + 1, 1 , substr($transmonth,0,4)));
		
		/** Check account close or not **/
		$num_closedacc = $this->Closedaccount->find('all',array('group by'=>'Closedaccount.transmonth ','fields'=>'count(Closedaccount.sitecode) as c','conditions'=>array('Closedaccount.transmonth ='.substr($transmonth ,0,6))));
		//$num_closedacc = $this->Closedaccount->find('all',array('group by'=>'Closedaccount.transmonth ','fields'=>'count(Closedaccount.sitecode) as c','conditions'=>array('Closedaccount.transmonth ='.substr($transmonth ,0,6))));

		$closedacc = $num_closedacc[0][0]['c'];
	//	pr($closedacc);
			
	
		
		$this->Accbalance->contain();
		$accbalance_hand = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($thismonth_transmonth,0,6),"Accbalance.code='H'")));
		$accbalance_bank = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.substr($thismonth_transmonth,0,6),"Accbalance.code='B'")));
		
			
			
		$this->Acccodebalance->contain('Acccode');
		$acccodebalances = $this->Acccodebalance->find('all',array('fields','conditions'=>array('Acccodebalance.transmonth ='.substr($thismonth_transmonth,0,6))));
			
		foreach ($acccodebalances as $acccodebalance) {
			$cccodes[$acccodebalance['Acccode']['id']] = array('name'=>$acccodebalance['Acccode']['name'],'dr'=>$acccodebalance['Acccodebalance']['dr'],'cr'=>$acccodebalance['Acccodebalance']['cr']);
		}
			
		//if (!empty($accbalance_bank))
		$accbalance_bank = $accbalance_bank[0]['Accbalance'];
		//if (!empty($accbalance_hand))
		$accbalance_hand = $accbalance_hand[0]['Accbalance'];
			
			
			
	
	
		return array('acccodes'=>$cccodes,'accbalance_hand'=>$accbalance_hand,'accbalance_bank'=>$accbalance_bank,'accclosed'=>$closedacc);

	}

	
/**
 *  update_bf method : update brought forward value
 *
 * @param transmonth ex : 201204,201203
 * @param sitecode 
 */	
	
	public function update_bf ( $transmonth = null , $sitecode = null ) {
		
		$this->Accbalance->contain();
		$lastmonth_transmonth = date('Ym',mktime(0, 0, 0, substr($transmonth,4,2) - 1, 1 , substr($transmonth,0,4)));
		
		$bf_hand  = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.$lastmonth_transmonth,"Accbalance.code='H'","Accbalance.sitecode='".$sitecode."'"),'fields'=>'Accbalance.bal'));
		$bf_bank  = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.$lastmonth_transmonth,"Accbalance.code='B'","Accbalance.sitecode='".$sitecode."'"),'fields'=>'Accbalance.bal'));
		
		$accbalance_hand = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.$transmonth,"Accbalance.code='H'","Accbalance.sitecode='".$sitecode."'")));
		$accbalance_bank = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth ='.$transmonth,"Accbalance.code='B'","Accbalance.sitecode='".$sitecode."'")));
		
		$this->Accbalance->query("UPDATE accbalances SET bf=".$bf_hand[0]['Accbalance']['bal'].", bal=".($bf_hand[0]['Accbalance']['bal'] + $accbalance_hand[0]['Accbalance']['dr'] - $accbalance_hand[0]['Accbalance']['cr'])." WHERE code='H' and transmonth=".$transmonth." and sitecode='".$sitecode."'");
		$this->Accbalance->query("UPDATE accbalances SET bf=".$bf_bank[0]['Accbalance']['bal'].", bal=".($bf_bank[0]['Accbalance']['bal'] + $accbalance_bank[0]['Accbalance']['dr'] - $accbalance_bank[0]['Accbalance']['cr'])." WHERE code='B' and transmonth=".$transmonth." and sitecode='".$sitecode."'");
		
	}
	

/**
 * calculate method : sum receipt 
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
		
		return array('name'=>'Penggunaan Komputer / Internet','dr'=>$sum_paid,'code'=>'H0001','desc'=>'Calculate from receipts');
	}
		
}
