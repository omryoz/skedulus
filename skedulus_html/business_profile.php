<?php include('header_login.php')?>

<div class="content container">
	<div class="row-fluid business_profile bus_prof">
		<div class="row-fluid">
			<?php include('navbar.php')?>
		</div>
		<div class="row-fluid">
			<div class="span12 global-div profile-div">
			<div class="row-fluid">
				<div class="span3 ">
					<div class="thumbnail business_icon">
						<img src="images/7.jpg">
					</div>
				</div>
				<div class="span9">
				<h3>Mac 
				<ul class="unstyled inline pull-right ul-rating">
					<li>
					<div class="btn-group pull-right">
					<a href="#view_schedule" class="btn btn-success left " 
						role="button"  data-toggle="modal">Book me </a>
					<a href="#book" class="btn btn-success right " role="button"  
						data-toggle="modal">View schedule</a>
					</div>
					</li>
					<li>
					<small class="pull-right">
					<a href="#">
					<i class="icon-star-empty icon-2x  tool" 
					data-toggle="tooltip"  data-original-title="add to Favourite ">
					</i></a></small>
					</li></ul>
					
				</h3>
				
					<strong>Stylist</strong><br>
					<p>Phone no. 121212121300 | Can Fransisco A-12</p>
					 I have been an artist in the hair industry for 5 years and now working at the lovely 
					Unparalleled Hair Studio, located in the San Francisco SOMA district. I have been an artist in the hair industry for 5 years and now working at the lovely 
					Unparalleled Hair Studio.
					<br/>
					<a href="#">view more..</a>
					
					<ul class="unstyled inline pull-right ul-rating">
			<li><div id="star" class="star-rate"> </div></li>		
			<li><a href="javascript:;"><i class="icon-time icon-large" title="open now"></i></a></li>
			</ul>
					
	</div>
					
				</div>
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
					<div class="accordion-heading"  >
						<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
							<h3>  My Services <i class="icon-chevron-down pull-right"></i></h3>
						 </a>
					</div>
					<div id="collapseOne" class="accordion-body collapse ">
					  <div class="accordion-inner">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th> Hair Cut</th>
									<td> $60 and up</td>
									<td> 1 hour</td>
								</tr>
								<tr>
									<th> Hair Color</th>
									<td> $120 and up</td>
									<td> 2 hour</td>
								</tr>
								<tr>
									<th> Spa</th>
									<td> $160 and up</td>
									<td> 3 hour</td>
								</tr>
							</tbody>
						</table>
					  </div>
					</div>
				  </div><br/>
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#staff">
						 <h3>  Staff <i class="icon-chevron-down pull-right"></i></h3>
					  </a>
					</div>
					<div id="staff" class="accordion-body collapse">
					  <div class="accordion-inner">
						<table class="table table-striped">
							<tbody>
								<tr>
									<th><img src="img/ID1.png"></th>
									<td ><h5>Laural</h5></td>
									<td><a href="#" class="btn btn-success">View schedule</a></td>
								</tr>
								<tr>
									<th><img src="img/ID1.png"></th>
									<td ><h5>Mathew</h5></td>
									<td><a href="#" class="btn btn-success">View schedule</a></td>
								</tr>
								<tr>
									<th><img src="img/ID1.png"></th>
									<td > <h5>Amma</h5></td>
									<td><a href="#" class="btn btn-success">View schedule</a></td>
								</tr>
							</tbody>
						</table>
					  </div>
					</div>
				  </div><br/>
				  <div class="accordion-group">
					<div class="accordion-heading">
					  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#offer">
						 <h3> Offers <i class="icon-chevron-down pull-right"></i></h3>
					  </a>
					</div>
					<div id="offer" class="accordion-body collapse">
					  <div class="accordion-inner">
						<div class="row-fluid">
							<div class="span4">
							<h5>20% Off for hair cut</h5>
								Lorem ipsum dolar sit amit, Lorem ipsum dolar sit amit,
							</div>
							<div class="span8">
								<table class="table table-bordered offer-tab">
								<tbody>
								<tr>
								<td>Value</td>
								<td>Discount</td>
								<td>Savings</td>
								</tr>
								<tr>
								<td>$120</td>
								<td>20%</td>
								<td>$15</td>
								</tr>
								</tbody>
							</table>
							</div>
						</div>
					  </div>
					</div>
				  </div>
