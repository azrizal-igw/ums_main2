<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('cake.generic');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>


<?php $total=0; $totalMasuk = 0;$totalKeluar = 0; ?>
<table  cellspacing='1' cellpadding='1'>
		<tr>
			<th width="50px">id</th>
			<th ><?php echo ($drcr==1?'Pendapatan':'Perbelanjaan');?></th>
            <th >Perkara</th>
			
			<th >Masuk</th>
            	<th >Keluar</th>
			<th>desc</th>
            <th>Action</th>
	</tr>
	
	<?php
	foreach ($acctransactions as $acctransaction): ?>
	<?php if (isset($acccodes[$acctransaction['Acccode']['parent_id']]) ) { ?>
	<tr>
		<td><?php echo h($acctransaction['Acctransaction']['id']); ?>&nbsp;</td>
		<td><?php echo h($acccodes[$acctransaction['Acccode']['parent_id']]); ?></td>
        <td><?php echo h($acctransaction['Acccode']['name']); ?></td>
		
         <?php
        if ($acctransaction['Acctransaction']['drcr'] == 'dr'){
            $total += $acctransaction['Acctransaction']['amount'];
            ?><td><?php echo h($acctransaction['Acctransaction']['amount']);?>&nbsp;</td><td>&nbsp;</td><?php
        }else{
            $total -= $acctransaction['Acctransaction']['amount'];
            ?><td>&nbsp;</td><td><?php echo h($acctransaction['Acctransaction']['amount']);?>&nbsp;</td><?php
        }
        ?>
        <td><?php echo h($acctransaction['Acctransaction']['desc']); ?>&nbsp;</td>
        <td><?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $acctransaction['Acctransaction']['id'],$transdate,$drcr)); ?>
        <?php echo $this->Form->postLink(__('Delete'),array( 'action' => 'delete', $acctransaction['Acctransaction']['id'],$transdate,$drcr),null,"Are you sure you wish to delete this record?",$acctransaction['Acctransaction']['id']);?>
        
   
</td>

        <?php
        if ($acctransaction['Acctransaction']['drcr'] == 'dr'){
            $totalMasuk += $acctransaction['Acctransaction']['amount'];
        }else{
            $totalKeluar += $acctransaction['Acctransaction']['amount'];
        }
        ?>
	</tr>
    <?php } ?>
    <?php endforeach; ?>
	<tr><td colspan="3" class='total'>Total : </td>
    <td class='total'><?php echo  money_format('%.2n',$totalMasuk);?></td>
    <td class='total'><?php echo  money_format('%.2n',$totalKeluar);?></td>
    <td colspan=3 class='total'>
    Jumlah <?php echo ($drcr==1?'Pendapatan':'Perbelanjaan');?> 
        <b><?php echo date('d-M',strtotime($transdate)).' : RM ';?><?php echo  money_format('%.2n',($totalMasuk-$totalKeluar));?>
    </b></td></tr>
</table>
	<?php //echo $this->Html->link(__('Add New'), array('action' => 'add', $today)); ?>
	
	

