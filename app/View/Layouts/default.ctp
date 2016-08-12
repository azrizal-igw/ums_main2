<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = ('CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo 'Pi1M Account' ?>:
		<?php echo $title_for_layout; ?>
	</title>
<?php echo $this->Html->css('lightbox'); ?>
<?php echo $this->Html->css('view_detail'); ?>
	<?php
        echo $this->Html->script('jquery-1.8.0.min');
        echo $this->Html->script('jquery.bpopup-0.7.0.min');
        
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
        echo $this->Html->script('baseurl');
	?>
    <script src="http://malsup.github.com/jquery.form.js"></script> 
</head>
<body>
	<div id="container">
		<div id="header">
		<div class="inside">
		<div class="img">
		<?php  echo
					
					$this->Html->image('logoheader.png', array('title'=> __('Pusat Internet 1Malaysia', true), 'border' => '0'))

					
				?></div>
		<h1><?php echo "Welcome: ".$this->Session->read('Auth.User.name');?></h1>
		<div><?php echo $this->element('menu_'.$this->Session->read('Auth.User.group_id')); ?></div>
        <div style="display: none;" id="show_loading">Loading...</div></div>
		
		</div></div>
		
		
	
		<div id="content">
		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<div class="copyright">
			<p align="center">
			<?php echo ('Copyright Ingeniworks Sdn. Bhd.')?>
			
			
		</div>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
