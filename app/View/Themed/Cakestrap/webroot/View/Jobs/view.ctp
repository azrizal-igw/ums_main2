
<style>

#table-reading td a{
   display: block;
   text-decoration: none;
}
#table-reading td a:link, #table-reading td a:visited {

   background-color: #FFF;
}
#table-reading td a:hover, #table-reading td a:active {
   color: #fff;
   background-color: #CCCCCC;
}
</style>

<style>
.row-fluid ul.thumbnails li.span12 + li { margin-left : 0px; }
.row-fluid ul.thumbnails li.span6:nth-child(2n + 3) { margin-left : 0px; }
.row-fluid ul.thumbnails li.span4:nth-child(3n + 4) { margin-left : 0px; }
.row-fluid ul.thumbnails li.span3:nth-child(4n + 5) { margin-left : 0px; }
</style>

	<?php echo $this->Html->css('Jquery-fileupload/jquery.fileupload-ui.css')?>		
<h4><u>Bacaan Kadar Serangga <?php  echo h($job['Project']['name']); ?></u></h4>

<table >
    <tr>		
        <td><b><?php echo __('Id'); ?></b></td>
        <td >
			:<?php echo h($job['Job']['id']); ?>
			&nbsp;
        </td>
    </tr><tr>		
        <td><b><?php echo __('Date'); ?></b></td>
		<td>
			:<?php echo h($job['Job']['date']); ?>
			&nbsp;
		</td>
    </tr><tr>		
        <td><b><?php echo __('Day'); ?></b></td>
		<td>
			:<?php echo h($job['Job']['day']); ?>
			&nbsp;
		</td>
    </tr>			
</table><!-- .table table-striped table-bordered -->
			
<br />


				
<table class="table table-bordered table-striped table-hover" id="table-reading">
    <tr>
        <th><?php echo __('Partition/Setek'); ?></th>
        <th><?php echo __('Tan Metrix'); ?></th>
                    
        <?php foreach($pesttypes as $pesttype){?>
        <th><?php echo h(__($pesttype)); ?></th>
        <?php } ?>
    </tr>
    
    <?php
    $i = 0;
    foreach ($job['Reading'] as $reading): ?>
    <tr>
        <td><a class="edit-setek" data-type="text" data-pk="<?php echo $reading['partition_id'];?>" data-url="<?php echo $this->Html->url(array('controller'=>'partitions','action'=>'update_name',$reading['partition_id']));?>" data-title="Enter Partition/Setek"  href="#"><?php echo $partition[$reading['partition_id']]; ?></a></td>
        <td><a class="edit-setek" data-type="text" data-pk="<?php echo $reading['id'];?>" data-url="<?php echo $this->Html->url(array('controller'=>'readings','action'=>'add_reading',$reading['id']));?>" data-title="Enter Tan Metrix"  href="#"><?php echo $reading['tan_metrik']; ?></a></td>
        
        <?php foreach($pesttypes as $pesttype_id=>$pesttype){?>
                        
        <td id="count_<?php echo $reading['id']; ?>_<?php echo $pesttype_id;?>"><a href="<?php echo $this->Html->url(array('controller'=>'readings','action'=>'edit',$reading['id'],$pesttype_id,$job['Job']['id'],$job['Job']['project_id']));?>" class="reading-edit"><?php echo (isset($readings_pesttypes[$reading['id']][$pesttype_id])?$readings_pesttypes[$reading['id']][$pesttype_id]['count']:'&nbsp;');?></a></td>
        <?php } ?>
			
    </tr>
	<?php endforeach; ?>
</table><!-- .table table-striped table-bordered -->
					


