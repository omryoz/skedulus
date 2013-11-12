
$(document).ready(function(){
$(".gallery_add").click(function(){
var data='';
var url = base_url+"gallery/checkfornum";
 $.post(url,data,function(data){
    if(data==1){
	 $("#gallery").modal("show");
	}else{
	 apprise('Cannot add more photos for the subscribed subscription', {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	}
 })
})
})

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
	 apprise('Cannot add more staffs for the subscribed subscription', {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
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
function editService(id){
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
			$("#id").val(v.id);
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
			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$("#add").hide();
			$(".close").hide();
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
function editclasses(id){
	var url=baseUrl+'services/manage_classes';
	$.ajax({
		data: {'id': id},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		$.each(content,function(i,v){
			$("#id").val(v.id);
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
			$("#update").show();
			$("#insert").hide();
			$("#edit").show();
			$(".close").show();
			$("#add").hide();
			$(".close").hide();
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
$("#assignstaff").val("1");
$("#showavail").val("1");
$(".assign").removeAttr('checked');
$("#assignstaffs").find('input:checkbox').removeAttr('checked');
$(".alert").hide();
 $("#action").val('edit');
 $("#assignstaffsbtn").show();
 $("#staffavailbtn").show();
 
$("#userid").val('');
$("#type").val('myself');
 staffDetails(id,'mydetails');
 services(id);
 getBavail(businessid);
}else{
	 apprise('Cannot add more photos for the subscribed subscription', {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
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
function editStaff(id){
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
function editClient(id){
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
			$(".close").hide();
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



