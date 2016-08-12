
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ReadingsPesttype.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ReadingsPesttype.id'))); ?></li>
										<li><?php echo $this->Html->link(__('List Readings Pesttypes'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Readings'), array('controller' => 'readings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Reading'), array('controller' => 'readings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pesttypes'), array('controller' => 'pesttypes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pesttype'), array('controller' => 'pesttypes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Jobs'), array('controller' => 'jobs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Job'), array('controller' => 'jobs', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="readingsPesttypes form">
		
			<?php echo $this->Form->create('ReadingsPesttype', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				<fieldset>
					<h2><?php echo __('Edit Readings Pesttype'); ?></h2>
			<div class="control-group">
	<?php echo $this->Form->label('id', 'id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('reading_id', 'reading_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('reading_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('pesttype_id', 'pesttype_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('pesttype_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('count', 'count', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('count', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('job_id', 'job_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('job_id', array('class' => 'span12')); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->
