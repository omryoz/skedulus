
<link rel="stylesheet" type="text/css" href="css/bootstrap-wysihtml5.css"></link>

		</div>
		<h3 >Content List
						   <a href="#content_add"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
						</h3><br/>
		<!--<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h4>Search Users</h4>
				<div class="row-fluid strip">
					<form action="global_search.php">
						<div class="span3">
							<input type="text" class="span12 " placeholder="Username">
						</div>
						
						<div class="span2">						
							 <a  href="global_search.php" class="btn span12 pull-right btn-success"> 
								<i class="icon-search"></i> Search
							  </a>
						</div>
					</form>
				</div>
			</div>
		</div>--><br/>
		<div class="row-fluid">
					<div class="">
						
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4>Title</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 
							<tr >
							  <td>About Us</td>
							  <td>
							   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>Privacy</td>
							  <td>
							   <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>
							  </td>
							  
							</tr>
						</table>
				
				  </div>
          </div>
		
		<!-- Button to trigger modal -->

 
<!--start add user Modal -->
<div id="content_add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add Content</h3>
  </div>
  <div class="modal-body">
   <form class="form-horizontal">
   			
			  <textarea class="textarea span12" placeholder="Enter text ..."  rows="6"></textarea>
		
  
</form>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success">Save changes</button>
  </div>
  
</div>
<!--end add user Modal -->		
		
		
	</div>
</div>

<?php //include('footer.php')?>
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script>
	$('.textarea').wysihtml5();
</script>