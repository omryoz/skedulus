<div class="content container">
	<div class="content container">
		<div class="row-fluid business_profile">	
			<div class="row-fluid">
				<div class="span4">
					<ul class="nav nav-tabs notify setting-tab" id="myTab">
					  <li class="active"><a href="#Cpassword" data-toggle="tab"><h4><i class="icon-user"></i> <?=(lang('Apps_changepwd'))?></h4></a>
					  </li>
					  
					</ul>
				</div>
				<div class="span8 general_setting">
					<div class="tab-content Personal-info" id="myTabContent">
						 <div class="tab-pane fade active in" id="Cpassword">
							  <div class="row-fluid">
								  <form class="form-horizontal" action="<?php echo base_url() ?>admin/dash/changePassword" method='POST' id="changepassword" name="changepassword">
										
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
						
						 
				</div>
			</div>
		</div>
	</div>
</div>
</div></div>

<script>


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
					required:"  Please Fill in your password",	
					minlength:" Minimum 6 characters is required"
					},
					confirmpassword:{
					//required: "Only numbers allowed",
					equalTo: "  Password does not match"
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


