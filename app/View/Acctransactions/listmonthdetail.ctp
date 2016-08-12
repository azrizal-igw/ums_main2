<?php
	//pr($acctransactions);
?>

<div>
	<h2><?php echo __('Detail By Month');?></h2>
	<table>
		<?php echo $this->Form->create('Acctransaction');?>
		<tr>
			<th>Bulan Berapa?<?php echo $this->Form->month('mob',array('value'=>$bulan));?></th>
			<th>Tahun Berapa?<?php echo $this->Form->year('Year',2010,2020,array('value'=>$tahun));?></th>
			<th><?php echo $this->Form->end(__('Submit'));
			echo $this->Form->end();?></th>
		</tr>
	</table>

	<table>
		<tr>
			<th colspan="4" align="center">Akaun</th>
			<th colspan="10">Pendapatan</th>
			<th colspan="10"><font color="red">Perbelanjaan</font></th>
		</tr>
		<tr>
			<th><?php echo "Tarikh"; ?></th>
			<th><?php echo "Masuk   "; ?></th>
			<th><font color="red"><?php echo "Keluar  "; ?></font></th>
			<th><?php echo "Baki"; ?></th>

			<!--looping header debit-->
			<?php foreach ($headers as $parent=>$header): ?>
				<th><?php echo $header ?></th>
			<?php endforeach;?>
			
			<!--looping header debit-->
			<?php foreach ($headers as $header): ?>
				<th><font color="red"><?php echo $header ;  ?></font></th>
			<?php endforeach;?>
		</tr>
			
		
		<!--start table kandungan -->
		<?php foreach ($ds as $key=> $row):?>
			<tr>
				<td><?php if(isset($row['transdate'])){
							$a=substr($row['transdate'], 6, 2);
							$b=substr($row['transdate'], 4, 2);
							$c=substr($row['transdate'], 0, 4);
							echo $this->Html->link(__($a."/".$b."/".$c), array('controller' => 'acctransactions', 'action' => 'listdaydetail',$c,$b,$a));
							}
							else{
							echo "-";
							}?>
				</td>
				<td class="money"><?php if(isset($row['debit'])){
							echo CakeNumber::currency($row['debit'],'');
							}else{
							echo "-";
							};
							?>
				</td>
				<td class="money"><font color="red"><?php if(isset($row['credit'])){
												echo CakeNumber::currency($row['credit'],'');}
												else{echo "-";
												}
												?></font>
				</td>
				<td class="money"><?php echo CakeNumber::currency($row['baki'],'');?></td>
				
			<!--looping debit-->		
			<?php foreach ($headers as $parent=>$header): ?>
				<td class="money"><?php if (isset($row['dr'][$parent])){
											echo CakeNumber::currency($row['dr'][$parent],'');
											} ?></td>
			<?php endforeach;?>
		
			<!--looping credit-->	
			<?php foreach ($headers as $parent=>$header): ?>
				<td class="money"><?php if (isset($row['cr'][$parent])){
											echo CakeNumber::currency($row['cr'][$parent],'');
											} ?></td>
			<?php endforeach;?>

			<?php endforeach;?>

			<tr>
				<th><?php echo "Total" ?></th>
				<td class="money"><?php if(isset($row['totaldebit'])){
											echo CakeNumber::currency($row['totaldebit'],'');
											} ?></td>
				<td class="money"><?php if(isset($row['totalcredit'])){
											echo CakeNumber::currency($row['totalcredit'],'');
											}  ?></td>
				<td class="money"><?php if(isset($row['baki'])){
											echo CakeNumber::currency($row['baki'],'');
											}  ?></td>
	
				<?php foreach ($dr as $parent=>$drparent): ?>
					<td class="money"><?php echo CakeNumber::currency($drparent,'');  ?></td>
				<?php endforeach;?>

				<?php foreach ($cr as $parent=>$crparent): ?>
					<td class="money"><?php echo CakeNumber::currency($crparent,'');  ?></td>
				<?php endforeach;?>
			</tr>
	</table>
		
<li><?php echo $this->Html->link(__('Tambah Rekod'), array('controller' => 'acctransactions', 'action' => 'add')); ?> </li>
<li><?php echo $this->Html->link(__('List month detail PDF'), array('controller' => 'acctransactions', 'action' => 'listmonthdetailpdf',$tahun,$bulan)); ?> </li>
</div>