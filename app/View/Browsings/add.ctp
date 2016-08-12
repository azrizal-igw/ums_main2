<div class="browsings form">
<?php echo $this->Form->create('Browsing');?>
	<fieldset>
		<legend><?php echo __('Add Browsing'); ?></legend>
	<?php
		// echo $this->Form->input('localid');
		echo $this->Form->input('icno');
		echo $this->Form->input('pcno');
		echo $this->Form->input('rate_per_hour');
		echo $this->Form->input('time_start',array(
													
													'label' => 'Time Start',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
														
													));
		echo $this->Form->input('time_end',array(
													
													'label' => 'Time End',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
														
													));
		$typelist=array('0'=>'Prepaid','1'=>'Postpaid');
		echo $this->Form->input('type',array('options'=>$typelist, 'default'=>'1'));
		$browselist=array('0'=>'Login','1'=>'Logout');
		echo $this->Form->input('browse_status',array('options'=>$browselist, 'default'=>'1'));
		$acctlist=array('0'=>'SKMM','1'=>'Personal');
		echo $this->Form->input('acct', array('options'=>$acctlist, 'default'=>'0'));
		$paidlist=array('0'=>'Unpaid','1'=>'Paid');
		echo $this->Form->input('paid', array('options'=>$paidlist, 'default'=>'1')); 
		// echo $this->Form->input('sendstatus');
		// echo $this->Form->input('entry_dt');
		// echo $this->Form->input('mod_dt');
		echo $this->Form->input('sitecode',array('default'=>$this->Session->read('Site.sitecode'))); 
		echo $this->Form->label('Receipt Information:');
		echo $this->Form->input('receiptno');
		echo $this->Form->input('bill_time',array(
													
													'label' => 'Bill Time',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
														
													));
		echo $this->Form->input('charge');
		echo $this->Form->input('paid');
		echo $this->Form->input('note');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Browsings'), array('action' => 'index'));?></li>
	</ul>
</div>
