<?php echo $this->Html->script('acc_detail');?>

<script type="text/javascript">
var accTranAdd = '<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'add'));?>';
</script>


<?php
    echo $this->Html->css('new/jquery-ui');
    echo $this->Html->script('new/jquery-ui');
?>



<script>
    // alert(1);
   $(function() {
     $( "#acc_transaction" ).dialog({
            autoOpen: false,
            height: 500,
            width: 700,
            modal: true,
            buttons: {
                New_Record: function() { // Button New Record
                    if (group_id == 2) {
                        alert('You are not allowed to add the entry.');
                    }
                    else {
                        $("#entry_daily_form").html(loadingImage);
                
                        var val = '/'+ $('#daily_transdate').val() +'/'+ $('#daily_drcr').val() ;
                        if($('#daily_acccode_id').val() ){
                            val +='/'+ $('#daily_acccode_id').val()
                        }
                        
                        $("#entry_daily_form").load(accTranAdd + val,
                                    function(response, status, xhr) {
                                      
                                      if (status == "error") {
                                        var msg = "Sorry but there was an error: ";
                                        alert(msg + xhr.status + " " + xhr.statusText);
                                       // parent.$("#entry_daily").bPopup().close();
                                      
                                      } 
                        });
                        
                        //Open Dialog/Popup (New/Edit Account transaction)
                        $( "#entry_daily_form" ).dialog( "open" );
                    }
                },
                Close: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
    
    //Dialog/Popup (New/Edit Account transaction)
     $( "#entry_daily_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {
                    // alert(group_id);

                    if (group_id == 2) {
                        alert('Youre not allowed to edit this entry.');
                    }
                    else {
                        var action = $("#entryForm").attr('action');
                        $("#entryForm").hide();
                        $("#aeLoading").html(loadingImage);
                        

                        $.post(action, $("#entryForm").serialize(),function(data){
                            $("#aeLoading").hide();
                            $("#entryForm").show();
                            if (data.success == 1) {
                           // if($("#entryForm").attr('alt') == 'edit') {
                                
                                //Recalculate daily transaction by calling library acc_detail = app/webroot/js/acc_detail.js
                                $("#acc_transaction").account('daily',{
                                    'sitecode' :sid,
                                    'transdate' : $('#AcctransactionTransdate').val(),
                                    'drcr' : $('#AcctransactionDrcr').val(),
                                    'acccode_id' : $('#AcctransactionParentId').val(),
                                    'sid' : sid,
                                    'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                                    'event' : "#acc_transaction"
                                });

                                //Reload monthly account sheet
                                loadAcc();
                                
                                $("#entry_daily_form").dialog( "close" );

                            }
                            else {
                                alert(data.msg);
                            }                        
                        },'json');
                    }
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
     // account process
     $( "#update_status_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {
                    var action = $("#statusForm").attr('action');
                    
                    $.post(action, $("#statusForm").serialize(),function(){
                        loadAcc();
                        $("#update_status_form").dialog( "close" );
                        
                    },'json');
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });

    //close account modal
     $( "#close_status_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {
                    var action = $("#closeForm").attr('action');
                    
                    $.post(action, $("#closeForm").serialize(),function(){
                        loadAcc();
                        $("#close_status_form").dialog( "close" );
                       
                    },'json');
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });

    //backtoedit account modal  //jam added 05072013
     $( "#edit_status_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {
                    var action = $("#backtoeditForm").attr('action');
                    
                    $.post(action, $("#backtoeditForm").serialize(),function(){
                        loadAcc();
                        $("#edit_status_form").dialog( "close" );
                       
                    },'json');
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });        
         



    $('.detail').live('click',function(){
        
        $('#acc_transaction').html(loadingImage);
        
        var val = $(this).attr('alt');
        val = val.split('/');
        
        $("#acc_transaction").account('daily',{
                'sitecode' :sid,
                'transdate' : val[1],
                'sid' : sid,
                'drcr' : val[2],
                'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                'event' : "#acc_transaction"
        });
        $('#acc_transaction').dialog( "open");
    })
 
    $( ".div-table-col" ).live('click',function() {
            $('#acc_transaction').html(loadingImage);
        
            var val = $(this).attr('alt');
            val = val.split('/');
            
            $("#acc_transaction").account('daily',{
                    'sitecode' : sid,
                    'transdate' : val[1],
                    'drcr' : val[2],
                    'sid' : sid,
                    'acccode_id' : val[3],
                    'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                    'event' : "#acc_transaction"
            });
            $('#acc_transaction').dialog( "open");
    })
         
    $('.delAcctransaction').live('click',function(event){
         event.preventDefault();
            var r=confirm("Are you sure?");
            var val = $(this).attr('alt');
            val = val.split('/');
            var url = "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'deleteJson'));?>/"+val[0];
            
            if (r==true){
                $.post(url,{acctransaction_id : val[0]},function(data){
                    
                    if(data.success == 1){
                        $("#acc_transaction").account('daily',{
                                'sitecode' : data.Acctransaction.sitecode,
                                'transdate' : val[2],
                                'sid' : sid,
                                'acccode_id' : data.Acccode.parent_id,
                                'drcr' : data.Acctransaction.drcr,
                                'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                                'event' : "#acc_transaction"
                        },'json');
                        
                        hashchange = location.hash.substring(1);
                        loadAcc();
                    } else {
                        alert(data.msg);
                    }
                    
                },'json');
            } 
    })
        
    $('.editAcctransaction').live('click',function(event){
         event.preventDefault();
            $( "#entry_daily_form" ).html( loadingImage );
            $( "#entry_daily_form" ).dialog( "open" );
        
            var val = $(this).attr('alt');
            val = val.split('/');
            
            $("#entry_daily_form").load('<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'edit'))?>/'+val[0],
                        function(response, status, xhr) {
                          
                          if (status == "error") {
                            var msg = "Sorry but there was an error: ";
                            alert(msg + xhr.status + " " + xhr.statusText);
                           // parent.$("#entry_daily").bPopup().close();
                          
                          } 
            });
            
    });
    
    
        //click link update status submitted
        $('#update_status').live('click',function(event){
            event.preventDefault();
            
            var accId = $(this).attr('alt');
           // alert(accId);
            
            $("#update_status_form").load('<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'submit'));?>/'+ accId,
                                function(response, status, xhr) {
                                  
                                  if (status == "error") {
                                    var msg = "Sorry but there was an error: ";
                                    alert(msg + xhr.status + " " + xhr.statusText);
                                   // parent.$("#entry_daily").bPopup().close();
                                  
                                  } 
           });
            
           $( "#update_status_form" ).dialog( "open" );
                
        });
    
    //click link close account
    $('#close_status').live('click',function(event){
            event.preventDefault();
            
            $this = $(this);
            
            $("#close_status_form").load('<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'close'));?>/'+ $this.attr('acc_status'),
                                function(response, status, xhr) {
                                  
                                  if (status == "error") {
                                    var msg = "Sorry but there was an error: ";
                                    alert(msg + xhr.status + " " + xhr.statusText);
                                   // parent.$("#entry_daily").bPopup().close();
                                  
                                  } 
           });
            
           $( "#close_status_form" ).dialog( "open" );
                
        });
		
	//click link to go back to editing mode , jam added 05072013
    $('#edit_status').live('click',function(event){
            event.preventDefault();
            
            $this = $(this);
            
            $("#edit_status_form").load('<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'backtoedit'));?>/'+ $this.attr('acc_status'),
                                function(response, status, xhr) {
                                  
                                  if (status == "error") {
                                    var msg = "Sorry but there was an error: ";
                                    alert(msg + xhr.status + " " + xhr.statusText);
                                   // parent.$("#entry_daily").bPopup().close();
                                  
                                  } 
           });
            
           $( "#edit_status_form" ).dialog( "open" );
                
        });
	//finished jam added 05072013
            
 });
        

var url = '<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'json_data'))?>';
var accJson = '<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'accJson'));?>';
var loadingImage = '<p align="center"><?php echo $this->Html->image('loading-icon.gif');?></p>';
var sid = '<?php echo $sid; ?>';
var transmonth = '<?php echo $transmonth; ?>';
var group_id = '<?php echo $group_id; ?>';

var loadAcc = function(){
     
     //if (hashchange[0] == 'accdetail') {
            $("#acc_content").account('monthly',{
                'sitecode' : sid,
                'transmonth' : transmonth,
                'url' : accJson,
                'event' : "#acc_content"
            });
            
    //  } else if (hashchange[0] == 'add_accbalance'){
    //     $('#accTitle').html('Add New Accbalance');
    //     $('#acc_content').load('<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'add'));?>');
        
    //  } else if(hashchange[0] == 'accmonth'){
    //     $('#accTitle').html('Accmonth');
    //     $('#acc_content').load('<?php echo $this->Html->url(array('controller'=>'accmonths','action'=>'view'));?>');
    //  } else {
    //         if (hashchange[0] == 'submitted') {
    //             var acc_status = 2;
    //             $('#accTitle').html('Submitted');
    //         } else if(hashchange[0] == 'editing') {
    //             var acc_status = 1;
    //             $('#accTitle').html('Editing');
    //         } else if(hashchange[0] == 'closed') {
    //             var acc_status = 4;
    //             $('#accTitle').html('Account Details');
    //         }
            
    //         $("#acc_content").account('yearly',{
    //             'accstatus' : acc_status,
    //             'url' : url,
    //             'event' : "#acc_content"
    //         });          
    // }
}
$(document).ready(function() {

    
    $('.view_accdetail').live('click',function(){
        window.location.href = '#'+$(this).attr('alt');
    });

    loadAcc();
})
</script>


<div class="accba tt">

<?php echo $this->html->link('Report',array('controller'=>'accbalances','action'=>'jasper',$sid,$transmonth));?>
    <h2 id="accTitle"></h2>
	<div id="acc_content"></div>
</div>





 <!-- edit image caption pop up -->
<div id="entry_daily_form" style="display: none;" title="New/Edit Account Transaction"></div>
<div id="acc_transaction" title="Account Transaction"></div>
<div id="update_status_form" title="Update Status"></div>
<!-- Jquery UI Modal !-->
<!-- Close Account Modal !-->
<div id="close_status_form" title="Close Account"></div>
<!-- End Close Account Modal -->
<!-- End Jquery UI Modal -->
<!-- Jquery UI Modal !-->
<!-- Edit Account Modal !-->
<div id="edit_status_form" title="Edit Account"></div>
<!-- End Edit Account Modal -->
<!-- End Jquery UI Modal -->
