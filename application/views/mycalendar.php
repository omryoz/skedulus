<?php include('include/my_cal.php'); ?>
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
 <span class="page hide">home</span>
 <?php if(isset($_GET['success'])){ ?>
	<p class="alert"><?=(lang('Apps_appointmentsavedsuccess'))?></p>
	<?php } ?>
<div class="content container">
		<div class="row-fluid business_profile">
			<h3><?=(lang('Apps_myappointments'))?></h3>		
			<div id='calendar'></div>
			<p class="hide" id="login_id"><?php print_r($user_id); ?></p>
			<p class="role hide"><?=(!empty($role))?$role:''?></p>
		<p id="Bstarttime" class="hide" ></p>
        <p id="Bendtime" class="hide"></p>
	    <p class="hide" id="user_id"><?php print_r($user_id); ?></p>
	    <span id="type" class="hide"></span> 
		<p id="business_id" class="hide"></p>
	    <p id="services_id" class="hide"></p>
	    <p id="employee_id" class="hide"></p>
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