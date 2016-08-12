<div class="acctransactions view">
<h2><?php  echo __('Acctransaction');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acccode'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acctransaction['Acccode']['name'], array('controller' => 'acccodes', 'action' => 'view', $acctransaction['Acccode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['acccode_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Drcr'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['drcr']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Desc'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['desc']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acctransaction['User']['name'], array('controller' => 'users', 'action' => 'view', $acctransaction['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($acctransaction['Acctransaction']['created']); ?>
			&nbsp;
		</dd>
	</dl>
	<div id='actions'>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $acctransaction['Acctransaction']['id'],$transdate)); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $acctransaction['Acctransaction']['id'],$transdate), null, __('Are you sure you want to delete # %s?', $acctransaction['Acctransaction']['id'])); ?>
		</div>
</div>

