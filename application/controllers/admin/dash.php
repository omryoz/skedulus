<?php
/* Manage Home Controller */
class Dash extends CI_Controller {

	function __construct(){
		parent::__construct();
		if(isset($this->session->userdata['id'])){ 
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
		}else{
		header("Location:" . base_url() .'admin/login');
		}
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
	    $where=" 1";
           if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=5;
			$filter = array();
		$query = "";
	   $where.=" AND user_role='admin'";
	   if(isset($_POST['keyword']) && $_POST['keyword']!=''){
	    $this->data['search']=$_POST['keyword'];
		$where.= " AND (first_name LIKE '%" .$_POST['keyword']. "%' OR last_name LIKE '%" .$_POST['keyword']. "%')";
		}
		if(isset($_POST['page_num'])){
		    $where.=" order by id asc";
			$this->data['contentList'] = $this->admin_model->getdetails("users",$offset,$limit,$where);
		    $this->parser->parse('admin/admin_users_list',$this->data);
	     }else{
		  $this->parser->parse('include/admin_header',$this->data);
		  $this->parser->parse('include/admin_navbar',$this->data);
		 
		 $where.=" order by id asc";
		 $this->data['contentList']=$this->admin_model->getdetails('users',$offset,$limit,$where);
		 $this->parser->parse('include/popupmessages',$this->data);
		 $this->parser->parse('admin/admin_users',$this->data);
		 $this->parser->parse('include/footer',$this->data);
		 }
            
		
	}
	
	public function users($keyword=false,$role=false,$status=false){ 
	$where=" 1";
           if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=10;
			$filter = array();
		$query = "";
		if(!empty($_REQUEST['keyword']) && $_REQUEST['keyword']){
			//$keyword = $_REQUEST['keyword'];
			$where.= " AND (first_name LIKE '%" .$_REQUEST['keyword']. "%' OR last_name LIKE '%" .$_REQUEST['keyword']. "%')";
		}
		if(!empty($_REQUEST['role']) && $_REQUEST['role']){
			//$filter['user_role'] = $_REQUEST['role'];
			$where.=' AND user_role="'.$_REQUEST['role'].'"';
		}
		if(!empty($_REQUEST['status']) && $_REQUEST['status']){
			//$filter['status'] = $_REQUEST['status'];
			$where.=' AND status="'.$_REQUEST['status'].'"';
		}
		$where.=" order by id asc";
		if(isset($_POST['page_num'])){
			$this->data['contentList'] = $this->admin_model->getdetails("users",$offset,$limit,$where);
		    $this->parser->parse('admin/users_list',$this->data);
	  }else{
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$filter = array();
		$query = "";
		if(!empty($_GET['keyword']) && $_GET['keyword']){
			$keyword = $_GET['keyword'];
		}
		if(!empty($_GET['role']) && $_GET['role']){
			$filter['user_role'] = $_GET['role'];
		}
		if(!empty($_GET['status']) && $_GET['status']){
			$filter['status'] = $_GET['status'];
		}
		$this->data['contentList'] = $this->admin_model->getdetails("users",$offset,$limit,$where);
		$this->parser->parse('admin/users',$this->data);
		$this->parser->parse('include/footer',$this->data);
		}
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
           $where=" 1";
           if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=5;	
	    
		$where=' 1';
		if(isset($_POST['insert']) && $_POST['insert']!=''){
		$filter=array('name'=>$this->input->post('category_name'));
		$this->admin_model->insertCategory('category',$filter,$_POST['catid']);
		}
		if(isset($_POST['keyword']) && $_POST['keyword']!=''){
		$this->data['search']=$_POST['keyword'];
		$where.= " AND name LIKE '%" .$_POST['keyword']. "%'";
		}
		$where.=" order by id asc";
		if(isset($_POST['page_num'])){
			$this->data['category'] = $this->admin_model->getdetails("category",$offset,$limit,$where);
		    $this->parser->parse('admin/category_list',$this->data);
	     }else{
            $this->parser->parse('include/admin_header',$this->data);
		    $this->parser->parse('include/admin_navbar',$this->data);		 
			$this->data['category'] = $this->admin_model->getdetails("category",$offset,$limit,$where);
			$this->parser->parse('include/popupmessages',$this->data);
		    $this->parser->parse('admin/category',$this->data);
		    $this->parser->parse('include/footer',$this->data);
		}
	}
	
