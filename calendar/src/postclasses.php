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
		$repeat=$this->queryVars['repeat_type'];
		
		$db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($start_date))."', '".date("Y-m-d",strtotime($end_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."')");
	   
	   $results = $db->query("select * from view_classes_posted_business where id = ".$db->insertedId."");
		
		 
		$input=array(); 
		$input['eventName']=$results->name;
		//$input['eventDesc']=$desc;
	    $input['group']['groupId']=1;  
		$input['eventId']=$db->insertedId;
		$input['startTime']=str_replace("/", "-", $start_date).' '.date("H:i:s", strtotime($sTimeStr));
		$input['endTime']=str_replace("/", "-", $end_date).' '.date("H:i:s", strtotime($eTimeStr)); 
	  
		return $input;
		
		
		
		 
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>