		<div class="row-fluid client">
		<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>clients/list_clients"><?=(lang('Apps_MyClients'))?></a> <span class="divider">/</span></li>
  <li class="active"><?php print_r(ucwords($details->first_name." ".$details->last_name)); ?></li>
</ul>
			<h4><?=(lang('Apps_personal_details'))?></h4>
			<hr>
			
			<div class="row-fluid">
				<div class="span6">
				<dl class="dl-horizontal dl-client">
				  <dt><?=(lang('Apps_name'))?></dt>
				  <dd><?php print_r($details->first_name." ".$details->last_name); ?></dd>
				  <dt><?=(lang('Apps_dob'))?></dt>
				  <dd><?php //echo date("l jS \of F Y h:i:s A");
				  echo date("jS \of F ",strtotime($details->date_of_birth)); ?></dd>
				  <dt><?=(lang('Apps_selectgender'))?></dt>
				  <dd><?php
				  print_r(ucwords($details->gender)); ?></dd>
				</dl>
				</div>
				<div class="span3 offset3">
				<br/>
					<div class="profile-image pull-right">
						<img src="<?php echo base_url();?>uploads/photo/<?=(!empty($details->image)?$details->image:'default.jpg'); ?>">
					</div>
				</div>
			</div>
			
		
			<h4><?=(lang('Apps_contact_details'))?></h4>
			<hr/>
			<dl class="dl-horizontal dl-client">
			  <dt><?=(lang('Apps_email'))?></dt>
			  <dd><?php print_r($details->email); ?></dd>
			  <dt><?=(lang('Apps_phonenumber'))?></dt>
			  <dd><?php print_r($details->phone_number); ?></dd>
			  <dt><?=(lang('Apps_address'))?></dt>
			  <dd><?php print_r($details->address); ?></dd>
			 
			</dl>
			
			<?php //if(isset($appDetails)) { ?><br/>
			<h4><?=(lang('Apps_meetinghistory'))?></h4>
		
			<label class="radio inline">
			  <input type="radio" name="activity" id="future" class="getApp" value="future" checked="checked" onclick="showApp('future')">
			<?=(lang('Apps_upcomingapp'))?>
			</label>
			<label class="radio inline">
			  <input type="radio" name="activity" id="past" class="getApp" value="past" onclick="showApp('past')">
			  <?=(lang('Apps_pastapp'))?>
			</label>
			<hr><p class="hide userid"><?php echo $userid; ?></p>
			<div class="showapps">
			<?php if(isset($appDetails)) { ?>
			<?php foreach($appDetails as $val){ ?>
			<div class="appoint-date"><?php echo date("F j, Y ",strtotime(date('Y-m-d',strtotime($val)))); ?></div>
			<?php 
			 $where=' and users_id= "'.$userid.'" and user_business_details_id="'.$this->session->userdata['business_id'].'" ';
			$res=$this->common_model->getAllRows("view_client_appoinment_details","DATE(start_time)",$val,$where); 
 			//print_r($res);
			foreach($res as $resval){ ?>
				
					<div class="" >	
						<table >					
							<tbody>
								<tr>						
									<td class="appoint-time">						
									( <?php echo date('H:i',strtotime($resval->start_time)) ?>  - <?php echo date('H:i',strtotime($resval->end_time)) ?> )  
									<a href="javascript:void(0)" onclick="Appdetails(<?php echo $resval->id; ?>)" >
									<span > <?=(lang('Apps_servicewith'))?> <?php echo $resval->business_name ?></span> 
									</a>						
									</td>
								</tr> 
								<tr>						
									<td class="appoint-detail">			
									<ul class="inline unstyled">
									<?php
									  $difference = strtotime(date('H:i',strtotime($resval->end_time))) - strtotime(date('H:i',strtotime($resval->start_time)));
									  $difference_in_minutes = $difference / 60;
									?>
									<li><i class=" icon-time"></i><?php echo $difference_in_minutes; ?> <?=(lang('Apps_min'))?> </li>			
									<?php if($resval->employee_id!=0){ ?>
									<li> <i class=" icon-user"></i> <?php print_r( $resval->employee_first_name." ".$resval->employee_last_name); ?> </li>	
									<?php }?>									
									<li> <i class=" icon-map-marker"></i> <?php echo $resval->category_name; ?> </li>
									</ul>						
									</td>					
								</tr>				
							</tbody>
						</table>		
					</div>
					<?php } ?>
			
			
			<?php } ?><?php  }else{
			echo lang('Apps_noappointmentsfound');
			}?>
			</div>
			
			<input type="hidden" name="count" value="0" id="count">
			<a href="javascript:;" class="moreApp"  data-value="<?php print_r($lastDate)  ?>" profile-val="<?php echo $userid;?>"><?=(lang('Apps_viewmore'))?>..</a>
			<?php// }?>
		</div>	
	
		
	
		
		
 	</div>
</div>
<script>
 function Appdetails(eventid){
	   $(".titleAppointment").html("Appointment Details");
	   $(".modal-footer").hide();
	   $(".viewSchedule").hide();
	   $("#eventId").val(eventid);
	   $("#book").modal('show');
	   $(".message").removeClass("alert").html(" ");
	}
	
	$('.moreApp').click(function(){ 
	var val = $('.getApp:checked').val();
    //alert(val);
	$('.moreApp').show();
	var count=$("#count").val(); 
	var Nextcount=parseInt(count)+parseInt(2);
	$.ajax({
	  url:base_url+'clients/moreApp',
	  data:{'type':val,'count':Nextcount,'id':$(this).attr('profile-val')},
	  type:'POST',
	  success:function(data){
	   
	   if(data==0){
	   $('.moreApp').hide();
	   <?php if(isset($appDetails)) { ?>
	   $(".showapps").append(nomoreappointmentsfound);
	   <?php } ?>
	   }else{
	    $(".showapps").append(data);
	    $("#count").val(Nextcount);
		
	   }
	   
	   
	  }
	})
	  //alert($(this).attr('data-value'));
	})
	
	function showApp(type){
	  // alert(type);
	   $("#count").val(0);
		$(".showapps").html(" ");
		$('.moreApp').show();
	   $.ajax({
	   url:base_url+'clients/moreApp',
	   data: {'type':type,'count':0,'id':$(".userid").html()},
	   type:'POST',
	   success:function(data){
	   if(data==0){
	   var data=noappointmentsfound;
	   }
	   $(".showapps").html(data);
	   }
	   })
	}
</script>

<?php include('include/popupmessages.php'); ?>
