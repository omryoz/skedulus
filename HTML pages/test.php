<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid ">
		<div class="navbar  navbar-inverse">
		  <div class="navbar-inner">
			<ul class="nav">
				<li class=""><a href="#"><center><i class="icon-bar-chart"></i></center><p>Overview</p></a></li>
				<li class=""><a href="#"><center><i class="icon-calendar"></i></center><p>Calendar</p></a></li>
				<li class=""><a href="#"><center><i class="icon-briefcase"></i></center><p>Business Settings</p></a></li>
				<li class="active"><a href="#"><center><i class="icon-wrench"></i></center><p>My Business Profile</p></a></li>
				<li class=""><a href="#"><center><i class="icon-camera"></i></center><p>Photo Gallery</p></a></li>
				<li class=""><a href="#"><center><i class="icon-sitemap"></i></center><p>My Clients</p></a></li>
				<li class=""><a href="#"><center><i class="icon-group"></i></center><p>Staffs</p></a></li>
				<li class=""><a href="#"><center><i class="icon-cogs"></i></center><p>Services</p></a></li>
				<li class=""><a href="#"><center><i class="icon-thumbs-up"></i></center><p>Offers</p></a></li>
			</ul>
		  </div>
		</div>
		
		<div class="row-fluid">
		<h3>Select a date range</h3>
		<div class="span3 ">
			
			
			<table class="table">
        <thead>
          <tr>
            <th>Start Date: <input type="text" class="span12 date_pick" value="" id="dpd1"></th>
            <th>End Date : <input type="text" class="span12 date_pick" value="" id="dpd2"></th>
          </tr>
        </thead>
      </table>
			</div>
		</div>	
			
		<div class="row-fluid">
			<?php include('graphbar.htm')?>
			</div>
			<div class="row-fluid">
			<?php include('graphline.htm')?>
			</div>
	
		
 	</div>
</div>


<?php include('footer.php')?>
