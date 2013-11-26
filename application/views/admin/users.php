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
							<input type="text" class="span4" value="<?php echo (!empty($_GET['keyword']))?$_GET['keyword']:"";?>" name="keyword" placeholder="<?=(lang('Apps_searchbyuser'))?>" />
							<select name="role" class="span4">
								<option value="">Select Role</option>
								<option value="manager" <?=(!empty($_GET['role']) && $_GET['role']=="manager")?"selected='selected'":""?>>Manager</option>
								<option value="employee" <?=(!empty($_GET['role']) && $_GET['role']=="employee")?"selected='selected'":""?>>Employee</option>
								<option value="client" <?=(!empty($_GET['role']) && $_GET['role']=="client")?"selected='selected'":""?>>Client</option>
							</select>
							<select name="status" class="span4">
								<option value="">Select Status</option>
								<option value="active" <?=(!empty($_GET['status']) && $_GET['status']=="active")?"selected='selected'":""?>>Active</option>
								<option value="inactive" <?=(!empty($_GET['status']) && $_GET['status']=="inactive")?"selected='selected'":""?>>Inactive</option>
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

 

<!--end add user Modal -->		
		
		
	</div>
</div>

<?php //include('footer.php')?>
