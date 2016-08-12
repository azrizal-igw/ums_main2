<style type="text/css">
    .div-table{display:table; border:1px solid #003399;}
	.div-table-header{display:table-caption; background:#009999;  height: 20px; }
	.div-table-row{display:table-row;height: 20px; }
    .div-table-caption{display:table-cell; background:#009999; padding: 1px; border: 1px solid #003399;}
	.div-table-caption-perkara{display:table-cell; width: 200px;background:#009999; padding: 1px; border: 1px solid #003399;}
    .div-table-row{display:table-row;height: 20px; }
    .div-table-col{display:table-cell; padding: 2px; width: 70px; height: 20px;border: 1px solid #003399;}
    .div-table-col-perkara{display:table-cell; padding: 2px; width: 70px; height: 20px;border: 1px solid #003399;}
	.pointer{background:#009999;};
</style>

<script src="http://code.jquery.com/jquery-latest.js"></script>



<?php if (1 == 1 ){ ?>
<script>
function HandlePopupResult(sitecode,transdate,acccode_id,amount) {
        //alert("result of popup is: " + sitecode + transdate + acccode_id + amount);
        
        var numberRegex = /^[+-]?\d+(\.\d+)?([eE][+-]?\d+)?$/;
        var baki_forward =0;
        
        <?php foreach ($incomeHeader as $id=>$header) {?>
        var income_<?php echo $id;?> = 0;
        <?php } ?>
        
        <?php foreach ($expenseHeader as $id=>$header) {?>
        var expense_<?php echo $id;?> = 0;
        <?php } ?>
        
        var income_total = 0;
        var expense_total = 0;
                        
        $(document).ready(function() {
            if (amount != 0 ) {
                $("#" + transdate +'_'+ acccode_id).html(amount);
            } else {
                 $("#" + transdate +'_'+ acccode_id).html('&nbsp;');
            }
            
            <?php for ($i = 1;$i <= $numDay; $i++) { ?>
                <?php $ymd = date('Ymd',mktime(0, 0, 0, $month, $i , $year));?>
                //calculate pendapatan
                var amount_masuk = 0;
                var value =0;
              
                var baki_current = 0;
                <?php foreach ($incomeHeader as $id=>$header) {?>
                    value =  parseFloat($("#" + <?php echo $ymd;?> +'_'+ <?php echo $id;?>).html());
        
                    if (numberRegex.test(value)){
                         amount_masuk += value;
                         income_total += value;
                         income_<?php echo $id;?> += value;
                    }
                <?php } ?>
                if (amount_masuk != 0 ) {
                    $("#masuk" + <?php echo $ymd;?> ).html(amount_masuk.toFixed(2));
                }else {
                    $("#masuk" + <?php echo $ymd;?> ).html('&nbsp;');
                }
                
                //calculate perbelanjaan
                
                var amount_keluar = 0;
                var value =0;
                <?php foreach ($expenseHeader as $id=>$header) {?>
                    value =  parseFloat($("#" + <?php echo $ymd;?> +'_'+ <?php echo $id;?>).html());
                    
                    if (numberRegex.test(value)){
                         amount_keluar += value;
                         expense_total += value;
                         expense_<?php echo $id;?> += value;
                    }
                <?php } ?>
                if (amount_keluar != 0 ) {
                    $("#keluar" + <?php echo $ymd;?> ).html(amount_keluar.toFixed(2));
                } else {
                    $("#keluar" + <?php echo $ymd;?> ).html('&nbsp;');
                }
                
                //calculate baki
                baki_current = (amount_masuk) + (amount_keluar ) + (baki_forward);
                $("#baki" + <?php echo $ymd;?> ).html(baki_current.toFixed(2));
                baki_forward = baki_current;
            <?php } ?>
            
            //set total income header
            <?php foreach ($incomeHeader as $id=>$header) {?>
            $("#income_total_<?php echo $id;?>" ).html('<strong>'+ income_<?php echo $id;?> +'</strong>');
            <?php } ?>
            
            //set total expense header
            <?php foreach ($expenseHeader as $id=>$header) {?>
            $("#expense_total_<?php echo $id;?>" ).html('<strong>'+ expense_<?php echo $id;?> +'</strong>');
            <?php } ?>
            
            $("#income_total" ).html('<strong>'+ income_total+'</strong>');
            $("#expense_total" ).html('<strong>'+ expense_total+'</strong>');
             $("#baki_forward" ).html('<strong>'+ baki_forward+'</strong>');
        
        
        });
}
$(document).ready(function() {
    
    $(".div-table-col").click(function () {
		//$(this).slideUp();
		//alert('ayam');
		var url = "http://1mtris.ingeniworks.com.my/ums_main2/acctransactions/add/" + $(this).attr("name");
		var windowName = "popUp";//$(this).attr("name");
        var windowSize = "width=300px,height=400px,scrollbars=yes,toolbar=no,location=no,status=no,menubar=no,directories=no";
 
        window.open(url, '_blank', windowSize);
        //alert("result of popup is: " + result);

    });
    
     $(".detail").click(function () {
		//$(this).slideUp();
		//alert('ayam');
		var url = "http://1mtris.ingeniworks.com.my/ums_main2/acctransactions/index/" + $(this).attr("name");
		var windowName = "popUp";//$(this).attr("name");
        var windowSize = "width=800px,height=400px,scrollbars=yes,toolbar=no,location=no,status=no,menubar=no,directories=no";
 
        window.open(url, '_blank', windowSize);
        //alert("result of popup is: " + result);

    });
    
});
</script>
<?php } ?>
<body>
<br/>
<br/>
<table id="account">
<tr>
  <th colspan="5" class="no_border">&nbsp;</th>
  <th rowspan="<?php echo $numDay + 2;?>" class="no_border">&nbsp;</th>
  <th colspan="4" class="Tajuk">Pendapatan</th>
  <th rowspan="<?php echo $numDay + 2;?>" class="no_border">&nbsp;</th>
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

<?php $totalincomethismonth = 0 ;?>
<?php $totalexpensethismonth = 0 ;?>
<?php $incomeTotal = $incomeHeader;?>
<?php $expenseTotal = $expenseHeader;?>
<?php $balanceincomethismonth = 0 ;?>
<?php $alt = 'class="alt"';?>
<?php for ($i = 1;$i <= $numDay; $i++) {?>
	<?php $ymd = date('Ymd',mktime(0, 0, 0, $month, $i , $year));?>
	<tr <?php echo $alt = ($alt == 'class="alt"'?'':'class="alt"');?>>
	<td><?php echo date('d-M',mktime(0, 0, 0, $month, $i , $year));?></td>
	<td>&nbsp;</td>

	<td name="<?php echo $ymd ;?>/1" class="detail" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#8fc2f5':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
	<div id="masuk<?php echo $ymd;?>"><?php echo (isset($acccodeheaders[$ymd]['masuk']) &&  $acccodeheaders[$ymd]['masuk'] != 0?money_format('%.2n',$acccodeheaders[$ymd]['masuk']):'&nbsp;');?></div></td>

	<td name="<?php echo $ymd ;?>/2" class="detail" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#8fc2f5':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
	<div id="keluar<?php echo $ymd;?>"><?php echo (isset($acccodeheaders[$ymd]['keluar']) && $acccodeheaders[$ymd]['keluar'] != 0?money_format('%.2n',$acccodeheaders[$ymd]['keluar']):'&nbsp;');?></div></td>

	<td onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#8fc2f5':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
	<div id="baki<?php echo $ymd;?>"><?php echo (isset($acccodeheaders[$ymd]['bakiforward'])?money_format('%.2n',$acccodeheaders[$ymd]['bakiforward']):'&nbsp;');?></div></td>


	<?php foreach ($incomeHeader as $id=>$header) { 
	?>
			<td  name="<?php echo $ymd ;?>/dr/<?php echo $id ;?>" class="div-table-col" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#8fc2f5':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
			<div id="<?php echo $ymd.'_'.$id;?>">
				<?php if(isset($acccodeheaders[$ymd][$id])) {
							echo $acccodeheaders[$ymd][$id]['amount'];
							$totalincomethismonth += $acccodeheaders[$ymd][$id]['amount'];
							$incomeTotal[$id] += $acccodeheaders[$ymd][$id]['amount'];
						} else { 
							echo '&nbsp;';
						} ?></div>
			</td><?php } ?>
			
	<?php foreach ($expenseHeader as $id=>$header) {?>
			<td  name="<?php echo $ymd ;?>/cr/<?php echo $id ;?>" class="div-table-col" onmouseout="this.style.background='<?php echo ($alt == 'class="alt"'?'#8fc2f5':'white');?>';" onmouseover="this.style.background='gray';" style="cursor: pointer;" onclick="#">
			<div id="<?php echo $ymd.'_'.$id;?>">
			<?php if(isset($acccodeheaders[$ymd][$id])) {
							echo $acccodeheaders[$ymd][$id]['amount'];
							$totalexpensethismonth += $acccodeheaders[$ymd][$id]['amount'];
							$expenseTotal[$id] += $acccodeheaders[$ymd][$id]['amount'];
						} else { 
							echo '&nbsp;';
						} ?></div>
			
			
							
			
			</td><?php } ?>
	</tr>
<?php } ?>
<tr>
<td colspan="16" class="no_border">&nbsp;</td>
</tr>

<tr>
<td></td>
<td><div align="left">JUMLAH</div></td>
<td id="income_total"><strong><?php echo $totalincomethismonth ;?></strong></td>
<td id="expense_total"><strong><?php echo $totalexpensethismonth ;?></strong></td>
<td class="no_border"></td>
<td class="no_border"></td>
	<?php foreach ($incomeHeader as $id=>$header) { 
	echo '<td id="income_total_'.$id.'"><strong>'.$incomeTotal[$id].'</strong></td>';
			} ?>
<td class="no_border"></td>
	<?php foreach ($expenseHeader as $id=>$header) { 
	echo '<td id="expense_total_'.$id.'"><strong>'.$expenseTotal[$id].'</strong></td>';
			} ?>
</tr>

<tr>
<td class="no_border"></td>
<td colspan="3" class="no_border"><div align="left">BAKI HANTAR HADAPAN</div></td>

<td id="baki_forward"><strong><?php echo ($acccodeheaders[$ymd]['bakiforward']) ;?></strong></td>
<td colspan="<?php echo sizeof($expenseHeader) + sizeof($incomeHeader) + 2;?>" class="no_border"></td>

</tr>

</table>

<form id="myform" action="..." method="post">
<!-- form fields etc here -->
</form>
</body>
