<?php 
class cprofile_model extends CI_Model {
 
	function insertinfo(){
		$insertArray=array();
		if(isset($_POST['firstname']))$insertArray['first_name']= $_POST['firstname'];
		if(isset($_POST['lastname']))$insertArray['last_name']= $_POST['lastname'];
		if(isset($_POST['month']) && isset($_POST['year']) && isset($_POST['day'])){
		$dob = $_POST['year'].'-'.$_POST['month'].'-'.$_POST['day'];
		$insertArray['date_of_birth']= date('y-m-d',strtotime($dob));
		}
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['gender']))$insertArray['gender']= $_POST['gender']; 
		if(isset($_POST['password']))$insertArray['password']= MD5($_POST['password']);
		
		if($_POST['usertype']=='businessSignUp'){ 
		$insertArray['user_role']= 'manager';
		$insertArray['status']= 'inactive';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}elseif($_POST['usertype']=='clientSignUp'){
		$insertArray['user_role']= 'client';
		$insertArray['status']= 'active';
		$insertArray['activationkey']="0";
		}
		$this->db->insert('users',$insertArray);
		if($_POST['usertype']=='businessSignUp'){
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
}
?>