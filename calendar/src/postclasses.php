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
	 

	  if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!=""){
	      //$db->query("delete from user_business_posted_class  where id=".$this->queryVars['class_id']);
		  //$start_date1=date("Y/m/d",strtotime($this->queryVars['sd']));
		  $db->query("insert into posted_class_series(user_business_classes_id,date_added) VALUES ('".$this->queryVars['class_id']."', '".$date."')");
	      $seriesid= mysql_insert_id();
		  if($this->queryVars['repeatstatus'] == 'Remove Repeat' && $repeat=="weekly"){
			$repeat_week_days=$this->queryVars['checked'];
			}elseif($this->queryVars['repeatstatus'] == 'Remove Repeat' && $repeat=="monthly"){
			$repeat_months=$this->queryVars['checked'];
			}elseif($repeat=="daily"){
			$repeat_all_day='1';
			}
			
		  $db->query("update user_business_posted_class set user_business_classes_id='".$this->queryVars['class']."',seriesid='".$seriesid."', lastdate_enroll='".date("Y-m-d",strtotime($this->queryVars['eden']))."',start_time='".$this->queryVars['st']."',end_time='".$this->queryVars['et']."',instructor='".$this->queryVars['tr_id']."',repeat_type='".$this->queryVars['repeat_type']."',repeat_all_day='".$repeat_all_day."',repeat_week_days='".$repeat_week_days."',repeat_months='".$repeat_months."',class_size='".$this->queryVars['class_size']."' where id='".$this->queryVars['class_id']."'");	
		  $date1 = str_replace('-', '/', $this->queryVars['sd']);
		  $start_date = date('Y-m-d',strtotime($date1 . "+1 days"));
		  //$end_date=date("Y-m-d",strtotime($this->queryVars['ed']));	
		  if($this->queryVars['status']=='multi'){
		    $db->query("delete from user_business_posted_class  where seriesid='".$this->queryVars['seriesid']."' AND modifiedStatus='0' AND start_date >'".$this->queryVars['sd']."'");
		   }
		  if($this->queryVars['repeatstatus'] == 'Remove Repeat'){
		  $end_date=date("Y-m-d",strtotime($this->queryVars['ed']));		
		  }else{
		  $end_date=date("Y-m-d",strtotime($this->queryVars['sd']));
		  }
	  }else{
	    $db->query("insert into posted_class_series(user_business_classes_id,date_added) VALUES ('".$class_id."', '".$date."')");
	    $seriesid= mysql_insert_id();
		$start_date=date("Y-m-d",strtotime($this->queryVars['sd']));
		if($this->queryVars['repeatstatus'] == 'Remove Repeat'){
		$end_date=date("Y-m-d",strtotime($this->queryVars['ed']));		
		}else{
		$end_date=date("Y-m-d",strtotime($this->queryVars['sd']));
		}
	  }
	  
	 // if(isset($this->queryVars['class_id']) && $this->queryVars['class_id']!="" && $this->queryVars['status']=='multi'){
	  //echo "delete from user_business_posted_class  where seriesid='".$this->queryVars['seriesid']."' AND modifiedStatus='0'"; exit;
	     // $db->query("delete from user_business_posted_class  where seriesid='".$this->queryVars['seriesid']."' AND modifiedStatus='0'");
	  //}
	  

        $date= date("Y-m-d H:m:s"); 
		$class_id=$this->queryVars['class'];
		$class=$this->queryVars['class'];
		
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
						
						if($staff_id!=''){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						if($this->getworkingday($date3,$staffid)){
						$db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
						}
					 // $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
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
				        $date3 = strtolower(date("l", strtotime($check_date)));
						
						if($staff_id!=''){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						if($this->getworkingday($date3,$staffid)){
						//echo "insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')"; exit;
					    $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($check_date))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
					   }	
					}
					 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					
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
						//$start_date=date("Y-m-d",strtotime($this->queryVars['sd']));
						$date3 = strtolower(date("l", strtotime($monthdate)));
						
						if($staff_id!=''){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						if($this->getworkingday($date3,$staffid)){
					    $db->query("insert into user_business_posted_class(user_business_classes_id,start_date,end_date, lastdate_enroll,start_time,end_time,instructor,repeat_type,repeat_all_day,repeat_week_days,repeat_months,class_size,availability,seriesid) VALUES ('".$class_id."', '".date("Y-m-d",strtotime($monthdate))."', '".date("Y-m-d",strtotime($monthdate))."', '".date("Y-m-d",strtotime($lastdate))."', '".$sTimeStr."','".$eTimeStr."','".$staff_id."','".$repeat."','".$repeat_all_day."','".$repeat_week_days."','".$repeat_months."','".$class_size."','".$class_size."','".$seriesid."')");
					  }
					}
					
					
				break;
				
				
				
				default:
				echo "None";
				
				   }
		//}
		
		
	    
	}
	
	function getworkingday($date,$staffid){
	   $db = new db(EZSQL_DB_USER, EZSQL_DB_PASSWORD, EZSQL_DB_NAME, EZSQL_DB_HOST);
	   if($staffid!=''){
	   $res = $db->get_results("select * from view_service_availablity where users_id='".$staffid."' and type='employee' and name='".$date."'");   
	   }else{
	   $res = $db->get_results("select * from view_service_availablity where user_business_details_id='".$_SESSION['profileid']."' and type='business' and name='".$date."'");   
	   }
	   if($res){
	   return true;	
	   }else{
			return false;
	   }
	}
	
	function is_authorized()
	{
		return true;
	}
}

?>