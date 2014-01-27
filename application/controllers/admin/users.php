<?php //include('header_login.php')?>
		</div>
		
						
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
			<!-- 	<h4>Search Users</h4> -->
					<br/>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/users/" method="GET">
						<div class="span10">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span4" value="<?php echo $search;?>" name="keyword" placeholder="<?=(lang('Apps_searchbyuser'))?>" />
							<select name="role" class="span4">
								<option value="">Select Role</option>
								<option value="manager">Manager</option>
								<option value="employee">Employee</option>
								<option value="client">Client</option>
							</select>
							<select name="status" class="span4">
								<option value="">Select Status</option>
								<option value="active">Active</option>
								<option value="inactive">Inactive</option>
							</select>
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
							  <th><h4><?=(lang('Apps_userrole'))?></h4></th>
							  <th><h4><?=(lang('Apps_status'))?></h4></th>
							  <th><h4><?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						 <?php foreach($contentList as $list){ if($list->id!=0){ ?>
							<tr>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->user_role; ?></td>
							  <td id="userStatus<?php echo $list->id; ?>"><?php echo $list->status; ?></td>
							  
							  <td>
							<!--   <a href="<?php echo base_url() ?>admin/dash/userDetails/<?php echo $list->id ?>" data-toggle="tooltip" class="tool" data-original-title="<?=(lang('Apps_view'))?>"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="javascript:;" class="btn" ><?=(lang('Apps_active'))?></a> -->
							  
							    <div class="btn-group">
  <input type="button" name="status" title="<?php if($list->status=='active'){echo 'inactivate now';}else {echo 'activate now';} ?>" id="user<?php echo $list->id; ?>" value="<?php if($list->status=='active'){echo 'inactive';}else {echo 'active';} ?>" class="btn status" data-val="<?php echo $list->id; ?>" user-type="user" data-status="<?php echo $list->status; ?>">
 <!--- <a href="javascript:;" class="btn status" data-val="<?php echo $list->id; ?>" data-status="<?php echo $list->status; ?>"><?php if($list->status=='active'){echo 'active';}else {echo 'inactive';} ?></a>-->
  <a href="<?php echo base_url() ?>admin/dash/userDetails/<?php echo $list->id ?>" data-toggle="tooltip" class="tool btn" data-original-title="<?=(lang('Apps_view'))?>"><i class="icon-upload-alt"></i></a>
</div>
							  
							  <!---<a href="admin_user_detailview.php" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>--->
							  </td>
							  
							</tr>
						<?php } } ?>
							 
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
   <form class="form-horizontal">
   			<div class="control-group">
			<label class="control-label" for="inputEmail"> <?=(lang('Apps_name'))?></label>
			<div class="controls">
			  <input type="text" id="inputEmail" placeholder="<?=(lang('Apps_name'))?>">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputEmail"><?=(lang('Apps_email'))?></label>
			<div class="controls">
			  <input type="text" id="inputEmail" placeholder="<?=(lang('Apps_email'))?>">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword"><?=(lang('Apps_pwd'))?></label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="<?=(lang('Apps_pwd'))?>">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" for="inputPassword"> <?=(lang('Apps_confirmpwd'))?></label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="<?=(lang('Apps_confirmpwd'))?>">
			</div>
		  </div>
  
</form>
  </div>
  <div class="modal-footer">
    <button class="btn btn-success"> <?=(lang('Apps_save'))?></button>
  </div>
  
</div>
<!--end add user Modal -->		
		
		
	</div>
</div>

<?php //include('footer.php')?>
