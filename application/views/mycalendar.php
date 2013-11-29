<!---For calendar----->
<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/web2cal.css"> 
        <?php /*?><script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script><?php */?> 
        <script src="<?php echo base_url() ?>calendar/js/Web2Cal-Basic-2.0-min.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.support.js">  </script>
        <script src="<?php echo base_url() ?>calendar/js/web2cal.default.template.myappointment.js">  </script> 
		<script type="text/javascript" src="<?php echo base_url() ?>calendar/src/js/mybic.js"></script> 
		
<!---End--------------->
<?php 
	
    $INC_PATH=base_url().'calendar/src/'; 
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
	<a  class="websbutton btn btn-success" id="deleteApp" href="javascript:;" >Cancel</a>
	<!---<button class="btn btn-danger clientlist confirm" id="delete" >Delete</button>--->
	</li>
	</ul>
    
	
	
	</div>
  </div>
</div>


<div class="content container">
		<div class="row-fluid business_profile">
			<h3><?=(lang('Apps_myappointments'))?></h3>		
			<div id="calendarContainer" class="calendar_aap"></div>
			<p class="hide" id="login_id"><?php print_r($user_id); ?></p>
			<p class="role hide"><?=(!empty($role))?$role:''?></p>
		<p id="Bstarttime" class="hide" ></p>
       <p id="Bendtime" class="hide"></p>
	   <p class="hide" id="user_id"><?php print_r($user_id); ?></p>
		</div>
</div>
   </div></div>
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
            views: "day, week, agenda",
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
		Appdetails($(evt).attr('eventid'));	
	}
	function Appdetails(eventid){
	   $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:eventid},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
			// $("#business_name").html(v.business_name);
			 $("#business_id").html(v.business_details_id);
			 $("#services_id").html(v.services_id);
			// if(v.e_first_name!="" || v.e_last_name!=""){
			// $("#name").html(v.e_first_name+" "+v.e_last_name);
			// }else{
			// $("#serviceprovider").css("display",'none');
			// }
			if(v.type=='class'){ 
			classDetails(eventid);
			 var type='Class';
			 $("#type").html(type);
			// $("#typeName").html(v.services);
			// $("#reschedulebtn").hide();
			// $("#date").html(v.date);
			// $("#time").html(v.time);
			// $("#endtime").html(v.endtime);
			 // $("#reschedule").modal('show');
			}else{
			serviceDetails(eventid);
			 $(".viewSchedule").hide();
			 var type='Services';
			 $("#type").html(type);
			// $("#typeName").html(v.services);
			
			// $("#employee_id").html(v.employee_id);
			// $("#note").html(v.note);
			// if(v.status=='active'){
			// $("#deleteApp").show();
			// $("#reschedulebtn").show();
			// }else{
			// $("#deleteApp").hide();
			// $("#reschedulebtn").hide();
			// }
			}
			
		  })
	   }
	   })
	   
	  
		//activeEvent=dataObj;
		//ical.showPreview(evt, html);
	}
	
	function serviceDetails(eventid){
		$("#eventId").val(eventid);
	   $(".titleAppointment").html("Reschedule an appointment");
	   $("#book").modal('show');
	}
	
	function classDetails(eventid){
       $("#schedule").val('1');	
		$("#updateid").val(eventid);
		$(".appoint-heading").html("Appointment details");
	    $("#postclass").modal("show");
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
	  // $("#deleteApp").live("click",function(){
	  // apprise('Are you sure want to cancel appointment?', {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ cancelApp(); }else{ return false; } });
	 
	 // })
	 
	 // function cancelApp(){
	   // var url = base_url+"bcalendar/checkfordelete";
	  // $.ajax({
		// data:{date:$("#date").html(),business_id:$("#business_id").html(),starttime:$("#time").html(),action:'reschedule'},
		// url:url,
		// type:'POST',
		// success:function(data){  
		// if(data==0){ 
		// $(".message").addClass("alert").html("Cannot cancel the appointment now"); 
		// return false;
		// }else if(data==1){
		// var str="?";
		// str=str+"&type="+$("#type").html(); 
        // str=str+"&postedclassid="+$("#services_id").html();		
		// str=str+"&eventId="+$("#eventid").html(); 
		// ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});	
		// $("#reschedule").modal('hide');
		
		// }
	 // }
	  // })
	 // }
	 
	 
    // function rzDeleteEvent(){ 	
		// var str="?";
		// str=str+"&eventId="+$("#eventId").html();
		// ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});	
		// $("#reschedule").modal('hide');
    // } 
    
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
<?php if($flag=='1'){
//include('include/modal_verifyphone');
?>
	<script>
		$(document).ready(function(){ 
			$('#verifyModal').modal('show');
			$("#verifyP").show();
			$("#getnumber").hide();
            $("#phonenumber").html(<?php echo $phonenumber ?>);			
		});
	</script>
<?php } ?>
<?php if($flag=='0'){
//include('include/modal_verifyphone');
?>
	<script>
		$(document).ready(function(){
		$('#verifyModal').modal('show');
		$("#verifyP").hide();
		$("#getnumber").show();
			//$('#getnumberModal').modal('show');
		});
	</script>
<?php } ?>
<?php include('include/popupmessages.php'); ?>