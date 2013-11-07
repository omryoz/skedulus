

<div class="content container login_page">

	<div class="row-fluid">
	<?php if(isset($failure)){ ?>
	<p class="alert"><?=(lang('Apps_emailpwdnotmatch'))?></p>
	<?php }elseif(isset($alreadyUser)){ ?>
	<p class="alert"><?=(lang('Apps_activeuserforlogin'))?></p>
	<?php } ?>
		<center><h1 class="login_logo"><a href="<?php echo base_url();?>home">Skedulus</a></h1>
		
		</center>
		

	
	<hr class="hr_style">
	<div class="row-fluid">
		<div class="span4 offset4 login_form">
		<form class="logged" id="form1" method="POST" action="<?php echo base_url(); ?>admin/login/chckinfo">
			<input  type="text" class="span12" name="email"  placeholder="<?=(lang('Apps_email'))?>"  >
			<input  type="password" class="span12" name="password" placeholder="<?=(lang('Apps_pwd'))?>" maxlength="20" >
			<input type="submit" name="Login" value="<?=(lang('Apps_login'))?>" class="btn btn-success span4" />
			<input type="hidden" name="referal_url" id="referal_url" value= <?=(!empty($url)?$url:'')  ?>  >
			
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