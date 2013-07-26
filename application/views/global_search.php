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
	<div class="row-fluid business_profile ">
		<div class="row-fluid Wrap">
			<div class="wrap_inner">
			<h3>Search Businesses</h3>
				<div class="row-fluid strip">
					<form action="<?php echo base_url(); ?>search/global_search" method="GET" name="search">
					<div class="span4">
						<input type="text" class="span12 " name="business_name" value="<?php echo $_GET['business_name'] ?>" placeholder="Business are you looking for?">
					</div>
					<div class="span3">
					  <input id="searchTextField" type="text" class="span12 " size="50" placeholder="Enter a location" autocomplete="on" runat="server" value="<?php echo $_GET['location'] ?>" />  
                      <input type="hidden" id="city2" name="location" value="<?php echo $_GET['location'] ?>" />
						<!---<input type="text" class="span12 " placeholder="Location" name="location" value="<?php //echo $_GET['location'] ?>">	--->
					</div>
					<div class="span3">	
                     <?php 
					 $selected="";
					 if($_GET['category']!=" ")
					 $selected = $_GET['category'] 
					 ?>
					 <?php echo form_dropdown('category',$getCategory,$selected,' id="category" class="span12"')  ?>										
					</div>
					<div class="span2">						
						 <input type="submit" name="search" class="btn span12 pull-right btn-success" value="Search" />					
					</div>
					</form>
				</div>
				
			</div>
		</div>
		<div class="row-fluid global_page">
					<ul class="inline unstyled g-search">
						
						<li>
							<label class="checkbox ">
							<input type="checkbox"> Open now  <i class="icon-time"></i>
							</label>
						</li>
						<li>
							<label class="checkbox ">
							<input type="checkbox"> House call <i class="icon-road"></i>
							</label>
						</li>
						
					</ul>
		</div>
		<div class="row-fluid global-block">
		
			<div class="span9 ">
				
					<ul class="inline unstyled g-search">
						<li>Sort By:</li>
						<li><a href="#"><span class="label label-info">Distance from me</span></a>
						</li>
						<li><a href="#"><span class="label">Rating</span></a></li>
						<li><a href="#"><span class="label">pricing</span></a></li>
					</ul>
					<hr/>
					<?php //print_r($searchResult); 
					if(isset($searchResult) && $searchResult!="") {
					foreach($searchResult as $result){ 
					?>
					<div class=" global-div">
						<div class="row-fluid ">
								<div class="thumbnail span3">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><img src="<?php echo base_url(); ?>uploads/business_logo/<?=(!empty($result->image)?$result->image:'default.png'); ?>"></a>
								</div>
								<div class="span9">
								<?php  
								if(isset($favList) && in_array($result->business_id,$favList)){?>
								<a href="<?php echo base_url(); ?>clients/favourite"><i class="icon-star icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="added to Favourite "></i></a>
								<?php }else{ ?>
								<a href="javascript:void(0)" id="addfav<?php echo $result->business_id ?>" onclick="addfav(<?php echo $result->business_id ?>);" ><i class="icon-star-empty icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>
								<?php }	?>
								
									<div class="stronger">
										<h4> <a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><?php echo  $result->manager_firstname." ".$result->manager_lastname ?></a> <i class="icon-heart  tool" data-toggle="tooltip"  data-original-title="25 " data-placement="right"></i>
										</h4>
									 </div>
									
									<small><?php  echo $result->category_name ?> </small>
										<br clear="left">				
									<small class="muted"><?php echo $result->business_description;?><br clear="left">	<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>">read more</a></small>
									
								<ul class="unstyled inline pull-right ul-rating">
								<li><div id="star" class="star-rate"> </div></li>		
								<li><a href="javascript:;"><i class="icon-time icon-large" title="open now"></i></a></li>
								</ul>
									
								</div>
								
						</div>
					</div>
					<?php 
					}
					}else{ ?>
					 <p class="alert">No result found</p>
					<?php } ?>
						
						
				
			
			</div>
			<div class="span3 right-nav">
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
				</div>
</div>
</div>
</div></div>
</div>
				<!--<div class="well">
					<img src="img/map.png">
				</div>--->
				
		
	

<script src="<?php echo base_url(); ?>js/jquery.raty.js" type="text/javascript"></script>
<script>
 function addfav(id){
   $.ajax({
   url:baseUrl+'search/addtoFav',
   data: {'id': id},
   type:'POST',
   success:function(data){
   if(data!="false"){
	$("#star"+data).attr("class","icon-star icon-2x pull-right tool").attr("data-original-title","added to Favourite");
	$("#addfav"+data).attr("href","http://localhost/skedulus/clients/favourite");
	$("#addfav"+data).removeAttr('onclick');
    }else{
	window.location.href="http://localhost/skedulus/home/clientlogin";
	}
	
   }
  })
 }
</script>