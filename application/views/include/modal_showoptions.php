<div id="showoptions" data-backdrop="static" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-val='' date='' bid='' date-time='' data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3>Kindly choose an option</h3><p class="alert hide"></p>
  </div>
  <div class="modal-body">
	<div class="row-fluid">
	<p class="plan_id hide"></p>
	<p class="text-info">You are about to subscribe for <small class="plan_name"></small> plan.</p>
	<div class="login_form">
		<div class="row-fluid">
			<input class=" btn btn-success offset3 span3 updateplan" dataval='subscribenow' type="button" name="verify" value="Now" >
			<input class=" btn btn-success offset3 span3 updateplan" dataval='subscribeafterrenewal' type="button" name="verify" value="After renewal" >
		</div>
		
		<p class='hide showloader'><img src="<?php echo base_url(); ?>images/ajax-loader.gif"></p>
	</div><br/>
	<p> Note: "now" for immediate, "renewal" to update when the current subscription renews.</p>
	</div>
  </div>
</div>




