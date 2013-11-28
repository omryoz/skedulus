<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addClients").validate({
                rules: {
                    first_name: "required",
					last_name: "required",
                    phone: {
						required: true,
						digits:true
					},
					email: {
                        required: true,
                        email: true,
						remote: {
						  url: baseUrl+'clients/checkEmail',
						  type: "post",
						  data: {
							email: function(){ return $("#email").val(); },
							id: function(){ return $("#id").val(); }
						  }
                     }
					},
                },
                messages: {
                    first_name: "  required",
					last_name: "  required",
                    phone:{
					required: '  required',
					digits: " only numbers",
					},	
				email: {
					required: "  required",
					email: "  invalid email id",
					remote: "  email already exist"
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

</script>
            <div id="myTabContent" class="tab-content tabcontentbg">	  
			  <!-- basic info start -->
              <div class="tab-pane fade active in" id="service">
                <div class="row-fluid">
					<div class="">
						<h3 ><?=(lang('Apps_clientlist'))?> 
						   <a href="#" class="btn pull-right btn-success client" data-toggle="modal" onclick= "addClient();">+<?=(lang('Apps_add'))?></a>
						</h3>
						<?php if(isset($tableList)) { ?>
						<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>clients/list_clients/" method="GET">
						<div class="span10">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder="<?=(lang('Apps_businessfor'))?>">
							
						</div>
						
						<div class="span2">		
                         <input type="submit" name="search" class="btn btn-success span12" value="<?=(lang('Apps_search'))?>">						
						
						</div>
					</form>
				</div>
						<table class="table table-striped  table-staff table-hover " >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4><?=(lang('Apps_clientphoto'))?></h4> </th>
										  <th><h4><?=(lang('Apps_clientname'))?> </h4></th>
										  <th><h4><?=(lang('Apps_action'))?></h4></th>
										</tr>
									  </thead>
									  <?php
									 $i=1;	
									 foreach($tableList as $content){  ?>
										<tr>
										  <td><?php echo $i; ?></td>
										  <td class="profile-image"><center><img src="<?php echo base_url();?>uploads/photo/<?=(!empty($content['image'])?$content['image']:'default.jpg'); ?>" class="thumbnail" style="height: 50px;"></center></td>
										  <td><a href="<?php echo base_url(); ?>clients/profile/<?php echo $content['id'] ?>"><?php echo $content['name']; ?></a></td>
										  <td>
										  <a href="#client" data-toggle="modal" onclick= editClient(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  
										 
										  <a href="<?=base_url()?>clients/manage_clients?id=<?php echo $content['id']; ?>&delete=delete" data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									<?php $i++; } ?>
									</table>
									<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
									<?php }else{ ?>
									 <p class="alert"><?=(lang('Apps_noclientaddedyet'))?></p>
									<?php } ?>
								 	
										
									
						
						 
				  </div>
                </div>
                </div>     
            </div>
           

<!--model for add service-->

<div id="client" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="staff1" id="edit" style="display:none"><?=(lang('Apps_editclient'))?> </h4>
		<h4 class="staff1" id="add" ><?=(lang('Apps_addclient'))?> </h4>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal " name="addClients" id="addClients" action="<?php echo base_url() ?>clients/manage_clients/?insert" method="POST">
				<div class="control-group">
				  <label class="control-label" for="firstname"> <?=(lang('Apps_firstname'))?> :</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder=" <?=(lang('Apps_name'))?>" name="first_name" id="first_name">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="firstname"> <?=(lang('Apps_lastname'))?>:</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder=" <?=(lang('Apps_name'))?>" name="last_name" id="last_name">
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="firstname"> <?=(lang('Apps_email'))?>:</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder="<?=(lang('Apps_someonegmail'))?>" name="email" id="email">
				  </div>
				</div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword"> <?=(lang('Apps_phonenumber'))?>:</label>
		<div class="controls">
		  <input class="input-large " type="text" name="phone" id="phone" maxlength="15" >
		</div>
	  </div>
       <input type="hidden" name="insert" value="<?=(lang('Apps_insert'))?>">	  
		<div class="" id="insert">
		<input class="btn btn-success pull-right" type="submit" name="save"  value="<?=(lang('Apps_save'))?>">
	  </div>	  	
		<div class=" pull-right" style="display:none" id="update">
			  <input type="hidden" name="id" id="id" value="" />
			  <input type="submit" name="save" class="btn btn-success" value="<?=(lang('Apps_update'))?>" />
			   <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" /><?=(lang('Apps_cancel'))?></a>
			  <!---<a href="" onclick=submit(); name="save" class="btn btn-success pull-right" value="Cancel" /><?=(lang('Apps_cancel'))?></a>--->
		</div> 			
	  </form>
	  </div>
	</div>
 </div>
</div>
<style>
	.error{
	color: #FB3A3A;
	display:inline;
	}
</style>


