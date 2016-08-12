<div class="userdetails form">
<?php echo $this->Form->create('Userdetail');?>
	<fieldset>
		<legend><?php echo __('Edit Userdetail'); ?></legend>
	<?php
		// echo $this->Form->input('localid');
		echo $this->Form->input('icno',array('readonly'=>'readonly'));
		echo $this->Form->input('name');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('state_id');
		echo $this->Form->input('gender_id');
		// echo $this->Form->input('age');
		echo $this->Form->input('dob',array('label'=>'Date of birth','dateFormat' => 'DMY','minYear' => date('Y') - 85,'maxYear' => date('Y') - 1, 'empty' => array('day' => '- Select -', 'month' => '- Select -', 'year' => '- Select -')));
		echo $this->Form->input('race_id');
		echo $this->Form->input('nationality_id');
		echo $this->Form->input('occupation_id');
		echo $this->Form->input('education_id');
		echo $this->Form->input('income_id');
		echo $this->Form->input('oku');
		echo $this->Form->input('registered_date');
		echo $this->Form->input('active');
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
		// echo $this->Form->input('invaliduser',array('label'=>'Invalid User'));
		// echo $this->Form->input('entry_dt');
		// echo $this->Form->input('mod_dt');
		// echo $this->Form->input('sendstatus');
		//echo $this->Form->input('sitecode');   automatic
		//echo $this->Form->input('Training');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