</div>
			
				
		
				
			</div>
			<div class="span3">
				<h3>Working Hours</h3>
				
				<dl class="dl-horizontal days_dl">
				  <dt>Sunday</dt>
				  <dd>08:30 - 19:00  </dd>
				  <dt>Monday</dt>
				  <dd>08:30 - 15:00 </dd>
				  <dt>Tuesday</dt>
				  <dd>09:30 - 17:00  </dd>
				  <dt>Wednesday</dt>
				  <dd>10:30 - 19:00  </dd>
				  <dt>Thursday</dt>
				  <dd>08:30 - 17:00  </dd>
				  <dt>Friday</dt>
				  <dd>08:30 - 16:00  </dd>
				  <dt>Saturday</dt>
				  <dd>08:30 - 19:00  </dd>
				</dl>
				
				<img src="img/map.png">
			</div>
		</div>
		
<!----------book popup start------------>


<div id="book" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Book an appointment</h3>
  </div>
  <div class="modal-body">
		   <form class="form-horizontal">
		  <div class="control-group">
			<label class="control-label" >Date</label>
			<div class="controls">
				<div class="input-append date date_pick span6" id="dp5" data-date="12-02-2012" data-date-format="dd-mm-yyyy">
					<input class="span10" size="16" type="text" value="12-02-2012" >
					<span class="add-on"><i class="icon-calendar"></i></span>
				  </div>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Time</label>
			<div class="controls">
						<input type="text" class="span6" readonly="" placeholder="Time">
					<a href="#view_schedule"   role="button"  data-toggle="modal"  data-dismiss="modal" aria-hidden="true">view Schedule</a>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Service</label>
			<div class="controls">
			  <input type="text" class="span6" readonly="" placeholder="Service">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Staff</label>
			<div class="controls">
			  <input type="text" class="span6" readonly="" placeholder="Staff">
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" >Message</label>
			<div class="controls">
			  <textarea type="text" class="span6" id="inputText" placeholder="Message"></textarea>
			</div>
		  </div>
		  
		</form>
  </div>
  <div class="modal-footer">
    <a href="#" class="btn btn-success span3 offset5" >Book</a>
  </div>
</div>
<!--------book popup end------------->

<!--------view_schedule start------------->
<div id="view_schedule" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<link href="less/booking_slot.css" rel="stylesheet"/>
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Booking schedule</h3>
  </div>
  <div class="modal-body">
		   
		   <div class="row-fluid">
		   		<div class="span8">
				<div class="action hours" id="showtimeslots">
           
                    <div class="grid">
				<ul class="appoint_time unstyled inline">	
				<li></li>						  
                                    <li>9</li>							  
                                    <li>10</li>							  
                                    <li>11</li>							  
                                    <li>12</li>							  
                                    <li>1</li>					  
                                    <li>2</li>					  
                                    <li>3</li>				  
                                    <li>4</li>				  
                                    <li>5</li>				  
                                    <li>6</li>								
                  </ul>
				  <div class="appoint">                 
                                <ul lang="1" class="gridRow data unstyled inline" id="staffID" value="1">
                                   <li class="staff_timing">
								   <span class="staff_style"><span class="label">staff1</span></span>
								   </li>
								   								
                                       <li class="t00 available selectable" value="9:00AM" title="9:00AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="9:15AM" title="9:15AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="9:30AM" title="9:30AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="9:45AM" title="9:45AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="10:00AM" title="10:00AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="10:15AM" title="10:15AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="10:30AM" title="10:30AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="10:45AM" title="10:45AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="11:00AM" title="11:00AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="11:15AM" title="11:15AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="11:30AM" title="11:30AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="11:45AM" title="11:45AM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="12:00PM" title="12:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="12:15PM" title="12:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="12:30PM" title="12:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="12:45PM" title="12:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="1:00PM" title="1:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="1:15PM" title="1:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="1:30PM" title="1:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="1:45PM" title="1:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="2:00PM" title="2:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="2:15PM" title="2:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="2:30PM" title="2:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="2:45PM" title="2:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="3:00PM" title="3:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="3:15PM" title="3:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="3:30PM" title="3:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="3:45PM" title="3:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="4:00PM" title="4:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="4:15PM" title="4:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="4:30PM" title="4:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="4:45PM" title="4:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="5:00PM" title="5:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="5:15PM" title="5:15PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="5:30PM" title="5:30PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="5:45PM" title="5:45PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="6:00PM" title="6:00PM" id="1" onclick="showdiv(this)">&nbsp;</li>
									   
									                                    
                                </ul><br/>    
                                <ul lang="1" class="gridRow data unstyled inline" id="staffID" value="2">
                                   <li class="staff_timing">
								   <span class="staff_style"><span class="label">staff2</span></span>
								   </li>
								   								
                                       <li class="t00 available selectable" value="9:00AM" title="9:00AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="9:15AM" title="9:15AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="9:30AM" title="9:30AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="9:45AM" title="9:45AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="10:00AM" title="10:00AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="10:15AM" title="10:15AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="10:30AM" title="10:30AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="10:45AM" title="10:45AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="11:00AM" title="11:00AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="11:15AM" title="11:15AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="11:30AM" title="11:30AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="11:45AM" title="11:45AM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="12:00PM" title="12:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="12:15PM" title="12:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="12:30PM" title="12:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="12:45PM" title="12:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="1:00PM" title="1:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="1:15PM" title="1:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="1:30PM" title="1:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="1:45PM" title="1:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="2:00PM" title="2:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="2:15PM" title="2:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="2:30PM" title="2:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="2:45PM" title="2:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="3:00PM" title="3:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="3:15PM" title="3:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="3:30PM" title="3:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="3:45PM" title="3:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="4:00PM" title="4:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="4:15PM" title="4:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="4:30PM" title="4:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="4:45PM" title="4:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="5:00PM" title="5:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t15 available selectable" value="5:15PM" title="5:15PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t30 available selectable" value="5:30PM" title="5:30PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t45 available selectable" value="5:45PM" title="5:45PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									 								
                                       <li class="t00 available selectable" value="6:00PM" title="6:00PM" id="2" onclick="showdiv(this)">&nbsp;</li>
									   
									                                    
                                </ul>     
                     </div>
					 <br/>
