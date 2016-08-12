<div class="admindetails index">
	<h2><?php echo __('Admindetails');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('localid');?></th>
			<th><?php echo $this->Paginator->sort('icno');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('username');?></th>
			<th><?php echo $this->Paginator->sort('password');?></th>
			<th><?php echo $this->Paginator->sort('sendstatus');?></th>
			<th><?php echo $this->Paginator->sort('sitecode');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($admindetails as $admindetail): ?>
	<tr>
		<td><?php echo h($admindetail['Admindetail']['id']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['localid']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['icno']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['name']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['username']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['password']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['sendstatus']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['created']); ?>&nbsp;</td>
		<td><?php echo h($admindetail['Admindetail']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $admindetail['Admindetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $admindetail['Admindetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $admindetail['Admindetail']['id']), null, __('Are you sure you want to delete # %s?', $admindetail['Admindetail']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Admindetail'), array('action' => 'add')); ?></li>
	</ul>
</div>
