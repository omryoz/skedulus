<?php
/* Manage Business registration Controller */
class Overview extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index(){
	 $this->parser->parse('include/header',$this->data);
	 $status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
	 $sessionVal=array('business_id'=>$status->id,'business_type'=> $status->business_type);
	 $this->session->set_userdata($sessionVal);
	  $this->parser->parse('include/dash_navbar',$this->data);
	 if($status->status=='active'){
	 $this->parser->parse('overview',$this->data);
	 }else{
	 $this->parser->parse('deactivated',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	}
}

?>
