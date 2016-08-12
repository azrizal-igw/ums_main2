<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>
		<?php echo 'Pi1M Account' ?>
	</title>
</head>

<div id="container">
		<div id="content">	
		<?php echo $this->Session->flash(); ?>
		<div class="img">
		<?php 
					echo 
					$this->Html->image('logoheader.png', array('title'=> __('Pusat Internet 1Malaysia', true), 'border' => '0'))
				;?></div>
	
<div id="form1"><div id="form">


		
<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('loginstyle');
	echo $this->Form->create('User', array('action' => 'login'));
	echo $this->Form->inputs(array(    
							'legend' => false,   
							 'username' ,
                                 'password'));
	echo $this->Html->link('Forgot Password',array('action'=>'forgot_pass'),array('class'=>'forgot_password'));
	echo $this->Form->end('Login');

?></div>



</div>

</div></div>

</html>



