<link href='<?php echo base_url() ?>calendar/calendar.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>calendar/agendalist.css' rel='stylesheet' />
<link href='<?php echo base_url() ?>calendar/calendar.print.css' rel='stylesheet' media='print' />
<script src='<?php echo base_url() ?>calendar/lib/jquery-ui.custom.min.js'></script>
<script src='<?php echo base_url() ?>calendar/calendar_class.js'></script>
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
			minTime: <?php print_r($buisness_availability['start_time']) ?>,
	        maxTime: <?php print_r($buisness_availability['end_time']) ?>,
			allDaySlot: false,
			dayClick: dayclick,
			selectable: true,
			selectHelper: true,
			select: function(start, end, allDay) { 
			var d=new Date(start);
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
     var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year;
			$("#eventStartDate").val(date);
			//var date = new Date(start);
			var hour = d.getHours();
			var min = d.getMinutes();
			$(".eventStartTime1").val(hour+':'+min);
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
				text:'<table cellpadding="5px" border="1" style="margin-top:12px; margin-bottom:12px; color:#fff; font-size:.7em;"><tr><td><a  href="javascript:;" onclick="scheduleclass()" class="launchClass" style="color: #40454a !important; text-shadow: 0px 1px 1px #fff; font-size: 14px; font-weight: 600;">Post class</a></td></tr></table>',
			       },
				//content: $("#popup"),
				// content: '<table><tr><td><a  href="javascript:;" class="launch" >Book appointment</a></td>' +
               // '</tr><tr><td><a  href="javascript:busytime();" class="busytime" >Busy time</a></td></tr></table>',
				// content: {
					// text: randomContent,
					// title: {
						// text: 'Testing',
						// button: 'Close'
					// }
				// },
				show: {
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
				},
				hide: {
					fixed: true,
					delay: 300
				},
				events: {
				 render: function(event, api) {
                    $('.launch').click(function() {
                    //showbookappointment();
                   });
                }
					// hide: function () {
						// $(this).qtip('destroy');
					// }
				}
			}, jsevent);
		}
	});

	function onPreview(eventid){ 
	$("#apptype").val('editpostedclass');
	 var str=eventid;
	 if(str.charAt(0)!='c'){
	 $(".message").removeClass("alert").html(" ");
	 $("#editClass").modal("show");
	 $("#eventId").html(eventid);
	 showoptions(eventid);
	 }
	}
	function showoptions(eventid){
	  $.ajax({
	  url:base_url+"bcalendar/checkStatus",
	  data:{classID:eventid},
	  type:'POST',
	  success:function(data){
	   if(data==1){
	    $("#multiClass").hide();
		}else{
		$("#multiClass").show();
		}
	   
	  }
	 })
	}
	
	
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
		//var str="";
		var trainer = $(".demo").val();
		var class_size=$("#class_size").val(); 
		var url = base_url+'bcalendar/insertPostedClass';
		$.post(url,{repeatstatus:$("#repeatstatus").val(),class_size:class_size,classid:$("#eventGroup").val(),startdate:$("#StartDate").val(),enddate:$("#EndDate").val(),starttime:$(".timeslot").val(),endtime:$("#eventEndTime").val(),repeat_type:repeattype,checked:myVar,staff:trainer},function(data){ 
			window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		})
		
		}
    } 
	
	function rzUpdateEvent()
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
		//var str="";
		var trainer = $(".demo").val();
		var class_size=$("#class_size").val(); 
		var url = base_url+'bcalendar/editPostedClass';
		$.post(url,{repeatstatus:$("#repeatstatus").val(),class_size:class_size,classid:$("#eventGroup").val(),startdate:$("#StartDate").val(),enddate:$("#EndDate").val(),starttime:$(".timeslot").val(),endtime:$("#eventEndTime").val(),repeat_type:repeattype,checked:myVar,staff:trainer,seriesid:$("#postclass").attr("seriesid"),presentStatus:$("#postclass").attr("data-val"),eventid:$("#updateid").val(),oldeddate:$("#oldeddate").val(),oldstdate:$("#oldstdate").val()},function(data){  
			window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
		})
		
		}
    } 
 
 function rzDeleteEvent(){
	 apprise('Are you sure want to delete posted classes?', {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ deleteclass(); }else{ return false; } });	
	
  }  
  
  function deleteclass(){
       var url = base_url+'bcalendar/deletePostedClass';
       $.post(url,{presentStatus:$("#postclass").attr("data-val"),eventid:$("#updateid").val(),seriesid:$("#postclass").attr("seriesid"),startdate:$("#StartDate").val(),enddate:$("#EndDate").val()},function(data){
	    window.location.href=base_url+'bcalendar/calendar_business/'+$("#business_id").html();
	   });
  }
  
  
  function scheduleclass(){
  $("#apptype").attr('data-val','1');
  $("#apptype").val('postnewclass');
  $("#postclass").modal('show');
    //alert("here");
  }
</script>
<input type="hidden" name="count" value="0" id="count">
<input type="hidden" name="showmore" value="0" id="showmore">
<input type="hidden" name="showtype" value="upcoming" id="showtype">

