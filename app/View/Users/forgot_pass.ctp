
<div class="users form">
<h2>Reset Password</h2>
<font size="3">By submitting this field, your password will be reset and send to your email address</font>
<?php echo $this->Form->Create('User', array('action'=>'forgot_pass')); ?>
	<fieldset>
		
	<?php
		echo $this->Form->input('username',array('required'=>true));
		//echo $this->Form->input('sitecode',array('options'=>$sites,'empty'=>'-select-'));
		
	?>
	</fieldset>

<?php echo $this->Form->end(__('Submit'));?>
<?php echo $this->html->link('Back',array('action'=>'login')); ?>
</div>

