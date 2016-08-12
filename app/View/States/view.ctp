<div class="states view">
<h2><?php  echo __('State');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($state['State']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($state['State']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Region'); ?></dt>
		<dd>
			<?php echo $this->Html->link($state['Region']['name'], array('controller' => 'regions', 'action' => 'view', $state['Region']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stateid2'); ?></dt>
		<dd>
			<?php echo h($state['State']['stateid2']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit State'), array('action' => 'edit', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete State'), array('action' => 'delete', $state['State']['id']), null, __('Are you sure you want to delete # %s?', $state['State']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List States'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Regions'), array('controller' => 'regions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Region'), array('controller' => 'regions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Districts');?></h3>
	<?php if (!empty($state['District'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($state['District'] as $district): ?>
		<tr>
			<td><?php echo $district['id'];?></td>
			<td><?php echo $district['name'];?></td>
			<td><?php echo $district['state_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'districts', 'action' => 'view', $district['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'districts', 'action' => 'edit', $district['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'districts', 'action' => 'delete', $district['id']), null, __('Are you sure you want to delete # %s?', $district['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sites');?></h3>
	<?php if (!empty($state['Site'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('State Id'); ?></th>
		<th><?php echo __('District Id'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($state['Site'] as $site): ?>
		<tr>
			<td><?php echo $site['id'];?></td>
			<td><?php echo $site['name'];?></td>
			<td><?php echo $site['state_id'];?></td>
			<td><?php echo $site['district_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sites', 'action' => 'view', $site['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sites', 'action' => 'edit', $site['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sites', 'action' => 'delete', $site['id']), null, __('Are you sure you want to delete # %s?', $site['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Userdetails');?></h3>
	<?php if (!empty($state['Userdetail'])):?>
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
		<th><?php echo __('Race Id'); ?></th>
		<th><?php echo __('Occupation Id'); ?></th>
		<th><?php echo __('Education Id'); ?></th>
		<th><?php echo __('Income Id'); ?></th>
		<th><?php echo __('Oku'); ?></th>
		<th><?php echo __('Registered Date'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Usertype'); ?></th>
		<th><?php echo __('Tel No'); ?></th>
		<th><?php echo __('Hp No'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Ictknowledge Id'); ?></th>
		<th><?php echo __('Distance'); ?></th>
		<th><?php echo __('Transport Id'); ?></th>
		<th><?php echo __('Time To Cbc'); ?></th>
		<th><?php echo __('Household'); ?></th>
		<th><?php echo __('Fixline'); ?></th>
		<th><?php echo __('Fixline Id'); ?></th>
		<th><?php echo __('Fixline Num'); ?></th>
		<th><?php echo __('Bband'); ?></th>
		<th><?php echo __('Bband Id'); ?></th>
		<th><?php echo __('Bband Num'); ?></th>
		<th><?php echo __('Computer'); ?></th>
		<th><?php echo __('Mobile'); ?></th>
		<th><?php echo __('Mobile Id'); ?></th>
		<th><?php echo __('Mobile Num'); ?></th>
		<th><?php echo __('Threeg'); ?></th>
		<th><?php echo __('Threeg Id'); ?></th>
		<th><?php echo __('Threeg Num'); ?></th>
		<th><?php echo __('Cardno'); ?></th>
		<th><?php echo __('Other Site'); ?></th>
		<th><?php echo __('Dob'); ?></th>
		<th><?php echo __('Entry Dt'); ?></th>
		<th><?php echo __('Mod Dt'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($state['Userdetail'] as $userdetail): ?>
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
			<td><?php echo $userdetail['race_id'];?></td>
			<td><?php echo $userdetail['occupation_id'];?></td>
			<td><?php echo $userdetail['education_id'];?></td>
			<td><?php echo $userdetail['income_id'];?></td>
			<td><?php echo $userdetail['oku'];?></td>
			<td><?php echo $userdetail['registered_date'];?></td>
			<td><?php echo $userdetail['active'];?></td>
			<td><?php echo $userdetail['usertype'];?></td>
			<td><?php echo $userdetail['tel_no'];?></td>
			<td><?php echo $userdetail['hp_no'];?></td>
			<td><?php echo $userdetail['email'];?></td>
			<td><?php echo $userdetail['ictknowledge_id'];?></td>
			<td><?php echo $userdetail['distance'];?></td>
			<td><?php echo $userdetail['transport_id'];?></td>
			<td><?php echo $userdetail['time_to_cbc'];?></td>
			<td><?php echo $userdetail['household'];?></td>
			<td><?php echo $userdetail['fixline'];?></td>
			<td><?php echo $userdetail['fixline_id'];?></td>
			<td><?php echo $userdetail['fixline_num'];?></td>
			<td><?php echo $userdetail['bband'];?></td>
			<td><?php echo $userdetail['bband_id'];?></td>
			<td><?php echo $userdetail['bband_num'];?></td>
			<td><?php echo $userdetail['computer'];?></td>
			<td><?php echo $userdetail['mobile'];?></td>
			<td><?php echo $userdetail['mobile_id'];?></td>
			<td><?php echo $userdetail['mobile_num'];?></td>
			<td><?php echo $userdetail['threeg'];?></td>
			<td><?php echo $userdetail['threeg_id'];?></td>
			<td><?php echo $userdetail['threeg_num'];?></td>
			<td><?php echo $userdetail['cardno'];?></td>
			<td><?php echo $userdetail['other_site'];?></td>
			<td><?php echo $userdetail['dob'];?></td>
			<td><?php echo $userdetail['entry_dt'];?></td>
			<td><?php echo $userdetail['mod_dt'];?></td>
			<td><?php echo $userdetail['sendstatus'];?></td>
			<td><?php echo $userdetail['sitecode'];?></td>
			<td><?php echo $userdetail['created'];?></td>
			<td><?php echo $userdetail['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'userdetails', 'action' => 'view', $userdetail['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'userdetails', 'action' => 'edit', $userdetail['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'userdetails', 'action' => 'delete', $userdetail['id']), null, __('Are you sure you want to delete # %s?', $userdetail['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
