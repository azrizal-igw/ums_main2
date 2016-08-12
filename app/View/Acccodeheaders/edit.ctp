<div class="acccodeheaders form">
<?php echo $this->Form->create('Acccodeheader'); ?>
	<fieldset>
		<legend><?php echo __('Edit Acccodeheader'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('sitecode');
		echo $this->Form->input('transdate');
		echo $this->Form->input('acccode_id');
		echo $this->Form->input('amount');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Acccodeheader.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Acccodeheader.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Acccodeheaders'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Acccodes'), array('controller' => 'acccodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acccode'), array('controller' => 'acccodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
