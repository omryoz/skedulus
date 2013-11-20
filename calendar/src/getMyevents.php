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
		
		
		$res = $db->get_results("select * from view_client_appoinment_details where users_id=".$this->queryVars['id']." and booked_by='client'"); 
		
		$ax=array();
		
		$count=0;
		foreach ($res as $key => $value) {
			
			$count=$count+1;
			$calendar='';
			
			$eventsarray=array(); 
			$event='';
			$event["eventId"]=$value->id;
			$event['eventName']=$value->note;
			$event['business_name']=$value->business_name;
			$event['category_name']=$value->category_name;
			if($value->employee_id!=0){
			   $event['serviceProvider']=$value->employee_first_name." ".$value->employee_last_name;
			}
			//$event['eventDesc']=$evVal->event_description;
			$event['startTime']=$value->start_time;
			$event['endTime']=$value->end_time;
			
			$difference = strtotime($value->end_time) - strtotime($value->start_time);
			// getting the difference in minutes
			$difference_in_minutes = $difference / 60;
			$event['servicetime']=$difference_in_minutes;
			$event['group']['groupId']=$value->services_id;
            
			$serviceid=explode(',',$value->services_id);
			$name='';
			foreach($serviceid as $val){
			if($val!=''){
				$res = $db->get_results("select * from user_business_services where id='".$val."'");  
			    $name.=$res[0]->name.',';						
			}
		  }
			$event['serviceName']=rtrim($name,',');
			
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