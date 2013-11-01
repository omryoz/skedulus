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
	
	
	public function global_search(){ //print_r($_POST); exit;
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->data['category']='';
		$this->data['manager_name']='';
		$this->data['location']='';
		$where=1;
		if(isset($_POST['manager_name']) && $_POST['manager_name']!=""){
		$this->data['manager_name']=$_POST['manager_name'];
		$where.= " AND manager_firstname LIKE '%" .$_POST['manager_name']. "%' OR manager_lastname LIKE '%" .$_POST['manager_name']. "%'";
		}
		if(isset($_POST['location']) && $_POST['location']!=""){
		$this->data['location']=$_POST['location'];
		$where.= " AND address LIKE '%" .$_POST['location']. "%'";
		}
		if(isset($_POST['category']) && $_POST['category']!=""){
		$this->data['category']=$_POST['category'];
		$where.= " AND category_id LIKE '%" .$_POST['category']. "%'";
		}
		$this->data['searchResult']=$this->common_model->searchResult('view_business_details',$where);
		
		$this->parser->parse('include/header',$this->data);
		if(isset($this->session->userdata['id']) && $this->session->userdata['role']=='client'){
		$this->data['favList']=$this->search_model->getFavBusiness();
		
		$this->parser->parse('include/navbar',$this->data);
		}elseif(isset($this->session->userdata['id']) && $this->session->userdata['role']=='manager'){
		 $this->parser->parse('include/dash_navbar',$this->data);
		}
		$this->parser->parse('global_search',$this->data);
		$this->parser->parse('include/footer',$this->data);  
	}
	
	function addtoFav(){
	  $id=$_POST['id'];
	  if(isset($this->session->userdata['id']))
	  {
	  $this->search_model->insertFav($id,$_POST['action']);
	  }else{
	  echo "false";
	  }
	}
	
	
}

?>
