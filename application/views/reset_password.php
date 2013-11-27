<div class="content container login_page">
	<div class="row-fluid">
           <center><h1 class="login_logo"><a href="<?php echo base_url();?>home">Skedulus</a></h1>
		<p><?=(lang('Apps_alreadyaccount'))?><b><a href="<?php echo base_url();?>home/<?php echo $signUp ?>"><?=(lang('Apps_login'))?></a></b></p>
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
		<?php print_r((!empty($message))?"<div class='alert alert-info'>".$message."</div>":"");?>
		<div class="row-fluid">	
			<div class="span4 offset4 login_form">	
			 <form class="" name="forgot-password" id="forgotpassword" method="post" action="<?=base_url()?>home/resetpassword" onsubmit="return validateconfirmpassword();" >
		
			 <h3><?=(lang('Apps_resetpassword'))?></h3>
			 
				  <input type="password" class="span12 user-success" required id="password_h" placeholder="New Password" name="password" pattern=".{6,20}" title="Password should have 6 character" maxlength="20" />
				
				
			  
				  <input type="password" class="span12" data-validation-match-match="password"  required id="rpassword_h" placeholder="Confirm Password" min="1" max="5" onBlur="match_pass('h')" pattern=".{6,20}" title="Password should have 6 character" maxlength="20"/>
				  
				   <p class="help-block"></p>
				
			 
				 <input type="hidden" name="key"  value="<?=(!empty($_GET['key'])?$_GET['key']:'')?>" /> 
				<!-- <input type="submit"  class="btn" name="Submit" value="Reset Now &raquo;"> -->
				
			  <input type="submit" name="Login" value="<?=(lang('Apps_resetnow'))?>" class="btn btn-success span5">
			  
			  
			  
			</form>
			</div>
			</div>
			</div></div>
			