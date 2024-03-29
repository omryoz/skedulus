<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addImage").validate({
                rules: {
                    name: "required",
					userfile: "required",
                    order: {
						//required: true,
						digits:true,
					},
                },
                messages: {
                    name: " required",
					userfile: " ",
                    order:{
					//required: 'order required',
					digits: "numbers only",
					},	
             				
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
</script>

		<div class="row-fluid moreresult">
			<h3><?=(lang('Apps_photolist'))?>
				<a href="javascript:;"  class="btn pull-right btn-success gallery_add" data-toggle="modal">+<?=(lang('Apps_add'))?></a>
			</h3>
				<?php 
				$i=0;
				if(isset($tableList)) { ?>
				<ul class="unstyled photo_gallery thumbnails">
				<?php 	
				foreach($tableList as $content){
				if($i%4==0){
				echo '</ul><ul class="unstyled photo_gallery thumbnails ">';
				}
				?>
				
					<li class="span3  thumb-image">
						<div class="thumbnail">
							<div class="inblock">
						 <ul class="inline unstyled icon">
                                               <li><a href="#gallery" data-toggle="modal" class="btn  btn-mini" onclick= editPhoto(<?php echo $content['id']; ?>)><i class="icon-edit" title=" <?=(lang('Apps_edit'))?>"></i></a>
                                               </li>
                                               <li>
											   <a href="<?=base_url()?>gallery/manage_gallery?id=<?php echo $content['id']; ?>&delete=delete"  class="tool confirm btn btn-mini"><i class="icon-trash"></i></a>
											   <!---<a href="javascript:void(0);" class="btn  btn-mini" onclick= deletePhoto(<?php echo $content['id']; ?>)><i class="icon-trash" title=" <?=(lang('Apps_delete'))?>"></i></a>---->
                                               </li>
											   

                          </ul>
						<a href="#">
							<!-- <img src="<?php  echo base_url();?>uploads/gallery/<?php echo $content['photo']; ?>" > -->
						<!-- 	<?php echo $content['photo']; ?> -->
							
							 <img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/<?php echo $content['photo']; ?>/280/1/1/gallery"> 
							
							<!-- <img class="img-noresponsive" src="<?php echo base_url(); ?>common_functions/display_image/1.jpg/280/1/1/gallery"> -->
							
							
							
						</a>
							<h5>
								<center><a href="#"><?php echo $content['title'] ?></a></center>
							</h5>
						</div>
					</li>
				<?php $i++; } ?>
				</ul>
				<!---<div class="moreresult"></div>-->
				<?php }else{ ?>
				<p class="alert"><?=(lang('Apps_noimagesaddedyet'))?></p>
				<?php } ?>
				
				</div>
		</div>
	 <p class="nomore hide"></p>
		<div id="gallery" class="modal hide fade" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="staff1" id="edit" style="display:none"><?=(lang('Apps_editphoto'))?></h4>
		<h4 class="staff1" id="add" ><?=(lang('Apps_addphoto'))?></h4>
	  </div>
	  <div class="modal-body">
		<form name="addImage" id="addImage" class="bs-docs-example form-horizontal "  enctype="multipart/form-data"  action="<?php echo base_url();?>gallery/manage_gallery" method="POST">
				<div class="control-group">
				  <label class="control-label" for="firstname"><?=(lang('Apps_photoname'))?>  :</label>
				  <div class="controls">
					<input class="input-large " type="text" name="name" id="title" >
				  </div>
				</div>
				<div class="control-group" id="showPhoto">
				  <label class="control-label" for="lastname"> <?=(lang('Apps_uploadphoto'))?> :</label>
				  <div class="controls">
				  <input type="file" name="userfile" size="20" class="uploadedfile"/>
					<!--<input class="input-large " type="file" name="photo" id="photo">--->
				  </div>
				</div>
				
				<div class="control-group" id="changePhoto" style="display:none">
				  
				  <input type="text" name="photo" id="photo" readonly>
					<!--<input class="input-large " type="file" name="photo" id="photo">--->
				 
				</div>
				
				<div class="control-group">
				  <label class="control-label" for="firstname"> <?=(lang('Apps_description'))?>:</label>
				  <div class="controls">
					<textarea class="input-large " rows="3" placeholder="<?=(lang('Apps_description'))?>" name="description" id="description" ></textarea>
				  </div>
				</div>
	  <div class="control-group">
		<label class="control-label" for="inputPassword"> <?=(lang('Apps_order'))?>:</label>
		<div class="controls">
		  <input class="input-large " type="text" name="order" id="order" maxlength="5" >
		</div>
	  </div>  
	  <input type="hidden" name="insert" value="<?=(lang('Apps_insert'))?>" >
      <div class="" id="insert">
		<input type="submit" name="save" value="<?=(lang('Apps_save'))?>" class="btn btn-success pull-right">
	  </div>
		<div class=" pull-right" style="display:none" id="update" >
			  <input type="hidden" name="id" id="id" value="" />
			  <input type="submit" name="save" class="btn btn-success" value="<?=(lang('Apps_update'))?>" />
			  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" /><?=(lang('Apps_cancel'))?></a>
		</div> 		  
	  </form>
	  </div>
	 
	</div>
	
		
		
 	</div>
</div>

<style>
.error{
color: #FB3A3A;
display:inline;
}
</style>
<?php include('include/popupmessages.php'); ?>
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
		  page= parseInt(page)+parseInt(8);
		   var data = {'page_num':page};
		   $.ajax({
				type: "POST",
				url: base_url+"gallery/list_gallery",
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
</script>