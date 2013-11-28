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
		     $this->data['msg']="successfull";
		  }else if($msg=='fail'){
             $this->data['msg']="Email does not exist. Try again";		  
		  } else if($msg=='active'){
             $this->data['msg']="Your account is active. Kindly login to continue";		  
		  } else if($msg=='allreadyuser'){
             $this->data['msg']="Your account is already active. Kindly login to continue";		  
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
	
	public function businesslogin(){
	if(isset($_GET['activation_link'])){
	  $val= $this->home_model->updateUser();
	  //print_r($val); exit;
	  if($val=="newUser"){
	  redirect('basicinfo');
	  }else if($val=="alreadyUser"){
	   $msg='allreadyuser';
	   $this->page($msg);
	    //$this->data['alreadyUser']="alreadyUser";
		 // $status=$this->common_model->getRow("user_business_details","users_id",$this->session->userdata['id']);
		 // if($status){
		      // if($status->status=='active'){
			  // $sub=$this->common_model->getRow("user_business_subscription","users_id",$this->session->userdata['id']);
			 // $sessionVal=array('business_id'=>$status->id,'business_type'=> $status->business_type,'type'=>'dual','subscription'=>$sub->subscription_id);
			  // $this->session->set_userdata($sessionVal);
			
			   // if($this->session->userdata['business_type']=="service"){
						// $id=$this->session->userdata['business_id'];
						// $link = 'cal/'.$id;		
					// }else{
					     // $id=$this->session->userdata['business_id'];
						 // $link = 'calendar_business/'.$id;	
					// }
					// redirect('bcalendar/'.$link);
					// }else{
					// $this->deactivated();
					// }
			 // }else{
			 // redirect('basicinfo');
			 // }
	  }else if($val=="noUser"){
	     $msg="fail";
	     $this->page($msg);
	  }
	}
	
		
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
		
		
		$this->data['success']="successfull";
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
		$this->data['signUp']="clientlogin";
		$this->load->view('include/meta_tags',$this->data);
		$this->load->view("reset_password",$this->data);
	}
	
	
	function signupAuth(){
		$information=$this->facebook_twitter_Auth();
		#print_r($information);exit;
		$data['user_profile'] = $information;
					
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
		//$this->load->view('hauth/done',$data);
		$this->session->set_userdata('social_account',$social_account);
		
		/*if(!$this->session->userdata('user_data'))
			redirect('home/clientSignUp');
		else 	
			redirect('profile/add_social_network');*/
		#print_r($_GET['Signup_business']);exit;	
		if(!empty($_GET['Signup_business']) && $_GET['Signup_business']==1){
			redirect('home/?Signup_business=1');
		}else{
			redirect('home/clientSignUp');
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
					#print_r($user_data);
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
			#print_r($user_profile);
			#print_r($user_profile->email);
			if(!empty($_GET['provider']) && $_GET['provider']=="Twitter"){
				$filter=array('email'=>$user_profile->email,'profile_id' =>$user_profile->identifier);
			}else{
				$filter=array('username'=>$user_profile->displayName,'profile_id' =>$user_profile->identifier);
			} 
				#print_r($filter);
			
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
											'user_role' => 'client',
											'username'=>(!empty($user_profile->displayName))?$user_profile->displayName:"");
            #print_r($social_account);exit;
			$this->load->model("home_model");	
			$user_data = $this->home_model->check_user_exist($filter,$social_account);
			#print_r($user_data);
			if($user_data){
				$row = $this->home_model->check_login_facebook($filter);
				$sessionVal=array(
					'id'=>$row[0]->id,
					'username'=>$row[0]->first_name,	
					'email'=>$row[0]->email,
					'role'=>$row[0]->user_role
				);
				$this->session->set_userdata($sessionVal); 
				redirect('cprofile');
			}else{
				
			}
			}else{
			 redirect('home/clientlogin');
			}
		}
		
		
	
	
	
}

?>
