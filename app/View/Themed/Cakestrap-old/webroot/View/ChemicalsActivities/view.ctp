
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Chemicals Activity'), array('action' => 'edit', $chemicalsActivity['ChemicalsActivity']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Chemicals Activity'), array('action' => 'delete', $chemicalsActivity['ChemicalsActivity']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $chemicalsActivity['ChemicalsActivity']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Chemicals Activities'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemicals Activity'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Chemicals'), array('controller' => 'chemicals', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemical'), array('controller' => 'chemicals', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="chemicalsActivities view">

			<h2><?php  echo __('Chemicals Activity'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($chemicalsActivity['ChemicalsActivity']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Chemical'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($chemicalsActivity['Chemical']['name'], array('controller' => 'chemicals', 'action' => 'view', $chemicalsActivity['Chemical']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Activity'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($chemicalsActivity['Activity']['id'], array('controller' => 'activities', 'action' => 'view', $chemicalsActivity['Activity']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Quantity'); ?></strong></td>
		<td>
			<?php echo h($chemicalsActivity['ChemicalsActivity']['quantity']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
