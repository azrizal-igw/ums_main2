<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Create new project</h5>
</div>
<div class="modal-body">
		
			<?php echo $this->Form->create('ReadingsPesttype', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				
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

<?php echo $this->Form->end(); ?>
			
</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>