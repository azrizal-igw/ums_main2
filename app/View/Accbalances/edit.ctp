<div class="accbalances form">
<?php echo $this->Form->create('Accbalance');?>
	<fieldset>
		<legend><?php echo __('Edit Accbalance'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('code');
		echo $this->Form->input('transmonth');
		echo $this->Form->input('bf');
		echo $this->Form->input('dr');
		echo $this->Form->input('cr');
		echo $this->Form->input('bal');
		echo $this->Form->input('user_id');
		echo $this->Form->input('siteid');
		echo $this->Form->input('entrydate');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
