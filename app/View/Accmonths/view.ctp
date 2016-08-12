
<?php echo $this->Form->create('Accmonth'); ?>

	<dl><!--
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($accmonth['Accmonth']['id']); ?>
			&nbsp;
		</dd>
		-->	
		
		<dt><?php echo __('Ym'); ?></dt>
		<dd>
			<?php echo h($accmonth['Accmonth']['ym']); ?>
			&nbsp;
		</dd>
	</dl>
	<dl>
	<?php if ($acctstat <> '0')
		 {
		 echo ('Cannot proceed.....there is pending site not yet closed');
		 }
		 else 
		 {
		 echo $this->Form->submit('Update Month', array('name' => 'update'));
		 }
		 ?>
	</dl>
	<?php echo $this->Form->end(); ?>


