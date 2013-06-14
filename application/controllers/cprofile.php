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
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
    }
	
	public function index() {
		 $this->parser->parse('include/header',$this->data);
		 redirect('home');
		 $this->parser->parse('include/footer',$this->data);
	}
	
	
	
	
}

?>