<div class="tmreports view">
<h2><?php  echo __('Tmreport'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Portal'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['portal']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Vsat'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['vsat']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cdma'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['cdma']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ipmsan'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['ipmsan']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Wbridge'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['wbridge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Atm'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['atm']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Speed'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['speed']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tmexchange'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['tmexchange']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nopctraining'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['nopctraining']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nopcsurfing'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['nopcsurfing']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($tmreport['User']['name'], array('controller' => 'users', 'action' => 'view', $tmreport['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($tmreport['Tmreport']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Tmreport'), array('action' => 'edit', $tmreport['Tmreport']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Tmreport'), array('action' => 'delete', $tmreport['Tmreport']['id']), null, __('Are you sure you want to delete # %s?', $tmreport['Tmreport']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tmreports'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Tmreport'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
