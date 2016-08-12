<div class="adminhistories view">
<h2><?php  echo __('Adminhistory');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Admindetail Localid'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['admindetail_localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timestart'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['timestart']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Timeend'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['timeend']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['sendstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($adminhistory['Adminhistory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Adminhistory'), array('action' => 'edit', $adminhistory['Adminhistory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Adminhistory'), array('action' => 'delete', $adminhistory['Adminhistory']['id']), null, __('Are you sure you want to delete # %s?', $adminhistory['Adminhistory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Adminhistories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Adminhistory'), array('action' => 'add')); ?> </li>
	</ul>
</div>
