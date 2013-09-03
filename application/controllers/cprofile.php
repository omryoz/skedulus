<?php
/* Manage Home Controller */
class Cprofile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('cprofile_model');
		$this->load->model('common_model');
		$this->load->model('home_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index() {
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		 $this->data['contentList']=$this->home_model->getBusiness();
		 $this->parser->parse('include/header',$this->data);
		 $this->parser->parse('include/navbar',$this->data);
		 $this->parser->parse('business_home',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	
	
	
}

?>
