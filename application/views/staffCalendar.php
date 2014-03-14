<?php include('include/services_cal.php'); ?>
<?php 	
@session_start();
?>
<?php
$bname1=$this->common_model->getRow('user_business_details','id',$staff_details[0]->user_business_details_id);
if(isset($this->session->userdata['role']) && ($this->session->userdata['role']=='manager')) {
$bname='My business profile';
}else{
$bname=$bname1->name;
}
$crumb=(!empty($staff_details))?($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';
 ?>
 <?php if(isset($this->session->userdata['role']) && ($this->session->userdata['role']=='manager')) {
  $role='manager';
 }else{
  $role='none';
 } ?>
 <input type="hidden" name="userrole" value="<?php print_r($role);?>" id="userrole">
<div class="content container">
		<div class="row-fluid business_profile">
	

<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($staff_details[0]->user_business_details_id) ?>"><?php print_r($bname); ?> </a> <span class="divider">/</span></li>
  <li class="active"><?php print_r($crumb); ?></li>
  <li class="pull-right">
  <?php 
  $options=array();
  $i=1;
  foreach($staffs as $val){
  $options[$val->users_id]=$val->first_name." ".$val->last_name;
  $i++;
  } ?>
   <?php echo form_dropdown('staff',$options,$staff_details[0]->users_id,' id="staffCal" ')  ?>						
</ul>

<div id='calendar'></div>
<input type="hidden" class="startDateClass"  name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate"/>
<input type="hidden" class="startTimeClass" name="eventStartTime" style="width:5em; border:1px solid #C3D9FF;" id="eventStartTime"/>
<input type="hidden" name="staffid" id="staffsid" value="<?php print_r($staff_details[0]->users_id); ?>">
<input type="hidden" name="businessid" id="bid" value="<?php print_r($staff_details[0]->user_business_details_id); ?>" >
 <p id="profileid" class="hide"><?php print_r($staff_details[0]->user_business_details_id); ?></p>	
 <p id="staffname" class="hide"><?php print_r($staff_details[0]->first_name."".$staff_details[0]->last_name); ?></p>	
<p class="hide" id="login_id"><?php if(isset($user_id))print_r($user_id); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
<p class="hide" id="user_id"></p>
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>
	
</div>
</div>
  </div>
</div>

<script>
$(document).ready(function(){
  <?php 
   if(isset($_GET['success'])){
  ?>
  $(".alertMessage").html(bookedsuccess);
   $("#alertpopup").modal('show');
  <?php }elseif(isset($_GET['deletesuccess'])){ ?>
  $(".alertMessage").html(cancelledsuccess);
   $("#alertpopup").modal('show');
  <?php }?>
})
$("#staffCal").change(function(){
if($(this).val()!="-1"){
window.location.href = base_url+'bcalendar/staffSchedule/'+$(this).val()+'/Services';
}else{
window.location.href = base_url+'bcalendar/cal/<?php print_r($staff_details[0]->user_business_details_id); ?>';
}
})	
</script>
<script src="<?php echo base_url() ?>functions/script.js">  </script> 
<?php include('include/popupmessages.php'); ?>

<!-- Modal -->
<div id="alertpopup" class="modal hide fade popup-alert-box" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-body">
    <center><h4 class="alertMessage"></h4></center>
	<center><a href="javascript:;" class="btn btn-success confirmbutton">Ok</a></center>
  </div>
</div>