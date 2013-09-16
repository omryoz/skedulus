<?php
/* Manage Business registration Controller */
class Settings extends CI_Controller {
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
	
	public function business(){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $isExist=$this->common_model->getRow("business_notification_settings","user_business_details_id",$this->session->userdata['business_id']);
	 if($isExist){
	 $this->data['appointment_reminders']=$isExist->appointment_reminders;
	 $this->data['remind_before']=date('H:i',strtotime($isExist->remind_before));
	 $this->data['cancel_reschedule_before']=date('H:i',strtotime($isExist->cancel_reschedule_before));
	 $this->data['book_before']=date('H:i',strtotime($isExist->book_before));
	 $this->data['send_message']=$isExist->send_message;
	 $this->data['send_email']=$isExist->send_email;
	 
	 }else{
	  $this->data['appointment_reminders']="";
	 $this->data['remind_before']="";
	 $this->data['cancel_reschedule_before']="";
	 $this->data['book_before']="";
	 $this->data['send_message']="";
	 $this->data['send_email']="";
	 }
	 if(isset($_POST['insert'])){
	 $this->bprofile_model->bsettings();
	 redirect('settings/business');
	 }
    // $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$this->session->userdata['business_id']);
	 $this->parser->parse('business_settings',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	

		
}

?>
