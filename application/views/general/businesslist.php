<div class="container content">
<div class="row-fluid flexy-tab">

	<div class="span4">
	<ul class="nav " id="skedulus-tab">
	  <li class="active"><a href="#home"><h4>Schedule</h4>
							<p>See all your employees appointments in one snapshot. Easily add, edit and move appointments.</p>
						</a></li>
	  <li><a href="#profile"><h4>Get Personal</h4>
							<p>Upload your picture and a short bio about yourself so that new and old clients can see who you are.</p>
						</a></li>
	  <li><a href="#messages"><h4>Notify Everyone</h4>
							<p>Notifications are sent to you and your clients so that everyone knows what's going on with an appointment.</p>
					</a></li>
	  <li><a href="#settings">	<h4>Customized Services</h4>
							<p>Duration and price of services can be customized by each employee.</p>
					</a></li>
	</ul>
	</div>
	<div class="span8">
	<div class="tab-content">
	  <div class="tab-pane active" id="home">
		<img src="https://skeduler.com/assets/img/device-mac.png?1389412377" alt="">	
	  </div>
	  <div class="tab-pane" id="profile">
		<img class="top" src="https://skeduler.com/assets/img/biz-profile.png?1389412377" alt="">
		<img class="bottom" src="https://skeduler.com/assets/img/biz-profile2.png?1389412377" alt="">	
	  </div>
	  <div class="tab-pane" id="messages">
		<img class="employee" src="https://skeduler.com/assets/img/biz-notification1.png?1389412377" alt="">						
		<img class="customer" src="https://skeduler.com/assets/img/biz-notification2.png?1389412377" alt="">
	  </div>
	  <div class="tab-pane" id="settings">
		<img class="customservices" src="https://skeduler.com/assets/img/biz-customservices.png?1389412377" alt="">
	  </div>
	</div>
	</div>
	
	</div>
	
	<div class="row-fluid attribute-box">
		<ul class="sub-attribute unstyled ">
				<li><span>
					<i class="icon-plane"></i>
					<div>
						<h5>FAST</h5>
						<p>Get things done faster than ever.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-headphones"></i>
					<div>
						<h5>EASY</h5>
						<p>There is nothing to learn. You'll be up and running in 5 minutes.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-lock"></i>
					<div>
						<h5>SECURE</h5>
						<p>Bank-level security.  All your data is backed-up daily.</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-star"></i>
					<div>
						<h5>AWESOME SUPPORT</h5>
						<p>We speak human and you can call us anytime.
						</p>
					</div></span>
				</li>
				<li><span>
					<i class="icon-flag"></i>
					<div>
						<h5>BETTER OVER TIME</h5>
						<p>Skeduler is always updated to keep up with your business.</p>
					</div></span>
				</li>
		</ul>
	</div>
	

				
					 <h3 class="remove-margin">Businesses List</h3>
					<div class="row-fluid box-outline left-nav">
					 <div class="box-inline">
					
					 <?php if(!empty($contentList)){ $i=1; ?>
					 
							<ul class="thumbnails business_logo remove-margin">
							<?php
							
							foreach($contentList as $content) {
							
							?>
								<li class="thumbnail span3 trans">
									<div class="inblock"><a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
										<!-- <img src="<?php echo base_url(); ?>uploads/business_logo/<?=(!empty($content['image'])?$content['image']:'default.png'); ?>"> -->
										
										<img src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($content['image'])?$content['image']:'default.png'); ?>/280/1/1/business_logo">
										
										
										
									</a>
									</div>
									<div class="caption">
											<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>"><p class="text-left"><strong><?php echo $content['business_name']; ?></strong></p>
											<small> <?php echo $content['category_name']; ?> </small>
											</a>
										</div>
									
								</li>
								
							<?php if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							}
							$i++; }  ?>
								</ul>
							<!--<center><span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>-->
						<?php }else{ ?>
						<p class="alert"><? echo "No businesses yet";?></p>
						<?php }?>
					</div>
		  		</div>
				
	
	
	
	
</div>
<script>
 $('#skedulus-tab a').click(function (e) {
  e.preventDefault();
  $(this).tab('show');
})
</script>