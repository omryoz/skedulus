
		</div>
		<h3 ><?=(lang('Apps_businesseslist'))?>
						   
						</h3>
		<div class="row-fluid Wrap">
			 <div class="wrap_inner">
				<!-- <h4>Search Businesses</h4> -->
				<br/>
				<div class="row-fluid strip">
					<form action="<?php echo base_url() ?>admin/dash/businesses/" method="GET">
						<div class="span10">
							<?php if(isset($search)){
						 $search=$search;
						}else{
						$search='';
						}?>
							<input type="text" class="span4 keyword" value="<?php echo (!empty($_GET['keyword']))?$_GET['keyword']:"";?>" name="keyword" placeholder="<?=(lang('Apps_searchbusiness'))?>" />
							<select name="plans" class="span4 plans">
								<option value="">Select Plans</option>
								<?php foreach($list as $p){  ?>
									<option value="<?=$p->id?>" <?=(!empty($_GET['plans']) && $_GET['plans']==$p->id)?"selected='selected'":""?>><?=$p->title?></option>
								<?php } ?>
							</select>
							<select name="status" class="span4 status">
								<option value="">Select Status</option>
								<option value="active" <?=(!empty($_GET['status']) && $_GET['status']=="active")?"selected='selected'":""?>>Active</option>
								<option value="inactive" <?=(!empty($_GET['status']) && $_GET['status']=="inactive")?"selected='selected'":""?>>Inactive</option>
							</select>
						</div>
						
						<div class="span2">						
						<input type="submit" name="search" class="btn btn-success span12" value="<?=(lang('Apps_search'))?>">		
							 <!---<a  href="global_search.php" class="btn span12 pull-right btn-success"> 
								<i class="icon-search"></i> Search
							  </a>--->
						</div>
					</form>
				</div>
			</div>
		</div><br/>
		<div class="row-fluid">
					<div class="">
						<?php if(isset($contentList) && !empty($contentList)){ ?>
						<table class="table  table-striped table-staff table-hover" >
						  <thead>
							<tr >
							  <th><h4><?=(lang('Apps_businessname'))?></h4></th>
							  <th><h4><?=(lang('Apps_owner'))?></h4></th>
							  <th><h4><?=(lang('Apps_email'))?></h4></th>
							  <th><h4><?=(lang('Apps_subscription'))?></h4></th>
							  <th><h4><?=(lang('Apps_status'))?></h4></th>
							  <th><h4><?=(lang('Apps_action'))?></h4></th>
							  
							</tr>
						  </thead>
						  <tbody class="moreresult">
						 <?php  foreach($contentList as $list){ ?>
							<tr >
							  <td><?php echo $list->business_name ?></td>
							  <td><?php print_r($list->first_name.' '.$list->last_name) ?></td>
							  <td><?php echo $list->email; ?></td>
							  <td><?php echo $list->subscription_name; ?> </td>
							  <td id="businessStatus<?php echo $list->business_id; ?>"><?php echo $list->status; ?> </td>
							  <td>
							 
							   
							   <div class="btn-group">

  <input type="button" name="status" title="<?php if($list->status=='active'){echo 'inactivate now';}else {echo 'activate now';} ?>" id="business<?php echo $list->business_id; ?>" value="<?php if($list->status=='active'){echo 'inactive';}else {echo 'active';} ?>" user-type="business" class="btn status" data-val="<?php echo $list->business_id; ?>" data-status="<?php echo $list->status; ?>">
  <a href="<?php echo base_url() ?>businessProfile/?id=<?php echo $list->business_id; ?>" class="btn" oncontextmenu="return false;"><?=(lang('Apps_viewdashboard'))?></a>
</div>
							 

							  </td>
							  
							</tr>
						<?php }?>
						</tbody>
						</table>
						<?php }else{ ?>
						<p class="alert"> <?=(lang('Apps_norecordsfound'))?></p>
						<?php } ?>
				
				  </div>
          </div><p class="nomore hide"></p>
		

 	
		
		
	</div>
</div>
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
		   var data = {'page_num':page,'keyword':$(".keyword").val(),'status':$(".status").val(),plans:$(".plans").val()};
		   $.ajax({
				type: "POST",
				url: base_url+"admin/dash/businesses",
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
