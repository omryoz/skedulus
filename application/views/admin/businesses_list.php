 <?php 
if(!empty($contentList)) {
 foreach($contentList as $list){ ?>
							<tr >
							  <td><?php echo $list->business_name ?></td>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->email; ?></td>
							  <td><?php echo $list->subscription_name; ?> </td>
							  <td id="businessStatus<?php echo $list->business_id; ?>"><?php echo $list->status; ?> </td>
							  <td>							   
							   <div class="btn-group">
  <input type="button" name="status" title="<?php if($list->status=='active'){echo 'inactivate now';}else {echo 'activate now';} ?>" id="business<?php echo $list->business_id; ?>" onclick="changeStatus('business',<?php echo $list->business_id; ?>,'<?php echo $list->status; ?>');" value="<?php if($list->status=='active'){echo 'inactive';}else {echo 'active';} ?>" user-type="business" class="btn status" data-val="<?php echo $list->business_id; ?>" data-status="<?php echo $list->status; ?>">
  <a href="<?php echo base_url() ?>businessProfile/?id=<?php echo $list->business_id; ?>" class="btn" oncontextmenu="return false;"><?=(lang('Apps_viewdashboard'))?></a>
</div>
							 

							  </td>
							  
							</tr>
						<?php }?>
						
						<?php }else{ echo 0;?>
						
						<?php } ?>