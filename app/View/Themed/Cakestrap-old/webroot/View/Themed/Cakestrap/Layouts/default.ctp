<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>URC Pest Control</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="URC Pest Control">
    <meta name="author" content="">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


    <?php echo $this->Html->css('bootstrap');?>
    <?php echo $this->Html->css('bootstrap-responsive.min');?>
    
    <!-- Load Css x-editable -->
    <?php echo $this->Html->css('../bootstrap-editable/css/bootstrap-editable');?>
    
    <?php echo $this->Html->css('font-awesome.min');?>

    <?php echo $this->Html->css('bootswatch');?>
    <?php echo $this->Html->css('bootstrap-modal');?>
    <?php echo $this->Html->script('libs/jquery');?>  
    <!--
     <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
   <script type="text/javascript">

     var _gaq = _gaq || [];
      _gaq.push(['_setAccount', 'UA-23019901-1']);
      _gaq.push(['_setDomainName', "bootswatch.com"]);
        _gaq.push(['_setAllowLinker', true]);
      _gaq.push(['_trackPageview']);

     (function() {
       var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
       ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
     })();

   </script>
!-->
  </head>

  <body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">
    <script src="../js/bsa.js"></script>


		
				<?php echo $this->element('menu/top_menu'); ?>
                <div class="container-fluid">
<?php echo $this->Session->flash(); ?>
    <div class="container">
				<?php echo $this->fetch('content'); ?></div>
                
                
               
               </div>

			

		
	
					<?php echo $this->element('sql_dump'); ?>
			<!-- .container -->
		
	 </table>
</section>



<br><br><br><br>

     <!-- Footer
      ================================================== -->
      <hr>

      <footer id="footer">
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
     
    <?php echo $this->Html->script('libs/bootstrap.min');?> 
    
    <!--LOAD x-editable -->
    <?php echo $this->Html->script('../bootstrap-editable/js/bootstrap-editable');?>
    
    <?php echo $this->Html->script('libs/bootstrap-modal');?>
    <?php echo $this->Html->script('libs/bootstrap-modalmanager');?>
    
    <?php echo $this->Html->script('libs/jquery.smooth-scroll.min');?>
    
    <?php echo $this->Html->script('libs/bootswatch');?>
    <?php echo $this->fetch('script');?>



  </body>
</html>