<center><span class=" label  ">Info</span>
</center>
				</div>
				</div>
				</div>
				<div class="span4 services span_right test1">
	<div>
	
		<div class="nav_right ">
				<table class="table_time">
					<thead>
						<tr>
						<th colspan="1"></th>
						<th>Service Name</th>
						<th>Time Lengh</th>
						<th>Price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><input type="checkbox" class="service" name="service" value="1"></td>
							<td>service1</td>
							<td>00:30:00</td>
							<td>$30</td>
						</tr>
						<tr>
							<td><input type="checkbox" class="service" name="service" value="1"></td>
							<td>service2</td>
							<td>00:45:00</td>
							<td>$50</td>
						</tr>
						<tr>
							<td><input type="checkbox" class="service" name="service" value="1"></td>
							<td>service3</td>
							<td>01:00:00</td>
							<td>$60</td>
						</tr>
						<tr>
							<td><input type="checkbox" class="service" name="service" value="1"></td>
							<td>service4</td>
							<td>01:20:00</td>
							<td>$80</td>
						</tr>
						
						
					</tbody>
				</table>
		
		
		
					
		</div>


<br/>
<center><span class=" label  ">Info</span>
</center>	
 </div>	
	</div>
				
				
		   </div>
		   
  </div>
  
</div>
<!---------view_schedule end-------------->
<!-----Theater view modal start------>
<div id="theater_view" class="modal hide fade th3-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
  <center><b>Share this photo</b> <a href="javascript:;"> <img src="images/fb.png" title="facebook"></a> <a href="javascript:;"> <img src="images/tw.png" title="twitter"></a>
    <a href="javascript:;" type="button" class="close pull-right" data-dismiss="modal" aria-hidden="true">×</a> </center>
   
  </div>
  <div class="modal-body th3-modal-body">
   <?php include('example.php')?>
  </div>
  <div class="modal-footer">
  <br/>
  <form class="form-horizontal">
  <div class="row-fluid thumbnail">
  	<div class="span1">
		<img src="img/ID1.png">
	</div>
	<div class="span11">
		 <textarea placeholder="Write your comment here" class="span12" rows="2"></textarea>
	</div>
	
  </div>
 <br/><a href="javascript:;" class="btn btn-success btn-mini">Comment</a>
   </form>
  </div>
  
</div>
<!-----Theater view modal end------>

 	</div>
</div>

<?php include('footer.php')?>
<script src="js/jquery.raty.js" type="text/javascript"></script>