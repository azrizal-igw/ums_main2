
<?php echo $this->Form->create('Accbalance',array('action'=>'backtoedit','id'=>'backtoeditForm'));?>

	<?php
		echo $this->Form->input('id');
        echo $this->Form->input('remark',array('type'=>'textarea','label'=>'Remark'));
	?>

<?php echo $this->Form->end();?>