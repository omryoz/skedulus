/* 
	Author:Eulogik 
	Programmer :  Swathi,Rakesh
	Designer :  Pankaj
*/



//Global variable 
//var base_url = "http://dev.eulogik.com/skedulus_dev/";
var base_url = "http://localhost/skedulus/";
	
$('.tool').tooltip('hide')


	

function bookService(serviceid){ 
	var business_id = $("#business_id").html();
	$(".services").html("");
	getservices(business_id,serviceid);
}



$(".subDetails").click(function(){
 $.ajax({
    url:baseUrl+'admin/dash/getDetails',
   data: {'id': $(this).attr('data-val')},
   type:'POST',
   success:function(data){ 
   var n=eval(data); 
    $.each(n,function(i,v){
	  $("#subname").html(v.title);
	  $("#subscription_id").val(v.subscription_id);
	  if(v.users_type=='unlimited'){
	  $(".users_num").hide();
	  }else{
	  $(".users_num").val(v.users_num);
	  $(".users_num").show();
	  }
	  $(".users_type").val(v.users_type);
	  
	  $(".pictures_type").val(v.pictures_type);
	  if(v.pictures_type=='unlimited'){
	  $(".picture_num").hide();
	  }else{
	  $(".picture_num").val(v.picture_num);
	  $(".picture_num").show();
	  }
	  
	  $(".reports").val(v.reports);
	  $(".promotion_notifications").val(v.promotion_notifications);
	  $(".business_type").val(v.business_type);
	  if(v.business_type=='unlimited'){
	  $(".business_num").hide();
	  }else{
	  $(".business_num").val(v.business_num);
	  $(".business_num").show();
	  }
	})
	
   }
 })
})

$("#cadd").click(function(){
$(".title").html('Add Category');
$(".category_name").val("");
$(".category_id").val("");
$("#category_add").modal("show");
})

$("#hadd").click(function(){
$(".title").html('Add Holiday');
$(".holiday_name").val("");
$(".uploadedfile").html("");
$(".holiday_id").val("");
$("#holiday_add").modal("show");
})
$(".editCategory").click(function(){
 //alert($(this).attr('data-val'));
 //alert($(this).attr('data-name'));
 $(".title").html('Edit Category');
 $(".category_name").val($(this).attr('data-name'));
 $(".category_id").val($(this).attr('data-val'));
 $("#category_add").modal("show");
})

$(".editHoliday").click(function(){
 $(".title").html('Edit Holiday');
 $(".uploadedfile").html($(this).attr('filename'));
 $(".holiday_name").val($(this).attr('data-name'));
 $(".holiday_id").val($(this).attr('data-val'));
 $("#holiday_add").modal("show");
})

