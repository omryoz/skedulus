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
<h3 ><a style="color: #517fa4;" href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?></a></h3>		
	
<div id="calendarContainer" ></div>
<p class="hide" id="login_id"><?php print_r($_SESSION['profileid']); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>	
	
</div>
</div>
  </div>
</div>

<!--<p id="Demo">Demosas<p>-->


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
  <li class="active"><a href="#edit_class" id="addclass"><?=(lang('Apps_postclass'))?></a><a href="#edit_class" id="updateclass" style="display:none"><?=(lang('Apps_editclass'))?></a></li>
  <li><a href="#add_client"><?=(lang('Apps_clientlist'))?></a></li>
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
					   
						<p class="hide" id="business_id"><?php print_r($_SESSION['profileid']); ?></p>
					  </td>
					</tr>

					<tr>
					  <td>
					     <div class="labelBlock"><?=(lang('Apps_date'))?></div>
						 <input type="text" class=" date_picker" value="" id="StartDate" name='startdate'>
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
						<input type="text" class=" date_picker" value="" id="EndDate">
					  </td>
						<td>
							
			
						</td>
					</tr>
					<tr id="monthRep">
					    <td class="select-month">
						    
							 <div class="btn-toolbar"  id="months" style="display:none">
							  <div class="btn-group">
								<button class="btn month " type="button" name="monthly" value="1" id="m1">Jan</button>
								<button class="btn month "  type="button" name="monthly" value="2" id="m2">Feb</button>
								<button class="btn month " type="button" name="monthly" value="3" id="m3">Apr</button>
								<button class="btn month " type="button" name="monthly" value="4" id="m4">Mar</button>
								<button class="btn month " type="button" name="monthly" value="5" id="m5">May</button>
								<button class="btn month " type="button" name="monthly" value="6" id="m6">Jun</button>
								<button class="btn month " type="button" name="monthly" value="7" id="m7">Jul</button>
								<button class="btn month " type="button" name="monthly" value="8" id="m8">Aug</button>
								<button class="btn month " type="button" name="monthly" value="9" id="m9">Sep</button>
								<button class="btn month " type="button" name="monthly" value="10" id="m10">Oct</button>
								<button class="btn month " type="button" name="monthly" value="11" id="m11">Nov</button>
								<button class="btn month " type="button" name="monthly" value="12" id="m12">Dec</button>
								 <input type="hidden" name="monthlylist"  id="monthlylist" value="" >
								
							  </div>
							</div>
						</td>
					</tr>
					
					<tr id="weekRep">
					    <td class="select-day">
							 <div class="btn-toolbar"  id="weeks" style="display:none">
							  <div class="btn-group">
								<button class="btn weekly" type="button" name="week" value="1" id="w1">Mon</button>
								<button class="btn weekly" type="button" name="week" value="2" id="w2">Tue</button>
								<button class="btn weekly" type="button" name="week" value="3" id="w3">Wed</button>
								<button class="btn weekly" type="button" name="week" value="4" id="w4">Thu</button>
								<button class="btn weekly" type="button" name="week" value="5" id="w5">Fri</button>
								<button class="btn weekly" type="button" name="week" value="6" id="w6">Sat</button>
								<button class="btn weekly" type="button" name="week" value="7" id="w7">Sun</button>
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
				<div id="demo">
					<form class="form-horizontal" id="clientform">
						  <div class="control-group">
							<label class="control-label" for="inputEmail"><?=(lang('Apps_clientname'))?> </label>
							<div class="controls">
							  <input type="text"  class="input-large tags" name="name" id="name" required>
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
							  <button type="button" class="btn btn-success" id="removeClient" value="" appid="" style="display:none;">Remove from class</button>
							  <button type="button" class="btn btn-success" id="addClient"><?=(lang('Apps_done'))?></button>
							  <input type="hidden" name="users_id" id="users_id" >
							  <input type="hidden" name="actionVal" id="actionVal" value="">
							  <input type="hidden" name="bookbusiness" value="<?php print_r($buisness_details[0]->id); ?>">
							</div>
						  </div>
					</form>
				</div>	
			</div>
		</div>
			
  </div>
 
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
$("#eventGroup").live("change",function(){
$(".message").removeClass("alert").html(" ");
})

