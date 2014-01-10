<link href='<?php echo base_url() ?>calendar/calendar.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>calendar/agendalist.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>calendar/calendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url() ?>calendar/lib/jquery-ui.custom.min.js'></script>
<script src='<?php echo base_url() ?>calendar/calendar.js'></script>
<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>calendar/qtip/jquery.qtip.css">
<!--<script type="text/javascript" src="<?php echo base_url() ?>calendar/qtip/qtp_old.js"></script>-->
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
				<?php if($this->session->userdata['role']=='manager'){ ?>
				right: 'agendaWeek,agendaDay,agendaList'
				<?php }else{?>
				right: 'agendaWeek,agendaDay'
				<?php }?>
			},
			minTime: <?php print_r($buisness_availability['start_time']) ?>,
	        maxTime: <?php print_r($buisness_availability['end_time']) ?>,
			allDaySlot: false,
			dayClick: dayclick,
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) { 
			//$("#bookapp").modal('show');
			$("#eventStartDate").val(start);
			var date = new Date(start);
			var hour = date.getHours();
			var min = date.getMinutes();
			$("#eventStartTime").val(hour+':'+min);
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
		function dayclick(date, allday, jsevent) {
			var randomContent = new Date().valueOf().toString();
			$(this).qtip({
				overwrite: true,
				content: {
						//text: $("#popup"),
						<?php if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){?>
						text:'<table cellpadding="5px" border="1" style="margin-top:12px; margin-bottom:12px; color:#fff; font-size:.7em;"><tr><td><a  href="javascript:;" onclick="showdiv()" class="launch" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">Book appointment</a></td></tr><tr><td><a  href="javascript:busytime()" class="launch" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">Busy time</a></td></tr>',
						<?php }else{?>
						text:'<table cellpadding="5px" border="1" style="margin-top:12px; margin-bottom:12px; color:#fff; font-size:.7em;"><tr><td><a  href="javascript:;" onclick="showdiv()" class="launch" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">Book appointment</a></td></tr>',
						<?php } ?>
						// text: '',
						 // ajax: {
						  // url: base_url+"bcalendar/showdiv",
						  // type: 'POST',
						  // data: '',
						  
						  // success: function(data) {
						   // this.set('content.text', data);
							
						  // }
						// }
			       },
				
				show: {
					when: { target: false, event: 'click mouseover' },
					solo: true,
					event: 'click',
					ready: true
				},
				style: {
					tip: true
				},
				position: {
					viewport: $(window),
					target: 'mouse',
					my: 'bottom center',
					at: 'top center',
					adjust: {
						mouse: false
					}
					
					/*corner: {
						target: 'topMiddle',
						tooltip: 'bottomMiddle'
					}
					target: false,
					adjust:{
					y:-event.pageY
					}*/
				},
				hide: {
					fixed: true,
					delay: 300
				},
				events: {
				 render: function(event, api) {
                   
                  }
					// hide: function () {
						// $(this).qtip('destroy');
					// }
				}
			}, jsevent);
		}
	});

	function onPreview(eventid) 
	{ 
	$("#apptype").val('rescheduleapp');
	var str=eventid;
	if(str.charAt(0)!='c'){
	  var url = base_url+"bcalendar/checkbusytime";
	  $.post(url,{evid:eventid}, function(data){
	    if(data==-1){
		Appdetails(eventid);
		}else{
		 if(data==0){
		  $('.busytype').val(eventid);
		  $("#editbusytime").modal('show');
		 }else{
		  $('.busytype').val(eventid);
		  getsinglebusytime();
		 }
		}
	  })
     }	  
	}
	
	function Appdetails(eventid){
		if($("#userrole").val()=='manager'){
	   $(".message").removeClass("alert").html(" ");
	   $("#eventid").html(eventid);
	   $("#eventId").val(eventid);
	  // $("#reschedule").modal('show');
	  $(".titleAppointment").html("Reschedule an appointment");
	  $(".viewSchedule").hide();
	   $("#book").modal('show');
		//activeEvent=dataObj;
		//ical.showPreview(evt, html);
		}
	}
	
	function showdiv(){
	$("#selectedService").val("");
    $(".viewSchedule").hide();
	$(".titleAppointment").html(bookappointment);
    $(".message").removeClass("alert").html(" ");
	var businessid = $("#profileid").html();
	var staffid='';
	if($("#staffsid").val()!=''){
	    //$(".time").attr('staff','1');
	  var staffid=$("#staffsid").val();
	}
     var d=new Date($("#eventStartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
     var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year;
	 var  timeslot=$("#eventStartTime").val(); 
	 var url=base_url+"bcalendar/checkfordate";
    $.post(url,{date:date,business_id:businessid,staffid:staffid},function(data){
	 if(data==-1){
	 apprise(nonworkingday, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } });
	 // alert("Its a non working day.Kindly book on another day");
	 }else if(data==0){
	 apprise(pastdates, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } });
	  //alert("Cannot book for past days");
	 }else if(data==-2){
	 apprise(cannotbookfutureappointment, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } });
	  //alert("Cannot book for past days");
	 }else if(data==-3){
	 window.location.href=base_url+'businessProfile/redirectUrl/?url='+$("#redirecturl").val();
	 }else if(data==6){
	   $('#verifyModal').modal('show');
	   $("#closeVerify").attr("data-val","showmodal");
	   $("#closeVerify").attr("date-time",$("#eventStartTime").val());
	   $("#closeVerify").attr("date",date);
	   $("#closeVerify").attr("bid",businessid);
	   $(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$("#verifyP").show();
		$("#getnumber").hide();
	 }else if(data==7){
	    $("#closeVerify").attr("data-val","showmodal");
		$("#closeVerify").attr("date-time",$("#eventStartTime").val());
	    $("#closeVerify").attr("date",date);
	    $("#closeVerify").attr("bid",businessid);
	    $('#verifyModal').modal('show');
		$(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$("#verifyP").hide();
		$("#getnumber").show();
	 }else{
	$("#apptype").val('booknewapp');
	 $("#book").modal('show');
     //showbookpopup(date,timeslot,businessid);
	 //}
	   
	 }
	})
	}
</script>
<input type="hidden" name="count" value="0" id="count">
<input type="hidden" name="showmore" value="0" id="showmore">
<input type="hidden" name="showtype" value="upcoming" id="showtype">

<input type="hidden" name="pastcount" value="0" id="pastcount">


