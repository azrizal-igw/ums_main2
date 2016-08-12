<div class="browsings view">
<h2><?php  echo __('Browsing');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['icno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pcno'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['pcno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rate Per Hour'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['rate_per_hour']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time Start'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['time_start']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time End'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['time_end']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php if ($browsing['Browsing']['type'] ==1) {echo "Postpaid";}else{echo "Prepaid";}; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Browse Status'); ?></dt>
		<dd>
			<?php if ($browsing['Browsing']['browse_status'] ==1) {echo "Logout";} else {echo "";};  ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Acct'); ?></dt>
		<dd>
			<?php if ($browsing['Browsing']['acct'] ==1) {echo "Personal";}else{echo "SKMM";}; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Paid'); ?></dt>
		<dd>
			<?php if ($browsing['Browsing']['paid'] ==1) {echo "Paid";}else{echo "";}; ?>
			&nbsp;
		</dd>
		<!--
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['sendstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry Dt'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['entry_dt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mod Dt'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['mod_dt']); ?>
			&nbsp;
		</dd>
		-->
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($browsing['Browsing']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul><!--
		<li><?php echo $this->Html->link(__('Edit Browsing'), array('action' => 'edit', $browsing['Browsing']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Browsing'), array('action' => 'delete', $browsing['Browsing']['id']), null, __('Are you sure you want to delete # %s?', $browsing['Browsing']['id'])); ?> </li>
		-->
		<li><?php echo $this->Html->link(__('List Browsings'), array('action' => 'index')); ?> </li>
		<!--<li><?php echo $this->Html->link(__('New Browsing'), array('action' => 'add')); ?> </li>-->
	</ul>
</div>
