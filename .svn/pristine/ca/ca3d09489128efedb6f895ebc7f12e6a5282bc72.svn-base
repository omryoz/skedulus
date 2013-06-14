<?php
/* Manage Business registration Controller */
class Services extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
    }
	
	public function list_services(){
	 $this->parser->parse('include/header',$this->data);
	 if(isset($_GET['register'])){
	 $this->parser->parse('include/registration_navbar',$this->data);
	 }else{
	  $this->parser->parse('include/dash_navbar',$this->data);
	 }
	 $this->data['tableList']=$this->bprofile_model->getServices();
     $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$this->session->userdata['business_id']);
	 $this->parser->parse('services',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function manage_services(){
		if(isset($_POST['insert'])){ 
			if(isset($_POST['register'])){
			$id=$this->bprofile_model->insertServices();
			redirect('services/list_services/?register');
			}else{
			$id=$this->bprofile_model->insertServices();
			redirect('services/list_services');
			}
		 }
		 if(isset($_GET['id'])){
			$val= $this->bprofile_model->getServicedetails();
			echo($val);
		 }
		 if(isset($_GET['getStaffs'])){
			$val= $this->bprofile_model->getAssignedStaffs();
			echo json_encode($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("user_business_services",$_GET['id']);
		 echo $val;
		 }
	}

		
}

?>
