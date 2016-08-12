    <div class="projects index">
    <div class="media">
        <a class="pull-left" href="">
            <?php if(isset($project['Source'][0])){?>
                <img    width="32" height="32" src="<?php echo $project['Source'][0]['path'];?>" class="img-rounded" alt="" />
                              
            <?php } else{ ?>
                <img    width="32" height="32"  src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-rounded" alt="" />
            <?php } ?>
        </a>
                             
        <div class="media-body">
            <h5 class="media-heading"><?php echo h($project['Project']['name']); ?></h5>
            
        </div>
    </div>
 <!-- .table table-striped table-bordered -->
		<!--	
    <br />
    <a id="link-new-job"  href="#"><i class="icon icon-plus"></i> New Job</a>
    <br /><br />!-->
    <hr />
    <?php
    //Form year month selection
    echo $this->Form->create('Project',array('action'=>'json_list_job'));
    echo $this->Form->input('project_id',array('type'=>'hidden','default'=>$project['Project']['id']));
    echo $this->Form->input('month_job', array(
        'label' => 'Monthly Job',
        'dateFormat' => 'MY',
        'minYear' => date('Y') - 2 ,
        'maxYear' => date('Y') ,
        'type'=>'date',
        'label'=>false
    ));
    echo $this->Form->end();
    ?>
    <a href='<?php echo $this->Html->url(array('controller'=>'jobs','action'=>'add',$project['Project']['id']));?>' id='link-new-job'><i class="icon icon-plus"></i> Create New</a><br /><br />
    <br /><div id="jobCalendar" ></div>

        
                              
<div id="new-job" class="modal hide fade" tabindex="-1"></div>
<div id="edit-job" class="modal hide fade" tabindex="-1"></div>

</div>
<script id="ajax" type="text/javascript">
//add new job
var $modal = $('#new-job');

$(document).on('click', '#link-new-job',function(e){
    e.preventDefault();
    // create the backdrop and wait for next modal to be triggered
    $('body').modalmanager('loading');
    var $this = $(this);
    
    $modal.load($this.attr('href'), '', function(){
        var sel_date = '01-'+$('#ProjectMonthJobMonth').val()+'-'+$('#ProjectMonthJobYear').val();
        //alert(sel_date);
        $('#JobDate').attr('value',sel_date);
        $('#dp3').attr('data-date',sel_date);
        $modal.modal();
    });
});

$modal.on('click', '#save', function(){
  $modal.modal('loading');
  //setTimeout(function(){

  $.post($("#JobAddForm").attr('action'),$("#JobAddForm").serialize(),function(data){

   
    //showCalendar();
     $modal.modal('loading')
          .find('.modal-body')
            .prepend('<div class="alert alert-info fade in">' +
              'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '</div>');
        //}, 1000);
      load_job();
  },'json')
    
});
//end add new job

//edit job
var $edit_modal = $('#edit-job');

$(document).on('click', '[edit-job]',function(e){
    e.preventDefault();
    // create the backdrop and wait for next modal to be triggered
    $('body').modalmanager('loading');
    var $this = $(this);
    
    $edit_modal.load($this.attr('href'), '', function(){
        //var sel_date = '01-'+$('#ProjectMonthJobMonth').val()+'-'+$('#ProjectMonthJobYear').val();
        //alert(sel_date);
        //$('#JobDate').attr('value',sel_date);
        //$('#dp3').attr('data-date',sel_date);
        $edit_modal.modal();
    });
});

$edit_modal.on('click', '#save', function(){
  $edit_modal.modal('loading');
  //setTimeout(function(){

  $.post($("#JobEditForm").attr('action'),$("#JobEditForm").serialize(),function(data){

   
    //showCalendar();
     $edit_modal.modal('loading')
          .find('.modal-body')
            .prepend('<div class="alert alert-info fade in">' +
              'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '</div>');
        //}, 1000);
      load_job();
  })
    
});
//edit job

//function to load table job
var load_job = function(){
    //alert('ay');
    var str = '';
    $.post($('#ProjectJsonListJobForm').attr('action'),$('#ProjectJsonListJobForm').serialize(),function(data){
        
       //Check size of record job
       if(data.length > 0 ) {
        
           //if job data more than 0 = generate table
           str += '<table id="table-project" class="table table-bordered table-striped table-hover">';
           str += '<tbody>';
           str += '<tr>';
                str += '<td>Day</td>';
                str += '<td>Date</td>';
                str += '<td>Pest Count</td>';
                str += '<td>Action</td>';
                str += '</tr>';
           $.each(data,function(i,n){
                str += '<tr>';
                str += '<td>'+ n.Job.day +'</td>';
                str += '<td>'+ n.Job.date +'</td>';
                str += '<td>'+ n.Job.pestcount +'</td>';
                str +='<td >';
                str +='<a class="btn btn-success" href="<?php echo $this->Html->url(array('controller'=>'jobs','action' => 'view')); ?>/'+ n.Job.id +'"><i class="icon-plus icon-white"></i> View..</a>&nbsp;';
                str +='<a class="btn btn-success" edit-job="" href="<?php echo $this->Html->url(array('controller'=>'jobs','action' => 'edit')); ?>/'+n.Job.id+'"><i class="icon-plus icon-white"></i> Edit..</a>&nbsp;';
                str +='<a class="btn btn-danger" delete-job="'+n.Job.id+'" href="<?php echo $this->Html->url(array('controller'=>'jobs','action' => 'delete')); ?>/'+n.Job.id+'"><i class="icon-plus icon-white"></i> Delete..</a>';
                str +='</td>';
                str += '</tr>';
           })
           str += '</tbody></table>';  
           //end generate table
       } else {
           //if job data equal 0 (dispaly message : No record Found)
           str = '<font color="red">No record found on '+ $('#ProjectMonthJobMonth :selected').text() + '&nbsp;'+ $('#ProjectMonthJobYear :selected').text() +'</font>'
           //end no record found
       }
       //end size of record job
       
       
       
       //load table
       $('#jobCalendar').html(str); 
    },'json');
}

$(document).ready(function(){
    //call function load_jon after page load
    load_job();
    
    //on change dropdown  Month
    $('#ProjectMonthJobMonth').change(function(){
        load_job();
    })
    
    //on change dropdown  Year
    $('#ProjectMonthJobYear').change(function(){
        load_job();
    })
})


//script delete job
$(document).on('click','[delete-job]', function(e){
  e.preventDefault();
  var $this = $(this);
  var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h5 id="dataConfirmLabel">Are you sure to delete this record?</h5></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Yes</a></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$(document).on('click', '#dataConfirmOK', function(){

            $.post(href,{delete:$this.attr('delete-job')},function(data){
                $this.parent().parent().remove();
            })
            $('#dataConfirmModal').modal('hide');
        })
		$('#dataConfirmModal').modal({show:true});
		return false;
})
//end delete job
</script> 

<?php echo $this->Html->script('bootstrap-datepicker');?>
<?php echo $this->Html->css('datepicker');?>

 