  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 <style>
.project-label {
display: block;
font-weight: bold;
margin-bottom: 1em;
}
.ui-state-default {
float: left;
height: 32px;
width: 32px;
}
.project-description {
margin: 0;
padding: 0;
}
.ui-autocomplete { z-index:2147483647; }

</style>

<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5>Edit Activity Type</h5>
</div>
<div class="modal-body">
		
<?php echo $this->Form->create('Activity', array('inputDefaults' => array('label' => false), 'id'=>'modal_form','class' => 'form form-horizontal')); ?>
<?php echo $this->Form->input('id'); ?>

<table>
    <thead>
        <th>&nbsp;</th>
        <th>Chemical</th>
        <th>Quantity</th>
    </thead>
    <tbody id="body-chemical">
        <?php foreach($activity_chemicals as $ch){?>
        
        <tr><td><img  src="<?php echo $chemicals2[$ch['ChemicalsActivity']['chemical_id']]['image'];?>" class="ui-state-default" alt=""  project-image="<?php echo $ch['ChemicalsActivity']['id'];?>" /></td>
            <td><input class="project" project="<?php echo $ch['ChemicalsActivity']['id'];?>" value="<?php echo $chemicals2[$ch['ChemicalsActivity']['chemical_id']]['label'];?>" name="data[ChemicalsActivity][<?php echo $ch['ChemicalsActivity']['id'];?>][name]" />
            <input type="hidden" project-id="<?php echo $ch['ChemicalsActivity']['id'];?>" value="<?php echo $ch['ChemicalsActivity']['chemical_id'];?>" name="data[ChemicalsActivity][<?php echo $ch['ChemicalsActivity']['id'];?>][chemical_id]" /></td>
            <td><input type="text"  value="<?php echo $ch['ChemicalsActivity']['quantity'];?>" name="data[ChemicalsActivity][<?php echo $ch['ChemicalsActivity']['id'];?>][quantity]"></td>
        </tr>

        <?php } ?>
    </tbody>
    
</table>
<a href='#' id='add-chemical'><i class="icon icon-plus"></i> Add Chemical</a><br /><br />

<?php echo $this->Form->end(); ?>
			
</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">Close</button>
        <button type="button" class="btn btn-primary" id="save">Save</button>
</div>

<!-- Script 
========================================= -->
<script id="ajax" type="text/javascript">

var $modal = $('#modal-activitytype-chemical');

var i =1;
$('#add-chemical').on('click', function(e){
    e.preventDefault();
    i++;
       
    $('#body-chemical').append('<tr><td><img  src="images/transparent_1x1.png" class="ui-state-default" alt=""  project-image="new_'+i+'" /></td>'+
'<td><input class="project" project="new_'+i+'" name="data[ChemicalsActivity][new_'+i+'][name]" />'+
'<input type="hidden" project-id="new_'+i+'" name="data[ChemicalsActivity][new_'+i+'][chemical_id]" /></td>'+
    '<td><input type="text"  name="data[ChemicalsActivity][new_'+i+'][quantity]"></td></tr>');
    
})

$(function() {
    var chemicals = <?php echo json_encode($chemicals);?>
    
     $(document).on("keydown.autocomplete", ".project",function() {
   // alert('ayam');
    $this = $(this);
    $this.autocomplete({
        minLength: 0,
        source: chemicals,
        focus: function( event, ui ) {
        $this.val( ui.item.label );
            return false;
        },
        select: function( event, ui ) {
            $this.val( ui.item.label );
            $( "[project-id='"+$this.attr('project')+"']" ).val( ui.item.value );
            $( "[project-image='"+$this.attr('project')+"']").attr( "src", ui.item.image );
            return false;
        }
    })
    
    .data( "ui-autocomplete" )._renderItem = function( ul, item ) {

        return $( "<li>" )
        .append( "<a>" + item.label  )
        .appendTo( ul );
    };
    });
});
</script> 
