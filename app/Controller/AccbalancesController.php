<?php
App::uses('AppController', 'Controller');
/**
 * Accbalances Controller
 *
 * @property Accbalance $Accbalance
 */
class AccbalancesController extends AppController {

public $paginate = array(
        'limit'=>20,
        
    );
/**
 * index method
 *
 * @return void
 */
	public function index($transmonth = null,$sid = null ) {
	
		$this->Accbalance->recursive = 0;
		$conditions['Accbalance.sitecode'] = $this->Session->read('Site.sitecode'); //admin
		// to get current month from table accmonth
		$this->loadModel('Accmonth');
		$currmth = $this->Accmonth->findById(1);
		$currym = $currmth['Accmonth']['ym'];
		
		// pr($data);
		// die();
				
        //group_id = 5 - accounts
        if($this->Auth->User('group_id') != 1 and $this->Auth->User('group_id') != 5 and $this->Auth->User('group_id') != 7 and $this->Auth->User('group_id') != 2){
        	$this->set(compact('sid','transmonth'));

        	// echo $sid; die();

            $this->render('index_editing');
        } 
        else {
        	$id =  $this->Session->read('Site.sitecode');
        	$group_id = $this->Auth->User('group_id');
        	$this->set(compact('sid','transmonth', 'group_id'));
        }
        // $conditions =array();
		 $transmonth = $this->Accbalance->find('list');
		//$this->set('accbalances', $this->paginate($conditions));
		// $transmonth = $this->Accbalance->transmonth->find('list');
		// $this->set(compact('transmonth'));
		
	}

