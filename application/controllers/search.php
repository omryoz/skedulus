<?php
/* Manage Home Controller */
class Search extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->model('search_model');
		$this->load->model('common_model');
		$this->data['bodyclass']='index';
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index() {
		$this->parser->parse('include/header',$this->data);
		$this->data['contentList']=$this->home_model->getBusiness();
		if(isset($this->session->userdata['business_id'])){
			$this->parser->parse('include/dash_navbar',$this->data);
		}
		if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
			$this->parser->parse('include/navbar',$this->data);
		}
		$this->parser->parse('general/home',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	
	public function global_search(){
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->load->view('include/header',$this->data);
		$where=1;
		if(isset($_GET['business_name']) && $_GET['business_name']!=""){
		$where.= " AND business_name LIKE '%" .$_GET['business_name']. "%'";
		}
		if(isset($_GET['location']) && $_GET['location']!=""){
		$where.= " AND address LIKE '%" .$_GET['location']. "%'";
		}
		if(isset($_GET['category']) && $_GET['category']!=""){
		$where.= " AND category_id LIKE '%" .$_GET['category']. "%'";
		}
		$this->data['searchResult']=$this->common_model->searchResult('view_business_details',$where);
		//if(isset($this->session->userdata['role']) && $this->session->userdata['role']='client'){
		if(isset($this->session->userdata['id'])){
		$this->data['favList']=$this->search_model->getFavBusiness();
		
		$this->parser->parse('include/navbar',$this->data);
		}
		$this->load->view('global_search',$this->data);
		$this->load->view('include/footer',$this->data);  
	}
	
	function addtoFav(){
	  $id=$_POST['id'];
	  if(isset($this->session->userdata['id']))
	  {
	  $this->search_model->insertFav($id);
	  }else{
	  echo "false";
	  }
	}
	
	
	
	
	
	
}

?>
