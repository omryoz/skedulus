<?php if(isset($tableList)) { ?>
<?php
$i=$_POST['page_num']+1;
 foreach($tableList as $content){
 ?>
 <tr>
	  <td><?php echo $i; ?></td>
	  <td><?php echo $content['name']; ?></td>
	  <td>
	  <?php if(isset($_GET['register'])){ 
	  $register='register'; }else{
	  $register='';
	  }
	  ?>
	  <a href="#service-modal" data-toggle="modal"  onclick= editService(<?php echo $content['id'] ?>,'service');return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
	   <a href="javascript:;" data-toggle="tooltip" onclick=deletethis('<?=base_url()?>services/manage_services?id=<?php echo $content['id']; ?>&delete=delete&<?php echo $register ?>');  class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
	  
	  </td>
	  
</tr>
 <?php $i++;} ?>
 <?php }else{		?>
 <p class="alert nomore hide"></p>
<?php } ?>