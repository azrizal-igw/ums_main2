<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Create new project</h5>
</div>
<div class="modal-body">
		
<?php echo $this->Form->create('Pest', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>

<?php echo $this->Form->input('id'); ?>	

<div class="control-group">
	<?php echo $this->Form->label('name', 'name', array('class' => 'control-label'));?>
	<div class="controls">
		<?php echo $this->Form->input('name'); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->

<?php echo $this->Form->end(); ?>
</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>