
		
<?php echo $this->Html->css('Jquery-fileupload/jquery.fileupload-ui.css')?>	
<div class="projects view">

		<div class="media">
            <a class="pull-left" href="">
                            
            <?php if(isset($project['Source'][0])){?>
            <img  id="img"   src="<?php echo $project['Source'][0]['path'];?>" class="img-polaroid" alt="" />
                          
            <?php } else{ ?>
            <img  id="img"   src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />
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
		</div><!-- .view -->
        <!-- Upload Photo -->
        <span class="btn btn-link fileinput-button">
            <i class="icon-plus"></i>
            <span>Upload Photo...</span>
            <!-- The file input field used as target for the file upload widget -->
             <input class="fileupload"  type="file" name="upload" data-url="http://aktevsystem.com/pestcontrol_upload/upload.php?model=Project&foreign_key=<?php echo $project['Project']['id'];?>" multiple>
          
        </span><br><br>
        <!-- The global progress bar -->
        <div class="progress" class="progress progress-success progress-striped" style="display: none;">
            <div class="bar"></div>
        </div>
        <!-- End Upload Photo !-->
		
				
<div class="related">

    <h5><u><?php echo __('Related Partition/Setek'); ?></u></h5>
    <div id="contentLocation">			
        <table id="partition_table"  class="table table-bordered table-striped table-hover">
                <tr>
                    <th>Name</th>
                    <th>Tan Metrik</th>
                    <th>Action</th>
                </tr>
                <?php
                $i = 0;
                foreach ($project['Partition'] as $partition): ?>
                <tr tr-partition="<?php echo $partition['id'];?>">
                    <td><?php echo h($partition['name'])?></td>
                    <td><?php echo h($partition['tan_metrik'])?></td>
                    <td>
                        <a class="btn btn-success" edit-partition="<?php echo $partition['id'];?>" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'edit', $partition['id'])); ?>"><i class="icon-plus icon-white"></i> Edit..</a>
            			<a class="btn btn-danger" delete-partition="<?php echo $partition['id'];?>" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'delete', $partition['id'])); ?>"><i class="icon-plus icon-white"></i> Delete..</a>
              	    </td>
                </tr>
                <?php endforeach; ?>
                </table>
            
        
  
    </div>

        <?php echo $this->Html->link('<i class="icon-plus"></i> '.__('New Location'), array('controller' => 'partitions', 'action' => 'add',$project['Project']['id']), array('id'=>'link-new-partition','escape' => false)); ?>	<!-- .actions -->
			
