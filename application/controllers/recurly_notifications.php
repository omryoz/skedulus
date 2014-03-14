<?php
/* Manage Home Controller */
class Recurly_notifications extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->helper('url');
		$this->load->library('email');
		$this->load->model('home_model');
		$this->load->model('common_model');
		$this->load->model('basicinfo_model');
		$this->load->model('admin/admin_model');
		$this->data['bodyclass']='index';
		$this->load->library('form_validation');
		$this->load->library('session');
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
	public function index() {
	   //$this->page();
	}
		
	
		
	function notifications()
	{
		$file = realpath($_SERVER['DOCUMENT_ROOT']).'/skedulus/xmloutput.txt';
		$post_xml = file_get_contents ("php://input"); 
		$xml_msg_in = fopen($file,"a");
		fwrite($xml_msg_in,$post_xml); 
		fclose($xml_msg_in);
		
		$xml = new SimpleXMLElement ($post_xml);
        $type = $xml->getName();
         
	
      switch ($type)
      {
        case 'canceled_subscription_notification':
          $this->updatebusinessstatus($xml);
          break;
        case 'renewed_subscription_notification':
          $this->updatebusinessstatus($xml);
          break;
        case 'new_subscription_notification':
          $this->checkforupdate($xml);
		  $this->updatebusinessstatus($xml);
          break;
		case 'updated_subscription_notification':
		  $this->checkforupdate($xml);
		  break;
		case 'expired_subscription_notification':
		  $this->updatebusinessstatus($xml);
		  $this->checkforupdate($xml);
           break;
      }
		
	}
	
	function updatebusinessstatus($xml){
	$json = json_encode($xml);
    $array = json_decode($json,TRUE);
	
	    $id=$array['account']['account_code'];
	    $state=$array['subscription']['state'];
		$business_details=$this->common_model->getRow('user_business_details','users_id',$id);
		if($state=='canceled' || $state='expired'){
		$status='active';
		}else{
		$status='inactive';
		}
	    $this->admin_model->updateBusinessStatus($status,$business_details->id);
	}
	
	function checkforupdate($xml){
	   $json = json_encode($xml);
       $array = json_decode($json,TRUE);
	   
	    $id=$array['account']['account_code'];
	    $plancode=$array['subscription']['plan']['plan_code'];
		$version='paid';
		$state=$array['subscription']['state'];
	    $this->basicinfo_model->insertsubscription($id,$plancode,$version,$state);
	}

	
}

?>
