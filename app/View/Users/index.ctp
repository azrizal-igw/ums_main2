<div class="users">
	<h2><?php echo __('Users');?></h2>

	<p>
	  <?php
	  echo $this->Paginator->counter(array(
	  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	  ));
	  ?>  </p>

	  <div class="paging">
	  <?php
	    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	    echo $this->Paginator->numbers(array('separator' => ''));
	    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	  ?>
	</div>
	<br>
	<?php echo $this->Form->create('User', array('inputDefaults' => array('label' => false))); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>#</th>
			<th><?php echo $this->Form->input('name',array('class'=>'search-field','placeholder'=>'Name')); ?></th>
			<th><?php echo $this->Form->input('email',array('class'=>'search-field','placeholder'=>'Email')); ?></th>
			<th><?php echo $this->Paginator->sort('designation');?></th>
			<th><?php echo $this->Form->input('sitecode',array('class'=>'search-field','placeholder'=>'Sitecode')); ?></th>
			<th><?php echo $this->Paginator->sort('group_id');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php $count = $this->Paginator->counter(array('format' => ('{:start}')));?>
	<?php
	foreach ($users as $user): ?>
	<tr>
		<td><?php echo $count++ ;?></td>
		<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['designation']); ?>&nbsp;</td>
		<td><?php echo h($user['User']['sitecode']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($user['Group']['name'], array('controller' => 'groups', 'action' => 'view', $user['Group']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $user['User']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $user['User']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<?php echo $this->Form->end();?>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<script id="ajax" type="text/javascript">

/* On change search form */
$('.search-field').change(function(){
    $('#UserIndexForm').submit();
})
/* End search*/

</script>