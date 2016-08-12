<div class="receipts view">
<h2><?php  echo __('Receipt'); ?></h2>
	<dl><!--
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['localid']); ?>
			&nbsp;
		</dd>
		-->
		<dt><?php echo __('Receiptno'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['receiptno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['icno']); ?>
			&nbsp;
		</dd>
		<!--
		<dt><?php echo __('Admindetail Localid'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['admindetail_localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browsing Localid'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['browsing_localid']); ?>
			&nbsp;
		</dd>
		-->
		<dt><?php echo __('Browsing Time Start'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['browsing_time_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bill Time'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['bill_time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Charge'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['charge']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['paid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acct'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['acct']); ?>
			&nbsp;
		</dd>
		<!--
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['sendstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry Dt'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['entry_dt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod Dt'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['mod_dt']); ?>
			&nbsp;
		</dd>
		-->
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($receipt['Receipt']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><!--
		<li><?php echo $this->Html->link(__('Edit Receipt'), array('action' => 'edit', $receipt['Receipt']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Receipt'), array('action' => 'delete', $receipt['Receipt']['id']), null, __('Are you sure you want to delete # %s?', $receipt['Receipt']['id'])); ?> </li>
		-->
		<li><?php echo $this->Html->link(__('List Receipts'), array('action' => 'index')); ?> </li>
		<!--
		<li><?php echo $this->Html->link(__('New Receipt'), array('action' => 'add')); ?> </li>
		-->
	</ul>
</div>
