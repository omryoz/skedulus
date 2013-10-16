<?php 
class cprofile_model extends CI_Model {
 
	function insertinfo(){
		$insertArray=array();
		if(isset($_POST['address']))$insertArray['address']= $_POST['address'];
		if(isset($_POST['firstname']))$insertArray['first_name']= $_POST['firstname'];
		if(isset($_POST['lastname']))$insertArray['last_name']= $_POST['lastname'];
		if(isset($_POST['month']) && isset($_POST['year']) && isset($_POST['day']) && $_POST['day']!=0){
		$dob = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$insertArray['date_of_birth']= date('Y-m-d',strtotime($dob));
		}
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['gender']))$insertArray['gender']= $_POST['gender']; 
		if(isset($_POST['password']))$insertArray['password']= MD5($_POST['password']);
		if(isset($_POST['phone']))$insertArray['phone_number']= $_POST['phone'];
		if(isset($_POST['about_me']))$insertArray['about_me']= $_POST['about_me'];
		// if(isset($_POST['image'])){
		// $insertArray['image']= $_POST['image'];
		// }else{
		// $insertArray['image']= 'default.jpg';
		// }
		
		if( isset($_POST['usertype']) && $_POST['usertype']=='businessSignUp'){ 
		$insertArray['user_role']= 'manager';
		$insertArray['status']= 'inactive';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}elseif(isset($_POST['usertype']) && $_POST['usertype']=='clientSignUp'){
		$insertArray['user_role']= 'client';
		$insertArray['status']= 'active';
		$insertArray['activationkey']="0";
		}
		if(isset($this->session->userdata['id'])){
		//print_r($insertArray); exit;
		 $this->db->update('users',$insertArray,array('id' => $this->session->userdata['id']));
		}else{
		  $insertArray['image']='default.jpg';
		  $this->db->insert('users',$insertArray);
		}
		if(isset($_POST['usertype']) && $_POST['usertype']=='businessSignUp'){
		$id=mysql_insert_id();
		return $id;
		}else{
		return true;
		}
	}
	
	function updateUser(){
	$sql=mysql_query("update users set status='active' where activationkey='$_GET[activation_link]'");
	return true;
	} 
	
	function updatePassword(){
	$password=MD5($_POST['password']);
	$id=$this->session->userdata['id'];
	 $sql=mysql_query("update users set password='".$password."' where id='".$id."'");
	 return true;
	}
}
?>