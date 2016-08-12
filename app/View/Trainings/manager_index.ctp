<div class="trainings">
<?php echo $this->Form->create('Training',array('type'=>'post','action'=>'admin_index')); ?>
<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php // echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'trainings')); ?><br/><br/>

<table>
<?php
	echo $this->Form->input('course_id',array('empty'=>'-: Select course :-'));
?>
<?php
	echo $this->Form->input('module_id',array('empty'=>'-: Select module :-'));
?>
</table>
<table style="width:auto">
<tr>
<td>
<?php echo $this->Form->submit('Search');?>
</td>
<td>
<?php echo $this->Form->end(array('name'=>'default','label'=>'Reset'));?>
</td>
</tr>
</table>
	<h2><?php echo __('Trainings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	        <th><?php echo '#'?></th>
			<!--<th><?php echo $this->Paginator->sort('id');?></th>-->
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th><?php echo $this->Paginator->sort('module_id');?></th>
			<th><?php echo $this->Paginator->sort('sitecode');?></th>
			<th><?php echo $this->Paginator->sort('StartTime');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('trainer');?></th>
			<th><?php echo $this->Paginator->sort('traininglocation');?></th>
			<th><?php echo $this->Paginator->sort('subject');?></th>
			<!--
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th><?php echo $this->Paginator->sort('capacity');?></th>
			<th><?php echo $this->Paginator->sort('finalize');?></th>
			<th><?php echo $this->Paginator->sort('finalizetime');?></th>
			<th><?php echo $this->Paginator->sort('finalizedby');?></th>
			-->
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($trainings as $training): ?>
	<tr>
	    <td><?php echo $j;$j++; ?>&nbsp;</td>
		<!--<td><?php echo h($training['Training']['id']); ?>&nbsp;</td>-->
		<td>
			<?php echo $this->Html->link($training['Course']['name'], array('controller' => 'courses', 'action' => 'view', $training['Course']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($training['Module']['name'], array('controller' => 'modules', 'action' => 'view', $training['Module']['id'])); ?>
		</td>
		<td><?php echo h($training['Training']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['StartTime']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($training['User']['name'], array('controller' => 'users', 'action' => 'view', $training['User']['id'])); ?>
		</td>
		<td><?php echo h($training['Training']['trainer']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['traininglocation']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['subject']); ?>&nbsp;</td>
		<!--
		<td><?php echo h($training['Training']['created']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['modified']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['capacity']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['finalize']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['finalizetime']); ?>&nbsp;</td>
		<td><?php echo h($training['Training']['finalizedby']); ?>&nbsp;</td>
		-->
		<td class="actions">
		    <?php echo $this->Html->link(__('AddTrainee'), array('action' => 'addtrainees', $training['Training']['id'])); ?>
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $training['Training']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $training['Training']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $training['Training']['id']), null, __('Are you sure you want to delete # %s?', $training['Training']['id'])); ?>
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

