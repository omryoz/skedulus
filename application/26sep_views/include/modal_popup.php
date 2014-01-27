
<!----------book popup start------------>


<div id="book" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal book_appointment" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment">	
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_bookanappointment'))?></h3>
  </div>
  <div class="modal-body">
		   <p class="message"></p>	
		  
		   <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_service'))?></label>
			<div class="controls">
			  <select class="services" name="services" id="services">
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_service'))?></option>
			  </select>
			 
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_staff'))?></label>
			<div class="controls">
			 <input type="hidden" name="selectedstaff" value="" id="selectedstaff">
			  <!--<input type="text" class="span6 staff" readonly="" placeholder="Staff">-->
			  <select name="staff" class="staff"> 
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_staff'))?></option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_date'))?></label>
			<div class="controls">
				<div class="input-append date date_pick span8" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
					<input class="span10 st_date" name="date" size="16" type="text" value="<?=date("d-m-Y")?>">
					<span class="add-on"><i class="icon-calendar"></i></span>
				  </div>
				  <!--<div class="input-append date date_pick span6" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
                                       <input class="span10 st_date" size="16" type="text" value="<?=date("d-m-Y")?>" >
                                       <span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>-->
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_time'))?></label>
			<div class="controls">
					<!--<input type="text" class="span6" readonly="" placeholder="Time">-->
					<select name="time" class="time" action="" eventId="">
						
					</select>
					<a href="<?php echo base_url();?>bcalendar" onclick="viewSchedule();" role="button" data-toggle="modal"  data-dismiss="modal" aria-hidden="true"> <?=(lang('Apps_viewschedule'))?></a>
			</div>
		  </div>
		  
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_message'))?></label>
			<div class="controls">
			  <textarea type="text" class="span8" name="note" id="note" placeholder="Message"></textarea>
			  <input type="hidden" name="businessid" value="<?php echo $_GET['id'] ?>"> 
			  <input type="hidden" name="url" value="<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"> 
			 
			</div>
		  </div>
		  
	
  </div>
  <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	<input type="submit" name="submit" value="Book" id="book" class="btn btn-success span3 offset5 book_app"/>
	<input type="hidden" name="user_id" value="<?=$user_id?>" />
	<!---<input type="hidden" name="eventId"  class="eventId" id="eventId" value="" />--->
	<input type="hidden" name="end_time" id="end_time" class="end_time" value="" required/>
  </div>
  </form>
</div>


<!---pop up for multi select services--->
<div id="bookmultiServices" class="modal hide fade " tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
   <form class="form-horizontal book_appointment" name="book_appointment" action="<?php echo base_url();?>bcalendar/createappointment" method="post" id="book_appointment1">	
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="myModalLabel"> <?=(lang('Apps_bookanappointment'))?></h3>
  </div>
  <div class="modal-body">
		   <p class="message"></p>	
		  
		   <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_service'))?></label>
			<div class="controls">
			<p id="checkbox"><p>
			
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_staff'))?></label>
			<div class="controls">
			 <input type="hidden" name="selectedstaff" value="" id="selectedstaff">
			  <!--<input type="text" class="span6 staff" readonly="" placeholder="Staff">-->
			  <select name="staff" class="staff"> 
				<option> <?=(lang('Apps_select'))?><?=(lang('Apps_staff'))?></option>
			  </select>
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_date'))?></label>
			<div class="controls">
				<div class="input-append date date_picker span8" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
					<input class="span10 start_date" name="date" size="16" type="text" value="<?=date("d-m-Y")?>" >
					<span class="add-on"><i class="icon-calendar"></i></span>
				  </div>
				  <!--<div class="input-append date date_pick span6" id="dp5" data-date="<?=date("d-m-Y")?>" data-date-format="dd-mm-yyyy">
                                       <input class="span10 st_date" size="16" type="text" value="<?=date("d-m-Y")?>" >
                                       <span class="add-on"><i class="icon-calendar"></i></span>
                                 </div>-->
			</div>
		  </div>
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_time'))?></label>
			<div class="controls">
					<!--<input type="text" class="span6" readonly="" placeholder="Time">-->
					<select name="time" class="time" action="" eventId="">
						
					</select>
					<a href="<?php echo base_url();?>bcalendar" onclick="viewSchedule();" role="button" data-toggle="modal"  data-dismiss="modal" aria-hidden="true"> <?=(lang('Apps_viewschedule'))?></a>
			</div>
		  </div>
		  
		  
		  <div class="control-group">
			<label class="control-label" > <?=(lang('Apps_message'))?></label>
			<div class="controls">
			  <textarea type="text" class=" messageNote" name="note" id="note" placeholder="Message"></textarea>
			  <input type="hidden" name="businessid" id="businessid" value="<?php echo $_GET['id'] ?>"> 
			  <input type="hidden" name="url" value="<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>"> 
			</div>
		  </div>
		  
	
  </div>
  <div class="modal-footer">
    <!--<a href="#" class="btn btn-success span3 offset5" >Book</a>-->
	<input type="submit" name="submit" value="Book" id="book" class="btn btn-success span3 offset5 book_apps"/>
	<input type="hidden" name="user_id" value="<?=$user_id?>" />
	<input type="hidden" name="eventId" class="eventId" id="eventid" value="" />
	<input type="hidden" name="end_time" id="end_time" class="end_time" value="" required/> 
	<input type="hidden" name="services" id="selectedService" value="" />
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


(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#book_appointment1").validate({
                rules: {
                    date: {
					required: true,
					//date: true
					},
					 //services: "required",
					 time: "required",
					
                },
                messages: {
                    date: {
					 required: 'required',
					 //date: "invalid",
					},
					//services: "required",
					time: "required",
                   
										
                },
				
				 errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css({'position':'absolute','right':'5px'});
				  
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





