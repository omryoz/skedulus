

<div class="content container">
	<div class="row-fluid business_profile">
		<div class="row-fluid">
			<?php //include('navbar.php')?>
		</div>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3>Search Businesses</h3>
				<div class="row-fluid strip">
					<div class="span4">
						<input type="text" class="span12 search_input" placeholder="Business Name">
					</div>
					<div class="span3">
						<input type="text" class="span12 search_input" placeholder="Location">	
					</div>
					<div class="span3">													
						<select class="span12">
								<option value="0">Categories</option>
								<option value="1">Hair Style</option>
								<option value="2">Boutique</option>
								<option value="3">Spa</option>
								<option value="4">Yoga classes</option>
						</select>	
					</div>
					<!--<div class="span1"><a href="#" class="btn  span12"><i class="icon-star "></i></a></div>-->
					<div class="span2">						
						 <a  href="#" class="btn span12 pull-right btn-success"> <i class="icon-search"></i> Search</a>
					</div>
				</div>
			</div>
		</div>
		
	
			<div class="row-fluid" >
			<!--code for left nav start from here-->
				<div class="span9 left-nav">
				
					
					<div class="row-fluid Wrap">
					 <div class="wrap_inner">
						 <?php $i=0; ?>
					 
							<ul class="thumbnails business_logo">
							<?php foreach($contentList as $content) {
							if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							}
							?>
								<li class="thumbnail span3 trans">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
										<img src="<?php echo base_url(); ?>uploads/business_logo/<?php echo $content['image']; ?>">
										<div class="caption">
											<p class="text-left"><strong><?php echo $content['name']; ?></strong></p>
											<small> <?php echo $content['category_name']; ?> </small>
										</div>
									</a>
								</li>
								
							<?php $i++; } ?>
								</ul>
							
							
							
					</div>
		  		</div>
				</div>
				<!--code for left nav end  here-->
				
				<!--code for right nav start from here-->
				<div class="span3 right-nav" >
				<div class="row-fluid Wrap">
					 <div class="wrap_inner">
				<h3> Appointments</h3>
						<br/>
						<div class="row-fluid appointment_list">
						<div class="span4">
						<div class="behave">
						<strong>Thursday</strong>
						
						</div>
						</div>
						<div class="span8">
						<div class="behave behave-hover switch" id="1">
						<a href="javascript:;">
						<span class="label label-inverse ">25</span>
						<strong class=""><i> 1  appointment</i></strong>
						</a>
						</div>
						</div>
						<div class="bordered 1 ">
						<div class="behave">
						<Strong class=""><!--11:30 Hair Color  Loreal Hilton-->
						<ul class="unstyled inline timing">
						<li><small>11:30 </small></li>
						<li><small>Hair Color</small></li>
						<li><small>Loreal Hilton</small></li>
						
						</ul>
						</Strong>
						
						</div>
						</div>
						</div>
						<br/>
						<div class="row-fluid appointment_list">
						<div class="span4">
						<div class="behave">
						<strong>Friday</strong>
						
						</div>
						</div>
						<div class="span8">
						<div class="behave behave-hover switch" id="2">
						<a href="javascript:;">
						<span class="label label-inverse ">26</span>
						<strong class=""><i> 1  appointment</i></strong>
						</a>
						</div>
						</div>
						<div class="bordered 2 ">
						<div class="behave">
						<Strong class=""><!--11:30 Hair Color  Loreal Hilton-->
						<ul class="unstyled inline timing">
						<li><small>11:30 </small></li>
						<li><small>Hair Color</small></li>
						<li><small>Loreal Hilton</small></li>
						
						</ul>
						</Strong>
						
						</div>
						</div>
						</div>
						<br/>
						<div class="row-fluid appointment_list">
						<div class="span4">
						<div class="behave">
						<strong>Saturday</strong>
						
						</div>
						</div>
						<div class="span8">
						<div class="behave behave-hover switch" id="3">
						<a href="javascript:;">
						<span class="label label-inverse ">27</span>
						<strong class=""><i> 1  appointment</i></strong>
						</a>
						</div>
						</div>
						<div class="bordered 3 ">
						<div class="behave">
						<Strong class=""><!--11:30 Hair Color  Loreal Hilton-->
						<ul class="unstyled inline timing">
						<li><small>11:30 </small></li>
						<li><small>Hair Color</small></li>
						<li><small>Loreal Hilton</small></li>
						
						</ul>
						</Strong>
						
						</div>
						</div>
						</div>
					  		<a href="my_appointments.php" class="pull-right"> view more</a>					
				</div>
				</div>
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
							<a href="offer.php" class="pull-right"> view more</a>							
				</div>
				</div> 
				
				
				 							
				</div>
				<!--code for right nav end  here-->
			</div>
	</div>		
 	</div>
</div>



