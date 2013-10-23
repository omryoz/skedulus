<!---For calendar----->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/web2cal.css"> 
        <?php /*?><script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script> <?php */?>
        <script src="<?php echo base_url() ?>calendar/js/Web2Cal-Basic-2.0-min.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.support.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.default.template.js">  </script> 
		<script type="text/javascript" src="<?php echo base_url() ?>calendar/src/js/mybic.js"></script> 
	

		
<!---End--------------->
<?php 
	
    $INC_PATH=base_url().'calendar/src/'; 
?>
<?php 
//print_r($buisness_availability); 
		
@session_start();
 $_SESSION['profileid'] = $buisness_details[0]->id;
// if(!isset($this->session->userdata['id'])){
 // redirect('home/clientlogin');
// }


?>
<?php if(isset($this->session->userdata['role']) && ($this->session->userdata['role']=='manager')) {
  $role='manager';
  $crumb='My business profile';
 }else{
  $role='none';
  $crumb=(!empty($buisness_details))?($buisness_details[0]->name):'';
 } ?>
 <input type="hidden" name="userrole" value="<?php print_r($role);?>" id="userrole">
 
<div class="content container">
		<div class="row-fluid business_profile">
		<?php //print_r($this->session->userdata['profileid']);?>
<!-- <h3><a  href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?></a></h3> -->	

<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php print_r($crumb); ?></a> <span class="divider">/</span></li>
  <li class="active">Business calendar</li>
</ul>


<div id="calendarContainer" ></div>
<input type="hidden" name="staffid" id="staffsid" value="">
<p class="hide" id="user_id"></p>
 <p id="profileid" class="hide"><?php print_r($buisness_details[0]->id) ?></p>											
<p class="hide" id="login_id"><?php if(isset($user_id))print_r($user_id); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>	
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>

</div>
</div>
  </div>
</div>
<!----Modal------>
<div id="reschedule" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<p class="message"></p> 
 <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel">Appointment Details</h3>
  </div>
  <div class="modal-body">
	<p id="eventid" class="hide"></p>
	<div class="row-fluid">
		<div class="row-fluid">
			<table class="table table-striped" >
			<tbody>
			<tr> 
					  <td>
					    Business Name 	
					  </td>
					  <td>
					   <span id="business_name"></span>
					   <p id="business_id" class="hide"></p>
					   <p id="services_id" class="hide"></p>
					   <p id="employee_id" class="hide"></p>
					   <p id="note" class="hide"></p>
					  </td>
		   </tr>
		   <tr> 
					  <td>
					    Client Name 	
					  </td>
					  <td>
					   <span id="cname"></span>
					  </td>
		   </tr>
		   <tr> 
					  <td>
					    <span id="type"></span> 	
					  </td>
					  <td>
					   <span id="typeName"></span>
					  </td>
		   </tr>
		    <tr id="serviceprovider"> 
					  <td>
					    Service Provider	
					  </td>
					  <td>
					   <span id="name"></span>
					  </td>
		   </tr>
			 <tr> 
					  <td>
					    Date	
					  </td>
					  <td>
					   <span id="date"></span>
					  </td>
		     </tr>	
			  <tr> 
					  <td>
					    Time	
					  </td>
					  <td>
					   <span id="time"></span>
					   <span id="endtime" class="hide"></span>
					  </td>
		      </tr>
			</tbody>
			</table>
		</div>
	
	<!---<button class="btn span6 clientlist" id="multiClass">All Classes</button>--->
	
	<ul class="unstyled inline pull-right" style="margin: 0px;">
	<li>
	<button class="btn btn-success  clientlist" id="reschedulebtn">Reschedule</button></li>
	<li>
	<!----<a  class="websbutton btn btn-success confirm " id="delete" href="javascript:rzDeleteEvent()" id="deleteApp" >Delete</a>--->
	<a  class="websbutton btn btn-success" id="deleteApp" href="javascript:;" >Delete</a>
	<!---<button class="btn btn-danger clientlist confirm" id="delete" >Delete</button>--->
	</li>
	</ul>
    
	
	
	</div>
  </div>
</div>

