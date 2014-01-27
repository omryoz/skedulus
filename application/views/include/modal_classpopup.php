
<div id="editClass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 id="myModalLabel"><?=(lang('Apps_clientaddedperclassbasis'))?></h4>
  </div>
  <div class="modal-body">
	<p id="eventId" class="hide"></p>
	<div class="row-fluid">
	
	<button class="btn span6 clientlist" id="multiClass"><?=(lang('Apps_allclasses'))?></button>
    <button class="btn btn-success span6 clientlist" id="singleClass" ><?=(lang('Apps_onlythisclass'))?></button>
	</div>
  </div>
</div>



<!-- New Event Template -->
<div id="postclass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="aPointer  " style="display: block; z-index: 2; "></div>
	
<ul class="nav nav-tabs" id="postclasstab">
  <li class="active">
  <a href="#edit_class" id="addclass" ><?=(lang('Apps_postclass'))?></a>
  <a href="#edit_class" id="updateclass" style="display:none"><?=(lang('Apps_editclass'))?></a></li>
  <li><a href="#add_client" id="addclient" ><?=(lang('Apps_clientlist'))?></a></li>
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 5px 6px 0px;">&times;</button>
</ul>
 <hr/>
 <p class="message"></p>	
<div class="tab-content">
  <div class="tab-pane active" id="edit_class">
		<div >
		<form id="classdetails">
        <table border="0" cellpadding="0" width="100%" class="class-table">  
            <tbody>  
			
			<tr height="40px;"> 
					  <td >
					    <div class="labelBlock">  <?=(lang('Apps_classes'))?></div>
						<?php 
						$select="";
						echo form_dropdown('eventGroup',$classes,$select,' id=eventGroup')   ?>						
					  </td>
					  
					  <td>
					   <div class="labelBlock"> <?=(lang('Apps_trainers'))?></div>
					   <select name="trainer"   id="trainer" class="demo">
					   </select> 
					   <p class="hide event_id"></p>
					   <p class="hide trainerid"><?=(!empty($trainerid))?$trainerid:''?></p>
					   <p class="hide trainername"><?=$firstname." ".$lastname?></p>
					  
						<p class="hide" id="business_id"><?php echo $businessId; ?></p>
					  </td>
					</tr>

					<tr>
					  <td>
					     <div class="labelBlock"><?=(lang('Apps_date'))?></div>
						 <input type="text" class=" date_picker class_stdate" value="" id="StartDate" name='startdate' data-date-format="dd-mm-yyyy">
					    <!--- <input type="text" class="inputboxblue" id="StartDate">--->
					  </td>

					  <td style="position:relative;">
					     <div class="labelBlock"><?=(lang('Apps_time'))?></div>
						 <select name="time"  class="timeslot" id="eventStartTime">
					     </select> 
					     <input type="hidden" class="StartTime">
						 <input type="hidden" name="today" id="today" value="<?php echo date("Y/m/d"); ?>">
						 <a href="javascript:;" id="repeat" class="add-repeat"><p id="repeathtml" value="add"><?=(lang('Apps_addrepeat'))?></p></a>
					  </td>
					  
					</tr>
					<tr style="display:none" id="repeatdiv">
					  <td>
					   <div class="labelBlock">  <?=(lang('Apps_repeattype'))?></div>
					       <select name="repeat_type" id="repeat_type">
						  <option id="daily" value="daily"><?=(lang('Apps_daily'))?></option>
						  <option id="weekly" value="weekly"><?=(lang('Apps_weekly'))?></option>
						  <option id="monthly" value="monthly"><?=(lang('Apps_monthly'))?></option>
						  </select>
					  </td>
					  <td>
					    <div class="labelBlock"> <?=(lang('Apps_enddate'))?></div>
						<input type="text" class=" date_picker class_eddate" value="" id="EndDate" data-date-format="dd-mm-yyyy">
					  </td>
						<td>
							
			
						</td>
					</tr>
					<tr id="monthRep">
					    <td class="select-month">
						    
							 <div class="btn-toolbar"  id="months" style="display:none">
							  <div class="btn-group">
								<button class="btn month " type="button" name="monthly" value="1" id="m1"><?=(lang('Apps_jan'))?></button>
								<button class="btn month "  type="button" name="monthly" value="2" id="m2"><?=(lang('Apps_feb'))?></button>
								<button class="btn month " type="button" name="monthly" value="3" id="m3"><?=(lang('Apps_mar'))?></button>
								<button class="btn month " type="button" name="monthly" value="4" id="m4"><?=(lang('Apps_apr'))?></button>
								<button class="btn month " type="button" name="monthly" value="5" id="m5"><?=(lang('Apps_may'))?></button>
								<button class="btn month " type="button" name="monthly" value="6" id="m6"><?=(lang('Apps_jun'))?></button>
								<button class="btn month " type="button" name="monthly" value="7" id="m7"><?=(lang('Apps_jul'))?></button>
								<button class="btn month " type="button" name="monthly" value="8" id="m8"><?=(lang('Apps_aug'))?></button>
								<button class="btn month " type="button" name="monthly" value="9" id="m9"><?=(lang('Apps_sep'))?></button>
								<button class="btn month " type="button" name="monthly" value="10" id="m10"><?=(lang('Apps_oct'))?></button>
								<button class="btn month " type="button" name="monthly" value="11" id="m11"><?=(lang('Apps_nov'))?></button>
								<button class="btn month " type="button" name="monthly" value="12" id="m12"><?=(lang('Apps_dec'))?></button>
								 <input type="hidden" name="monthlylist"  id="monthlylist" value="" >
								
							  </div>
							</div>
						</td>
					</tr>
					
					<tr id="weekRep">
					    <td class="select-day">
							 <div class="btn-toolbar"  id="weeks" style="display:none">
							  <div class="btn-group">
								<button class="btn weekly" type="button" name="week" value="1" id="w1"><?=(lang('Apps_mon'))?></button>
								<button class="btn weekly" type="button" name="week" value="2" id="w2"><?=(lang('Apps_tue'))?></button>
								<button class="btn weekly" type="button" name="week" value="3" id="w3"><?=(lang('Apps_wed'))?></button>
								<button class="btn weekly" type="button" name="week" value="4" id="w4"><?=(lang('Apps_thu'))?></button>
								<button class="btn weekly" type="button" name="week" value="5" id="w5"><?=(lang('Apps_fri'))?></button>
								<button class="btn weekly" type="button" name="week" value="6" id="w6"><?=(lang('Apps_sat'))?></button>
								<button class="btn weekly" type="button" name="week" value="7" id="w7"><?=(lang('Apps_sun'))?></button>
								 <input type="hidden" name="weeklist"  id="weeklist" value="" >
							 </div>
							</div>
						</td>
					</tr>
					
					<tr style="display:block; margin-top: 50px;">
					  
					  <td>
					    <div class="labelBlock"> <?=(lang('Apps_endtime'))?></div>
					     <input type="text" class="" name="endtime"  id="eventEndTime">
					  </td>
					</tr>
					<tr> 
					 <!---- <td>
					    <div class="labelBlock"> <?=(lang('Apps_lastdateforenroll'))?></div>
						<input type="text" class=" date_picker" value="" id="enroll_last">					   
					  </td> ---->
					  <td>
					    <div class="labelBlock"> <?=(lang('Apps_capacity'))?></div>
					     <input type="text" class=""  id="class_size">
						 <input type="hidden" name="repeatstatus" id="repeatstatus">
					  </td> 
					  <td>
					    <?=(lang('Apps_available'))?>: <span id="available"></span>
					  </td> 
					</tr>
					<!---<tr id="Classavailable">  
					  
					</tr>---->					
					
            </tbody>
        </table>
		</form>
			<div class="pull-right">
	    <ul class="unstyled inline" ><input type="hidden" name="action" id="action" value="">
	        <li id="add">
	            <a class="websbutton btn btn-success postclassbtn" href="javascript:;" id="postclassbtn" ><?=(lang('Apps_save'))?></a>
	        </li>
	       <!-- <li>
	            <a  href="javascript:void(0)" class="websbutton"  onclick="return closeAddEvent();">Cancel</a>
	        </li>--->
	        <li id="update" style="display:none" class="">
			    <input type="hidden" name="updateid"  id="updateid" value="">
				 <a class="websbutton btn btn-success" href="javascript:rzDeleteEvent();"><?=(lang('Apps_delete'))?></a>
	             <a class="websbutton btn btn-success postclassbtn" href="javascript:;"><?=(lang('Apps_update'))?></a>
	        </li>
	    </ul>
		</div>
		
		</div>

  
  </div>
  <div class="tab-pane" id="add_client">
		<div class="row-fluid">
			<div class="span3">
				<span class="pull-right"><?=(lang('Apps_client'))?>
				<!----<a href="javascript:;" data-toggle="collapse" data-target="#demo" class="showform">--->
				<a href="javascript:;" class="showform" >
				<!---<a href="javascript:;" class="showform">--->
					<i class="icon-plus"></i>
				</a>
				<div>
				<ul id="clientlist" class="unstyled">
				 
				</ul>
				
				</div>
				</span>
			</div>
			<div class="span9 client-form">
				<!---<div id="demo" class="collapse ">--->
				<div id="demo"> <input type="hidden" name="clientids" value="" id="clientids"> 
					<form class="form-horizontal" id="clientform">
						  <div class="control-group">
							<label class="control-label" for="inputEmail"><?=(lang('Apps_clientName'))?> </label>
							<div class="controls">
							  <input type="text"  class="input-large tags" name="name" id="name" onkeyup="autosuggest()" required>
							</div>
						  </div>
						  <div class="control-group">
							<label class="control-label" for="inputPassword"><?=(lang('Apps_email'))?></label>
							<div class="controls">
							  <input type="text"  class="input-large" name="email" id="email">
							</div>
						  </div>
						   <div class="control-group">
							<label class="control-label" for="inputPassword"><?=(lang('Apps_phonenumber'))?></label>
							<div class="controls">
							  <input type="text" class="input-large" name="phone" id="phone">
							</div>
						  </div>
						   <!---<div class="control-group">
							<label class="control-label" for="inputPassword"><?=(lang('Apps_price'))?></label>
							<div class="controls">
							  <input type="text"  class="input-large" name="price" id="price">
							</div>
						  </div>--->
						   <div class="control-group">
							<label class="control-label" for="inputPassword"><?=(lang('Apps_clientnotes'))?></label>
							<div class="controls">
							<textarea name="notes" id="note"></textarea>
							</div>
						  </div>
						  <div class="control-group">
							<div class="controls pull-right">
							  <button type="button" class="btn btn-success" id="removeClient" value="" appid="" style="display:none;"><?=(lang('Apps_remove'))?></button>
							  <button type="button" class="btn btn-success" id="addClient"><?=(lang('Apps_done'))?></button>
							  <input type="hidden" name="users_id" id="users_id" >
							  <input type="hidden" name="actionVal" id="actionVal" value="">
							  <input type="hidden" name="bookbusiness" value="<?php print_r($buisness_details[0]->id); ?>">
							  <input type="hidden" name="oldstdate" id="oldstdate" >
							  <input type="hidden" name="oldeddate" id="oldeddate" >
							   <input type="hidden" name="apptype" class="apptype" id="apptype" value="" data-val=""> 
							</div>
						  </div>
					</form>
				</div>	
			</div>
		</div>
			
  </div>
 
</div>
	

	</div>
	
	<script>
	//$(function() {
function autosuggest(){
	var availableTags = ''; 
	$.ajax({
	url:base_url+'bcalendar/getClientsList',
	data:{clientids:$("#clientids").val()},
	 type:'post',
	 success:function(data){ 
	  availableTags = eval(data); 
	  $( ".tags" ).autocomplete({
       source: availableTags,
	   select: AutoCompleteSelectHandler,
	   search: function() {
		 //reset every time a search starts.
		 $("#email").val('');
		 $("#phone").val('');
		 $("#users_id").val('');
		 $("#actionVal").val('');
		 }
	  
      });
	 }
	 
	})
  
    function AutoCompleteSelectHandler(event, ui) {
	$(".message").removeClass("alert").html("");
	 $("#actionVal").val('add');
     $("#email").val(ui.item.email);
	 $("#phone").val(ui.item.phone); 
	 $("#users_id").val(ui.item.id);
     }
  }
	</script>