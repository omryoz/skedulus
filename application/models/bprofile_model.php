<?php 
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
		if(isset($_POST['firstname']))$insertArray['first_name']= $_POST['firstname'];
		if(isset($_POST['lastname']))$insertArray['last_name']= $_POST['lastname'];
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['phonenumber']))$insertArray['phone_number']= $_POST['phonenumber'];
		$insertArray['user_role']= 'employee';
		if(isset($_POST['email'])){
		$insertArray['status']= 'inactive';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}
		if(isset($_POST['id']) && $_POST['id']!=""){
		$this->db->update('users',$insertArray,array('id' => $_POST['id']));
		mysql_query("delete from employee_services where users_id=".$_POST['id']);
		mysql_query("delete from user_business_availability where users_id=".$_POST['id']);
		$id = $_POST['id'];
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
		
		return $id;
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
		if(isset($_POST['order']))$insertArray['order']= $_POST['order'];
		
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
	
	function getClientdetails(){
		 $val= $this->common_model->getRow("view_business_clients",'users_id',$_GET['id']);
		 $value ='[{"firstname": "'.$val->first_name.'","lastname": "'.$val->last_name.'","email": "'.$val->email.'","id": "'.$val->users_id.'","phone": "'.$val->phone_number.'"}]';
		 return $value;
	
	}
	//END
}
?>