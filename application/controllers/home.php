<?php
/* Manage Home Controller */
class Home extends CI_Controller {

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
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	function businesslist(){
	    $this->parser->parse('include/header',$this->data);
		$this->data['flag']='1';
		if(isset($this->session->userdata['id'])){
		$status=$this->common_model->getRow('user_business_details','users_id',$this->session->userdata['id']);
		  if($status){ 
		   $this->data['flag']='0';
		   $subscription=$this->common_model->getRow("view_user_subscription","users_id",$this->session->userdata['id']); 
		   if( ($subscription->subscription_status=='expired') || ($subscription->subscription_status=='active' && $subscription->version_type=='free')){
		      $this->data['exp']='1';
		   }else{
		      $this->data['exp']='0'; 
		   }
		  }else{
			$Cstatus=$this->common_model->getRow('users','id',$this->session->userdata['id']);
			if($Cstatus->verify_phone=='active'){
			 $this->data['status']='1';
			}else{
			$this->data['status']='0';
			$this->data['phonenumber']=$Cstatus->phone_number;
			}	
         }	
		// $Cstatus=$this->common_model->getRow('users','id',$this->session->userdata['id']);
		// if($Cstatus->verify_phone=='active'){
		 // $this->data['status']='1';
		// }else{
		// $this->data['status']='0';
		// $this->data['phonenumber']=$Cstatus->phone_number;
        // }		
		}
		$this->parser->parse('include/modal_showoptions',$this->data);
		$this->parser->parse('include/modal_signup',$this->data);
		$this->parser->parse('include/popupmessages',$this->data);
		$this->parser->parse('include/modal_verifyphone',$this->data);
		$this->data['details']=$this->common_model->getAlldatas("view_subscription_plans",0,10000,1);
		$this->data['Signup_business'] = (!empty($_GET['Signup_business']))?$_GET['Signup_business']:"";
	    $this->parser->parse('general/businesslist',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	
	public function index() {
	   $this->page();
	}
	public function page($msg=false){
		  $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
		$this->parser->parse('include/header',$this->data);
		if($msg){
		  if($msg=='success'){
		     $this->data['msg']=lang('Apps_verificationlink');
		  }else if($msg=='fail'){
             $this->data['msg']=lang('Apps_emaildoesnotexist');	  
		  } else if($msg=='active'){ 
             $this->data['msg']=lang('Apps_activeuserforlogin');	  
		  } else if($msg=='allreadyuser'){
             $this->data['msg']=lang('Apps_activeuserforlogin');		  
		  } else if($msg=='deactivated'){
             $this->data['msg']=lang('Apps_deactivateduserforlogin');		  
		  } else if($msg=='notactivatedyet'){
             $this->data['msg']=lang('Apps_notactivatedyet');		  
		  }
		}
		
		$where=" user_status='active' and business_status='active'";
	    $config['total_rows'] = $this->common_model->getCount('view_business_details','business_id',$where); 
		if($config['total_rows']){
		    $config['base_url'] = base_url().'home/page/';
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
		
		
		if(isset($this->session->userdata['business_id'])){
			$this->parser->parse('include/dash_navbar',$this->data);
		}
		if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
			$this->parser->parse('include/navbar',$this->data);
		}
		$this->data['social'] =  $this->session->userdata('social_account');
		$this->data['Signup_business'] = (!empty($_GET['Signup_business']))?$_GET['Signup_business']:"";
        $this->parser->parse('include/modal_signup',$this->data);		
		$this->parser->parse('general/home',$this->data);
		$this->parser->parse('include/footer',$this->data);
	}
	
	 public function resend(){
     $userdetails= $this->common_model->getRow("users","email",$_POST['toemail']);
	 if($userdetails){
	  if($userdetails->status=='inactive'){
	         $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		     $this->data['activation_key'] = $userdetails->activationkey;
		     $email = $userdetails->email; 
			 $subject ="Account Activation";	
			 $message=$this->load->view('account_activation',$this->data,TRUE);
			
			$this->common_model->mail($email,$subject,$message);
			$msg="success";
			}else{
			$msg="active";
			}
			}else{
			$msg="fail";
			}
     $this->page($msg);
 }
 
	public function employee(){
	$this->data['userRole']="employeelogin";
	$this->data['signUp']="businessSignUp";
	if(isset($_GET['activation_link'])){
	  //$val= $this->home_model->updateEmpUser();
	  // if($val=="alreadyUser"){
	    // $this->data['alreadyUser']="alreadyUser";
		// }
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
	
	public function businesslogin(){
	if(isset($_GET['activation_link'])){
	  $val= $this->home_model->updateUser();
	  //print_r($val); exit;
	  if($val=="newUser"){
	 // $this->basicinfo_model->insertsubscription($this->session->userdata['id'],'2','free','active');
	  // $this->insert_sub_info($_GET['activation_link']);
	  redirect('basicinfo');
	  }else if($val=="alreadyUser"){
	   $msg='allreadyuser';
	   $this->page($msg);
	  }else if($val=="noUser"){
	     $msg="fail";
	     $this->page($msg);
	  } else if($val=="deactivated"){
	     $msg="deactivated";
	     $this->page($msg);
	  }
	}
	
		
}
	function updateuser(){
         $sql=mysql_query("update users set status='active', statusflag='1' where id=".$this->session->userdata['id']);
		 $this->basicinfo_model->insertsubscription($this->session->userdata['id'],'2');
		 redirect('basicinfo');
	}
	
	function insert_sub_info(){ 
	 $this->data['status']=$this->common_model->getRow("users","id",$this->session->userdata['id']);
	 $this->data['subscription_id']='2';
	 $this->load->view('include/insert_subscription',$this->data);
	}
	
	public function clientlogin(){ 
	if(isset($_POST['referal_url'])){
	 $referal_url=$_POST['referal_url'];
	 $this->data['url']=$referal_url;
	}
	    $this->data['userRole']="clientlogin";
		$this->data['signUp']="clientSignUp";
		if(isset($_GET['failure'])){
		
		 $this->data['failure']="Failure";
		 $this->parser->parse('include/meta_tags',$this->data);
		 $this->parser->parse('general/login',$this->data);
		
		}else{
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		}
	}
	
	public function deactivated(){ 
	  $this->session->sess_destroy();
	  $this->data['userRole']="clientlogin";
	  $this->data['signUp']="clientSignUp";
	  $this->data['inactive']="Inactive";
	  $this->load->view('include/meta_tags',$this->data);
	  $this->load->view('general/login',$this->data);
	}
	
	public function businessSignUp(){
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
	    $this->parser->parse('include/header',$this->data);
		//$this->data['contentList']=$this->home_model->getBusiness();
		
		$where=" user_status='active' and business_status='active'";
	    $config['total_rows'] = $this->common_model->getCount('view_business_details','business_id',$where); 
		if($config['total_rows']){
		    $config['base_url'] = base_url().'home/page/';
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
		
		
		$this->data['msg']=lang('Apps_verificationlink');
		$this->parser->parse('include/modal_signup',$this->data);	
		$this->parser->parse('general/home',$this->data);
		$this->parser->parse('include/footer',$this->data);
	 
}


function hybrid($provider1){ 
    require_once( "src/hybridauth/Hybrid/Auth.php" );
    $config= array(
		"base_url" => "http://127.0.0.1/skedulus/", 

		"providers" => array ( 
			// openid providers
			"OpenID" => array (
				"enabled" => true
			),

			"Yahoo" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ),
			),

			"AOL"  => array ( 
				"enabled" => true 
			),

			"Google" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ), 
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "340660989413355", "secret" => "5781ac703d846e723ba147e973bf7865" ), 
			),

			"Twitter" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "oMPIdXaLUCQWmk4mxaskQ", "secret" => "4ixir8cABz5l6sOtGaQCQdTviY16UZ3w4l4SO6ptE8" ) 
			),

			// windows live
			"Live" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),

