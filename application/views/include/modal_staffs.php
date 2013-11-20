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
                        //required: true,
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
					//required: "Email is required",
					email: "Please enter a valid email address",
					remote: "Email already exist"
					},
				    phonenumber: {
					required: 'Phone number is required',
					digits: "Only numbers are allowed",
					}
                },
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '10px');
				},
                submitHandler: function(form) { 
				if($("#assignstaff").val()==1 && $("#showavail").val()==1){
				form.submit();
				}else if($("#assignstaff").val()==''){
				$('#serviceTab a[href="#add_service"]').tab('show');
				//$("#assignstaff").val('1');
                }else{
				$('#serviceTab a[href="#add_availability"]').tab('show');
				$("#showavail").val('1');
				}
				}
            });
        }
		
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


// $('.assign').click (function(){
  
  // $("#assignstaff").val('1');
  
// });



function staffInsert(form){ 
var url=baseUrl+'staffs/manage_staffs/?insert'; 
if($("#userid").val()!=" "){
 if(form=='assignstaffs'){
    var action=validateform2();
	var message="Kindly assign atleast one service";
 }
 if(form=='staffavail'){
   var action=validateform3();
   var message='Kindly assign the staffs availability';
   
 }
 if(action){
  $.ajax({  
		  type: 'POST',
		  data: $("#"+form).serialize()+'&userid='+$("#userid").val(), 
		  url:url,
		  success: function(data){
		  //alert(data);
		  if(data!=""){
		  $("#userid").val(data);
		  if($("#action").val()=="add"){
		   var success="Inserted successfully";
		   }else{
		    var success="Updated successfully";
		   }
		   $("#success"+form).html(success);
		   $("#success"+form).show();
		   //$('#'+form)[0].reset();
		   $('#serviceTab a[href="#add_availability"]').tab('show');
		   if(form=='staffavail'){
			 $("#done").show();
		   }else{
		   $("#done").hide();
		   }
		 }
		  }
	});
  }else{ 
     
     $("#success"+form).html(message);
     $("#success"+form).show();
	 
  }
}else{
   $('#serviceTab a[href="#add_staff"]').tab('show');
   var message="Kindly fill in all the required details";
    $("#successaddstaffs").html(message);
	 $("#successaddstaffs").show();
   $('#'+form)[0].reset();
}
}

function validateform2(){ 
  if ($('#assignstaffs :checkbox:checked').length > 0){
	 return true;
   }else{
     return false;
   }
}
function validateform3(){ 
  if ($('#staffavail :checkbox:checked').length > 0){
	 return true;
   }else{
     return false;
   }
}
// function validateform1(){ 
  // if ($("#userid").val()!=''){
	 // return true;
   // }else{
     // return false;
   // }
// }

$(document).ready(function(){ 
$(".staffclose").click(function(){ 
  window.location.href=base_url+"staffs/list_staffs";
}) 
})
// $("#closeEdit").click(function(){ 
  // window.location.href=base_url+"staffs/list_staffs";
// })
</script>

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
              <li class="active"><a href="#add_staff" data-toggle="" class="tab"><b>Staff</b></a></li>
              <li><a href="#add_service" data-toggle="" class="tab"><b>Services</b></a></li>
			  <li><a href="#add_availability" data-toggle="" class="tab"><b>Availability</b></a></li>
            </ul>
			<form class="form-horizontal" action="<?php echo base_url() ?>staffs/manage_staffs/?insert" id="addstaffs" method="POST">
	  		<div id="serviceTabContent" class="tab-content"> <p class="alert" id="successaddstaffs" style="display:none"></p>
				  <div class="tab-pane fade in active" id="add_staff">
					
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
								  <input class="input-large radi" type="text" id="phone_number" name="phonenumber" placeholder="" maxlength="15">
								
								</div>
							  </div> 
				  </div>
				 <div class="tab-pane fade" id="add_service">
					 <div class="row-fluid">
					  <h5>Assign services to staff</h5>
					 <?php if(isset($services) && $services!=""){ ?>
				<div class="span6 offset1">
				<?php foreach($services as $servicename){  ?>
							 <label class="checkbox">
							  <input type="checkbox" class="assign" name="services[]" value="<?php echo $servicename->id; ?>" id="<?php echo $servicename->id; ?>" />
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
						<div class="row-fluid" id="showedited">
					
						</div>	
				 </div>
					
				</div>
					 </div>
				 </div>
				   <input type="hidden" name="insert" value="insert" />
				   <input type="hidden" name="assignstaff" value="" id="assignstaff" />
				   <input type="hidden" name="showavail" value="" id="showavail" />
				   
					  <div class="modal-footer" id="insert">
					  <input type="hidden" name="page" id="page" class="page" value="" />
					   <input type="submit" name="save" class="btn btn-success" value="Save" />
					 </div> 
					  <?php if(isset($_GET['register'])){ ?>
					 <input type="hidden" name="register" value="register">
					 <?php } ?>
					 <div class="modal-footer" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" value="" />
					  <input type="hidden" name="id" id="userid" value="" />
					  <input type="hidden" name="action" id="action" value="" />
					   <input type="hidden" name="type" id="type" value="" />
					  <input type="submit" name="save" class="btn btn-success" value="Update" />
					  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" />Cancel</a>
					 </div> 
				 </form> 
			</div>
			
			<script>

function getchecked(status,id){
  if(status.checked==true){
   $("#divO"+id).removeAttr("disabled");
   $("#divC"+id).removeAttr("disabled");
   }else if(status.checked==false){
   $("#divO"+id).attr('disabled',"disabled");
   $("#divC"+id).attr('disabled',"disabled");
   }
}



$(".assign").click(function(){
if($(".assign").is(":checked")){
$("#successaddstaffs").hide();
  $("#assignstaff").val('1');
}else{
  $("#assignstaff").val('');
  var message="Kindly assign atleast one service";
  $("#successaddstaffs").html(message);
  $("#successaddstaffs").show();
}
})

// window.onload= function getavailability(){
    // var url=baseUrl+'basicinfo/availability';
	// $.ajax({
		// data: {'id': 'getAvailability'},
		// url: url,
		// type:'GET',
		// dataType:'json',
		// success:function(data){
		// var content = eval(data);
		// $.each(content,function(i,v){ 
		//alert(v.start_time);
		// $("#"+v.weekid).attr('checked','checked');
		// $("#"+v.weekid+"from").text(v.start_time);
		// $("#"+v.weekid+"to").text(v.end_time);
		// $("#"+v.weekid+"from").attr('class','span6 inputime input-time');
		// $("#"+v.weekid+"to").attr('class','span6 inputime input-time');
		// })
		// }
	// })
	
// }
</script>