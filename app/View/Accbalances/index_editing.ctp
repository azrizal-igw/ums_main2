<?php echo $this->Html->script('acc_detail');?>



<?php
    echo $this->Html->css('new/jquery-ui');
    echo $this->Html->script('new/jquery-ui');
?>



<script>
   $(function() {
     //Dialog/Popup (New/Edit Account transaction)
     $( "#entry_daily_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {
                    var action = $("#entryForm").attr('action');
                    $("#entryForm").hide();
                    $("#aeLoading").html(loadingImage);    






                    var formData = new FormData($("#entryForm")[0]);
                    $.ajax({   
                        url: action,
                        type: 'POST',
                        data: formData,
                        // dataType: 'JSON',
                        processData: false,
                        contentType: false,
                        success: function(response, status, jqXHR) {  
                            // console.log(response);
                            // alert(response);
                            var obj = JSON.parse(response);

                            // alert(obj.success);
                            if (obj['success'] == 1) {
                                $("#acc_transaction").account('daily',{
                                    'sitecode' : sid,
                                    'transdate' : $('#AcctransactionTransdate').val(),
                                    'drcr' : $('#AcctransactionDrcr').val(),
                                    'acccode_id' : $('#AcctransactionParentId').val(),
                                    'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                                    'event' : "#acc_transaction",
                                });
                                loadAcc();
                                $("#entry_daily_form").dialog( "close" );       
                            }
                            else {
                                alert(obj['msg']);
                                $("#entry_daily_form").dialog( "close" );   
                            }                                 
                        },
                        error: function(e){
                            console.log(e);
                        }                                                    
                    }); 






                    // $.post(action, $("#entryForm").serialize(),function(data){
                    //     $("#aeLoading").hide();
                    //     $("#entryForm").show();
                    //     if(data.success == 1){
                    //         $("#acc_transaction").account('daily',{
                    //             'sitecode' : sid,
                    //             'transdate' : $('#AcctransactionTransdate').val(),
                    //             'drcr' : $('#AcctransactionDrcr').val(),
                    //             'acccode_id' : $('#AcctransactionParentId').val(),
                                
                    //             'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                    //             'event' : "#acc_transaction"
                    //         });
                    //         loadAcc();                            
                    //         $("#entry_daily_form").dialog( "close" );
                    //     }
                    //     else {
                    //         alert(data.msg);
                    //     }                                                
                    // },'json');





                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
     





     //submit account process
     $( "#update_status_form" ).dialog({
            autoOpen: false,
            height: 400,
            width: 500,
            modal: true,
            buttons: {
                Submit: function() {

                    //submit confirmation
                    var r = confirm("Are you sure to submit?");
                    if (r == true) {
                        var action = $("#statusForm").attr('action');
                    
                        $.post(action, $("#statusForm").serialize(),function(){
                            loadAcc();
                            $("#update_status_form").dialog( "close" );

                        },'json');
                    }
                    
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                }
            }
        });
        
     $( "#acc_transaction" ).dialog({
            autoOpen: false,
            height: 500,
            width: 700,
            modal: true,
            buttons: {
                New_Record: function() { // Button New Record
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
                },
                Close: function() { // Button Close Dialog/Popup
                    $( this ).dialog( "close" );
                }
                
            }
        });
 
         




    
    $('.detail').live('click',function(){
        $('#acc_transaction').html(loadingImage);
        var val = $(this).attr('alt');
        // alert(val);
        val = val.split('/');
        $("#acc_transaction").account('daily',{
                'sitecode' : sid,
                'transdate' : val[1],
                'drcr' : val[2],
                'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                'event' : "#acc_transaction"
        });
        $('#acc_transaction').dialog( "open");
    })
 






    // function open modal - after click account sheet cell 
    $( ".div-table-col" ).live('click',function() { // .= class (etc:div-table-col) , #=id (etc:acc_transaction) 
        $('#acc_transaction').html(loadingImage);
        
        var val = $(this).attr('alt');
        // alert(val);
        val = val.split('/');
        
            
        //call library acc_detail = app/webroot/js/acc_detail.js
        $("#acc_transaction").account('daily',{
                    'sitecode' : sid,
                    'transdate' : val[1],
                    'drcr' : val[2],
                    'acccode_id' : val[3],
                    'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                    'event' : "#acc_transaction"
        });
        $('#acc_transaction').dialog( "open");
    });






            
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
                                'sitecode' : sid,
                                'transdate' : val[2],
                                'acccode_id' : data.Acccode.parent_id,
                                'drcr' : data.Acctransaction.drcr,
                                'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                                'event' : "#acc_transaction"
                        },'json');
                        
                        loadAcc();
                    } else {
                        alert(data.msg);
                    }
                    
                },'json');
            } 
        })
        






    $('.delAcctransactionFile').live('click',function(event){
        event.preventDefault();
        var r=confirm("Are you sure want to delete the attachment file?");
        var val = $(this).attr('alt');
        val = val.split('/');
        var url = "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'deleteFile'));?>/"+val[0];
        
        if (r==true){
            $.post(url,{acctransaction_id : val[0]},function(data){                
                if(data.success == 1){
                    $("#acc_transaction").account('daily',{
                            'sitecode' : sid,
                            'transdate' : val[1],
                            'acccode_id' : data.Acccode.parent_id,
                            'drcr' : data.Acctransaction.drcr,
                            'url' : "<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'index'))?>",
                            'event' : "#acc_transaction"
                    },'json');
                    loadAcc();
                } 
                else {
                    alert(data.msg);
                }
                
            },'json');
        } 
    });
        





        //Edit Daily Account
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
        






        //click link update status
        $('#update_status').live('click',function(event){
            event.preventDefault();
            
            var accId = $(this).attr('alt');
            
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
        
        //click link update status
    $('#close_status').live('click',function(event){
        event.preventDefault();
        alert('Permission Denied!');
            
    });
 
        //click link backtoedit status
    $('#edit_status').live('click',function(event){
        event.preventDefault();
        alert('Permission Denied!');
            
    });
    
    });
        
    
var url = '<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'json_data_year'))?>';
var accJson = '<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'accJson'));?>';
var accTranAdd = '<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'add'));?>';
var loadingImage = '<p align="center"><?php echo $this->Html->image('loading-icon.gif');?></p>';
var edit_permission = false;
var sid = '<?php echo $sid;?>';
var transmonth = '<?php echo $transmonth?>'

//call library acc_detail
var loadAcc = function(){
     $('#accTitle').html('Monthly : '+transmonth);
            $("#acc_content").account('monthly',{
                'sitecode' :sid,
                'transmonth' : transmonth,
                'url' : accJson,
                'event' : "#acc_content"
            });
            
}



$(document).ready(function() {
   
    // alert('<?php echo $transmonth; ?>');
    $('.view_accdetail').live('click',function(){
        window.location.href = '#'+$(this).attr('alt');
    });

    loadAcc();
})
</script>

<!--
<div >
    <h2 id="accTitle"></h2>
    <div id="acc_content"></div>
</div>
-->

<div class="">

<?php echo $this->html->link('Report',array('controller'=>'accbalances','action'=>'jasper',$sid,$transmonth));?>
    <h2 id="accTitle"></h2>
    <div id="acc_content"></div>
</div>


 <!-- edit image caption pop up -->
<div id="entry_daily_form" style="display: none;" title="New/Edit Account Transaction"></div>
<div id="acc_transaction" title="Account Transaction"></div>
<div id="update_status_form" title="Update Status"></div>
 
