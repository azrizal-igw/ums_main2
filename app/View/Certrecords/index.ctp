<div class="certrecords">
<?php echo $this->Form->create('Certrecord');?>
<?php
  // if (in_array($this->Session->read('Auth.User.group_id'), array(4,7))) {
  //   $data_type = array(0 => 'Participant');
  //   // $data_type = array(0 => 'Participant', 1 => 'Trainer');        
  // }
  // else {
  //   $data_type = array(0 => 'Participant', 1 => 'Trainer');    
  // }
?>





<?php 
// generate cert only for manager
if ($this->Session->read('Auth.User.group_id') == 4) {
   ?>
   <h2><?php echo __('Proses Certificate');?></h2>
   <?php 
      // echo $this->Form->input('type_gen', array('id' => 'type_gen', 'options' => $data_type, 'empty' => '- Select -', 'label' => false)); 
   ?>
   <table style="width:auto">
   <tr>
   <td><?php echo $this->Form->submit('Submit', array('label' => false, 'id' => 'generate-cert', 'type' => 'button')); ?></td>
   </tr>
   </table>
   <p id="status-data"></p>
   <br>
   <hr>
   <br>
   <?php
   }
?>






<h2><?php echo __('Search Cert'); ?></h2>
<?php
  // echo $this->Form->input('type_list', array('id' => 'type_list', 'options' => $data_type, 'empty' => '- Type -', 'label' => 'Type'));
  echo $this->Form->input('course_id',array('options' => $courses, 'empty' => '- Select -'));
  // echo $this->Form->input('sitecode', array(
  //   'options' => $sites, 
  //   'empty' => '- Select -',
  // ));
  echo $this->Form->input('month', array(
      'type' => 'date',
      'dateFormat' => 'M',
      'label' => 'Month',
      'empty' => '- Select -',
      'default' => date('M')            
  ));
  echo $this->Form->input('year', array(
      'type' => 'date',
      'dateFormat' => 'Y',
      'minYear' => date('Y') - 2,
      'maxYear' => date('Y') + 1,
      'label' => 'Year',
      'empty' => '- Select -',
      'default' => date('Y')
  ));    
  echo $this->Form->input('icno_name',array('label'=>'IC No. / Name'));
?>
<table style="width:auto">
<tr>
<td>
<?php echo $this->Form->submit('Search', array('name' => 'data[Certrecord][search]')); ?>
</td>
<td>
<?php echo $this->Form->submit('Reset', array('name' => 'data[Certrecord][reset]')); ?>
</td>
</tr>
</table>
<br>







<!-- <h2>
<?php 
  echo __('Lists of Certificates'); 
  if ($type == 0) {
    $label = 'Participant';
    echo ' Participant';      
  }
  else if ($type == 1) {
    $label = 'Trainer';
    echo ' Trainer';
  }
  else {
    $label = '';
    echo ' All';
  }
?>
</h2> -->





