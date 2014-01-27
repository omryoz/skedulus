<!---For calendar----->
		<link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/optionalStyling.css"> 
        <link type="text/css" rel="stylesheet" href="<?php echo base_url() ?>calendar/css/web2cal.css"> 
        <?php /*?><script src="<?php echo base_url() ?>calendar/ext/jquery-1.3.2.min.js"> </script><?php */?> 
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
<h3><a   href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?></a></h3>		
	
<div id="calendarContainer" ></div>
<p class="hide" id="login_id"><?php print_r($_SESSION['profileid']); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>	
	
</div>
</div>
  </div>
</div>

<!--<p id="Demo">Demosas<p>-->


<div id="editClass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 id="myModalLabel"><?=(lang('Apps_bookedperclassbasis'))?>.</h4>
  </div>
  <div class="modal-body">
	<p id="eventId" class="hide"></p>
	<div class="row-fluid">
	
	<!---<button class="btn span6 clientlist" id="multiClass">All Classes</button>--->
    <button class="btn btn-success span6 clientlist" id="singleClass" ><?=(lang('Apps_viewdetails'))?></button>
	</div>
  </div>
</div>



<!-- New Event Template -->
<div id="postclass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="aPointer  " style="display: block; z-index: 2; "></div>
  <h3 id="addclass" class="appoint-heading"> <?=(lang('Apps_postclass'))?><button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 5px 6px 0px;">&times;</button></h3>
    <h3  id="updateclass" style="display:none" class="appoint-heading"><?=(lang('Apps_editclass'))?> <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 5px 6px 0px;">&times;</button></h3>
  

 <hr/>

		<div  style="padding:20px;">
		<table class="table table-striped class-table">
		<tbody>
		<div id="booksuccess" class="alert" style="display:none"></div>
		<tr> 
					  <td style="padding-right: 10px;">
					    <div class="labelBlock">  <?=(lang('Apps_classes'))?>: <span id="className"></span></div>	
					  </td>
					  <td>
					   <div class="labelBlock">  <?=(lang('Apps_trainers'))?>: <span id="trainers"></span></div>
					   <p class="hide event_id"></p>
					  </td>
		</tr>
		<tr>
					  <td>
					     <div class="labelBlock"> <?=(lang('Apps_date'))?>: <span id="StartDate"></span></div>
					  </td>
					  <td style="position:relative;">
					     <div class="labelBlock"><?=(lang('Apps_time'))?>: <span id="StartTime"></span></div>
					  </td>
		</tr>
		<tr> 
					  <td>
					    <div class="labelBlock">  <?=(lang('Apps_lastdateforenroll'))?>: <span id="lastdate"></span></div>
					  </td> 
					  <td>
					    <div class="labelBlock">  <?=(lang('Apps_capacity'))?>: <span id="class_size"></span></div>
					  </td> 
					</tr> 
		<tr> 
				<td>
					<div class="labelBlock">  <?=(lang('Apps_available'))?>: <span id="available"></span></div>
						</td> 
					<td>
						<textarea name="note" id="note" placeholder="<?=(lang('Apps_note'))?>" style=
						"width: 99%!important;"></textarea>
					  </td> 
					</tr> 
		</tbody>
		</table>
     
			
	    <ul class="unstyled inline pull-right">
	       <li>
		        <input type="hidden" name="updateid"  id="updateid" value="">
				<p class="hide" id="starttime"></p><p  class="hide" id="endtime"></p>
				<p id="business_id" class="hide"><?php echo $businessId; ?></p>
	            <a class="websbutton btn btn-success " href="javascript:;" id="bookClass" ><?=(lang('Apps_book'))?></a>
	        </li>
	    </ul>
    </div>

  
  
	

	</div>
