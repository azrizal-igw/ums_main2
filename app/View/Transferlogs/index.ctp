<!--<div class="transferlogs index">-->

<?php if (($this->Session->read('Auth.User.group_id') == 1) || ($this->Session->read('Auth.User.group_id') == 3)){ ?>
<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'transferlogs'));}?><br/><br/>
<?php echo $this->Form->create('Transferlog',array('type'=>'post','action'=>'index')); ?>	

<?php
		echo 	$this->Form->input('time1',array(													
													'label' => 'From',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
													));


		echo 	$this->Form->input('time2',array(
													'label' => 'To',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-'																										
													));
		//echo 	$this->Form->input('sitecode',array('options'=>$sites));
		//echo 	$this->Form->input('options',array('options'=>array('HTML','PDF')));
		//echo $this->Form->end(__('Submit'));
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

	<h2><?php echo __('Transferlogs'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('no'); ?></th>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('sitecode'); ?></th>
			<th><?php echo $this->Paginator->sort('sitetime'); ?></th>
			<th><?php echo $this->Paginator->sort('ip'); ?></th>
			
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($transferlogs as $transferlog): ?>
	<tr>
		<td><?php echo $j;$j++; ?>&nbsp;</td> 
		<td><?php echo h($transferlog['Transferlog']['id']); ?>&nbsp;</td>
		<td><?php echo h($transferlog['Transferlog']['sitecode']); ?>&nbsp;</td>
		<td><?php echo h($transferlog['Transferlog']['sitetime']); ?>&nbsp;</td>
		<td><?php echo h($transferlog['Transferlog']['ip']); ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $transferlog['Transferlog']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $transferlog['Transferlog']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $transferlog['Transferlog']['id']), null, __('Are you sure you want to delete # %s?', $transferlog['Transferlog']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Transferlog'), array('action' => 'add')); ?></li>
	</ul>
</div>
