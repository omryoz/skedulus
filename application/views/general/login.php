

<div class="content container login_page">

	<div class="row-fluid">
	<?php if(isset($failure)){ ?>
	<p class="alert"><?=(lang('Apps_emailpwdnotmatch'))?></p>
	<?php }elseif(isset($alreadyUser)){ ?>
	<p class="alert"><?=(lang('Apps_activeuserforlogin'))?></p>
	<?php } ?>
		<center><h1 class="login_logo"><a href="<?php echo base_url();?>home">Skedulus</a></h1>
		<p><?=(lang('Apps_newuser'))?><b><a href="<?php echo base_url();?>home/<?php echo $signUp ?>"><?=(lang('Apps_signup'))?></a></b></p>
		</center>
		<div class="social_buttons hidden-phone">
        <div class="inset">
            <a class="fb login_button" href="#">
                <div class="logo_wrapper"><i class="icon-facebook icon-2x"></i></div>
                <span><?=(lang('Apps_loginfb'))?></span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="#">
                <div class="logo_wrapper"><i class="icon-twitter icon-2x"></i></div>
                <span><?=(lang('Apps_logintw'))?></span>
            </a>
        </div>
    </div>
	<div class="social_buttons visible-phone">
                       <ul class="unstyled inline ">
                               <li class="inset"> <a href="javascript:;"><i class="icon-facebook icon-3x" title="Signup with Facebook"></i></a></li>
                               <li class="inset"> <a href="javascript:;"><i class="icon-twitter icon-3x" title="Signup with Twitter"></i></a></li>
                       </ul>
               </div>
	
	<hr class="hr_style">
	<div class="row-fluid">
		<div class="span4 offset4 login_form">
		
		<form class="logged" id="form1" method="POST" action="<?php echo base_url(); ?>common_functions/<?php echo $userRole ?>/?checkinfo">
			<input  type="text" class="span12" name="email"  placeholder="<?=(lang('Apps_email'))?>"  >
			<input  type="password" class="span12" name="password" placeholder="<?=(lang('Apps_pwd'))?>" maxlength="20" >
			<input type="submit" name="Login" value="<?=(lang('Apps_login'))?>" class="btn btn-success span4" />
			<input type="text" name="referal_url" id="referal_url" value= <?=(!empty($url)?$url:'')  ?>  >
			
			<a href="javascript:;" class="pull-right revert reveall" onClick="$('#form2').toggle();$('#form1').toggle();"><?=(lang('Apps_forgetpwd'))?></a>
		  
		</form>
		
		<form  class="reset" id="form2">
		   <input  type="text" class="span12"  placeholder="<?=(lang('Apps_emailaddress'))?>" >
		   <!-- <a href="business_overview.php" type="submit" class="btn btn-success span4">Reset</a> -->
		   <input type="submit" name="Reset" value="<?=(lang('Apps_reset'))?>" class="btn btn-success span4" />
		   <a href="javascript:;" class="pull-right revert" onClick="$('#form2').toggle();$('#form1').toggle();"><?=(lang('Apps_backtologin'))?></a>
		</form>
		</div>
	</div>
	</div>
	
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/modernizr-custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/polyfiller.js"></script>
<script>
    // Polyfill all unsupported features
    $.webshims.polyfill();	
</script>