<?php
/* Manage Business registration Controller */
class BusinessProfile extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('business_profile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
    }
	
	public function index(){
	
	$this->parser->parse('include/header',$this->data);
	 if(isset($this->session->userdata['business_id'])){
		$this->parser->parse('include/dash_navbar',$this->data);
	}
	if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
		$sessionVal=array('profile_id'=>$_GET['id']);
	    $this->session->set_userdata($sessionVal);
		$this->parser->parse('include/navbar',$this->data);
	}
	 if(isset($_GET['id'])){
		$id=$_GET['id'];
	 }else{
		$id=$this->session->userdata['business_id'];
	 }
	 $this->data['user_id'] = $this->session->userdata['id'];
	 $this->data['content']=$this->common_model->getRow("view_business_details","business_id",$id);
	 $where=" AND type='business'";
	 $this->data['availability']=$this->common_model->getAllRows("view_service_availablity","user_business_details_id",$id,$where);
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$id);
	 $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$id);
	 $where1=" order by  orderNum ASC";
	 $this->data['photoGallery']=$this->common_model->getAllRows("user_business_photogallery","user_business_details_id",$id,$where1);
	 $this->parser->parse('business_profile',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	
	
}
?>
