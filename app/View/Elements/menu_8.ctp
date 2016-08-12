<?php echo  $this->Html->css('menu'); ?>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->
<ul id="menu"> 
	
<li><a href="#" class="drop">User</a><!-- Begin 4 columns Item -->
    
        <div class="dropdown_4columns"><!-- Begin 4 columns container -->
			<div class="col_1">
            
                <h3>User</h3>
				<ul>
                    <li><?php echo $this->Html->link('FAQ', 'https://www.dropbox.com/s/semsi8fsopytz68/CMSFAQ.docx?dl=0', array('target' => '_blank')); ?></li>
				    <li><?php echo $this->Html->link(__('Change password'), array('controller'=>'users','action' => 'updatepassword')); ?></li>
					<li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li>   
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
	
</ul>

