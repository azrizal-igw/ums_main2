<div class="usages form">
<?php echo $this->Form->create('Usage'); ?>
	<fieldset>
		<legend><?php echo __('Add Usage'); ?></legend>
	<?php
		echo $this->Form->input('localid');
		echo $this->Form->input('service_id');
		echo $this->Form->input('icno');
		echo $this->Form->input('quantity');
		echo $this->Form->input('refno');
		echo $this->Form->input('amount');
		echo $this->Form->input('cashcard');
		echo $this->Form->input('transdate');
		echo $this->Form->input('points');
		echo $this->Form->input('note');
		echo $this->Form->input('cancel');
		echo $this->Form->input('sendstatus');
		echo $this->Form->input('withcard');
		echo $this->Form->input('entrydt');
		echo $this->Form->input('moddt');
		echo $this->Form->input('entryuser');
		echo $this->Form->input('moduser');
		echo $this->Form->input('sitecode');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Usages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Services'), array('controller' => 'services', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Service'), array('controller' => 'services', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcaltelsimpacks'), array('controller' => 'svcaltelsimpacks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcaltelsimpack'), array('controller' => 'svcaltelsimpacks', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcbsnbills'), array('controller' => 'svcbsnbills', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcbsnbill'), array('controller' => 'svcbsnbills', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcbsncashsavings'), array('controller' => 'svcbsncashsavings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcbsncashsaving'), array('controller' => 'svcbsncashsavings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcbsntopups'), array('controller' => 'svcbsntopups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcbsntopup'), array('controller' => 'svcbsntopups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcceleasyreloads'), array('controller' => 'svcceleasyreloads', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcceleasyreload'), array('controller' => 'svcceleasyreloads', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svccelstarters'), array('controller' => 'svccelstarters', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svccelstarter'), array('controller' => 'svccelstarters', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Svcinsurances'), array('controller' => 'svcinsurances', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Svcinsurance'), array('controller' => 'svcinsurances', 'action' => 'add')); ?> </li>
	</ul>
</div>
