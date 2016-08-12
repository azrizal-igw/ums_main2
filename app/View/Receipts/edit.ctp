<div class="receipts form">
<?php echo $this->Form->create('Receipt'); ?>
	<fieldset>
		<legend><?php echo __('Edit Receipt'); ?></legend>
	<?php
		echo $this->Form->input('id');
		// echo $this->Form->input('localid');
		echo $this->Form->input('receiptno');
		echo $this->Form->input('icno',array('disabled'=>'disabled'));
		// echo $this->Form->input('admindetail_localid');
		// echo $this->Form->input('browsing_localid');
		// echo $this->Form->input('browsing_time_start');
		echo $this->Form->input('bill_time',array('disabled'=>'disabled'));
		echo $this->Form->input('charge',array('disabled'=>'disabled'));
		echo $this->Form->input('paid');
		//echo $this->Form->input('acct');//
		// echo $this->Form->input('sendstatus');
		// echo $this->Form->input('entry_dt');
		// echo $this->Form->input('mod_dt');
		echo $this->Form->input('note');
		// echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Receipt.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Receipt.id'))); ?>--></li>

		<li><?php echo $this->Html->link(__('List Receipts'), array('action' => 'index')); ?></li>
	</ul>
</div>
