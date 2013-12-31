<?php include('include/postclass_cal.php'); ?>
<?php if(isset($this->session->userdata['role']) && ($this->session->userdata['role']=='manager')) {
  $role='manager';
  $crumb='My business profile';
 }else{
  $role='none';
  $crumb=(!empty($buisness_details))?($buisness_details[0]->name):'';
 } ?>
<div class="content container">
<div class="row-fluid business_profile">

<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php print_r($crumb); ?></a> <span class="divider">/</span></li>
  <li class="active">Business calendar</li>
  <li class="pull-right">
  <?php 
  $options=array();
  $options["-1"]="Select Staffs Calendar";
  foreach($staffs as $val){
  $options[$val->users_id]=$val->first_name."".$val->last_name;
  }
  
  $selected='';  ?>
   <?php echo form_dropdown('staff',$options,$selected,' id="staffCal" ')  ?>	</li>
</ul>
	
<div id='calendar'></div>
<p class="hide" id="login_id"><?php print_r($buisness_details[0]->id); ?></p>

<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>	
	
<input type="hidden" class="startDateClass" id="eventStartDate" name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate"/>
<input type="hidden" class="eventStartTime1"  name="eventStartTime" style="width:5em; border:1px solid #C3D9FF;" id="eventStartTime"/>
<input type="hidden" name="staffid" id="staffsid" value="">

</div>
</div>
  </div>
</div>


<script>
$("#eventGroup").live("change",function(){
$(".message").removeClass("alert").html(" ");
})

$("#repeat").click(function(){
$("#apptype").attr('data-val','0');
$(".message").removeClass("alert").html(" ");
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
window.location.href = base_url+'bcalendar/calendar_business/<?php print_r($staff_details[0]->user_business_details_id); ?>';
}
})
</script>
<?php include('include/popupmessages.php'); ?>