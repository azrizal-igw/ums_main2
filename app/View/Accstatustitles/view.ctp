<div class="accstatustitles view">
<h2><?php  echo __('Accstatustitle'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accstatustitle['Accstatustitle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($accstatustitle['Accstatustitle']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accstatustitle'), array('action' => 'edit', $accstatustitle['Accstatustitle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accstatustitle'), array('action' => 'delete', $accstatustitle['Accstatustitle']['id']), null, __('Are you sure you want to delete # %s?', $accstatustitle['Accstatustitle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accstatustitles'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatustitle'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accstatuses'), array('controller' => 'accstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatus'), array('controller' => 'accstatuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Accstatuses'); ?></h3>
	<?php if (!empty($accstatustitle['Accstatus'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transmonth'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Accstatustitle Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Count'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($accstatustitle['Accstatus'] as $accstatus): ?>
		<tr>
			<td><?php echo $accstatus['id']; ?></td>
			<td><?php echo $accstatus['transmonth']; ?></td>
			<td><?php echo $accstatus['sitecode']; ?></td>
			<td><?php echo $accstatus['accstatustitle_id']; ?></td>
			<td><?php echo $accstatus['created']; ?></td>
			<td><?php echo $accstatus['modified']; ?></td>
			<td><?php echo $accstatus['count']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'accstatuses', 'action' => 'view', $accstatus['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'accstatuses', 'action' => 'edit', $accstatus['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'accstatuses', 'action' => 'delete', $accstatus['id']), null, __('Are you sure you want to delete # %s?', $accstatus['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Accstatus'), array('controller' => 'accstatuses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
