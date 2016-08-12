
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Chemicals Activities'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Chemicals'), array('controller' => 'chemicals', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Chemical'), array('controller' => 'chemicals', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Activities'), array('controller' => 'activities', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Activity'), array('controller' => 'activities', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="chemicalsActivities form">
		
			<?php echo $this->Form->create('ChemicalsActivity', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Add Chemicals Activity'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('chemical_id', 'chemical_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('chemical_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('activity_id', 'activity_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('activity_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('quantity', 'quantity', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('quantity', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
