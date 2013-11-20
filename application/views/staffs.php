<?php include('include/modal_staffs.php'); ?>
<?php if(isset($success)){ ?>
	<p class="alert"><?=(lang('Apps_mailsendtostaffmember'))?></p>
	<?php } ?>

						<div id="myTabContent" class="tab-content tabcontentbg">
						  <div class="tab-pane fade active in" id="staff">
							  <div class="row-fluid">
								<div class="">
									<h3><?=(lang('Apps_stafflist'))?>
									<div class="btn-group pull-right">
									<?php if(isset($added) && $added!='added'){ ?>
									<a href="javascript:void(0);" onclick="getmydetails(<?=$this->session->userdata('id') ?>,<?=$this->session->userdata('business_id') ?>);" businessid="<? print_r($this->session->userdata('business_id')) ?>"  class="btn pull-right btn-success" data-toggle="modal">+<? echo "Add Myself";?> </a>
									<?php } ?>
									<a href="javascript:void(0);" onclick="resetForm(<? print_r($this->session->userdata('business_id')) ?>);" businessid="<? print_r($this->session->userdata('business_id')) ?>"  class="btn pull-right btn-success" data-toggle="modal">+<?=(lang('Apps_add'))?> </a>
									
									</div>
									</h3>
									<?php if(isset($tableList)) { ?>
									<table class="table  table-staff table-hover  table-striped" >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4><?=(lang('Apps_staffname'))?>  </h4></th>
										  <th><h4><?=(lang('Apps_action'))?> </h4></th>
										</tr>
									  </thead>
									 <?php
									 $i=1;	
									 foreach($tableList as $content){ ?>
										<tr>
										  <td><?php echo $i; ?></td>
										  <td><?php echo $content['name']; ?></td>
										  <td>
										  <a href="#myModal" data-toggle="modal" onclick= editStaff(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <!--<a href="<?=base_url()?>staffs/manage_staffs?id=<?php echo $content['id']; ?>&delete=delete" onclick= deleteStaff(<?php echo $content['id'] ?>); data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>-->
										 <a href="<?=base_url()?>staffs/manage_staffs?id=<?php echo $content['id']; ?>&delete=delete"  data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									<?php $i++; } ?>
									</table>
									<center>	<span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
									<?php }else{ ?>
									 <p class="alert"><?=(lang('Apps_nostaffaddedyet'))?> </p>
									<?php } ?>
								 <?php if(isset($_GET['register'])) {
									if($_GET['register']=='Class'){
									$url="services/list_classes/?register";
									}else{
									$url="services/list_services/?register";
									}
								 ?>	
								  <a href="<?php echo base_url(); ?><?php echo $url; ?>" class="btn btn-success pull-left"><?=(lang('Apps_back'))?> </a>
							  <div class="pull-right"><a href="<?php echo base_url(); ?>overview"  class="btn btn-success " ><?=(lang('Apps_savandcon'))?> </a>
								<?php } ?>	
							 </div>
						  </div>
						</div>      
					</div>
				</div>
			</div>
		
		</div><!--row-fluid-->
	</div><!--end of content-->
	
	
	 
			  
	  </div>
	  <!--<div class="modal-footer">
		 <button class="btn btn-success">Save changes</button>
	  </div>--->
	</div>		
	 </div>
</div>
<style>
.error{
color: #FB3A3A;
}
</style>
