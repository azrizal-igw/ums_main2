<div class="districts index">
	<h2><?php echo __('Districts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('state_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($districts as $district): ?>
	<tr>
		<td><?php echo h($district['District']['id']); ?>&nbsp;</td>
		<td><?php echo h($district['District']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($district['State']['name'], array('controller' => 'states', 'action' => 'view', $district['State']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $district['District']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $district['District']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $district['District']['id']), null, __('Are you sure you want to delete # %s?', $district['District']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New District'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mukims'), array('controller' => 'mukims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
