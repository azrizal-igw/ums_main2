<div class="groups form">
<?php echo $this->Form->create('Group');?>
	<fieldset>
		<legend><?php echo __('Add Group'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('modifield');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
