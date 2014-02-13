  <?php if(isset($category) && !empty($category)){ ?>
  <?php foreach($category as $list){ ?>
							<tr >
							  <td><?php echo $list->name; ?>
							  </td>
							  <td>
							  <a href="javascript:;" data-toggle="tooltip" data-name="<?php echo $list->name; ?>" data-val="<?php echo $list->id; ?>" class="tool editCategory" onclick=editCategory('<?php echo $list->name; ?>','<?php echo $list->id; ?>'); data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="javascript:;" onclick=deletethis('<?=base_url()?>admin/dash/deleteCat/<?php echo $list->id; ?>'); data-toggle="tooltip" class="tool confirmcat" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							  
							  </td>
							  
							</tr>
							
							
							
						<?php }
						}else{
						echo 0;
						}?>