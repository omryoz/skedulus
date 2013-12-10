<div id="editbusytime" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 id="myModalLabel">This busy time is the part of the repeat series</h4>
  </div>
  <div class="modal-body">
	<p id="eventId" class="hide"></p>
	<div class="row-fluid">
	
	<button class="btn span6" id="multibusytime">All future busy time</button>
    <button class="btn btn-success span6" id="singlebusytime" >Only this busy time</button>
	
	</div>
  </div>
</div>



<!-- New Event Template -->

<div id="busytime" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 <form class="form-horizontal" name="bussy_time" action="<?php echo base_url();?>bcalendar/bussytime" method="post" id="book_busytime" onsubmit="return false;" >	
  <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Add Busy Time</h3>
  </div><p class="message"></p>	
  <div class="modal-body">
    
        <table border="0" cellpadding="0" width="100%" class="class-table">  
            <tbody>  
			
			<tr> 
				<td >
					   <div class="labelBlock"> Trainers</div>
					   	  <select name="staff" class="bstaff"> 
			              </select>
				</td>
				<td >
					     <div class="labelBlock">Date</div>
						 <input type="text" class=" date_picker StartDate" value="" id="startDate" name="startdate">
					  </td>
			</tr>

			<tr>
					  
					  <td style="display:table;">
					     <div class="labelBlock">Time</div>
						 <select name="starttime"  class="busytimeslot busystarttime" id="eventStartTime1">
					     </select> 
						  
					
					   </td>
					   <td style="position:relative;">
					     <div class="labelBlock">To</div>
						 <select name="endtime"  class="busytimeslot busyendtime" id="eventEndTime1">
					     </select> 
						 <a href="javascript:;" id="brepeat" class="add-repeat">
						 <p id="brepeathtml" value="add">Add Repeat</p></a>
						 <input type="hidden" name="repeatstatus" id="brepeatstatus">
					   </td>
					   
					   
					  
			</tr>
					<tr style="display: none;" id="brepeatdiv">
					
						<td>
							<div class="labelBlock">Weekly</div>
						    
						</td>
					  
					  <td>
					    <div class="labelBlock"> End Date</div>
						<input type="text" class=" date_picker endDate" name="enddate" value="" id="EndDate">
					  </td>
						
					</tr>
					
					<tr id="weekRep" >
					    <td class="select-day" colspan="2">
							 <div class="btn-toolbar" id="bweeks" style="display: none;">
							  <div class="btn-group">
								<button class="btn weekly" type="button" name="week" value="1" id="w1">Mon</button>
								<button class="btn weekly" type="button" name="week" value="2" id="w2">Tue</button>
								<button class="btn weekly" type="button" name="week" value="3" id="w3">Wed</button>
								<button class="btn weekly" type="button" name="week" value="4" id="w4">Thu</button>
								<button class="btn weekly" type="button" name="week" value="5" id="w5">Fri</button>
								<button class="btn weekly" type="button" name="week" value="6" id="w6">Sat</button>
								<button class="btn weekly" type="button" name="week" value="7" id="w7">Sun</button>
								 <input type="hidden" name="weeklist" id="bweeklist" value="">
							 </div>
							</div>
						</td>
					</tr>
					
					<tr>
					  
					  <td colspan="2">
					  <div class="labelBlock"> Description</div>
					  <textarea rows="4" class="input-block-level note" name='note'></textarea>
					  </td> 
					</tr>
					<input type="hidden" name="user_id" id="users_id" value="<?=$user_id?>" />
					<input type="hidden" name="businessid" class="business_id" value="<?php print_r($this->session->userdata['business_id']) ?>">	
					<input type="hidden" name="type" type-name="" class="busytype" value="">
					<input type="hidden" name="seriesid" class="seriesid" value="">	
					<input type="hidden" name="btype" class="btype" value="">
					<input type="hidden" name="btype" class="alltrue" value="">
                   
					
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

