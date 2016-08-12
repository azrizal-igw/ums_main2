<?php //pr($headers);
	
App::import('Vendor','xtcpdf'); 
	$wmain=11;
	$w=11.8;
	$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->AddPage('L');
	$pdf->SetXY(10,1);
	$setmonth=array('01'=>'Jan','02'=>'Feb','03'=>'Mar','04'=>'Apr','05'=>'May','06'=>'Jun','07'=>'Jul','08'=>'Aug','09'=>'Sep','10'=>'Oct','11'=>'Nov','12'=>'Dec');
	//pr($bulan);
	$pdf->SetFont('', 'BU',10, '', 'false');
	foreach($setmonth as $key=>$month){
		
		if ($bulan==$key){
			$pdf->SetFillColor(100,100,100);
			$pdf->Cell($c=23.33,5,$month,0,0,'C',true,$setaddress="http://1mtris.ingeniworks.com.my/ums_main/Acctransactions/listmonthdetailpdf/2012/".$key);
		}else{
			$pdf->SetFillColor(255,255,255);
			$pdf->Cell($c=23.33,5,$month,0,0,'C',true,$setaddress="http://1mtris.ingeniworks.com.my/ums_main/Acctransactions/listmonthdetailpdf/2012/".$key);
		}
		
	}
	$pdf->ln(30);
	$pdf->SetFont('', 'B',10, '', 'false');
	//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, int fill [, mixed link]]]]]]]);
	
	$pdf->SetFillColor(100,100,100);	
	$pdf->Cell(280,10,"LAPORAN AKAUN BULAN $bulan 2012",1,0,'C',true,'http://1mtris.ingeniworks.com.my');
	$pdf->ln(10);
	$pdf->SetFillColor(150,150,150);
	$pdf->SetFont('', '',10, '', 'false');
	$pdf->Cell(44,5,"Akaun",1,0,'C',true);
	$pdf->Cell(118,5,"Pendapatan",1,0,'C',true);
	$pdf->Cell(118,5,"Perbelanjaan",1,0,'C',true);
	$pdf->ln(5);
	$pdf->SetFillColor(150,150,150);	
	$pdf->SetFont('', '',6, '', 'false');
	$pdf->Cell($wmain,5,"Tarikh",1,0,'C',true);
	$pdf->Cell($wmain,5,"Masuk",1,0,'C',true);
	$pdf->Cell($wmain,5,"Keluar",1,0,'C',true);
	$pdf->Cell($wmain,5,"Baki",1,0,'C',true);
	
	foreach($headers as $parent=>$header):
		$pdf->Cell($w,5,$header,1,0,'C',true);
	endforeach;
	
	foreach($headers as $parent=>$header):
		$pdf->Cell($w,5,$header,1,0,'C',true);
	endforeach;
	$pdf->ln(5);
		
	$color=0;	
	foreach ($ds as $key=> $row):
		$color++;
		if ($color%2==1){
		$pdf->SetFillColor(225,225,225);
		}else{
		$pdf->SetFillColor(255,255,255);
		}
		if(isset($row['transdate'])){
			$a=substr($row['transdate'], 6, 2);
			$b=substr($row['transdate'], 4, 2);
			$c=substr($row['transdate'], 0, 4);
			$pdf->Cell($wmain,5,$a."/".$b."/".$c,1,0,'C',true);
			}
						
			
		if(isset($row['debit'])){
			$pdf->Cell($wmain,5,CakeNumber::currency($row['debit'],''),1,0,'R',true);
			}else{
			$pdf->Cell($wmain,5,"-",1,0,'C',true);
			}
		if(isset($row['credit'])){
			$pdf->Cell($wmain,5,CakeNumber::currency($row['credit'],''),1,0,'R',true);
			}else{
			$pdf->Cell($wmain,5,"-",1,0,'C',true);
			}
							
			$pdf->Cell($wmain,5,CakeNumber::currency($row['baki'],''),1,0,'R',true);
			
			
	
		foreach ($headers as $parent=>$header):
			if (isset($row['dr'][$parent])){
				$pdf->Cell($w,5,CakeNumber::currency($row['dr'][$parent],''),1,0,'R',true);
				}else{
				$pdf->Cell($w,5,"-",1,0,'C',true);
			}
		endforeach;
	
	
		foreach ($headers as $parent=>$header):
			if (isset($row['cr'][$parent])){		
				$pdf->Cell($w,5,CakeNumber::currency($row['cr'][$parent],''),1,0,'R',true);
				}else{
				$pdf->Cell($w,5,"-",1,0,'C',true);
				}
		endforeach;
		
	$pdf->ln(5);
	endforeach;
	$pdf->SetFillColor(150,150,150);
	$pdf->Cell($wmain,5,"Total",1,0,'C',true);
	if(isset($row['totaldebit'])){
		$pdf->Cell($wmain,5,CakeNumber::currency($row['totaldebit'],''),1,0,'C',true);							
	} 
	if(isset($row['totalcredit'])){
		$pdf->Cell($wmain,5,CakeNumber::currency($row['totalcredit'],''),1,0,'C',true);
	} 
	if(isset($row['baki'])){
		$pdf->Cell($wmain,5,CakeNumber::currency($row['baki'],''),1,0,'C',true);
	}  
	
	foreach ($dr as $parent=>$drparent): 
		$pdf->Cell($w,5,CakeNumber::currency($drparent,''),1,0,'C',true);			
	endforeach;

	foreach ($cr as $parent=>$crparent): 
		$pdf->Cell($w,5,CakeNumber::currency($crparent,''),1,0,'C',true);	
	endforeach;




		
			
			

		
	
			
	
	$pdf->Output('example_001.pdf', 'I');

?>