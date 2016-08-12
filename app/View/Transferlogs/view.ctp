<div class="transferlogs view">
<h2><?php  echo __('Transferlog'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitetime'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['sitetime']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($transferlog['Transferlog']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Transferlog'), array('action' => 'edit', $transferlog['Transferlog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Transferlog'), array('action' => 'delete', $transferlog['Transferlog']['id']), null, __('Are you sure you want to delete # %s?', $transferlog['Transferlog']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Transferlogs'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Transferlog'), array('action' => 'add')); ?> </li>
	</ul>
</div>
