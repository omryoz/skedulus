<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<?php include('dash_navbar.php')?>
		
			<div class="row-fluid">
								<div class=" gallery">
									<h3>Offer List
										<a href="#offer"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
									</h3>
									<table class="table  table-striped table-staff table-hover" >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4>Offer Name</h4></th>
										  <th><h4>Action</h4></th>
										</tr>
									  </thead>
									 
										<tr >
										  <td>1</td>
										  <td>Offer1</td>
										  <td>
										   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>2</td>
										  <td>Offer2</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>3</td>
										  <td>Offer3</td>
										  <td>
										   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>4</td>
										  <td>Offer4</td>
										  <td>
										   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>5</td>
										  <td>Offer5</td>
										  <td>
										   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>6</td>
										  <td>Offer6</td>
										  <td>
										   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										
										
										
										
									</table>
									
							 
							  </div>
						  </div>
						</div>
			
		
	
		<div id="offer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 ><h4 >Add Offer</h4></h3>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal ">
				<div class="control-group">
				  <label class="control-label" for="firstname"> Offer Type :</label>
				  <div class="controls">
					<select>
					<option>Select Offer</option>
					<option>Combo Offer</option>
					<option>Individual Offer</option>
					</select>
				  </div>
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="firstname">Service Name :</label>
				  <div class="controls">
					<select>
					<option>Select Service</option>
					<option>Hair Color</option>
					<option>Hair Masage</option>
					<option>Spa</option>
					
					</select>
				  </div>
				</div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Offer Name :</label>
				<div class="controls">
				  <input class="input-large radi" type="text" placeholder="Offer Name" >
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Offer Description :</label>
				<div class="controls">
				  <textarea class="input-large radi" type="text" placeholder="Description" ></textarea>
				</div>
			  </div>     
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Discount :</label>
				<div class="controls">
				  <input class="input-large radi" type="text"  placeholder="Discount">
				</div>
			  </div>     
	  </form>
	  </div>
	  <div class="modal-footer">
		
		<button class="btn btn-success">Save </button>
	  </div>
	</div>
	
		
		
 	</div>
</div>


<?php include('footer.php')?>
