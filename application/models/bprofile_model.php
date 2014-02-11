<?php 
error_reporting(0);
class bprofile_model extends CI_Model {
 
 //Services Module
	function insertServices(){
	//print_r($_POST); exit;
		$insertArray=array();
		$insertArray['user_business_details_id']= $this->session->userdata['business_id']; 
		if(isset($_POST['servicename']))$insertArray['name']= $_POST['servicename'];
		if(isset($_POST['price_type']))$insertArray['price_type']= $_POST['price_type'];
		if(isset($_POST['price']))$insertArray['price']= $_POST['price'];
		if(isset($_POST['length']))$insertArray['timelength']= $_POST['length'];
		if(isset($_POST['description']))$insertArray['details']= $_POST['description']; 
		if(isset($_POST['type']))$insertArray['time_type']= $_POST['type'];
		if(isset($_POST['padding_time']))$insertArray['padding_time']= $_POST['padding_time']; 
		if(isset($_POST['padding_time_type']))$insertArray['padding_time_type']= $_POST['padding_time_type'];
		
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('user_business_services',$insertArray,array('id' => $_POST['id']));
		mysql_query("delete from employee_services where service_id=".$_POST['id']);
		$id = $_POST['id'];
		}else{
		$this->db->insert('user_business_services',$insertArray);
		$id=mysql_insert_id();
		}
		if(isset($_POST['staffs']))
			$assignStaff=array();
			$i=0;
		if(!empty($_POST['staffs'])){
		foreach($_POST['staffs'] as $val){
			$assignStaff['users_id']=$val;
			$assignStaff['business_id']=$this->session->userdata['business_id'];
			$assignStaff['service_id']=$id;
			$this->db->insert("employee_services",$assignStaff);
			$i++;
		}}
		return true;
	}
	
	function getServices($offset,$limit){
		$sql="Select * from user_business_services where user_business_details_id = '".$this->session->userdata['business_id']."' ORDER BY id asc LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->id;
				$values[$i]['name']= $dataP->name;
				$i++;
			}
			return $values;
		}
	}
		
	function getServicedetails(){
		 $val= $this->common_model->getRow("user_business_services",'id',$_GET['id']);
		 $value ='[{"name": "'.$val->name.'","id": "'.$val->id.'","type": "'.$val->price_type.'","price": "'.$val->price.'","timelength": "'.$val->timelength.'","time_type": "'.$val->time_type.'","details": "'.$val->details.'","padding_time": "'.$val->padding_time.'","padding_time_type": "'.$val->padding_time_type.'"}]';			
		return $value;
	}
	
	function getAssignedStaffs(){
		 $value= $this->common_model->getAllRows("employee_services",'service_id',$_GET['serviceid']);
         return $value;
	}
//End

	
	
//Staffs Module	
	function insertStaffs(){ //print_r($_POST); exit;
	  $insertArray=array();
	    $insertArray['image']= 'default.jpg';
		if(isset($_POST['firstname']))$insertArray['first_name']= $_POST['firstname'];
		if(isset($_POST['lastname']))$insertArray['last_name']= $_POST['lastname'];
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['phonenumber']))$insertArray['phone_number']= $_POST['phonenumber'];
		
		if(isset($_POST['email'])){
		$insertArray['status']= 'active';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}
		//print_r($_POST['id']); exit;
		//echo "here"; exit;
		//print_r($_POST); exit;
		//if(isset($_POST['id']) && $_POST['id']!=""){
		if($_POST['action']=="edit"){
		$this->db->update('users',$insertArray,array('id' => $_POST['id']));
		mysql_query("delete from employee_services where users_id=".$_POST['id']);
		mysql_query("delete from user_business_availability where users_id=".$_POST['id']);
		$id = $_POST['id'];
		}else{
		
        if($_POST['type']== 'myself'){ 
			if(isset($this->session->userdata['admin'])){
			  $id=$this->session->userdata['users_id'];
			}else{
			  $id=$this->session->userdata['id'];
			}
		}else{
			 $insertArray['user_role']= 'employee';		
			 $this->db->insert('users',$insertArray);
			 $id=mysql_insert_id();
		}
		
		$insertEmployee=array();
		$insertEmployee['user_business_details_id']=$this->session->userdata['business_id']; 
		$insertEmployee['users_id']=$id; 
		$insertEmployee['employee_type']='employee'; 
		$this->db->insert('business_employees',$insertEmployee);
		    
		}
		
		//to insert/update the staffs availability
		for($i=1;$i<=7;$i++){
				if(isset($_POST[$i])) {
				$available['user_business_details_id']= $this->session->userdata['business_id'];
				$available['users_id']=$id;
				$available['type']='employee';
				$available['weekid']= $i;
				$available['start_time']= $_POST[$i."from"];
				$available['end_time']= $_POST[$i."to"];
				if(isset($_POST['L'.$i])){
				$available['lunch_start_time']= $_POST[$i."Lfrom"];
				$available['lunch_end_time']= $_POST[$i."Lto"];
				}else{
				$available['lunch_start_time']= "0";
				$available['lunch_end_time']="0";
				}
				$this->db->insert('user_business_availability',$available);
				}
			}
		
		//to insert/update assigned services 
		if(isset($_POST['services'])){
		$assignService=array();
		$i=0;
		foreach($_POST['services'] as $val){
			$assignService['users_id']=$id;
			$assignService['business_id']=$this->session->userdata['business_id'];
			$assignService['service_id']=$val;
			$this->db->insert("employee_services",$assignService);
			$i++;
		}
		}
		//echo($id);
		return $id;
	}
	
	function assignStaffs(){
	   mysql_query("delete from employee_services where users_id=".$_POST['userid']);
	   $assignService=array();
		$i=0;
		foreach($_POST['services'] as $val){
			$assignService['users_id']=$_POST['userid'];
			$assignService['business_id']=$this->session->userdata['business_id'];
			$assignService['service_id']=$val;
			$this->db->insert("employee_services",$assignService);
			$i++;
		}
		return $_POST['userid'];
	}
	
	function staffAvail(){
	   mysql_query("delete from user_business_availability where users_id=".$_POST['userid']);
	   for($i=1;$i<=7;$i++){
				if(isset($_POST[$i])) {
				$available['user_business_details_id']= $this->session->userdata['business_id'];
				$available['users_id']=$_POST['userid'];
				$available['type']='employee';
				$available['weekid']= $i;
				$available['start_time']= $_POST[$i."from"];
				$available['end_time']= $_POST[$i."to"];
				if(isset($_POST['L'.$i])){
				$available['lunch_start_time']= $_POST[$i."Lfrom"];
				$available['lunch_end_time']= $_POST[$i."Lto"];
				}else{
				$available['lunch_start_time']= "0";
				$available['lunch_end_time']="0";
				}
				$this->db->insert('user_business_availability',$available);
				}
			}
		return $_POST['userid'];
	}
	
	function getStaffs(){
		//$sql="Select * from view_business_employees where user_business_details_id =".$this->session->userdata['business_id'];
		$sql="Select distinct(users_id),first_name,last_name from view_employee_classes where business_id ='".$this->session->userdata['business_id']."'  and service_id='".$_POST['class_name']."'";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->users_id;
				$values[$i]['name']= $dataP->first_name." ".$dataP->last_name;
				$i++;
			}
			return $values;
		}
	}
	
	function getStaffsList($offset,$limit){
		$sql="Select * from view_business_employees where user_business_details_id = '".$this->session->userdata['business_id']."' ORDER BY users_id ASC LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->users_id;
				$values[$i]['name']= $dataP->first_name." ".$dataP->last_name;
				$i++;
			}
			return $values;
		}
	}
	
	function getStaffdetails(){
		 $val= $this->common_model->getRow("view_business_employees",'users_id',$_GET['id']);
		 $value ='[{"firstname": "'.$val->first_name.'","id": "'.$val->users_id.'","lastname": "'.$val->last_name.'","email": "'.$val->email.'","phone_number": "'.$val->phone_number.'"}]';
		 return $value;
	}
	
	function getmydetails(){
		 $val= $this->common_model->getRow("users",'id',$_GET['id']);
		 $value ='[{"firstname": "'.$val->first_name.'","id": "'.$val->id.'","lastname": "'.$val->last_name.'","email": "'.$val->email.'","phone_number": "'.$val->phone_number.'"}]';
		 return $value;
	}
	
	function getAssignedServices(){
		 $value= $this->common_model->getAllRows("employee_services",'users_id',$_GET['staffid']);
         return $value;
	}
	
	
	// function getAvailibility(){
		// $sql="Select * from user_business_availability where users_id =".$_GET['staffsid'];
		// $query=$this->db->query($sql);
		// $data= $query->result();
		// $i=0;
		// $week_id="";
		// if($data){
			// foreach($data as $dataP){
				// $values[$dataP->weekid]['weekid'] =$dataP->weekid;
				// $values[$dataP->weekid]['start_time']= date('H:i',strtotime($dataP->start_time));
				// $values[$dataP->weekid]['end_time']= date('H:i',strtotime($dataP->end_time));
				// $i++;
				// $week_id[] =$dataP->weekid;
			// }
			//$week_id
			// $result['weekids']=$week_id;
			// $result['values']=$values;
			//print_r($result); exit;
			// return $result;
		// }
	// }
	
	function getAvailibility(){
		 $value= $this->common_model->getAllRows("user_business_availability",'users_id',$_GET['staffsid']);
         return $value;
	}
	
	function updateEmployee($password,$id){
	      $rand=$this->random_password(5);
		  
		  $Password= MD5($password);
		  $sql=mysql_query("update users set password= '".$Password."',random_key='".$rand."' where id= '".$id."'");
		  return true;
	}
	
	function random_password( $length = 5 ) {
    $chars = "0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
   }
	
