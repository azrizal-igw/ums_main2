<div class="trainings form">
<?php echo $this->Form->create('Training');?>
	<fieldset>
		<legend><?php echo __('Edit Training'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('course_id');
		echo $this->Form->input('module_id');
		echo $this->Form->input('sitecode');
		echo $this->Form->input('StartTime', array('label' => 'Training Date', 'div' => false)).' - '.$this->Form->input('EndTime',array('dateFormat' => 'His', 'label' => false, 'div' => false)).'<br><br>';
		// echo $this->Form->input('EndTime');
	//	echo $this->Form->input('user_id');
		echo $this->Form->input('trainer');
		echo $this->Form->input('traininglocation');
		echo $this->Form->input('subject');
		// echo $this->Form->input('capacity');
		echo $this->Form->input('target_id');
		echo $this->Form->input('Description',array('label'=>'Note'));
		// echo $this->Form->input('finalize');
		// echo $this->Form->input('finalizetime');
		// echo $this->Form->input('finalizedby');
		// echo $this->Form->input('Userdetail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
