<div class="sites form">
<?php echo $this->Javascript->link('jquery-1.4.2.min');?>  <!-- call jquery -->


<?php echo $this->Form->create('Site');?>
	
		<?php echo __('Edit Site'); ?>
	<?php
		echo $this->Form->input('id',array('type'=>'text'));
		echo $this->Form->input('name');
		echo $this->Form->input('state_id');?>
		<div id='module_selected'>
		<?php echo $this->Form->input('district_id');?>
		</div>
		<?php
		// echo $this->Form->input('district_id');
		
	?>
	
<?php echo $this->Form->end(__('Submit'));?>

<!--call ajax "observeField" -->
<?php echo $this->Ajax->observeField	('SiteStateId', array	('url' => array('action' => 'listdistrict'),
															'update'=>'module_selected',
															'frequency' => 0.2,
															
															)
								); ?>

</div>