$(document).delegate('#opendialog', 'click', function() {
  $('<div>').simpledialog2({
    mode: 'button',
    headerText: 'Choose',
    headerClose: true,
    buttons : {
      'My Info': {
        click: function () { 
          $('#buttonoutput').text('info');
		  var sessionid=sessionStorage.getItem('session');
		  profile(sessionid);
        },
		icon: "star"
      },
	   'Edit Info': {
        click: function () { 
          $('#buttonoutput').text('info');
		  $.mobile.changePage($("#myprofile"));
        },
		icon: "edit"
      },
	   'Change Image': {
        click: function () { 
          $('#buttonoutput').text('info');
		  $.mobile.changePage($("#changeImage"));
        },
		icon: "plus"
      },
	  'My recordings': {
        click: function () { 
          $('#buttonoutput').text('records');
		  $.mobile.changePage($("#myrecords"));
        },
        icon: "grid",
      },
	  'Change password': {
        click: function () { 
          $('#buttonoutput').text('Cancel');
		  $.mobile.changePage($("#changePassword"));
        },
        icon: "info",
      }
    }
  })
})

// Ajax Form Handler, returns JSON - GK
$(document).ready(function(){
	$('form.ajax-form-handler').on('submit', function(){
	$t = $(this);
	var sessionid=sessionStorage.getItem('session');
	var record_id=sessionStorage.getItem('recordid');
	
	$.ajax({
		  dataType: 'jsonp',
		  data: $t.serialize()+'&sessionid='+sessionid+'&record_id='+record_id,  
		  jsonp: 'jsonp_callback',
		  crossDomain: true,
		  url: $t.attr('action'),
		  success: eval($t.attr('data-callback'))
	});	
	return false;
	});
});

var show=function(data){
	var log = eval(data);
	$.each(log, function(i, v){
				var email= $('#sign_email').val();
				var atpos=email.indexOf("@");
				var dotpos=email.lastIndexOf(".");
				if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
				  {
				  var valid=0;
				  alert("Please enter a valid e-mail address"); 
				  return false;
				  }
			    if(valid!=0){
				if(v.flag==1){
				 $.mobile.changePage($("#login"));
			   }if(v.flag==0){
			   alert("Email already exist. Please try again");
			   return false;
			   }
			 }
	});	
}

var post_login = function(data){
	var log = eval(data);
	$.each(log, function(i, v){
			if(v.flag==0){
			alert("Email and Password does not match.Please try again");
		   }else{
			var sessionval= v.id;
			window.sessionStorage.setItem('session', sessionval);
			$.mobile.changePage($("#home"));	
			}
	});	
}


function logout(){
	var logout= logout;
	window.localStorage.removeItem('session');
	window.localStorage.removeItem('recordid');
	$.mobile.changePage($("#login"));
	
}

var addFriends=function(data){
		var ack= eval(data);
		$.each(ack, function(i,v){
			if(v.flag=="False"){
			alert("No result found");
			}else if(v.flag=="Pending"){
			alert("Request already sent");	
			}else if(v.flag == "Already friend"){
			alert("Already a friend");	
			}else {
			alert("Request sent successfully");	
			}
		  $.mobile.changePage($("#friends"));
		  $('#search').val("");
		})
}

var postRecords=function(data){
		alert("Successfully posted");
		location.reload();
		//$.mobile.changePage($("#home"));
}

$(document).ready(function(){
		$('#friends').bind('pageshow', function(event){
	   var sessionid=sessionStorage.getItem('session');
	$.ajax({
		   dataType:'jsonp',	 
		   url:'http://dev.eulogik.com/voiceit_server/info.php',
		   data: {'friends':"friends",'sessionid':sessionid},
		   jsonp:'jsonp_callback',
		   crossDomain:true,
		   success:function(data){
			   if(data!=""){
			       var friends = eval(data);
				   var htmlFriends = '<ul id="friendsList">';
				   $.each(friends, function(i, v){
				   if(v.id=='0'){
				   htmlFriends+='<li>'+v.nofriends+'</li>';
				   }else{
						htmlFriends+='<li><a onClick="profile('+v.id+')" href="#"><img src="themes/images/'+v.image+'">'+v.name+'</a></li>';
					}
					});
				   htmlFriends += "</ul>";
			        $('#showdivs').html(htmlFriends);
					$("#friendsList").listview();
			   }
			   }
		   })
    
	$.ajax({
	       dataType:'jsonp',
		   url:'http://dev.eulogik.com/voiceit_server/info.php',
		   data: {'pendingrequest': "pendingrequest",'sessionid':sessionid},
		   jsonp:'jsonp_callback',
		   crossDomain:true,
		   success:function(data){
			   if(data!=""){
					var Pendinglist = eval(data);
					var htmlPendingList = '<ul id="pendingList">';
					$.each(Pendinglist, function(i, v){
					if(v.id=='0'){
				   htmlPendingList+='<li>'+v.nofriends+'</li>';
				   }else{
						htmlPendingList+='<li id=hide'+v.id+'><a href="some.page?id='+v.id+'"><img src="themes/images/'+v.image+'">'+v.name+'</a><input type="button" name="Accept" value="Accept" onclick="accp('+v.id+')"><input type="button" name="Reject" value="Reject" onclick="reject('+v.id+')"></li>';
					}
					});
					htmlPendingList += "</ul>";
			         $('#showPendingdivs').html(htmlPendingList);
					 $("#pendingList").listview();
			    }
			   }
		   })		   
		});
 })

 
