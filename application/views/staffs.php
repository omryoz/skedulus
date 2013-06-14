<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        { 
            $("#addstaffs").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                     email: {
                        required: true,
                        email: true,
						remote: {
						  url: baseUrl+'staffs/checkEmail',
						  type: "post",
						  data: {
							email: function(){ return $("#email").val(); },
							id: function(){ return $("#id").val(); }
						  }
                     }
					},
					phonenumber :{
					required: true,
					digits: true
					}
                },
                messages: {
                    firstname: "First name is required",
                    lastname: "Last name is required",
                    email: {
					required: "Email is required",
					email: "Please enter a valid email address",
					remote: "Email already exist"
					},
				    phonenumber: {
					required: 'Phone number is required',
					digits: "Only numbers are allowed",
					}
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
<?php if(isset($success)){ ?>
	<p class="alert">Mail has been sent to the added staff member</p>
	<?php } ?>

						<div id="myTabContent" class="tab-content tabcontentbg">
						  <div class="tab-pane fade active in" id="staff">
							  <div class="row-fluid">
								<div class="">
									<h3>Staff List
										<a href="#myModal"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
									</h3>
									<?php if(isset($tableList)) { ?>
									<table class="table  table-staff table-hover  table-striped" >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4>Staff Name</h4></th>
										  <th><h4>Action</h4></th>
										</tr>
									  </thead>
									 <?php
									 $i=1;	
									 foreach($tableList as $content){ ?>
										<tr>
										  <td><?php echo $i; ?></td>
										  <td><?php echo $content['name']; ?></td>
										  <td>
										  <a href="#myModal" data-toggle="modal" onclick= editStaff(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="javascript:void(0);" onclick= deleteStaff(<?php echo $content['id'] ?>); data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									<?php $i++; } ?>
									</table>
									<?php }else{ ?>
									 <p class="alert">No staffs added yet</p>
									<?php } ?>
								 <?php if(isset($_GET['register'])) { ?>	
								  <a href="<?php echo base_url(); ?>services/list_services/?register" class="btn btn-success pull-left">Back</a>
							  <div class="pull-right"><a href="<?php echo base_url(); ?>overview"  class="btn btn-success " >Save & Continue</a>
								<?php } ?>	
							 </div>
						  </div>
						</div>      
					</div>
				</div>
			</div>
		
		</div><!--row-fluid-->
	</div><!--end of content-->
	
	
	<!--model for add staff-->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="staff1" id="edit" style="display:none">Edit Staff</h4>
		<h3 ><h4 id="add"> Add Staff</h4></h3>
	  </div>
	  <div class="modal-body">
	  <div>
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active"><a href="#add_staff" data-toggle="tab"><b>Staff</b></a></li>
              <li><a href="#add_service" data-toggle="tab"><b>Services</b></a></li>
			  <li><a href="#add_availability" data-toggle="tab"><b>Availability</b></a></li>
            </ul>
	  		<div id="serviceTabContent" class="tab-content">
				  <div class="tab-pane fade in active" id="add_staff">
					<form class="form-horizontal" action="<?php echo base_url() ?>staffs/manage_staffs/?insert" id="addstaffs" method="POST">
							<div class="control-group">
							  <label class="control-label" for="firstname">First Name :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" id="firstname" name="firstname" placeholder="First Name">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="lastname">Last Name :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" id="lastname" name="lastname" placeholder="Last Name">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="firstname">Email :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" id="email" name="email" placeholder="someone@example.com">
							  </div>
							</div>
							  <div class="control-group">
								<label class="control-label" for="inputPassword">Mobile Number :</label>
								<div class="controls">
								  <input class="input-large radi" type="text" id="phone_number" name="phonenumber" placeholder="+91" maxlength="15">
								
								</div>
							  </div> 
						 							  
				  
				  
				  
				  <input type="hidden" name="insert" value="insert" />
					   <div class="modal-footer" id="insert">
					   <input type="submit" name="save" class="btn btn-success" value="Save" />
					 </div> 
					  <?php if(isset($_GET['register'])){ ?>
					 <input type="hidden" name="register" value="register">
					 <?php } ?>
					 <div class="modal-footer" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" value="" />
					  <input type="submit" name="save" class="btn btn-success" value="Update" />
					  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" />Cancel</a>
					 </div> 
				 
				  
				  
				  
				  </div>
				 <div class="tab-pane fade" id="add_service">
					 <div class="row-fluid">
					  <h5>Assign services to staff</h5>
					 <?php if(isset($services) && $services!=""){ ?>
				<div class="span6 offset1">
				<?php foreach($services as $servicename){  ?>
							 <label class="checkbox">
							  <input type="checkbox" name="services[]" value="<?php echo $servicename->id; ?>" id="<?php echo $servicename->id; ?>" />
							<?php  echo $servicename->name;?>
							</label>
					<?php } ?>		
						 </div>
				<?php }else{?>
                <p class="alert">No services added yet</p>
				<?php } ?>
					 </div>
				 </div>
				 
				 
				  <div class="tab-pane fade" id="add_availability">
					 <div class="row-fluid">
					  
						 <h5> Add Staff Availability </h5>
						  <!--- <div class="row-fluid">
							 <div class="span6">
							  <center><b>Availability</b></center>
							  </div>
							   <div class="span6">
							   <center><b>Lunch Time</b></center>
							  </div>

						  </div>--->
						  
						  <?php 
							for($i=1;$i<=7;$i++) { 
							//$class="row-fluid ";
								if($i%2==0){
								$class="row-fluid no-background";
								}else{
								$class="row-fluid background";
								}
								$checked="";
								$classT="span6 inputime";
						  ?>
							<div class="<?php echo $class; ?>">
								<div class="span3"> <label class="checkbox">
								<input type="checkbox" id="<?php echo $i; ?>" onclick="getChecked(this,<?php echo $i ?>);"  name="<?php echo $i; ?>"><?php echo $weekdays[$i] ?></label> </div>
							
								<div class="span3">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class="<?php echo $classT; ?>"  name="<?php echo $i ?>from" id="<?php echo $i ?>from" readonly="readonly">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span3">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class="<?php echo $classT; ?>"  name="<?php echo $i ?>to" id="<?php echo $i ?>to" readonly="readonly">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<!---<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" id="L<?php //echo $i ?>" name="L<?php// echo $i ?>" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" id="<?php //echo $i ?>Lfrom" name="<?php// echo $i ?>Lfrom" >
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9"  id="<?php //echo $i ?>Lto" name="<?php //echo $i ?>Lto" >
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>--->
						</div>

					<?php } ?>
				</div>
					 </div>
				 </div>
				 
				 </form> 
			</div> 
			  
	  </div>
	  <!--<div class="modal-footer">
		 <button class="btn btn-success">Save changes</button>
	  </div>--->
	</div>	
	 </div>
</div>
<style>
.error{
color: #FB3A3A;
}
</style>
<script>

function getChecked(status,id){
	if(status.checked==true){
	$("#"+id+"from").attr("class","span6 inputime input-time");
	$("#"+id+"to").attr("class","span6 inputime input-time");
	}else if(status.checked==false){
	$("#"+id+"to").attr("class","span6 inputime");
	$("#"+id+"from").attr("class","span6 inputime");
	}
}


window.onload= function getavailability(){
    var url=baseUrl+'basicinfo/availability';
	$.ajax({
		data: {'id': 'getAvailability'},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){ 
		$("#"+v.weekid).attr('checked','checked');
		$("#"+v.weekid+"from").val(v.start_time);
		$("#"+v.weekid+"to").val(v.end_time);
		$("#"+v.weekid+"from").attr('class','span6 inputime input-time');
		$("#"+v.weekid+"to").attr('class','span6 inputime input-time');
		})
		}
	})
	
}
</script>