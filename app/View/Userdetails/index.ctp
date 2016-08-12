<div class="userdetails">
	<h2><?php echo __('LIST USERDETAILS');?></h2>
	<?php 
	if ($this->Session->read('Auth.User.group_id') != 4) { // except manager can see the drop down
		echo $this->Session->read('Site.name')."&nbsp;&nbsp";
		echo $this->Html->link(__('Change Site'), array('controller'=>'sites','action' => 'search', 'userdetails'));
	}
	?>
	<br/><br/>
	<?php echo $this->Form->create('Userdetail');?>
	<?php echo $this->Form->input('icno',array('label'=>'IC No.', 'id' => 'icno')); ?>
	<?php echo $this->Form->input('name',array('label'=>'Name', 'id' => 'name')); ?>
	<?php
		echo $this->Form->input('registered_date1',array(													
			'label' => 'Register Date From',
			'type' => 'date',
			// 'timeFormat'=>'24',
			'dateFormat' => 'DMY', 
			'separator'=>'-',
			'default' => array('day' => 1, 'month' => '1', 'year' => '2008')
			// 'empty' => array('day' => '01', 'month' => '01', 'year' => '2008'),
		));
		echo $this->Form->input('registered_date2',array(
			'label' => 'Register Date To',
			'type' => 'date',
			// 'timeFormat'=>'24',
			'dateFormat' => 'DMY', 
			'separator'=>'-',
		));
		echo $this->Form->hidden('site', array('value' => $sitecode, 'id' => 'site'));
		// echo 	$this->Form->input('sitecode',array('options'=>$sites));
		//echo 	$this->Form->input('options',array('options'=>array('HTML','PDF')));
		//echo $this->Form->end(__('Submit'));
	?>
<table style="width:auto">
<tr>
<td>
<?php echo $this->Form->submit('Search', array('value' => 'Search'));?>
</td>
<td>
<?php echo $this->Form->submit('Reset', array('value' => 'Reset', 'name' => 'default'));?>
</td>
<td>
<?php 
	echo $this->Form->submit('Report', array(
		'type' => 'button', 
		'value' => 'Report', 
		'id' => 'report'
	)); 
?>
</td>
</tr>
</table>
<?php echo $this->Form->end(); ?>

<h2><?php echo __('Userdetails');?></h2>
<table cellpadding="0" cellspacing="0">
<tr>
    <th><?php echo '#'?></th>
	<th><?php echo $this->Paginator->sort('icno');?></th>
	<th><?php echo $this->Paginator->sort('name');?></th>
	<!--<th><?php echo $this->Paginator->sort('state_id');?></th>-->
	<th><?php echo $this->Paginator->sort('gender_id');?></th>
	<th><?php echo $this->Paginator->sort('age');?></th>
	<!--<th><?php echo $this->Paginator->sort('race_id');?></th>-->
	<th><?php echo $this->Paginator->sort('occupation_id');?></th>
	<th><?php echo $this->Paginator->sort('registered_date');?></th>
	<th><?php echo $this->Paginator->sort('active');?></th>
	<th><?php echo $this->Paginator->sort('usertype_id');?></th>
	<!--<th><?php echo $this->Paginator->sort('hp_no');?></th>
	<th><?php echo $this->Paginator->sort('email');?></th>
	<th><?php echo $this->Paginator->sort('distance');?></th>-->
	<th><?php echo $this->Paginator->sort('sitecode');?></th>
	<th class="actions"><?php echo __('Actions');?></th>
</tr>
<?php //pr($userdetails);

