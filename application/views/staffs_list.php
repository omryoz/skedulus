<?php if(isset($tableList)) { ?>
<?php
$i=$_POST['page_num']+1;
 foreach($tableList as $content){ ?>
	<tr>
	  <td><?php echo $i; ?></td>
	  <td><?php echo $content['name']; ?></td>
	  <td>
	  <a href="#myModal" data-toggle="modal" onclick= editStaff(<?php echo $content['id'] ?>,'staff');return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
	<?php if(isset($_GET['register'])){ 
	  $register='register'; }else{
	  $register='';
	  }
	  ?>
	 <a href="javascript:;"  data-toggle="tooltip" onclick=deletethis('<?=base_url()?>staffs/manage_staffs?id=<?php echo $content['id']; ?>&delete=delete&<?php echo $register ?>'); class="tool confirm" data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
	  </td>
	</tr>
<?php $i++; } ?>
<?php }else{
		?>
		
		<?php echo '0';} ?>