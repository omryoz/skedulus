<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<div class="row-fluid">
			<?php include('admin_navbar.php')?>
		</div>
		<h3 >Offers List
						   
						</h3><br/>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h4>Search Offers</h4>
				<div class="row-fluid strip">
					<form action="global_search.php">
						<div class="span3">
							<input type="text" class="span12 " placeholder="Offer name">
						</div>
						
						<div class="span2">						
							 <a  href="global_search.php" class="btn span12 pull-right btn-success"> 
								<i class="icon-search"></i> Search
							  </a>
						</div>
					</form>
				</div>
			</div>
		</div><br/>
		<div class="row-fluid">
					<div class="">
						
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4>Offer Title</h4></th>
							  <th><h4>Status</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 
							<tr >
							  <td>offer name</td>
							  <td>Active</td>
							  <td>
							  <a href="admin_offer_detailview.php" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Deactivate"><i class="icon-minus-sign"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>offer name</td>
							  <td>Active</td>
							  <td>
							  <a href="admin_offer_detailview.php" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Deactivate"><i class="icon-minus-sign"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>offer name</td>
							  <td>Active</td>
							  <td>
							  <a href="admin_offer_detailview.php" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Deactivate"><i class="icon-minus-sign"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>offer name</td>
							  <td>Active</td>
							  <td>
							  <a href="admin_offer_detailview.php" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>&nbsp;&nbsp;&nbsp; <a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Deactivate"><i class="icon-minus-sign"></i></a>
							  </td>
							  
							</tr>
							
							
							
						</table>
				
				  </div>
          </div>
		


 

		
	</div>
</div>

<?php include('footer.php')?>
