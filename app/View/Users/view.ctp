<div class="users view">
<h2><?php  echo __('User');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($user['User']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($user['User']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($user['User']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($user['User']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($user['User']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation'); ?></dt>
		<dd>
			<?php echo h($user['User']['designation']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($user['User']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($user['User']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
			&nbsp;
		</dd>
	</dl>


<div class="related">
	<h3><?php echo __('Related Accbalances');?></h3>
	<?php if (!empty($user['Accbalance'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		
		<th><?php echo __('Code'); ?></th>
		<th><?php echo __('Transmonth'); ?></th>
		<th><?php echo __('Bf'); ?></th>
		<th><?php echo __('Dr'); ?></th>
		<th><?php echo __('Cr'); ?></th>
		<th><?php echo __('Bal'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Siteid'); ?></th>
		<th><?php echo __('Entrydate'); ?></th>
		
	</tr>
	<?php
		$i = 0;
		foreach ($user['Accbalance'] as $accbalance): ?>
		<tr>
			
			<td><?php echo $accbalance['code'];?></td>
			<td><?php echo $accbalance['transmonth'];?></td>
			<td><?php echo $accbalance['bf'];?></td>
			<td><?php echo $accbalance['dr'];?></td>
			<td><?php echo $accbalance['cr'];?></td>
			<td><?php echo $accbalance['bal'];?></td>
			<td><?php echo $accbalance['user_id'];?></td>
			<td><?php echo $accbalance['sitecode'];?></td>
			<td><?php echo $accbalance['created'];?></td>
			
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Accbalance'), array('controller' => 'accbalances', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Acctransactions');?></h3>
	<?php if (!empty($user['Acctransaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Acccode Id'); ?></th>
		<!-- <th><?php echo __('Code'); ?></th> -->
		<th><?php echo __('Drcr'); ?></th>
		<th><?php echo __('Amount'); ?></th>
		<th><?php echo __('Desc'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Siteid'); ?></th>
		<th><?php echo __('Entrydate'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($user['Acctransaction'] as $acctransaction): ?>
		<tr>
			<td><?php echo $acctransaction['id'];?></td>
			<td><?php echo $acctransaction['transdate'];?></td>
			<td><?php echo $acctransaction['acccode_id'];?></td>
			<!-- <td><?php echo $acctransaction['code'];?></td> -->
			<td><?php echo $acctransaction['drcr'];?></td>
			<td><?php echo $acctransaction['amount'];?></td>
			<td><?php echo $acctransaction['desc'];?></td>
			<td><?php echo $acctransaction['user_id'];?></td>
			<td><?php echo $acctransaction['sitecode'];?></td>
			<td><?php echo $acctransaction['created'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'acctransactions', 'action' => 'view', $acctransaction['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'acctransactions', 'action' => 'edit', $acctransaction['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'acctransactions', 'action' => 'delete', $acctransaction['id']), null, __('Are you sure you want to delete # %s?', $acctransaction['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
</div>
