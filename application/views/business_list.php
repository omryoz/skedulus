 <?php $i=1; 
 if(isset($tableList)) { ?>		 
	<ul class="thumbnails business_logo">
	<?php foreach($contentList as $content) {
	
	?>
		<li class="thumbnail span3 trans">
		<div class="inblock-logo">
			<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
				<img src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($content['image'])?$content['image']:'default.png'); ?>/220/1/1/business_logo">
			</a>
		</div>
			<div class="caption">
			<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content['business_id'] ?>">
					<p class="text-left"><strong><?php echo $content['business_name']; ?></strong></p>
					<small> <?php echo $content['category_name']; ?> </small>
					</a>
				</div>
		</li>
		
	<?php 
	if($i%4==0){
		echo '</ul><ul class="thumbnails business_logo moreresult">';
	}$i++; } ?>
		</ul>
		<?php }else{ ?>
                <p class="alert nomore hide"></p>
        <?php } ?>