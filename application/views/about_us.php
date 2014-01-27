            <div class="content container">
			
			<div class="row-fluid">
				<div class="span6">
						<h3> About Us </h3>
						<P class="text">  There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.
						</P>
				</div>
				<div class="span6">
				<h3> Members </h3>
					<ul class="media-list">
  <li class="media">
    <a class="pull-left" href="#">
      <img class="media-object" data-src="holder.js/64x64" src="http://dev.eulogik.com/skedulus/common_functions/display_image/img129_1382610970.jpg/100/1/1/business_logo">
	  
    </a>
    <div class="media-body">
      <h4 class="media-heading">Media heading</h4>
   
      <div class="media">
	  <strong class="muted">Designation</strong>
	  <br clear="left">
         <a href="javascript:;"> abc@gmail.com </a>
     </div>
    </div>
  </li>
  
  <li class="media">
    <a class="pull-left" href="#">
      <img class="media-object" data-src="holder.js/64x64" src="http://dev.eulogik.com/skedulus/common_functions/display_image/img129_1382610970.jpg/100/1/1/business_logo">
    </a>
    <div class="media-body">
      <h4 class="media-heading">Media heading</h4>
   
      <div class="media">
		<strong class="muted">Designation</strong>
		<br clear="left">
        <a href="javascript:;"> abc@gmail.com </a>
     </div>
    </div>
  </li>
</ul>
					
				</div>
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
            $("#sign_up").validate({
                rules: {
                    firstname: "required",
					lastname: "required",
					gender: "required",
                    email: {
                        required: true,
                        email: true,
						remote: {
						  url: baseUrl+'home/checkEmail',
						  type: "post",
						  data: {
							email: function(){ return $("#email").val(); }
						  }
                     }
					},
					phone: {
						digits:true
					},	
					password:{ 
					required: true,
					minlength: "6",
					}
                    
                },
                messages: {
                    firstname: "Please Fill in your first name",
					lastname: "Please Fill in your last name",
					gender: "Please Fill in your gender",
                    email: {
					required: "Please Fill in your email",
					email: "Please enter a valid email address",
					remote: "Email already exist"
					},	
					phone:{
					digits: "Only numbers allowed",
					},	
					password: {
					required:"Please Fill in your password",	
					minlength:"Minimum 6 characters is required"
					}				
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '10px');
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

function passwordStrength(password)
{
	var desc = new Array();
	desc[0] = "Very Weak";
	desc[1] = "Weak";
	desc[2] = "Good";
	desc[3] = "Strong";
	
	if (password.length > 0 && password.length<=6) {
	var score=0;
	}
	if (password.length > 6 && password.length<=8) {
	var score=1;
	}
	if (password.length > 8 && password.length<=12) {
	var score=2;
	}
	if (password.length > 12 && password.length<=20) {
	var score=3;
	}
	if(password.length==0){
	var score=0;
	}
	
	 document.getElementById("passwordDescription").innerHTML = desc[score];
	 document.getElementById("passwordStrength").className = "strength" + score;
}
</script>

</div><!--row-fluid-->
</div><!--end of content-->


<!--model for add staff-->



<!--model for add service-->

 </div>
</div>