</div><!-- .related -->
<br />
					
			<div class="related">

				<h5><u><?php echo __('Related Users'); ?></u></h5>
				
				<?php if (!empty($project['User'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Group Id'); ?></th>
		<th><?php echo __('Project Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($project['User'] as $user): ?>
		<tr>
			<td><?php echo $user['id']; ?></td>
			<td><?php echo $user['group_id']; ?></td>
			<td><?php echo $user['project_id']; ?></td>
			<td><?php echo $user['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'users', 'action' => 'view', $user['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'users', 'action' => 'edit', $user['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'users', 'action' => 'delete', $user['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $user['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus"></i> '.__('New User'), array('controller' => 'users', 'action' => 'add'), array( 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			

<div id="modal-edit-partition" class="modal hide fade" tabindex="-1"></div>
<div id="modal-new-partition" class="modal hide fade" tabindex="-1"></div>
<script id="ajax" type="text/javascript">

//Modal edit partition  
var $modaleditpartition = $('#modal-edit-partition');

$(document).on('click','[edit-partition]', function(e){
  // create the backdrop and wait for next modal to be triggered
  e.preventDefault();
  $('body').modalmanager('loading');
  $this = $(this);

 // setTimeout(function(){
     $modaleditpartition.load($this.attr('href'), '', function(){
        //$('#LocationProjectId').val(< ?php echo $project['Project']['id'] ;?>);
        $modaleditpartition.modal();
    });
  //}, 1000);
});

$modaleditpartition.on('click', '#save', function(){
  $modaleditpartition.modal('loading');
  //setTimeout(function(){

  $.post($('#PartitionEditForm').attr('action'),$("#PartitionEditForm").serialize(),function(data){
        $('[tr-partition="'+data['Partition']['id']+'"]').html( 
                    '<td>'+data['Partition']['name']+'</td>'+
                    '<td>'+data['Partition']['tan_metrik']+'</td>'+
                    '<td>'+
                        '<a class="btn btn-success" edit-partition="'+data['Partition']['id']+'" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'edit')); ?>/'+data['Partition']['id']+'"><i class="icon-plus icon-white"></i> Edit..</a>'+
            			'<a class="btn btn-danger" delete-partition="'+data['Partition']['id']+'" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'delete')); ?>/'+data['Partition']['id']+'"><i class="icon-plus icon-white"></i> Delete..</a>'+
              	    '</td>'
               );
               
      $modaleditpartition.modal('hide');
      
  //}, 1000);
      
  },'json')
});

//end modal edit partition


//modal add partition
var $modalpartition = $('#modal-new-partition');

$(document).on('click','#link-new-partition', function(e){
  // create the backdrop and wait for next modal to be triggered
  e.preventDefault();
  $('body').modalmanager('loading');
  $this = $(this);

 // setTimeout(function(){
     $modalpartition.load($this.attr('href'), '', function(){
        //$('#LocationProjectId').val(< ?php echo $project['Project']['id'] ;?>);
        $modalpartition.modal();
    });
  //}, 1000);
});

$modalpartition.on('click', '#save', function(){
  $modalpartition.modal('loading');
  //setTimeout(function(){

  $.post($('#PartitionAddForm').attr('action'),$("#PartitionAddForm").serialize(),function(data){
        $('#partition_table').append( ' <tr>'+
                    '<td>'+data['Partition']['name']+'</td>'+
                    '<td>'+data['Partition']['tan_metrik']+'</td>'+
                    '<td>'+
                        '<a class="btn btn-success" edit-partition="'+data['Partition']['id']+'" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'edit')); ?>/'+data['Partition']['id']+'"><i class="icon-plus icon-white"></i> Edit..</a>'+
            			'<a class="btn btn-danger" delete-partition="'+data['Partition']['id']+'" href="<?php echo $this->Html->url(array('controller'=>'partitions','action' => 'delete')); ?>/'+data['Partition']['id']+'"><i class="icon-plus icon-white"></i> Delete..</a>'+
              	    '</td>'+
               ' </tr>');
               
      $modalpartition.modal('hide');
      
  //}, 1000);
      
  },'json')
});
//end modal add partition


//script delete partition
$(document).on('click','[delete-partition]', function(e){
  e.preventDefault();
  var $this = $(this);
  var href = $(this).attr('href');
		if (!$('#dataConfirmModal').length) {
			$('body').append('<div id="dataConfirmModal" class="modal" role="dialog" aria-labelledby="dataConfirmLabel" aria-hidden="true"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h5 id="dataConfirmLabel">Are you sure to delete this record?</h5></div><div class="modal-body"></div><div class="modal-footer"><button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button><a class="btn btn-danger" id="dataConfirmOK">Yes</a></div></div>');
		} 
		$('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
		$(document).on('click', '#dataConfirmOK', function(){

            $.post(href,{delete:$this.attr('delete-partition')},function(data){
                $this.parent().parent().remove();
            })
            $('#dataConfirmModal').modal('hide');
        })
		$('#dataConfirmModal').modal({show:true});
		return false;
})
//end delete partition
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
           $('#img').attr('src', photo_url);
            $this.siblings('#progress').hide();
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            
             $this = $(this);
             $this.siblings('#progress').show();
            $this.siblings('#progress .bar').css(
                'width',
                progress + '%'
            );
        }
    });
});
</script>
