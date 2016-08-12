
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Pesttype'), array('action' => 'edit', $pesttype['Pesttype']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pesttype'), array('action' => 'delete', $pesttype['Pesttype']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $pesttype['Pesttype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="pesttypes view">

			<h2><?php  echo __('Pesttype'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($pesttype['Pesttype']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($pesttype['Pesttype']['name']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Readings'); ?></h3>
				
				<?php if (!empty($pesttype['Reading'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Pest Id'); ?></th>
		<th><?php echo __('Partition Id'); ?></th>
		<th><?php echo __('Job Id'); ?></th>
		<th><?php echo __('Count'); ?></th>
		<th><?php echo __('Created'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($pesttype['Reading'] as $reading): ?>
		<tr>
			<td><?php echo $reading['id']; ?></td>
			<td><?php echo $reading['pest_id']; ?></td>
			<td><?php echo $reading['partition_id']; ?></td>
			<td><?php echo $reading['job_id']; ?></td>
			<td><?php echo $reading['count']; ?></td>
			<td><?php echo $reading['created']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'readings', 'action' => 'view', $reading['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'readings', 'action' => 'edit', $reading['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'readings', 'action' => 'delete', $reading['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $reading['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
