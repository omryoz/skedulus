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
		#echo $language;
		$this->data['language']=$this->utilities->language($language);
		$this->parser->parse('include/header',$this->data);
		//$this->parser->parse('include/registration_navbar',$this->data);
		$this->parser->parse('business_registration',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	
	
}

?>
