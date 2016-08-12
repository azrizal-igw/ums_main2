<div class="userdetails form">
<?php echo $this->Form->create('Userdetail');?>
	<fieldset>
		<legend><?php echo __('Add Trainer'); ?></legend>
	<?php
		echo $this->Form->input('icno', array('maxlength' => 12, 'label' => 'Icno (Without -)'));
		echo $this->Form->input('name');
		echo $this->Form->input('dob',array('label'=>'Date of birth','dateFormat' => 'DMY','minYear' => date('Y') - 85,'maxYear' => date('Y') - 1, 'empty' => array('day' => '- Select -', 'month' => '- Select -', 'year' => '- Select -')));
		echo $this->Form->input('hp_no',array('label'=>'HP No.'));
		echo $this->Form->input('sitecode',array('default'=>$this->Session->read('Auth.User.sitecode'))); 
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php //echo __('Actions'); ?></h3>
	<ul>
		<li><?php //echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>
