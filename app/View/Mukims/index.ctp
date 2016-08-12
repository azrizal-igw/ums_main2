<div class="mukims index">
	<h2><?php echo __('Mukims');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('district_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($mukims as $mukim): ?>
	<tr>
		<td><?php echo h($mukim['Mukim']['id']); ?>&nbsp;</td>
		<td><?php echo h($mukim['Mukim']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($mukim['District']['name'], array('controller' => 'districts', 'action' => 'view', $mukim['District']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $mukim['Mukim']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $mukim['Mukim']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $mukim['Mukim']['id']), null, __('Are you sure you want to delete # %s?', $mukim['Mukim']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Mukim'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
