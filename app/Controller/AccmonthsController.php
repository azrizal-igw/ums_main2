<?php
App::uses('AppController', 'Controller');
/**
 * Accmonths Controller
 *
 * @property Accmonth $Accmonth
 */
class AccmonthsController extends AppController {
var $name = 'Accmonths';
var $helpers =  array('Html', 'Ajax','Javascript','Form');
var $components = array( 'RequestHandler','Cookie' );
/**
 * index method
 *
 * @return void
 */
	public function index() {
	
	
	/*
	Configure::write('debug', 2);
	
		
	        if (($this->request->is('post') ))  {
        	$year = $this->request->data['Accmonth']['reportyear'];
			$month = $this->request->data['Accmonth']['reportmonth'];
			
        } else {
        	$year = ($year == null)?date('Y'):$year;
        }
		
		pr($year);
		*/
		
		
		
		
		$this->Accmonth->recursive = 0; 
		$this->set('accmonths', $this->paginate());	
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	// public function view($id = null) {
		// $this->Accmonth->id = $id;
		// if (!$this->Accmonth->exists()) {
			// throw new NotFoundException(__('Invalid accmonth'));
		// }
		// $this->set('accmonth', $this->Accmonth->read(null, $id));
	// }
	
	
	public function view($id = 1) {   // this function is used to do Account Month Update 
	$this->layout= false;
	$this->Accmonth->id = $id;
	if (!$this->Accmonth->exists()) {
		throw new NotFoundException(__('Invalid accmonth'));
		}
	
	// acct month
    $accmonth = $this->Accmonth->read(null, $id);
	// checking if there is pending site acct not yet closed
	$acctstat = $this->checkacc();
	$this->set(compact('accmonth','acctstat'));
		
	// to put balance this month as brought fwd for next month	
	if ($this->request->is('post') || $this->request->is('put')) 
	{
			// update button is clicked
			if (isset($this->request->data['update'])) 
			{			
			    $nextmonth = $this->getNextMonth($accmonth['Accmonth']['ym']);
				
				$this->loadModel('Accbalance');
				$this->Accbalance->recursive = -1;
				$currdatas = $this->Accbalance->findAllByTransmonth($accmonth['Accmonth']['ym']);
				foreach ($currdatas as $currdata){
						//if next month record already exist;
						if ($this->Accbalance->hasAny(array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode'])))
							{
							$myid = $this->Accbalance->find('all',array('conditions'=>array('transmonth' => $nextmonth,'sitecode' => $currdata['Accbalance']['sitecode'])));
							$data = array('id'=>$myid['0']['Accbalance']['id'],'transmonth' =>(int)$nextmonth,'bf' =>$currdata['Accbalance']['bal'],'user_id'=>$this->Auth->user('id'),'sitecode'=>$currdata['Accbalance']['sitecode'],'user_id'=>$this->Auth->user('id'));
							$this->Accbalance->save($data);
							}
						else
							{
							$data = array('transmonth' =>(int)$nextmonth,'bf' =>$currdata['Accbalance']['bal'],'bal' =>$currdata['Accbalance']['bal'],'user_id'=>$this->Auth->user('id'),'sitecode'=>$currdata['Accbalance']['sitecode'],'user_id'=>$this->Auth->user('id'));
							$this->Accbalance->create();
							$this->Accbalance->save($data);
							}
				}
					$this->Accmonth->save(array('id'=>1,'ym'=>(int)$nextmonth));
					$this->Session->setFlash(__('Account month update finished. Now is month '. $nextmonth));
					//$this->redirect(array('action' => 'index'));	
					$this->redirect(array('controller' => 'accbalances', 'action' => 'index'));					
			}
	}
	}

public function getNextMonth($ym = null)
{
	$currmonth = (string)$ym;
    $mth = substr($currmonth, 4, 2);
	$yr = substr($currmonth, 0, 4);
	if ($mth == '12')
	{
		$yr = $yr + 1;
		$mth = '01';
	}
	else
	{
		$mth = $mth + 1;
		if ($mth < 10)
			$mth = "0".$mth; //to put zero in-front..
	}
	// pr ($yr.$mth);
	return $yr.$mth;	
}	

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Accmonth->create();
			if ($this->Accmonth->save($this->request->data)) {
				$this->Session->setFlash(__('The accmonth has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accmonth could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Accmonth->id = $id;
		if (!$this->Accmonth->exists()) {
			throw new NotFoundException(__('Invalid accmonth'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Accmonth->save($this->request->data)) {
				$this->Session->setFlash(__('The accmonth has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The accmonth could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Accmonth->read(null, $id);
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
		$this->Accmonth->id = $id;
		if (!$this->Accmonth->exists()) {
			throw new NotFoundException(__('Invalid accmonth'));
		}
		if ($this->Accmonth->delete()) {
			$this->Session->setFlash(__('Accmonth deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Accmonth was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkacc(){
	$strQuery = "select count(*) as cnt from accbalances,accmonths where accbalances.transmonth = accmonths.ym and accbalances.accstatustitle_id <> 4";
	$cnt = $this->Accmonth->query($strQuery);
	$stat = $cnt['0']['0']['cnt'];
	return $stat;
	
	}








	public function jaspermonthlyreport1($sid=null, $year=null, $month=null, $report_unit=null){
/*
	Configure::write('debug', 2);
	
	$year = $this->request->data['Accmonth']['reportyear'];
	$month = $this->request->data['Accmonth']['reportmonth'];
	print_r($year);
	print_r($month);
	
	$year = "2014";
	$month = "07";
	*/


	
	$name = $report_unit.'_'.date('YmdHis');



	if ($report_unit == null)
		$report_unit = "/reports/cms/Template1_5_3";
	else
		$report_unit = "/reports/cms/".$report_unit;
	
	$this->autoRender = false;

	// echo $report_unit; die();




	/*
	THIS FILE IS FOR EXAMPLE PURPOSES ONLY
	*/
	include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Configuration.php';
	include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'Parser.php';
	include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Config'.DS.'JasperServer.php';
	include APP.'Vendor'.DS.'jasper'.DS.'Adl'.DS.'Integration'.DS.'RequestJasper.php';


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
	   header("Content-Disposition: attachment; filename=$name.pdf");

		//$report_unit = "/reports/cms/Template1_5_3"; If null use this default value
		/*$report_format="XLS";*/
		$report_format="PDF";

		$report_params = array(
		    'sitecode' => $sid,
			'year' => $year,
			'month' => $month
		);  

		echo $jasper->run($report_unit,$report_format,$report_params);
		
	} catch (\Exception $e) {
		echo $e->getMessage();
		die;
	}
	}
	




	
}
