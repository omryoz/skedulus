<div class="content container login_page">
	<div class="row-fluid">
           <center><h1 class="login_logo"><a href="<?php echo base_url();?>home">Skedulus</a></h1>
		
		</center>
		      
		
		<hr class="hr_style">
		<?php print_r((!empty($message))?"<div class='alert alert-info'>".$message."</div>":"");?>
		<div class="row-fluid">	
			<div class="span4 offset4 login_form">	
			 <form class="" name="forgot-password" id="forgotpassword" method="post" action="<?=base_url()?>admin/login/reset"  >
		
			 <h3>Reset Password </h3>
			 
				  <input type="password"  class="span12 user-success" required id="password" placeholder="New Password" name="password" maxlength="20" />
				
				
			  
				  <input type="password" name="confirmpassword" class="span12" data-validation-match-match="password"  required id="rpassword_h" placeholder="Confirm Password"  maxlength="20"/>
				  
				   <p class="help-block"></p>
				
			 
				 <input type="hidden" name="key"  value="<?=(!empty($_GET['key'])?$_GET['key']:'')?>" /> 
				<!-- <input type="submit"  class="btn" name="Submit" value="Reset Now &raquo;"> -->
				
			  <input type="submit" name="Login" value="Reset Now" class="btn btn-success span5">
			  
			  
			  
			</form>
			</div>
			</div>
			</div></div>
	<script>


(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        
		setupFormValidation: function()
        {
            $("#forgotpassword").validate({
                rules: {
                    password:{ 
					required: true,
					minlength: "6",
					},
					confirmpassword:{
					//"required",
					equalTo: "#password"
					}
                },
                messages: {
                   password: {
					required:"  Please Fill in your password",	
					minlength:" Minimum 6 characters is required"
					},
					confirmpassword:{
					//required: "Only numbers allowed",
					equalTo: "  Password does not match"
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