<div class="receipts form">
<?php echo $this->Form->create('Receipt'); ?>
	<fieldset>
		<legend><?php echo __('Add Receipt'); ?></legend>
	<?php
		echo $this->Form->input('localid');
		echo $this->Form->input('receiptno');
		echo $this->Form->input('icno');
		echo $this->Form->input('admindetail_localid');
		echo $this->Form->input('browsing_localid');
		echo $this->Form->input('browsing_time_start');
		echo $this->Form->input('bill_time');
		echo $this->Form->input('charge');
		echo $this->Form->input('paid');
		echo $this->Form->input('acct');
		echo $this->Form->input('sendstatus');
		echo $this->Form->input('entry_dt');
		echo $this->Form->input('mod_dt');
		echo $this->Form->input('note');
		echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Receipts'), array('action' => 'index')); ?></li>
	</ul>
</div>
