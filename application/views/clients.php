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
                    first_name: "required",
					last_name: "required",
                    phone:{
					required: 'required',
					digits: "only numbers",
					},	
				email: {
					required: "required",
					email: "invalid email id",
					remote: "Email already exist"
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
						<h3 >Clients List 
						   <a href="#client" class="btn pull-right btn-success" data-toggle="modal" onclick= resetForm("addClients");>+add</a>
						</h3>
						<?php if(isset($tableList)) { ?>
						<table class="table table-striped  table-staff table-hover " >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4>Client Photo</h4> </th>
										  <th><h4>Client Name</h4></th>
										  <th><h4>Action</h4></th>
										</tr>
									  </thead>
									  <?php
									 $i=1;	
									 foreach($tableList as $content){ ?>
										<tr>
										  <td><?php echo $i; ?></td>
										  <td ><center><img src="images/thumbss/11.jpg" class="thumbnail"></center></td>
										  <td><?php echo $content['name']; ?></td>
										  <td>
										  <a href="#client" data-toggle="modal" onclick= editClient(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  
										 
										  <a href="<?=base_url()?>clients/manage_clients?id=<?php echo $content['id']; ?>&delete=delete" data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									<?php $i++; } ?>
									</table>
									<?php }else{ ?>
									 <p class="alert">No Clients added yet</p>
									<?php } ?>
								 	
										
									
						
						 
				  </div>
                </div>
                </div>     
            </div>
           

<!--model for add service-->

<div id="client" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="staff1" id="edit" style="display:none">Edit Client</h4>
		<h4 class="staff1" id="add" >Add Client</h4>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal " name="addClients" id="addClients" action="<?php echo base_url() ?>clients/manage_clients/?insert" method="POST">
				<div class="control-group">
				  <label class="control-label" for="firstname">First Name :</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder=" Name" name="first_name" id="first_name">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="firstname">Last Name :</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder=" Name" name="last_name" id="last_name">
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="firstname">Email :</label>
				  <div class="controls">
					<input class="input-large " type="text" placeholder="someone@example.com" name="email" id="email">
				  </div>
				</div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword">Phone Number :</label>
		<div class="controls">
		  <input class="input-large " type="text" name="phone" id="phone" maxlength="15" >
		</div>
	  </div>
       <input type="hidden" name="insert" value="insert">	  
		<div class="modal-footer" id="insert">
		<input class="btn btn-success" type="submit" name="save"  value="Save">
	  </div>	  	
		<div class="modal-footer" style="display:none" id="update">
			  <input type="hidden" name="id" id="id" value="" />
			  <input type="submit" name="save" class="btn btn-success" value="Update" />
			  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" />Cancel</a>
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


