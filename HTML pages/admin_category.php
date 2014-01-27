<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<div class="row-fluid">
			<?php include('admin_navbar.php')?>
		</div>
		<h3 >Category List
						   <a href="#category_add"  class="btn pull-right btn-primary" data-toggle="modal">+add</a>
						</h3><br/>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3>Search Category</h3>
				<div class="row-fluid strip">
					<form action="global_search.php">
					<div class="span3">
						<input type="text" class="span12 " placeholder="Category Name">
					</div>
					
					<div class="span2">						
						 <a  href="global_search.php" class="btn span12 pull-right btn-primary"> 
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
							  <th><h4>Category</h4></th>
							  <th><h4>Status</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 
							<tr >
							  <td>Hair Color</td>
							  <td>Active</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>Hair Cut</td>
							  <td>Active</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>Body Spa</td>
							  <td>Active</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
							
							<tr >
							  <td>Body Massage</td>
							  <td>Active</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
							
							
							
						</table>
				
				  </div>
          </div>
		
		<!--start add category Modal -->
<div id="category_add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Category</h3>
  </div>
  <div class="modal-body">
   <form class="form-horizontal">
   			<div class="control-group">
			<label class="control-label" for="inputEmail">Add Category</label>
			<div class="controls">
			  <input type="text"  placeholder="Category name">
			</div>
		  </div>  
  
</form>
  </div>
  <div class="modal-footer">
    <button class="btn btn-primary">Save changes</button>
  </div>
  
</div>
<!--end add category Modal -->		
		
		
	</div>
</div>

<?php include('footer.php')?>
