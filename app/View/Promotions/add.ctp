<div class="promotions form">
<?php echo $this->Form->create('Promotion'); ?>
	<fieldset>
		<legend><?php echo __('Add Promotion Program'); ?></legend>
	<?php
		echo $this->Form->input('eventdate',array('label'=>'Event Date'));
		echo $this->Form->input('name');
		echo $this->Form->input('venue');
		echo $this->Form->input('target_id');
		// echo $this->Form->input('sitecode');
		echo $this->Form->input('sitecode',array('default'=>$this->Session->read('Site.sitecode')));  
		// echo $this->Form->input('user_id');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Promotions'), array('action' => 'index')); ?></li>
		<!--
		<li><?php echo $this->Html->link(__('List Targets'), array('controller' => 'targets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Target'), array('controller' => 'targets', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		-->
	</ul>
</div>
