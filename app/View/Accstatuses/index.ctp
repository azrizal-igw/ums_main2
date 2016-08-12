<div class="accstatuses index">
	<h2><?php echo __('Accstatuses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('transmonth'); ?></th>
			<th><?php echo $this->Paginator->sort('sitecode'); ?></th>
			<th><?php echo $this->Paginator->sort('accstatustitle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('count'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($accstatuses as $accstatus): ?>
	<tr>
		<td><?php echo h($accstatus['Accstatus']['id']); ?>&nbsp;</td>
		<td><?php echo h($accstatus['Accstatus']['transmonth']); ?>&nbsp;</td>
		<td><?php echo h($accstatus['Accstatus']['sitecode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($accstatus['Accstatustitle']['name'], array('controller' => 'accstatustitles', 'action' => 'view', $accstatus['Accstatustitle']['id'])); ?>
		</td>
		<td><?php echo h($accstatus['Accstatus']['created']); ?>&nbsp;</td>
		<td><?php echo h($accstatus['Accstatus']['modified']); ?>&nbsp;</td>
		<td><?php echo h($accstatus['Accstatus']['count']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $accstatus['Accstatus']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $accstatus['Accstatus']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $accstatus['Accstatus']['id']), null, __('Are you sure you want to delete # %s?', $accstatus['Accstatus']['id'])); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Accstatus'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accstatustitles'), array('controller' => 'accstatustitles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatustitle'), array('controller' => 'accstatustitles', 'action' => 'add')); ?> </li>
	</ul>
</div>
