<?php //include('header_login.php')?>
	
		</div>
		<div>
		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url() ?>admin/dash/businesses"><?=(lang('Apps_businesses'))?></a> <span class="divider">/</span></li>
		  <li class="active"><?php print_r($details->manager_firstname." ".$details->manager_lastname); ?></li>
		  <li class="pull-right"><button onclick="history.go(-1);" class="btn btn-success pull-right"> <?=(lang('Apps_back'))?></button></li>
		</ul>
		
		
		</div>
		<div class="thumbnail">
		<br/>
		
		<!----<a href="#" class="btn btn-success pull-right"><i class="icon-edit"> Back</i></a>--->
		<br/>
			<table class="table">
			<thead><tr><th> <?=(lang('Apps_name'))?></th><td><?php print_r($details->manager_firstname." ".$details->manager_lastname); ?></td></tr></thead>
			<tbody>
				<tr>
				<th > <?=(lang('Apps_email'))?></th>
				<td><?php echo $details->manager_email ?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_businessname'))?></th>
				<td><?php echo $details->business_name ?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_category'))?></th>
				<td><?php echo $details->category_name	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_view'))?></th>
				<td><?php echo $details->business_type	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_mobilenumber'))?></th>
				<td><?php echo $details->mobile_number	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_description'))?></th>
				<td><?php echo $details->business_description	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_address'))?></th>
				<td><?php echo $details->address	?></td>
				</tr>
				
				
				</tbody>
			</table>
		
		</div>

 
	
		
		
	</div>
</div>

<?php //include('footer.php')?>
