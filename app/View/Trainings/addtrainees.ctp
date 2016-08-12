<?php echo $this->Form->create('Finalize'); ?>
<h2><?php echo __('Training');?></h2>
<dl>
	<dt><?php echo __('Id'); ?></dt>
	<dd>
		<?php echo h($training['Training']['id']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Course'); ?></dt>
	<dd>
		<strong><?php echo $training['Course']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Module'); ?></dt>
	<dd>
		<strong><?php echo $training['Module']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Subject'); ?></dt>
	<dd>
		<?php echo h($training['Training']['subject']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Sitecode'); ?></dt>
	<dd>
		<?php echo h($training['Training']['sitecode']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Starttime'); ?></dt>
	<dd>
		<?php echo h($training['Training']['StartTime']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('User'); ?></dt>
	<dd>
		<strong><?php echo $training['User']['name']; ?></strong>
		&nbsp;
	</dd>
	<dt><?php echo __('Trainer'); ?></dt>
	<dd>
		<?php echo h($training['Training']['trainer']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Training Location'); ?></dt>
	<dd>
		<?php echo h($training['Training']['traininglocation']); ?>
		&nbsp;
	</dd>
	
	<dt><?php echo __('Created'); ?></dt>
	<dd>
		<?php echo h($training['Training']['created']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Modified'); ?></dt>
	<dd>
		<?php echo h($training['Training']['modified']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Capacity'); ?></dt>
	<dd>
		<?php echo h($training['Training']['capacity']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalize'); ?></dt>
	<dd>
		<?php if ($training['Training']['finalize'] == 1): echo 'Yes'; else: echo 'No'; endif; ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalizetime'); ?></dt>
	<dd>
		<?php echo h($training['Training']['finalizetime']); ?>
		&nbsp;
	</dd>
	<dt><?php echo __('Finalizedby'); ?></dt>
	<dd>
		<?php echo h($training['Finalizedby']['name']); ?>
		&nbsp;
	</dd>	
</dl>
<br>

<fieldset>
<?php
	// check if the courses is from intel
	if ($training['Training']['course_id'] == 9 || $training['Training']['course_id'] == 10) {
		if ($training['Training']['finalize'] == 1) { // finalize
			if ($group == 1 || $group == 2) { // admin or reporting
				echo $this->Form->submit('Unfinalize', array('name' => 'unfinalize', 'label' => false));
			}
		}
		else { // not finalize
			if ($group == 1 || $group == 2 || $group == 4) { // admin, reporting and manager				
				echo $this->Form->submit('Finalize', array('name' => 'finalize', 'label' => false));	
			}
		}
	}
?>
</fieldset>
<?php echo $this->Form->end(); ?>






<h2><?php echo __('Related Trainees / Userdetails');?></h2>
<?php 
	if (!empty($training['Userdetail'])):
		?>
		<table cellpadding = "0" cellspacing = "0">
		<tr>
			<th><?php echo __('Icno'); ?></th>
			<th><?php echo __('Name'); ?></th>
			<th><?php echo __('Address'); ?></th>
			<th><?php echo __('Tel No'); ?></th>
			<th><?php echo __('Hp No'); ?></th>
			<th><?php echo __('Email'); ?></th>
			<th><?php echo __('Sitecode'); ?></th>
			<th class="actions"><?php echo __('Actions');?></th>
		</tr>
		<?php
			$i = 0;
			foreach ($training['Userdetail'] as $userdetail): 
				?>
				<tr>
					<td><?php echo $userdetail['icno'];?></td>
					<td><?php echo $userdetail['name'];?></td>
					<td><?php echo $userdetail['address'];?></td>
					<td><?php echo $userdetail['tel_no'];?></td>
					<td><?php echo $userdetail['hp_no'];?></td>
					<td><?php echo $userdetail['email'];?></td>
					<td><?php echo $userdetail['sitecode'];?></td>
					<td class="actions">
						<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'trainings', 'action' => 'deltrainees',$training['Training']['id'],$userdetail['id']), null, __('Are you sure you want to delete # %s?', $userdetail['id'])); ?>
					</td>
				</tr>
				<?php 
			endforeach; 
			?>
		</table>
	<?php 
	endif; 
?>





<?php echo $this->Form->create('Training'); ?>
<?php 
	// show if not finalize yet
	if ($training['Training']['finalize'] == 0) { 
		?>
		<fieldset>
		<legend><?php echo __('Add Trainee'); ?></legend>
		Search by:
		<?php 
			echo $this->Form->input('icno',array('label'=>'IC No.')); 
			echo $this->Form->input('name',array('label'=>'Name')); 
		?>
		<tr>
		<td>
		<?php 
			echo $this->Form->submit('Search', array('name' => 'search', 'label' => false, 'class' => 'btn btn-primary')); 
		?>
		</td>
		<td>
		</td>
		</tr>
		</table>		
		<?php 			
			if (!empty($userdetails)) {
				foreach ($userdetails as $userdetail) {										
					echo $this->Form->input('checkUser', array('hiddenField' => false, 'value' => $userdetail['userdetails']['id'], 'name' => 'data[Userdetail][Userdetail][]', 'type' => 'checkbox', 'label' => $userdetail['userdetails']['name'].' ('.$userdetail['userdetails']['icno'].')'));	
				}
				echo $this->Form->submit('Submit', array('name' => 'submit', 'label' => false));			
			}	
		?>
		</fieldset>
		<?php 
	} 
?>
<?php echo $this->Form->end(); ?>






<script type="text/javascript">
$(document).ready(function(){
	$('#finalize').click(function(){
		var data = $('#add_trainee').serialize(); 
		var id = $(this).attr('alt');
		// alert(id);
     	var answer = confirm('Are you sure want to finalize?');
     	if (answer == true) {
     		// $('#add_trainee').submit();
     		// var finalize = $('#finalize').
			$.ajax({
				type: 'POST',
				data: {finalize: 23},
				url: 'http://pi1m.msd.net.my/Trainings/addtrainees/' + id,
				cache: false,
				success: function(){	
					$('#add_trainee').submit() 					
					// getList();					
		     	},
		    });
		}
     	else {
     		return false;
     	}  
	});
});
</script>

