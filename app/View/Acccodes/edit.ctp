<div class="acccodes form">
<?php echo $this->Form->create('Acccode');?>
	<fieldset>
		<legend><?php echo __('Edit Acccode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('name');
		echo $this->Form->input('desc');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
