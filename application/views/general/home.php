	<div class="content ">
	<?php if(isset($success)){ ?>
	<p class="alert">Please check your mail and click on the verification link we sent you to continue with your business registration.</p>
	<?php } ?>
		<div class="container">
			<div class="row-fluid ">
				<div class="span12">
					<div class="sp-slideshow">
						<input id="button-1" type="radio" name="radio-set" class="sp-selector-1" checked="checked" />
						<label for="button-1" class="button-label-1"></label>	
						<input id="button-2" type="radio" name="radio-set" class="sp-selector-2" />
						<label for="button-2" class="button-label-2"></label>	
						<input id="button-3" type="radio" name="radio-set" class="sp-selector-3" />
						<label for="button-3" class="button-label-3"></label>	
						<input id="button-4" type="radio" name="radio-set" class="sp-selector-4" />
						<label for="button-4" class="button-label-4"></label>	
						<input id="button-5" type="radio" name="radio-set" class="sp-selector-5" />
						<label for="button-5" class="button-label-5"></label>	
						<label for="button-1" class="sp-arrow sp-a1"></label>
						<label for="button-2" class="sp-arrow sp-a2"></label>
						<label for="button-3" class="sp-arrow sp-a3"></label>
						<label for="button-4" class="sp-arrow sp-a4"></label>
						<label for="button-5" class="sp-arrow sp-a5"></label>	
						<div class="sp-content">
							<div class="sp-parallax-bg"></div>
							<ul class="sp-slider clearfix">
								<!--<li><img src="images/banner_left.png" alt="image01" class="banner_l" /> <img src="images/banner_right.png" alt="image02" class="banner_l" /></li>
								<li><img src="images/second_layer.png" alt="image03" /></li>-->
								<li class="slider-first"><img src="<?php echo base_url(); ?>img/text1.png"><img src="<?php echo base_url(); ?>img/calendar1.png">
									<a  class="btn btn-primary span4 " href="#create-user-modal" role="button"  data-toggle="modal" >Start your free Trial</a>
								</li>
								<li><img src="<?php echo base_url(); ?>img/text2.png"><img src="<?php echo base_url(); ?>img/calendar2.png"></li>
								<li><img src="<?php echo base_url(); ?>img/text3.png"><img src="<?php echo base_url(); ?>img/calendar3.png"></li>
								<li><img src="<?php echo base_url(); ?>img/text4.png"><img src="<?php echo base_url(); ?>img/calendar4.png"></li>
								<li><img src="<?php echo base_url(); ?>img/text5.png"><img src="<?php echo base_url(); ?>img/calendar5.png"></li>
							</ul>
						</div><!-- sp-content -->
					</div><!-- sp-slideshow -->
				</div>
		
			</div><!--row-fluid ends here-->
		
			<div class="row-fluid" >
			<!--code for left nav start from here-->
				<div class="span9 left-nav">
				<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3>Search Businesses</h3>
				<div class="row-fluid strip">
					<form action="global_search.php">
					<div class="span4">
						<input type="text" class="span12 " placeholder="Business are you looking for?">
					</div>
					<div class="span3">
						<input type="text" class="span12 " placeholder="Location">	
					</div>
					<div class="span3">													
						<select class="span12" >
								<option value="0">Categories</option>
								<option value="1">Hair Style</option>
								<option value="2">Boutique</option>
								<option value="3">Spa</option>
								<option value="4">Yoga classes</option>
						</select>	
					</div>
					<div class="span2">						
						 <a  href="global_search.php" class="btn span12 pull-right btn-success"> 
						 	<i class="icon-search"></i> <span class="hidden-tablet">Search</span>
						  </a>
					</div>
					</form>
				</div>
			</div>
		</div>
					
					<div class="row-fluid Wrap">
					 <div class="wrap_inner">
					 <?php $i=0; ?>
					 
							<ul class="thumbnails business_logo">
							<?php foreach($contentList as $content) {
							if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							}
							?>
								<li class="thumbnail span3 trans">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
										<img src="<?php echo base_url(); ?>uploads/business_logo/<?php echo $content['image']; ?>">
										<div class="caption">
											<p class="text-left"><strong><?php echo $content['name']; ?></strong></p>
											<small> <?php echo $content['category_name']; ?> </small>
										</div>
									</a>
								</li>
								
							<?php $i++; } ?>
								</ul>
							
						
					</div>
		  		</div>
				</div>
				<!--code for left nav end  here-->
				
				<!--code for right nav start from here-->
				<div class="span3 right-nav" >
					<div class="row-fluid Wrap">
						<div class="wrap_inner">
							<h3>Offers</h3>
							<div class="offer" >
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Sarah Williams</strong>
										<p>Hair Studio</p>
										<small><i>On hair cut</i> </small>
									</div>
									<div class=" pull-right span4" >
										<div id="burst-12">
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="offer">
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Amma Quater</strong>
										<p>Hair Studio</p>
										<small><i>On body massage</i></small> 
									</div>
									<div class=" pull-right span4">
										<div id="burst-12">
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="offer">
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Amma Quater</strong>
										<p>Hair Studio</p>
										<small><i>On body massage</i></small> 
									</div>
									<div class=" pull-right span4">
										<div id="burst-12" >
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<a  href="offer.php" class="pull-right">view more..</a>					
						</div>
					</div>  							
				</div>
				<!--code for right nav end  here-->
			</div><!--row  fluid ends here-->
		</div>	
	</div><!--code for content  end  here-->
 
<!-- Modal -->
<div id="create-user-modal" class="modal hide fade modal-bigger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Create Account</h3>
</div>
<div class="modal-body">
  <form class="form-horizontal" action="<?php echo base_url(); ?>home/businessSignUp/?checkino" method="POST" name="sign_up" id="sign_up" >
	<div class="control-group">
    <label class="control-label" for="inputEmail">First Name</label>
    <div class="controls">
    <input type="text"  placeholder="First Name" name="firstname" value="" maxlength="15">
    </div>
    </div>
	<div class="control-group">
    <label class="control-label" for="inputEmail">Last Name</label>
    <div class="controls">
    <input type="text"  placeholder="Last Name" name="lastname" value=""  maxlength="15">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
    <input type="text" placeholder="Email" name="email" value="" id="email">
    </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
    <input type="password" name="password" id="inputPassword" placeholder="Password" maxlength="20">
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    <input type="hidden" name="usertype" value="businessSignUp" /> 
    <button type="submit" class="btn btn-success">Sign up</button>
    </div>
    </div>
    </form>
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
</div>
	