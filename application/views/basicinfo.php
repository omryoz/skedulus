<?php if($this->session->userdata('language')=='hebrew'){ ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&language=iw"></script>
<?php }else{?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<?php }?>
<script src="<?php echo base_url(); ?>js/googlemap.js"></script>
<script>
(function($,W,D)
{
    var JQUERY4U = {};

    JQUERY4U.UTIL =
    {
        setupFormValidation: function()
        {
            $("#frm1").validate({
                rules: {
                    category: "required",
                    name: "required",
					//userfile: "required",
					description: "required",
					address: "required",
                    calendar: "required",
					username: {
                        //required: true,
						remote: {
						  url: baseUrl+'basicinfo/checkusername',
						  type: "post",
						  data: {
							username: function(){ 
							var name=$("#username").val().split(' ').join('');
							var url=base_url+name;
							$("#business_url").html(url);
							return name;
							},
							id: function(){ return $("#business_id").val(); }
							//id: function(){ return $("#id").val(); }
						  }
                     }
					},
					mobile :{
					required: true,
					digits: true
					}
                },
                messages: {
				    username: "User name  already exist.Kindly choose another one",
                    category: "Category is required",
                    name: "Business name is required",
                    description: "Description is required",
                    address: "Address is required",
					calendar: "Calendar is required",
				    mobile: {
					required: 'Mobile number is required',
					digits: "Only numbers are allowed"
					}
					//userfile: " ",
                },
				
				errorPlacement: function(error, element) {
				 error.insertAfter( element ); 
				 error.css('padding-left', '10px');
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
		  <div id="myTabContent" class="tab-content tabcontentbg">	  
			  <!-- basic info start -->		  
      <div class="tab-pane fade active in" id="profile">
			  <div class="basicinfo span11">
			   <?php if($action=="add"){
			  $actions="basicinfo/?checkinfo";
			  }elseif($action=="edit"){
			  $actions="basicinfo/editinfo?checkinfo";
			  } ?>
			  <form action="<?php echo base_url(); ?><?php echo $actions; ?>" id="frm1" name="frm1" method="POST" enctype="multipart/form-data">  
			  <label>
			  		<h5>
			  			<span class="badge badge-success">1</span> &nbsp;&nbsp;&nbsp;<?=(lang('Apps_selectyourbusinesstype'))?>.
			  		</h5>
			  </label>
			  <div class="row-fluid">
			 
			  		<div class="span5">
						<label class="radio">
						<?php 
						 $Schecked="checked";
						 $Cchecked="";
						if(isset($business_type) && $business_type=='class'){
						  $Schecked="";
						  $Cchecked="checked";
						}?>
							<input type="radio" name="business_type" id="optionsRadios1" value="service" <?php echo $disabled ?> <?php echo $Schecked ?> onclick="getChecked('Services')">
							<?=(lang('Apps_services'))?></label>
						<p><small class="muted"><?=(lang('Apps_servicefeature'))?></small></p>
					</div>
					<div class="span5">		
					 	<label class="radio">
					 		<input type="radio" name="business_type" id="optionsRadios2" value="class" <?php echo $disabled ?> <?php echo $Cchecked ?> onclick="getChecked('Classes')" >
					 	 <?=(lang('Apps_classes'))?></label>	
						<p><small class="muted"><?=(lang('Apps_classfeature'))?></small></p>
			 		 </div>
			   </div>
			  
			  <label>
			  		<h5>
			  			<span class="badge badge-success">2</span> &nbsp;&nbsp;&nbsp;<?=(lang('Apps_uploadlogo'))?>.
			  		</h5>
			  </label>
			
			  <div>
			    <input type="file" name="userfile" size="20" />
			<!--	<input id="files-upload" name="image"  type="file" multiple >--->
			  </div>
			  
			  <label><h5>
			  	<span class="badge badge-success">3</span> &nbsp;&nbsp;&nbsp; <?=(lang('Apps_businessdetails'))?>
			  </h5></label>
			 
			  <div class="row-fluid">
				  <div class="span8">
				  <?php $selected = $category; ?>
				  <?php echo form_dropdown('category',$getCategory,$selected,' id="category" class="span4"')  ?>
				  <br clear="all"/>
					  <input type="text" placeholder="<?=(lang('Apps_businessname'))?>" class="span4 " name="name" id="name" value="<?php echo $name ?>">
					<br clear="all"/> 
					 <textarea rows="3" placeholder="<?=(lang('Apps_description'))?>" class="span8 " name="description" id="description" value="<?php echo $description ?>"><?php echo $description ?></textarea>
				    <br clear="all"/>
					<p><small class="muted"><? echo "Provide a unique username for generating your own business url"?></small></p>
				 	  <input type="text" placeholder="" class="span4" name="username" id="username" value="<?php echo $username ?>">
				    <?php  if(isset($this->session->userdata['business_id']) && $this->session->userdata['business_id']!=''){
					     $id=$this->session->userdata('business_id');
						}else{
						 $id='';
						}?>
					<input type="hidden" name="business_id" id="business_id" value="<?php print_r($id);?>" />
					<p id="business_url"><?php echo $businessurl; ?></p>
				 </div>
			 </div>

	<h5>
		<span class="badge badge-success">4</span> &nbsp;&nbsp;&nbsp;<?=(lang('Apps_addcontactinfo'))?>
	</h5>
	
	<div class="row-fluid">
		<div class="span5">
		
		<?php if(isset($address)) { 
		$add=$address;	
		}else{
		$add ="Israel";
		} 
		?>
		 <textarea class="postcode" id="Postcode" name="address" placeholder="<?=(lang('Apps_country'))?>" value="<?php echo $add; ?>"><?php echo $add; ?></textarea>
		
		<br clear="left"/>
		
	<input  type="text" placeholder="Mobile<?=(lang('Apps_mobileapp'))?>" name="mobile" maxlength="15" value="<?php echo $mobile ?>" id="mobile">
	    
         <input id="hidLat" name="hidLat" type="hidden" value="<?php echo $map_latitude; ?>">
         <input id="hidLong" name="hidLong" type="hidden" value="<?php echo $map_longitude ?>"> 
		</div>
		 <div class="span6">
		
				<div id="geomap" style="width:100%; height:400px;">
				<p><?=(lang('Apps_loadingwait'))?>...</p>
				
			</div>
		 </div>
		 
		
	</div>
	
	
	 <h5>
	 	<span class="badge badge-success">6</span> &nbsp;&nbsp;&nbsp;<?=(lang('Apps_availabilityhrs'))?></h5> 
	 	<div>

	 <div class="row-fluid"></div>
	 
	  
<?php //foreach( $isExistAvailability as $content){ 


$start = strtotime('7:00');
$end = strtotime('23:59');
			for( $i = $start; $i <= $end; $i += (60*15)) 
			{
			    $value=date('H:i', $i);
				$slotlist[$value] = date('H:i', $i); 
				
			}
			//$selected ="Select Time";
			
for($i=1;$i<=7;$i++) { 
	if($i%2==0){
	$class="row-fluid no-background";
	}else{
	$class="row-fluid background";
	}
	if(isset($isExistAvailability) && $isExistAvailability!=""){
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
	}else{
		if($i==7){
		$disabled="disabled=disabled";
		$checked="";
		$Sselected='08:00';
		$Eselected='19:00';
		}else if($i==6){
		$disabled="";
		$checked="checked";
		$Sselected='08:00';
		$Eselected='15:00';
		}else{
		$disabled="";
		$checked="checked";
		$Sselected='08:00';
		$Eselected='19:00';
		}
	}
?>       
<?php 
 
 // if($content['weekid']==$i){
	// $start=$content['start_time'];
	// $end=$content['end_time'];
 // }else{
 // $start="";
 // $end="";
 // }
 
 ?>
		  <div class="<?php echo $class; ?>">
			<div class="span1">
			<input type="checkbox" <?php  echo $checked; ?> name="<?php echo $i; ?>" onClick="getchecked(this,<?php echo $i ?>);" id="<?php echo $i; ?>"></div>
			<div class="span2"><?php echo $weekdays[$i] ?></div>
			<div class="span2">
			<div >
			<?php 
			$starttime=$i.'from';
			$id='divO'.$i;
			echo form_dropdown($starttime,$slotlist,$Sselected,'id="'.$id.'" class="span12"'.$disabled) 
			
			?>
			 
            	<!--<input type="text" class="<?php //echo $classS; ?>" name="<?php //echo $i ?>from"  readonly="readonly" id="divO<?php //echo $i; ?>" >---->
            	
        	</div>
			</div>
			<div class="span2">
			<div >
			<?php 
			$endtime=$i.'to';
			$id='divC'.$i;
			echo form_dropdown($endtime,$slotlist,$Eselected,'id="'.$id.'" class="span12"'.$disabled) 
			?>
            	<!---<input type="text" class="<?php //echo $classE; ?>"  name="<?php// echo $i ?>to"   readonly="readonly" id="divC<?php// echo $i; ?>">---->
            	
        	</div>
			</div>
					
	    </div>

<?php  }  ?>
	 </div>
	 <h5><span class="badge btn-primary">7</span> &nbsp;&nbsp;&nbsp;<?=(lang('Apps_selectcalendar'))?></h5>
	 <div>
	 <p class="muted"><?=(lang('Apps_selectcalendartype'))?></p>
	 <?php 
	 
	 $options= array(
	 ""=>'Select Calendar',
	 '1'=>'Christian calendar',
	 '2'=>'Jewish calendar'
	 );
	  $selected=$calendar;
	 ?>
	
	 <?php echo form_dropdown('calendar',$options,$selected,' id="calendar"'); ?>
	 
	 
	 </div>
	 <div class="pull-right">
	 <?php 
	 $url='services/list_services/?register';
	if(isset($business_type) && $business_type=='class'){
	  $url='services/list_classes/?register';
	 }?>
	 <input type="hidden" name="businessType" value="<?php echo $url;?>" id="businessType" >
    <?php if($action=="edit"){ ?>
	<input type="submit" name="save" value="<?=(lang('Apps_update'))?>" class="btn btn-success">	 
		<?php   }elseif($action=="add"){ ?>	
	<input type="submit" name="save" value="<?=(lang('Apps_savandcon'))?>" class="btn btn-success">
	<?php } ?>
	 <!---<a href="business_registration/services"  class="btn btn-primary" >Save & Continue</a>-->
	 </div>   
</form>	 
	</div>	
              
        
            </div>
            </div>

</div><!--row-fluid-->
</div><!--end of content-->


<!--model for add staff-->



<!--model for add service-->

 </div>
</div>

<script>

function getchecked(status,id){
  if(status.checked==true){
   $("#divO"+id).removeAttr("disabled");
   $("#divC"+id).removeAttr("disabled");
   }else if(status.checked==false){
   $("#divO"+id).attr('disabled',"disabled");
   $("#divC"+id).attr('disabled',"disabled");
   }
}
// function getChecked(status,id){
	// if(status.checked==true){
	// $("#divO"+id).attr("class","span6 input-time starttime");
	// $('#divO6').timepicker({                                  
                               // showMeridian: false,
                               // minuteStep: 15,
                               // showInputs: false,        
                               // disableFocus: true,
                               // template: false,
                               // defaultTime:'11:45' 
                       // });         
	// $("#divC"+id).attr("class","span6 input-time endtime");
	// }else if(status.checked==false){
	// $("#divC"+id).attr("class","span6 disabletime valid");
	// $("#divO"+id).attr("class","span6 disabletime valid");
	// }
// }

// window.onload= function getavailability(){
    // var url=baseUrl+'basicinfo/availability';
	// $.ajax({
		// data: {'id': 'getAvailability'},
		// url: url,
		// type:'GET',
		// dataType:'json',
		// success:function(data){
		// var content = eval(data);
		// $.each(content,function(i,v){
		// $("#"+v.weekid).attr('checked','checked');
		// $("#divO"+v.weekid).val(v.start_time);
		// $("#divC"+v.weekid).val(v.end_time);
		// })
		// }
	// })
	
// }


function getChecked(type){
if(type=='Classes'){
$("#businessType").val('services/list_classes/?register');
}else if(type=='Services'){
$("#businessType").val('services/list_services/?register');
}
 var selectedMenu='<strong>'+type+'<br><br></strong>';
 $("#business_type").html(selectedMenu);
}
</script>
<?php include('include/popupmessages.php'); ?>

