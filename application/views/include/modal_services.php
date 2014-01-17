<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addservices").validate({
                rules: {
                    servicename: "required",
					padding_time:{
						digits:true
					},
                    length: {
						required: true,
						digits:true
					},
                    price: { 
					 required: true,
					 digits: true
					}
                },
                messages: {
                    servicename: " required",
                    length:{
					required: '  required',
					digits: "  Only numbers allowed",
					},	
                    price: {
					required: '  required',
					digits: " Only numbers allowed",
					},
					padding_time:{
					digits: " Only numbers allowed",
					}
										
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '8px');
				},

                submitHandler: function(form) { 
               // form.submit();
			      if($("#assignservice").val()==1 || $("#actionType").val()==1){
					form.submit();
					}else if($("#assignservice").val()==''){
					$('#serviceTab a[href="#staff1"]').tab('show');
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

function show(){
	$("#paddingtime").show();
	$("#padding_time").hide();
}
function showSelected(){
 var valu=$('#price_type').val();
 if(valu=='free'){
 $("#price").attr('disabled','disabled');
 $("#price").val(" ");
 }else{
 $("#price").removeAttr('disabled');
 }
}



</script>

<!--model for add service-->

<div id="service-modal" data-keyboard="false" data-backdrop="static" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">
	<h4 class="staff1 edit" id="edit" style="display:none"><?=(lang('Apps_editservice'))?></h4>
	<h4 class="staff1 add" id="add"><?=(lang('Apps_addservice'))?></h4>
	</h3>
  </div>
  <div class="modal-body">
    <div >
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active"><a href="#general" data-toggle="" class="tab"><b><?=(lang('Apps_general'))?></b></a></li>
              <li><a href="#staff1" data-toggle="" class="tab"><b><?=(lang('Apps_staff'))?></b></a></li>
            </ul>
            <div id="serviceTabContent" class="tab-content"><p class="alert" id="successaddstaffs" style="display:none"></p>
              <div class="tab-pane fade in active" id="general">
                <form class="form-horizontal" action="<?php echo base_url() ?>services/manage_services/?insert" id="addservices" method="POST">
					  <div class="control-group">
						<label class="control-label" for="Service Name"><?=(lang('Apps_service_name'))?> </label>
						<div class="controls">
						  <input type="text"  id="servicename"  name="servicename" placeholder="">						 
						</div>
					
					  </div>
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_length'))?></label>
						<div class="controls">
						 <!--- <input class="input-mini" type="text" id="length" name="length" maxlength="2" placeholder="">&nbsp;&nbsp;--->
						 <input type="number" name="length" id="length" max="120" min="5" class=" input-mini valid" step="5">
						<select class="input-small" name="type" id="type">
						  <option><?=(lang('Apps_minutes'))?></option>
						  <option><?=(lang('Apps_hours'))?></option>
						  </select>
						   <a href="javascript:void(0)" onclick="show();" id="padding_time"><?=(lang('Apps_addpaddingtime'))?></a>
						</div>
					  </div>
					  <div id="paddingtime" style="display:none">
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_padding'))?></label>
						<div class="controls">
						 <!---<input class="input-mini" type="text" id="paddingTime" name="padding_time" maxlength="2" placeholder="">&nbsp;&nbsp;<?=(lang('Apps_min'))?>--->
						 <input type="number" name="padding_time" id="paddingTime" max="120" min="5" class=" input-mini valid" step="5" placeholder="">
						<select class="input-small" name="padding_time_type" id="padding_time_type">
						  <option><?=(lang('Apps_before'))?></option>
						  <option><?=(lang('Apps_after'))?></option>
						  <option><?=(lang('Apps_beforeandafter'))?></option>
						 </select>
						</div>
					  </div>
					  
					  </div>
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_price'))?></label>
						<div class="controls">
						  <select class="input-small" name="price_type" id="price_type" onChange="showSelected()";>
						  <option value="fixed"><?=(lang('Apps_fixed'))?></option>
						  <option value="variable"><?=(lang('Apps_variable'))?></option>
						  <option value="free"><?=(lang('Apps_free'))?></option>
						  </select> <b>$</b>
						  <input class="input-mini" type="text" value="" name="price" id="price"  maxlength="4" placeholder="">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_description'))?></label>
						<div class="controls" >
						  <textarea rows="3" name="description" id="description"></textarea>
						</div>
					  </div>
					  
             
              </div>
              <div class="tab-pane fade" id="staff1">
			  <?php if(isset($staffs) && $staffs!=""){ ?>
                <h5 class="staff"> <?=(lang('Apps_assignstafftothisservice'))?></h5>
				
				<div class="row-fluid">
				<div class="span6 offset2">
				<?php foreach($staffs as $staffname){  ?>
							 <label class="checkbox">
							 <input type="checkbox" name="staffs[]" class=' assign staffs' value="<?php echo $staffname->users_id; ?>" id="<?php echo $staffname->users_id; ?>" />
								<?php  echo $staffname->first_name." ".$staffname->last_name;?>
							</label>
					<?php } ?>		
						 </div>
						 </div>
				<?php }else{?>
                <p class="alert"> <?=(lang('Apps_nostaffadded'))?></p>
				<?php } ?>
              </div>
			  <input type="hidden" name="insert" value="insert" />
			   <input type="hidden" name="assignservice" value="" id="assignservice" />
					  
					 <?php if(isset($_GET['register'])){
						//$val='1';
					 ?>
					 <input type="hidden" name="register" value=" <?=(lang('Apps_register'))?>">
					 <?php } ?>
					<?php if(empty($staffs)){
					$val='1';
					}else{
					$val='0';
					} ?>
					 <input type="hidden" name="actionType" value="<?php echo $val;?>" id="actionType" />
                     <div class="modal-footer insert" id="insert">
					   <input type="submit" name="save" class="btn btn-success pull-right" value="<?=(lang('Apps_save'))?>" />
					  </div> 					
					<div class="modal-footer update" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" value="" class="id"/>
					  <input type="hidden" name="page" id="page" class="page" value="" />
					  <input type="submit" name="save" class="btn btn-success " value=" <?=(lang('Apps_update'))?>" />
					  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" /><?=(lang('Apps_cancel'))?></a>
					 </div> 
			  </form>
            </div>
          </div>
  </div>
 <!--- <div class="modal-footer">
   
    <button class="btn btn-success">Save changes</button>
  </div> --->
</div>
  
<script>
$(".assign").click(function(){ 
if($(".assign").is(":checked")){
$("#successaddstaffs").hide();
  $("#assignservice").val('1');
}else{
  $("#assignservice").val('');
  var message="Kindly assign atleast one staff";
  $("#successaddstaffs").html(message);
  $("#successaddstaffs").show();
}
})
</script>