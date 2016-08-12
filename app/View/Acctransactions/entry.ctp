
<script>

var reload;
var edit_permission = false;
function HandlePopupResult(sitecode,transmonth,acccode_id,amount) {
    reload();  
}

$(document).ready(function() {
    
    $(".div-table-col").click(function () {
		
        if(edit_permission) {
        
            var transmonth = $("#listYear").val()+$("#listMonth").val()+$(this).attr("name");
            
            $('#entry_daily').bPopup({
                onOpen: function() { 
                     var url = $('#entry_daily').attr('alt') + '/' + transmonth;
                     
                     $("#entry_daily_form").load(url,
                        function(response, status, xhr) {
                          
                          if (status == "error") {
                            var msg = "Sorry but there was an error: ";
                            alert(msg + xhr.status + " " + xhr.statusText);
                            parent.$("#entry_daily").bPopup().close();
                          
                          } else {
                            $('#entry_daily_loading').hide();
                            $('#entry_daily_form').show();
                          }
                     });
                }
            });
        } else {
            alert('Pemission Denied!');
        }
        
        //alert('ayam');
        

    });
    
    $("#AcctransactionAddForm").live('submit', function() {
        $(this).ajaxSubmit({
            beforeSend: function(){
                //$('#entry_daily_loading').show();
                //$('#entry_daily_form').hide();
                $('#entry_daily_wait').show();
            },
            success:function(){
                //$('#bookReview').html(response);
                reload();
                $('#entry_daily_wait').hide();
                //alert('Data berjaya disimpan..');
                parent.$("#entry_daily").bPopup().close();
            },
            resetForm:true
        });
        return false;
    });
    
     $(".detail").click(function () {
		//$(this).slideUp();
        var transmonth = $("#listYear").val()+$("#listMonth").val()+$(this).attr("name");
		//alert('ayam');
		var url = "<?php echo $this->Html->url(array('action'=>'index'));?>/" + transmonth;
		var windowName = "popUp";//$(this).attr("name");
        var windowSize = "width=800px,height=400px,scrollbars=yes,toolbar=no,location=no,status=no,menubar=no,directories=no";
 
        window.open(url, '_blank', windowSize);
        //alert("result of popup is: " + result);

    });
    
    reload = function(){
        var tmp = '';
        var tmpIncome = '';
        var tmpIncome = '';
        
        var sitecode  = $("#site_list").val();
        var transmonth = $("#listYear").val()+$("#listMonth").val()+'01';
    

       // $("#loading").show();
        datanya = "&sitecode="+sitecode+"&transmonth="+transmonth; 
       
        $.ajax({
            url:"<?php echo $this->Html->url(array('action'=>'accJson'));?>",
            data:datanya,
            type:"POST",
            cache:false,
            success: function(msg){
                var result = JSON.parse(msg);
                
                for (var i = 1, len = 32; i < len; i++) {
                    
                    if ( result[i]) {
                        
                        tmpIncome = '#Ymd_' + i;
                        $(tmpIncome).html(i);
                        
                        <?php foreach ($incomeHeader as $id=>$header) {?>
                            tmpIncome = '#' + i + '_' + <?php echo $id;?>;
                            if (result[i][<?php echo $id;?>]) {
                               // alert(tmpIncome);
                                $(tmpIncome).html(result[i][<?php echo $id;?>].amount);
                            } else {
                                $(tmpIncome).html('&nbsp;');
                            }
                        <?php } ?>
                        
                        <?php foreach ($expenseHeader as $id=>$header) {?>
                            tmpIncome = '#' + i + '_' + <?php echo $id;?>;
                            if (result[i][<?php echo $id;?>]) {
                               // alert(tmpIncome);
                                $(tmpIncome).html(result[i][<?php echo $id;?>].amount);
                            } else {
                                $(tmpIncome).html('&nbsp;');
                            }
                        <?php } ?>
                        
                        tmp = "#masuk"+i;
                        if (result[i].masuk) {
                            // alert(tmpIncome);
                            $(tmp).html(result[i].masuk);
                        } else {
                            $(tmp).html('&nbsp;');
                        }
                        
                        tmp = "#keluar"+i;
                        if (result[i].keluar) {
                            // alert(tmpIncome);
                            $(tmp).html(result[i].keluar);
                        } else {
                            $(tmp).html('&nbsp;');
                        }
                        
                        tmp = "#baki"+i;
                        $(tmp).html(result[i].bakiforward);
                    
                    } else {
                        
                        tmpIncome = '#Ymd_' + i;
                        $(tmpIncome).html('&nbsp;');
                        
                        <?php foreach ($incomeHeader as $id=>$header) {?>
                            tmpIncome = '#' + i + '_' + <?php echo $id;?>;
                            $(tmpIncome).html('&nbsp;');
                        <?php } ?>
                        
                        <?php foreach ($expenseHeader as $id=>$header) {?>
                            tmpIncome = '#' + i + '_' + <?php echo $id;?>;
                            $(tmpIncome).html('&nbsp;');
                        <?php } ?>
                        
                        tmp = "#masuk"+i;
                        $(tmp).html('&nbsp;');
                        
                        
                        tmp = "#keluar"+i;
                        $(tmp).html('&nbsp;');
                        
                        
                        tmp = "#baki"+i;
                        $(tmp).html('&nbsp;');
                    }
                      
                }
                $("#final_baki_forward").html('<strong>'+ result.final_bakiforward +'</strong>');
                $("#final_masuk").html('<strong>'+ result.final_masuk +'</strong>');
                $("#final_keluar").html('<strong>'+ result.final_keluar +'</strong>');
                
                if(result['final_acc']) {
                 <?php foreach ($incomeHeader as $id=>$header) {?>
                            tmpIncome = '#final_acc_' + <?php echo $id;?>;
                            if (result['final_acc'][<?php echo $id;?>]) {
                               // alert(tmpIncome);
                                $(tmpIncome).html('<strong>'+ result['final_acc'][<?php echo $id;?>]+'</strong>');
                            } else {
                                $(tmpIncome).html('&nbsp;');
                            }
                <?php } ?>
                        
                        <?php foreach ($expenseHeader as $id=>$header) {?>
                            tmpIncome = '#final_acc_' + <?php echo $id;?>;
                            if (result['final_acc'][<?php echo $id;?>]) {
                               // alert(tmpIncome);
                                $(tmpIncome).html('<strong>'+ result['final_acc'][<?php echo $id;?>]+'</strong>');
                            } else {
                                $(tmpIncome).html('&nbsp;');
                            }
                        <?php } ?>
                } else {
                     <?php foreach ($incomeHeader as $id=>$header) {?>
                            tmpIncome = '#final_acc_' + <?php echo $id;?>;
                            
                            $(tmpIncome).html('&nbsp;');
                            
                <?php } ?>
                        
                        <?php foreach ($expenseHeader as $id=>$header) {?>
                            tmpIncome = '#final_acc_' + <?php echo $id;?>;
                            
                                $(tmpIncome).html('&nbsp;');
                            
                        <?php } ?>
                }
                
                $("#acc_status").html('Status : ' + result['acc_status']['title'] );
                edit_permission = result['acc_status']['edit_permission'];
                
               // $("#loading").hide();
            }
            
            
       });
    }
    
    
    
    $("#site_list").change(reload);
    $("#listMonth").change(reload);
    $("#listYear").change(reload);
    
    reload();
    
});
</script>
<body><br />


    
        <div class="kiri" align="left"><?php echo $this->Form->input('site',array('id'=>'site_list','label'=>false));?></div>
        <div class="kanan" align="right"><?php echo $this->Form->input('list', array( 'label' => false,
                                           'type'=>'date',
                                           'dateFormat'=> 'MY',
                                           'minYear' => date('Y') - 1,
                                           'maxYear' => date('Y') + 1 ));?></div>
        <div id="loading" style="display: none;" align="left">Loading...</div><br/><br/><br/>
   

