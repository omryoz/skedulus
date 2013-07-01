<?php 
//error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php'); 
session_start(); 


?>
<?php
class createevent 
{
	var $queryVars;
	function createevent($queryVars)
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
		$sTimeStr=$this->queryVars['st'];
		$eTimeStr=$this->queryVars['et'];
		$evName=$this->queryVars['eventName'];
		$groupId=$this->queryVars['groupId'];
		$user_id=$this->queryVars['user_id'];
		
	

		
       $db->query("insert into client_service_appointments(users_id,note,services_id, start_time,end_time,status) VALUES ('".$user_id."', '".$evName."', '".$groupId."', '".$sTimeStr."', '".$eTimeStr."','booked')");
		
		 
		$input=array(); 
		$input['eventName']=$evName;
		//$input['eventDesc']=$desc;
	    $input['group']['groupId']=$groupId;  
		$input['eventId']=$db->insertedId;
		$input['startTime']=$sTimeStr;
		$input['endTime']=$eTimeStr; 
	  
		return $input;
		 
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>