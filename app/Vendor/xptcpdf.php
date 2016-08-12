<?php
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    var $xheadertext  = 'PDF created using CakePHP and TCPDF'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'Copyright © %d Ingeniworks. All rights reserved.'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 
	var $xReportHeader = "Place Holder Title";

	//Create text
	public function CreateTextBox($textval, $x = 0, $y, $width = 0, $height = 10, $fontsize = 10, $fontstyle = '', $align = 'L') {
		$this->SetXY($x+20, $y); // 20 = margin left
		$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
		$this->Cell($width, $height, $textval, 0, false, $align);
	}     

    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
    public function Header() 
    { 
		//image path://otis/vendors/tcpdf/images
		//Logo Jata Negara
		//$image_file = K_PATH_IMAGES.'Jata_Negara.png';
        //$this->Image($image_file, 15, 10, 20, '', 'PNG', '', 'T', false, 100, '', false, false, 0, false, false, false);
        
        	//logo TM
		$image_file = K_PATH_IMAGES.'skmm.jpg';
        $this->Image($image_file,10, 1, 35, '', 'JPG', '', 'T', false, 400, '', false, false, 0, false, false, false);

        	//logo KPKK
		//$image_file = K_PATH_IMAGES.'kpkk.jpg';
       // $this->Image($image_file, 130, 10, 33, '', 'JPG', '', 'T', false, 400, '', false, false, 0, false, false, false);

		//logo MSD
		$image_file = K_PATH_IMAGES.'logo_tm.jpg';
        $this->Image($image_file,170, 1, 35, '', 'JPG', '', 'T', false, 400, '', false, false, 0, false, false, false);

		//$this->Line(20, 30, 195, 30);
		$this->SetXY(50,5);
		$this->SetFont('', 'B',10, '', 'false');
		$this->Cell(110,5,"Suruhanjaya Komunikasi Dan Multimedia Malaysia",0,0,'C',false);
		$this->SetXY(50,10);
		$this->SetFont('', '',10, '', 'false');
		$this->Cell(110,5,"Malaysia Comunications And Multimedia Commissions",0,0,'C',false);
		$this->SetXY(50,15);
		$this->SetFont('', 'B',10, '', 'false');
		$this->Cell(110,5,"USP MONITORING SYSTEM",0,0,'C',false);
		$this->SetXY(50,20);
		$this->SetFont('', 'B',10, '', 'false');
		$this->Cell(110,5,"Comunity Broadband Center",0,0,'C',false);
		$this->SetXY(50,25);
		$this->SetFont('', 'B',10, '', 'false');
		$this->Cell(110,5,date('l d m Y'),0,0,'C',false);
		$this->ln(20);
		//$this->CreateTextBox('HCAD Public Training-1 Malaysia Initiatives for KPKK', 0, 29, 0, 10, 13, 'B','C');
		//$this->CreateTextBox($this->xReportHeader, 0, 34, 180, 20, 12,'B','C');
	

		
        /*list($r, $b, $g) = $this->xheadercolor;
        $this->setY(15); // shouldn't be needed due to page margin, but helas, otherwise it's at the page top 
        $this->SetFillColor($r, $b, $g); 
        $this->SetTextColor(0 , 0, 0); 
        $this->Cell(0,10, '', 0,1,'C', 1);
        $this->Text(15,26,$this->xheadertext ); */
    } 


    /** 
    * Overwrites the default footer 
    * set the text in the view using 
    * $fpdf->xfootertext = 'Copyright © %d YOUR ORGANIZATION. All rights reserved.'; 
    */ 
    public function Footer()
    { 
        $year = date('Y'); 
        $footertext = sprintf($this->xfootertext, $year); 
        $this->SetY(-20);
        $this->SetTextColor(0, 0, 0);
        $this->SetFont($this->xfooterfont,'',$this->xfooterfontsize);
        $this->Cell(0,8, $footertext,'T',1,'C');
        $this->Cell(0,8,'Date: '.date('Y-m-d'), 0, false, 'L', 0, '', 0, false);
        $this->Cell(0,8,'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false);
        //$this->SetXY($x+20, $y); // 20 = margin left
        //$this->SetFont(PDF_FONT_NAME_MAIN, $fontstyle, $fontsize);
        //$this->Cell($width, $height, $textval, 0, false, $align);

    }
	
	function movedegreex($mydegree = null, $r = null){
		
		$mydegree =  deg2rad($mydegree);
			
		$x = sin ($mydegree) * $r;
		
		return $x;
		
	}
	
	function movedegreey($mydegree = null, $r = null){
	
		$mydegree =  deg2rad($mydegree);
		
		$y = cos ($mydegree) * $r;
		
		return $y;
	
	}
	
	function midVal($x,$y){
	
		$z = (($y - $x) / 2) + $x;
		return $z;
	
	}

	public function TextPie($xc,$yc,$R,$degreeX,$degreeY,$string) {
	
		//$degC = midVal($degreeX,$degreeY);
		//$x = movedegreex($degC,$R);
		//$y = movedegreey($degC,$R);
		$degC = (($degreeY - $degreeX) / 2) + $degreeX;
		$x = sin(deg2rad($degC)) * $R;
		$y = cos(deg2rad($degC)) * $R;
		
		$x = $xc + $R + $x; // distance from left ($xc) + radius of the circle ($R) + distance on X plane moved by some degree
		
		$y = $yc + $R - $y; // distance from top ($yc) - radius of the circle ($R) + distance on Y plane moved by some degree
	
		$this->Text($x, $y, $string); // actually show it on the pie chart
	
	}

} 
?>