 <?php if(!empty($contentList)) { ?>
<script>
$('.li-element li:nth-child(4n + 5)').addClass('no-margin');
</script>
	   <?php foreach($contentList as $content) { ?>
		<li class="thumbnail span3 trans fav-blocks">
		  
			<div class="inblock">
			<a href="javascript:;" onclick=deletethis('<?php echo base_url(); ?>clients/deleteFav?id=<?php echo $content->favourite_id ?>'); class="btn btn-mini btn-danger confirm trash"> <i class="icon-trash"></i> </a>
			
			<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content->user_business_details_id ?>">
				<img src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($content->business_logo)?$content->business_logo:'default.png'); ?>/280/1/1/business_logo">
				
			</a>
			</div>
			<div class="caption">
			<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $content->user_business_details_id ?>">
				<p class="text-left"><strong><?php echo $content->business_name ?></strong></p>
				<small> <?php echo $content->category_name; ?> </small>
				</a>
			</div>
		</li>
	<?php } ?>

<?php  }else{ echo '0'; ?>
<?php }?>
