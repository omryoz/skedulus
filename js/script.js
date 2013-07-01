/* 
	Author:Eulogik 
	Programmer :  Swathi,Rakesh
	Designer :  Pankaj
*/


/*
$(function(){
       
       var nowTemp = new Date();
   var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

       var checkin = $('#start_date').datepicker({
         onRender: function(date) {
           return date.valueOf() < now.valueOf() ? 'disabled' : '';
         }
       }).on('changeDate', function(ev) {
         if (ev.date.valueOf() > checkout.date.valueOf()) {
           var newDate = new Date(ev.date)
           newDate.setDate(newDate.getDate() + 1);
           checkout.setValue(newDate);
         }
         checkin.hide();
         $('#end_date')[0].focus();
       }).data('datepicker');
       var checkout = $('#end_date').datepicker({
         onRender: function(date) {
           return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
         }
       }).on('changeDate', function(ev) {
         checkout.hide();
       }).data('datepicker');
});*/

	
	
//Global variable 

var base_url = "http://localhost/skedulus_svn/";
	
$('.tool').tooltip('hide')



$(document).ready(function(){

$(".book_me").live("click",function(){
	var business_id = $("#business_id").html();
	$(".services").html("");
	getservices(business_id);
});

function getservices(business_id){
	var url = base_url+"bcalendar/getserviceBybusinessfilter";
	$.post(url,{business_id:business_id}, function(data){
		
		$.each(eval(data), function( key, value ) {
			var append = "<option id="+key+" value="+value.service_id+">"+value.name+"</option>";
			$(".services").append(append);
		});
	});
}

/*Get staff name*/

$(".services").live("change",function(){
	var url = base_url+"bcalendar/getstaffnameByfilter";
	$.post(url,{service_id:$(this).val()}, function(data){
		$(".staff").html("");
		$.each(eval(data), function( key, value ) {
			var append_option = "<option id="+key+" value="+value.users_id+">"+value.first_name+""+value.last_name+"</option>";
			$(".staff").append(append_option);
		});
	});
	
});

$(".time").live("change",function(){
		//alert("Hey");
	
		var starttime = $(this).val();
		var service_ = $(".services").val();
		var date = $(".st_date").val();
		var business_id = $("#business_id").html();
		//alert(date);
		//alert(starttime);	
		//alert(service_);
		var myUrl = base_url+"bcalendar/getendtimeByservie";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { service_id : service_,starttime:starttime,date:date,business_id:business_id },
			success: function(data) {
				//alert(data);
				if(data==0){
					alert("Time Slots Not Available Which you are trying with services")		;
				}else{
					console.log(data);
					$("#end_time").val(data);
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
/*
$(".st_date").live("click",function(){
	alert((this).val());	
});*/

/*
$(".st_date").live("click",function(){ 
	
	var business_id = $("#business_id").html();
	//alert(business_id);
	//alert($(".st_date").val()); 
	var url = base_url+"bcalendar/getfreeslotsbydate";
	$.post(url,{date:$(".st_date").val(),business_id:business_id},function(info){
		//alert(info);
		if(info==0){
			//$(".btn-success").attr("href","javascript:;");
			$(".message").addClass("alert").html("We won't work on selected date kindly select another day");
			
		}
		else{
			$(".time").html(""); 
			$(".time").append(info);
		}
	});
	
});*/




/*Time Calculation*/
$(".eventGroup").live("click",function(){ 
	var checked = '';
	$('input:checkbox[name=eventGroup]').each(function() 
	{   
		if($(this).is(':checked')){
			checked = checked  + $(this).val() +',';	
		}	
	});	
		var starttime = $("#eventStartTime").val();
		//alert(starttime);	
		var myUrl = base_url+"bcalendar/getendtime";
		$.ajax({
			type: "POST",
			url: myUrl,
			data: { checked : checked,starttime:starttime },
			success: function(data) {
				//alert(checked);
				//alert('it worked');
				//alert(data);
				$("#eventEndTime").val(data);
			},
			error: function() {
				//alert('it broke');
			},
			complete: function() {
				//alert('it completed');
			}
		});
 });
 


/*var countChecked = function() {
  var n = $( "input:checked" ).length;
  //$( "div" ).text( n + (n === 1 ? " is" : " are") + " checked!" );
};
countChecked();*/

/*$("input[type=checkbox] #eventGroup").on("click",function(){
	alert("hello");
});*/

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
				var business_id = $("#business_id").html();
				//alert(business_id);
				//alert($(".st_date").val()); 
				var url = base_url+"bcalendar/getfreeslotsbydate";
				$.post(url,{date:$(".st_date").val(),business_id:business_id},function(info){
				//alert(info);
				if(info==0){
				//$("#book").attr("href","javascript:;");
				
				$("#book_appointment").attr("onsubmit","return false");
				
				$(".message").addClass("alert").html("We won't work on selected date kindly select another day");

				}
				else{
				$("#book_appointment").attr("onsubmit","return true");	
				$(".time").html(""); 
				$(".time").append(info);
				$(".message").removeClass("alert").html("");
				}
				});
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

