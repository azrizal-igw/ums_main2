<div class="districts form">
<?php echo $this->Form->create('District');?>
	<fieldset>
		<legend><?php echo __('Edit District'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('state_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('District.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('District.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Districts'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List States'), array('controller' => 'states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New State'), array('controller' => 'states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Mukims'), array('controller' => 'mukims', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sites'), array('controller' => 'sites', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites', 'action' => 'add')); ?> </li>
	</ul>
</div>
