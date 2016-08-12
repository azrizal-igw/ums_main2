<h2>Account : <?php echo $accstatustitles[$accstatus];?></h2>
<p>
  <?php
  echo $this->Paginator->counter(array(
  'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
  ));
  ?>  </p>

  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
</div>
</p><?php echo $this->Form->create('Accbalance', array('inputDefaults' => array('label' => false))); ?>
<table>
<tr>
<th width="30px">#</th>
<th><?php echo $this->Form->input('name',array('class'=>'search-field','placeholder'=>'Site Name')); ?></th>
<th><?php echo $this->Form->input('phase_id',array('class'=>'search-field','empty'=>'-: Select Phase :-')); ?></th>
<th><?php echo $this->Form->input('region_id',array('class'=>'search-field','empty'=>'-: Select Region :-')); ?></th>
<th><?php echo $this->Form->input('transmonth',array('class'=>'search-field','type'=>'date','dateFormat' => 'MY','minYear' => '2012',
   'maxYear' => date('Y') , 'placeholder'=>'Month Year')); ?></th>
<th width="60px">Bf</th>
<th  width="60px">Debit</th>
<th  width="60px">Credit</th>
<th  width="60px">Balance</th>
</tr>

<?php $count = $this->Paginator->counter(array('format' => ('{:start}')));?>
<?php $transmonth=$this->data['Accbalance']['transmonth']['year'].$this->data['Accbalance']['transmonth']['month'];?>
<?php foreach($acc as $index=>$value) { ?>

<tr class="view_accdetail" >
<td><?php echo $count++ ;?></td>
<td><p align="left"><h4><?php echo $value['Site']['name'] ;?></h4><br>
    <?php echo $this->Html->link(__('Detail'), array('controller' => 'accbalances','action' => 'index',$transmonth,$value['Site']['id'])); ?>

    <?php $year = (isset($value['Accbalance']['transmonth']) ? substr($value['Accbalance']['transmonth'], 0,4): date('Y'))?>
    &nbsp;<?php echo $this->Html->link(__('Yearly'), array('controller' => 'Accbalances','action' => 'listyear',$year, $value['Site']['id'])); ?>

     &nbsp;<?php 
    if($accstatus == 5):
     //hide link
   ;else:
   echo $this->Html->link(__('Report'), array('controller' => 'accbalances','action' => 'jasper',$value['Site']['id'],$transmonth));
   endif;
   ?></p></td>
<td><?php if(isset( $value['Site']['phase_id'])){ echo $phases[$value['Site']['phase_id']]  ;}?></td>
<td><?php if(isset( $value['Site']['region_id'])){ echo $regions[$value['Site']['region_id']]  ;}?></td>
<td><?php echo date("M Y",strtotime( $transmonth.'01'))  ;?></td>
<td><?php echo isset($value['Accbalance']['bf'])?$value['Accbalance']['bf']:'' ;?></td>
<td><?php echo isset($value['Accbalance']['dr'])?$value['Accbalance']['dr']:'' ;?></td>
<td><?php echo isset($value['Accbalance']['cr'])?$value['Accbalance']['cr']:'' ;?></td>
<td><?php echo isset($value['Accbalance']['bal'])?$value['Accbalance']['bal']:'' ;?></td>
</tr>
<?php  } ?>
</table>
<?php echo $this->Form->end();?>



  <div class="paging">
  <?php
    echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
    echo $this->Paginator->numbers(array('separator' => ''));
    echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
  ?>
</div>
</p>

<script id="ajax" type="text/javascript">

/* On change search form */
$('.search-field').change(function(){
    $('#AccbalanceListaccForm').submit();
})
/* End search*/

</script>