<?php echo  $this->Html->css('menu'); ?>
<?php $httphost = (isset($_SERVER['HTTPS'])  ? 'https://' : 'http://').$_SERVER['HTTP_HOST'];?>
<!--[if IE 6]>
<style>
body {behavior: url("csshover3.htc");}
#menu li .drop {background:url("img/drop.gif") no-repeat right 8px; 
</style>
<![endif]-->


<!--<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar" type="button">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="#" class="brand">URC Pest Control</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a class="navbar-link" href="#">< ?php echo $this->Session->read('Auth.User.name');?></a>&nbsp;[<?php echo $this->Html->link(__('Logout'),array('controller' => 'users', 'action' => 'logout'));?>]
            </p>
            <ul class="nav">
              <li class="active"><a href="< ?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index'));?>">Project</a></li>
              <li><a href="< ?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'more'));?>">More</a></li>
              <li><a href="#contact">Contact</a></li>
              
            </ul>
          </div>/.nav-collapse -    
        </div>
      </div>
    </div>
    
      <!-- Navbar
    ================================================== -->
 <div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">
       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>
       <a class="brand" href="../">UMS Web</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Account <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
             <li><a href="<?php echo $httphost;?>/#accdetail/<?php echo $this->Session->read('Auth.User.sitecode')?>/<?php echo date('Ym')?>">Monthlya</a></li>
                    <li><a href="<?php echo $httphost;?>/#yearly">Yearly</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Site <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
            
            <li><?php echo $this->Html->link(__('New Site'), array('controller' => 'sites','action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Site'), array('controller' => 'sites','action' => 'index')); ?> </li>

            <li class="divider"></li>
            <li><?php echo $this->Html->link(__('New District'), array('controller' => 'districts','action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List District'), array('controller' => 'districts','action' => 'index')); ?> </li>

            <li class="divider"></li>
            <li><?php echo $this->Html->link(__('New Mukim'), array('controller' => 'mukims','action' => 'add')); ?></li>
            <li><?php echo $this->Html->link(__('List Mukim'), array('controller' => 'mukims','action' => 'index')); ?> </li>
            </ul>


          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Trainning <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
                <li><?php echo $this->Html->link(__('List Training'), array('controller' => 'Trainings', 'action' => 'index')); ?> </li>
                <li><?php echo $this->Html->link(__('Add Training'), array('controller' => 'Trainings', 'action' => 'add')); ?> </li>
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">UserDetail <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
                <li><?php echo $this->Html->link(__('List Userdetails'), array('controller'=>'userdetails','action' => 'index')); ?>  </li> 
                <li><?php echo $this->Html->link(__('Add Userdetail'), array('controller' => 'Userdetails', 'action' => 'add')); ?> </li>
                
            </ul>
          </li>

          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Browsing <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
             <li><?php echo $this->Html->link(__('List Browsings'), array('controller'=>'browsings','action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('Add Browsing'), array('controller' => 'Browsings', 'action' => 'add')); ?> </li>
                
            </ul>
          </li>

           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Receipt <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
             <li><?php echo $this->Html->link(__('List Receipts'), array('controller' => 'Receipts','action' => 'index')); ?></li>
            </ul>
          </li>

           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Eventlogs <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
            <li><?php echo $this->Html->link(__('List Eventlogs'), array('controller' => 'Eventlogs','action' => 'index')); ?></li>
            </ul>
          </li>

             <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">User <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
           <li><?php echo $this->Html->link('User Manual','/files/umswebmanual.pdf'); ?></li>
                    <li><?php echo $this->Html->link(__('Change password'), array('controller'=>'users','action' => 'updatepassword')); ?></li>
                    <li><?php echo $this->Html->link(__('Logout'), array('controller' => 'users', 'action' => 'logout')); ?> </li> 
            </ul>
          </li>
        
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip"  href="#" title="Login as <?php echo $this->Session->read('Auth.Group.name');?>" ><?php echo $this->Session->read('Auth.User.username');?></a></li>
          <li><a rel="tooltip" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>" title="Log Out" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'wrapbootstrap']);">Logout <i class="icon-share-alt"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>


