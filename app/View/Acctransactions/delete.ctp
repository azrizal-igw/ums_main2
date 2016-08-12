<?php echo $this->Form->create('Acctransaction',array('id'=>'entryForm','alt'=>'add'));?>
<?php echo $this->Form->input('transdate',array('default'=>$transdate,'readonly'=>'readonly','type'=>'hidden'));?>
<?php echo $this->Form->input('drcr',array('label'=>false,'type'=>'hidden'));?>
<?php echo $this->Form->input('sitecode',array('default'=>$sitecode,'label'=>false,'type'=>'hidden'));?>
<?php echo $this->Form->input('parent_id',array('default'=>$acccode,'label'=>false,'type'=>'hidden'));?>

<table class="a" cellpadding="0">
<tr><td><?php echo (isset($parent))?$parent['Acccode']['name']:"";?>:</td><td><?php echo $this->Form->input('acccode_id',array('label'=>false));?></td></tr>
<tr><td>Amount RM :</td><td><?php echo $this->Form->input('amount',array('label'=>false));?></td></tr>
<tr><td>Remark :</td><td><?php echo $this->Form->input('desc',array('label'=>false));?></td></tr>
</table>
<?php echo $this->Form->end();?>