function reject(id){
	var userId = id;
	var sessionid=sessionStorage.getItem('session');
	$.ajax({
	        dataType: 'jsonp',
			url:'http://dev.eulogik.com/voiceit_server/info.php',
			data: {'userId': userId,'reject': "reject",'sessionid':sessionid},
			jsonp: 'jsonp_callback',
			success:function(data){
			var rejectFriend = eval(data);
				   $.each(rejectFriend, function(i, v){
				       var hiddenid= "hide"+v.id;
						$('#'+hiddenid).hide();
					});
			
				
				}
			})
	}
	
function accp(id){
	var userId = id;
	var sessionid=sessionStorage.getItem('session');
	$.ajax({
		    dataType: 'jsonp',
			url:'http://dev.eulogik.com/voiceit_server/info.php',
			data: {'userId': userId,'accept': "accept",'sessionid':sessionid},
			jsonp: 'jsonp_callback',
		    crossDomain: true,
			success:function(data){
				var acceptedFriend = eval(data);
				var htmlAcceptedFriend = '<ul id="acceptedfriend">';
				   $.each(acceptedFriend, function(i, v){
				       var hiddenid= "hide"+v.id;
						$('#'+hiddenid).hide();
						htmlAcceptedFriend+='<li><a href="some.page?id='+v.id+'"><img src="themes/images/default.gif">'+v.name+'</a></li>';
					});
					htmlAcceptedFriend += "</ul>";
					location.reload();
				}
			})
	}
	
	
$(document).ready(function(){
		$('#home').bind('pageshow', function(event){
		var sessionid=sessionStorage.getItem('session');
			$.ajax({
			    dataType: 'jsonp',
				url:'http://dev.eulogik.com/voiceit_server/info.php',
				data: {'getrecords': "getrecords",'id':sessionid},
				jsonp: 'jsonp_callback',
		        crossDomain: true,
				success:function(data){
					var recordList = eval(data);
					var htmlRecordList = '<ul id="recordList">';
						   $.each(recordList, function(i, v){
						   if(v.id=='0'){
						   htmlRecordList+='<li>'+v.nolist+'</li>';
						   }else{
							var shared= v.shared_with;
								htmlRecordList+='<li><a href="#" onClick="recordPage('+v.record_id+')"><img class="ui-li-thumb" src="themes/images/play.jpg"><h3 class="ui-li-heading">'+v.title+'</h3><p class="ui-li-desc">'+v.name+'</p></a>Posted : <span data-livestamp="'+v.date+'"></span></li>';
							}
						});
						htmlRecordList += "</ul>";
						 $('#recordlist').html(htmlRecordList);
						 $("#recordList").listview(); 
				}
			})
		});
 
 })
 
 $(document).ready(function(){
		$('#myrecords').bind('pageshow', function(event){
		var sessionid=sessionStorage.getItem('session');
			$.ajax({
			    dataType: 'jsonp',
				url:'http://dev.eulogik.com/voiceit_server/info.php',
				data: {'getmyrecords': "getmyrecords",'id':sessionid},
				jsonp: 'jsonp_callback',
		        crossDomain: true,
				success:function(data){
					var myrecordList = eval(data);
					var htmlMyRecordList = '<ul id="myrecordList">';
						   $.each(myrecordList, function(i, v){
						   if(v.id=='0'){
						   htmlMyRecordList+='<li>'+v.nolist+'</li>';
						   }else{
								htmlMyRecordList+='<li><a href="#" onClick="recordPage('+v.record_id+')"><img class="ui-li-thumb" src="themes/images/play.jpg"><h3 class="ui-li-heading">'+v.title+'</h3></li>';
							}
						});
						
						htmlMyRecordList += "</ul>";
						 $('#myrecordlist').html(htmlMyRecordList);
						 $("#myrecordList").listview(); 
				}
			})
		});
 })
  
 
