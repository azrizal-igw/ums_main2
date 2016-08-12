<div class="phases view">
<h2><?php  echo __('Phase'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($phase['Phase']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($phase['Phase']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Phase'), array('action' => 'edit', $phase['Phase']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Phase'), array('action' => 'delete', $phase['Phase']['id']), null, __('Are you sure you want to delete # %s?', $phase['Phase']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Phases'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Phase'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sites'); ?></h3>
	<?php if (!empty($phase['Site'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Phase Id'); ?></th>
		<th><?php echo __('Mukim Id'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Region Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($phase['Site'] as $site): ?>
		<tr>
			<td><?php echo $site['id']; ?></td>
			<td><?php echo $site['name']; ?></td>
			<td><?php echo $site['phase_id']; ?></td>
			<td><?php echo $site['mukim_id']; ?></td>
			<td><?php echo $site['district_id']; ?></td>
			<td><?php echo $site['state_id']; ?></td>
			<td><?php echo $site['region_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sites', 'action' => 'view', $site['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sites', 'action' => 'edit', $site['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sites', 'action' => 'delete', $site['id']), null, __('Are you sure you want to delete # %s?', $site['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
