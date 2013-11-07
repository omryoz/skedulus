<?php 
class Admin_model extends CI_Model {

function getdetails($tablename,$offset,$limit,$where){
//echo "Select * from $tablename where $where LIMIT $offset,$limit";
		$sql="Select * from $tablename where $where LIMIT $offset,$limit";
		$query=$this->db->query($sql);
		$data= $query->result();
		return $data;
	}
 
 function insertCategory($table=false,$insertArray=false,$id=false){
     if($id!=''){
      $this->db->update($table,$insertArray,array('id' => $id));
	 }else{
	 $this->db->insert($table,$insertArray);
	 }
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
}
?>