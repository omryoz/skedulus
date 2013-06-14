<?php
/* Manage Business registration Controller */
class Bcalendar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('calendar_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
    }
	
	public function index(){
		 $this->parser->parse('include/header',$this->data);
		 if(isset($this->session->userdata['business_id'])){
		  $this->parser->parse('include/dash_navbar',$this->data);
		}else if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
		  $this->parser->parse('include/navbar',$this->data);
		}else{
		  redirect('home/clientlogin');
		}
		 $this->parser->parse('calendar',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	
	
}

?>
