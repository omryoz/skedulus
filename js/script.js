/* 
	Author:Eulogik 
	Programmer :  Swathi,Rakesh
	Designer :  Pankaj
*/



//Global variable 

var base_url = "http://localhost/skedulus/";
	
$('.tool').tooltip('hide')


function bookService(serviceid){ 
	var business_id = $("#business_id").html();
	$(".services").html("");
	getservices(business_id,serviceid);
}

$(document).ready(function(){
$("#eventGroup").live("change",function(){  
  var class_name = $(this).val();
   if(class_name==""){
    $(".demo").html("");
	$("#eventEndTime").val("");
   }else{ 
	var url = base_url+"bcalendar/getAllstaff";
	$(".demo").html("");
	$.post(url,{class_name:class_name}, function(data){
		$.each(eval(data), function( key, value ) { 
			var append_option = "<option id="+key+" value="+value.id+">"+value.name+"</option>";
			$(".demo").append(append_option);
		});
	});
	
	var url1 = base_url+"bcalendar/endTimeClass";
	$.post(url1,{starttime:$("#eventStartTime").val(),class_id:class_name},function(data){
	 $("#eventEndTime").val(data);
	});
  }
});

//For rescheduling of appointments
$("#reschedulebtn").live("click",function(){ 
  $("#reschedule").modal('hide');
  $("#bookmultiServices").modal('show');
 // alert($("#eventId").html());
  var business_id = $("#business_id").html(); 
  $("#businessid").val($("#business_id").html());
  $("#eventid").val($("#eventId").html());
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
			var str = "<li><input type='checkbox' name='serviceID' "+checked+" class='serviceID' value="+value.id+"  />"+value.name+"</li>";
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
	
	
	$(".start_date").val(date);
	getserviceStaffs($("#services_id").html(),$("#employee_id").html());
	if($("#employee_id").html()!=0){
	  var staff_id=$("#employee_id").html();
	}else{
	  var staff_id='';
	} 
	$(".time").attr('action','reschedule');
	gettimeslots($("#date").html(),business_id,staff_id,$("#eventId").html(),$("#time").html());
})

$(".book_me").live("click",function(){  
    $(".time").attr('action','schedule');
    $(".message").removeClass("alert").html(" ");
	var business_id = $("#business_id").html();
	$(".services").html("");
	$(".time").html(" ");
	$(".st_date").val(" ");
	var serviceid="";
	var bookService=$(this).attr("data-val");
	if(bookService)
	var serviceid=bookService;
	getservices(business_id,bookService);
});

$(".bookmultiServices").live("click",function(){ 
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
			var str = "<li><input type='checkbox' name='serviceID' class='serviceID' value="+value.id+" />"+value.name+"</li>";
			string = string + str;
			
		});
		var closeul='</ul></div></div>';	
			string=string+closeul;
			$("#checkbox").html(string);
	});
	
})

function getservices(business_id,serviceid){   
	var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$.post(url,{business_id:business_id}, function(data){ 
	var append_option = "<option value='' >Select service</option>";
		$(".services").append(append_option);
		$.each(eval(data), function( key, value ) {
		  var selected=" ";
		  if(serviceid==value.id){
		  var selected="selected";
		   }
			var append = "<option id="+key+" value="+value.id+" "+selected+">"+value.name+"</option>";
			//var append = "<li><input type='checkbox' name='eventGroup' class='eventGroup' value="+key+" />"+value.name+"</li>";
			//alert(append);
			$(".services").append(append);
		});
	});
	if(serviceid!=" ")
	getStaffs(serviceid);
}

