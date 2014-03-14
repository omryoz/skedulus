<?php if(isset($_GET['messg'])){ ?>
	<p class="alert"><?=(lang('mailsuccess'))?></p>
	<?php } ?>
			<div class="content container contact-attr">
			<h3> Contact us </h3>
			<hr/>
			<div class="row-fluid">
			
				<div class="span6">
				
					<form class="form-horizontal contactus" name="sendEmail" action="<?php echo base_url() ?>home/sendmessage/" method="POST" >
						<div class="row-fluid">
							<input type="text"  placeholder="Name" name="name" value="" class="span6">
						</div>
						<br/>
						<div class="row-fluid">
							<input type="text" id="email" placeholder="Email" name="email" class="span6">
						</div>
						<br/>
						<div class="row-fluid">
							<input type="subject" id="Subject" name="subject" placeholder="Subject" class="span6">
						</div>
						<br/>
						<div class="row-fluid">
							<textarea rows="4" placeholder="Message" name="message" class="span6"></textarea>
						</div>
						<br/>
						<div class="row-fluid">
							<button type="submit" class="btn btn-success span4">Send</button>
						</div>
					</form>
						
				</div>
				<div class="span6">
						<h4><span class="text">Founders<b>:</b> </span> Name of the founder</h4>
						<h4><span class="text">Address<b>:</b> </span> lorem ipsum lorem ipsum </h4>
						<h4><span class="text">You can write us here<b>:</b> </span>info@skedulus.in</h4>
						<h4><span class="text">Web<b>:</b> </span>www.skedulus.com</h4>
						
				
				</div>
				
			</div>
			
		
		
            </div>



<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $(".contactus").validate({
                rules: {
                    name: "required",
					subject: "required",
                    email: {
                        required: true,
                        email: true,
					},
					message: "required",
                },
                messages: {
                    name: "required",
					subject: "required",
                    email: {
					required: "required",
					email: "invalid email",
					},
					message: "required",	
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '10px');
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

</div><!--row-fluid-->
</div><!--end of content-->


<!--model for add staff-->



<!--model for add service-->

 </div>
</div>

