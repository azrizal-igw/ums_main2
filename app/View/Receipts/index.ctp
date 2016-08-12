<!--<div class="receipts index">-->
<h2><?php echo __('Receipts'); ?></h2>
<?php if (in_array($this->Session->read('Auth.User.group_id'), array(1,2,3,7))) { ?>

<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'receipts'));}?><br/><br/>
	
<?php echo $this->Form->create('Receipt'); ?>
<?php echo $this->Form->input('receiptno',array('label'=>'Receipt No.')); ?>
<?php echo $this->Form->input('icno',array('label'=>'IC No.')); ?>


	<?php
		echo $this->Form->create('Receipt',array('value'=>'search'));
		echo 	$this->Form->input('bill_time1',array(													
													'label' => 'Bill Time From',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
													));


		echo 	$this->Form->input('bill_time2',array(
													'label' => 'Bill Time To',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-'																										
													));
		echo $this->Form->hidden('site', array('value' => $sitecode, 'id' => 'site'));
		//echo 	$this->Form->input('sitecode',array('options'=>$sites));
		//echo 	$this->Form->input('options',array('options'=>array('HTML','PDF')));
		//echo $this->Form->end(__('Submit'));
	?>
	<table style="width:auto">
<tr>
<td>
<?php echo $this->Form->submit('Search');?>
</td>
<td>
<?php echo $this->Form->end(array('name'=>'default','label'=>'Reset'));?>
</td>
<td>
<?php echo $this->Form->submit('Report', array('type' => 'button', 'value' => 'Report', 'id' => 'report')); ?>	
</td>
</tr>
</table>
	<table cellpadding="0" cellspacing="0">
	<tr><!--
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('localid'); ?></th>
		-->
		    <th><?php echo '#'?></th>
			<th><?php echo $this->Paginator->sort('receiptno'); ?></th>
			<th><?php echo $this->Paginator->sort('icno'); ?></th>
		<!--
			<th><?php echo $this->Paginator->sort('admindetail_localid'); ?></th>
			<th><?php echo $this->Paginator->sort('browsing_localid'); ?></th>
		-->
			<th><?php echo $this->Paginator->sort('browsing_time_start'); ?></th>
			<th><?php echo $this->Paginator->sort('bill_time'); ?></th>
			<th><?php echo $this->Paginator->sort('charge'); ?></th>
			<th><?php echo $this->Paginator->sort('paid'); ?></th>
			<th><?php echo $this->Paginator->sort('acct'); ?></th>
		<!--
			<th><?php echo $this->Paginator->sort('sendstatus'); ?></th>
			<th><?php echo $this->Paginator->sort('entry_dt'); ?></th>
			<th><?php echo $this->Paginator->sort('mod_dt'); ?></th>
		-->
			<th><?php echo $this->Paginator->sort('note'); ?></th>
			<th><?php echo $this->Paginator->sort('sitecode'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($receipts as $receipt): ?>
	<tr><!--
		<td><?php echo h($receipt['Receipt']['id']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['localid']); ?>&nbsp;</td>
		-->
		<td><?php echo $j;$j++; ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['receiptno']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['icno']); ?>&nbsp;</td>
		<!--
		<td><?php echo h($receipt['Receipt']['admindetail_localid']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['browsing_localid']); ?>&nbsp;</td>
		-->
		<td><?php echo h($receipt['Receipt']['browsing_time_start']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['bill_time']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['charge']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['paid']); ?>&nbsp;</td>
		<!--<td><?php echo h($receipt['Receipt']['acct']); ?>&nbsp;</td>-->
		<td><?php if ($receipt['Receipt']['acct'] ==1) {echo "Personal";}else{echo "SKMM";}; ?>&nbsp;</td>
		<!--
		<td><?php echo h($receipt['Receipt']['sendstatus']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['entry_dt']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['mod_dt']); ?>&nbsp;</td>
		-->
		<td><?php echo h($receipt['Receipt']['note']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['created']); ?>&nbsp;</td>
		<td><?php echo h($receipt['Receipt']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $receipt['Receipt']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $receipt['Receipt']['id'])); ?>
			<!--<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $receipt['Receipt']['id']), null, __('Are you sure you want to delete # %s?', $receipt['Receipt']['id'])); ?>-->
		</td>
	</tr>
<?php endforeach; ?>
</table>
<p>
<?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	</p>

<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>


<script type="text/javascript">
$('#report').click(function() {
 	var answer = confirm('The report will producing based on the search criteria. Please make sure the date range is not too long or the download will time consuming.\n\nAre you sure want to generate the receipts report?'); 	
 	if (answer == true) {
 		var site = $('#site').val();
 		// receipt no
 		if ($('#ReceiptReceiptno').val()) {
 			var name = $('#ReceiptReceiptno').val();
 		}
 		else {
 			var name = 0;
 		}
 		// icno
 		if ($('#ReceiptIcno').val()) {
 			var icno = $('#ReceiptIcno').val();
 		}
 		else {
 			var icno = 0;
 		}
 		var datefrom = $('#ReceiptBillTime1Year').val() + '-' + $('#ReceiptBillTime1Month').val() + '-' + $('#ReceiptBillTime1Day').val();
 		var dateto = $('#ReceiptBillTime2Year').val() + '-' + $('#ReceiptBillTime2Month').val() + '-' + $('#ReceiptBillTime2Day').val();
 		// alert(cms_web.v1.base_url + 'certrecords/jasperuserdetails/receipts/' + site + '/' + icno + '/' + name + '/' + datefrom + '/' + dateto);
 		window.location.href = cms_web.v1.base_url + 'certrecords/jasperuserdetails/receipts/' + site + '/' + icno + '/' + name + '/' + datefrom + '/' + dateto;
	}	  
})	
</script>

