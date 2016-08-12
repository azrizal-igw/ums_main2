<div class="adminhistories index">
	<h2><?php echo __('Adminhistories');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('localid');?></th>
			<th><?php echo $this->Paginator->sort('admindetail_localid');?></th>
			<th><?php echo $this->Paginator->sort('timestart');?></th>
			<th><?php echo $this->Paginator->sort('timeend');?></th>
			<th><?php echo $this->Paginator->sort('sendstatus');?></th>
			<th><?php echo $this->Paginator->sort('sitecode');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($adminhistories as $adminhistory): ?>
	<tr>
		<td><?php echo h($adminhistory['Adminhistory']['id']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['localid']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['admindetail_localid']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['timestart']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['timeend']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['sendstatus']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['created']); ?>&nbsp;</td>
		<td><?php echo h($adminhistory['Adminhistory']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $adminhistory['Adminhistory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $adminhistory['Adminhistory']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $adminhistory['Adminhistory']['id']), null, __('Are you sure you want to delete # %s?', $adminhistory['Adminhistory']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Adminhistory'), array('action' => 'add')); ?></li>
	</ul>
</div>
