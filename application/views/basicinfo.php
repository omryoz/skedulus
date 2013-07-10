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
					mobile :{
					required: true,
					digits: true
					}
                },
                messages: {
                    category: "Category is required",
                    name: "Business name is required",
                    description: "Description is required",
                    address: "Address is required",
					calendar: "Calendar is required",
				    mobile: {
					required: 'Mobile number is required',
					digits: "Only numbers are allowed",
					},
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
			  <form action="<?php echo base_url(); ?>basicinfo/?checkinfo" id="frm1" name="frm1" method="POST" enctype="multipart/form-data">  
			  <label>
			  		<h5>
			  			<span class="badge badge-success">1</span> &nbsp;&nbsp;&nbsp;Select Your Business Type.
			  		</h5>
			  </label>
			  <div class="row-fluid">
			  		<div class="span5">
						<label class="radio">
							<input type="radio" name="business_type" id="optionsRadios1" value="service" checked onclick="getChecked('Services')">
							Services</label>
						<p><small class="muted">Service providing businesses like stylist,salon,spa etc.</small></p>
					</div>
					<div class="span5">		
					 	<label class="radio">
					 		<input type="radio" name="business_type" id="optionsRadios1" value="class" onclick="getChecked('Classes')" >
					 	 Classes</label>	
						<p><small class="muted">Conducting classes like yoga,meditation etc.</small></p>
			 		 </div>
			   </div>
			  
			  <label>
			  		<h5>
			  			<span class="badge badge-success">2</span> &nbsp;&nbsp;&nbsp;Upload your business logo.
			  		</h5>
			  </label>
			
			  <div>
			    <input type="file" name="userfile" size="20" />
			<!--	<input id="files-upload" name="image"  type="file" multiple >--->
			  </div>
			  
			  <label><h5>
			  	<span class="badge badge-success">3</span> &nbsp;&nbsp;&nbsp;Business Details 
			  </h5></label>
			 
			  <div class="row-fluid">
				  <div class="span8">
				  <?php $selected = $category; ?>
				  <?php echo form_dropdown('category',$getCategory,$selected,' id="category" class="span4"')  ?>
				  <br clear="left"/>
					  <input type="text" placeholder="Business Name" class="span4" name="name" id="name" value="<?php echo $name ?>">
					<br clear="left"/> 
					 <textarea rows="3" placeholder="Description" class="span8" name="description" id="description" value="<?php echo $description ?>"><?php echo $description ?></textarea>
				 </div>
			 </div>

	<h5>
		<span class="badge badge-success">4</span> &nbsp;&nbsp;&nbsp;Address and Contact Info
	</h5>
	
	<div class="row-fluid">
		<div class="span5">
		
		<?php if(isset($address)) { 
		$add=$address;	
		}else{
		$add ="Israel";
		} 
		?>
		 <textarea class="postcode" id="Postcode" name="address" placeholder="Country" value="<?php echo $add; ?>"><?php echo $add; ?></textarea>
		
		<br clear="left"/>
	<input  type="text" placeholder="Mobile" name="mobile" maxlength="15" value="<?php echo $mobile ?>" id="mobile">
	    
         <input id="hidLat" name="hidLat" type="hidden" value="<?php echo $map_latitude; ?>">
         <input id="hidLong" name="hidLong" type="hidden" value="<?php echo $map_longitude ?>"> 
		</div>
		 <div class="span6">
		
				<div id="geomap" style="width:100%; height:400px;">
				<p>Loading Please Wait...</p>
				
			</div>
		 </div>
		 
		
	</div>
	
	
	 <h5>
	 	<span class="badge badge-success">6</span> &nbsp;&nbsp;&nbsp;Availability - Business hours</h5> 
	 	<div>

	 <div class="row-fluid"></div>
	 
	  
<?php //foreach( $isExistAvailability as $content){ 


$start = strtotime('7:00');
$end = strtotime('24:00');
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
			<div class="input-append bootstrap-timepicker span12" placeholder="open">
			<?php 
			$starttime=$i.'from';
			$id='divO'.$i;
			echo form_dropdown($starttime,$slotlist,$Sselected,'id="'.$id.'" class="span7"'.$disabled) 
			
			?>
			 
            	<!--<input type="text" class="<?php //echo $classS; ?>" name="<?php //echo $i ?>from"  readonly="readonly" id="divO<?php //echo $i; ?>" >---->
            	<span class="add-on"><i class="icon-time"></i></span>
        	</div>
			</div>
			<div class="span2">
			<div class="input-append bootstrap-timepicker span12" placeholder="close">
			<?php 
			$endtime=$i.'to';
			$id='divC'.$i;
			echo form_dropdown($endtime,$slotlist,$Eselected,'id="'.$id.'" class="span7"'.$disabled) 
			?>
            	<!---<input type="text" class="<?php //echo $classE; ?>"  name="<?php// echo $i ?>to"   readonly="readonly" id="divC<?php// echo $i; ?>">---->
            	<span class="add-on"><i class="icon-time"></i></span>
        	</div>
			</div>
					
	    </div>

<?php  }  ?>
	 </div>
	 <h5><span class="badge btn-primary">7</span> &nbsp;&nbsp;&nbsp;Select Calender</h5>
	 <div>
	 <p class="muted">Select a calendar type for your business</p>
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
	 <input type="hidden" name="businessType" value="services/list_services/?register" id="businessType" >
	 <input type="submit" name="save" value="Save & Continue" class="btn btn-success">
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

