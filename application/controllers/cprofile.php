<?php
/* Manage Home Controller */
class Cprofile extends CI_Controller {

	function __construct(){
		parent::__construct(); 
		if(isset($this->session->userdata['id'])){ 
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
		}else{
		header("Location:" . base_url());
		}
    }
	
	public function index() {
		 $this->page();
	}
	public function page(){
	  if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=4;
			
	if(isset($_POST['page_num'])){
	        $this->data['contentList']=$this->home_model->getBusiness($offset,$limit);
		    $this->parser->parse('business_list',$this->data);
   }else{
	   $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
	   $this->data['flag']='';
	   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['phonenumber']=$val->phone_number;
	   $this->data['flag']='1';
	   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['flag']='0';
	   }
		$Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		// $this->data['contentList']=$this->home_model->getBusiness();
		
		$where=" user_status='active' and business_status='active'";
	   // $config['total_rows'] = $this->common_model->getCount('view_business_details','business_id',$where); 
		//if($config['total_rows']){
		  //  $config['base_url'] = base_url().'cprofile/page/';
			//$config['per_page'] = '12';
			//$config['uri_segment'] = 3; 
			//$this->pagination->initialize($config);
			//$this->data['pagination']=$this->pagination->create_links();
			//if($this->uri->segment(3)!=''){
			//$offset=$this->uri->segment(3);
			//}else{
			//$offset=0;
			//}
			$this->data['contentList']=$this->home_model->getBusiness($offset,$limit);
			
            /* End Pagination Code  */
		//}
		
		
		
		 $this->parser->parse('include/header',$this->data);
		 $this->parser->parse('include/navbar',$this->data);
		 $this->data['user_id'] = $this->session->userdata('id');
		 $currentTimestamp=date('Y-m-d H:i:s');
		 $where=' start_time >="'.$currentTimestamp.'" and users_id= "'.$this->session->userdata('id').'" and booked_by="client" ORDER by start_time ASC';
		 
		 // $where=' users_id= "'.$this->session->userdata('id').'"  and DATE(start_time)>="'.date('Y-m-d').'" ORDER by start_time ASC LIMIT 0,2';
		 $this->data['appDetails']=$this->cprofile_model->getAllStartDates($where,0,2);
		 $status=$this->common_model->getRow("users","id",$this->session->userdata('id'));
		 $this->data['businessId']='';
		 if($status->status=='active'){
		 $this->parser->parse('include/modal_popup',$this->data);
		 $this->parser->parse('include/modal_bookclass',$this->data);
		 $this->parser->parse('include/modal_verifyphone',$this->data);	
		 $this->parser->parse('business_home',$this->data);
		 $this->parser->parse('include/footer',$this->data);
		 }else{
		  redirect('home/deactivated');
		 }
		 }
	}
	
	public function updatePhone(){
	     $val=$this->common_model->getRow('users','id',$this->session->userdata('id'));
		 $message="Your key code : ". $val->random_key;
	     $val=$this->common_model->sendSMS($message,$_POST['phone']);
		 if($val){
	     $this->cprofile_model->updatePhone();
		 }else{
		 echo 0;
		 }
	}
	
	function checkStatus(){
	   $val=$this->common_model->getRow('users','id',$this->session->userdata('id'));
	   if($val->phone_number!=''){
	     echo 1;
	   }else{
	     echo 0;
	   }
	}
	
	public function updateStatus(){
	    $val=$this->common_model->getRow('users','id',$this->session->userdata('id'));
		if($val->random_key==$this->input->post('keycode')){
	    $filter=array('verify_phone'=>'active');
	    $this->cprofile_model->updateUserinfoByfilter($filter,$this->session->userdata('id'));
		echo 1;
		}else{
		echo 0;
		}
	}
	
	public function sendagain(){
	   $rand=$this->home_model->random_password(5);
	   $val=$this->common_model->getRow('users','id',$this->session->userdata('id'));
	   $message="Your key code : ". $rand;
	     $val=$this->common_model->sendSMS($message,$val->phone_number);
		 if($val){
		  $filter=array('random_key'=>$rand);
	      $val=$this->cprofile_model->updateUserinfoByfilter($filter,$this->session->userdata('id'));
		  echo 1;
		  }else{
		  echo 0;
		  }
	   
	}

    function deletemyapp(){
	    $this->home_model->deletemyapp();
	}	
   
}

?>
