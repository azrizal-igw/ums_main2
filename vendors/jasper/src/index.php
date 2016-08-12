<?php 
/*
THIS FILE IS FOR EXAMPLE PURPOSES ONLY
*/


include 'Adl/Configuration.php';
include 'Adl/Config/Parser.php';
include 'Adl/Config/JasperServer.php';
include 'Adl/Integration/RequestJasper.php';

try {
	$jasper = new Adl\Integration\RequestJasper();
	/*
	To send output to browser
	*/
	header('Content-type: application/pdf');
	//echo $jasper->run('/reports/ReportUser');
		
	/*
	To Save content to a file in the disk
	The path where the file will be saved is registered into config/data.ini
	*/
	// $jasper->run('/reports/ReportUser','PDF', null, true);

	//example
	//construct report object
	// $report    =    array("_REPORT_PARAMETER"=>$php_variable);
	//$report    =    array('phase'=>'%','region'=>'%','state'=>'%','district'=>'%','mukim'=>'%','sitecode' =>'J01C001');
	//$startdate =  mktime(0, 0, 0, $startDate['month'], $startDate['day'], $startDate['year']) * 1000 + 4*60*60*1000;
	$startdate = mktime(0, 0, 0, 01,01,2010) * 1000 + 6*60*60*1000;
	$enddate = mktime(0, 0, 0, 01,01,2013) * 1000 + 6*60*60*1000;
	// print $startdate;
	// $report    =    array('phasesr'=>'%','regionsr'=>'%','statesr'=>'%','districtsr'=>'%','mukimsr'=>'%','sitecodesr' =>'J01C002','datefromsr'=>$startdate,'datetosr'=>$enddate);
	$report    =    array('phase'=>'%','region'=>'%','state'=>'%','district'=>'%','mukim'=>'%','sitecode' =>'J01C002','datefrom'=>$startdate,'dateto'=>$enddate);
	//valid output PDF, JRPRINT, HTML, XLS, XML, CSV and RTF
	// echo $jasper->run('/reports/site','PDF',$report,false);
	// echo $jasper->run('/reports/subreport','PDF',$report,false);
	echo $jasper->run('/reports/ums/RegMemOverall_GetAllYearPjk','PDF',$report,false);
	
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