<div id="postclass" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="aPointer  " style="display: block; z-index: 2; "></div>
 <div class="modal-header">
    <button type="button" class="close closeapp" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 id="addclass" class="appoint-heading"><?=(lang('Apps_classdetails'))?></h3>
	 <h4 id="myModalLabel"><?=(lang('Apps_bookedperclassbasis'))?>.</h4>
  </div> 	
	
  <!---<h3 id="addclass" class="appoint-heading"> <?=(lang('Apps_postclass'))?><button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="padding: 5px 6px 0px;">&times;</button></h3>  
  

 <hr/>---->  

		<div  style="padding:20px;">
		<table class="table table-striped class-table">
		<tbody><p class="message"></p>	
		<div id="booksuccess" class="alert" style="display:none"></div>
		<tr> 
					  <td style="padding-right: 10px;">
					    <div class="labelBlock">  <?=(lang('Apps_classes'))?>: <span id="className"></span></div>	
					  </td>
					  <td>
					   <div class="labelBlock">  <?=(lang('Apps_trainers'))?>: <span id="trainers"></span><span id="employee_id" class="hide"></span></div>
					   <p class="hide event_id"></p>
					  </td>
		</tr>
		<tr>
					  <td>
					     <div class="labelBlock"> <?=(lang('Apps_date'))?>: <span id="StartDate"></span></div>
					  </td>
					  <td style="position:relative;">
					     <div class="labelBlock"><?=(lang('Apps_time'))?>: <span id="StartTime"></span></div>
					  </td>
		</tr>
		<tr id="details"> 
					 <!--- <td>
					    <div class="labelBlock">  <?=(lang('Apps_lastdateforenroll'))?>: <span id="lastdate"></span></div>
					  </td> --->
					  <td>
					    <div class="labelBlock">  <?=(lang('Apps_capacity'))?>: <span id="class_size"></span></div>
					  </td> 
					  <td>
					<div class="labelBlock">  <?=(lang('Apps_available'))?>: <span id="available"></span></div>
						</td> 
		</tr> 
		<tr> 
					<td colspan="2">
						<textarea name="note" class="messageNote" id="note" placeholder="<?=(lang('Apps_note'))?>" style=
						"width: 99%!important;"></textarea>
					  </td> 
		</tr> 
		</tbody>
		</table>
     
			
	    <ul class="unstyled inline pull-right">
	       <li>
		        <input type="hidden" name="updateid"  id="updateid" value="">
				<input type="hidden" name="schedule"  class="schedule" id="schedule" value="0" />
				<p class="hide" id="starttime"></p><p  class="hide" id="endtime"></p>
				<p id="business_id" class="hide"><?php echo $businessId; ?></p>
				 <?php
				$url='';
				 if(!isset($this->session->userdata['id'])){
				  ?>
				  <li id="addEventBtn"> <a href="<?php echo base_url();?>bcalendar/referal_url/?url='<?php print_r("http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']) ?>'" name="edit" class="btn btn-success pull-right"> <?=(lang('Apps_book'))?> </a> </li>
				<?php }else{ ?>
	            <a class="websbutton btn btn-success " href="javascript:;" id="bookClass" ><?=(lang('Apps_book'))?></a>
				<!---<a class="cancelClass websbuttonbtn btn-success delete_app " href="javascript:;" id="deleteApp" ><?=(lang('Apps_delete'))?></a>--->
				<input type="button" name="delete" value="<?=(lang('Apps_cancelapp'))?>" data-type="class"  id="deleteApp" class=" cancelClass websbuttonbtn btn btn-danger delete_app "/>
				<?php }?>
	        </li>
	    </ul>
    </div>

  
  
	

	</div>
	
	<script>
	$(".closeapp").click(function(){
	$(".schedule").val('0');
	})
	</script>