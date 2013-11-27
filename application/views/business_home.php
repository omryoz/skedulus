<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
<script type="text/javascript">
    function initialize() {
        var input = document.getElementById('searchTextField');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function () {
            var place = autocomplete.getPlace();
            document.getElementById('city2').value = place.name;
            document.getElementById('cityLat').value = place.geometry.location.lat();
            document.getElementById('cityLng').value = place.geometry.location.lng();
            //alert("This function is working!");
            //alert(place.name);
           // alert(place.address_components[0].long_name);

        });
    }
    google.maps.event.addDomListener(window, 'load', initialize); 
</script>
<div class="content container">
	<div class="row-fluid business_profile">
		<div class="row-fluid">
			<?php //include('navbar.php')?>
		</div>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3><?=(lang('Apps_searchbusiness'))?></h3>
				<div class="row-fluid strip">
					<form action="<?php echo base_url(); ?>search/global_search" method="POST" name="search">
					<div class="span4">
						<input type="text" class="span12 " name="manager_name" value="<?php ?>" placeholder="<?=(lang('Apps_businessfor'))?>">
					</div>
					<div class="span3">
					<input id="searchTextField" type="text"  class="span12 " size="50" placeholder="<?=(lang('Apps_enterlocation'))?>" autocomplete="on" runat="server" />  
                    <input type="hidden" id="city2" name="location" />
						<!---<input type="text" class="span12 " name="location" placeholder="Location">	--->
					</div>
					
					<div class="span3">		
                     <?php $selected = "" ?>
					 <?php echo form_dropdown('category',$getCategory,$selected,' id="category" class="span12"')  ?>						
					</div>
					<div class="span2">	
                    <input type="submit" name="search" class="btn span12 pull-right btn-success" value="<?=(lang('Apps_search'))?>" />					
					</div>
					</form>
				</div>
			</div>
		</div>
		
	
			<div class="row-fluid" >
			<!--code for left nav start from here-->
				<div class="span9 left-nav">
				
					
					<div class="row-fluid Wrap">
					 <div class="wrap_inner">
						 <?php $i=1; ?>
					 
							<ul class="thumbnails business_logo">
							<?php foreach($contentList as $content) {
							// if($i%4==0){
								// echo '</ul><ul class="thumbnails business_logo">';
							// }
							?>
								<li class="thumbnail span3 trans">
								<div class="inblock-logo">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
										<img src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($content['image'])?$content['image']:'default.png'); ?>/220/1/1/business_logo">
									</a>
								</div>
									<div class="caption">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
											<p class="text-left"><strong><?php echo $content['name']; ?></strong></p>
											<small> <?php echo $content['category_name']; ?> </small>
											</a>
										</div>
								</li>
								
							<?php 
							if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							}
							$i++; } ?>
								</ul>
							<center><span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>
							
							
					</div>
		  		</div>
				</div>
				<!--code for left nav end  here-->
				
				<!--code for right nav start from here-->
				<div class="span3 right-nav" >
				<div class="row-fluid Wrap">
					 <div class="wrap_inner">
				<h3> <?=(lang('Apps_appointments'))?></h3>
				<?php if(isset($appDetails)) { ?>
						<?php foreach($appDetails as $val){ 
						//if(date('Y-m-d',strtotime($val))>=date('Y-m-d')){
						?>
						<div class="appoint-date"><?php echo date("F j, Y ",strtotime(date('Y-m-d',strtotime($val)))); ?></div>
						<?php 
						$where=' and users_id= "'.$this->session->userdata('id').'" ';
						$res=$this->common_model->getAllRows("view_client_appoinment_details","DATE(start_time)",$val,$where); 
						
						foreach($res as $resval){ ?>
						<div class="" >	
						<table >					
							<tbody>
								<tr>						
									<td class="appoint-time">						
									(  <?php echo date('H:i',strtotime($resval->start_time)) ?> -  <?php echo date('H:i',strtotime($resval->end_time)) ?> ) <br clear="left"/>  							
									<a href="javascript:void(0)" onclick="Appdetails(<?php echo $resval->id; ?>)">
									<span ><?=(lang('Apps_servicewith'))?> <?php echo $resval->business_name ?></span> 
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
									<li><i class=" icon-time"></i><?php echo $difference_in_minutes; ?> <?=(lang('Apps_min'))?></li>
									<?php if($resval->employee_id!=0){ ?>									
									<li> <i class=" icon-user"></i><?php print_r( $resval->employee_first_name." ".$resval->employee_last_name); ?></li>			
									<?php }?>	
									<li> <i class=" icon-map-marker"></i><?php echo $resval->category_name; ?> </li>
									</ul>						
									</td>					
								</tr>				
							</tbody>
						</table>		
					</div>
						<?php } 
						} 
						?>
							<a href="<?php echo base_url() ?>bcalendar/mycalender" class="pull-right"> <?=(lang('Apps_viewmore'))?></a>					
						<?php }else{
						  print_r(lang('Apps_upcoming'));
						}	
						?>
				</div>
				</div>
				<!-- <div class="row-fluid Wrap">
					 <div class="wrap_inner">
						<h3><?=(lang('Apps_offer'))?></h3>
						<div class="offer" >
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Sarah Williams</strong>
										<p>Hair Studio</p>
										<small><i>On hair cut</i> </small>
									</div>
									<div class=" pull-right span4" >
										<div id="burst-12">
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>  
						<div class="offer" >
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Sarah Williams</strong>
										<p>Hair Studio</p>
										<small><i>On hair cut</i> </small>
									</div>
									<div class=" pull-right span4" >
										<div id="burst-12">
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>	
							<a href="offer.php" class="pull-right"> <?=(lang('Apps_viewmore'))?></a>							
				</div>
				</div>  -->
				
				
				 							
				</div>
				<!--code for right nav end  here-->
			</div>
	</div>		
 	</div>
</div>

</div></div>
<script>
function Appdetails(eventid){
	   $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:eventid},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
			// $("#business_name").html(v.business_name);
			 $("#business_id").html(v.business_details_id);
			 $("#services_id").html(v.services_id);
			// if(v.e_first_name!="" || v.e_last_name!=""){
			// $("#name").html(v.e_first_name+" "+v.e_last_name);
			// }else{
			// $("#serviceprovider").css("display",'none');
			// }
			if(v.type=='class'){ 
			classDetails(eventid);
			 var type='Class';
			 $("#type").html(type);
			}else{
			serviceDetails(eventid);
			 $(".viewSchedule").hide();
			 var type='Services';
			 $("#type").html(type);
			
			}
			
		  })
	   }
	   })
	   
	}
	
	function classDetails(eventid){
       $("#schedule").val('1');	
		$("#updateid").val(eventid);
		$(".appoint-heading").html("Appointment details");
	    $("#postclass").modal("show");
	}
	function serviceDetails(eventid){
		$("#eventId").val(eventid);
	   $(".titleAppointment").html("Reschedule an appointment");
	   $("#book").modal('show');
	}
	
	
</script>
<?php if($flag=='1'){?>
	<script>
		$(document).ready(function(){ 
			$('#verifyModal').modal('show');
			$("#verifyP").show();
			$("#getnumber").hide();
            $("#phonenumber").html(<?php echo $phonenumber ?>);			
		});
	</script>
<?php } ?>
<?php if($flag=='0'){?>
	<script>
		$(document).ready(function(){
		$('#verifyModal').modal('show');
		$("#verifyP").hide();
		$("#getnumber").show();
			//$('#getnumberModal').modal('show');
		});
	</script>
<?php } ?>