<div id="bookApp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >	
								<div class="aPointer  " style="display: block; z-index: 2; " ></div> 	
								<p class="message" style="display:none;"></p>	
								<div class="acalclosebtn topright closeNewEvent"></div>	
								<div class="modal-header" >	
								<h3 class="appoint-heading"> 	Book Appointment	
								<a href="javascript:;" name="Close"  class="close" data-dismiss="modal" aria-hidden="true"> &times;  </a> </h3>
								</div>	
								<div style="padding:20px;">	
								<table cellpadding="0"  width="100%">		
									<tr>	
										<td valign="top">							
								<div>	
								<form class="form-horizontal form-appointment">
								<div class="control-group">
									<label class="control-label">Service</label>
									<div class="controls">
										<div class="selectGroup"><p id="checkbox"><p>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Staffs</label>
									<div class="controls">
										<select name="staff" class="staff" id="staffSelect"> 
										<option> <?=(lang('Apps_selectstaff'))?></option>
										</select>
									</div>
								</div>
								
							  <div class="control-group"><label class="control-label">Note</label><div class="controls"><textarea  class="inputbox input-block-level" rows="2" cols="10" name="eventName" id="eventName"></textarea></div></div>
							
							  
							
							  </form>
							  
								</div>	
    
							
										</td>	
										<td  valign="top">	
										<div>	
											<div class="labels hide">	
												Start Date:
											</div>	
											<div class="startDate">	
												<input type="hidden" class="startDateClass"  name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate"/>	
											</div>			
										</div>	
										<div>	
											<div class="labels hide" >	
												Start Time:
											</div>	
											<div class="startTime">	
												<input type="hidden" class="startTimeClass" name="eventStartTime" style="width:5em; border:1px solid #C3D9FF;" id="eventStartTime"/>	 
											</div>	 	
										</div> 	
										<div>	
											<div class="labels hide">	
												End Date:
											</div>	
											<div class="endDate">	
												<input type="hidden" name="eventEndDate" style="width:6em; border:1px solid #C3D9FF;" id="eventEndDate"/>	
											</div>			
										</div>	  	
							
										<div>	
											<div class="labels hide" >	
												End Time: 
											</div>	
											<div class="endTime">	
												<input type="hidden" name="eventEndTime" style="width:5em; border:1px solid #C3D9FF;" id="eventEndTime"/> 
												<input type="hidden" name="business_id"  id="business_id" value="<?php print_r($buisness_details[0]->id) ?>"/> 												
												<input type="hidden" name="users_id"  id="users_id" class="users_id" value=""/>
												<input type="hidden" name="checkedServices"  id="checkedServices" value=""/>												
											</div>		 	
										</div>	
										</td>	
									</tr>	
								</table>   	
								
								
										<ul class="actions">
										 <?php
										$url='';
										 if(!isset($this->session->userdata['id'])){
											 //redirect('home/clientlogin');
											 //$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
										  ?>
										   <li id="addEventBtn"> <a href="<?php echo base_url();?>bcalendar/referal_url/?url='<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>'" name="edit" class="btn btn-success pull-right"> Book </a> </li>
											<?php }else{ ?>
											<li id="addEventBtn"> <a href="javascript:rzAddEvent();" name="edit" class="btn btn-success pull-right" id="bookAppbtn"> Book </a> </li>
											<?php } ?>
											<li style="display:none;" id="updateEventBtn"> <a href="javascript:rzUpdateEvent();" name="Update" class="websbutton pull-right"> Update event </a> </li>
										</ul>
							
								</div>  
</div>
</div>


