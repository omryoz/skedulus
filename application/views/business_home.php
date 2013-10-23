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
							
							
							
					</div>
		  		</div>
				</div>
				<!--code for left nav end  here-->
				
				<!--code for right nav start from here-->
				<div class="span3 right-nav" >
				<div class="row-fluid Wrap">
					 <div class="wrap_inner">
				<h3> <?=(lang('Apps_appointments'))?></h3>
						
						<div class="appoint-date">August 26, 2013</div>
					<div class="" >	
						<table >					
							<tbody>
								<tr>						
									<td class="appoint-time">						
									( 13:00 - 15:00 ) <br clear="left"/>  							
									<a href="javascript:void(0)" >
									<span > Service with Staff 5</span> 
									</a>						
									</td>
								</tr> 
								<tr>						
									<td class="appoint-detail">			
									<ul class="inline unstyled">
									<li><i class=" icon-time"></i> 180 min </li>			<li> <i class=" icon-user"></i> staff1 1 </li>			<li> <i class=" icon-map-marker"></i> Hair style </li>
									</ul>						
									</td>					
								</tr>				
							</tbody>
						</table>		
					</div>
						
					  		<a href="my_appointments.php" class="pull-right"> <?=(lang('Apps_viewmore'))?></a>					
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

