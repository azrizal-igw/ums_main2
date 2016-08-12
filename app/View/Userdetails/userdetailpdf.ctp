<?php //pr($dataall);
$bil=0;
$color=0;
App::import('Vendor','xptcpdf');
	
	$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetMargins(10, 40, 10);
	$pdf->SetFont('', '',8, '', 'false');
	//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, int fill [, mixed link]]]]]]]);
	//$pdf->ln(30);
	
	
	foreach($dataall as $data){
		$bil++;
		$color++;
		if ($bil%44==1 or $bil==1){
			$pdf->AddPage('P');
			$pdf->SetFont('', 'B',14, '', 'false');
			$pdf->SetFillColor(255,255,255);
			$pdf->Cell(190,10,"Registered User",0,0,'C',true);
			$pdf->SetFillColor(100,100,100);
			$pdf->ln(10);
			$pdf->SetFont('', '',8, '', 'false');
			$pdf->Cell(10,5,"Number",1,0,'C',true);
			$pdf->Cell(100,5,"Name",1,0,'C',true);
			$pdf->Cell(20,5,"IC Number",1,0,'C',true);
			$pdf->Cell(20,5,"Numb Tel",1,0,'C',true);
			$pdf->Cell(20,5,"Register Date",1,0,'C',true);
			$pdf->Cell(20,5,"Type",1,0,'C',true);
			$pdf->ln(5);
			}
			
		if ($color%2==1){
			$pdf->SetFillColor(255,255,255);
			}else{
				$pdf->SetFillColor(225,225,225);
				}
				
		$pdf->Cell(10,5,$bil,1,0,'C',true);//limit 100,000 user
		$pdf->Cell(100,5,substr($data['Userdetail']['name'],0,50),1,0,'L',true);//limit 60 huruf
		$pdf->Cell(20,5,$data['Userdetail']['icno'],1,0,'C',true);
		$pdf->Cell(20,5,$data['Userdetail']['hp_no'],1,0,'C',true);
		$pdf->Cell(20,5,substr($data['Userdetail']['registered_date'], 0, -8),1,0,'C',true);
		$pdf->Cell(20,5,$data['Usertype']['bm'],1,0,'C',true);
		$pdf->ln(5);
		
		
	}
	
	
	
	
	
	$pdf->Output('example_001.pdf', 'I');
?>





