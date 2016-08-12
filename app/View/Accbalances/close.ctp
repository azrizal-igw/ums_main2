
<?php echo $this->Form->create('Accbalance',array('action'=>'close','id'=>'closeForm'));?>

	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('remark',array('type'=>'textarea','label'=>'Remark'));
	?>

<?php echo $this->Form->end();?>

