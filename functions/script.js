
$(document).ready(function(){
$(".gallery_add").click(function(){
$("#addImage")[0].reset();

$('.error').html(''); 
var data='';
var url = base_url+"gallery/checkfornum";
 $.post(url,data,function(data){
    if(data==1){
	 $("#gallery").modal("show");
	 $("#showPhoto").show();
	 $("#update").hide();
	 $("#insert").show();
	 $("#edit").hide();
	 $("#add").show();
	}else{
	 apprise(morephotos, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	}
 })
})
$(".likes").on("click",function(){ 
 var user_id = $(this).attr("rel");
 if(user_id){
 var details_id = $(this).attr("alt");
 var ele = $(this);
 var type = ele.attr("id");
 var url = base_url+"businessProfile/likes_business/";
 var data = {"users_id":user_id,"details_id":details_id,"type":type};
 $.post(url,data,function(msg){
	var res = msg.split(",");
	console.log(res);
	if(res[0]==1){
		ele.addClass("icon-heart").removeClass("icon-heart-empty");
	}else{
		ele.addClass("icon-heart-empty").removeClass("icon-heart");
	}
	ele.attr("data-original-title",res[1]);
 });
 }else{
	apprise(kindlylogin);
 }
});



//Comment Functionality
//Phone verify
$("#insertPhone").click(function(){ 
$(".alert").hide();
var url=baseUrl+'cprofile/updatePhone';
 $.post(url,{phone:$("#updatePhone").val()},function(data){
 if(data==0){
   $(".alert").html(failedtosendmessage);
   $(".alert").show();
  
  }else{
    showblock(data);		
  }
 })
})

function showblock(data){
  $("#verifyP").show();
  $("#getnumber").hide();
  $("#phonenumber").html(data);
}

$(".changePhoneNum").click(function(){
  $(".alert").hide();
  $("#verifyP").hide();
  $("#getnumber").show();
  $(".back").show();
  $("#updatePhone").val("");
})

$(".back").click(function(){
   showblock();
})

$("#verifyPhone").click(function(){
$(".alert").hide();
var url=baseUrl+'cprofile/updateStatus';
  $.post(url,{phone:$("#updatePhone").val(),keycode:$("#key").val()},function(data){
    if(data==0){
	//alert("sorry");
	$(".alert").html(codenotsent);
	}else{
	$(".alert").html(phoneverified);
	}
	$(".alert").show();
  })
})

$(".sendagain").click(function(){
$(".alert").hide();
var url=baseUrl+'cprofile/sendagain';
  $.post(url,{phone:$("#updatePhone").val()},function(data){
   if(data==1){
    $(".alert").html(successfullysent);
	}else{
	$(".alert").html(failed);
	}
	$(".alert").show();
  })
})

});



function insertbasicInfo(){
var url=baseUrl+'basicinfo/insertData';
		$.ajax({
		data: { 'business_type':$("input[name='business_type']:checked").val(),'address':$("#Postcode").val() ,'category':$('#category').val() ,'mobile':$("#mobile").val(),'description':$("#description").val(),'calendar':$("#calendar").val(),'name':$("#name").val(),'hidLat':$("#hidLat").val(),'hidLong':$("#hidLong").val()},
		url: url,
		type:'POST',
		success:function(data){
		//alert("success");
		window.history.back();
		}
	})
}



function resetForm(id){  
$(".alert").hide();
$('.error').html(''); 
var data='';
var url = base_url+"staffs/checkfornum";
 $.post(url,data,function(data){ 
    if(data==1){
	 $("#myModal").modal("show");
	 $(".tab").attr('data-toggle','');
    $("#action").val('add');
    $("#userid").val(" ");
	$("#type").val(" ");
	$("#addstaffs")[0].reset();
 $("#myModal li:eq(1) ").removeClass("active in");
 $("#myModal li:eq(2) ").removeClass("active in");
 $("#myModal #add_staff").addClass("active in");
 $("#myModal li:eq(0)").addClass("active"); $("#myModal #add_availability , #add_service ").removeClass("active in");
 $("#assignstaff").val('');
 $("#showavail").val('');
	$(".assign").removeAttr('checked');
	getBavail(id);
	$("#edit").hide();
	$("#add").show();
	$("#update").hide();
	$("#insert").show();
	$(".alert").hide();
	}else{
	 apprise(morestaffs, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	}
 })

    
}
function getBavail(id){
var url=baseUrl+'staffs/manage_staffs';
	$.ajax({
		data: {'businessid': id,'getbavailability':'getbavailability'},
		url: url,
		type:'GET',
		success:function(data){
		//$("#showadd").hide();
		$("#showedited").html(data);
		 }
		
	})

}
//Services
function addServices(){
$(".alert").hide();
$('.error').html('');
$("#paddingtime").hide();
$("#padding_time").show();
$("#addservices")[0].reset();
$("#service-modal").modal("show");
$(".tab").attr('data-toggle','');
$("#id").val("");
$("#service-modal li:eq(1) ").removeClass("active in");
 $("#service-modal #general").addClass("active in");
 $("#service-modal li:eq(0)").addClass("active"); $("#service-modal #staff1  ").removeClass("active in");
 $("#assignservice").val('');
 $("#edit").hide();
	$("#add").show();
	$("#update").hide();
	$("#insert").show();
	$(".alert").hide();
	$(".assign").removeAttr('checked');
}

function editService(id,page){
$("#paddingtime").hide();
$("#padding_time").show();
$("#addservices")[0].reset();
$(".alert").hide();
$('.error').html('');
if(page=='profile'){
 $(".page").val('1');
}else{
  $(".page").val('0');
}
$("#service-modal li:eq(1) ").removeClass("active in");
 //$("#myModal li:eq(2) ").removeClass("active in");
 $("#service-modal #general").addClass("active in");
 $("#service-modal li:eq(0)").addClass("active"); $("#service-modal #staff1 ").removeClass("active in");
$(".tab").attr('data-toggle','tab');
$("#assignservice").val("1");


$(".staffs").removeAttr('checked');
	var url=baseUrl+'services/manage_services';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$(".id").val(v.id);
			$("#servicename").val(v.name);
			$("#type").val(v.time_type);
			$("#length").val(v.timelength);
			$("#price_type").val(v.type);
			if(v.type=='free'){
			$("#price").attr('disabled','disabled');
			$("#price").val();
			}else{
			 $("#price").removeAttr('disabled');
			 $("#price").val(v.price);
			}
			
			$("#description").val(v.details);
			if(v.padding_time!=0){
			$("#paddingtime").show();
			   $("#paddingTime").val(v.padding_time);
			   $("#padding_time_type").val(v.padding_time_type);
			   
			   $("#padding_time").hide();
			}
			$(".update").show();
			$(".insert").hide();
			$(".edit").show();
			$(".add").hide();
			//$(".close").hide();
		})
		}
	})
	$.ajax({
		data: {'serviceid': id,'getStaffs':'getStaffs'},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
		$("#"+v.users_id).attr('checked','checked');
		})
		}
	})
}

