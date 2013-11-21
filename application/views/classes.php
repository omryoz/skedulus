<?php include('include/modal_classes.php'); ?>
            <div id="myTabContent" class="tab-content tabcontentbg">	  
			  <!-- basic info start -->
              <div class="tab-pane fade active in" id="service">
                <div class="row-fluid">
					<div class="">
						<h3><?=(lang('Apps_Classes'))?>
						   <a href="javascript:void(0);" class="btn pull-right btn-success" onclick="addClass()" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
						</h3>
						<?php  if(isset($tableList)){  ?>
						<table class="table table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4>#</h4></th>
						  <th><h4><?=(lang('Apps_class_name'))?> </h4></th>
						  <th><h4><?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						 <?php 
						 $i=1; 
						 foreach($tableList as $content){
						 ?>
						 <tr>
							  <td><?php echo $i; ?></td>
							  <td><?php echo $content['name']; ?></td>
							  <td>
							  <a href="#class-modal" data-toggle="modal"  onclick= editclasses(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  
							  
							  <a href="<?=base_url()?>services/manage_classes?id=<?php echo $content['id']; ?>&delete=delete"  data-toggle="tooltip" class="tool confirm"  data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							  
						</tr>
						 <?php $i++;} ?>
						</table>
						<center><span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
						<?php }else{?>
						 <p class="alert"><?=(lang('Apps_noclassadedyet'))?></p>
						 <?php } ?>
						 <?php if(isset($_GET['register'])) { ?>
						  <a href="<?php echo base_url(); ?>basicinfo" class="btn btn-success pull-left"><?=(lang('Apps_back'))?></a>
						  <?php $isExist =$this->common_model->getRow("user_business_classes","user_business_details_id",$this->session->userdata("business_id"));
						if(isset($isExist) && $isExist!=""){
						  ?>
				         <div class="pull-right" ><a href="<?php echo base_url(); ?>staffs/list_staffs/?register=Class"  class="btn btn-success "><?=(lang('Apps_savandcon'))?></a></div>
						 <?php } 
						 } ?>
				  </div>
                </div>
                </div>     
            </div>
            </div>

</div><!--row-fluid-->
</div><!--end of content-->

<!--model for add Classes-->


 </div>
</div>



