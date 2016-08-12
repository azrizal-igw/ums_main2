<div class="sites index">
	<h2><?php echo __('SELECT SITE');?></h2>
	
	<?php echo $this->Form->create('Site');?>
	<table border=0 cellspacing=0 cellpadding=0><tr><td width='300px'>
	<?php echo $this->Form->input('search',array('label'=>false));?></td>
	<td><div class="submit"><?php echo $this->Form->end(__('Search'));?></div></td></tr></table>
	


<?php if(isset($sites)){?>


	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('phase_id');?></th>
			<th><?php echo $this->Paginator->sort('state_id');?></th>
			<th><?php echo $this->Paginator->sort('region_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($sites as $site): ?>
	<?php //pr($site);?>
	<tr>
		<td><?php echo h($site['Site']['id']); ?>&nbsp;</td>
		<td><?php echo h($site['Site']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($site['Phase']['name'], array('controller' => 'phases', 'action' => 'view', $site['Phase']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($site['State']['name'], array('controller' => 'states', 'action' => 'view', $site['State']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($site['Region']['name'], array('controller' => 'regions', 'action' => 'view', $site['Region']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Select'), array('action' => 'perform_action', $site['Site']['id'],$act,$view)); ?>
			<?php //echo $this->Html->link(__('View'), array('action' => 'view', $site['Site']['id'])); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $site['Site']['id'])); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $site['Site']['id']), null, __('Are you sure you want to delete # %s?', $site['Site']['id'])); ?>
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
	<?php } ?>
</div>