function deleteService(id){
	var deleteService= confirm("Are you sure you want to delete?");
	var url=baseUrl+'services/manage_services';
	if(deleteService){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}



//Services

/*Classes Related function */
function addClass(){
$(".alert").hide();
$('.error').html('');
$("#paddingtime").hide();
$("#padding_time").show();
$("#addclasses")[0].reset();
$("#class-modal").modal("show");
$(".tab").attr('data-toggle','');
$("#id").val("");
$("#class-modal li:eq(1) ").removeClass("active in");
 $("#class-modal #general").addClass("active in");
 $("#class-modal li:eq(0)").addClass("active"); $("#class-modal #staff1  ").removeClass("active in");
 $("#assignclass").val('');
 $("#edit").hide();
	$("#add").show();
	$("#update").hide();
	$("#insert").show();
	$(".alert").hide();
	$(".assign").removeAttr('checked');
}


function deleteClasses(id){
	var deleteService= confirm("Are you sure you want to delete?");
	var url=baseUrl+'services/manage_classes';
	if(deleteService){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}
function editclasses(id,page){
$("#paddingtime").hide();
$("#padding_time").show();
$("#addclasses")[0].reset();
$(".alert").hide();
$('.error').html('');
if(page=='profile'){
 $(".page").val('1');
}else{
  $(".page").val('0');
}
$("#class-modal li:eq(1) ").removeClass("active in");
 //$("#myModal li:eq(2) ").removeClass("active in");
 $("#class-modal #general").addClass("active in");
 $("#class-modal li:eq(0)").addClass("active"); $("#class-modal #staff1 ").removeClass("active in");
$(".tab").attr('data-toggle','tab');
$("#assignclass").val("1");

	var url=baseUrl+'services/manage_classes';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$(".id").val(v.id);
			$("#classname").val(v.name);
			$("#type").val(v.time_type);
			$("#length").val(v.timelength);
			$("#price_type").val(v.type);
			$("#price").val(v.price);
			$("#description").val(v.details);
			$("#class_size").val(v.class_size);
			if(v.padding_time!=0){
			$("#paddingtime").show();
			   $("#paddingTime").val(v.padding_time);
			   $("#padding_time_type").val(v.padding_time_type);
			   
			   $("#padding_time").hide();
			}
			$(".update").show();
			$(".insert").hide();
			$(".edit").show();
			$(".close").show();
			$(".add").hide();
			//$(".close").hide();
		})
		}
	})
	$.ajax({
		data: {'serviceid': id,'getStaffs':'getStaffs'},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
		$("#"+v.users_id).attr('checked','checked');
		})
		}
	})
}
/*Classes function end*/

