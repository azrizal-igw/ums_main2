<?php 
/*
THIS FILE IS FOR EXAMPLE PURPOSES ONLY
*/
//echo $url;
//die();
//ini_set('display_errors','1');
include 'Adl/Configuration.php';
include 'Adl/Config/Parser.php';
include 'Adl/Config/JasperServer.php';
include 'Adl/Integration/RequestJasper.php';

try {
	$jasper = new Adl\Integration\RequestJasper();
	/*
	To send output to browser
	*/
    if($_POST['data']['action_id'] == 1 or 2):
	header('Content-type: application/pdf');
    //header('Content-Disposition: attachment; filename="report.pdf"');
    //else:
       // header('Content-type: application/xls');
       // header('Content-Disposition: attachment; filename="report.xls"');
   // endif;

	//echo $jasper->run('/reports/ReportUser');
		
	/*
	To Save content to a file in the disk
	The path where the file will be saved is registered into config/data.ini
	*/
	// $jasper->run('/reports/ReportUser','PDF', null, true);

	//example
	//construct report object
	//$report    =    array("_REPORT_PARAMETER"=>$php_variable);
	//$report    =    array('phase'=>'%','region'=>'%','state'=>'%','district'=>'%','mukim'=>'%','sitecode' =>'J01C001');
	//$startdate =  mktime(0, 0, 0, $startDate['month'], $startDate['day'], $startDate['year']) * 1000 + 4*60*60*1000;
	//$startdate = mktime(0, 0, 0, 01,01,2010) * 1000 + 6*60*60*1000;
	//$enddate = mktime(0, 0, 0, 01,01,2013) * 1000 + 6*60*60*1000;
	//print $startdate;
	//$report    =    array('phasesr'=>'%','regionsr'=>'%','statesr'=>'%','districtsr'=>'%','mukimsr'=>'%','sitecodesr' =>'J01C002','datefromsr'=>$startdate,'datetosr'=>$enddate);
	//$report    =    array('phase'=>'%','region'=>'%','state'=>'%','district'=>'%','mukim'=>'%','sitecode' =>'J01C002','datefrom'=>$startdate,'dateto'=>$enddate);
	
    if ($_POST['data']['action_id'] == 1): //graph report    
        /*
    	$year = ($_POST['data']['year'] != ''?$_POST['data']['year']:'%');;
        //print_r($_POST);
        $state = ($_POST['data']['state_id'] != ''?$_POST['data']['state_id']:'%');
        $site = ($_POST['data']['site_id'] != ''?$_POST['data']['site_id']:'%');        
        $report    =    array('state'=>$state,'site'=>$site,'year'=>$year);
    	//valid output PDF, JRPRINT, HTML, XLS, XML, CSV and RTF
    	// echo $jasper->run('/reports/site','PDF',$report,false);
    	// echo $jasper->run('/reports/subreport','PDF',$report,false);
    	echo $jasper->run('/reports/ktw/reguser2_1_1_1','PDF',$report,false); //reguser3
        */
        
        $year = ($_POST['data']['year'] != ''?$_POST['data']['year']:'%');
        //print_r($_POST);
        $region = ($_POST['data']['region_id'] != ''?$_POST['data']['region_id']:'%');
        $state = ($_POST['data']['state_id'] != ''?$_POST['data']['state_id']:'%');
        $site = ($_POST['data']['site_id'] != ''?$_POST['data']['site_id']:'%');        
        $report = array('region'=>$region,'state'=>$state,'site'=>$site,'year'=>$year);
        //if($url[$db] = 'default'):echo $jasper->run('/reports/ktw/reguser2_1_1_1_2','PDF',$report,false); //reguser4
        //else: echo $jasper->run('/reports/ktw_1/reguser2_1_1_1_2','PDF',$report,false); //reguser4
        //endif;
        echo $jasper->run('/reports/ktw/reguser2_1_1_1_2','PDF',$report,false);        
     elseif ($_POST['data']['action_id'] == 2): //list report
        //$year = ($_POST['data']['year'] != ''?$_POST['data']['year']:'%');
        //$month = ($_POST['data']['month'] != ''?$_POST['data']['month']:'%');            
        if ($_POST['data']['year'] == '' || $_POST['data']['year'] == '%'):
            $year = date('Y');
        else:
            $year = $_POST['data']['year'];
        endif; 
        if ($_POST['data']['month'] == '' || $_POST['data']['month'] == '%'):
            $month = date('m');
        else:
            $month = $_POST['data']['month'];
        endif;                                     
        $region = ($_POST['data']['region_id'] != ''?$_POST['data']['region_id']:'%');
        $state = ($_POST['data']['state_id'] != ''?$_POST['data']['state_id']:'%');
        $site = ($_POST['data']['site_id'] != ''?$_POST['data']['site_id']:'%');        
        $report    =    array('region'=>$region,'state'=>$state,'site'=>$site,'year'=>$year,'month'=>$month);
        echo $jasper->run('/reports/ktw/reguser2_1_1_1_2_1_1','PDF',$report,false); //reguser4   
     endif;
	
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
?>