            <div class="content container">
			<div id="myTabContent" class="tab-content tabcontentbg">
              <div class="tab-pane fade active in " id="home">
					<div class="row-fluid">
						<h4 > <?=(lang('Apps_subscription'))?>:</h4> <br>
						<center> <?php //print_r($details); ?>
						<?php foreach($details as $val){ ?>
						<div class="span3 freebox">
							<h3><?php echo $val->title; ?></h3>
							<div class="span10 offset1">
								<table class="table table-striped subs-tab">
									<tbody>
									<?php if($val->users_num=='1' && $val->users_type!='morethan'){
											  $user='Single';
											  $userVal='only 1';
											}else{
											  if($val->users_type=='upto'){
											   $user='upto '.$val->users_num;
											   $userVal=$user;
											  }
											  if($val->users_type=='morethan'){
											   $user='more than '.$val->users_num;
											   $userVal=$user;
											  }
											  if($val->users_type=='unlimited'){
											   $user='unlimited';
											   $userVal=$user;
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="There can be <?php echo $userVal; ?> staff serving for your business.">
											<td>  <?=(lang('Apps_user'))?> </td>
											<th> <?  echo $user; ?></th>
										</tr>
										<?php if($val->business_num=='1' && $val->business_type!='morethan'){
											  $business='Single';
											  $bVal='only 1 business';
											}else{
											  if($val->business_type=='upto'){
											   $business='upto '.$val->business_num;
											   $bVal=$business.' businesses';
											  }
											  if($val->business_type=='morethan'){
											   $business='more than '.$val->business_num;
											    $bVal=$business.' businesses';
											  }
											  if($val->business_type=='unlimited'){
											   $business='unlimited';
											    $bVal=$business.' businesses';
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="You can manage <?php echo $bVal; ?> ">
											<td> <?=(lang('Apps_business'))?> </td>
											<th><?  echo $business; ?></th>
										</tr>
										<!---<tr data-toggle="tooltip" class="tool" data-original-title="There can be only 1 active offer for your business">
											<td> <?=(lang('Apps_offer'))?> </td>
											<th> 1 <?=(lang('Apps_active'))?></th>
										</tr>--->
										<?php if($val->picture_num=='1' && $val->pictures_type!='morethan'){
											  $pic='Single';
											  $picVal='Single picture';
											}else{
											  if($val->pictures_type=='upto'){
											   $pic='upto '.$val->picture_num;
											   $picVal=$pic.' pictures';
											  }
											  if($val->pictures_type=='morethan'){
											   $pic='more than '.$val->picture_num;
											   $picVal=$pic.' pictures';
											  }
											  if($val->pictures_type=='unlimited'){
											   $pic='unlimited';
											   $picVal=$pic.' pictures';
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="You business gallery can have <?php  echo $picVal;?> .">
											<td> <?=(lang('Apps_pictures'))?></td>
											<th><?  echo $pic; ?></th>
										</tr>
										<tr data-toggle="tooltip" class="tool" data-original-title="The business reports generated is the <?php echo $val->reports ?>.">
											<td> <?=(lang('Apps_reports'))?></td>
											<th><?php echo $val->reports ?></th>
										</tr>
										<?php if($val->promotion_notifications=='0'){
										 $report='<span class="pull-right"><b>0 </b><small>'.lang('Apps_canbebuysepratly').'</small></span>';
										 $reportVal=' has to be purchased  separately';
										}else{
										 $report= '<th><center>'.$val->promotion_notifications.'/Month</center></th>';
										 $reportVal=' are '.$val->promotion_notifications.'/month';
										} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="The Promotion notification for your business <?php echo $reportVal; ?>"><td colspan="6"><center><?=(lang('Apps_pro_notify'))?> </center></td></tr>
										<tr data-toggle="tooltip" class="tool" >
										<td  ><?php echo $report; ?></td></tr>
									</tbody>
								</table>
							</div>
							
									
								<p> <?php if($val->price=='0'){
								 $price='Contact Us';
								}else{
								 $price='$'.$val->price.'/'.(lang('Apps_month'));
								}?>
									<span><?php echo $price ?></span>
								</p>
								<!--<span class="label label-important add">Try it for free - 90days  </span>-->
								<a href="javascript:;" class="btn btn-success disabled" disabled="disabled"> <?=(lang('Apps_subscribenow'))?> !!</a>	
								
								</div>
								
								<?php } ?>
								
						
			
			</center>
			</div>
              </div>
			  <br/><br/>
			  <div class="row-fluid">
			  <a  href="#create-user-modal" role="button"  data-toggle="modal" class="btn btn-success span3" ><i class="icon-ok icon-white"></i><?=(lang('Apps_startyourfreetrial'))?> </a>
			  <!-- basic info start -->
			  </div>
      
              
              
              
                   
            </div>
            </div>
<!-- Modal -->
<div id="create-user-modal" class="modal hide fade modal-bigger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h3 id="myModalLabel">Create Account</h3>
</div>
<div class="modal-body">
  <form class="form-horizontal" action="<?php echo base_url(); ?>common_functions/businessSignUp/?checkino" method="POST" name="sign_up" id="sign_up" >
 	   <div class="rule_connect">
        <strong >Connect with</strong>
      </div>
  
 	  <div class="social_buttons hidden-phone" >
        <div class="inset">
            <a class="fb login_button" href="#">
                <div class="logo_wrapper"><i class="icon-facebook icon-2x"></i></div>
                <span>Signup with Facebook</span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="#">
                <div class="logo_wrapper"><i class="icon-twitter icon-2x"></i></div>
                <span>Signup with Twitter</span>
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
	  <div class="row-fluid">
    <input type="text" class="offset3 span6"  placeholder="First Name" name="firstname" value="" maxlength="15">
	</div>
  	 <br />
		<div class="row-fluid">
		<input type="text" class="offset3 span6"  placeholder="Last Name" name="lastname" value=""  maxlength="15">
		</div> 
		 <br />
		<div class="row-fluid">
		<input type="text" class="offset3 span6" placeholder="Email" name="email" value="" id="email">
		</div> 
		 <br />
		<div class="row-fluid">
		<input type="password" class="offset3 span6" name="password" id="inputPassword" placeholder="Password" maxlength="20">
		</div> 
		  <br />
		<div class="row-fluid">
		<input type="hidden" class="offset3 span6" name="usertype" value="businessSignUp" /> 
		</div>
		<div class="row-fluid">
    <button type="submit" class="btn btn-success offset3 span6">Sign up</button>
   </div>
  
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

