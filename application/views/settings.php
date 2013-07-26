<div class="content container">
	<div class="row-fluid business_profile">	
		<div class="row-fluid">
			<div class="span4">
				<ul class="nav nav-tabs notify setting-tab" id="myTab">
				  <li class="active"><a href="#Personal" data-toggle="tab"><h4><i class="icon-user"></i> Personal Info</h4></a>
				  </li>
				  <li><a href="#Password" data-toggle="tab"><h4><i class="icon-key"></i> Change Password</h4></a></li>
				  <li><a href="#Credit" data-toggle="tab"><h4><i class=" icon-credit-card"></i> Manage Credit Card</h4></a></li>
				  <li><a href="#Notification" data-toggle="tab"><h4><i class="icon-envelope-alt"></i> Notification Settings</h4>
				  </a> </li>
				</ul>
			</div>
			<div class="span8 general_setting">
				<div class="tab-content Personal-info" id="myTabContent">
					 <div class="tab-pane fade active in" id="Personal">
						  <div class="row-fluid">
							  <div class="span8" id="showProfile">
								  <strong>Personal Details</strong>
								  <hr> 
								  <div class="row-fluid">
									<div class="span10 offset1">
										<dl class="dl-horizontal pesonal_info">
										  <dt>Name</dt> 
										  <dd><?php echo($personalInfo->first_name." ".$personalInfo->last_name);?></dd>
										  <dt>Date Of Birth</dt>
										  <dd><?php $date=$personalInfo->date_of_birth; 
										  if($date!="0")
										   echo date("d-m-Y",strtotime($date));
										  ?></dd>
										  <dt>Gender</dt>
										  <dd><?php echo($personalInfo->gender); ?></dd>
										</dl>
									</div>
									</div><br/>
									<strong>Contact Details</strong>
								  <hr>
								  <div class="row-fluid"> 
									<div class="span10 offset1">
										<dl class="dl-horizontal pesonal_info">
										  <dt>Email</dt>
										  <dd><?php echo($personalInfo->email)?></dd>
										  <dt>Phone Number</dt>
										  <dd><?php echo($personalInfo->phone_number); ?></dd>
										  <dt>City</dt>
										  <dd></dd>
										  <dt>Country</dt>
										  <dd></dd>
										</dl>
									</div>
									</div><br/>
									<strong>About Me</strong>
								  <hr> 
								  <div class="row-fluid">
									<div class="span10 offset1">
										<?php print_r($personalInfo->about_me);?>
									</div></div>
									</div>
							  <div class="span4" id="action">
								<a href="javascript:void(0)" onclick="editPersonalInfo();" class="btn icon btn-mini pull-right">
