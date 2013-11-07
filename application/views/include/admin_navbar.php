<script>
$(document).ready(function(){
		_page = 'admin/'+window.location.pathname.split('/')[3];  
	   $('a[href="'+base_url+''+_page+'"] ,a[href="'+base_url+''+_page+'/'+window.location.pathname.split('/')[4]+'"]').parent().addClass('active');

});

</script>
<div class="content container">
	<div class="row-fluid ">
		<div class="row-fluid">
<div class="navbar  navbar-inverse">
		  <div class="navbar-inner">
			<a class="btn btn-navbar " data-toggle="collapse" data-target=".menu-admin">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<div class="nav-collapse collapse menu_admin">			
				<ul class=" nav client-navbar justify-nav">
					<li>
						<a href="<?php echo base_url() ?>admin/dash/users"><center><i class="icon-user"></i><p>Users</p></center></a>
					</li>
					<li >
						<a href="<?php echo base_url() ?>admin/dash/subscription"><center><i class="icon-check"></i><p> Subscriptions</p>
						</center></a>
					</li>
					<li>
						<a href="<?php echo base_url() ?>admin/dash/category"><center><i class="icon-sitemap"></i><p> Category
						</p></center>
						</a>
					</li>
					<li class="">
						<a href="<?php echo base_url() ?>admin/dash/businesses"><center><i class="icon-briefcase"></i><p> Businesses
						</p></center>
						</a>
					</li>
					<!---<li class="">
						<a href="admin_offer.php"><center><i class="icon-thumbs-up"></i><p> Offers
						</p></center>
						</a>
					</li>
					<li class="">
						<a href="admin_photo.php"><center><i class="icon-camera"></i><p> Photos
						</p></center>
						</a>
					</li>
					<li class="">
						<a href="<?php echo base_url() ?>admin/dash/content"><center><i class="icon-file-alt"></i><p> Site-Content
						</p></center>
						</a>
					</li>--->
					
					
				</ul>
			</div>
		  </div>
		</div>
