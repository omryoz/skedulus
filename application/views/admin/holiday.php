<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addCategory").validate({
                rules: {
                    category_name: "required",
                },
                messages: {
                    category_name: "  required", 				
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 

				},

                submitHandler: function(form) {
                form.submit();
                }
            });
        }
		
    }

    //when the dom has loaded setup form validation rules
    $(D).ready(function($) {
        JQUERY4U.UTIL.setupFormValidation();
    });

})(jQuery, window, document);

$(document).ready(function(){
 $("#cadd").click(function(){
$("#addCategory")[0].reset();
$('.error').html('');
$("#category_add").modal('show');
})
$(".editCategory").click(function(){
$('.error').html('');
})
})

</script>
		</div>
		<h3> <? echo "Holidays list"?>
						   <a href="javascript:;"  class="btn pull-right btn-success" id="cadd" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
						</h3> 
						<br/>

		<div class="row-fluid">
					<div class="">
						<?php if(isset($category) && $category!=''){ ?>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4> <? echo "Calendar name"?></h4></th>
							  <th><h4> <? echo "File name"?></h4></th>
							  <th><h4> <?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						  <?php foreach($category as $list){ ?>
							<tr >
							  <td><?php echo $list->calendar_name; ?> </td>
							  <td><?php echo $list->filename; ?> </td>
							  <td>
							  <a href="javascript:;" data-toggle="tooltip" data-name="<?php echo $list->calendar_name; ?>" data-val="<?php echo $list->id; ?>" class="tool editCategory" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="<?=base_url()?>admin/dash/deleteHoliday/<?php echo $list->id; ?>"  data-toggle="tooltip" class="tool confirmcat" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							  
							  </td>
							  
							</tr>
							
							
							
						<?php }?>
							
						</table>
						
				       <?php }else{ ?>
						<p class="alert"> <?=(lang('Apps_norecordsfound'))?></p>
						<?php } ?>
				  </div>
          </div>
		
		<!--start add category Modal -->
<div id="category_add" data-backdrop="static" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" class="title"></h3>
  </div>
  <form class="form-horizontal" action="<?php echo base_url() ?>admin/dash/holidays" enctype="multipart/form-data" id="addCategory" class="Category" method="POST">
  <div class="modal-body">
   
   			<div class="control-group">
			<label class="control-label" for="inputEmail"> Calendar Name</label>
			<div class="controls">
			  <input type="text" name="holiday_name" class="holiday_name"  placeholder="<? echo "Holiday name"?>">
			  <input type="hidden" value="" name="holidayid" class="category_id">
			</div>
		  </div>  
		  <div class="control-group">
			<label class="control-label" for="inputEmail">Upload holidays list file </label>
			<div class="controls">
			   <input type="file" name="userfile" size="100" class="uploadedfile"/>
			</div>
		  </div>  
  </div>
  <div class="modal-footer">
  <input type="submit" name="insert" value=" <?=(lang('Apps_save'))?>" class="btn btn-success">
    <!---<button class="btn btn-success">Save changes</button>--->
  </div></form>
  
</div>
<!--end add category Modal -->		
		
		
	</div>
</div>
<script>
	$(".confirmcat").click(function(e){ 
	 var this_ele = $(this);
	e.preventDefault();
	apprise("Are you sure you want to delete?", {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=this_ele.attr("href"); }else{ return false; } });
	})

</script>
<?php //include('footer.php')?>
