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
                    appointment_reminders: "required",
					send_message: "required",
					send_email: "required",
                    
                },
                messages: {
                    appointment_reminders: "required",
				    send_message: "required",
				    send_email: "required",						
                },
				
				errorPlacement: function(error, element) {
				 if (element.prop('name') === 'appointment_reminders') {
					error.insertAfter('#AErrorContainer');
				}else if (element.prop('name') === 'send_message') {
					error.insertAfter('#messageErrorContainer');
				}else if (element.prop('name') === 'send_email') {
					error.insertAfter('#emailErrorContainer');
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
					
					<div class="control-group ">
						<label class="control-label " for="inputEmail">Appointment Remainders</label>
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
						echo form_radio('appointment_reminders','on',$nchck); ?>On 
						</label>
						<label class="radio inline">
						<?php echo form_radio('appointment_reminders','off',$fchck); ?>Off 
						</label>
						<div id="AErrorContainer"></div>
						</div>
						
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword">Send me reminder before</label>
					  <div class="controls">
						<div >
						<?php 
						$start = strtotime('7:00');
					    $end = strtotime('23:59');
						for( $i = $start; $i <= $end; $i += (60*15)) 
						{
							$value=date('H:i', $i);
							$slotlist[$value] = date('H:i', $i); 
							
						}
						
			            echo form_dropdown('remind_before',$slotlist,$remind_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="remind_before" id="remind_before" class=" inputime span4" value="<?php //echo $remind_before; ?>">--->
						
						</div>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword">Clients can cancel/reschedule the appointments before 
					  </label>
					  <div class="controls">
					   <div >
					   <?php 
						$start = strtotime('7:00');
					    $end = strtotime('24:00');
						for( $i = $start; $i <= $end; $i += (60*15)) 
						{
							$value=date('H:i', $i);
							$slotlist[$value] = date('H:i', $i); 
							
						}
						
			            echo form_dropdown('cancel_reschedule_before',$slotlist,$cancel_reschedule_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="cancel_reschedule_before" class=" inputime span4" value="<?php //echo $cancel_reschedule_before; ?>">---->
						
						</div>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword">Clients can book an appointment before</label>
					  <div class="controls">
						<div >
						<?php 
						$start = strtotime('7:00');
					    $end = strtotime('24:00');
						for( $i = $start; $i <= $end; $i += (60*15)) 
						{
							$value=date('H:i', $i);
							$slotlist[$value] = date('H:i', $i); 
							
						}
						
			            echo form_dropdown('book_before',$slotlist,$book_before,'id=remind_before class="inputime span3"') 
			
			            ?>
						<!---<input type="text" name="book_before" class=" inputime span4" value="<?php //echo $book_before; ?>">---->
						
						</div>
					  </div>
					</div>
					<div class="control-group">
					  <label class="control-label" for="inputPassword">Send me text messages when clients book online</label>
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
						echo form_radio("send_message","on",$ncheck); ?>On 
						</label>
						<label class="radio inline">
						<?php echo form_radio("send_message","off",$fcheck); ?>Off 
						</label>
						<div id="messageErrorContainer"></div>
					  </div>
					</div>
					
					<div class="control-group">
					  <label class="control-label" for="inputPassword">Send email confirmation</label>
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
						echo form_radio("send_email","on",$nocheck); ?>On 
						</label>
						<label class="radio inline">
						<?php echo form_radio("send_email","off",$ofcheck); ?>Off 
						</label>
						<div id="emailErrorContainer"></div>
					  </div>
					</div>
					
					<input type="hidden" name="insert" value="insert">
					<input type="submit" name="save" value="Save" class=" btn btn-success pull-right">
				 
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


