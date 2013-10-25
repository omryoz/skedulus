<?php
/* Manage Business registration Controller */
class Clients extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('cprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function list_clients(){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $this->data['tableList']=$this->bprofile_model->getclientsList();
	 $this->parser->parse('clients',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	function profile($id=false){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $this->data['userid']=$id;
	 $this->data['details']=$this->common_model->getRow('users','id',$id);
	 $where=' users_id= "'.$id.'" and user_business_details_id="'.$this->session->userdata['business_id'].'" ORDER by start_time ASC';
	//$this->data['appDetails']=$this->common_model->getAllRows('view_client_appoinment_details','users_id',$id,$where);
	 $this->data['appDetails']=$this->cprofile_model->getAllStartDates($where);
    
	 $this->parser->parse('client_profile',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function manage_clients(){
		if(isset($_POST['insert'])){ 
			$this->bprofile_model->insertClient();
			redirect('clients/list_clients');
		 }
		 if(isset($_GET['id']) && !isset($_GET['delete'])){
			$val= $this->bprofile_model->getClientdetails();
			echo($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("users",$_GET['id']);
		$this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Client deleted successfully !');
		 redirect("clients/list_clients");
		 }
	}	
	
	
	public function checkEmail(){
		    if(isset($_POST['id']) && $_POST['id']!="") {
			$where=" and id!=".$_POST['id'];
			$duplicate=$this->common_model->getRow("users","email",$_POST['email'],$where);
			}else{
			$duplicate=$this->common_model->getRow("users","email",$_POST['email']);
			}
			if($duplicate){
			echo "false";
			}else{
			echo "true";
			}
	}
	
	function favourite(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->data['contentList']=$this->common_model->getAllRows("view_business_clients","users_id",$this->session->userdata("id"));
		$this->load->view('favourite',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	function deleteFav(){
	 $val= $this->common_model->deleteRow("business_clients_list",$_GET['id']);
	 //echo $val;
	 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Business unfavourite successfully !');
	 redirect("clients/favourite");
	}
	
	function settings(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->data['personalInfo']= $this->common_model->getRow("users","id",$this->session->userdata("id"));
		$this->data['settings']= $this->common_model->getRow("user_notification_settings","users_id",$this->session->userdata("id"));
		$this->data['cardDetails']= $this->common_model->getRow("credit_card_details","users_id",$this->session->userdata("id"));
		$this->load->view('settings',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	function changepicture(){
	 $this->cprofile_model->updateImage();
	 redirect('/clients/settings');
	}
	
	function offers(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->load->view('offer',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	function editClient(){ 
	   $this->cprofile_model->insertinfo();
	   redirect('/clients/settings');
	}
	
	function changePassword(){
	   $this->cprofile_model->updatePassword();
	   echo "success";
	}
	function Notification_settings()
	{ 
		$notification=$this->input->post();
		unset($notification['save']);
		$notification=array_merge($notification,array('users_id'=>$this->session->userdata("id")));
		//print_r($notification); exit;
		 $chck=$this->common_model->getRow('user_notification_settings','users_id',$this->session->userdata("id"));
		// print_r($chck);exit;
		if($chck!=''){
		 $notifyid=$chck->id;
		}else{
		 $notifyid='';
		}
		$this->common_model->create_details_by_table('user_notification_settings',$notification,$notifyid);
		
	
	}
	function cardDetails(){ 
	
		$notification=array('card_name'=>$this->input->post('card_name'),'credit_card_number'=>$this->input->post('card_number'),'verification_number'=>$this->input->post('cvv'),'expiration_month'=>$this->input->post('month'),'expiration_year'=>$this->input->post('year'));
		$notification=array_merge($notification,array('users_id'=>$this->session->userdata("id")));
		
		$chck=$this->common_model->getRow('credit_card_details','users_id',$this->session->userdata("id"));
		if($chck!=''){
		 $notifyid=$chck->id;
		}else{
		 $notifyid='';
		}
		$val=$this->cprofile_model->insertCardDetails('credit_card_details',$notification,$notifyid);
		$value=$this->common_model->getAllRows('credit_card_details','users_id',$this->session->userdata("id"));
		print_r (json_encode($value));
		
	}
	
}
?>