	public function holidays(){ //print_r($_REQUEST); exit;  
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$where=' 1';
		if(isset($_POST['insert']) && $_POST['insert']!=''){
		$data=$this->uploadFile('calendar');
		if(isset($data)){
		$filename=$data['upload_data']['file_name'];
		$filter=array('filename'=>$data['upload_data']['file_name'],'calendar_name'=>$this->input->post('holiday_name'));
		}else{
		$filter=array('calendar_name'=>$this->input->post('holiday_name'));
		}
		
		$id=$this->admin_model->insertCategory('calendar',$filter,$_POST['holidayid']);
		if(isset($data)){
		$this->insertcsvdatas($filename,$id,$_POST['holidayid']);
		 }
		}
		
		$this->data['category']=$this->admin_model->getdetails('calendar',0,1000,$where);
		$this->parser->parse('admin/holiday',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	function uploadFile($foldername){ 
			$config['upload_path'] = './uploads/'.$foldername.'/'; 
			$config['allowed_types'] = 'csv';   
            $config['max_size']      = '4096';
			$config['overwrite']     =  TRUE;
			$config['file_name']="list".$this->session->userdata('id').'_'.time();
			//$config['max_width'] = '5000';
			//$config['max_height'] = '5000';
			
			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload("userfile"))
			{  
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{  
				$data = array('upload_data' => $this->upload->data());
				return $data;
			}
		}
	
	 function insertcsvdatas($filename,$id,$update){
			//path where your CSV file is located
			// define('CSV_PATH','C:/xampp/htdocs/');
			define('CSV_PATH',base_url().'uploads/calendar/');
			//Name of your CSV file
			$csv_file = CSV_PATH . $filename; 

			if (($getfile = fopen($csv_file, "r")) !== FALSE) {
					 $data = fgetcsv($getfile, 0, ",");
				while (($data = fgetcsv($getfile, 0, ",")) !== FALSE) {
					$num = count($data);
					//for ($c=0; $c < $num; $c++) {
						$result = $data;
						$str = implode(",", $result);
						$slice = explode(",", $str);
					
						$col1 = $slice[0];
						$col2 = $slice[1];
						$col3 = date("Y-m-d",strtotime($slice[2]));
						$col4 = $slice[3];
            if($update==''){
			//SQL Query to insert data into DataBase
			$query = "INSERT INTO holidays_list(calendar_id,name_heb,name_en,holiday_date,length) VALUES('".$id."','".$col1."','".$col2."','".$col3."','".$col4."')";
			}else{
			$query = "Update holidays_list set name_heb ='".$col1."',name_en='".$col2."',holiday_date='".$col3."',length='".$col4."' where calendar_id= '".$id."' "; 
			}
			$s=mysql_query($query);
						
					//}
				}
			}

	 }
	
	public function deleteCat($id){
	     $val= $this->common_model->deleteRow("category",$id);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Category deleted successfully !');
		 redirect("admin/dash/category");
	}
	public function deleteHoliday($id){
	     $val= $this->common_model->deleteRow("calendar",$id);
		 $this->session->set_flashdata('message_type', 'error');	
		 $this->session->set_flashdata('message', 'Holidays list deleted successfully !');
		 redirect("admin/dash/holidays");
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
	
	public function businesses($keyword=false){ 
	$where=" 1";
           if(isset($_POST['page_num'])){
			$offset = $_POST['page_num'];
			}else{
			$offset =0;
			}
			$limit=5;
			$filter = array();
		$query = "";
		if(!empty($_REQUEST['keyword']) && $_REQUEST['keyword']){
			$where.= " AND (business_name LIKE '%" .$_REQUEST['keyword']. "%')";
		}
		if(!empty($_REQUEST['status']) && $_REQUEST['status']){
			$where.=' AND status="'.$_REQUEST['status'].'"';
		}
		if(!empty($_REQUEST['plans']) && $_REQUEST['plans']){
			$where.=' AND subscription_id="'.$_REQUEST['plans'].'"';
		}
		$this->data['list']=$this->admin_model->getdetails('subscription',0,10000,1);
		$where.=" order by business_id asc";
		if(isset($_POST['page_num'])){
			$this->data['contentList'] = $this->admin_model->getdetails("view_user_subscription",$offset,$limit,$where);  
		    $this->parser->parse('admin/businesses_list',$this->data);
	  }else{
	    $this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('include/admin_navbar',$this->data);
		$this->load->model("admin_model");
		
		$this->data['contentList'] = $this->admin_model->getdetails("view_user_subscription",$offset,$limit,$where);
		//$config['page_query_string'] = TRUE;
		//$config['per_page'] = '5';
		//$this->data['contentList'] = $this->common_model->getUsers("view_user_subscription",$keyword,$filter,$config['per_page'],(!empty($_GET['per_page']))?$_GET['per_page']:false,"business_name");
		//$config['total_rows'] = count($this->common_model->getUsers("view_user_subscription",$keyword,$filter,false));
		//$config['base_url'] = base_url().'admin/dash/businesses/'.$query;
		
		//$this->pagination->initialize($config);
		//$this->data['pagination']=$this->pagination->create_links();
		
		$this->parser->parse('admin/businesses',$this->data);
		$this->parser->parse('include/footer',$this->data);
		}
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
	
	function forgotpassword(){
			
			if($this->input->post('submit')){
			
			$query = $this->db->get_where('users',array('email' => $this->input->post('email'),'user_role' => 'admin'));
			#echo $this->db->last_query(); exit;
			//print_r($this->input->post());exit;
			if($query->num_rows()>0){
				$info = $query->result();
			}else{
				$info = false;
			}
			#print_r($info); exit;
			if($info){
			/*Send Password*/
			$emailaddresses=$this->input->get_post('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('info@eulogik.com', 'Skedulus User Services');
			$this->email->to($emailaddresses); 
			$this->email->subject('Password reset request');
			$this->email->message("We've recieved a password reset request. Ignore if you've not sent it.<a href='".base_url()."admin/login/resetpassword?key=".$info[0]->activationkey."'>Reset your password here</a>");	
			$this->email->send();
			$this->data['messages'] = "Email Sent. Please, check your inbox and click link to reset your password ";
			}
			else{	
				$this->data['messages'] = "This email doesn't exist";
			}
		}
		
		$this->session->set_flashdata('message_type', 'success');	
		$this->session->set_flashdata('message', ''.$this->data['messages'].''); 
		redirect("admin/login/");
		
	}
}

?>
