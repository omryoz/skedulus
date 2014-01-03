<!----------book popup start------------>
<div id="book" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form class="form-horizontal book_appointment" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment">	
  <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel" class="titleAppointment"> <?=(lang('Apps_bookanappointment'))?></h3>
  </div>  <p class="message"></p>	
  <div class="modal-body row-fluid">
		   <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_service'))?></label>
			<div class="controls showdropdown">
			<p id="checkbox"><p>
			 
			</div>
			
			<div class="controls showlist">			
			<div class="list-service">
				<!---<span class="label">Hair cut</span><span class="label">Hair color</span><span class="label">massage</span><span class="label">mens hair cut</span><span class="label">woman hair cut</span>--->
			</div>
		   </div>
			
		<input type="hidden" name="services" class="services" id="selectedService" value="" />
		  </div>
		  
		  
		  
		  
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_date'))?></label>
			<div class="controls">
				<div class="input-append date date_pick span6" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
					<input class="span12 st_date" readonly name="date" size="16" type="text" value="<?=date("d-m-Y")?>">
					<span class="add-on"><i class="icon-calendar"></i></span>
				 </div>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_staff'))?></label>
			<div class="controls">
			 <input type="hidden" name="selectedstaff" value="" id="selectedstaff">
			 <input type="hidden" name="staffschedule" value="" id="staffschedule" ename="">
			  <!--<input type="text" class="span6 staff" readonly="" placeholder="Staff">-->
			  <select name="staff" class="staff"> 
				<!---<option> <?=(lang('Apps_selectstaff'))?></option>--->
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_time'))?></label>
			<div class="controls">
					<!--<input type="text" class="span6" readonly="" placeholder="Time">-->
					
					<select name="time" class="time" id="timeSlot" action="" eventId="" booking="" staff="">	
					</select>
					<a href="<?php echo base_url();?>bcalendar" onclick="viewSchedule();" role="button" data-toggle="modal"  data-dismiss="modal" class="viewSchedule" aria-hidden="true"> <?=(lang('Apps_viewschedule'))?></a>
			</div>
		  </div>
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_note'))?></label>
			<div class="controls">
			  <textarea type="text" class="messageNote" name="note" id="note" placeholder="<?=(lang('Apps_note'))?>"></textarea>
			  <?php if(isset($_GET['id'])){
			   $id=$_GET['id'];
			  }else{
			   $id='';
			  } ?>
			  <input type="hidden" name="businessid" class="business_id" value="<?php echo $id ?>"> 
			  <input type="hidden" name="apptype" class="apptype" id="apptype" value=""> 
			  <input type="hidden" name="url" id="redirecturl" value="<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"> 
			 
			</div>
		  </div>
		  
		  
		 
		  
		  
	
  </div>
  <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	
	<input type="submit" name="submit" value="<?=(lang('Apps_book'))?>" id="book" class="btn btn-success span3 offset5 book_app "/>
	<input type="button" name="reschedule" value="<?=(lang('Apps_reschedule'))?>" id="reschedule_app" class="btn btn-success reschedule_app "/>
	<input type="button" name="delete" value="<?=(lang('Apps_cancelapp'))?>" id="deleteApp" class="btn btn-danger  delete_app "/>
	<input type="hidden" name="user_id" id="users_id" value="<?=$user_id?>" />
	<input type="hidden" name="eventId"  class="eventId" id="eventId" value="" />
	<input type="hidden" name="end_time" id="end_time" class="end_time" value="" required/>
	<input type="hidden" name="reschdule"  class="reschduleId" id="reschduleId" value="0" />
	<input type="hidden" name="reschdule"  class="show" value="0" />
  </div>
  </form>
</div>




<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#book_appointment").validate({
                rules: {
                    date: {
					required: true,
					//date: true
					},
					 services: "required",
					 time: "required",
					
                },
                messages: {
                    date: {
					 required: 'required',
					 //date: "invalid",
					},
					services: "required",
					time: "required",
                   
										
                },
				
				 errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '0px');
				},
				highlight: function(element, errorClass, validClass) {
				$(".time").removeClass("error");
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

$(".closeapp").click(function(){
$(".reschduleId").val('0');
$(".show").val('0');
})

</script>





