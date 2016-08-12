<div class="adminhistories form">
<?php echo $this->Form->create('Adminhistory');?>
	<fieldset>
		<legend><?php echo __('Add Adminhistory'); ?></legend>
	<?php
		echo $this->Form->input('localid');
		echo $this->Form->input('admindetail_localid');
		echo $this->Form->input('timestart');
		echo $this->Form->input('timeend');
		echo $this->Form->input('sendstatus');
		echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Adminhistories'), array('action' => 'index'));?></li>
	</ul>
</div>
