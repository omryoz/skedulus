
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
	<p class="text-info lead"><?=(lang('Apps_codesent'))?>: <small class="muted" id="phonenumber"><?php echo $val->phone_number; ?> </small></p>
	
	
	
	<div class="login_form" >
	
		<p class="text-center"><a href="javascript:void(0);" class="changePhoneNum text-info"><?=(lang('Apps_changenumber'))?> ?</a> <b>/</b> <a href="javascript:void(0);" class="sendagain text-info"><?=(lang('Apps_sendagain'))?></a>
		</p>
	
		<p class="muted text-center"><?=(lang('Apps_entercode'))?></p>
<div class="row-fluid">
			<input class="offset3 span6" type="text" name="key" value="" id="key">
			</div>
		<div class="row-fluid">
			<input class="offset3 span6 btn btn-success" type="button" value="Verify" name="verify" id="verifyPhone">
			</div>
			
	</div>
	
	
	

	</div>
  </div>
  <div class="modal-body" id="getnumber">
	<div class="row-fluid">
	
	<div class="login_form">
		<p class="muted text-center"><?=(lang('Apps_validphonenumber'))?></p>
		<div class="row-fluid">
			<input class="offset3 span6" type="text" name="phone" value="" id="updatePhone" maxlength="15">
		</div>
		<div class="row-fluid">
			<input class=" btn btn-success offset3 span6" type="button" name="verify" value="submit" id="insertPhone" >
			
		</div>
		
		<a href="#" class="no-dec muted pull-right back" style="display:none;" title="<?=(lang('Apps_back'))?>" >   <i class="icon-reply"></i> </a>
	</div>
	
	
	</div>
  </div>
</div>




