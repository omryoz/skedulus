<div id="editbusytime" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 id="myModalLabel"><?=(lang('Apps_repeatbusytime'))?></h4>
  </div>
  <div class="modal-body">
	<p id="eventId" class="hide"></p>
	<div class="row-fluid">
	
	<button class="btn span6" id="multibusytime"><?=(lang('Apps_allfuturebusytime'))?></button>
    <button class="btn btn-success span6" id="singlebusytime" ><?=(lang('Apps_onlythisbusytime'))?></button>
	
	</div>
  </div>
</div>



<!-- New Event Template -->

<div id="busytime" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form class="form-horizontal" name="bussy_time" action="<?php echo base_url();?>bcalendar/bussytime" method="post" id="book_busytime" onsubmit="return false;" >	
  <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"><?=(lang('Apps_addbusytime'))?></h3>
  </div><p class="message"></p>	
  <div class="modal-body">
    
        <table border="0" cellpadding="0" width="100%" class="class-table">  
            <tbody>  
			
			<tr> 
				<td >
					   <div class="labelBlock"><?=(lang('Apps_trainers'))?> </div>
					   	  <select name="staff" class="bstaff"> 
			              </select>
				</td>
				<td >
					     <div class="labelBlock"><?=(lang('Apps_date'))?></div>
						 <input type="text" class=" date_picker StartDate" value="" id="startDate" name="startdate" data-date-format="dd-mm-yyyy">
					  </td>
			</tr>

			<tr>
					  
					  <td style="display:table;">
					     <div class="labelBlock"><?=(lang('Apps_starttime'))?></div>
						 <select name="starttime"  class="busytimeslot busystarttime" id="eventStartTime1">
					     </select> 
						  
					
					   </td>
					   <td style="position:relative;">
					     <div class="labelBlock"><?=(lang('Apps_endtime'))?></div>
						 <select name="endtime"  class="busytimeslot busyendtime" id="eventEndTime1">
					     </select> 
						 <a href="javascript:;" id="brepeat" class="add-repeat">
						 <p id="brepeathtml" value="add"><?=(lang('Apps_addrepeat'))?></p></a>
						 <input type="hidden" name="repeatstatus" id="brepeatstatus" value="Add Repeat">
					   </td>
					   
					   
					  
			</tr>
					<tr style="display: none;" id="brepeatdiv">
					
						<td>
							<div class="labelBlock"><?=(lang('Apps_weekly'))?></div>
						    
						</td>
					  
					  <td>
					    <div class="labelBlock"><?=(lang('Apps_enddate'))?></div>
						<input type="text" class=" date_picker endDate" name="enddate" value="" id="EndDate" data-date-format="dd-mm-yyyy">
					  </td>
						
					</tr>
					
					<tr id="weekRep" >
					    <td class="select-day" colspan="2">
							 <div class="btn-toolbar" id="bweeks" style="display: none;">
							  <div class="btn-group">
								<button class="btn weekday weekly" type="button" name="week" value="1" id="w1"><?=(lang('Apps_mon'))?></button>
								<button class="btn weekday weekly" type="button" name="week" value="2" id="w2"><?=(lang('Apps_tue'))?></button>
								<button class="btn  weekday weekly" type="button" name="week" value="3" id="w3"><?=(lang('Apps_wed'))?></button>
								<button class="btn weekday weekly" type="button" name="week" value="4" id="w4"><?=(lang('Apps_thu'))?></button>
								<button class="btn weekday weekly" type="button" name="week" value="5" id="w5"><?=(lang('Apps_fri'))?></button>
								<button class="btn weekday weekly" type="button" name="week" value="6" id="w6"><?=(lang('Apps_sat'))?></button>
								<button class="btn weekday weekly" type="button" name="week" value="7" id="w7"><?=(lang('Apps_sun'))?></button>
								 <input type="hidden" name="weeklist" id="bweeklist" value="">
							 </div>
							</div>
						</td>
					</tr>
					
					<tr>
					  
					  <td colspan="2">
					  <div class="labelBlock"> <?=(lang('Apps_description'))?></div>
					  <textarea rows="4" class="input-block-level note" name='note'></textarea>
					  </td> 
					</tr>
					<input type="hidden" name="user_id" id="users_id" value="<?=$user_id?>" />
					<input type="hidden" name="businessid" class="business_id" value="<?php print_r($this->session->userdata['business_id']) ?>">	
					<input type="hidden" name="type" type-name="" class="busytype" value="">
					<input type="hidden" name="seriesid" class="seriesid" value="">	
					<input type="hidden" name="btype" class="btype" value="">
					<input type="hidden" name="alltrue" class="alltrue" value="">
                   
					
            </tbody>
        </table>
  </div>
  <div class="pull-right">
   <ul class="unstyled inline">
   <li>
   <input type="button" name="delete" value="<?=(lang('Apps_delete'))?>" class="btn btn-success deletebusytime" style="display:none"/>
   <input type="submit" name="submit" value="<?=(lang('Apps_save'))?>" class="btn btn-success addbusytime"/>
   </li></ul>
	 
  </div> </form>
</div>

<script>
 $(".addbusytime").click(function(){ 
  if($(".alltrue").val()=='1'){
      if($("#brepeatstatus").val()=='Remove Repeat'){
	  if($("#bweeklist").val()==''){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("No weekday selected.").css({"display":"block","margin":"0px"});
	  }else if($(".endDate").val()==''){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("No end day selected.").css({"display":"block","margin":"0px"});
	  }else if($(".busystarttime").val()==$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("starttime same as endtime").css({"display":"block","margin":"0px"});
	  }else if($(".busystarttime").val()>$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("End time less than the start time").css({"display":"block","margin":"0px"});
	  }else{ 
		$("#book_busytime").attr("onsubmit","return true;");
	  }
	}else if($("#brepeatstatus").val()=='Add Repeat'){
	   if($(".busystarttime").val()==$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("starttime same as endtime").css({"display":"block","margin":"0px"});
	   }else if($(".busystarttime").val()>$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("End time less than the start time").css({"display":"block","margin":"0px"});
	   }else{
		$("#book_busytime").attr("onsubmit","return true;");
	  }
	}
	}
 })
</script>

