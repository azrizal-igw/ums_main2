<?php echo $this->Javascript->link('jquery.js');  ?> 
<?php $httphost = (isset($_SERVER['HTTPS'])  ? 'https://' : 'http://').$_SERVER['HTTP_HOST'];?>
<script>

$(document).ready(function(){
	
	//run first time
	//get state id from states form
		courses = $("#TrainingCourseId").val();
		
		////show loading
		// $("#loading").show();
		// $("#district").hide();
		
		//send & receive data from server
		$.ajax({
			url: "<?php echo $httphost;?>/modules/moduledd/"+courses,
			// url: "http://1mtris.ingeniworks.com.my/ums_main2/modules/moduledd/"+courses,
			data: "",
			cache: false,
			
			success: function(msg){
				
				// hide loading & show district
				$("#module_selected").html(msg);
				$("#module_selected").show();		
			}
	});
	
	//if onchange will call data from server
	$("#TrainingCourseId").change(function(){
	
		//get state id from states form
		courses = $("#TrainingCourseId").val();
		
		// alert(courses);
		// show loading
		// $("#loading").show();
		// $("#module").hide();
		// $("#module_selected").show();
		// send & receive data from server
		 $.ajax({
			 // url: "http://1mtris.ingeniworks.com.my/ums_main2/modules/moduledd/"+courses,
			 url: "<?php echo $httphost;?>/modules/moduledd/"+courses,
			 data: "",
			 cache: false,
			
			 success: function(msg){
				
				// hide loading & show district
				// $("#loading").hide();
				$("#module_selected").html(msg);
				$("#module_selected").show();			
			 }
		 });
	});

});
</script>

<fieldset>
<h2><?php echo __('Add Training'); ?></h2>
<?php echo $this->Form->create('Training'); ?>
<?php echo $this->Form->input('course_id',array('empty'=>'-: Select course :-')); ?>
<span id="module_selected" ></span>
<?php
	echo $this->Form->input('StartTime',array('label'=>'Training Date','dateFormat' => 'DMY', 'div' => false)).' - '.$this->Form->input('EndTime',array('dateFormat' => 'His', 'label' => false, 'div' => false)).'<br><br>';
	echo $this->Form->input('trainer');
	echo $this->Form->input('traininglocation');
	echo $this->Form->input('subject');
	// echo $this->Form->input('capacity');
	echo $this->Form->input('target_id');
	echo $this->Form->input('Description',array('label'=>'Note'));





	// if ($this->Session->read('Auth.User.group_id') == 7) {

	// echo $this->Form->input('sitecode');

	// }

	echo $this->Form->end(__('Submit'));
?>
</fieldset>


