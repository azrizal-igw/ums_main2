<div class="usages view">
<h2><?php  echo __('Usage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Localid'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['localid']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Service'); ?></dt>
		<dd>
			<?php echo $this->Html->link($usage['Service']['name'], array('controller' => 'services', 'action' => 'view', $usage['Service']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Icno'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['icno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Refno'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['refno']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Amount'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['amount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cashcard'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['cashcard']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Transdate'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['transdate']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Points'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['points']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cancel'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['cancel']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sendstatus'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['sendstatus']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Withcard'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['withcard']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entrydt'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['entrydt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Moddt'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['moddt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entryuser'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['entryuser']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Moduser'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['moduser']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sitecode'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['sitecode']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($usage['Usage']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usage'), array('action' => 'edit', $usage['Usage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usage'), array('action' => 'delete', $usage['Usage']['id']), null, __('Are you sure you want to delete # %s?', $usage['Usage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usage'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Svcaltelsimpacks'); ?></h3>
	<?php if (!empty($usage['Svcaltelsimpack'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Phoneno'); ?></th>
		<th><?php echo __('Withtopup'); ?></th>
		<th><?php echo __('Topupamt'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcaltelsimpack'] as $svcaltelsimpack): ?>
		<tr>
			<td><?php echo $svcaltelsimpack['id']; ?></td>
			<td><?php echo $svcaltelsimpack['localid']; ?></td>
			<td><?php echo $svcaltelsimpack['usage_id']; ?></td>
			<td><?php echo $svcaltelsimpack['transdate']; ?></td>
			<td><?php echo $svcaltelsimpack['phoneno']; ?></td>
			<td><?php echo $svcaltelsimpack['withtopup']; ?></td>
			<td><?php echo $svcaltelsimpack['topupamt']; ?></td>
			<td><?php echo $svcaltelsimpack['sendstatus']; ?></td>
			<td><?php echo $svcaltelsimpack['entrydt']; ?></td>
			<td><?php echo $svcaltelsimpack['moddt']; ?></td>
			<td><?php echo $svcaltelsimpack['sitecode']; ?></td>
			<td><?php echo $svcaltelsimpack['created']; ?></td>
			<td><?php echo $svcaltelsimpack['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcaltelsimpacks', 'action' => 'view', $svcaltelsimpack['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcaltelsimpacks', 'action' => 'edit', $svcaltelsimpack['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcaltelsimpacks', 'action' => 'delete', $svcaltelsimpack['id']), null, __('Are you sure you want to delete # %s?', $svcaltelsimpack['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcaltelsimpack'), array('controller' => 'svcaltelsimpacks', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svcbsnbills'); ?></h3>
	<?php if (!empty($usage['Svcbsnbill'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Billtype Id'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcbsnbill'] as $svcbsnbill): ?>
		<tr>
			<td><?php echo $svcbsnbill['id']; ?></td>
			<td><?php echo $svcbsnbill['localid']; ?></td>
			<td><?php echo $svcbsnbill['usage_id']; ?></td>
			<td><?php echo $svcbsnbill['transdate']; ?></td>
			<td><?php echo $svcbsnbill['billtype_id']; ?></td>
			<td><?php echo $svcbsnbill['sendstatus']; ?></td>
			<td><?php echo $svcbsnbill['entrydt']; ?></td>
			<td><?php echo $svcbsnbill['moddt']; ?></td>
			<td><?php echo $svcbsnbill['sitecode']; ?></td>
			<td><?php echo $svcbsnbill['created']; ?></td>
			<td><?php echo $svcbsnbill['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcbsnbills', 'action' => 'view', $svcbsnbill['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcbsnbills', 'action' => 'edit', $svcbsnbill['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcbsnbills', 'action' => 'delete', $svcbsnbill['id']), null, __('Are you sure you want to delete # %s?', $svcbsnbill['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcbsnbill'), array('controller' => 'svcbsnbills', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svcbsncashsavings'); ?></h3>
	<?php if (!empty($usage['Svcbsncashsaving'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Newacct'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcbsncashsaving'] as $svcbsncashsaving): ?>
		<tr>
			<td><?php echo $svcbsncashsaving['id']; ?></td>
			<td><?php echo $svcbsncashsaving['localid']; ?></td>
			<td><?php echo $svcbsncashsaving['usage_id']; ?></td>
			<td><?php echo $svcbsncashsaving['transdate']; ?></td>
			<td><?php echo $svcbsncashsaving['newacct']; ?></td>
			<td><?php echo $svcbsncashsaving['sendstatus']; ?></td>
			<td><?php echo $svcbsncashsaving['entrydt']; ?></td>
			<td><?php echo $svcbsncashsaving['moddt']; ?></td>
			<td><?php echo $svcbsncashsaving['sitecode']; ?></td>
			<td><?php echo $svcbsncashsaving['created']; ?></td>
			<td><?php echo $svcbsncashsaving['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcbsncashsavings', 'action' => 'view', $svcbsncashsaving['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcbsncashsavings', 'action' => 'edit', $svcbsncashsaving['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcbsncashsavings', 'action' => 'delete', $svcbsncashsaving['id']), null, __('Are you sure you want to delete # %s?', $svcbsncashsaving['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcbsncashsaving'), array('controller' => 'svcbsncashsavings', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svcbsntopups'); ?></h3>
	<?php if (!empty($usage['Svcbsntopup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Telco Id'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcbsntopup'] as $svcbsntopup): ?>
		<tr>
			<td><?php echo $svcbsntopup['id']; ?></td>
			<td><?php echo $svcbsntopup['localid']; ?></td>
			<td><?php echo $svcbsntopup['usage_id']; ?></td>
			<td><?php echo $svcbsntopup['transdate']; ?></td>
			<td><?php echo $svcbsntopup['telco_id']; ?></td>
			<td><?php echo $svcbsntopup['sendstatus']; ?></td>
			<td><?php echo $svcbsntopup['entrydt']; ?></td>
			<td><?php echo $svcbsntopup['moddt']; ?></td>
			<td><?php echo $svcbsntopup['sitecode']; ?></td>
			<td><?php echo $svcbsntopup['created']; ?></td>
			<td><?php echo $svcbsntopup['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcbsntopups', 'action' => 'view', $svcbsntopup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcbsntopups', 'action' => 'edit', $svcbsntopup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcbsntopups', 'action' => 'delete', $svcbsntopup['id']), null, __('Are you sure you want to delete # %s?', $svcbsntopup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcbsntopup'), array('controller' => 'svcbsntopups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svcceleasyreloads'); ?></h3>
	<?php if (!empty($usage['Svcceleasyreload'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Phoneno'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcceleasyreload'] as $svcceleasyreload): ?>
		<tr>
			<td><?php echo $svcceleasyreload['id']; ?></td>
			<td><?php echo $svcceleasyreload['localid']; ?></td>
			<td><?php echo $svcceleasyreload['usage_id']; ?></td>
			<td><?php echo $svcceleasyreload['transdate']; ?></td>
			<td><?php echo $svcceleasyreload['phoneno']; ?></td>
			<td><?php echo $svcceleasyreload['sendstatus']; ?></td>
			<td><?php echo $svcceleasyreload['entrydt']; ?></td>
			<td><?php echo $svcceleasyreload['moddt']; ?></td>
			<td><?php echo $svcceleasyreload['sitecode']; ?></td>
			<td><?php echo $svcceleasyreload['created']; ?></td>
			<td><?php echo $svcceleasyreload['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcceleasyreloads', 'action' => 'view', $svcceleasyreload['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcceleasyreloads', 'action' => 'edit', $svcceleasyreload['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcceleasyreloads', 'action' => 'delete', $svcceleasyreload['id']), null, __('Are you sure you want to delete # %s?', $svcceleasyreload['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcceleasyreload'), array('controller' => 'svcceleasyreloads', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svccelstarters'); ?></h3>
	<?php if (!empty($usage['Svccelstarter'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Simtype Id'); ?></th>
		<th><?php echo __('Phoneno'); ?></th>
		<th><?php echo __('Withtopup'); ?></th>
		<th><?php echo __('Topupamt'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svccelstarter'] as $svccelstarter): ?>
		<tr>
			<td><?php echo $svccelstarter['id']; ?></td>
			<td><?php echo $svccelstarter['localid']; ?></td>
			<td><?php echo $svccelstarter['usage_id']; ?></td>
			<td><?php echo $svccelstarter['transdate']; ?></td>
			<td><?php echo $svccelstarter['simtype_id']; ?></td>
			<td><?php echo $svccelstarter['phoneno']; ?></td>
			<td><?php echo $svccelstarter['withtopup']; ?></td>
			<td><?php echo $svccelstarter['topupamt']; ?></td>
			<td><?php echo $svccelstarter['sendstatus']; ?></td>
			<td><?php echo $svccelstarter['entrydt']; ?></td>
			<td><?php echo $svccelstarter['moddt']; ?></td>
			<td><?php echo $svccelstarter['sitecode']; ?></td>
			<td><?php echo $svccelstarter['created']; ?></td>
			<td><?php echo $svccelstarter['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svccelstarters', 'action' => 'view', $svccelstarter['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svccelstarters', 'action' => 'edit', $svccelstarter['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svccelstarters', 'action' => 'delete', $svccelstarter['id']), null, __('Are you sure you want to delete # %s?', $svccelstarter['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svccelstarter'), array('controller' => 'svccelstarters', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Svcinsurances'); ?></h3>
	<?php if (!empty($usage['Svcinsurance'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Localid'); ?></th>
		<th><?php echo __('Usage Id'); ?></th>
		<th><?php echo __('Transdate'); ?></th>
		<th><?php echo __('Insco Id'); ?></th>
		<th><?php echo __('Instype Id'); ?></th>
		<th><?php echo __('Insuredname'); ?></th>
		<th><?php echo __('Insuredicno'); ?></th>
		<th><?php echo __('Sendstatus'); ?></th>
		<th><?php echo __('Entrydt'); ?></th>
		<th><?php echo __('Moddt'); ?></th>
		<th><?php echo __('Sitecode'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($usage['Svcinsurance'] as $svcinsurance): ?>
		<tr>
			<td><?php echo $svcinsurance['id']; ?></td>
			<td><?php echo $svcinsurance['localid']; ?></td>
			<td><?php echo $svcinsurance['usage_id']; ?></td>
			<td><?php echo $svcinsurance['transdate']; ?></td>
			<td><?php echo $svcinsurance['insco_id']; ?></td>
			<td><?php echo $svcinsurance['instype_id']; ?></td>
			<td><?php echo $svcinsurance['insuredname']; ?></td>
			<td><?php echo $svcinsurance['insuredicno']; ?></td>
			<td><?php echo $svcinsurance['sendstatus']; ?></td>
			<td><?php echo $svcinsurance['entrydt']; ?></td>
			<td><?php echo $svcinsurance['moddt']; ?></td>
			<td><?php echo $svcinsurance['sitecode']; ?></td>
			<td><?php echo $svcinsurance['created']; ?></td>
			<td><?php echo $svcinsurance['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'svcinsurances', 'action' => 'view', $svcinsurance['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'svcinsurances', 'action' => 'edit', $svcinsurance['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'svcinsurances', 'action' => 'delete', $svcinsurance['id']), null, __('Are you sure you want to delete # %s?', $svcinsurance['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Svcinsurance'), array('controller' => 'svcinsurances', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
