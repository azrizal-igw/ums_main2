<div class="browsings form">

<?php echo $this->Form->create('Browsing');?>
	<fieldset>
		<legend><?php echo __('Edit Browsing'); ?></legend>
	<?php
	

		// echo $this->Form->input('id');
		// echo $this->Form->input('localid');
		echo $this->Form->input('icno',array('readonly'=>'readonly'));
		echo $this->Form->input('pcno');
		echo $this->Form->input('rate_per_hour');
		echo $this->Form->input('time_start');
		echo $this->Form->input('time_end');
		$typelist=array('0'=>'Prepaid','1'=>'Postpaid');
		echo $this->Form->input('type',array('options'=>$typelist, 'default'=>$this->Form->input('type')));
		$browselist=array('0'=>'Login','1'=>'Logout');
		echo $this->Form->input('browse_status',array('options'=>$browselist, 'default'=>$this->Form->input('browse_status')));
		$acctlist=array('0'=>'SKMM','1'=>'Personal');
		echo $this->Form->input('acct', array('options'=>$acctlist, 'default'=>$this->Form->input('acct')));
		$paidlist=array('0'=>'Unpaid','1'=>'Paid');
		echo $this->Form->input('paid', array('options'=>$paidlist, 'default'=>$this->Form->input('paid'))); 
		// echo $this->Form->input('sendstatus');
		// echo $this->Form->input('entry_dt');
		// echo $this->Form->input('mod_dt');
		echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Browsing.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Browsing.id'))); ?></li>

		<li><?php echo $this->Html->link(__('List Browsings'), array('action' => 'index'));?></li>
	</ul>
</div>
