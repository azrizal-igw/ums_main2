<div class="ictknowledges index">
	<h2><?php echo __('Ictknowledges');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('bm');?></th>
			<th><?php echo $this->Paginator->sort('eng');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($ictknowledges as $ictknowledge): ?>
	<tr>
		<td><?php echo h($ictknowledge['Ictknowledge']['id']); ?>&nbsp;</td>
		<td><?php echo h($ictknowledge['Ictknowledge']['bm']); ?>&nbsp;</td>
		<td><?php echo h($ictknowledge['Ictknowledge']['eng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ictknowledge['Ictknowledge']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ictknowledge['Ictknowledge']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ictknowledge['Ictknowledge']['id']), null, __('Are you sure you want to delete # %s?', $ictknowledge['Ictknowledge']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ictknowledge'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>
