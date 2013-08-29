<!DOCTYPE html>
<html>
  <head>
    <title>Skedulus</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	


<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/style.less" />
<!--<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/bootstrap/datepicker.less"/>
--><link rel="stylesheet" href="<?php echo base_url(); ?>css/slider.css" />
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<!--behavior: url(<?php echo base_url(); ?>/PIE-1.0.0/PIE.htc);-->
<script>var baseUrl='<?php echo base_url();?>'</script>
<script src="<?php echo base_url(); ?>js/libs/less-1.3.0.min.js"></script>
 <script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/modernizr-custom.js"></script>
<!-- for html5 support in ie8 -->
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/polyfiller.js"></script>
<script>
    // Polyfill all unsupported features
    $.webshims.polyfill();	
</script>
<!-- for html5 support in ie8 end-->
	
<?php /*?><script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script><?php */?>
<!------for edit/delete script ----->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>functions/script.js"></script>
<!---End----------------->
<link href='<?php echo base_url(); ?>css/apprise.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url(); ?>js/apprise-1.5.full.js"></script>
<script>
var base_url = "http://localhost/skedulus/";
</script>
  </head>
  <body class="ie6 ie7 ie8">
 
  
   <div class="navbar navbar-top" >
   <!------------------------------------>
   
								
			<div class="container">			<!------------------------------------>		
              <div class="navbar-inner navbar-static-top" >
			   	 <div class="inner">
                	<div class="container">
                  		<a class="btn btn-navbar " data-toggle="collapse" data-target=".menu-top">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
                  		</a>
						
				 		<a class="brand" href="#"><h1>Skedulus</h1></a>
						<!--<img src="images/share.png"  class="brand_img">-->
						
						<?php if(isset($this->session->userdata['id'])) { ?>
						<div class="nav-collapse collapse menu-top">
							<ul class="nav pull-right" id="main-menu">
								<!---<li><a href="btn btn-success">	</li>--->
								<li><div class="language_flag " ><a href="#" class="setting-icon"><i class="icon-cog icon-white" title="settings"></i> </a></div></li>
								<li><div class="language_flag" >Hello <a href="#"><?php echo $this->session->userdata['username']; ?></a></div></li>
								<li><a href="<?php echo base_url(); ?>home/logout">Log Out</a></li>
								<li><div class="language_flag"><a href="#" title="English" ><img src="<?php echo base_url(); ?>images/bri12.png"></a>
			  <a href="#" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div></li>
	   						</ul>
							
                 		</div>
						<?php }else{?>
                 	 	<div class="nav-collapse collapse menu-top">
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
    </div>

<?php if($this->session->flashdata('message_type')) { ?>
<div class="alert alert-<?=$this->session->flashdata('message_type')?>">
<a class="close" data-dismiss="alert" href="#">×</a>
<?=$this->session->flashdata('message');?>	
</div>
<?php } ?>


