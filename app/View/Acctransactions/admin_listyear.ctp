<div class="actions">
 <?php echo $this->Form->create('Acctransaction');?>
<?php echo $this->Form->input('site',array('style'=>'width: 170px','empty'=>'-:Select Site:-'));?>
<?php echo $this->Form->end(__('Submit'));?>
</div>

<div class="acctransactions index">
	
	<?php if (isset($accdetails)) { ?>
	
	<div>
		<div><<<?php echo $this->Html->link(__($transyear - 1), array('action' => 'admin_listyear', $transyear - 1,$sitecode)); ?>&nbsp;&nbsp;&nbsp;
		<?php echo $this->Html->link(__($transyear + 1), array('action' => 'admin_listyear', $transyear + 1,$sitecode)); ?>>>></div>
	</div>
	<br />
	<h2><?php echo __('Acctransactions : '.$transyear);?></h2>
	

	<!-- show debit data -->
	On Hand Account
	<table width="100px" cellpadding="0" cellspacing="0">
	<tr>
			<th >Trans Month</th>
			<th>Status</th>
			<th >Brought Forward</th>
			<th >Dr</th>
			<th >Cr</th>
			<th >Total</th>
	</tr>
	
	<?php foreach ($accdetails as $transmonth => $accdetail) {?>
	<tr>
		<td><?php echo $this->Html->link(__( $transmonth), array('action' => 'admin_listmonth',  $transmonth,$sitecode)); ?>&nbsp;</td>
		<td><?php echo $accdetail['accclosed']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['bf']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['dr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['cr']; ?>&nbsp;</td>
		<td><?php echo $accdetail['accbalance_hand']['bal']; ?>&nbsp;</td>
		
	</tr>
	<?php } ?>
	</table>
	</br></br>
	
	<?php } else {?>
	--: Please Select Site :-- 
	<?php } ?>
	
	
	
	
</div>
