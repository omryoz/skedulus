<?php 
class calendar_model extends CI_Model {


// class getevents 
// {
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
		
		//$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		$res = mysql_query("select * from user_business_services where user_business_details_id='30'");   
 
		$ax=array();
		//return count($res);
		//
		$count=0;
		foreach ($res as &$value) {
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->id;
			$name=$value->name;

			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			$resEvents = $db->get_results("select * from client_service_appointments where services_id=".$calendarId);   
			$eventsarray=array(); 
			$evCount=0;
			  
    		if(count($resEvents)>0)
			{ 
				foreach($resEvents as &$evVal)	
				{
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->event_id;
					  
						$event['eventName']=$evVal->event_name;
						$event['eventDesc']=$evVal->event_description;
						$event['startTime']=$evVal->start_time;
						$event['endTime']=$evVal->end_time;
						$event['group']['groupId']=$evVal->calendar_id;
						$allDayIndicator= $evVal->all_day;
						if($allDayIndicator==0)
						{
							$event['allDay']=false;
						}else
						{
							$event['allDay']=true;
						}
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

//}


 
	
	
	
	
	
}
?>