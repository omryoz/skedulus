<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#bsettings").validate({
                rules: {
                    //appointment_reminders: "required",
					send_message: "required",
					//send_email: "required",
                    
                },
                messages: {
                   // appointment_reminders: "required",
				    send_message: "required",
				    //send_email: "required",						
                },
				
				errorPlacement: function(error, element) {
				 // if (element.prop('name') === 'appointment_reminders') {
					// error.insertAfter('#AErrorContainer');
				// }else 
				if (element.prop('name') === 'send_message') {
					error.insertAfter('#messageErrorContainer');
				}else{
				 error.insertAfter( element ); 
				 }

				},

                submitHandler: function(form) {
                form.submit();
                }
            });
        }
		
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);


</script>
<br/>
			<div class="span8 offset2">
				<form class="form-horizontal form-setting " name="bsettings" id="bsettings" action="<?php echo base_url(); ?>settings/business" method="POST">
					<div class="control-group">
					  <label class="control-label" for="inputPassword">
					  <?=(lang('Apps_clientcancanclreshdule'))?></label>
					  <div class="controls">
					   <div >
					   <?php 
						// $start = strtotime('7:00');
					    // $end = strtotime('24:00');
						// for( $i = $start; $i <= $end; $i += (60*15)) 
						// {
							// $value=date('H:i', $i);
							// $slotlist[$value] = date('H:i', $i); 
							
						// }
						
			            //echo form_dropdown('cancel_reschedule_before',$slotlist,$cancel_reschedule_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="cancel_reschedule_before" class=" inputime span4" value="<?php //echo $cancel_reschedule_before; ?>">---->
						<?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist1[$i]=$i;
						   }
						   echo form_dropdown('cancel_reschedule_before',$slotlist1,$cancel_reschedule_before,'class="input-mini"') 
						?>
						
						
						<span><?=(lang('Apps_hoursbefore'))?></span>
						</div>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_clientcanbookappntbfr'))?></label>
					  <div class="controls">
						<div>
						<?php 
						// $start = strtotime('7:00');
					    // $end = strtotime('24:00');
						// for( $i = $start; $i <= $end; $i += (60*15)) 
						// {
							// $value=date('H:i', $i);
							// $slotlist[$value] = date('H:i', $i); 
							
						// }
						
			           // echo form_dropdown('book_before',$slotlist,$book_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="book_before" class=" inputime span4" value="<?php //echo $book_before; ?>">---->
						<?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist2[$i]=$i;
						   }
						   echo form_dropdown('book_before',$slotlist2,$book_before,'class="input-mini"') 
						?>
						
						<span><?=(lang('Apps_hoursbeforetime'))?></span>
						
						</div>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword"><? echo "Clients can book appointments up to " ?></label>
					  <div class="controls">
					  <label class="inline">
						 <?php 
						$options=array(
						''=>"Select",
						'1'=>"1 Month",
						'2'=>"2 Month",
						'3'=>"3 Month",
						'6'=>"6 Month",
						'12'=>"12 Month",
						'24'=>"24 Month"
						);
						$selectedbook_upto='';
						if(isset($book_upto)){
						 $selectedbook_upto = $book_upto;
						}
						
						 echo form_dropdown('book_upto', $options, $selectedbook_upto ,'class="input-small"');
						 
						?>
						<span><?=(lang('Apps_infuture'))?></span>
						<div id="emailErrorContainer"></div>
					  </div>
					</div>
					<!----<div class="control-group ">
						<label class="control-label " for="inputEmail"><?=(lang('Apps_appointmentremainder'))?></label>
						<div class="controls ">
						<label class="radio inline">
						<?php  
						$nchck="";
						$fchck="";
						if($appointment_reminders=="on"){
						$nchck="checked";
						}elseif($appointment_reminders=="off"){
						$fchck="checked";
						}
						echo form_radio('appointment_reminders','on',$nchck); ?> 
						<?=(lang('Apps_on'))?></label>
						<label class="radio inline">
						<?php echo form_radio('appointment_reminders','off',$fchck); ?><?=(lang('Apps_off'))?> 
						</label>
						<div id="AErrorContainer"></div>
						</div>
						
					</div>--->
					<div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_sendmereminderbfr'))?></label>
					  <div class="controls">
						<div >
						<?php 
						for($i=1;$i<=24;$i++){ 
						    $slotlist3[$i]=$i;
						   }
						echo form_dropdown('remind_before',$slotlist3,$remind_before,'class="input-mini"'); 
						// $start = strtotime('7:00');
					    // $end = strtotime('23:59');
						// for( $i = $start; $i <= $end; $i += (60*15)) 
						// {
							// $value=date('H:i', $i);
							// $slotlist[$value] = date('H:i', $i); 
							
						// }
						
			            // echo form_dropdown('remind_before',$slotlist,$remind_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="remind_before" id="remind_before" class=" inputime span4" value="<?php //echo $remind_before; ?>">--->
						<span><?=(lang('Apps_hoursbefore'))?></span>
						</div>
					  </div>
					</div>
					
					
					<div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_sendmetxtmsgonbooking'))?></label>
					  <div class="controls">
					  <label class="radio inline">
						<?php 
						
						$ncheck="";
						$fcheck="";
						if($send_message=="on"){
						$ncheck="checked";
						}elseif($send_message=="off"){
						$fcheck="checked";
						}
						echo form_radio("send_message","on",$ncheck); ?> 
						<?=(lang('Apps_on'))?></label>
						<label class="radio inline">
						<?php echo form_radio("send_message","off",$fcheck); ?> 
						<?=(lang('Apps_off'))?></label>
						<div id="messageErrorContainer"></div>
					  </div>
					</div>
					
					
					<!----<div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_sendemailconfm'))?></label>
					  <div class="controls">
					  <label class="radio inline">
						<?php 
						$nocheck="";
						$ofcheck="";
						if($send_email=="on"){
						$nocheck="checked";
						}elseif($send_email=="off"){
						$ofcheck="checked";
						}
						echo form_radio("send_email","on",$nocheck); ?> 
						<?=(lang('Apps_on'))?></label>
						<label class="radio inline">
						<?php echo form_radio("send_email","off",$ofcheck); ?> 
						<?=(lang('Apps_off'))?></label>
						<div id="emailErrorContainer"></div>
					  </div>
					</div>--->
					
					<input type="hidden" name="insert" value="insert<?=(lang('Apps_insert'))?>">
					<input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class=" btn btn-success pull-right">
				 
				</form>
			</div>
		</div>	
 	</div>
</div>
<style>
	.error{
	color: #FB3A3A;
	display:inline;
	}
	#emailErrorContainer, #messageErrorContainer ,#AErrorContainer {
	display:inline;
	}
</style>

<?php include('include/popupmessages.php'); ?>
