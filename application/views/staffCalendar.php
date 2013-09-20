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
	
@session_start();
//print_r($staff_details);

if(!isset($this->session->userdata['id'])){
 redirect('home/clientlogin');
}
 

?>
<div class="content container">
		<div class="row-fluid business_profile">
		<?php //print_r($this->session->userdata['profileid']);?>
<h3><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($staff_details[0]->user_business_details_id) ?>"><?php (!empty($staff_details))?print_r($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';?></a></h3>		
<div id="calendarContainer" ></div>
<input type="hidden" name="staffid" id="staffid" value="<?php print_r($staff_details[0]->users_id); ?>">
<input type="hidden" name="businessid" id="businessid" value="<?php print_r($staff_details[0]->user_business_details_id); ?>" >

<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
	
</div>
</div>
  </div>
</div>

<div id="bookApp" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >	
								<div class="aPointer  " style="display: block; z-index: 2; " ></div> 	
								<div class="acalclosebtn topright closeNewEvent"></div>	
								<div class="header" >	
								<h3 class="appoint-heading"> 	Book Appointment	 
								<a href="javascript:;" name="Close"  class="close" data-dismiss="modal" aria-hidden="true"> &times;  </a> </h3>
								</div>	
								<div style="padding:20px;">	
								<table cellpadding="0"  width="100%">		
									<tr>	
										<td valign="top">							
								<div>	
								<form class="form-horizontal form-appointment"><div class="control-group"><label class="control-label">Service</label><div class="controls"><div class="selectGroup"><p id="checkbox"><p></div></div>
							  <div class="control-group"><label class="control-label">Note</label><div class="controls"><textarea  class="inputbox" rows="2" cols="10" name="eventName" id="eventName"></textarea></div></div>
							
							  
							
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
											</div>		 	
										</div>	
										</td>	
									</tr>	
								</table>   	
										<ul class="actions">
											<li id="addEventBtn"> <a href="javascript:rzAddEvent();" name="edit" class="btn btn-success pull-right"> Book </a> </li>
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
		activeEvent=dataObj;
		ical.showPreview(evt, html);
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
	    var str="?"; 		
		str=str+"&staffid="+$("#staffid").val();
		str=str+"&businessid="+$("#businessid").val(); 
		ajaxObj.call("action=getStaffevents"+str, function(list){ical.render(list);});
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
    function rzDeleteEvent(event_id){ 	
		var str="?";
		//str=str+"eventName="+activeEvent.name; 
		str=str+"&eventId="+event_id;
		ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});		
    } 
    
    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {
	<?php //if(isset($_SESSION['id'])) { ?>
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
			var s = id.join(', ');
			//alert(s);
			var grp = s;
		//str=str+"&groupId="+newev.group.groupId;
		str=str+"&groupId="+grp;
		str=str+"&user_id="+$("#login_id").html(); 
		ajaxObj.call("action=createevent"+str, function(ev){ical.addEvent(ev);});
		$("#bookApp").removeClass("in");
		$("div[id=darker]").remove();
		<?php //}else{?>
		//window.location.href=baseUrl+'home/';
		<?php //} ?>
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