<a  id="link-new-partition" href="#"><i class="icon icon-plus"></i> New Reading</a>
<br /><br />



				
<table class="table table-bordered table-striped" id="table-activity">
    <tr>
        <th><?php echo __('Activity'); ?></th>
        <th><?php echo __('Photo'); ?></th>
        <th><?php echo __('Chemical'); ?></th>
        <th><?php echo __('Desc'); ?></th>
    </tr>
    <?php
    $i = 0;
    foreach ($job['Activity'] as $activity): ?>
    <tr>
        <td ><a class="link-edit-activity" activity-id="<?php echo $activity['id']; ?>" href="#"><?php echo $activitytypes[$activity['activitytype_id']]; ?></a></td>
        <td width="50%">
        
        
         <!-- Upload Photo -->
        <span class="btn btn-link fileinput-button">
            <i class="icon-file"></i>
            <span>Upload Photo...</span>
            <!-- The file input field used as target for the file upload widget -->
             <input class="fileupload"  activity-id="<?php echo $activity['id'];?>" type="file" name="upload" data-url="http://aktevsystem.com/pestcontrol_upload/upload.php?model=Activity&foreign_key=<?php echo $activity['id'];?>" multiple>
          
        </span><br><br>
        <!-- The global progress bar -->
        <div id="progress_<?php echo $activity['id'];?>" class="progress progress-success progress-striped" style="display: none;">
            <div class="bar"></div>
        </div>
        <!-- End Upload Photo !-->
        <div class="span6">
            <div class="row-fluid">
        <ul class="thumbnails" id="thumbnails_<?php echo $activity['id']; ?>">
        <?php foreach($activity['Source'] as $sr){?>
         <li style="margin-left: 0px;" class="span4">
                <a  href="">
                <img    style="width:150px; height:150px;" src="<?php echo $sr['path'];?>" class="img-polaroid" alt="" />
                </a>
         </li>              
        <?php } ?>
        </ul>
        </div></div>
        </td>
        <td activity-chemical="<?php echo $activity['id']; ?>">
         <!-- Upload Photo -->
        <span class="btn btn-link fileinput-button" btn-chemical="<?php echo $activity['id']; ?>">
            <i class="icon-file"></i>
            <span>Edit Chemical...</span>
           
        </span><br><br>
        <?php $i =1;?>
        <?php foreach($activity['Chemical'] as $ch){?>
       <b><?php echo $i++;?>)&nbsp;<?php echo $ch['name'];?></b> <br />&nbsp;&nbsp;Quantity : <?php echo $ch['ChemicalsActivity']['quantity'];?>
        <br /><br />
        <?php } ?>
        </td>
        <td activity-desc="<?php echo $activity['id']; ?>"><?php echo $activity['desc']; ?></td>
			
    </tr>
	<?php endforeach; ?>
</table><!-- .table table-striped table-bordered -->
					


<a  id="link-new-activity" href="#"><i class="icon icon-plus"></i> New Activity</a>
<br />
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

<div id="modal-count-pest" class="modal hide fade" tabindex="-1">
    <div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h5 id="modal-title">Create new project</h5>
    </div>
    <div class="modal-body">
        <div class='modal-body-alert'></div>		
        <?php echo $this->Form->create('Reading', array('inputDefaults' => array('label' => false), 'class' => 'form form-horizontal')); ?>

        <div class="control-group">			
                <?php echo $this->Form->label('tan_metrik', 'Tan Metrik', array('class' => 'control-label'));?>
                <div class="controls">
                        <?php echo $this->Form->input('name'); ?>
                        <?php echo $this->Form->input('tan_metrik'); ?>
                        <?php echo $this->Form->input('id',array('type'=>'hidden')); ?>
                        <?php echo $this->Form->input('job_id',array('type'=>'hidden','default'=>$job['Job']['id'])); ?>
                         <?php echo $this->Form->input('project_id',array('type'=>'hidden','default'=>$job['Job']['project_id'])); ?>
                </div><!-- .controls -->
        </div><!-- .control-group -->
        
       
        
        <?php $this->Form->end();?>
        
    </div>
    <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn">Close</button>
            <button type="button" class="btn btn-primary" id="save">Save</button>
    </div>
</div>

<div id="edit-activity" class="modal hide fade" tabindex="-1"></div>
<div id="new-activity" class="modal hide fade" tabindex="-1"></div>
<div id="new-partition" class="modal hide fade" tabindex="-1"></div>
<div id="edit-reading" class="modal hide fade" tabindex="-1"></div>
<div id="edit-chemical" class="modal hide fade" tabindex="-1"></div>

<script id="ajax" type="text/javascript">

/* X-Editable */
//turn to inline mode
//$.fn.editable.defaults.mode = 'inline';

$(document).ready(function() {
    $('.edit-setek').editable({
        success: function(response, newValue) {
            if(response.status == 'error') {
                console.log(response); //msg will be shown in editable form)
                return response.msg; //msg will be shown in editable form
                
            }
        }
    });
});
/* End X-Editable */

 var $modal_edit_chemical = $('#edit-chemical');
$(document).on('click','[btn-chemical]', function(e){
     e.preventDefault();
  // create the backdrop and wait for next modal to be triggered
  var id = $(this).attr('btn-chemical');
  $('body').modalmanager('loading');
  
 // setTimeout(function(){
     $modal_edit_chemical.load('<?php echo $this->Html->url(array('controller'=>'activities','action'=>'edit_chemical'));?>/'+id, '', function(){
         $('#ActivityJobId').val(<?php echo $job['Job']['id'];?>);
        $modal_edit_chemical.modal();
    });
  //}, 1000);
});

