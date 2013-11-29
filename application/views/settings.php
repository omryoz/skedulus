<script type="text/javascript" src="<?php echo $this->config->item('base_url'); ?>js/jquery.form.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
	
function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(200);
						$("#tempimg").val('1');
						$("#actualImg").hide();
						$('#blah').show();
						$("#status").val('1');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

</script>
<div class="content container">
	<div class="content container">
		<div class="row-fluid business_profile">	
			<div class="row-fluid">
				<div class="span4">
					<ul class="nav nav-tabs notify setting-tab" id="myTab">
					  <li class="active"><a href="#Personal" data-toggle="tab"><h4><i class="icon-user"></i> <?=(lang('Apps_personal_details'))?></h4></a>
					  </li>
					  <li><a href="#Password" class="hidealerttab" data-toggle="tab"><h4><i class="icon-key"></i> <?=(lang('Apps_changepwd'))?></h4></a></li>
					  <li><a href="#Credit"  class="hidealerttab" data-toggle="tab"><h4><i class=" icon-credit-card"></i> <?=(lang('Apps_creditcard'))?></h4></a></li>
					  <li><a href="#Notification"  class="hidealerttab" data-toggle="tab"><h4><i class="icon-envelope-alt"></i> <?=(lang('Apps_notificationsetting'))?></h4>
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
											  <dt><?=(lang('Apps_address'))?></dt>
											  <dd><?php echo($personalInfo->address); ?></dd>
											  <!---<dt><?=(lang('Apps_city'))?></dt>
											  <dd></dd>
											  <dt><?=(lang('Apps_country'))?></dt>
											  <dd></dd>--->
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
												<form name="addImage" id="addImage" class="bs-docs-example form-horizontal "  enctype="multipart/form-data"  action="<?php echo base_url();?>clients/changepicture" method="POST">
												<!---<form name="profilepic" id="profilepic" enctype="multipart/form-data"  action="<?php echo base_url();?>clients/changepicture" method="POST">--->
										<ul class="photo_gallery unstyled pull-right">
											<li class=" thumb-image">
												<div class="thumbnail">
												<div class="profile-image">
													<a href="javascript:;">
														<img src="<?php echo base_url();?>uploads/photo/<?=(!empty($personalInfo->image)?$personalInfo->image:'default.jpg'); ?>"  >
													</a>
													<!-- <a href="javascript:;" class="btn btn-mini btn-danger btn-flat">
													<i class="icon-trash"></i>
													</a> -->
													<!-- <h5>
													<center > <?=(lang('Apps_changeimage'))?> </center>
														
													<input type="file" name="userfile"   size="20" id="changeimage"/>
													 </h5>
													</div> -->
												</div>
												<!-- <input class="btn btn-inverse btn-block btn-flat" type="submit" name="fileupload" value="upload" id="uploadbtn" > -->
											</li>
										</ul>
										</form>
									</div>
									
									<div class="row-fluid">
									<div class="span12" id="editProfile" style="display:none">
									<form action="<?php echo base_url(); ?>clients/editClient" name="userProfile" id="userProfile" method="post" enctype="multipart/form-data">
									
									<strong><?=(lang('Apps_changeprofileimg'))?></strong>
									  <hr class="style-margin-b"> 
									  <div class="row-fluid">
										<div class="span10 offset1">
											<div class="row-fluid">
												<div class="thumbnail span4">
												<img id="blah"  src="#" alt="your image" style="display:none" />
												<img id="actualImg" src="<?php echo base_url();?>uploads/photo/<?=(!empty($personalInfo->image)?$personalInfo->image:'default.jpg'); ?>">
												</div>
												<div class=" span7 offset1">
												<ul class="unstyled">
													<li>
													<input type='file' name="userfile" onchange="readURL(this);" />
                                                    
													<!---<a href="javascript" class="muted"><?=(lang('Apps_changeimage'))?></a>-->
													</li>
													<li><a href="javascript:;" class="text-error" id="removeimg"><?=(lang('Apps_removeimg'))?></a></li>
												<input type="hidden" name="status" value="" id="status" />
												<input type="hidden" name="img" value="<?=$personalInfo->image; ?>" id="img" />
												<input type="hidden" name="tempimg" value="" id="tempimg" />
												</div>
											</div>
										</div>
									  </div>
									
									
									<br/>
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
												<input type="hidden" name="DOBday" id="DOBdate" value=<?php print_r($sDay); ?> >
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
											  <dt><?=(lang('Apps_address'))?></dt>
											  <dd class="style-margin-b"><textarea  name="address" id="searchTextField"  class="span9 " size="50" autocomplete="on" runat="server"><?php echo $personalInfo->address;?></textarea></dd>
											  <!---<dt><?=(lang('Apps_city'))?></dt>
											  <dd class="style-margin-b"></dd>
											  <dt><?=(lang('Apps_country'))?></dt>
											  <dd></dd>--->
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
										</div></div>
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
								   <p  id="message" class="message" style="display:none"></p>
								   
									<strong> <?=(lang('Apps_creditcard'))?></strong>
									<a href="javascript:;" id="editicon" onclick="showeditDetails();" class="pull-right btn btn-mini"><i class="icon-edit" title="edit"></i></a>
									<hr/>
								  <br/>
								  <form class="form-horizontal" id="showDetails">
										
										<!---<div class="control-group">--->
										<dl class="dl-horizontal pesonal_info">
										<dt><?=(lang('Apps_nameoncard'))?></dt> 
										<dd id="card_name"><?php print_r($cardDetails->card_name); ?></dd>
										<dt><?=(lang('Apps_creditcardno'))?></dt> 
										<dd id="card_number"><?php print_r($cardDetails->credit_card_number); ?></dd>
										<dt><?=(lang('Apps_cvv'))?></dt> 
										<dd id="verification_number"><?php print_r($cardDetails->verification_number); ?></dd>
										<dt><?=(lang('Apps_expiration'))?></dt> 
										<?php
										  $monthName='';
										  $year='';
											if($cardDetails->expiration_month!=0){
											$monthName=date("F", mktime(0, 0, 0, $cardDetails->expiration_month, 10));
											}
											if($cardDetails->expiration_year!=0){
											$year=$cardDetails->expiration_year;
											}
										    ?>
										<dd id="expirydate"><?php print_r($monthName." ".$year); ?></dd>
										</dl>
										 
									
									 </form>
									<form class="form-horizontal" id="editDetails" style='display:none' action="<?php echo base_url(); ?>clients/cardDetails" method="post">
										<div class="control-group">
										  <label class="control-label" for="inputName"> <?=(lang('Apps_nameoncard'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword1" name="card_name" value="<?php  echo $cardDetails->card_name;?>" placeholder="<?=(lang('Apps_name'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="inputNumber"> <?=(lang('Apps_creditcardno'))?><b class="astrick">*</b>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword2"  name="card_number"  value="<?php  echo $cardDetails->credit_card_number;?>" placeholder="<?=(lang('Apps_number'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_cvv'))?>:</label>
										  <div class="controls">
											<input type="text" id="inputPassword3" name="cvv" value="<?php  echo $cardDetails->verification_number;?>" placeholder="<?=(lang('Apps_cvv'))?>" class="span12" >
										  </div>
										</div>
										<div class="control-group">
										  <label class="control-label" for="input"><?=(lang('Apps_expiration'))?>:</label>
										  <div class="controls">
										  
										     <?php 
											  $expMonth=$cardDetails->expiration_month;
												$month[""]="Month";
												for($i = 1; $i <= 12; $i++) {$i = strlen($i) < 2 ? "0{$i}" : $i;
													
												$month[$i]= date('M', mktime(0, 0, 0, $i)); 
												}
												$sMonth='';
												 echo form_dropdown('month', $month, $expMonth,'id="expmonth" class="span6"');
												?>
										  
											 <?php
												$expYear=$cardDetails->expiration_year;
												$xpyear[""]="Year";
												for($i = date('Y'); $i <= date('Y') +  20; $i++) { 
												$xpyear[$i]= $i; //print_r($year);
												}
												//print_r($year);
												$sYear='';
												 echo form_dropdown('year', $xpyear, $expYear,'id="expyear" class="span6"');
												?>
											
										  </div>
										</div>
										 <!---<a href="#" class="btn btn-success pull-right "><?=(lang('Apps_storecreditcard'))?></a>--->
										 <input type="submit" name="save" id="creditCardDetails" value="<?=(lang('Apps_storecreditcard'))?>" class="btn btn-success pull-right "/>
										 <br clear="all"/><small class="pull-right"><b class="astrick">*</b> <?=(lang('Apps_fieldsmandatory'))?> </small>
									 </form>
									
								  </div>
								
							  </div>
						  </div>
						  <div class="tab-pane fade" id="Notification">
							  <div class="row-fluid">
								  <div class="span12">
								   <p  id="message" class="message" style="display:none"></p>
								  <strong> <?=(lang('Apps_notificationsetting'))?></strong>
								  <hr/>
								  <br/>
									<form class="form-horizontal offset1" name="notification" id="notification" action="notification_settings" method="post">
										<div class="control-group">
										  <label class="control-label " for="input"> <?=(lang('Apps_appointremainder'))?>: </label>
												<div class="controls">
												<?php
												if($settings->appointment_reminder=='yes'){
												 $ychck='checked';
												 $nchck='';
												}else{
												 $ychck='';
												 $nchck='checked';
												}
												?>
													<label class="radio inline">
													<?php echo form_radio('appointment_reminder', 'yes',$ychck , 'id="oppintment_reminder_on"'); ?>
														<!---<input type="radio" name="appointment_reminder" id="oppintment_reminder_on" value="yes">--->
														<?=(lang('Apps_on'))?> 
													</label>
													<label class="radio inline">
														<?php echo form_radio('appointment_reminder','no', $nchck, 'id="oppintment_reminder_off"'); ?>
														<!---<input type="radio" name="appointment_reminder" id="oppintment_reminder_off" value="no">--->
														<?=(lang('Apps_off'))?> 
													</label>
												</div>
										</div>
										
										<div class="control-group">
										  <label class="control-label" for="input"> <?=(lang('Apps_sendremindr'))?>:</label>
										  <div class="controls">
										  
										   <?php  
										   if($settings->appointment_reminder=='no'){
										    $disabled='disabled';
										   }elseif($settings->appointment_reminder=='yes'){
										    $disabled='';
										   }else{
										    $disabled='disabled';
										   }
											  $options=array(
											//""=>lang('Apps_days'),
											'1'=>"1 day notice",
											'2'=>"2 day notice",
											'3'=>"3 day notice",
											'4'=>"4 day notice"
											);
											 $selected = "$settings->remind_before";
											  echo form_dropdown('remind_before', $options, $selected ,'class=" span3" id="send_reminder"'.$disabled); ?>
											  
										  
											<!---<select class="span3" id="send_reminder" disabled name="remind_before">
												<option><?=(lang('Apps_days'))?></option>
												<option value="1">1 day notice</option>
												<option value="2">2 day notice</option>
												<option value="3">3 day notice</option>
												<option value="4">4 day notice</option>
											</select>--->
										  </div>
										</div>
										<div class="control-group">
										 <!-- <label class="control-label"  for="input"> <?=(lang('Apps_sendmetextmsg'))?>: </label>-->
										   <label class="control-label"  for="input"><?=(lang('Apps_allowpushnotify'))?> : </label> 
										  <div class="controls">
										  <?php
										  //if($settings->appointment_reminder=='no'){
										   // $disabled='disabled';
										  // }elseif($settings->appointment_reminder=='yes'){
										    $disabled='';
										  // }else{
										  // $disabled='disabled';
										  // }
												if($settings->send_message=='yes'){
												 $ychck='checked';
												 $nchck='';
												}else{
												 $ychck='';
												 $nchck='checked';
												}
												?>
										  <label class="radio inline">
										  <?php echo form_radio('send_message', 'yes',$ychck , 'id="txt_msg_on"'.$disabled); ?>
										  <!---<input type="radio" name="send_message" id="txt_msg_on" value="yes" disabled >--->
										   <?=(lang('Apps_on'))?> 
										</label>
										<label class="radio inline">
										 <?php echo form_radio('send_message', 'no',$nchck , 'id="txt_msg_off"'.$disabled); ?>
										  <!---<input type="radio" name="send_message" id="txt_msg_off" value="no" disabled>--->
										   <?=(lang('Apps_off'))?> 
										</label>
										</div>
										</div>
										 <input type="button" name="save" id="Usernotification" value="<?=(lang('Apps_save'))?>" class="btn btn-success span2 pull-right"/>
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
 function showeditDetails(){
    $("#showDetails").hide();
	$("#editicon").hide();
	$("#editDetails").show();
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
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        { 
            $("#editDetails").validate({
                rules: {
                    card_number: "required",
                    card_name: "required",
					 // month: "required",
					  // year: "required",
                },
                messages: {
                    card_number: "required",
                    card_name: "required",
                   // month: "required",
					  // year: "required",
                },
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '10px');
				},
                submitHandler: function(form) {
				var url=base_url+'clients/cardDetails';
				var data=$("#editDetails").serialize();
				 $.ajax({
				   url:base_url+'clients/cardDetails',
				   data:$("#editDetails").serialize(),
				   type:'POST',
				   success:function(data){  
						$.each(eval(data),function(i,v){
						  $("#card_name").html(v.card_name);
						  $("#card_number").html(v.credit_card_number);
						  $("#verification_number").html(v.verification_number);
						 
						  if(v.expiration_month!=0){
						  var month=new Array(12);
							month[1]="January";
							month[2]="February";
							month[3]="March";
							month[4]="April";
							month[5]="May";
							month[6]="June";
							month[7]="July";
							month[8]="August";
							month[9]="September";
							month[10]="October";
							month[11]="November";
							month[12]="December";
							
						 var expmonth=month[v.expiration_month];
						 }else{
						   var expmonth='';
						 }
						 if(v.expiration_year==0){
						   var expyear='';
						 }else{
						   var expyear=v.expiration_year;
						 }
						 $("#expirydate").html(expmonth+' '+expyear);
						});
						 $(".message").addClass("alert").html("Details saved successfully").css('display','block');
						  $("#showDetails").show();
						  $("#editicon").show();
						  $("#editDetails").hide();
 				   }
				 })	
                }
            });
        }
		
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

$("#removeimg").click(function(){ 
if($("#tempimg").val()!=1){
   $("#img").val('default.jpg');
   $("#actualImg").attr('src',base_url+'uploads/photo/default.jpg');
}if($("#status").val()==0 && $("#tempimg").val()==1){
   $("#img").val('default.jpg');
   $("#actualImg").attr('src',base_url+'uploads/photo/default.jpg');
}  
  $("#actualImg").show();
  $('#blah').hide();
  $("#status").val('0');
})
</script>
<?php if($flag=='1'){
?>
	<script>
		$(document).ready(function(){ 
		    $(".alert").hide();
			$("#key").val("");
			$("#updatePhone").val("");
			$('#verifyModal').modal('show');
			$("#verifyP").show();
			$("#getnumber").hide();
            $("#phonenumber").html(<?php echo $phonenumber ?>);			
		});
	</script>
<?php } ?>
<?php if($flag=='0'){
?>
	<script>
		$(document).ready(function(){
		$(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$('#verifyModal').modal('show');
		$("#verifyP").hide();
		$("#getnumber").show();
			//$('#getnumberModal').modal('show');
		});
	</script>
<?php } ?>
<script src="<?php echo base_url(); ?>js/dates/core.js" type="text/javascript"></script>
<?php include('include/popupmessages.php'); ?>
