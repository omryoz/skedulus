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
	 $this->data['content']=$this->common_model->getRow("view_business_details","business_id",$id);
	 $this->parser->parse('business_profile',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	
	
}
?>
