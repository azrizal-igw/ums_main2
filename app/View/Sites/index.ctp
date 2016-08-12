<div class="actions"><ul>
<?php foreach($states as $id => $state) { ?><li><?php echo $this->Html->link(__($state), array('action' => 'index', $id)); ?></li><?php } ?></ul>
</div>

<div class="sites index">
	<h2><?php echo __('Sites');  ?> </h2> 
	<div align="right"><?php echo $this->Html->link(__('Add Site'), array('action' => 'add', $state_id)); ?><br></div>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Site Code');?></th>
			<th><?php echo $this->Paginator->sort('Site name');?></th>
			<th><?php echo $this->Paginator->sort('district name');?></th>
			<th><?php echo $this->Paginator->sort('state_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($sites as $site): ?>
	<tr>
		<td><?php echo h($site['Site']['id']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['name']); ?>&nbsp;</td>
		<td><?php echo $site['District']['name']; ?>&nbsp;</td>
		<td><?php echo $this->Html->link($site['State']['name'], array('controller' => 'states', 'action' => 'view', $site['State']['id'])); ?></td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), null, __('Are you sure you want to delete # %s?', $site['Site']['id'])); ?>
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