<table>
   <tr>
      <th>No</th>
      <th>Type</th>
      <th style="text-align: left;">IC No. /<br>Name</th>
      <th>Cert Number</th>
      <th>Location</th>
      <th>Course</th>
      <th>Date of Certificate</th>
      <th>Paid<br>Amount</th>
      <th>Paid<br>Date</th>
      <th>Printed?</th>
      <th>Print<br>Date</th>
      <th class="actions">Paid?
      <?php 
      // only manager or regional manager can see tick all paid
      if (in_array($this->Session->read('Auth.User.group_id'), array(4,7))):
      ?>
      <br><input type="checkbox" id="chk-all-paid">
      <?php 
      endif;
      ?>
      </th>
      <th>PDF<br><input type="checkbox" id="chk-all"></th>
   </tr>



   <?php
   if (!empty($certrecords)) {
      $i = $this->Paginator->counter(array('format' => '%start%')) - 1;
      foreach ($certrecords as $cert) {
         $i++;
         ?>
         <tr>
            <td><?php echo $i; ?><?php echo $this->Form->hidden('trainee_id', array('value' => $cert['Certrecord']['trainee_id'])); ?></td>
            <td><?php echo 'Participant'; ?></td>
            <td style="text-align: left;"><?php echo $cert['Userdetail']['icno']; ?> /<br><?php echo $cert['Userdetail']['name']; ?></td>
            <td><?php echo $cert['Certrecord']['certnumber']; ?></td>
            <td><?php echo $cert['Certrecord']['location_id']; ?></td>
            <td>
            <?php
               if (!empty($cert['Training']['id'])) {
                  echo $cert['Training']['id'];  
               } 
               if (!empty($cert['Course']['name'])) {
                  echo $cert['Course']['name'];  
               }
            ?></td>
            <td><?php echo $cert['Certrecord']['certdate']; ?></td>
            <td><?php echo $cert['Certrecord']['status_paid']; ?>
            </td>
            <td><?php echo $cert['Certrecord']['paid_date']; ?>
            </td>
            <td>
            <?php 
               if ($cert['Certrecord']['status_print'] == 1) {
                  echo 'Yes';
               }
               else {
                  echo 'No';
               }
            ?>            
            </td>
            <td><?php echo $cert['Certrecord']['print_date']; ?>            
            </td>
            <?php 
            // check which group can paid the cert
            if (in_array($this->Session->read('Auth.User.group_id'), array(2,4,7))) { // admin project/manager/regional manager
               // check if cert already paid or not
               if ($cert['Certrecord']['status_paid'] == '0.00' && $cert['Certrecord']['paid_date'] == '0000-00-00 00:00:00') {
                  ?>
                  <td><input type="checkbox" class="check-payment" id="check-payment" value="<?php echo $cert['Certrecord']['id']; ?>" /></td>
                  <?php
               }
               else {
                  ?>
                  <td>&nbsp;</td>
                  <?php
               }                  
            }
            else if ($this->Session->read('Auth.User.group_id') == 1) { // admin
               ?>
               <td class="actions">
               <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $cert['Certrecord']['id'])); ?>            
               </td>
               <?php
            }
            ?>
            <td>
            <?php
            // admin porject/regional manager can download/print the cert
            if (in_array($this->Session->read('Auth.User.group_id'), array(1,2,7)) && $cert['Certrecord']['status_paid'] == '5.00' && $cert['Certrecord']['paid_date'] != '0000-00-00 00:00:00') {
               ?>            
               <input type="checkbox" class="check-print" id="check-print" alt="<?php echo $cert['Certrecord']['status_print']; ?>" value="<?php echo $cert['Certrecord']['id']; ?>" />
               <?php
            }
            ?>
            </td>
         </tr>
      <?php
      }
   }
   else {
      echo "<tr><td colspan='13'>No record</td></tr>";
   }
  ?>






   <?php 
   if ($status == 1) {
      ?>
      <tr>
         <td colspan="13" style="padding: 15px;">
         <table style="width:auto; float: right;">
            <tr>
               <?php 
                  if ($this->Session->read('Auth.User.group_id') != 7) { // not show if the group level is region manager               
                     ?>
                     <td>
                     <?php 
                        echo $this->Form->submit('Pay', array('name' => 'data[Certrecord][pay]', 'id' => 'update-paid', 'type' => 'button'));                  
                     ?>
                     </td>
                     <?php
                  }
               ?>
               <?php 
                  if ($this->Session->read('Auth.User.group_id') == 7) { // region manager can print / download the cert
                     echo '<td>';                     
                     echo $this->Form->submit('Download & Print', array('name' => 'data[Certrecord][print]', 'id' => 'update-print', 'type' => 'button')); 
                     echo '</td>';                     
                  }
               ?>
            </tr>
            <div id="status-paid" style="text-align: right;"></div>
         </table>
         </td>
      </tr>  
      <?php
   }
   ?>
  </table>







  <div id="status-select"></div>
  <p>
  <?php
     echo $this->Paginator->counter(array(
     'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
     ));
  ?>  
  </p>
  <div class="paging">
    <?php
      echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
      echo $this->Paginator->numbers(array('separator' => ''));
      echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
    ?>
  </div>
  <?php echo $this->Form->end(); ?>
  </div>
  <div id="selected-paid"></div>
  <div id="selected-print"></div>
  <div id="status-data"></div>








  <script type="text/javascript">
  $(document).on('click','#chk-all',function(){
      if($(this).is(':checked')) {
          $('.check-print').prop('checked', true);                            
      } 
      else {
          $('.check-print').prop('checked', false);                  
      }       
  });



  $(document).on('click','#chk-all-paid',function(){
      if($(this).is(':checked')) {
          $('.check-payment').prop('checked', true);                            
      } 
      else {
          $('.check-payment').prop('checked', false);                  
      }       
  });




  $(document).ready(function() {
  // generate cert
  $('#generate-cert').click(function() {
      // if ($('#type_gen').val().length != 0) {
      // alert($('#type_gen').attr('value'));
      var answer = confirm('Are you sure want to generate the cert?');
      if (answer == true) {
        $('#status-data').html('Data is loading... Please wait...');
        $.ajax({
          url: cms_web.v1.base_url + 'certrecords/generatecert',
          type: 'POST',
          data: {type: 0},
          success: function() {  
          },
          complete: function(response, textStatus, jqXHR) {   
            // console.log(response);  
            var obj = jQuery.parseJSON(response.responseText); 
            $('#status-data').html(obj['msg']['message']);                 
          },
          error: function(e) {
            console.log(e);
          }
        });		
      }
      else {
        return false;
      }
    // }
    // else {
    //   alert('Please select Type.');
    //   return false;
    // }
  });






  // update payment for the selected cert
  $('#update-paid').click(function() {
    var paid_id = '';
    $('.check-payment').each(function() {
      if ($(this).is(':checked')) {
        paid_id += $(this).attr('value') + '_'; 
      }     
    });  
    paid_id = paid_id.slice(0,-1); 
    if (paid_id != '') {
      var answer = confirm('Are you sure want to pay of the selected record?');
      if (answer == true) {
        $.ajax({
          url: cms_web.v1.base_url + 'certrecords/paid_cert',
          type: 'POST',
          data: {id: paid_id},
          success: function() {  
          },
          complete: function(response, textStatus, jqXHR) {   
            // var obj = jQuery.parseJSON(response.responseText); 
            window.location.href = cms_web.v1.base_url + 'certrecords';
            // $('#status-paid').html(obj['msg']['message']);   
            // $('.check-payment').each(function() {
            //   if ($(this).is(':checked')) {
            //     $(this).hide();
            //   }     
            // });                           
          },
          error: function(e) {
            console.log(e);
          }
        });
      }
      else {
        return false;
      }  
    }
    else {
      alert('No record is selected.');
      return false;
    }
  });





  // download the selected cert to pdf 
  $('#update-print').click(function() {
    var print_id = '';
    $('.check-print').each(function() {
      if ($(this).is(':checked')) {
        print_id += $(this).attr('value') + '_';
      }     
    });  
    print_id = print_id.slice(0,-1); 

    alert(print_id);

    if (print_id != '') {
      var answer = confirm('Are you sure want to print the cert record?');
      if (answer == true) {
        window.location.href = cms_web.v1.base_url + 'certrecords/print_cert/' + print_id;
        // $.ajax({                
        //     url: cms_web.v1.base_url + 'certrecords/print_cert/' + print_id,
        //     type: 'GET',
        //     cache: false,
        //     success: function(response, status, jqXHR){  
        //         if (response['event']['status'] == 0) {
        //             $('#error').html(response['event']['msg']);                 
        //         }
        //         else {
        //             alert(response['event']['msg']);
        //             $('#import-modal').modal('hide');
        //         } 
        //     },
        //     error: function(e){
        //         console.log(e);
        //     }                                                    
        // }); 
      }
      else {
        return false;
      }  
    }
    else {
      alert('No record is selected.');
      return false;
    }
  }); 





})
</script>