			"MySpace" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"LinkedIn" => array ( 
				"enabled" => true,
				"keys"    => array ( "key" => "", "secret" => "" ) 
			),

			"Foursquare" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "", "secret" => "" ) 
			),
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => false,

		"debug_file" => "",
	);
	
	
	$user_data = NULL;

	// try to get the user profile from an authenticated provider
	try{
		$hybridauth = new Hybrid_Auth( $config );

		// selected provider name 
		$provider = @ trim( strip_tags( $provider1 ) );

		// check if the user is currently connected to the selected provider
		if( !  $hybridauth->isConnectedWith( $provider ) ){ 
			// redirect him back to login page
			header( "Location: login.php?error=Your are not connected to $provider or your session has expired" );
		}

		// call back the requested provider adapter instance (no need to use authenticate() as we already did on login page)
		

		// grab the user profile
		$adapter = $hybridauth->getAdapter( $provider );

		// grab the user profile
		$user_data = $adapter->getUserProfile(); 
    }
	catch( Exception $e ){  
		// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to 
		// let hybridauth forget all about the user so we can try to authenticate again.

		// Display the recived error, 
		// to know more please refer to Exceptions handling section on the userguide
		switch( $e->getCode() ){ 
			case 0 : echo "Unspecified error."; break;
			case 1 : echo "Hybriauth configuration error."; break;
			case 2 : echo "Provider not properly configured."; break;
			case 3 : echo "Unknown or disabled provider."; break;
			case 4 : echo "Missing provider application credentials."; break;
			case 5 : echo "Authentication failed. " 
					  . "The user has canceled the authentication or the provider refused the connection."; 
			case 6 : echo "User profile request failed. Most likely the user is not connected "
					  . "to the provider and he should to authenticate again."; 
				   $adapter->logout(); 
				   break;
			case 7 : echo "User not connected to the provider."; 
				   $adapter->logout(); 
				   break;
		} 

		echo "<br /><br /><b>Original error message:</b> " . $e->getMessage();

		echo "<hr /><h3>Trace</h3> <pre>" . $e->getTraceAsString() . "</pre>";  
	}
  // print_r($user_data); exit;
 if(isset($user_data->firstName)){
			   $this->data['first_name']=$user_data->firstName;
			   }else{
			     $this->data['first_name']='';
			   }
			if(isset($user_data->lastName)){
				$this->data['last_name']=$user_data->lastName;
				   }else{
					 $this->data['last_name']='';
				   }
			   
			if(isset($user_data->gender)){
				$this->data['gender']=$user_data->gender;
					   }else{
						 $this->data['gender']='';
					   }
			if(isset($user_data->email)){
				$this->data['email']=$user_data->email;
					   }else{
						 $this->data['email']='';
					   }
		   $this->data['userRole']="clientSignUp";
	       $this->data['signUp']="clientlogin";
		   $this->parser->parse('include/meta_tags',$this->data);
           $this->parser->parse('general/signup',$this->data);
 
}

    function facebook(){
			require 'src/facebook.php';
			// Create our Application instance (replace this with your appId and secret).
			$facebook = new Facebook(array(
			  'appId'  => '340660989413355',
			  'secret' => '5781ac703d846e723ba147e973bf7865',
			));

			// Get User ID
			$user = $facebook->getUser();
			if ($user) {
			  try {
				// Proceed knowing you have a logged in user who's authenticated.
				$user_profile = $facebook->api('/me');
				print_r($user_profile);
			  } catch (FacebookApiException $e) {
				error_log($e);
				$user = null;
			  }
			}

			// Login or logout url will be needed depending on current user state.
			if ($user) {
			  $logoutUrl = $facebook->getLogoutUrl();
			} else {
			  $loginUrl = $facebook->getLoginUrl();
			}	
			//redirect($loginUrl);
			//print_r($user_profile['first_name']);
			if(isset($user_profile['first_name'])){
			   $this->data['first_name']=$user_profile['first_name'];
			   }else{
			     $this->data['first_name']='';
			   }
			if(isset($user_profile['last_name'])){
				$this->data['last_name']=$user_profile['last_name'];
				   }else{
					 $this->data['last_name']='';
				   }
			   
			if(isset($user_profile['gender'])){
				$this->data['gender']=$user_profile['gender'];
					   }else{
						 $this->data['gender']='';
					   }
		   $this->data['userRole']="clientSignUp";
	       $this->data['signUp']="clientlogin";
		   $this->parser->parse('include/meta_tags',$this->data);
           $this->parser->parse('general/signup',$this->data);
}

