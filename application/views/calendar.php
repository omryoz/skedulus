<?php include('include/services_cal.php'); ?>
<?php 	
@session_start();
 $_SESSION['profileid'] = $buisness_details[0]->id;
?>
<?php if(isset($this->session->userdata['role']) && ($this->session->userdata['role']=='manager')) {
  $role='manager';
  $crumb=(lang('Apps_mybusiness'));
 }else{
  $role='none';
  $crumb=(!empty($buisness_details))?($buisness_details[0]->name):'';
 } ?>
 <input type="hidden" name="userrole" value="<?php print_r($role);?>" id="userrole">
 
<div class="content container">
		<div class="row-fluid business_profile">
		<?php //print_r($this->session->userdata['profileid']);?>
<!-- <h3><a  href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?></a></h3> -->	

<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php print_r($crumb); ?></a> <span class="divider">/</span></li>
  <li class="active"><?=(lang('Apps_businesscalendar'))?></li>
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
<input type="hidden" class="startDateClass"  name="eventStartDate" style="width:6em; border:1px solid #C3D9FF;" id="eventStartDate"/>
<input type="hidden" class="startTimeClass" name="eventStartTime" style="width:5em; border:1px solid #C3D9FF;" id="eventStartTime"/>
<input type="hidden" name="staffid" id="staffsid" value="">
<p class="hide" id="user_id"></p>
 <p id="profileid" class="hide"><?php print_r($buisness_details[0]->id) ?></p>											
<p class="hide" id="login_id"><?php if(isset($user_id))print_r($user_id); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>	
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>

</div>
</div>
  </div>
</div>
<!----Modal------>

</div>

<script>
$("#staffCal").change(function(){
if($(this).val()!="-1"){
window.location.href = base_url+'bcalendar/staffSchedule/'+$(this).val()+'/Services';
}else{
window.location.href = base_url+'bcalendar/cal/<?php print_r($this->session->userdata['business_id']); ?>';
}
})
</script>

<script src="<?php echo base_url() ?>functions/script.js">  </script> 
<?php include('include/popupmessages.php'); ?>