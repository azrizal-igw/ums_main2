<h2><?php echo __('Training');?></h2>
<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($training['Training']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Course'); ?></dt>
	<dd>
		<strong><?php echo $training['Course']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Module'); ?></dt>
	<dd>
		<strong><?php echo $training['Module']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Sitecode'); ?></dt>
	<dd>
		<?php echo h($training['Training']['sitecode']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Starttime'); ?></dt>
	<dd>
		<?php echo h($training['Training']['StartTime']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('User'); ?></dt>
	<dd>
		<strong><?php echo $training['User']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Trainer'); ?></dt>
	<dd>
		<?php echo h($training['Training']['trainer']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Traininglocation'); ?></dt>
	<dd>
		<?php echo h($training['Training']['traininglocation']); ?>
		&nbsp;
	</dd>
	
	<dt><?php echo __('Created'); ?></dt>
	<dd>
		<?php echo h($training['Training']['created']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Modified'); ?></dt>
	<dd>
		<?php echo h($training['Training']['modified']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Capacity'); ?></dt>
	<dd>
		<?php echo h($training['Training']['capacity']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Target'); ?></dt>
	<dd>
		<strong><?php echo $training['Target']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Description'); ?></dt>
	<dd>
		<?php echo h($training['Training']['Description']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalize'); ?></dt>
	<dd>
		<?php if ($training['Training']['finalize'] == 1): echo 'Yes'; else: echo 'No'; endif; ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalizetime'); ?></dt>
	<dd>
		<?php echo h($training['Training']['finalizetime']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalizedby'); ?></dt>
	<dd>
		<?php echo h($training['Finalizedby']['name']); ?>
		&nbsp;
	</dd>
</dl>
<br>



<fieldset>
<?php
	echo $this->Form->create('Training');
	// check if the courses is from intel
	if ($training['Training']['course_id'] == 9 || $training['Training']['course_id'] == 10) {
		if ($training['Training']['finalize'] == 1) { // finalize
			if ($group == 1 || $group == 2) { // admin or reporting
				echo $this->Form->submit('Unfinalize', array('name' => 'unfinalize', 'label' => false));
			}
		}
		/*else {
			if ($group == 1 || $group == 2 || $group == 4) { // admin, reporting and manager				
				echo $this->Form->submit('Finalize', array('name' => 'finalize', 'label' => false));	
			}
		*/
	}
	echo $this->Form->end(); 
?>
</fieldset>




<div class="related">
	<h3><?php echo __('Related Userdetails');?></h3>
	<?php if (!empty($training['Userdetail'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Icno'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('Gender Id'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created').' /<br>Modified'; ?></th>
		
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($training['Userdetail'] as $userdetail): ?>
		<tr>
			<td><?php echo $userdetail['id'];?></td>
			<td><?php echo $userdetail['localid'];?></td>
			<td><?php echo $userdetail['icno'];?></td>
			<td><?php echo $userdetail['name'];?></td>
			<td><?php echo $userdetail['address'];?></td>
			<td><?php echo $userdetail['city'];?></td>
			<td><?php echo $userdetail['state_id'];?></td>
			<td><?php echo $userdetail['gender_id'];?></td>
			<td><?php echo $userdetail['age'];?></td>
			<td><?php echo $userdetail['sitecode'];?></td>
			<td><?php echo $userdetail['created'];?> /<br><?php echo $userdetail['modified'];?></td>
			
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'userdetails', 'action' => 'view', $userdetail['id'])); ?>
				<!--<?php echo $this->Html->link(__('Edit'), array('controller' => 'userdetails', 'action' => 'edit', $userdetail['id'])); ?>-->
				<!--<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'userdetails', 'action' => 'delete', $userdetail['id']), null, __('Are you sure you want to delete # %s?', $userdetail['id'])); ?>-->
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	
