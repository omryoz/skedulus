<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
?>
<?php
class deleteevent 
{
	var $queryVars;
	function deleteevent ($queryVars)
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
		$type=$this->queryVars['type'];
		$input=array();
		
		if($type='Class'){
		   $res = $db->get_results("select * from user_business_posted_class where id='".$this->queryVars['postedclassid']."'");
			foreach($res as $val){
			$avail=$val->availability;
			$class_size=$val->class_size;
			   
		   $update_avail=($avail+1); 
		   if($update_avail<=$class_size){
		   $db->query("update user_business_posted_class set availability='".$update_avail."' where id=".$this->queryVars['postedclassid']);
	       }
		   }	
		}
		$input['eventId']=$eventId; 
		$db->query("delete from client_service_appointments  where id=".$this->queryVars['eventId']);
		return $input;
	}
	function is_authorized()
	{
		return true;
	}
}

?>