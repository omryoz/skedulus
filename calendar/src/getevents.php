<?php 
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
						$event['eventName']=$evVal->note;
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
						//$event['role']=$evVal->user_role;
						//$event['eventDesc']=$evVal->event_description;
						$event['startTime']=$evVal->start_time;
						$event['endTime']=$evVal->end_time;
						$event['group']['groupId']=$evVal->services_id;
						/*$allDayIndicator= $evVal->all_day;
						if($allDayIndicator==0)
						{
							$event['allDay']=false;
						}else
						{
							$event['allDay']=true;
						}*/
						$eventsarray[$evCount]=$event; 
					
				}
				$calendar['events']=$eventsarray;
			}
			
			$calendar["groupId"]=$calendarId;
			$calendar["name"]=$name;
			$ax[$count]=$calendar;
			
		}
		//print_r($ax);
		return $ax; 
	}
	function is_authorized()
	{
		return true;
	} 

}

?>