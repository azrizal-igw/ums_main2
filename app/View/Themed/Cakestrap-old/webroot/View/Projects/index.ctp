
		<div class="projects index">
		
			<a href='#' id='link-new-project'><i class="icon icon-plus"></i> Create New</a><br /><br />
			<table class="table table-bordered table-striped table-hover" id="table-project">
				<tr>
				    <th colspan="2">Project</th>
				</tr>
				<?php
				foreach ($projects as $project): ?>
            	<tr>
            		<td width="600px">
                        <div class="media">
                            <a class="pull-left" href="">
                            
                            <?php if(isset($project['Source'][0])){?>
                            <img  width="80" height="80"  src="<?php echo $project['Source'][0]['path'];?>" class="img-polaroid" alt="" />
                          
                            <?php } else{ ?>
                            <img  width="80" height="80"  src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />
                            <?php } ?>
                            </a>
                             
                            <div class="media-body">
                                <small>
                                    <h5 class="media-heading"><?php echo h($project['Project']['name']); ?></h5>
                                   
                                    <?php echo htmlspecialchars($project['Project']['address']); ?>&nbsp;<br />
                            		<?php echo h($project['Project']['phone']); ?>&nbsp;<br />
                            		<?php echo h($project['Project']['company_name']); ?>&nbsp;
                                
                                </small>
                            </div>
                        </div>
                    </td>
            		<td >
                        <a class="btn btn-success" href="<?php echo $this->Html->url(array('action' => 'view', $project['Project']['id'])); ?>"><i class="icon-plus icon-white"></i> Jobs..</a>
            			<a class="btn btn-success" href="<?php echo $this->Html->url(array('action' => 'dashboard', $project['Project']['id'])); ?>"><i class="icon-plus icon-white"></i> Report..</a>
            			<a class="btn btn-success" href="<?php echo $this->Html->url(array('action' => 'detail', $project['Project']['id'])); ?>"><i class="icon-plus icon-white"></i> Detail..</a>
                        <a class="btn btn-danger" delete-project="<?php echo $project['Project']['id'];?>" href="<?php echo $this->Html->url(array('action' => 'delete', $project['Project']['id'])); ?>"><i class="icon-plus icon-white"></i> Delete..</a>
              	     </td>
            	</tr>
                <?php endforeach; ?>
			</table>
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<div class="pagination">
				<ul>
					<?php
		echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '', 'currentTag' => 'a', 'tag' => 'li', 'currentClass' => 'disabled'));
		echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	


<div id="new-project" class="modal hide fade" tabindex="-1"></div>
<div id="edit-project" class="modal hide fade" tabindex="-1"></div>

<script id="ajax" type="text/javascript">

var $modal = $('#new-project');

$('#link-new-project').on('click', function(){
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');

 // setTimeout(function(){
     $modal.load('<?php echo $this->Html->url(array('controller'=>'projects','action'=>'add'));?>', '', function(){
      $modal.modal();
    });
  //}, 1000);
});

$modal.on('click', '#save', function(){
  $modal.modal('loading');
  //setTimeout(function(){

  $.post($("#ProjectAddForm").attr('action'),$("#ProjectAddForm").serialize(),function(data){
    
    $('#table-project').append('<tr>'+
            		'<td width="600px">'+
                        '<div class="media">'+
                            '<a class="pull-left" href="">'+
                           ' <img  width="80" height="80"  src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />'+
                            '</a>'+
                            '<div class="media-body">'+
                                '<small>'+
                                    '<h5 class="media-heading">'+data['Project']['name']+'</h5>'+
                                    data['Project']['address']+'&nbsp;<br />'+
                            		data['Project']['phone']+'&nbsp;<br />'+
                            		data['Project']['company_name']+'&nbsp;'+
                                '</small>'+
                            '</div>'+
                       ' </div>'+
                    '</td>'+
            		'<td >'+
                        '<a class="btn btn-success" href="<?php echo $this->Html->url(array('action' => 'view')); ?>/'+data['Project']['id']+'"><i class="icon-plus icon-white"></i> Jobs..</a>'+
            			'<a class="btn btn-success" href="<?php echo $this->Html->url(array('action' => 'detail')); ?>/'+data['Project']['id']+'"><i class="icon-plus icon-white"></i> Detail..</a>'+
                        '<a class="btn btn-danger" delete-project="'+data['Project']['id']+'" href="<?php echo $this->Html->url(array('action' => 'delete')); ?>/'+data['Project']['id']+'"><i class="icon-plus icon-white"></i> Delete..</a>'+
              	    ' </td>'+
               '</tr>');

    $modal.modal('hide');
      

    
    },'json');

});


 var $modal_edit_project = $('#edit-project');
$(document).on('click',"[project-id]", function(e){
     e.preventDefault();
  // create the backdrop and wait for next modal to be triggered
  var id = $(this).attr('project-id');
  $('body').modalmanager('loading');
  
 // setTimeout(function(){
     $modal_edit_project.load('<?php echo $this->Html->url(array('controller'=>'projects','action'=>'edit'));?>/'+id, '', function(){
        $modal_edit_project.modal();
    });
  //}, 1000);
});

$modal_edit_project.on('click', '#save', function(){
  $modal_edit_project.modal('loading');
  //setTimeout(function(){
  
  $.post($("#ProjectEditForm").attr('action'),$("#ProjectEditForm").serialize(),function(data){
      
      $modal_edit_project
      .modal('loading')
      .find('.modal-body')
        .prepend('<div class="alert alert-info fade in">' +
          'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
        '</div>');
  //}, 1000);
      
  })
    
});

//script delete project
$(document).on('click','[delete-project]', function(e){
  e.preventDefault();
  var $this = $(this);
  var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h5 id="dataConfirmLabel">Are you sure to delete this record?</h5></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Yes</a></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$(document).on('click', '#dataConfirmOK', function(){

            $.post(href,{delete:$this.attr('delete-project')},function(data){
                $this.parent().parent().remove();
            })
            $('#dataConfirmModal').modal('hide');
        })
		$('#dataConfirmModal').modal({show:true});
		return false;
})
//end delete project

</script> 