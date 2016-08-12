<div class="eventlogs form">
<?php echo $this->Form->create('Eventlog'); ?>
	<fieldset>
		<legend><?php echo __('Add Eventlog'); ?></legend>
	<?php
		echo $this->Form->input('time');
		echo $this->Form->input('icno');
		echo $this->Form->input('browsing_localid');
		echo $this->Form->input('processname');
		echo $this->Form->input('url');
		echo $this->Form->input('windowtitle');
		echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Eventlogs'), array('action' => 'index')); ?></li>
	</ul>
</div>
