<?php
/* Manage Business registration Controller */
class Offers extends CI_Controller {
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
	
	public function list_offers(){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $this->data['tableList']=$this->bprofile_model->getOffers();
	 $where=" and user_business_details_id=".$this->session->userdata['business_id'];
	 //$services=$this->common_model->getDDArray("user_business_services","id","name",$where);
	 //$this->data['service']=$services;
	 $this->data['count']=$this->common_model->getCount("user_business_services","user_business_details_id",$where);
	 $this->data['services']=$this->common_model->getAllRows("user_business_services","user_business_details_id",$this->session->userdata['business_id']);
	 $this->parser->parse('offers',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function manage_offers(){
		if(isset($_POST['insert'])){ 
			$id=$this->bprofile_model->insertOffers();
			redirect('offers/list_offers');
		 }
		 if(isset($_GET['id'])){
			$val= $this->bprofile_model->getOfferdetails();
			echo($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("business_offers",$_GET['id']);
		 echo $val;
		 }
	}

		
}

?>
