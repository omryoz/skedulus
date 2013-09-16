<?php
/* Manage Business registration Controller */
class Gallery extends CI_Controller {
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
	
	public function list_gallery(){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $this->data['tableList']=$this->bprofile_model->getImages();
	 $this->parser->parse('gallery',$this->data);
	 $this->parser->parse('include/footer',$this->data);
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
		 echo $val;
		 }
	}	
	
}
?>
