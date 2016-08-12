<?php
App::uses('AppModel', 'Model');
/**
 * Accmonth Model
 *
 */
class Accmonth extends AppModel {

public function getNextMonth()
{

	$currmonth = $this->findById(1);
	pr($currmonth['Accmonth']['ym']);
    $mth = substr((string)$currmonth['Accmonth']['ym'], 4, 2);
	$yr = substr((string)$currmonth['Accmonth']['ym'], 0, 4);
	if ($mth == '12')
	{
		$yr = $yr + 1;
		$mth = '01';
	}
	else
	{
		$mth = $mth + 1;
		if ($mth < 10)
			$mth = "0".$mth; //to put zero in-front..
	}
	// pr ($yr.$mth);
	return $yr.$mth;	
}

}
