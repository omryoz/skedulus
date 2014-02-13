<?php 
class Admin_model extends CI_Model {

function getdetails($tablename=false,$offset=false,$limit=false,$where=false){
//echo "Select * from $tablename where $where LIMIT $offset,$limit"; exit;
		$sql="Select * from $tablename where $where LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		return $data;
	}
 
 function insertCategory($table=false,$insertArray=false,$id=false){
     if($id!=''){
      $this->db->update($table,$insertArray,array('id' => $id));
	  $id=$id;
	 }else{
	 $this->db->insert($table,$insertArray);
	 $id=mysql_insert_id();
	 }
	 return $id;
 }
 
  function getPlanDetails(){		
		 $val= $this->common_model->getRow("view_subscription_plans",'subscription_id',$_POST['id']);
		 $value ='[{"users_type": "'.$val->users_type.'","users_num": "'.$val->users_num.'","pictures_type": "'.$val->pictures_type.'","picture_num": "'.$val->picture_num.'","reports": "'.$val->reports.'","promotion_notifications": "'.$val->promotion_notifications.'","business_type": "'.$val->business_type.'","business_num": "'.$val->business_num.'","title": "'.$val->title.'","subscription_id": "'.$val->subscription_id.'"}]';
		 return $value;
	}

	function updateSubPlans(){
		if(isset($_POST['users_type']))$insertArray['users_type']= $_POST['users_type']; 
		if(isset($_POST['users_num']))$insertArray['users_num']= $_POST['users_num'];
		if(isset($_POST['business_type']))$insertArray['business_type']= $_POST['business_type'];
		if(isset($_POST['business_num']))$insertArray['business_num']= $_POST['business_num']; 
		if(isset($_POST['pictures_type']))$insertArray['pictures_type']= $_POST['pictures_type'];
		if(isset($_POST['picture_num']))$insertArray['picture_num']= $_POST['picture_num']; 
		if(isset($_POST['reports']))$insertArray['reports']= $_POST['reports'];
		if(isset($_POST['promotion_notifications']))$insertArray['promotion_notifications']= $_POST['promotion_notifications']; 
	    $this->db->update('subscription_features',$insertArray,array('subscription_id' => $_POST['subid']));
	}
	
	function updateUserStatus(){
		if(trim($_POST['status'])=='active'){
		 $insertArray['status']= 'inactive';
		 $insertArray1['user_role']= 'client';
	     $insertArray2['user_role']= 'client';
		}elseif(trim($_POST['status'])=='inactive'){
		$insertArray['status']= 'active';
		$insertArray1['user_role']= 'manager';
		$insertArray2['user_role']= 'employee';
		} 
		if($_POST['type']=='user'){
		$this->db->update('users',$insertArray,array('id' => $_POST['id']));
		}elseif($_POST['type']=='business'){
		$this->db->update('user_business_details',$insertArray,array('id' => $_POST['id']));
		$val=$this->common_model->getRow('user_business_details','id',$_POST['id']);
		$vals=$this->update_employee($_POST['id'],$insertArray2,$val->users_id);
		$this->db->update('users',$insertArray1,array('id' => $val->users_id));
		
		}
		if($this->db->affected_rows()>0){
         print_r(trim($insertArray['status']));	
		}else{
	     echo 0;
		}
	}
	
	function update_employee($business_id,$array,$business_manager){
	    $sql="Select DISTINCT (users_id), business_id from employee_services where business_id='".$business_id."' and users_id!=".$business_manager;
		//echo $sql; exit;
		$query=$this->db->query($sql);
		$data= $query->result();
		if($data!=''){
		foreach($data as $datav){
		 $this->db->update('users',$array,array('id' => $datav->users_id));
		}
		return true;
		}else{
		return false;
		}
		
	}
	
	function insertUser($table=false,$filter=false,$id=false){
	if($id!=''){
	 $this->db->update($table,$filter,array('id' => $id));
	}else{
		$this->db->insert($table,$filter);
	}
		//echo $this->db->last_query();die;
		if($this->db->affected_rows()>0){
			$id=mysql_insert_id();
		    return $id;
		}else{
			return false;
		}
	}
	
	function updatePassword(){
		$password=MD5($_POST['password']);
		$id=$this->session->userdata['id'];
		 $sql=mysql_query("update users set password='".$password."' where id='".$id."'");
		 return true;
	}
	
}
?>