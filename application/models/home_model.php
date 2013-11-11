<?php 
class Home_model extends CI_Model {

function getBusiness(){
		$sql="Select * from view_business_details where user_status='active' and business_status='active' ";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['business_id'] =$dataP->business_id;
				$values[$i]['category_name']= $dataP->category_name;
				$values[$i]['image']= $dataP->image;
				$values[$i]['name']= $dataP->manager_firstname." ".$dataP->manager_lastname;
				$i++;
			}
			return $values;
		}
	}
 
	function insertinfo(){
	//print_r($_POST); exit;
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
		if(isset($_POST['phone_number']))$insertArray['phone_number']= $_POST['phone_number'];
		$insertArray['createdOn']= date("Y-m-d H:i:s");
		
		if($_POST['usertype']=='businessSignUp'){ 
		$insertArray['user_role']= 'manager';
		$insertArray['status']= 'inactive';
		$insertArray['activationkey']= MD5($_POST['email'].time());
		}elseif($_POST['usertype']=='clientSignUp'){ //print_r("here"); exit;
		$insertArray['user_role']= 'client';
		$insertArray['status']= 'active';
		$insertArray['activationkey']="0";
				
		}
		$insertArray['image']='default.jpg';
		$this->db->insert('users',$insertArray);
		if($_POST['usertype']=='businessSignUp'){
		$id=mysql_insert_id();
		return $id;
		}else{
		//Set session 
		$id=mysql_insert_id();
			 $sessionVal=array(
			 'id'=>$id,
			 'username'=>$_POST['firstname'],
			 'email'=>$_POST['email'],
			 'role'=>'client',
		 );
		 $this->session->set_userdata($sessionVal);
		 return true;
		}
	}
	
	function updateUser(){
	$status=$this->common_model->getRow("users","activationkey",$_GET['activation_link']);
	if($status->status=='active'){
	$val="alreadyUser";
	}else{
	$sql=mysql_query("update users set status='active' where activationkey='$_GET[activation_link]'");
	   $sessionVal=array(
			 'id'=>$status->id,
			 'username'=>$status->first_name,
			 'email'=>$status->email
		 );
		 $this->session->set_userdata($sessionVal);	
	$val="newUser";
	}
	 return $val;
	}
	
	function updateEmpUser(){
		 $status=$this->common_model->getRow("users","activationkey",$_GET['activation_link']);
			if($status->status=='active'){
			$val="alreadyUser";
			}else{
			$sql=mysql_query("update users set status='active' where activationkey='$_GET[activation_link]'");
			   $sessionVal=array(
					 'id'=>$status->id,
					 'username'=>$status->first_name,
					 'email'=>$status->email
				 );
				 $this->session->set_userdata($sessionVal);	
			$val="newUser";
			}
			 return $val;
	
	}
}
?>