$modal_edit_chemical.on('click', '#save', function(){
  $modal_edit_chemical.modal('loading');
  //setTimeout(function(){
  
  $.post($("#modal_form").attr('action'),$("#modal_form").serialize(),function(data){
      
      $("[activity-id='"+data.Activity.id+"']").html(data.Activitytype.name);
      $("[activity-desc='"+data.Activity.id+"']").html(data.Activity.desc);

      $modal_edit_activity
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  //}, 1000);
      
  },'json')
    
});

 var $modal_edit_activity = $('#edit-activity');
$(document).on('click','.link-edit-activity', function(e){
     e.preventDefault();
  // create the backdrop and wait for next modal to be triggered
  var id = $(this).attr('activity-id');
  $('body').modalmanager('loading');
  
 // setTimeout(function(){
     $modal_edit_activity.load('<?php echo $this->Html->url(array('controller'=>'activities','action'=>'edit'));?>/'+id, '', function(){
         $('#ActivityJobId').val(<?php echo $job['Job']['id'];?>);
        $modal_edit_activity.modal();
    });
  //}, 1000);
});

$modal_edit_activity.on('click', '#save', function(){
  $modal_edit_activity.modal('loading');
  //setTimeout(function(){
  
  $.post($("#ActivityEditForm").attr('action'),$("#ActivityEditForm").serialize(),function(data){
      
      $("[activity-id='"+data.Activity.id+"']").html(data.Activitytype.name);
      $("[activity-desc='"+data.Activity.id+"']").html(data.Activity.desc);

      $modal_edit_activity
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  //}, 1000);
      
  },'json')
    
});

    var $modal_activity = $('#new-activity');
$('#link-new-activity').on('click', function(e){
     e.preventDefault();
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');
  
 // setTimeout(function(){
     $modal_activity.load('<?php echo $this->Html->url(array('controller'=>'activities','action'=>'add'));?>', '', function(){
         $('#ActivityJobId').val(<?php echo $job['Job']['id'];?>);
        $modal_activity.modal();
    });
  //}, 1000);
});

$modal_activity.on('click', '#save', function(){
  $modal_activity.modal('loading');
  //setTimeout(function(){

  $.post('<?php echo $this->Html->url(array('controller'=>'activities','action'=>'add'));?>',$("#ActivityAddForm").serialize(),function(data){
      
      $('#table-activity').append('<tr>'+
			'<td><a class="link-edit-activity" activity-id="'+data.Activity.id+'" href="#">'+data.Activitytype.name+'</a></td>'+
            '<td width="50%">'+
                '<span class="btn btn-link fileinput-button">'+
                '<i class="icon-file"></i>'+
                   ' <span>Upload Photo...</span>'+
             '<input class="fileupload"  activity-id="'+data.Activity.id+'" type="file" name="upload" data-url="http://aktevsystem.com/pestcontrol_upload/upload.php?model=Activity&foreign_key='+data.Activity.id+'" multiple>'+
             '</span><br><br>'+
            '<div id="progress_'+data.Activity.id+'" class="progress progress-success progress-striped" style="display: none;">'+
                '<div class="bar"></div>'+
            '</div>'+
            '<div class="span6">'+
                '<div class="row-fluid">'+
            '<ul class="thumbnails" id="thumbnails_'+data.Activity.id+'">'+
            '</ul>'+
            '</div></div>'+
        '</td>'+
			'<td activity-desc="'+data.Activity.id+'">'+data.Activity.desc+'</td>'+
		'</tr>');

      $modal_activity
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  //}, 1000);
      
  },'json')
    
});

var $modal_partition = $('#new-partition');
$('#link-new-partition').on('click', function(e){
     e.preventDefault();
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');
  
 // setTimeout(function(){
     $modal_partition.load('<?php echo $this->Html->url(array('controller'=>'partitions','action'=>'add_reading',$job['Project']['id']));?>', '', function(){
         $('#PartitionJobId').val(<?php echo $job['Job']['id'];?>);
        $modal_partition.modal();
    });
  //}, 1000);
});

