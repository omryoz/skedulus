<?php 
class basicinfo_model extends CI_Model {
 
	function insertBasicInfo(){
	//print_r($_POST);exit;
	    $data=$this->common_model->uploadFile("business_logo");
		$insertArray=array();
		$available=array();
		$insertArray['users_id']= $this->session->userdata['id']; 
		if(isset($_POST['business_type']))$insertArray['business_type']= $_POST['business_type'];
		if(isset($_POST['category']))$insertArray['category_id']= $_POST['category'];
		if(isset($_POST['name']))$insertArray['name']= $_POST['name']; 
		if(isset($_POST['mobile']))$insertArray['mobile_number']= $_POST['mobile'];
		if(isset($_POST['description']))$insertArray['description']= $_POST['description']; 
		if(isset($_POST['address']))$insertArray['address']= $_POST['address'];
		if(isset($_POST['hidLat']))$insertArray['map_latitude']= $_POST['hidLat']; 
		if(isset($_POST['hidLong']))$insertArray['map_longitude']= $_POST['hidLong'];
		if(isset($_POST['calendar']))$insertArray['calendar_type']= $_POST['calendar'];
		if(isset($data))$insertArray['image']= $data['upload_data']['file_name'];
		
		$isExist=$this->common_model->getRow("user_business_details",'users_id',$this->session->userdata['id']);
		if(isset($isExist) && $isExist!=""){
		$id=$isExist->id;
		$business_type=$isExist->business_type;
		$this->db->update('user_business_details',$insertArray,array('users_id' => $this->session->userdata['id']));
		$sql=mysql_query("delete from user_business_availability where user_business_details_id= '".$id."' ");
		
		}else{
		$this->db->insert('user_business_details',$insertArray);
		$id=mysql_insert_id();
		$business_type=$_POST['business_type'];
		}
			$sessionVal=array('business_id' => $id,'business_type' => $business_type);
			$this->session->set_userdata($sessionVal);
			for($i=1;$i<=7;$i++){
				if(isset($_POST[$i])) {
				$available['user_business_details_id']= $id;
				$available['type']='business';
				$available['weekid']= $i;
				$available['start_time']= $_POST[$i."from"];
				$available['end_time']= $_POST[$i."to"];
				$this->db->insert('user_business_availability',$available);
				}
			}
		
		return $id;
	}
	
	// function getAvailability(){
		// $sql="Select * from user_business_availability where user_business_details_id =".$this->session->userdata['business_id'];
		// $query=$this->db->query($sql);
		// $data= $query->result();
		// $i=0;
		// if($data){
			// foreach($data as $dataP){
				// $values[$i]['weekid'] =$dataP->weekid;
				// $values[$i]['start_time']= $dataP->start_time;
				// $values[$i]['end_time']= $dataP->end_time;
				// $i++;
			// }
			// return $values;
		// }
	// }
	
	function insertsubscription(){
	$insertSub=array();
	if(isset($_GET['subscription'])) $insertSub['subscription_id']=$_GET['subscription'];
	$start_date= date("Y-m-d");
	//to get end date
	$end = strtotime(date('Y-m-d',strtotime($start_date)). "+1 month");
	$insertSub['start_date']=$start_date;
	$insertSub['end_date']=date('Y-m-d',$end);
	$insertSub['version_type']='free';
	$insertSub['status']='active';
	$insertSub['users_id']=$this->session->userdata['id'];
	$isExist=$this->common_model->getRow("user_business_subscription","users_id",$this->session->userdata['id']);
	if(isset($isExist) && $isExist!=""){
	$this->db->update('user_business_subscription',$insertSub,array('users_id'=>$isExist->users_id));
	}else{
	$this->db->insert('user_business_subscription',$insertSub);
	}
	return true;
	}
	
	function getAvailibility(){
		$value= $this->common_model->getAllRows("user_business_availability",'user_business_details_id',$this->session->userdata['business_id']);
         if($value){
		 return $value;
		 }else{
		 return false;
		 }
	}
	
}
?>