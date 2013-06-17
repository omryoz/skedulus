<!---For calendar----->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/web2cal.css"> 
        <script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script> 
        <script src="<?php echo base_url() ?>calendar/js/Web2Cal-Basic-2.0-min.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.support.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.default.template.myappointment.js">  </script> 
		<script type="text/javascript" src="<?php echo base_url() ?>calendar/src/js/mybic.js"></script> 
		
<!---End--------------->
<?php 
	 //print_r($buisness_details);
    
?>
<?php if(isset($this->session->userdata['profile_id'])){
		  $id=$this->session->userdata('profile_id');
		}else if(isset($this->session->userdata['business_id'])){
		  $id=$this->session->userdata('business_id');
		}
session_start();
//$_SESSION['profileid'] = $id;
//print_r($_SESSION);
?>
<h3>My Appointments</h3>		
<div id="calendarContainer"></div>
<p class="hide" id="login_id"><?php print_r($user_id); ?></p>
<p class="role hide"><?=(!empty($role))?$role:''?></p>
	
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
			//closeAddEvent : closeAddEvent,
            onUpdateEvent: updateEvent,
            onNewEvent: onNewEvent,  
			onPreview: onPreview, 
            views: "day, month, week, agenda",
			'readOnly':true
        });

		/*blockEvents = new BlockEvents(ical, { 
							//allowInRange: false,
							highlightRange: true
		}); */
		ical.build();
    }
	function closeAddEvent(){
		alert("Hello");
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
		var str="?1=1";
		str=str+"&id="+<?=$user_id?>;
		
		ajaxObj.call("action=getMyevents"+str, function(list){ical.render(list);});
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
        var newev = Web2Cal.defaultPlugins.getNewEventObject();

		var _sT=new UTC(newev.startTime);
		var _eT=new UTC(newev.endTime); 
		var stStr=_sT.toDateString() +" "+_sT.toTimeString();
		var edStr=_eT.toDateString() +" "+_eT.toTimeString();  
		
		var str="?1=1";
		str=str+"&eventName="+newev.name;
		str=str+"&st="+stStr;
		str=str+"&et="+edStr;
		str=str+"&groupId="+newev.group.groupId;
		str=str+"&user_id="+$("#login_id").html();
		ajaxObj.call("action=createevent"+str, function(ev){ical.addEvent(ev);});
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
		ajaxObj = new XMLHTTP("<?php echo $base_url;?>/calendar/src/"+"mybic_server.php"); 
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