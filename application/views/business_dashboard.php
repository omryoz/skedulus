<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
        <link type="text/css" rel="stylesheet" href="http://localhost/web2cal/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="http://localhost/web2cal/css/web2cal.css"> 
        <link type="text/css" rel="stylesheet" href="http://localhost/web2cal/css/vista/web2cal.css"> 		
		<link type="text/css" rel="stylesheet" href="http://localhost/web2cal/ext/css/ui-lightness/jquery-ui-1.8.1.custom.css"> 
		<script src="http://localhost/web2cal/ext/jquery-1.3.2.min.js"> </script> 
        <script src="http://localhost/web2cal/ext/jquery-ui-1.8.1.custom.min.js"> </script> 
        <script src="http://localhost/web2cal/js/Web2Cal-Basic-2.0-min.js">  </script>
        <script src="http://localhost/web2cal/js/web2cal.support.js">  </script>
        <script src="http://localhost/web2cal/js/web2cal.default.template.js">  </script> 
        <script src="http://localhost/web2cal/js/sampleData.js">  </script> 
		<script type="text/javascript" src="<?php echo base_url() ?>calendar/src/js/mybic.js"></script>
		
		<title>Web2Cal | Health Club Demo</title>
	</head>
	<body> 
	<?php 
		$INC_PATH='http://localhost/skedulus_svn/calendar/src/'; 	
	?>
		
		<!-- Container holds the calendar. -->
		<div id="calendarContainer" class="web2calvista">
		</div>

<!-- Calendar Preview Template -->
<div id="calendarEventPreview" class="calendarTemplate" style="width:330px;position:absolute; display:none; border: 1px solid #5A595A;">
    <div class="aPointer p-left">
        &nbsp;
    </div>
    <div class="header" style="text-align: center;">
        <strong><span style="font-size: 12pt;">${eventName}</span></strong>
    </div> 
    <table border="0" width="100%">
        <tbody>
            <tr>
                <td valign="top">
                    <span class="labelXSmall"><strong>Start</strong>: </span>
                    <span class="startTime">${formattedStartTime}</span>
                    <br/>
                    <span class="labelXSmall"><strong>End</strong>: </span>
                    <span class="startTime">${formattedEndTime}</span>
                </td>
                <td valign="top">
                    <span class="labelXSmall"><strong>Location</strong>: </span>
                    <span class="startTime">${location}</span>
                    <br/>
                    <span class="labelXSmall">Conducted By: </span>
                    <span class="startTime">${instructor}</span>
                </td>
            </tr>
            <tr>
                <td valign="top">
                    <span class="labelXSmall"><strong>Facility</strong>: </span>
                    <span class="startTime">${facility}</span>
                    <br/>
                    <span class="labelXSmall"><strong>Event </strong><strong>Type</strong>: </span>
                    <span class="startTime">${eventType}</span>
                </td>
                <td valign="top">
                    <span class="labelXSmall"><strong>Capacity</strong>: </span>
                    <span class="startTime">${capacity}</span>
                    <br/>
                    <span class="labelXSmall"><strong>Lead Days to Cancel</strong>: </span>
                    <span class="startTime">${leadDays}</span>
                </td>
            </tr>
            <tr>
                <td style="text-align: left;" colspan="2">
                    <span class="callabel labelXSmall"><strong>Description</strong>: </span>
                    <div class="EventDescription">
                        ${eventDesc}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <ul class="actions">
        <li>
            <a onclick="alert('Check editEvent.html to know more about editing events'); return false;" href="#">Edit Event</a>
        </li>
        <li>
            <a onclick="alert('To be implemented!'); return false;" href="#">Delete Event</a>
        </li>
        <li>
        </li>
    </ul>
