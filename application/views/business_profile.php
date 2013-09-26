<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>less/skins/tn3/tn3.css"/>
<?php error_reporting(0); ?>
	<div class="content container">
	<div class="row-fluid business_profile bus_prof">
		<div class="row-fluid">
			<div class="span12 global-div profile-div">
				<div class="row-fluid">
					<div class="span3 ">
						<div class="thumbnail business_icon">
							<img src="<?php  echo base_url();?>uploads/business_logo/<?=(!empty($content->image)?$content->image:'default.png'); ?>">
						</div>
					</div>
					<div class="span9 rating-block">
					<h3 ><?php echo $content->manager_firstname."".$content->manager_lastname; ?>   <i class="icon-heart  tool" data-toggle="tooltip"  data-original-title="25 " data-placement="right"></i>
					<ul class="unstyled inline pull-right ul-rating">
						<li>
						
						</li>
						<li>
						<small class="pull-right">
						<?php if(isset($this->session->userdata['business_id'])){ ?>
						 <a href="<?php echo base_url(); ?>basicinfo/editinfo"><i class="icon-edit icon-large"></i></a>
						<?php }else{
						if(isset($isFav)){	
						?>
						<a href="<?php echo base_url(); ?>clients/favourite"><i class="icon-star icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="added to Favourite "></i></a>
						<?php }else{?>
						<a href="javascript:void(0)" id="addfav<?php echo $_GET['id'] ?>" onclick="addfav(<?php echo $_GET['id'] ?>);" ><i class="icon-star-empty icon-2x  tool" data-toggle="tooltip"  data-original-title="add to Favourite " id="star<?php echo $_GET['id'] ?>"></i></a>
						<?php } } ?>
						</small>
						</li>
					</ul>
						
					</h3>
					
						<strong><?php echo $content->category_name; ?></strong><br clear="left"/>
						<span> <?=(lang('Apps_phonenumber'))?><?php echo $content->mobile_number; ?> </span><br clear="left"/>
						<span><?php echo  $content->address; ?></span><br clear="left"/>							
						
						<span id="fullContent" style="display:none"> <?php echo $content->business_description;?></span>
						<span id="smallContent"><?php 
						$des =  $content->business_description;
						echo substr($des,0,50)."....";?>
						<br clear="left"/>
						<a href="javascript:void(0);" onclick="showFullContent()"> <?=(lang('Apps_viewmore'))?>..</a>
						</span>
						<div class="row-fluid rating-div">
							<div class="span6">
							   <?php if($content->business_type=="class") {
								 $url='bcalendar/calendar_business/'; ?>
								 <a href="<?php echo base_url(); ?><?php echo $url; ?><?=$content->business_id?>" class="btn btn-success " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))?></a>
								<?php }else if($content->business_type=="service") {
								 $url='bcalendar/cal/';
								?>
								<div class="btn-group pull-left">
								<!---<a href="#book"  class="btn btn-success left book_me" bookstatus="multi" role="button"  data-toggle="modal"> <?=(lang('Apps_bookme'))?></a>--->
								<a href="#bookmultiServices"  class="btn btn-success left bookmultiServices" role="button"  data-toggle="modal"> <?=(lang('Apps_bookme'))?></a>
								<a href="<?php echo base_url(); ?><?php echo $url; ?><?=$content->business_id?>" class="btn btn-success right " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))?></a>		
							</div>
							<?php }		?>
							</div>
							<div class="span6">
							<ul class="unstyled inline pull-right ul-rating">
								<li><div id="star" class="star-rate"> </div></li>		
								<!--<li><a href="javascript:;"><i class="icon-time icon-large" title="open now"></i></a></li>-->
								
							</ul>
							
							</div>
						</div>		
		            </div>
						
					</div>
			</div>
		</div>
		<?php if(isset($gallery)) { ?>
		<hr >
		<div class="row-fluid">
			<div class="filmstrip">
	<ul class="thumbnails scroller image_popup">
		<?php //for($i=1;$i<=$countPhoto;$i++){
		foreach($photoGallery as $gallery){
		?>
			<li class="">
				<a href="#" ><i class="icon-heart heart"></i></a><a href="#" ><i class="icon-comment comment "></i></a><a href="#" onClick="showPhoto(<?php echo $gallery->photo; ?>)" role="button"  data-toggle="modal"><img src="<?php  echo base_url();?>uploads/gallery/<?php echo $gallery->photo; ?>" alt="" ></a>
			</li>
		<?php } ?>
	</ul>

</div>
		</div>
		
		<hr >
		<?php } ?>
		<?php  if(isset($this->session->userdata['business_id'])) { ?>
		<p id="business_id" class="hide"><?=$this->session->userdata('business_id')?></p>
		<?php } else{ ?>
		<p id="business_id" class="hide"><?=(!empty($_GET['id'])?$_GET['id']:'')?></p>
		<?php }?>
		<div class="row-fluid">
			<div class="span9">
				
				<div class="accordion" id="accordion2">
				  <div class="accordion-group">
					<div class="accordion-heading"  >
						<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							<h3>  <?php echo lang($type); ?>  <i class="icon-chevron-down pull-right"></i></h3>
						 </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse ">
					  <div class="accordion-inner"><br/>
						<table class="table table-striped">
							<tbody><?php //print_r($services); ?>
							<?php foreach($services as $service){ ?>
								<tr>
									<th> <?php echo $service->name; ?></th>
									<?php if($service->time_type=='minutes'){
									   $conversion=1;
									}elseif($service->time_type=='hours'){
									   $conversion=60;
									} 
									
									//$total= $service->timelength * $conversion + $service->padding_time;
									?>
									<td><?php  echo "$".$service->price ?></td>
									<td>
									<?php 
									//$totaltime = minutesToHours($total) ;
									 //echo $totaltime." hour";
									 echo $service->timelength." ".$service->time_type; 
									?></td>
									
								   <?php if($this->session->userdata['role']=="manager"){ ?>
								   <td>
									<a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							        <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
									</td>
								   <?php }else{
								   $classtype="book_me";
								   if($type=="Classes"){
								   $popup= base_url().'bcalendar/calendar_business/'.$_GET['id'];
								  // $popup="#bookClass";
								   $classtype="book_class";
								   }else{
								   $popup="#book";
								   }
								    ?>
								   <td><a href="<?php echo $popup ?>" data-val="<?php echo $service->id; ?>" bookstatus="single" data-name="<?php echo $service->name; ?>"   class="btn btn-success left <?php echo $classtype ?>" role="button"  data-toggle="modal"> <?=(lang('Apps_bookme'))?> </a></td>
								   <?php } ?>
								</tr>
							<?php } ?>
								
								<!--<tr>
									<th> Hair Color</th>
									<td> $120 and up</td>
									<td> 2 hour</td>
								</tr>
								<tr>
									<th> Spa</th>
									<td> $160 and up</td>
									<td> 3 hour</td>
								</tr>-->
							</tbody>
						</table>
					  </div>
					</div>
				  </div><br/>
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#staff">
						 <h3>  <?=(lang('Apps_staff'))?>  <i class="icon-chevron-down pull-right"></i></h3>
					  </a>
					</div>
					<div id="staff" class="accordion-body collapse">
					  <div class="accordion-inner">
						<table class="table table-striped">
							<tbody>
							<?php foreach($staffs as $staff) { ?>
							 <tr>
								<th><img src="<?php  echo base_url();?>uploads/photo/<?=(!empty($staff->image)?$staff->image:'default.jpg');?>"></th>
								<td ><h5><?php echo $staff->first_name." ".$staff->last_name ?></h5></td>
								<td><a href="<?php echo base_url(); ?>bcalendar/staffSchedule/<?php echo $staff->users_id; ?>" class="btn btn-success"> <?=(lang('Apps_viewschedule'))?></a></td>
							    <?php if($this->session->userdata['role']=="manager"){ ?>
								<td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td> <?php } ?>
							</tr>
							<?php } ?>
								
								<!---<tr>
									<th><img src="../img/ID1.png"></th>
									<td ><h5>Mathew</h5></td>
									<td><a href="#" class="btn btn-success">View schedule</a></td>
								</tr>
								<tr>
									<th><img src="../img/ID1.png"></th>
									<td > <h5>Amma</h5></td>
									<td><a href="#" class="btn btn-success">View schedule</a></td>
								</tr>--->
							</tbody>
						</table>
					  </div>
					</div>
				  </div><br/>
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#offer">
						 <h3> <?=(lang('Apps_offer'))?><i class="icon-chevron-down pull-right"></i></h3>
					  </a>
					</div>
					<div id="offer" class="accordion-body collapse">
					  <div class="accordion-inner">
						<div class="row-fluid">
							<div class="span4">
							<h5>20% Off for hair cut</h5>
								Lorem ipsum dolar sit amit, Lorem ipsum dolar sit amit,
							</div>
							<div class="span8">
								<table class="table table-bordered offer-tab">
								<tbody>
								<tr>
								<td>Value</td>
								<td>Discount</td>
								<td>Savings</td>
								</tr>
								<tr>
								<td>$120</td>
								<td>20%</td>
								<td>$15</td>
								</tr>
								</tbody>
							</table>
							</div>
						</div>
					  </div>
					</div>
				  </div>
