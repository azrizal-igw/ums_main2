<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Create new project</h5>
</div>
<div class="modal-body">
	<script>
 $(function() {
$( "#dp3" ).datepicker();
});
</script>
<?php echo $this->Form->create('Job', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
   
<style>
.datepicker{z-index:1151;}
</style>

<div class="control-group">

	<?php $date_job2 = explode('-',$this->Form->data['Job']['date']);?>
    <?php $date_job = $date_job2[2].'-'.$date_job2[1].'-'.$date_job2[0];?>
	<div class="controls">
        <div class="input-append date" id="dp3" data-date="<?php echo $date_job;?>" data-date-format="dd-mm-yyyy">
    <input class="span2" size="16"  type="text" value="<?php echo $date_job;?>" id="JobDate" name="data[Job][date]">
    <span class="add-on"><i class="icon-th"></i></span>
    </div>
        <?php $options = array();?>
        <?php for($i=1;$i<=31;$i++){?>
        <?php $options[$i] = $i;?>
        <?php } ?>
		<?php echo $this->Form->select('day',$options,array('default'=>1)); ?>
        		<?php echo $this->Form->input('id',array('label'=>false)); ?>
	</div><!-- .controls -->
</div><!-- .control-group -->


		<?php echo $this->Form->end(); ?>
			

</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>