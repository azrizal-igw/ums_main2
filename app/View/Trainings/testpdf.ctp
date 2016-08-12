<?php
//bila pr pdf tak keluar(error)
//pr($datas);
App::import('Vendor','xtcpdf'); 

// create new PDF document
$pdf = new XTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font


//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->AddPage();//perlu ada
//header
$pdf->SetTextColor(255,0,0);//tukar warna
//$pdf->Cell(50, 50,"______________________________________________________________________" );
$pdf->Ln(8);//space ketinggian
$pdf->Cell(50,50,"Bil" );
$pdf->Cell(50, 50,"sitecode");
$pdf->Cell(50,50,"subject");
$pdf->Cell(50,50,"subject");
$pdf->Ln(1);//space ketinggian
//$pdf->Cell(50, 50,"______________________________________________________________________" );

$pdf->Ln(10);//space ketinggian

//isikandungan
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetTextColor(0,0,0);//tukar warna
$bil=0;
foreach($datas as $key=>$data):$bil++;
$pdf->Cell(50, 50,$bil."-" );
$pdf->Cell(50, 50,$data['Training']['sitecode'] );
$pdf->Cell(50, 50,$data['Training']['subject'] );
$pdf->Cell(50, 50,$data['Training']['id'] );
$pdf->Ln(10);//space ketinggian
endforeach;
//Close and output PDF document
$pdf->Output('example_014.pdf', 'I');

//============================================================+
// END OF FILE
//============================