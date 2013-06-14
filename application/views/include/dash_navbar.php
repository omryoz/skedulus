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
				<ul class="nav business-navbar">
					<?php if($results[1]=='overview'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>>
						<a href="<?php echo base_url() ?>overview"><center><i class="icon-bar-chart"></i><p>Overview</p></center></a>
					</li>
					<?php if($results[1]=='bcalendar'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>>
						<a href="<?php echo base_url() ?>bcalendar"><center><i class="icon-calendar"></i><p>Calendar</p></center></a>
					</li>
					<?php if($results[1]=='businessProfile'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>>
						<a href="<?php echo base_url() ?>businessProfile"><center><i class="icon-briefcase"></i><p>My Business Profile
						</p></center>
						</a>
					</li>
					<?php if($results[1]=='settings'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>><a href="<?php echo base_url(); ?>settings/business"><center><i class="icon-wrench"></i><p>Business Settings
					</p></center>
						</a>
					</li>
					<?php if($results[1]=='gallery'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>><a href="<?php echo base_url(); ?>gallery/list_gallery"><center><i class="icon-camera"></i><p>Photo Gallery</p>
					</center>
						</a>
					</li>
					<?php if($results[1]=='clients'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>><a href="<?php echo base_url(); ?>clients/list_clients"><center><i class="icon-sitemap"></i><p>My Clients</p>
					</center></a>
					</li>
					<?php if($results[1]=='staffs'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php  echo $class; ?>><a href="<?php echo base_url() ?>staffs/list_staffs"><center><i class="icon-group"></i><p>Staffs</p>
					</center></a>
					</li>
					<?php if($results[1]=='services'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>><a href="<?php echo base_url() ?>services/list_services"><center><i class="icon-cogs"></i><p>Services</p>
					</center></a>
					</li>
					<?php if($results[1]=='offers'){ 
					$class=" class='active'";
					}else{
					$class="";
					}
					?> 
					<li <?php echo $class; ?>><a href="<?php echo base_url() ?>offers/list_offers"><center><i class="icon-thumbs-up"></i><p>Offers</p>
					</center></a>
					</li>
				</ul>
			</div>
		  </div>
		</div>
