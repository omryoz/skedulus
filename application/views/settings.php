<div class="content container">
	<div class="content container">
		<div class="row-fluid business_profile">	
			<div class="row-fluid">
				<div class="span4">
					<ul class="nav nav-tabs notify setting-tab" id="myTab">
					  <li class="active"><a href="#Personal" data-toggle="tab"><h4><i class="icon-user"></i> <?=(lang('Apps_personal_details'))?></h4></a>
					  </li>
					  <li><a href="#Password" data-toggle="tab"><h4><i class="icon-key"></i> <?=(lang('Apps_changepwd'))?></h4></a></li>
					  <li><a href="#Credit" data-toggle="tab"><h4><i class=" icon-credit-card"></i> <?=(lang('Apps_creditcard'))?></h4></a></li>
					  <li><a href="#Notification" data-toggle="tab"><h4><i class="icon-envelope-alt"></i> <?=(lang('Apps_notificationsetting'))?></h4>
					  </a> </li>
					</ul>
				</div>
				<div class="span8 general_setting">
					<div class="tab-content Personal-info" id="myTabContent">
						 <div class="tab-pane fade active in" id="Personal">
							  <div class="row-fluid">
								  <div class="span8" id="showProfile">
									  <strong><?=(lang('Apps_personal_details'))?></strong>
									  <hr> 
									  <div class="row-fluid">
										<div class="span10 offset1">
											<dl class="dl-horizontal pesonal_info">
											  <dt><?=(lang('Apps_name'))?></dt> 
											  <dd><?php echo($personalInfo->first_name." ".$personalInfo->last_name);?></dd>
											  <dt><?=(lang('Apps_dob'))?></dt>
											  <dd><?php $date=$personalInfo->date_of_birth; 
											  if($date!="0")
											   echo date("d-m-Y",strtotime($date));
											  ?></dd>
											  <dt><?=(lang('Apps_gender'))?></dt>
											  <dd><?php echo($personalInfo->gender); ?></dd>
											</dl>
										</div>
										</div><br/>
										<strong><?=(lang('Apps_contact_details'))?></strong>
									  <hr>
									  <div class="row-fluid"> 
										<div class="span10 offset1">
											<dl class="dl-horizontal pesonal_info">
											  <dt><?=(lang('Apps_email'))?></dt>
											  <dd><?php echo($personalInfo->email)?></dd>
											  <dt><?=(lang('Apps_phonenumber'))?></dt>
											  <dd><?php echo($personalInfo->phone_number); ?></dd>
											  <dt><?=(lang('Apps_city'))?></dt>
											  <dd></dd>
											  <dt><?=(lang('Apps_country'))?></dt>
											  <dd></dd>
											</dl>
										</div>
										</div><br/>
										<strong><?=(lang('Apps_aboutme'))?></strong>
									  <hr class="style-margin-b"> 
									  <div class="row-fluid">
										<div class="span10 offset1">
											<?php print_r($personalInfo->about_me);?>
										</div></div>
										</div>
								  <div class="span4" id="action">
									<p><a href="javascript:void(0)" onclick="editPersonalInfo();" class="btn icon btn-mini pull-right">
	<i class="icon-edit" title="edit ">
	</i>
									</a></p>
												<br/>
										<ul class="photo_gallery unstyled pull-right">
											<li class=" thumb-image">
												<div class="thumbnail">
													<a href="#">
														<img src="<?php echo base_url();?>uploads/photo/<?=(!empty($personalInfo->image)?$personalInfo->image:'default.jpg'); ?>"  style="width: 100px;">
													</a>
													<h5 >
													<center style="margin-bottom: -30px; color: white;"> <?=(lang('Apps_changeimage'))?> </center>
													<input type="file" name="file" style="opacity:0">
														<!---<center><a href="#">Photo Name</a></center>--->
													</h5>
												</div>
											</li>
										</ul>
									</div>
									<div class="span12" id="editProfile" style="display:none">
									<form action="<?php echo base_url(); ?>clients/editClient" name="userProfile" id="userProfile" method="post">
									  <strong><?=(lang('Apps_personal_details'))?></strong>
									  <hr>  
									  <div class="row-fluid">
										<div class="span10 offset1">
											<dl class="dl-horizontal pesonal_info">
											  <dt><?=(lang('Apps_firstname'))?></dt>
											  <dd><input class="span9" type="text" name="firstname" value=<?php echo $personalInfo->first_name;?>></dd>
											  <dt><?=(lang('Apps_lastname'))?></dt>
											  <dd><input class="span9" type="text" name="lastname" value=<?php echo $personalInfo->last_name;?>></dd>
											  <dt><?=(lang('Apps_dob'))?></dt>
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
											   <div class="span3">
													<?php 
												$year[" "]="Year";
												for($i = date('Y') - 50; $i <= date('Y'); $i++) { 
												$year[$i]= $i; 
												}
												 $selected = date("Y",strtotime($date));
												 echo form_dropdown('year', $year, $sYear,'id="year" class="span12 inline select-date"');
												?>
												 </div>
												 <div class="span3">
												<?php 
												$month[" "]="Month";
												for($i = 1; $i <= 12; $i++) {$i = strlen($i) < 2 ? "0{$i}" : $i;
													
												$month[$i]= date('M', mktime(0, 0, 0, $i)); 
												}
												
												 echo form_dropdown('month', $month, $sMonth,'id="month" class="span12 inline select-date"');
												?>
												 </div>
												 <div class="span3">
												<?php 
												$day[]="Day";
												echo form_dropdown('day', $day, $sDay,'id="day" class="span12 inline select-date"');
												?>
												 </div>
											  
											  
											  </dd>
											  <dt><?=(lang('Apps_gender'))?></dt>
											  <dd>
											  <?php  
											  $options=array(
											""=>"Select",
											'male'=>"Male",
											'female'=>"Female"
											);
											 $selectedgender = "$personalInfo->gender";
											  echo form_dropdown('gender', $options, $selectedgender ,'class=" select-gender span9"'); ?>
											  </dd>
											</dl>
										</div>
										</div><br/>
										<strong><?=(lang('Apps_contact_details'))?></strong>
									  <hr>
									  <div class="row-fluid"> 
										<div class="span10 offset1">
											<dl class="dl-horizontal pesonal_info">
											  <dt><?=(lang('Apps_email'))?></dt>
											  <dd class="style-margin-b"><?php echo $personalInfo->email?></dd>
											  <dt><?=(lang('Apps_phonenumber'))?></dt>
											  <dd ><input type="text" name="phone" value=<?php echo $personalInfo->phone_number; ?> maxlength=15 class="span9"></dd>
											  <dt><?=(lang('Apps_city'))?></dt>
											  <dd class="style-margin-b"></dd>
											  <dt><?=(lang('Apps_country'))?></dt>
											  <dd></dd>
											</dl>
										</div>
										</div><br/>
										<strong><?=(lang('Apps_aboutme'))?></strong>
									  <hr class="style-margin-b"> 
									  <div class="row-fluid">
										<div class="span10 offset1">
										<textarea name="about_me" rows="4" value="" class="span10"><?php echo $personalInfo->about_me;?></textarea>
										</div></div>
										<input type="submit" name="save" value="<?=(lang('Apps_update'))?>" class="btn btn-success pull-right span2" >
										<!---<a href="#" >Save</a>--->
										</form>
										</div>
							</div></div>
						  <div class="tab-pane fade" id="Password">
							  <div class="row-fluid">
								  <div class="span12 ">
								  <p class="alert" id="successMessage" style="display:none"></p>
									<strong><?=(lang('Apps_changepwd'))?></strong>
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
										  <label class="control-label" for="inputPassword"> <?=(lang('Apps_newpwd'))?>:</label>
										  <div class="controls">
											<input type="password" name="password" id="password" placeholder="<?=(lang('Apps_pwd'))?>" class="span9" maxlength="20">
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="inputPassword"> <?=(lang('Apps_confirmpwd'))?>:</label>
										  <div class="controls">
											<input type="password" name="confirmpassword" id="confirmpassword" placeholder="<?=(lang('Apps_confirmpwd'))?>" class="span9">
											
										  </div>
										</div>
										<br/><br/><br/>
										 <input type="submit" name="save" class="btn btn-success pull-right span2" value="<?=(lang('Apps_save'))?>" />
										 <!---<a href="javascript:void(0)" onclick=submit(); id="changePassword" class="btn btn-success pull-right span2">Save</a>--->
									 </form>
									
								  </div>
							  </div>
						 </div>
						  <div class="tab-pane fade" id="Credit">
							<div class="row-fluid">
								  <div class="span12 ">
									<strong> <?=(lang('Apps_creditcard'))?></strong>
									<a href="#" class="pull-right btn btn-mini"><i class="icon-edit" title="edit"></i></a>
									<hr/>
								  <br/>
									<form class="form-horizontal">
										<div class="control-group">
										  <label class="control-label" for="inputName"> <?=(lang('Apps_nameoncard'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword1" placeholder="<?=(lang('Apps_name'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="inputNumber"> <?=(lang('Apps_creditcardno'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword2" placeholder="<?=(lang('Apps_number'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_cvv'))?>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" placeholder="<?=(lang('Apps_cvv'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"><?=(lang('Apps_expiration'))?> <b class="astrick">*</b>:</label>
										  <div class="controls">
											<select class="span6" >
													<option><?=(lang('Apps_month'))?></option>
													<option>xyz</option>
													<option>Abc</option>
											</select>
											<select class="span6" >
													<option><?=(lang('Apps_year'))?></option>
													<option>xyz</option>
													<option>Abc</option>
											</select>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"><?=(lang('Apps_firstname'))?> :</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" placeholder="<?=(lang('Apps_firstname'))?>" class="span12">
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"><?=(lang('Apps_lastname'))?> <b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" placeholder="<?=(lang('Apps_lastname'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_address'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" placeholder="<?=(lang('Apps_address'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_state'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<select class="span12" >
													<option> <?=(lang('Apps_selectstate'))?> </option>
													<option>xyz</option>
													<option>Abc</option>
											</select>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"><?=(lang('Apps_city'))?> <b class="astrick">*</b>:</label>
										  <div class="controls">
											<select class="span12" >
													<option><?=(lang('Apps_selectcity'))?>  </option>
													<option>xyz</option>
													<option>Abc</option>
											</select>
										  </div>
										</div><div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_zip'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" placeholder="<?=(lang('Apps_zip'))?>" class="span12"  >
										  </div>
										</div>
										
										
										 <a href="#" class="btn btn-success pull-right "><?=(lang('Apps_storecreditcard'))?></a>
										 <br clear="all"/><small class="pull-right"><b class="astrick">*</b> <?=(lang('Apps_fieldsmandatory'))?> </small>
									 </form>
									
								  </div>
								
							  </div>
						  </div>
						  <div class="tab-pane fade" id="Notification">
							  <div class="row-fluid">
								  <div class="span12">
								  <strong> <?=(lang('Apps_notificationsetting'))?></strong>
								  <hr/>
								  <br/>
									<form class="form-horizontal offset1" name="notification" id="notification" action="notification_settings" method="post">
										<div class="control-group">
										  <label class="control-label " for="input"> <?=(lang('Apps_appointremainder'))?>: </label>
												<div class="controls">
													<label class="radio inline">
														<input type="radio" name="appointment_reminder" id="oppintment_reminder_on" value="yes">
														<?=(lang('Apps_on'))?> 
													</label>
													<label class="radio inline">
														<input type="radio" name="appointment_reminder" id="oppintment_reminder_off" value="no">
														<?=(lang('Apps_off'))?> 
													</label>
												</div>
										</div>
										
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_sendremindr'))?>:</label>
										  <div class="controls">
											<select class="span3" id="send_reminder" disabled name="remind_before">
												<option><?=(lang('Apps_days'))?></option>
												<option value="1">1 day notice</option>
												<option value="2">2 day notice</option>
												<option value="3">3 day notice</option>
												<option value="4">4 day notice</option>
											</select>
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label"  for="input"> <?=(lang('Apps_sendmetextmsg'))?>: </label>
										  <!-- <label class="control-label"  for="input">Send me text message : from business manager :  </label> -->
										  <div class="controls">
										  <label class="radio inline">
										  <input type="radio" name="send_message" id="txt_msg_on" value="yes" disabled >
										   <?=(lang('Apps_on'))?> 
										</label>
										<label class="radio inline">
										  <input type="radio" name="send_message" id="txt_msg_off" value="no" disabled>
										   <?=(lang('Apps_off'))?> 
										</label>
										</div>
										</div>
										 <input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class="btn btn-success span2 pull-right"/>
									</form>
								  </div>
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
