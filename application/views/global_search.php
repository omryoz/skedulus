<?php if($this->session->userdata('language')=='hebrew'){ ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=iw"></script>
<?php }else{?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>
<script src="<?php echo base_url(); ?>js/googlemap.js"></script>
<div class="content container">
	<div class="row-fluid business_profile ">
		<div class="row-fluid Wrap">
			<div class="wrap_inner">
			<h3><?=(lang('Apps_searchbusiness'))?></h3>
				<div class="row-fluid strip">
					<form action="<?php echo base_url(); ?>search/global_search" method="post" name="search">
					<div class="span4">
						<input type="text" class="span12 manager_name" name="manager_name" value="<?php echo $manager_name; ?>" placeholder="<?=(lang('Apps_businessfor'))?>">
					</div>
					<div class="span3">
					  <!---<input id="searchTextField" type="text" name="location" class="span12 " size="50" placeholder="Enter a location" autocomplete="on" runat="server" value="<?php echo $location ?>" />  --->
					  <input  type="text"  class="postcode span12" id="Postcode" placeholder="<?=(lang('Apps_enterlocation'))?>" name="location" size="50" value="<?php echo $location ?>"  autocomplete="on" runat="server" />  
					<div id="geomap" style="display:none" style="width:100%; height:400px;">
					<p><?=(lang('Apps_loadingwait'))?>...</p>
					
				   </div>
                     
					</div>
					<div class="span3">	
                    
					 <?php echo form_dropdown('category',$getCategory,$category,' id="category" class="span12"')  ?>										
					</div>
					<div class="span2">						
						 <input type="submit" name="search" class="btn span12 pull-right btn-success" value="Search" />					
					</div>
					</form>
				</div>
				
			</div>
		</div>
		<?php /*<div class="row-fluid global_page">
					<ul class="inline unstyled g-search">
						
						<!-- <li>
							<label class="checkbox ">
							<input type="checkbox"> Open now  <i class="icon-time"></i>
							</label>
						</li> -->
						<li>
							<label class="checkbox ">
							<input type="checkbox"> House call <i class="icon-road"></i>
							</label>
						</li>
						
					</ul>
		</div> */?>
		<div class="row-fluid global-block">
		
			<div class="span12 moreresult ">
				
					<!--<ul class="inline unstyled g-search">
						<li>Sort By:</li>
						<li><a href="#"><span class="label label-info">Distance from me</span></a>
						</li>
						<li><a href="#"><span class="label">Rating</span></a></li>
						<li><a href="#"><span class="label">pricing</span></a></li>
					</ul>-->
					<hr/>
					<?php //print_r($searchResult); 
					if(isset($searchResult) && $searchResult!="") {
					foreach($searchResult as $result){
					$lastid=$result->business_id;					
					?>
					<div class=" global-div">
						<div class="row-fluid ">
								<div class="thumbnail span3">
									<div class="inblock">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>">
									
									<img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($result->image)?$result->image:'default.png'); ?>/280/1/1/business_logo">
									
									</a>
									</div>
								</div>
								<div class="span9">
								<?php  
								if(isset($favList) && in_array($result->business_id,$favList)){?>
								<a href="javascript:void(0)"><i class="icon-star icon-2x pull-right tool favourite" data-toggle="tooltip" data-val="<?php echo $result->business_id ?>" action="remove"   data-original-title="remove from Favourite" id="star<?php echo $result->business_id ?>"></i></a>
								<?php }else{ ?>
								<?php if(!isset($this->session->userdata['id'])) { ?>
									<a href="<?php echo base_url();?>bcalendar/referal_url/?url='<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>'" ><i class="icon-star-empty icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	
								<?php }else{?>	
								
								<a href="javascript:void(0)" id="addfav<?php echo $result->business_id ?>" ><i class="icon-star-empty icon-2x pull-right tool favourite" data-toggle="tooltip" data-val="<?php echo $result->business_id ?>" action="add"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	
								
								<!---<a href="javascript:void(0)" id="addfav<?php echo $result->business_id ?>" onclick="addfav(<?php echo $result->business_id ?>);" ><i class="icon-star-empty icon-2x pull-right tool favourite" data-toggle="tooltip" value="<?php echo $result->business_id ?>" action="add"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	--->
								<?php }		?>
								
								<?php } ?>
									<?php $count = $this->utilities->getPhotosLike($result->business_id,"business") ?>
									<div class="stronger">
										<h4> <a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><?php echo $result->business_name; ?></a> <i alt="<?=(!empty($result->business_id))?$result->business_id:""?>" rel="<?=(!empty($user_id))?$user_id:""?>" id="business" class="likes <?=(!empty($favorite) && in_array($result->business_id,$favorite))?"icon-heart":"icon-heart-empty"?>  tool" data-toggle="tooltip"  data-original-title="<?=($count)?$count:""?>" data-placement="right" ></i>
										</h4> 
									 </div>
									<h5><?php echo $result->manager_firstname." ".$result->manager_lastname; ?>  
									<small><em><?php echo $result->category_name; ?></em></small>
									</h5>
									<!---<small><?php  //echo $result->category_name ?> </small>--->
										<br clear="left">				
									<small class="muted"><?php echo $result->business_description;?><br clear="left">	<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><?=(lang('Apps_readmore'))?></a></small>
									
								<ul class="unstyled inline pull-right ul-rating">
								<li><div id="star" class="star-rate"> </div></li>		
								<!-- <li><a href="javascript:;"><i class="icon-time icon-large" title="open now"></i></a></li> -->
								
								</ul>
									
								</div>
								
						</div>
					</div>
					
					<?php 
					}?>
					
<?php					}else{ ?>
					 <p class="alert"><?=(lang('Apps_noresultfound'))?></p>
					<?php } ?>
						
						
				
			
			</div>
			<!-- <div class="span3 right-nav">
			<div class="row-fluid Wrap">
					 <div class="wrap_inner">
						<h3>Offers</h3>
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
				   </div>
						
				</div>
				<br/>
				</div> -->
</div>
</div>
</div></div>
</div>

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
	  
		  page= parseInt(page)+parseInt(3);
		   var data = {'page_num':page,'manager_name':$(".manager_name").val(),'location':$('.postcode').val(),'category':$("#category").val()};
		   $.ajax({
				type: "POST",
				url: base_url+"search/global_search",
				data:data,
				success: function(data) { 
				$(".moreresult").append(data);

				}
			});
	  }
	
	  
	  
function favourite(id,action){
	if(action=='remove'){
	apprise(unfavouritebusiness, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ 
	if(r){ 
	addRemoveFav(id,action);
	}else{ 
	return false; 
	} 
	});
	}else{
	addRemoveFav(id,action);
	}
}
//})

function addRemoveFav(id,action){ 
$.ajax({
   url:baseUrl+'search/addtoFav',
   data: {'id': id,'action':action},
   type:'POST',
   success:function(data){
    var str=data;
    var data=str.trim();
   if(action=="add"){
	$("#star"+data).attr("class","icon-star icon-2x pull-right tool").attr("data-original-title","Remove to Favourite");
	$("#star"+data).attr("action","remove");
	$("#star"+data).attr("onclick","favourite("+id+",'remove');");
    }else{
	$("#star"+data).attr("class","icon-star-empty icon-2x pull-right tool").attr("data-original-title","add to Favourite");
	$("#star"+data).attr("action","add");
	$("#star"+data).attr("onclick","favourite("+id+",'add');");
	}
	
   }
  })
}
	 

</script>

<script src="<?php echo base_url(); ?>js/jquery.raty.js" type="text/javascript"></script>
<?php include('include/popupmessages.php'); ?>

