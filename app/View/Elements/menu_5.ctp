<?php echo  $this->Html->css('menu'); ?>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
<ul id="menu"> 
<li><a href="#submitted" class="drop" id="menu_status_acc">Account</a><!-- Begin 4 columns Item -->

	<div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3 id="sub_current">Current</h3>
                <ul id="sub_status_acc">
                   <li><?php echo $this->Html->link(__('Editing'), array('controller' => 'accbalances', 'action' => 'listacc',1,1),array('class'=>'status_1')); ?> </li>
                   <li><?php echo $this->Html->link(__('Submitted'), array('controller' => 'accbalances', 'action' => 'listacc',2,1),array('class'=>'status_2')); ?> </li>
                   <li><?php echo $this->Html->link(__('Resubmit'), array('controller' => 'accbalances', 'action' => 'listacc',3,1),array('class'=>'status_3')); ?> </li>
                   <li><?php echo $this->Html->link(__('Closed'), array('controller' => 'accbalances', 'action' => 'listacc',4,1),array('class'=>'status_4')); ?> </li>
                   <li><?php echo $this->Html->link(__('No Status'), array('controller' => 'accbalances', 'action' => 'listacc')); ?> </li>
				</ul>   
                 
            </div>
    </div>
</li><!-- End 4 columns Item -->

<li><a href="#" class="drop">Site</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Site List</h3>
				<ul>
					<!-- <li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites','action' => 'add')); ?></li> -->
					<li><?php echo $this->Html->link(__('List Site'), array('controller' => 'sites','action' => 'listsite')); ?> </li>
                 </ul>
            </div>
			
			<!-- <div class="col_1">
            
                <h3>District List</h3>
				<ul>
					<li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List District'), array('controller' => 'districts','action' => 'index')); ?> </li>
                 </ul>
            </div>
			
			<div class="col_1">
            
                <h3>Mukim List</h3>
				<ul>
					<li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Mukim'), array('controller' => 'mukims','action' => 'index')); ?> </li>
                 </ul>
            </div> -->
    
           
    
           
        </div><!-- End 4 columns container -->
    
    </li--><!-- End 4 columns Item -->
	
<li><a href="#" class="drop">User</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>User</h3>
				<ul><!--
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					-->
					<li><?php echo $this->Html->link('FAQ', 'https://www.dropbox.com/s/semsi8fsopytz68/CMSFAQ.docx?dl=0', array('target' => '_blank')); ?></li>
					<li><?php echo $this->Html->link(__('Change password'), array('controller'=>'users','action' => 'updatepassword')); ?></li>
					<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>   
                 </ul>
            </div>

    
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	
</ul>

<script type="text/javascript">
$.post("<?php echo $this->Html->url(array('controller'=>'accbalances','action'=>'json_counting'));?>",function(data){
	var str ='';

	$.each(data.count,function(i,detail){
		var title = detail.name ;

		if(detail.count > 0)
			title += ' ('+ detail.count +')';

		str +='<li><a class="status_1" href="/accbalances/listacc/'+ detail.id +'/1"> '+ title +'</a> </li>';
	})

	$('#sub_status_acc').html(str);

	str = 'Account ('+ data.total_count +')';

	//$('#menu_status_acc').html(str);
	$('#sub_current').html('Current : '+ data.currmth)

},'json');
</script>