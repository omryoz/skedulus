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
	
	// $this->parser->parse('include/header',$this->data);
	 // if($this->session->userdata['role']=="manager"){
		// $this->parser->parse('include/dash_navbar',$this->data);
	// }
	 // if($this->session->userdata['role']=="client"){
		// $this->parser->parse('include/navbar',$this->data);
	// }
	
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
	 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){
		$this->parser->parse('include/dash_navbar',$this->data);
	}else if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
		//$sessionVal=array('profile_id'=>$_GET['id']);
	    //$this->session->set_userdata($sessionVal);
		$this->parser->parse('include/navbar',$this->data);
		$where=" and users_id=".$users_id;
		$checkFav=$this->common_model->getRow("view_business_clients","user_business_details_id",$_GET['id'],$where);
		
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
	
	 $where=" AND type='business'";
	 $this->data['availability']=$this->common_model->getAllRows("view_service_availablity","user_business_details_id",$id,$where);
     if($this->data['content']->business_type=='class'){
	 $this->data['type']="Classes";
	 $this->data['services']=$this->business_profile_model->getClasses($id);
	 //$this->data['services']=$this->common_model->getAllRows("view_classes_posted_business","user_business_details_id",$id); 
	 }else if($this->data['content']->business_type=='service'){
     $this->data['type']="Services";	 
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$id);
	 }
	 $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$id);
	 $where1=" order by  orderNum ASC";
	 $this->data['photoGallery']=$this->common_model->getAllRows("user_business_photogallery","user_business_details_id",$id,$where1);
	 $filter = array("users_id"=> $this->data['user_id'],"user_business_details_id"=>$this->data['id']);
     $this->load->model("bprofile_model");
	 $this->data['checkFavourite'] = $this->bprofile_model->checkFavourite($filter); 	
	 $this->data['checkFavouritecounts'] = $this->bprofile_model->checkFavourite(array("user_business_details_id"=>$this->data['id'])); 	
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
	
	function likes_business(){
		$this->load->model("bprofile_model");
		echo $this->bprofile_model->likes_business($_POST);
	}
	
	
}
?>
