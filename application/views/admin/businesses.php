
		</div>
		<h3 ><?=(lang('Apps_businesseslist'))?>
						   
						</h3>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<!-- <h4>Search Businesses</h4> -->
				<br/>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/businesses/" method="POST">
						<div class="span10">
							<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder="<?=(lang('Apps_searchbusiness'))?>">
						</div>
						
						<div class="span2">						
						<input type="submit" name="search" class="btn btn-success span12" value="<?=(lang('Apps_search'))?>">		
							 <!---<a  href="global_search.php" class="btn span12 pull-right btn-success"> 
								<i class="icon-search"></i> Search
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
							  <th><h4><?=(lang('Apps_businessname'))?></h4></th>
							  <th><h4><?=(lang('Apps_owner'))?></h4></th>
							  <th><h4><?=(lang('Apps_email'))?></h4></th>
							  <th><h4><?=(lang('Apps_subscription'))?></h4></th>
							  <th><h4><?=(lang('Apps_status'))?></h4></th>
							  <th><h4><?=(lang('Apps_action'))?></h4></th>
							  
							</tr>
						  </thead>
						 <?php  foreach($contentList as $list){ ?>
							<tr >
							  <td><?php echo $list->business_name ?></td>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->email; ?></td>
							  <td><?php echo $list->subscription_name; ?> </td>
							  <td id="businessStatus<?php echo $list->business_id; ?>"><?php echo $list->status; ?> </td>
							  <td>
							  <!--  <a href="<?php echo base_url() ?>admin/dash/bDetails/<?php echo $list->business_id ?>" data-toggle="tooltip" class="tool" data-original-title="<?=(lang('Apps_view'))?>"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp; -->
							   
							   <div class="btn-group">
  <!---<a href="javascript:;" class="btn"><?=(lang('Apps_active'))?></a>--->
  <input type="button" name="status" title="<?php if($list->status=='active'){echo 'inactivate now';}else {echo 'activate now';} ?>" id="business<?php echo $list->business_id; ?>" value="<?php if($list->status=='active'){echo 'inactive';}else {echo 'active';} ?>" user-type="business" class="btn status" data-val="<?php echo $list->business_id; ?>" data-status="<?php echo $list->status; ?>">
  <a href="javascript:;" class="btn"><?=(lang('Apps_viewdashboard'))?></a>
</div>
							  <!---<a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>--->

							  </td>
							  
							</tr>
						<?php }?>
						
						</table>
						<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
						<?php }else{ ?>
						<p class="alert"> <?=(lang('Apps_norecordsfound'))?></p>
						<?php } ?>
				
				  </div>
          </div>
		

 	
		
		
	</div>
</div>

<?php //include('footer.php')?>