</div>
			
				
		
				
			</div>
			<div class="span3">
				<h3> <?=(lang('Apps_workinghour'))?></h3>
				<dl class="dl-horizontal days_dl">
				<?php foreach($availability as $available) { ?>
				<dt><?php echo $available->name ?></dt>
				<dd><?php echo date('h:i',strtotime($available->start_time)) ?> - <?php echo date('h:i',strtotime($available->end_time)) ?>  </dd>
				<?php } ?>
				
				  <!---<dt>Sunday</dt>
				  <dd>08:30 - 19:00  </dd>
				  <dt>Monday</dt>
				  <dd>08:30 - 15:00 </dd>
				  <dt>Tuesday</dt>
				  <dd>09:30 - 17:00  </dd>
				  <dt>Wednesday</dt>
				  <dd>10:30 - 19:00  </dd>
				  <dt>Thursday</dt>
				  <dd>08:30 - 17:00  </dd>
				  <dt>Friday</dt>
				  <dd>08:30 - 16:00  </dd>
				  <dt>Saturday</dt>
				  <dd>08:30 - 19:00  </dd>--->
				</dl>
				
				<!--<img src="../img/map.png">-->
			</div>
		</div>
		

	

	
<!----Book for a class -------->
<!----------book popup start------------>


<div id="bookClass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment">	
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_bookforclass'))?></h3>
	<br/><div id="booksuccess" class="alert" style="display:none"></div>
  </div>
  <div class="modal-body">
		   <p class="message"></p>	
		  
		   <!-- <div class="control-group">
			<label class="control-label" >Class</label>
			<div class="controls">
		
			  <input type="text" class="span6" id="classname"  readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Price</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="price" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Start Date</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="startdate" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >End Date</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="enddate" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Start Time</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="starttime" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >End Time</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="endtime" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Repeated</label>
			<div class="controls">
			 
			 <input type="text" class="span6 class" id="repeated" readonly="">
			</div>
		  </div>
		  <div class="control-group" id="repeatedDiv">
			<label class="control-label" >Repeated On</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="repeatedon" readonly="">
			</div>
		  </div>
		  <div class="control-group" id="instructor_name">
			<label class="control-label" >Instructor</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="instructor" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Last date to enroll</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="lastdate" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Capacity</label>
			<div class="controls">
			 
			 <input type="text" class="span6 class" id="capacity" readonly="">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Available</label>
			<div class="controls">
			  
			 <input type="text" class="span6 class" id="available" readonly="">
			</div>
		  </div> -->
		  
		  
		  <table class="table table-striped">
            
              <tbody>
                <tr>
                  <td> <?=(lang('Apps_class'))?></td>
				  
                  <td id="classname"></td>
                  
                </tr>
                <tr>
                  <td> <?=(lang('Apps_price'))?></td>
                  <td id="price" ></td>
                </tr>
                <tr>
                  <td><?=(lang('Apps_startdate'))?></td>
                  <td id="startdate" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_enddate'))?></td>
                  <td id="enddate" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_starttime'))?></td>
                  <td id="starttime" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_endtime'))?></td>
                  <td id="endtime" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_repeated'))?></td>
                  <td id="repeated" ></td>
                </tr>
				<tr id="repeatedDiv">
                  <td><?=(lang('Apps_repeatedon'))?></td>
                  <td id="repeatedon" ></td>
                </tr>
				<tr id="instructor_name">
                  <td> <?=(lang('Apps_instructor'))?></td>
                  <td id="instructor" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_lastdatetoenroll'))?></td>
                  <td id="lastdate" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_capacity'))?></td>
                  <td id="capacity" ></td>
                </tr>
				<tr>
                  <td> <?=(lang('Apps_available'))?></td>
                  <td id="available" ></td>
                </tr>
              </tbody>
            </table>
		  
	
  </div>
 
    <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	<input type="hidden" name="classid" value="" id="classid" />
	<input type="button" name="submit" value="<?=(lang('Apps_book'))?>" id="bookclass" class="btn btn-success span3 offset5"/>
  </div>
  </form>
