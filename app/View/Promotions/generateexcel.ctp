<?php


// foreach ($promotions as $d) { 
    // // $this->PhpExcel->addTableRow(array( 
        // echo $d['Promotion']['eventdate'];
        // echo $d['Promotion']['name'];
        // echo $d['Promotion']['venue']; 
        // echo $d['Promotion']['sitecode']; 
        // echo $d['Promotion']['user_id']; 
    // // )); 
// } 

$this->PhpExcel->createWorksheet(); 
$this->PhpExcel->setDefaultFont('Calibri', 12); 


$table = array( 
    array('label' => __('Eventdate'), 'width' => 'auto', 'filter' => true), 
    array('label' => __('Name'), 'width' => 'auto', 'filter' => true), 
    array('label' => __('Venue'), 'width' => 'auto'), 
    array('label' => __('Sitecode'), 'width' => 50, 'wrap' => true), 
    array('label' => __('User'), 'width' => 'auto') 
); 


$this->PhpExcel->addTableHeader($table, array('name' => 'Cambria', 'bold' => true)); 

// data 
foreach ($promotions as $d) { 
    $this->PhpExcel->addTableRow(array( 
        $d['Promotion']['eventdate'], 
        $d['Promotion']['name'], 
        $d['Promotion']['venue'], 
        $d['Promotion']['sitecode'], 
        $d['Promotion']['user_id'] 
    )); 
} 


 
$this->PhpExcel->addTableFooter(); 
$this->PhpExcel->output(); 

?>