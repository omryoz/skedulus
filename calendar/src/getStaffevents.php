<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
session_start();
?>
<?php
class getStaffevents 
{
	var $queryVars;
	function getStaffevents($queryVars)
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
		$staffid=$this->queryVars['staffid'];
		$businessid=$this->queryVars['businessid'];
		
		//$res = $db->get_results("select * from user_business_services where user_business_details_id=".$businessid);  
		//echo "select * from employee_services where users_id=".$staffid." AND business_id=".$businessid;exit;
		$res = $db->get_results("select * from view_employee_services where users_id=".$staffid." AND business_id=".$businessid); 		
		$ax=array();
		//return count($res);
		//
		$count=0;
		foreach ($res as $value) {
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->service_id;
			//$calendarId=$value->id;
			$name=$value->name;

			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			//echo "select * from client_service_appointments where services_id='".$calendarId."' AND employee_id ='".$staffid."'"; exit;
			$resEvents = $db->get_results("select * from client_service_appointments where employee_id ='".$staffid."' ");   
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
						$event['role']=$evVal->user_role;
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