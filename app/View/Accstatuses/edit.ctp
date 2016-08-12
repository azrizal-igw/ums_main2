
<?php echo $this->Form->create('Accstatus',array('action'=>'editJson')); ?>
<?php
		echo $this->Form->input('id');
		echo $this->Form->input('transmonth',array('type'=>'hidden'));
		echo $this->Form->input('sitecode',array('type'=>'hidden'));
		echo $this->Form->input('accstatustitle_id',array('type'=>'hidden'));
        echo $this->Form->input('remark',array('type'=>'textarea','label'=>'Remark'));
?>
<?php echo $this->Form->end(); ?>

