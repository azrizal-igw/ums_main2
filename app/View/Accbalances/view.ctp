<div class="accbalances view">
<h2><?php  echo __('Accbalance');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transmonth'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['transmonth']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bf'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['bf']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Dr'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['dr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cr'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['cr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bal'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['bal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($accbalance['User']['name'], array('controller' => 'users', 'action' => 'view', $accbalance['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Siteid'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['siteid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrydate'); ?></dt>
		<dd>
			<?php echo h($accbalance['Accbalance']['entrydate']); ?>
			&nbsp;
		</dd>
	</dl>
</div>

