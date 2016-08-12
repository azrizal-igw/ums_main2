<div class="accstatuses view">
<h2><?php  echo __('Accstatus'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transmonth'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['transmonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Accstatustitle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accstatus['Accstatustitle']['name'], array('controller' => 'accstatustitles', 'action' => 'view', $accstatus['Accstatustitle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Count'); ?></dt>
		<dd>
			<?php echo h($accstatus['Accstatus']['count']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Accstatus'), array('action' => 'edit', $accstatus['Accstatus']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Accstatus'), array('action' => 'delete', $accstatus['Accstatus']['id']), null, __('Are you sure you want to delete # %s?', $accstatus['Accstatus']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Accstatuses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatus'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Accstatustitles'), array('controller' => 'accstatustitles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatustitle'), array('controller' => 'accstatustitles', 'action' => 'add')); ?> </li>
	</ul>
</div>
