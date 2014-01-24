<?php
/* Manage Business registration Controller */
class Basicinfo extends CI_Controller {
	function __construct(){
		parent::__construct();
		if(isset($this->session->userdata['id']) && isset($this->session->userdata['business_id'])){ 
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('basicinfo_model');
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
	 	if(isset($this->session->userdata['admin'])){
		  $users_id=$this->session->userdata['users_id'];
		  $this->data['switch']='switchbtn';
		  $this->parser->parse('include/admin_header',$this->data);
		  }else{
			  $users_id=$this->session->userdata['id'];
			  $this->parser->parse('include/header',$this->data);
		  }
	    $this->data['user_id']=$users_id;
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$where=" and filename!=''";
		$calendar=$this->common_model->getDDArray('calendar','id','calendar_name',$where);
		$calendar[""]=" Select Calendar";
		$this->data['getCalendar']=$calendar;
		
		$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
		$this->data['action']="add";
		
		$isExist=$this->common_model->getRow("user_business_details","users_id",$users_id);
		if(isset($isExist) && $isExist!=""){
		$this->data['name']=$isExist->name;
		$this->data['username']=$isExist->username;
		$this->data['businessurl']=base_url().$isExist->username;
		$this->data['description']=$isExist->description;
		$this->data['address']=$isExist->address;
		$this->data['mobile']=$isExist->mobile_number;
		$this->data['calendar']=$isExist->calendar_type;
		$this->data['business_type']=$isExist->business_type;
		$this->data['category']=$isExist->category_id;
		$this->data['map_latitude']=$isExist->map_latitude;
		$this->data['map_longitude']=$isExist->map_longitude;
		$this->data['image']=$isExist->image;
		$this->data['isExistAvailability']=$this->basicinfo_model->getAvailability();
		$this->data['disabled']="disabled";
		// echo "<pre>";print_r($this->data['isExistAvailability']); exit;
		}else{
		$this->data['businessurl']="";
		$this->data['disabled']="";
		$this->data['isExistAvailability']="";
		$this->data['username']="";
		$this->data['name']="";
		$this->data['description']="";
		$this->data['address']="";
		$this->data['mobile']="";
		$this->data['calendar']="";
		$this->data['business_type']="";
		$this->data['category']="";
		$this->data['map_latitude']="31.046051";
		$this->data['map_longitude']="34.85161199999993";
		$this->data['image']="";
		}
		
		if(isset($_GET['checkinfo'])){
		//print_r($_POST['businessType']); exit;
		$this->basicinfo_model->insertsubscription($users_id);
		$id=$this->basicinfo_model->insertBasicInfo($users_id);
		redirect($_POST['businessType']);
		}
	
		//$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/registration_navbar',$this->data);
		$this->parser->parse('basicinfo',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function editinfo(){
	if(isset($this->session->userdata['admin'])){
		  $users_id=$this->session->userdata['users_id'];
		  $this->data['switch']='switchbtn';
		  $this->parser->parse('include/admin_header',$this->data);
		  }else{
			  $users_id=$this->session->userdata['id'];
			  $this->parser->parse('include/header',$this->data);
		  }
		$this->data['user_id']=$users_id;
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
		$where=" and filename!=''";
		$calendar=$this->common_model->getDDArray('calendar','id','calendar_name',$where);
		$calendar[""]=" Select Calendar";
		$this->data['getCalendar']=$calendar;
		
		$isExist=$this->common_model->getRow("user_business_details","users_id",$users_id);
		$this->data['action']="edit";
		$this->data['disabled']="disabled";
		$this->data['name']=$isExist->name;
		$this->data['username']=$isExist->username;
		$this->data['businessurl']=base_url().$isExist->username;
		$this->data['description']=$isExist->description;
		$this->data['address']=$isExist->address;
		$this->data['mobile']=$isExist->mobile_number;
		$this->data['calendar']=$isExist->calendar_type;
		$this->data['business_type']=$isExist->business_type;
		$this->data['category']=$isExist->category_id;
		$this->data['map_latitude']=$isExist->map_latitude;
		$this->data['map_longitude']=$isExist->map_longitude;
		$this->data['image']=$isExist->image;
		$this->data['isExistAvailability']=$this->basicinfo_model->getAvailability();
		
		if(isset($_GET['checkinfo'])){
		$id=$this->basicinfo_model->insertBasicInfo($users_id);
		redirect('businessProfile/?id='.$this->session->userdata['business_id']);
		//header('Location: '.base_url().'businessProfile/?id='.$this->session->userdata['business_id']);
		//redirect(businessProfile);
		}
		//$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/dash_navbar',$this->data);
		$this->parser->parse('basicinfo',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function availability(){
		$val= $this->basicinfo_model->getAvailibility();
		if($val!=false)
		echo json_encode($val);
	}
	
	
	public function insertData(){
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  }else{
	  $users_id=$this->session->userdata['id'];
	  }
	 $this->basicinfo_model->insertBasicInfo($users_id);
	}
	
	public function checkusername(){
	$duplicate='';
	       if(isset($_POST['id']) && $_POST['id']!="") {
			$where=" and id!=".$_POST['id'];
			$duplicate=$this->common_model->getRow("user_business_details","username",$_POST['username'],$where);
			}else{
			$duplicate=$this->common_model->getRow("user_business_details","username",$_POST['username']);
			}
		    
			if($duplicate){
			echo "false";
			}else{
			echo "true";
			}
	}
}

?>