$modal_partition.on('click', '#save', function(){
  $modal_partition.modal('loading');
  //setTimeout(function(){


  $.post($("#PartitionAddReadingForm").attr('action'),$("#PartitionAddReadingForm").serialize(),function(data){
      
      $('#table-reading').append('<tr>'+
           ' <td><a class="count-pest" reading-id="'+data.Reading.id+'" href="#">'+data.Partition.name+'</a></td>'+
                        '<td id="tan_'+data.Reading.id+'">'+data.Reading.tan_metrik+'</td>'+
                        
                        <?php foreach($pesttypes as $pesttype_id=>$pesttype){?>
                        
                        '<td id="count_'+data.Reading.id+'_<?php echo $pesttype_id;?>"><a href="<?php echo $this->Html->url(array('controller'=>'readings','action'=>'edit'));?>/'+data.Reading.id+'/<?php echo $pesttype_id;?>/<?php echo $job['Job']['id'];?>/<?php echo $job['Job']['project_id'];?>" class="reading-edit"><?php echo (isset($readings_pesttypes[$reading['id']][$pesttype_id])?$readings_pesttypes[$reading['id']][$pesttype_id]['count']:'&nbsp;');?></a></td>'+
                        <?php } ?>
            '</tr>'
        );
        
      $modal_partition
      .modal('loading')
      .find('.modal-body')
        .prepend('');
  //}, 1000);
      
  },'json')
    
});

var $modal = $('#modal-count-pest');

$(document).on('click','.count-pest', function(e){
    e.preventDefault();
  $this=$(this);
  var reading_id = $this.attr('reading-id');
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');
  
 var i = '#tan_'+reading_id;
  $('#ReadingTanMetrik').val($(i).html());
  $('#ReadingId').val(reading_id);
  
  $('#modal-title').html('Partition/Setek : '+$this.html());
  


$('.modal-body-alert').html('');
$modal.modal();

});

$modal.on('click', '#save', function(){
  $modal.modal('loading');
  //setTimeout(function(){

  $.post('<?php echo $this->Html->url(array('controller'=>'Readings','action'=>'add_reading',$job['Job']['id']));?>',$("#ReadingViewForm").serialize(),function(){
      
      var i = '#tan_'+ $('#ReadingId').val();
      $(i).html($('#ReadingTanMetrik').val());
      
      
      
      $modal
      .modal('loading')
      .find('.modal-body-alert')
        .html('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  //}, 1000);
      
  })
    
});

var $modalreading = $('#edit-reading');

$(document).on('click', '.reading-edit',function(e){
    e.preventDefault();
    $this = $(this);
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');

 // setTimeout(function(){
     $modalreading.load($this.attr('href'), '', function(){
      $modalreading.modal();
    });
  //}, 1000);
});

$modalreading.on('click', '#save', function(){
  $modalreading.modal('loading');
  //setTimeout(function(){


  $.post($("#ReadingEditForm").attr('action'),$("#ReadingEditForm").serialize(),function(data){
    var tdSelector = '#count_'+data.ReadingsPesttype.reading_id+'_'+data.ReadingsPesttype.pesttype_id;
    $(tdSelector).children('.reading-edit').html(data.ReadingsPesttype.count);
    $modalreading.modal('loading')
          .find('.modal-body')
            .prepend('<div class="alert alert-info fade in">' +
              'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '</div>');
        //}, 1000);
      
  },'json')
    
});


    $('.btn btn-link').click(function(){
       alert('a');
    });

</script>



<!-- jQuery-File-Upload plugin !-->
<?php echo $this->Html->script('Jquery-fileupload/vendor/jquery.ui.widget')?>
<?php echo $this->Html->script('Jquery-fileupload/jquery.iframe-transport')?>
<?php echo $this->Html->script('Jquery-fileupload/jquery.fileupload')?>

<script>
$(function () {
    $('.fileupload').fileupload({
        dataType: 'json',
        done: function (e, data) {
             // data.context.text('Upload finished.');
           //console.log(data['_response']['result']['url']);
           var photo_url = data['_response']['result'][2]['url'];
           
           // $('#upload-loading').hide();
          // $('#profile-image-src').fadeTo('slow',100);
          $this = $(this);
           $('#thumbnails_'+$this.attr('activity-id')).append('<li style="margin-left: 0px;" class="span4">'+
                        '<a  href="">'+
                       ' <img style="width:150px; height:150px;" src="'+photo_url+'" class="img-polaroid" alt="" />'+
                       ' </a>'+
                ' </li>');
           $('#progress_'+$this.attr('activity-id')).hide();
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            
             $this = $(this);
             $('#progress_'+$this.attr('activity-id')).show();
            $('#progress_'+$this.attr('activity-id')+' .bar').css(
                'width',
                progress + '%'
            );
        }
    });
});
</script>
