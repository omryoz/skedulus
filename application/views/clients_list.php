<?php if(isset($tableList)) { ?>
		  <?php
		  $i=$_POST['page_num']+1;
		// $i=1;	
		 foreach($tableList as $content){  ?>
			<tr>
			  <td><?php echo $i; ?></td>
			  <td class="profile-image"><center><img src="<?php echo base_url();?>uploads/photo/<?=(!empty($content['image'])?$content['image']:'default.jpg'); ?>" class="thumbnail" style="height: 50px;"></center></td>
			  <td><a href="<?php echo base_url(); ?>clients/profile/<?php echo $content['id'] ?>"><?php echo $content['name']; ?></a></td>
			  <td>
			  <a href="#client" data-toggle="modal" onclick= editClient(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
			  
			 
			  <a href="javascript:;" data-toggle="tooltip" onclick=deletethis('<?=base_url()?>clients/manage_clients?id=<?php echo $content['id']; ?>&delete=delete');  class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
			  </td>
			</tr>
		<?php $i++; } ?>
		
		<?php }else{
		
		?>
		 <p class="alert nomore hide"></p>
		<?php } ?>