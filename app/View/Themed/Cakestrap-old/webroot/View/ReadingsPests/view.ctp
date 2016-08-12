
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Readings Pest'), array('action' => 'edit', $readingsPest['ReadingsPest']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Readings Pest'), array('action' => 'delete', $readingsPest['ReadingsPest']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $readingsPest['ReadingsPest']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings Pests'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Readings Pest'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pests'), array('controller' => 'pests', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pest'), array('controller' => 'pests', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projects'), array('controller' => 'projects', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Project'), array('controller' => 'projects', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="readingsPests view">

			<h2><?php  echo __('Readings Pest'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($readingsPest['ReadingsPest']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Reading'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPest['Reading']['id'], array('controller' => 'readings', 'action' => 'view', $readingsPest['Reading']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pest'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPest['Pest']['name'], array('controller' => 'pests', 'action' => 'view', $readingsPest['Pest']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Count'); ?></strong></td>
		<td>
			<?php echo h($readingsPest['ReadingsPest']['count']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Job'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPest['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $readingsPest['Job']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Project'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPest['Project']['name'], array('controller' => 'projects', 'action' => 'view', $readingsPest['Project']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Pesttype'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($readingsPest['Pesttype']['name'], array('controller' => 'pesttypes', 'action' => 'view', $readingsPest['Pesttype']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
