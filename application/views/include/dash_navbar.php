<script>
$(document).ready(function(){
		_page = window.location.pathname.split('/')[2];
	  // $('a[href="'base_url+_page+'"] ,a[href="'base_url+_page+'/'+window.location.pathname.split('/')[3]+'"]').parent().addClass('active');
	   $('a[href="'+base_url+''+_page+'"] ,a[href="'+base_url+''+_page+'/'+window.location.pathname.split('/')[3]+'"]').parent().addClass('active');

});

</script>
<div class="content container">
<div class="row-fluid ">
<div class="navbar  navbar-inverse">
		  <div class="navbar-inner">
			<a class="btn btn-navbar " data-toggle="collapse" data-target=".menu_dash">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<?php
				$url=$_SERVER['REQUEST_URI'];
				$results = explode('/', trim($url,'/'));
			?>
			<div class="nav-collapse collapse menu_dash">			
				<ul class="nav business-navbar justify-nav">
					<?php 
					//$active = (!empty($results && $results[1]=='overview')?"active":"");
					/*if($results[1]=='overview'){ 
						$class=" class='active'";
					}else{
						$class="";
					}*/
					?> 
					<li>
						<a href="<?php echo base_url() ?>overview"><center><i class="icon-bar-chart"></i><p><?=(lang('Apps_overview')) ?></p></center></a>
					</li>
					<?php 
					if($this->session->userdata['business_type']=="service"){
						$id=$this->session->userdata['business_id'];
						$link = 'cal/'.$id;		
					}else{
					     $id=$this->session->userdata['business_id'];
						 $link = 'calendar_business/'.$id;	
					}
					?>
					<li>
						<a href="<?php echo base_url() ?>bcalendar/<?php echo $link;?>"><center><i class="icon-calendar"></i><p><?=(lang('Apps_calendar')) ?></p></center></a>
					</li>
					<?php 
					if(isset($this->session->userdata['business_id'])){
						$id=$this->session->userdata['business_id'];
							$link = '?id='.$id;
								
						}
					?>
					<li >
						<a href="<?php echo base_url() ?>businessProfile/<?php echo $link;?>"><center><i class="icon-briefcase"></i><p><?=(lang('Apps_businessProfile')) ?>
						</p></center>
						</a>
					</li>
					
					<li ><a href="<?php echo base_url(); ?>settings/business"><center><i class="icon-wrench"></i><p><?=(lang('Apps_businessSettings')) ?>
					</p></center>
						</a>
					</li>
					
					<li ><a href="<?php echo base_url(); ?>gallery/list_gallery"><center><i class="icon-camera"></i><p><?=(lang('Apps_photoGallery')) ?></p>
					</center>
						</a>
					</li>
					
					<li ><a href="<?php echo base_url(); ?>clients/list_clients"><center><i class="icon-sitemap"></i><p><?=(lang('Apps_MyClients')) ?></p>
					</center></a>
					</li>
					
					<li ><a href="<?php echo base_url() ?>staffs/list_staffs"><center><i class="icon-group"></i><p><?=(lang('Apps_staffs')) ?></p>
					</center></a>
					</li>
					
					<li >
					<?php 
					if($this->session->userdata['business_type']=="class"){
							$link = "list_classes";
							$text= "Classes";
						}else{	
							$link = 'list_services';
							$text = "Services";		
						}
					?>
					<a href="<?php echo base_url() ?>services/<?=$link?>"><center><i class="icon-cogs"></i><p><?=$text?></p>
					</center></a>
					</li>
					
					<!-- <li><a href="<?php echo base_url() ?>offers/list_offers"><center><i class="icon-thumbs-up"></i><p>Offers</p>
					</center></a>
					</li> -->
				</ul>
			</div>
		  </div>
		</div>
	