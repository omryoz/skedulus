<?php //print_r($appDetails);  ?>
<?php if(!empty($appDetails)) { ?>
			
			<?php foreach($appDetails as $val){ ?>
			<div class="appoint-date"><?php echo date("F j, Y ",strtotime(date('Y-m-d',strtotime($val)))); ?></div>
			<?php 
			 $where=' and users_id= "'.$userid.'" and user_business_details_id="'.$this->session->userdata['business_id'].'" ';
			$res=$this->common_model->getAllRows("view_client_appoinment_details","DATE(start_time)",$val,$where); 
 			//print_r($res);
			foreach($res as $resval){ ?>
				
					<div class="" >	
						<table >					
							<tbody>
								<tr>						
									<td class="appoint-time">						
									( <?php echo date('H:i',strtotime($resval->start_time)) ?>  - <?php echo date('H:i',strtotime($resval->end_time)) ?> )  
									<a href="javascript:void(0)" onclick="Appdetails(<?php echo $resval->id; ?>)" >
									<span > Service with <?php echo $resval->business_name ?></span> 
									</a>						
									</td>
								</tr> 
								<tr>						
									<td class="appoint-detail">			
									<ul class="inline unstyled">
									<?php
									  $difference = strtotime(date('H:i',strtotime($resval->end_time))) - strtotime(date('H:i',strtotime($resval->start_time)));
									  $difference_in_minutes = $difference / 60;
									?>
									<li><i class=" icon-time"></i><?php echo $difference_in_minutes; ?> min </li>			
									<?php if($resval->employee_id!=0){ ?>
									<li> <i class=" icon-user"></i> <?php print_r( $resval->employee_first_name." ".$resval->employee_last_name); ?> </li>	
									<?php }?>									
									<li> <i class=" icon-map-marker"></i> <?php echo $resval->category_name; ?> </li>
									</ul>						
									</td>					
								</tr>				
							</tbody>
						</table>		
					</div>
					<?php } ?>
			
			
			<?php }
			}else{
			echo 0;
			}?>
		
			
			