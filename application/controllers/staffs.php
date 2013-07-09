<?php
/* Manage Business registration Controller */
class Staffs extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
    }
	
	public function list_staffs(){
	 
	 $this->parser->parse('include/header',$this->data);
	 if(isset($_GET['register'])){
	 $this->parser->parse('include/registration_navbar',$this->data);
	 }else{
	  $this->parser->parse('include/dash_navbar',$this->data);
	 }
	 $this->data['tableList']=$this->bprofile_model->getStaffs();
	 if($this->session->userdata['business_type']=='class'){
	 $this->data['services']=$this->common_model->getAllRows("user_business_classes","user_business_details_id",$this->session->userdata['business_id']);
	 }else{
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$this->session->userdata['business_id']);
	 }
	 $this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
	 $this->parser->parse('staffs',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	
	}
	
	// public function manage_staffs(){
		// if(isset($_POST['insert'])){ 
			// if(isset($_POST['register'])){
			// $id=$this->bprofile_model->insertStaffs();
			// $this->send_email($id);
			//$this->data['success']="successfull";
			// redirect('staffs/list_staffs/?register');
			
			// }else{
			// $id=$this->bprofile_model->insertStaffs();
			// $this->send_email($id);
			// redirect('staffs/list_staffs/success');
			
			// }
		 // }
		 // if(isset($_GET['id'])){
			// $val= $this->bprofile_model->getStaffdetails();
			// echo($val);
		 // }
		 // if(isset($_GET['getServices'])){
			// $val= $this->bprofile_model->getAssignedServices();
			// echo json_encode($val);
		 // }
		 
		 // if(isset($_GET['getavailability'])){
			// $val= $this->bprofile_model->getAvailibility();
			// echo json_encode($val);
		 // }
		 
		 // if(isset($_GET['delete'])){
		 // $val= $this->common_model->deleteRow("users",$_GET['id']);
		 // echo $val;
		 // }
	// }	
	
	public function manage_staffs(){
		if(isset($_POST['insert'])){ 
			if(isset($_POST['addstaffs'])){
			$id=$this->bprofile_model->insertStaffs();
			//$this->send_email($id);
			echo($id);
			}
			if(isset($_POST['assignstaffs'])){
			$id=$this->bprofile_model->assignStaffs();
			echo($id);
			}
		 }
		 if(isset($_GET['id']) && $_GET['id']!=""){
			$val= $this->bprofile_model->getStaffdetails();
			echo($val);
		 }
		 if(isset($_GET['getServices'])){
			$val= $this->bprofile_model->getAssignedServices();
			echo json_encode($val);
		 }
		 
		 if(isset($_GET['getavailability'])){
			$val= $this->bprofile_model->getAvailibility();
			echo json_encode($val);
		 }
		 
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("users",$_GET['id']);
		 echo $val;
		 }
	}	
	
	public function checkEmail(){
		    if(isset($_POST['id']) && $_POST['id']!="") {
			$where=" and id!=".$_POST['id'];
			$duplicate=$this->common_model->getRow("users","email",$_POST['email'],$where);
			}else{
			$duplicate=$this->common_model->getRow("users","email",$_POST['email']);
			}
			if($duplicate){
			echo "false";
			}else{
			echo "true";
			}
	}
	
	public function send_email($id){
		     $this->data['randomPassword'] =$this->common_model->random_password(8);
			 $this->bprofile_model->updateEmployee($this->data['randomPassword'],$id);
			 $userdetails= $this->common_model->getRow("users","id",$id);
			 
	         $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		     $this->data['activation_key'] = $userdetails->activationkey;
			 $this->data['email'] = $userdetails->email; 
		     $email = $userdetails->email; 
			 $subject ="Skedulus - Login Credentials";	
			 $message=$this->load->view('staff_email',$this->data,TRUE);
			 $this->common_model->mail($email,$subject,$message);
			 
	}
}

?>
