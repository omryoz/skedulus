<?php
/* Manage Business registration Controller */
class Business_registration extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('basicinfo_model');
		$this->load->model('common_model');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
    }
	
	public function index() {
	// if(isset($_GET['subscription'])){
	// $this->basicinfo_model->insertsubscription();
		// redirect(basicinfo);
	// }
		$this->load->library('utilities');
		$language = $this->session->userdata('language');
			if(!empty($language)){
		$language = $this->session->userdata('language');
			}else{
		$language = "hebrew";
		}
		
		$this->data['language']=$this->utilities->language($language);
		$this->parser->parse('include/header',$this->data);
		//$this->parser->parse('include/registration_navbar',$this->data);
		$this->data['details']=$this->common_model->getAlldatas("view_subscription_plans",0,10000,1);
		$this->data['Signup_business'] = (!empty($_GET['Signup_business']))?$_GET['Signup_business']:"";
		$this->parser->parse('include/modal_signup',$this->data);	
		$this->parser->parse('business_registration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	
	
}

?>
