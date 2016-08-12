<?php $baki=0;
//pr($acctransactions);

?>

<div>
<h2><?php echo __('Detail By Day');?></h2>

<table>
	<?php echo $this->Form->create('Acctransaction');?>
	<tr><th>Hari<?php echo $this->Form->day('created',array('value'=>$hari));?></th>
	<th>Bulan<?php echo $this->Form->month('mob',array('value'=>$bulan));?></th>
	<th>Tahun<?php echo $this->Form->year('Year',2010,2020,array('value'=>$tahun));?></th>
	<th><?php echo $this->Form->end(__('Submit'));
	echo $this->Form->end();?></th></tr>
</table>



<table border="1">
	<tr>
		<th colspan="4" align="center">Akaun</th>
		<th colspan="10">Pendapatan</th><th colspan="10"><font color="red">Perbelanjaan</font></th>
	</tr>


	<th><?php echo "Tarikh"; ?></th>
	<th><?php echo "Masuk   "; ?></th>
	<th><font color="red"><?php echo "Keluar  "; ?></font></th>
	<th><?php echo "Baki"; ?></th>
	
		
	<?php foreach ($headers as $header): ?>
		<th><?php echo h($header); ?></th>
	<?php endforeach;?>
		
	<?php foreach ($headers as $header): ?>
		<th><font color="red"><?php echo h($header); ?></font></th>
	<?php endforeach;?>
		
	<?php foreach ($acctransactions as $acctransaction): ?>
		<tr>
			<td><?php  
		              $trandate=$acctransaction['Acctransaction']['transdate'];
	                	$trandate=substr($trandate, 6, 2)."/".substr($trandate, 4, 2)."/".substr($trandate, 0,4);
                     
	                	echo $trandate;			?>
			</td>
			
			<td><?php if ($acctransaction['Acctransaction']['drcr']=='dr'){
						echo "RM".$acctransaction['Acctransaction']['amount'];
						$baki=$baki+$acctransaction['Acctransaction']['amount'];
						}    ?>
						 

			</td>
			
			<td><font color='red'><?php if ($acctransaction['Acctransaction']['drcr']=='cr'){
										echo "RM".$acctransaction['Acctransaction']['amount'];
										$baki=$baki-$acctransaction['Acctransaction']['amount'];
										}?>
					  </font></td>

					  <td><?php echo "RM".$baki;?></td>




	<?php foreach ($headers as $parentId => $header): ?>
		<td><?php  if ($acctransaction['Acccode']['parent_id']== $parentId and $acctransaction['Acctransaction']['drcr']=='dr' ){
						echo "RM";
						echo $acctransaction['Acctransaction']['amount'];	
						}else {
						echo "-";
						}	?>
		</td>
				
				
	<?php endforeach;?>
	
	<?php foreach ($headers as $parentId => $header): ?>
	<td><?php  if ($acctransaction['Acccode']['parent_id']== $parentId and $acctransaction['Acctransaction']['drcr']=='cr' ){
				echo "<font color='red'>RM".$acctransaction['Acctransaction']['amount']."</font>";		
             	}else {
				echo "-";
				}	?>
	</td>
			
	<?php endforeach;?>
	</tr>
	
	<?php endforeach;?>

</table>
<li><?php echo $this->Html->link(__('Tambah Rekod'), array('controller' => 'acctransactions', 'action' => 'add')); ?> </li>
</div>