	public function listacc($accstatus = 1,$reset=0){
        $this->Accbalance->recursive = 0;

        if($reset == 1 ){
        	$this->layout = false;
        	if($this->Session->check('Auth.User.Search.Accbalance'))
        	$this->Session->delete('Auth.User.Search.Accbalance');

        	$this->redirect(array('controller'=>'accbalances','action' => 'listacc',$accstatus));
        }

        $cond['Accbalance.accstatustitle_id'] = $accstatus;

        if (($this->request->is('post') || $this->Session->read('Auth.User.Search.Accbalance')) && $reset != 1)  {
        	/* Set search */
            if($this->request->is('post')){
                $this->Session->write('Auth.User.Search.Accbalance',$this->request->data);

                /* Reset pagination number */
                $this->request->params['named']['page'] = 1;

            } else {
                $this->request->data = $this->Session->read('Auth.User.Search.Accbalance');

            }

        	/* Search by Site Name */
            if($this->request->data['Accbalance']['name'] != null)
            $cond['Site.name like'] = "%".$this->request->data['Accbalance']['name']."%";

        	/* Search by Phase */
            if($this->request->data['Accbalance']['phase_id'] != null) {
            	$cond['Site.phase_id'] = $this->request->data['Accbalance']['phase_id'];
        	} 

        	/* Search by Region */
            if($this->request->data['Accbalance']['region_id'] != null) {
            	$cond['Site.region_id'] = $this->request->data['Accbalance']['region_id'];
        	} else {
        		$cond['Site.region_id'] = $this->Session->read('Auth.User.region');
        	}

        	/* Search by Status */
            if($this->request->data['Accbalance']['transmonth']['month'] != null && $this->request->data['Accbalance']['transmonth']['year'] != null)
            $cond['Accbalance.transmonth'] = $this->request->data['Accbalance']['transmonth']['year'].$this->request->data['Accbalance']['transmonth']['month'];

        } else {
        	$this->loadModel('Accmonth');
			$currmth = $this->Accmonth->findById(1);
			$cond['Site.region_id'] = $this->Session->read('Auth.User.region');
			//$cond['Site.phase_id'] = $this->Session->read('Auth.User.phase');
			$cond['Accbalance.transmonth'] = $currmth['Accmonth']['ym'];

			$Defaultdata['Accbalance']['transmonth']['year'] = substr( $currmth['Accmonth']['ym'],0,4);
			$Defaultdata['Accbalance']['transmonth']['month'] = substr( $currmth['Accmonth']['ym'],4,6);
			$Defaultdata['Accbalance']['accstatustitle_id'] = $accstatus;

			$this->request->data = $Defaultdata;
        }
     	
     	if($accstatus != 5) {
	        $this->paginate['contain'] = array('Site');
			$this->paginate['conditions'] = $cond;

	        $this->set('acc',$this->paginate());
	        // pr($this->paginate());
	        // die();
	    } else {
	    	$cond2 = $cond;

	    	unset($cond2['Site.region_id']);
	    	unset($cond2['Site.phase_id']);
	    	unset($cond2['Accbalance.accstatustitle_id']);  
	    	unset($cond2['Site.name like']);

	    	$listSite = $this->Accbalance->find('list',array('conditions'=>$cond2,'fields'=>array('Accbalance.sitecode')));

	    	$cond3 = $cond;
	    	$cond3['NOT'] = array('Site.id'=>$listSite);
	    	unset($cond3['Accbalance.accstatustitle_id']);
	    	unset($cond3['Accbalance.transmonth']);
	    	
	    	$this->set('acc',$this->paginate('Site',$cond3));
	    } 

        $this->set('accstatustitles',$this->Accbalance->Accstatustitle->find('list'));
        $this->set('accstatus',$accstatus);
        $this->set('phases',$this->Accbalance->Site->Phase->find('list'));
        $this->set('regions',$this->Accbalance->Site->Region->find('list',array(
        	'conditions'=>array('Region.id'=>$this->Session->read('Auth.User.region')))));
	}

/**
 * listyear method
 *
 * @return void
 */
	public function listyear($year = null,$sid=null ) {

		// if ($year == null || $sid == null) {
        $this->Accbalance->recursive = 0;

        if (($this->request->is('post') ))  {
        	$year = $this->request->data['Accbalance']['transmonth']['year'];
        } else {
        	$year = ($year == null)?date('Y'):$year;
        }

        //group_id = 5 - accounts
        if($this->Auth->User('group_id') != 5 and $this->Auth->User('group_id') != 1 and $this->Auth->User('group_id') != 7 and $this->Auth->User('group_id') != 2){
        	$sid =  $this->Session->read('Site.sitecode');
        } 

        $this->Accbalance->contain('Accstatustitle');
        $acc = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth >='=>$year.'01','Accbalance.transmonth <='=>$year.'12' ,'Accbalance.sitecode'=>$sid)));
        $acc = Set::combine($acc,'{n}.Accbalance.transmonth','{n}');

        $this->Accbalance->Site->contain();
        $this->set('site',  $this->Accbalance->Site->findById($sid));
		$this->set('acc',$acc);
		$this->set('year',$year);
		$this->set('sid',$sid);
	}


/**
 * json_counting method
 *
 * @return void
 */
	public function json_counting() {
		$this->layout = 'ajax';

		$this->loadModel('Accmonth');
		$currmth = $this->Accmonth->findById(1);

		

		/* List region */
		$regions = $this->Session->read('Auth.User.region');

		if(!empty($regions) > 0){
			/* List sites */
			$this->Accbalance->Site->contain();
			$sitesTmp = $this->Accbalance->Site->find('all',array('fields'=>array('Site.id'),'conditions'=>array('Site.region_id'=>$regions)));
			$sites =  Set::classicExtract($sitesTmp, '{n}.Site.id');

			/* Set Condition */
			$cond['Accbalance.transmonth'] = $currmth['Accmonth']['ym'];
			$cond['Accbalance.sitecode'] = $sites;

			$this->Accbalance->contain();
			$tmpData = $this->Accbalance->find('all',array('fields'=>array('Accbalance.id','Accbalance.sitecode','Accbalance.accstatustitle_id'),'conditions'=>$cond));
			$result = Set::combine($tmpData,  '{n}.Accbalance.id','{n}','{n}.Accbalance.accstatustitle_id');

			$accstatustitles = $this->Accbalance->Accstatustitle->find('list');
			$listAcc =  Set::classicExtract($tmpData, '{n}.Accbalance.sitecode');

			$currmth = date("M Y",strtotime($currmth['Accmonth']['ym'].'01'));
			$data = array('total_count'=>0,'currmth'=>$currmth);
			foreach ($accstatustitles as $sId => $sNm) {
				$tmp = array('id'=>$sId,'name'=>$sNm,'count'=>0);
				
				if(isset($result[$sId])  && $sId != 5){
					$tmp['count'] = sizeof($result[$sId]);
				} else if( $sId == 5){
					$noStatus = $this->Accbalance->Site->find('list',array('conditions'=>array('Site.region_id'=>$regions,'NOT'=>array('Site.id'=>$listAcc))));
					$tmp['count'] = sizeof($noStatus);
				}

				$data['count'][] = $tmp;
				$data['total_count'] += $tmp['count'];

			}
		}
		$this->set('data',$data);
	}	
    
   	        
/**
 * index method
 *
 * @return void
 */
	public function json_data() {
		$this->autoRender = false;
        $this->Accbalance->recursive = 0;
		$this->loadModel('Accmonth');
		$currmth = $this->Accmonth->findById(1);
        
        $conditions =array('Accbalance.accstatustitle_id'=>$this->request->data('accstatus'),'Accbalance.transmonth'=>$currmth['Accmonth']['ym']);
		
		// $conditions['Accbalance.accstatustitle_id'] = $this->request->data('accstatus');
        $this->Accbalance->contain('Site');
		echo json_encode($this->Accbalance->find('all',array('conditions'=>$conditions)));
       // echo json_encode($this->paginate($conditions));
	}
    
