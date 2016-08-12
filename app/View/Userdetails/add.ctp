<div class="userdetails form">
<?php echo $this->Form->create('Userdetail');?>
	<fieldset>
		<legend><?php echo __('Add Userdetail'); ?></legend>
	<?php
		// echo $this->Form->input('localid');
		echo $this->Form->input('icno', array('maxlength' => 12, 'label' => 'Icno (Without -)'));
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('state_id',array('label'=>'State','empty'=>'- Select -'));
		echo $this->Form->input('gender_id',array('label'=>'Gender','empty'=>'- Select -'));
		// echo $this->Form->input('age');
		echo $this->Form->input('dob',array('label'=>'Date of birth','dateFormat' => 'DMY','minYear' => date('Y') - 85,'maxYear' => date('Y') - 1, 'empty' => array('day' => '- Select -', 'month' => '- Select -', 'year' => '- Select -')));
		echo $this->Form->input('race_id',array('label'=>'Race','empty'=>'- Select -'));
		echo $this->Form->input('nationality_id',array('label'=>'Nationality'));
		echo $this->Form->input('occupation_id',array('label'=>'Occupation','empty'=>'- Select -'));
		echo $this->Form->input('education_id',array('label'=>'Education','empty'=>'- Select -'));
		echo $this->Form->input('income_id',array('label'=>'Income','empty'=>'- Select -'));
		echo $this->Form->input('oku');
		echo $this->Form->input('registered_date',array('label'=>'Date Registered','dateFormat' => 'DMY'));
		echo $this->Form->input('active',array('type'=>'checkbox','checked'=>true));
		echo $this->Form->input('usertype_id',array('label'=>'User type','default'=>'1'));
		echo $this->Form->input('tel_no',array('label'=>'Tel. No.'));
		echo $this->Form->input('hp_no',array('label'=>'HP No.'));
		echo $this->Form->input('email');
		echo $this->Form->input('ictknowledge_id',array('label'=>'ICT Knowledge level','empty'=>'- Select -'));
		echo $this->Form->input('distance',array('label'=>'Distance to cbc from home (KM)'));
		echo $this->Form->input('transport_id',array('label'=>'Transport type','empty'=>'- Select -'));
		echo $this->Form->input('time_to_cbc',array('label'=>'Time taken to cbc from home (minutes)'));
		echo $this->Form->input('household',array('label'=>'Number of household'));
		echo $this->Form->input('fixline_cust',array('label'=>'Fix line Customer, Tick if yes'));
		echo $this->Form->input('fixline_id',array('label'=>'Fix line type','empty'=>'- Select -'));
		echo $this->Form->input('fixline_num');
		echo $this->Form->input('bband_cust',array('label'=>'Broadband Customer, Tick if yes'));
		echo $this->Form->input('bband_id',array('label'=>'Broadband type','empty'=>'- Select -'));
		echo $this->Form->input('bband_num');
		echo $this->Form->input('computer',array('label'=>'Has a Computer, Tick if yes'));
		echo $this->Form->input('mobile_cust',array('label'=>'Mobile line Customer, Tick if yes'));
		echo $this->Form->input('mobile_id',array('label'=>'Mobile line type','empty'=>'- Select -'));
		echo $this->Form->input('mobile_num');
		echo $this->Form->input('threeg_cust',array('label'=>'3G Customer, Tick if yes'));
		echo $this->Form->input('threeg_id',array('label'=>'3G Type','empty'=>'- Select -'));
		echo $this->Form->input('threeg_num',array('label'=>'3G Number'));
		echo $this->Form->input('cardno',array('label'=>'Card No'));
		echo $this->Form->input('other_site',array('label'=>'Site Code (If member from other side)'));
		
		// echo $this->Form->input('entry_dt');
		// echo $this->Form->input('mod_dt');
		// echo $this->Form->input('sendstatus');
		// echo $this->Form->input('sitecode',array('default'=>$this->Session->read('Site.sitecode')));  
		echo $this->Form->input('sitecode',array('default'=>$this->Session->read('Auth.User.sitecode'))); 
		//echo $this->Form->input('Training');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index'));?></li>
	</ul>
</div>