<?php
/* Manage Home Controller */
class Common_functions extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('home_model');
		$this->load->model('common_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		
    }
	
	public function employee(){
	$this->data['userRole']="employeelogin";
	$this->data['signUp']="businessSignUp";
	if(isset($_GET['activation_link'])){
	  $val= $this->home_model->updateEmpUser();
	  if($val=="alreadyUser"){
	    $this->data['alreadyUser']="alreadyUser";
		}
		 $this->parser->parse('include/meta_tags',$this->data);
		 $this->parser->parse('general/login',$this->data);
	  
	}
  }
	
   public function employeelogin(){
	//if(isset($_GET['checkinfo'])){
		$password= MD5($_POST['password']);
		 $where=" And password='".$password."' AND user_role='employee' and status='active'";
		 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		 
		 if($values==""){
		 $this->data['failure']="Failure";
		 $this->parser->parse('include/meta_tags',$this->data);
		 $this->parser->parse('general/login',$this->data);
		 }else{
		
		 $sessionVal=array(
			 'id'=>$values->id,
			 'username'=>$values->first_name,
			 'email'=>$values->email
		 );
		 
		 $this->session->set_userdata($sessionVal);
		 $status=$this->common_model->getRow("view_business_employees","users_id",$this->session->userdata['id']);
		 if($status){
			 $sessionVal=array('business_id'=>$status->user_business_details_id);
			  $this->session->set_userdata($sessionVal);
			 redirect('overview'); 
			 }
		 }
		
   }	
	
	public function businesslogin($redirectUrl){
	//$this->data['userRole']="businesslogin";
	//$this->data['signUp']="businessSignUp";
	if(isset($_GET['activation_link'])){
	  $val= $this->home_model->updateUser();
	  if($val=="newUser"){
	  redirect('basicinfo');
	  }else if($val=="alreadyUser"){
	    $this->data['alreadyUser']="alreadyUser";
	  }
	}
	//if(isset($_GET['checkinfo'])){
		// $password= MD5($_POST['password']);
		 // $where=" And password='".$password."' AND user_role='manager' and status='active'";
		 // $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		 
		 // if($values==""){
			 // $this->data['failure']="Failure";
			 // $this->parser->parse('include/meta_tags',$this->data);
			 // $this->parser->parse('general/login',$this->data);
		 // }else{
		
		 // $sessionVal=array(
			 // 'id'=>$values->id,
			 // 'username'=>$values->first_name,
			 // 'email'=>$values->email,
			 // 'role'=>$values->user_role
		 // );
		 //$this->session->set_userdata($sessionVal);
		 $status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
		 $subscription=$this->common_model->getRow("view_user_subscription","users_id",$this->session->userdata['id']);
		 
		 if($status){
			 $sessionVal=array('subscription'=>$subscription->subscription_id,'business_id'=>$status->id,'business_type'=> $status->business_type,'type'=>'dual');
			  $this->session->set_userdata($sessionVal);
			  if($redirectUrl){
			   $this->session->unset_userdata('role');
			   $this->session->unset_userdata('business_id');
					$sessionVal=array(
					 'role'=>'client'
					);
				 $this->session->set_userdata($sessionVal);	
				 header($redirectUrl);
			   }else{
			    redirect('overview');
				}			 
			 }else{
			 redirect('basicinfo');
			 }
		 }
	
	public function clientlogin(){  
	if(isset($_POST['referal_url'])){
	 $referal_url=$_POST['referal_url'];
	 $this->data['url']=$referal_url;
	}
	$redirectUrl='';
	    $this->data['userRole']="clientlogin";
		$this->data['signUp']="clientSignUp";
		if(isset($_GET['checkinfo'])){
		$password= MD5($_POST['password']);
		// $where=" And password='".$password."' AND status='active'";
		  $where=" And password='".$password."'";
		 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		 if($values==""){
		 CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
		 //redirect('home/clientlogin/?failure');
	    $this->data['failure']="Failure";
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		 }elseif($values->status=='inactive'){
		 CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
		 //redirect('home/clientlogin/?failure');
	    $this->data['inactive']="Inactive";
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		 }else{
		  $sessionVal=array(
			 'id'=>$values->id,
			 'username'=>$values->first_name,
			 'email'=>$values->email,
			 'role'=>$values->user_role
		 );
		 $this->session->set_userdata($sessionVal);
		 if($referal_url){ 
		 if($values->user_role=='manager'){
		 $redirectUrl="Location:".$_POST['referal_url'];
		 $status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
		 $this->businesslogin($redirectUrl);
		 }else{
		  header("Location:".$_POST['referal_url']);
		  }
		 }else{
			if($values->user_role=='manager'){
			$this->businesslogin();
			}elseif($values->user_role=='client'){
			redirect('cprofile');
			}else{
			redirect('home/clientlogin');
			}
		 }
		 }
		}
	}
	
	function mydashboard($type=false){
	    if($type=='my'){
		 $this->session->unset_userdata('role');
		 $this->session->unset_userdata('business_id');
			$sessionVal=array(
			 'role'=>'client'
		    );
		 $this->session->set_userdata($sessionVal);	
		 redirect('cprofile');
		 }else if($type=='business'){
		 $this->session->unset_userdata('role');
		 $res=$this->common_model->getRow('user_business_details','users_id',$this->session->userdata['id']);
		  $sessionVal=array(
			 'role'=>'manager',
			 'business_id'=>$res->id
		    );
		 $this->session->set_userdata($sessionVal);	
		  redirect('overview');
		 }
	 }
	 
	 function mysettings(){
		 $this->session->unset_userdata('role');
		 $this->session->unset_userdata('business_id');
			$sessionVal=array(
			 'role'=>'client'
		    );
		 $this->session->set_userdata($sessionVal);	
		 redirect('clients/settings');
		
	 }
	
	public function businessSignUp(){
	$this->data['userRole']="businessSignUp";
	$this->data['signUp']="businesslogin";
	if(isset($_GET['checkino'])){ 
			 $id=$this->home_model->insertinfo();
			 $userdetails= $this->common_model->getRow("users","id",$id);
	         $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		     $this->data['activation_key'] = $userdetails->activationkey;
		     $email = $userdetails->email; 
			 $subject ="Account Activation";	
			 $message=$this->load->view('account_activation',$this->data,TRUE);
			
			$this->common_model->mail($email,$subject,$message);
   			// $this->account_activation($id);
			 $this->data['success']="successfull";
	}
	 redirect('home/businessSignUp');
	   //$this->parser->parse('include/header',$this->data);
	  // $this->data['contentList']=$this->home_model->getBusiness();
		// if(isset($this->session->userdata['business_id'])){
			// $this->parser->parse('include/dash_navbar',$this->data);
		// }
		// if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
			// $this->parser->parse('include/navbar',$this->data);
		// }
		//$this->parser->parse('general/home',$this->data);
		//$this->parser->parse('include/footer',$this->data);
	  //$this->parser->parse('include/meta_tags',$this->data);
	  //$this->load->view('general/signup',$this->data);
}


	public function clientSignUp(){
	$this->data['userRole']="clientSignUp";
	$this->data['signUp']="clientlogin";
	if(isset($_GET['checkino'])){
		 $id=$this->home_model->insertinfo();
		  redirect('cprofile');
	}
   $this->parser->parse('include/meta_tags',$this->data);
   $this->load->view('general/signup',$this->data);
}
	
	// public function account_activation($id){
	    // $this->load->library( 'email' );
		// $config['mailtype'] = 'html';
		// $config['protocol'] = 'sendmail';
	    // $userdetails= $this->common_model->getRow("users","id",$id);
	    // $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		// $this->data['activation_key'] = $userdetails->activationkey;
		// $this->data['email'] = $userdetails->email; 
		//Get email 
		// $this->email->initialize($config);
		// $this->email->from('swathi.n@eulogik.com', 'swathi');
		// $this->email->to($this->data['email']); 
		// $this->email->subject('Account Activation');
		// $message=$this->load->view('account_activation',$this->data,TRUE);
        // $this->email->message($message);  		
		// $this->email->send();
		// $this->email->print_debugger();
	// }
	
	
	
	public function checkEmail(){
		$duplicate=$this->common_model->getRow("users","email",$_POST['email']);
		if($duplicate){
		echo "false";
		}else{
		echo "true";
		}
	}
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	/* Function to  display image in requird dimensions*/
		/*public function display_image($photo_id=false,$width = false,$height = false,$ratio=false,$file=false)
		{
			$this->photos_actions->display_image($photo_id,$width,$height,$ratio,$file);
		}	*/
		
		public function display_image($file=false,$width = false,$height = false,$ratio=false,$path=false)
		{
			//echo "Hello";die;
			$this->photos_actions->default_preview($width,$height,$file,$path,$ratio);
		}

	function forgotpassword(){
			
			if($this->input->post('submit')){
			
			$query = $this->db->get_where('users',array('email' => $this->input->post('email')));
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
			$this->email->message("We've recieved a password reset request. Ignore if you've not sent it.<a href='".base_url()."home/resetpassword?key=".$info[0]->activationkey."'>Reset your password here</a>");	
			$this->email->send();
			$this->data['messages'] = "Email Sent. Please, check your inbox and click link to reset your password ";
			}
			else{	
				$this->data['messages'] = "This email doesn't exist";
			}
		}
		
		$this->session->set_flashdata('message_type', 'success');	
		$this->session->set_flashdata('message', ''.$this->data['messages'].''); 
		redirect("home/clientlogin");
		
	}		
	
}