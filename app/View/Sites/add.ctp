<?php echo $this->Javascript->link('jquery-1.4.2.min');  ?>  <!--call jquery-->

<div class="actions"><ul>
<?php  foreach($states as $id => $state) { ?>
       <li><?php echo $this->Html->link(__($state), array('action' => 'add', $id)); ?></li> <!--create link 13 negeri-->
	   <?php } ?></ul></div>

	   <div class="sites form">	
<?php 
                echo __('Add Site');?>
	  <h3><?php echo (isset($states[$state_id]))? $states[$state_id] : "Sila Pilih State ";?></h3> <!-- in default id==null-->
	      <?php echo $this->Form->create('Site');
                echo $this->Form->input('id',array('type'=>'text'));
                echo $this->Form->input('name');
	            echo $this->Form->input('district_id',array('empty'=>'Please Select district'));?>
<div id='mukim_selected'> 
<?php echo $this->Form->input('mukim_id',array('empty'=>'Please Select mukim'));?><!--inputtext with empty default-->
</div>
<?php echo $this->Form->end(__('Submit'));?>





<?php echo $this->Ajax->observeField	('SiteDistrictId', array	('url' => array('action' => 'listmukim'),'update'=>'mukim_selected',
															'frequency' => 0.2,
															
															)
								); ?>
