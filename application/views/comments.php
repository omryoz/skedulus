<?php  if(!empty($comments)){ foreach($comments as $comment){ ?>
		<div class="media">
			
					  <a class="pull-left" href="javascript:;">
						<!--<img class="media-object" data-src="holder.js/64x64" alt="64x64"  src="http://placehold.it/50x50">-->
						<img class="media-object" data-src="holder.js/64x64" alt="64x64"  src="<?=base_url()?>uploads/photo/<?=(!empty($comment->profile_image)?$comment->profile_image:'default.jpg'); ?>" />
					  </a>
					  <div class="media-body" style="line-height:20px; padding: 2px 0;">
						  <p class="pull-left" ><?=$comment['first_name']?>: </p>
						
						<p class="pull-left"> <small><?=$comment['comments']?></small></p>
					  </div>
		</div>
<?php }}else{ ?>
	<!---<div style="line-height:10px;">No Comments found.</div>--->
<?php }?>