<?php //pr($browses);
$bil=0;
$color=0;
App::import('Vendor','xptcpdf');
	
	$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetMargins(10, 40, 10);
	$pdf->SetFont('', '',8, '', 'false');
	//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, int fill [, mixed link]]]]]]]);
	//$pdf->ln(30);
	
	
	foreach($browses as $d){
		$bil++;
		$color++;
		if ($bil%44==1 or $bil==1){
			$pdf->AddPage('P');
			$pdf->SetFont('', 'B',14, '', 'false');
			$pdf->SetTextColor(180);
			//$pdf->SetDrawColor(70);
			$pdf->SetFillColor(255,255,255);
			$pdf->Cell(190,10,"List Browsing",0,0,'C',true);
			$pdf->SetFillColor(100,100,100);
			$pdf->ln(10);
			$pdf->SetFont('', '',8, '', 'false');
			$pdf->Cell(10,5,"No.",1,0,'C',true);
			$pdf->Cell(107,5,"Name",1,0,'C',true);
			$pdf->Cell(10,5,"PC No.",1,0,'C',true);
			$pdf->Cell(20,5,"Date",1,0,'C',true);
			$pdf->Cell(16,5,"StartTime",1,0,'C',true);
			$pdf->Cell(16,5,"EndTime",1,0,'C',true);
			$pdf->Cell(16,5,"Duration",1,0,'C',true);
			$pdf->ln(5);
			}
			
		if ($color%2==1){
			$pdf->SetFillColor(255,255,255);
			}else{
				$pdf->SetFillColor(225,225,225);
				}
				
		$pdf->Cell(10,5,$bil,1,0,'C',true);//limit 100,000 user
		$pdf->Cell(107,5,substr($d['Userdetail']['name'],0,60),1,0,'L',true);//limit 60 huruf
		$pdf->Cell(10,5,substr($d['Browsing']['pcno'],0,10),1,0,'C',true);//tarikh
		$pdf->Cell(20,5,substr($d['Browsing']['time_start'],0,10),1,0,'C',true);//tarikh
		$pdf->Cell(16,5,substr($d['Browsing']['time_start'],10,6),1,0,'C',true);//masa
		$pdf->Cell(16,5,substr($d['Browsing']['time_end'],10,6),1,0,'C',true);//masa
		$start= strtotime(substr($d['Browsing']['time_start'],10,6));
		$end= strtotime(substr($d['Browsing']['time_end'],10,6));
		$duration=($end-$start)/60;
		
		$pdf->Cell(16,5,$duration." Minute",1,0,'C',true);//mula-tamat
		$pdf->ln(5);
		
		
	}
	
	
	
	
	
	$pdf->Output('example_01.pdf', 'I');
?>





