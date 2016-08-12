<div class="eventlogs form">
<?php echo $this->Form->create('Eventlog'); ?>
	<fieldset>
		<legend><?php echo __('Edit Eventlog'); ?></legend>
	<?php
		echo $this->Form->input('time');
		echo $this->Form->input('icno');
		echo $this->Form->input('browsing_localid');
		echo $this->Form->input('processname');
		echo $this->Form->input('url');
		echo $this->Form->input('windowtitle');
		echo $this->Form->input('sitecode');
		echo $this->Form->input('id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		
		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Eventlog.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Eventlog.id'))); ?></li>
		
		<li><?php echo $this->Html->link(__('List Eventlogs'), array('action' => 'index')); ?></li>
	</ul>
</div>
