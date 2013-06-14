
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



function resetForm(name){
//alert(name);
	$("#"+name)[0].reset();
//$('#addservices')[0].reset();
 // $('#addOffers')[0].reset();
}

//Services
function editService(id){
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
			$("#price").val(v.price);
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
//END

//Staff
function editStaff(id){
	var url=baseUrl+'staffs/manage_staffs';
	$.ajax({
		data: {'id': id},
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
			$(".close").hide();
		})
		}
	})
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
	
	$.ajax({
		data: {'staffsid': id,'getavailability':'getavailability'},
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
		var content = eval(data);
		//alert(data);
		$.each(content,function(i,v){
		$("#"+v.weekid).attr('checked','checked');
		$("#"+v.weekid+"from").val(v.start_time);
		$("#"+v.weekid+"to").val(v.end_time);
		
		if(v.lunch_start_time!='00:00:00'){
		$("#L"+v.weekid).attr('checked','checked');
		$("#"+v.weekid+"Lfrom").val(v.lunch_start_time);
		$("#"+v.weekid+"Lto").val(v.lunch_end_time);
		}
		
		})
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
			$(".close").hide();
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

