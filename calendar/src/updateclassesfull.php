<?php 
error_reporting(E_ERROR);
include('dbConfig.php');  
include('dbutil.php');  
?>
<?php
class updateclassesfull 
{
	var $queryVars;
	function updateclassesfull($queryVars)
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
		
		
		//$allday=$this->queryVars['allDay'];
		$sTime=$this->queryVars['st'];
		$eTime=$this->queryVars['et'];
		$sDate=$this->queryVars['sd'];
		$eDate=$this->queryVars['sd'];
		$lastDate=$this->queryVars['eden'];
		$class=$this->queryVars['class'];
		$trainer_id=$this->queryVars['tr_id'];
		$repeat=$this->queryVars['repeat_type'];
		$class_id=$this->queryVars['class_id'];
		$class_size=$this->queryVars['class_size'];
		//$event_id=$this->queryVars['event_id'];
		
				
		$db->query("update user_business_posted_class set user_business_classes_id='".$class."',  start_date='".$sDate."', end_date='".$eDate."', lastdate_enroll='".date("Y-m-d",strtotime($lastDate))."',start_time='".$sTime."',end_time= '".$eTime."',instructor=".$trainer_id.",repeat_type= '".$repeat."',class_size ='".$class_size."',modifiedStatus=1  where id=".$class_id);
		
		$input=array();
		$input['eventId']=$class_id;
		//$input['startTime']=$sTime;
		
		$input['startTime'] = str_replace("/", "-", $sDate).' '.date("H:i:s", strtotime($sTime));
		//$input['endTime']=$eTime;   	
		$input['endTime']=str_replace("/", "-", $eDate).' '.date("H:i:s", strtotime($eTime));   	
		//$input['allDay']=($allday==1)?true:false; 
		$input['group']['groupId']=1;
		$input['eventName']="Demo";
		//$input['eventDesc']=$desc;
			
		return $input;
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>