$(document).ready(function(){



//alert($(this).attr('data-status'));

$(".status").click(function(){
var type=$(this).attr('user-type');
var id=$(this).attr('data-val'); 
var preStatus=$(this).attr('data-status');
  url=baseUrl+'admin/dash/updateStatus',
  data= {'id': $(this).attr('data-val'),'type':type,'status':$(this).attr('data-status')},
 $.post(url,data,function(data){ 
 var str=data;
 var data=str.trim();
 if(data!=0){
	$("#"+type+id).attr('data-status',data);
	$("#"+type+'Status'+id).html(data);
	$("#"+type+id).attr('value',preStatus);
	if(data=='active'){
	$("#"+type+id).attr('title','inactivate now');
	}else if(data=='inactive'){
	$("#"+type+id).attr('title','activate now');
	}
	}
 })
})



$(".favourite").click(function(){
	var id=$(this).attr('data-val');
	var action=$(this).attr('action');
	if($(this).attr('action')=='remove'){
	apprise(unfavouritebusiness, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ 
	if(r){ 
	addRemoveFav(id,action);
	}else{ 
	return false; 
	} 
	});
	}else{
	addRemoveFav(id,action);
	}
})

function addRemoveFav(id,action){ 
$.ajax({
   url:baseUrl+'search/addtoFav',
   data: {'id': id,'action':action},
   type:'POST',
   success:function(data){
    var str=data;
    var data=str.trim();
   if(action=="add"){
	$("#star"+data).attr("class","icon-star icon-2x pull-right tool").attr("data-original-title","Remove to Favourite");
	$("#star"+data).attr("action","remove");
    }else{
	$("#star"+data).attr("class","icon-star-empty icon-2x pull-right tool").attr("data-original-title","add to Favourite");
	$("#star"+data).attr("action","add");
	}
	
   }
  })
}

$(".dropdown-menu li").live("click",function(e) {
       e.stopPropagation();
   });
   


function getMultiService(business_id,serviceid,staffid){
var string = '<div class="dropdown"><a class="dropdown-toggle btn-service semi-large" data-toggle="dropdown" href="javascript:;">Select Services<b class="caret pull-right"></b></a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel" >';
			var str = '';
    var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$.post(url,{business_id:business_id,staffid:staffid}, function(data){ 
		$.each(eval(data), function( key, value ) {
		var selected=" ";
		  if(serviceid==value.id){
		  var selected="checked";
		   }
		   if(staffid!=''){
		   var id=value.service_id;
		   }else{
		   var id=value.id;
		   }
			var str = "<li><input type='checkbox' name='eventGroup' class='eventGroup' value="+id+" "+selected+"/>"+value.name+"</li>";
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


function getserviceStaffs(checked,selected,business_id,starttime){ 
	var url = base_url+"bcalendar/getstaffnamesByfilter";
	$.post(url,{service_id:checked,date:$(".st_date").val(),businessid:business_id,starttime:starttime}, function(data){ 
	if(data){
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
		}
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
	 getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$("#eventStartTime").val(),class_name,$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
   }else{ 
	getClassStaffs(class_name,$("#StartDate").val(),$("#business_id").html(),selected='');
	getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$("#eventStartTime").val(),class_name,$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
  }
});

$("#trainer").live("change",function(){
 //if($(this).val()!=''){
   $(".message").removeClass("alert").html(" ");
   $("#eventEndTime").val(" ");
   getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$(this).val(),eventId='',$("#eventStartTime").val());
   getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
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

function getClassEndtime(startdate,enddate,repeatstatus,starttime,class_id,date,business_id,staffid,eventid){
 $(".message").removeClass("alert").html(" ");
  var url1 = base_url+"bcalendar/endTimeClass"; 
	$.post(url1,{startdate:startdate,enddate:enddate,repeatstatus:repeatstatus,starttime:starttime,class_id:class_id,date:date,business_id:business_id,staffid:staffid,eventid:eventid,seriesid:$("#postclass").attr("seriesid")},function(data){
	//alert(data); 
	if(data==0){
	   $(".message").addClass("alert").html("Time slots not enough");
	   $(".postclassbtn").attr("href","javascript:;");
	 }else if(data==-1){
		$(".message").addClass("alert").html("Time slots not enough");
		$(".postclassbtn").attr("href","javascript:;");
	 }else if(data==-2){
		$(".message").addClass("alert").html("Start date less than end date");
		$(".postclassbtn").attr("href","javascript:;");
	 }else{
	 $("#eventEndTime").val(data);
	 $(".postclassbtn").attr("href",$("#action").val());
	 }
	});
}

	//function singleClass(){ 
	$("#singleClass").click(function(){ 
$("#addclass").attr('data-toggle','tab').addClass('tab');
$("#addclient").attr('data-toggle','tab').addClass('tab');	
	$("#postclass li:eq(1) ").removeClass("active in");
    $("#postclass #edit_class").addClass("active in");
    $("#postclass li:eq(0)").addClass("active"); $("#postclass #add_client  ").removeClass("active in");
		var evId=$("#eventId").html();
		$("#clientform")[0].reset();
		$("#removeClient").hide();
		$("#addClient").show();
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
		   $("#StartDate").datepicker("setValue", v.start_date);
	       $("#StartDate").datepicker('update');
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
	$("#addclass").attr('data-toggle','tab').addClass('tab');
    $("#addclient").attr('data-toggle','tab').addClass('tab');
	$("#postclass li:eq(1) ").removeClass("active in");
    $("#postclass #edit_class").addClass("active in");
    $("#postclass li:eq(0)").addClass("active"); $("#postclass #add_client  ").removeClass("active in");
	  var evId=$("#eventId").html();
	  $("#clientform")[0].reset();
	  $("#removeClient").hide();
	  $("#addClient").show();
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
		   $("#StartDate").datepicker("setValue", v.start_date);
	       $("#StartDate").datepicker('update');
		   $("#oldstdate").val(v.start_date);
		  // $(".StartTime").val(v.start_time); 
		 // alert(enddate);
		   $("#EndDate").val(enddate);
		   $("#EndDate").datepicker("setValue", enddate);
	       $("#EndDate").datepicker('update');
		   $("#oldeddate").val(enddate);
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

	
$(".closeclassapp").click(function(){
  $("#postclass").modal('hide');
})

$(".delete_app").live("click",function(){ 
      if($(this).attr('data-val')=='Cancel' || $(this).attr('data-val')=='Close'){
	     $(".reschduleId").val('0');
		$(".show").val('0');
		$("#book").modal('hide');
		$("#postclass").modal('hide');
		$("#reschedule_app").attr('display','none');
		$("#deleteApp").attr('display','none');
	  }else{
	  apprise(cancelappointment, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ cancelApp(); }else{ return false; } });
	  }
	 
	 })
	 
	 function cancelApp(){ 
		var url = base_url+"bcalendar/checkfordelete"; 
	  $.ajax({
		data:{date:$(".st_date").val(),business_id:$(".business_id").val(),starttime:$(".time").val(),action:'reschedule'},
		url:url,
		type:'POST',
		success:function(data){  
		if(data==0){ 
		$(".message").addClass("alert").html(cannotcancelappointment); 
		return false;
		}else if(data==1){
		
		if($(".page").html()=='home'){
		var url1=base_url+"cprofile/deletemyapp"; 
		$.post(url1,{type:$("#type").html(),postedclassid:$("#services_id").html(),eventId:$("#eventId").val()},function(data){
		window.location.href=base_url+'bcalendar/mycalender/?deletesuccess';
		//window.location.href=base_url+'cprofile';
		})
		
		}else{
		var url2=base_url+"bcalendar/deleteapp"; 
		//ajaxObj.call("action=deleteevent"+str, function(ev){ical.deleteEvent(ev);ical.hidePreview();});
		$.post(url2,{type:$("#type").html(),postedclassid:$("#services_id").html(),eventId:$("#eventId").val()},function(data){
		window.location.href=base_url+'bcalendar/cal/'+$(".business_id").val()+'/?deletesuccess';
		})
		$("#book").modal('hide');
		$("#postclass").modal('hide');
		}
		}
	  }
	  })
	 }
function showappDetails(){
	 //alert($("#eventId").val());
	    $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:$("#eventId").val()},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
		   
		   var servicelist='';
		   var myString = v.services, splitted = myString.split(","), i;
				for(i = 0; i < splitted.length; i++){ 
				if(splitted[i]!=''){
				 servicelist=servicelist+'<span class="label">'+splitted[i]+'</span>';
			     }
				}
		   $(".list-service").html(servicelist);
		   $("#users_id").val(v.user_id);
		   $(".time").attr('booking','multi');
		   $(".business_id").val(v.business_details_id); 
		   $("#eventId").val($("#eventId").val());
		   $(".end_time").val(v.endtime);
		   var string = '<div class="dropdown"><a class="dropdown-toggle btn-service semi-large" data-toggle="dropdown" href="javascript:;">Select Services<b class="caret pull-right"></b></a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel">';
	var str = '';
    var url = base_url+"bcalendar/getserviceBybusinessfilter";
	var temp = new Array();
	temp = v.services_id.split(",");
    $.post(url,{business_id:v.business_details_id}, function(data){ 
		$.each(eval(data), function( key, value ) {
			var checked="";
			if(jQuery.inArray(value.id,temp) == -1){ 
			 checked='';
			}else{ 
			  checked='checked';
			}
			var str = "<li><input type='checkbox' name='eventGroup' class='eventGroup' disabled "+checked+" value="+value.id+"  />"+value.name+"</li>";
			string = string + str;
		});
		var closeul='</ul></div></div>';	
			string=string+closeul;
			//alert(string);
			$("#checkbox").html(string);
		});	
		$(".messageNote").val(v.note);
		var d=new Date(v.date);
		var curr_date = d.getDate();
		var curr_month = d.getMonth() + 1; 
		var curr_year = d.getFullYear();
		var date = curr_date+"-"+curr_month+"-"+curr_year;
		$(".st_date").val(date);
		$(".date_pick").datepicker("setValue", date);
		$(".date_pick").datepicker('update');
		getserviceStaffs(v.services_id,v.employee_id,v.business_details_id,v.time);
		if(v.employee_id!=0){
		  var staff_id=v.employee_id;
		}else{
		  var staff_id='';
		} 
		$(".time").attr('action','reschedule');
		$(".time").attr('eventId',$("#eventId").val());
		gettimeslots(v.date,v.business_details_id,staff_id,$("#eventId").val(),v.time);
		
	 if(v.status=='active'){
	 
	     var url = base_url+"bcalendar/checkreschedule";
		$.ajax({
		type: "POST",
		url: url,
		data: { date : date,business_id:v.business_details_id,starttime:v.time,action:$('.time').attr('action')},
		success: function(data) {
		  //alert(data);
		  if(data=='1'){
			 $(".book_app").hide();
	         $(".reschedule_app").hide();
			 $("#deleteApp").attr('value',cancelapp).addClass('btn-danger').attr('data-val','Cancel Appointment');
			 $(".delete_app").hide();
		  }else{
		    if($(".reschduleId").val()=='1'){
			$(".eventGroup").attr('disabled',false);
			//$(".book_app").attr('value','Done');
			   $(".book_app").show();
			   $(".reschedule_app").hide();
			}else{
			  $("#deleteApp").attr('value',cancelapp).addClass('btn-danger').attr('data-val','Cancel Appointment');
		      $(".delete_app").show();
			  $(".reschedule_app").show();
			  $(".book_app").hide();
			}
		  }
		}
	})
	    
	   }else{
	   $("#deleteApp").attr('value',appsclose).removeClass('btn-danger').attr('data-val','Close');
	   $(".delete_app").show();
	   $(".reschedule_app").hide();
	   $(".book_app").hide();
			 
	   }
	   })
	   }
     })
	
}

//classPop-up
$('#postclass').on('show', function () {  
    if($("#schedule").val()=="1"){
	  $("#bookClass").hide();
	  $("#details").hide();
	   $.ajax({
	   url:base_url+'bcalendar/getAppDetails',
	   data:{eventID:$("#updateid").val()},
	   type:'POST',
	   success:function(data){ 
	       $.each(eval(data),function( key, v ) {
		   $(".messageNote").attr('disabled',true);
		   $("#type").html('class');
		   $(".business_id").val(v.business_details_id); 
		   $("#eventId").val($("#updateid").val());
		   var d=new Date(v.date);
			var curr_date = d.getDate();
			var curr_month = d.getMonth() + 1; 
			var curr_year = d.getFullYear();
			var date = curr_date+"-"+curr_month+"-"+curr_year;
			$(".st_date").val(date);
		   
		   
			 $("#className").html(v.services);
			if(v.e_first_name!="" || v.e_last_name!=""){
			$("#trainers").html(v.e_first_name+" "+v.e_last_name);
			}else{
			$("#trainers").css("display",'none');
			}
			$("#StartDate").html(v.date);
			$("#StartTime").html(v.time);
			$(".messageNote").val(v.note);
			if(v.status=='active'){
			    var url = base_url+"bcalendar/checkfordelete";
					$.ajax({
					type: "POST",
					url: url,
					data: { date : v.date,business_id:v.business_details_id,starttime:v.time,action:'reschedule'},
					success: function(data) {
					  if(data==0){ 
						$(".cancelClass").hide();
                        $(".closeclassapp").show();	//$(".cancelClass").attr('value',appsclose).removeClass('btn-danger').attr('data-val','Close');
						}else if(data==1){
						$(".cancelClass").show();
						$(".closeclassapp").show();
						}
					}
				})
			}else{
			$(".cancelClass").hide();
			$(".closeclassapp").show();
			//$(".cancelClass").attr('value',appsclose).removeClass('btn-danger').attr('data-val','Close');
			}
		  })
	   }
	   })
	}else{
	$(".messageNote").attr('disabled',false);
	 $("#details").show();
	$("#type").html('class');
	$(".cancelClass").hide();
	$(".closeclassapp").hide();
	$("#bookClass").show();
	$(".business_id").val(" "); 
    $("#eventId").val(" ");
	//$("#updateid").val(" ");
	$(".st_date").val(" ");
	}
})

$('#book').on('show', function () { 
// if($("#apptype").val()=='booknewapp'){ alert("s");
// getdetails();
// }else{  
 $('.error').html('');
 if($("#eventId").val()!=" " && $("#apptype").val()=='rescheduleapp'){  
   if($(".reschduleId").val()=='0' && $(".show").val()=='0'){
     $(".show").val('1');
     $(".staff").attr('disabled',true);
	 $(".time").attr('disabled',true);
	 $(".messageNote").attr('disabled',true);
	 $(".add-on").hide();
	 $(".st_date").removeClass("span12");
	 showappDetails();
	 $(".showlist").show();
	 $(".showdropdown").hide();
	 }
	 
      
	 }else if($(".show").val()=='0'){
     $(".showlist").hide();
	 $(".showdropdown").show();	
     $(".show").val('1');	 
	 $(".reschduleId").val('1');
	 $(".st_date").addClass("span12");
	  $(".add-on").show();
	 $("#eventId").val("");
	 $("#deleteApp").attr('value',cancelapp).addClass('btn-danger').attr('data-val','Cancel Appointment');
	 $(".delete_app").hide();
	 $(".reschedule_app").hide();
	 $(".book_app").attr('value',appsbook);
	 $(".book_app").show();
	
	 //$(".eventGroup").attr('disabled',false);
	 $(".staff").attr('disabled',false);
	 $(".time").attr('disabled',false);
	 $(".messageNote").attr('disabled',false);
	 getdetails();
	 }
 //}
})

$(".reschedule_app").click(function(){
     $(".showlist").hide();
	 $(".showdropdown").show();
     $(".reschduleId").val('1');
	 $(".add-on").show();
	 $(".st_date").addClass("span12");
     $(".delete_app").show();
	 $(".reschedule_app").hide();
	 $(".book_app").attr('value',appsdone);
	 $("#deleteApp").attr('value',cancel).removeClass('btn-danger').attr('data-val','Cancel');
	 $(".book_app").show();
	 $(".eventGroup").attr('disabled',false);
	 $(".staff").attr('disabled',false);
	 $(".time").attr('disabled',false);
	 $(".messageNote").attr('disabled',false);
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
  
  var string = '<div class="dropdown"><a class="dropdown-toggle btn-service semi-large" data-toggle="dropdown" href="javascript:;">Select Services<b class="caret pull-right"></b></a><ul class="dropdown-menu appointment-popup-ul semi-large drop-down-checkbox" role="menu" aria-labelledby="dLabel">';
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
	getserviceStaffs($("#services_id").html(),$("#employee_id").html(),business_id,$("#time").html());
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
			 $(".message").addClass("alert").html(cannotrescheduleappointment);
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
	if($("#eventid").html()!=''){
	var eventId=$("#eventid").html();
	}
	var services = $("#selectedService").val();
	if($(".time").val()!=''){
	var timeslot=$(".time").val();
	var action=$('.time').attr('action');
	//getendtime(services,$(".time").val(),$(".st_date").val(),business_id,staff_id,eventId,action);
	}else{
	var timeslot='';
	}
	var selected='';
	//getserviceStaffs($("#selectedService").val(),selected,business_id); 
	gettimeslots($(".st_date").val(),business_id,staff_id,eventId,timeslot);
	if($(".time").val()!=''){
	var timeslot=$(".time").val();
	var action=$('.time').attr('action');
	getendtime(services,$(".time").val(),$(".st_date").val(),business_id,staff_id,eventId,action);
	}else{
	var timeslot='';
	}
})


$(".time").live("change",function(){
		$(".message").removeClass("alert").html(" ");
		var starttime = $(this).val();
		
		    var service_ = $("#selectedService").val();
			var status=1;
			var date = $(".st_date").val();
			var staffid = ""; 
			if($(".staff").val()!='Select staff'){
				staffid=$(".staff").val();
			}
			
		var business_id = $(".business_id").val();
		getserviceStaffs(service_,staffid,business_id,$(".time").val());
		var myUrl = base_url+"bcalendar/getendtimeByservice";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { service_id : service_,starttime:starttime,date:date,business_id:business_id ,status:status ,action:$('.time').attr('action'),eventId:$('.time').attr('eventId'),staffid:staffid},
			success: function(data) {
				if(data==-2){ 
				 $(".message").addClass("alert").html(selectservice);
				 $(".book_appointment").attr("onsubmit","return false;");
				}else if(data==0){
				   $(".message").addClass("alert").html(timeslot);
				   $(".book_appointment").attr("onsubmit","return false;");
				}else if(data==-1){
				    $(".message").addClass("alert").html(cannotbookappointment);
					$(".book_appointment").attr("onsubmit","return false;");
				}else if(data==-3){
				    $(".message").addClass("alert").html(cannotbookfutureappointment);
					$(".book_appointment").attr("onsubmit","return false;");
				}else if(data==-4){
				    $(".message").addClass("alert").html(nonworkingday);
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


 
  $("#staffSelect").live('change',function(){ 
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
				   
				   $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html(timeslot).css({"display":"block","margin":"0px"});
					
				}else if(data==1){
				  
				  $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html(nonworkingday).css({"display":"block","margin":"0px"});
				    
				}else if(data==-1){
				  
				   $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html(cannotbookappointment).css({"display":"block","margin":"0px"});
				    
				}else if(data==-2){
				  $(".book_appointment").attr("onsubmit","return false;");
					$(".message").addClass("alert").html(cannotbookfutureappointment).css({"display":"block","margin":"0px"});
				 }else{
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
  
 }
 
/*Time Calculation for booking services*/
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
	var selected='';
	var staffid='';
	var endtime='';
	if($(".staff").val()!='' && $(".staff").val()!='Select staff'){
	var selected=$(".staff").val();
	var staffid=$(".staff").val();
	}
	if($(".staff").val()=='Select staff'){
	var selected='';
	var staffid='';
	}
	
	//var starttime = $("#eventStartTime").val();
	var starttime = $("#timeSlot").val();
	//var date= $("#eventStartDate").val();
	
	var date = $(".st_date").val();
	var checkedServices= $("#checkedServices").val(checked);
	$("#selectedService").val(checked);
	var eventId='';
	if($("#eventId").val()!=''){
	  eventId=$("#eventId").val();
	}
	var action=$('.time').attr('action');	
	$("#selectedService").val(checked);
	if(starttime!=""){ 
	getendtime(checked,starttime,date,$(".business_id").val(),staffid,eventId,action);
	}
	
	if($("#staffschedule").val()!=''){
	    var staffid=$("#staffschedule").val();
		staffSchedule($("#staffschedule").val(),$("#staffname").html());
	}else{
	getserviceStaffs(checked,selected,$(".business_id").val(),starttime);
	} 
    
 });
 
 

 
 $(".book_app").live('click',function(){
	if ($('.book_appointment :checkbox:checked').length <= 0){
      //alert("here");
	  $(".message").addClass("alert").html(selectservice);
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
    var messg=alreadybooked;
	$("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }else if(data=="login"){ 
    window.location.href=base_url+'home/clientlogin';
   }else{ 
     $("#available").html(data);
     var messg=bookedsuccessfully;
	 $("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }
	 
   }
 })
 
})





 function busytimesuccess(){
	if($("#repeatstatus").val()=='Remove Repeat'){
	  if($("#bweeklist").val()==''){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("No weekday selected.").css({"display":"block","margin":"0px"});
	  }if($(".endDate").val()==''){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("No end day selected.").css({"display":"block","margin":"0px"});
	  }if($(".busystarttime").val()==$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("starttime same as endtime").css({"display":"block","margin":"0px"});
	  }else{ 
		$("#book_busytime").attr("onsubmit","return true;");
	  }
	}else if($("#repeatstatus").val()=='Add Repeat'){
	   if($(".busystarttime").val()==$(".busyendtime").val()){
	     $("#book_busytime").attr("onsubmit","return false;");
		 $(".message").addClass("alert").html("starttime same as endtime").css({"display":"block","margin":"0px"});
	   }else{
	    $(".alltrue").val("1");
		$("#book_busytime").attr("onsubmit","return true;");
	  }
	}
 }
 
 
 function getdetails(){
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
	// showbookpopup(date,timeslot,businessid);
	 $("#eventId").val(" ");
	   // $("#book").modal('show');
	$("#note").val('');
	var append_option = "<option id='-1' >Select staff</option>";
	$(".staff").html(append_option); 
	 $(".time").attr('booking','multi');
     $(".time").attr('action','schedule');
	 //$("#selectedService").val(" ");
	 $(".services").html("");
	 $(".business_id").val(businessid);
	 $(".st_date").val(date); 
	 $(".date_pick").datepicker("setValue", date);
	 $(".date_pick").datepicker('update');
	// var staffid='';
	 var serviceid=" "; 
	 if($("#selectedService").val()!=''){
	   var serviceid=$("#selectedService").val();
	   var selected='';
	   var starttime='';
	   getserviceStaffs($("#selectedService").val(),selected,businessid,starttime);
	 }
	  getMultiService(businessid,serviceid,staffid);
	 
	if($("#staffsid").val()!=''){
	    //$(".time").attr('staff','1');
	    staffid=$("#staffsid").val();
		$("#staffschedule").val(staffid);
		$("#staffschedule").attr('ename',$("#staffname").html());
		staffSchedule(staffid,$("#staffname").html());
	}
	var eventId='';
	//var  timeslot=$("#eventStartTime").val();
	
	gettimeslots(date,businessid,staffid,eventId,timeslot);
	 
 }
 
$(".launch").on("click",function(){ 
    $("#selectedService").val(" ");
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
	  
     showbookpopup(date,timeslot,businessid);
	 //}
	   
	 }
	})
	
	
	
})

$("#closeVerify").click(function(){

var action=$(this).attr('data-val');
var url=base_url+'bcalendar/chckStatus';
var data='';
$.post(url,data,function(data){
 if(data==1){ 
     var date=$("#closeVerify").attr("date");
     var businessid= $("#closeVerify").attr("bid");
     var  timeslot=$("#closeVerify").attr('date-time');
	 if(action=='showmodal'){
     showbookpopup(date,timeslot,businessid);
	 }else if(action=='showmodal1'){ 
	 showbookpopup1(date,businessid,timeslot);
	 }
 }

})
//}
 
})

$(".book_me").live("click",function(){ 
     var service_id='';
     if($(this).attr("data-val")!=''){
	 service_id=$(this).attr("data-val");
	 }
	 $("#selectedService").val(service_id);
	  var date=$(".st_date").val();
	  var url=base_url+'bcalendar/checkVerify';
	  var business_id = $("#business_id").html();
	  var data='';
   $.post(url,data,function(data){
   if(data==1){
   $("#book").modal('show');
   //showbookpopup1(date,business_id,service_id);
   }else if(data==6){
	   $('#verifyModal').modal('show');
	   $("#closeVerify").attr("data-val","showmodal1");
	   $("#closeVerify").attr("date-time",service_id);
	   $("#closeVerify").attr("date",date);
	   $("#closeVerify").attr("bid",business_id);
	   $(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$("#verifyP").show();
		$("#getnumber").hide();
	 }else if(data==7){
	    $("#closeVerify").attr("data-val","showmodal1");
		$("#closeVerify").attr("date-time",service_id);
	    $("#closeVerify").attr("date",date);
	    $("#closeVerify").attr("bid",business_id);
	    $('#verifyModal').modal('show');
		$(".alert").hide();
		$("#key").val("");
		$("#updatePhone").val("");
		$("#verifyP").hide();
		$("#getnumber").show();
	 }
   
  })
   

});

function showbookpopup1(date,business_id,service_id){
	$("#book").modal('show');
    $("#eventId").val("");
	 $(".delete_app").hide();
	 $(".add-on").show();
	 $(".st_date").addClass("span12");
	 $(".reschduleId").val('1');
	 $(".reschedule_app").hide();
	 $(".book_app").show();
	 $(".staff").attr('disabled',false);
	 $(".time").attr('disabled',false);
	 $(".messageNote").attr('disabled',false); 
    $(".time").attr('action','schedule');
    $(".message").removeClass("alert").html(" ");
	
	$(".services").html("");
    var append_option = "<option id='-1' >Select staff</option>";
	$(".staff").html(append_option);	
	var serviceid=" ";
	$("#selectedService").val("");
	if(service_id!=''){
	 $("#selectedService").val(service_id);
	 serviceid=service_id;
	 getserviceStaffs(serviceid,selected='',business_id);
	 }
	getMultiService(business_id,serviceid,staff_id='');
	gettimeslots(date,business_id,staff_id='',eventId='',timeslot='');

}

function showbookpopup(date,timeslot,businessid){
	 $("#eventId").val(" ");
	    $("#book").modal('show');
	$("#note").val('');
	var append_option = "<option id='-1' >Select staff</option>";
	$(".staff").html(append_option);
	 $(".time").attr('booking','multi');
     $(".time").attr('action','schedule');
	 $("#selectedService").val(" ");
	 $(".services").html("");
	 $(".business_id").val(businessid);
	 $(".st_date").val(date); 
	 var staffid='';
	 var serviceid=" ";
	if($("#staffsid").val()!=''){
	    //$(".time").attr('staff','1');
	    staffid=$("#staffsid").val();
		$("#staffschedule").val(staffid);
		$("#staffschedule").attr('ename',$("#staffname").html());
		staffSchedule(staffid,$("#staffname").html());
	}
	var eventId='';
	//var  timeslot=$("#eventStartTime").val();
	getMultiService(businessid,serviceid,staffid);
	gettimeslots(date,businessid,staffid,eventId,timeslot)
}

function staffSchedule(staffid,staffname){
	var append_option = "<option id="+staffid+" value="+staffid+" selected>"+staffname+"</option>";
	$(".staff").html(append_option);
}

function staffClassSchedule(staffid,staffname){
	var append_option = "<option id="+staffid+" value="+staffid+" selected>"+staffname+"</option>";
	$(".demo").html(append_option);
}


$('#postclass').on('show', function () { 
  if($("#apptype").val()=='postnewclass' && $("#apptype").attr('data-val')=='1'){
     schedulenewclass();
  }
})

function schedulenewclass(){
   $("#postclass").removeAttr("seriesid")
$("#addclass").removeAttr('data-toggle').removeClass('tab');
$("#addclient").removeAttr('data-toggle').removeClass('tab'); 
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
$("#StartDate").datepicker("setValue", $("#eventStartDate").val());
$("#StartDate").datepicker('update');
$(".StartTime").val($(".eventStartTime1").val());
$("#eventEndTime").val('');
$("#enroll_last").val('');
$("#class_size").val('');

$("#update").hide();$("#add").show();
$("#editpost").hide();$("#postnew").show();
$("#updateid").val(" ");
$("#postclass li:eq(1) ").removeClass("active in");
$("#postclass #edit_class").addClass("active in");
$("#postclass li:eq(0)").addClass("active"); $("#postclass #add_client  ").removeClass("active in");
//$("#postclass").modal("show");
$("#removeClient").hide();
$("#addClient").show();
$("#clientform")[0].reset();
$("#action").val("javascript:rzAddEvent();");  
$(".postclassbtn").attr("href",$("#action").val()); 
if($(".trainerid").html()!=''){
 staffClassSchedule($(".trainerid").html(),$(".trainername").html());
 getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$(".trainerid").html(),eventId='',$(".StartTime").val());
}else{
getClassfreeslots($("#StartDate").val(),$("#login_id").html(),$("#trainer").val(),eventId='',$(".StartTime").val());
}
}

$(".launchClass").on("click",function(){
$("#postclass").removeAttr("seriesid")
$("#addclass").removeAttr('data-toggle').removeClass('tab');
$("#addclient").removeAttr('data-toggle').removeClass('tab'); 
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
$("#postclass li:eq(1) ").removeClass("active in");
$("#postclass #edit_class").addClass("active in");
$("#postclass li:eq(0)").addClass("active"); $("#postclass #add_client  ").removeClass("active in");
$("#postclass").modal("show");
$("#removeClient").hide();
$("#addClient").show();
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
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot,seriesid:$("#postclass").attr("seriesid")},function(info){
			//alert(info);
			if(info==0){
			$("#book").attr("href","javascript:;");
			//$(".book_appointment").attr("onsubmit","return false;");
			$(".message").addClass("alert").html(nonworkingday);
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
$("#addClient").show();
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
   $(".message").addClass("alert").html(updatedsuccessfully);
   }
  })
  
 }
 })
}else{
  $(".message").addClass("alert").html(clientname);
  return false;
}
})

