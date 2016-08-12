<div class="accmonths form">
<?php echo $this->Form->create('Accmonth'); ?>
	<fieldset>
		<legend><?php echo __('Add Accmonth'); ?></legend>
	<?php
		echo $this->Form->input('ym');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Accmonths'), array('action' => 'index')); ?></li>
	</ul>
</div>
