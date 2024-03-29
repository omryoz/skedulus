<?php
/* Manage Business registration Controller */
class Clients extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(isset($this->session->userdata['id'])){ 
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->library('pagination');
		$this->load->model('cprofile_model');
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
	
	public function list_clients($keyword=false){
	if(isset($this->session->userdata['id']) && isset($this->session->userdata['business_id'])){ 
	$filter = array();
		$query = "";
		$where=" user_business_details_id =".$this->session->userdata['business_id'];
		if(!empty($_REQUEST['keyword']) && $_REQUEST['keyword']){
			$keyword = $_REQUEST['keyword'];
			$this->data['search']=$keyword;
			$where.= " AND (first_name LIKE '%" .$keyword. "%' OR last_name LIKE '%" .$keyword. "%')";
		}
		
		
			if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=3;
			if(isset($_POST['page_num'])){
			$this->data['tableList'] = $this->bprofile_model->getclientsList($keyword,$offset,$limit);
		    $this->parser->parse('clients_list',$this->data);
		}else{
		if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	
	$this->parser->parse('include/dash_navbar',$this->data);
	$this->data['tableList'] = $this->bprofile_model->getclientsList($keyword,$offset,$limit);
			
	 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
     if($status->status=='active'){
	 $this->parser->parse('clients',$this->data);
	 }else{
	  $this->parser->parse('deactivated',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	 }
	 }else{
		header("Location:" . base_url());
		}
	}
	
	function profile($id=false){
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
	 $this->data['userid']=$id;
	 $this->data['details']=$this->common_model->getRow('users','id',$id);
	 $currentTimestamp=date('Y-m-d H:i:s');
	 $where=' start_time >="'.$currentTimestamp.'" and users_id= "'.$id.'" and booked_by="client" and  user_business_details_id="'.$this->session->userdata['business_id'].'" ORDER by start_time DESC';
	
	 $appDetails1=$this->cprofile_model->getAllStartDates($where,0,2);
	 $this->data['lastDate']=end($appDetails1);
	
	 $this->data['appDetails']=$appDetails1;
     $this->parser->parse('include/modal_popup',$this->data);
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
		 $this->session->set_flashdata('message', lang('Apps_clientdeleted'));
		 redirect("clients/list_clients");
		 }
	}	
	
	public function moreApp(){
	$currentTimestamp=date('Y-m-d H:i:s');
	if($this->input->post('type')=='future'){
	 $where=' start_time >="'.$currentTimestamp.'" and users_id= "'.$this->input->post('id').'" and booked_by="client" and  user_business_details_id="'.$this->session->userdata['business_id'].'" ORDER by start_time DESC';
	 }elseif($this->input->post('type')=='past'){
	 $where=' start_time <"'.$currentTimestamp.'" and users_id= "'.$this->input->post('id').'" and booked_by="client" and  user_business_details_id="'.$this->session->userdata['business_id'].'" ORDER by start_time DESC';
	 }
	 $this->data['userid']=	$this->input->post('id');
	 $appDetails1=$this->cprofile_model->getAllStartDates($where,$this->input->post('count'),2);
	 $this->data['lastDate']=end($appDetails1);
	 // print_r($appDetails1); 
	 $this->data['appDetails']=$appDetails1;
	 $apphtml=$this->parser->parse('client_apps',$this->data);
	 //print_r($apphtml);
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
	if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=8;
	   $where=" users_id =".$this->session->userdata['id']." and status='active'";	
	   if(isset($_POST['page_num'])){
			$this->data['contentList']=$this->bprofile_model->getAllRows($where,$offset,$limit);	
		    $this->parser->parse('favourite_list',$this->data);
		}else{
			
	   $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
	   $this->data['flag']='';
	   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['phonenumber']=$val->phone_number;
	   $this->data['flag']='1';
	   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['flag']='0';
	   }
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->data['contentList']=$this->bprofile_model->getAllRows($where,$offset,$limit);
		$this->load->view('include/modal_verifyphone',$this->data);	
		$status=$this->common_model->getRow("users","id",$this->session->userdata['id']);
		 if($status->status=='active'){
		$this->load->view('favourite',$this->data);
		}else{
		 redirect('home/deactivated');
		}
		$this->load->view('include/footer',$this->data);
		}
	}
	
	function deleteFav(){
	 $val= $this->common_model->deleteRow("favourite_businesses",$_GET['id']);
	 $this->session->set_flashdata('message_type', 'error');	
	 $this->session->set_flashdata('message', lang('Apps_favouritedeleted'));
	 redirect("clients/favourite");
	}
	
	function settings(){
	$val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
	   $this->data['flag']='';
	   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['phonenumber']=$val->phone_number;
	   $this->data['flag']='1';
	   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['flag']='0';
	   }
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->data['personalInfo']= $this->common_model->getRow("users","id",$this->session->userdata("id"));
		$this->data['settings']= $this->common_model->getRow("user_notification_settings","users_id",$this->session->userdata("id"));
		$this->data['cardDetails']= $this->common_model->getRow("credit_card_details","users_id",$this->session->userdata("id"));
		$status=$this->common_model->getRow("users","id",$this->session->userdata['id']);
		if($status->status=='active'){
		$this->parser->parse('include/modal_verifyphone',$this->data);	
		$this->load->view('settings',$this->data);
		}else{
		 redirect('home/deactivated');
		}
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
	
	public function phoneNum(){
	   $us_number = preg_match( '/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/', $_POST['phone']);

    if ( $us_number ) {
        echo "true";
    }else{
	  echo "false";
	}
   }
	
}
?>
