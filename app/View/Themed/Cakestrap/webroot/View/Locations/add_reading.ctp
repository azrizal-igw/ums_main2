<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Create new project</h5>
</div>
<div class="modal-body">


<?php echo $this->Form->create('Location', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				
<div class="control-group">
	<?php echo $this->Form->label('project_id', 'project_id', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('project_id'); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<div class="control-group">
	<?php echo $this->Form->label('name', 'name', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('name'); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<?php echo $this->Form->end(); ?>
			
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>