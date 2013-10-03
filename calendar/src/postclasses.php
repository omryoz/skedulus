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
	 

	  if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!="" && $this->queryVars['status']=='single'){
	      $db->query("delete from user_business_posted_class  where id=".$this->queryVars['class_id']);
	  }
	  
	  if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!="" && $this->queryVars['status']=='multi'){
	      $db->query("delete from user_business_posted_class  where seriesid='".$this->queryVars['seriesid']."' AND modifiedStatus='0'");
	  }
	  

        $date= date("Y-m-d H:m:s"); 
		$class_id=$this->queryVars['class'];
		$db->query("insert into posted_class_series(user_business_classes_id,date_added) VALUES ('".$class_id."', '".$date."')");
	    $seriesid= mysql_insert_id();
		$class=$this->queryVars['class'];
		$start_date=date("Y-m-d",strtotime($this->queryVars['sd']));
		if($this->queryVars['repeatstatus'] == 'Remove Repeat'){
		$end_date=date("Y-m-d",strtotime($this->queryVars['ed']));		
		}else{
		$end_date=date("Y-m-d",strtotime($this->queryVars['sd']));
		}
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
		if($this->queryVars['repeatstatus'] == 'Remove Repeat' && $repeat=="weekly"){
		$repeat_week_days=$this->queryVars['checked'];
		}elseif($this->queryVars['repeatstatus'] == 'Remove Repeat' && $repeat=="monthly"){
		$repeat_months=$this->queryVars['checked'];
		}elseif($repeat=="daily"){
		$repeat_all_day='1';
		}
		
		
			
		//if($repeat!=""){
		  switch($repeat)
				   {  
				case "daily":
				    $check_date = $start_date;
					while ($check_date <= $end_date) { 
				    if(strtotime($check_date) <= strtotime($end_date)){	
						
						
		                $date3 = strtolower(date("l", strtotime($check_date)));
						print_r($date3); exit;
					 $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
					 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					}
				   }
				break;
				
				case "weekly":
				    $check_date = $start_date;
					$repeat_week_day= explode(",",$repeat_week_days);
					while ($check_date <= $end_date) { 
					$day= date('N',strtotime($check_date));
					if(in_array($day,$repeat_week_day)){
				    //if(strtotime($check_date) <= strtotime($end_date)){				
					 $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
					 }
					 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					//}
				   }
				break;
				
				case "monthly":
				    $check_date = $start_date;
					
					    //$month= date('m',strtotime($check_date));
						$day= date('d',strtotime($check_date));
						$year= date('Y',strtotime($check_date));
						
						//$Eventday= date('d',strtotime($evVal->start_date));
						//$Evdate=$year.'-'.$month.'-'.$Eventday;
					$rmonths=rtrim($repeat_months,',');
					$repeat_month= explode(",",$rmonths);
					foreach($repeat_month as $mon){
					    $monthdate=$year.'-'.$mon.'-'.$day;
					    $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($monthdate))."', '".date("Y-m-d",strtotime($monthdate))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
					}
					
					
				break;
				
				
				
				default:
				echo "None";
				
				   }
		//}
		
		
	    
	}
	
	function getworkingday($date){
	   $resEvents = $db->get_results("select * from view_service_availablity where user_business_details_id='".$_SESSION['profileid']."' and name='".$date."'");   
	   $eventsarray=array(); 
	   $evCount=0;
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>