public function clientSignUp(){
			/*if(isset($user_profile['first_name'])){
			   $this->data['first_name']=$user_profile['first_name'];
			   }else{
			     $this->data['first_name']='';
			}
			if(isset($user_profile['last_name'])){
				$this->data['last_name']=$user_profile['last_name'];
				   }else{
					 $this->data['last_name']='';
				   }
			   
			if(isset($user_profile['gender'])){
				$this->data['gender']=$user_profile['gender'];
					   }else{
						 $this->data['gender']='';
					   }
					   if(isset($user_profile['email'])){
				$this->data['email']=$user_profile['email'];
					   }else{
						 $this->data['email']='';
					   }*/
    $this->data['social'] =  $this->session->userdata('social_account'); 
	//print_r( $this->data['social']);
	$this->data['userRole']="clientSignUp";
	$this->data['signUp']="clientlogin";
	if(isset($_GET['checkino'])){
		 $id=$this->home_model->insertinfo();
		  redirect('cprofile');
	}
   $this->parser->parse('include/meta_tags',$this->data);
   $this->parser->parse('general/signup',$this->data);
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
	
	public function phoneNum(){
	   $us_number = preg_match( '/^((\+)?[1-9]{1,2})?([-\s\.])?((\(\d{1,4}\))|\d{1,4})(([-\s\.])?[0-9]{1,12}){1,2}(\s*(ext|x)\s*\.?:?\s*([0-9]+))?$/', $_POST['phone_number']);

    if ( $us_number ) {
        echo "true";
    }else{
	  echo "false";
	}
   }
	
	public function logout(){
		$this->session->sess_destroy();
		redirect('home');
	}
	
	function auth($provider=false){
		$this->load->view("examples/social_hub/login");
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
				$this->data['userRole']="clientlogin";
		        $this->data['signUp']="clientSignUp";
				$this->data['message']="Password Reset successful. Please login now.";
		        $this->parser->parse('include/meta_tags',$this->data);
		        $this->parser->parse('general/login',$this->data);
				
		}
 
	}
	public function resetpassword(){
		// $this->data['signUp']="clientlogin";
		// if($this->input->get_post('key')){
				
				// $query = $this->db->get_where('users',array('activationkey' => $this->input->get_post('key')));
				
				// if($query->num_rows()>0){
					// $info = $query->result();
				// }else{
					// $info = false;
				// }
				
				// if(!empty($info)){
						
						// if($this->input->post('password')){
							// $this->load->model("cprofile_model");
							
							
							
							// $filter = array('password'=>md5($this->input->post('password')));	
							
							// $this->cprofile_model->updateUserinfoByfilter($filter,$info[0]->id);					 		
							// $this->data['message'] = "Password Reset. Please login now.";
						// } 
						
				// }
				// else{
						// $this->data['message'] = "Wrong authentication.";
						
				// }
				// $this->parser->parse('include/meta_tags',$this->data);
				// $this->load->view("reset_password",$this->data);
				
				
		// }else{
			// echo 'Wrong Authentication';
		// }
		
		$res=$this->common_model->getRow('users','activationkey',$_GET['key']);
		$date =  $res->passwordresetdate;
        $now =  date("Y-m-d H:i:s");
        $diff = abs(strtotime($now) - strtotime($date));
		$expires_in = 8 * 60 * 60; //expires after 8 hours
        if($diff <= $expires_in){
		$this->data['signUp']="clientlogin";
		$this->load->view('include/meta_tags',$this->data);
		$this->load->view("reset_password",$this->data);
		}else{
		$this->data['userRole']="clientlogin";
		$this->data['signUp']="clientSignUp";
		$this->data['message']="The link is expired.";
		$this->parser->parse('include/meta_tags',$this->data);
		$this->parser->parse('general/login',$this->data);
		}
	}
	
	
	function signupAuth(){
		$information=$this->facebook_twitter_Auth();
		#print_r($information);exit;
		$data['user_profile'] = $information;
		$sessionprovider=array(
					'provider'=>$_GET['provider']
				);
				$this->session->set_userdata($sessionprovider);
				
		if(!empty($_GET['provider']) && $_GET['provider']=="Twitter"){
				$filter=array('email'=>$information->email,'profile_id' =>$information->identifier);
			}else{
				$filter=array('username'=>$information->displayName,'profile_id' =>$information->identifier);
			} 
		
		#print_r($data['user_profile']);

		$social_account = array('identifier' => $data['user_profile']->identifier,
							'profileurl' => $data['user_profile']->profileURL,
							'username' => $data['user_profile']->displayName,
							'first_name' => $data['user_profile']->firstName,
							'last_name' => $data['user_profile']->lastName,
							'sex' => $data['user_profile']->gender,
							'email' => $data['user_profile']->email,
							'login_by'	 =>	$_GET['provider'],
							'birthDay'	=>	$data['user_profile']->birthDay,
							'birthMonth'	=>	$data['user_profile']->birthMonth,
							'birthYear'	=>	$data['user_profile']->birthYear
							);
							
		$this->load->model("home_model");	
		$user_data = $this->home_model->check_user_exist_signup($filter,$social_account);					
		
		//$this->load->view('hauth/done',$data);
		$this->session->set_userdata('social_account',$social_account);
		
		/*if(!$this->session->userdata('user_data'))
			redirect('home/clientSignUp');
		else 	
			redirect('profile/add_social_network');*/
		#print_r($_GET['Signup_business']);exit;	
		
		if($user_data){ 
			 if($user_data=='-2'){
			   $this->page('notactivatedyet');
			  }elseif($user_data=='-1'){
			   //$row = $this->home_model->check_login_facebook($filter);
			   $val=$this->common_model->getRow('users','id',$user_data);
				$sessionVal=array(
					'id'=>$val->id,
					'username'=>$val->first_name,	
					'email'=>$val->email,
					'role'=>$val->user_role
				);
				$this->session->set_userdata($sessionVal); 
				redirect('common_functions/businesslogin');
			  }else{ 
				//$row = $this->home_model->check_login_facebook($filter);
				$val=$this->common_model->getRow('users','id',$user_data);
				$sessionVal=array(
					'id'=>$val->id,
					'username'=>$val->first_name,	
					'email'=>$val->email,
					'role'=>$val->user_role
				);
				$this->session->set_userdata($sessionVal); 
				if($val->verify_phone=='active'){
				redirect('basicinfo');
				}else{
				redirect('cprofile/?notify');}
				}
			}else{
		
				if(!empty($_GET['Signup_business']) && $_GET['Signup_business']==1){
					redirect('home/?Signup_business=1');
				}else{
					redirect('home/clientSignUp');
				}
            }				
		
	}	
	
	function facebook_twitter_Auth(){
			session_start();
			$config = 'hybridauth/config.php';
			require_once( "hybridauth/Hybrid/Auth.php" );
			$error = "";
			// if user select a provider to login with
			// then inlcude hybridauth config and main class
			// then try to authenticate te current user
			// finally redirect him to his profile page
			if( isset( $_GET["provider"] ) && $_GET["provider"] ):
				try{
					// create an instance for Hybridauth with the configuration file path as parameter
					$hybridauth = new Hybrid_Auth( $config );
					
					// set selected provider name 
					$provider = @ trim( strip_tags( $_GET["provider"] ) );

					// try to authenticate the selected $provider
					$adapter = $hybridauth->authenticate( $provider );

					// if okey, we will redirect to user profile page 
					#$hybridauth->redirect( "login?provider=$provider" );
					$adapter = $hybridauth->getAdapter( $provider );

					// grab the user profile
					$user_data = $adapter->getUserProfile();
					//print_r($user_data);exit;
					return $user_data;
				}
				catch( Exception $e ){
					// In case we have errors 6 or 7, then we have to use Hybrid_Provider_Adapter::logout() to 
					// let hybridauth forget all about the user so we can try to authenticate again.

					// Display the recived error, 
					// to know more please refer to Exceptions handling section on the userguide
					switch( $e->getCode() ){ 
						case 0 : $error = "Unspecified error."; break;
						case 1 : $error = "Hybriauth configuration error."; break;
						case 2 : $error = "Provider not properly configured."; break;
						case 3 : $error = "Unknown or disabled provider."; break;
						case 4 : $error = "Missing provider application credentials."; break;
						case 5 : $error = "Authentication failed. The user has canceled the authentication or the provider refused the connection."; break;
						case 6 : $error = "User profile request failed. Most likely the user is not connected to the provider and he should to authenticate again."; 
								 $adapter->logout(); 
								 break;
						case 7 : $error = "User not connected to the provider."; 
								 $adapter->logout(); 
								 break;
					} 

					// well, basically your should not display this to the end user, just give him a hint and move on..
					$error .= "<br /><br /><b>Original error message:</b> " . $e->getMessage(); 
					$error .= "<hr /><pre>Trace:<br />" . $e->getTraceAsString() . "</pre>";
				}
				endif;
		}
		
		function loginAuth(){
			$user_profile = $this->facebook_twitter_Auth();
			$sessionprovider=array(
					'provider'=>$_GET['provider']
				);
				$this->session->set_userdata($sessionprovider);
				
			#print_r($user_profile);
			#print_r($user_profile->email);
			
			if(!empty($_GET['provider']) && $_GET['provider']=="Twitter"){
				$filter=array('email'=>$user_profile->email,'profile_id' =>$user_profile->identifier);
			}else{
				$filter=array('username'=>$user_profile->displayName,'profile_id' =>$user_profile->identifier);
			} 
				#print_r($filter);
		   $this->load->model("home_model");
		   $rand=$this->home_model->random_password(5);
			//print_r($filter);
			if(!empty($user_profile)){
			$social_account = array('profile_id' => $user_profile->identifier,
											'email' => (!empty($user_profile->email))?$user_profile->email:"",
											'first_name' => $user_profile->firstName,
											'last_name' => $user_profile->lastName,
											'email'=>$user_profile->email,
											'gender'=>$user_profile->gender,
											'date_of_birth'=>$user_profile->birthYear."-".$user_profile->birthMonth."-".$user_profile->birthDay,
											'profile_image' => $user_profile->photoURL,
											'random_key' => $rand,
											'first_name' => $user_profile->firstName,
											'username'=>(!empty($user_profile->displayName))?$user_profile->displayName:"");
            
			//print_r($social_account); exit;	
			$user_data = $this->home_model->check_user_exist($filter,$social_account);
			//print_r($user_data);exit;
			if($user_data){
			  if($user_data=='-2'){
			   $this->page('notactivatedyet');
			  }elseif($user_data=='-1'){
			  $val=$this->common_model->getRow('users','id',$user_data);
			   //$row = $this->home_model->check_login_facebook($filter);
				$sessionVal=array(
					'id'=>$val->id,
					'username'=>$val->first_name,	
					'email'=>$val->email,
					'role'=>$val->user_role
				);
				$this->session->set_userdata($sessionVal); 
				redirect('common_functions/businesslogin');
			  }else{
				//$row = $this->home_model->check_login_facebook($filter);
				 $val=$this->common_model->getRow('users','id',$user_data);
				$sessionVal=array(
					'id'=>$val->id,
					'username'=>$val->first_name,	
					'email'=>$val->email,
					'role'=>$val->user_role
				);
				$this->session->set_userdata($sessionVal); 
				redirect('cprofile');
				}
			}else{
				
			}
			}else{
			 redirect('home/clientlogin');
			}
		}
	function subscription($subscription_id){
	 $this->data['status']=$this->common_model->getRow("users","id",$this->session->userdata['id']);
	 $this->data['subscription_id']=$subscription_id;
	 $this->load->view('include/insert_subscription',$this->data);
	}	
		
	function notifications()
	{
		$file = realpath($_SERVER['DOCUMENT_ROOT']).'/skedulus/xmloutput.txt';
		$file1 = realpath($_SERVER['DOCUMENT_ROOT']).'/skedulus/outputarray.txt';
		$post_xml = file_get_contents ("php://input"); 
		$xml_msg_in = fopen($file,"a");
		fwrite($xml_msg_in,$post_xml); 
		fclose($xml_msg_in);
	
    $post_xml='<?xml version="1.0" encoding="UTF-8"?>
<updated_subscription_notification>
  <account>
    <account_code>129</account_code>
    <username nil="true"></username>
    <email>swathi.n@eulogik.com</email>
    <first_name>Swathi</first_name>
    <last_name>N</last_name>
    <company_name nil="true"></company_name>
  </account>
  <subscription>
    <plan>
      <plan_code>1</plan_code>
      <name>Basic</name>
    </plan>
    <uuid>260b53ae9dbf7ea6885b4b492585cc53</uuid>
    <state>active</state>
    <quantity type="integer">1</quantity>
    <total_amount_in_cents type="integer">1500</total_amount_in_cents>
    <subscription_add_ons type="array"/>
    <activated_at type="datetime">2014-03-07T12:33:10Z</activated_at>
    <canceled_at type="datetime" nil="true"></canceled_at>
    <expires_at type="datetime" nil="true"></expires_at>
    <current_period_started_at type="datetime">2014-03-07T12:33:10Z</current_period_started_at>
    <current_period_ends_at type="datetime">2014-03-08T12:33:10Z</current_period_ends_at>
    <trial_started_at type="datetime" nil="true"></trial_started_at>
    <trial_ends_at type="datetime" nil="true"></trial_ends_at>
    <collection_method>automatic</collection_method>
  </subscription>
</updated_subscription_notification>';
	
		$xml = new SimpleXMLElement ($post_xml);
        $type = $xml->getName();
         
	
      switch ($type)
      {
        case 'canceled_subscription_notification':
          $this->cancelsubscription();
          break;
        case 'subscription':
          $this->subscription = $child_node;
          break;
        case 'updated_subscription_notification':
          $this->checkforupdate($xml);
          break;
      }
		 
		 
        //$array = simplexml_load_string($post_xml);
		// $xml_msg_in = fopen($file1,"a");
		// fwrite($xml_msg_in,$type); 
		// fclose($xml_msg_in);
		//echo "<pre>";
		//print_r($array);		 
	}
	
	
	function checkforupdate($xml){
	   $json = json_encode($xml);
       $array = json_decode($json,TRUE);
	   
	    $id=$array['account']['account_code'];
	    $plancode=$array['subscription']['plan']['plan_code'];
		$version='paid';
		//print_r($id); print_r($plancode);
		$this->load->model('basicinfo_model');
		$this->basicinfo_model->insertsubscription($id,$plancode,$version);
	    
	}

	
	function updatesubscribe(){
	   $this->load->view('include/subscription',$this->data);
	}

	
	function sendmessage(){
		$to = 'swathi.n@eulogik.com';
		$subject = $_POST['subject'];
		$message = "Dear admin,\r\n\n".$_POST[message]."\n\r\n Regards, \r\n".$_POST[name]."";
		$from = $_POST['email'];
		$headers = "From:" . $from;
		mail($to,$subject,$message,$headers); 
		redirect('content/contact_us/?messg');
	}
	
}

?>
