<div class="container content">
<div class="row-fluid flexy-tab">

	<div class="span4">
	<ul class="nav " id="skedulus-tab">
	  <li class="active"><a href="#home"><h4>Schedule</h4>
							<p>See all your employees appointments in one snapshot. Easily add, edit and move appointments.</p>
						</a></li>
	  <li><a href="#profile"><h4>Get Personal</h4>
							<p>Upload your picture and a short bio about yourself so that new and old clients can see who you are.</p>
						</a></li>
	  <li><a href="#messages"><h4>Notify Everyone</h4>
							<p>Notifications are sent to you and your clients so that everyone knows what's going on with an appointment.</p>
					</a></li>
	  <li><a href="#settings">	<h4>Customized Services</h4>
							<p>Duration and price of services can be customized by each employee.</p>
					</a></li>
	</ul>
	</div>
	<div class="span8">
	<div class="tab-content">
	  <div class="tab-pane active" id="home">
		<img src="https://skeduler.com/assets/img/device-mac.png?1389412377" alt="">	
	  </div>
	  <div class="tab-pane" id="profile">
		<img class="top" src="https://skeduler.com/assets/img/biz-profile.png?1389412377" alt="">
		<img class="bottom" src="https://skeduler.com/assets/img/biz-profile2.png?1389412377" alt="">	
	  </div>
	  <div class="tab-pane" id="messages">
		<img class="employee" src="https://skeduler.com/assets/img/biz-notification1.png?1389412377" alt="">						
		<img class="customer" src="https://skeduler.com/assets/img/biz-notification2.png?1389412377" alt="">
	  </div>
	  <div class="tab-pane" id="settings">
		<img class="customservices" src="https://skeduler.com/assets/img/biz-customservices.png?1389412377" alt="">
	  </div>
	</div>
	</div>
	
	</div>
	
	<div class="row-fluid attribute-box">
		<ul class="sub-attribute unstyled ">
				<li><span>
					<i class="icon-plane"></i>
					<div>
						<h5>FAST</h5>
						<p>Get things done faster than ever.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-headphones"></i>
					<div>
						<h5>EASY</h5>
						<p>There is nothing to learn. You'll be up and running in 5 minutes.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-lock"></i>
					<div>
						<h5>SECURE</h5>
						<p>Bank-level security.  All your data is backed-up daily.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-star"></i>
					<div>
						<h5>AWESOME SUPPORT</h5>
						<p>We speak human and you can call us anytime.
						</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-flag"></i>
					<div>
						<h5>BETTER OVER TIME</h5>
						<p>Skeduler is always updated to keep up with your business.</p>
					</div></span>
				</li>
		</ul>
	</div>
	

	<div class="row-fluid">
						<h3 > <?=(lang('Apps_subscription'))?>:</h3> 
						<center> <?php //print_r($details); ?>
						<?php foreach($details as $val){ ?>
						<div class="span3 freebox">
							<h3><?php echo $val->title; ?></h3>
							<div class="span10 offset1">
								<table class="table table-striped subs-tab">
									<tbody>
									<?php if($val->users_num=='1' && $val->users_type!='morethan'){
											  $user='Single';
											  $userVal='only 1';
											}else{
											  if($val->users_type=='upto'){
											   $user='upto '.$val->users_num;
											   $userVal=$user;
											  }
											  if($val->users_type=='morethan'){
											   $user='more than '.$val->users_num;
											   $userVal=$user;
											  }
											  if($val->users_type=='unlimited'){
											   $user='unlimited';
											   $userVal=$user;
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="There can be <?php echo $userVal; ?> staff serving for your business.">
											<td>  <?=(lang('Apps_user'))?> </td>
											<th> <?  echo $user; ?></th>
										</tr>
										<?php if($val->business_num=='1' && $val->business_type!='morethan'){
											  $business='Single';
											  $bVal='only 1 business';
											}else{
											  if($val->business_type=='upto'){
											   $business='upto '.$val->business_num;
											   $bVal=$business.' businesses';
											  }
											  if($val->business_type=='morethan'){
											   $business='more than '.$val->business_num;
											    $bVal=$business.' businesses';
											  }
											  if($val->business_type=='unlimited'){
											   $business='unlimited';
											    $bVal=$business.' businesses';
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="You can manage <?php echo $bVal; ?> ">
											<td> <?=(lang('Apps_business'))?> </td>
											<th><?  echo $business; ?></th>
										</tr>
										<!---<tr data-toggle="tooltip" class="tool" data-original-title="There can be only 1 active offer for your business">
											<td> <?=(lang('Apps_offer'))?> </td>
											<th> 1 <?=(lang('Apps_active'))?></th>
										</tr>--->
										<?php if($val->picture_num=='1' && $val->pictures_type!='morethan'){
											  $pic='Single';
											  $picVal='Single picture';
											}else{
											  if($val->pictures_type=='upto'){
											   $pic='upto '.$val->picture_num;
											   $picVal=$pic.' pictures';
											  }
											  if($val->pictures_type=='morethan'){
											   $pic='more than '.$val->picture_num;
											   $picVal=$pic.' pictures';
											  }
											  if($val->pictures_type=='unlimited'){
											   $pic='unlimited';
											   $picVal=$pic.' pictures';
											  }
											} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="You business gallery can have <?php  echo $picVal;?> .">
											<td> <?=(lang('Apps_pictures'))?></td>
											<th><?  echo $pic; ?></th>
										</tr>
										<tr data-toggle="tooltip" class="tool" data-original-title="The business reports generated is the <?php echo $val->reports ?>.">
											<td> <?=(lang('Apps_reports'))?></td>
											<th><?php echo $val->reports ?></th>
										</tr>
										<?php if($val->promotion_notifications=='0'){
										 $report='<span class="pull-right"><b>0 </b><small>'.lang('Apps_canbebuysepratly').'</small></span>';
										 $reportVal=' has to be purchased  separately';
										}else{
										 $report= '<th><center>'.$val->promotion_notifications.'/Month</center></th>';
										 $reportVal=' are '.$val->promotion_notifications.'/month';
										} ?>
										<tr data-toggle="tooltip" class="tool" data-original-title="The Promotion notification for your business <?php echo $reportVal; ?>"><td colspan="6"><center><?=(lang('Apps_pro_notify'))?> </center></td></tr>
										<tr data-toggle="tooltip" class="tool" >
										<td  ><?php echo $report; ?></td></tr>
									</tbody>
								</table>
							</div>
							
									
								<p> <?php if($val->price=='0'){
								 $price='Contact Us';
								}else{
								 $price='$'.$val->price.'/'.(lang('Apps_month'));
								}?>
									<span><?php echo $price ?></span>
								</p>
								<!--<span class="label label-important add">Try it for free - 90days  </span>
								<a href="javascript:;" class="btn btn-success disabled" disabled="disabled"> <?=(lang('Apps_subscribenow'))?> !!</a>	-->
								<?php 
								$class='';
								if($flag==0){ 
									$disabled='';
									if($val->subscription_id!=4){
									if($exp==1){
									$url=base_url().'home/subscription/'.$val->subscription_id;
									 }else{
									$url='#';
									$class='showoptions';
									 }
									}else{
									$url='#';
									}
								}else{
								$disabled='disabled';
								$url='#';
								}
								?>
								<a href="<?php echo $url; ?>" planid="<?php echo $val->subscription_id ?>" planname="<?php echo $val->title; ?>" data-toggle="modal" class="btn btn-success <?php echo $disabled?> <?php echo $class?> " > <?=(lang('Apps_subscribenow'))?> !!</a>
								</div>
								
								<?php } ?>
								
						
			
			</center>
			</div>
	        <?php 
			  if(isset($status)){
				if($status==1){
				 // $url=base_url().'basicinfo';
				 $chck=$this->common_model->getRow('user_business_subscription','users_id',$this->session->userdata['id']);
				 if($chck){
				  $url=base_url().'basicinfo';
				  }else{
				  $url=base_url().'home/insert_sub_info';
				  }
				  $class='';
				  $phonenum='';
				}else{ //echo "dfsd"; exit;
				  $url='';
			      $class='verifyphone';
				  $phonenum=$phonenumber;
				}
			  }else{
			     $url='';
			     $class='managerSignup';
				 $phonenum='';
			  }
			  // if(isset($this->session->userdata['id'])) {
			     // $url=base_url().'basicinfo';
				 // $class='';
			  // }else{
			     // $url='';
			     // $class='managerSignup';
			  // } 
			  ?>
			  <br/>
			  <?php
				if($flag!=0){
			  ?>
	 <a  href="<?=$url; ?>" role="button"  data-toggle="modal" phone="<?php echo $phonenum ?>" class="btn btn-success  <?=$class ?>" ><i class="icon-ok icon-white"></i><?=(lang('Apps_startyourfreetrial'))?> </a>
	
	<br/><br/>
				<?php } ?>
					 
				
	
	
	
	
</div>
<script>
 $('#skedulus-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})

$(".managerSignup").click(function(){
		$('#create-user-modal').modal('show'); 
		$('.error').html(''); 
		$("#sign_up")[0].reset();$("#form2")[0].reset();
		$('#sign_up').show();$('#form2').hide();
	})
	
$(".verifyphone").click(function(){ 
     $('#verifyModal').modal('show');
	 $(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		if($(".verifyphone").attr('phone')!=''){
		$("#verifyP").show();
		$("#getnumber").hide();
		}else{  
		$("#verifyP").hide();
		$("#getnumber").show();
		}
		
})


$("#closeVerify").click(function(){
var action=$(this).attr('data-val');
var url=base_url+'bcalendar/chckStatus';
var data='';
$.post(url,data,function(data){ 
 if(data==1){ 
       window.location.href=base_url+'home/subscription';
	 }
 })
})

$(".showoptions").click(function(){ 
  $(".plan_name").html($(this).attr('planname'));
  $(".plan_id").html($(this).attr('planid'));
  $('#showoptions').modal('show');
  
})



</script>