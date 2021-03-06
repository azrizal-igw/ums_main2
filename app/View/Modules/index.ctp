<div class="modules index">
	<h2><?php echo __('Modules');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('module_code');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('module_desc');?></th>
			<th><?php echo $this->Paginator->sort('module_duration');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('parent_id');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($modules as $module): ?>
	<tr>
		<td><?php echo h($module['Module']['id']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['module_code']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['name']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['module_desc']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['module_duration']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($module['Course']['name'], array('controller' => 'courses', 'action' => 'view', $module['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($module['ParentModule']['name'], array('controller' => 'modules', 'action' => 'view', $module['ParentModule']['id'])); ?>
		</td>
		<td><?php echo h($module['Module']['created']); ?>&nbsp;</td>
		<td><?php echo h($module['Module']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $module['Module']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $module['Module']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $module['Module']['id']), null, __('Are you sure you want to delete # %s?', $module['Module']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Module'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Courses'), array('controller' => 'courses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('controller' => 'courses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
	</ul>
</div>
