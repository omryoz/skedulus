<?php //include('header_login.php')?>
	
		</div>
		<div>
		<ul class="breadcrumb">
		  <li><a href="<?php echo base_url() ?>admin/dash/users"><?=(lang('Apps_users'))?></a> <span class="divider">/</span></li>
		  <li class="active"><?php print_r($details->first_name."".$details->last_name); ?></li>
		  <li class="pull-right"><button onclick="history.go(-1);" class="btn btn-success pull-right"> <?=(lang('Apps_back'))?></button></li>
		</ul>
		
		
		</div>
		<div class="thumbnail">
		
		<!----<a href="#" class="btn btn-success pull-right"><i class="icon-edit"> Back</i></a>--->
		
			<table class="table">
			<thead><tr><th> <?=(lang('Apps_name'))?></th><td><?php print_r($details->first_name."".$details->last_name); ?></td></tr></thead>
			<tbody>
				<tr>
				<th > <?=(lang('Apps_email'))?></th>
				<td><?php echo $details->email ?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_userrole'))?></th>
				<td><?php echo $details->user_role ?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_gender'))?></th>
				<td><?php echo $details->gender	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_phonenumber'))?></th>
				<td><?php echo $details->phone_number	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_aboutme'))?></th>
				<td><?php echo $details->about_me	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_address'))?></th>
				<td><?php echo $details->address	?></td>
				</tr>
				<tr>
				<th > <?=(lang('Apps_status'))?></th>
				<td><?php echo $details->status	?></td>
				</tr>
				
				</tbody>
			</table>
		
		</div>

 
	
		
		
	</div>
</div>

<?php //include('footer.php')?>
