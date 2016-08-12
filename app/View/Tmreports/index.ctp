<div class="tmreports index">
	<h2><?php echo __('Tmreports'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('portal'); ?></th>
			<th><?php echo $this->Paginator->sort('vsat'); ?></th>
			<th><?php echo $this->Paginator->sort('cdma'); ?></th>
			<th><?php echo $this->Paginator->sort('ipmsan'); ?></th>
			<th><?php echo $this->Paginator->sort('wbridge'); ?></th>
			<th><?php echo $this->Paginator->sort('atm'); ?></th>
			<th><?php echo $this->Paginator->sort('speed'); ?></th>
			<th><?php echo $this->Paginator->sort('tmexchange'); ?></th>
			<th><?php echo $this->Paginator->sort('nopctraining'); ?></th>
			<th><?php echo $this->Paginator->sort('nopcsurfing'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($tmreports as $tmreport): ?>
	<tr>
		<td><?php echo h($tmreport['Tmreport']['id']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['name']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['portal']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['vsat']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['cdma']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['ipmsan']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['wbridge']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['atm']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['speed']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['tmexchange']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['nopctraining']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['nopcsurfing']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($tmreport['User']['name'], array('controller' => 'users', 'action' => 'view', $tmreport['User']['id'])); ?>
		</td>
		<td><?php echo h($tmreport['Tmreport']['created']); ?>&nbsp;</td>
		<td><?php echo h($tmreport['Tmreport']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $tmreport['Tmreport']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $tmreport['Tmreport']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $tmreport['Tmreport']['id']), null, __('Are you sure you want to delete # %s?', $tmreport['Tmreport']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Tmreport'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
