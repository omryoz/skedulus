<script>
	function showSelected(val,selected){
	var selected=$("."+selected).val();
	if(selected=='unlimited'){
	  $("."+val).hide();
	}else{
	  $("."+val).show();
	}
 //alert(val); alert(selected);
}
</script>
		</div>
	<br/><br/>
		<div class="row-fluid">
					<div class="">
						
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4><?=(lang('Apps_subscription'))?></h4></th>
							  <th><h4><?=(lang('Apps_price'))?></h4></th>
							  <th><h4><?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						 <?php foreach($list as $val){?>
							<tr >
							  <td><?php echo $val->title ?></td>
							  <?php if($val->price!=0){
							   $price='$'.$val->price.'/Month';
							  }else{
							   $price='Contact Us';
							  } ?>
							  <td><?php echo $price ?></td>
							  <td>
							 <a href="#admin_subscribe" data-val=<?php echo $val->id ?> data-toggle="modal" data-toggle="tooltip" class="tool subDetails" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							 <!---<a href="#" data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit"></i></a>--->
							  </td>
							  
							</tr>
							<?php } ?>
						</table>
				  </div>
          </div>
		  <div id="admin_subscribe" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <form action="<?php echo base_url() ?>admin/dash/UpdateSub" method="POST" name="form1" id="subForm"> 
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel"><?=(lang('Apps_subscriptiondetail'))?></h3>
  </div>

  <div class="modal-body">
   <table class="table table_subscription" >
			<thead>
			<tr><th><?=(lang('Apps_name'))?></th>
			<td id="subname"></td>
			<input type="hidden" name="subid" id="subscription_id" />
			
			</tr>
			</thead>
			<tbody>
				<tr>
				<th ><?=(lang('Apps_users'))?></th>
				<td>
					<select class="input-medium inline users_type" name="users_type" onChange="showSelected('users_num','users_type')">

						<option value='upto'><?=(lang('Apps_upto'))?> </option>
						<option value='morethan'><?=(lang('Apps_morethan'))?></option>

						<!---<option value='contact us'>Contact us</option>--->
						<option value='unlimited'><?=(lang('Apps_unlimited'))?></option>
					</select>
					<input type="text" name="users_num" class="input-small inline users_num"/>
				</td>
				</tr>
				<tr>
				<th ><?=(lang('Apps_businesses'))?></th>
				<td><select class="input-medium inline business_type"  onChange="showSelected('business_num','business_type')" name="business_type">

						<option value="upto"> <?=(lang('Apps_upto'))?></option>
						<option value="morethan"><?=(lang('Apps_morethan'))?></option>

						<!---<option value="contact us">Contact us</option>--->
						<option value="unlimited"><?=(lang('Apps_unlimited'))?></option>
					</select>
					<input type="text"  class="input-small inline business_num" name="business_num"/></td>
				</tr>
				<!---<tr>
				<th >Offers</th>
				<td><select class="input-medium inline">
						<option>Upto </option>
						<option>More than</option>
						<option>Contact us</option>
						<option>Unlimited</option>
					</select>
					<input type="text"  class="input-small inline"/></td>
				</tr>--->
				<tr>
				<th ><?=(lang('Apps_pictures'))?></th>
				<td><select class="input-medium inline pictures_type" name="pictures_type" onChange="showSelected('picture_num','pictures_type')">

						<option value='upto'> <?=(lang('Apps_upto'))?></option>
						<option value="morethan"><?=(lang('Apps_morethan'))?></option>

						<!---<option value="contact us">Contact us</option>-->
						<option value="unlimited"><?=(lang('Apps_unlimited'))?></option>
					</select>
					<input type="text" name="picture_num" class="input-small inline picture_num"/></td>
				</tr>
				<tr>
				<th ><?=(lang('Apps_reports'))?></th>
				<td><select class="input-medium inline reports" name="reports">
						<option value="basic"><?=(lang('Apps_basic'))?> </option>
						<option value="enhanced"><?=(lang('Apps_enhanced'))?></option>
					</select>
					</td>
				</tr>
				<tr>
				<th ><?=(lang('Apps_pro_notify'))?></th>
				<td><select class="input-medium inline promotion_notifications" name="promotion_notifications" >
						<option value='0'>0 </option>
						<option value="5">5</option>
						<option value="10">10</option>
						<option value="20">20</option>
					</select>
					</td>
				</tr>
				</tbody>
			</table>
  </div>
  <div class="modal-footer">
  <input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class="btn btn-success" >
  </div>
  </form>
</div>
  </div>
  
  
</div>
			
	</div><br/><br/><br/><br/>
</div>

<?php //include('footer.php')?>
