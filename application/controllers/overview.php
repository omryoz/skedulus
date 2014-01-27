<?php
/* Manage Business registration Controller */
class Overview extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(isset($this->session->userdata['id'])){ 
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
		}else{
		header("Location:" . base_url());
		}
    }
	
	public function index(){
	   $this->viewPage();
	}
	
	public function display(){
	 if($this->session->userdata('role')=='admin'){
	 $business_id=$_GET['id'];
     $details=$this->common_model->getRow("view_user_subscription","business_id",$business_id);
	 $users_id=$details->users_id;
	 $sessionVal=array('subscription'=>$details->subscription_id,'users_id'=>$users_id,'business_id'=>$business_id,'role'=> 'manager','admin'=>'admin');
	 $this->session->set_userdata($sessionVal);
	 $this->viewPage();
	}
  }
  
   public function viewPage(){
    if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	
	 $status=$this->common_model->getRow("user_business_details","users_id",$users_id); 
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
