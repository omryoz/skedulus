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
		$input=array();
		$input['eventId']=$this->queryVars['class_id']; 
		
		if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!="" && $this->queryVars['status']=='single'){
	     $db->query("delete from user_business_posted_class  where id=".$this->queryVars['class_id']);
	     }
	  
		  if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!="" && $this->queryVars['status']=='multi'){
			  $db->query("delete from user_business_posted_class  where start_date between '".$this->queryVars['startdate']."' and  '".$this->queryVars['enddate']."' and seriesid='".$this->queryVars['seriesid']."' AND modifiedStatus='0'");
		  }
		
		
		//$db->query("delete from user_business_posted_class  where id=".$this->queryVars['class_id']);

		return $input;
	}
	function is_authorized()
	{
		return true;
	}
}

?>