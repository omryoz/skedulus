<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
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
		$db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
		$res = $db->get_results("select calendar_id, calendar_name from calendar");   
 
		$ax=array();
		//return count($res);
		//
		$count=0;
		foreach ($res as &$value) {
			
			$count=$count+1;
			$calendar='';
			$calendarId=$value->calendar_id;
			$name=$value->calendar_name;
			$resServices = $db->get_results("select * from services");  
			foreach($resServices as $services){
			 $servicename[$services->id]= $services->name; 
			}	
			
			//Get Events for the calendar... 
			$condition=array();
			$condition['calendar_id']=$calendarId;
			$resEvents = $db->get_results("select * from appointments where calendar_id=".$calendarId." AND all_day='0'");   
			$eventsarray=array(); 
			$evCount=0;
			  
    		if(count($resEvents)>0)
			{ 
				foreach($resEvents as &$evVal)	
				{
						$evCount=$evCount+1;
						$event='';
						$currentdate=date('Y-m-d');
						$today = strtotime($currentdate);
						
						$event["eventId"]=$evVal->id;	  
						$temp['eventName']= $evVal->servicename;
						$value = explode(",", $temp['eventName']);
						/*$event['eventName']='';*/
						$temp1=array();
							foreach($value as $val){
							$temp1[] = $servicename[$val];
							}
						
						$event['eventName'] = implode(",",$temp1);
						$event['eventDesc']=$evVal->comments;
						$event['date']=$evVal->date;
						$event['startTime']=$evVal->starttime;
						$event['endTime']=$evVal->endtime;
						$event['group']['groupId']=$evVal->calendar_id;		
						$expire = strtotime($event['date']);
						
						if($expire < $today){
						$event['currentDay'] = 'hide';
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

}

?>