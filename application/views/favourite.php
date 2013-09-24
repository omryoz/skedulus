

	<?php error_reporting(0); ?>			
			
			
			
		
			<br/>
<div class="content container">
	<div class="row-fluid business_profile">
		<div class="row-fluid left-nav">
			<?php if(!empty($contentList)) { ?>
			<div class="Wrap">
					 <div class="wrap_inner">
					
						<?php //$i=0; ?>
							<ul class="thumbnails business_logo li-element"> 
							   <?php foreach($contentList as $content) {
							 
							  /* if($i%4==0){
								echo '</ul><ul class="thumbnails business_logo">';
							  }*/ ?>
								 <!-- <li class="thumbnail span3 trans"> -->
								<li class="thumbnail span3 trans fav-blocks">
                                    <!--<a href="javascript:;" onclick= deleteFav(<?php echo $content->client_list_id ?>); class="btn btn-mini btn-danger trash"> <i class="icon-trash"></i> </a>-->
									<a href="<?php echo base_url(); ?>clients/deleteFav?id=<?php echo $content->client_list_id ?> " class="btn btn-mini btn-danger confirm trash"> <i class="icon-trash"></i> </a>
									
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content->user_business_details_id ?>">
										<img src="<?php echo base_url(); ?>uploads/business_logo/<?=(!empty($content->business_logo)?$content->business_logo:'default.png'); ?>">
										<div class="caption">
										
										<p class="text-left"><strong><?php echo $content->manager_firstname." ".$content->manager_lastname ?></strong></p>
										<small> <?php echo $content->category_name; ?> </small>
										</div>
									</a>
								</li>
							<?php //$i++; 
							} ?>
								</ul>
								
					</div>
		  		</div>
				<?php }else{?>
				 <p class="alert">No favourite businesses yet</p>
				<?php }?>
		</div>
			
		</div>	
</div>	
</div></div>	
<script>
$('.li-element li:nth-child(4n + 5)').addClass('no-margin');
</script>

