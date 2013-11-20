<?php 
header('Content-Type: text/html; charset=utf-8');
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
session_start();
?>
<?php
class getevents 
{
	var $queryVars;
	function getevents($queryVars)
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
		//$id= SetValue;
		
		$res = $db->get_results("select * from user_business_services where user_business_details_id=".$_SESSION['profileid']);   
		$ax=array();
		//return count($res);
		//
		$count=0;
		foreach ($res as $value) {
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->id;
			$name=$value->name;

			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			$resEvents = $db->get_results("select * from view_client_appoinment_details where type='service' and user_business_details_id=".$_SESSION['profileid']);   
			$eventsarray=array(); 
			$evCount=0;
			  
    		if(count($resEvents)>0)
			{ 
				foreach($resEvents as $evVal)	
				{
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id;
						//$event['eventName']=html_entity_decode( $evVal->note, ENT_QUOTES, "utf-8" ); 
						$event['business_name']=$evVal->business_name;
						$event['category_name']=$evVal->category_name;
						if($evVal->employee_id!=0){
						   $event['serviceProvider']=$evVal->employee_first_name." ".$evVal->employee_last_name;
						}
						
						
						$event['clientname']=$evVal->clients_first_name." ".$evVal->clients_last_name;
						$difference = strtotime($evVal->end_time) - strtotime($evVal->start_time);
						// getting the difference in minutes
						$difference_in_minutes = $difference / 60;
						$event['servicetime']=$difference_in_minutes;
						$event['startTime']=$evVal->start_time;
						//$event['endTime']=$evVal->end_time;
						$event['group']['groupId']=$evVal->services_id;
						
						
						// getend time for business calendar 
						$total=0;
						$endtime=date("H:i",strtotime($evVal->end_time)); 
						$serviceid=explode(',',$evVal->services_id);
						$name='';
						foreach($serviceid as $val){
						if($val!=''){
							$res = $db->get_results("select * from user_business_services where id='".$val."'");  
						if($res[0]->padding_time_type=="Before & After"){
						  $twice=2;
						}else{
						  $twice=1;
						}	
						$total = $total + $res[0]->padding_time * $twice;
                        $name.=$res[0]->name.',';						
						}
					  }
						$event['serviceName']=rtrim($name,','); 
						$time = $this->convertToHoursMins($total,'%d:%d');						
						$end_time = $this->addTime($endtime,$time);
						$event['endTime']= date('Y-m-d',strtotime($evVal->end_time))." ".$end_time;
						
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
	function is_authorized()
	{
		return true;
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


}

?>