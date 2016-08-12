<div class="districts view">
<h2><?php  echo __('District');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($district['District']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($district['District']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($district['State']['name'], array('controller' => 'states', 'action' => 'view', $district['State']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit District'), array('action' => 'edit', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete District'), array('action' => 'delete', $district['District']['id']), null, __('Are you sure you want to delete # %s?', $district['District']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mukims'), array('controller' => 'mukims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Mukims');?></h3>
	<?php if (!empty($district['Mukim'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($district['Mukim'] as $mukim): ?>
		<tr>
			<td><?php echo $mukim['id'];?></td>
			<td><?php echo $mukim['name'];?></td>
			<td><?php echo $mukim['district_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'mukims', 'action' => 'view', $mukim['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'mukims', 'action' => 'edit', $mukim['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'mukims', 'action' => 'delete', $mukim['id']), null, __('Are you sure you want to delete # %s?', $mukim['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sites');?></h3>
	<?php if (!empty($district['Site'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($district['Site'] as $site): ?>
		<tr>
			<td><?php echo $site['id'];?></td>
			<td><?php echo $site['name'];?></td>
			<td><?php echo $site['state_id'];?></td>
			<td><?php echo $site['district_id'];?></td>
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
			<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
