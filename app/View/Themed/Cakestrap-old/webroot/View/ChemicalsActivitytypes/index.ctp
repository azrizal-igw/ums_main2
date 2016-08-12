
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Chemicals Activitytype'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Chemicals'), array('controller' => 'chemicals', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Chemical'), array('controller' => 'chemicals', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Activitytypes'), array('controller' => 'activitytypes', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Activitytype'), array('controller' => 'activitytypes', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="chemicalsActivitytypes index">
		
			<h2><?php echo __('Chemicals Activitytypes'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('chemical_id'); ?></th>
											<th><?php echo $this->Paginator->sort('activitytype_id'); ?></th>
											<th><?php echo $this->Paginator->sort('quntity'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($chemicalsActivitytypes as $chemicalsActivitytype): ?>
	<tr>
		<td><?php echo h($chemicalsActivitytype['ChemicalsActivitytype']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($chemicalsActivitytype['Chemical']['name'], array('controller' => 'chemicals', 'action' => 'view', $chemicalsActivitytype['Chemical']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($chemicalsActivitytype['Activitytype']['name'], array('controller' => 'activitytypes', 'action' => 'view', $chemicalsActivitytype['Activitytype']['id'])); ?>
		</td>
		<td><?php echo h($chemicalsActivitytype['ChemicalsActivitytype']['quntity']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $chemicalsActivitytype['ChemicalsActivitytype']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $chemicalsActivitytype['ChemicalsActivitytype']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $chemicalsActivitytype['ChemicalsActivitytype']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $chemicalsActivitytype['ChemicalsActivitytype']['id'])); ?>
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