$j = $this->Paginator->counter(array('format' => '%start%'));
foreach ($userdetails as $userdetail): ?>
<tr>
    <td><?php echo $j;$j++; ?>&nbsp;</td>
    <td><?php echo h($userdetail['Userdetail']['icno']); ?>&nbsp;</td>	
	<td><?php echo h($userdetail['Userdetail']['name']); ?>&nbsp;</td>
	<!--
	<td><?php echo $this->Html->link($userdetail['State']['name'], array('controller' => 'states', 'action' => 'view', $userdetail['State']['id'])); ?></td>
	-->
	<td><?php echo $this->Html->link($userdetail['Gender']['bm'], array('controller' => 'genders', 'action' => 'view', $userdetail['Gender']['id'])); ?></td>
	<td><?php echo h($userdetail['Userdetail']['age']); ?>&nbsp;</td>
	<!--
	<td><?php echo $this->Html->link($userdetail['Race']['bm'], array('controller' => 'races', 'action' => 'view', $userdetail['Race']['id'])); ?></td>
	-->
	<td><?php echo $this->Html->link($userdetail['Occupation']['bm'], array('controller' => 'occupations', 'action' => 'view', $userdetail['Occupation']['id'])); ?></td>
	<td><?php echo h($userdetail['Userdetail']['registered_date']); ?>&nbsp;</td>
	<td><?php if ($userdetail['Userdetail']['active'] ==1) {echo "Yes";}else{echo "No";}; ?>&nbsp;</td>
	<td><?php echo h($userdetail['Usertype']['bm']); ?>&nbsp;</td>
	<!--
	<td><?php echo h($userdetail['Userdetail']['hp_no']); ?>&nbsp;</td>
	<td><?php echo h($userdetail['Userdetail']['email']); ?>&nbsp;</td>
	<td><?php echo h($userdetail['Userdetail']['distance']); ?>&nbsp;</td>
	-->
	<td><?php echo h($userdetail['Userdetail']['sitecode']); ?>&nbsp;</td>
		
	<td class="actions">
		<?php echo $this->Html->link(__('View'), array('action' => 'view', $userdetail['Userdetail']['id'])); ?>
		<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $userdetail['Userdetail']['id'])); ?>
		<!--?php echo $this->Form->hidden(__('Remove'), array('action' => 'setinvaliduser', $userdetail['Userdetail']['id']), null, __('Are you sure you want to remove # %s?', $userdetail['Userdetail']['id'])); ?-->
		<?php 
			if ($groups == 1 || $groups == 4) {
				echo $this->Html->link(__('Remove'), array('action' => 'setinvaliduser', $userdetail['Userdetail']['id']), null, __('Are you sure you want to remove # %s?', $userdetail['Userdetail']['id'])); 
			}
		?>
	</td>
</tr>
<?php endforeach; ?>
</table>
<p>
<?php 
	echo $this->Paginator->counter(array(
	'format' => __('Page 
	{:page} of {:pages},
	showing {:current} records out of {:count} total,
	starting on record {:start},
	ending on {:end}')
	));
?></p>

<div class="paging">
<?php	
	// echo $this->Paginator->options(array('url' => $this->passedArgs)); 
	echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
	echo $this->Paginator->numbers(array('separator' => ''));
	echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
?>
</div>
</div>

<script type="text/javascript">
$('#report').click(function() {
 	var answer = confirm('The report will producing based on the search criteria. Please make sure the date range is not too long or the download will time consuming.\n\nAre you sure want to generate the userdetails report?');
 	if (answer == true) {
 		var site = $('#site').val();
 		if ($('#icno').val()) {
 			var icno = $('#icno').val();
 		}
 		else {
 			var icno = 0;
 		}
 		if ($('#name').val()) {
 			var name = $('#name').val();
 		}
 		else {
 			var name = 0;
 		}
 		var datefrom = $('#UserdetailRegisteredDate1Year').val() + '-' + $('#UserdetailRegisteredDate1Month').val() + '-' + $('#UserdetailRegisteredDate1Day').val();
 		var dateto = $('#UserdetailRegisteredDate2Year').val() + '-' + $('#UserdetailRegisteredDate2Month').val() + '-' + $('#UserdetailRegisteredDate2Day').val();

 		// alert(cms_web.v1.base_url + 'certrecords/jasperuserdetails/userdetails/' + site + '/' + icno + '/' + name + '/' + datefrom + '/' + dateto);

		window.location.href = cms_web.v1.base_url + 'certrecords/jasperuserdetails/userdetails/' + site + '/' + icno + '/' + name + '/' + datefrom + '/' + dateto;
	}	  
})	
</script>