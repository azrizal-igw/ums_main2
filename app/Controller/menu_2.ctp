<?php echo  $this->Html->css('menu'); ?>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
<ul id="menu"> 
<li><a href="#submitted" class="drop" id="menu_status_acc"><?php echo $this->Html->link(__('Account'), array('controller' => 'accbalances', 'action' => 'listacc',4,1),array('class'=>'status_4')); ?></a><!-- Begin 4 columns Item -->

   
</li><!-- End 4 columns Item -->	


		
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
	
	<li><a href="#" class="drop">Receipt</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>Receipt</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('List Receipt'), array('controller' => 'Receipts', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
    
          
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->

    <li><a href="#" class="drop">Browsing</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
            <div class="col_1">
            
                <h3>Browsing</h3>
                <ul>
                   <li><?php echo $this->Html->link(__('List Browsing'), array('controller' => 'Browsings', 'action' => 'index')); ?> </li>
                </ul>   
                 
            </div>
    
          
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
	
	<li><a href="#" class="drop">Userdetail</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                
                <h3>Userdetail</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('List Userdetail'), array('controller' => 'Userdetails','action' => 'index')); ?></li>
                </ul>   
                 
            </div>
            
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->

    <li><a href="#" class="drop">User</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
            <div class="col_1">
            
                <h3>User</h3>
                <ul>
                    <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>   
                 </ul>
            </div>

    
           
        </div><!-- End 4 columns container -->
    
    </li><!-- End 4 columns Item -->
    
	
</ul>

