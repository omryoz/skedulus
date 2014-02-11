
<?php //print_r($searchResult); 
					if(isset($searchResult) && $searchResult!="") {
					foreach($searchResult as $result){
					$lastid=$result->business_id;					
					?>
					<div class=" global-div">
						<div class="row-fluid ">
								<div class="thumbnail span3">
									<div class="inblock">
									<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>">
									
									<img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/<?=(!empty($result->image)?$result->image:'default.png'); ?>/280/1/1/business_logo">
									
									</a>
									</div>
								</div>
								<div class="span9">
								<?php  
								if(isset($favList) && in_array($result->business_id,$favList)){?>
								<a href="javascript:void(0)"><i class="icon-star icon-2x pull-right tool favourite" data-toggle="tooltip" data-val="<?php echo $result->business_id ?>" onclick="favourite(<?php echo $result->business_id ?>,'remove');" action="remove"   data-original-title="remove from Favourite" id="star<?php echo $result->business_id ?>"></i></a>
								<?php }else{ ?>
								<?php if(!isset($this->session->userdata['id'])) { ?>
									<a href="<?php echo base_url();?>bcalendar/referal_url/?url='<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>'" ><i class="icon-star-empty icon-2x pull-right tool" data-toggle="tooltip"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	
								<?php }else{?>	
								
								<a href="javascript:void(0)" id="addfav<?php echo $result->business_id ?>" ><i class="icon-star-empty icon-2x pull-right tool favourite" onclick="favourite(<?php echo $result->business_id ?>,'add');" data-toggle="tooltip" data-val="<?php echo $result->business_id ?>" action="add"  data-original-title="add to Favourite " id="star<?php echo $result->business_id ?>"></i></a>	
								
								
								<?php }		?>
								
								<?php } ?>
									<?php $count = $this->utilities->getPhotosLike($result->business_id,"business") ?>
									<div class="stronger">
										<h4> <a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><?php echo $result->business_name; ?></a> <i alt="<?=(!empty($result->business_id))?$result->business_id:""?>" rel="<?=(!empty($user_id))?$user_id:""?>" id="business" class="likes <?=(!empty($favorite) && in_array($result->business_id,$favorite))?"icon-heart":"icon-heart-empty"?>  tool" data-toggle="tooltip"  data-original-title="<?=($count)?$count:""?>" data-placement="right" ></i>
										</h4> 
									 </div>
									<h5><?php echo $result->manager_firstname." ".$result->manager_lastname; ?>  
									<small><em><?php echo $result->category_name; ?></em></small>
									</h5>
									<!---<small><?php  //echo $result->category_name ?> </small>--->
										<br clear="left">				
									<small class="muted"><?php echo $result->business_description;?><br clear="left">	<a href="<?php echo base_url(); ?>businessProfile/?id=<?php echo $result->business_id ?>"><?=(lang('Apps_readmore'))?></a></small>
									
								<ul class="unstyled inline pull-right ul-rating">
								<li><div id="star" class="star-rate"> </div></li>		
								<!-- <li><a href="javascript:;"><i class="icon-time icon-large" title="open now"></i></a></li> -->
								
								</ul>
									
								</div>
								
						</div>
					</div>
					
					<?php 
					}?>
					
					
<?php					}else{ ?>
                      <p class="nomore hide">0</p>
					 
					<?php } ?>
					

					 
			