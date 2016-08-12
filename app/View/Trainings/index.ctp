<?php echo $this->Javascript->link('jquery.js');  ?> 
<?php $httphost = (isset($_SERVER['HTTPS'])  ? 'https://' : 'http://').$_SERVER['HTTP_HOST'];?>







<script> 
$(document).ready(function(){
	courses = $("#TrainingCourseId").val();
	$.ajax({
		url: "<?php echo $httphost;?>/modules/moduledd/"+courses,
		data: "",
		cache: false,
		success: function(msg){
			$("#module_selected").html(msg);
			$("#module_selected").show();		
		}
	});	
	$("#TrainingCourseId").change(function(){
		courses = $("#TrainingCourseId").val();
		 $.ajax({
			 url: "<?php echo $httphost;?>/modules/moduledd/"+courses,
			 data: "",
			 cache: false,			
			 success: function(msg){
				 $("#module_selected").html(msg);
				 $("#module_selected").show();			
			 }
		 });
	});
});
</script>




<div class="trainings">
<?php if (in_array($this->Session->read('Auth.User.group_id'), array(1,2,3,7))) { ?>
<?php echo $this->Session->read('Site.name');?>&nbsp;&nbsp;
<?php echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'trainings'));}?><br/><br/>
<?php echo $this->Form->create('Training'); ?>




<table>
<?php
	echo $this->Form->input('course_id',array('empty'=>'-: Select course :-'));
?>
<tr id="module_selected" ></tr>
</table>	






<?php
	echo $this->Form->input('tdate1',array(													
		'label' => 'Date From',
		'type' => 'date',
		'timeFormat'=>'24',
		'dateFormat' => 'DMY', 
		'separator'=>'-'
		)
	);
	echo $this->Form->input('tdate2',array(
		'label' => 'Date To',
		'type' => 'date',
		'timeFormat'=>'24',
		'dateFormat' => 'DMY', 
		'separator'=>'-'																										
		)
	);
?>





<table style="width:auto">
	<tr>
		<td>
			<?php echo $this->Form->submit('Search');?>
		</td>
		<td>
			<?php echo $this->Form->end(array('name'=>'default','label'=>'Reset'));?>
		</td>
	</tr>
</table>





<h2><?php echo __('Trainings');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
	<td class="th2"><?php echo '#'?></td>
	<td class="th2"><?php echo $this->Paginator->sort('course_id');?></td>
	<td class="th2"><?php echo $this->Paginator->sort('module_id');?></td>
	<td class="th2">
	<?php 
		echo $this->Paginator->sort('sitecode').' /<br>'.$this->Paginator->sort('StartTime');;
	?>
	</td>
	<td class="th2">
	<?php 
		echo $this->Paginator->sort('user_id').' /<br>'.$this->Paginator->sort('trainer');
	?>
	</td>
	<td class="th2">
	<?php 
		echo $this->Paginator->sort('traininglocation').' /<br>'.$this->Paginator->sort('subject');;
	?>
	</td>
	<td class="th2">Total Trainee</td>
	<td class="actions th2"><?php echo __('Actions');?></td>
</tr>





<?php
	$j = $this->Paginator->counter(array('format' => '%start%'));
	foreach ($trainings as $training): 
		$total = 0;
		if (!empty($training['Userdetail'])) {
			$total = count($training['Userdetail']);
		} 	
		?>
		<tr>
			<td><?php echo $j;$j++; ?>&nbsp;</td>
			<td>
			<?php echo $this->Html->link($training['Course']['name'], array('controller' => 'courses', 'action' => 'view', $training['Course']['id'])); ?>
			</td>
			<td>
			<?php echo $this->Html->link($training['Module']['name'], array('controller' => 'modules', 'action' => 'view', $training['Module']['id'])); ?>
			</td>
			<td>
			<?php 
				echo h($training['Training']['sitecode']).' /<br>'.h($training['Training']['StartTime']);; 
			?>
			</td>
			<td>
			<?php 
				echo $this->Html->link($training['User']['name'], array('controller' => 'users', 'action' => 'view', $training['User']['id'])).' /<br>'.h($training['Training']['trainer']);; 
			?>
			</td>
			<td>
			<?php 
				echo h($training['Training']['traininglocation']).' /<br>'.h($training['Training']['subject']);; 
			?>
			</td>
			<td><?php echo $total; ?></td>
			<td class="actions">			
			<?php
				if ($training['Training']['finalize'] == 0) { 
				echo $this->Html->link(__('Add/Del Trainee'), array('action' => 'addtrainees', $training['Training']['id']));
				echo $this->Html->link(__('View'), array('action' => 'view',  $training['Training']['id']), array('class' => 'btn'));
				echo $this->Html->link(__('Edit'), array('action' => 'edit', $training['Training']['id']), array('class' => 'btn'));
				echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $training['Training']['id']), null, __('Are you sure you want to delete # %s?', $training['Training']['id'])); 						
				}
				else if ($training['Training']['finalize'] == 1) {
				echo $this->Html->link(__('View'), array('action' => 'view',  $training['Training']['id']), array('class' => 'btn'));
				}
			?>			
			</td>
		</tr>
	<?php 
		endforeach; 
	?>
</table>





<p>
<?php
	echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?>	
</p>


<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
</div>

