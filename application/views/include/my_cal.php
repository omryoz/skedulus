<link href='<?php echo base_url() ?>calendar/calendar.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>calendar/agendalist.css' rel='stylesheet' />
<script src='<?php echo base_url() ?>calendar/lib/jquery-ui.custom.min.js'></script>
<script src='<?php echo base_url() ?>calendar/calendar.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>calendar/qtip/jquery.qtip.css">
<script type="text/javascript" src="<?php echo base_url() ?>calendar/qtip/jquery.qtip.js"></script>
<script>
	$(document).ready(function() {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		var calendar = $('#calendar').skCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'agendaWeek,agendaDay,agendaList'
			},
			minTime: '7',
	        maxTime: '24',
			allDaySlot: false,
			//dayClick: dayclick,
			selectable: false,
			selectHelper: true,
			select: function(start, end, allDay) { 
			
			// $("#eventStartDate").val(start);
			// var date = new Date(start);
			// var hour = date.getHours();
			// var min = date.getMinutes();
			// $("#eventStartTime").val(hour+':'+min);
				//calendar.skCalendar('unselect');
			},
			editable: true,
			
			eventClick: function(event) { 
			//alert(event.id);	
			onPreview(event.id);
           },
			events: 
			[
				<?php print_r($appointments); ?>
				
			],
			<?php if($this->session->userdata('language')=='hebrew'){ ?>
			isRTL : true
			<?php }else{?>
			isRTL : false
			<?php }?>
		});
		
	});

	function onPreview(eventid) 
	{ 
       $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:eventid},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
			 $("#business_id").html(v.business_details_id);
			 $("#services_id").html(v.services_id);
			if(v.type=='class'){ 
			classDetails(eventid);
			 var type='Class';
			 $("#type").html(type);
			}else{
			serviceDetails(eventid);
			 $(".viewSchedule").hide();
			 var type='Services';
			 $("#type").html(type);
			}
			
		  })
	   }
	   })
	}
	
	function classDetails(eventid){
       $("#schedule").val('1');	
		$("#updateid").val(eventid);
		$(".appoint-heading").html(appdetails);
		$(".perclassbasis").hide();
	    $("#postclass").modal("show");
	}
	
	function serviceDetails(eventid){
	  $("#apptype").val('rescheduleapp');
	  $("#eventId").val(eventid);
	  $(".titleAppointment").html(appsreschedule);
	  $("#book").modal('show');
	}
</script>
<input type="hidden" name="count" value="0" id="count">
<input type="hidden" name="showmore" value="0" id="showmore">
<input type="hidden" name="showtype" value="upcoming" id="showtype">
<input type="hidden" name="pastcount" value="0" id="pastcount">


<input type="hidden" name="headcount" value="1" id="headcount">
<input type="hidden" name="lasthead" value="" id="lasthead">

