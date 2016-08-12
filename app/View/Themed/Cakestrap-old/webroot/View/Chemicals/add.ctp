<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Add New Chemical</h5>
</div>
<div class="modal-body">
		
<?php echo $this->Form->create('Chemical', array('inputDefaults' => array('label' => false),'id'=>'modal_form', 'class' => 'form form-horizontal')); ?>
			
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