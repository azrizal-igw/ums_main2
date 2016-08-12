<div class="admindetails view">
<h2><?php  echo __('Admindetail');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['icno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['sendstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($admindetail['Admindetail']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Admindetail'), array('action' => 'edit', $admindetail['Admindetail']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Admindetail'), array('action' => 'delete', $admindetail['Admindetail']['id']), null, __('Are you sure you want to delete # %s?', $admindetail['Admindetail']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Admindetails'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Admindetail'), array('action' => 'add')); ?> </li>
	</ul>
</div>
