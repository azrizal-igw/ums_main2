<?php echo  $this->Html->css('menu'); ?>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
<ul id="menu"> 


<!--
<li><a href="#submitted" class="drop" id="menu_status_acc"><?php echo $this->Html->link(__('Account'), array('controller' => 'accbalances', 'action' => 'listacc',4,1),array('class'=>'status_4')); ?></a></li>
-->


<li><a href="#submitted" class="drop" id="menu_status_acc"><?php echo $this->Html->link(__('Account'), array('controller' => 'sites', 'action' => 'listsite'),array('class'=>'status_4')); ?></a></li>

		
<li><a href="#" class="drop">Site</a><!-- Begin 4 columns Item -->    
	<div class="dropdown_4columns"><!-- Begin 4 columns container -->
		<div class="col_1">		
			<h3>Site List</h3>
			<ul>
				<li><?php echo $this->Html->link(__('List Site'), array('controller' => 'sites','action' => 'index')); ?> </li>
			 </ul>
		</div>
	</div><!-- End 4 columns container -->
</li><!-- End 4 columns Item -->
	
	
	
<li><a href="#" class="drop">Training</a><!-- Begin 4 columns Item -->    
	<div class="dropdown_4columns"><!-- Begin 4 columns container -->
		<div class="col_1">		
			<h3>Certifications</h3>
			<ul>
				<li><?php echo $this->Html->link(__('List Training'), array('controller' => 'Trainings', 'action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Add Training'), array('controller' => 'Trainings', 'action' => 'add')); ?> </li>			
				<li><?php echo $this->Html->link(__('List/Generate Cert'), array('controller' => 'certrecords','action' => 'index')); ?> </li>
				<!--<li><?php echo $this->Html->link(__('Add Trainer'), array('controller' => 'userdetails','action' => 'addtrainer')); ?> </li>-->
			 </ul>
			 
			<h3>Promotions</h3>
			<ul>
				<li><?php echo $this->Html->link(__('List Promotions'), array('controller'=>'promotions','action' => 'index')); ?> </li>
				<li><?php echo $this->Html->link(__('Add Promotion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
			</ul>			 
		</div>
	</div><!-- End 4 columns container -->
</li><!-- End 4 columns Item -->
		
	
	
	
	<li><a href="#" class="drop">User Records</a><!-- Begin 4 columns Item -->   
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">            


                <h3>Userdetail</h3>
                <ul>
					<li><?php echo $this->Html->link(__('List Userdetails'), array('controller'=>'userdetails','action' => 'index')); ?>  </li> 
					<li><?php echo $this->Html->link(__('Add Userdetail'), array('controller' => 'Userdetails', 'action' => 'add')); ?> </li>
                </ul> 
				
				<h3>Browsing</h3>
                <ul>
                 	<li><?php echo $this->Html->link(__('List Browsings'), array('controller'=>'browsings','action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Add Browsing'), array('controller' => 'browsings', 'action' => 'add')); ?> </li>
				</ul>

				<h3>Receipts</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'Receipts','action' => 'index')); ?></li>
                </ul> 
		

                <h3>Services</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('List Services'), array('controller' => 'usages','action' => 'index')); ?></li>
                </ul>   

			
            </div>    
        </div><!-- End 4 columns container -->    
    </li><!-- End 4 columns Item -->

	
	
	<li><a href="#" class="drop">Reports</a><!-- Begin 4 columns Item -->	
	     <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Report</h3>
                <ul>
                 	<li><?php echo $this->Html->link(__('Monthly Reports'), array('controller'=>'accmonths','action' => 'index')); ?> </li>
				</ul>
            </div>
           
        </div><!-- End 4 columns container -->
	</li>



    <li><a href="#" class="drop">User</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
            <div class="col_1">
            
                <h3>User</h3>
                <ul>
					<li><?php echo $this->Html->link(__('Change password'), array('controller'=>'users','action' => 'updatepassword')); ?></li>
                    <li><?php echo $this->Html->link('FAQ', 'https://www.dropbox.com/s/semsi8fsopytz68/CMSFAQ.docx?dl=0', array('target' => '_blank')); ?></li>
                    <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>   
                 </ul>
            </div>

    
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
    
	
</ul>

