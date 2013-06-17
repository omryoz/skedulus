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
	    // if(isset($this->session->userdata['profile_id'])){
		  // $id=$this->session->userdata['profile_id'];
		// }elseif(isset($this->session->userdata['business_id'])){
		  // $id=$this->session->userdata['business_id'];
		// }
		
		$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		
		
		$res = $db->get_results("select * from view_client_buisness_services_appointments where users_id=".$this->queryVars['id'].""); 
		
		$ax=array();
		
		/*echo "select * from view_client_buisness_services_appointments where users_id=".$this->queryVars['id']."";
		exit;*/
		
		
		$count=0;
		foreach ($res as $key => $value) {
			
			$count=$count+1;
			$calendar='';
			//$calendarId=$value->id;
			//$name=$value->note;
			//Get Events for the calendar... 
			//$condition=array();
			//$condition['calendar_id']=$calendarId;
			
			$eventsarray=array(); 
			
			$event='';
			$event["eventId"]=$value->id;

			$event['eventName']=$value->note;
			$event['buiseness']=$value->name;
			$event['role']=$value->user_role;
			//$event['eventDesc']=$evVal->event_description;
			$event['startTime']=$value->start_time;
			$event['endTime']=$value->end_time;
			$event['group']['groupId']=$value->services_id;

			$eventsarray[$key]=$event; 	
			 
			$calendar['events']=$eventsarray;
			//$calendar["groupId"]=$calendarId;
			//$calendar["name"]=$value->note;
			//print_r($calendar);
			$ax[$key]=$calendar;
			
		}
		//print_r($calendar);
		return $ax; 
	}
	function is_authorized()
	{
		return true;
	} 

}

?>