//END

function getmydetails(id,businessid){
$(".alert").hide();
$('.error').html(''); 
var data='';
var url = base_url+"staffs/checkfornum";
 $.post(url,data,function(data){ 
    if(data==1){ 
	$("#myModal").modal("show");
$("#myModal li:eq(1) ").removeClass("active in");
 $("#myModal li:eq(2) ").removeClass("active in");
 $("#myModal #add_staff").addClass("active in");
 $("#myModal li:eq(0)").addClass("active"); $("#myModal #add_availability , #add_service ").removeClass("active in");
$(".tab").attr('data-toggle','tab');
$("#assignstaff").val('');
 $("#showavail").val('');
$(".assign").removeAttr('checked');
$("#assignstaffs").find('input:checkbox').removeAttr('checked');
$(".alert").hide();
 //$("#action").val('edit');
 $("#action").val('add');
 $("#assignstaffsbtn").show();
 $("#staffavailbtn").show();
 
$("#userid").val('');
$("#type").val('myself');
 staffDetails(id,'mydetails');
 services(id);
 getBavail(businessid);
}else{
	 apprise(morestaffs, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	}
	})

}

function staffDetails(id,type){
 var url=baseUrl+'staffs/manage_staffs';
	$.ajax({
		data: {'id': id,'type':type},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$("#id").val(v.id);
			$("#firstname").val(v.firstname);
			$("#lastname").val(v.lastname);
			$("#email").val(v.email);
			$("#phone_number").val(v.phone_number);
			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$("#add").hide();
			//$(".close").hide();
		})
		}
	})
 
}
function services(id){
var url=baseUrl+'staffs/manage_staffs';
	$.ajax({
		data: {'staffid': id,'getServices':'getServices'},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
		$("#"+v.service_id).attr('checked','checked');
		})
		}
	})

}

