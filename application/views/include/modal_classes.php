<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addclasses").validate({
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
                    servicename: "required",
                    length:{
					required: 'required',
					digits: "Only numbers allowed",
					},	
                    price: {
					required: 'required',
					digits: "Only numbers allowed",
					},
					padding_time:{
					digits: "Only numbers allowed",
					}
										
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 

				},

                submitHandler: function(form) {
               // form.submit();
				 if($("#assignclass").val()==1){
					form.submit();
					}else if($("#assignclass").val()==''){
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

<!--model for add Classes-->

<div id="class-modal" class="modal hide fade" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
   
    <h3 id="myModalLabel">
	<h4 class="staff1 edit" id="edit" style="display:none"><?=(lang('Apps_editclasses'))?>   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></h4>
	<h4 class="staff1 add" id="add"><?=(lang('Apps_addclasses'))?>  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button></h4>
	 </h3>
  </div>
  <div class="modal-body">
    <div >
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active">
			  <a href="#general" data-toggle="" class="tab"><b><?=(lang('Apps_general'))?></b></a></li>
              <li><a href="#staff1" data-toggle="" class="tab"><b><?=(lang('Apps_staff'))?></b></a></li>
            </ul>
            <div id="serviceTabContent" class="tab-content">
			<p class="alert" id="successaddstaffs" style="display:none"></p>
              <div class="tab-pane fade in active" id="general">
                <form class="form-horizontal" action="<?php echo base_url() ?>services/manage_classes/?insert" id="addclasses" method="POST">
					  <div class="control-group">
						<label class="control-label" for="Service Name"><?=(lang('Apps_class_name'))?>  </label>
						<div class="controls">
						  <input type="text"  id="classname"  name="classname" placeholder="">						 
						</div>
					
					  </div>
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_length'))?></label>
						<div class="controls">
						 <input class="input-small" type="text" id="length" name="length" maxlength="2" placeholder="">&nbsp;&nbsp;
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
						 <input class="input-mini" type="text" id="paddingTime" name="padding_time" maxlength="2" placeholder="">&nbsp;<?=(lang('Apps_minutes'))?>
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
						  <input class="input-small" type="text" name="price" id="price"  maxlength="4" placeholder="">
						</div>
					  </div>
					  <div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_description'))?></label>
						<div class="controls" >
						  <textarea rows="3" name="description" id="description"></textarea>
						</div>
					  </div>
					  
					  <!----<div class="control-group">
						<label class="control-label" for="Lenth"><?=(lang('Apps_classsize'))?></label>
						<div class="controls" >
						  <input type="text" name="class_size" id="class_size" class=" valid" />
						</div>
					  </div>--->
					  
					  
             
              </div>
              <div class="tab-pane fade" id="staff1">
                <h5 class="staff"><?=(lang('Apps_asignstafftoclass'))?></h5>
				<?php if(isset($staffs) && $staffs!=""){ ?>
				<div class="row-fluid">
				<div class="span6 offset2">
				<?php foreach($staffs as $staffname){  ?>
							 <label class="checkbox">
							 <input type="checkbox" name="staffs[]" class="assign" value="<?php echo $staffname->users_id; ?>" id="<?php echo $staffname->users_id; ?>" />
								<?php  echo $staffname->first_name." ".$staffname->last_name;?>
							</label>
					<?php } ?>		
						 </div>
						 </div>
				<?php }else{?>
                <p class="alert"><?=(lang('Apps_nostaffadded'))?></p>
				<?php } ?>
              </div>
			  <input type="hidden" name="insert" value="insert" />
			   <input type="hidden" name="assignclass" value="" id="assignclass" />
					   <div class="modal-footer insert" id="insert">
					   <input type="submit" name="save" class="btn btn-success pull-right" value="Save" />
					   </div> 
					 <?php if(isset($_GET['register'])){ ?>
					 <input type="hidden" name="register" value="register">
					 <?php } ?>
					 <div class="modal-footer update" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" class="id" value="" />
					  <input type="hidden" name="page" id="page" value="" class="page"/>
					  <input type="submit" name="save" class="btn btn-success " value="<?=(lang('Apps_update'))?>" />
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
  $("#assignclass").val('1');
}else{
  $("#assignclass").val('');
  var message="Kindly assign atleast one staff";
  $("#successaddstaffs").html(message);
  $("#successaddstaffs").show();
}
})
</script>


