<?php //pr($detail);

	
App::import('Vendor','xtcpdf');
	
	$widthmain=46;
	$width=18;
	$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
	$pdf->SetFont('', '',10, '', 'false');
	$pdf->AddPage('L');
	//Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, int fill [, mixed link]]]]]]]);
	$pdf->ln(20);
	$pdf->SetFillColor(100,100,100);	
	$pdf->Cell(280,10,"PENYATA KEWANGAN TAHUN 2012",1,0,'C',true);
	$pdf->ln(10);
	$pdf->SetFillColor(100,100,100);
	$pdf->Cell($widthmain,5,"Perkara",1,0,'C',true);
	
	foreach($month as $keymonths=>$months):
		$pdf->Cell($width,5,$keymonths,1,0,'C',true);
	endforeach;
	
	$pdf->Cell($width,5,"Yearly",1,0,'C',true);
	$pdf->ln(5);
	$pdf->SetFillColor(100,100,100);	
	$pdf->Cell(280,5,"Pendapatan Tahunan",1,0,'C',true);
	$pdf->ln(5);
	$pdf->SetFillColor(255,255,255);	
	$color=0;
	foreach($headers as $keyheader=>$header):
		$yeardr[$keyheader]=0;
		$color++;
		if ($color%2==1){
		$pdf->SetFillColor(225,225,225);
		}else{
		$pdf->SetFillColor(255,255,255);
		}
		$pdf->Cell($widthmain,5,$header,1,0,'L',true);
		foreach($detail as $keydetail=>$details):
			$pdf->Cell($width=18,5,CakeNumber::currency($details['detail'][$keyheader]['dr'],''),1,0,'R',true);
			$yeardr[$keyheader]+=$details['detail'][$keyheader]['dr'];
			
		endforeach;
		$pdf->Cell($width,5,CakeNumber::currency($yeardr[$keyheader],''),1,0,'C',true);	
		$pdf->ln(5);
	endforeach;
	$pdf->SetFillColor(100,100,100);
	$pdf->Cell($widthmain,5,"Jumlah Perdapatan",1,0,'C',true);
	$yearmonthdr=0;

	foreach($detail as $details):
		$pdf->Cell($width,5,CakeNumber::currency($details['total']['dr'],''),1,0,'R',true);
		$yearmonthdr+=$details['total']['dr'];
	endforeach;
	$pdf->Cell($width,5,CakeNumber::currency($yearmonthdr,''),1,0,'R',true);
	$pdf->ln(5);	
	$pdf->Cell(280,5,"Perbelanjaan Tahunan",1,0,'C',true);
	$pdf->SetFillColor(255,255,255);
	$pdf->ln(5);
	
	foreach($headers as $keyheader=>$header):
		$yearcr[$keyheader]=0;
		$color++;
		if ($color%2==1){
		$pdf->SetFillColor(225,225,225);
		}else{
		$pdf->SetFillColor(255,255,255);
		}
		$pdf->Cell($widthmain,5,$header,1,0,'L',true);
		
		foreach($detail as $keydetail=>$details):
			$pdf->Cell($width,5,CakeNumber::currency($details['detail'][$keyheader]['cr'],''),1,0,'R',true);
			$yearcr[$keyheader]+=$details['detail'][$keyheader]['cr'];
				
		endforeach;
		
		$pdf->Cell($width,5,CakeNumber::currency($yearcr[$keyheader],''),1,0,'C',true);	
		$pdf->ln(5);
	endforeach;
	
	$pdf->SetFillColor(88,88,88);
	$pdf->Cell($widthmain,5,"Jumlah Perbelanjaan",1,0,'C',true);
	$yearmonthcr=0;
	foreach($detail as $details):
		$pdf->Cell($width,5,CakeNumber::currency($details['total']['cr'],''),1,0,'R',true);
		$yearmonthcr+=$details['total']['cr'];
	endforeach;
	$pdf->Cell($width,5,CakeNumber::currency($yearmonthcr,''),1,0,'R',true);
	
			
			

	$pdf->Output('example_001.pdf', 'I');

?>