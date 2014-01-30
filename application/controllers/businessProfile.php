<?php
/* Manage Business registration Controller */
class BusinessProfile extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('business_profile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index(){
	
	if($this->session->userdata('role')=='admin'){
	 $business_id=$_GET['id'];
     $details=$this->common_model->getRow("view_user_subscription","business_id",$business_id);
	 $business_type=$this->common_model->getRow('user_business_details','id',$business_id);
	 
	 $users_id=$details->users_id;
	 $sessionVal=array('business_type'=>$business_type->business_type,'subscription'=>$details->subscription_id,'users_id'=>$users_id,'business_id'=>$business_id,'role'=> 'manager','admin'=>'admin');
	 $this->session->set_userdata($sessionVal);
	 //$this->viewPage();
	}
	
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else if(isset($this->session->userdata['id'])){
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}else{
	  $this->parser->parse('include/header',$this->data);
	}
	 $this->parser->parse('include/modal_verifyphone',$this->data);	
	 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){
		$this->parser->parse('include/dash_navbar',$this->data);
	}else if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
		//$sessionVal=array('profile_id'=>$_GET['id']);
	    //$this->session->set_userdata($sessionVal);
		$this->parser->parse('include/navbar',$this->data);
		$where=" and users_id=".$users_id;
		$checkFav=$this->common_model->getRow("favourite_businesses","user_business_details_id",$_GET['id'],$where);
		
		if(isset($checkFav) && $checkFav!="")
		$this->data['isFav']= $checkFav->user_business_details_id;
		
	}
	
	 if(isset($_GET['id'])){
		$id=$_GET['id'];
	 }else{
		$id=$this->session->userdata['business_id'];
	 }
	 $this->data['id']=$id;
	 if(isset($users_id)){
	 $this->data['user_id'] = $users_id;
	 }else{
	 $this->data['user_id'] = '';
	 }
	 $this->parser->parse('include/modal_popup',$this->data);
	 $this->data['content']=$this->common_model->getRow("view_business_details","business_id",$id);
	 // $staffid=$this->common_model->getRow('employee_services','users_id',$this->data['content']->users_id);
	 // if($staffid==''){
	   // $staffid=$this->common_model->getRow("employee_services","business_id",$id);
	 // } 
	 
	// $this->data['staffid']=$staffid->users_id;
	 
	 $this->data['staffid']=$this->common_model->getstaffid($id,$this->data['content']->users_id);
	 
	 $where=" AND type='business'";
	 $this->data['availability']=$this->common_model->getAllRows("view_service_availablity","user_business_details_id",$id,$where);
     if($this->data['content']->business_type=='class'){
	 $this->data['type']="Classes";
	 $this->data['services1']=$this->business_profile_model->getClasses($id);
	 $this->data['services']=$this->common_model->getAllRows("user_business_classes","user_business_details_id",$id); //$this->data['services']=$this->common_model->getAllRows("view_classes_posted_business","user_business_details_id",$id); 
	 }else if($this->data['content']->business_type=='service'){
     $this->data['type']="Services";	
     $this->data['services1']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$id);	 
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$id);
	 }
	 $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$id);
	 $where1=" order by  orderNum ASC";
	 $this->data['photoGallery']=$this->common_model->getAllRows("user_business_photogallery","user_business_details_id",$id,$where1);
	 $filter = array("users_id"=> $this->data['user_id'],"details_id"=>$this->data['id']);
     $this->load->model("bprofile_model");
	 $this->data['checkFavourite'] = $this->bprofile_model->checkFavourite($filter); 	
	 $this->data['checkFavouritecounts'] = $this->bprofile_model->checkFavourite(array("details_id"=>$this->data['id'])); 	
	 $filters = array("users_id"=> $this->data['user_id'],"type"=>"photos");
	 $favorite_photos = $this->bprofile_model->checkFavourite($filters);
	 $this->data['favorite_photos'] = array();
	 if(count($favorite_photos) && is_array($favorite_photos))
	 foreach($favorite_photos as $fav){
		array_push($this->data['favorite_photos'],$fav->details_id);
	 }	
	 
	if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){ 
	$status=$this->common_model->getRow("user_business_details","users_id",$users_id);
	if($status->status=='active'){
	 $this->parser->parse('business_profile',$this->data);
	 }else{
	   $this->parser->parse('deactivated',$this->data);
	 }
	 }else{
	 $this->parser->parse('business_profile',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	}
	
	function redirectUrl(){
	$this->data['url']=$_GET['url'];
	$this->data['userRole']="clientlogin";
	$this->data['signUp']="clientSignUp";
	$this->parser->parse('include/meta_tags',$this->data);
	$this->parser->parse('general/login',$this->data);
	}
	
	function likes_business(){
		$this->load->model("bprofile_model");
		echo $this->bprofile_model->likes_business($_POST);
	}
	
	function getComments(){
		$this->load->model("bprofile_model");
		//print_r($_POST);
		$this->data['comments'] =  $this->bprofile_model->getComments($_POST); 
		//print_r($this->data['comments']);
		$this->load->view("comments",$this->data);
	}
	
	function createComments(){
		$this->load->model("bprofile_model");
		if($this->bprofile_model->createComment($_POST)){
			//echo 1;
			$filter = array("user_business_photogallery_id"=>$_POST['user_business_photogallery_id']); 
			//print_r($filter); 
			$this->data['comments'] = $this->bprofile_model->getComments($filter);
			$this->load->view("comments",$this->data); 	
		}else{
			echo 0;
		}
		
	}
	
	
	
}
?>
