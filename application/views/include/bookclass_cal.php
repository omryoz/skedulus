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
				<?php if($this->session->userdata['role']=='manager'){ ?>
				right: 'agendaWeek,agendaDay,agendaList'
				<?php }else{?>
				right: 'agendaWeek,agendaDay'
				<?php }?>
			},
			minTime: <?php print_r($buisness_availability['start_time']) ?>,
	        maxTime: <?php print_r($buisness_availability['end_time']) ?>,
			
			selectable: false,
			selectHelper: true,
			select: function(start, end, allDay) { 
			
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
        var url=base_url+'bcalendar/checkClassdate';
        $.post(url,{eventid:eventid},function(data){ //alert(data);
	     if(data==0){
		  apprise('Cannot book for past days', {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } });
		 }else{
		 
		 $("#eventId").html(eventid);
		 <?php if(isset($this->session->userdata['id'])){ ?>
		 $.ajax({
		  url:base_url+"bcalendar/checkVerify",
		  data:{classID:eventid},
		  type:'POST',
		  success:function(data){
		   if(data==1){
		     showClassdetails()
			//$("#editClass").modal("show");
			//$("#multiClass").hide();
			}else if(data==6){
		   $('#verifyModal').modal('show');
		   $("#closeVerify").attr("data-val","showCmodal");
		   $("#closeVerify").attr("bid",eventid);
		   $(".alert").hide();
			$("#key").val("");
			$("#updatePhone").val("");
			$("#verifyP").show();
			$("#getnumber").hide();
		  }else if(data==7){
			$('#verifyModal').modal('show');
			$("#closeVerify").attr("data-val","showCmodal");
			$("#closeVerify").attr("bid",eventid);
			$(".alert").hide();
			$("#key").val("");
			$("#updatePhone").val("");
			$("#verifyP").hide();
			$("#getnumber").show();
		  }
		   
		  }
		 })
		 <?php }else{?>
		  window.location.href=base_url+'businessProfile/redirectUrl/?url=<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>';
		 <?php }?>
		 }	
		 })
	}
	
	$("#closeVerify").click(function(){
	var action=$(this).attr('data-val');
	var url=base_url+'bcalendar/chckStatus';
	var data='';
	$.post(url,data,function(data){
	 if(data==1){
	 if(action=='showCmodal'){
		  $("#eventId").html($("#closeVerify").attr("bid"));
		  showClassdetails()
		  //$("#editClass").modal("show");
		  //$("#multiClass").hide();
		  }
		 
	 }

	 })
  })
  
	function showClassdetails(){
	   $("#note").val("");	
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
		   $(".perclassbasis").show();
		  // $("#editClass").modal("hide");
           $("#update").show();$("#add").hide();
		   $("#updateid").val(evId);
		   $("#className").html(v.class);
		   $("#employee_id").html(v.employee_id);
		   if(v.employee_id!='')
			$("#trainers").html(v.instructor_firstname+' '+v.instructor_lastname);
		   $("#StartDate").html(v.start_date);
		   $("#StartTime").html(v.start_time);
		   $("#class_size").html(v.class_size);
		   $("#available").html(v.availability);
		   $("#lastdate").html(v.lastdate_enroll);
		   $("#starttime").html(v.start_time);
		   $("#endtime").html(v.end_time);
		   if(v.availability==0){
		      $("#bookClass").hide();
		   }else{
		     $("#bookClass").show();
		   }
		})
	   }
	  })
	
	}
</script>
<input type="hidden" name="count" value="0" id="count">
<input type="hidden" name="showmore" value="0" id="showmore">
<input type="hidden" name="showtype" value="upcoming" id="showtype">
