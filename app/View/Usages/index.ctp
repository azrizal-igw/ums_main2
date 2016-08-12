<h2><?php echo __('List Services'); ?></h2>
<?php 
	if ($this->Session->read('Auth.User.group_id') != 4) { // except manager can see the drop down
		echo $this->Session->read('Site.name')."&nbsp;&nbsp";
		echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'usages'));
	}
?>
<br/><br/>

<?php
	echo $this->Form->create('Usage',array('value'=>'search'));
	echo $this->Form->input('icno',array('label'=>'IC No.')); 
	echo $this->Form->input('transdate_from',array(													
		'label' => 'Date From',
		'type' => 'date',
		'timeFormat'=>'24',
		'dateFormat' => 'DMY', 
		'separator'=>'-',
	));
	echo $this->Form->input('transdate_to',array(
		'label' => 'Date To',
		'type' => 'date',
		'timeFormat'=>'24',
		'dateFormat' => 'DMY', 
		'separator'=>'-'																										
	));
?>
<?php 
	echo $this->Form->input('service_id', array(
		'label' => 'Service', 
		'id' => 'service_id', 
		'options' => $services, 
		'empty' => '-: Select Service :-', 
		'class' => 'form-control'
	)); 
?>
<?php echo $this->Form->hidden('site', array('value' => $sitecode, 'id' => 'site')); ?>
<table style="width:auto">
<tr>
	<td>
		<?php echo $this->Form->submit('Search', array('name' => 'search')); ?>
	</td>
	<td>
		<?php echo $this->Form->submit('Reset', array('value' => 'Reset', 'name' => 'reset')); ?>
	</td>
	<td>
		<?php echo $this->Form->submit('Report', array('value' => 'Report', 'name' => 'report', 'type' => 'button', 'id' => 'report-usage')); ?>
	</td>	
</tr>
</table>
<?php echo $this->Form->end(); ?>





<h2><?php echo __('Services');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $this->Paginator->sort('no'); ?></th>
	<th><?php echo $this->Paginator->sort('icno'); ?></th>
	<th><?php echo $this->Paginator->sort('service_id'); ?></th>
	<th><?php echo $this->Paginator->sort('transdate'); ?></th>
	<th><?php echo $this->Paginator->sort('sitecode'); ?></th>
	<th><?php echo $this->Paginator->sort('quantity'); ?></th>
	<th><?php echo $this->Paginator->sort('amount'); ?></th>
	<th><?php echo $this->Paginator->sort('points'); ?></th>
	<!--<th class="actions"><?php echo __('Actions'); ?></th>-->
</tr>




<?php
if (!empty($usages)) {
	$i = $this->Paginator->counter(array('format' => '%start%')) - 1;
	foreach ($usages as $usage) {
		$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo h($usage['Usage']['icno']); ?></td>
			<td><?php echo h($usage['Service']['name']); ?></td>
			<td><?php echo h($usage['Usage']['transdate']); ?></td>
			<td><?php echo h($usage['Usage']['sitecode']); ?></td>
			<td><?php echo h($usage['Usage']['quantity']); ?></td>
			<td><?php echo h($usage['Usage']['amount']); ?></td>
			<td><?php echo h($usage['Usage']['points']); ?></td>
			<!--
			<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usage['Usage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usage['Usage']['id']), null, __('Are you sure you want to delete # %s?', $usage['Usage']['id'])); ?>
			</td>
			-->
		</tr>
		<?php 
	} 
}
?>
</table>




<p>
<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	
</p>




<div class="paging">
<?php
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>


<script type="text/javascript">
$('#report-usage').click(function() {
 	var answer = confirm('The report will producing based on the search criteria. Please make sure the date range is not too long or the download will time consuming.\n\nAre you sure want to generate the userdetails report?');
 	if (answer == true) {		
 		var sitecode = $('#site').val();
 		if ($('#icno').val()) {
 			var icno = $('#icno').val();
 		}
 		else {
 			var icno = 0;
 		}
 		var datefrom = $('#UsageTransdateFromYear').val() + '-' + $('#UsageTransdateFromMonth').val() + '-' + $('#UsageTransdateFromDay').val();
 		var dateto = $('#UsageTransdateToYear').val() + '-' + $('#UsageTransdateToMonth').val() + '-' + $('#UsageTransdateToDay').val();
 		var site = $('#service').val();
 		if ($('#service_id').val()) {
 			var service = $('#service_id').val();
 		}
 		else {
 			var service = 0;
 		}		

		
		window.location.href = cms_web.v1.base_url + 'certrecords/print_usages/' + sitecode + '/' + icno + '/' + datefrom + '/' + dateto + '/' + service; 
	}	  
})	
</script>



