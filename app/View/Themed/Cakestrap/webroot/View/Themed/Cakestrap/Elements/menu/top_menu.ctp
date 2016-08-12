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
       <a class="brand" href="../">URC Pest Control</a>
       <div class="nav-collapse collapse" id="main-menu">
        <ul class="nav" id="main-menu-left">
          <li><a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'index'));?>">Project</a></li>
          <li><a href="<?php echo $this->Html->url(array('controller' => 'projects', 'action' => 'more'));?>">More</a></li>
          <!--<li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Preview <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="../default/">Default</a></li>
              <li class="divider"></li>
              <li><a href="../amelia/">Amelia</a></li>
              <li><a href="../cerulean/">Cerulean</a></li>
              <li><a href="../cosmo/">Cosmo</a></li>
              <li><a href="../cyborg/">Cyborg</a></li>
              <li><a href="../journal/">Journal</a></li>
              <li><a href="../readable/">Readable</a></li>
              <li><a href="../simplex/">Simplex</a></li>
              <li><a href="../slate/">Slate</a></li>
              <li><a href="../spacelab/">Spacelab</a></li>
              <li><a href="../spruce/">Spruce</a></li>
              <li><a href="../superhero/">Superhero</a></li>
              <li><a href="../united/">United</a></li>
            </ul>
          </li>
          <li class="dropdown" id="preview-menu">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Download <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a target="_blank" href="bootstrap.min.css">bootstrap.min.css</a></li>
              <li><a target="_blank" href="bootstrap.css">bootstrap.css</a></li>
              <li class="divider"></li>
              <li><a target="_blank" href="variables.less">variables.less</a></li>
              <li><a target="_blank" href="bootswatch.less">bootswatch.less</a></li>
            </ul>
          </li>!-->
        </ul>
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip"  href="#" title="Login as <?php echo $this->Session->read('Auth.Group.name');?>" ><?php echo $this->Session->read('Auth.User.username');?></a></li>
          <li><a rel="tooltip" href="<?php echo $this->Html->url(array('controller' => 'users', 'action' => 'logout'));?>" title="Log Out" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'wrapbootstrap']);">Logout <i class="icon-share-alt"></i></a></li>
        </ul>
       </div>
     </div>
   </div>
 </div>