<?php
/* Manage Home Controller */
class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
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
    }
	
	public function index() { //print_r($_POST); exit;
		$this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('admin/login',$this->data);
	}
	
	function chckinfo(){
	 if(isset($_POST['Login'])){
	 $password= MD5($_POST['password']);
	 $where=" And password='".$password."' AND user_role='admin' and  status='active'";
	 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		if($values==""){
		 CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
	    $this->data['failure']="Failure";
		$this->parser->parse('include/admin_header',$this->data);
		$this->parser->parse('admin/login',$this->data);
		 }else{
		 $sessionVal=array(
			 'id'=>$values->id,
			 'username'=>$values->first_name,
			 'email'=>$values->email,
			 'role'=>$values->user_role
		 );
		 $this->session->set_userdata($sessionVal);
		 redirect('admin/dash/users'); 
		}
	 }
	}
	
	public function resetpassword(){
	     $this->load->view('include/admin_header',$this->data);
		  $this->load->view("admin/admin_reset_password",$this->data);
		
	}
	
	function reset(){
		if($this->input->get_post('key')){
				
				$query = $this->db->get_where('users',array('activationkey' => $this->input->get_post('key')));
				if($query->num_rows()>0){
					$info = $query->result();
				}else{
					$info = false;
				}
				
				if(!empty($info)){
						
						if($this->input->post('password')){
							$this->load->model("cprofile_model");
							
							//print_r($info);
							
							$filter = array('password'=>md5($this->input->post('password')));	
							//$this->musers->updatePasswordByfilter($info[0]->id,$filter);
							#$this->muser->updateUserinformation('db_userinfo',$filter,array('id'=>$info[0]->id)); 
							$this->cprofile_model->updateUserinfoByfilter($filter,$info[0]->id);					 		
							$this->data['message'] = "Password Reset successful. Please login now.";
							
						} 
						
				}
				else{
						$this->data['message'] = "Wrong authentication.";
						
				}
				
				$this->parser->parse('include/admin_header',$this->data);
	            $this->parser->parse('admin/login',$this->data);
				
		}
 
	}
}

?>
