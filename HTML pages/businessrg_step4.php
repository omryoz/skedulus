

<?php include('header.php')?>
<div class="content">
	<div class="maindiv container">
		<div class="row-fluid inner-tab">
			<div class="container-fluid">
				<div class="row-fluid">
				 <h3 >Business Registration </h3>
						<ul id="myTab" class="nav nav-tabs">
						  <li id="li_1">
						 
							<a href="#">
								<div class="row-fluid">
								 <div class="span6">
									<i class="icon-check icon-3x"></i>
								</div>		 
								<div class="span6">		
									<strong>Choose <br>Subscription</strong>
								</div>
								</div>
			
							</a>
							
						  </li>
						  <li class="" id="li_2">
						  <a href="#" >
						  
						  <div class="row-fluid">
								 <div class="span6">
									<i class="icon-list icon-3x"></i>
								</div>		 
								<div class="span6">		
									<strong>Basic <br>Information</strong>
								</div>
								</div></a>
						  </li>
						  
						  
						  
					
						  <li class="" id="li_4">
								<a href="#" >
									<div class="row-fluid">
										 <div class="span6">
											<i class="icon-wrench icon-3x"></i>
										 </div>		 
										 <div class="span6">		
											<strong>Services <br><br></strong>
										 </div>
									</div>
								</a>
							</li>
							  <li class="active" id="li_3">
								  <a href="#">
									  <div class="row-fluid">
											 <div class="span6">
												<i class="icon-user icon-3x"></i>
											</div>		 
											<div class="span6">		
												<strong>&nbsp;&nbsp;Staff <br><br></strong>
											</div>
										</div>
									</a>
							  </li>
						  
						</ul>
						<div id="myTabContent" class="tab-content tabcontentbg">
						  <div class="tab-pane fade active in" id="staff">
							  <div class="row-fluid">
								<div class="">
									<h3>Staff List
										<a href="#myModal"  class="btn pull-right btn-primary" data-toggle="modal">+add</a>
									</h3>
									<table class="table  table-staff table-hover  table-striped" >
									  <thead>
										<tr >
										  <th><h4>#</h4></th>
										  <th><h4>Staff Name</h4></th>
										  <th><h4>Action</h4></th>
										</tr>
									  </thead>
									 
										<tr >
										  <td>1</td>
										  <td>Mark</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>2</td>
										  <td>Jacob</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"> <i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										  
										</tr>
										<tr >
										  <td>3</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
										
										<tr>
										  <td>4</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
										
										<tr>
										  <td>5</td>
										  <td>Larry</td>
										  <td>
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
										  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
										  </td>
										</tr>
									</table>
									
							  <div class="pull-right"><a href="#"  class="btn btn-primary " >Save & Continue</a>
							  </div>
						  </div>
						</div>      
					</div>
				</div>
			</div>
		
		</div><!--row-fluid-->
	</div><!--end of content-->
	
	
	<!--model for add staff-->
	
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 ><h4 >Add Staff</h4></h3>
	  </div>
	  <div class="modal-body">
	  <div >
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active"><a href="#add_staff" data-toggle="tab"><b>Staff</b></a></li>
              <li><a href="#add_service" data-toggle="tab"><b>Services</b></a></li>
            </ul>
	  		<div id="serviceTabContent" class="tab-content">
				  <div class="tab-pane fade in active" id="add_staff">
					<form class=" form-horizontal ">
							<div class="control-group">
							  <label class="control-label" for="firstname">First Name :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" placeholder="First Name">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="lastname">Last Name :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" placeholder="Last Name">
							  </div>
							</div>
							<div class="control-group">
							  <label class="control-label" for="firstname">Email :</label>
							  <div class="controls">
								<input class="input-large radi" type="text" placeholder="someone@example.com">
							  </div>
							</div>
							  <div class="control-group">
								<label class="control-label" for="inputPassword">Mobile Number :</label>
								<div class="controls">
								  <input class="input-large radi" type="text" placeholder="+91">
								</div>
							  </div>          
				  </form>
				  
				  <div class="accordion" id="accordion7">
					  <div class="accordion-group">
						<div class="accordion-heading">
						  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion7" href="#lunch_time_avail">
							<strong>Add Staff Availability <i class="pull-right icon-chevron-down"></i></strong>
						  </a>
						</div>
						<div id="lunch_time_avail" class="accordion-body collapse">
						  <div class="accordion-inner">
						  <div class="row-fluid">
							  <div class="span6">
							  <center><b>Availability</b></center>
							  </div>
							   <div class="span6">
							   <center><b>Lunch Time</b></center>
							  </div>

						  </div>
							<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Sunday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Monday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Tuesday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Wednesday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Thursday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Friday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div>
						<div class="row-fluid background">
								<div class="span3"> <label class="checkbox"><input type="checkbox">Saturday</label> </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span1"> 
									<label class="checkbox pull-right"><input type="checkbox" class=""></label>
								 </div>
							
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span2">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<input type="text" class=" inputime span9" readonly="">
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
						</div><br/><br/><br/>
						
							<!--<table>
								<tbody>
									<tr>
										<td><input type="checkbox"></td>
										<td>Sunday</td>
										<td>
											<div class="input-append bootstrap-timepicker " placeholder="open">
											<input type="text" class="inputime input-small" readonly="">
											<span class="add-on"><i class="icon-time"></i></span>
											</div>
										</td>
										
										<td>
											<div class="input-append bootstrap-timepicker" placeholder="close">
											<input type="text" class="inputime input-small" readonly="">
											<span class="add-on"><i class="icon-time"></i></span>
										</div>
										</td>
										<td><input type="checkbox"></td>
										
										<td>
											<div class="input-append bootstrap-timepicker " placeholder="open">
											<input type="text" class="inputime input-small" readonly="">
											<span class="add-on"><i class="icon-time"></i></span>
											</div>
										</td>
										
										<td>
											<div class="input-append bootstrap-timepicker" placeholder="close">
											<input type="text" class="inputime input-small" readonly="">
											<span class="add-on"><i class="icon-time"></i></span>
										</div>
										</td>
										
										
									</tr>
								</tbody>
							</table>-->
							
							
							
						  </div>
						</div>
					  </div>
  
				</div>
				  
				  
				  
				  
				  
				  </div>
				 <div class="tab-pane fade" id="add_service">
					 <div class="row-fluid">
					  <h5>Assign services to staff</h5>
					 <div class="span6 offset1">
					
						 <form>
							 <label class="checkbox">
							  <input type="checkbox" value="">
							  Hair color
							</label>
							<label class="checkbox">
							  <input type="checkbox" value="">
							  Hair Cut
							</label>
							<label class="checkbox">
							  <input type="checkbox" value="">
							  Body Spa
							</label>
							<label class="checkbox">
							  <input type="checkbox" value="">
							  Body Massage
							</label>
						 </form>
						 </div>
					 </div>
				 </div>
			</div> 
			  
	  </div>
	  <div class="modal-footer">
		 <button class="btn btn-primary">Save changes</button>
	  </div>
	</div>
	
	
	
	 </div>
</div>


<?php include('footer.php')?>
