<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		// echo $this->Form->input('password1',array('label'=>'New Password','type'=>'password','value'=>''));
		// echo $this->Form->input('password2',array('label'=>'Retype New Password','type'=>'password','value'=>''));
		
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('designation');
		echo $this->Form->input('sitecode',array('options'=>$sites,'empty'=>'-select-'));
		echo $this->Form->input('group_id');
		echo $this->Form->input('Region',array('multiple'=>true,'type'=>'select'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
