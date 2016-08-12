<div class="eventlogs view">
<h2><?php  echo __('Eventlog'); ?></h2>
	<dl>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['icno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browsing Localid'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['browsing_localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Processname'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['processname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Windowtitle'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['windowtitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($eventlog['Eventlog']['id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><!--
		<li><?php echo $this->Html->link(__('Edit Eventlog'), array('action' => 'edit', $eventlog['Eventlog']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Eventlog'), array('action' => 'delete', $eventlog['Eventlog']['id']), null, __('Are you sure you want to delete # %s?', $eventlog['Eventlog']['id'])); ?> </li>
		-->
		<li><?php echo $this->Html->link(__('List Eventlogs'), array('action' => 'index')); ?> </li>
		<!--
		<li><?php echo $this->Html->link(__('New Eventlog'), array('action' => 'add')); ?> </li>
	    --> 
	</ul>
</div>
