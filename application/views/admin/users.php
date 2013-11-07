<?php //include('header_login.php')?>
		</div>
		<h3 >Users List
						   <a href="#admin_add"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
						</h3><br/>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h4>Search Users</h4>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/users/" method="POST">
						<div class="span3">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder="Name">
							
						</div>
						
						<div class="span2">		
                         <input type="submit" name="search" class="btn btn-success" value="Search">						
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
							  <th><h4>Name</h4></th>
							  <th><h4>User role</h4></th>
							  <th><h4>Status</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 <?php foreach($contentList as $list){ ?>
							<tr>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->user_role; ?></td>
							  <td><?php echo $list->status; ?></td>
							  <td>
							  <a href="<?php echo base_url() ?>admin/dash/userDetails/<?php echo $list->id ?>" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp;
							  <!---<a href="admin_user_detailview.php" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>--->
							  </td>
							  
							</tr>
						<?php } ?>
							 
						</table>
						
								
						<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
							
						<?php }else{ ?>
						<p class="alert">No records found </p>
						<?php } ?>
				
				  </div>
          </div>
		
		<!-- Button to trigger modal -->

 
<!--start add user Modal -->
<div id="admin_add" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Add User</h3>
  </div>
  <div class="modal-body">
   <form class="form-horizontal">
   			<div class="control-group">
			<label class="control-label" for="inputEmail">Name</label>
			<div class="controls">
			  <input type="text" id="inputEmail" placeholder="Name">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputEmail">Email</label>
			<div class="controls">
			  <input type="text" id="inputEmail" placeholder="Email">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="Password">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword">Confirm Password</label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="Confirm Password">
			</div>
		  </div>
  
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
