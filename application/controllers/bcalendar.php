<?php
/* Manage Business registration Controller */
class Bcalendar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('calendar_model');
		$this->load->model('common_model');
		$this->load->model('business_profile_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		$this->data['base_url'] = base_url();
    }
	
	public function index(){
		 $this->parser->parse('include/header',$this->data);
		 if(isset($this->session->userdata['business_id'])){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		  @session_start();
		  $this->data['role'] = $this->session->userdata['role'];	
		  
		}
		else if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
		  $this->parser->parse('include/navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		  @session_start();
		  //print_r($_SESSION);	
		  // $filter=array('id'=>$this->session->userdata['id']);
		  $filter=array('id'=>$_SESSION['profileid']);
		  //print_r($filter);
		  $this->data['buisness_details'] = $this->business_profile_model->getProfileDetailsByfilter($filter);
		  @session_start();
		  $this->data['role'] = $this->session->userdata['role'];	
		}else{
		  redirect('home/clientlogin');
		}
		 $this->parser->parse('calendar',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function mycalender(){
		 //print_r($this->session->userdata);
		 $this->parser->parse('include/header',$this->data);
		 if(isset($this->session->userdata['business_id'])){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		}else if(!isset($this->session->userdata['business_id']) && isset($this->session->userdata['id'])){
		  $this->parser->parse('include/navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		}else{
		  redirect('home/clientlogin');
		}
		 $this->parser->parse('mycalendar',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function single_business($id=false){
		 	
		 
		 $this->parser->parse('calendar',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function getendtime(){
		//print_r($this->input->post());
		$time = "";
		$conversion = "";
		foreach(explode(",",rtrim($this->input->post('checked'),",")) as $id){
			$info = array("id"=>$id);	
			$times = $this->common_model->getserviceTime($info);
			//print_r();
			
			if($times[0]->time_type=="minutes"){
				$conversion = 1;
					
			}else if($times[0]->time_type=="hours"){
				$conversion = 60;
			}
			$total = $times[0]->timelength * $conversion + $times[0]->padding_time;
			$time = $time + $total;
			
		}
		$t_time = $this->convertToHoursMins($time,'%d:%d');
		$t_time = $t_time.':0';
		$start_time = $this->input->post('starttime');
		$t = $start_time.':0';
		
		$time = explode(":",$this->addTime($t_time,$t));
		$return = $time[0].':'.$time[1];
		echo $return;
	}
	
	function convertToHoursMins($time, $format = '%d:%d') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
	
    $hours = floor($time/60);
    $minutes = $time%60;
    return sprintf($format, $hours, $minutes);
	}
	
function addTime($a, $b)
{
   $sec=$min=$hr=0;
   $a = explode(':',$a);
   $b = explode(':',$b);

   if(($a[2]+$b[2])>= 60)
   {
     $sec=($a[2]+$b[2]) % 60;
     $min+=1;

   }
   else
   $sec=($a[2]+$b[2]);
   

   if(($a[1]+$b[1]+$min)>= 60)
   {
      $min=($a[1]+$b[1]+$min) % 60;
     $hr+=1;
   }
   else
    $min=$a[1]+$b[1]+$min;
    $hr=$a[0]+$b[0]+$hr;

   $added_time=$hr.":".$min.":".$sec;
   return $added_time;
}


/*Get Business Services*/

function getserviceBybusinessfilter(){
	if($this->input->post('business_id')){
		$filter = array('business_id'=>$this->input->post('business_id'));
		$resuls = $this->common_model->getserviceByfilter($filter);	
		print_r(json_encode($resuls));
		
	}else{
		return false;
	}
}

function getstaffnameByfilter(){
	if($this->input->post('service_id')){
		$filter = array('service_id'=>$this->input->post('service_id'));
		$resuls = $this->common_model->getserviceByfilter($filter);	
		print_r(json_encode($resuls));
		
	}else{
		return false;
	}
}

function getfreeslotsbydate(){
	if($this->input->post('date')){
		if($this->checkday($this->input->post('date'),$this->input->post('business_id'))){
			 //echo "We work on selected day";
			 $day = $this->checkweekendDayName($this->input->post('date'));
			 $filter = array("user_business_details_id"=>$this->input->post('business_id'),"name"=>$day); 
			 $this->data['slots'] = $this->common_model->getAllslots($filter);
			 $this->data['booked_slots'] = $this->common_model->getBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))));
			 //print_r($this->data['booked_slots']);
			 //exit;	
			 //print_r($this->data['slots']);
			 $this->load->view("options",$this->data);
			 
		}else{
			echo 0;
		}
	}else{
		return false;
	}
	
}

function checkday($date=false,$business_id=false){
	if($date){
		$date = $this->checkweekendDayName($date);
		$filter = array("user_business_details_id"=>$business_id,"name"=>$date);
		if($this->common_model->getworkingday($filter)){
			return true;	
		}else{
			return false;
		}
	}else{
		return false;
	}
}

function checkweekendDayName($date=false){
		$date1 = strtotime($date);
		$date2 = date("l", $date1);
		$date3 = strtolower($date2);
		return $date3;
}

function createappointment(){
	if($this->input->post('submit')){
		$start_time = date("Y-m-d",strtotime($this->input->post('date'))).' '.$this->input->post('time');	
		$endtime =   date("Y-m-d",strtotime($this->input->post('date'))).' '.$this->input->post('end_time');	
		$input = array("users_id"=>$this->input->post('user_id'),"start_time"=>$start_time,"end_time"=>$endtime,"services_id"=>$this->input->post('services'),"employee_id"=>$this->input->post('staff'),"note"=>$this->input->post('note'),"status"=>"booked");
		//print_r(date("Y-m-d",strtotime($this->input->post('date'))));exit;
		if($this->common_model->createAppointment($input)){
			redirect("bcalendar/mycalender");
		}else{
			redirect("");
		}
	}
}

/*Get End Time by Selected Services*/

	function getendtimeByservie(){
		//print_r($this->input->post());
		$time = "";
		$conversion = "";
		//foreach(explode(",",rtrim($this->input->post('checked'),",")) as $id){
			$info = array("id"=>$this->input->post('service_id'));	
			$times = $this->common_model->getserviceTime($info);
			//print_r();
			
			if($times[0]->time_type=="minutes"){
				$conversion = 1;
					
			}else if($times[0]->time_type=="hours"){
				$conversion = 60;
			}
			$total = $times[0]->timelength * $conversion + $times[0]->padding_time;
			$time = $time + $total;
			
		//}
		$t_time = $this->convertToHoursMins($time,'%d:%d');
		$t_time = $t_time.':0';
		$start_time = $this->input->post('starttime');
		$t = $start_time.':0';
		
		$time = explode(":",$this->addTime($t_time,$t));
		$return = $time[0].':'.$time[1];
		echo $return;
	}

	
	
	
	
}

?>