</div>
<!-- New Event Template -->
<div id="calendarNewEvent" class="calendarTemplate" style="width: 370px;position:absolute; display:none; border: 1px solid #5A595A;">
    <div class="aPointer p-left " style="display: block; z-index: 2; "></div>
    <div class="header" style="text-align: center;">
        <span style="font-size: 12px;font-weight:bold;">Post New Class</span>
    </div>
    <div style="padding: 1px; padding-bottom: 40px; overflow: auto;">
        <table border="0" cellpadding="0" width="100%">  
            <tbody> 
				
				
					<tr height="40px;"> 
					  <td>
					    <div class="labelBlock"> Classes </div>
					      <select id="newGTFacility" class="inputboxblue" style="width:10em;">
						  <?php foreach($classes as $class){ ?>
					      	<option value="<?=$class['id']?>"><?=$class['name']?></option>
							<?php } ?>
					      </select>
						
					  </td>
					  
					  <td>
					   <div class="labelBlock"> Trainers</div>
						<select class="inputboxblue" id="trainer" style="width:10em;">
							<?php  foreach($staffs as $staff){ ?>
								<option value="<?=$staff->users_id?>"><?=$staff->first_name.' '.$staff->last_name?></option>
							<?php } ?>
						</select>
					  </td>
					</tr>

					<tr>
					  <td>
					     <div class="labelBlock">From Date</div>
					     <input type="text" class="inputboxblue" style="width:8em;" id="startDate">
					  </td>

					  <td>
					     <div class="labelBlock">To Date</div>
					     <input type="text" class="inputboxblue"   style="width:8em;" id="endDate">
					  </td>
					</tr>

					<tr>
					  <td>
					    <div class="labelBlock"> Start Time</div>

					     <input type="text" class="inputboxblue" style="width:8em;" id="startTime">
					  </td>
					  <td>
					    <div class="labelBlock"> End Time</div>
					     <input type="text" class="inputboxblue"  style="width:8em;" id="endTime">
					  </td>
					</tr>
					
					<tr> 
					  <td>
					    <div class="labelBlock"> Last date for enroll</div>
					    <input type="text" class="inputboxblue" style="width:8em;" id="endDateenrollment">
					  </td> 
					</tr>
					
					
					<tr> 
					  <td>
					    <div class="labelBlock"> Capacity</div>
					     <input type="text" class="inputboxblue" style="width:3em;" id="newCapacity">
					  </td> 
					</tr>
					
					<tr height="40px;"> 
					  <td>
					    <div class="labelBlock"> Repeat Type </div>
					      <select id="repeat" class="inputboxblue" style="width:10em;">
						  	<option value="daily">Daily</option>
							<option value="weekly">Weekly</option>
							<option value="monthly">Monthly</option>
						  </select>
					  </td>
					
            </tbody>
        </table>
			
	    <ul class="actions" style="position:absolute; width:100%;heigth:30px; bottom:0px;text-align:center;">
	        <li>
	            <a onclick="return createNewEvent();" class="websbutton" href="javascript:void(0)">Save Event</a>
	        </li>
	        <li>
	            <a  href="javascript:void(0)" class="websbutton"  onclick="return closeAddEvent();">Cancel</a>
	        </li>
	        <li>
	        </li>
	    </ul>
    </div>
