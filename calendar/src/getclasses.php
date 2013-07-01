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
	    
		
		/*$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		$res = $db->get_results("select * from view_classes_posted_business where user_business_details_id=".$_SESSION['profileid']."");   
		
		$ax=array();
		
		$count=0;
		$evCount=0;
		foreach ($res as $value) {
			
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->id;
			$name=$value->name;

			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			$resEvents = $db->get_results("select * from view_classes_posted_business where user_business_classes_id=".$calendarId);   
			$eventsarray=array(); 
			
			
			$evCount=$evCount+1;
			$event='';
			$event["eventId"]=$value->id;
			$event['eventName']="Demo";
			//$event['role']=$value->user_role;

			$event['startTime']=$value->start_date.' '.$value->start_time;
			$event['endTime']=$value->end_date.' '.$value->end_time;
			$event['group']['groupId']=$value->user_business_classes_id;

			$eventsarray[$evCount]=$event; 
			  
    		if(count($resEvents)>0)
			{ 
				foreach($resEvents as $value)	
				{
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$value->id;
						$event['eventName']=$value->note;
						$event['role']=$value->user_role;
						
						$event['startTime']=$value->start_time;
						$event['endTime']=$value->end_time;
						$event['group']['groupId']=$value->services_id;
						
						$eventsarray[$evCount]=$event; 
					
				}
				$calendar['events']=$eventsarray;
			}
			$calendar['events']=$eventsarray;
			
			$calendar["groupId"]=$calendarId;
			//$calendar["name"]=$name;
			$ax[$count]=$calendar;
			
		}
		//print_r($ax);
		return $ax; */
		
		$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		//$id= SetValue;
		
		$res = $db->get_results("select * from user_business_classes where user_business_details_id=".$_SESSION['profileid']);   
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
						$event['eventName']=$evVal->note;
						//$event['role']=$evVal->user_role;
						//$event['eventDesc']=$evVal->event_description;
						$event['startTime']=$evVal->start_date.' '.$evVal->start_time;
						$event['endTime']=$evVal->end_date.' '.$evVal->end_time;
						$event['group']['groupId']=$evVal->services_id;
						
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