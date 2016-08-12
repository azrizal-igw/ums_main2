<div class="userdetails view">
<h2><?php  echo __('Userdetail');?></h2>


	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['icno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['city']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('State'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['State']['name'], array('controller' => 'states', 'action' => 'view', $userdetail['State']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gender'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Gender']['eng'], array('controller' => 'genders', 'action' => 'view', $userdetail['Gender']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Age'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['age']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Race'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Race']['eng'], array('controller' => 'races', 'action' => 'view', $userdetail['Race']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nationality'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Nationality']['eng'], array('controller' => 'nationalities', 'action' => 'view', $userdetail['Nationality']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Occupation'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Occupation']['eng'], array('controller' => 'occupations', 'action' => 'view', $userdetail['Occupation']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Education'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Education']['eng'], array('controller' => 'educations', 'action' => 'view', $userdetail['Education']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Income'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Income']['eng'], array('controller' => 'incomes', 'action' => 'view', $userdetail['Income']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Oku'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['oku']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Registered Date'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['registered_date']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php if ($userdetail['Userdetail']['active'] ==1) {echo "Yes";}else{echo "No";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Usertype'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Usertype']['eng'], array('controller' => 'usertypes', 'action' => 'view', $userdetail['Usertype']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tel No'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['tel_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hp No'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['hp_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ictknowledge'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Ictknowledge']['eng'], array('controller' => 'ictknowledges', 'action' => 'view', $userdetail['Ictknowledge']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Distance'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['distance']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transport'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Transport']['eng'], array('controller' => 'transports', 'action' => 'view', $userdetail['Transport']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time To Cbc'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['time_to_cbc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Household'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['household']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixline_cust'); ?></dt>
		<dd>
			<?php if ($userdetail['Userdetail']['fixline_cust'] ==1) {echo "Yes";}else{echo "No";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixline'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Fixline']['eng'], array('controller' => 'fixlines', 'action' => 'view', $userdetail['Fixline']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fixline Num'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['fixline_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bband_cust'); ?></dt>
		<dd>
			<?php if ($userdetail['Userdetail']['bband_cust'] ==1) {echo "Yes";}else{echo "No";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bband'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Bband']['eng'], array('controller' => 'bbands', 'action' => 'view', $userdetail['Bband']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bband Num'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['bband_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Computer'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['computer']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile_cust'); ?></dt>
		<dd>
			<?php if ($userdetail['Userdetail']['mobile_cust'] ==1) {echo "Yes";}else{echo "No";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Mobile']['eng'], array('controller' => 'mobiles', 'action' => 'view', $userdetail['Mobile']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mobile Num'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['mobile_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threeg_cust'); ?></dt>
		<dd>
			<?php if ($userdetail['Userdetail']['threeg_cust'] ==1) {echo "Yes";}else{echo "No";} ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threeg'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetail['Threeg']['eng'], array('controller' => 'threegs', 'action' => 'view', $userdetail['Threeg']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Threeg Num'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['threeg_num']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cardno'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['cardno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Other Site'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['other_site']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dob'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['dob']); ?>
			&nbsp;
		</dd>
		<!--
		<dt><?php echo __('Entry Dt'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['entry_dt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod Dt'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['mod_dt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['sendstatus']); ?>
			&nbsp;
		</dd>-->
		<dt><?php echo __('Invaliduser'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['invaliduser']); ?>
			&nbsp;
		</dd>		
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userdetail['Userdetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!--
<div class="actions">
	<?php echo $this->Html->link(__('UserDetail PDF & PRINT'), array('controller' => 'userdetails', 'action' => 'viewdetailpdf',$userdetail['Userdetail']['id'])); ?>
</div>
-->
<!--
<div class="related">
	<h3><?php echo __('Related Trainings');?></h3>
	<?php if (!empty($userdetail['Training'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Course Id'); ?></th>
		<th><?php echo __('Module Id'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Starttime'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Trainer'); ?></th>
		<th><?php echo __('Traininglocation'); ?></th>
		<th><?php echo __('Subject'); ?></th>
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
		foreach ($userdetail['Training'] as $training): ?>
		<tr>
			<td><?php echo $training['id'];?></td>
			<td><?php echo $training['course_id'];?></td>
			<td><?php echo $training['module_id'];?></td>
			<td><?php echo $training['sitecode'];?></td>
			<td><?php echo $training['StartTime'];?></td>
			<td><?php echo $training['user_id'];?></td>
			<td><?php echo $training['trainer'];?></td>
			<td><?php echo $training['traininglocation'];?></td>
			<td><?php echo $training['subject'];?></td>
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

-->