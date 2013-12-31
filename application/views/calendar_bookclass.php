<?php include('include/bookclass_cal.php'); ?>
<?php 

@session_start();
if(isset($type) && $type=='staffscalendar'){
$_SESSION['profileid'] = $staff_details[0]->user_business_details_id;
$bname=$this->common_model->getRow('user_business_details','id',$staff_details[0]->user_business_details_id);
$calendartype=$bname->calendar_type;
$bname=$bname->name;
$crumb=(!empty($staff_details))?($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';
$url=$staff_details[0]->user_business_details_id;
}else{
$bname=$this->common_model->getRow('user_business_details','id',$buisness_details[0]->id);
$calendartype=$bname->calendar_type;
$bname=$bname->name;
$crumb='Business calendar';
$_SESSION['profileid'] = $buisness_details[0]->id;
$url=$buisness_details[0]->id;
}
?>
<p id="calendartype" class="hide" ><?php  print_r($calendartype)  ?></p>
<ul class="breadcrumb">
  <li><a href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($url) ?>"><?php print_r($bname); ?> </a> <span class="divider">/</span></li>
  <li class="active"><?php print_r($crumb); ?></li>
  <li class="pull-right">
  <?php 
  $options=array();
  $options["-1"]="Business Calendar";
  foreach($staffs as $val){
  $options[$val->users_id]=$val->first_name."".$val->last_name;
  }
  if(isset($type) && $type=='staffscalendar'){
  $selected=$staff_details[0]->users_id;  
  }else{
  $selected='';  
  }
  ?>
   <?php echo form_dropdown('staff',$options,$selected,' id="staffCal" ')  ?>	</li>
   
</ul>
<div class="content container">
<div class="row-fluid business_profile">

<?php if(isset($type) && $type=='staffscalendar'){ ?>
<h3><a style="color: #517fa4;" href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($staff_details[0]->user_business_details_id) ?>"><?php (!empty($staff_details))?print_r($staff_details[0]->first_name." ".$staff_details[0]->last_name):'';?></a></h3>
<?php  }else{?>
<h3><a  href="<?php echo base_url() ?>businessProfile/?id=<?php print_r($buisness_details[0]->id) ?>"><?php (!empty($buisness_details))?print_r($buisness_details[0]->name):'';?></a></h3>		
<?php }?>	
<div id='calendar'></div>
<p class="role hide" id="instructor_id"><?=(!empty($type))?$staff_details[0]->users_id:''?></p>
<p class="hide" id="login_id"><?php print_r($_SESSION['profileid']); ?></p>
<p class="role hide" id="role"><?=(!empty($role))?$role:''?></p>
<p id="Bstarttime" class="hide" ><?php  print_r($buisness_availability['start_time'])  ?></p>
<p id="Bendtime" class="hide"><?php  print_r($buisness_availability['end_time'])  ?></p>	
<p id="eventId" class="hide"></p>	
</div>
</div>
  </div>
</div>


<script>
$("#staffCal").change(function(){
if($(this).val()!="-1"){
 window.location.href = base_url+'bcalendar/staffSchedule/'+$(this).val()+'/Classes';
}else{
window.location.href = base_url+'bcalendar/calendar_business/<?php print_r($staff_details[0]->user_business_details_id); ?>';
}
})
</script>
<?php include('include/popupmessages.php'); ?>