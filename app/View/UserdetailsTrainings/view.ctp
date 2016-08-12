<div class="userdetailsTrainings view">
<h2><?php  echo __('Userdetails Training');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($userdetailsTraining['UserdetailsTraining']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Training'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetailsTraining['Training']['title'], array('controller' => 'trainings', 'action' => 'view', $userdetailsTraining['Training']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Userdetail'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetailsTraining['Userdetail']['name'], array('controller' => 'userdetails', 'action' => 'view', $userdetailsTraining['Userdetail']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($userdetailsTraining['User']['name'], array('controller' => 'users', 'action' => 'view', $userdetailsTraining['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($userdetailsTraining['UserdetailsTraining']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($userdetailsTraining['UserdetailsTraining']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Userdetails Training'), array('action' => 'edit', $userdetailsTraining['UserdetailsTraining']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Userdetails Training'), array('action' => 'delete', $userdetailsTraining['UserdetailsTraining']['id']), null, __('Are you sure you want to delete # %s?', $userdetailsTraining['UserdetailsTraining']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Userdetails Trainings'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetails Training'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Trainings'), array('controller' => 'trainings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Training'), array('controller' => 'trainings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
