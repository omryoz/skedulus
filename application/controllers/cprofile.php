<?php
/* Manage Home Controller */
class Cprofile extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('cprofile_model');
		$this->load->model('common_model');
		$this->load->model('home_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index() {
	    
		 $this->page();
	}
	public function page(){
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		// $this->data['contentList']=$this->home_model->getBusiness();
		
		$where=" user_status='active' and business_status='active'";
	    $config['total_rows'] = $this->common_model->getCount('view_business_details','business_id',$where); 
		if($config['total_rows']){
		    $config['base_url'] = base_url().'cprofile/page/';
			$config['per_page'] = '12';
			$config['uri_segment'] = 3; 
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(3)!=''){
			$offset=$this->uri->segment(3);
			}else{
			$offset=0;
			}
			$this->data['contentList']=$this->home_model->getBusiness($offset,$config['per_page']);
			
            /* End Pagination Code  */
		}
		
		
		
		 $this->parser->parse('include/header',$this->data);
		 $this->parser->parse('include/navbar',$this->data);
		 $this->data['user_id'] = $this->session->userdata['id'];
		 $currentTimestamp=date('Y-m-d H:i:s');
		 $where=' start_time >="'.$currentTimestamp.'" and users_id= "'.$this->session->userdata('id').'" and booked_by="client" ORDER by start_time DESC';
		 
		 // $where=' users_id= "'.$this->session->userdata('id').'"  and DATE(start_time)>="'.date('Y-m-d').'" ORDER by start_time ASC LIMIT 0,2';
		 $this->data['appDetails']=$this->cprofile_model->getAllStartDates($where,0,2);
		 $status=$this->common_model->getRow("users","id",$this->session->userdata['id']);
		 if($status->status=='active'){
		 $this->parser->parse('include/modal_popup',$this->data);
		 $this->parser->parse('business_home',$this->data);
		 $this->parser->parse('include/footer',$this->data);
		 }else{
		 redirect('home/deactivated');
		 }
	}
	
}

?>