//End

//Offers Module
	function getOffers(){
		$sql="Select * from business_offers where user_business_details_id =".$this->session->userdata['business_id'];
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->id;
				$values[$i]['title']= $dataP->title;
				$i++;
			}
			return $values;
		}
	}
	
	
	function insertOffers(){
		$insertArray=array();
		$insertArray['user_business_details_id']= $this->session->userdata['business_id']; 
		if(isset($_POST['type']))$insertArray['type']= $_POST['type'];
		if(isset($_POST['title']))$insertArray['title']= $_POST['title'];
		if(isset($_POST['description']))$insertArray['description']= $_POST['description'];
		if(isset($_POST['discount']))$insertArray['discount']= $_POST['discount'];
		
		if($_POST['type']=="individual"){
		   $insertArray['services']= $_POST['Iservices']; 
		}elseif($_POST['type']=="combo"){
			$Cservices=implode(",",$_POST['Mservices']);
		    $insertArray['services']= $Cservices; 
	    }
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('business_offers',$insertArray,array('id' => $_POST['id']));
		$id = $_POST['id'];
		}else{
		$this->db->insert('business_offers',$insertArray);
		$id=mysql_insert_id();
		}
		return true;
	}
	
	
	function getOfferdetails(){
		 $val= $this->common_model->getRow("business_offers",'id',$_GET['id']);
		 $value ='[{"title": "'.$val->title.'","type": "'.$val->type.'","services": "'.$val->services.'","id": "'.$val->id.'","description": "'.$val->description.'","discount": "'.$val->discount.'"}]';
		 return $value;
	}

	//END
	
	
	//Business Settings
	function bsettings(){
		$insertArray=array();
		if(isset($_POST['appointment_reminders']))$insertArray['appointment_reminders']= $_POST['appointment_reminders'];
		if(isset($_POST['remind_before']))$insertArray['remind_before']= $_POST['remind_before'];
		if(isset($_POST['cancel_reschedule_before']))$insertArray['cancel_reschedule_before']= $_POST['cancel_reschedule_before'];
		if(isset($_POST['book_before']))$insertArray['book_before']= $_POST['book_before'];
		if(isset($_POST['send_message']))$insertArray['send_message']= $_POST['send_message'];
		if(isset($_POST['book_upto']))$insertArray['book_upto']= $_POST['book_upto'];
		
		$isExist=$this->common_model->getRow("business_notification_settings",'user_business_details_id',$this->session->userdata['business_id']);
		if(isset($isExist) && $isExist!=""){
		//$insertArray['user_business_details_id']=$isExist->user_business_details_id;
		$this->db->update('business_notification_settings',$insertArray,array('user_business_details_id' => $this->session->userdata['business_id']));
		}else{
		$insertArray['user_business_details_id']=$this->session->userdata['business_id'];
		$this->db->insert('business_notification_settings',$insertArray);
		}
	}
	//END
	
	//Gallery 
	function insertPhoto(){ 
		$insertArray=array();
		$data=$this->common_model->uploadFile("gallery");
		$insertArray['user_business_details_id']= $this->session->userdata['business_id']; 
		if(isset($data))$insertArray['photo']= $data['upload_data']['file_name'];
		if(isset($_POST['name']))$insertArray['title']= $_POST['name'];
		if(isset($_POST['description']))$insertArray['description']= $_POST['description'];
		if(isset($_POST['order']))$insertArray['orderNum']= $_POST['order'];
		
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('user_business_photogallery',$insertArray,array('id' => $_POST['id']));
		}else{
		$this->db->insert('user_business_photogallery',$insertArray);
		}
		return true;
	}
	
	function getImages($offset,$limit){
		// $sql="Select * from user_business_photogallery where user_business_details_id =".$this->session->userdata['business_id']." ORDER by 'order' ASC" ;
		
		$sql="Select * from user_business_photogallery where user_business_details_id =".$this->session->userdata['business_id']." ORDER By id asc LIMIT $offset,$limit" ;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->id;
				$values[$i]['title']= $dataP->title;
				$values[$i]['photo']= $dataP->photo;
				$i++;
			}
			return $values;
		}
	}
	
	function getPhotodetails(){
		 $val= $this->common_model->getRow("user_business_photogallery",'id',$_GET['id']);
		 $value ='[{"title": "'.$val->title.'","description": "'.$val->description.'","order": "'.$val->orderNum.'","id": "'.$val->id.'","photo": "'.$val->photo.'"}]';
		 return $value;
	}
	//END
	
	//Clients
	function insertClient(){
		$ClientArray=array();
		if(isset($_POST['first_name']))$ClientArray['first_name']= $_POST['first_name'];
		if(isset($_POST['last_name']))$ClientArray['last_name']= $_POST['last_name'];
		if(isset($_POST['email']))$ClientArray['email']= $_POST['email'];
		if(isset($_POST['phone']))$ClientArray['phone_number']= $_POST['phone'];
		$insertArray['user_role']= 'client';
		
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('users',$ClientArray,array('id' => $_POST['id']));
		}else{
		$this->db->insert('users',$ClientArray);
		$id=mysql_insert_id();
		$insertCArray['users_id']=$id;
		$insertCArray['user_business_details_id']= $this->session->userdata['business_id']; 
		$this->db->insert('business_clients_list',$insertCArray);
		}
		return true;
	}
	
	function getclientsList($keyword=false,$offset,$limit){
	// echo "Select * from view_business_clients where user_business_details_id = '".$this->session->userdata['business_id']."' LIMIT $offset,$limit";
	$where='1';
	if($keyword){
	$where.= " AND (first_name LIKE '%" .$keyword. "%' OR last_name LIKE '%" .$keyword. "%')";
	}
	
		$sql="Select * from view_business_clients where user_business_details_id = '".$this->session->userdata['business_id']."' and $where ORDER BY users_id ASC LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->users_id;
				$values[$i]['name']= $dataP->first_name." ".$dataP->last_name;
				$values[$i]['image']= $dataP->image;
				$i++;
			}
			return $values;
		}
	}
	
	function getclientsListauto(){
	if($_POST['clientids']!=''){
	$list=rtrim($_POST['clientids'],',');
	 $where= ' users_id NOT IN ('.$list.')';
	}else{
	  $where= 1;
	} 
	
		$sql="Select * from view_business_clients where user_business_details_id = '".$this->session->userdata['business_id']."' and ".$where;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		$value='[';
		//$value='';
		if($data){
			foreach($data as $dataP){
			   $value.='{"label" : "'.$dataP->first_name.' '.$dataP->last_name.'" ,"id" : "'.$dataP->users_id.'" , "email": "'.$dataP->email.'" ,"phone": "'.$dataP->phone_number.'"},';
			}
			$value.="]";
			echo $value;
		}
	}
	
	function removeClient($info){
	   if($info)
	   $query = $this->db->delete("client_service_appointments",$info);
	   $val=$this->common_model->getRow("user_business_posted_class","id",$this->input->post('classid')); 
 	   if($val->availability!=0){ 
       $update_avail=($val->availability+1);
	   }else{
	   $update_avail==0;
	   }
	   if($update_avail<=$val->class_size){
	   $updateArray['availability']=$update_avail;
	   $this->db->update('user_business_posted_class',$updateArray,array('id' => $this->input->post('classid')));
	   }
	   if($this->db->affected_rows()>0){
	          if($update_avail<=$val->class_size){
				echo $update_avail; 
				}else{
				echo $val->class_size;
				}
			}else{
				return false;
			}
	}
	
	function getClientdetails(){
		 $val= $this->common_model->getRow("view_business_clients",'users_id',$_GET['id']);
		 $value ='[{"firstname": "'.$val->first_name.'","lastname": "'.$val->last_name.'","email": "'.$val->email.'","id": "'.$val->users_id.'","phone": "'.$val->phone_number.'"}]';
		 return $value;
	
	}
	
	function getClasses($offset,$limit){
	    $sql="Select * from user_business_classes where user_business_details_id = '".$this->session->userdata['business_id']."' ORDER BY id asc LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['id'] =$dataP->id;
				$values[$i]['name']= $dataP->name;
				$i++;
			}
			return $values;
		}
	}
	
	function insertClasses(){
	//print_r($_POST); exit;
		$insertArray=array();
		$insertArray['user_business_details_id']= $this->session->userdata['business_id']; 
		if(isset($_POST['classname']))$insertArray['name']= $_POST['classname'];
		if(isset($_POST['price_type']))$insertArray['price_type']= $_POST['price_type'];
		if(isset($_POST['price']))$insertArray['price']= $_POST['price'];
		if(isset($_POST['length']))$insertArray['timelength']= $_POST['length'];
		if(isset($_POST['description']))$insertArray['details']= $_POST['description']; 
		if(isset($_POST['type']))$insertArray['time_type']= $_POST['type'];
		if(isset($_POST['padding_time']))$insertArray['padding_time']= $_POST['padding_time']; 
		if(isset($_POST['padding_time_type']))$insertArray['padding_time_type']= $_POST['padding_time_type'];
		if(isset($_POST['class_size']))$insertArray['class_size']= $_POST['class_size'];
		if(isset($_POST['class_size']))$insertArray['availability']= $_POST['class_size'];
		
		
		
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('user_business_classes',$insertArray,array('id' => $_POST['id']));
		mysql_query("delete from employee_services where service_id=".$_POST['id']);
		$id = $_POST['id'];
		}else{
		$this->db->insert('user_business_classes',$insertArray);
		$id=mysql_insert_id();
		}
		if(isset($_POST['staffs']))
			$assignStaff=array();
			$i=0;
		if(!empty($_POST['staffs'])){
		foreach($_POST['staffs'] as $val){
			$assignStaff['users_id']=$val;
			$assignStaff['business_id']=$this->session->userdata['business_id'];
			$assignStaff['service_id']=$id;
			$this->db->insert("employee_services",$assignStaff);
			$i++;
		}}
		return true;
	}
	
	function getClassesdetails(){
		 $val= $this->common_model->getRow("user_business_classes",'id',$_GET['id']);
		 $value ='[{"name": "'.$val->name.'","id": "'.$val->id.'","type": "'.$val->price_type.'","price": "'.$val->price.'","timelength": "'.$val->timelength.'","time_type": "'.$val->time_type.'","details": "'.$val->details.'","padding_time": "'.$val->padding_time.'","padding_time_type": "'.$val->padding_time_type.'","class_size": "'.$val->class_size.'"}]';			
		return $value;
	}
	
	//END
	
	function getClassDetails(){
		$sql="Select * from view_classes_posted_business where id =".$_POST['classid'];
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
			    $values['class'] =$dataP->name;
				$values['start_date'] =$dataP->start_date;
				$values['end_date']= $dataP->end_date;
				$values['start_time'] =$dataP->start_time;
				$values['end_time']= $dataP->end_time;
				$values['repeat_type'] =$dataP->repeat_type;
				$values['price'] =$dataP->price;
				
				if($dataP->repeat_type=="monthly"){
				$month=rtrim($dataP->repeat_months,',');
				$months = explode(",",$month);
				
				foreach($months as $mon){
				$timestamp = mktime(0, 0, 0, $mon);
				$monthNames[] = date("F", $timestamp); 
				}
				$names= implode(",",$monthNames);
				$values['repeat_months']= $names;
				}
				$timestamp = strtotime('next Monday');
				$days = array();
				for ($i = 1; $i <= 7; $i++) {
				 $days[$i] = strftime('%A', $timestamp);
				 $timestamp = strtotime('+1 day', $timestamp);
				}
				if($dataP->repeat_type=="weekly"){
				 $week1= rtrim($dataP->repeat_week_days,',');
				 $weekdays= explode(",",$week1);
				 foreach($weekdays as $day){
				 $week[] = $days[$day]; 
				 }
				 $weeknames= implode(",",$week);
				 $values['repeat_week_days'] =$weeknames;
				}
				$values['employee_id']= $dataP->instructor;
				$values['instructor_lastname']= $dataP->instructor_lastname;
				$values['instructor_firstname'] =$dataP->instructor_firstname;
				$values['lastdate_enroll']= $dataP->lastdate_enroll;
				$values['class_size'] =$dataP->class_size;
				$values['availability']= $dataP->availability;
				$i++;
			}
			return $values;
		}
	}
	
	function bookappointment($input){ 
	  if($input){
	   $val=$this->common_model->getRow("user_business_posted_class","id",$this->input->post('classid')); 
	   $new_avail=($val->availability-1);
	   $updateArray['availability']=$new_avail;
	   $updateArray['modifiedStatus']='1';
	   $this->db->update('user_business_posted_class',$updateArray,array('id' => $this->input->post('classid')));
	   $this->db->insert("client_service_appointments",$input);
	   if($this->db->affected_rows()>0){	   
				echo $new_avail;
			}else{
				return false;
			}
	   }else{
	   return false;
	   }
	}
	
	
	function getSingleClassDetails(){
		$sql="Select * from user_business_posted_class where id =".$_POST['classId'];
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values['start_time'] = date('H:i',strtotime($dataP->start_time));
				$values['end_time']= date('H:i',strtotime($dataP->end_time));
				$values['start_date'] =date("d-m-Y",strtotime($dataP->start_date));
				$values['end_date']= date("d-m-Y",strtotime($dataP->end_date));
				$values['user_business_classes_id'] =$dataP->user_business_classes_id;
				$values['price'] =$dataP->price;			
				$values['instructor']= $dataP->instructor;
				$values['lastdate_enroll']= $dataP->lastdate_enroll;
				$values['class_size'] =$dataP->class_size;
				$values['availability'] =$dataP->availability;
				$values['repeat_type'] =$dataP->repeat_type;
				if($dataP->repeat_type=="weekly"){
				 $values['repeat_week_days'] =$dataP->repeat_week_days;
				}
				if($dataP->repeat_type=="monthly"){
				 $values['repeat_months'] =$dataP->repeat_months;
				}
				if($dataP->repeat_type=="daily"){
				 $values['repeat_all_day'] =$dataP->repeat_all_day;
				}
				
				//$values['availability']= $dataP->availability;
				$i++;
			}
			return $values;
		}
	}
	
	function maxEndDate(){
	//echo "Select max(end_date) from user_business_posted_class where seriesid =".$seriesid; exit;
    $val=$this->common_model->getRow("user_business_posted_class","id",$_POST['classId']);
	
	//echo "Select max(end_date) as enddate from user_business_posted_class where seriesid =".$val->seriesid; exit;
	$sql="Select max(end_date) as enddate from user_business_posted_class where seriesid =".$val->seriesid;
	 $query=$this->db->query($sql);			 			
		$data=$query->result();	
		if($data) {
		$values['enddate']=date("d-m-Y",strtotime($data[0]->enddate));
		$values['seriesid']=$val->seriesid;
			return $values;
		}
		//return false;
	}
	
	function getClients(){
	 $query = $this->db->query("select users_id,first_name,last_name from view_business_clients where user_business_details_id=".$_POST['businessid']);
	    $data= $query->result();
		if($data){
		
		 foreach($data as $dataP){
				$values[]=$dataP->first_name." ".$dataP->last_name;
				
			}
			//print_r($values);
			echo json_encode($values); 
			//return $values;
		}
	}
	
	function addClient(){ 
	   $insertArray=array();
		if(isset($_POST['name']))$insertArray['first_name']= $_POST['name'];
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['phone']))$insertArray['phone_number']= $_POST['phone'];
		
		if($_POST['users_id']=="" && $_POST['actionVal']=='add'){
		$this->db->insert('users',$insertArray);
		$id=mysql_insert_id();
		$action = 'add';
		}elseif($_POST['users_id']!="" && $_POST['actionVal']=='add'){
		$id=$_POST['users_id'];
		$action = 'add';
		}
		$val=$this->common_model->getRow("user_business_posted_class","id",$this->input->post('classid')); 
		$new_avail=($val->availability);
		if($id){
		$date= date('Y-m-d');
		$start_time = date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('time');	
		$endtime =   date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('endtime');	
	    if(isset($_POST['notes']))$note= $_POST['notes'];
    	$input = array("users_id"=>$id,"start_time"=>$start_time,"end_time"=>$endtime,"services_id"=>$this->input->post('classid'),"employee_id"=>$this->input->post('trainer'),"note"=>$note,"status"=>"booked","appointment_date"=>$date,"type"=>'class',"user_business_details_id"=>$this->session->userdata['business_id']);
		  
		    $this->db->insert('client_service_appointments',$input);
		    $query=$this->db->query("select * from business_clients_list where user_business_details_id = '".$this->session->userdata['business_id']."' and users_id='".$id."'");
			$data= $query->result();
			if(empty($data)){
			$this->db->query("insert into business_clients_list(users_id,user_business_details_id) VALUES ('".$id."','".$this->session->userdata['business_id']."' )");
			}
		  // $val=$this->common_model->getRow("user_business_posted_class","id",$this->input->post('classid')); 
		   $new_avail=($val->availability-1);
		   if($new_avail>=0){
		   $updateArray['availability']=$new_avail;
		   }
		   $updateArray['modifiedStatus']='1';
		   $this->db->update('user_business_posted_class',$updateArray,array('id' => $this->input->post('classid')));
		}
		
		if(isset($_POST['users_id']) && $_POST['users_id']!="" && $_POST['actionVal']=='edit'){
		  $this->db->update('users',$insertArray,array('id'=>$_POST['users_id']));
		   $insertComment['note']=$_POST['notes'];
		  $this->db->update('client_service_appointments',$insertComment,array('users_id'=>$_POST['users_id'],'services_id'=>$_POST['classid']));
		  $action = 'update';
		}
		if($new_avail<=0){
		 $totalavail=0;
		}else{
		  $totalavail=$new_avail;
		}
		
		
		$val='[{"id":"'.$id.'","name":"'.$_POST['name'].'","action":"'.$action.'","avail":"'.$totalavail.'"}]';
		print_r ($val);
	}
	
	
	function getAppDetails(){
		$sql="Select * from view_client_appoinment_details where id =".$_POST['eventID'];
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
			    $values['business_name'] =$dataP->business_name;
				$values['business_details_id'] =$dataP->business_details_id;
				$values['e_first_name'] =$dataP->employee_first_name;
				$values['e_last_name']= $dataP->employee_last_name;
				$values['c_first_name'] =$dataP->clients_first_name;
				$values['c_last_name']= $dataP->clients_last_name;
				$values['services_id']= $dataP->services_id;
				$values['employee_id']= $dataP->employee_id;
				$values['user_id']= $dataP->users_id;
				$values['note']= $dataP->note;
				$values['type']= $dataP->type;
				if($dataP->type=='class'){
				$ClassNames=$this->common_model->getRow("view_classes_posted_business",'id',$dataP->services_id);	
				$values['services']=$ClassNames->name;
				}else{
				$where=" and user_business_details_id=".$dataP->user_business_details_id;
				$serviceName=$this->common_model->getDDArray("user_business_services",'id','name',$where);
				$ex=explode(',',$dataP->services_id);
				$services='';
				foreach($ex as $val){
				//$services.=$val;
				if($val!=''){
				$services.=$serviceName[$val];
				$services.=','; }
				}
				$values['services']=$services;
				
				}
				
				$date=date("Y-m-d",strtotime($dataP->start_time));
				if($date<date("Y-m-d")){
				$values['status']='inactive';
				}else{
				$values['status']='active'; 
				}
				$time=date("h:iA",strtotime($dataP->start_time));
				$endtime=date("H:i",strtotime($dataP->end_time));
				$values['date'] =$date;
				$values['time'] =$time;
				$values['endtime'] =$endtime;
				
				$i++;
			}
			return $values;
		}
	}
	
	function getserviceByfilter($filter){
		if($filter){
			$query = $this->db->query("SELECT distinct(users_id),first_name,last_name FROM `view_employee_services` where  ".$filter."");
			// echo $this->db->last_query();
			// exit;
			if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
		
	  }
	}
	
	function getserviceByfilter1($string){ 
	  $string=rtrim($string,',');
	  $serviceArray=explode(',',$string); $i=0;
	  $list=array();
	 foreach($serviceArray as $s){ 
	 if($s!=''){
	 $filter = 'service_id  ='. $s;
     $query = $this->db->query("SELECT distinct(users_id),first_name,last_name FROM `view_employee_services` where  ".$filter."");	 
	 $data= $query->result();
	 foreach($data as $dataP){
	            if($dataP->users_id!=0)
			    $values[$dataP->users_id] =$dataP->users_id;
			}
			 $list[]=$values;
			 $values=array();
			}	
	}
	
	if(count($serviceArray)==1){
	 $intersect=$list[0];
	}else{
      $intersect = call_user_func_array('array_intersect', $list);
	}
	if($intersect){
	return $intersect;
	}else{
	return false;
	}
	}
	
	function likes_business($where=false){
		$status = "";
		if($this->checkFavourite($where)){
			$this->db->delete("businesses_photos_likes",$where);
			//echo 0;
			$status=0;
			
		}else{
			$this->db->insert("businesses_photos_likes",$where);
			//echo 1;
			$status=1;
		}
		$res = $this->checkFavourite(array("details_id"=>$where['details_id']));
		$total = (!empty($res))?count($res):0;	
		echo $status.','.$total;
	}
	
	function checkFavourite($where=false){
		$query = $this->db->get_where("businesses_photos_likes",$where);
		if($query->num_rows()>0){
			return $query->result();
		}else{
			return false;
		}
	}
	
	function getAllRows($where,$offset=false,$limit=false){ 
	    $sql="Select * from view_favourite_businesses where $where LIMIT $offset,$limit ";
		$query=$this->db->query($sql);			 			
		$data=$query->result();	
		if($data) {
			return $data;
		}
		return false;
	}
	
	function getComments($where=false){
		$this->db->order_by("id","desc");
		$query = $this->db->get_where("view_photo_comments",$where);
		if($query->num_rows()>0){
			return $query->result_array();
		}else{
			return false;
		}
	}
	
	function createComment($info=false){
		#print_r($info);exit;
		$this->db->insert("photo_comments",$info);
		#echo $this->db->last_query();
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	
	function getbusydetails(){
		$sql="Select * from client_service_appointments where id =".$_POST['evid'];
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
			    $values['seriesid']= $dataP->seriesid;
				$values['employee_id']= $dataP->employee_id;
				$values['users_id']= $dataP->users_id;
				$values['note']= $dataP->note;
				$values['type']= $dataP->type;
				$values['startdate']=date("Y-m-d",strtotime($dataP->start_time));
				
				$time=date("h:iA",strtotime($dataP->start_time));
				$endtime=date("h:iA",strtotime($dataP->end_time));
				$values['date'] =$date;
				$values['starttime'] =$time;
				$values['endtime'] =$endtime;
				if($this->input->post('busytype')=='multi'){
				 $values['enddate']=$this->getMaxendDate($dataP->seriesid);
				 $values['weeklist']= $dataP->repeat_week_days;
				}
				$i++;
			}
			return $values;
		}
	}
	
	function getMaxendDate($seriesid){
	  $sql="SELECT max(Date(end_time)) as enddate FROM `client_service_appointments` WHERE seriesid=".$seriesid;
	  $query=$this->db->query($sql);	
		$data=$query->result();	
		$value['enddate']= $data[0]->enddate;
	    return $value['enddate'];
	}
	
	function editbusytime(){ //print_r($_POST); exit;
	    $date=date("Y-m-d h:m:s");
	     $staffid=0;
	   if($_POST['staff']!='Select Staff'){
	     $staffid=$_POST['staff'];
	   }
	   
		 
	     if($this->input->post('btype')=='single'){
		   if($_POST['repeatstatus']=='Add Repeat'){ 
		   $start_time = date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('starttime');	
		   $end_time =   date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('endtime');
		   $input = array("seriesid"=>$this->input->post('seriesid'),'modifiedStatus'=>'1',"users_id"=>$this->input->post('user_id'),"booked_by"=>'manager',"start_time"=>$start_time,"end_time"=>$end_time,"note"=>$this->input->post('note'),"status"=>"busytime","appointment_date"=>$date,"type"=>'service',"user_business_details_id"=>$this->session->userdata['business_id'],'employee_id'=>$staffid);
		 
		   $this->db->update('client_service_appointments',$input,array('id' => $_POST['type']));
		   }else{
		    mysql_query("delete from client_service_appointments where id='".$_POST['type']."'");
			$info=array("business_id"=>$this->session->userdata['business_id'],"date_added"=>$date);
			$query = $this->db->insert("posted_class_series",$info);
			$seriesid= mysql_insert_id();
			$this->insertmultibusytime($seriesid,$this->input->post('startdate'),$this->input->post('enddate'),$this->input->post('note'),$this->input->post('user_id'),$this->input->post('weeklist'),$this->input->post('starttime'),$this->input->post('endtime'),$staffid);
		   }
		 }else{
		    $info=array("business_id"=>$this->session->userdata['business_id'],"date_added"=>$date);
			$query = $this->db->insert("posted_class_series",$info);
			$seriesid= mysql_insert_id();
			if($_POST['repeatstatus']=='Remove Repeat'){
              $sql="Select * from client_service_appointments where seriesid='".$this->input->post('seriesid')."' and modifiedStatus='0' and Date(start_time) between '".date("Y-m-d",strtotime($_POST['startdate']))."' AND '".date("Y-m-d",strtotime($_POST['enddate']))."'";
		     $query=$this->db->query($sql);
		     $data= $query->result();
		   
			foreach($data as $dataP){
			  $start_time = date("Y-m-d",strtotime($dataP->start_time)).' '.$this->input->post('starttime');	
		      $end_time =   date("Y-m-d",strtotime($dataP->end_time)).' '.$this->input->post('endtime');
			     $input = array("seriesid"=>$seriesid,"start_time"=>$start_time,"end_time"=>$end_time,"note"=>$this->input->post('note'),'employee_id'=>$staffid);
				   $this->db->where('id', $dataP->id);
				  $this->db->update('client_service_appointments', $input); 
			}
			 
		   }else{
		   $start_time = date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('starttime');	
		   $end_time =   date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('endtime');
		     $where=" and Date(start_time) between '".date("Y-m-d",strtotime($_POST['startdate']))."' AND '".date("Y-m-d",strtotime($_POST['enddate']))."'";
			 //echo "delete from client_service_appointments where seriesid='".$_POST['seriesid']."'".$where;
		     mysql_query("delete from client_service_appointments where seriesid='".$_POST['seriesid']."'".$where);
		     $input = array("seriesid"=>$seriesid,"modifiedStatus"=>'0',"users_id"=>$this->input->post('user_id'),"booked_by"=>'manager',"start_time"=>$start_time,"end_time"=>$end_time,"note"=>$this->input->post('note'),"status"=>"busytime","appointment_date"=>$date,"type"=>'service',"user_business_details_id"=>$this->session->userdata['business_id'],'employee_id'=>$staffid);
		 
		     $query = $this->db->insert("client_service_appointments",$input);
		   }
		 }
		
	   
	}
	
	function insertbusytime(){
	  //print_r($_POST); exit;
	   $staffid=0;
	   if($_POST['staff']!='Select Staff'){
	     $staffid=$_POST['staff'];
	   }
	  $date=date("Y-m-d h:m:s");		
	  $info=array("business_id"=>$this->session->userdata['business_id'],"date_added"=>$date);
	  $query = $this->db->insert("posted_class_series",$info);
	  $seriesid= mysql_insert_id();
		  
	   if($_POST['repeatstatus']=='Add Repeat'){
		$start_time = date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('starttime');	
		$endtime =   date("Y-m-d",strtotime($this->input->post('startdate'))).' '.$this->input->post('endtime');
	   
	   
	     $input = array("seriesid"=>$seriesid,"modifiedStatus"=>'0',"users_id"=>$this->input->post('user_id'),"booked_by"=>'manager',"start_time"=>$start_time,"end_time"=>$endtime,"note"=>$this->input->post('note'),"status"=>"busytime","appointment_date"=>$date,"type"=>'service',"user_business_details_id"=>$this->session->userdata['business_id'],'employee_id'=>$staffid);
		 
		   $query = $this->db->insert("client_service_appointments",$input);
			if($this->db->affected_rows()>0){
				return true;
			}else{
				return false;
			}
	   }else{
				$this->insertmultibusytime($seriesid,$this->input->post('startdate'),$this->input->post('enddate'),$this->input->post('note'),$this->input->post('user_id'),$this->input->post('weeklist'),$this->input->post('starttime'),$this->input->post('endtime'));
	        }
	  
	}
	
	function insertmultibusytime($seriesid=false,$startdate=false,$enddate=false,$note=false,$user_id=false,$weeklist=false,$starttime=false,$endtime=false,$staff_id=false){
	//print_r($seriesid); exit;
	 $date=date("Y-m-d h:m:s");
		    $start_date=date("Y-m-d",strtotime($startdate));
			$end_date=date("Y-m-d",strtotime($enddate));
			$check_date = $start_date;
			$repeat_week_day= explode(",",$weeklist);
			while ($check_date <= $end_date) { 
			$day= date('N',strtotime($check_date));
			 if(in_array($day,$repeat_week_day)){
				$date3 = strtolower(date("l", strtotime($check_date)));
				
				if($staff_id!='0'){
				   $staffid= $staff_id;
				}else{
				   $staffid='0';
				}
				 if($this->getworkingday($date3,$staffid)){
				$start_time = date($check_date.' '.$starttime);	
				$end_time =   date($check_date.' '.$endtime);

				$input = array("seriesid"=>$seriesid,"modifiedStatus"=>'0',"users_id"=>$user_id,"booked_by"=>'manager',"start_time"=>$start_time,"end_time"=>$end_time,"note"=>$note,"status"=>"busytime","appointment_date"=>$date,"type"=>'service',"user_business_details_id"=>$this->session->userdata['business_id'],"repeat_week_days"=>$weeklist,'employee_id'=>$staffid);
 
				$query = $this->db->insert("client_service_appointments",$input);
				}	
			 }
			 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
			}
	}
	
	
	function getpaddingendtime($classid,$end_time){ 
		    //$serviceid=explode(',',$this->input->post('services'));
			//foreach($serviceid as $val){
				if($classid!=''){
					$query1 = $this->db->query("select * from user_business_classes where id='".$classid."'"); 
					$res= $query1->result();							
				if($res[0]->padding_time_type=="Before & After"){
				  $twice=2;
				}else{
				  $twice=1;
				}	
				$total = $total + $res[0]->padding_time * $twice; 
				//$Sname.=$res[0]->name.',';						
				}   
			 // }
			  $time = $this->common_model->convertToHoursMins($total,'%d:%d');						
			  $end_time1 = $this->common_model->addTime($end_time,$time); 
			  $paddingendtime= date('Y-m-d',strtotime($this->input->post('date')))." ".$end_time1;
			  return $paddingendtime;
	}
	
	/*schedule class*/
	function insertscheduledclass(){
	  //print_r($_POST); exit;
	   $staffid=0;
	   if($_POST['staff']!=''){
	     $staffid=$_POST['staff'];
	   }
	  $date=date("Y-m-d h:m:s");		
	  $info=array("business_id"=>$this->session->userdata['business_id'],"date_added"=>$date);
	  $query = $this->db->insert("posted_class_series",$info);
	  $seriesid= mysql_insert_id();
	  $paddingendtime=$this->getpaddingendtime($this->input->post('classid'),$this->input->post('endtime'));  
	   if($_POST['repeatstatus']=='Add Repeat'){
		$startdate = date("Y-m-d",strtotime($this->input->post('startdate')));	
		$enddate =   date("Y-m-d",strtotime($this->input->post('startdate')));
	   
	   $input= array("user_business_classes_id"=>$this->input->post('classid'),"start_date"=>$startdate,"end_date"=>$enddate,"start_time"=>$this->input->post('starttime'),"end_time"=>$this->input->post('endtime'),"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"repeat_all_day"=>'1',"class_size"=>$this->input->post('class_size'),"availability"=>$this->input->post('class_size'),"seriesid"=>$seriesid);
	   
	     
		
		// if($this->getworkingday($startdate,$staffid)){
		   $query = $this->db->insert("user_business_posted_class",$input);
		// }
			if($this->db->affected_rows()>0){ 
				return true;
			}else{ 
				return false;
			}
	   }else{
				$this->insertmultiScheduleClass($seriesid,$this->input->post('startdate'),$this->input->post('enddate'),$this->input->post('repeat_type'),$staffid,$this->input->post('checked'),$this->input->post('starttime'),$this->input->post('endtime'),$paddingendtime,$this->input->post('classid'),$this->input->post('class_size'));
	        }
	  
	}
	
	
	function insertmultiScheduleClass($seriesid=false,$startdate=false,$enddate=false,$repeat_type=false,$staff_id=false,$checked=false,$starttime=false,$endtime=false,$paddingendtime=false,$classid=false,$class_size=false,$startdatearray=false){ 
			$date=date("Y-m-d h:m:s"); 
		    $start_date=date("Y-m-d",strtotime($startdate));
			$end_date=date("Y-m-d",strtotime($enddate));
			$check_date = $start_date;
			
			switch($repeat_type)
				   {  
				case "daily":
				    $check_date = $start_date;  
					while (date("Y-m-d",strtotime($check_date)) <= date("Y-m-d",strtotime($end_date))) { 
				    if(date("Y-m-d",strtotime($check_date)) <= date("Y-m-d",strtotime($end_date))){	
		                $date3 = strtolower(date("l", strtotime($check_date)));
						
						if($staff_id!='0'){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						
						if($this->getworkingday($date3,$staffid)){  
 						 $input= array("user_business_classes_id"=>$classid,"start_date"=>$check_date,"end_date"=>$check_date,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"repeat_all_day"=>'1',"class_size"=>$class_size,"availability"=>$class_size,"seriesid"=>$seriesid);
						 if(isset($startdatearray)){
						   if(!in_array($check_date,$startdatearray)){
						   $query = $this->db->insert("user_business_posted_class",$input);
						   }
						 }else{
						 $query = $this->db->insert("user_business_posted_class",$input);
						 }
						  //echo '1';
						
						}
					
					 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					}
				   }
				break;
				
				case "weekly":
				    $check_date = $start_date;
					$repeat_week_day= explode(",",$checked);
					while ($check_date <= $end_date) { 
					$day= date('N',strtotime($check_date));
					if(in_array($day,$repeat_week_day)){
				        $date3 = strtolower(date("l", strtotime($check_date)));
						
						if($staff_id!='0'){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						if($this->getworkingday($date3,$staffid)){
						 $input= array("user_business_classes_id"=>$classid,"start_date"=>$check_date,"end_date"=>$check_date,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"repeat_all_day"=>'1',"class_size"=>$class_size,"availability"=>$class_size,"seriesid"=>$seriesid,"repeat_type"=>$repeat_type,"repeat_week_days"=>$checked,"repeat_all_day"=>'');
						  if(isset($startdatearray)){
						   if(!in_array($check_date,$startdatearray)){
						   $query = $this->db->insert("user_business_posted_class",$input);
						   }
						 }else{
						 $query = $this->db->insert("user_business_posted_class",$input);
						 }
					   }	
					}
					 $check_date = date ("Y-m-d", strtotime ("+1 day", strtotime($check_date))); 
					
				   }
				break;
				
				case "monthly":
				    $check_date = $start_date;
					
					    
						$day= date('d',strtotime($check_date));
						$year= date('Y',strtotime($check_date));
						
						//$Eventday= date('d',strtotime($evVal->start_date));
						//$Evdate=$year.'-'.$month.'-'.$Eventday;
					$rmonths=rtrim($checked,',');
					$repeat_month= explode(",",$checked);
					foreach($repeat_month as $mon){
					    $monthdate=$year.'-'.$mon.'-'.$day;
						
						$date3 = strtolower(date("l", strtotime($monthdate)));
						
						if($staff_id!='0'){
						   $staffid= $staff_id;
						}else{
						   $staffid='';
						}
						if($this->getworkingday($date3,$staffid)){
						
						$input= array("user_business_classes_id"=>$classid,"start_date"=>date("Y-m-d",strtotime($monthdate)),"end_date"=>date("Y-m-d",strtotime($monthdate)),"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"repeat_all_day"=>'1',"class_size"=>$class_size,"availability"=>$class_size,"seriesid"=>$seriesid,"repeat_type"=>$repeat_type,"repeat_months"=>$checked,"repeat_all_day"=>'');
						 if(isset($startdatearray)){
						   if(!in_array($check_date,$startdatearray)){
						   $query = $this->db->insert("user_business_posted_class",$input);
						   }
						 }else{
						 $query = $this->db->insert("user_business_posted_class",$input);
						 }
					  }
					}
					
					
				break;
				
				
				
				default:
				echo "None";
				
				   }
			

	}
	
	
function editscheduledclass(){
	  //print_r($_POST); exit;
	   $staffid=0;
	   if($_POST['staff']!=''){
	     $staffid=$_POST['staff'];
	   }
	  $date=date("Y-m-d h:m:s");		
	  $info=array("business_id"=>$this->session->userdata['business_id'],"date_added"=>$date);
	  $query = $this->db->insert("posted_class_series",$info);
	  $newseriesid= mysql_insert_id();
	  $repeat_all_day='1';
		$startdate = date("Y-m-d",strtotime($this->input->post('startdate')));	
		$enddate =   date("Y-m-d",strtotime($this->input->post('startdate')));
	    $paddingendtime=$this->getpaddingendtime($this->input->post('classid'),$this->input->post('endtime'));  
	  
    if($this->input->post('presentStatus')=='single' && $_POST['repeatstatus']=='Add Repeat'){
		$this->singleTosingle($this->input->post('classid'),$startdate,$enddate,$this->input->post('starttime'),$this->input->post('endtime'),$paddingendtime,$staffid,$repeat_all_day,$this->input->post('class_size'),$this->input->post('class_size'),$this->input->post('seriesid'),$newseriesid,$_POST['repeatstatus'],$this->input->post('repeat_type'),$this->input->post('checked'),$this->input->post('eventid'));
	}elseif($this->input->post('presentStatus')=='single' && $_POST['repeatstatus']=='Remove Repeat') { 
	    $this->singleTomulti($this->input->post('classid'),$startdate,date("d-m-Y",strtotime($this->input->post('enddate'))),$this->input->post('starttime'),$this->input->post('endtime'),$paddingendtime,$staffid,$repeat_all_day,$this->input->post('class_size'),$this->input->post('class_size'),$this->input->post('seriesid'),$newseriesid,$_POST['repeatstatus'],$this->input->post('repeat_type'),$this->input->post('checked'),$this->input->post('eventid'));
	}elseif($this->input->post('presentStatus')=='multi' && $_POST['repeatstatus']=='Remove Repeat') { 
	    $this->multiTomulti($this->input->post('classid'),$startdate,date("d-m-Y",strtotime($this->input->post('enddate'))),$this->input->post('starttime'),$this->input->post('endtime'),$paddingendtime,$staffid,$repeat_all_day,$this->input->post('class_size'),$this->input->post('class_size'),$this->input->post('seriesid'),$newseriesid,$_POST['repeatstatus'],$this->input->post('repeat_type'),$this->input->post('checked'),$this->input->post('eventid'),$this->input->post('oldstdate'),$this->input->post('oldeddate'));
	}elseif($this->input->post('presentStatus')=='multi' && $_POST['repeatstatus']=='Add Repeat') { 
	    $this->multiTosingle($this->input->post('classid'),$startdate,date("d-m-Y",strtotime($this->input->post('enddate'))),$this->input->post('starttime'),$this->input->post('endtime'),$paddingendtime,$staffid,$repeat_all_day,$this->input->post('class_size'),$this->input->post('class_size'),$this->input->post('seriesid'),$newseriesid,$_POST['repeatstatus'],$this->input->post('repeat_type'),$this->input->post('checked'),$this->input->post('eventid'));
	}

}
	
	function singleTosingle($classid=false,$startdate=false,$enddate=false,$starttime=false,$endtime=false,$paddingendtime=false,$staffid=false,$repeat_all_day=false,$class_size=false,$class_size=false,$seriesid=false,$newseriesid=false,$repeatstatus=false,$repeat_type=false,$checked=false,$eventid=false){
	
	
	    $query1=$this->common_model->getRow("user_business_posted_class","id",$eventid);
		$diff=($query1->class_size-$query1->availability);
		if($diff==0){
		$available=$class_size;
		}else{
		$available=$class_size-$diff;
		}
	       $input= array("user_business_classes_id"=>$classid,"start_date"=>$startdate,"end_date"=>$enddate,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"repeat_all_day"=>$repeat_all_day,"class_size"=>$class_size,"availability"=>$available,"seriesid"=>$seriesid,"modifiedStatus"=>'1');
		   $this->db->where('id', $eventid);
		   $this->db->update('user_business_posted_class', $input); 
	}
	
	function singleTomulti($classid=false,$startdate=false,$enddate=false,$starttime=false,$endtime=false,$paddingendtime=false,$staffid=false,$repeat_all_day=false,$class_size=false,$class_size=false,$seriesid=false,$newseriesid=false,$repeatstatus=false,$repeat_type=false,$checked=false,$eventid=false){
	
	
	    $query1=$this->common_model->getRow("user_business_posted_class","id",$eventid);
		$diff=($query1->class_size-$query1->availability);
		if($diff==0){
		$available=$class_size;
		}else{
		$available=$class_size-$diff;
		}
		if($repeat_type=='weekly'){
		 $repeatall="repeat_week_days";
		}elseif($repeat_type=='monthly'){
		 $repeatall="repeat_months";
		}else{
		$repeatall='';
		$checked=$repeat_all_day;
		$repeatall='repeat_all_day';
		}
		
		
	       $input= array("user_business_classes_id"=>$classid,"start_date"=>$startdate,"end_date"=>$startdate,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"class_size"=>$class_size,"availability"=>$available,"seriesid"=>$newseriesid,"modifiedStatus"=>'0',"repeat_type"=>$repeat_type,$repeatall=>$checked);
		   $this->db->where('id', $eventid);
		   $this->db->update('user_business_posted_class', $input);
		   $start_date = date('d-m-Y',strtotime($startdate . "+1 day"));
		   $this->insertmultiScheduleClass($newseriesid,$start_date,$enddate,$repeat_type,$staffid,$checked,$starttime,$endtime,$paddingendtime,$classid,$class_size);
	}
	
	function multiTomulti($classid=false,$startdate=false,$enddate=false,$starttime=false,$endtime=false,$paddingendtime=false,$staffid=false,$repeat_all_day=false,$class_size=false,$class_size=false,$seriesid=false,$newseriesid=false,$repeatstatus=false,$repeat_type=false,$checked=false,$eventid=false,$oldstdate=false,$oldeddate=false){
	         
			if($repeat_type=='weekly'){
			$repeatall="repeat_week_days";
			}elseif($repeat_type=='monthly'){
			 $repeatall="repeat_months";
			}else{
			$checked=$repeat_all_day;
			$repeatall='repeat_all_day';
			}
			 
			 if(date("d-m-Y",strtotime($startdate))!=date("d-m-Y",strtotime($oldstdate)) || date("d-m-Y",strtotime($enddate))!=date("d-m-Y",strtotime($oldeddate))){
			  //echo "here";
			  mysql_query("delete from user_business_posted_class  where seriesid='".$seriesid."' AND modifiedStatus='0'");
			  $sql2="Select * from user_business_posted_class where seriesid='".$seriesid."' and modifiedStatus='1'";
		      $query2=$this->db->query($sql2);
		      $data2= $query2->result();
			    $i=0;
			    foreach($data2 as $dataP){
				$startdatearray[$i]=$dataP->start_date;
				$i++;
			   }
			   
			   $this->insertmultiScheduleClass($seriesid,$startdate,$enddate,$repeat_type,$staffid,$checked,$starttime,$endtime,$paddingendtime,$classid,$class_size,$startdatearray);
			 }else{
			 $sql="Select * from user_business_posted_class where seriesid='".$seriesid."' and modifiedStatus='0' and start_date between '".date("Y-m-d",strtotime($startdate))."' AND '".date("Y-m-d",strtotime($enddate))."'";
		     $query=$this->db->query($sql);
		     $data= $query->result();
		   
			foreach($data as $dataP){
			    $query1=$this->common_model->getRow("user_business_posted_class","id",$dataP->id);
				$diff=($query1->class_size-$query1->availability);
				if($diff==0){
				$available=$class_size;
				}else{
				$available=$class_size-$diff;
				}
			  
			  
			      $input= array("user_business_classes_id"=>$classid,"start_date"=>$dataP->start_date,"end_date"=>$dataP->end_date,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"class_size"=>$class_size,"availability"=>$available,"seriesid"=>$seriesid,"modifiedStatus"=>'0',"repeat_type"=>$repeat_type,$repeatall=>$checked);
				   $this->db->where('id', $dataP->id);
				  $this->db->update('user_business_posted_class', $input); 
			}
			}
	   
	    
	}
	
	function multiTosingle($classid=false,$startdate=false,$enddate=false,$starttime=false,$endtime=false,$paddingendtime=false,$staffid=false,$repeat_all_day=false,$class_size=false,$class_size=false,$seriesid=false,$newseriesid=false,$repeatstatus=false,$repeat_type=false,$checked=false,$eventid=false){
	
	
	    $query1=$this->common_model->getRow("user_business_posted_class","id",$eventid);
		$diff=($query1->class_size-$query1->availability);
		if($diff==0){
		$available=$class_size;
		}else{
		$available=$class_size-$diff;
		}
		if($repeat_type=='weekly'){
		 $repeatall="repeat_week_days";
		}elseif($repeat_type=='monthly'){
		 $repeatall="repeat_months";
		}else{
		$repeatall='';
		$checked=$repeat_all_day;
		$repeatall='repeat_all_day';
		}
		
		
	       $input= array("user_business_classes_id"=>$classid,"start_date"=>$startdate,"end_date"=>$startdate,"start_time"=>$starttime,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"instructor"=>$staffid,"class_size"=>$class_size,"availability"=>$available,"seriesid"=>$seriesid,"modifiedStatus"=>'0',"repeat_type"=>$repeat_type,$repeatall=>$checked);
		   $this->db->where('id', $eventid);
		   $this->db->update('user_business_posted_class', $input);
		   $start_date = date('d-m-Y',strtotime($startdate . "+1 day"));
		  
		   mysql_query("delete from user_business_posted_class  where start_date between '".date("Y-m-d",strtotime($start_date))."' and  '".date("Y-m-d",strtotime($enddate))."' and seriesid='".$seriesid."' AND modifiedStatus='0'");
	}
	
	function getworkingday($date,$staffid){
	   
	   if($staffid!='0'){
	   $query = $this->db->query("select * from view_service_availablity where users_id='".$staffid."' and type='employee' and name='".$date."'"); 
	   }else{
	    $query = $this->db->query("select * from view_service_availablity where user_business_details_id='".$this->session->userdata['business_id']."' and type='business' and name='".$date."'");
	   }
	   $data= $query->result();
		if($data){
	   return true;	
	   }else{
			return false;
	   }
	}
	
	function deletePostedClass(){
	     if($this->input->post('presentStatus')=='multi'){
		  mysql_query("delete from user_business_posted_class  where start_date between '".date("Y-m-d",strtotime($this->input->post('startdate')))."' and  '".date("Y-m-d",strtotime($this->input->post('enddate')))."' and seriesid='".$this->input->post('seriesid')."' AND modifiedStatus='0'");
		 }else{
		  mysql_query("delete from user_business_posted_class  where id=".$this->input->post('eventid'));
		  mysql_query("delete from client_service_appointments  where services_id=".$this->input->post('eventid'));
		 }
		
	}
	
	function getholidaylist($calendarid){
		$sql="Select * from holidays_list where calendar_id = '".$calendarid."'";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i] =$dataP->holiday_date;
				
				$i++;
			}
			return $values;
		}
	}
	
	function checkduplicate($date,$business_id,$timeslot){
	  $date1=$date."".$timeslot.":00";
	  $start_time=date('Y-m-d H:i:s',strtotime($date1));
	    $sql="Select * from view_client_appoinment_details where ('".$start_time."' between start_time and end_time) and user_business_details_id= '".$business_id."' and booked_by='client' and users_id=".$this->session->userdata('id');
		$query=$this->db->query($sql);
		$data= $query->result();
		if($data){
	    return 1;	
	    }else{
			return 0;
	    }
	}
	
	function checkpassword(){
	  $userdetails=$this->common_model->getRow('users','id',$this->session->userdata['id']);
	  if(MD5($_POST['userpassword']) == $userdetails->password){
	     $insertArray['status']= 'inactive';
	     $this->db->update('user_business_details',$insertArray,array('users_id' => $this->session->userdata['id']));
		 $insertArray1['user_role']= 'client';
	     $this->db->update('users',$insertArray1,array('id' => $this->session->userdata['id']));
		 $this->update_employee($this->session->userdata['business_id'],$insertArray1);
	        echo 1;
	  }else{
			echo 0;
	  }
	}
	
	function update_employee($business_id,$array){
	    $sql="Select DISTINCT (users_id), business_id from employee_services where business_id=".$business_id;
		//echo $sql; exit;
		$query=$this->db->query($sql);
		$data= $query->result();
		if($data!=''){
		foreach($data as $datav){
		 $this->db->update('users',$array,array('id' => $datav->users_id));
		}
		}
		return true;
	}
	
}
?>