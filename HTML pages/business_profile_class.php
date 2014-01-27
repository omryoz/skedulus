<?php include('header.php')?>

<div class="content container">
	<div class="row-fluid business_profile">
		<div class="row-fluid">
			<div class="span12">
			<br/>
				<center>
					<ul class="unstyled business_head">
						<li><strong><a href="business_home.php"><span class="label ">Home</span></a></strong></li>
						<li><strong><a href="my_appointments.php"><span class="label">My Appointments</span></a></strong></li>
						<li><strong><a href="favourite.php"><span class="label ">Favourite Businesses</span></a></strong></li>
						<li><strong><a href="offer.php"><span class="label">Special Offers</span></a></strong></li>
						<li><strong><a href="settings.php"><span class="label ">Settings</span></a></strong></li>
					</ul>
				</center>
				<hr/>
				</div>
		</div>
			<div class="row-fluid">
				<div class="span3">
					<div class="thumbnail">
						<img src="images/10.jpg">
						
					</div>
				</div>
			<div class="span9">
				<h3>Mac</h3>
				<strong>Stylist</strong><br>
				<p>Phone no. 121212121300 | Can Fransisco A-12</p>
				<p> I have been an artist in the hair industry for 5 years and now working at the lovely Unparalleled Hair Studio, located in the San Francisco SOMA district.
				<br/><a href="#">view more..</a></p>
				
				 <a href="#" class="btn btn-success pull-right span3">View schedule </a> 
				 <a href="#" class="btn btn-success pull-right span2 offset1">Book me </a>
			</div>
		</div>
		<hr >
		<div class="row-fluid">
			<?php include('filmstrip.php')?>
		</div>
		<hr >
		<div class="row-fluid">
			<div class="span9">
				<div class="accordion" id="accordion2">
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							 <h3> <i class="icon-book "></i> Classes</h3>
						  </a>
						</div>
						<div id="collapseOne" class="accordion-body collapse ">
						  <div class="accordion-inner">
							<table class="table table-striped">
								<tbody>
									<tr>
										<th>Meditation</th>
										<td> $60 </td>
										<td>12/02/2013</td>
										<td>1/04/2013</td>
										<td><a href="#" class="btn btn-success">Join</a></td>
										<td><a href="#" class="btn btn-success">View Schedule</a></td>
									</tr>
									<tr>
										<th>Yoga</th>
										<td> $60 </td>
										<td>12/02/2013</td>
										<td>1/04/2013</td>
										<td><a href="#" class="btn btn-success">Join</a></td>
										<td><a href="#" class="btn btn-success">View Schedule</a></td>

									</tr>
									<tr>
										<th>Dance</th>
										<td> $60 </td>
										<td>12/02/2013</td>
										<td>1/04/2013</td>
										<td><a href="#" class="btn btn-success">Join</a></td>
										<td><a href="#" class="btn btn-success">View Schedule</a></td>

									</tr>
								</tbody>
							</table>
						  </div>
						</div>
					  </div>
  
				</div>
				
				
			</div>
			<div class="span3">
				<h3>Working Hours</h3>
				<dl class="dl-horizontal days">
				  <dt>Sunday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Monday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Tuesday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Wednesday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Thursday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Friday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				  <dt>Saturday</dt>
				  <dd>8:30 am  to 7:00 pm </dd>
				</dl>
				
				<img src="img/map.png">
			</div>
		</div>
		
 	</div>
</div>


<?php include('footer.php')?>
