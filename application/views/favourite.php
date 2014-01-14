

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
                                  
									<div class="inblock">
									<a href="<?php echo base_url(); ?>clients/deleteFav?id=<?php echo $content->favourite_id ?> " class="btn btn-mini btn-danger confirm trash"> <i class="icon-trash"></i> </a>
									
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
							<?php //$i++; 
							} ?>
								</ul>
							<center><span class="pagination pagination-right"><ul><?php echo $pagination;?></ul></span></center>	
					</div>
		  		</div>
				<?php }else{?>
				 <p class="displayalert"><?=(lang('Apps_nofavourite'))?></p>
				<?php }?>
		</div>
			
		</div>	
</div>	
</div></div>	
<script>
$('.li-element li:nth-child(4n + 5)').addClass('no-margin');
</script>
<?php if($flag=='1'){
?>
	<script>
		$(document).ready(function(){ 
			$(".alert").hide();
			$("#key").val("");
			$("#updatePhone").val("");
			$('#verifyModal').modal('show');
			$("#verifyP").show();
			$("#getnumber").hide();
            $("#phonenumber").html(<?php echo $phonenumber ?>);			
		});
	</script>
<?php } ?>
<?php if($flag=='0'){
?>
	<script>
		$(document).ready(function(){
		$(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$('#verifyModal').modal('show');
		$("#verifyP").hide();
		$("#getnumber").show();
			//$('#getnumberModal').modal('show');
		});
	</script>
<?php } ?>
<?php include('include/popupmessages.php'); ?>

