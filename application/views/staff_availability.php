<script>
$(document).ready(function(){ 
$(".done").click(function(){ 
  window.location.href=base_url+"staffs/list_staffs";
}) 
})

$(".avail").click(function(){ //alert("hh");
if($(".avail").is(":checked")){
$("#successaddstaffs").hide();
  $("#showavail").val('1');
  $("#addstaffs").attr("onsubmit","return true;");
}else{
  $("#showavail").val('');
  var message="Kindly assign atleast one availability";
  $("#successaddstaffs").html(message);
  $("#successaddstaffs").show();
  $("#addstaffs").attr("onsubmit","return false;");
}
})
</script>
<?php error_reporting(0); ?>
					  
						 <h5>Assign Staffs Availability </h5>
<?php //if(isset($isExistBAvailability) && $isExistBAvailability!=''){ ?>
	<?php 
	            for($i=1;$i<=7;$i++) { 
							if($i%2==0){
							$class="row-fluid no-background";
							}else{
							$class="row-fluid background";
							}
	            if(isset($isExistAvailability) && ($isExistAvailability!='')){
								   if(in_array($i,$isExistAvailability['weekids'])){
								    $start=$isExistBAvailability['values'][$i]['start_time'];
								    $end=$isExistBAvailability['values'][$i]['end_time'];
									for( $d =strtotime($start); $d <= strtotime($end); $d += (60*15)) 
									{
									$value=date('H:i', $d);
									$slotlist[$value] = date('H:i', $d); 
									}
								    $Sselected=$isExistAvailability['values'][$i]['start_time'];
								    $Eselected=$isExistAvailability['values'][$i]['end_time'];
									$checked="checked";
								    $disabled="";
								    //$Cdisabled='';
								    $onclickevent='getchecked(this,'.$i.');';
									}else{
									$start = '7:00';
								    $end ='23:00';
									for( $d =strtotime($start); $d <= strtotime($end); $d += (60*15)) 
									{
									$value=date('H:i', $d);
									$slotlist[$value] = date('H:i', $d); 
									}
									$checked="";
									//$Cdisabled='disabled';
									$disabled="disabled=disabled";
								    $Sselected=$isExistAvailability['values'][$i]['start_time'];
								    $Eselected=$isExistAvailability['values'][$i]['end_time'];
									$onclickevent='getchecked(this,'.$i.');';
								    }
							
						}		    
	?>
	
	<div class="<?php echo $class; ?>">
								<div class="span3"> <label class="checkbox">
								<input type="checkbox" <?php //echo $Cdisabled ?> <?php echo $checked;?> id="<?php echo $i; ?>" onclick="<?php echo $onclickevent ?>" class="avail"  name="<?php echo $i; ?>"><?php echo $weekdays[$i] ?></label> </div>
							
								<div class="span3">
									<div >
									<?php 
										$starttime=$i.'from';
										$id='divO'.$i;
										echo form_dropdown($starttime,$slotlist,$Sselected,'id="'.$id.'" class="span12"'.$disabled) 
										
									?>
									
									
									</div>
								</div>
								<div class="span3">
									<div >
									<?php 
									$endtime=$i.'to';
									$id='divC'.$i;
									echo form_dropdown($endtime,$slotlist,$Eselected,'id="'.$id.'" class="span12"'.$disabled) 
									?>
									
									</div>
								</div>
								
						</div>
<?php $slotlist = array(); 
}
//}else{ ?>

<?php //} ?>

						 
						 
			