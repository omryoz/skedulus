<?php 
class Business_profile_model extends CI_Model {

function getProfileDetails(){
		$sql="Select * from view_business_details where ";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['business_id'] =$dataP->business_id;
				$values[$i]['category_name']= $dataP->category_name;
				$values[$i]['image']= $dataP->image;
				$values[$i]['name']= $dataP->manager_firstname."".$dataP->manager_lastname;
				$values[$i]['mobile_number']= $dataP->mobile_number;
				$values[$i]['address']= $dataP->address;
				$values[$i]['business_description']= $dataP->business_description;
				$i++;
			}
			return $values;
		}
	}
	

function getProfileDetailsByfilter($filter=false,$limit=false,$offset=false,$orderBy=false){
		if($limit){	
			$this->db->limit($limit,$offset);
		}
		if($filter){
			$query = $this->db->get_where('user_business_details',$filter);
		}
		else{
			$query = $this->db->get('user_business_details');
		}
		if($this->db->affected_rows()){
			return $query->result();
		}else{
			return false;
		}	
}	

function getstaffDetailsByfilter($filter=false,$limit=false,$offset=false,$orderBy=false){
		if($limit){	
			$this->db->limit($limit,$offset);
		}
		if($filter){
			$query = $this->db->get_where('view_business_employees',$filter);
		}
		else{
			$query = $this->db->get('view_business_employees');
		}
		if($this->db->affected_rows()){
			return $query->result();
		}else{
			return false;
		}	
}	
 
 function insertFav($fav){
	if($fav){
	   $this->db->insert("favourite_businesses",$fav);
	   return true;
	  }else{
		return false;
	}
 } 
 
  function insertClient($fav){
	if($fav){
	   $this->db->insert("business_clients_list",$fav);
	   return true;
	  }else{
		return false;
	}
 } 
	
	
