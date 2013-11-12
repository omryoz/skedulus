<!DOCTYPE html>
<html>
  <head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Skedulus</title>
<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/style.less" />
<!--<link rel="stylesheet/less" href="<?php echo base_url(); ?>less/bootstrap/datepicker.less"/>
--><link rel="stylesheet" href="<?php echo base_url(); ?>css/slider.css" />
<link href='http://fonts.googleapis.com/css?family=Berkshire+Swash' rel='stylesheet' type='text/css'>
<!--behavior: url(<?php echo base_url(); ?>/PIE-1.0.0/PIE.htc);-->
<script>var baseUrl='<?php echo base_url();?>'</script>
<script src="<?php echo base_url(); ?>js/libs/less-1.3.0.min.js"></script>
<!--<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.js">
</script>

<script>
var base_url = "http://localhost/skedulus/";
</script>



<!------for edit/delete script ----->
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>functions/script.js"></script>
<!---End----------------->
<link href='<?php echo base_url(); ?>css/apprise.css' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="<?php echo base_url(); ?>js/apprise-1.5.full.js"></script>



  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
     
	  <script src="<?php echo base_url(); ?>js/respond/html5shiv.js"></script>
      <script src="<?php echo base_url(); ?>js/respond/respond.min.js"></script>
    <![endif]-->

  </head>
 
  <body class="ie6 ie7 ie8 <?=(lang('Apps_lang'))?>">
   <div class="navbar navbar-top" >
   
   
								
			<div class="container ">			<!------------------------------------>		
              <div class="navbar-inner navbar-static-top" >
			   	 <div class="inner">
                	<div class="container <?=(lang('Apps_lang'))?>">
                  		<a class="btn btn-navbar " data-toggle="collapse" data-target=".menu-top">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
                  		</a>
						<?php 
						if($this->session->userdata['role']=='admin' || isset($this->session->userdata['admin'])){
						 $url=base_url().'admin/dash/userslist';
						} 
						 ?>
				 		<a class="brand pull-left" href="<?php echo $url; ?>"><h1>Skedulus</h1></a>
						<!--<img src="images/share.png"  class="brand_img">-->
						
						<?php if(isset($this->session->userdata['id'])) { ?>
						<div class="nav-collapse collapse menu-top">
							<ul class="nav pull-right" id="main-menu">
								<?php  if(isset($switch)){?>
								<li><div> 
								<a href="<?php echo base_url(); ?>admin/dash/businesslist" name="my" id="my_selected" class="btn   btn-switch " oncontextmenu="return false;" >Admin Dashboard</a> 
								</div></li><?php } ?>
								<li><div class="language_flag" ><?=(lang('Apps_hello'))?> <a href="javascript:;"><?php echo $this->session->userdata['username']; ?></a></div></li>
								<li><a href="<?php echo base_url(); ?>admin/dash/logout"><?=(lang('Apps_logout'))?></a></li>
								<li>
								<div class="language_flag">
								
								<a href="<?=base_url();?>welcome/language/english" title="English" >
									<img src="<?php echo base_url(); ?>images/bri12.png">
								</a>
				                <a href="<?=base_url();?>welcome/language/hebrew" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div></li>
	   						</ul>
							
                 		</div>
						<?php }else{?>
                 	 	<div class="nav-collapse collapse menu-top">
							<ul class="nav pull-right" id="main-menu">
								<li><a href="<?php echo base_url();?>index.php"><?=(lang('Apps_home'))?></a></li>
								<li><a href="<?php echo base_url();?>home/clientSignUp"><?=(lang('Apps_signup'))?></a></li>
								<li><a href="<?php echo base_url();?>home/clientlogin"><?=(lang('Apps_login'))?></a></li>
								<li>
								<div class="language_flag">
								
								<a href="<?=base_url();?>welcome/language/english" title="English" >
									<img src="<?php echo base_url(); ?>images/bri12.png">
								</a>
				<a href="<?=base_url();?>welcome/language/hebrew" class="img2" title="Hebrew"><img src="<?php echo base_url(); ?>images/is13.png"></a></div></li>
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
<a class="close" data-dismiss="alert" href="#">�</a>
<?=$this->session->flashdata('message');?>	
</div>
<?php } ?>

