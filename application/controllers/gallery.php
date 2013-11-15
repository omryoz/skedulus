<?php
/* Manage Business registration Controller */
class Gallery extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('pagination');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function list_gallery(){
	 //$this->parser->parse('include/header',$this->data);
	 if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $where ="1 and user_business_details_id=".$this->session->userdata['business_id'];
	
	 $config['total_rows'] = $this->common_model->getCount('user_business_photogallery','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'gallery/list_gallery/';
			$config['per_page'] = '12';
			$config['uri_segment'] = 3; 
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links(); 
			if($this->uri->segment(3)!=''){
			$offset=$this->uri->segment(3);
			}else{
			$offset=0;
			}
			
			$this->data['tableList']=$this->bprofile_model->getImages($offset,$config['per_page']);
			
            /* End Pagination Code  */
		}
	 
	 
	 
	 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
     if($status->status=='active'){
	 $this->parser->parse('gallery',$this->data);
	 }else{
	 $this->parser->parse('deactivated',$this->data);
	 }
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function checkfornum(){
	 $where=' 1 and user_business_details_id='.$this->session->userdata('business_id');
	 $total = $this->common_model->getCount('user_business_photogallery','id',$where);
	 $val=$this->common_model->check('picture',$total);
	 //print_r($total);
	}
	
	public function manage_gallery(){
		if(isset($_POST['insert'])){ 
			$id=$this->bprofile_model->insertPhoto();
			redirect('gallery/list_gallery');
		 }
		 if(isset($_GET['id'])){
			$val= $this->bprofile_model->getPhotodetails();
			echo($val);
		 }
		
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("user_business_photogallery",$_GET['id']);
		// echo $val;
		$this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Photo deleted successfully !');
		 redirect("gallery/list_gallery");
		 }
	}	
	
}
?>
