<?php
/* Manage Home Controller */
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('admin/admin_model');
		$this->load->model('common_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index() { //print_r($_POST); exit;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('admin/login',$this->data);
	}
	
	function chckinfo(){
	 if(isset($_POST['Login'])){
	 $password= MD5($_POST['password']);
	 $where=" And password='".$password."' AND status='active'";
	 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		if($values==""){
		 CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
	    $this->data['failure']="Failure";
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('admin/login',$this->data);
		 }else{
		 $sessionVal=array(
			 'id'=>$values->id,
			 'username'=>$values->first_name,
			 'email'=>$values->email,
			 'role'=>$values->user_role
		 );
		 $this->session->set_userdata($sessionVal);
		 redirect('admin/dash/users'); 
		}
	 }
	}
	
	
}

?>