   	public function json_data_year() {
		$this->autoRender = false;
        $this->Accbalance->recursive = 0;
		//$this->loadModel('Accmonth');
		//$currmth = $this->Accmonth->findById(1);
        
        //$conditions =array('Accbalance.accstatustitle_id'=>$this->request->data('accstatus'),'Accbalance.transmonth'=>$currmth['Accmonth']['ym']);
		
		// $conditions['Accbalance.accstatustitle_id'] = $this->request->data('accstatus');
        $this->Accbalance->contain('Accstatustitle');
        $acc = $this->Accbalance->find('all',array('conditions'=>array('Accbalance.transmonth >='=>$this->request->data('year').'01','Accbalance.transmonth <='=>$this->request->data('year').'12' ,'Accbalance.sitecode'=>$this->Auth->User('sitecode'))));
        $acc = Set::combine($acc,'{n}.Accbalance.transmonth','{n}');
		echo json_encode($acc);
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}
		$this->set('accbalance', $this->Accbalance->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	   $this->layout = false;	   
		if ($this->request->is('post')) {
			$this->Accbalance->create();
			if ($this->Accbalance->save($this->request->data)) {
				$this->Session->setFlash(__('The accbalance has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accbalance could not be saved. Please, try again.'));
			}
		}
		$users = $this->Accbalance->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accbalance->save($this->request->data)) {
				$this->Session->setFlash(__('The accbalance has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accbalance could not be saved. Please, try again.'));
			}
		} else {

			$this->request->data = $this->Accbalance->read(null, $id);
			pr($this->request->data);
		}
		$users = $this->Accbalance->User->find('list');
		$this->set(compact('users'));
	}
    

    
        /**
 * submit method  - Submit Account
 *
 * @param string $id
 * @return void
 */
	public function submit($id = null) {
	Configure::write('debug',1);
	   	$this->layout = false;
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
		  $this->request->data['Accbalance']['accstatustitle_id'] = 2;
			if ($this->Accbalance->save($this->request->data)) {
			
			// jam added 14/11/2013 --to make bal to next month bf
				// $this->Accbalance->recursive = -1;
				// $currdata = $this->Accbalance->findById($id); 
				// $this->loadModel('Accmonth');
				// $nextmonth = $this->Accmonth->getNextMonth();
				// //pr($currdata);
			    // if ($this->Accbalance->hasAny(array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode']))) //check if there is next month record created, if there is brinf bal to next month bf and calculate bal
							// {
							// $myid = $this->Accbalance->find('all',array('conditions'=>array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode'])));
						// //	pr($myid);
							// $data = array('id'=>$myid['0']['Accbalance']['id'],'transmonth' =>(int)$nextmonth,'bf' =>$currdata['Accbalance']['bal'],'bal' =>$currdata['Accbalance']['bal'] + $myid['0']['Accbalance']['dr'] + $myid['0']['Accbalance']['cr'],'user_id'=>$this->Auth->user('id'),'sitecode'=>$currdata['Accbalance']['sitecode'],'user_id'=>$this->Auth->user('id'));
						// //	pr($data);
							// $this->Accbalance->save($data);
							// }
			    // else // if no next month record , create new record for next month with bf and bal
							// {
							// $data = array('transmonth' =>(int)$nextmonth,'bf' =>$currdata['Accbalance']['bal'],'bal' =>$currdata['Accbalance']['bal'],'user_id'=>$this->Auth->user('id'),'sitecode'=>$currdata['Accbalance']['sitecode'],'user_id'=>$this->Auth->user('id'));
						// //	pr($data);
							// $this->Accbalance->create();
							// }
			
			// jam added 14/11/2013 finished
			 $this->autoRender = false;
				//$this->Session->setFlash(__('The accbalance has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The accbalance could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accbalance->read(null, $id);
		}
		
	}
	public function jasper($sid=null,$transmonth=null){

		//Configure::write('debug', 2);

		

		$this->autoRender = false;
        /*
        THIS FILE IS FOR EXAMPLE PURPOSES ONLY
        */

        include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Configuration.php';
        include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'Parser.php';
        include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'JasperServer.php';
        include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Integration'.DS.'RequestJasper.php';

// ini_set("soap.wsdl_cache_enabled", "0");
// ini_set("soap.wsdl_cache", "0");
// ini_set("display_errors","On");
// ini_set("track_errors","On");
        try {
            $jasper = new Adl\Integration\RequestJasper();
            /*
            To send output to browser
            */
			/*
           header('Content-type: application/xls');
           header('Content-Disposition: attachment; filename="report.xls"');
		   */
		   header('Content-type: application/pdf');
           header('Content-Disposition: attachment; filename="report.pdf"');

            /*$report_unit = "/reports/samples/reguser2_1_1_1_2_1_1_1_1_1";*/ /* jam edit 2014/10/17 */
			$report_unit = "/reports/cms/reguser2_1_1_1_2_1_1_1_1_1";
            /*$report_format="XLS";*/
			$report_format="PDF";
            $report_params = array(
                'ym' => $transmonth,
                'site' => $sid
                
            );  

            echo $jasper->run($report_unit,$report_format,$report_params);
            
        } catch (\Exception $e) {
            echo $e->getMessage();
            die;
        }

        /*
        Copyright (C) 2011 Adler Brediks Medrado

        Permission is hereby granted, free of charge, to any person obtaining a copy of
        this software and associated documentation files (the "Software"), to deal in
        the Software without restriction, including without limitation the rights to
        use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
        of the Software, and to permit persons to whom the Software is furnished to do
        so, subject to the following conditions:

        The above copyright notice and this permission notice shall be included in all
        copies or substantial portions of the Software.

        THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
        IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
        FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
        AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
        LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
        OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
        SOFTWARE.
        */
    }  

 /**
 * close method  - Close Account
 *
 * @param string $id
 * @return void
 */
	// public function close($id = null) {
	   	// $this->layout = false;
		// $this->Accbalance->id = $id;
		// if (!$this->Accbalance->exists()) {
			// throw new NotFoundException(__('Invalid accbalance'));
		// }
		// if ($this->request->is('post') || $this->request->is('put')) {
            // $this->request->data['Accbalance']['accstatustitle_id'] = 4;
			// if ($this->Accbalance->save($this->request->data)) {
			
			// // pr($this->request->data);
			 // $this->autoRender = false;
				// //$this->Session->setFlash(__('The accbalance has been saved'));
				// //$this->redirect(array('action' => 'index'));
			// } else {
				// //$this->Session->setFlash(__('The accbalance could not be saved. Please, try again.'));
			// }
		// } else {
			// $this->request->data = $this->Accbalance->read(null, $id);
		// }
		
	// }

	
 /**
 * close method  - Close Account
 *
 * @param string $id
 * @return void
 */
	public function close($id = null) { // Jam added part to bring bal to next month bf - 15072013 . The original function was commented above
		$this->layout = false;
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Accbalance']['accstatustitle_id'] = 4;

			if ($this->Accbalance->save($this->request->data)) {
				$this->autoRender = false;
				$this->Accbalance->recursive = -1;
				$currdata = $this->Accbalance->findById($id); 

				//Next Month
				$currmth = $currdata['Accbalance']['transmonth'];
				echo $nextmonth = date('Ym',mktime(0,0,0,substr($currmth, 4, 2) + 1,1,substr($currmth, 0, 4)));

				//check if there is next month record created, if there is brinf bal to next month bf and calculate bal
			    if ($this->Accbalance->hasAny(array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode']))) { 
					$myid = $this->Accbalance->find('all',array('conditions'=>array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode'])));
					$data = array(
						'id'=>$myid['0']['Accbalance']['id'],
						'transmonth' =>$nextmonth,
						'bf' =>$currdata['Accbalance']['bal'],
						'bal' =>$currdata['Accbalance']['bal'] + $myid['0']['Accbalance']['dr'] + $myid['0']['Accbalance']['cr'],
						'user_id'=>$this->Auth->user('id'),
						'sitecode'=>$currdata['Accbalance']['sitecode'],
						'user_id'=>$this->Auth->user('id'));

					$this->Accbalance->save($data);

				} else { // if no next month record , create new record for next month with bf and bal
					$data = array(
						'transmonth' =>$nextmonth,
						'bf' =>$currdata['Accbalance']['bal'],
						'bal' =>$currdata['Accbalance']['bal'],
						'user_id'=>$this->Auth->user('id'),
						'sitecode'=>$currdata['Accbalance']['sitecode'],
						'user_id'=>$this->Auth->user('id'));

					$this->Accbalance->create();
					$this->Accbalance->save($data);
				}
			} 

		} else {
			$this->request->data = $this->Accbalance->read(null, $id);
		}
		
	}
	
	
 /**
 * BacktoEdit method  - BacktoEdit Account
 *
 * @param string $id
 * @return void
 */
	public function backtoedit($id = null) { // Jam added on 09072013
	   	$this->layout = false;
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}
	    if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Accbalance']['accstatustitle_id'] = 1;
			if ($this->Accbalance->save($this->request->data)) {
			 $this->autoRender = false;
				//$this->Session->setFlash(__('The accbalance has been saved'));
				//$this->redirect(array('action' => 'index'));
			} else {
				//$this->Session->setFlash(__('The accbalance could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accbalance->read(null, $id);
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
		$this->Accbalance->id = $id;
		if (!$this->Accbalance->exists()) {
			throw new NotFoundException(__('Invalid accbalance'));
		}
		if ($this->Accbalance->delete()) {
			$this->Session->setFlash(__('Accbalance deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accbalance was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
}