<i class="icon-edit" title="edit ">
</i>
								</a>
											<br/><br/>
									<ul class="photo_gallery unstyled pull-right">
										<li class=" thumb-image">
											<div class="thumbnail">
												<a href="#">
													<img src="<?php echo base_url();?>uploads/photo/<?=(!empty($personalInfo->image)?$personalInfo->image:'default.jpg'); ?>" >
												</a>
												<h5 ><input type="file" name="file">
													<!---<center><a href="#">Photo Name</a></center>--->
												</h5>
											</div>
										</li>
									</ul>
								</div>
								<div class="span8" id="editProfile" style="display:none">
								<form action="<?php echo base_url(); ?>clients/editClient" name="userProfile" id="userProfile" method="post">
								  <strong>Personal Details</strong>
								  <hr> 
								  <div class="row-fluid">
									<div class="span10 offset1">
										<dl class="dl-horizontal pesonal_info">
										  <dt>First name</dt>
										  <dd><input type="text" name="firstname" value=<?php echo $personalInfo->first_name;?>></dd>
										  <dt>Last name</dt>
										  <dd><input type="text" name="lastname" value=<?php echo $personalInfo->last_name;?>></dd>
										  <dt>Date Of Birth</dt>
										  <dd>
										  <?php $date=$personalInfo->date_of_birth; 
										  $sDay ="";
										  $sMonth="";
										  $sYear="";
										  if($date!="0000-00-00"){
										 // echo date("d-m-Y",strtotime($date));
										  $sDay =date("d",strtotime($date));
										  $sMonth=date("m",strtotime($date));
										  $sYear=date("Y",strtotime($date));
										  }
										  ?>
										   <div class="span2">
												<?php 
											$year[" "]="Year";
											for($i = date('Y') - 50; $i <= date('Y'); $i++) { 
											$year[$i]= $i; 
											}
											 $selected = date("Y",strtotime($date));
											 echo form_dropdown('year', $year, $sYear,'id="year" class="span12 inline select-date"');
											?>
											 </div>
											 <div class="span2">
											<?php 
											$month[" "]="Month";
											for($i = 1; $i <= 12; $i++) {$i = strlen($i) < 2 ? "0{$i}" : $i;
												
											$month[$i]= date('M', mktime(0, 0, 0, $i)); 
											}
											
											 echo form_dropdown('month', $month, $sMonth,'id="month" class="span12 inline select-date"');
											?>
											 </div>
											 <div class="span2">
											<?php 
											$day[]="Day";
											echo form_dropdown('day', $day, $sDay,'id="day" class="span12 inline select-date"');
											?>
											 </div>
										  
										  
										  </dd>
										  <dt>Gender</dt>
										  <dd>
										  <?php  
										  $options=array(
										""=>"Select",
										'male'=>"Male",
										'female'=>"Female"
										);
										 $selectedgender = "$personalInfo->gender";
										  echo form_dropdown('gender', $options, $selectedgender ,'class="span8 select-gender"'); ?>
										  </dd>
										</dl>
									</div>
									</div><br/>
									<strong>Contact Details</strong>
								  <hr>
								  <div class="row-fluid"> 
									<div class="span10 offset1">
										<dl class="dl-horizontal pesonal_info">
										  <dt>Email</dt>
										  <dd><?php echo $personalInfo->email?></dd>
										  <dt>Phone Number</dt>
										  <dd><input type="text" name="phone" value=<?php echo $personalInfo->phone_number; ?> maxlength=15></dd>
										  <dt>City</dt>
										  <dd></dd>
										  <dt>Country</dt>
										  <dd></dd>
										</dl>
									</div>
									</div><br/>
									<strong>About Me</strong>
								  <hr> 
								  <div class="row-fluid">
									<div class="span10 offset1">
									<textarea name="about_me" value=""><?php echo $personalInfo->about_me;?></textarea>
									</div></div>
									<input type="submit" name="save" value="Update" class="btn btn-success pull-right span2" >
									<!---<a href="#" >Save</a>--->
									</form>
									</div>
						</div></div>
					  <div class="tab-pane fade" id="Password">
						  <div class="row-fluid"><p class="alert" id="successMessage" style="display:none"></p>
							  <div class="span12 ">
								<strong>Change Password</strong>
								<hr/>
							  <br/>
								<form class="form-horizontal" id="changepassword" name="changepassword">
									<!---<div class="control-group">
									  <label class="control-label" for="inputPassword">Old Password :</label>
									  <div class="controls">
										<input type="password" id="inputPassword1" placeholder="Password" class="span12">
									  </div>
									</div>--->
									<div class="control-group">
									  <label class="control-label" for="inputPassword">New Password :</label>
									  <div class="controls">
										<input type="password" name="password" id="password" placeholder="Password" class="span12" maxlength="20">
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="inputPassword">Confirm Password :</label>
									  <div class="controls">
										<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirm Password" class="span12">
									  </div>
									</div>
									<br/><br/><br/>
									 <input type="submit" name="save" class="btn btn-success pull-right span2" value="Save" />
									 <!---<a href="javascript:void(0)" onclick=submit(); id="changePassword" class="btn btn-success pull-right span2">Save</a>--->
								 </form>
								
							  </div>
						  </div>
					 </div>
					  <div class="tab-pane fade" id="Credit">
						<div class="row-fluid">
							  <div class="span12 ">
								<strong>Manage Credit Card </strong>
								<a href="#" class="pull-right btn btn-mini"><i class="icon-edit" title="edit"></i></a>
								<hr/>
							  <br/>
								<form class="form-horizontal">
									<div class="control-group">
									  <label class="control-label" for="inputName">Name On Card <b class="astrick">*</b>:</label>
									  <div class="controls">
										<input type="text" id="inputPassword1" placeholder="Name" class="span12" >
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="inputNumber">Credit Card Number <b class="astrick">*</b>:</label>
									  <div class="controls">
										<input type="text" id="inputPassword2" placeholder="Number" class="span12" >
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">CVV :</label>
									  <div class="controls">
										<input type="text" id="inputPassword3" placeholder="CVV" class="span12" >
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">Expiration <b class="astrick">*</b>:</label>
									  <div class="controls">
										<select class="span6" >
												<option>Month</option>
												<option>xyz</option>
												<option>Abc</option>
										</select>
										<select class="span6" >
												<option>Year</option>
												<option>xyz</option>
												<option>Abc</option>
										</select>
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">First Name :</label>
									  <div class="controls">
										<input type="text" id="inputPassword3" placeholder="First Name" class="span12">
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">Last Name <b class="astrick">*</b>:</label>
									  <div class="controls">
										<input type="text" id="inputPassword3" placeholder="Last Name" class="span12" >
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">Address <b class="astrick">*</b>:</label>
									  <div class="controls">
										<input type="text" id="inputPassword3" placeholder="Address" class="span12" >
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">State <b class="astrick">*</b>:</label>
									  <div class="controls">
										<select class="span12" >
												<option>Select State</option>
												<option>xyz</option>
												<option>Abc</option>
										</select>
									  </div>
									</div>
									<div class="control-group">
									  <label class="control-label" for="input">City <b class="astrick">*</b>:</label>
									  <div class="controls">
										<select class="span12" >
												<option>Select city</option>
												<option>xyz</option>
												<option>Abc</option>
										</select>
									  </div>
									</div><div class="control-group">
									  <label class="control-label" for="input">Zip <b class="astrick">*</b>:</label>
									  <div class="controls">
										<input type="text" id="inputPassword3" placeholder="Zip" class="span12"  >
									  </div>
									</div>
									
									
									 <a href="#" class="btn btn-success pull-right span5">Store Credit Card</a>
									 <br clear="right"/><small class="pull-right"><b class="astrick">*</b> Fields are mandatory </small>
								 </form>
								
							  </div>
							
						  </div>
					  </div>
					  <div class="tab-pane fade" id="Notification">
						  <div class="row-fluid">
							  <div class="span12">
							  <strong> Notification Settings</strong>
							  <hr/>
							  <br/>
								<form class="form-horizontal" name="notification" id="notification">
									<div class="control-group">
									  <label class="control-label " for="input">Appointment Reminder : </label>
									  <div class="controls">
									  <label class="radio inline">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									   On 
									</label>
									<label class="radio inline">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									   Off 
									</label>
									</div>
									</div>
									
									<div class="control-group">
									  <label class="control-label" for="input">Send the reminder on :</label>
									  <div class="controls">
										<select class="span6">
											<option>Days</option>
											<option>1 day notice</option>
											<option>2 day notice</option>
											<option>3 day notice</option>
											<option>4 day notice</option>
										</select>
									  </div>
									</div>
								
									  <label  for="input">Send me text message from business manager :  </label>
									  <div class="controls">
									  <label class="radio inline">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									   On 
									</label>
									<label class="radio inline">
									  <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
									   Off 
									</label>
									
									</div>
									<a href="#" class="btn btn-success span2 pull-right" id="nSettings">Save</a> 
								</form>
							  </div>
						  </div>
					  </div>
				 </div>
			</div>
	</div>
 </div>
	</div>
