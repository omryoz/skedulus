
					  
						 <h5> Edit Staff Availability </h5>
						  <?php 
							 $start = strtotime('7:00');
						     $end = strtotime('24:00');
							for( $i = $start; $i <= $end; $i += (60*15)) 
							{
								$value=date('H:i', $i);
								$slotlist[$value] = date('H:i', $i); 
								
							}
							for($i=1;$i<=7;$i++) { 
							if($i%2==0){
							$class="row-fluid no-background";
							}else{
							$class="row-fluid background";
							}
						
						    if(in_array($i,$isExistAvailability['weekids'])){
							     $checked="checked";
							     $Sselected=$isExistAvailability['values'][$i]['start_time'];
								 $Eselected=$isExistAvailability['values'][$i]['end_time'];
								  $disabled="";
							}else{
							      $checked="";
							      $Sselected='08:00';
								  $Eselected='15:00';
								  $disabled="disabled=disabled";
							}
						
						  ?>
							<div class="<?php echo $class; ?>">
								<div class="span3"> <label class="checkbox">
								<input type="checkbox" <?php echo $checked;?> id="<?php echo $i; ?>" onclick="getchecked(this,<?php echo $i ?>);"  name="<?php echo $i; ?>"><?php echo $weekdays[$i] ?></label> </div>
							
								<div class="span3">
									<div class="input-append bootstrap-timepicker span12" placeholder="open">
									<?php 
										$starttime=$i.'from';
										$id='divO'.$i;
										echo form_dropdown($starttime,$slotlist,$Sselected,'id="'.$id.'" class="span7"'.$disabled) 
										
									?>
									
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								<div class="span3">
									<div class="input-append bootstrap-timepicker span12" placeholder="close">
									<?php 
									$endtime=$i.'to';
									$id='divC'.$i;
									echo form_dropdown($endtime,$slotlist,$Eselected,'id="'.$id.'" class="span7"'.$disabled) 
									?>
									<span class="add-on"><i class="icon-time"></i></span>
									</div>
								</div>
								
						</div>
					<?php } ?>
					<div class="modal-footer" id="insert">
					<input type="button" onClick="staffInsert('staffavail')" name="save" class="btn btn-success" value="Save" />
					   
					 </div> 
					  <?php if(isset($_GET['register'])){ ?>
					 <input type="hidden" name="register" value="register">
					 <?php } ?>
			