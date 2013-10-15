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
	
	function getServices(){
		$sql="Select * from user_business_services where user_business_details_id =".$this->session->userdata['business_id'];
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
	function insertStaffs(){
	  $insertArray=array();
	    $insertArray['image']= 'default.jpg';
		if(isset($_POST['firstname']))$insertArray['first_name']= $_POST['firstname'];
		if(isset($_POST['lastname']))$insertArray['last_name']= $_POST['lastname'];
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['phonenumber']))$insertArray['phone_number']= $_POST['phonenumber'];
		$insertArray['user_role']= 'employee';
		if(isset($_POST['email'])){
		$insertArray['status']= 'inactive';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}
		//echo "here";
		//print_r($_POST['userid']); exit;
		if($_POST['userid']!=" "){
		$this->db->update('users',$insertArray,array('id' => $_POST['userid']));
		//mysql_query("delete from employee_services where users_id=".$_POST['id']);
		//mysql_query("delete from user_business_availability where users_id=".$_POST['id']);
		$id = $_POST['userid'];
		}else{
		$this->db->insert('users',$insertArray);
		$id=mysql_insert_id();
		$insertEmployee=array();
		$insertEmployee['user_business_details_id']=$this->session->userdata['business_id']; 
		$insertEmployee['users_id']=$id; 
		$insertEmployee['employee_type']='employee'; 
		$this->db->insert('business_employees',$insertEmployee);
		}
		
		//to insert/update the staffs availability
		// for($i=1;$i<=7;$i++){
				// if(isset($_POST[$i])) {
				// $available['user_business_details_id']= $this->session->userdata['business_id'];
				// $available['users_id']=$id;
				// $available['type']='employee';
				// $available['weekid']= $i;
				// $available['start_time']= $_POST[$i."from"];
				// $available['end_time']= $_POST[$i."to"];
				// if(isset($_POST['L'.$i])){
				// $available['lunch_start_time']= $_POST[$i."Lfrom"];
				// $available['lunch_end_time']= $_POST[$i."Lto"];
				// }else{
				// $available['lunch_start_time']= "0";
				// $available['lunch_end_time']="0";
				// }
				// $this->db->insert('user_business_availability',$available);
				// }
			// }
		
		//to insert/update assigned services 
		// if(isset($_POST['services'])){
		// $assignService=array();
		// $i=0;
		// foreach($_POST['services'] as $val){
			// $assignService['users_id']=$id;
			// $assignService['business_id']=$this->session->userdata['business_id'];
			// $assignService['service_id']=$val;
			// $this->db->insert("employee_services",$assignService);
			// $i++;
		// }
		// }
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
		$sql="Select * from view_business_employees where user_business_details_id =".$this->session->userdata['business_id'];
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
		  $Password= MD5($password);
		  $sql=mysql_query("update users set password= '".$Password."' where id= '".$id."'");
		  return true;
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
		if(isset($_POST['send_email']))$insertArray['send_email']= $_POST['send_email'];
		
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
	
	function getImages(){
		$sql="Select * from user_business_photogallery where user_business_details_id =".$this->session->userdata['business_id']." ORDER by 'order' ASC" ;
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
		 $value ='[{"title": "'.$val->title.'","description": "'.$val->description.'","order": "'.$val->order.'","id": "'.$val->id.'","photo": "'.$val->photo.'"}]';
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
	
	function getclientsList(){
		$sql="Select * from view_business_clients where user_business_details_id =".$this->session->userdata['business_id'];
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
	function getclientsListauto(){
		$sql="Select * from view_business_clients where user_business_details_id =".$this->session->userdata['business_id'];
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
	   $update_avail=($val->availability+1);
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
	
	function getClasses(){
		$sql="Select * from user_business_classes where user_business_details_id =".$this->session->userdata['business_id'];
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
				$values['start_date'] =$dataP->start_date;
				$values['end_date']= $dataP->end_date;
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
		$values['enddate']=$data[0]->enddate;
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
		   $updateArray['availability']=$new_avail;
		   $updateArray['modifiedStatus']='1';
		   $this->db->update('user_business_posted_class',$updateArray,array('id' => $this->input->post('classid')));
		}
		
		if(isset($_POST['users_id']) && $_POST['users_id']!="" && $_POST['actionVal']=='edit'){
		  $this->db->update('users',$insertArray,array('id'=>$_POST['users_id']));
		   $insertComment['note']=$_POST['notes'];
		  $this->db->update('client_service_appointments',$insertComment,array('users_id'=>$_POST['users_id'],'services_id'=>$_POST['classid']));
		  $action = 'update';
		}
		
		
		$val='[{"id":"'.$id.'","name":"'.$_POST['name'].'","action":"'.$action.'","avail":"'.$new_avail.'"}]';
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
	
	
	
}
?>