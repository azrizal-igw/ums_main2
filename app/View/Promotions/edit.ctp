<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promotion'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('eventdate');
		echo $this->Form->input('name');
		echo $this->Form->input('venue');
		echo $this->Form->input('target_id');
		echo $this->Form->input('sitecode');
	//	echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

