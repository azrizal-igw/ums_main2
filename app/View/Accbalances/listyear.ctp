<h2>Account Year <?php echo $year;?> : <?php echo $site['Site']['name'].' ('. $site['Site']['id'].')';?></h2>
<?php echo $this->Form->create('Accbalance', array('inputDefaults' => array('label' => false))); ?>
<table>
    <tr>
        <th  width="30px">#</th>
        <th><?php echo $this->Form->input('transmonth',array('class'=>'search-field','type'=>'date','dateFormat' => 'Y','minYear' => '2012',
   'maxYear' => date('Y') , 'placeholder'=>'Month Year')); ?></th>
        <th>Status</th>
        <th width="160px">Remark</th>
        <th width="70px">Bf</th>
        <th width="70px">Debit</th>
        <th width="70px">Credit</th>
        <th width="70px">Balance</th>
    </tr>

    <?php $count = 1;?>
    <?php for($y=1 ;$y<=12;$y++) { ?>

    <?php 
    if($y < 10) {
        $transmonth = $year . '0' . $y; 
    } else {
        $transmonth = $year . $y; 
    }
	$sid2 = trim($sid);
    ?>
    <tr class="view_accdetail">
        <td><?php echo $count++ ;?></td>
        <td><h4><?php echo date("M Y",strtotime(  $transmonth.'01')) ;?></h4>
            <?php echo $this->Html->link(__('Detail'), array('controller' => 'accbalances','action' => 'index',$transmonth,$sid2)); ?></td>
    <?php
    if(isset($acc[$transmonth])){
    $value = $acc[$transmonth]; ?>
        <td><?php echo $value['Accstatustitle']['name'] ;?></td>
        <td><?php echo $value['Accbalance']['remark'] ;?></td>
        <td><?php echo $value['Accbalance']['bf'] ;?></td>
        <td><?php echo $value['Accbalance']['dr'] ;?></td>
        <td><?php echo $value['Accbalance']['cr'] ;?></td>
        <td><?php echo $value['Accbalance']['bal'] ;?></td>

    <?php } else { ?>
        <td><i>No Status</i></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    
    <?php  } ?>
    </tr>
  <?php } ?>
</table>
<?php echo $this->Form->end();?>

<script id="ajax" type="text/javascript">

/* On change search form */
$('.search-field').change(function(){
    $('#AccbalanceListyearForm').submit();
})
/* End search*/

</script>