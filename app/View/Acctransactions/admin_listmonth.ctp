<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	
		
	     <?php echo $this->Form->create('Acctransaction');?>
<tr><td><?php echo $this->Form->month('mob',array('width' =>20)); ?></td></tr>
<tr><td><?php echo $this->Form->year('Year',2012,2017);?></td></tr>
	    <?php echo $this->Form->end(__('Submit'));
	          echo $this->Form->end();?>
</div>

<div class="acctransactions index">
	
	<div>
		<div><<<?php echo $this->Html->link(__(date('m Y',strtotime($lastmonth_transmonth))), array('action' => 'listmonth', $lastmonth_transmonth)); ?>&nbsp;&nbsp;&nbsp;
		<?php echo $this->Html->link(__('Current month'), array('action' => 'listmonth', date('Ymd'))); ?>&nbsp;&nbsp;&nbsp;
		<?php echo $this->Html->link(__(date('m Y',strtotime($nextmonth_transmonth))), array('action' => 'listmonth', $nextmonth_transmonth)); ?>>>></div>
	</div>
	<br />
	<h2><?php echo __('Acctransactions : '.date('m Y',strtotime($thismonth_transmonth)));?>
	
	<?php if ($accdetail['accclosed'] == 'closed') {?>
		[ Closed ]
	<?php } else if (substr($thismonth_transmonth,0,6) < date('Ym') ){?>
		<?php echo $this->Html->link(__('Close this account'), array('action' => 'closeaccount', substr($thismonth_transmonth,0,6),$sitecode), null, __('Are you sure you want to closed this account ?')); ?>&nbsp;&nbsp;<?php }?>
	</h2>
	<br />
	

	<!-- show debit data -->
	On Hand Account
	<table width="100px" cellpadding="0" cellspacing="0">
	<tr>
			<th >Brought Forward</th>
			<th >Total Debit</th>
			<!--<th>transdate</th>-->
			<th >Total Credit</th>
			<th >Cash In Hand</th>
	</tr>
	
	<tr>
		<td><?php echo $accdetail['accbalance_hand']['bf']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['dr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['cr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['bal']; ?>&nbsp;</td>
	</tr>
	
	</table>
	</br></br>
	
	
	
	<!-- Detail account -->
	Details On Hand Account
	<table width="100px" cellpadding="0" cellspacing="0">
	<tr>
			<th >Account</th>
			<th >Account Code</th>
			<th >Debit</th>
			<!--<th>transdate</th>-->
			<th >Credit</th>
			
	</tr>
	<?php $totalDr=0; $totalCr=0;?>
	<?php foreach($accdetail['acccodes'] as $code=>$cccode) { ?>
	<tr>
		<td><?php echo $cccode['name']; ?>&nbsp;</td>
		<td><?php echo $code; ?>&nbsp;</td>
		<td><?php echo $cccode['dr']; ?>&nbsp;</td>
		<td><?php echo $cccode['cr']; ?>&nbsp;</td>
		
		
	</tr>
	<?php }?>
	<tr><td colspan="2" class='total'>Total : </td><td class='total'><?php echo  $totalDr;?></td><td class='total'><?php echo  $totalCr;?></td></tr>
	
	</table>
	</br></br>
	On Bank Account
	<table width="100px" cellpadding="0" cellspacing="0">
	<tr>
			<th >Brought Forward</th>
			<th >Total Debit</th>
			<!--<th>transdate</th>-->
			<th >Total Credit</th>
			<th >Cash In Bank</th>
	</tr>
	
	<tr>
		<td><?php echo $accdetail['accbalance_bank']['bf']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_bank']['dr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_bank']['cr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_bank']['bal']; ?>&nbsp;</td>
	</tr>
	
	</table>

	
	
	
	
</div>
