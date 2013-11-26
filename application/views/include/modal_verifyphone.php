
<div id="verifyModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" id="closeVerify" data-val='' date='' bid='' date-time='' data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3><?=(lang('Apps_verifyphone'))?></h3><p class="alert hide"></p>
  </div>
  
  <div class="modal-body" id="verifyP">
	<div class="row-fluid">
	<?php
	$val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
	?>
	<p class="text-info lead"><?=(lang('Apps_codesent'))?>: <small class="muted" id="phonenumber"><?php echo $val->phone_number; ?> </small></p><a href="javascript:void(0);" class="changePhoneNum"><?=(lang('Apps_changenumber'))?>?</a>
	
	<div style="text-align: center;">
		<p class="muted"><?=(lang('Apps_entercode'))?></p>
		<a href="javascript:void(0);" class="sendagain"><?=(lang('Apps_sendagain'))?></a>
			<input class="" type="text" name="key" value="" id="key">
		<br clear="left">
			<input class="span5 btn btn-success" type="button" value="Verify" name="verify" id="verifyPhone">
			
	</div>
	
	
	
<!-- 	<p class="muted">Kindly enter the code sent to your mobile</p>
	<p class="text-right"><input type="text" name="key" value="" id="key"></p>
	<input type="button" name="verify" value="Verify" id="verifyPhone" > -->
	</div>
  </div>
  <div class="modal-body" id="getnumber">
	<div class="row-fluid">
	
	<div style="text-align: center;">
		<p class="muted"><?=(lang('Apps_validphonenumber'))?></p>
			<input type="text" name="phone" value="" id="updatePhone" maxlength="15">
		<br clear="left">
			<input class="span5 btn btn-success" type="button" name="verify" value="submit" id="insertPhone" >
			<a href="#" class="back" style="display:none;"><?=(lang('Apps_back'))?></a>
	</div>
	
	<!-- Kindly provide your phone number<input type="text" name="phone" value="" id="updatePhone" maxlength="15">
	<input type="button" name="verify" value="submit" id="insertPhone" > -->
	</div>
  </div>
</div>




