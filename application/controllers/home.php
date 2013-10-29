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
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
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
		 if($status){
			 $sessionVal=array('business_id'=>$status->id,'business_type'=> $status->business_type);
			  $this->session->set_userdata($sessionVal);
			 redirect('overview'); 
			 }else{
			 redirect('basicinfo');
			 }
		 }
		//}
		// else{
		// $this->parser->parse('include/meta_tags',$this->data);
		// $this->parser->parse('general/login',$this->data);
		// }
	//}
	
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
	
	
	public function businessSignUp(){
	    $Category=$this->common_model->getDDArray('category','id','name');
		$Category[""]=" Select Category";
		$this->data['getCategory']=$Category;
	    $this->parser->parse('include/header',$this->data);
		$this->data['contentList']=$this->home_model->getBusiness();
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
   //print_r($user_data); exit;
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
			 if(isset($user_profile['email'])){
				$this->data['email']=$user_profile['email'];
					   }else{
						 $this->data['email']='';
					   }
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
	
	
}

?>
