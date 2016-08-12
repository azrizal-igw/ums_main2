<div class="acccodes index">
	<h2><?php echo __('Acccodes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo "Codes"?></th>
			<th><?php echo "Names"?></th>
			<th><?php echo "Descriptions"?></th>
			<th><?php echo "Actions"?></th>
			
			
			
	</tr>
	<?php
	foreach ($acccodes as $acccode): ?>
	<tr>
		<td><?php echo h($acccode['Acccode']['id']); ?>&nbsp;</td>
		
		<td><?php echo h($acccode['Acccode']['name']); ?>&nbsp;</td>
		<td><?php echo h($acccode['Acccode']['desc']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $acccode['Acccode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $acccode['Acccode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $acccode['Acccode']['id']), null, __('Are you sure you want to delete # %s?', $acccode['Acccode']['id'])); ?>
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
</div>
