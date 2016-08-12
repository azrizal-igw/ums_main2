<?php echo  $this->Html->css('menu'); ?>
<?php echo  $this->Html->css('csshover3.htc'); ?>


<!--
[if IE 6]>
<style>
body {behavior: url("/css/csshover3.htc" )}
#menu li .drop {background:url("/img_menu/drop.gif") no-repeat right 8px; 
</style>
<![endif]
-->
<ul id="menu"> 
<li><a href="#" class="drop">Account</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Acc transaction</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('entry'), array('controller' => 'acctransactions', 'action' => 'entry')); ?> </li>
				   <li><?php echo $this->Html->link(__('Monthly'), array('controller' => 'acctransactions', 'action' => 'listmonth')); ?> </li>
					<li><?php echo $this->Html->link(__('Yearly'), array('controller' => 'acctransactions', 'action' => 'admin_listyear')); ?> </li>
                
				 <li><?php echo $this->Html->link(__('Financial Month'), array('controller' => 'acctransactions', 'action' => 'listmonthdetail')); ?> </li>
				 <li><?php echo $this->Html->link(__('Financial Year'), array('controller' => 'acctransactions', 'action' => 'financial')); ?> </li>
				</ul>   
                 
            </div>
    
            <div class="col_1">
            
                <h3>Acc balances</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('New Accbalance'), array('controller' => 'accbalances','action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Accbalances'), array('controller' => 'accbalances', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
    
            <div class="col_1">
            
                <h3>Acc codes</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('New Acccode'), array('controller' => 'acccodes','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Acccodes'), array('controller' => 'acccodes', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
    
             <div class="col_1">
            
                <h3>Receipts</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('New Receipt'), array('controller' => 'receipts','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'receipts', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	

	
		
<li><a href="#" class="drop">Site</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Site List</h3>
				<ul>
					<li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Site'), array('controller' => 'sites','action' => 'index')); ?> </li>
                 </ul>
            </div>
			
			<div class="col_1">
            
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
            </div>
    
           
    
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	
	<li><a href="#" class="drop">Training</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Training</h3>
                <ul>
				   <li><?php echo $this->Html->link(__('Schedules Training'), array('controller' => 'Trainings', 'action' => 'schedules'),array('target'=>'_blank')); ?> </li>
                   <li><?php echo $this->Html->link(__('List Training'), array('controller' => 'Trainings', 'action' => 'index')); ?> </li>
				   <li><?php echo $this->Html->link(__('Add Training'), array('controller' => 'Trainings', 'action' => 'add')); ?> </li>
                </ul>   
                 
            </div>
    
            <div class="col_1">
            
                <h3>Course</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('List Course'), array('controller' => 'Courses','action' => 'index')); ?></li>
		            <li><?php echo $this->Html->link(__('Add Course'), array('controller' => 'Courses', 'action' => 'add')); ?> </li>
                </ul>   
                 
            </div>
    
            <div class="col_1">
            
                <h3>Module</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('List Module'), array('controller' => 'Modules','action' => 'index')); ?></li>
					<li><?php echo $this->Html->link(__('Add Module'), array('controller' => 'Modules', 'action' => 'add')); ?> </li>
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
					<li><?php echo $this->Html->link(__('Add Browsing'), array('controller' => 'Browsings', 'action' => 'add')); ?> </li>
				</ul>
				
				<h3>Eventlog</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('List Eventlogs'), array('controller' => 'Eventlogs','action' => 'index')); ?></li>
                </ul>                   
            </div>
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
		<li><a href="#" class="drop">Promotions</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Promotion</h3>
                <ul>
                 	<li><?php echo $this->Html->link(__('List Promotions'), array('controller'=>'promotions','action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Add Promotion'), array('controller' => 'promotions', 'action' => 'add')); ?> </li>
				</ul>
            </div>
    <!--
            <div class="col_1">
            
                <h3>Groups</h3>
                <ul>
					<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
					
				</ul>   
                 
            </div>
    -->
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	
	<li><a href="#" class="drop">All Reports</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Account</h3>
                <ul>
				   <li><?php echo $this->Html->link(__('Financial Month PDF'), array('controller' => 'Acctransactions', 'action' => 'listmonthdetailpdf')); ?> </li>
				   <li><?php echo $this->Html->link(__('Financial Year PDF'), array('controller' => 'Acctransactions', 'action' => 'financialpdf')); ?> </li>

                </ul> 
					
				 <h3>UserDetail</h3>
                <ul>
				   <li><?php echo $this->Html->link(__('User Detail PDF'), array('controller' => 'Userdetails', 'action' => 'userdetailpdf')); ?> </li>
				   
                  
                </ul>
				<h3>Browsings</h3>
                <ul>
				   <li><?php echo $this->Html->link(__('List Browsing'), array('controller' => 'Browsings', 'action' => 'browsepdf')); ?> </li>
				   <li><?php echo $this->Html->link(__('User Browsing Report'), array('controller' => 'Browsings', 'action' => 'browsingreport',791120035739)); ?> </li>
                  
                </ul>   				
                 
            </div>
    
            
    
         
    
          
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->

<li><a href="#" class="drop">User</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>User</h3>
				<ul>
					<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
					<li><?php echo $this->Html->link(__('Change password'), array('controller'=>'users','action' => 'updatepassword')); ?></li>
					<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>   
                 </ul>
            </div>
    
            <div class="col_1">
            
                <h3>Groups</h3>
                <ul>
					<li><?php echo $this->Html->link(__('New Group'), array('controller' => 'groups','action' => 'add')); ?></li>
					<li><?php echo $this->Html->link(__('List Groups'), array('controller' => 'groups', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
    
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	
	
</ul>

