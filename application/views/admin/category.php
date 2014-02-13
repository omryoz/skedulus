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
		<h3> <?=(lang('Apps_categorylist'))?>
						   <a href="javascript:;"  class="btn pull-right btn-success" id="cadd" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
						</h3> 
						<br/>
						
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<!-- <h4>Search Category</h4> -->
				<br/>
				<div class="row-fluid strip">
					<form  action="<?php echo base_url() ?>admin/dash/category/" method="POST">
						<div class="span10">
						<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span12 keyword" value="<?php echo $search;?>" name="keyword" placeholder=" <?=(lang('Apps_searchcategory'))?>">
							
						</div>
						
						<div class="span2">						
							<input type="submit" name="search" class="btn btn-success span12" value=" <?=(lang('Apps_search'))?>">	
						</div>
					</form>
				</div>
			</div>
		</div><br/>
		<div class="row-fluid">
					<div class="">
						<?php if(isset($category) && !empty($category)){ ?>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4> <?=(lang('Apps_category'))?></h4></th>
							  <th><h4> <?=(lang('Apps_action'))?></h4></th>
							</tr>
						  </thead>
						  <tbody class="moreresult">
						  <?php foreach($category as $list){ ?>
							<tr >
							  <td><?php echo $list->name; ?>
							  </td>
							  <td>
							  <a href="javascript:;" data-toggle="tooltip" data-name="<?php echo $list->name; ?>" data-val="<?php echo $list->id; ?>" class="tool editCategory" data-original-title="<?=(lang('Apps_edit'))?>"><i class="icon-edit"></i></a>&nbsp;&nbsp;&nbsp;
							  <a href="<?=base_url()?>admin/dash/deleteCat/<?php echo $list->id; ?>"  data-toggle="tooltip" class="tool confirmcat" data-original-title=" <?=(lang('Apps_delete'))?>"><i class="icon-trash"></i></a>
							  
							  </td>
							  
							</tr>
							
							
							
						<?php }?>
							
						</tbody>
						</table>
				       <?php }else{ ?>
						<p class="alert"> <?=(lang('Apps_norecordsfound'))?></p>
						<?php } ?>
				  </div><p class="nomore hide"></p>
          </div>
		
		<!--start add category Modal -->
<div id="category_add" data-backdrop="static" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel" class="title"></h3>
  </div>
  <form class="form-horizontal" action="<?php echo base_url() ?>admin/dash/category" id="addCategory" class="Category" method="POST">
  <div class="modal-body">
   
   			<div class="control-group">
			<label class="control-label" for="inputEmail"> <?=(lang('Apps_categoryname'))?></label>
			<div class="controls">
			  <input type="text" name="category_name" class="category_name"  placeholder="<?=(lang('Apps_categoryname'))?>">
			  <input type="hidden" value="" name="catid" class="category_id">
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
<?php //include('include/popupmessages.php'); ?>
<script>

        var page = 0;
		$(window).scroll(function(){ 
		if($(window).scrollTop() + $(window).height() == $(document).height()) { 
		if($(".nomore").html()!='0'){
		showmore();
		}
		}
		 
      })
	  
	  function showmore(){ 
		  page= parseInt(page)+parseInt(5);
		   var data = {'page_num':page,keyword:$(".keyword").val()};
		   $.ajax({
				type: "POST",
				url: base_url+"admin/dash/category",
				data:data,
				success: function(data) { 
				var str=data;
                var data=str.trim();
				if(data!=0){ 
				$(".moreresult").append(data);
				}else{
				$(".nomore").html(data);
				}

				}
			});
	  }
	
      function deletethis(url){
	    apprise(confirmdelete, {'confirm':true, 'textYes':'Yes already!', 'textNo':'No, not yet'},function (r){ if(r){ window.location.href=url; }else{ return false; } });
	  }
	  
	  function editCategory(name,id){
		 $(".title").html('Edit Category');
		 $(".category_name").val(name);
		 $(".category_id").val(id);
		 $("#category_add").modal("show");
	  }


</script>