<?php if($this->session->userdata('language')=='hebrew'){ ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=iw"></script>
<?php }else{?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>
<input type="hidden" name="showdraggable" id="draggable" value="false" >
<script src="<?php echo base_url(); ?>js/googlemap.js">

</script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>calendar/qtip/jquery.qtip.css">
<script type="text/javascript" src="<?php echo base_url() ?>calendar/qtip/jquery.qtip.js"></script>

<?php include('include/modal_staffs.php'); ?>
<?php if($type=='Services'){
include('include/modal_services.php');
}else{
include('include/modal_classes.php');
} ?>
<link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>less/skins/tn3/tn3.css"/>
<?php error_reporting(0); ?>
	<div class="content container">
	<div class="row-fluid business_profile bus_prof">
		<div class="row-fluid">
			<div class="span12 global-div profile-div">
				<div class="row-fluid">
					<div class="span3 ">
						<div class="thumbnail business_icon">
							<img src="<?php echo base_url();?>uploads/business_logo/<?=(!empty($content->image)?$content->image:'default.png'); ?>" />
						</div>
					</div>
					<div class="span9 rating-block">
					<h3 class="remove-margin"><?php echo $content->business_name; ?> <i class="<?=($checkFavourite)?"icon-heart":"icon-heart-empty"?> tool likes" data-toggle="tooltip"  data-original-title="<?=(!empty($checkFavouritecounts))?count($checkFavouritecounts):0?>" data-placement="right" alt="<?=(!empty($content->business_id))?$content->business_id:""?>" id="business" rel="<?=(!empty($user_id))?$user_id:""?>"></i> 
					<ul class="unstyled inline pull-right ul-rating">
						<li>
						
						</li>
						<li>
						<small class="pull-right">
						<?php if(!isset($this->session->userdata['id'])) { ?>
							<a href="<?php echo base_url();?>bcalendar/referal_url/?url='<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>'" ><i class="icon-star-empty icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	
						<?php }else{?>	
						<?php if(isset($this->session->userdata['business_id'])){ ?>
						 <a href="<?php echo base_url(); ?>basicinfo/editinfo"><i class="icon-edit icon-large"></i></a>
						<?php }else{
						if(isset($isFav)){	
						?>
						<a href="javascript:void(0)"><i class="icon-star icon-2x pull-right tool favourite" data-toggle="tooltip"  data-val="<?php echo $_GET['id'] ?>" action="remove"   data-original-title="remove from Favourite" id="star<?php echo $_GET['id'] ?>"></i></a>
						<?php }else{?>
						<a href="javascript:void(0)" id="addfav<?php echo $_GET['id'] ?>" ><i class="icon-star-empty icon-2x  tool favourite" data-toggle="tooltip"  data-original-title="add to Favourite " data-val="<?php echo $_GET['id'] ?>" action="add"  data-original-title="add to Favourite " id="star<?php echo $_GET['id'] ?>"></i></a>
						<?php } } }?>
						</small>
						</li>
					</ul>
						
					</h3>
					<h4><?php echo $content->manager_firstname." ".$content->manager_lastname; ?>  
					<small><em><?php echo $content->category_name; ?></em></small>
					</h4>
						<!---<strong><?php //echo $content->category_name; ?></strong><br clear="left"/>--->
						<p><?php echo $content->mobile_number; ?> | <?php echo  $content->address; ?></p>
						<!---<span><?php echo $content->mobile_number; ?> </span><br clear="left"/>
						<span><?php echo  $content->address; ?></span><br clear="left"/>	--->						
						
						<span id="fullContent" style="display:none"> <?php echo $content->business_description;?></span>
						<span id="smallContent"><?php 
						$des =  $content->business_description;
						echo substr($des,0,150)."....";?>
						<br clear="left"/>
						<a href="javascript:void(0);" onclick="showFullContent()"> <?=(lang('Apps_viewmore'))?>..</a>
						</span>
						<div class="row-fluid rating-div">
							<div class="span6">
							   <?php 

							   if($content->business_type=="class") {
								// $url='bcalendar/calendar_business/'; 
								 ?>
								 <?php if($staffid!=''){
								   $url='bcalendar/staffSchedule/';
								 ?>
								 <a href="<?php echo base_url(); ?><?php echo $url; ?><?=$staffid.'/Classes'?>" class="btn btn-success " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))
								?></a>
								<?php }else{
                                 $url='bcalendar/calendar_business/'; 
								?>
								 <a href="<?php echo base_url(); ?><?php echo $url; ?><?=$content->business_id?>" class="btn btn-success " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))?></a>
								<?php }?>		
								
								
								
								<?php }else if($content->business_type=="service") {
								// $url='bcalendar/cal/';
								?>
								<div class="btn-group pull-left">
								<?php if(isset($this->session->userdata['id'])){
								 $class='book_me';
								 $url1="#";
								}else{
								 $class="";
								 $v="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
								 $url1=base_url().'businessProfile/redirectUrl/?url='.$v;
								} ?>
								<a href="<?php echo $url1 ?>"  class="btn btn-success left <?php echo $class ?>" role="button"  data-toggle="modal"> <?=(lang('Apps_bookme'))?></a>
								
								<?php if($staffid!=''){ 
								 $url='bcalendar/staffSchedule/';
								?>
								
								
								<a href="<?php echo base_url(); ?><?php echo $url; ?><?=$staffid.'/Services'?>" class="btn btn-success right " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))?></a>
								 <?php }else{
								 $url='bcalendar/cal/';
								 ?>
								
								<a href="<?php echo base_url(); ?><?php echo $url; ?><?=$content->business_id?>" class="btn btn-success right " role="button" data-toggle="modal"> <?=(lang('Apps_viewschedule'))?></a>
								<?php } ?>
								
										
							</div>
							<?php }		?>
							<p id="profileid" class="hide"><?php print_r($_GET['id']) ?></p>
							<input type="hidden" class="startDateClass"  name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate" value="<?=date('D M d Y H:i:s O')?>"/>
							<input type="hidden" name="staffid" id="staffsid" value="">
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
		<?php if(isset($photoGallery) && $photoGallery!='') { ?>
		<hr />
		<link rel="stylesheet" href="<?=base_url()?>/less/lightbox.css" media="screen"/>
		<script src="<?=base_url()?>/js/lightbox-2.6.min.js"></script>
		<div class="row-fluid">
		<div class="filmstrip">
			<div class="image-row">
			<div class="image-set">
			<ul class="thumbnails scroller image_popup">
			<?php //for($i=1;$i<=$countPhoto;$i++){ 
			
			foreach($photoGallery as $key=>$gallery){
			?>
			<?php 
					$count = $this->utilities->getPhotosLike($gallery->id,"photos");
					
				?> 
			<li class="inblock"> 
				<!--<figcaption class="figcaption">
				<a href="#" ><i class="icon-heart heart"></i></a><a href="#theater_view"  role="button"  data-toggle="modal" ><i class="icon-comment comment "></i></a>
				</figcaption>
				<a href="#theater_view"  role="button"  data-toggle="modal"><img class="img-noresponsive" src="<?php  echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/280/1/1/gallery" alt="" ></a>-->
				<figcaption class="figcaption">
				
				<a href="javascript:;" ><i class="<?=(!empty($favorite_photos) && in_array($gallery->id,$favorite_photos))?"icon-heart":"icon-heart-empty"?> heart likes" title="<?=$count;?>" id="photos" alt="<?=(!empty($gallery->id))?$gallery->id:""?>" rel="<?=(!empty($user_id))?$user_id:""?>"></i></a>
				
				<!--<a href="#theater_view"  role="button"  data-toggle="modal" ><i class="icon-comment comment "></i></a>-->
				<a href="<?php echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/500/300/0/gallery" data-lightbox="example-1" ><i class="icon-comment comment example-image" rel="<?=$key?>" id="<?=$gallery->id?>"></i></a> 
				
				</figcaption>
				<a class="img-noresponsive example-image-link"  href="<?php echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/500/300/0/gallery" data-lightbox="example-set" title="<?=$gallery->title?>"><img class="example-image" rel="<?=$key?>" id="<?=$gallery->id?>" src="<?php  echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/280/1/1/gallery" alt="Plants: image 1 0f 4 thumb" /></a> 
				
			</li>
			<?php } ?>
			</ul>
			</div>
		</div>
		</div>
		
		<hr />
		<?php } ?>
		<?php  if(isset($this->session->userdata['business_id'])) { ?>
		<p id="business_id" class="hide"><?=$this->session->userdata('business_id')?></p>
		<?php } else{ ?>
		<p id="business_id" class="hide"><?=(!empty($_GET['id'])?$_GET['id']:$id)?></p>
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
					<div id="collapseOne" class="accordion-body collapse">
					  <div class="accordion-inner"><br/>
						<table class="table table-striped">
							<tbody><?php //print_r($services); ?>
							<?php if(!empty($services1)) {
							foreach($services1 as $service){ ?>
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
									
								   <?php if($this->session->userdata['role']=="manager"){ 
									if($type=='Services'){
									$href='#service-modal';
									$onclick='editService('.$service->id .',"profile");return false;';
									$dhref='services/manage_services?id='.$service->id.'&delete=delete&page=page';
									}else{
									$href='#class-modal';
									$onclick='editclasses('.$service->user_business_classes_id .',"profile");return false;';
									$dhref='services/manage_classes?id='.$service->user_business_classes_id.'&delete=delete&page=page';
									}	
								   ?>
								   <td>
									<a href="<?php echo $href ?>" data-toggle="modal" data-toggle="tooltip" class="tool" onclick=<?php echo $onclick; ?> data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							        <a href="<?=base_url()?><?php echo $dhref; ?>"  data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
									</td>
								   <?php }else{
								   
								   if($type=="Classes"){
								   $popup= base_url().'bcalendar/calendar_business/'.$_GET['id'];
								   $classtype="book_class";
								   }else{
								   if(isset($this->session->userdata['id'])){
									 $popup="#";
									 $classtype="book_me";
									}else{
									 $classtype="";
									 $v="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
									 $popup=base_url().'businessProfile/redirectUrl/?url='.$v;
									} 
								   
								   
								   }
								    ?>
									
									
									
									
								   <td><a href="<?php echo $popup ?>" data-val="<?php echo $service->id; ?>" data-name="<?php echo $service->name; ?>"   class="btn btn-success left <?php echo $classtype ?>" role="button"  data-toggle="modal"> <?=(lang('Apps_bookme'))?> </a></td>
								   <?php } ?>
								</tr>
							<?php } 
							}else{ ?>
								<?php if($type=='Services'){ 
								print_r(lang('Apps_noservicesaddedyet'));
								?>
								<?php }else{ 
								print_r(lang('Apps_noclasspostedyet'));
								?>
								
								<?php } ?>
							<?php } ?>
								
								
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
							<?php 
							if($staffs!=''){
							$i=1;
							foreach($staffs as $staff) {
							?>
							 <tr>
								<th><img src="<?php  echo base_url();?>uploads/photo/<?=(!empty($staff->image)?$staff->image:'default.jpg');?>"></th>
								<td ><h5><?php echo $staff->first_name." ".$staff->last_name ?></h5></td>
								<td><a href="<?php echo base_url(); ?>bcalendar/staffSchedule/<?php echo $staff->users_id; ?>/<?php echo $type; ?>" class="btn btn-success"> <?=(lang('Apps_viewschedule'))?></a></td>
							    <?php if($this->session->userdata['role']=="manager"){ ?>
								<td>
							   <a href="#myModal" data-toggle="modal" onclick= editStaff(<?php echo $staff->users_id ?>,'profile');return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="<?=base_url()?>staffs/manage_staffs?id=<?php echo $staff->users_id; ?>&delete=delete&page=page"  data-toggle="tooltip" class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td><?php } ?>
							</tr>
							<?php 
								$i++; } }else{
								print_r(lang('Apps_nostaffaddedyet'));
								}?>
								
								
							</tbody>
						</table>
					  </div>
					</div>
				  </div><!---<br/>
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
				  </div>--->
</div>
			
				
		
				
			</div>
			<div class="span3">
				<h3> <?=(lang('Apps_workinghour'))?></h3>
				<dl class="dl-horizontal days_dl">
				<?php foreach($availability as $available) { ?>
				<dt><?=(lang('Apps_'.$available->name))?><?php //echo $available->name ?></dt>
				<dd><?php echo date('H:i',strtotime($available->start_time)) ?> - <?php echo date('H:i',strtotime($available->end_time)) ?>  </dd>
				<?php } ?>
				
				</dl>
				
				<!---<img src="../img/map.png">-->
				
				<input id="hidLat" name="hidLat" type="hidden" value="<?php echo $content->map_latitude //echo $map_latitude; ?>">
                <input id="hidLong" name="hidLong" type="hidden" value="<?php echo $content->map_longitude//echo $map_longitude ?>"> 
		        <div class="">
				<div id="geomap" style="width:100%; height:200px;">
				<p><?=(lang('Apps_loadingwait'))?>...</p>
			    </div>
		         </div>
			</div>
		</div>


<!-----Theater view modal start------>
<div id="theater_view" class="modal hide fade th3-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <center><b>Share this photo</b> <a href="javascript:;"> <img src="../images/fb.png" title="facebook"></a> <a href="javascript:;"> <img src="../images/tw.png" title="twitter"></a>
    <a href="javascript:;" type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">&times;</a> </center>
   
  </div>
  <div class="modal-body th3-modal-body">
  
  
  
   <?php 
   
   //include('example.php')
   
   
   ?>
     <!--- <h4>Fixed Dimensions</h4>
	    <div class="tn3 description">Images with fixed dimensions</div>
	    <div class="tn3 thumb"></div>
	    <ol>
		<?php foreach($photoGallery as $gallery){ ?>
		<li>
		    <h4>Hohensalzburg Castle</h4>
		    <div class="tn3 description">Salzburg, Austria</div>
		    <a href="<?php  echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/280/1/1/gallery">
			<img src="<?php  echo base_url();?>common_functions/display_image/<?php echo $gallery->photo; ?>/280/1/1/gallery" />
		    </a>
		</li>
		<?php } ?>
		
	    </ol>--->
  </div>
  <div class="modal-footer">
  
  <form class="form-horizontal">
  <div class="row-fluid thumbnail">
  	<div class="span1">
		<img src="../img/ID1.png">
	</div>
	<div class="span11">
		 <textarea placeholder="Write your comment here" class="span12" rows="2"></textarea>
	</div>
	
  </div>
 <a href="javascript:;" class="btn btn-success btn-mini"><?=(lang('Apps_comment'))?></a>
   </form>
  </div>
  
</div>
<!-----Theater view modal end------>

 	</div>
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
						random:true,
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
<input type="hidden" id="id"  />
<script>
$(document).ready(function(){
	var user_id = '<?=(!empty($user_id))?$user_id:""?>';
	function comments(id){
		var url = base_url+"businessProfile/getComments/";
		var data = {"user_business_photogallery_id":id};
		$.post(url,data,function(msg){
			$(".comment-list").html(msg);
		});
	}
	var list=new Array(); 
	var data = eval('<?php print_r(json_encode($photoGallery)); ?>');
	$.each(data,function( index, value ) {
		list[index]=data[index].id;
	})
	$(".lb-prev").on("click",function(){
		if($("#id").val() > 0){
			$("#id").val(parseInt($("#id").val())-1);
		}else{
			$("#id").val(list.length-1);
		}
		//alert(list[$("#id").val()]);
		var photo_id = list[$("#id").val()];
		//alert(photo_id);
		comments(photo_id);
	});
	$(".lb-next").on("click",function(){
		$("#id").val(parseInt($("#id").val())+1);
		//alert(list[$("#id").val()]);
		var photo_id = list[$("#id").val()];
		//alert(photo_id); 
		comments(photo_id);
		$("#photo_id").val(photo_id);	
	});
	$(".example-image").on("click",function(){
		//alert($(this).attr("rel"));
		$("#id").val($(this).attr("rel"));
		var photo_id = $(this).attr("id");
		//alert(photo_id); 
		comments(photo_id);
		$("#photo_id").val(photo_id);
	});
	
	$(".comment-post").on("click",function(){
			var url = base_url+"businessProfile/createComments";
			if(!user_id){
				apprise("Kindly login to perform the action");
			}else{
				if($("#comment-box").val()){
					var data = {"comments":$("#comment-box").val(),"users_id":user_id,"user_business_photogallery_id":$("#photo_id").val()}; 
					$.post(url,data,function(msg){
						$(".comment-list").html(msg);
						$("#comment-box").val("");	
					});
				}else{
					apprise("Kindly enter comment.!");			
				}
			}
	});
	
	
	$('.star-rate').raty({
      half     : true,
      size     : 24,
      starHalf : '../img/star-off-big.png',
      starOff  : '../img/star-off-big.png',
      starOn   : '../img/star-off-big.png'
     })
});	

$('#geomap').qtip({
   content: {
   text:'<table cellpadding="5px" border="1" style="margin-top:12px; margin-bottom:12px; color:#fff; font-size:.7em;"><tr><?php echo  $content->address; ?></tr></table>',
   },
   show: 'mouseover',
   hide: 'mouseout',
   position: { target: 'mouse' }
})
</script>
<?php include('include/popupmessages.php'); ?>