<script>
    var ical; 
    /*
     Create the Calendar.
     */
    function drawCalendar()
    { 
        ical = new Web2Cal('calendarContainer', {
            loadEvents: loadCalendarEvents,
            onUpdateEvent: updateEvent,
            onNewEvent: onNewEvent,  
			onPreview: onPreview, 
            views: "day, week, agenda"
        });
        ical.build();
    }
 	var activeEvent;
    function onPreview(evt, dataObj, html) 
	{  
	  Appdetails($(evt).attr('eventid'));
	}
	
	function Appdetails(eventid){
		if($("#userrole").val()=='manager'){
	   $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	  
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:eventid},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
			$("#business_name").html(v.business_name);
			$("#cname").html(v.c_first_name+" "+v.c_last_name);
			$("#business_id").html(v.business_details_id);
			if(v.e_first_name!="" || v.e_last_name!=""){
			$("#name").html(v.e_first_name+" "+v.e_last_name);
			}else{
			$("#serviceprovider").css("display",'none');
			}
			if(v.type=='class'){
			var type='Class';
			$("#type").html(type);
			$("#typeName").html(v.services);
			$("#reschedulebtn").hide();
			}else{
			var type='Services';
			$("#type").html(type);
			$("#typeName").html(v.services);
			$("#services_id").html(v.services_id);
			$("#employee_id").html(v.employee_id);
			$("#note").html(v.note);
			$("#user_id").html(v.user_id);
			if(v.status=='active'){
			$("#reschedulebtn").show();
			}else{
			$("#reschedulebtn").hide();
			}
			}
			$("#date").html(v.date);
			$("#time").html(v.time);
			$("#endtime").html(v.endtime);
		  })
	   }
	   })
	   
	   $("#reschedule").modal('show');
		//activeEvent=dataObj;
		//ical.showPreview(evt, html);
		}
	}
	
	function agendaShowEventDetail(evt){ 
	    Appdetails(evt);
	}
    /*
     Method invoked when event is moved or resized
     @param event object containing eventID and newly updated Times
     */
    function updateEvent(event)
    { 
        //ical.updateEvent(event);

		var _sT=new UTC(event.startTime);
		var _eT=new UTC(event.endTime);

		var stStr=_sT.toDateString() +" "+_sT.toTimeString();
		var edStr=_eT.toDateString() +" "+_eT.toTimeString();

		var str="?"; 		
		str=str+"&name="+event.eventName;
		str=str+"&st="+stStr;
		str=str+"&et="+edStr;
		str=str+"&eventId="+event.eventId;
		str=str+"&groupId="+event.group.groupId;
		str=str+"&allDay="+((event.allDay)?1:0);
		ajaxObj.call("action=updateevent"+str, cb_updateEvent);
    }
	function cb_updateEvent(event)
	{ 
		ical.updateEvent(event);
	}
    
    /*
     Method invoked when creating a new event, before showing the new event form.
     @param obj - Object containing (startTime, endTime)
     @param groups - List of Group objects ({groupId, name})
     @param allday - boolean to indicate if the event created is allday event.
     */
    function onNewEvent(obj, groups, allday)
    {
        Web2Cal.defaultPlugins.onNewEvent(obj, groups, allday); 
    }
    
    /**
     Method to get Events and display it in the calendar.
     If you need to make an asynchronous call, invoke ical.render in the callback method.
     @param startTime - Calendar Display Range start
     @para endTime - Calendar End Range end
     */
    function loadCalendarEvents(startTime, endTime)
    {   
		ajaxObj.call("action=getevents", function(list){ical.render(list);});
    }  
    
    /*
     Click on Edit Button in preview window
     */
    function rzEditEvent(evId)
    {
        var evObj=ical.getEventById(evId); 
		//alert(evObj.groupId);
		jQuery("#defaultNewEventTemplate").find("#eventName").val(evObj.eventName).end()
							.find("#eventGroup").val(evObj.groupId).end()
							.find("#eventStartTime").val(evObj._startTime.toNiceTime()).end()
							.find("#eventEndTime").val(evObj._endTime.toNiceTime()).end()
							.find("#eventStartDate").val(evObj._startTime.toStandardFormat()).end()
							.find("#eventEndDate").val(evObj._endTime.toStandardFormat()).end()
							.find("#addEventBtn").hide().end()
							.find("#updateEventBtn").show().end()
							.find("#eventDescription").val(evObj.eventDesc).end()  ;
								
		  
		ical.showEditEventTemplate(jQuery("#defaultNewEventTemplate"), evObj.eventId);
		ical.hidePreview();
    }
    
    function rzUpdateEvent()
	{ 
		var updEv = Web2Cal.defaultPlugins.getNewEventObject();
 
		var _sT=new UTC(updEv.startTime);
		var _eT=new UTC(updEv.endTime); 
		var stStr=_sT.toDateString() +" "+_sT.toTimeString();
		var edStr=_eT.toDateString() +" "+_eT.toTimeString(); 
		
		var str="?1=1";
		str=str+"&eventName="+updEv.name;
		str=str+"&st="+stStr;
		str=str+"&et="+edStr;
		str=str+"&groupId="+updEv.group.groupId;
		str=str+"&eventId="+activeEvent.eventId;
		ajaxObj.call("action=updateeventfull"+str, function(eventobject){ jQuery("#defaultNewEventTemplate").hide(); ical.updateEvent(eventobject);});
	}
    /**
     Clicking delete in Preview window
     */
	 
	  $("#deleteApp").live("click",function(){
	 $(".message").removeClass("alert").html(" ");
	if(confirm("Are you sure you want to remove from list?")) {
	  var url = base_url+"bcalendar/checkfordelete";
	  $.ajax({
		data:{date:$("#date").html(),business_id:$("#business_id").html(),starttime:$("#time").html(),action:'reschedule'},
		url:url,
		type:'POST',
		success:function(data){  
		if(data==0){ 
		$(".message").addClass("alert").html("Cannot cancel the appointment now"); 
		return false;
		}else if(data==1){
		var str="?";
		str=str+"&type="+$("#type").html(); 
        str=str+"&postedclassid="+$("#services_id").html();		
		str=str+"&eventId="+$("#eventid").html(); 
		ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});	
		$("#reschedule").modal('hide');
		
		}
	 }
	  })
	 }
 
})
    // function rzDeleteEvent(event_id){ 	
		// var str="?";
		//str=str+"eventName="+activeEvent.name; 
		// str=str+"&eventId="+event_id;
		// ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});		
    // } 
    

    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {
	// alert($("#bookAppbtn").attr('data-val'));
	if(($("#bookAppbtn").attr('data-val'))){
	  $("#referal_url").val($("#bookAppbtn").attr('data-val'));
	  $("#referal_url").attr('href','');
	  //window.location='http://localhost/skedulus/home/clientlogin';
	}
	if ($('.form-appointment :checkbox:checked').length > 0){
       var newev = jQuery("#bookApp");
		//var _sT=new UTC(newev.find("#eventStartTime").val());
		//var _eT=new UTC(newev.find("#eventEndTime").val()); 
		var stStr=newev.find("#eventStartDate").val() +" "+newev.find("#eventStartTime").val();
		var edStr=newev.find("#eventStartDate").val() +" "+newev.find("#eventEndTime").val();  
		//var newEventContainer = jQuery("#bookApp"); 
		//var strtTime=newEventContainer.find("#eventStartTime").val();
		//alert(strtTime);
		var str="?1=1";
		str=str+"&eventName="+newev.find("#eventName").val();
		str=str+"&employee_id="+newev.find(".staff").val();
		str=str+"&st="+stStr;
		str=str+"&et="+edStr;
		
		var grp=newev.find(".eventGroup:checked").val();
			//alert(grp.length);
			//var id = "";
			var id = [];
			$(".eventGroup:checked").each(function() {
				var checked = $(this).val();
				//id = id + checked +"," ;  
				id.push($(this).val());
			});
			var s = id.join(',');
			//alert(s);
			var grp = s;
		//str=str+"&groupId="+newev.group.groupId;
		str=str+"&groupId="+grp;
		str=str+"&user_id="+$("#login_id").html(); //alert(str);
		ajaxObj.call("action=createevent"+str, function(ev){ical.addEvent(ev);});
		$("#bookApp").removeClass("in");
		$("div[id=darker]").remove();
		location.reload();
	 }else{ 
	  $(".message").addClass("alert").html("Select atleast one service").css({"display":"block","margin":"0px"});
	
	  return false;
	 }
	
    } 
    /**
     * Onclick of Close in AddEvent Box.
     */
    function rzCloseAddEvent()
    {
        ical.closeAddEvent();
    }
    
    /**
     * Once page is loaded, invoke the Load Calendar Script.
     */ 
	var ajaxObj; 
	function startAjax() {
		ajaxObj = new XMLHTTP("<?php echo $INC_PATH;?>"+"mybic_server.php"); 
		// lets turn on debugging so we can see what we're sending and receiving
		ajaxObj.debug=0;  
	}   
    jQuery(document).ready(function()
    {  
	 	startAjax();
		drawCalendar(); 
	 	
		new Web2Cal.TimeControl(jQuery("#eventStartTime").get(0));
        new Web2Cal.TimeControl(jQuery("#eventEndTime").get(0), jQuery("#eventStartTime").get(0), {
            onTimeSelect: updateDateForTime,
            dateField: "eventEndDate"
        });
	/*$(".data").css("display","block");	
	$(".data").css("color","black");*/	
	
    });
	
	
</script>