//Staff
function editStaff(id,page){
$('.error').html('');
if(page=='profile'){
 $(".page").val('1');
}else{
  $(".page").val('0');
}
 $("#myModal li:eq(1) ").removeClass("active in");
 $("#myModal li:eq(2) ").removeClass("active in");
 $("#myModal #add_staff").addClass("active in");
 $("#myModal li:eq(0)").addClass("active"); $("#myModal #add_availability , #add_service ").removeClass("active in");
$(".tab").attr('data-toggle','tab');
$("#assignstaff").val("1");
$("#showavail").val("1");
$(".assign").removeAttr('checked');
$("#assignstaffs").find('input:checkbox').removeAttr('checked');
$(".alert").hide();
 $("#action").val('edit');
 $("#assignstaffsbtn").show();
 $("#staffavailbtn").show();
$("#userid").val(id);
$("#type").val('');
 
 staffDetails(id,'staffs');
 services(id);	
	var url=baseUrl+'staffs/manage_staffs';
	$.ajax({
		data: {'staffsid': id,'getavailability':'getavailability'},
		url: url,
		type:'GET',
		success:function(data){
		//$("#showadd").hide();
		$("#showedited").html(data);
		 }
		
	})
}

		
function deleteStaff(id){
	var deleteStaff= confirm("Are you sure you want to delete?");
	var url=baseUrl+'staffs/manage_staffs';
	if(deleteStaff){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}
//END

//Offers
function editOffers(id){
$('.error').html('');
	var url=baseUrl+'offers/manage_offers';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$("#id").val(v.id);
			$("#title").val(v.title);
			$("#description").val(v.description);
			$("#type").val(v.type);
			if(v.type=="individual"){
			$("#individual").show();
			  $("#Ichecked"+v.services).attr("class","pull-right icon-ok");
			
			}
			if(v.type=="combo"){
			$("#combo").show();
				var myString = v.services, splitted = myString.split(","), i;
				for(i = 0; i < splitted.length; i++){ 
				$("#chck"+splitted[i]).attr("checked","true");
			    $("#Mchecked"+splitted[i]).attr("class","pull-right icon-ok");
				}
			}
			
			$("#discount").val(v.discount);
			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$("#add").hide();
			$(".close").hide();
		})
		}
	})
}

function deleteOffer(id){
	var deleteStaff= confirm("Are you sure you want to delete?");
	var url=baseUrl+'offers/manage_offers';
	if(deleteStaff){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}
//END


//Client
function addClient(){ 
$("#addClients")[0].reset();
$('.error').html('');
$("#client").modal('show');
$("#update").hide();
$("#insert").show();
$("#edit").hide();
$("#add").show();
$("#email").attr('disabled',false);
}


function editClient(id){
$('.error').html('');
	var url=baseUrl+'clients/manage_clients';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$("#id").val(v.id);
			$("#first_name").val(v.firstname);
			$("#last_name").val(v.lastname);
			$("#email").val(v.email);
			$("#phone").val(v.phone);
			if(v.email!=''){
			$("#email").attr('disabled',true);
			}else{
			$("#email").attr('disabled',false);
			}
			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$("#add").hide();
			//$(".close").hide();
		})
		}
	})
	
}

function deleteClient(id){
	var deleteClient= confirm("Are you sure you want to delete?");
	var url=baseUrl+'clients/manage_clients';
	if(deleteClient){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}

//END

//Gallery



function editPhoto(id){
$('.error').html('');
	var url=baseUrl+'gallery/manage_gallery';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
		$("#showPhoto").hide();
			$("#id").val(v.id);
			$("#title").val(v.title);
			$("#description").val(v.description);
			$("#order").val(v.order);
			$("#photo").val(v.photo);

			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$("#add").hide();
			//$(".close").hide();
		})
		}
	})
}


function deletePhoto(id){
	var deleteGallery= confirm("Are you sure you want to delete?");
	var url=baseUrl+'gallery/manage_gallery';
	if(deleteGallery){
	$.ajax({
		data:{'id':id,'delete':"delete"},
		url: url,
		type:'GET',
		success:function(data){
		  location.reload(true);
		}
	})
	}
}
//END


	
	
	$("#brepeat").click(function(){
 if($("#brepeathtml").html()=="Add Repeat"){
 var removediv="Remove Repeat";
  $("#brepeatdiv").show();
  $(".endDate").val("");
  $("#bweeklist").val("");
  $(".active").toggleClass("weekly");
  $(".weekly").removeClass("active");
  $("#bweeks").css("display",'block');
  
 }else{
 var removediv="Add Repeat";
   $("#brepeatdiv").hide();
   $("#bweeks").css("display",'none');
 }
 $("#brepeathtml").html(removediv);
 $("#brepeatstatus").val(removediv);
})
 var myVar="";
 $(".weekly").click(function(e){  
 if($("#bweeklist").val()!=""){
 myVar=$("#bweeklist").val();
 }
  $(this).toggleClass("weekly active");
  if(jQuery.inArray($(this).val(),myVar) == -1){
  myVar+=$(this).val()+",";
  }else{
  myVar=removebValue(myVar,$(this).val()); // "1,3"
 }
  $("#bweeklist").val(myVar);
 })

