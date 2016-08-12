<div class="accstatustitles form">
<?php echo $this->Form->create('Accstatustitle'); ?>
	<fieldset>
		<legend><?php echo __('Edit Accstatustitle'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Accstatustitle.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Accstatustitle.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Accstatustitles'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accstatuses'), array('controller' => 'accstatuses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatus'), array('controller' => 'accstatuses', 'action' => 'add')); ?> </li>
	</ul>
</div>
