<?php
/* Manage Home Controller */
class Dash extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('pagination');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('admin/admin_model');
		$this->load->model('common_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
		
	    $this->utilities->language();
		$this->data['admin']='admin';
    }
	
	public function index() { //print_r($_POST); exit;
		$this->parser->parse('include/header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$this->parser->parse('admin/login',$this->data);
	}
	
	public function settings(){
	 $this->load->view('include/admin_header',$this->data);
	 $this->load->view('include/admin_navbar',$this->data);
	 $this->load->view('admin/settings',$this->data);
	 $this->load->view('include/footer',$this->data);
	}
	
	public function delete_adminusers($id){
	    $val= $this->common_model->deleteRow("users",$id);
		redirect('admin/dash/admin_users');
	}
	
	public function changePassword(){ 
	  $this->admin_model->updatePassword();
	  $this->logout();
	}
	
	public function checkEmail(){ 
	$where =" and user_role='admin'";
		$duplicate=$this->common_model->getRow("users","email",$_POST['email'],$where);
		if($duplicate){
		echo "false";
		}else{
		echo "true";
		}
	}
	
	public function admin_users(){
	if(isset($_POST['save'])){
		if(isset($_POST['id'])){
		$id=$_POST['id'];
		}else{
		$id='';
		}
	  $filter= array("first_name"=>$_POST['name'],"email"=>$_POST['email'],"activationkey"=>MD5($_POST['email'].time()),"user_role"=>'admin',"password"=>MD5($_POST['password']),"status"=>'active');
	  $id=$this->admin_model->insertUser('users',$filter,$id);
	  
		 $userdetails= $this->common_model->getRow("users","id",$id);
		 $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		 $this->data['activation_key'] = $userdetails->activationkey;
		 $this->data['password'] = $_POST['password'];
		 $this->data['email'] = $userdetails->email;
		 $email = $userdetails->email; 
		 $subject ="Account Activation";	
		 $message=$this->load->view('admin/account_activation',$this->data,TRUE);
		 $this->common_model->mail($email,$subject,$message);
	}
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		
		$where=" user_role='admin'";
		if(isset($_POST['keyword']) && $_POST['keyword']!=''){
		$this->data['search']=$_POST['keyword'];
		$where.= " AND first_name LIKE '%" .$_POST['keyword']. "%' OR last_name LIKE '%" .$_POST['keyword']. "%'";
		}
		$config['total_rows'] = $this->common_model->getCount('users','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'admin/dash/users/';
			$config['per_page'] = '15';
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(4)!=''){
			$offset=$this->uri->segment(4);
			}else{
			$offset=0;
			}
			//print_r($this->uri->segment(5));exit;
			$this->data['contentList']=$this->admin_model->getdetails('users',$offset,$config['per_page'],$where);
            /* End Pagination Code  */
		}
		$this->parser->parse('admin/admin_users',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function users(){ //print_r($_REQUEST); exit; 
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		
		$where=' 1';
		if(isset($_POST['keyword']) && $_POST['keyword']!=''){
		$this->data['search']=$_POST['keyword'];
		$where.= " AND first_name LIKE '%" .$_POST['keyword']. "%' OR last_name LIKE '%" .$_POST['keyword']. "%'";
		}
		$config['total_rows'] = $this->common_model->getCount('users','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'admin/dash/users/';
			$config['per_page'] = '15';
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(4)!=''){
			$offset=$this->uri->segment(4);
			}else{
			$offset=0;
			}
			//print_r($this->uri->segment(5));exit;
			$this->data['contentList']=$this->admin_model->getdetails('users',$offset,$config['per_page'],$where);
            /* End Pagination Code  */
		}
		$this->parser->parse('admin/users',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function userDetails($id=false){
	 $this->load->view('include/admin_header',$this->data);
	 $this->load->view('include/admin_navbar',$this->data);
     $this->data['details']=$this->common_model->getRow('users','id',$id);
	 $this->load->view('admin/user_details',$this->data);
	 $this->load->view('include/footer',$this->data);
	}
	
	public function subscription(){ 
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$this->data['list']=$this->admin_model->getdetails('subscription',0,10000,1);
		$this->parser->parse('admin/subscription',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	public function getDetails(){
	    $val= $this->admin_model->getPlanDetails();
		echo $val;
	}
	
	public function UpdateSub(){ 
	 $val= $this->admin_model->updateSubPlans();
	  redirect("admin/dash/subscription");
	
	}
	
	public function category(){  
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$where=' 1';
		if(isset($_POST['insert']) && $_POST['insert']!=''){
		$filter=array('name'=>$this->input->post('category_name'));
		$this->admin_model->insertCategory('category',$filter,$_POST['catid']);
		}
		if(isset($_POST['keyword']) && $_POST['keyword']!=''){
		$this->data['search']=$_POST['keyword'];
		$where.= " AND name LIKE '%" .$_POST['keyword']. "%'";
		}
		$config['total_rows'] = $this->common_model->getCount('category','id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'admin/dash/category/';
			$config['per_page'] = '15';
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(4)!=''){
			$offset=$this->uri->segment(4);
			}else{
			$offset=0;
			}
			//print_r($this->uri->segment(5));exit;
			$this->data['category']=$this->admin_model->getdetails('category',$offset,$config['per_page'],$where);
            /* End Pagination Code  */
		}
		$this->parser->parse('admin/category',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function deleteCat($id){
	     $val= $this->common_model->deleteRow("category",$id);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Category deleted successfully !');
		 redirect("admin/dash/category");
	}
	
	public function businesslist(){
		$this->unsetSessions();
        $this->businesses();	 
	}
	
	public function userslist(){
		$this->unsetSessions();
        $this->users();	 
	}
	
	public function unsetSessions(){
		$this->session->unset_userdata('role');
		if(isset($this->session->userdata['business_id']))$this->session->unset_userdata('business_id');
		if(isset($this->session->userdata['subscription']))$this->session->unset_userdata('subscription');
		if(isset($this->session->userdata['users_id']))$this->session->unset_userdata('users_id');
		if(isset($this->session->userdata['admin']))$this->session->unset_userdata('admin');
			$sessionVal=array(
			 'role'=>'admin'
		    );
		$this->session->set_userdata($sessionVal);
	} 
	
	public function businesses(){
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$where=' 1';
		if(isset($_POST['keyword']) && $_POST['keyword']!=''){
		$this->data['search']=$_POST['keyword'];
		$where.= " AND business_name LIKE '%" .$_POST['keyword']. "%' ";
		}
		$config['total_rows'] = $this->common_model->getCount('view_user_subscription','subscription_id',$where);
		if($config['total_rows']){
		    $config['base_url'] = base_url().'admin/dash/businesses/';
			$config['per_page'] = '10';
			$this->pagination->initialize($config);
			$this->data['pagination']=$this->pagination->create_links();
			if($this->uri->segment(4)!=''){
			$offset=$this->uri->segment(4);
			}else{
			$offset=0;
			}
			//print_r($this->uri->segment(5));exit;
			$this->data['contentList']=$this->admin_model->getdetails('view_user_subscription',$offset,$config['per_page'],$where);
            /* End Pagination Code  */
		}
		$this->parser->parse('admin/businesses',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	public function bDetails($id=false){
		$this->load->view('include/admin_header',$this->data);
		 $this->load->view('include/admin_navbar',$this->data);
		 $this->data['details']=$this->common_model->getRow('view_business_details','business_id',$id);
		 $this->load->view('admin/business_details',$this->data);
		 $this->load->view('include/footer',$this->data);
	}
	
	public function content(){ 
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$this->parser->parse('admin/content',$this->data);
	}
	
	public function logout(){ 
	   $this->session->sess_destroy();
	   redirect('admin/login');
	}
	
	public function updateStatus(){
	  $val= $this->admin_model->updateUserStatus();
	}
	
	
}

?>