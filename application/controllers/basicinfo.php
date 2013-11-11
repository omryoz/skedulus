<?php
/* Manage Business registration Controller */
class Basicinfo extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('basicinfo_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	
	public function index(){
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
		$this->data['action']="add";
		
		$isExist=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
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
		}
		
		if(isset($_GET['checkinfo'])){
		//print_r($_POST['businessType']); exit;
		$this->basicinfo_model->insertsubscription();
		$id=$this->basicinfo_model->insertBasicInfo();
		redirect($_POST['businessType']);
		}
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/registration_navbar',$this->data);
		$this->parser->parse('basicinfo',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function editinfo(){
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->data['weekdays']=$this->common_model->getDDArray('weekdays','id','name');
		
		$isExist=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
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
		$this->data['isExistAvailability']=$this->basicinfo_model->getAvailability();
		
		if(isset($_GET['checkinfo'])){
		$id=$this->basicinfo_model->insertBasicInfo();
		header('Location: '.base_url().'businessProfile/?id='.$this->session->userdata['business_id']);
		//redirect(businessProfile);
		}
		$this->parser->parse('include/header',$this->data);
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
	 $this->basicinfo_model->insertBasicInfo();
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
