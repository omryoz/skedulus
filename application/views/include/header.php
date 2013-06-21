<!DOCTYPE html>
<html>
  <head>
    <title>Skedulus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	


<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/style.less" />
<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/datepicker.less"/>
<link rel="stylesheet" href="<?php echo base_url(); ?>css/slider.css" />
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>

<script>var baseUrl='<?php echo base_url();?>'</script>
<script src="<?php echo base_url(); ?>js/libs/less-1.3.0.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>


<!------for edit/delete script ----->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>functions/script.js"></script>
<!---End----------------->




  </head>
  <body>
 
  
   <header class="navbar navbar-top" >
   <!------------------------------------>
   
								
			<div class="container">			<!------------------------------------>		
              <div class="navbar-inner navbar-static-top" >
			   	 <div class="inner">
                	<div class="container">
                  		<a class="btn btn-navbar " data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
                  		</a>
						
				 		<a class="brand" href="#"><h1>Skedulus</h1></a>
						<!--<img src="images/share.png"  class="brand_img">-->
						
						<?php if(isset($this->session->userdata['id'])) { ?>
						<div class="nav-collapse collapse">
							<ul class="nav pull-right" id="main-menu">
								<li><div class="language_flag " ><a href="#" class="setting-icon"><i class="icon-cog icon-white" title="settings"></i> </a></div></li>
								<li><div class="language_flag" >Hello <a href="#"><?php echo $this->session->userdata['username']; ?></a></div></li>
								<li><a href="<?php echo base_url(); ?>home/logout">Log Out</a></li>
								<li><div class="language_flag"><a href="#" title="English" ><img src="<?php echo base_url(); ?>images/bri12.png"></a>
			  <a href="#" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div></li>
	   						</ul>
							
                 		</div>
						<?php }else{?>
                 	 	<div class="nav-collapse collapse">
							<ul class="nav pull-right" id="main-menu">
								<li><a href="<?php echo base_url();?>index.php">Home</a></li>
								<li><a href="<?php echo base_url();?>home/clientSignUp">Sign Up</a></li>
								<li><a href="<?php echo base_url();?>home/clientlogin">Log In</a></li>
								<li><div class="language_flag"><a href="#" title="English" ><img src="<?php echo base_url(); ?>images/bri12.png"></a>
			  <a href="#" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div></li>
	   						</ul>
							
                 		</div><!-- /.nav-collapse -->
						<?php }?>
						
                	</div>
				 </div>
				<div class="language_flag1"><a href="#" title="English" ><img src="<?php echo base_url(); ?>images/bri12.png"></a>
			  <a href="#" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div>
			  
              </div><!-- /navbar-inner -->
			  
			 
			</div>  
    </header>