$("#repeat").click(function(){
 if($("#repeathtml").html()=="Add Repeat"){
 var removediv="Remove Repeat";
  $("#repeatdiv").show();
  if($('#repeat_type :selected').text()=="Weekly"){
     $("#weeks").css("display",'block');
     $("#months").css("display",'none');
  }else if($('#repeat_type :selected').text()=="Monthly"){
     $("#months").css("display",'block');
     $("#weeks").css("display",'none');
  }else if($('#repeat_type :selected').text()=="Daily"){
     $("#months").css("display",'none');
     $("#weeks").css("display",'none');
  }
 }else{
 var removediv="Add Repeat";
   $("#repeatdiv").hide();
   $("#weeks").css("display",'none');
   $("#months").css("display",'none');
 }
 $("#repeathtml").html(removediv);
 $("#repeatstatus").val(removediv);
})


 $("#repeat_type").on("change",function(){
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
 
 var myVar="";
 $(".weekly").click(function(e){  
 if($("#weeklist").val()!=""){
 myVar=$("#weeklist").val();
 }
  $(this).toggleClass("weekly active");
  if(jQuery.inArray($(this).val(),myVar) == -1){
  myVar+=$(this).val()+",";
  }else{
  myVar=removeValue(myVar,$(this).val()); // "1,3"
 }
  $("#weeklist").val(myVar);
 })

function removeValue(list, value) {  
  return list.replace(new RegExp(value + ',?'), '')
}


var myVarM=new Array(); 
$(".month").click(function(e){ 
var temp = new Array();
temp = $("#monthlylist").val().split(",");
if($("#monthlylist").val()!=""){
  myVarM=temp;
}
  $(this).toggleClass("month active"); 
  if(jQuery.inArray($(this).val(),myVarM) == -1){
  myVarM.push($(this).val());
  }else{
	myVarM.splice( myVarM.indexOf( $(this).val() ), 1 );
 }
  $("#monthlylist").val(myVarM);
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
            views: "day, week, agenda"
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
		//newevt.find("#enroll_last").datepicker(); 	
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
	 $(".message").removeClass("alert").html(" ");
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
	   var myVar='';
	   var repeattype="daily";
	   if( $("#repeatstatus").val()=="Remove Repeat" && $("#repeat_type").val()=="weekly"){
	   repeattype="weekly";
	   myVar=$("#weeklist").val();
	   // $('.weekly:checkbox:checked').each(function(){
			// myVar+=$(this).val()+",";;
	   // });
	   }
	   if($("#repeatstatus").val()=="Remove Repeat" && $("#repeat_type").val()=="monthly"){
	   repeattype="monthly";
	   myVar=$("#monthlylist").val();
	   // $('.monthly:checkbox:checked').each(function(){
			// myVar+=$(this).val()+",";;
	   // });
	   }
	   	   
	    
		var str="?1=1";
		var trainer = $(".demo").val();
		var class_size=$("#class_size").val();
		str=str+"&business_id="+$("#business_id").html();
		str=str+"&class_id="+$("#updateid").val(); 
		str=str+"&class_size="+class_size; 
		str=str+"&class="+$("#eventGroup").val();
		str=str+"&sd="+$("#StartDate").val();
		str=str+"&ed="+$("#EndDate").val();
		str=str+"&st="+$(".timeslot").val();
		str=str+"&et="+$("#eventEndTime").val();
		//str=str+"&eden="+$("#enroll_last").val();
		str=str+"&eden=";
		str=str+"&repeatstatus="+$("#repeatstatus").val();
		str=str+"&repeat_type="+repeattype;
		str=str+"&checked="+myVar;
		if(trainer!=''){
		str=str+"&tr_id="+trainer;
		}else{
		str=str+"&tr_id=0";
		}
		 //exit;
		
		if($("#postclass").attr("data-val")=='single'){  //alert(str);
		str=str+"&status=single";  
		str=str+"&seriesid="+$("#postclass").attr("seriesid");
		if($("#repeatstatus").val()=="Remove Repeat"){
        // $.ajax({
	        // url:base_url+'bcalendar/checkIfblocked',
		   // data:{date:$("#StartDate").val(),employee_id:$(".demo").val(),business_id:$("#business_id").html(),start_time:$(".timeslot").val()},
		   // type:'POST',
		   // success:function(data){ 
			//alert(data);
			// if(data==0){
			 // $(".message").addClass("alert").html("Selected time slot already blocked.Kindly choose another time slot");
			 // return false;
		  // }else{ 
		    // ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
			// window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		  // }
			
		   // }
	    // });		
		      ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
			 window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		}else{
		ajaxObj.call("action=updateclassesfull"+str, function(ev){ical.addEvent(ev);});
		window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		}
		}else if($("#postclass").attr("data-val")=='multi'){  
		 str=str+"&status=multi";
		 str=str+"&seriesid="+$("#postclass").attr("seriesid");  //alert(str);
		// ajaxObj.call("action=updateclassesfull"+str, function(ev){ical.addEvent(ev);});
		 ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
		 window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		}
		//window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
	}
    /**
     Clicking delete in Preview window
     */
    function rzDeleteEvent(){ 
   if(confirm("Are you sure you want to remove from list?")) {	
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
        window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();		
    } 
  }  
    /**
     * Click of Add in add event box.
     */
    function rzAddEvent()
    {	//alert($("#StartDate").val());
	  var todayDate= '<?php echo date("m/d/Y"); ?>';
	  var today=new Date(todayDate);
	  var start_date=new Date($("#StartDate").val());
	 // var last_date=new Date($("#enroll_last").val());
	
	 if($("#eventGroup").val()==""){
	   $(".message").addClass("alert").html("Select atleast one service");
	  return false;
	  }else if(start_date <= today){
	   $(".message").addClass("alert").html("Cannot post the classes for the past/todays date");
	   return false;
	  }else if($("#class_size").val()==''){
	   $(".message").addClass("alert").html("Class size is required");
	   return false;
	  }else {
		
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
		str=str+"&repeatstatus="+$("#repeatstatus").val(); 
		str=str+"&class_size="+class_size; 
		str=str+"&class="+$("#eventGroup").val();
		str=str+"&sd="+$("#StartDate").val();
		str=str+"&ed="+$("#EndDate").val();
		str=str+"&st="+$(".timeslot").val();
		str=str+"&et="+$("#eventEndTime").val();
		//str=str+"&eden="+$("#enroll_last").val();
		str=str+"&eden=";
		str=str+"&repeat_type="+repeattype;
		str=str+"&checked="+myVar;
		str=str+"&tr_id="+trainer;  //alert(str);
		ajaxObj.call("action=postclasses"+str, function(ev){ical.addEvent(ev);});
		window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		}
    } 
	
  
	
	
	// }
	//}
	
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
	
	
//function editclient(userid){ 


//}	

	$(".showform").click(function(){ //alert("form");
	 $("#clientform")[0].reset();
	 $(".message").removeClass("alert").html(""); 
	 $("#removeClient").hide();
	 //$(".client-form").show();
	})

	
	
	$(function() {
	var availableTags = '';
	$.ajax({
	url:base_url+'bcalendar/getClientsList',
	//data:{businessid:'47'},
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
  });

</script>