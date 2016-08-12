<?php //pr($browsings);
?>

<div class="browsings ">
<h2><?php echo __('LIST BROWSINGS');?></h2>
<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'browsings')); ?><br/><br/>
	
<?php echo $this->Form->create('Browsing'); ?>
<?php echo $this->Form->input('icno',array('label'=>'IC No.')); ?>

	<?php
		echo $this->Form->create('Browsing',array('value'=>'search'));
		echo 	$this->Form->input('time_start',array(
													
													'label' => 'Time Start',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-',
														
													));


		echo 	$this->Form->input('time_end',array(
													'label' => 'Time End',
													'type' => 'datetime',
													'timeFormat'=>'24',
													'dateFormat' => 'DMY', 
													'separator'=>'-'
																										
													));
		//echo 	$this->Form->input('sitecode',array('options'=>$sites));
		//echo 	$this->Form->input('options',array('options'=>array('HTML','PDF')));
		//echo $this->Form->end(__('Submit'));
	?>
<!--
<table style="width:auto">
<tr>
<td>

</td>
<td>
<?php echo $this->Form->button('Reset the Form', array('type' => 'reset'));
echo $this->Form->submit();
echo $this->Form->end();?>
</td>
</tr>
</table>-->
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
	<h2><?php echo __('Browsings');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
	        <th><?php echo '#'?></th>
	<!--
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('localid');?></th>
	-->
			<th><?php echo $this->Paginator->sort('icno');?></th>
			<th><?php echo $this->Paginator->sort('pcno');?></th>
			<th><?php echo $this->Paginator->sort('rate_per_hour');?></th>
			<th><?php echo $this->Paginator->sort('time_start');?></th>
			<th><?php echo $this->Paginator->sort('time_end');?></th>
			<th><?php echo $this->Paginator->sort('type');?></th>
			<th><?php echo $this->Paginator->sort('browse_status');?></th>
			<th><?php echo $this->Paginator->sort('acct');?></th>
			<th><?php echo $this->Paginator->sort('paid');?></th>
			<!--
			<th><?php echo $this->Paginator->sort('sendstatus');?></th>
			<th><?php echo $this->Paginator->sort('entry_dt');?></th>
			<th><?php echo $this->Paginator->sort('mod_dt');?></th>
			-->
			<th><?php echo $this->Paginator->sort('sitecode');?></th>
			<!--
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			-->
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($browsings as $browsing): ?>
	<tr>
	    <td><?php echo $j;$j++; ?>&nbsp;</td>
		<!--
		<td><?php echo h($browsing['Browsing']['id']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['localid']); ?>&nbsp;</td>
		-->
		
		<td><?php echo h($browsing['Browsing']['icno']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['pcno']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['rate_per_hour']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['time_start']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['time_end']); ?>&nbsp;</td>
		<td><?php if ($browsing['Browsing']['type'] ==1) {echo "Postpaid";}else{echo "Prepaid";}; ?>&nbsp;</td>
		<td><?php if ($browsing['Browsing']['browse_status'] ==1) {echo "Logout";} else {echo "";}; ?>&nbsp;</td>
		<td><?php if ($browsing['Browsing']['acct'] ==1) {echo "Personal";}else{echo "SKMM";}; ?>&nbsp;</td>
		<td><?php if ($browsing['Browsing']['paid'] ==1) {echo "Paid";}else{echo "";}; ?>&nbsp;</td>
		<!--
		<td><?php echo h($browsing['Browsing']['sendstatus']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['entry_dt']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['mod_dt']); ?>&nbsp;</td>
		-->
		<td><?php echo h($browsing['Browsing']['sitecode']); ?>&nbsp;</td>
		<!--
		<td><?php echo h($browsing['Browsing']['created']); ?>&nbsp;</td>
		<td><?php echo h($browsing['Browsing']['modified']); ?>&nbsp;</td>
		-->
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $browsing['Browsing']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $browsing['Browsing']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $browsing['Browsing']['id']), null, __('Are you sure you want to delete # %s?', $browsing['Browsing']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Browsing'), array('action' => 'add')); ?></li>
	</ul>
</div>