<!-- END CALENDAR TEMPLATES -->
<script>
	$('#postclasstab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})
	    
</script>
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
			'readOnly':true,
			//newEventTemplate:"calendarNewEvent",
			showLeftNav: false,			
            views: "day,week, agenda"
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
        new Web2Cal.TimeControl(newevt.find("#eventStartTime").get(0));
        new Web2Cal.TimeControl(newevt.find("#eventEndTime").get(0), newevt.find("#eventStartTime").get(0));
        
    }
	
 	var activeEvent;
    function onPreview(evt, dataObj, html)
	{ 
	 $("#editClass").modal("show");
	 $("#eventId").html($(evt).attr('eventid'));
	 $.ajax({
	  url:base_url+"bcalendar/checkStatus",
	  data:{classID:$(evt).attr('eventid')},
	  type:'POST',
	  success:function(data){
	   if(data==1){
	    $("#multiClass").hide();
		}else{
		$("#multiClass").show();
		}
	   
	  }
	 })
		//activeEvent=dataObj;
		//ical.showPreview(evt, html);
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
    
	
	//function singleClass(){
	$("#singleClass").click(function(){ 
	   $("#booksuccess").hide();
	  var evId=$("#eventId").html();
	   $.ajax({
	   url:base_url+'bcalendar/getStaffClass',
	   data:{classid:evId},
	   type:'POST',
	   success:function(data){
	    //alert(data);
		$.each(eval(data),function( key, v ) {
		   $("#postclass").attr("data-val","single");
		   $("#postclass").modal("show");
		   $("#editClass").modal("hide");
           $("#update").show();$("#add").hide();
		   $("#updateid").val(evId);
		   $("#className").html(v.class);
		   if(v.instructor!='0')
			$("#trainers").html(v.instructor_firstname+' '+v.instructor_lastname);
		   $("#StartDate").html(v.start_date);
		   $("#StartTime").html(v.start_time);
		   $("#class_size").html(v.class_size);
		   $("#available").html(v.availability);
		   $("#lastdate").html(v.lastdate_enroll);
		   $("#starttime").html(v.start_time);
		   $("#endtime").html(v.end_time);
		   
		})
	   }
	  })
	   
	})
	
	
	
	
	
    function rzUpdateEvent()
	{  
		var str="?1=1";
		//var trainer = $(".demo").val();
		var class_size=$("#class_size").val();
		str=str+"&class_id="+$("#updateid").val(); 
		str=str+"&class_size="+class_size; 
		str=str+"&class="+$("#eventGroup").val();
		//str=str+"&sd="+$("#StartDate").val();
		//str=str+"&ed="+$("#EndDate").val();
		//str=str+"&st="+$("#StartTime").val();
		//str=str+"&et="+$("#eventEndTime").val();
		//str=str+"&eden="+$("#enroll_last").val();
		//str=str+"&repeat_type="+repeattype;
		//str=str+"&checked="+myVar;
		//str=str+"&tr_id="+trainer;   
		 //exit;
		
		
		 ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
		
		window.location.href=base_url+'bcalendar/calendar_business';
	
	
		
	}
    /**
     Clicking delete in Preview window
     */
    function rzDeleteEvent(){ 	
		var str="?";
		//str=str+"eventName="+activeEvent.name; 
		str=str+"&class_id="+$("#updateid").val();
		if($("#postclass").attr("data-val")=='single'){
		str=str+"&status=single";
		}else if($("#postclass").attr("data-val")=='multi'){
		 str=str+"&status=multi";
		 str=str+"&seriesid="+$("#postclass").attr("seriesid");
		}
		ajaxObj.call("action=deleteclass"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});
        window.location.href=base_url+'bcalendar/calendar_business';		
    } 
    
    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {	
      if($("#eventGroup").val()==""){
	  return false;
	  }else{
		
	   var myVar='';
	   var repeattype="daily";
	   if( $("#repeatstatus").val()=="Remove Repeat" && $("#repeat_type").val()=="weekly"){
	   repeattype="weekly";
	   myVar=$("#weeklist").val();
	   
	   }
	   if($("#repeatstatus").val()=="Remove Repeat" && $("#repeat_type").val()=="monthly"){
	   repeattype="monthly";
	    myVar=$("#monthlylist").val();
	   
	   } 
		var str="?1=1";
		var trainer = $(".demo").val();
		var class_size=$("#class_size").val();
		str=str+"&class_size="+class_size; 
		str=str+"&class="+$("#eventGroup").val();
		str=str+"&sd="+$("#StartDate").val();
		str=str+"&ed="+$("#EndDate").val();
		str=str+"&st="+$("#StartTime").val();
		str=str+"&et="+$("#eventEndTime").val();
		str=str+"&eden="+$("#enroll_last").val();
		str=str+"&repeat_type="+repeattype;
		str=str+"&checked="+myVar;
		str=str+"&tr_id="+trainer;  
		ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
		window.location.href=base_url+'bcalendar/calendar_business';
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