</div></div>
<script>
 function editPersonalInfo(){
    $("#showProfile").hide();
	$("#action").hide();
	$("#editProfile").show();
 }
</script>
<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#userProfile").validate({
                rules: {
                    firstname: "required",
					lastname: "required",
					gender: "required",
					phone: {
						digits:true
					},	
					
                    
                },
                messages: {
                    firstname: "Please Fill in your first name",
					lastname: "Please Fill in your last name",
					gender: "Please Fill in your gender",
                    
					phone:{
					digits: "Only numbers allowed",
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

(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        
		setupFormValidation: function()
        {
            $("#changepassword").validate({
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
					required:"Please Fill in your password",	
					minlength:"Minimum 6 characters is required"
					},
					confirmpassword:{
					//required: "Only numbers allowed",
					equalTo: "Password does not match"
					},			
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 

				},

                submitHandler: function(form) {
                 var url=baseUrl+'clients/changePassword';
				 $.ajax({
				      type: 'POST',
					  data: {'password':$("#password").val()}, 
					  url:url,
					  success: function(data){
					  var success="Password updated successfully";
					   $("#successMessage").html(success);
					   $("#successMessage").show();  
					   $("#changepassword")[0].reset();
				     } 
				 });
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

<script src="<?php echo base_url(); ?>js/dates/core.js" type="text/javascript"></script>
