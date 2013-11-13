		<div class="row-fluid client">
		<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>clients/list_clients">My Clients</a> <span class="divider">/</span></li>
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
			
			<?php if(isset($appDetails)) { ?><br/>
			<h4><?=(lang('Apps_meetinghistory'))?></h4>
			<hr>
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
									<span > Service with <?php echo $resval->business_name ?></span> 
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
									<li><i class=" icon-time"></i><?php echo $difference_in_minutes; ?> min </li>			
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
			
			
			<?php }
			}?>
			
		</div>	
	
		
	
		
		
 	</div>
</div>
<script>
 function Appdetails(eventid){
		//if($("#userrole").val()=='manager'){
	   $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	  
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:eventid},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
			
			if(v.e_first_name!="" || v.e_last_name!=""){
			$("#name").html(v.e_first_name+" "+v.e_last_name);
			}else{
			$("#serviceprovider").css("display",'none');
			}
			if(v.type=='class'){
			var type='Class';
			$("#type").html(type);
			$("#typeName").html(v.services);
			//$("#reschedulebtn").hide();
			}else{
			var type='Services';
			$("#type").html(type);
			$("#typeName").html(v.services);
			$("#services_id").html(v.services_id);
			$("#employee_id").html(v.employee_id);
			$("#note").html(v.note);
			$("#user_id").html(v.user_id);
			
			}
			$("#date").html(v.date);
			$("#time").html(v.time);
			$("#endtime").html(v.endtime);
		  })
	   }
	   })
	   
	   $("#reschedule").modal('show');
		//activeEvent=dataObj;
		//ical.showPreview(evt, html);
		//}
	}
</script>
<div id="reschedule" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<p class="message"></p> 
 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Appointment Details</h3>
  </div>
  <div class="modal-body">
	<p id="eventid" class="hide"></p>
	<div class="row-fluid">
		<div class="row-fluid">
			<table class="table table-striped" >
			<tbody>
			
		   <tr> 
					  <td>
					    <span id="type"></span> 	
					  </td>
					  <td>
					   <span id="typeName"></span>
					  </td>
		   </tr>
		    <tr id="serviceprovider"> 
					  <td>
					    Service Provider	
					  </td>
					  <td>
					   <span id="name"></span>
					  </td>
		   </tr>
			 <tr> 
					  <td>
					    Date	
					  </td>
					  <td>
					   <span id="date"></span>
					  </td>
		     </tr>	
			  <tr> 
					  <td>
					    Time	
					  </td>
					  <td>
					   <span id="time"></span>
					   <span id="endtime" class="hide"></span>
					  </td>
		      </tr>
			   <tr> 
					  <td>
					    Message	
					  </td>
					  <td>
					   <span id="note"></span>
					  
					  </td>
		      </tr>
			</tbody>
			</table>
		</div>

	</div>
  </div>
</div>