function removebValue(list, value) {  
  return list.replace(new RegExp(value + ',?'), '')
}

function getAllStaffs(business_id,staffid,date,starttime){
 var url = base_url+"bcalendar/getstaffnameByfilter";
  $.post(url,{business_id:business_id,date:date,starttime:starttime}, function(data){ 
		$(".bstaff").html(""); 
		var append_option = "<option id='-1' >Select Staff</option>";
		$(".bstaff").append(append_option);
		$.each(eval(data), function( key, value ) {
		var selected='';
		   if(value.users_id==staffid){
		     var selected='selected';
		   }
			var append_option = "<option id="+key+" value="+value.users_id+" "+selected+">"+value.first_name+""+value.last_name+"</option>";
			$(".bstaff").append(append_option);
		});
	});
}

function getfreetimeslots(start_date,business_id,staff_id,eventId,timeslot,timetype){ 
	var url = base_url+"bcalendar/getfreeslots";
			$.post(url,{date:start_date,business_id:business_id,staff_id:staff_id,eventId:eventId,timeslot:timeslot},function(info){
			var str=info;
            var info=str.trim();
			if(info==0){
			$(".alltrue").val("0");
			$(".message").addClass("alert").html(nonworkingday);
			 $("#book_busytime").attr("onsubmit","return false;");
			//$(".time").html(""); 
			}else{
			$(".alltrue").val("1");
			$("#book_busytime").attr("onsubmit","return true");	
			$("."+timetype).html(""); 
			$("."+timetype).append(info);
			$(".message").removeClass("alert").html("");
			
			}
			});
}

$("#multibusytime").click(function(){
$(".alltrue").val("0");
$('.busytype').attr('type-name','multi');
$(".btype").val('multi');
$("#busytime").modal('show');
$(".deletebusytime").show();
$("#editbusytime").modal('hide');
$("#bweeklist").val("");
getbusytimedetails();
})


function checkforbusytime(employeeid,date,starttime,endtime,eventId){
  var url = base_url+"bcalendar/checkfortime";
  $.post(url,{employeeid:employeeid,date:date,starttime:starttime,endtime:endtime,eventId:eventId},function(data){
     var str=data;
     var data=str.trim();
	 if(data==-1){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html(pastdates).css({"display":"block","margin":"0px"});
	 }else if(data==0){
	     $(".alltrue").val("0");
	     $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html("starttime same as endtime ").css({"display":"block","margin":"0px"});
	 }else if(data==-2){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html("Cannot schedule the bussy time now").css({"display":"block","margin":"0px"});
	 }else if(data==-3){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html("End time less than the start time").css({"display":"block","margin":"0px"});
	 }else if(data==-4){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html(nonworkingday).css({"display":"block","margin":"0px"});
	 }else{
	    $(".alltrue").val("1");
	    $("#book_busytime").attr("onsubmit","return true;");
	 }
   })
}

