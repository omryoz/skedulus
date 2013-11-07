
		</div>
		<h3 >Businesses List
						   
						</h3><br/>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h4>Search Businesses</h4>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/businesses/" method="POST">
						<div class="span3">
							<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder="Business name">
						</div>
						
						<div class="span2">						
						<input type="submit" name="search" class="btn btn-success" value="Search">		
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
							  <th><h4>Business name</h4></th>
							  <th><h4>Owner</h4></th>
							  <th><h4>Email</h4></th>
							  <th><h4>Subscription</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 <?php foreach($contentList as $list){ ?>
							<tr >
							  <td><?php echo $list->business_name ?></td>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->email; ?></td>
							  <td><?php echo $list->subscription_name; ?> </td>
							  <td>
							   <a href="<?php echo base_url() ?>admin/dash/bDetails/<?php echo $list->business_id ?>" data-toggle="tooltip" class="tool" data-original-title="View"><i class="icon-upload-alt"></i></a>&nbsp;&nbsp;&nbsp;
							  <!---<a href="javascript:;" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash"></i></a>--->

							  </td>
							  
							</tr>
						<?php }?>
						
						</table>
						<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
						<?php }else{ ?>
						<p class="alert">No records found </p>
						<?php } ?>
				
				  </div>
          </div>
		

 	
		
		
	</div>
</div>

<?php //include('footer.php')?>
