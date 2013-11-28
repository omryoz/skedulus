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
	<a href="javascript:;" class="pull-right revert reveall" onClick="$('#form2').toggle();$('#sign_up').toggle();"><?="Send link again?"?></a>
   </div>
  </div>
    </form>
	<form name="reset" class="reset" id="form2" method="post" action="<?=base_url()?>home/resend">
		   <input  type="text" class="span3"  placeholder="<?=(lang('Apps_emailaddress'))?>" name="toemail" />
		   <input type="submit" name="submit" value="<?="Send"?>" class="btn btn-success span4" value="Reset" />
		   <a href="javascript:;" class="pull-right revert" onClick="$('#form2').toggle();$('#sign_up').toggle();"><?=(lang('Apps_back'))?></a>
	</form>
	</div>
</div>

<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#form2").validate({
                rules: {
					toemail: {
                        required: true,
                        email: true,
					},
                },
                messages: {
				toemail: {
					required: "  required",
					email: "  invalid email id",
					},					
                },
				
				errorPlacement: function(error, element) {
				  error.insertAfter( element ); 
				},

                submitHandler: function(form) {
                form.submit();
                }
            });
        }
		
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

</script>