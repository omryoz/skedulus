<?php
		/*Get all empty slots*/
		
		$booked_container = array();
		//$slots = array();
		foreach($booked_slots as $key =>$booked){	
			$start_booked = strtotime($booked->start_time);
			$end_booked = strtotime($booked->end_time);
			for( $i = $start_booked; $i <= $end_booked; $i += (60*15)){
				//$booked_container = date('g:iA', $i).",";
				$booked_container[] = date('g:iA', $i);
			}
		}
	
		
		$total_slotlist = array();
		$start = strtotime($slots->start_time);
		$end = strtotime($slots->end_time);
		for( $i = $start; $i <= $end; $i += (60*15)){
			$total_slotlist[] = date('g:iA', $i);
		}
	
		$option = "";
		foreach($total_slotlist as $single_total){
			
			/*echo "Single Slots".$single_total."<br/>";
			print_r($booked_container)."Total Slots";*/
			
			if(in_array($single_total,$booked_container)){
				echo "Not Availble Slots".$single_total;
				
			}else{
				$option .= "<option id=".$i." value=".$single_total.">".$single_total."</option>"; 
			}
		}
		echo $option;
		exit;
		
		
	function in_multiarray($elem=false, $array=false,$field=false)
	{
		$top = sizeof($array) - 1;
		$bottom = 0;
		while($bottom <= $top)
		{
		if($array[$bottom][$field] == $elem)
		return true;
		else 
		if(is_array($array[$bottom][$field]))
		if(in_multiarray($elem, ($array[$bottom][$field])))
		return true;

		$bottom++;
		}        
		return false;
	}
		
		
		exit;
		
		
		
		

 
if(!empty($slots)){
	
	
	//print_r($timer);
	$option = "";
?>
<?php 
	
	/*$times = $slots->start_time;
	for($i=0;$i<=5;$i++){
		$option .= "<option id=".$i." value=".$timer.">".$times."</option>"; 
		
		$times = addTime($times,"00:15:00");
		//$timer = $time + $last_time
	}*/
	
		$start = strtotime($slots->start_time);
		$end = strtotime($slots->end_time);
		for( $i = $start; $i <= $end; $i += (60*15)) 
		{
			//$slotlist[] = date('g:iA', $i);
			$slotlist = date('g:iA', $i);
			$option .= "<option id=".$i." value=".$slotlist.">".$slotlist."</option>"; 
		}
		
		/*print_r($slotlist);
		exit;*/
	
	?>
	
<?php  
}else{ ?>
	$option =  "<option>No Slots Found<option>";
<?php }
	echo $option;
	
?>

<?php 

function addTime($a, $b)
{
   $sec=$min=$hr=0;
   $a = explode(':',$a);
   $b = explode(':',$b);

   if(($a[2]+$b[2])>= 60)
   {
     $sec=($a[2]+$b[2]) % 60;
     $min+=1;

   }
   else
   $sec=($a[2]+$b[2]);
   

   if(($a[1]+$b[1]+$min)>= 60)
   {
      $min=($a[1]+$b[1]+$min) % 60;
     $hr+=1;
   }
   else
    $min=$a[1]+$b[1]+$min;
    $hr=$a[0]+$b[0]+$hr;

   $added_time=$hr.":".$min.":".$sec;
   return $added_time;
}

?>