function recordPage(id){
	 var recid=id;
	 $("#recordId").val(recid);
	 window.sessionStorage.setItem('recordid', recid);
	 $.mobile.changePage("#myrecord",{dataUrl : "myrecord?id="+id});
 } 
 
function profile(id){
	var id=id;
	$.ajax({
		dataType: 'jsonp',
		url:'http://dev.eulogik.com/voiceit_server/info.php',
		data: {'getprofiledetails':"getprofiledetails",'id':id},
		jsonp: 'jsonp_callback',
		crossDomain: true,
		success:function(data){
			var friendsProfile = eval(data);
				   $.each(friendsProfile, function(i, v){
				   if(v.flag!=0){
					$("#f_about_me").val(v.about_me);
					$("#f_date").val(v.date);
					$('.f_gender:checked').val(v.gender);
					$("#f_secondary Option:selected").val(v.secondary);
				    $("#f_primary Option:selected").val(v.primary);
					$("#f_last_name").val(v.last_name);
					$("#f_first_name").val(v.first_name);
					}
				  });
		}
			})
	 $.mobile.changePage("#friendProfile",{dataUrl : "friendProfile?id="+id});
 } 
  
$(document).ready(function(){
$('#myrecord').bind('pageshow', function(event){
			$.ajax({
				dataType: 'jsonp',
				url:'http://dev.eulogik.com/voiceit_server/info.php',
				data: {'getcomments':"getcomments",'recordId':sessionStorage.getItem('recordid')},
				jsonp: 'jsonp_callback',
		        crossDomain: true,
				success:function(data){
					var commentList = eval(data);
					var htmlCommentList = '<ul id="commentlist">';
						   $.each(commentList, function(i, v){
						   if(!v.flag)
						   htmlCommentList+='<li data-icon="false"><a href="#" onClick="recordPage('+v.id+')"><img class="ui-li-thumb" src="themes/images/'+v.image+'"><p class="ui-li-desc">'+v.comment+'</p></a>Posted : <span data-livestamp="'+v.date+'"></span></li><br>';
						  });
						 htmlCommentList += "</ul>";
						 $('#commentList').html(htmlCommentList);
						 $("#commentlist").listview();
				}
			})
		});
})
  
var postcomment= function(data){
		var commentList = eval(data);
		var htmlCommentList = '<ul id="commentlist1">';
			   $.each(commentList, function(i, v){
			   htmlCommentList+='<li><a href="#" onClick="recordPage('+v.id+')"><img class="ui-li-thumb" src="themes/images/default.gif"><p class="ui-li-desc">'+v.comment+'</p></a>Posted : <span data-livestamp="'+v.date+'"></span></li>';
			});
			 htmlCommentList += "</ul>";
			 $("#commentlist1").listview();
			 location.reload();
}

$(document).ready(function(){
$('#myprofile').bind('pageshow', function(event){
        var sessionid=sessionStorage.getItem('session');
			$.ajax({
				dataType: 'jsonp',
				url:'http://dev.eulogik.com/voiceit_server/info.php',
				data: {'getprofiledetails':"getprofiledetails",'id':sessionid},
				jsonp: 'jsonp_callback',
		        crossDomain: true,
				success:function(data){
					var profiledetails = eval(data);
						 $.each(profiledetails, function(i, v){						 
						 if(v.flag==1){
						   $("#first_name").val(v.first_name);
						   $("#last_name").val(v.last_name);
						   $("#about_me").val(v.about_me);
						   $("#date").val(v.date);
						   $('.gender:checked').val(v.gender);
						   $("#secondary Option:selected").val(v.secondary);
						   $("#primary Option:selected").val(v.primary);
							}
						 });
				}
			})
		});
})


var myprofile= function(data){
	alert("Updated Successfully");
    $.mobile.changePage($("#home"));
}

var savepassword= function(data){
	var ack=eval(data);
	$.each(ack,function(i,v){
		if(v.flag==0){
			alert("Passwords does not match. Please try again");
		}
		if(v.flag==1){
			alert("Password Updated Successfully");
			$.mobile.changePage($("#home"));
		}
	})
	
}