$(".busystarttime").change(function(){
$(".message").removeClass("alert").html(" ");
var d=new Date($(".StartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
	 var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year; 
 var url = base_url+"bcalendar/checkstarttime";
  $.post(url,{date:date,starttime:$(".busystarttime").val(),endtime:$(".busyendtime").val(),employeeid:$(".bstaff").val()},function(data){
     var str=data;
     var data=str.trim();
	 if(data==-1){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html(pastdates).css({"display":"block","margin":"0px"});
	 }else if(data==0){
	     $(".alltrue").val("0");
	     $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html("starttime same as endtime ").css({"display":"block","margin":"0px"});
	 }else if(data==-3){
	   $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html("End time less than the Start time").css({"display":"block","margin":"0px"});
	 }else if(data==-2){
	    $(".alltrue").val("0");
	    $("#book_busytime").attr("onsubmit","return false;");
		$(".message").addClass("alert").html(nonworkingday).css({"display":"block","margin":"0px"});
	 }else{
	    $(".alltrue").val("1");
	    $("#book_busytime").attr("onsubmit","return true;");
	 }
   })
})

$(".busyendtime").change(function(){
$(".message").removeClass("alert").html(" ");
 if($('.busytype').val()!=''){
   var eventId=$('.busytype').val(); 
  } 
     var d=new Date($(".StartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
	 var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year; 
     checkforbusytime($(".bstaff").val(),date,$(".busystarttime").val(),$(".busyendtime").val(),eventId);
})

$(".bstaff").change(function(){
$(".message").removeClass("alert").html(" ");
var eventId='';
 if($('.busytype').val()!=''){
   var eventId=$('.busytype').val(); 
  } 
   var staffid='';
  if($('.bstaff').val()!='Select Staff'){
      var staffid=$('.bstaff').val();
  }
  var businessid = $("#profileid").html();
  var d=new Date($(".StartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
	 var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year; 
	 var busystarttime='busystarttime';
	 var busyendtime='busyendtime';
	 var  starttimeslot=$(".busystarttime").val(); 
     var  endtimeslot=$(".busyendtime").val(); 
   getfreetimeslots(date,businessid,staffid,eventId,starttimeslot,busystarttime);
   getfreetimeslots(date,businessid,staffid,eventId,endtimeslot,busyendtime);
     checkforbusytime($(".bstaff").val(),date,$(".busystarttime").val(),$(".busyendtime").val(),eventId);
})

function getsinglebusytime(){
	$(".alltrue").val("0");
	$(".message").removeClass("alert").html(" ");
	$('.busytype').attr('type-name','single');
	$(".btype").val('single');
	$("#busytime").modal('show');
	$("#editbusytime").modal('hide');
	$(".deletebusytime").show();
	$("#bweeklist").val("");
	getbusytimedetails();
}

$("#singlebusytime").click(function(){
   getsinglebusytime();
})

$(".deletebusytime").click(function(){
	  apprise("Are you sure you want to delete busy time?", {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ deletebussytime(); }else{ return false; } });
})

function deletebussytime(){
  var url = base_url+"bcalendar/deletebusytime";
  if($('.busytype').attr('type-name')=='multi'){
    var val=$('.seriesid').val();
	var vals='seriesid';
  }else{
    var val=$('.busytype').val();
	var vals='id';
  }
  $.post(url,{id:val,type:vals,startdate:$(".StartDate").val(),enddate:$(".endDate").val()},function(data){
    window.location.href=base_url+'bcalendar/cal/'+$("#business_id").val();
  })
}

function getbusytimedetails(){
$(".note").val("");
  var url = base_url+"bcalendar/getbusytimedetails";
  $.post(url,{evid:$('.busytype').val(),busytype:$('.busytype').attr('type-name')},function(data){ 
      $.each(eval(data),function(i,v){ 
	       $(".StartDate").val(v.startdate);
		   $(".seriesid").val(v.seriesid);
		    var d=new Date(v.startdate);
			 var curr_date = d.getDate();
			 var curr_month = d.getMonth() + 1; 
			 var curr_year = d.getFullYear();
			 var date = curr_date+"-"+curr_month+"-"+curr_year;
		     var eventId=$('.busytype').val();
			 var staffid='';
			 if(v.employee_id!=0){
				  $('.bstaff').val(v.employee_id);
				  var staffid=v.employee_id;
			  }
			  getAllStaffs($("#business_id").val(),staffid,date,v.starttime);
		    var busystarttime='busystarttime';
			 var busyendtime='busyendtime';
		   getfreetimeslots(date,$("#profileid").html(),staffid,eventId,v.starttime,busystarttime);
		   getfreetimeslots(date,$("#profileid").html(),staffid,eventId,v.endtime,busyendtime);
		   //$(".busystarttime").val(v.starttime);
		  // $(".busyendtime").val(v.endtime);
		   $(".note").val(v.note); 
		   if($(".busytype").attr('type-name')=='multi'){
		    $("#bweeklist").val(v.weeklist);
			 var myString = v.weeklist, splitted = myString.split(","), i;
				for(i = 0; i < splitted.length; i++){ 
				$("#w"+splitted[i]).attr("class","btn weekly active");
				}
		     $(".endDate").val(v.enddate);
		     var removediv="Remove Repeat";
             $("#brepeatdiv").show();
             $("#bweeks").css("display",'block');
			 $("#brepeathtml").html(removediv);
             $("#brepeatstatus").val(removediv);
		   }else{
		      var removediv="Add Repeat";
			   $("#brepeatdiv").hide();
			   $("#bweeks").css("display",'none');
			   $("#brepeathtml").html(removediv);
			   $("#brepeatstatus").val(removediv);
		   }
	  })
  })
}

   function busytime(){
      $(".alltrue").val("0");
$("#bweeklist").val("");
$(".note").val("");
$(".bstaff").val("");
$(".message").removeClass("alert").html(" ");
$(".btype").val(''); 
$(".deletebusytime").hide();
$('.busytype').attr('type-name','');
$('.busytype').val("");
$('.seriesid').val("");
var d=new Date($("#eventStartDate").val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
	 var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year; 
	 var businessid = $("#profileid").html();
	 var  timeslot=$("#eventStartTime").val(); 
	 var eventId=''; 
	 var staffid='';
	 // if($('.bstaff').val()!='Select Staff'){
      // var staffid=$('.bstaff').val();
     // }
	 if($("#staffsid").val()!=''){
	  var staffid=$("#staffsid").val();
	}
	 var url1 = base_url+"bcalendar/checkbusyfordate";
$.post(url1,{date:date,business_id:businessid,staffid:staffid},function(data){
var str=data; var data=str.trim();
   if(data==0){
       apprise(pastdates, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } }); 
   }else if(data==-1){
      apprise(nonworkingday, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){  }else{ return false; } });
   }else{
      $("#busytime").modal('show');
      var url = base_url+"bcalendar/getstaffnameByfilter";
		getAllStaffs($("#business_id").val(),staffid,date,timeslot);
		  var busystarttime='busystarttime';
		  var busyendtime='busyendtime';
		 getfreetimeslots(date,businessid,staffid,eventId,timeslot,busystarttime);
		 getfreetimeslots(date,businessid,staffid,eventId,timeslot,busyendtime);
		 var removediv="Add Repeat";
		   $("#repeatdiv").hide();
		   $("#weeks").css("display",'none');
		   $("#repeathtml").html(removediv);
		   $("#repeatstatus").val(removediv);
		$(".StartDate").val($("#eventStartDate").val()); 
		$(".StartTime").val($(".eventStartTime1").val());
		$("#eventEndTime").val('');
   }
})
 
  }



$(".endDate").on('changeDate',function(){
   var url = base_url+"bcalendar/checkforenddate";
    $.post(url,{startdate:$(".StartDate").val(),enddate:$(".endDate").val()},function(data){
	   var str=data;
	   var data=str.trim();
	   if(data==-1){
	      $(".alltrue").val("0");
	      $("#book_busytime").attr("onsubmit","return false;");
		  $(".message").addClass("alert").html("End date less than start date.").css({"display":"block","margin":"0px"});
	   }else{
	   $(".alltrue").val("1");
	      $("#book_busytime").attr("onsubmit","return true;");
	   }
	})
})

$(".StartDate").on('changeDate',function(){
$(".message").removeClass("alert").html(" ");
  var  starttimeslot=$(".busystarttime").val(); 
  var  endtimeslot=$(".busyendtime").val(); 
  var eventId='';
  if($('.busytype').val()!=''){
   var eventId=$('.busytype').val(); 
  } 
  var staffid='';
  if($('.bstaff').val()!='Select Staff'){
      var staffid=$('.bstaff').val();
  }
  var businessid = $("#profileid").html();
  var d=new Date($(this).val());
	 var curr_date = d.getDate();
	 var curr_month = d.getMonth() + 1; 
	 var curr_year = d.getFullYear();
	 var date = curr_date+"-"+curr_month+"-"+curr_year; 
	 var busystarttime='busystarttime';
	 var busyendtime='busyendtime';
   getAllStaffs($("#business_id").val(),staffid,date,starttimeslot);
   getfreetimeslots(date,businessid,staffid,eventId,starttimeslot,busystarttime);
   getfreetimeslots(date,businessid,staffid,eventId,endtimeslot,busyendtime);
   checkforbusytime($(".bstaff").val(),date,$(".busystarttime").val(),$(".busyendtime").val(),eventId);
})


