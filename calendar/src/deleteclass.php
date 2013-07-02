<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
?>
<?php
class deleteclass 
{
	var $queryVars;
	function deleteclass ($queryVars)
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
		  
		$eventId=$this->queryVars['eventId']; 
		$input=array();
		
		//$input['name']=$name; 
		$input['eventId']=$eventId; 
		$db->query("delete from user_business_posted_class  where id=".$this->queryVars['eventId']);
		//print_r($this->queryVars);
		//echo "delete from client_service_appointments  where id=".$this->queryVars['eventId'];
		return $input;
	}
	function is_authorized()
	{
		return true;
	}
}

?>