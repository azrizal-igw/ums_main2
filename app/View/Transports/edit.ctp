<div class="transports form">
<?php echo $this->Form->create('Transport');?>
	<fieldset>
		<legend><?php echo __('Edit Transport'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('bm');
		echo $this->Form->input('eng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Transport.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Transport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Transports'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>