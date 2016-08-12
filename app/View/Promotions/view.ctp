<div class="promotions view">
<h2><?php  echo __('Promotion'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Eventdate'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['eventdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Venue'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['venue']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Target'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promotion['Target']['name'], array('controller' => 'targets', 'action' => 'view', $promotion['Target']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promotion['User']['name'], array('controller' => 'users', 'action' => 'view', $promotion['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promotion['Promotion']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<!--<li><?php echo $this->Html->link(__('Edit Promotion'), array('action' => 'edit', $promotion['Promotion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promotion'), array('action' => 'delete', $promotion['Promotion']['id']), null, __('Are you sure you want to delete # %s?', $promotion['Promotion']['id'])); ?> </li>
		-->
		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?> </li>
		<!--
		<li><?php echo $this->Html->link(__('New Promotion'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Targets'), array('controller' => 'targets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Target'), array('controller' => 'targets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		-->
	</ul>
</div>

