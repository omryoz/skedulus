<script>
$(document).ready(function(){
		var url = window.location.pathname;  
		var activePage = url.substring(url.lastIndexOf('/')+1);  
		$('.business-navbar li a').each(function(){  
		var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);   
		if (activePage == currentPage) { 
		$(this).parent().addClass('active'); 
		}else if(window.location.search!=""){
	     var value=window.location.search.split('&');
		 var searchValue= value[1]; 
		 if(searchValue=='search=Search'){
		   $(".clientList").addClass('active');
		 }else{
		  $(".businessProfile").addClass('active');
		 }
		}
		// else if(activePage ==''){
		// $(".businessProfile").addClass('active');
		// }
		});
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
					<li class="">
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
					<li class="">
						<a href="<?php echo base_url() ?>bcalendar/<?php echo $link;?>"><center><i class="icon-calendar"></i><p><?=(lang('Apps_calendar')) ?></p></center></a>
					</li>
					<?php 
					if(isset($this->session->userdata['business_id'])){
						$id=$this->session->userdata['business_id'];
							$link = '?id='.$id;
								
						}
					?>
					<li class="businessProfile">
						<a href="<?php echo base_url() ?>businessProfile/<?php echo $link;?>"><center><i class="icon-briefcase"></i><p><?=(lang('Apps_businessProfile')) ?>
						</p></center>
						</a>
					</li>
					
					<li class=""><a href="<?php echo base_url(); ?>settings/business"><center><i class="icon-wrench"></i><p><?=(lang('Apps_businessSettings')) ?>
					</p></center>
						</a>
					</li>
					
					<li class=""><a href="<?php echo base_url(); ?>gallery/list_gallery"><center><i class="icon-camera"></i><p><?=(lang('Apps_photoGallery')) ?></p>
					</center>
						</a>
					</li>
					
					<li class="clientList"><a href="<?php echo base_url(); ?>clients/list_clients"><center><i class="icon-sitemap"></i><p><?=(lang('Apps_MyClients')) ?></p>
					</center></a>
					</li>
					
					<li class=""><a href="<?php echo base_url() ?>staffs/list_staffs"><center><i class="icon-group"></i><p><?=(lang('Apps_staffs')) ?></p>
					</center></a>
					</li>
					
					<li class="">
					<?php 
					if($this->session->userdata['business_type']=="class"){
							$link = "list_classes";
							$text= "Classes";
						}else{	
							$link = 'list_services';
							$text = "Services";		
						}
					?>
					<a href="<?php echo base_url() ?>services/<?=$link?>"><center><i class="icon-cogs"></i><p>
					<?=(lang($text)) ?></p>
					</center></a>
					</li>
					
				</ul>
			</div>
		  </div>
		</div>
	