
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Change password'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('password');
		echo $this->Form->input('password_confirm',array('type'=>'password'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>

