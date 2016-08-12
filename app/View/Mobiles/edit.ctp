<div class="mobiles form">
<?php echo $this->Form->create('Mobile');?>
	<fieldset>
		<legend><?php echo __('Edit Mobile'); ?></legend>
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Mobile.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Mobile.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Mobiles'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>