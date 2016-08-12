<div class="userdetails">
	<h2><?php echo __('LIST USERDETAILS');?></h2>
	
	<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
	<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'userdetails')); ?><br/><br/>
	<?php echo $this->Form->create('Userdetail');?>
	<?php echo $this->Form->input('icno',array('label'=>'IC No.')); ?>
	<?php echo $this->Form->input('name',array('label'=>'Name')); ?>

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
	<h2><?php echo __('Userdetails');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	    <th><?php echo '#'?></th>
		<th><?php echo $this->Paginator->sort('icno');?></th>
		<th><?php echo $this->Paginator->sort('name');?></th>
		<!--<th><?php echo $this->Paginator->sort('state_id');?></th>-->
		<th><?php echo $this->Paginator->sort('gender_id');?></th>
		<th><?php echo $this->Paginator->sort('age');?></th>
		<!--<th><?php echo $this->Paginator->sort('race_id');?></th>-->
		<th><?php echo $this->Paginator->sort('occupation_id');?></th>
		<th><?php echo $this->Paginator->sort('registered_date');?></th>
		<th><?php echo $this->Paginator->sort('active');?></th>
		<th><?php echo $this->Paginator->sort('usertype_id');?></th>
		<!--<th><?php echo $this->Paginator->sort('hp_no');?></th>
		<th><?php echo $this->Paginator->sort('email');?></th>
		<th><?php echo $this->Paginator->sort('distance');?></th>-->
		<th><?php echo $this->Paginator->sort('sitecode');?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php //pr($userdetails);

	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($userdetails as $userdetail): ?>
	<tr>
	    <td><?php echo $j;$j++; ?>&nbsp;</td>
        <td><?php echo h($userdetail['Userdetail']['icno']); ?>&nbsp;</td>	
		<td><?php echo h($userdetail['Userdetail']['name']); ?>&nbsp;</td>
		<!--
		<td><?php echo $this->Html->link($userdetail['State']['name'], array('controller' => 'states', 'action' => 'view', $userdetail['State']['id'])); ?></td>
		-->
		<td><?php echo $this->Html->link($userdetail['Gender']['bm'], array('controller' => 'genders', 'action' => 'view', $userdetail['Gender']['id'])); ?></td>
		<td><?php echo h($userdetail['Userdetail']['age']); ?>&nbsp;</td>
		<!--
		<td><?php echo $this->Html->link($userdetail['Race']['bm'], array('controller' => 'races', 'action' => 'view', $userdetail['Race']['id'])); ?></td>
		-->
		<td><?php echo $this->Html->link($userdetail['Occupation']['bm'], array('controller' => 'occupations', 'action' => 'view', $userdetail['Occupation']['id'])); ?></td>
		<td><?php echo h($userdetail['Userdetail']['registered_date']); ?>&nbsp;</td>
		<td><?php if ($userdetail['Userdetail']['active'] ==1) {echo "Yes";}else{echo "No";}; ?>&nbsp;</td>
		<td><?php echo h($userdetail['Usertype']['bm']); ?>&nbsp;</td>
		<!--
		<td><?php echo h($userdetail['Userdetail']['hp_no']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['email']); ?>&nbsp;</td>
		<td><?php echo h($userdetail['Userdetail']['distance']); ?>&nbsp;</td>
		-->
		<td><?php echo h($userdetail['Userdetail']['sitecode']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userdetail['Userdetail']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userdetail['Userdetail']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userdetail['Userdetail']['id']), null, __('Are you sure you want to delete # %s?', $userdetail['Userdetail']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p><?php echo $this->Paginator->counter(array(
												'format' => __('Page 
												{:page} of {:pages},
												showing {:current} records out of {:count} total,
												starting on record {:start},
												ending on {:end}')
													));
		?></p>

	<div class="paging">
	<?php	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ''));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
