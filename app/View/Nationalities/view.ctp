<div class="nationalities view">
<h2><?php  echo __('Nationality');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bm'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['bm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eng'); ?></dt>
		<dd>
			<?php echo h($nationality['Nationality']['eng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Nationality'), array('action' => 'edit', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Nationality'), array('action' => 'delete', $nationality['Nationality']['id']), null, __('Are you sure you want to delete # %s?', $nationality['Nationality']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Nationalities'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Nationality'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Userdetails');?></h3>
	<?php if (!empty($nationality['Userdetail'])):?>
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
		<th><?php echo __('Nationality Id'); ?></th>
		<th><?php echo __('Occupation Id'); ?></th>
		<th><?php echo __('Education Id'); ?></th>
		<th><?php echo __('Income Id'); ?></th>
		<th><?php echo __('Oku'); ?></th>
		<th><?php echo __('Registered Date'); ?></th>
		<th><?php echo __('Active'); ?></th>
		<th><?php echo __('Usertype Id'); ?></th>
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
		foreach ($nationality['Userdetail'] as $userdetail): ?>
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
			<td><?php echo $userdetail['nationality_id'];?></td>
			<td><?php echo $userdetail['occupation_id'];?></td>
			<td><?php echo $userdetail['education_id'];?></td>
			<td><?php echo $userdetail['income_id'];?></td>
			<td><?php echo $userdetail['oku'];?></td>
			<td><?php echo $userdetail['registered_date'];?></td>
			<td><?php echo $userdetail['active'];?></td>
			<td><?php echo $userdetail['usertype_id'];?></td>
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
