	<div class="content ">
		<div class="container">
			<div class="row-fluid ">
				<div class="span12">
					<div class="sp-slideshow">
						<input id="button-1" type="radio" name="radio-set" class="sp-selector-1" checked="checked" />
						<label for="button-1" class="button-label-1"></label>	
						<input id="button-2" type="radio" name="radio-set" class="sp-selector-2" />
						<label for="button-2" class="button-label-2"></label>	
						<input id="button-3" type="radio" name="radio-set" class="sp-selector-3" />
						<label for="button-3" class="button-label-3"></label>	
						<input id="button-4" type="radio" name="radio-set" class="sp-selector-4" />
						<label for="button-4" class="button-label-4"></label>	
						<input id="button-5" type="radio" name="radio-set" class="sp-selector-5" />
						<label for="button-5" class="button-label-5"></label>	
						<label for="button-1" class="sp-arrow sp-a1"></label>
						<label for="button-2" class="sp-arrow sp-a2"></label>
						<label for="button-3" class="sp-arrow sp-a3"></label>
						<label for="button-4" class="sp-arrow sp-a4"></label>
						<label for="button-5" class="sp-arrow sp-a5"></label>	
						<div class="sp-content">
							<div class="sp-parallax-bg"></div>
							<ul class="sp-slider clearfix">
								<!--<li><img src="images/banner_left.png" alt="image01" class="banner_l" /> <img src="images/banner_right.png" alt="image02" class="banner_l" /></li>
								<li><img src="images/second_layer.png" alt="image03" /></li>-->
								<li><img src="img/text1.png"><img src="<?php echo base_url(); ?>img/calendar1.png"></li>
								<li><img src="img/text2.png"><img src="<?php echo base_url(); ?>img/calendar2.png"></li>
								<li><img src="img/text3.png"><img src="<?php echo base_url(); ?>img/calendar3.png"></li>
								<li><img src="img/text4.png"><img src="<?php echo base_url(); ?>img/calendar4.png"></li>
								<li><img src="img/text5.png"><img src="<?php echo base_url(); ?>img/calendar5.png"></li>
							</ul>
						</div><!-- sp-content -->
					</div><!-- sp-slideshow -->
				</div>
		
			</div><!--row-fluid ends here-->
		
			<div class="row-fluid" >
			<!--code for left nav start from here-->
				<div class="span9 left-nav">
				<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<h3>Search Businesses</h3>
				<div class="row-fluid strip">
					<form action="global_search.php">
					<div class="span4">
						<input type="text" class="span12 " placeholder="Business are you looking for?">
					</div>
					<div class="span3">
						<input type="text" class="span12 " placeholder="Location">	
					</div>
					<div class="span3">													
						<select class="span12" >
								<option value="0">Categories</option>
								<option value="1">Hair Style</option>
								<option value="2">Boutique</option>
								<option value="3">Spa</option>
								<option value="4">Yoga classes</option>
						</select>	
					</div>
					<div class="span2">						
						 <a  href="global_search.php" class="btn span12 pull-right btn-success"> 
						 	<i class="icon-search"></i> <span class="hidden-tablet">Search</span>
						  </a>
					</div>
					</form>
				</div>
			</div>
		</div>
					
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
							<div class="offer">
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Amma Quater</strong>
										<p>Hair Studio</p>
										<small><i>On body massage</i></small> 
									</div>
									<div class=" pull-right span4">
										<div id="burst-12">
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<div class="offer">
								<a  href="offer.php">
								<div class=" row-fluid offer-blocks">
									<div class="span8">
										<strong>Amma Quater</strong>
										<p>Hair Studio</p>
										<small><i>On body massage</i></small> 
									</div>
									<div class=" pull-right span4">
										<div id="burst-12" >
										 <div class="offer-discount">
										 <h5>50% </h5><h4>off</h4>
										 </div>
										</div>
									</div>
								</div>
								</a>
							</div>
							<a  href="offer.php" class="pull-right">view more..</a>					
						</div>
					</div>  							
				</div>
				<!--code for right nav end  here-->
			</div><!--row  fluid ends here-->
		</div>	
	</div><!--code for content  end  here-->


	