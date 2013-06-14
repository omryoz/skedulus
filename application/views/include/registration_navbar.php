<div class="content">
<div class="maindiv container">
	<div class="row-fluid inner-tab">
	<div class="container-fluid">
	<div class="row-fluid">
	<?php 
	$url=$_SERVER['REQUEST_URI'];
	$results = explode('/', trim($url,'/'));
	?>
     <h3 >Business Registration </h3>
            <ul id="myTab" class="nav nav-tabs">
			<?php 
			 if($results[1]=="business_registration")
			{
			$class="active";
			}else{
			$class="";
			}
			 ?>
              <li class="<?php echo $class ?>" id="li_1">
				<a href="#">
					<div class="row-fluid">
					 <div class="span6">
				 		<i class="icon-check icon-3x"></i>
					</div>		 
					<div class="span6 registration_tabs">		
						<strong>Choose <br>Subscription</strong>
					</div>
					</div>
				</a>
			  </li>
			  <?php 
				 if($results[1]=="basicinfo")
				{
				$bclass="active";
				}else{
				$bclass="";
				}
				 ?>
              <li class="<?php echo $bclass ?>" id="li_2">
			  <a href="#" >
			  <div class="row-fluid">
					 <div class="span6">
				 		<i class="icon-list icon-3x"></i>
					</div>		 
					<div class="span6 registration_tabs">		
						<strong>Basic <br>Information</strong>
					</div>
					</div></a>
			  </li>
			  <?php 
				 if($results[1]=="services")
				{
				$sclass="active";
				}else{
				$sclass="";
				}
				 ?>
			  <li class="<?php echo $sclass ?>" id="li_4">
			  	<a href="#" >
					<div class="row-fluid">
						 <div class="span6">
							<i class="icon-wrench icon-3x"></i>
						 </div>		 
						 <div class="span6 registration_tabs">		
							<strong>Services <br><br></strong>
						 </div>
					</div>
				</a>
			</li>
			<?php 
				 if($results[1]=="staffs")
				{
				$stclass="active";
				}else{
				$stclass="";
				}
				 ?>
              <li class="<?php echo $stclass ?>" id="li_3">
				  <a href="#">
					  <div class="row-fluid">
							 <div class="span6">
								<i class="icon-user icon-3x"></i>
							</div>		 
							<div class="span6 registration_tabs">		
								<strong>&nbsp;&nbsp;Staff <br><br></strong>
							</div>
						</div>
					</a>
			  </li>
            </ul>