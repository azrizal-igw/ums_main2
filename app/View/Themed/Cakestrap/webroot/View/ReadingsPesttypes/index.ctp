
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Readings Pesttype'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="readingsPesttypes index">
		
			<h2><?php echo __('Readings Pesttypes'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('reading_id'); ?></th>
											<th><?php echo $this->Paginator->sort('pesttype_id'); ?></th>
											<th><?php echo $this->Paginator->sort('count'); ?></th>
											<th><?php echo $this->Paginator->sort('job_id'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($readingsPesttypes as $readingsPesttype): ?>
	<tr>
		<td><?php echo h($readingsPesttype['ReadingsPesttype']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Reading']['id'], array('controller' => 'readings', 'action' => 'view', $readingsPesttype['Reading']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Pesttype']['name'], array('controller' => 'pesttypes', 'action' => 'view', $readingsPesttype['Pesttype']['id'])); ?>
		</td>
		<td><?php echo h($readingsPesttype['ReadingsPesttype']['count']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $readingsPesttype['Job']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $readingsPesttype['ReadingsPesttype']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $readingsPesttype['ReadingsPesttype']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $readingsPesttype['ReadingsPesttype']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $readingsPesttype['ReadingsPesttype']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</table>
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<div class="pagination">
				<ul>
					<?php
		echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
