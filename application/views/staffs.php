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
									<?php
									if(isset($this->session->userdata['admin'])){
									  $users_id=$this->session->userdata['users_id'];
									}else{
									  $users_id=$this->session->userdata['id']; 
									}
									?>
									<a href="javascript:void(0);" onclick="getmydetails(<?=$users_id?>,<?=$this->session->userdata('business_id') ?>);" businessid="<? print_r($this->session->userdata('business_id')) ?>"  class="btn pull-right btn-success" data-toggle="modal">+<? echo "Add Myself";?> </a>
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
									     <tbody class="moreresult">
									 <?php
									 $i=1;	
									 foreach($tableList as $content){ 
										if($i<=$num){
									 ?>
										<tr>
										  <td><?php echo $i; ?></td>
										  <td><?php echo $content['name']; ?></td>
										  <td>
										  <a href="#myModal" data-toggle="modal" onclick= editStaff(<?php echo $content['id'] ?>,'staff');return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										<?php if(isset($_GET['register'])){ 
										  $register='register'; }else{
										  $register='';
										  }
										  ?>
										 <a href="<?=base_url()?>staffs/manage_staffs?id=<?php echo $content['id']; ?>&delete=delete&<?php echo $register ?>"  data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									<?php $i++; } }?>
									</tbody>
									</table>
									
									<?php  }else{ ?>
									 <p class="alert"><?=(lang('Apps_nostaffaddedyet'))?> </p>
									<?php } ?>
									<p class="nomore hide"></p>
								 <?php if(isset($_GET['register'])) {
									if($_GET['register']=='Class'){
									$url="services/list_classes/?register";
									}else{
									$url="services/list_services/?register";
									}
								 ?>	
								  <a href="<?php echo base_url(); ?><?php echo $url; ?>" class="btn btn-success pull-left"><?=(lang('Apps_back'))?> </a>
							  <div class="pull-right"><a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $this->session->userdata['business_id'];?>"  class="btn btn-success " ><?=(lang('Apps_savandcon'))?> </a>
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

	</div>		
	 </div>
</div>
<style>
.error{
color: #FB3A3A;
}
</style>
<?php include('include/popupmessages.php'); ?>
<script>

        var page = 0;
		$(window).scroll(function(){ 
		if($(window).scrollTop() + $(window).height() == $(document).height()) { 
		if($(".nomore").html()!='0'){
		showmore();
		}
		}
		 
      })
	  
	  function showmore(){
		  page= parseInt(page)+parseInt(10);
		   var data = {'page_num':page};
		   $.ajax({
				type: "POST",
				url: base_url+"staffs/list_staffs",
				data:data,
				success: function(data) { 
				var str=data;
                var data=str.trim();
				if(data!=0){
				$(".moreresult").append(data);
				}else{
				$(".nomore").html(data);
				}
				}
			});
	  }
	  
	 function deletethis(url){
	    apprise(confirmdelete, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=url; }else{ return false; } });
	  }
 

</script>

