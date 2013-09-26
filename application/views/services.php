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
				 error.css('padding-left', '8px');
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
            <div id="myTabContent" class="tab-content tabcontentbg">	  
			  <!-- basic info start -->
              <div class="tab-pane fade active in" id="service">
                <div class="row-fluid">
					<div class="">
						<h3 ><?=lang('Services')?>
						   <a href="#service-modal" class="btn pull-right btn-success" data-toggle="modal">+add</a>
						</h3>
						<?php  if(isset($tableList)){  ?>
						<table class="table table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4>#</h4></th>
								<th><h4><?=(lang('Apps_service_name'))?> </h4></th>
							  	<th><h4><?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						 <?php $i=1; 
						 foreach($tableList as $content){
						 ?>
						 <tr>
							  <td><?php echo $i; ?></td>
							  <td><?php echo $content['name']; ?></td>
							  <td>
							  <a href="#" data-toggle="modal"  onclick= editService(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="javascript:void(0);"  data-toggle="tooltip" class="tool" onclick= deleteService(<?php echo $content['id'] ?>); data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							  
						</tr>
						 <?php $i++;} ?>
						</table>
						<?php }else{?>
							<p class="alert"><?=(lang('Apps_noservicesaddedyet'))?></p>
						 <?php } ?>
						 <?php if(isset($_GET['register'])) { ?>
						  <a href="<?php echo base_url(); ?>basicinfo" class="btn btn-success pull-left">Back</a>
						  <?php $isExist =$this->common_model->getRow("user_business_services","user_business_details_id",$this->session->userdata("business_id"));
						if(isset($isExist) && $isExist!=""){
						  ?>
				         <div class="pull-right" ><a href="<?php echo base_url(); ?>staffs/list_staffs/?register=Service"  class="btn btn-success ">Save & Continue</a></div>
						 <?php } 
						 } ?>
				  </div>
                </div>
                </div>     
            </div>
            </div>

</div><!--row-fluid-->
</div><!--end of content-->

<!--model for add service-->

<div id="service-modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
    <h3 id="myModalLabel">
	<h4 class="staff1" id="edit" style="display:none"><?=(lang('Apps_editservice'))?></h4>
	<h4 class="staff1" id="add"><?=(lang('Apps_addservice'))?></h4>
	</h3>
  </div>
  <div class="modal-body">
    <div >
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active"><a href="#general" data-toggle="tab"><b><?=(lang('Apps_general'))?></b></a></li>
              <li><a href="#staff1" data-toggle="tab"><b><?=(lang('Apps_staff'))?></b></a></li>
            </ul>
            <div id="serviceTabContent" class="tab-content">
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
						 <input class="input-mini" type="text" id="length" name="length" maxlength="2" placeholder="">&nbsp;&nbsp;
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
						 <input class="input-mini" type="text" id="paddingTime" name="padding_time" maxlength="2" placeholder="">&nbsp;&nbsp;<?=(lang('Apps_min'))?>
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
					  <input type="hidden" name="insert" value="insert" />
					   <div class="" id="insert">
					   <input type="submit" name="save" class="btn btn-success" value="<?=(lang('Apps_save'))?>" />
					   </div> 
					 <?php if(isset($_GET['register'])){ ?>
					 <input type="hidden" name="register" value=" <?=(lang('Apps_register'))?>">
					 <?php } ?>
					 <div class="modal-footer" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" value="" />
					  <input type="submit" name="save" class="btn btn-success" value=" <?=(lang('Apps_update'))?>" />
					  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" /><?=(lang('Apps_cancel'))?></a>
					 </div> 
             
              </div>
              <div class="tab-pane fade" id="staff1">
                <h5 class="staff"> <?=(lang('Apps_assignstafftothisservice'))?></h5>
				<?php if(isset($staffs) && $staffs!=""){ ?>
				<div class="span6 offset1">
				<?php foreach($staffs as $staffname){  ?>
							 <label class="checkbox">
							 <input type="checkbox" name="staffs[]" value="<?php echo $staffname->users_id; ?>" id="<?php echo $staffname->users_id; ?>" />
								<?php  echo $staffname->first_name." ".$staffname->last_name;?>
							</label>
					<?php } ?>		
						 </div>
				<?php }else{?>
                <p class="alert"> <?=(lang('Apps_nostaffadded'))?></p>
				<?php } ?>
              </div>
			  </form>
            </div>
          </div>
  </div>
 <!--- <div class="modal-footer">
   
    <button class="btn btn-success">Save changes</button>
  </div> --->
</div>
 </div>
</div>



