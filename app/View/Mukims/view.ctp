<div class="mukims view">
<h2><?php  echo __('Mukim');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($mukim['Mukim']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($mukim['Mukim']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('District'); ?></dt>
		<dd>
			<?php echo $this->Html->link($mukim['District']['name'], array('controller' => 'districts', 'action' => 'view', $mukim['District']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Mukim'), array('action' => 'edit', $mukim['Mukim']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Mukim'), array('action' => 'delete', $mukim['Mukim']['id']), null, __('Are you sure you want to delete # %s?', $mukim['Mukim']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Mukims'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mukim'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Districts'), array('controller' => 'districts', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts', 'action' => 'add')); ?> </li>
	</ul>
</div>
