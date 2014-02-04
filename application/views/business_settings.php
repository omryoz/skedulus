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


function deactivatebusiness(){
 $(".alert").hide();
 $("#user_password").val("");
 $("#deactivatebusiness").modal('show');
}

$("#cancel_deactivation").click(function(){
	$("#deactivatebusiness").modal('hide');
})

$("#deactivate_business").click(function(){
   var url=base_url+'settings/chckpassword';
   $.ajax({
     data:{userpassword:$("#user_password").val()},
	 type:'POST',
	 url:url,
	 success:function(data){ 
	    var str=data.trim();
		if(str==0){
		  $(".alert").html(passwordnotmatch);
		  $(".alert").show();
		}else{
		    apprise(businessdeactivatedsuccess, {'confirm':false, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=base_url+'cprofile';}else{ return false; } });
		}
	 }
   })
})

</script>
<br/>
			<div class="span8 offset2">
				<form class="form-horizontal form-setting " name="bsettings" id="bsettings" action="<?php echo base_url(); ?>settings/business" method="POST">
					<!-- <div class="control-group">
					  <label class="control-label" for="inputPassword">
					  <?=(lang('Apps_clientcancanclreshdule'))?></label>
					  <div class="controls">
					   <div >
					 
						<?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist1[$i]=$i;
						   }
						   echo form_dropdown('cancel_reschedule_before',$slotlist1,$cancel_reschedule_before,'class="input-mini"') 
						?>
						
						
						<span><?=(lang('Apps_hoursbefore'))?></span>
						</div>
					  </div>
					</div> -->
					<!-- <div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_clientcanbookappntbfr'))?></label>
					  <div class="controls">
						<div>
						
						<?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist2[$i]=$i;
						   }
						   echo form_dropdown('book_before',$slotlist2,$book_before,'class="input-mini"') 
						?>
						
						<span><?=(lang('Apps_hoursbeforetime'))?></span>
						
						</div>
					  </div>
					</div> -->
					<!-- <div class="control-group">
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
					</div> -->
					
					<!-- <div class="control-group">
					  <label class="control-label" for="inputPassword"><?=(lang('Apps_sendmereminderbfr'))?></label>
					  <div class="controls">
						<div >
						<?php 
						for($i=1;$i<=24;$i++){ 
						    $slotlist3[$i]=$i;
						   }
						echo form_dropdown('remind_before',$slotlist3,$remind_before,'class="input-mini"'); 
						 
			
			            ?>
						
						<span><?=(lang('Apps_hoursbefore'))?></span>
						</div>
					  </div>
					</div>
					 -->
					
					<!-- <div class="control-group">
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
					<input type="hidden" name="insert" value="insert<?=(lang('Apps_insert'))?>">
					<input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class=" btn btn-success pull-right"> -->
				 
				
				<p class="lead-nice muted"><?=(lang('Apps_clientcancanclreshdule'))?> <?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist1[$i]=$i;
						   }
						   echo form_dropdown('cancel_reschedule_before',$slotlist1,$cancel_reschedule_before,'class="input-mini"') 
						?>
						<span><?=(lang('Apps_hoursbefore'))?></span>
						
						</p>
						
			
				<p class="lead-nice muted"><?=(lang('Apps_clientcanbookappntbfr'))?> <?php
						   for($i=1;$i<=24;$i++){ 
						    $slotlist2[$i]=$i;
						   }
						   echo form_dropdown('book_before',$slotlist2,$book_before,'class="input-mini"') 
						?>
						
						<span><?=(lang('Apps_hoursbeforetime'))?></span> </p>	
						
				<p class="lead-nice muted">  <?=(lang('Apps_clientcanbookappntbfr'))?>						 <?php 
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
						<span><?=(lang('Apps_infuture'))?></span> <div id="emailErrorContainer"></div></p>
						
				<p class="lead-nice muted"><?=(lang('Apps_sendmereminderbfr'))?>
				<?php 
						for($i=1;$i<=24;$i++){ 
						    $slotlist3[$i]=$i;
						   }
						echo form_dropdown('remind_before',$slotlist3,$remind_before,'class="input-mini"'); 
						 
			
			            ?>
						
						<span><?=(lang('Apps_hoursbefore'))?></span>
				</p>		
				
				
				<p class="lead-nice muted"> <?=(lang('Apps_sendmetxtmsgonbooking'))?>
					  
						<?php 
						
						$ncheck="";
						$fcheck="";
						if($send_message=="on"){
						$ncheck="checked";
						}elseif($send_message=="off"){
						$fcheck="checked";
						}
						echo form_radio("send_message","on",$ncheck); ?> 
						<?=(lang('Apps_on'))?>
						<?php echo form_radio("send_message","off",$fcheck); ?> 
						<?=(lang('Apps_off'))?>
						<div id="messageErrorContainer"></div>
					  </p>
					  <p class="lead-nice muted">Deactivate business :
				         <a href="jabascript:;" onclick="deactivatebusiness()">deactivate now!</a>
				     </p>
				<br/><br/>
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


