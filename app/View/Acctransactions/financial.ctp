<?php //pr($detail);



 ?>
<table>
	<tr>
		<th colspan="14"><?php echo "Penyata Tahunan 2012";?></th>
	</tr>
	<tr>
		<th><?php echo "Perkara";?></th>
		<?php foreach($month as $keymonths=>$months):?>
		<th> <?php echo $keymonths; ?></th>
		<?php endforeach; ?>
		<th><?php echo "Yearly";?></th>
	</tr>
    <tr>
		<th colspan="14"><?php echo "Pendapatan";?></th>
	</tr>
	
	
<?php foreach($headers as $keyheader => $header):?>
<!--setiap penambahan kena istihar 0-->
<?php $yeardr[$keyheader]=0;?>
	<tr>
		<td><?php echo $header;?></td>
			<?php foreach($detail as $keydetail=>$details):?>
			
		<td class="money"><?php echo CakeNumber::currency($details['detail'][$keyheader]['dr'],'');?></td>
						   <?php $yeardr[$keyheader]+=$details['detail'][$keyheader]['dr'];?>
								
		<?php endforeach;?>
		<td><?php echo $yeardr[$keyheader];	?></td>
	</tr>
<?php endforeach;?>

	<tr>
		<th><?php echo "Jumlah Pendapatan Bulanan";?></th>
		<?php $yearmonthdr=0;?>
		<?php foreach($detail as $details):?>
		<th class="money"> <?php echo CakeNumber::currency($details['total']['dr'],'') ?></th>
						   <?php $yearmonthdr+=$details['total']['dr']; ?>
		<?php endforeach; ?>
		<th><?php echo $yearmonthdr;?></th>
	</tr>

	 <tr >
		<th colspan="14">	<?php echo "Perbelanjaan";?></th>
		
	</tr>
<?php foreach($headers as $keyheader=>$header):?>
<!--setiap penambahan kena istihar 0-->
<?php $yearcr[$keyheader]=0;?>
<tr>
	<td>		<?php echo $header;?></td>
	<?php foreach($detail as $keydetail=>$details):?>
		
		<td class="money"><?php echo CakeNumber::currency($details['detail'][$keyheader]['cr'],'');?></td>
						  <?php $yearcr[$keyheader]+=$details['detail'][$keyheader]['cr'];?>
					  
	<?php endforeach;?>
	<td><?php echo $yearcr[$keyheader];?></td>
</tr>
<?php endforeach;?>

	<tr>
		<th><?php echo "Jumlah Perbelanjaan Bulanan";?></th>
		<?php $yearmonthcr=0; ?>
		<?php foreach($detail as $details):?>
		<th class="money"> <?php echo CakeNumber::currency($details['total']['cr'],'') ?></th>
							<?php $yearmonthcr+=$details['total']['cr']; ?>
		<?php endforeach; ?>
		<th><?php echo $yearmonthcr;?></th>
	</tr>
	
	<tr>
		<th><?php echo "Baki Bulan Semasa";?></th>
		<?php foreach($detail as $details):?>
		<th class="money"> <?php echo CakeNumber::currency($details['bakisemasa'],'')?></th>
		<?php endforeach; ?>
	</tr>
		
</table>
<div>
<li>						<?php echo $this->Html->link(__('Tambah Rekod'), array('controller' => 'acctransactions', 'action' => 'add')); ?> </li>
<li>						<?php echo $this->Html->link(__('Financial PDF'), array('controller' => 'acctransactions', 'action' => 'financialpdf')); ?> </li>
</div>
							


