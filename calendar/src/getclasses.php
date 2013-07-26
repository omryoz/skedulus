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
            $fromDateTS = $this->queryVars['st'];
			$toDateTS = $this->queryVars['et'];
			$days = (strtotime($toDateTS) - strtotime($fromDateTS)) / (60 * 60 * 24);
			
			
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
				  $repeatType= $evVal->repeat_type;
				   switch($repeatType)
				   {
				   case "daily":
				   $days = (strtotime($toDateTS) - strtotime($fromDateTS)) / (60 * 60 * 24);
				   $check_date = $fromDateTS;
				   if($days==1)
				   {
				   if(strtotime($evVal->start_date) <= strtotime($fromDateTS) && strtotime($fromDateTS) <= strtotime($evVal->end_date)){				
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id;	  
						$event['eventName']= $evVal->name;
						$event['startTime']=$fromDateTS." ".$evVal->start_time;
						$event['endTime']=$fromDateTS." ".$evVal->end_time;
						// if(strtotime($evVal->lastdate_enroll)<$today){
						// $event['currentDay'] = 'hide';
						// }
						$eventsarray[$evCount]=$event; 
					 }		
				   $calendar['events']=$eventsarray;	
				   }else{ 
				   $id=1;
					while ($check_date != $toDateTS) { 
					   if(strtotime($evVal->start_date) <= strtotime($check_date) && strtotime($check_date) <= strtotime($evVal->end_date)){				
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id." ".$id." ".$evVal->name;	  
						$event['eventName']= $evVal->name;
						$event['startTime']=$check_date." ".$evVal->start_time;
						$event['endTime']=$check_date." ".$evVal->end_time;
						// if(strtotime($evVal->lastdate)<$today){
						// $event['currentDay'] = 'hide';
						// }
						$eventsarray[$evCount]=$event; 
						//print_r($eventsarray);exit;
					 }		
							$check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
							$id++;
							$calendar['events']=$eventsarray;
							}
				   	
				   }
				break;
				
				case "weekly":
				   $days = (strtotime($toDateTS) - strtotime($fromDateTS)) / (60 * 60 * 24);
				   $check_date = $fromDateTS;
				   if($days==1)
				   {
				   if(strtotime($evVal->start_date) <= strtotime($fromDateTS) && strtotime($fromDateTS) <= strtotime($evVal->end_date)){				
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id;	  
						$event['eventName']= $evVal->name;
						$day= date('N',strtotime($fromDateTS));
						$repeat_week_day= explode(",",$evVal->repeat_week_days);
						if(in_array($day,$repeat_week_day) && strtotime($fromDateTS)<=strtotime($evVal->end_date) && strtotime($fromDateTS)>=strtotime($evVal->start_date)){
	     				$event['startTime']=$fromDateTS." ".$evVal->start_time;
						$event['endTime']=$fromDateTS." ".$evVal->end_time;
						//if(strtotime($evVal->lastdate)<$today){
						//$event['currentDay'] = 'hide';
						//}					
						$eventsarray[$evCount]=$event; 	
						
						}
					 }		
				   $calendar['events']=$eventsarray;	
				   }else{ 
				   $ids=1;
				   $repeat_week_day= explode(",",$evVal->repeat_week_days);
				   
					while ($check_date != $toDateTS) { 
					$day= date('N',strtotime($check_date));
					//print_r($day); exit;
					   if(in_array($day,$repeat_week_day) && strtotime($check_date)<=strtotime($evVal->end_date) && strtotime($check_date)>=strtotime($evVal->start_date)){
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id." ".$ids." ".$evVal->name;	  
						$event['eventName']= $evVal->name;
						$event['startTime']=$check_date." ".$evVal->start_time;
						$event['endTime']=$check_date." ".$evVal->end_time;
						// if(strtotime($evVal->lastdate)<$today){
						// $event['currentDay'] = 'hide';
						// }
						$eventsarray[$evCount]=$event; 
						//print_r($eventsarray);exit;
					 }		
						$check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
						$ids++;
						//$calendar['events']=$eventsarray;
						}
						$calendar['events']=$eventsarray;
				   	
				   }
				break;
				
				case "monthly":
				   $days = (strtotime($toDateTS) - strtotime($fromDateTS)) / (60 * 60 * 24);
			      $check_date = $fromDateTS;
				   if($days==1)
				   {
				   if(strtotime($evVal->start_date) <= strtotime($fromDateTS) && strtotime($fromDateTS) <= strtotime($evVal->end_date)){				
						$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$evVal->id;	  
						$event['eventName']= $evVal->name;
						$month= date('m',strtotime($fromDateTS));
						$day= date('d',strtotime($fromDateTS));
						$year= date('Y',strtotime($fromDateTS));
						$repeat_month= explode(",",$evVal->repeat_months);
						$Eventday= date('d',strtotime($evVal->start_date));
						$Evdate=$year.'-'.$month.'-'.$Eventday;
						if(date('d',strtotime($fromDateTS)) == date('d',strtotime($evVal->start_date))){
							if(in_array($month,$repeat_month)){
								$event['startTime']=$Evdate." ".$evVal->start_time;
								$event['endTime']=$Evdate." ".$evVal->end_time;
								$event['date']=$evVal->date;	
								//if(strtotime($evVal->lastdate)<$today){
								//$event['currentDay'] = 'hide';
								//}					
								$eventsarray[$evCount]=$event; 	
								//$calendar['events']=$eventsarray;
							}
						}	
						
						
					 }		
				   $calendar['events']=$eventsarray;	
				   }else{ 
				   $ids=1;
				  
					while($check_date != $toDateTS) { 
						$month= date('m',strtotime($check_date));
						$day= date('d',strtotime($check_date));
						$year= date('Y',strtotime($check_date));
						$repeat_month= explode(",",$evVal->repeat_months);
						$Eventday= date('d',strtotime($evVal->start_date));
						$Evdate=$year.'-'.$month.'-'.$Eventday;
						if(date('d',strtotime($check_date)) == date('d',strtotime($evVal->start_date))){
							if(in_array($month,$repeat_month)){
								$event["eventId"]=$ids."".$evVal->name;	  
								$event['eventName']= $evVal->name;
								$event['startTime']=$Evdate." ".$evVal->start_time;
								$event['endTime']=$Evdate." ".$evVal->end_time;
								//if(strtotime($evVal->lastdate)<$today){
								//$event['currentDay'] = 'hide';
								//}						
								$eventsarray[$evCount]=$event; 	
								
							}
						}
						$check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
							$ids++;
							$calendar['events']=$eventsarray;	
					}
				   	
				   }
				break;
				
				
				
				
				default:
				echo "None";
				   
				   }
					
				}
				
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