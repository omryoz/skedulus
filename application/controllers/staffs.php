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
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	$check=$this->common_model->getRow('business_employees','users_id',$users_id);
	
	if($check){
	$this->data['added']='added';
	}else{
	$this->data['added']='';
	}
	// $this->parser->parse('include/header',$this->data);
	 if(isset($_GET['register'])){
	 $this->parser->parse('include/registration_navbar',$this->data);
	 }else{
	  $this->parser->parse('include/dash_navbar',$this->data);
	 }
	 
	 
	 $where=" user_business_details_id =".$this->session->userdata['business_id'];
	 $config['total_rows'] = $this->common_model->getCount('view_business_employees','users_id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'staffs/list_staffs/';
			$config['per_page'] = '10';
			$config['uri_segment'] = 3; 
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(3)!=''){
			$offset=$this->uri->segment(3);
			}else{
			$offset=0;
			}
			$this->data['tableList']=$this->bprofile_model->getStaffsList($offset,$config['per_page']);
			
			
            /* End Pagination Code  */
		}
	 
	 
	 
	 if($this->session->userdata['business_type']=='class'){
	 $this->data['services']=$this->common_model->getAllRows("user_business_classes","user_business_details_id",$this->session->userdata['business_id']);
	 }else{
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$this->session->userdata['business_id']);
	 }
	
	 $this->data['isExistAvailability']=$this->basicinfo_model->getAvailability();
	 $this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
	 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
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
		$this->send_email($id);
		if(isset($_POST['register'])){
			redirect('staffs/list_staffs/?register');
		}elseif(isset($_POST['page']) && $_POST['page']=='1'){ 
			redirect('businessProfile/?id='.$this->session->userdata['business_id']);
		}else{
		redirect("staffs/list_staffs");
		}
			
	 }
		 if(isset($_GET['id']) && $_GET['id']!="" && !isset($_GET['delete'])){
		 if($_GET['type']=='mydetails'){
			$val= $this->bprofile_model->getmydetails();
			}else{
			$val= $this->bprofile_model->getStaffdetails();
			}
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
			if(isset($this->session->userdata['admin'])){
			  $id=$this->session->userdata['users_id'];
			}else{
			  $id=$this->session->userdata['id'];
			}
		if($id!=$_GET['id']){
		   $val= $this->common_model->deleteRow("users",$_GET['id']);
		}
		 $query=$this->db->query("delete from employee_services where users_id='".$_GET['id']."'");
         $query=$this->db->query("delete from business_employees where users_id='".$_GET['id']."'");		 
		
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Staff deleted successfully !');
		 if(!empty($_GET['page'])){
		 redirect('businessProfile/?id='.$this->session->userdata['business_id']);
		 }else if(isset($_GET['register'])){ 
		 redirect("staffs/list_staffs/?register");
		 }else{
		 redirect("staffs/list_staffs");
		 }
		 }
	}	
	
	public function checkEmail(){ 
		    if(isset($_POST['id']) && !empty($_POST['id'])) {
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
