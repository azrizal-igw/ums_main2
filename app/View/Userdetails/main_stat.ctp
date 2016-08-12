<!--
<style>
	
	</style>
-->
<?php echo "STATISTIK <br>"; ?>
    <table cellpadding="0" cellspacing="0" class="summary">
	<tr bgcolor="#7ae247">
	<td><p align="center"><?php echo "Perkara" ?></p></td>
	<td><p align="center"><?php echo "Bulan" ?></p></td>
	<td><p align="center"><?php echo "Bilangan" ?></p></td>
	</tr>
    <?php foreach($ds as $dsdata) {?>
    <tr bgcolor="#7ae247">
	<!--first column-->
	<td><p align="center">
	<?php 
	echo $dsdata[0]['type']
	?>
	</p></td>
	<td><p align="center"><?php echo $dsdata[0]['ym'] ?>  </p></td> 
	<!--third column-->
	<td><p align="center"><?php echo $dsdata[0]['cnt'] ?>  </p></td>          
                              
	</tr>
	    <?php } ?>  
	</table>

	
	<?php

foreach ($ds as $dsdata)
{
    if ($dsdata[0]['type'] == 'visitor')
	echo "Jumlah pelawat bulan ini : ".$dsdata[0]['cnt']."<br>";
	
	if ($dsdata[0]['type'] == 'member')
	echo "Bilangan ahli bulan ini : ".$dsdata[0]['cnt']."<br>";

	if ($dsdata[0]['type'] == 'totalmember')
	echo "Jumlah keseluruhan ahli : ".$dsdata[0]['cnt']."<br>";
	
	if ($dsdata[0]['type'] == 'browsing')
	echo "Jumlah penggunaan bulan ini : ".$dsdata[0]['cnt']."<br>";
	
	if ($dsdata[0]['type'] == 'trainee')
	echo "Jumlah pengguna dilatih bulan ini : ".$dsdata[0]['cnt']."<br>";
}
?>
