<?php 
				$i=0;
				if(isset($tableList)) { ?>
				<ul class="unstyled photo_gallery thumbnails">
				<?php 	
				foreach($tableList as $content){
				if($i%4==0){
				echo '</ul><ul class="unstyled photo_gallery thumbnails">';
				}
				?>
				
					<li class="span3  thumb-image">
						<div class="thumbnail">
							<div class="inblock">
						 <ul class="inline unstyled icon">
                                               <li><a href="#gallery" data-toggle="modal" class="btn  btn-mini" onclick= editPhoto(<?php echo $content['id']; ?>)><i class="icon-edit" title=" <?=(lang('Apps_edit'))?>"></i></a>
                                               </li>
                                               <li>
											   <a href="javascript:;" onclick=deletethis('<?=base_url()?>gallery/manage_gallery?id=<?php echo $content['id']; ?>&delete=delete');  class="tool confirm btn btn-mini"><i class="icon-trash"></i></a>
											   <!---<a href="javascript:void(0);" class="btn  btn-mini" onclick= deletePhoto(<?php echo $content['id']; ?>)><i class="icon-trash" title=" <?=(lang('Apps_delete'))?>"></i></a>---->
                                               </li>
											   

                          </ul>
						<a href="#">
							<!-- <img src="<?php  echo base_url();?>uploads/gallery/<?php echo $content['photo']; ?>" > -->
						<!-- 	<?php echo $content['photo']; ?> -->
							
							 <img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/<?php echo $content['photo']; ?>/280/1/1/gallery"> 
							
							<!-- <img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/1.jpg/280/1/1/gallery"> -->
							
							
							
						</a>
							<h5>
								<center><a href="#"><?php echo $content['title'] ?></a></center>
							</h5>
						</div>
					</li>
				<?php $i++; } ?>
				</ul>
				
				<?php }else{ ?>
                <p class="alert nomore hide"></p>
                <?php } ?>