<div class="accbalances index">
	<h2><?php echo __('Accbalances');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('transmonth');?></th>
			<th><?php echo $this->Paginator->sort('bf');?></th>
			<th><?php echo $this->Paginator->sort('dr');?></th>
			<th><?php echo $this->Paginator->sort('cr');?></th>
			<th><?php echo $this->Paginator->sort('bal');?></th>
			<th><?php echo $this->Paginator->sort('sitecode');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			
	</tr>
	<?php
	foreach ($accbalances as $accbalance): ?>
	<tr>
		
		<td><?php echo h($accbalance['Accbalance']['transmonth']); ?>&nbsp;</td>
		<td><?php echo h($accbalance['Accbalance']['bf']); ?>&nbsp;</td>
		<td><?php echo h($accbalance['Accbalance']['dr']); ?>&nbsp;</td>
		<td><?php echo h($accbalance['Accbalance']['cr']); ?>&nbsp;</td>
		<td><?php echo h($accbalance['Accbalance']['bal']); ?>&nbsp;</td>
	
		<td><?php echo h($accbalance['Accbalance']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($accbalance['Accbalance']['created']); ?>&nbsp;</td>
		
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
</div>
