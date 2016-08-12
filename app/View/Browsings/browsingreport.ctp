<?php //pr($icno);pr($browses);
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
			$pdf->SetFillColor(255,255,255);
			$pdf->Cell(190,10,"User Browsing Report",0,0,'C',true);
			$pdf->ln(10);
			$pdf->SetFont('', '',8, '', 'false');
			$pdf->Cell(30,5,"Name",0,0,'L',true);//limit 60 huruf
			$pdf->Cell(30,5,substr($d['Userdetail']['name'],0,60),0,0,'L',true);//limit 60 huruf
			$pdf->ln(5);
			$pdf->Cell(30,5,"No.IC",0,0,'L',true);//limit 60 huruf
			$pdf->Cell(30,5,$d['Browsing']['icno'],0,0,'L',true);
			$pdf->ln(5);
			$pdf->Cell(30,5,"Sitecode ID",0,0,'L',true);//limit 60 huruf
			$pdf->Cell(30,5,$d['Browsing']['sitecode'],0,0,'L',true);
			$pdf->ln(5);
			$pdf->Cell(30,5,"From",0,0,'L',true);//limit 60 huruf
			$pdf->Cell(30,5,$first,0,0,'L',true);
			$pdf->ln(5);
			$pdf->Cell(30,5,"To",0,0,'L',true);//limit 60 huruf
			$pdf->Cell(30,5,$last,0,0,'L',true);
			$pdf->SetFillColor(100,100,100);
			$pdf->ln(10);
			$pdf->SetFont('', '',8, '', 'false');
			$pdf->Cell(10,5,"No.",1,0,'C',true);
			$pdf->Cell(28,5,"StartDate",1,0,'C',true);
			$pdf->Cell(28,5,"StartTime",1,0,'C',true);
			$pdf->Cell(28,5,"EndTime",1,0,'C',true);
			$pdf->Cell(10,5,"PC No.",1,0,'C',true);
			$pdf->Cell(28,5,"Duration",1,0,'C',true);
			$pdf->Cell(28,5,"Paid",1,0,'C',true);
			$pdf->Cell(28,5,"SKMM",1,0,'C',true);
			$pdf->ln(5);
			}
			
		if ($color%2==1){
			$pdf->SetFillColor(255,255,255);
			}else{
				$pdf->SetFillColor(225,225,225);
				}
				
		$pdf->Cell(10,5,$bil,1,0,'C',true);//limit 100,000 user
		
		$start= strtotime(substr($d['Browsing']['time_start'],10,6));
		$pdf->Cell(28,5,substr($d['Browsing']['time_start'],0,10),1,0,'C',true);//tarikh
		$pdf->Cell(28,5,substr($d['Browsing']['time_start'],10,6),1,0,'C',true);//masa
		$pdf->Cell(28,5,substr($d['Browsing']['time_end'],10,6),1,0,'C',true);//masa
		$pdf->Cell(10,5,substr($d['Browsing']['pcno'],0,10),1,0,'C',true);//tarikh
		$end= strtotime(substr($d['Browsing']['time_end'],10,6));
		$duration=($end-$start)/60;
		$pdf->Cell(28,5,$duration." Minute",1,0,'C',true);//mula-tamat
		$pdf->Cell(28,5,$d['Receipt']['paid'],1,0,'C',true);//mula-tamat
		$pdf->Cell(28,5,($d['Browsing']['acct']==0)?"Yes":"No",1,0,'C',true);//mula-tamat
		$pdf->ln(5);
		
		
	}
	
	
	
	
	
	$pdf->Output('example_01.pdf', 'I');
?>





