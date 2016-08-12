	<h2><?php echo __('Promotions'); ?></h2>
	<?php if ($this->Session->read('Auth.User.group_id') != 4){ ?>
	<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
	<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'promotions'));}?><br/><br/>



	<?php
		echo $this->Form->create('Promotion',array('value'=>'search'));
		echo $this->Form->input('name',array('label'=>'Event name')); 
		echo 	$this->Form->input('eventdate1',array(													
													'label' => 'Date From',
													'type' => 'date',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
													));


		echo 	$this->Form->input('eventdate2',array(
													'label' => 'Date To',
													'type' => 'date',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-'																										
													));
													?>
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
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('eventdate'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('venue'); ?></th>
			<th><?php echo $this->Paginator->sort('target_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sitecode'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
		<!--	<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>-->
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($promotions as $promotion): ?>
	<tr>
		<td><?php echo h($promotion['Promotion']['id']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['eventdate']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['name']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['venue']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($promotion['Target']['name'], array('controller' => 'targets', 'action' => 'view', $promotion['Target']['id'])); ?>
		</td>
		<td><?php echo h($promotion['Promotion']['sitecode']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($promotion['User']['name'], array('controller' => 'users', 'action' => 'view', $promotion['User']['id'])); ?>
		</td>
		<!--
		<td><?php echo h($promotion['Promotion']['created']); ?>&nbsp;</td>
		<td><?php echo h($promotion['Promotion']['modified']); ?>&nbsp;</td>
		-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promotion['Promotion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promotion['Promotion']['id']), null, __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?>
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

