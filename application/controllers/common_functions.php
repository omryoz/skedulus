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

  public function employelogin(){
	    CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
         $sessionVal=array(
			 'role'=>'manager'
			 //'empid'=>$empid
		 );
		 $this->session->set_userdata($sessionVal);	
	    $status=$this->common_model->getRow("employee_services","users_id",$this->session->userdata['id']);
		 $subscription=$this->common_model->getRow("view_user_subscription","business_id",$status->business_id);
		 $where1=" and status='active'";
		 $manager_id=$this->common_model->getRow("user_business_details","id",$status->business_id,$where1);
		 $mstatus='';
		 if($manager_id){
		 $manager_status=$this->common_model->getRow("users","id",$manager_id->users_id);
		 $mstatus=$manager_status->status;}
		 if($manager_id && $mstatus=='active'){
		       $sessionVal=array('id'=>$manager_id->users_id,'managerid'=>$manager_id->users_id,'subscription'=>$subscription->subscription_id,'business_id'=>$status->business_id,'business_type'=> $manager_id->business_type,'type'=>'dual');
			   $this->session->set_userdata($sessionVal);
			
			        if($this->session->userdata['business_type']=="service"){
						$id=$this->session->userdata['business_id'];
						$link = 'cal/'.$id;		
					}else{
					     $id=$this->session->userdata['business_id'];
						 $link = 'calendar_business/'.$id;	
					}
					//redirect('overview');
					redirect('bcalendar/'.$link);
		 }else{ 
		     $this->data['userRole']="clientlogin";
		     $this->data['signUp']="clientSignUp";
		     $this->session->sess_destroy();
		     $this->data['inactive']="Inactive";
		     $this->parser->parse('include/meta_tags',$this->data);
		     $this->parser->parse('general/login',$this->data);
		 }
  
  }
  
   public function employeelogin(){ 
	   CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
	
	    $this->data['userRole']="employeelogin";
		$this->data['signUp']="clientSignUp";
		if(isset($_GET['checkinfo'])){
		if($_POST['password']!='' && $_POST['email']!=""){
		$password= MD5($_POST['password']);
		 $where=" And password='".$password."'";
		 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		 }else{
		 $values="";
		 }
		 
		 if($values==""){
		 //redirect('home/clientlogin/?failure');
	    $this->data['failure']="Failure";
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		 }elseif($values->status=='inactive'){
		
		 //redirect('home/clientlogin/?failure');
	    $this->data['inactive']="Inactive";
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		 }else{
		  
		  $sessionVal=array(
			 'id'=>$values->id,
			 'empid'=>$values->id,
			 'username'=>$values->first_name,
			 'email'=>$values->email,
			 //'role'=>$values->user_role
			 'role'=>'manager'
		 );
		 $this->session->set_userdata($sessionVal);	
		 $this->employelogin(); 
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
			        $id=$this->session->userdata['business_id'];
					 
					 $url='bcalendar/staffSchedule/';
					 $staffid=$this->common_model->getstaffid($id,$this->session->userdata['id']);
					// $staffid=$staffid->users_id;
			        if($this->session->userdata['business_type']=="service"){
						//$id=$this->session->userdata['business_id'];
						//$link = 'cal/'.$id;
						if($staffid!=''){
						$link = $url.$staffid.'/Services'; }else{
						$link = 'bcalendar/cal/'.$id;
						}								
					}else{
					    // $id=$this->session->userdata['business_id'];
						// $link = 'calendar_business/'.$id;
						if($staffid!=''){						
						$link = $url.$staffid.'/Classes';	
						}else{
						$link = 'bcalendar/calendar_business/'.$id;
						}
					}
					//redirect('overview');
					//redirect('bcalendar/'.$link);
					redirect($link);
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
		if($_POST['password']!='' && $_POST['email']!=""){
		$password= MD5($_POST['password']);
		 $where=" And password='".$password."'";
		 $values=$this->common_model->getRow("users","email",$_POST['email'],$where);
		 }else{
		 $values="";
		 }
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
			}elseif($values->user_role=='employee'){
			$sessionVal=array(
			 'empid'=>$values->id,
		 );
		 $this->session->set_userdata($sessionVal);
			$this->employelogin();
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
		if($this->session->userdata['empid']){
		   $this->session->unset_userdata('id');
		   $sessionVal=array(
			 'id'=>$this->session->userdata['empid']
		    );
			 $this->session->set_userdata($sessionVal);	
		}
		 $this->session->unset_userdata('role');
		 $this->session->unset_userdata('business_id');
			$sessionVal=array(
			 'role'=>'client'
		    );
		 $this->session->set_userdata($sessionVal);	
		 redirect('cprofile');
		 }else if($type=='business'){
		 if(isset($this->session->userdata['empid'])){
		  $id=$this->session->userdata['managerid'];
		   $this->session->unset_userdata('id');
		   $sessionVal=array(
			 'id'=>$this->session->userdata['managerid']
		    );
			$this->session->set_userdata($sessionVal);
		}else{
		$id=$this->session->userdata['id'];
		}
		 
		 $this->session->unset_userdata('role');
		 $res=$this->common_model->getRow('user_business_details','users_id',$id);
		  $sessionVal=array(
			 'role'=>'manager',
			 'business_id'=>$res->id
		    );
		 $this->session->set_userdata($sessionVal);	
		  //redirect('overview');
		 $id=$this->session->userdata['business_id'];
		 $url='bcalendar/staffSchedule/';
		 $staffid=$this->common_model->getstaffid($id,$this->session->userdata['id']); 
		         if($this->session->userdata['business_type']=="service"){
				    if($staffid!=''){
				    $link = $url.$staffid.'/Services';}else{
						$id=$this->session->userdata['business_id'];
						$link = 'bcalendar/cal/'.$id;		}
					}else{
					if($staffid!=''){
					$link = $url.$staffid.'/Classes';}else{
					     $id=$this->session->userdata['business_id'];
						 $link = 'bcalendar/calendar_business/'.$id; }	
					}
					//redirect('overview');
					//redirect('bcalendar/'.$link);
					redirect($link);
		 }
	 }
	 
	 function mysettings(){
	    if($this->session->userdata['empid']){
		   $this->session->unset_userdata('id');
		   $sessionVal=array(
			 'id'=>$this->session->userdata['empid']
		    );
			 $this->session->set_userdata($sessionVal);	
		}
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
	   
}
 


	public function clientSignUp(){
	//$this->load->view('include/modal_verifyphone');
	//$this->parser->parse('include/meta_tags',$this->data);
	$this->data['userRole']="clientSignUp";
	$this->data['signUp']="clientlogin";
	if(isset($_GET['checkino'])){
	// if(!empty($_POST['phone_number'])){
	// $status=1;
	// }else{
	// $status=0;
	// }
		  $id=$this->home_model->insertinfo();
		 // if($phone==1){
		 // redirect('home/c1');
		
	     // }else{
		 // redirect('cprofile/'.$status);
		   redirect('cprofile');
		 //}
		 
	}
   
   //$this->load->view('general/signup',$this->data);
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
			CI_Controller::get_instance()->load->helper('language');
			$this->load->library('utilities');
			$this->utilities->language(); 
			if($this->input->post('submit')){
			if($this->input->post('email')!=''){
			$query = $this->db->get_where('users',array('email' => $this->input->post('email')));
			
			if($query->num_rows()>0){
				$info = $query->result();
			}else{
				$info = false;
			}
			}else{
			$info = false;
			}
			
			
			#print_r($info); exit;
			if($info){
			$date=date("Y-m-d H:i:s");
			$data = array(
               'passwordresetdate' => $date,
            );

            $this->db->where('email', $this->input->post('email'));
            $this->db->update('users', $data); 
			
			/*Send Password*/
			$emailaddresses=$this->input->get_post('email');
			$config['mailtype'] = 'html';
			$this->email->initialize($config);
			$this->email->from('info@eulogik.com', 'Skedulus User Services');
			$this->email->to($emailaddresses); 
			$this->email->subject('Password reset request');
			$this->email->message("We've recieved a password reset request. Ignore if you've not sent it.<a href='".base_url()."home/resetpassword?key=".$info[0]->activationkey."'>Reset your password here</a>");	
			$this->email->send();
			$this->data['messages'] =lang('Apps_sendlinktoresetpassword');
			}
			else{	
			$this->data['messages'] =lang('Apps_emailnotexist');
			}
		}
		
		$this->session->set_flashdata('message_type', 'success');	
		$this->session->set_flashdata('message', ''.$this->data['messages'].''); 
		redirect("home/clientlogin");
		
	}		
	
}