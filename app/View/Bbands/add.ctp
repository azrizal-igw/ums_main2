<div class="bbands form">
<?php echo $this->Form->create('Bband');?>
	<fieldset>
		<legend><?php echo __('Add Bband'); ?></legend>
	<?php
		echo $this->Form->input('bm');
		echo $this->Form->input('eng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bbands'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Userdetails'), array('controller' => 'userdetails', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Userdetail'), array('controller' => 'userdetails', 'action' => 'add')); ?> </li>
	</ul>
</div>
