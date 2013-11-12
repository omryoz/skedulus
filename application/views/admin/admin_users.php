<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addUser").validate({
                rules: {
                    name: "required",
                    email: {
                        required: true,
                         email: true,
						remote: {
						  url: baseUrl+'admin/dash/checkEmail',
						  type: "post",
						  data: {
							email: function(){ return $("#email").val(); }
						  }
                     }
					},	
					password:{ 
					required: true,
					minlength: "6",
					}
                    
                },
                messages: {
                    name: "  required",
                    email: {
					required: "  required",
					email: "  Please enter a valid email address",
					remote: "  Email already exist"
					},		
					password: {
					required:"  required",	
					minlength:"  Minimum 6 characters is required"
					}				
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

$(document).ready(function(){
 $(".addAdminUsers").click(function(){
$("#addUser")[0].reset();
$("#admin_add").modal('show');
})

})

</script>
<?php //include('header_login.php')?>
		</div>
		<h3> <?=(lang('Apps_userlist'))?> 
						   <a href="javascript:void(0);"  class="btn pull-right btn-success addAdminUsers" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
						</h3>
						
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
			<!-- 	<h4>Search Users</h4> -->
					<br/>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/users/" method="POST">
						<div class="span10">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder="<?=(lang('Apps_searchbyuser'))?>">
							
						</div>
						
						<div class="span2">		
                         <input type="submit" name="search" class="btn btn-success span12" value="<?=(lang('Apps_search'))?>">						
							<!--- <a  href="global_search.php" class="btn span12 pull-right btn-success"> 
								<i class="icon-search" name='search'></i> Search
							  </a>--->
						</div>
					</form>
				</div>
			</div>
		</div><br/>
		<div class="row-fluid">
					<div class="">
						<?php if(isset($contentList) && $contentList!=''){ ?>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4><?=(lang('Apps_name'))?></h4></th>
							 
							  <th><h4><?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						 <?php foreach($contentList as $list){ ?>
							<tr>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							 
							  <td>
							  <?php if($list->email!='admin@gmail.com'){ ?>
							  <!---<a href="javascript:;" data-toggle="tooltip" data-val="<?php echo $list->id; ?>" class="tool editCategory" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;--->
							  <a href="<?=base_url()?>admin/dash/delete_adminusers/<?php echo $list->id; ?>"  data-toggle="tooltip" class="tool confirm" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							 <?php } ?>
							  </td>
							  
							  
							</tr>
						<?php } ?>
							 
						</table>
						
								
						<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
							
						<?php }else{ ?>
						<p class="alert"> <?=(lang('Apps_norecordsfound'))?></p>
						<?php } ?>
				
				  </div>
          </div>
		
		<!-- Button to trigger modal -->

 
<!--start add user Modal -->
<div id="admin_add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_adduser'))?></h3>
  </div>
  <div class="modal-body">
   <form action="<?php echo base_url(); ?>admin/dash/admin_users/" method="POST" name="addUser" id="addUser" >
   			<div class="control-group">
			<label class="control-label" for="inputEmail"> <?=(lang('Apps_name'))?></label>
			<div class="controls">
			  <input type="text" name="name" id="name" placeholder="<?=(lang('Apps_name'))?>">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputEmail"><?=(lang('Apps_email'))?></label>
			<div class="controls">
			  <input type="text" name="email" id="email" placeholder="<?=(lang('Apps_email'))?>">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword"><?=(lang('Apps_pwd'))?></label>
			<div class="controls">
			  <input type="password" name="password" id="password" placeholder="<?=(lang('Apps_pwd'))?>" maxlength="15">
			</div>
		  </div>
		  <!----<div class="control-group">
			<label class="control-label" for="inputPassword"> <?=(lang('Apps_confirmpwd'))?></label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="<?=(lang('Apps_confirmpwd'))?>">
			</div>
		  </div>--->
  

  </div>
  <div class="modal-footer">
   <input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class="btn btn-success">
    
  </div>
  </form>
</div>
<!--end add user Modal -->		
		
		
	</div>
</div>

<?php //include('footer.php')?>
