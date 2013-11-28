<?php
/* Manage Business registration Controller */
class Settings extends CI_Controller {
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
	
	public function business(){
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	
	 //$this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $isExist=$this->common_model->getRow("business_notification_settings","user_business_details_id",$this->session->userdata['business_id']);
	 if($isExist){
	 $this->data['appointment_reminders']=$isExist->appointment_reminders;
	 //$this->data['remind_before']=date('H:i',strtotime($isExist->remind_before));
	  $this->data['remind_before']=$isExist->remind_before;
	 //$this->data['cancel_reschedule_before']=date('H:i',strtotime($isExist->cancel_reschedule_before));
	 //$this->data['book_before']=date('H:i',strtotime($isExist->book_before));
	 $this->data['cancel_reschedule_before']=$isExist->cancel_reschedule_before;
	 $this->data['book_before']=$isExist->book_before;
	 $this->data['send_message']=$isExist->send_message;
	 $this->data['book_upto']=$isExist->book_upto;
	 
	 }else{
	  $this->data['appointment_reminders']="";
	 $this->data['remind_before']="";
	 $this->data['cancel_reschedule_before']="";
	 $this->data['book_before']="";
	 $this->data['send_message']="";
	 $this->data['book_upto']="";
	 }
	 if(isset($_POST['insert'])){
	 $this->bprofile_model->bsettings();
	 redirect('settings/business');
	 }
    // $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$this->session->userdata['business_id']);
    $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
	if($status->status=='active'){	
	$this->parser->parse('business_settings',$this->data);
	}else{
	$this->parser->parse('deactivated',$this->data);
	}
	 $this->parser->parse('include/footer',$this->data);
	}
	
	

		
}

?>
