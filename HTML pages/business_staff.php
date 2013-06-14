<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<?php include('dash_navbar.php')?>
		
			<div id="myTabContent" class="tab-content tabcontentbg">
						  
							  <div class="row-fluid">
								<div class="">
									<h3>Staff List
										<a href="#staff"  class="btn pull-right btn-primary" data-toggle="modal">+add</a>
									</h3>
									<table class="table  table-staff table-hover  table-striped" >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4>Staff Name</h4></th>
										  <th><h4>Action</h4></th>
										</tr>
									  </thead>
									 
										<tr >
										  <td>1</td>
										  <td>Mark</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>2</td>
										  <td>Jacob</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"> <i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>3</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
										
										<tr>
										  <td>4</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
										
										<tr>
										  <td>5</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									</table>
									
							<!--  <div class="pull-right"><a href="#"  class="btn btn-primary " >Save </a>-->
							  </div>
						  </div>
						</div>      
				
				</div>
			
		
	
		<div id="staff" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 ><h4 >Add Staff</h4></h3>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal ">
				<div class="control-group">
				  <label class="control-label" for="firstname">First Name :</label>
				  <div class="controls">
					<input class="input-large radi" type="text" placeholder="First Name">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="lastname">Last Name :</label>
				  <div class="controls">
					<input class="input-large radi" type="text" placeholder="Last Name">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="firstname">Email :</label>
				  <div class="controls">
					<input class="input-large radi" type="text" placeholder="someone@example.com">
				  </div>
				</div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword">Mobile Number :</label>
		<div class="controls">
		  <input class="input-large radi" type="text" placeholder="+91">
		</div>
	  </div>          
	  </form>
	  </div>
	  <div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
		<button class="btn btn-primary">Save changes</button>
	  </div>
	</div>
	
		
		
 	</div>
</div>


<?php include('footer.php')?>
