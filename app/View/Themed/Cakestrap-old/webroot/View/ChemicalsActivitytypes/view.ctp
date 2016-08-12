
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Chemicals Activitytype'), array('action' => 'edit', $chemicalsActivitytype['ChemicalsActivitytype']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chemicals Activitytype'), array('action' => 'delete', $chemicalsActivitytype['ChemicalsActivitytype']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $chemicalsActivitytype['ChemicalsActivitytype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chemicals Activitytypes'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemicals Activitytype'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chemicals'), array('controller' => 'chemicals', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemical'), array('controller' => 'chemicals', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activitytypes'), array('controller' => 'activitytypes', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activitytype'), array('controller' => 'activitytypes', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="chemicalsActivitytypes view">

			<h2><?php  echo __('Chemicals Activitytype'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($chemicalsActivitytype['ChemicalsActivitytype']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Chemical'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($chemicalsActivitytype['Chemical']['name'], array('controller' => 'chemicals', 'action' => 'view', $chemicalsActivitytype['Chemical']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Activitytype'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($chemicalsActivitytype['Activitytype']['name'], array('controller' => 'activitytypes', 'action' => 'view', $chemicalsActivitytype['Activitytype']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Quntity'); ?></strong></td>
		<td>
			<?php echo h($chemicalsActivitytype['ChemicalsActivitytype']['quntity']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
