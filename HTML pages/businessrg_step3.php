

<?php include('header.php')?>
<div class="content">
<div class="maindiv container">
	<div class="row-fluid inner-tab">
	<div class="container-fluid">
	<div class="row-fluid">
     <h3 >Business Registration </h3>

            <ul id="myTab" class="nav nav-tabs">
              <li  id="li_1">
			 
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
			  <li class="active" id="li_4">
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
              <li class="" id="li_3">
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
              
			  
			  <!-- basic info start -->
			  
      
              
              
              
              <div class="tab-pane fade active in" id="service">
                <div class="row-fluid">
					<div class="">
						<h3 >Services List
						   <a href="#myModal1"  class="btn pull-right btn-primary" data-toggle="modal">+add</a>
						</h3>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4>#</h4></th>
							  <th><h4>Service Name</h4></th>
							  <th><h4>Action</h4></th>
							</tr>
						  </thead>
						 
							<tr >
							  <td>1</td>
							  <td>Hair Color</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>2</td>
							  <td>Hair Cut</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							  
							</tr>
							<tr >
							  <td>3</td>
							  <td>Body Spa</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							</tr>
							
							<tr >
							  <td>4</td>
							  <td>Body Massage</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							</tr>
							
							<tr >
							  <td>5</td>
							  <td>Manicures</td>
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							</tr>
							<tr >
							  <td>6</td>
							  <td>Pedicures</td>   
							  <td>
							  <a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="#"  data-toggle="tooltip" class="tool" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
							  </td>
							</tr>
						</table>
				<div class="pull-right" ><a href="businessrg_step4.php"  class="btn btn-primary ">Save & Continue</a></div>
				  </div>
          </div>
                </div>     
            </div>
            </div>

</div><!--row-fluid-->
</div><!--end of content-->


<!--model for add staff-->



<!--model for add service-->
<div id="myModal1" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
    <h3 id="myModalLabel"><h4 class="staff1">Add Service</h4></h3>
  </div>
  <div class="modal-body">
    <div >
            <ul id="serviceTab" class="nav nav-tabs">
              <li class="active"><a href="#general" data-toggle="tab"><b>General</b></a></li>
              <li><a href="#staff1" data-toggle="tab"><b>Staff</b></a></li>
            </ul>
            <div id="serviceTabContent" class="tab-content">
              <div class="tab-pane fade in active" id="general">
                <form class="form-horizontal">
  <div class="control-group">
    <label class="control-label" for="Service Name">Service Name </label>
    <div class="controls">
      <input type="text" id="haircolor" placeholder="Hair Color">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Lenth">Length</label>
    <div class="controls">
      <input class="input-mini" type="text" placeholder="">&nbsp;&nbsp;
      <select class="input-small">
	  <option>minutes</option>
	  <option>hours</option>
	 
	  </select> <a href="#">Add padding Time</a>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Lenth">Price</label>
    <div class="controls">
       <select class="input-small">
	  <option>Fixed</option>
	  <option>Variable</option>
	  <option>Free</option>
	  </select> <b>$</b>
      <input class="input-mini" type="text" placeholder="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="Lenth">Description</label>
    <div class="controls">
      <textarea rows="3"></textarea>
    </div>
  </div>
  
</form>
              </div>
              <div class="tab-pane fade" id="staff1">
                <h5 class="staff">Assign Staff to this Service</h5>
                <p class="alert">No staff added yet</p>
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
