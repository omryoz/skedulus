<?php 
//error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php'); 
session_start(); 


?>
<?php
class postclass 
{
	var $queryVars;
	function postclass($queryVars)
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
		//$db = new db("root", " ", "skedulus", "localhost");
		$name=$this->queryVars['name'];
		$start_date=$this->queryVars['startdate'];
		$end_date=$this->queryVars['enddate'];
		$class_id=$this->queryVars['classId'];
		$staff_id=$this->queryVars['trainer_id'];
		$sTimeStr=$this->queryVars['startTime'];
		$eTimeStr=$this->queryVars['endTime'];
		$lastdate=$this->queryVars['last_date'];
		$repeat=$this->queryVars['repeat'];
		
		
       $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type) VALUES ('".$class_id."', '".$start_date."', '".$end_date."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."')");
	   $input=array(); 
	    //$input['name']="Demo";
		$input['group']['groupId']=1;  
		//$input['startTime']=str_replace("/", "-", $start_date).' '.$sTimeStr;
		$input['startTime']=str_replace("/", "-", $start_date).' '.date("H:i:s", strtotime($sTimeStr));
		
		//$input['endTime']=str_replace("/", "-", $end_date).' '.$eTimeStr;	
		$input['endTime']=str_replace("/", "-", $end_date).' '.date("H:i:s", strtotime($eTimeStr));	
		//$input['eventName']="De";
		
		$input['eventId']= 1;
		//$input['eventType']= "PT";
		//$input['facility']= $class_id;
		//$input['publishStatus']= "PENDING";
		//$input['capacity']= 10;
		//$input['trainers'] = $staff_id;
		
		return $input;
		 
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>