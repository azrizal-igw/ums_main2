
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ChemicalsActivitytype.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ChemicalsActivitytype.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Chemicals Activitytypes'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Chemicals'), array('controller' => 'chemicals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemical'), array('controller' => 'chemicals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activitytypes'), array('controller' => 'activitytypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activitytype'), array('controller' => 'activitytypes', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="chemicalsActivitytypes form">
		
			<?php echo $this->Form->create('ChemicalsActivitytype', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Chemicals Activitytype'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('chemical_id', 'chemical_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('chemical_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('activitytype_id', 'activitytype_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('activitytype_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('quntity', 'quntity', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('quntity', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
