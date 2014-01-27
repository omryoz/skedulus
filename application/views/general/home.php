<?php if($this->session->userdata('language')=='hebrew'){ ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=iw"></script>
<?php }else{?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>
<script src="<?php echo base_url(); ?>js/googlemap.js"></script>
	
	<div class="content ">
	<?php if(isset($msg)){ ?>
	<p class="alert"><?=$msg ?></p>
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
									<a  class="btn btn-primary span4 managerSignup" href="#" role="button"  data-toggle="modal" ><?=(lang('Apps_startyourfreetrial'))?></a>
								</li>
								<li class="slider-first"><img src="<?php echo base_url(); ?>img/text2.png"><img src="<?php echo base_url(); ?>img/calendar2.png">
								<a  class="btn btn-primary span4 managerSignup" href="#" role="button"  data-toggle="modal" ><?=(lang('Apps_startyourfreetrial'))?></a></li>
								<li class="slider-first"><img src="<?php echo base_url(); ?>img/text3.png"><img src="<?php echo base_url(); ?>img/calendar3.png"><a  class="btn btn-primary span4 managerSignup" href="#" role="button"  data-toggle="modal" ><?=(lang('Apps_startyourfreetrial'))?></a></li>
								<li class="slider-first"><img src="<?php echo base_url(); ?>img/text4.png"><img src="<?php echo base_url(); ?>img/calendar4.png">
								<a  class="btn btn-primary span4 managerSignup" href="#" role="button"  data-toggle="modal" ><?=(lang('Apps_startyourfreetrial'))?></a></li>
								<li class="slider-first"><img src="<?php echo base_url(); ?>img/text5.png"><img src="<?php echo base_url(); ?>img/calendar5.png">
								<a  class="btn btn-primary span4 managerSignup" href="#" role="button"  data-toggle="modal" ><?=(lang('Apps_startyourfreetrial'))?></a></li>
							</ul>
						</div><!-- sp-content -->
					</div><!-- sp-slideshow -->
				</div>
		
			</div><!--row-fluid ends here-->
		
			<div class="row-fluid" >
			<!--code for left nav start from here-->
				<div class="span12 left-nav">
				<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3><?=(lang('Apps_searchbusiness'))?></h3>
				<div class="row-fluid strip">
					<form action="<?php echo base_url(); ?>search/global_search" method="POST" name="search">
					<div class="span4">
						<input type="text" class="span12 " name="manager_name" placeholder="<?=(lang('Apps_businessfor'))?>">
					</div>
					<div class="span3">
					<!----<input id="searchTextField" type="text"  class="span12 " size="50" placeholder="<?=(lang('Apps_enterlocation'))?>" autocomplete="on" runat="server" />  
                    <input type="hidden" id="city2" name="location" />--->
					
					<input  type="text"  class="postcode span12" id="Postcode" placeholder="<?=(lang('Apps_enterlocation'))?>" name="location" size="50" autocomplete="on" runat="server" />  
					<div id="geomap" style="display:none" style="width:100%; height:400px;">
					<p><?=(lang('Apps_loadingwait'))?>...</p> </div>
					
					</div>
					
					<div class="span3">		
                     <?php $selected = "" ?>
					 <?php echo form_dropdown('category',$getCategory,$selected,' id="category" class="span12"')  ?>						
					</div>
					<div class="span2">	
                    <input type="submit" name="search" class="btn span12 pull-right btn-success" value="<?=(lang('Apps_search'))?>" />					
						 
					</div>
					</form>
				</div>
			</div>
		</div>
					<div class="row-fluid static-info">
								<div class="span4">
									<div class="row-fluid">
										<div class="span2 magic">
											<i class="icon-magic"></i>
										</div>
										<div class="span10">
											<h3>SIMPLIFY YOUR LIFE</h3>
												<p>Skeduler provides a blend of simplicity and speed to help you book your appointments from anywhere, anytime.</p>
										</div>
									</div>
								</div>
								<div class="span4">
									<div class="row-fluid">
										<div class="span2 normal">
											<i class="icon-mobile-phone"></i>
										</div>
										<div class="span10">
											<h3>WE'LL REMIND YOU</h3>
												<p>Get notifications straight to your phone if your appointment is canceled or re-scheduled by text or email.</p>
										</div>
									</div>

								
								
								</div>
								<div class="span4">
									<div class="row-fluid">
										<div class="span2 normal">
										<i class="icon-time"></i>
										</div>
										<div class="span10">
											<h3>INSTANT BOOKINGS</h3>
											<p>Appointments booked, or canceled, are always guaranteed. There is no waiting, no call backs. Simply select, book and done.</p>
										</div>
									</div>

					</div>
				</div>
					<!---<div class="row-fluid Wrap">
					 <div class="wrap_inner">
					 <?php if(!empty($contentList)){ $i=1; ?>
					 
							<ul class="thumbnails business_logo">
							<?php
							
							foreach($contentList as $content) {
							
							?>
								<li class="thumbnail span3 trans">
									<div class="inblock"><a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
										
										<img src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($content['image'])?$content['image']:'default.png'); ?>/280/1/1/business_logo">
										
										
										
									</a>
									</div>
									<div class="caption">
											<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>"><p class="text-left"><strong><?php echo $content['business_name']; ?></strong></p>
											<small> <?php echo $content['category_name']; ?> </small>
											</a>
										</div>
									
								</li>
								
							<?php if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							}
							$i++; }  ?>
								</ul>
							<center><span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
						<?php }else{ ?>
						<p class="alert"><? echo "No businesses yet";?></p>
						<?php }?>
					</div>--->
		  		</div>
				</div>
				<!--code for left nav end  here-->
				
				<!--code for right nav start from here-->
				<!-- <div class="span3 right-nav" >
					<div class="row-fluid Wrap">
						<div class="wrap_inner">
							<h3><?=(lang('Apps_offer'))?></h3>
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
							<a  href="offer.php" class="pull-right"><?=(lang('Apps_viewmore'))?>..</a>					
						</div>
					</div>  							
				</div> -->
				<!--code for right nav end  here-->
			</div><!--row  fluid ends here-->
		</div>	
	</div><!--code for content  end  here-->
 

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
                    firstname: " Please Fill in your first name",
					lastname: " Please Fill in your last name",
					gender: " Please Fill in your gender",
                    email: {
					required: " Please Fill in your email",
					email: " Please enter a valid email address",
					remote: " Email already exist"
					},	
					phone:{
					digits: " Only numbers allowed",
					},	
					password: {
					required:" Please Fill in your password",	
					minlength:" Minimum 6 characters is required"
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
    $(".managerSignup").click(function(){
		$('#create-user-modal').modal('show'); 
		$('.error').html(''); 
		$("#sign_up")[0].reset();$("#form2")[0].reset();
		$('#sign_up').show();$('#form2').hide();
	})
</script>

<?php if(!empty($Signup_business)){?>
	<script>
	
	$(document).ready(function(){
	
		$('#create-user-modal').modal('show'); 
	});
	</script>
<?php } ?>

</div>
