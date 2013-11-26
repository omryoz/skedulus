<?php
/* Manage Business registration Controller */

/*
	Developer : Swathi,Rakesh
	Designer  : Pankaj
	Function  : All Related function with services and classes 	
*/

class Services extends CI_Controller {
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
	
	public function list_services(){
	 if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	 //$this->parser->parse('include/header',$this->data);
	 if(isset($_GET['register'])){
	 $this->parser->parse('include/registration_navbar',$this->data);
	 }else{
	  $this->parser->parse('include/dash_navbar',$this->data);
	 }
	 
	 
	  $where=" user_business_details_id =".$this->session->userdata['business_id'];
	 $config['total_rows'] = $this->common_model->getCount('user_business_services','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'services/list_services/';
			$config['per_page'] = '10';
			$config['uri_segment'] = 3; 
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(3)!=''){
			$offset=$this->uri->segment(3);
			}else{
			$offset=0;
			}
			$this->data['tableList']=$this->bprofile_model->getServices($offset,$config['per_page']);
            /* End Pagination Code  */
		}
	 
	 
	 
     $this->data['staffs']=$this->common_model->getAllRows("view_business_employees","user_business_details_id",$this->session->userdata['business_id']);
 	 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
     if($status->status=='active'){
     $this->parser->parse('services',$this->data);
	 }else{
	 $this->parser->parse('deactivated',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function manage_services(){
		if(isset($_POST['insert'])){ 
			if(isset($_POST['register'])){
			$id=$this->bprofile_model->insertServices();
			redirect('services/list_services/?register');
			}else if(isset($_POST['page']) && $_POST['page']=='1'){ 
			$id=$this->bprofile_model->insertServices();	
			redirect('businessProfile/?id='.$this->session->userdata['business_id']);
			}else{
			$id=$this->bprofile_model->insertServices();
			redirect('services/list_services');
			}
		 }
		 if(isset($_GET['id'])){
			$val= $this->bprofile_model->getServicedetails();
			echo($val);
		 }
		 if(isset($_GET['getStaffs'])){
			$val= $this->bprofile_model->getAssignedStaffs();
			echo json_encode($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("user_business_services",$_GET['id']);
		 $query=$this->db->query("delete from employee_services where service_id=".$_GET['id']);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Service deleted successfully !');
		 if(!empty($_GET['page'])){
		 redirect('businessProfile/?id='.$this->session->userdata['business_id']);
		 }else if(isset($_GET['register'])){ 
		 redirect("services/list_services/?register");
		 }else{
		 redirect("services/list_services");
		 }
		 echo $val;
		 }
	}
	
	
	
	function list_classes(){
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
		//$this->parser->parse('include/header',$this->data);
		if(isset($_GET['register'])){
			$this->parser->parse('include/registration_navbar',$this->data);
		}else{
			$this->parser->parse('include/dash_navbar',$this->data);
		}
		
		 $where=" user_business_details_id =".$this->session->userdata['business_id'];
	    $config['total_rows'] = $this->common_model->getCount('user_business_classes','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'services/list_classes/';
			$config['per_page'] = '10';
			$config['uri_segment'] = 3; 
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(3)!=''){
			$offset=$this->uri->segment(3);
			}else{
			$offset=0;
			}
			$this->data['tableList']=$this->bprofile_model->getClasses($offset,$config['per_page']);
            /* End Pagination Code  */
		}

		$this->data['staffs'] = $this->common_model->getAllRows("view_business_employees","user_business_details_id",$this->session->userdata['business_id']);
		
		 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
		 if($status->status=='active'){
		 $this->parser->parse('classes',$this->data);
		 }else{
		 $this->parser->parse('deactivated',$this->data);
		 }
	 
		
		$this->parser->parse('include/footer',$this->data);	
	}
	
	public function manage_classes(){ 
		if(isset($_POST['insert'])){  
			if(isset($_POST['register'])){ 
			$id=$this->bprofile_model->insertClasses();
			redirect('services/list_classes/?register');
			}else if(isset($_POST['page']) && $_POST['page']=='1'){ 
			$id=$this->bprofile_model->insertClasses();	
			redirect('businessProfile/?id='.$this->session->userdata['business_id']);
			}else{
			$id=$this->bprofile_model->insertClasses();
			redirect('services/list_classes');
			}
		 }
		 if(isset($_GET['id']) && !isset($_GET['delete'])){
			$val= $this->bprofile_model->getClassesdetails();
			echo($val);
		 }
		 if(isset($_GET['getStaffs'])){
			$val= $this->bprofile_model->getAssignedStaffs();
			echo json_encode($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("user_business_classes",$_GET['id']);
		 $query=$this->db->query("delete from employee_services where service_id=".$_GET['id']);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Class delete successfully !');
		  if(!empty($_GET['page'])){
		 redirect('businessProfile/?id='.$this->session->userdata['business_id']);
		 }else if(isset($_GET['register'])){ 
		 redirect("services/list_classes/?register");
		 }else{
		 redirect("services/list_classes");
		 }
		 }
	}
	

		
}

?>
