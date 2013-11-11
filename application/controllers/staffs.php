<?php
/* Manage Business registration Controller */
class Staffs extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('basicinfo_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function list_staffs(){
	// print_r($_GET); exit;
	 $this->parser->parse('include/header',$this->data);
	 if(isset($_GET['register'])){
	 $this->parser->parse('include/registration_navbar',$this->data);
	 }else{
	  $this->parser->parse('include/dash_navbar',$this->data);
	 }
	 $this->data['tableList']=$this->bprofile_model->getStaffsList();
	 if($this->session->userdata['business_type']=='class'){
	 $this->data['services']=$this->common_model->getAllRows("user_business_classes","user_business_details_id",$this->session->userdata['business_id']);
	 }else{
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$this->session->userdata['business_id']);
	 }
	
	 $this->data['isExistAvailability']=$this->basicinfo_model->getAvailability();
	 $this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
	 $status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
     if($status->status=='active'){
	 $this->parser->parse('staffs',$this->data);
	 }else{
	 $this->parser->parse('deactivated',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	
	}
	
	public function checkfornum(){
	 $where=' 1 and business_id='.$this->session->userdata('business_id');
	 $total = $this->common_model->getCount('employee_services','DISTINCT users_id',$where);
	 $val=$this->common_model->check('user',$total);
	 
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
		$id=$this->bprofile_model->insertStaffs();
		redirect("staffs/list_staffs");
			// if(isset($_POST['addstaffs'])){
			// $id=$this->bprofile_model->insertStaffs();
			// echo($id);
			// }
			// if(isset($_POST['assignstaffs']) && $_POST['userid']!=" "){
			// $id=$this->bprofile_model->assignStaffs();
			// echo($id);
			// }  
			// if(isset($_POST['staffavail']) && $_POST['userid']!=" "){
			// $id=$this->bprofile_model->staffAvail();
			// echo($id);
			// }
		 }
		 if(isset($_GET['id']) && $_GET['id']!="" && !isset($_GET['delete'])){
			$val= $this->bprofile_model->getStaffdetails();
			echo($val);
		 }
		 if(isset($_GET['getServices'])){
			$val= $this->bprofile_model->getAssignedServices();
			echo json_encode($val);
		 }
		 
		if(isset($_GET['getavailability'])){	
			$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
			$this->data['isExistBAvailability']=$this->basicinfo_model->getbAvailability();
			$this->data['isExistAvailability']=$this->basicinfo_model->getStaffAvailability();
			$val=$this->parser->parse('staff_availability',$this->data);
			//echo($val); 
		}
		
		if(isset($_GET['getbavailability'])){	
			$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
			$this->data['isExistAvailability']=$this->basicinfo_model->getbAvailability();
			$this->data['isExistBAvailability']=$this->basicinfo_model->getbAvailability();
			$val=$this->parser->parse('staff_availability',$this->data);
			//echo($val); 
		}
		 
		 
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("users",$_GET['id']);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Staff deleted successfully !');
		 redirect("staffs/list_staffs");
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
