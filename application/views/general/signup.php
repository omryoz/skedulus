<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
		jQuery.validator.addMethod('intlphone', function(value) { return (value.match(/^(\s)((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/)); }, ' invalid phone number');
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
					phone_number: {
						//digits:true,
						//intlphone: true
						remote: {
						  url: baseUrl+'home/phoneNum',
						  type: "post",
						  data: {
							phone_number: function(){ return $("#phone_number").val(); }
						  }
                     }
					},		
					password:{ 
					required: true,
					minlength: "6",
					}
                    
                },
                messages: {
                    firstname: " required",
					lastname: " required",
					gender: " required",
                    email: {
					required: " required",
					email: " invalid email id",
					remote: " email already exist"
					},	
					phone_number:{
					digits: "Only numbers allowed",
					remote: " invalid number"
					},	
					password: {
					required:" required",	
					minlength:" minimum 6 characters is required"
					}				
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


 
<!-- Modal -->
<div id="termsconditions" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Terms & Conditions</h3>
  </div>
  <div class="modal-body">
 
	<h4>In using the Website/Services you agree not to:</h4>
<ol>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	<li> use the Services to send junk email, spam, chain letters, pyramid schemes or any other unsolicited messages, commercial or otherwise;</li>
	
	
</ol>



	
  </div>
</div>


<div class="content container login_page">
<?php if(isset($success)){ ?>
	<p class="alert"><?=(lang('Apps_verificationlink'))?></p>
	<?php } ?>
	<?php if(isset($clientsuccess)){ ?>
	<p class="alert"><?=(lang('Apps_afterloginalert'))?></p>
	<?php } ?>
	<div class="row-fluid">
		<center><h1 class="login_logo"><a href="<?php echo base_url();?>home">Skedulus</a></h1>
		<span><?=(lang('Apps_alreadyaccount'))?><b><a href="<?php echo base_url();?>home/<?php echo $signUp ?>"> <?=(lang('Apps_login'))?></a></b></span>
		</center>
		<div class="rule_connect">
        <strong ><?=(lang('Apps_connectwith'))?></strong>
      </div>
		<div class="social_buttons hidden-phone" >
        <div class="inset">
            <a class="fb login_button" href="<?php echo base_url();?>home/signupAuth?provider=Facebook">
                <div class="logo_wrapper"><i class="icon-facebook icon-2x"></i></div>
                <span><?=(lang('Apps_signfb'))?></span>
            </a>
        </div>
        <div class="inset">
            <a class="tw login_button" href="<?php echo base_url();?>home/signupAuth?provider=Twitter">
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
	<center><h4>Or</h4></center>
	<hr class="hr_style">
	<center><h2><?=(lang('Apps_createaccount'))?></h2></center>
	<div class="row-fluid">
		<div class="span6 offset4 login_form">
		<form action="<?php echo base_url(); ?>common_functions/<?php echo $userRole ?>/?checkino" method="POST" name="sign_up" id="sign_up" >
			<input type="hidden" name="identifier" value="<?=$social['identifier']?>" >
			<input type="hidden" name="profileurl" value="<?=$social['profileurl']?>" >
			<input type="hidden" name="sex" value="<?=$social['sex']?>" >
			<input type="hidden" name="login_by" value="<?=$social['login_by']?>" >	
		  
		  <input type="text" class="span8" placeholder="<?=(lang('Apps_firstname'))?>" name="firstname" value="<?=(!empty($social['first_name']))?$social['first_name']:""?>" maxlength="15" />
		
		  <input  type="text" class="span8"  placeholder="<?=(lang('Apps_lastname'))?>" name="lastname" value="<?=(!empty($social['last_name']))?$social['last_name']:""?>"  maxlength="15" />
		 
		  <div class="row-fluid">
		  <div class="span2">
		   <label class="inline span12 "><h5><?=(lang('Apps_birthday'))?></h5></label>
		   </div>
		    <div class="span2">
			<?php 
		$year[" "]="Year";
		for($i = date('Y') - 50; $i <= date('Y'); $i++) { 
		$year[$i]= $i; 
		}
		$selected = "";
		if(!empty($social['birthYear'])){
			$selected  = $social['birthYear'];
		}
		
		echo form_dropdown('Year', $year, $selected,'id="year" class="span12 inline select-date"');
		?>
		 </div>
		 <div class="span2">
		<?php 
		$month[" "]="Month";
		for($i = 1; $i <= 12; $i++) {$i = strlen($i) < 2 ? "0{$i}" : $i;
			
		$month[$i]= date('M', mktime(0, 0, 0, $i)); 
		}
		$selected_month = "";
		if(!empty($social['birthMonth'])){
			$selected_month  = $social['birthMonth'];
		}else{
			$selected_month  = set_value('month');
		}
		//echo $selected_month;
		 echo form_dropdown('Month', $month, $selected_month,'id="month" class="span12 inline select-date"');
		?>
		 </div>
		 <div class="span2">
		<?php 
		$day[]="Day";
		$selected_day = ""; 
		if(!empty($social['birthDay'])){
			$selected_day  = $social['birthDay'];
		}else{
			$selected_day  = set_value('day');
		}
		 echo form_dropdown('Day', $day, $selected_day,'id="day" class="span12 inline select-date"');
		?><input type="hidden" name="DOBday" id="DOBdate" value=<?php print_r($selected_day); ?> >
		 </div>
		 <a href="javascript:;" class="notification-link" data-toggle="popover" data-placement="bottom" data-content=" &lt;b&gt;Providing your birthday &lt;/b&gt;  &lt;br/&gt;helps us to give special notification and offers to you" title="" ><?=(lang('Apps_whybirthday'))?></a>
		 </div>
		 <?php 
		$options=array(
		""=>"Select your gender",
		'male'=>"Male",
		'female'=>"Female"
		);
		
		$selectedgender='';
		if(!empty($social['sex'])){
		 $selectedgender = $social['sex']; 
		}
		//echo $selectedgender;
	     echo form_dropdown('Select your gender', $options, $selectedgender ,'class="span8 select-gender"');
		?>
		 
		 <input  type="text" class="span8"  placeholder="<?=(lang('Apps_email'))?>" name="email" value="<?=(!empty($social['email']))?$social['email']:""?>" id="email" /> 
		 
		 <input  type="text" class="span8"  placeholder="<?=(lang('Apps_phonenumber'))?>" name="phone_number" value="" id="phone_number" maxlength="15" /> 
		
		 <input  type="password" class="span8" placeholder="<?=(lang('Apps_pwd'))?>" name="password" id="password" onkeyup="passwordStrength(this.value)" maxlength="20" />
		
		 <div id="passwordDescription"></div>
		 <div id="passwordStrength" class="strength0"></div>
		 <br/>
		 <p>By clicking "Create an account", you accept Skedulus<a href="#termsconditions" role="" class="" data-toggle="modal"> Term of Service agreement</a></p>
		  <input type="submit" name="Create Account" value="<?=(lang('Apps_createacc'))?>" class="btn span8 btn-success">
		  <!--<a href="business_overview.php" type="submit" class="btn span12 btn-success">Create Account</a>--->
		  <input type="hidden" name="usertype" value="<?php echo $userRole; ?>" />  
		</form>
		</div>
	</div><br/>
	</div>
	
</div>


<script>

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
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/modernizr-custom.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/polyfills/polyfiller.js"></script>
<script>
    // Polyfill all unsupported features
    $.webshims.polyfill();	
</script>
<style>
#passwordStrength
{
	height:10px;
	display:block;
	float:left;
}

.strength0
{
	width:250px;
	background:#cccccc;
}

.strength1
{
	width:50px;
	background:#ff0000;
}

.strength2
{
	width:100px;	
	background:#ff5f5f;
}

.strength3
{
	width:150px;
	background:#56e500;
}

.strength4
{
	background:#4dcd00;
	width:200px;
}

.strength5
{
	background:#399800;
	width:250px;
}



</style>
