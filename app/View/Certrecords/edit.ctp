<div class="certrecords">
<?php echo $this->Form->create('Certrecord');?>
	<fieldset>
	<legend><?php echo __('Edit Cert Record'); ?></legend>
	<?php
		echo $this->Form->input('status_paid', array('label' => 'Amount Paid'));
		echo $this->Form->input('status_print', array('label' => 'Printed?', 'empty'=>'- Select -', 'type' => 'select', 'options' => array(0 => 'No', 1 => 'Yes')));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
