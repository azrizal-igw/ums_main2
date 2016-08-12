<div class="courses view">
<h2><?php  echo __('Course');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($course['Course']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Code'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($course['Course']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Desc'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Course Kpi'); ?></dt>
		<dd>
			<?php echo h($course['Course']['course_kpi']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($course['Course']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($course['Course']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Course'), array('action' => 'edit', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Course'), array('action' => 'delete', $course['Course']['id']), null, __('Are you sure you want to delete # %s?', $course['Course']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Courses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Course'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Modules'), array('controller' => 'modules', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Modules');?></h3>
	<?php if (!empty($course['Module'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Module Code'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Module Desc'); ?></th>
		<th><?php echo __('Module Duration'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($course['Module'] as $module): ?>
		<tr>
			<td><?php echo $module['id'];?></td>
			<td><?php echo $module['module_code'];?></td>
			<td><?php echo $module['name'];?></td>
			<td><?php echo $module['module_desc'];?></td>
			<td><?php echo $module['module_duration'];?></td>
			<td><?php echo $module['course_id'];?></td>
			<td><?php echo $module['parent_id'];?></td>
			<td><?php echo $module['created'];?></td>
			<td><?php echo $module['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'modules', 'action' => 'view', $module['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'modules', 'action' => 'edit', $module['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'modules', 'action' => 'delete', $module['id']), null, __('Are you sure you want to delete # %s?', $module['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Module'), array('controller' => 'modules', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Trainings');?></h3>
	<?php if (!empty($course['Training'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Module Id'); ?></th>
		<th><?php echo __('Location Id'); ?></th>
		<th><?php echo __('Starttime'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Trainer'); ?></th>
		<th><?php echo __('Traininglocation'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Capacity'); ?></th>
		<th><?php echo __('Finalize'); ?></th>
		<th><?php echo __('Finalizetime'); ?></th>
		<th><?php echo __('Finalizedby'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($course['Training'] as $training): ?>
		<tr>
			<td><?php echo $training['id'];?></td>
			<td><?php echo $training['course_id'];?></td>
			<td><?php echo $training['module_id'];?></td>
			<td><?php echo $training['location_id'];?></td>
			<td><?php echo $training['starttime'];?></td>
			<td><?php echo $training['user_id'];?></td>
			<td><?php echo $training['trainer'];?></td>
			<td><?php echo $training['traininglocation'];?></td>
			<td><?php echo $training['title'];?></td>
			<td><?php echo $training['created'];?></td>
			<td><?php echo $training['modified'];?></td>
			<td><?php echo $training['capacity'];?></td>
			<td><?php echo $training['finalize'];?></td>
			<td><?php echo $training['finalizetime'];?></td>
			<td><?php echo $training['finalizedby'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'trainings', 'action' => 'view', $training['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'trainings', 'action' => 'edit', $training['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trainings', 'action' => 'delete', $training['id']), null, __('Are you sure you want to delete # %s?', $training['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
