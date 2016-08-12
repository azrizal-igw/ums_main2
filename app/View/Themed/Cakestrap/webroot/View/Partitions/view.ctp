
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Partition'), array('action' => 'edit', $partition['Partition']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Partition'), array('action' => 'delete', $partition['Partition']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $partition['Partition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Partitions'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partition'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Locations'), array('controller' => 'locations', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Location'), array('controller' => 'locations', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="partitions view">

			<h2><?php  echo __('Partition'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($partition['Partition']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($partition['Partition']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Location'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($partition['Location']['name'], array('controller' => 'locations', 'action' => 'view', $partition['Location']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Readings'); ?></h3>
				
				<?php if (!empty($partition['Reading'])): ?>
				
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
								foreach ($partition['Reading'] as $reading): ?>
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
