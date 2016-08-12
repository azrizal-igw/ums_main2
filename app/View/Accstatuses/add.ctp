<div class="accstatuses form">
<?php echo $this->Form->create('Accstatus'); ?>
	<fieldset>
		<legend><?php echo __('Add Accstatus'); ?></legend>
	<?php
		echo $this->Form->input('transmonth');
		echo $this->Form->input('sitecode');
		echo $this->Form->input('accstatustitle_id');
		echo $this->Form->input('count');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Accstatuses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Accstatustitles'), array('controller' => 'accstatustitles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Accstatustitle'), array('controller' => 'accstatustitles', 'action' => 'add')); ?> </li>
	</ul>
</div>