<div id="acc_status"></div>
<br/>

<br/>
<table id="account">
    <tr>
        <th colspan="5" class="no_border">&nbsp;</th>
        <th rowspan="34" class="no_border">&nbsp;</th>
        <th colspan="4" class="Tajuk">Pendapatan</th>
        <th rowspan="34" class="no_border">&nbsp;</th>
        <th colspan="5" class="Tajuk">Perbelanjaan</th>
    </tr>
    <tr>
        <th class="Tajuk2">Tarikh</th>
        <th class="Tajuk2">Perkara</th>
        <th class="Tajuk2">Masuk</th>
        <th class="Tajuk2">Keluar</th>
        <th  class="Tajuk2">Baki</th>
      
      	<?php foreach ($incomeHeader as $idHeader => $header) {?>
        <th class="Tajuk2"><?php echo $header;?></th><?php } ?>
    
        <?php foreach ($expenseHeader as $header) {?>
        <th class="Tajuk2"><?php echo $header;?></th><?php } ?>
    </tr>

    <?php $alt = 'class="alt"';?>
    <?php for ($i = 1;$i <= 31; $i++) {?>

	<tr <?php echo $alt = ($alt == 'class="alt"'?'':'class="alt"');?>>
        <td><div id="Ymd_<?php echo $i;?>"></div></td>
        <td>&nbsp;</td>
        <td name="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ;?>/1" class="detail" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#D1D1D1':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
            <div id="masuk<?php echo $i;?>"></div></td>
        <td name="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ;?>/2" class="detail" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#D1D1D1':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
            <div id="keluar<?php echo $i;?>"></div></td>
        <td onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#D1D1D1':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
            <div id="baki<?php echo $i;?>"></div></td>

        <?php foreach ($incomeHeader as $id=>$header) { ?>
        <td name="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ;?>/dr/<?php echo $id ;?>" class="div-table-col" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#D1D1D1':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
			<div id="<?php echo $i.'_'.$id;?>"></div></td>
        <?php } ?>
			
        <?php foreach ($expenseHeader as $id=>$header) {?>
        <td name="<?php echo str_pad($i, 2, "0", STR_PAD_LEFT) ;?>/cr/<?php echo $id ;?>" class="div-table-col" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#D1D1D1':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
			<div id="<?php echo $i.'_'.$id;?>"></div></td>
        <?php } ?>
        
	</tr>
    <?php } ?>
    <tr>
        <td colspan="16" class="no_border">&nbsp;</td>
    </tr>
    <tr>
        <td></td>
        <td><div align="left">JUMLAH</div></td>
        <td id="final_masuk"></td>
        <td id="final_keluar"></td>
        <td class="no_border"></td>
        <td class="no_border"></td>
       	<?php foreach ($incomeHeader as $id=>$header) { 
        	echo '<td id="final_acc_'.$id.'"></td>';} ?>
        <td class="no_border"></td>
        	<?php foreach ($expenseHeader as $id=>$header) { 
        	echo '<td id="final_acc_'.$id.'"></td>';} ?>
    </tr>
    <tr>
        <td class="no_border"></td>
        <td colspan="3" class="no_border"><div align="left">BAKI HANTAR HADAPAN</div></td>
        
        <td id="final_baki_forward"></td>
        <td colspan="<?php echo sizeof($expenseHeader) + sizeof($incomeHeader) + 2;?>" class="no_border"></td>
    </tr>
</table>

<form id="myform" action="..." method="post">
<!-- form fields etc here -->
</form>



 <!-- edit image caption pop up -->
<div id="entry_daily" class="pop_up" alt="<?php echo $this->Html->url(array('controller'=>'acctransactions','action'=>'add'));?>">
    <a class="bClose"><?php echo $this->Html->image('/img/delete.png'); ?></a><br />
    <div id="entry_daily_form" style="display: none;"></div>
    <div id="entry_daily_loading"><?php echo $this->Html->image('loading-icon.gif');?></div>
    <div id="entry_daily_wait" style="display: none;">Please wait..</div>
</div>

</body>