</div>

<!--------book popup end------------->

<!-----Theater view modal start------>
<div id="theater_view" class="modal hide fade th3-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <center><b>Share this photo</b> <a href="javascript:;"> <img src="../images/fb.png" title="facebook"></a> <a href="javascript:;"> <img src="../images/tw.png" title="twitter"></a>
    <a href="javascript:;" type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</a> </center>
   
  </div>
  <div class="modal-body th3-modal-body">
   <?php  include('example.php')?>
  </div>
  <div class="modal-footer">
  <br/>
  <form class="form-horizontal">
  <div class="row-fluid thumbnail">
  	<div class="span1">
		<img src="../img/ID1.png">
	</div>
	<div class="span11">
		 <textarea placeholder="Write your comment here" class="span12" rows="2"></textarea>
	</div>
	
  </div>
 <br/><a href="javascript:;" class="btn btn-success btn-mini">Comment</a>
   </form>
  </div>
  
</div>
<!-----Theater view modal end------>

 	</div>
</div>

</div>
</div>
<script src="../js/jquery.raty.js" type="text/javascript"></script>
<script>
$('.star-rate').raty({ precision: true });
$('.star-rate').raty({

  half     : true,
  size     : 24,
  starHalf : '../img/star-half-big.png',
  starOff  : '../img/star-off-big.png',
  starOn   : '../img/star-on-big.png'
});

