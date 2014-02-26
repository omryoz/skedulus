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
	
	
	public function global_search($keyword=false,$location=false,$category=false){ 
		//print_r($_POST); exit;
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]="Select Category";
		$this->data['getCategory']=$Category;
		$this->data['category']='';
		$this->data['manager_name']='';
		$this->data['location']='';
		$where=1;
		$filter = "";
		$query = "";
		if(isset($_POST['manager_name']) && $_POST['manager_name']!=""){
			$this->data['manager_name']=$_POST['manager_name'];
            $where.= " AND business_name LIKE '%" .mysql_real_escape_string($_POST['manager_name']). "%'";
			//$where.= " AND (manager_firstname LIKE '%" .$_POST['manager_name']. "%' OR manager_lastname LIKE '%" .$_POST['manager_name']. "%')";
			$filter['manager_name'] = $_POST['manager_name']; 
		}else{
			$filter['manager_name'] = $keyword; 
			if(!empty($keyword)){
			$this->data['manager_name']=$keyword;
			//$where.= " AND (manager_firstname LIKE '%" .$keyword. "%' OR manager_lastname LIKE '%" .$keyword. "%')";
			$where.= " AND business_name LIKE '%" .mysql_real_escape_string($keyword). "%'";
			}
			
		}
		if(isset($_POST['location']) && $_POST['location']!=""){
			$this->data['location']=$_POST['location'];
			$where.= " AND address LIKE '%" .$_POST['location']. "%'";
			$filter['location'] = $_POST['location']; 
		}else{
			$filter['location'] = $location;
			if(!empty($location)){	
			$this->data['location']=$location;
			$where.= " AND address LIKE '%" .$location. "%'";
			}
			
		}
		if(isset($_POST['category']) && $_POST['category']!=""){
			$this->data['category']=$_POST['category'];
			$where.= " AND category_id LIKE '%" .$_POST['category']. "%'";
			$filter['category'] = $_POST['category']; 
		}else{
			$filter['category'] = $category;
			if(!empty($category)){	
			//$this->data['location']=$category;
			$this->data['category']=$category;
			$where.= " AND category_id LIKE '%" .$category. "%'";
			}
			
		 }
		 #print_r($this->data);
		
		if(!empty($filter)){
			#print_r($filter);
			foreach($filter as $filtr){
					if(!empty($filtr))
						$query.= $filtr.'/';
					else
						$query.= '0'.'/'; 
				}
		}
		//echo $query;
		$where.=" AND user_status='active' and business_status='active'";
	   // $config['total_rows'] = $this->common_model->getCount('view_business_details','business_id',$where); 
		//if($config['total_rows']){
			
		   // $config['base_url'] = base_url().'search/global_search/'.$query;
			//$config['per_page'] = '100';
			//$config['uri_segment'] = 6; 
			//$this->pagination->initialize($config);
			//$this->data['pagination']=$this->pagination->create_links();
			//if($this->uri->segment(6)!=''){
			//	$offset=$this->uri->segment(6);
			//}else{
			//	$offset=0;
			//}
			//$this->data['searchResult']=$this->common_model->searchResult('view_business_details',$where,$offset,$config['per_page']);
			if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=3;
			$this->data['searchResult']=$this->search_model->searchResult('view_business_details',$where,$offset,$limit);
			//$this->data['contentList']=$this->home_model->getBusiness($offset,$config['per_page']);
			
            /* End Pagination Code  */
			$this->data['favorite'] = array();
			#print_r($this->session->userdata); exit;
			if(!empty($this->session->userdata['id'])){
				$users_id=$this->session->userdata['id'];
				#print_r($users_id);
				$this->data['user_id'] = $users_id; 
				$this->load->model("bprofile_model");
				$filter = array("users_id"=> $this->data['user_id'],"type"=>"business");
				$this->data['checkFavourite'] = $this->bprofile_model->checkFavourite($filter); 
				if(!empty($this->data['checkFavourite'])){
					foreach($this->data['checkFavourite'] as $favorite):
						array_push($this->data['favorite'],$favorite->details_id);
					endforeach;
				}
				$this->data['favList']=$this->search_model->getFavBusiness();
			}
			
			
		//}
		
		if(isset($_POST['page_num'])){
		//$this->data['admin']='1';
		$this->parser->parse('search_res',$this->data);
		//$this->parser->parse('include/footer',$this->data);
		}else{
		$this->parser->parse('include/header',$this->data);
		if(isset($this->session->userdata['id']) && $this->session->userdata['role']=='client'){		
		$this->parser->parse('include/navbar',$this->data);
		}elseif(isset($this->session->userdata['id']) && $this->session->userdata['role']=='manager'){
		 $this->parser->parse('include/dash_navbar',$this->data);
		}
		$this->parser->parse('global_search',$this->data);
		$this->parser->parse('include/footer',$this->data); 
       }		
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