$("#removeClient").click(function(){ 
	var url=base_url+"bcalendar/removeClient"; 
	$.post(url,{clientid:$(this).val(),classid:$("#eventId").html(),type:'class'},function(data){ 
	 $("#available").html(data); 
	 $("#clientform")[0].reset();
	 $("#removeClient").hide();
	 $("#addClient").show();
	 clientlist($("#eventId").html());
	 //$("#app"+$(this).attr('appid')).remove();
	})
})

$(".clientlist").click(function(){
 $("#clientlist").html("");
 $("#actionVal").val("");
 clientlist($("#eventId").html());
 
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
$("#addClient").hide();
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
    messg=cannotbookappointment;
   }else if(data==1){
     messg=alreadybooked;
   }else{
	 $("#available").html(data);
     messg=bookedsuccessfully;
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
				
				$('.date_pick').datepicker('hide');
				var business_id =$(".business_id").val();
				var staff_id = ''; 
				var eventId='';
				var timeslot='';
				var selected='';
				var action=$('.time').attr('action');
				if($(".time").val()!=''){
				 var timeslot=$(".time").val();
				}
				//alert($(".staff").val());
				if($(".staff").val()!='' && $(".staff").val()!='Select staff'){
				var selected=$(".staff").val();
				var staff_id=$(".staff").val();
				}
				if($(".staff").val()=='Select staff'){
				var selected='';
				var staff_id='';
				}
				// if($(".staff").val()=='Select staff'){
				// var selected='';
				// }
				if($("#staffschedule").val()!=''){
					var staff_id=$("#staffschedule").val();
					staffSchedule($("#staffschedule").val(),$("#staffname").html());
				}else{
				getserviceStaffs($("#selectedService").val(),selected,business_id,$(".time").val()); 
				}
				gettimeslots($(".st_date").val(),business_id,staff_id,eventId,timeslot);	
				if(timeslot!=''){
				var services=$("#selectedService").val();
				getendtime(services,$(".time").val(),$(".st_date").val(),business_id,staff_id,eventId,action);
				}
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
				//$(".demo").html("");
				
				 var url = base_url+"bcalendar/checkCstartdate";
				  $.post(url,{startdate:$(".class_stdate").val(),enddate:$(".class_eddate").val(),repeatStatus:$("#repeatstatus").val()},function(data){
					 var str=data;
					 var data=str.trim();
					 if(data==-1){
						$(".message").addClass("alert").html("end date less than start date");
		                $(".postclassbtn").attr("href","javascript:;");
						
					 }else{
					   //$(".postclassbtn").attr("href",$("#action").val());
						//$("#book_busytime").attr("onsubmit","return true;");
					 
				   
				
				
				if($(".trainerid").html()!=''){
				 staffClassSchedule($(".trainerid").html(),$(".trainername").html());
				 getClassfreeslots($("#StartDate").val(),$("#business_id").html(),$(".trainerid").html(),eventId='',$(".timeslot").val());
				 getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$(".timeslot").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');
			   }else{
				getClassStaffs($("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),selected='');
				 getClassfreeslots($("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventId='',$(".timeslot").val());
				getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$(".timeslot").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid='');	
				}
}	
})			
			});
			
$(".class_eddate").on('changeDate',function(){ 
      checkforclassDate($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val());
})
	
function checkforclassDate(startdate,enddate,repeatStatus){
  var url = base_url+"bcalendar/checkCstartdate";
	  $.post(url,{startdate:startdate,enddate:enddate,repeatStatus:repeatStatus},function(data){
		 var str=data;
		 var data=str.trim();
		 if(data==-1){
			$(".message").addClass("alert").html("end date less than start date");
			$(".postclassbtn").attr("href","javascript:;");
			
		 }else{
		 $(".postclassbtn").attr("href",$("#action").val());
		 }
})
}
	
function gettimeslots(start_date,business_id,staff_id,eventId,timeslot){ 
	var url = base_url+"bcalendar/getfreeslotsbydate";
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot},function(info){
			//alert(info);
			if(info==0){
			//$("#book").attr("href","javascript:;");
			$(".book_appointment").attr("onsubmit","return false;");
			$(".message").addClass("alert").html(nonworkingday);
			//$(".time").html(""); 
			}else if(info==-2){
				$(".book_appointment").attr("onsubmit","return false;");
				$(".message").addClass("alert").html(cannotbookfutureappointment).css({"display":"block","margin":"0px"});
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
 if($("#updateid").val()!=''){
  var eventid=$("#updateid").val();
 }else{
 var eventid='';
 }
 getClassEndtime($(".class_stdate").val(),$(".class_eddate").val(),$("#repeatstatus").val(),$("#eventStartTime").val(),$("#eventGroup").val(),$("#StartDate").val(),$("#business_id").html(),$("#trainer").val(),eventid);
})

_page = window.location.pathname.split('/')[2];
//alert(window.location.pathname.split('/')[3]);
       $('a[href="'+_page+'"],a[href="'+window.location.pathname.split('/')[3]+'"]').parent().addClass('active');
	   

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
apprise(confirmdelete, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	
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
	  $(".message").addClass("alert").html(settingsinserted).css('display','block');
	  }else{
	  $(".message").addClass("alert").html(settingsupdated).css('display','block');
	  }
	})
  })
  $(".hidealerttab").click(function(){
  if($(this).attr('href')=='#Personal'){
     $("#showProfile").show();
	 $("#action").show();
	 $("#editProfile").hide();
  }
  if($(this).attr('href')=='#Password'){
      $("#password").val("");
      $("#confirmpassword").val("");
  }
  if($(this).attr('href')=='#Credit'){
      $("#showDetails").show();
      $("#editDetails").hide();
	  $("#editicon").show();
  }
 // $("#showDetails").show();
//  $("#editDetails").hide();
 // $("#editicon").show();
 // $("#showProfile").show();
 //$("#action").show();
 // $("#editProfile").hide();
 //alert($(this).attr('href'));
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

$(".confirmbutton").click(function(){
   $("#alertpopup").modal('hide');
})

$(document).click(function(event) {
   if($(event.target).parents().index($('#defaultNewEventTemplate')) == -1) {
       if($('#defaultNewEventTemplate').is(":visible")) {
           $('#defaultNewEventTemplate').hide()
       }
   }        
})

