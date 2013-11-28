<?php 
class Home_model extends CI_Model {

function getBusiness($offset=false,$limit=false){
		$sql="Select * from view_business_details where user_status='active' and business_status='active' LIMIT $offset,$limit ";
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
		if(isset($_POST['identifier']))$insertArray['profile_id']= $_POST['identifier'];
		if(isset($_POST['email']))$insertArray['email']= $_POST['email'];
		if(isset($_POST['gender']))$insertArray['gender']= $_POST['gender']; 
		if(isset($_POST['password']))$insertArray['password']= MD5($_POST['password']);
		if(isset($_POST['phone_number']))$insertArray['phone_number']= $_POST['phone_number'];
		$rand=$this->random_password(5);
		$insertArray['random_key']=$rand;
		if($_POST['phone_number']!=''){
		$message="Your key code : ". $rand;
		$val=$this->common_model->sendSMS($message,$_POST['phone_number']);
		 if($val){
		 $insertArray['phone_number']= $_POST['phone_number'];
		 }else{
		 $insertArray['phone_number']='';
		 }
		}
		
		$insertArray['verify_phone']='inactive';
		$insertArray['createdOn']= date("Y-m-d H:i:s");
		$insertArray['activationkey']= MD5($_POST['email'].time());
		
		if($_POST['usertype']=='businessSignUp'){ 
		$insertArray['user_role']= 'manager';
		$insertArray['status']= 'inactive';
		}elseif($_POST['usertype']=='clientSignUp'){
		$insertArray['status']= 'active';
		$insertArray['user_role']= 'client';
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
	if($status){
	if($status->status=='active'){
	$val="alreadyUser";
	}else{
	$sql=mysql_query("update users set status='active' where activationkey='$_GET[activation_link]'");
	$val="newUser";
	$sessionVal=array(
			 'id'=>$status->id,
			 'username'=>$status->first_name,
			 'email'=>$status->email,
			 'role'=>$status->user_role
		 );
		 $this->session->set_userdata($sessionVal);
	}
	
    }else{
	$val='noUser';
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
	
	function check_login_facebook($filter=false){
		$query = $this->db->get_where('users', $filter);
		if($query->num_rows()>0){
			 //echo $this->db->last_query();
			 return $query->result();
		}else{
			 return false;
		}
    }
	
	function check_user_exist($filter=false,$social_account=false){ 
	  $query = $this->db->get_where("users",$filter);
		//echo $this->db->last_query();
		if($query->num_rows()>0){
			return true;
		}else {
			$this->db->insert('users',$social_account);
			$id = $this->db->insert_id();
			return $id;
		}
		
	}
	
	function random_password( $length = 5 ) {
    $chars = "0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
   }
	
	function deletemyapp(){
	    if($_POST['type']=='class'){
		    $sql=("select * from user_business_posted_class where id='".$_POST['postedclassid']."'");
			$query=$this->db->query($sql);
			$res= $query->result();
			foreach($res as $val){
			$avail=$val->availability;
			$class_size=$val->class_size;
			   
		   $update_avail=($avail+1); 
		   if($update_avail<=$class_size){
		   $sql1=mysql_query("update user_business_posted_class set availability='".$update_avail."' where id=".$_POST['postedclassid']);
	       }
		   }	
		}
		//echo "delete from client_service_appointments  where id=".$_POST['eventId'];
		$sql2=mysql_query("delete from client_service_appointments  where id=".$_POST['eventId']);
		echo '1';
		//return true;
	}
	
}
?>