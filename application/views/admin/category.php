
		</div>
		<h3> <?=(lang('Apps_categorylist'))?>
						   <a href="javascript:;"  class="btn pull-right btn-success" id="cadd" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
						</h3> 
						<br/>
						
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<!-- <h4>Search Category</h4> -->
				<br/>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/category/" method="POST">
						<div class="span10">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 " value="<?php echo $search;?>" name="keyword" placeholder=" <?=(lang('Apps_searchcategory'))?>">
							
						</div>
						
						<div class="span2">						
							<input type="submit" name="search" class="btn btn-success span12" value=" <?=(lang('Apps_search'))?>">	
						</div>
					</form>
				</div>
			</div>
		</div><br/>
		<div class="row-fluid">
					<div class="">
						<?php if(isset($category) && $category!=''){ ?>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4> <?=(lang('Apps_category'))?></h4></th>
							  <th><h4> <?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						  <?php foreach($category as $list){ ?>
							<tr >
							  <td><?php echo $list->name; ?>
							  </td>
							  <td>
							  <a href="javascript:;" data-toggle="tooltip" data-name="<?php echo $list->name; ?>" data-val="<?php echo $list->id; ?>" class="tool editCategory" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="<?=base_url()?>admin/dash/deleteCat/<?php echo $list->id; ?>"  data-toggle="tooltip" class="tool confirm" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							  
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
		
		<!--start add category Modal -->
<div id="category_add" data-backdrop="static" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" class="title"></h3>
  </div>
  <form class="form-horizontal" action="<?php echo base_url() ?>admin/dash/category" class="Category" method="POST">
  <div class="modal-body">
   
   			<div class="control-group">
			<label class="control-label" for="inputEmail"> <?=(lang('Apps_categoryname'))?></label>
			<div class="controls">
			  <input type="text" name="category_name" class="category_name"  placeholder="<?=(lang('Apps_categoryname'))?>">
			  <input type="hidden" value="" name="catid" class="category_id">
			</div>
		  </div>  
  </div>
  <div class="modal-footer">
  <input type="submit" name="insert" value=" <?=(lang('Apps_save'))?>" class="btn btn-success">
    <!---<button class="btn btn-success">Save changes</button>--->
  </div></form>
  
</div>
<!--end add category Modal -->		
		
		
	</div>
</div>

<?php //include('footer.php')?>
