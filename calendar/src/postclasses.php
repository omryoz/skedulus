<?php 
//error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php'); 
session_start(); 


?>
<?php
class postclasses 
{
	var $queryVars;
	function postclasses($queryVars)
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
		
		/*$sTimeStr=$this->queryVars['st'];
		$eTimeStr=$this->queryVars['et'];
		$sDateStr=$this->queryVars['sd'];
		$eDateStr=$this->queryVars['ed'];
		$enrolLastDateStr=$this->queryVars['eden'];
		$className=$this->queryVars['class'];
		$groupId=$this->queryVars['groupId'];
		$user_id=$this->queryVars['user_id'];
		
	

		
       $db->query("insert into client_service_appointments(users_id,note,services_id, start_time,end_time,status) VALUES ('".$user_id."', '".$evName."', '".$groupId."', '".$sTimeStr."', '".$eTimeStr."','booked')");*/
	   
		$class=$this->queryVars['class'];
		$start_date=$this->queryVars['sd'];
		$end_date=$this->queryVars['ed'];
		$class_id=$this->queryVars['class'];
		$staff_id=$this->queryVars['tr_id'];
		$sTimeStr=$this->queryVars['st'];
		$eTimeStr=$this->queryVars['et'];
		$lastdate=$this->queryVars['eden'];
		$class_size=$this->queryVars['class_size'];
		$repeat=$this->queryVars['repeat_type'];
		$repeat_week_days="";
		$repeat_months="";
		$repeat_all_day="";
		$ax=array();
		$count=0;
		if($repeat=="weekly"){
		$repeat_week_days=$this->queryVars['checked'];
		}elseif($repeat=="monthly"){
		$repeat_months=$this->queryVars['checked'];
		}elseif($repeat=="daily"){
		$repeat_all_day='1';
		}
		
		// $fromDateTS = $this->queryVars['sd'];
		// $toDateTS = $this->queryVars['ed'];
		 //$days = (strtotime($toDateTS) - strtotime($fromDateTS)) / (60 * 60 * 24);
		
	   $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($start_date))."', '".date("Y-m-d",strtotime($end_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."')");
	   $id=  mysql_insert_id();
	   $results = $db->get_results("select * from view_classes_posted_business where id = '".$id."'");
	   $calendarId=$results[0]->id;
	   $name=$results[0]->name;
		//$input=array(); 
		//$input['eventName']=$results[0]->name;
		//$input['eventDesc']=$desc;
	    //$input['group']['groupId']=1;  
		//$input['eventId']=$id;
		$condition=array();
		$condition['calendar_id']=$calendarId;
		$startTime=str_replace("/", "-", $start_date).' '.date("H:i:s", strtotime($sTimeStr));
		$endTime=str_replace("/", "-", $end_date).' '.date("H:i:s", strtotime($eTimeStr)); 
		$check_date = $start_date;
		
		
		//print_r($results); exit;
		         $repeatType= $results[0]->repeat_type;
				 $eventsarray=array(); 
			     $evCount=0;
				 $count=$count+1;
				   switch($repeatType)
				   {
				   case "daily":
				    $id=1;
				while ($check_date <= $end_date) {
                 if(strtotime($check_date) <= strtotime($end_date)){									
					$evCount=$evCount+1;
						$event='';
						$event["eventId"]=$results[0]->id.$id;	  
						$event['eventName']= $results[0]->name;
						$event['startTime']=$check_date." ".$sTimeStr;
						$event['endTime']=$check_date." ".$eTimeStr;
						$eventsarray[$evCount]=$event; 
				}   
				    $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					$id++;
					$calendar['events']=$eventsarray;
				   
				}   
				break;
				
							
				
				default:
				echo "None";
				   
				   }
		
		
		
		
	  
	   
	      $calendar["groupId"]=$calendarId;
			$calendar["name"]=$name;
			$ax[$count]=$calendar;
		//print_r($ax); exit;
		return $ax;
		
		
		
		 
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>