</script>
<script src="../js/jquery.tn3lite.min.js" type="text/javascript"></script>

<script>
$(".image_popup").click(function(){		
							   
		var tn1 = $('.mygallery').tn3({
						skinDir:"skins",
						imageClick:"fullscreen",
						image:{
						maxZoom:1.5,
						crop:true,
						clickEvent:"dblclick",
						transitions:[{
						type:"blinds"
						},{
						type:"grid"
						},{
						type:"grid",
						duration:460,
						easing:"easeInQuad",
						gridX:1,
						gridY:8,
						// flat, diagonal, circle, random
						sort:"random",
						sortReverse:false,
						diagonalStart:"bl",
						// fade, scale
						method:"scale",
						partDuration:360,
						partEasing:"easeOutSine",
						partDirection:"left"
						}]
						}
				});
			});

function showFullContent(){
 $("#smallContent").hide();
 $("#fullContent").show();
}

function viewSchedule(){ //alert("here");
  window.location.href="<?php echo base_url() ?>bcalendar/cal/<?php echo $_GET['id']?>";
}
</script>
<?php
function minutesToHours($minutes)
{
	$hours          = floor($minutes / 60);
	$decimalMinutes = $minutes - floor($minutes/60) * 60;

	# Put it together.
	$hoursMinutes = sprintf("%d:%02.0f", $hours, $decimalMinutes);
	return $hoursMinutes;
}

?>
<script>
 function addfav(id){
   $.ajax({
   url:baseUrl+'search/addtoFav',
   data: {'id': id},
   type:'POST',
   success:function(data){
   if(data!="false"){
	$("#star"+data).attr("class","icon-star icon-2x pull-right tool").attr("data-original-title","added to Favourite");
	$("#addfav"+data).attr("href","<?php echo base_url() ?>clients/favourite");
	$("#addfav"+data).removeAttr('onclick');
    }else{
	window.location.href="<?php echo base_url() ?>home/clientlogin";
	}
	
   }
  })
 }
</script>