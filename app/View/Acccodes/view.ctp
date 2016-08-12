<div class="acccodes view">
<h2><?php  echo __('Acccode');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acccode['Acccode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($acccode['Acccode']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($acccode['Acccode']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($acccode['Acccode']['desc']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acccode'), array('action' => 'edit', $acccode['Acccode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acccode'), array('action' => 'delete', $acccode['Acccode']['id']), null, __('Are you sure you want to delete # %s?', $acccode['Acccode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acccodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acccode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acctransactions'), array('controller' => 'acctransactions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acctransaction'), array('controller' => 'acctransactions', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Acctransactions');?></h3>
	<?php if (!empty($acccode['Acctransaction'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Acccode Id'); ?></th>
		<th><?php echo __('Code'); ?></th>
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
		foreach ($acccode['Acctransaction'] as $acctransaction): ?>
		<tr>
			<td><?php echo $acctransaction['id'];?></td>
			<td><?php echo $acctransaction['transdate'];?></td>
			<td><?php echo $acctransaction['acccode_id'];?></td>
			<td><?php echo $acctransaction['code'];?></td>
			<td><?php echo $acctransaction['drcr'];?></td>
			<td><?php echo $acctransaction['amount'];?></td>
			<td><?php echo $acctransaction['desc'];?></td>
			<td><?php echo $acctransaction['user_id'];?></td>
			<td><?php echo $acctransaction['siteid'];?></td>
			<td><?php echo $acctransaction['entrydate'];?></td>
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
