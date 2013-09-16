<!----------book popup start------------>


<div id="book" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment">	
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_bookanappointment'))?></h3>
  </div>
  <div class="modal-body">
		   <p class="message"></p>	
		  
		   <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_service'))?></label>
			<div class="controls">
			  <!--<input type="text" class="span6" readonly="" placeholder="Service">-->
			  <!--<p id="service hide">Services</p>-->
			  <select class="services" name="services" required>
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_service'))?></option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_staff'))?></label>
			<div class="controls">
			 <input type="hidden" name="selectedstaff" value="" id="selectedstaff">
			  <!--<input type="text" class="span6 staff" readonly="" placeholder="Staff">-->
			  <select name="staff" class="staff"> 
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_staff'))?></option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_date'))?></label>
			<div class="controls">
				<div class="input-append date date_pick span8" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
					<input class="span10 st_date" name="date" size="16" type="text" value="<?=date("d-m-Y")?>" required>
					<span class="add-on"><i class="icon-calendar"></i></span>
				  </div>
				  <!--<div class="input-append date date_pick span6" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
                                       <input class="span10 st_date" size="16" type="text" value="<?=date("d-m-Y")?>" >
                                       <span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>-->
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_time'))?></label>
			<div class="controls">
					<!--<input type="text" class="span6" readonly="" placeholder="Time">-->
					<select name="time" class="time" required>
						
					</select>
					<a href="<?php echo base_url();?>bcalendar" onclick="viewSchedule();" role="button" data-toggle="modal"  data-dismiss="modal" aria-hidden="true"> <?=(lang('Apps_viewschedule'))?></a>
			</div>
		  </div>
		  
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_message'))?></label>
			<div class="controls">
			  <textarea type="text" class="span8" name="note" id="note" placeholder="Message"></textarea>
			  <input type="hidden" name="businessid" value="<?php echo $_GET['id'] ?>"> 
			 
			</div>
		  </div>
		  
	
  </div>
  <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	<input type="submit" name="submit" value="Book" id="book" class="btn btn-success span3 offset5"/>
	<input type="hidden" name="user_id" value="<?=$user_id?>" />
	<input type="hidden" name="end_time" id="end_time" value="" required/>
  </div>
  </form>
</div>


<!---pop up for multi select services--->
<div id="bookmultiServices" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment">	
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_bookanappointment'))?></h3>
  </div>
  <div class="modal-body">
		   <p class="message"></p>	
		  
		   <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_service'))?></label>
			<div class="controls">
			<p id="checkbox"><p>
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_staff'))?></label>
			<div class="controls">
			 <input type="hidden" name="selectedstaff" value="" id="selectedstaff">
			  <!--<input type="text" class="span6 staff" readonly="" placeholder="Staff">-->
			  <select name="staff" class="staff"> 
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_staff'))?></option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_date'))?></label>
			<div class="controls">
				<div class="input-append date date_pick span8" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
					<input class="span10 st_date" name="date" size="16" type="text" value="<?=date("d-m-Y")?>" required>
					<span class="add-on"><i class="icon-calendar"></i></span>
				  </div>
				  <!--<div class="input-append date date_pick span6" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
                                       <input class="span10 st_date" size="16" type="text" value="<?=date("d-m-Y")?>" >
                                       <span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>-->
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_time'))?></label>
			<div class="controls">
					<!--<input type="text" class="span6" readonly="" placeholder="Time">-->
					<select name="time" class="time" required>
						
					</select>
					<a href="<?php echo base_url();?>bcalendar" onclick="viewSchedule();" role="button" data-toggle="modal"  data-dismiss="modal" aria-hidden="true"> <?=(lang('Apps_viewschedule'))?></a>
			</div>
		  </div>
		  
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_message'))?></label>
			<div class="controls">
			  <textarea type="text" class="span8" name="note" id="note" placeholder="Message"></textarea>
			  <input type="hidden" name="businessid" value="<?php echo $_GET['id'] ?>"> 
			 
			</div>
		  </div>
		  
	
  </div>
  <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	<input type="submit" name="submit" value="Book" id="book" class="btn btn-success span3 offset5"/>
	<input type="hidden" name="user_id" value="<?=$user_id?>" />
	<input type="hidden" name="end_time" id="end_time" value="" required/>
  </div>
  </form>
</div>