function getClasses($id){
		$sql="Select DISTINCT(user_business_classes_id), name,price,timelength,time_type from view_classes_posted_business where user_business_details_id =".$id;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
		return $data;
		}
	}
	
	function user_business_availability($id,$type){
	if($type=='employee'){
	 $where = "users_id ='".$id."' and type='".$type."'";
	}else{
	$where="user_business_details_id ='".$id."' and type='".$type."'";
	}
	    $sql="Select users_id,user_business_details_id,type,start_time FROM `user_business_availability` WHERE ".$where;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		$values=''; 
		if($data){
		if($sql_num_rows<1){ 
		$start_time=date('H',strtotime($data[0]->start_time));
		}else{
			foreach($data as $dataP){
				$values[$i]= "'".$dataP->start_time."'";
				$i++;
			}	
			$val= implode(',',$values);
			$sql1="Select LEAST(".$val.") As least";
			$query1=$this->db->query($sql1);
		    $data1= $query1->result(); 
			$start_time=date('H',strtotime($data1[0]->least));	
			}
			$sql2="Select max(end_time) as end_time FROM `user_business_availability` WHERE ".$where;
		    $query2=$this->db->query($sql2);
		    $data2= $query2->result();
			
			return array('start_time'=>$start_time,'end_time'=>date('H',strtotime($data2[0]->end_time)));
		}
	}
	
	function getappointments($bstarttime=false,$bendtime=false,$calendarid=false,$filter=false,$agenda=false,$statusType=false,$startsfrom=false,$stopsat=false,$staff=false,$business_id=false){ 
	$csql="SELECT COUNT( * ) as Empcount FROM employee_services WHERE business_id =".$business_id;
	$cquery=$this->db->query($csql);
	$cdata= $cquery->result();
	   if($agenda!=''){
		 $value='[';
		 if($statusType=='upcoming'){
		    $filter.=' and Date(start_time)>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $filter.=' and Date(start_time)<"'.date("Y-m-d").'"';
		 }
	   }else{
		$value='';
	   }
		$sql="Select * from view_client_appoinment_details where ". $filter;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		
		
		if($data){
			foreach($data as $dataP){
			  // getend time for business calendar 
						 $total=0;
						 $endtime=date("H:i",strtotime($dataP->end_time)); 
						 $serviceid=explode(',',$dataP->services_id);
						 $Sname='';
						foreach($serviceid as $val){
						if($val!=''){
							$query1 = $this->db->query("select * from user_business_services where id='".$val."'"); 
                            $res= $query1->result();							
						if($res[0]->padding_time_type=="Before & After"){
						  $twice=2;
						}else{
						  $twice=1;
						}	
						$total = $total + $res[0]->padding_time * $twice;
                        $Sname.=$res[0]->name.',';						
						}   
					  }
					    $time = $this->convertToHoursMins($total,'%d:%d');						
						$end_time1 = $this->addTime($endtime,$time);
						
						$endTime= date('Y-m-d',strtotime($dataP->end_time))." ".$end_time1;
						$difference = strtotime($dataP->end_time) - strtotime($dataP->start_time);
						// getting the difference in minutes
						$difference_in_minutes = $difference / 60;
						$servicetime="<i class=' icon-time'></i>".$difference_in_minutes." mins";
						$eventid=$dataP->id;
					  if($dataP->status=='busytime'){
						if($staff!='' || ($staff=='' && $cdata[0]->Empcount=='1') || ($staff=='' && $dataP->employee_id=='0'))
						{ 
					    $serviceName=''; 
						$clientname='';
						$serviceProvider='';
						$showserviceProvider='';
						$showServicename='';
						
						if($this->session->userdata['role']=='manager'){
					    $serviceName=$dataP->note; 
						$clientname='';
						$showServicename=$dataP->note;
						$endTime=$endTime;
						$serviceProvider=$dataP->employee_first_name." ".$dataP->employee_last_name;
						if($dataP->employee_first_name!='' || $dataP->employee_last_name!=''){
						$showserviceProvider ="<i class=' icon-user'></i>".$dataP->employee_first_name." ".$dataP->employee_last_name."";
						}
						$category_name=$showserviceProvider;
						}
						}else{
						$eventid='';
						}
					  }elseif($dataP->status=='booked'){
			            $serviceName=''; 
						$clientname='';
						$serviceProvider='';
						
						$showserviceProvider='';
						if($dataP->employee_first_name!='' || $dataP->employee_last_name!=''){
						$showserviceProvider ="<i class=' icon-user'></i>".$dataP->employee_first_name." ".$dataP->employee_last_name;
						}
						$category_name=$showserviceProvider."<i class=' icon-map-marker'></i>".$dataP->category_name;
						$endTime=$dataP->paddingendtime;
						if($this->session->userdata['role']=='manager'){
						$serviceName=rtrim($Sname,','); 
						$clientname=$dataP->clients_first_name." ".$dataP->clients_last_name;
						$showServicename=$serviceName;
					    if($dataP->employee_id!=0){
						   $serviceProvider=$dataP->employee_first_name." ".$dataP->employee_last_name;
						   $showServicename=$serviceName." with ".$serviceProvider;
						 }
						}elseif($this->session->userdata['role']=='client'){ 
						   if($this->session->userdata['id']==$dataP->users_id && $dataP->booked_by=='client'){
						    $serviceName=rtrim($Sname,','); 
							$clientname=$dataP->clients_first_name." ".$dataP->clients_last_name;
							$showServicename=$serviceName;
							if($dataP->employee_id!=0){
							   $serviceProvider=$dataP->employee_first_name." ".$dataP->employee_last_name;
							   $showServicename=$serviceName." with ".$serviceProvider;
							 }
						   }
						}
						 
					 }
					
			   if($eventid!=''){	
			   $value.='{"id": "'.$dataP->id.'","start": "'.date('Y/m/d H:i:s',strtotime($dataP->start_time)).'","end": "'.date('Y/m/d H:i:s',strtotime($endTime)).'","service_name": "'.$serviceName.'","serviceProvider": "'.$serviceProvider.'","allDay": false,"client_name": "'.$clientname.'","servicetime":"'.$servicetime.'","category_name":"'.$category_name.'","showServicename":"'.$showServicename.'"}';
			   $value.=",";
			   }
			}
			
			//echo $value;
		}
		
		if($staff!=''){
		$where=1;
		if($agenda!=''){
		 if($statusType=='upcoming'){
		     $where.=' and Date(start_time)>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $where.=' and Date(start_time)<"'.date("Y-m-d").'"';
		 }
	   }
		
		     $sqlb="select * from view_client_appoinment_details where user_business_details_id='".$business_id."' and status='busytime' and employee_id='0' and ".$where;
		$queryb=$this->db->query($sqlb);
		$datab= $queryb->result();
		if($datab){
			foreach($datab as $databh){
			         $serviceName=''; 
						$clientname='';
						$serviceProvider='';
						$showserviceProvider='';
						$showServicename='';
						
						if($this->session->userdata['role']=='manager'){
					    $serviceName=$databh->note; 
						$clientname='';
						$showServicename=$databh->note;
						$serviceProvider=$databh->employee_first_name." ".$databh->employee_last_name;
						if($databh->employee_first_name!='' || $databh->employee_last_name!=''){
						$showserviceProvider ="<i class=' icon-user'></i>".$databh->employee_first_name." ".$databh->employee_last_name."";
						}
						$category_name=$showserviceProvider;
						}
						 $value.='{"id": "'.$databh->id.'","start": "'.date('Y/m/d H:i:s',strtotime($databh->start_time)).'","end": "'.date('Y/m/d H:i:s',strtotime($databh->end_time)).'","service_name": "'.$serviceName.'","serviceProvider": "'.$serviceProvider.'","allDay": false,"client_name": "'.$clientname.'","servicetime":"'.$servicetime.'","category_name":"'.$category_name.'","showServicename":"'.$showServicename.'"}';
			   $value.=",";
			}
		}
		}
		
		$where='1';
		if($agenda!=''){
		 if($statusType=='upcoming'){
		    $where.=' and holiday_date>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $where.=' and holiday_date<"'.date("Y-m-d").'"';
		 }
	   }
		$sqlh="select * from holidays_list where calendar_id='".$calendarid."' and length='Full' and ".$where;
		$queryh=$this->db->query($sqlh);
		$datah= $queryh->result();
		if($datah){
			foreach($datah as $dataPh){
			         if($this->session->userdata('language')=='hebrew'){ 
					  $calname=$dataPh->name_heb;
					 }else{
					  $calname=$dataPh->name_en;
					 }
			            $serviceName=$calname; 
						$clientname='';
						$bstartTime=date('Y/m/d',strtotime($dataPh->holiday_date))." ".$bstarttime.':00:00';
						$bendTime=date('Y/m/d',strtotime($dataPh->holiday_date))." ".$bendtime.':00:00';
						$id='c'.$dataPh->id;
						$showServicename=$calname;
						$servicetime='';
						$category_name='';
			   $value.='{"id": "'.$id.'","start": "'.$bstartTime.'","end": "'.$bendTime.'","service_name": "'.$serviceName.'","allDay": false,"client_name": "'.$clientname.'","serviceProvider": " ","servicetime":" ","showServicename":"'.$showServicename.'","servicetime":"'.$servicetime.'","category_name":"'.$category_name.'"}';
			   $value.=",";
			}
		}
		$value=rtrim($value,',');
		if($agenda!=''){
		$value.=']';
		}
		
		if($agenda!=''){
		   $vals=json_decode($value);
		   //usort($vals, function($a, $b) {
		    if($statusType=='upcoming'){
		    usort($vals, function($a, $b) {
			return strtotime($a->start) - strtotime($b->start);
		   });
		   }elseif($statusType=='past'){
		    usort($vals, function($a, $b) {
			return strtotime($b->start) - strtotime($a->start);
		   });
		   }
		$vals1=array_slice($vals, $startsfrom,$stopsat);
		if(empty($vals1)){
		$val1='[{"flag": 0}]';
		echo $val1;
		//$vals1 = array('flag'=>0);
		}else{
		print_r(json_encode($vals1));
		}
		}else{

		 return $value;
		}
		
	}
	
	function deleteapp(){
		if($this->input->post('type')=='class'){
		   $query = $this->db->query("select * from user_business_posted_class where id='".$this->input->post('postedclassid')."'");
		   $res= $query->result();
			foreach($res as $val){
			$avail=$val->availability;
			$class_size=$val->class_size;
			   
		   $update_avail=($avail+1); 
		   if($update_avail<=$class_size){
		   $this->db->query("update user_business_posted_class set availability='".$update_avail."' where id=".$this->input->post('postedclassid'));
	       }
		  }	
		}
		
		$this->db->query("delete from client_service_appointments  where id=".$this->input->post('eventId'));
	
	}
	
	function getmyappointments($userid=false,$agenda=false,$statusType=false,$startsfrom=false,$stopsat=false){ 
	   $filter=1;
	   if($agenda!=''){
		 $value='[';
		 if($statusType=='upcoming'){
		    $filter.=' and Date(start_time)>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $filter.=' and Date(start_time)<"'.date("Y-m-d").'"';
		 }
	   }else{
		$value='';
	   }
	
	
		$sql="select * from view_client_appoinment_details where users_id=".$userid." and booked_by='client' and ".$filter;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		
		//$value='';
		if($data){
			foreach($data as $dataP){
			  // getend time for business calendar 
						 $total=0;
						 $endtime=date("H:i",strtotime($dataP->end_time)); 
						 $serviceid=explode(',',$dataP->services_id);
						 $Sname='';
						 if($dataP->type=='service'){
						foreach($serviceid as $val){
						if($val!=''){
							$query1 = $this->db->query("select * from user_business_services where id='".$val."'"); 
                            $res= $query1->result();							
						
                        $Sname.=$res[0]->name.',';						
						}   
					   }
			            $serviceName=rtrim($Sname,','); 
						}else{
						 $getclassname=$this->common_model->getRow("view_classes_posted_business",'id',$dataP->services_id);
						 $serviceName=$getclassname->name; 
						}
						$clientname=$dataP->business_name;
						
						
						$difference = strtotime($dataP->end_time) - strtotime($dataP->start_time);
						// getting the difference in minutes
						$difference_in_minutes = $difference / 60;
						$servicetime="<i class=' icon-time'></i>".$difference_in_minutes." mins";
						
						$showserviceProvider='';
						if($dataP->employee_first_name!='' || $dataP->employee_last_name!=''){
						$showserviceProvider ="<i class=' icon-user'></i>".$dataP->employee_first_name." ".$dataP->employee_last_name;
						}
						$category_name=$showserviceProvider."<i class=' icon-map-marker'></i>".$dataP->category_name;
						
						//$category_name="<i class=' icon-map-marker'></i>".$dataP->category_name;
						$showServicename=$serviceName;
					    if($dataP->employee_id!=0){
						   $serviceProvider=$dataP->employee_first_name." ".$dataP->employee_last_name;
						   $showServicename=$serviceName." with ".$dataP->business_name;
						}

			   $value.='{"id": "'.$dataP->id.'","start": "'.date('Y/m/d H:i:s',strtotime($dataP->start_time)).'","end": "'.date('Y/m/d H:i:s',strtotime($dataP->end_time)).'","service_name": "'.$serviceName.'","serviceProvider": "'.$serviceProvider.'","allDay": false,"client_name": "'.$clientname.'","servicetime":"'.$servicetime.'","category_name":"'.$category_name.'","showServicename":"'.$showServicename.'"}';
			   $value.=",";
			}
			
			//echo $value;
		}
		$value=rtrim($value,',');
		if($agenda!=''){
		$value.=']';
		}
		 if($agenda!=''){
		   $vals=json_decode($value);
		   //usort($vals, function($a, $b) {
		    if($statusType=='upcoming'){
		    usort($vals, function($a, $b) {
			return strtotime($a->start) - strtotime($b->start);
		   });
		   }elseif($statusType=='past'){
		    usort($vals, function($a, $b) {
			return strtotime($b->start) - strtotime($a->start);
		   });
		   }
		  $vals1=array_slice($vals, $startsfrom,$stopsat);
		  if(empty($vals1)){
			$val1='[{"flag": 0}]';
			echo $val1;
			//$vals1 = array('flag'=>0);
			}else{
			print_r(json_encode($vals1));
			}
		  //print_r(json_encode($vals1));
		}else{
		 return $value;
		}
		 //return $value;
	
	}
	
	function getpostedclasses($bstarttime=false,$bendtime=false,$calendarid=false,$bid=false,$instructor=false,$agenda=false,$statusType=false,$startsfrom=false,$stopsat=false){ 
		if(isset($instructor) && $instructor!=''){
		 $where=" instructor= ".$instructor;
		}else{
		 $where=1;
		} 
	
	   if($agenda!=''){
		 $value='[';
		 if($statusType=='upcoming'){
		    $where.=' and start_date>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $where.=' and start_date<"'.date("Y-m-d").'"';
		 }
	   }else{
		$value='';
	   }
	//echo "select DISTINCT user_business_classes_id from view_classes_posted_business where user_business_details_id='".$bid."' and ".$where; exit;
		$sql="select DISTINCT user_business_classes_id from view_classes_posted_business where user_business_details_id='".$bid."' and ".$where;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		//$value=''; 
		foreach($data as $dataP){
		       $sql1="select * from view_classes_posted_business where user_business_classes_id='".$dataP->user_business_classes_id."' and ".$where;
				$query=$this->db->query($sql1);
				$data1= $query->result();
				
				foreach($data1 as $dataP1){
						$startTime=$dataP1->start_date." ".$dataP1->start_time;
						$endtime=$dataP1->end_time;
						if($dataP1->padding_time_type=="Before & After"){
						  $twice=2;
						}else{
						  $twice=1;
						}	
						$Totalpaddingtime = $dataP1->padding_time * $twice;	
						$time = $this->convertToHoursMins($Totalpaddingtime,'%d:%d');
						$end_time = $this->addTime($endtime,$time);
						$endTime= $dataP1->end_date." ".$end_time;
					    $serviceProvider=$dataP1->instructor_firstname." ".$dataP1->instructor_lastname;
						
						$classSize=$dataP1->class_size - $dataP1->availability;
						$classsize=$classSize;
						if($classSize==1){
						$classSize=$classSize." participant";
						}else{
						$classSize=$classSize." participants";
						}
						
						$availability=$dataP1->availability;
						
						$difference = strtotime($dataP1->end_time) - strtotime($dataP1->start_time);
						// getting the difference in minutes
						$difference_in_minutes = $difference / 60;
						$servicetime=$difference_in_minutes;
						$show=$servicetime.' mins - '.$classsize.'/'.$availability;
						
						$showClassDetails=$dataP1->name." with ".$classSize;
						$showServicetime="<i class=' icon-time'></i>".$servicetime.' mins';
						$showserviceProvider='';
						if($dataP1->instructor_firstname!='' || $dataP1->instructor_lastname!=''){
						$showserviceProvider ="<i class=' icon-user'></i>".$serviceProvider;
						}
						$category=$showserviceProvider."<i class=' icon-map-marker'></i>".$dataP1->category_name;
						
			   $value.='{"id": "'.$dataP1->id.'","start": "'.date('Y/m/d H:i:s',strtotime($startTime)).'","end": "'.date('Y/m/d H:i:s',strtotime($endTime)).'","service_name": "'.$dataP1->name.'","serviceProvider": "'.$serviceProvider.'","allDay": false,"show": "'.$show.'","showClassDetails": "'.$showClassDetails.'","showServicetime": "'.$showServicetime.'","category": "'.$category.'"}';
			   $value.=",";
			}
		}
		$where='1';
		if($agenda!=''){
		 if($statusType=='upcoming'){
		    $where.=' and holiday_date>="'.date("Y-m-d").'"';
		 }else if($statusType=='past'){
		    $where.=' and holiday_date<"'.date("Y-m-d").'"';
		 }
	   }
		$sqlh="select * from holidays_list where calendar_id='".$calendarid."' and length='Full' and ".$where;
		$queryh=$this->db->query($sqlh);
		$datah= $queryh->result();
		if($datah){
			foreach($datah as $dataPh){
			           if($this->session->userdata('language')=='hebrew'){ 
					   $calname=$dataPh->name_heb;
					   }else{
					   $calname=$dataPh->name_en;
					   }
			            $serviceName=$calname; 
						$clientname='';
						$bstartTime=date('Y/m/d',strtotime($dataPh->holiday_date))." ".$bstarttime.':00:00';
						$bendTime=date('Y/m/d',strtotime($dataPh->holiday_date))." ".$bendtime.':00:00';
						$id='c'.$dataPh->id;
						$showClassDetails=$calname;
						$showServicetime='';
						$category='';
						
			   $value.='{"id": "'.$id.'","start": "'.$bstartTime.'","end": "'.$bendTime.'","service_name": "'.$serviceName.'","allDay": false,"client_name": "'.$clientname.'","showClassDetails": "'.$showClassDetails.'","showServicetime": "'.$showServicetime.'","category": "'.$category.'"}';
			   $value.=",";
			 }
			}
			
			$value=rtrim($value,',');
			if($agenda!=''){
			$value.=']';
			}
		
		    if($agenda!=''){
		   $vals=json_decode($value);
		   //usort($vals, function($a, $b) {
		    if($statusType=='upcoming'){
		    usort($vals, function($a, $b) {
			return strtotime($a->start) - strtotime($b->start);
		   });
		   }elseif($statusType=='past'){
		    usort($vals, function($a, $b) {
			return strtotime($b->start) - strtotime($a->start);
		   });
		   }
			$vals1=array_slice($vals, $startsfrom,$stopsat);
			 if(empty($vals1)){
			$val1='[{"flag": 0}]';
			echo $val1;
			//$vals1 = array('flag'=>0);
			}else{
			print_r(json_encode($vals1));
			}
			//print_r(json_encode($vals1));
			}else{

			 return $value;
			}
		
			//print_r($value); exit;
		 //return $value;
	
	}
	
	
	function convertToHoursMins($time, $format = '%d:%d') {
		settype($time, 'integer');
		if ($time < 1) {
			return;
		}
		
		$hours = floor($time/60);
		$minutes = $time%60;
		return sprintf($format, $hours, $minutes);
	}
	
	function getendtimeslot($selectedTimeSlot,$appdate,$businessid){
	   $appdate=date("Y-m-d",strtotime($appdate));
	    $sql="Select * from view_client_appoinment_details where (Date(start_time)= '".$appdate."') && (TIME(start_time) < '".$selectedTimeSlot.':00'."' < TIME(paddingendtime)) && ('".$selectedTimeSlot.':00'."' between TIME(start_time) and TIME(paddingendtime))&& user_business_details_id='".$businessid."' ORDER BY id DESC LIMIT 1"; 
		$query=$this->db->query($sql);
		$data= $query->result();
		foreach($data as $dataP){
		   $val = date("H:i",strtotime($dataP->paddingendtime));
		}
		if($val){
		return $val;
		}else{
		return false;
		}
	}
	
	function addTime($a, $b)
		{
		   $sec=$min=$hr=0;
		   $a = explode(':',$a);
		   $b = explode(':',$b);

		   if(($a[2]+$b[2])>= 60)
		   {
			 $sec=($a[2]+$b[2]) % 60;
			 $min+=1;

		   }
		   else
		   $sec=($a[2]+$b[2]);
		   

		   if(($a[1]+$b[1]+$min)>= 60)
		   {
			  $min=($a[1]+$b[1]+$min) % 60;
			 $hr+=1;
		   }
		   else
			$min=$a[1]+$b[1]+$min;
			$hr=$a[0]+$b[0]+$hr;

		  if(strlen($hr)=='1'){
		   $hr='0'.$hr;
		  }	
		  if(strlen($min)=='1'){
		   $min='0'.$min;
		  }
          if(strlen($sec)=='1'){
		   $sec='0'.$sec;
		  }			  
		   $added_time=$hr.":".$min.":".$sec;
		   
		   return $added_time;
		}
}
?>