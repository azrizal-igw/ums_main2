
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Readings Pesttype'), array('action' => 'edit', $readingsPesttype['ReadingsPesttype']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Readings Pesttype'), array('action' => 'delete', $readingsPesttype['ReadingsPesttype']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $readingsPesttype['ReadingsPesttype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings Pesttypes'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Readings Pesttype'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="readingsPesttypes view">

			<h2><?php  echo __('Readings Pesttype'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($readingsPesttype['ReadingsPesttype']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Reading'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Reading']['id'], array('controller' => 'readings', 'action' => 'view', $readingsPesttype['Reading']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pesttype'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Pesttype']['name'], array('controller' => 'pesttypes', 'action' => 'view', $readingsPesttype['Pesttype']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Count'); ?></strong></td>
		<td>
			<?php echo h($readingsPesttype['ReadingsPesttype']['count']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Job'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPesttype['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $readingsPesttype['Job']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
