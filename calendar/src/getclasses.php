<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
session_start();
?>
<?php
class getclasses 
{
	var $queryVars;
	function getclasses($queryVars)
	{
		$this->queryVars = $queryVars;
	}
	/**
	 * Method to return the status of the AJAX transaction
	 *
	 * @return  string A string of raw HTML fetched from the Server
	 */
	function return_response()
	{  
	    // if(isset($this->session->userdata['profile_id'])){
		  // $id=$this->session->userdata['profile_id'];
		// }elseif(isset($this->session->userdata['business_id'])){
		  // $id=$this->session->userdata['business_id'];
		// }
		
		$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		
		
		$res = $db->get_results("select DISTINCT user_business_classes_id from view_classes_posted_business where user_business_details_id=".$_SESSION['profileid']);   
		$ax=array();
		//return count($res);
		//
		$count=0;
		foreach ($res as $value) {
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->user_business_classes_id;
			$name=$value->name;

			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			
			$resEvents = $db->get_results("select * from view_classes_posted_business where user_business_classes_id=".$calendarId);   
			$eventsarray=array(); 
			$evCount=0;
			  
    		if(count($resEvents)>0)
			{ 
				foreach($resEvents as $evVal)	
				{
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id;
						$event["classname"]=$evVal->name;
						$event["category_name"]=$evVal->category_name;
						$event['startTime']=$evVal->start_date." ".$evVal->start_time;
						//$event['endTime']=$evVal->end_date." ".$evVal->end_time;
						$endtime=$evVal->end_time;
						if($evVal->padding_time_type=="Before & After"){
						  $twice=2;
						}else{
						  $twice=1;
						}	
						$Totalpaddingtime = $evVal->padding_time * $twice;	
						$time = $this->convertToHoursMins($Totalpaddingtime,'%d:%d');
						$end_time = $this->addTime($endtime,$time);
						$event['endTime']= $evVal->end_date." ".$end_time;
						
						
						$classSize=$evVal->class_size - $evVal->availability;
						if($classSize==1){
						$event['classSize']=$classSize." participant";
						}else{
						$event['classSize']=$classSize." participants";
						}
						$difference = strtotime($evVal->end_time) - strtotime($evVal->start_time);
						// getting the difference in minutes
						$difference_in_minutes = $difference / 60;
						$event['servicetime']=$difference_in_minutes;
						$event['serviceProvider']=$evVal->instructor_firstname." ".$evVal->instructor_lastname;
						$event['group']['groupId']=$evVal->user_business_classes_id;
						
						$eventsarray[$evCount]=$event; 
					
				}
				$calendar['events']=$eventsarray;
			}
			
			$calendar["groupId"]=$calendarId;
			$calendar["name"]=$name;
			$ax[$count]=$calendar;
			
		}
		
		return $ax; 
	}
	
	function convertToHoursMins($time, $format = '%d:%d') {
		settype($time, 'integer');
		if ($time < 1) {
			return;
		}
		
		$hours = floor($time/60);
		$minutes = $time%60;
		return sprintf($format, $hours, $minutes);
	}
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

		
	function is_authorized()
	{
		return true;
	} 

}

?>