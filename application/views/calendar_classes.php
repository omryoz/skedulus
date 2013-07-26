<!---For calendar----->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/web2cal.css"> 
        <script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script> 
        <script src="<?php echo base_url() ?>calendar/js/Web2Cal-Basic-2.0-min.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.support.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.default.template_classes.js">  </script> 
		<script type="text/javascript" src="<?php echo base_url() ?>calendar/src/js/mybic.js"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/ext/css/ui-lightness/jquery-ui-1.8.1.custom.css"> 
		<script src="<?php echo base_url() ?>calendar/ext/jquery-ui-1.8.1.custom.min.js"></script> 
<!---End--------------->
<?php 
    $INC_PATH=base_url().'calendar/src/'; 
?>
<?php 
// if(isset($this->session->userdata['profile_id'])){
		  // $id=$this->session->userdata('profile_id');
		// }else if(isset($this->session->userdata['business_id'])){
		  // $id=$this->session->userdata('business_id');
		// }
@session_start();
$_SESSION['profileid'] = $buisness_details[0]->id;
if(!isset($this->session->userdata['id'])){
 redirect('home/clientlogin');
}

?>
<div class="content container">
<div class="row-fluid business_profile">
<h3>Buisness Profile Classes(<?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?>)</h3>		
	
<div id="calendarContainer" ></div>
<p class="hide" id="login_id"><?php print_r($_SESSION['profileid']); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>	
	
</div>
</div>
  </div>
</div>

<!--<p id="Demo">Demosas<p>-->


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
					      <select id="newGTFacility" class="eventGroup" style="width:10em;">
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
					</tr>
					
					
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

