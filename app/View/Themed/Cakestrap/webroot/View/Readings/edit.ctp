<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Pest Count</h5>
</div>
<div class="modal-body">
<?php echo $this->Form->create('Reading', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>
				

<?php echo $this->Form->input('id'); ?>

<table class="table table-bordered">
    
    <tbody id="body-pest">
    <?php //pr($readingsPests);?>
        <?php foreach($readingsPests as $ch){?>
        <tr>
            <td><?php echo $this->Form->input('pest',array('class'=>'chzn-select','default'=>$ch['ReadingsPest']['pest_id'],'name'=>"data[ReadingsPest][".$ch['ReadingsPest']['id']."][pest]"));?></td>
            <td><?php echo $this->Form->select('count',$count_pest,array('default'=>$ch['ReadingsPest']['count'],'name'=>"data[ReadingsPest][".$ch['ReadingsPest']['id']."][count]"));?></td>
            <td><a href="#" class="remove"><i class="icon-remove icon-2x"></i></a></td>
        </tr>
        <?php } ?>
    </tbody>
    
</table>
<a href='#' id='add-pest'><i class="icon icon-plus"></i> Add New..</a><br /><br />

<?php echo $this->Form->end(); ?>


</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>


<!-- <chosen> -->
<?php echo $this->Html->script('chosen/chosen.jquery');?>
<script type="text/javascript"> 
   // $(function() {
        ///$('.chzn-select').chosen();
     // });
</script>
<!-- </chosen> -->


<!-- Script add new line pest
========================================= -->
<script id="ajax" type="text/javascript">

var i =1;
$('#add-pest').on('click', function(e){
    e.preventDefault();
    i++;
    
    var sel_pest_name = 'data[ReadingsPest][new_'+i+'][pest]';
    var sel_pestcount_name = 'data[ReadingsPest][new_'+i+'][count]';
    $('#body-pest').append('<tr><td><select name="'+sel_pest_name+'"></select></td><td><select name="'+sel_pestcount_name+'"></select></td><td><a href="#" class="remove"><i class="icon-remove icon-2x"></i></a></td>');
    
    var sel_pest = $("[name='"+sel_pest_name+"']");
    <?php foreach($pests as $i=>$pest){?>
    sel_pest.append('<option value="<?php echo $i;?>" ><?php echo $pest;?></option>');
    <?php } ?>
    
    var sel_pestcount = $("[name='"+sel_pestcount_name+"']");
    <?php foreach($count_pest as $i=>$pestcount){?>
    sel_pestcount.append('<option value="<?php echo $i;?>" ><?php echo $pestcount;?></option>');
    <?php } ?>
})

$(document).on('click','.remove',function(e){
    e.preventDefault();
    $(this).closest("tr").remove();
})

</script> 