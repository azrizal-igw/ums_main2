<div class="acccodeheaders view">
<h2><?php  echo __('Acccodeheader'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($acccodeheader['Acccodeheader']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($acccodeheader['Acccodeheader']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($acccodeheader['Acccodeheader']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acccode'); ?></dt>
		<dd>
			<?php echo $this->Html->link($acccodeheader['Acccode']['name'], array('controller' => 'acccodes', 'action' => 'view', $acccodeheader['Acccode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($acccodeheader['Acccodeheader']['amount']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Acccodeheader'), array('action' => 'edit', $acccodeheader['Acccodeheader']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Acccodeheader'), array('action' => 'delete', $acccodeheader['Acccodeheader']['id']), null, __('Are you sure you want to delete # %s?', $acccodeheader['Acccodeheader']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Acccodeheaders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acccodeheader'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Acccodes'), array('controller' => 'acccodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Acccode'), array('controller' => 'acccodes', 'action' => 'add')); ?> </li>
	</ul>
</div>
