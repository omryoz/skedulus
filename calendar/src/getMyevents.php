<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
session_start();
?>
<?php
class getMyevents 
{
	var $queryVars;
	function getMyevents($queryVars)
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
		$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		
		
		$res = $db->get_results("select * from client_service_appointments where users_id=".$this->queryVars['id'].""); 
		
		$ax=array();
		
		$count=0;
		foreach ($res as $key => $value) {
			
			$count=$count+1;
			$calendar='';
			
			$eventsarray=array(); 
			$event='';
			$event["eventId"]=$value->id;
			$event['eventName']=$value->note;
			//$event['buiseness']=$value->name;
			//$event['role']=$value->user_role;
			//$event['eventDesc']=$evVal->event_description;
			$event['startTime']=$value->start_time;
			$event['endTime']=$value->end_time;
			$event['group']['groupId']=$value->services_id;

			$eventsarray[$key]=$event; 	
			 
			$calendar['events']=$eventsarray;
			//$calendar["groupId"]=$calendarId;
			$calendar["name"]=$value->note;
			//print_r($calendar);
			$ax[$key]=$calendar;
			
		}
		
		return $ax; 
	}
	function is_authorized()
	{
		return true;
	} 

}

?>