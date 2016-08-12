
<?php echo $this->Html->css('Jquery-fileupload/jquery.fileupload-ui.css')?>


<!-- Masthead
================================================== -->

  <div class="subnav">
    <ul class="nav nav-pills">
      <li><a href="#Activity">Activity</a></li>
      <li><a href="#Chemical">Chemicals</a></li>
      <li><a href="#Pest">Pests</a></li>
    </ul>
  </div>

<!-- Tables Activity
================================================== -->
<section id="Activity">
  <div class="page-header">
    <h3>Activity</h3>
  </div>
  
  <table class="table table-bordered table-striped ">
    <thead>
      <tr>
        <th colspan="2">Activity</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
      $i =1;
      foreach($activitytypes as $activitytype){ ?>
      <tr>
        <td width="400px"><b><?php echo $activitytype['Activitytype']['name'];?></b>
            <div id="activitytype-chemical">
            
            <?php foreach($activitytype['Chemical'] as $chemical){?>
                <div class="media">
                        <a class="pull-left" href="pest/view/<?php echo $chemical['id'];?>">
                        
                        <?php if(isset($chemical['Source'][0])){?>
                         <img id="img_chemical_<?php echo $chemical['id'];?>"   src="<?php echo $chemical['Source'][0]['path'];?>" class="img-polaroid" alt="" />
                      
                        <?php } else{ ?>
                        <img id="img_chemical_<?php echo $chemical['id'];?>"   src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />
                        <?php } ?>
                        </a>
                         
                        <div class="media-body">
                        <small>
                        <?php echo $chemical['name'];?>
                        : <?php echo $chemical['ChemicalsActivitytype']['quantity'];?>&nbsp;
                        
                        </small></div></div>
                    
                
            <?php } ?>
           
            </div>
            
        </td>
        <td >
        <span class="btn btn-success">
        <i class="icon-plus icon-white"></i>
        <span href="<?php echo $this->Html->url(array('controller'=>'activitytypes','action'=>'edit',$activitytype['Activitytype']['id']));?>" class="add-new">Edit...</span>
        
        </span></td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>
</section>



<!-- Tables Chemical
================================================== -->
<section id="Chemical">
  <div class="page-header">
    <h3>Chemical</h3>
  </div>
  
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th colspan="2">Chemical</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
      $i =1;
      foreach($chemicals as $chemical){ ?>
      <tr>
        <td width="400px">
        <div class="media">
            <a class="pull-left" href="pest/view/<?php echo $chemical['Chemical']['id'];?>">
            
            <?php if(isset($chemical['Source'][0])){?>
             <img id="img_chemical_<?php echo $chemical['Chemical']['id'];?>" width="80" height="80"  src="<?php echo $chemical['Source'][0]['path'];?>" class="img-polaroid" alt="" />
          
            <?php } else{ ?>
            <img id="img_chemical_<?php echo $chemical['Chemical']['id'];?>" width="80" height="80"  src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />
            <?php } ?>
            </a>
             
            <div class="media-body">
            <small>
            <h5 class="media-heading"><?php echo $chemical['Chemical']['name'];?></h5>
            <br />
            
            
            </small></div></div>
        
        </td>
        <td>
        <span class="btn btn-success">
        <i class="icon-plus icon-white"></i>
        <span href="<?php echo $this->Html->url(array('controller'=>'chemicals','action'=>'edit',$chemical['Chemical']['id']));?>" class="add-new">Edit...</span>
        
        </span>
        <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Upload Photo...</span>
        <!-- The file input field used as target for the file upload widget -->
         <input class="fileupload" upload_id="chemical_<?php echo $chemical['Chemical']['id'];?>" type="file" name="upload" data-url="http://aktevsystem.com/pestcontrol_upload/upload.php?model=Chemical&foreign_key=<?php echo $chemical['Chemical']['id'];?>" multiple>
      
    </span><br><br>
    <!-- The global progress bar -->
    <div id="progress_chemical_<?php echo $chemical['Chemical']['id'];?>" class="progress progress-success progress-striped" style="display: none;">
        <div class="bar"></div>
    </div>
        </td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>
    <a href="<?php echo $this->Html->url(array('controller'=>'chemicals','action'=>'add'));?>" class="add-new"><i class="icon icon-plus"></i> Add Chemical</a>
</section>



<!-- Tables Pest
================================================== -->
<section id="Pest">
  <div class="page-header">
    <h3>Pest</h3>
  </div>
  
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Pest</th>
      </tr>
    </thead>
    <tbody>
      
      <?php
      $i =1;
      foreach($pests as $pest){ ?>
      <tr>
        <td width="400px">
        <div class="media">
            <a class="pull-left" href="pest/view/<?php echo $pest['Pest']['id'];?>">
            
            <?php if(isset($pest['Source'][0])){?>
             <img id="img_pest_<?php echo $pest['Pest']['id'];?>" width="80" height="80"  src="<?php echo $pest['Source'][0]['path'];?>" class="img-polaroid" alt="" />
          
            <?php } else{ ?>
            <img id="img_pest_<?php echo $pest['Pest']['id'];?>" width="80" height="80"  src="http://aktevsystem.com/pestcontrol_upload/sources/no_image.jpg" class="img-polaroid" alt="" />
            <?php } ?>
            </a>
             
            <div class="media-body">
            <small>
            <h5 class="media-heading"><?php echo $pest['Pest']['name'];?></h5>
            <br />
            
            
            </small></div></div>
        </td>
        
        <td>
        <span class="btn btn-success">
        <i class="icon-plus icon-white"></i>
        <span href="<?php echo $this->Html->url(array('controller'=>'pests','action'=>'edit',$pest['Pest']['id']));?>" class="add-new">Edit...</span>
        
        </span>
        <!-- The fileinput-button span is used to style the file input field as button -->
    <span class="btn btn-success fileinput-button">
        <i class="icon-plus icon-white"></i>
        <span>Upload Photo...</span>
        <!-- The file input field used as target for the file upload widget -->
         <input class="fileupload" upload_id="pest_<?php echo $pest['Pest']['id'];?>" type="file" name="upload" data-url="http://aktevsystem.com/pestcontrol_upload/upload.php?model=Pest&foreign_key=<?php echo $pest['Pest']['id'];?>" multiple>
      
    </span><br><br>
    <!-- The global progress bar -->
    <div id="progress_pest_<?php echo $pest['Pest']['id'];?>" class="progress progress-success progress-striped" style="display: none;">
        <div class="bar"></div>
    </div>
        </td>
        </td>
      </tr>
      <?php } ?>
     
    </tbody>
  </table>
    <a href="<?php echo $this->Html->url(array('controller'=>'pests','action'=>'add'));?>" class="add-new"><i class="icon icon-plus"></i> Add Pest</a>
</section>

<!-- Bootrap Modal
======================================== -->
<div id="modal-activitytype-chemical" class="modal hide fade" tabindex="-1"></div>



<!-- Script 
========================================= -->
<script id="ajax" type="text/javascript">

var $modal = $('#modal-activitytype-chemical');

$('.add-new').on('click', function(e){
    e.preventDefault();
    $this = $(this);
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');

 // setTimeout(function(){
     $modal.load($this.attr('href'), '', function(){
      $modal.modal();
    });
  //}, 1000);
});

$modal.on('click', '#save', function(){
  $modal.modal('loading');
  //setTimeout(function(){

  $.post($("#modal_form").attr('action'),$("#modal_form").serialize(),function(data){

    $modal.modal('loading')
          .find('.modal-body')
            .prepend('<div class="alert alert-info fade in">' +
              'Updated!<button type="button" class="close" data-dismiss="alert">&times;</button>' +
            '</div>');
        //}, 1000);
      
  })
    
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
           var photo_url = data['_response']['result'][3]['url'];
           
           // $('#upload-loading').hide();
          // $('#profile-image-src').fadeTo('slow',100);
          $this = $(this);
           $('#img_'+$this.attr('upload_id')).attr('src', photo_url);
           $('#progress_'+$this.attr('upload_id')).hide();
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            
             $this = $(this);
             $('#progress_'+$this.attr('upload_id')).show();
            $('#progress_'+$this.attr('upload_id')+' .bar').css(
                'width',
                progress + '%'
            );
        }
    });
});
</script>
