 <?php
 foreach($contentList as $list){ if($list->id!=0){ ?>
							<tr>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->user_role; ?></td>
							  <td id="userStatus<?php echo $list->id; ?>"><?php echo $list->status; ?></td>
							  
							  <td>
							
							  
							    <div class="btn-group">
  <input type="button" name="status" title="<?php if($list->status=='active'){echo 'inactivate now';}else {echo 'activate now';} ?>" id="user<?php echo $list->id; ?>" value="<?php if($list->status=='active'){echo 'inactive';}else {echo 'active';} ?>" class="btn status" onclick="changeStatus('user',<?php echo $list->id; ?>,'<?php echo $list->status; ?>');" data-val="<?php echo $list->id; ?>" user-type="user" data-status="<?php echo $list->status; ?>">

  <a href="<?php echo base_url() ?>admin/dash/userDetails/<?php echo $list->id ?>" data-toggle="tooltip" class="tool btn" data-original-title="<?=(lang('Apps_view'))?>"><i class="icon-upload-alt"></i></a>
</div>
							  
							
							  </td>
							  
							</tr>
						<?php } } 
						?>