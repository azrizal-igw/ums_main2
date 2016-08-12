
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Reading'), array('action' => 'edit', $reading['Reading']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Reading'), array('action' => 'delete', $reading['Reading']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $reading['Reading']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Readings'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Partitions'), array('controller' => 'partitions', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Partition'), array('controller' => 'partitions', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="readings view">

			<h2><?php  echo __('Reading'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($reading['Reading']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Partition'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($reading['Partition']['name'], array('controller' => 'partitions', 'action' => 'view', $reading['Partition']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Job'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($reading['Job']['id'], array('controller' => 'jobs', 'action' => 'view', $reading['Job']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Created'); ?></strong></td>
		<td>
			<?php echo h($reading['Reading']['created']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Pesttypes'); ?></h3>
				
				<?php if (!empty($reading['Pesttype'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($reading['Pesttype'] as $pesttype): ?>
		<tr>
			<td><?php echo $pesttype['id']; ?></td>
			<td><?php echo $pesttype['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'pesttypes', 'action' => 'view', $pesttype['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'pesttypes', 'action' => 'edit', $pesttype['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'pesttypes', 'action' => 'delete', $pesttype['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $pesttype['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
