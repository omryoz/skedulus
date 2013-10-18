/* 
	Author:Eulogik 
	Programmer :  Swathi,Rakesh
	Designer :  Pankaj
*/



//Global variable 
//var base_url = "http://dev.eulogik.com/skedulus/";
var base_url = "http://localhost/skedulus/";
	
$('.tool').tooltip('hide')


	

function bookService(serviceid){ 
	var business_id = $("#business_id").html();
	$(".services").html("");
	getservices(business_id,serviceid);
}

$(document).ready(function(){
$(".dropdown-menu li").live("click",function(e) {
       e.stopPropagation();
   });
$(".book_me").live("click",function(){  
    $(".time").attr('action','schedule');
	//$(".time").attr('staff','0');
    $(".message").removeClass("alert").html(" ");
	var business_id = $("#business_id").html();
	$(".services").html("");
	//$(".staff").html(" ");
       var append_option = "<option id='-1' >Select staff</option>";
		$(".staff").html(append_option);	
	//$(".time").html(" ");
	//$(".st_date").val(" ");
	var serviceid=" ";
	$("#selectedService").val("");
	if($(this).attr("data-val")!=''){
	 $("#selectedService").val(serviceid);
	 serviceid=$(this).attr("data-val");
	 getserviceStaffs(serviceid,selected='',business_id);
	 //getStaffs(serviceid,business_id);
	 }
	// if($(this).attr('bookstatus')=='single'){
	 // $(".time").attr('booking','single');
	// var bookService=$(this).attr("data-val");
	// if(bookService)
	// var serviceid=bookService;
	// getservices(business_id,bookService);
	// }else{
	 //$(".time").attr('booking','multi');
	getMultiService(business_id,serviceid);
	//}
	gettimeslots($(".st_date").val(),business_id,staff_id='',eventId='',timeslot='');
});


function getMultiService(business_id,serviceid){
var string = '<div class="dropdown"><a class="dropdown-toggle btn semi-large" data-toggle="dropdown" href="javascript:;">Select Services</a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel" >';
			var str = '';
    var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$.post(url,{business_id:business_id}, function(data){ 
		$.each(eval(data), function( key, value ) {
		var selected=" ";
		  if(serviceid==value.id){
		  var selected="checked";
		   }
			var str = "<li><input type='checkbox' name='eventGroup' class='eventGroup' value="+value.id+" "+selected+"/>"+value.name+"</li>";
			string = string + str;
			
		});
		var closeul='</ul></div></div>';	
			string=string+closeul;
			$("#checkbox").html(string);
	});
}

function getservices(business_id,serviceid){   
	var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$("#selectedService").val(serviceid);
	$.post(url,{business_id:business_id}, function(data){ 
	var string = "<select class='services' name='services1' id='services'><option value='' >Select service</option>";
		var str = '';
		//$("#checkbox").append(append_option);
		$.each(eval(data), function( key, value ) {
		  var selected=" ";
		  if(serviceid==value.id){
		  var selected="selected";
		   }
			var str = "<option id="+key+" value="+value.id+" "+selected+">"+value.name+"</option>";
			string = string + str;
			//$("#checkbox").append(append);
			
		});
		 var append_option = "</select>";
		 string=string+append_option;
		 $("#checkbox").html(string);
	});
	if(serviceid!=" ")
	getStaffs(serviceid,business_id);
}


function getserviceStaffs(checked,selected,business_id){ 
	var url = base_url+"bcalendar/getstaffnamesByfilter";
	$.post(url,{service_id:checked,date:$(".st_date").val(),businessid:business_id}, function(data){ 
		$(".staff").html("");
       var append_option = "<option id='-1' >Select staff</option>";
		$(".staff").append(append_option);		
		$.each(eval(data), function( key, value ) { 
		var select="";
		 if(selected!='' && selected==value.users_id){
		    select=' selected';
		 }
			var append_option = "<option id="+key+" value="+value.users_id+" "+select+">"+value.first_name+""+value.last_name+"</option>";
			$(".staff").append(append_option);
		});
	});	
	//str = checked.substr(0,checked.length - 1);
	//alert(checked);
	//$("#selectedService").val(checked.replace(/,(?=[^,]*$)/, ''));
	$("#selectedService").val(checked);

}


$("#eventGroup").live("change",function(){  
  var class_name = $(this).val();
   if(class_name==""){
    $(".demo").html("");
	$("#eventEndTime").val("");
   }else if($(".trainerid").html()!=''){
	 staffClassSchedule($(".trainerid").html(),$(".trainername").html());
	 getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$(".trainerid").html(),eventId='',$(".StartTime").val());
	 getClassEndtime($("#eventStartTime").val(),class_name,$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
   }else{ 
	getClassStaffs(class_name,$("#StartDate").val(),$("#business_id").html(),selected='');
	getClassEndtime($("#eventStartTime").val(),class_name,$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
  }
});

$("#trainer").live("change",function(){
 //if($(this).val()!=''){
   $(".message").removeClass("alert").html(" ");
   $("#eventEndTime").val(" ");
  // getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$(this).val(),eventId='',starttime='');
   getClassEndtime($("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
 //}
});

function getClassStaffs(class_name,date,business_id,selected){
   var url = base_url+"bcalendar/getAllstaff";
	$(".demo").html("");
	var append = "<option value='' >Select staff</option>";
	$(".demo").append(append);	
	$.post(url,{class_name:class_name,date:date,business_id:business_id}, function(data){		
		$.each(eval(data), function( key, value ) { 
			if(selected==value.id){
			  var selectedStaff="selected=selected";
			}else{
			  var selectedStaff="";
			}
			var append_option = "<option id="+key+" value="+value.id+"  "+selectedStaff+">"+value.name+"</option>";
			$(".demo").append(append_option);
		});
	});

}

function getClassEndtime(starttime,class_id,date,business_id,staffid,eventid){
 $(".message").removeClass("alert").html(" ");
  var url1 = base_url+"bcalendar/endTimeClass"; 
	$.post(url1,{starttime:starttime,class_id:class_id,date:date,business_id:business_id,staffid:staffid,eventid:eventid},function(data){
	//alert(data); 
	if(data==0){
	   $(".message").addClass("alert").html("Time slots not enough");
	   $(".postclassbtn").attr("href","javascript:;");
	 }else if(data==-1){
		$(".message").addClass("alert").html("Time slots not enough");
		$(".postclassbtn").attr("href","javascript:;");
	 }else{
	 $("#eventEndTime").val(data);
	 $(".postclassbtn").attr("href",$("#action").val());
	 }
	});
}

	//function singleClass(){
	$("#singleClass").click(function(){
		var evId=$("#eventId").html();
		$("#clientform")[0].reset();
		$("#removeClient").hide();
		$("#actionVal").val("");
		$("#clientlist").html("");
		$.ajax({
	        url:base_url+'bcalendar/getSeriesid',
		   data:{classId:evId},
		   type:'POST',
		   success:function(data){ 
			 $.each(eval(data),function(i,v){
			  enddate=v.enddate;
			  $("#postclass").attr("seriesid",v.seriesid);
			 })
			
		   }
	    });
	   $.ajax({
	   url:base_url+'bcalendar/getClassDetails',
	   data:{classId:evId},
	   type:'POST',
	   success:function(data){
	    //alert(data);
		$.each(eval(data),function( key, v ) {
		    $("#editpost").show();$("#postnew").hide();
            var removediv="Add Repeat";
		   $("#repeatdiv").hide();
		   $("#weeks").css("display",'none');
		   $("#months").css("display",'none');
		   $("#repeathtml").html(removediv);
		   $("#repeatstatus").val(removediv);
		   //$("#postclass").addClass("in");
		   $("#postclass").attr("data-val","single");
		   //$("#postclass").attr("seriesid","");
		   $("#postclass").modal("show");
		   $("#editClass").modal("hide");
		   $("#action").val("javascript:rzUpdateEvent();");
		   $(".postclassbtn").attr("href",$("#action").val());
	       //$("body").append('<div class="modal-backdrop fade in" id="darker"></div>');
           $("#update").show();$("#add").hide();
		  // $("#updateclass").show();$("#addclass").hide();
		   $("#updateid").val(evId);
           document.getElementById("eventGroup").value = v.user_business_classes_id;
		   $(".eventStartTime").val(v.start_time);
		   $("#StartDate").val(v.start_date);
		   //$(".StartTime").val(v.start_time);
		   $("#EndDate").val("");
		   $("#eventEndTime").val(v.end_time);
		   $("#class_size").val(v.class_size);
		   $("#available").html(v.availability);
		   $("#enroll_last").val(v.lastdate_enroll);
		   getClassStaffs(v.user_business_classes_id,v.start_date,$("#business_id").html(),v.instructor);
		   getClassfreeslots(v.start_date,$("#business_id").html(),v.instructor,evId,v.start_time);

		})
	   }
	  })
	   
	})
	
	
	$("#multiClass").click(function(){
	  var evId=$("#eventId").html();
	  $("#clientform")[0].reset();
	  $("#removeClient").hide();
	  $("#clientlist").html("");
	  $("#actionVal").val("");
      var enddate="";	  
	  $.ajax({
	        url:base_url+'bcalendar/getSeriesid',
		   data:{classId:evId},
		   type:'POST',
		   success:function(data){ 
			 $.each(eval(data),function(i,v){
			  enddate=v.enddate;
			  $("#postclass").attr("seriesid",v.seriesid);
			 })
			
		   }
	    });
	   //if(enddate!=""){
	   $.ajax({
	   url:base_url+'bcalendar/getClassDetails',
	   data:{classId:evId},
	   type:'POST',
	   success:function(data){
		$.each(eval(data),function( key, v ) {
		    $("#editpost").show();$("#postnew").hide();
			//alert(v.repeat_type);
			document.getElementById("repeat_type").value = v.repeat_type;
			if(v.repeat_type== 'weekly'){
			 var removediv="Remove Repeat";
			 $("#repeatdiv").show();
		     $("#weeks").css("display",'block');
		     $("#months").css("display",'none');
			 $("#weeklist").val(v.repeat_week_days);
			 var myString = v.repeat_week_days, splitted = myString.split(","), i;
				for(i = 0; i < splitted.length; i++){ 
				$("#w"+splitted[i]).attr("class","btn weekly active");
				}
			}
			
			if(v.repeat_type== 'monthly'){
			 var removediv="Remove Repeat";
			 $("#repeatdiv").show();
		     $("#weeks").css("display",'none');
		     $("#months").css("display",'block');
			  $("#monthlylist").val(v.repeat_months);
			 var myString = v.repeat_months, splitted = myString.split(","), i;
				for(i = 0; i < splitted.length; i++){ 
				$("#m"+splitted[i]).attr("class","btn monthly active");
				}
			}
			
			if(v.repeat_type== 'daily'){
			 var removediv="Remove Repeat";
			 $("#repeatdiv").show();
		     $("#weeks").css("display",'none');
		     $("#months").css("display",'none');
			}
            //var removediv="Add Repeat";
		  
		   $("#repeathtml").html(removediv);
		   $("#repeatstatus").val(removediv);
		   $("#postclass").addClass("in");
		   $("#editClass").modal("hide");
           $("#postclass").modal("show");
		   $("#action").val("javascript:rzUpdateEvent();");
		   $(".postclassbtn").attr("href",$("#action").val());
		  // $("#postclass").addClass("in");
		   $("#postclass").attr("data-val","multi");
	      // $("body").append('<div class="modal-backdrop fade in" id="darker"></div>');
           $("#update").show();$("#add").hide();
		  // $("#updateclass").show();$("#addclass").hide();
		   $("#updateid").val(evId);
           document.getElementById("eventGroup").value = v.user_business_classes_id;
		   $(".eventStartTime").val(v.start_time);
		   $("#StartDate").val(v.start_date);
		  // $(".StartTime").val(v.start_time); 
		 // alert(enddate);
		   $("#EndDate").val(enddate);
		   $("#eventEndTime").val(v.end_time);
		   
		   $("#class_size").val(v.class_size);
		   $("#available").html(v.availability);
		   $("#enroll_last").val(v.lastdate_enroll);
		   getClassStaffs(v.user_business_classes_id,v.start_date,$("#business_id").html(),v.instructor);
		   getClassfreeslots(v.start_date,$("#business_id").html(),v.instructor,evId,v.start_time);
		})
	   }
	  })
	})

//For rescheduling of appointments
$("#reschedulebtn").live("click",function(){ 
  $("#reschedule").modal('hide');
  if($("#user_id").html()!=''){
     $("#users_id").val($("#user_id").html());
  }
  $(".time").attr('booking','multi');
  //$(".time").attr('staff','0');
  $("#book").modal('show');
 // alert($("#eventId").html());
  var business_id = $("#business_id").html(); 
  $(".business_id").val($("#business_id").html()); 
  $("#eventId").val($("#eventid").html());
  $(".end_time").val($("#endtime").html());
  
  var string = '<div class="dropdown"><a class="dropdown-toggle btn semi-large" data-toggle="dropdown" href="javascript:;">Select Services</a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel">';
	var str = '';
    var url = base_url+"bcalendar/getserviceBybusinessfilter";
	var temp = new Array();
	temp = $("#services_id").html().split(",");
	//var services_id='['+$("#services_id").html()+']'; 
	$.post(url,{business_id:business_id}, function(data){ 
		$.each(eval(data), function( key, value ) {
			var checked="";
			if(jQuery.inArray(value.id,temp) == -1){ 
			 checked='';
			}else{ 
			  checked='checked';
			}
			var str = "<li><input type='checkbox' name='eventGroup' class='eventGroup' "+checked+" value="+value.id+"  />"+value.name+"</li>";
			string = string + str;
		});
		var closeul='</ul></div></div>';	
			string=string+closeul;
			//alert(string);
			$("#checkbox").html(string);
	});
	$(".messageNote").val($("#note").html());
	
	
	var d=new Date($("#date").html());
	var curr_date = d.getDate();
	var curr_month = d.getMonth() + 1; 
	var curr_year = d.getFullYear();
	var date = curr_date+"-"+curr_month+"-"+curr_year;
	
	
	$(".st_date").val(date);
	getserviceStaffs($("#services_id").html(),$("#employee_id").html(),business_id);
	if($("#employee_id").html()!=0){
	  var staff_id=$("#employee_id").html();
	}else{
	  var staff_id='';
	} 
	$(".time").attr('action','reschedule');
	$(".time").attr('eventId',$("#eventid").html());
	gettimeslots($("#date").html(),business_id,staff_id,$("#eventid").html(),$("#time").html());
	var url = base_url+"bcalendar/checkreschedule";
	$.ajax({
		type: "POST",
		url: url,
		data: { date : date,business_id:business_id,starttime:$("#time").html(),action:$('.time').attr('action')},
		success: function(data) {
		  //alert(data);
		  if(data=='1'){
			 $(".message").addClass("alert").html("Cannot reschedule the appoointment now");
			 $(".book_appointment").attr("onsubmit","return false;");
		  }else{
		     $(".book_appointment").attr("onsubmit","return true;");
			  $(".book_app").show();
		  }
		}
	})
})



$(".bookmultiServices").live("click",function(){ 
$(".time").attr('booking','multi');
$(".staff").html(""); 
		var append_option = "<option id='-1' >Select staff</option>";
		$(".staff").append(append_option);
$(".time").attr('action','schedule');
$(".message").removeClass("alert").html(" ");
$(".start_date").val(" ");
$(".time").html(" ");
var business_id = $("#business_id").html();
var string = '<div class="dropdown"><a class="dropdown-toggle btn semi-large" data-toggle="dropdown" href="javascript:;">Select Services</a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel" >';
			var str = '';
    var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$.post(url,{business_id:business_id}, function(data){ 
		$.each(eval(data), function( key, value ) {
			var str = "<li><input type='checkbox' name='eventGroup' class='eventGroup' value="+value.id+" />"+value.name+"</li>";
			string = string + str;
			
		});
		var closeul='</ul></div></div>';	
			string=string+closeul;
			$("#checkbox").html(string);
	});
	
})


function getStaffs(serviceid,business_id){
 var url = base_url+"bcalendar/getstaffnameByfilter";
  $.post(url,{service_id:serviceid}, function(data){ 
		$(".staff").html(""); 
		var append_option = "<option id='-1' >Select Staff</option>";
		$(".staff").append(append_option);
		$.each(eval(data), function( key, value ) {
			var append_option = "<option id="+key+" value="+value.users_id+">"+value.first_name+""+value.last_name+"</option>";
			$(".staff").append(append_option);
		});
	});
}
/*Get staff name*/
	$(".services").live("change",function(){
	$(".time").html(" ");
	$(".st_date").val(" ");
	var url = base_url+"bcalendar/getstaffnameByfilter";
	$.post(url,{service_id:$(this).val()}, function(data){ 
		$(".staff").html("");
var append_option = "<option id='-1' >Select staff</option>";
		$(".staff").append(append_option);		
		$.each(eval(data), function( key, value ) { 
			var append_option = "<option id="+key+" value="+value.users_id+">"+value.first_name+""+value.last_name+"</option>";
			$(".staff").append(append_option);
		});
	});
	
});

$(".staff").live("change",function(){ 
	 $("#selectedstaff").val($(this).val());
	var business_id =$(".business_id").val();
	if($(".staff").val()!='Select staff'){
	var staff_id = $(".staff").val(); 
	}else{
	var staff_id ='';
	}
	var eventId='';
	var timeslot='';
	var selected='';
	//getserviceStaffs($("#selectedService").val(),selected,business_id); 
	gettimeslots($(".st_date").val(),business_id,staff_id,eventId,timeslot);
})


$(".time").live("change",function(){
		$(".message").removeClass("alert").html(" ");
		var starttime = $(this).val();
		
		// if($('.time').attr('booking')=='single'){
			// var service_ = $(".services").val();
		    // var status="";
		    // var date = $(".st_date").val();
			// var staffid = $(".staff").val(); 
			// if(staffid=='Select staff'){
			     // staffid =''; 
			// }else{
				 // staffid = $(".staff").val(); 
			// }
		// }else{
		    var service_ = $("#selectedService").val();
			var status=1;
			var date = $(".st_date").val();
			var staffid = ""; 
			if($(".staff").val()!='Select staff'){
				staffid=$(".staff").val();
			}
			// if(staffid=='Select staff'){
			 // staffid = ''; 
			// }else{
			 // staffid = $("#staffid").val(); 
			// }
		//}
		var business_id = $(".business_id").val();
		// alert(date);
		// alert(starttime);	
		// alert(service_); alert(staffid);
		var myUrl = base_url+"bcalendar/getendtimeByservice";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { service_id : service_,starttime:starttime,date:date,business_id:business_id ,status:status ,action:$('.time').attr('action'),eventId:$('.time').attr('eventId'),staffid:staffid},
			success: function(data) {
				if(data==-2){ 
				 $(".message").addClass("alert").html("Select atleast one service");
				 $(".book_appointment").attr("onsubmit","return false;");
				}else if(data==0){
				   $(".message").addClass("alert").html("Time Slot selected is not enough");
				   $(".book_appointment").attr("onsubmit","return false;");
				}else if(data==-1){
				    $(".message").addClass("alert").html("Cannot book an appointment now");
					$(".book_appointment").attr("onsubmit","return false;");
				}else{
					console.log(data);
					$(".end_time").val(data);
					$(".book_appointment").attr("onsubmit","return true;");
				}
			},
			error: function() {
				//alert('it broke');
			},
			complete: function() {
				//alert('it completed');
			}
		});
	
});

$(".serviceID").live("click",function(){  
$(".message").removeClass("alert").html(" ");
	var checked = '';
	$('input:checkbox[name=serviceID]').each(function() 
	{   
		if($(this).is(':checked')){
			checked = checked  + $(this).val() +',';	
		}	
	});

    $(".time").html(" ");
	$(".start_date").val(" ");
	selected='';
	var business_id=$(".business_id").val(); 
	getserviceStaffs(checked,selected,business_id);
	
 });


 
  $("#staffSelect").live('change',function(){ //alert("here");
    //alert($(".staff").val());
	if($(".staff").val()!='Select staff'){
	$(".users_id").val($(".staff").val());
	$staffid=$(".staff").val();
	}else{
	$staffid='';
	}
	var starttime = $("#eventStartTime").val();
	var date= $("#eventStartDate").val();
	var checkedServices= $("#checkedServices").val();
	var eventId='';
	var action=$('.time').attr('action');
	getendtime(checkedServices,starttime,date,$("#business_id").html(),$staffid,eventId,action);
 }) 
 
 function getendtime(checked,starttime,date,business_id,staffid,eventId,action){
	var myUrl = base_url+"bcalendar/getendtime";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { checked : checked,starttime:starttime,date:date,business_id:business_id,staffid:staffid,eventId:eventId,action:action},
			success: function(data) {  
				if(data==0){
				   // $("#bookAppbtn").attr("href","javascript:;");
				   $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html("Time Slot selected is not enough").css({"display":"block","margin":"0px"});
					//alert("Time Slots Not Available Which you are trying with services");
				}else if(data==1){
				  //  $("#bookAppbtn").attr("href","javascript:;");
				  $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html("We won't work on selected date kindly select another day").css({"display":"block","margin":"0px"});
				    //alert("We won't work on selected date kindly select another day");
				}else if(data==-1){
				   // $("#bookAppbtn").attr("href","javascript:;");
				   $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html("Cannot book an appointment now").css({"display":"block","margin":"0px"});
				    //alert("We won't work on selected date kindly select another day");
				}else{
				    $(".end_time").val(data);
					$(".book_appointment").attr("onsubmit","return true;");
				   // $("#bookAppbtn").attr("href","javascript:rzAddEvent();");
					//$("#eventEndTime").val(data);
				}
				
			},
			error: function() {
				//alert('it broke');
			},
			complete: function() {
				//alert('it completed');
			}
		});
  
 }
 
/*Time Calculation*/
$(".eventGroup").live("click",function(){   
    $(".message").removeClass("alert").html(" ");
	//$(".start_date").val(" ");
   // $(".time").html(" ");
	var checked = '';
	$('input:checkbox[name=eventGroup]').each(function() 
	{   
		if($(this).is(':checked')){
			checked = checked  + $(this).val() +',';	
		}	
	});	
	selected='';
	//var starttime = $("#eventStartTime").val();
	var starttime = $("#timeSlot").val();
	//var date= $("#eventStartDate").val();
	
	var date = $(".st_date").val();
	var checkedServices= $("#checkedServices").val(checked);
	var eventId='';
	if($("#eventId").val()!=''){
	  eventId=$("#eventId").val();
	}
	var staffid='';
	$(".staff").val("");
	
	
	if($("#staffschedule").val()!=''){
	    var staffid=$("#staffschedule").val();
		staffSchedule($("#staffschedule").val(),$("#staffname").html());
	}else{
	//if($(".time").attr('staff')!='1'){
	getserviceStaffs(checked,selected,$(".business_id").val());
	} 
var action=$('.time').attr('action');	
	$("#selectedService").val(checked);
	if(starttime!=""){ 
	getendtime(checked,starttime,date,$(".business_id").val(),staffid,eventId,action);
	}
 });
 
 
 $(".book_app").live('click',function(){
	if ($('.book_appointment :checkbox:checked').length <= 0){
      //alert("here");
	  $(".message").addClass("alert").html("Select atleast one service");
				 $(".book_appointment").attr("onsubmit","return false;");
    }
	// else{
		// $(".book_appointment").attr("onsubmit","return true;");
	// }
 })
 
/*Book for classes*/

$(".book_class").live("click",function(){ 
$("#booksuccess").hide();
   var id=$(this).attr("data-val");
   $("#classid").val(id);
   $("#classname").html($(this).attr("data-name"));
   //getClassstaff($(this).attr("data-val"));
   var url = base_url+"bcalendar/getstaffClass";
    $.post(url,{classid:id},function(data){ 
	$.each(eval(data),function( key, value ) {	
			$("#price").html(value.price);
			$("#startdate").html(value.start_date);
			$("#enddate").html(value.end_date);
			$("#starttime").html(value.start_time);
			$("#endtime").html(value.end_time);
			$("#repeated").html(value.repeat_type);
			if(value.repeat_type=="monthly")
			$("#repeatedon").html(value.repeat_months);
			if(value.repeat_type=="weekly")
			$("#repeatedon").html(value.repeat_week_days);
			if(value.repeat_type=="daily")
			$("#repeatedDiv").hide();
			if(value.instructor!='0')
			$("#instructor").html(value.instructor_firstname+''+value.instructor_lastname);
			if(value.instructor=='0')
			$("#instructor_name").hide();
			$("#lastdate").html(value.lastdate_enroll);
			$("#capacity").html(value.class_size);
			$("#available").html(value.availability);
			 if(value.availability==0){
			 $("#bookclass").hide();
			 }else{
			 $("#bookclass").show();
			 }
		});
	}); 
})




$("#bookclass").live("click",function(){ 
 $.ajax({
  url:base_url+"bcalendar/bookclass",
  data:{classid:$("#classid").val()},
  type:"POST",
  success:function(data){   
   if(data=="booked"){
    var messg="Already booked";
	$("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }else if(data=="login"){ 
    window.location.href=base_url+'home/clientlogin';
   }else{ 
     $("#available").html(data);
     var messg="Booked Successfully";
	 $("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }
	 
   }
 })
 
})

$(".launch").on("click",function(){ 
$(".message").removeClass("alert").html(" ");
	//$("#bookApp").modal('show');
	var businessid = $("#profileid").html();
	
	//$("#bookmultiServices").modal('show');
	$("#book").modal('show');
	var append_option = "<option id='-1' >Select staff</option>";
	$(".staff").html(append_option);
	//$("#book").attr('bookstatus','multi');

	// $(".staff").html(""); 
		// var append_option = "<option id='-1' >Select staff</option>";
		// $(".staff").append(append_option);
	 $(".time").attr('booking','multi');
     $(".time").attr('action','schedule');
	 $("#selectedService").val(" ");
	 $(".services").html("");
	// $("#business_id").html(businessid);
	 $(".business_id").val(businessid);
	 var d=new Date($("#eventStartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
     var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year;
	 $(".st_date").val(date); 
	 var staffid='';
	 
	if($("#staffsid").val()!=''){
	    //$(".time").attr('staff','1');
	    staffid=$("#staffsid").val();
		$("#staffschedule").val(staffid);
		$("#staffschedule").attr('ename',$("#staffname").html());
		staffSchedule(staffid,$("#staffname").html());
		//var append_option = "<option id="+staffid+" value="+staffid+" selected>"+$("#staffname").html()+"</option>";
		//$(".staff").html(append_option);
	}
	var eventId='';
	var  timeslot=$("#eventStartTime").val();
	gettimeslots(date,businessid,staffid,eventId,timeslot)
	
})

function staffSchedule(staffid,staffname){
	var append_option = "<option id="+staffid+" value="+staffid+" selected>"+staffname+"</option>";
	$(".staff").html(append_option);
}

function staffClassSchedule(staffid,staffname){
	var append_option = "<option id="+staffid+" value="+staffid+" selected>"+staffname+"</option>";
	$(".demo").html(append_option);
}


$(".launchClass").on("click",function(){ 
$(".demo").html(" ");
$("#clientlist").html("");
$("#actionVal").val("");
$("#available").html("");
var append = "<option value='' >Select staff</option>";
$(".demo").append(append);
$("#eventGroup").val(" ");
$(".message").removeClass("alert").html(" ");
$.ajax({
	    url:base_url+'bcalendar/getClients',
		data:{businessid:$("#login_id").html()},
		type:'POST',
		success:function(data){
           $("#tags").val(data);		
		
		}
	  })

 var removediv="Add Repeat";
   $("#repeatdiv").hide();
   $("#weeks").css("display",'none');
   $("#months").css("display",'none');
   $("#repeathtml").html(removediv);
   $("#repeatstatus").val(removediv);
$("#StartDate").val($("#eventStartDate").val()); 
$(".StartTime").val($(".eventStartTime1").val());
$("#eventEndTime").val('');
$("#enroll_last").val('');
$("#class_size").val('');
//$("#EndDate").val($("#eventEndDate").val());
//$("#postclass")[0].reset();
$("#update").hide();$("#add").show();
$("#editpost").hide();$("#postnew").show();
$("#updateid").val(" ");

$("#postclass").modal("show");
$("#removeClient").hide();
$("#clientform")[0].reset();
$("#action").val("javascript:rzAddEvent();");  
$(".postclassbtn").attr("href",$("#action").val()); 
if($(".trainerid").html()!=''){
 staffClassSchedule($(".trainerid").html(),$(".trainername").html());
 getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$(".trainerid").html(),eventId='',$(".StartTime").val());
}else{
getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$("#trainer").val(),eventId='',$(".StartTime").val());
}
	//$("body").append('<div class="modal-backdrop fade in" id="darker"></div>');
})

function getClassfreeslots(start_date,business_id,staff_id,eventId,timeslot){
  var url = base_url+"bcalendar/getClassfreeslotsbydate";
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot},function(info){
			//alert(info);
			if(info==0){
			$("#book").attr("href","javascript:;");
			//$(".book_appointment").attr("onsubmit","return false;");
			$(".message").addClass("alert").html("We won't work on selected date kindly select another day");
			$(".time").html(""); 
			}
			else{
			$(".book_appointment").attr("onsubmit","return true");	
			$(".timeslot").html(""); 
			$(".timeslot").append(info);
			$(".message").removeClass("alert").html("");
			}
			});
}

$("#addClient").on("click",function(){
$(".message").removeClass("alert").html(""); 
$("#removeClient").hide();
if($("#actionVal").val()==''){
 $("#actionVal").val('add');
}
 var data=$("#classdetails,#clientform").serialize()+'&classid='+$("#eventId").html();
 if($("#name").val()!=""){
 $.ajax({
 url:base_url+"bcalendar/addClient",
 data:data,
 type:'POST',
 success:function(data){ 
  $.each(eval(data),function(i,v){
  var clientids=$("#clientids").val();
  if(v.action=='add'){
   var clientHtml='<li><a href="javascript:;"  class="editclient" clientid='+v.id+'  >'+v.name+'</a></li>';
   $("#clientlist").append(clientHtml);
    clientids+=v.id+','; 
   $("#clientids").val(clientids);
   $("#available").html(v.avail);
   $("#clientform")[0].reset();
   }else{
   $(".message").addClass("alert").html("Updated Succesfully");
   }
  })
  
 }
 })
}else{
  $(".message").addClass("alert").html("Client name is required");
  return false;
}
})

$("#removeClient").click(function(){ 
	var url=base_url+"bcalendar/removeClient"; 
	$.post(url,{clientid:$(this).val(),classid:$("#eventId").html(),type:'class'},function(data){ 
	 $("#available").html(data); 
	 $("#clientform")[0].reset();
	 $("#removeClient").hide();
	 clientlist($("#eventId").html());
	 //$("#app"+$(this).attr('appid')).remove();
	})
})

$(".clientlist").click(function(){
 $("#clientlist").html("");
 $("#actionVal").val("");
 clientlist($("#eventId").html());
 // $.ajax({
 // url:base_url+"bcalendar/clientlist",
 // data:data,
 // type:'POST',
 // success:function(data){ 
  // $.each(eval(data),function(i,v){ 
   // var clientHtml='<li id="app'+v.id+'"><a href="javascript:;" class="editclient" clientid='+v.users_id+' appid='+v.id+' >'+v.clients_first_name+' '+v.clients_last_name+'</a></li>';
   // $("#clientlist").append(clientHtml);
  // })
  
 // }
 // })
})

function clientlist(classid){
 $("#clientlist").html("");
 var data='&classid='+classid;
 $.ajax({
 url:base_url+"bcalendar/clientlist",
 data:data,
 type:'POST',
 success:function(data){ 
 var clientids="";
  $.each(eval(data),function(i,v){ 
   var clientHtml='<li><a href="javascript:;" class="editclient" clientid='+v.users_id+'>'+v.clients_first_name+' '+v.clients_last_name+'</a></li>';
   $("#clientlist").append(clientHtml);
   clientids+=v.users_id+',';
  })
  $("#clientids").val(clientids);
 }
 })

}

$(".editclient").live('click',function(){
	$(".message").removeClass("alert").html(""); 
$("#removeClient").val($(this).attr('clientid'));
$("#removeClient").show();
    $.ajax({
	 url:base_url+'bcalendar/getclientdetails',
	 type:'POST',
	 data:{userid:$(this).attr('clientid')},
	 success:function(data){  
	  $.each(eval(data),function(i,v){ 
	   $("#name").val(v.clients_first_name);
	   $("#note").val(v.note);
	   $("#phone").val(v.clients_phonenumber);
	   $("#email").val(v.clients_email);
	   $("#users_id").val(v.users_id);
	   $("#actionVal").val("edit");
	  })
	 }
	})

})

$("#bookClass").click(function(){ 
 $.ajax({
  url:base_url+"bcalendar/bookclass",
  data:{classid:$("#updateid").val(),employee_id:$("#employee_id").html(),note:$("#note").val(),starttime:$("#starttime").html(),endtime:$("#endtime").html(),date:$("#StartDate").html(),businessid:$("#business_id").html()},
  type:"POST",
  success:function(data){  
  var messg="";
//$("#booksuccess").html(messg);  
   if(data==0){ 
    messg="Cannot Book now";
   }else if(data==1){
     messg="Already Booked";
   }else{
	 $("#available").html(data);
     messg="Booked Successfully";
   }  
	 $("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }
	 
   
 })
})



var nowTemp = new Date();
			var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
			
			$('.date_pick').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
			})
			
			.on('changeDate', function(ev){
				//alert("hello")
				$('.date_pick').datepicker('hide');
				var business_id =$(".business_id").val();
				var staff_id = ''; 
				var eventId='';
				var timeslot='';
				var selected='';
				if($("#staffschedule").val()!=''){
					var staff_id=$("#staffschedule").val();
					staffSchedule($("#staffschedule").val(),$("#staffname").html());
				}else{
				getserviceStaffs($("#selectedService").val(),selected,business_id); 
				}
				gettimeslots($(".st_date").val(),business_id,staff_id,eventId,timeslot);	
			});
			
			
			$('.date_picker').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
					
			})
			
			.on('changeDate', function(ev){
			    $(".message").removeClass("alert").html("");
				$('.date_picker').datepicker('hide');
				//$(".demo").html("");
				//getClassStaffs($("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),selected='');
				//getClassEndtime($("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');	
			});
			
			$('#StartDate').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
					
			})
			
			.on('changeDate', function(ev){
			    $(".message").removeClass("alert").html("");
				$('.date_picker').datepicker('hide');
				$(".demo").html("");
				getClassStaffs($("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),selected='');
				getClassEndtime($("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');	
			});
			

	
function gettimeslots(start_date,business_id,staff_id,eventId,timeslot){ 
	var url = base_url+"bcalendar/getfreeslotsbydate";
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot},function(info){
			//alert(info);
			if(info==0){
			//$("#book").attr("href","javascript:;");
			$(".book_appointment").attr("onsubmit","return false;");
			$(".message").addClass("alert").html("We won't work on selected date kindly select another day");
			$(".time").html(""); 
			}
			else{
			$(".book_appointment").attr("onsubmit","return true");	
			$(".time").html(""); 
			$(".time").append(info);
			$(".message").removeClass("alert").html("");
			}
			});

}



$("#eventStartTime").live('change',function(){ 
 $(".message").removeClass("alert").html("");
 getClassEndtime($("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
})

_page = window.location.pathname.split('/')[2];
       $('a[href="'+_page+'"],a[href="'+window.location.pathname.split('/')[3]+'"]').parent().addClass('active');

});


			
			

	
			//$('.date_pick').datepicker();
            $('.endtime').timepicker({
			showInputs: false,						  
			showMeridian: false,
			   minuteStep: 15,
               disableFocus: true,
			    defaultTime:'19:45' 
			
			});
			$('.starttime').timepicker({
			showInputs: false,						  
			showMeridian: false,
			   minuteStep: 15,
               disableFocus: true,
			    defaultTime:'10:45' 
			
			});
			  $('.disabletime').timepicker({                                  
                               showMeridian: false,
                               minuteStep: 15,
                               showInputs: false,        
                               disableFocus: true,
                               template: false,
                               defaultTime:'11:45' 
                       });         
			
			 
    /* $('.date_pick').datepicker('hide')*/

		$('.offer_block').click('live',function(){
window.location.href='offer.php'; 
});

		

		
<!--Business profile click accordian scripts Start-->		
$(document).ready(function(){
	$('.accordion-heading').click('live',function(){
		$(this).toggleClass('accordian_back');
	});
});
<!--Business profile click accordian scripts end-->
<!--Mouse over image slider for compilation scripts Start-->

(function($) {
	$(function() { //on DOM ready
		$(".scroller").simplyScroll({
        	auto: false,
			speed: 7
		});
	});
})(jQuery);

<!--Mouse over image slider for compilation scripts end-->
<!-------------------------------------------->

// JavaScript Document
$(document).ready(function() {
		//Thumbnailer.config.shaderOpacity = 1;

		});

<!--------------------------------------->


$(document).ready(function(){
	  <!-----functtion for my appointments start---->
	$('.switch').click('live',function(){
		$('.'+$(this).attr("id")+'').toggleClass('bordered_new');
		$(this).toggleClass("well-style");
	});
	<!-----functtion for my appointments end----->
<!-----functtion for business profile start---->
/*$('.accordion-heading').click('live',function(){
$('.icon-chevron-down').toggleClass('icon-chevron-up');

});*/
<!-----functtion for business profile start---->

$(".accordion-toggle").click(function(){
	if($(this).hasClass("collapsed")){
		$(this).children().find('i.icon-chevron-down').removeClass("icon-chevron-down").addClass("icon-chevron-up");
	}else{
		$(this).children().find('i.icon-chevron-up').removeClass("icon-chevron-up").addClass("icon-chevron-down");
	}
});
//$('.star-rate').raty({ precision: true });
//$('.star-rate').raty({
//
//  half     : true,
//  size     : 24,
//  starHalf : 'img/star-half-big.png',
//  starOff  : 'img/star-off-big.png',
//  starOn   : 'img/star-on-big.png'
//});
});
<!-----functtion for business profile end---->



/*Add Active class to the navigation header top left start*/
$(function(){
var url = window.location.pathname;  
var activePage = url.substring(url.lastIndexOf('/')+1);
$('.client-navbar li a').each(function(){  
var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
if (activePage == currentPage) {
$(this).parent().addClass('active'); 
} 
});
})

$(function(){
var url = window.location.pathname;  
var activePage = url.substring(url.lastIndexOf('/')+1);
$('.business-navbar li a').each(function(){  
var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
if (activePage == currentPage) {
$(this).addClass('active'); 
} 
});
})

$(function(){
var url = window.location.pathname;  
var activePage = url.substring(url.lastIndexOf('/')+1);
$('.admin-navbar li a').each(function(){  
var currentPage = this.href.substring(this.href.lastIndexOf('/')+1);
if (activePage == currentPage) {
$(this).addClass('active'); 
} 
});
})
/*Add Active class to the navigation header top left end*/


function resize() {
    if ($(window).width() < 980) {
     $('#create-user-modal').removeClass('modal-bigger');
    }

}

$(document).ready( function() {
    $(window).resize(resize);
    resize();
});

/*Multiple Select Option JQuery*/
// $(document).ready(function() {
	  // $(function(){
	   // $("select").multiselect(); 
	// });
// });
/*Multiple Select Option JQuery End*/

$(document).ready(function(){
	$(".confirm").on("click",function(e){
	var this_ele = $(this);
e.preventDefault();
apprise('Are you sure want to delete?', {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	
});
  
  
  /********* function for notification settings *************/
$("#oppintment_reminder_on").click(function() {
                                                                                       
   $("#send_reminder").attr("disabled", false);
   //$("#txt_msg_on").attr("disabled", false);
  // $("#txt_msg_off").attr("disabled", false);
  
});
$("#oppintment_reminder_off").click(function() {
                                                                                       
	   $("#send_reminder").attr("disabled", true);
	  // $("#txt_msg_on").attr("disabled", true);
	  // $("#txt_msg_off").attr("disabled", true);
	 
   });

  $("#Usernotification").click(function(){
  $(".message").removeClass("alert").html(" ").css('display','none');
	var data=$("#notification").serialize(); 
	var url=base_url+'clients/Notification_settings';
	$.post(url,data,function(data){ 
	  if(data==0){
	  $(".message").addClass("alert").html("Settings inserted successfully").css('display','block');
	  }else{
	  $(".message").addClass("alert").html("Settings updated successfully").css('display','block');
	  }
	})
  })
  $("#NotificationSet").click(function(){
   $(".message").removeClass("alert").html(" ").css('display','none');
  })
  
  $("#changeimage").click(function(){
  $("#uploadbtn").show();
  })
});


$('#postclass,#bookApp').modal({
  backdrop: 'static',
  show:false
})



$(document).click(function(event) {
   if($(event.target).parents().index($('#defaultNewEventTemplate')) == -1) {
       if($('#defaultNewEventTemplate').is(":visible")) {
           $('#defaultNewEventTemplate').hide()
       }
   }        
})