function getStaffs(serviceid){
 var url = base_url+"bcalendar/getstaffnameByfilter";
  $.post(url,{service_id:serviceid}, function(data){ 
		$(".staff").html(""); 
		var append_option = "<option id='-1' >Select staff</option>";
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
	 $(".time").html(" ");
	$(".st_date").val(" ");
})


$(".time").live("change",function(){
		//alert("Hey");
		$(".message").removeClass("alert").html(" ");
		var starttime = $(this).val();
		var service_ = $(".services").val();
		var status="";
		var date = $(".st_date").val(); //alert(service_);
		if(service_=="SelectService"){
		    // alert($("#services").val());
			 service_ = $("#selectedService").val();
			 status=1;
			 date = $(".start_date").val();
		}
		
		var business_id = $("#business_id").html();
		//alert(date);
		//alert(starttime);	
		//alert(service_);
		var myUrl = base_url+"bcalendar/getendtimeByservie";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { service_id : service_,starttime:starttime,date:date,business_id:business_id ,status:status ,action:$('.time').attr('action')},
			success: function(data) {
				if(data==-2){ 
				 $(".message").addClass("alert").html("Select atleast one service");
				 $(".book_appointment").attr("onsubmit","return false;");
				 // alert("Select atleast one service");
				}else if(data==0){
					alert("Time Slots Not Available Which you are trying with services");
					$(".book_appointment").attr("onsubmit","return false;");
				}else if(data==-1){
				    $(".message").addClass("alert").html("Cannot book");
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
	getserviceStaffs(checked,selected);
	
 });

function getserviceStaffs(checked,selected){ 
	var url = base_url+"bcalendar/getstaffnamesByfilter";
	$.post(url,{service_id:checked}, function(data){ 
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
 
 /* $(".staff").live('change',function(){
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
	getendtime(checkedServices,starttime,date,$("#business_id").val(),$staffid);
 }) */
 
 function getendtime(checked,starttime,date,business_id,staffid){
	var myUrl = base_url+"bcalendar/getendtime";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { checked : checked,starttime:starttime,date:date,business_id:business_id,staffid:staffid },
			success: function(data) {  
				if(data==0){
				    $("#bookAppbtn").attr("href","javascript:;");
					$(".message").addClass("alert").html("Time Slot selected is not enough");
					//alert("Time Slots Not Available Which you are trying with services");
				}else if(data==1){
				    $("#bookAppbtn").attr("href","javascript:;");
					$(".message").addClass("alert").html("We won't work on selected date kindly select another day");
				    //alert("We won't work on selected date kindly select another day");
				}else if(data==-1){
				    $("#bookAppbtn").attr("href","javascript:;");
					$(".message").addClass("alert").html("Cannot book");
				    //alert("We won't work on selected date kindly select another day");
				}else{
				    $("#bookAppbtn").attr("href","javascript:rzAddEvent();");
					$("#eventEndTime").val(data);
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
	var checked = '';
	$('input:checkbox[name=eventGroup]').each(function() 
	{   
		if($(this).is(':checked')){
			checked = checked  + $(this).val() +',';	
		}	
	});	
	selected='';
	var starttime = $("#eventStartTime").val();
	var date= $("#eventStartDate").val();
	var checkedServices= $("#checkedServices").val(checked);
	getserviceStaffs(checked,selected);
	getendtime(checked,starttime,date,$("#business_id").val(),$(".users_id").val());
 });
 
 
 // $(".book_app").live('click',function(){
    // alert("here");
 // })
 
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
    // var selected= new Date($("#eventStartDate").val());
	// var today=new Date();
	// if(selected < today){
	 // alert("Cannot book");
	// }else{
	$("#bookApp").modal('show');
	$(".staff").val('');
	$(".message").removeClass("alert").html(" ");
	//}
})






$(".launchClass").on("click",function(){ 
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
//$("#EndDate").val($("#eventEndDate").val());
//$("#postclass")[0].reset();
$("#update").hide();$("#add").show();
$("#editpost").hide();$("#postnew").show();
$("#updateid").val(" ");

$("#postclass").modal("show");
	//$("body").append('<div class="modal-backdrop fade in" id="darker"></div>');
})



$("#addClient").on("click",function(){
 var data=$("#clientform").serialize()+'&classid='+$("#eventId").html();
 $.ajax({
 url:base_url+"bcalendar/addClient",
 data:data,
 type:'POST',
 success:function(data){
  $.each(eval(data),function(i,v){
  if(v.action=='add'){
   var clientHtml='<li><a href="javascript:;" onclick="editclient('+v.id+')" >'+v.name+'</a></li>';
   $("#clientlist").append(clientHtml);
   }else{
   alert("updated");
   }
  })
  
 }
 })

})

$(".clientlist").click(function(){
 var data='&classid='+$("#eventId").html();
 $("#clientlist").html("");
 $.ajax({
 url:base_url+"bcalendar/clientlist",
 data:data,
 type:'POST',
 success:function(data){ 
  $.each(eval(data),function(i,v){ 
   var clientHtml='<li><a href="javascript:;" class="editclient" onclick="editclient('+v.users_id+')" >'+v.first_name+'</a></li>';
   $("#clientlist").append(clientHtml);
  })
  
 }
 })
})

$("#bookClass").click(function(){ 
 $.ajax({
  url:base_url+"bcalendar/bookclass",
  data:{classid:$("#updateid").val(),note:$("#note").val(),starttime:$("#starttime").html(),endtime:$("#endtime").html(),date:$("#StartDate").html(),businessid:$("#business_id").html()},
  type:"POST",
  success:function(data){ 
  var messg="";
//$("#booksuccess").html(messg);  
   if(data==0){ 
    window.location.href=base_url+'home/clientlogin';
   }else{
     if(data==1){
	 
     messg="Already Booked";
	 } else{
	 $("#available").html(data);
     messg="Booked Successfully";
	 }  
     
	 $("#booksuccess").html(messg);
	 $("#booksuccess").show();
   }
	 
   }
 })
})


$(".timeTxt").click(function(){
  var url1 = base_url+"bcalendar/endTimeClass";
	$.post(url1,{starttime:$(".StartTime").val(),class_id:$("#eventGroup").val()},function(data){
	 $("#eventEndTime").val(data);
	});
})

_page = window.location.pathname.split('/')[2];
       $('a[href="'+_page+'"],a[href="'+window.location.pathname.split('/')[3]+'"]').parent().addClass('active');

});


			
			var nowTemp = new Date();
			var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
			/*$('.date_pick').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
			})*/
			$('.date_pick').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
			})
			.on('changeDate', function(ev){
				//alert("hello")
				$('.date_pick').datepicker('hide');
				var business_id = $("#business_id").html();
				var staff_id = $("#selectedstaff").val(); 
				if(staff_id!='Select staff'){
				staff_id = $("#selectedstaff").val();
				}else{
				staff_id='';
				}
				//alert($(".st_date").val());
				var eventId='';
				var timeslot='';
				gettimeslots($(".st_date").val(),business_id,staff_id,eventId,timeslot);
				//alert(business_id);
				//alert($(".st_date").val()); 
				
			});
			
			
			$('.date_picker').datepicker({
					onRender: function(date) {
						return date.valueOf() < now.valueOf() ? 'disabled' : '';
					}
			})
			.on('changeDate', function(ev){
				//alert("here")
				$('.date_picker').datepicker('hide');
				var business_id = $("#business_id").html();
				var staff_id = $("#selectedstaff").val(); 
				if(staff_id!='Select staff'){
				staff_id = $("#selectedstaff").val();
				}else{
				staff_id='';
				}
				//alert($(".start_date").val());
				var eventId='';
				var timeslot='';
				gettimeslots($(".start_date").val(),business_id,staff_id,eventId,timeslot);
				//alert(business_id);
				//alert($(".st_date").val()); 
				
			});
			
function gettimeslots(start_date,business_id,staff_id,eventId,timeslot){ 
	var url = base_url+"bcalendar/getfreeslotsbydate";
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot},function(info){
			//alert(info);
			if(info==0){
			//$("#book").attr("href","javascript:;");
			
			$(".book_appointment").attr("onsubmit","return false");
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

});


$('#postclass,#bookApp').modal({
  backdrop: 'static',
  show:false
})