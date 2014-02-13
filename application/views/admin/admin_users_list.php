	 <?php foreach($contentList as $list){ ?>
							<tr>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php print_r($list->email) ?></td>
							  <td>
							  <?php if($list->email!='admin@gmail.com'){ ?>
							  <!---<a href="javascript:;" data-toggle="tooltip" data-val="<?php echo $list->id; ?>" class="tool editCategory" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;--->
							  <a href="javascript:;"  data-toggle="tooltip" onclick=deletethis('<?=base_url()?>admin/dash/delete_adminusers/<?php echo $list->id; ?>'); class="tool confirm" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							 <?php } ?> 
							  </td>
							  
							  
							</tr>
						<?php } ?>