</div>
<!-- END CALENDAR TEMPLATES -->
<script language="javascript" type="text/javascript"> 
    /** 
     * Click of Add in add event box
     */ 
	 
	 var ajaxObj; 
	function startAjax() {
		ajaxObj = new XMLHTTP("<?php echo $INC_PATH;?>"+"mybic_server.php"); 
		// lets turn on debugging so we can see what we're sending and receiving
		ajaxObj.debug=0;  
	}   
    $(document).ready(function()
    {  
		startAjax();
	});
	 
	function createNewEvent()
	{ 
        var newEventContainer = jQuery("#calendarNewEvent");
        var name = newEventContainer.find("#eventName").val();
		var capacity = newEventContainer.find("#newCapacity").val();
		var facilityId=newEventContainer.find("#newGTFacility").val();
		var trainerId=newEventContainer.find("#trainer").val(); 
		var newNotes=newEventContainer.find("#newNotes").val(); 
        var startTime = newEventContainer.find("#startTime").val();
        var endTime = newEventContainer.find("#endTime").val();
        var startDate = newEventContainer.find("#startDate").val();
        var endDate = newEventContainer.find("#endDate").val(); 
        var endenrolldate = newEventContainer.find("#endDateenrollment").val(); 
		var repeat = newEventContainer.find("#repeat").val();  	
		
		if (name == "") 
        {
            name = HtmlEncode("No Title");
        } 
        var allday=false;
		
		if(newNotes=="")
		newNotes=name;
		var start = getDateFromStrings(startDate, startTime);
        var end = getDateFromStrings(endDate, endTime);
		var str="?1=1";
		str=str+"&name="+name;
		str=str+"&startTime="+startTime;
		str=str+"&endTime="+endTime;
		str=str+"&startdate="+startDate;
		str=str+"&enddate="+endDate;
		//str=str+"&ed="+edStr;
		str=str+"&classId="+facilityId;
		//str=str+"&user_id="+$("#business_id").html();
		str=str+"&trainer_id="+trainerId;
		str=str+"&capacity="+capacity;
		str=str+"&last_date="+endenrolldate;
		str=str+"&repeat="+repeat;
		ajaxObj.call("action=postclass"+str, function(ev){ ical.addEvent(ev); });
        return false;
	} 
    /**
     Onclick of Close in AddEvent Box
     */ 
	function closeAddEvent()
	{
		ical.closeAddEvent();
		return false;
	}
	
	/**
	 * Build Web2Cal 
	 */
    var ical;
    function createCalendar()
    { 
        ical = new Web2Cal('calendarContainer', {
            loadEvents: 		loadCalendarEvents,
            onUpdateEvent: 		updateEvent,
            onNewEvent: 		onNewEvent,
            views: 				"day, month, week,  agenda", 
			controlHeight: 		"600px",
            showLeftNav: 		false,
            newEventTemplate: 	"calendarNewEvent",
			previewTemplate: 	"calendarEventPreview"
        }); 
        ical.build();
    }
    
    
    /**
     * Sets up the new event, date control / time control etc... 
     * 
     * @param {Object} newevt
     */
    function setupNewEvt(newevt)
    {
        newevt.find("#startDate").datepicker();        
        newevt.find("#endDate").datepicker();
		 newevt.find("#endDateenrollment").datepicker(); 	
        newevt.find("#recurrenceRuleEndTimeDate").datepicker();
		
        var alldaybox = newevt.find("#allDayEvent").get(0);
        if (alldaybox) 
        {
            alldaybox.onclick = function()
            {
                if (this.checked) 
                {
                    newevt.find("#startTime").attr("disabled", true).val("");
                    newevt.find("#endTime").attr("disabled", true).val("");
                }
                else 
                {
                    newevt.find("#startTime").attr("disabled", false).val("12:00 am");
                    newevt.find("#endTime").attr("disabled", false).val("12:00 am");
                    
                };
             };
        }
        new Web2Cal.TimeControl(newevt.find("#startTime").get(0));
        new Web2Cal.TimeControl(newevt.find("#endTime").get(0), newevt.find("#startTime").get(0));
        
    }
    
    
    /**
     * Method invoked on creating a new event. 
     * 
     * 
     * @param {Object} obj - Object containing event time and date
     * @param {Object} newevt - New Event jQuery object
     * @param {Object} params - Parameters
     * @param {Object} groups - Groups
     * @param {Object} allday - All day indicator
     */
    function onNewEvent(obj, groups, allday)
    {
		var newevt=jQuery("#calendarNewEvent");
        var st = new UTC(obj.startTime);
        var ed = new UTC(obj.endTime);
        newevt.find("#eventDesc").val("").end()
		.find("#eventName").val("").focus().end()
		.find("#startDate").val(st.toJustDateString()).end()
		.find("#endDate").val(ed.toJustDateString()).end() 
        
        if (allday) 
        {
            newevt.find("#dfltPlgnallDayEvent").attr("checked", true);
            newevt.find("#startTime").val("").end().find("#endTimeTxt").val("");
        }
        else 
        {
            newevt.find("#dfltPlgnallDayEvent").attr("checked", false);
            newevt.find("#startTime").val(st.toNiceTime());
            newevt.find("#endTime").val(ed.toNiceTime()); 
        }
        
        var groupDD = newevt.find("#dfltPlgngroupSelectDD").get(0);
        removeAllOptions(groupDD);
        var self = this;
        for (var g in groups) 
        {
            if (!groups.hasOwnProperty(g)) 
                continue;
            var gId = groups[g].groupId;
            addOption(groupDD, groups[g].groupName, groups[g].groupId, false);
        }  
    }
	/**
	 * Updates event in DB. 
	 * After updating call ical.updateEvent to reflect the updated info in calendar
	 * @param {Object} event
	 */
    function updateEvent(event)
    {
		   ical.updateEvent(event);
    }
    
    /**
     * Utility function to create one event.
     * 
     * @param {Object} name
     * @param {Object} id
     * @param {Object} location
     * @param {Object} instructor
     * @param {Object} timestart
     * @param {Object} timeend
     * @param {Object} desc
     * @param {Object} allDay
     * @param {Object} publishStatus
     * @param {Object} capacity
     * @param {Object} eventType
     * @param {Object} leadDays
     * @param {Object} trainersArr
     * @param {Object} registeredMembersArr
     * @param {Object} repeatObject
     */      				
	function createHealthClubEvent(name, id, location, instructor, timestart, timeend, desc, allDay, 
							 publishStatus, capacity,eventType, leadDays, trainersArr, registeredMembersArr,repeatObject)
	{
	
	    if (allDay == undefined) 
	        allDay = false;
	    
	    return {
	        name: name,
	        eventId: id,
	        facility: location,
	        instructor: instructor,
	        startTime: timestart.getDateObj(),
	        endTime: timeend.getDateObj(),
	        eventDesc: desc,
	        allDay: allDay,
			
			publishStatus: publishStatus,
			capacity: capacity,
			eventType: eventType,
			leadDays: leadDays,
			trainers: trainersArr,
			registeredMembers: registeredMembersArr,		
			
	        repeatEvent: repeatObject
	    };
		 
	}
  	/**
  	 * Function to return data for the calendar. 
  	 * @param {Object} startTime
  	 * @param {Object} endTime
  	 */
    function loadCalendarEvents(startTime, endTime)
    {
		ajaxObj.call("action=getclasses", function(list){ ical.render(list); });
		/*var d = new Array();
	    var events = new Array(); 
	    events.push(createHealthClubEvent("Yoga Training", 1, "yoga aud", "John Smith", createDateTime(23, 0,-1), createDateTime(23, 30,1), "Yoga is good for health", true, 
		  "PENDING", 20, "PT", "2", [], [] ));
	    events.push(createHealthClubEvent("Spanning Many days", 2, "yoga aud", "John Smith", createDateTime(23, 0, -13), createDateTime(23, 30, -8), "Yoga is good for health", true,   "PENDING", 20, "PT", "2", [], []));
	    events.push(createHealthClubEvent("Spanning Many days", 3, "yoga aud", "John Smith", createDateTime(23, 0, -4), createDateTime(23, 30, 0), "Yoga is good for health", true,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Spanning Many days", 5, "yoga aud", "John Smith", createDateTime(23, 0, -4), createDateTime(23, 30, 1), "Yoga is good for health", true,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Just another Event", 6, "yoga aud", "John Smith", createDateTime(23, 0, -18), createDateTime(23, 30, -18), "Yoga is good for health", true,   "PENDING", 20, "PT", "2", [], []));
		 	 
	    events.push(createHealthClubEvent("Event 100", 7, "yoga aud", "John Smith", createDateTime(3, 0, -1), createDateTime(7, 30, -1), "Yoga is good for health", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 200",8, "yoga aud", "John Smith", createDateTime(5, 0, 1), createDateTime(8, 30, 1), "Yoga is good for health", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 300", 9, "yoga aud", "John Smith", createDateTime(9, 0, 2), createDateTime(12, 30, 2), "Yoga is good for health", false,   "PENDING", 20, "PT", "2", [], []));
	     
	    var group = {
	        name: "Gym 1",
	        groupId: "100",
	        events: events
	    };
	    d.push(group);
	    
	    var events = new Array();
	    events.push(createHealthClubEvent("Morning Yoga", 10, "Yoga Auditorium", "Instructor1", createDateTime(15, 0, 1), createDateTime(19, 30, 1), "Morning Yoga is good for health", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 2", 11, "Event Location 2", "Instructor2", createDateTime(8, 0, -1), createDateTime(10, 30, -1), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 3", 12, "Event Location 3", "Instructor3", createDateTime(11, 0), createDateTime(12, 0), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 4", 13, "Event Location 4", "Instructor4", createDateTime(6, 0), createDateTime(10, 0), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 5", 14, "Event Location 5", "Instructor5", createDateTime(7, 0), createDateTime(10, 0), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 6", 15, "Event Location 6", "Instructor6", createDateTime(16, 0, -2), createDateTime(20, 0,-2), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	 	events.push(createHealthClubEvent("Event 7", 16, "Event Location 7", "Instructor7", createDateTime(10, 0, -3), createDateTime(15, 0,-3), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	    events.push(createHealthClubEvent("Event 8", 17, "Event Location 8", "Instructor8", createDateTime(9, 0, -5), createDateTime(11, 15,-5), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	 	events.push(createHealthClubEvent("Event 9", 18, "Event Location 9", "Instructor9", createDateTime(9, 0, 1), createDateTime(11, 15,1), "Event Description ...", false,   "PENDING", 20, "PT", "2", [], []));	 
	 	  var group = {
	        name: "Gym 2",
	        groupId: "200",
	        events: events
	    };
	    d.push(group);
	    
	    events = new Array();
	    events.push(createHealthClubEvent("Aqua Lessons", 3104, "Swim Pool 1", "Rob", createDateTime(11, 0, -2), createDateTime(15, 30, -2), "Spinning is good for health"));
	     
        ical.render(d);*/
		ajaxObj.call("action=getevents", function(list){ical.render(list);});
    }
    
   
    /**
     Provide implementation for these methods.
     */
    /**
     Click on Edit Button
     */
    function rzEditEvent()
    {
        alert("editing");
    }
    
    /**
     Clicking delete in Preview box
     */
    function rzDeleteEvent()
    {
        alert("Delete Event in DB and invoke ical.deleteEvent({eventId: id})");
    }
    
	/**
	 * Local list of products, these are loaded into the products drop down.
	 * 
	 */
	var productsArr={
		"obj1":{desc: "Relaxing massage class with our well trained masseuse", leadDays: "0 Days", minAge:14, memRequired:"Yes", capacity:1, waitSize:"N/A"}			
		,"obj2":{desc: "Aqua workout", leadDays: "1 Days", minAge:18, memRequired:"Yes", capacity:14, waitSize:"10"}			
		,"obj3":{desc: "Cardio Cross Training", leadDays: "1 Days", minAge:18, memRequired:"Yes", capacity:14, waitSize:"10"}			
	};
	/**
	 * Function displays information for the selected product
	 * @param {Object} obj - select box
	 */
	function loadOtherDetails(obj)
	{
		var svalue = obj.value;
		var x = productsArr[svalue];
		if (svalue == "") 
		{
			x = {
				desc: "",
				leadDays: "",
				minAge: "",
				memRequired: "",
				capacity: "",
				waitSize: ""
			};
			jQuery("#productInfo").hide();
		}
		else{
			
			jQuery("#productInfo").show();
		} 
		if (x) 
		{
			var newevt = jQuery("#gmCalendarNewEvent"); 
			
			// blank out the other values
			newevt.find("#newMembershipRequiredSpan").html(x.memRequired);
			newevt.find("#newMembershipRequiredImg").attr("src", "images/empty.gif");
			newevt.find("#newAgeLimitSpan").html(x.minAge);
			
			newevt.find("#newEventDescDiv").html(x.desc);
			newevt.find("#newCapacity").val(x.capacity);
			newevt.find("#newLeadDaysToCancelSpan").html(x.leadDays);
			
			newevt.find("#newWaitSizeLimit").html(x.waitSize);
		}
	}
     
    
	/**
	 * Create the calendar when document is loaded.
	 */
    jQuery(document).ready(function()
    {		
        createCalendar();
		setupNewEvt(jQuery("#calendarNewEvent"));
		
    });
	
</script>

		
	</body>
</html>
