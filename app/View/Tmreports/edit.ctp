<div class="tmreports form">
<?php echo $this->Form->create('Tmreport'); ?>
	<fieldset>
		<legend><?php echo __('Edit Tmreport'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('portal');
		echo $this->Form->input('vsat');
		echo $this->Form->input('cdma');
		echo $this->Form->input('ipmsan');
		echo $this->Form->input('wbridge');
		echo $this->Form->input('atm');
		echo $this->Form->input('speed');
		echo $this->Form->input('tmexchange');
		echo $this->Form->input('nopctraining');
		echo $this->Form->input('nopcsurfing');
		echo $this->Form->input('user_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Tmreport.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Tmreport.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tmreports'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
