<!-- Modal -->
<div id="create-user-modal" class="modal hide fade modal-bigger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times</button>
<h3 id="myModalLabel"> <?=(lang('Apps_createacc'))?></h3>
</div>
<div class="modal-body ">
  <form class="form-horizontal" action="<?php echo base_url(); ?>common_functions/businessSignUp/?checkino" method="POST" name="sign_up" id="sign_up" >
 	   <div class="rule_connect">
        <strong ><?=(lang('Apps_connectwith'))?></strong>
      </div>
  
 	  <div class="social_buttons hidden-phone" >
        <div class="inset">
            <a class="fb login_button" href="<?=base_url()?>home/signupAuth?provider=Facebook&Signup_business=1">
                <div class="logo_wrapper"><i class="icon-facebook icon-2x"></i></div>
                <span><?=(lang('Apps_signfb'))?></span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="<?=base_url()?>home/signupAuth?provider=Twitter&Signup_business=1">
                <div class="logo_wrapper"><i class="icon-twitter icon-2x"></i></div>
                <span><?=(lang('Apps_signtw'))?></span>
            </a>
        </div>
</div>
	  <div class="social_buttons visible-phone">
			<ul class="unstyled inline ">
			<li class="inset"> <a href="javascript:;"><i class="icon-facebook icon-3x" title="Signup with Facebook"></i></a></li>
			<li class="inset"> <a href="javascript:;"><i class="icon-twitter icon-3x" title="Signup with Twitter"></i></a></li>
			</ul>
	   </div>
	   <br/>
	   <div class="login_form">
	  <div class="row-fluid">
    <input type="text" class="offset3 span6"  placeholder=" <?=(lang('Apps_firstname'))?>" name="firstname" value="<?=(!empty($social['first_name']))?$social['first_name']:""?>" maxlength="15">
	</div>
  	 <br />
		<div class="row-fluid">
		<input type="text" class="offset3 span6"  placeholder=" <?=(lang('Apps_lastname'))?>" name="lastname" value="<?=(!empty($social['last_name']))?$social['last_name']:""?>"  maxlength="15">
		</div> 
		 <br />
		<div class="row-fluid">
		<input type="text" class="offset3 span6" placeholder=" <?=(lang('Apps_email'))?>" name="email" value="<?=(!empty($social['email']))?$social['email']:""?>" id="email" /> 
		</div> 
		 <br />
		<div class="row-fluid">
		<input type="password" class="offset3 span6" name="password" id="inputPassword" placeholder=" <?=(lang('Apps_pwd'))?>" maxlength="20">
		</div> 
		  <br />
		<div class="row-fluid">
		<input type="hidden" class="offset3 span6" name="usertype" value="businessSignUp" /> 
		</div>
		<div class="row-fluid">
    <button type="submit" class="btn btn-success offset3 span6"> <?=(lang('Apps_signup'))?></button>
   </div>
  </div>
    </form>
	</div>
</div>