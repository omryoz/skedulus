<?php include('include/postclass_cal.php'); ?>
<?php 
@session_start();
$_SESSION['profileid'] = $staff_details[0]->user_business_details_id;
if(!isset($this->session->userdata['id'])){
 redirect('home/clientlogin');
}
$bname=$this->common_model->getRow('user_business_details','id',$staff_details[0]->user_business_details_id);
$calendartype=$bname->calendar_type;
?>
<p id="calendartype" class="hide" ><?php  print_r($calendartype)  ?></p>
<div class="content container">
<div class="row-fluid business_profile">
<!---<h3 ><a style="color: #517fa4;" href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($staff_details[0]->user_business_details_id) ?>"><?php (!empty($staff_details))?print_r($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';?></a></h3>		---->
<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($staff_details[0]->user_business_details_id) ?>"><?=(lang('Apps_businessProfile'))?></a> <span class="divider">/</span></li>
  <li class="active"><?php (!empty($staff_details))?print_r($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';?></li>
  <li class="pull-right">
  <?php 
  $options=array();
  foreach($staffs as $val){
 // $options["-1"]="Business calendar";
  $options[$val->users_id]=$val->first_name."".$val->last_name;
  } ?>
   <?php echo form_dropdown('staff',$options,$staff_details[0]->users_id,' id="staffCal" ')  ?>						
</ul>	
<div id='calendar'></div>
<p class="hide" id="login_id"><?php print_r($_SESSION['profileid']); ?></p>
<p class="hide" id="instructor_id"><?php print_r($staff_details[0]->users_id); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>
<input type="hidden" class="startDateClass" id="eventStartDate" name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate"/>
<input type="hidden" class="eventStartTime1"  name="eventStartTime" style="width:5em; border:1px solid #C3D9FF;" id="eventStartTime"/>	
	
</div>
</div>
  </div>
</div>

<!--<p id="Demo">Demosas<p>-->


<!-- END CALENDAR TEMPLATES -->
<script>
	$('#postclasstab a').click(function (e) {
	  e.preventDefault();
	  $(this).tab('show');
	})
	    
</script>
<script>
$("#eventGroup").live("change",function(){
$(".message").removeClass("alert").html(" ");
})

$("#repeat").click(function(){
 if($("#repeathtml").html()=="Add Repeat"){
 var removediv="Remove Repeat";
  $("#repeatdiv").show();
  if($('#repeat_type :selected').text()=="Weekly"){
     $("#weeks").css("display",'block');
     $("#months").css("display",'none');
  }else if($('#repeat_type :selected').text()=="Monthly"){
     $("#months").css("display",'block');
     $("#weeks").css("display",'none');
  }else if($('#repeat_type :selected').text()=="Daily"){
     $("#months").css("display",'none');
     $("#weeks").css("display",'none');
  }
 }else{
 var removediv="Add Repeat";
   $("#repeatdiv").hide();
   $("#weeks").css("display",'none');
   $("#months").css("display",'none');
 }
 $("#repeathtml").html(removediv);
 $("#repeatstatus").val(removediv);
})


 $("#repeat_type").on("change",function(){
   //alert($(this).val());
   if($(this).val()=='weekly'){
   $("#weeks").css("display",'block');
   $("#months").css("display",'none');
   }
   if($(this).val()=='monthly'){
   $("#months").css("display",'block');
    $("#weeks").css("display",'none');
	}
   if($(this).val()=='daily'){
   $("#months").css("display",'none');
   $("#weeks").css("display",'none');
   }
   
 })
 
 var myVar="";
 $(".weekly").click(function(e){  
 if($("#weeklist").val()!=""){
 myVar=$("#weeklist").val();
 }
  $(this).toggleClass("weekly active");
  if(jQuery.inArray($(this).val(),myVar) == -1){
  myVar+=$(this).val()+",";
  }else{
  myVar=removeValue(myVar,$(this).val()); // "1,3"
 }
  $("#weeklist").val(myVar);
 })

function removeValue(list, value) {  
  return list.replace(new RegExp(value + ',?'), '')
}


var myVarM=new Array(); 
$(".month").click(function(e){ 
var temp = new Array();
temp = $("#monthlylist").val().split(",");
if($("#monthlylist").val()!=""){
  myVarM=temp;
}
  $(this).toggleClass("month active"); 
  if(jQuery.inArray($(this).val(),myVarM) == -1){
  myVarM.push($(this).val());
  }else{
	myVarM.splice( myVarM.indexOf( $(this).val() ), 1 );
 }
  $("#monthlylist").val(myVarM);
 })

 
$("#staffCal").change(function(){
if($(this).val()!="-1"){
 window.location.href = base_url+'bcalendar/staffSchedule/'+$(this).val()+'/Classes';
}else{
window.location.href = base_url+'bcalendar/calendar_business/<?php print_r($this->session->userdata['business_id']); ?>';
}
})	

  
</script>
<?php include('include/popupmessages.php'); ?>