<script>

 $("#repeat_type").live("change",function(){
   //alert($(this).val());
   if($(this).val()=='weekly'){
   $("#weeks").css("display",'block');
   $("#months").css("display",'none');
   }
   if($(this).val()=='monthly'){
   $("#months").css("display",'block');
    $("#weeks").css("display",'none');
	}
   if($(this).val()=='daily'){
   $("#months").css("display",'none');
   $("#weeks").css("display",'none');
   }
   
 })
 

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
			//newEventTemplate:"calendarNewEvent",
			showLeftNav: false,			
            views: "day, month, week, agenda"
        });
        ical.build();
    }
	

	
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
		str=str+"&repeat_type="+$("#repeat_type").val();
		str=str+"&checked="+myVar;
		str=str+"&tr_id="+trainer;
		
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
		alert(str);
		ajaxObj.call("action=postclass"+str, function(ev){ console.log(ev); ical.addEvent(ev); });
        return false;
	}
	
	function setupNewEvt(newevt)
    {
        newevt.find("#eventStartDate").datepicker();        
        newevt.find("#eventEndDate").datepicker();
		newevt.find("#enroll_last").datepicker(); 	
        newevt.find("#recurrenceRuleEndTimeDate").datepicker();
		
        /*var alldaybox = newevt.find("#allDayEvent").get(0);
        if (alldaybox) 
        {
            alldaybox.onclick = function()
            {
                if (this.checked) 
                {
                    newevt.find("#eventStartTime").attr("disabled", true).val("");
                    newevt.find("#eventEndTime").attr("disabled", true).val("");
                }
                else 
                {
                    newevt.find("#eventStartTime").attr("disabled", false).val("12:00 am");
                    newevt.find("#eventEndTime").attr("disabled", false).val("12:00 am");
                    
                };
             };
        }*/
        new Web2Cal.TimeControl(newevt.find("#eventStartTime").get(0));
        new Web2Cal.TimeControl(newevt.find("#eventEndTime").get(0), newevt.find("#eventStartTime").get(0));
        
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
		//console.log(groups);
		//alert(groups);
        Web2Cal.defaultPlugins.onNewEvent(obj, groups , allday); 
    }
    
    /**
     Method to get Events and display it in the calendar.
     If you need to make an asynchronous call, invoke ical.render in the callback method.
     @param startTime - Calendar Display Range start
     @para endTime - Calendar End Range end
     */
    function loadCalendarEvents(startTime, endTime)
    {   
	    var _sT=new UTC(startTime);
		var _eT=new UTC(endTime); 
		var stStr=_sT.toDateString();
		var edStr=_eT.toDateString(); 
	    var str="?1=1"; 
	    str=str+"&st="+stStr;
		str=str+"&et="+edStr;
		ajaxObj.call("action=getclasses"+str, function(list){ical.render(list);});
		//ajaxObj.call("action=getclasses", function(list){ical.render(list);});
    }  
    
    /*
     Click on Edit Button in preview window
     */
    function rzEditEvent(evId)
    {	
		//$(".header").html("Edit Class");
        var evObj=ical.getEventById(evId); 
		
		/*jQuery("#defaultNewEventTemplate").find("#eventName").val(evObj.eventName).end()
							.find("#eventGroup").val(evObj.groupId).end()
							.find("#eventStartTime").val(evObj._startTime.toNiceTime()).end()
							.find("#eventEndTime").val(evObj._endTime.toNiceTime()).end()
							.find("#eventStartDate").val(evObj._startTime.toStandardFormat()).end()
							.find("#eventEndDate").val(evObj._endTime.toStandardFormat()).end()
							.find("#addEventBtn").hide().end()
							.find("#updateEventBtn").show().end()
							//.find("#eventDescription").val(evObj.eventDesc).end()  ;*/
								
		
		
	var url = base_url+"bcalendar/getAllclasses";
	
	var business_id = $("#login_id").val();
	
	$.post(url,{business_id:business_id}, function(data){
		$("#eventGroup").html("");
		$.each(eval(data), function( key, value ) {
			var append_option = "<option id="+key+" value="+value.id+">"+value.name+"</option>";
			$("#eventGroup").append(append_option);
		});
	});
		
		jQuery("#defaultNewEventTemplate").find("#eventName").val(evObj.eventName).end()
							.find("#eventGroup").val(evObj.groupId).end()
							.find("#eventStartTime").val(evObj._startTime.toNiceTime()).end()
							.find("#eventEndTime").val(evObj._endTime.toNiceTime()).end()
							.find("#eventStartDate").val(evObj._startTime.toStandardFormat()).end()
							.find("#eventEndDate").val(evObj._endTime.toStandardFormat()).end()
							.find("#addEventBtn").hide().end()
							.find("#updateEventBtn").show().end();
		$(".event_id").html(evId); 
		ical.showEditEventTemplate(jQuery("#defaultNewEventTemplate"), evObj.eventId);
		ical.hidePreview();
    }
    
    function rzUpdateEvent()
	{ 
		var updEv = Web2Cal.defaultPlugins.getNewEventObject();
		var _sT=new UTC(updEv.startTime);
		var _eT=new UTC(updEv.endTime); 
		var str="?1=1";
		var trainer = $(".demo").val();
		str=str+"&class="+updEv.group.groupId;
		str=str+"&sd="+_sT.toDateString();
		str=str+"&ed="+_eT.toDateString();
		str=str+"&st="+_sT.toTimeString();
		str=str+"&et="+_eT.toTimeString();
		str=str+"&eden="+$("#enroll_last").val();
		str=str+"&repeat_type="+$("#repeat_type").val();
		str=str+"&tr_id="+trainer;
		var event_id = $(".event_id").html(); 
		str=str+"&event_id="+event_id;
		ajaxObj.call("action=updateclassesfull"+str, function(eventobject){ 
			jQuery("#defaultNewEventTemplate").hide(); 
			ical.updateEvent(eventobject);
		});
	}
    /**
     Clicking delete in Preview window
     */
    function rzDeleteEvent(event_id){ 	
		var str="?";
		//str=str+"eventName="+activeEvent.name; 
		str=str+"&eventId="+event_id;
		ajaxObj.call("action=deleteclass"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});		
    } 
    
    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {
	  // if(_sT.toDateString()>_eT.toDateString()){
	  // return false; 
	  // }else if($("#enroll_last").val()>_sT.toDateString()){
	  // return false; 
	  // }
	   window.location.href=base_url+'bcalendar/calendar_business';
       var newev = Web2Cal.defaultPlugins.getNewEventObject();
	   var myVar='';
	   if($("#repeat_type").val()=="weekly"){
	   $('.weekly:checkbox:checked').each(function(){
			myVar+=$(this).val()+",";;
	   });
	   }
	   if($("#repeat_type").val()=="monthly"){
	   $('.monthly:checkbox:checked').each(function(){
			myVar+=$(this).val()+",";;
	   });
	   }
	   
	  // alert(myVar);
		var _sT=new UTC(newev.startTime);
		var _eT=new UTC(newev.endTime); 
		var stStr=_sT.toDateString() +" "+_sT.toTimeString();
		var edStr=_eT.toDateString() +" "+_eT.toTimeString();  
		var str="?1=1";
		var trainer = $(".demo").val();
		var class_size=$("#class_size").val();
		str=str+"&class_size="+class_size; 
		str=str+"&class="+newev.group.groupId;
		str=str+"&sd="+_sT.toDateString();
		str=str+"&ed="+_eT.toDateString();
		str=str+"&st="+_sT.toTimeString();
		str=str+"&et="+_eT.toTimeString();
		str=str+"&eden="+$("#enroll_last").val();
		str=str+"&repeat_type="+$("#repeat_type").val();
		str=str+"&checked="+myVar;
		str=str+"&tr_id="+trainer;  alert(str);
		ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
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
	 	
		setupNewEvt(jQuery("#defaultNewEventTemplate"));
		
		new Web2Cal.TimeControl(jQuery("#eventStartTime").get(0));
        new Web2Cal.TimeControl(jQuery("#eventEndTime").get(0), jQuery("#eventStartTime").get(0), {
            onTimeSelect: updateDateForTime,
            dateField: "eventEndDate"
        });
	$(".data").css("display","block");	
	$(".data").css("color","black");	
	
    });
	
	
</script>