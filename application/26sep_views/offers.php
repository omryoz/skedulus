<script>
(function($,W,D)
{
    var JQUERY4U = {};
    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#addOffers").validate({
                rules: {
                    title: "required",
					type: "required",
					services: "required",
					description: "required",
                    discount: {
						required: true,
						digits:true
					},
                },
                messages: {
                    title: "Offer name reuired",
					type: "type required",
					services: "services required",
					description: "description required",
                    discount:{
					required: 'discount required',
					digits: "Only numbers allowed",
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

function showService(val){
var value = val.options[val.selectedIndex].value;
 if(value=="combo"){
  $("#combo").show();
  $("#individual").hide();
  
 }else if(value=="individual"){
  $("#individual").show();
  $("#combo").hide();
 }
}
  

    $(document).ready(function() {
      /* Multi select - allow multiple selections */
      /* Allow click without closing menu */
      /* Toggle checked state and icon */
	 
      $('.multicheck').click(function(e) {  
         $(this).toggleClass("checked"); 
		 $(this).find("span").toggleClass("icon-ok");
		 if($(this).find("span").attr("class")=="pull-right icon-ok"){
			var checkid= $(this).attr("class","multicheck checked").attr('id');
			$("#chck"+checkid).attr("checked", "true");
			}else if($(this).find("span").attr("class")=="pull-right"){
			var Unid= $(this).attr("class","multicheck checked").attr('id');
			$("#chck"+Unid).removeAttr("checked");
			}
			
         return false;
      });
	  
      /* Single Select - allow only one selection */  
      /* Toggle checked state and icon and also remove any other selections */  
       $('.singlecheck').click(function (e) {
            $(this).parent().siblings().children().removeClass("checked");
            $(this).parent().siblings().children().find("span").removeClass("icon-ok");
            $(this).toggleClass("checked");
            $(this).find("span").toggleClass("icon-ok");
			
			var Iservices=$(this).attr("class","singlecheck checked").attr('id');
			$("#Iservices").val(Iservices);
            return false;
        });        
    });
    
    
	
</script>			
<div class="row-fluid">
	<div class=" gallery">
	<h3>Offer List
		<a href="#offer"  class="btn pull-right btn-success" data-toggle="modal">+add</a>
	</h3>
	<?php  if(isset($tableList)){  ?>
	<table class="table  table-striped table-staff table-hover" >
	  <thead>
		<tr >
		  <th><h4>#</h4></th>
		  <th><h4>Offer Name</h4></th>
		  <th><h4>Action</h4></th>
		</tr>
	  </thead>
	  <?php $i=1; 
		 foreach($tableList as $content){
	  ?>
		<tr><td><?php echo $i; ?></td>
		  <td><?php echo $content['title']; ?></td>
		  <td>
		   <a href="#offer" data-toggle="modal"  onclick= editOffers(<?php echo $content['id'] ?>);return false; data-toggle="tooltip" class="tool" data-original-title="Edit"><i class="icon-edit icon-large"></i></a>&nbsp;&nbsp;&nbsp;
		   <a href="javascript:void(0);"  data-toggle="tooltip" class="tool" onclick= deleteOffer(<?php echo $content['id'] ?>); data-original-title="Delete"><i class="icon-trash icon-large"></i></a>
		  </td>
		</tr>
		 <?php $i++;} ?>										
	</table>
		<?php }else{?>
		 <p class="alert">No offers added yet</p>
		 <?php } ?>
	  </div>
  </div>
</div>


<div id="offer" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="staff1" id="edit" style="display:none">Edit Offer</h4>
		<h4 class="staff1" id="add" >Add Offer</h4>
	  </div>
	  <div class="modal-body">
		<form class="bs-docs-example form-horizontal " name="addOffers" id="addOffers" action="<?php echo base_url() ?>offers/manage_offers/?insert" method="POST">
				<div class="control-group">
				  <label class="control-label" for="firstname"> Offer Type :</label>
				  <div class="controls">
					<select class="input-large" name="type" id="type" onchange="showService(this);">
					<option value="">Select Offer</option>
					<option value="combo">Combo Offer</option>
					<option value="individual">Individual Offer</option>
					</select>
				  </div>
				</div>
				<div class="control-group" >
				  <label class="control-label" for="firstname">Service Name :</label>
				  <div class="controls" id="individual" style="display:none">
				   <ul class="unstyled label span2 dropdowns">
					<li class="dropdown">
					<a href="#" class="dropdown-toggle " data-toggle="dropdown">Select<b class="caret pull-right"></b></a>
						<ul class="dropdown-menu">
						
						<?php 
						//print_r($count);
						foreach($services as $val){ ?>
						<li><a name="services[]" id="<?php echo $val->id ?>" class="singlecheck" href="#"><?php echo $val->name ?>
							<span class="pull-right" id="Ichecked<?php  echo $val->id ?>"><input type="checkbox" name="Iservices[]" value="<?php echo $val->id ?>" id="chckInd<?php echo $val->id ?>" style="display:none" ></span></a></li>
						<?php }?>
							<div class="clearfix"></div>
						</ul>
					</li>
				   </ul>
				  </div>
				  <input type="hidden" value="" id="Iservices" name="Iservices">
				   <div class="controls" id="combo" style="display:none">
				<ul class="unstyled label span2 dropdowns">
				<li class="dropdown" >
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Select<b class="caret pull-right"></b></a>
					<ul class="dropdown-menu">
					<?php  foreach($services as $val){ ?>
					<li><a name="services" id="<?php echo $val->id ?>" class="multicheck" href="#"><?php echo $val->name ?>
						<span class="pull-right" id="Mchecked<?php echo $val->id ?>"><input type="checkbox" name="Mservices[]" value="<?php echo $val->id ?>" id="chck<?php echo $val->id ?>" style="display:none" ></span></a>
					</li>
					
					<?php }?>
						<div class="clearfix"></div>
					</ul>
				</li>
               </ul>
				  </div>
				  
				 
				</div>
				
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Offer Name :</label>
				<div class="controls">
				  <input class="input-large " type="text" placeholder="Offer Name" name="title" id="title" >
				</div>
			  </div>
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Offer Description :</label>
				<div class="controls">
				  <textarea class="input-large " type="text" placeholder="Description" name="description"  id="description"></textarea>
				</div>
			  </div>     
			  <div class="control-group">
				<label class="control-label" for="inputPassword">Discount :</label>
				<div class="controls">
				  <input class="input-large " type="text"  placeholder="Discount" id="discount" name="discount" maxlength="2"> &nbsp;%
				</div>
			  </div>  
			  <input type="hidden" name="insert" value="insert">
			<div class="modal-footer" id="insert">
				<input type="submit" name="save" value="Save" class="btn btn-success">
			</div>		
				<div class="modal-footer" style="display:none" id="update">
					  <input type="hidden" name="id" id="id" value="" />
					  <input type="submit" name="save" class="btn btn-success" value="Update" />
					  <a href="" onclick=submit(); name="save" class="btn btn-success" value="Cancel" />Cancel</a>
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

