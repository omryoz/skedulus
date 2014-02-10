 <?php
 error_reporting(0);
/* Manage Business registration Controller */
class Bcalendar extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('calendar_model');
		$this->load->model('common_model');
		$this->load->model("bprofile_model");
		$this->load->model('business_profile_model');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
		$this->data['base_url'] = base_url();
		CI_Controller::get_instance()->load->helper('language');
		$this->load->library('utilities');
	    $this->utilities->language();
    }
	
		
	
	function cal($id=false){ 
	if($id){
	$filter1="user_business_details_id = '".$id."' and type='service'";
	$filter=array('id'=>$id);
	$buisness_details = $this->business_profile_model->getProfileDetailsByfilter($filter);
	$buisness_availability = $this->business_profile_model->user_business_availability($id,'business');
	$this->data['appointments'] = $this->business_profile_model->getappointments($buisness_availability['start_time'],$buisness_availability['end_time'],$buisness_details[0]->calendar_type,$filter1,'','','','','',$id);
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	$this->data['role']="";
		 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  }else if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
		  $this->parser->parse('include/navbar',$this->data);
		  }
		  if(isset($this->session->userdata['id'])){
		  $this->data['user_id'] = $users_id;
		  @session_start();
		  $this->data['role'] = $this->session->userdata['role'];	
		  }
		  
		  $filter=array('id'=>$id);
		  $this->data['buisness_details'] = $buisness_details;
		  $this->data['buisness_availability'] = $buisness_availability;
		  
		  
		}
		if(!empty($id)){
		 $bid=$id;
		}else{
		 $bid=$this->session->userdata['business_id'];
		}
		 $this->data['staffs']=$this->common_model->getAllRows('view_business_employees','user_business_details_id',$bid);
		 
		 if(isset($this->session->userdata['business_id'])){
		 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
		 if($status->status=='active'){
		  	
		 $this->parser->parse('include/modal_popup',$this->data);
		 $this->parser->parse('include/modal_busytime',$this->data);
		 $this->parser->parse('calendar',$this->data);
		 }else{
		  $this->parser->parse('deactivated',$this->data);
		 }
		 }else{
		 $this->parser->parse('include/modal_verifyphone',$this->data);	
		 $this->parser->parse('include/modal_popup',$this->data);
		 $this->parser->parse('calendar',$this->data);
		 }
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function getappointmentsAgenda(){
	if($this->input->post('business_id')!=''){
	 $id=$this->input->post('business_id');
	}else{
	  $id=$this->session->userdata['business_id'];
    }
	  if($this->input->post('staffsid')!=''){
	  $filter1="employee_id = '".$this->input->post('staffsid')."'";
	  $staff='staff';
	  }else{
		$filter1="user_business_details_id = '".$id."' and type='service'";
		$staff='';
	  }
	  
	  if($this->input->post('userid')!=''){
		$appointments = $this->business_profile_model->getmyappointments($this->input->post('userid'),'agenda',$this->input->post('statusType'),$this->input->post('startsfrom'),$this->input->post('stopsat'));
	  }else{
	    $filter=array('id'=>$id);
		$buisness_details = $this->business_profile_model->getProfileDetailsByfilter($filter);
		$buisness_availability = $this->business_profile_model->user_business_availability($id,'business');
		  $appointments = $this->business_profile_model->getappointments($buisness_availability['start_time'],$buisness_availability['end_time'],$buisness_details[0]->calendar_type,$filter1,'agenda',$this->input->post('statusType'),$this->input->post('startsfrom'),$this->input->post('stopsat'),$staff,$id);
	  }
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
	   $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
	   $this->data['flag']='';
	   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['phonenumber']=$val->phone_number;
	   $this->data['flag']='1';
	   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){
	   $this->data['flag']='0';
	   }
		 $this->parser->parse('include/header',$this->data);
		 if($this->session->userdata['role']=='manager'){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		}else if($this->session->userdata['role']=='client'){
		  $this->parser->parse('include/navbar',$this->data);
		  $this->data['user_id'] = $this->session->userdata['id'];
		}else{
		  redirect('home/clientlogin');
		}
		//$this->data['user_id'] = $id;
		$this->data['appointments'] = $this->business_profile_model->getmyappointments($this->session->userdata('id'));
	    $this->parser->parse('include/modal_popup',$this->data);
		$this->parser->parse('include/modal_bookclass',$this->data);
		$status=$this->common_model->getRow("users","id",$this->session->userdata['id']);
		 if($status->status=='active'){
		 $this->parser->parse('include/modal_verifyphone',$this->data);	
		 $this->parser->parse('mycalendar',$this->data);
		 }else{
		 redirect('home/deactivated');
		 }
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function single_business($id=false){
		 	
		 
		 $this->parser->parse('calendar',$this->data);
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function checkfordelete(){
	//print_r(date('d-m-Y',strtotime($this->input->post('date'))));
	 // print_r($_POST); exit;
	  if($this->checkdateTime(date('d-m-Y',strtotime($this->input->post('date'))),$this->input->post('business_id'),$this->input->post('starttime'),$this->input->post('action'))){
	  //print_r("yes");
	  echo 1;
	  }else{ 
	 // print_r("no");
	  echo 0;
	  }
	  
	}
	
	function checkreschedule(){
	$starttime=date('H:i',strtotime($this->input->post('starttime')));
	  if($this->checkdateTime(date('d-m-Y',strtotime($this->input->post('date'))),$this->input->post('business_id'),$starttime,$this->input->post('action'))){
	  echo 1;
	  }else{ 
	  echo 0;
	  }
	  
	}
	
		
	function checkdateTime($date=false,$business_id=false,$startTime=false,$action=false){  
	  if(strtotime($date)<=strtotime(date("d-m-Y"))){
		 $currentTime= date('H:i'); 
		 $value=$this->common_model->getRow('business_notification_settings','user_business_details_id',$business_id);
		if($action=='schedule'){
		  $bookbefore=$value->book_before.':00'; 
		}else{
		  $bookbefore=$value->cancel_reschedule_before.':00';
		} 
		$diff1=strtotime($startTime)-strtotime($currentTime); 
		$diff=date ('H:i',$diff1);
		//print_r(($startTime)); print_r($diff); print_r(($currentTime)); print_r($bookbefore);exit;
		//if((strtotime($startTime) < strtotime($currentTime) || strtotime($date) < strtotime(date("d-m-Y"))) || ((strtotime($startTime) >= strtotime($currentTime)) && ($diff <= date ('H:i',strtotime($bookbefore)))) ){
		if(( (strtotime($startTime) < strtotime($currentTime)) || ((strtotime($startTime) >= strtotime($currentTime)) && ($diff <= date ('H:i',strtotime($bookbefore)))) ) ){
		   return false;
			//echo "less time";
 		}else{	
		    return true;
	    }
	   }else{
	       return true;
	   }
    }
	
	function getendtime(){ 
	if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
    	if($this->checkduplicate($this->input->post('date'),$this->input->post('business_id'),$this->input->post('starttime'))){
		$status='1';
		}else{
		$status='0';
		} 
	 }else{
	  $status='1';
	 }
	if($status=='1'){
	if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'))){
	if(strtotime($this->input->post('date')." ".$this->input->post('starttime'))<strtotime(date("d-m-Y H:i"))){ 
		  echo -4;
	}
	if($this->checkdateTime(date("d-m-Y",strtotime($this->input->post('date'))),$this->input->post('business_id'),$this->input->post('starttime'),$this->input->post('action'))){ 
		//print_r($this->input->post());
		$time = "";
		$timeActual = "";
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
			if($times[0]->padding_time_type=="Before & After"){
			  $twice=2;
			}else{
			  $twice=1;
			}
			$total = $times[0]->timelength * $conversion + $times[0]->padding_time * $twice;
			$totalActualtime = $times[0]->timelength * $conversion;
			//$total = $times[0]->timelength * $conversion + $times[0]->padding_time;
			$time = $time + $total;
			$timeActual = $timeActual + $totalActualtime;
			
		}
		$t_time = $this->convertToHoursMins($time,'%d:%d');
		$t_timeActual = $this->convertToHoursMins($timeActual,'%d:%d');
		$t_time = $t_time.':0';
		$t_timeActual = $t_timeActual.':0';
		$start_time = $this->input->post('starttime');
		$t = $start_time.':0';
		
		$time = explode(":",$this->addTime($t_time,$t));
		$timeActual = explode(":",$this->addTime($t_timeActual,$t));
		$return = $time[0].':'.$time[1];
		$returnActual = $timeActual[0].':'.$timeActual[1];
		//if($this->input->post('date'))
		// if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'))){
		if($this->checkFutureDay($this->input->post('date'),$this->input->post('business_id'))){
		$this->checkAvailable(date("d-m-Y",strtotime($this->input->post('date'))),$this->input->post('business_id'),$this->input->post('staffid'),$this->input->post('starttime'),$return,$returnActual,$this->input->post('eventId'));
		}else{
		 echo -2;
		}
		// }else{
			// echo 1;
		// }
	}else{
	    echo -5;
	}
	}else{
			echo 1;
		}
	}else{
			echo -3;
		}
		
		//echo $return;
		
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
	    if($this->input->post('staffid')){
		$filter = array('users_id'=>$this->input->post('staffid'),'business_id'=>$this->input->post('business_id'));
		$table='view_employee_services';
		}else{
		$filter = array('user_business_details_id'=>$this->input->post('business_id'));
		$table='user_business_services';
		}
		$resuls = $this->common_model->getservices($filter,$table);	
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
	}else  if($this->input->post('business_id')){
		
		$resuls = $this->common_model->getAllRows('view_business_employees','user_business_details_id',$this->input->post('business_id'));	
		
		$day = $this->checkweekendDayName($this->input->post('date'));
		$starttime=date('H:i', strtotime($this->input->post('starttime'))).':00';
	foreach($resuls as $res){ 
	 if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$res->users_id)){
	 $where1=' AND users_id="'.$res->users_id.'" and name="'.$day.'" and type="employee"';
	 $getEndtime=$this->common_model->getRow('view_service_availablity','name',$day,$where1); 
	 if($starttime!='' && strtotime($starttime)>=strtotime($getEndtime->start_time)){
	    $results1[]=$res;
	 }else{
	   //$results1[]='';
	 }
	 }
	 }
		print_r(json_encode($results1));
	}else{
		return false;
	}
}

// function getstaffnamesByfilter(){
	// if($this->input->post('service_id')){
	// $string = rtrim($this->input->post('service_id'), ',');
   // $filter = 'service_id  IN ('.$string.') and users_id!=0'; 
	// $this->load->model("bprofile_model");
	// $results = $this->bprofile_model->getserviceByfilter($filter);	
	// $day = $this->checkweekendDayName($this->input->post('date'));
	
	// $starttime=date('H:i', strtotime($this->input->post('starttime'))).':00';
	// foreach($results as $res){ 
	 // if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$res->users_id)){
	 // $where1=' AND users_id="'.$res->users_id.'" and name="'.$day.'" and type="employee"';
	 // $getEndtime=$this->common_model->getRow('view_service_availablity','name',$day,$where1); 
	 // if($starttime!='' && strtotime($starttime)>=strtotime($getEndtime->start_time)){
	    // $results1[]=$res;
	 // }else{
	   // $results1[]=$res;
	 // }
	     
	 // } 
	// }
	// print_r(json_encode($results1));
	// }else{
		// return false;
	// }
// }


function getstaffnamesByfilter(){
	if($this->input->post('service_id')){
	$results = $this->bprofile_model->getserviceByfilter1($this->input->post('service_id'));	
	$vals='[';
	$day = $this->checkweekendDayName($this->input->post('date'));
	$starttime='';
	if($this->input->post('starttime')!=''){
	$starttime=date('H:i', strtotime($this->input->post('starttime'))).':00';
	}
	foreach($results as $res){ 
		 if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$res)){
		 $where1=' AND users_id="'.$res.'" and name="'.$day.'" and type="employee"';
		 $getEndtime=$this->common_model->getRow('view_service_availablity','name',$day,$where1); 
		 $res1=$this->common_model->getRow('view_employee_services','users_id',$res);
		 if($starttime!='' && strtotime($starttime)>=strtotime($getEndtime->start_time) && strtotime($starttime)<=strtotime($getEndtime->end_time)){
			//$results1[]=$res;
			$vals.='{"users_id":"'.$res1->users_id.'","first_name":"'.$res1->first_name.'","last_name":"'.$res1->last_name.'"},';
		 }elseif($starttime==''){
		   //$results1[]=$res;
		   $vals.='{"users_id":"'.$res1->users_id.'","first_name":"'.$res1->first_name.'","last_name":"'.$res1->last_name.'"},';
		 }
			 
		 } 
	 
	}
	$vals.=']';
	print_r($vals);
	}else{
		return false;
	}
}

function getfreeslots(){
   $where=1;
	if($this->input->post('date')){
		if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staff_id'))){
			 $day = $this->checkweekendDayName($this->input->post('date'));
			 if($this->input->post('staff_id')!=''){
			 $filter = array("users_id"=>$this->input->post('staff_id'),"name"=>$day,"type"=>'employee'); 
			 $where.=" AND employee_id=".$this->input->post('staff_id');
			 }else{
			 $filter = array("user_business_details_id"=>$this->input->post('business_id'),"name"=>$day,"type"=>'business'); 
			 $where.=" AND user_business_details_id=".$this->input->post('business_id');
			 }
			 $this->data['slots'] = $this->common_model->getAllslots($filter);
			 //$where=1;
			 if($this->input->post('timeslot')!=''){
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			 }else{
			  $this->data['selectedTimeSlot']='';
			 }
			 if($this->input->post('eventId')!=''){ 
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			  $where.=' AND id!='.$this->input->post('eventId');
			 }
			 
			 $this->data['booked_slots'] = $this->common_model->getBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))),$where);
			 $this->data['businessid']=$this->input->post('business_id');
			 $this->data['appdate']= $this->input->post('date');
			 $this->data['eventId']= $this->input->post('eventId');
			 $this->data['type']= 'service';
			 $this->load->view("options",$this->data);
			
		}else{
			echo 0;
		}
	}else{
		return false;
	}
	
}

function getfreeslotsbydate(){
   $where=1;
	if($this->input->post('date')){
		if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staff_id'))){
		
		if($this->checkFutureDay($this->input->post('date'),$this->input->post('business_id'))){
		  //echo 1;

			 //echo "We work on selected day";
			 $day = $this->checkweekendDayName($this->input->post('date'));
			 if($this->input->post('staff_id')!=''){
			 $filter = array("users_id"=>$this->input->post('staff_id'),"name"=>$day,"type"=>'employee'); 
			 $where.=" AND employee_id=".$this->input->post('staff_id');
			 }else{
			 $filter = array("user_business_details_id"=>$this->input->post('business_id'),"name"=>$day,"type"=>'business'); 
			 $where.=" AND user_business_details_id=".$this->input->post('business_id');
			 }
			 $this->data['slots'] = $this->common_model->getAllslots($filter);
			 //$where=1;
			 if($this->input->post('timeslot')!=''){
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			 }else{
			  $this->data['selectedTimeSlot']='';
			 }
			 
			 if($this->input->post('eventId')!=''){ 
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			  $where.=' AND id!='.$this->input->post('eventId');
			 }
			 //else{
			// $where='1';
			
			 //}
			// print_r($this->data['selectedTimeSlot']); exit;
			 $this->data['booked_slots'] = $this->common_model->getBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))),$where);
			 //print_r($this->data['booked_slots']);
			 //exit;	
			 //print_r($this->data['slots']);
     	     $this->data['businessid']=$this->input->post('business_id');
			 $this->data['appdate']= $this->input->post('date'); 
			 $this->data['eventId']= $this->input->post('eventId');
			 $this->data['type']= 'service';
			 $this->load->view("options",$this->data);
			}else{ 
		     echo -2;
			} 
		}else{
			echo 0;
		}
	}else{
		return false;
	}
	
}

function chckStatus(){
  $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
  if($val->verify_phone=='inactive'){
  echo '0';
  }else{
  echo '1';
  }
}


function getbsettings(){
		 $value=$this->common_model->getRow('business_notification_settings','user_business_details_id',$this->input->post('businessid'));
		if($this->input->post('action')=='schedule'){
		  $bookbefore=$value->book_before; 
		}else{
		  $bookbefore=$value->cancel_reschedule_before;
		} 
		echo $bookbefore;
	}
		
		
function checkfordate(){ 
if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'))){
		if(strtotime($this->input->post('date'))<strtotime(date("d-m-Y"))){ 
		  echo 0;
		}else if(strtotime($this->input->post('date')." ".$this->input->post('timeslot'))<strtotime(date("d-m-Y H:i"))){ 
		  echo -4;
		}else{
		if($this->checkdateTime($this->input->post('date'),$this->input->post('business_id'),$this->input->post('timeslot'),'schedule')){
		if($this->checkFutureDay($this->input->post('date'),$this->input->post('business_id'))){
		  if(isset($this->session->userdata['id'])){
		  if($this->session->userdata['role']=='client'){
			   $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
			   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
			   echo '6';
			   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){	
			   echo '7';
			   }else if($this->checkduplicate($this->input->post('date'),$this->input->post('business_id'),$this->input->post('timeslot'))){
			   echo 1;
			   }else{
			   echo 2;
			   }
		  }else{
		   echo 1;
		  }
		  }else{
		   echo -3;
		  }
		  }else{
		  echo -2;
		  }
		}else{
		   echo -5;
		  }
		  }
	}else{
	   echo -1;
	}	
		
}


function checkduplicate($date,$business_id,$timeslot){
 $results = $this->bprofile_model->checkduplicate($date,$business_id,$timeslot);
 if($results==1){
 return false;
 }else{
 return true;
 }
}

function checkFutureDay($date,$business_id){
$value=$this->common_model->getRow('business_notification_settings','user_business_details_id',$business_id);
		//print_r($value->book_upto);
		if($value->book_upto==0){
		return true;
		}else{
			$time = strtotime(date("d-m-Y"));
			$final = date("Y-m-d", strtotime('+'.$value->book_upto.' month', $time)); 
			if(date('Y-m-d',strtotime($date))<date('Y-m-d',strtotime($final))){ 
			 return true;
			}else{
			 return false;
			}
		}
}


function checkday($date=false,$business_id=false,$staffid=false){
    
	if($date){
	   if($this->checkholidaydates($date,$business_id)){
		$date = $this->checkweekendDayName($date);
		if($staffid!=''){
		$filter = array("users_id"=>$staffid,"name"=>$date,"type"=>'employee');
		}else{
		$filter = array("user_business_details_id"=>$business_id,"name"=>$date,"type"=>'business');
		} 
		if($this->common_model->getworkingday($filter)){
			return true;	
		}else{
			return false;
		}
		}else{
	     return false;
	   }
	}else{
		return false;
	}
	
}

function checkholidaydates($date=false,$business_id=false){
      $val=$this->common_model->getRow("user_business_details",'id',$business_id);
	  $holidayslist=$this->bprofile_model->getholidaylist($val->calendar_type);
	  if(in_array((date("Y-m-d",strtotime($date))),$holidayslist)){
	  return false;
	  }else{
	  return true;
	  }
}

function checkweekendDayName($date=false){
		$date1 = strtotime($date);
		$date2 = date("l", $date1);
		$date3 = strtolower($date2);
		return $date3;
}

function bussytime(){ //print_r($_POST); exit;
 if($this->input->post('submit')){
 if($this->input->post('seriesid')){
 $this->bprofile_model->editbusytime();
 }else{
    $this->bprofile_model->insertbusytime();
 }
 // $staffid=$this->common_model->getstaffid($this->session->userdata['business_id'],$this->session->userdata['id']);
  redirect("/bcalendar/staffSchedule/".$this->input->post('staff')."/Services");
    // redirect("/bcalendar/cal/".$this->session->userdata['business_id']);
 }
}

function checkbusyfordate(){ 
if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'))){
		if(strtotime($this->input->post('date'))<strtotime(date("d-m-Y"))){ 
		  echo 0;
		}else{
	      echo 1;
		}
	}else{
	   echo -1;
	}	
		
}

function checkbusytime(){
  $val=$this->common_model->getRow('client_service_appointments','id',$this->input->post('evid'));
   if($val->status=='busytime'){
     $res=$this->common_model->getAllRows("client_service_appointments","seriesid",$val->seriesid); 
	 if(count($res)==1){
	   echo 1;
	 }else{ 
	     if($val->modifiedStatus=='0'){
		  echo 0;
		 }else{
		  echo 1;
		 }
	 
	 } 
   
   }else{
    echo -1;
   }
}

function getbusytimedetails(){
   $detail.="[";
   $val=$this->bprofile_model->getbusydetails('client_service_appointments','id',$this->input->post('evid'));
	  $detail.=json_encode($val);
	  $detail.="]";
	  print_r($detail);
	
}

function deletebusytime(){
	if($this->input->post('type')=='id'){
	  $where=" id=".$_POST['id'];
	 // $id='id';
	}else{
	  //$id='seriesid';
	  $where=" Date(start_time) between '".date('Y-m-d',strtotime($this->input->post('startdate')))."' and  '".date('Y-m-d',strtotime($this->input->post('enddate')))."' and  seriesid='".$_POST['id']."'";
	}
	mysql_query("delete from client_service_appointments where $where ");
}

function createappointment(){ 
	if($this->input->post('submit') && $this->input->post('user_id')!=""){
		$start_time = date("Y-m-d",strtotime($this->input->post('date'))).' '.$this->input->post('time');	
		$endtime =   date("Y-m-d",strtotime($this->input->post('date'))).' '.$this->input->post('end_time');
        $end_time=$this->input->post('end_time');		
		$date=date("Y-m-d h:m:s");
		if($this->input->post('eventId')){
		$id=$this->input->post('eventId');
		}else{
		$id=0;
		}
		if($this->session->userdata['role']=='client'){
		 $booked_by='client';
		}else{
		 $booked_by='manager';
		}
					$serviceid=explode(',',$this->input->post('services'));
		            foreach($serviceid as $val){
						if($val!=''){
							$query1 = $this->db->query("select * from user_business_services where id='".$val."'"); 
                            $res= $query1->result();							
						if($res[0]->padding_time_type=="Before & After"){
						  $twice=2;
						}else{
						  $twice=1;
						}	
						$total = $total + $res[0]->padding_time * $twice;
                        //$Sname.=$res[0]->name.',';						
						}   
					  }
					  $time = $this->convertToHoursMins($total,'%d:%d');						
					  $end_time1 = $this->addTime($end_time,$time); 
					  $paddingendtime= date('Y-m-d',strtotime($this->input->post('date')))." ".$end_time1;
		
		
		$input = array("users_id"=>$this->input->post('user_id'),"booked_by"=>$booked_by,"start_time"=>$start_time,"end_time"=>$endtime,"paddingendtime"=>$paddingendtime,"services_id"=>$this->input->post('services'),"employee_id"=>$this->input->post('staff'),"note"=>$this->input->post('note'),"status"=>"booked","appointment_date"=>$date,"type"=>'service',"user_business_details_id"=>$this->input->post('businessid'),"id"=>$id);
		$where=" and users_id=".$this->input->post('user_id');
		$fav =array("users_id"=>$this->input->post('user_id'),"user_business_details_id"=>$this->input->post('businessid'));
		$checkClient=$this->common_model->getRow("business_clients_list","user_business_details_id",$this->input->post('businessid'),$where);
		$checkfav=$this->common_model->getRow("favourite_businesses","user_business_details_id",$this->input->post('businessid'),$where);
		if(empty($checkClient)){
		$this->business_profile_model->insertClient($fav);
		}
		if(empty($checkfav)){
		$this->business_profile_model->insertFav($fav);
		}
		if($id!=0){
		$val=$this->common_model->updateAppointment($input,$this->input->post('eventId'));
		}else{
		$val=$this->common_model->createAppointment($input);
		}
		if($val){
		   if($this->session->userdata['role']=='manager'){
		    $staffid=$this->common_model->getstaffid($this->input->post('businessid'),$this->input->post('user_id'));
		    //redirect("/bcalendar/cal/".$this->input->post('businessid')."/?success");
			 redirect("/bcalendar/staffSchedule/".$staffid."/Services?success");
		   }else{
			redirect("bcalendar/mycalender/?success");
			}
		}else{
			redirect("");
		}
	}else{
	//print_r($this->input->post('url'));exit;
	$this->data['url']=$this->input->post('url');
	//redirect("home/clientlogin",$this->data);
	$this->data['userRole']="clientlogin";
	$this->data['signUp']="clientSignUp";
	$this->parser->parse('include/meta_tags',$this->data);
	$this->parser->parse('general/login',$this->data);
	}
}


function deleteapp(){
  $this->business_profile_model->deleteapp();
  $staffid=$this->common_model->getstaffid($this->session->userdata['business_id'],$this->session->userdata['id']);
  echo $staffid;
}


function referal_url($url){
//print_r($_REQUEST);exit;
    $this->data['url']=$this->input->get('url');
	$this->data['userRole']="clientlogin";
	$this->data['signUp']="clientSignUp";
	$this->parser->parse('include/meta_tags',$this->data);
	$this->parser->parse('general/login',$this->data);
}
/*Get End Time by Selected Services*/

	function getendtimeByservice(){
	 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
    	if($this->checkduplicate($this->input->post('date'),$this->input->post('business_id'),$this->input->post('starttime'))){
		$status='1';
		}else{
		$status='0';
		} 
	 }else{
	  $status='1';
	 }
	if($status=='1'){
	if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'))){
	if(strtotime($this->input->post('date')." ".$this->input->post('starttime'))<strtotime(date("d-m-Y H:i"))){ 
		  echo -6;
	}elseif($this->checkdateTime($this->input->post('date'),$this->input->post('business_id'),$this->input->post('starttime'),$this->input->post('action'))){
	   if($this->checkFutureDay($this->input->post('date'),$this->input->post('business_id'))){
		
		$time = "";
		$timeActual = "";
		$conversion = "";
		//foreach(explode(",",rtrim($this->input->post('checked'),",")) as $id){
		if($this->input->post('status')!=""){
		
		$str1=rtrim($this->input->post('service_id'),','); 
		$str=rtrim($str1);
		if($str!=''){
		$info = 'id  IN ('.$str.')';
         }else{
		 echo '-2'; exit;
		 }		
		}else{
		$info = array("id"=>$this->input->post('service_id'));	
		}
		$times = $this->common_model->getserviceTime($info);
			//print_r($times);
		
		if($this->input->post('status')!=""){ //$timeVals="";
		  foreach($times as $timeVal){
		    //$timeVal.=$time->timelength.',';
		    if($timeVal->time_type=="minutes"){
				$conversion = 1;
					
			}else if($timeVal->time_type=="hours"){
				$conversion = 60;
			}
			
			if($timeVal->padding_time_type=="Before & After"){
			  $twice=2;
			}else{
			  $twice=1;
			}
			$total = $timeVal->timelength * $conversion + $timeVal->padding_time * $twice;
			$totalActualtime = $timeVal->timelength * $conversion;
			//$timeVals.=$total.',';
			$time = $time + $total; 
			$timeActual = $timeActual + $totalActualtime;
		  }//print_r($time); exit;
		}else{
			if($times[0]->time_type=="minutes"){
				$conversion = 1;
					
			}else if($times[0]->time_type=="hours"){
				$conversion = 60;
			}
			
			if($times[0]->padding_time_type=="Before & After"){
			  $twice=2;
			}else{
			  $twice=1;
			}
			$total = $times[0]->timelength * $conversion + $times[0]->padding_time * $twice;
			$totalActualtime = $times[0]->timelength * $conversion;
			$time = $time + $total;
			$timeActual = $timeActual + $totalActualtime;
		}	
		//}
		
		$t_time = $this->convertToHoursMins($time,'%d:%d'); 
		$t_timeActual = $this->convertToHoursMins($timeActual,'%d:%d');
		$t_time = $t_time.':0';
		$t_timeActual = $t_timeActual.':0';
		$start_time = $this->input->post('starttime');
		$t = $start_time.':0';
		
		$time = explode(":",$this->addTime($t_time,$t));
		$timeActual = explode(":",$this->addTime($t_timeActual,$t));
		$return = $time[0].':'.$time[1];
		$returnActual = $timeActual[0].':'.$timeActual[1];
		//echo $return;
		//exit;
		$this->checkAvailable($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staffid'),$this->input->post('starttime'),$return,$returnActual,$this->input->post('eventId'));
		 }else{
		  echo -3;
		  }
		}else{ 
		  echo -7;
		}
		}else{
		  echo -4;
		}
		}else{
		  echo -5;
		}
	}
	
	function checkforenddate(){
         if(strtotime($this->input->post('startdate'))>strtotime($this->input->post('enddate'))){
		  echo -1;
		 }else{
		  echo 0;
		 }
	}
	
	function checkstarttime(){
	   $staffid='';
		if($this->input->post('employeeid')!='Select Staff'){
		$staffid=$this->input->post('employeeid');
		}
		if(strtotime($this->input->post('date')." ".$this->input->post('starttime'))<strtotime(date("d-m-Y H:i"))){ 
		  echo -4;
		 }elseif(strtotime($this->input->post('date'))< strtotime(date("d-m-Y"))){
		  echo -1;
		 }elseif(strtotime($this->input->post('starttime'))==strtotime($this->input->post('endtime'))){
		  echo 0;
		 }elseif(strtotime($this->input->post('starttime'))>strtotime($this->input->post('endtime'))){
		  echo -3;
		 }elseif($this->checkday($this->input->post('date'),$this->session->userdata['business_id'],$staffid)){
		    echo 1;
		 }else{
		   echo -2;
		 }	
	}
	

	function checkfortime(){
	    $where=1;
		$returned = true;
		$staffid='';
		if($this->input->post('employeeid')!='Select Staff'){
		$staffid=$this->input->post('employeeid');
		}
	     if(strtotime($this->input->post('date'))< strtotime(date("d-m-Y"))){
		  echo -1;
		 }elseif(strtotime($this->input->post('starttime'))==strtotime($this->input->post('endtime'))){
		  echo 0;
		 }elseif(strtotime($this->input->post('starttime'))>strtotime($this->input->post('endtime'))){
		  echo -3;
		 }elseif($this->checkday($this->input->post('date'),$this->session->userdata['business_id'],$staffid)){
		    $total_slotlist = array();
			$start = strtotime($this->input->post('starttime'));
			$end = strtotime($this->input->post('endtime'));
			for( $i = $start; $i <= $end; $i += (60*15)){
				$total_slotlist[] = date('g:iA', $i);
			}
			
		$day = $this->checkweekendDayName($this->input->post('date'));
		if($this->input->post('employeeid')!='Select Staff'){
		$where.=" AND employee_id=".$this->input->post('employeeid')."  AND user_business_details_id=".$this->session->userdata['business_id'];
		}else{
		$where.=" AND user_business_details_id=".$this->session->userdata['business_id']." AND employee_id=0";
		}
		
		if($this->input->post('eventId')!=''){
		  $where.=' AND id!='.$this->input->post('eventId');
		}
		
		$booked_slots = $this->common_model->getBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))),$where);
		
		/*Get all empty slots*/
		
		$booked_container = array();
		foreach($booked_slots as $key =>$booked){	
			$start_booked = strtotime($booked->start_time);
			$end_booked = strtotime($booked->end_time);
			for( $i = $start_booked; $i < $end_booked; $i += (60*15)){
				$booked_container[] = date('g:iA', $i);
			}
		  }
		 // print_r($booked_container);
		foreach($total_slotlist as $single_total){
			if(in_array($single_total,$booked_container)){
				$returned = false;
			}
		}
		 if($returned){
		  echo 1;
		 }else{
		   echo -2;
		 }
		}else{
		  echo -4;
		}
	}
	
	function checkAvailable($date,$business_id,$staffid,$start_time,$end_time,$actual_endtime,$eventId){
	//print_r("here".$date); exit;
	//print_r($end_time); exit;
	    $where=1;
		//$where1=1;
	    $day = $this->checkweekendDayName($date);
		if($staffid!=''){
		$filter = array("users_id"=>$staffid,"name"=>$day,"type"=>'employee');
		$where.=" AND employee_id=".$staffid."  AND user_business_details_id=".$business_id;
		$where1=' AND users_id="'.$staffid.'" and name="'.$day.'" and type="employee"';
		}else{
		$filter = array("user_business_details_id"=>$business_id,"name"=>$day,"type"=>'business'); 
		$where.=" AND user_business_details_id=".$business_id." AND employee_id=0";
		$where1=' AND user_business_details_id="'.$business_id.'" and name="'.$day.'" and type="business"';
		}
		$getEndtime=$this->common_model->getRow('view_service_availablity','name',$day,$where1); 
		//$getEndtime=$this->common_model->getAllRows('view_service_availablity','name',$day,$where1); 
		
		$slots = $this->common_model->getAllslots($filter);
		
		if(!empty($eventId)){ 
		  $where.=' AND id!='.(!empty($eventId))?$eventId:''; //echo $where;
		}
		
		$booked_slots = $this->common_model->getBookedslotsByDate(date("Y-m-d",strtotime($date)),$where);
		//print_r($booked_slots); exit;
		/*Get all empty slots*/
		
		$booked_container = array();
		//$slots = array();
		foreach($booked_slots as $key =>$booked){	
			$start_booked = strtotime($booked->start_time);
			$end_booked = strtotime($booked->end_time);
			for( $i = $start_booked; $i < $end_booked; $i += (60*15)){
				//$booked_container = date('g:iA', $i).",";
				$booked_container[] = date('g:iA', $i);
			}
		}
	
		
		$total_slotlist = array();
		$start = strtotime($slots->start_time);
		$end = strtotime($slots->end_time);
		for( $i = $start; $i <= $end; $i += (60*15)){
			$total_slotlist[] = date('g:iA', $i);
		}
	//print_r($total_slotlist); exit;
		$option = array();
		foreach($total_slotlist as $single_total){
			if(in_array($single_total,$booked_container)){
				//echo "Not Availble Slots".$single_total;
			}else{
				$option[] = $single_total;
			}
		}
		
		
		
		
		$time_needed = array();
		$start = strtotime($start_time);
		$end = strtotime($end_time);
		for( $i = $start; $i <= $end; $i += (60*15)){
			$time_needed[] = date('g:iA', $i);
		}
		//print_r($time_needed);
		$returned = true;
		$total = count($time_needed); 
		$i=0;
		foreach($time_needed as $single_slots){	
			//echo $single_slots."Single Slots";
			//print_r($time_needed);
			$i++;
			if($total==$i){
				
			}else{ 
				if(in_array($single_slots,$booked_container)){
					//echo "Break";
					$returned = false;
					break;
				}
			}	
		}
		//print_r($returned); exit;
		if($returned){ 		
		  if(strtotime($end_time)>strtotime($getEndtime->end_time) || strtotime($start_time)<strtotime($getEndtime->start_time)){ 
		   echo -1;
		   }else{
		    echo $actual_endtime;
			//echo $end_time;
			}
		}else{
			echo 0;
		}
	}
	
	function calendar_business($id=false){
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	$this->data['role']="";
	
	if($id==""){
       $id=$this->session->userdata['business_id'];
    }
	$buisness_availability = $this->business_profile_model->user_business_availability($id,'business');
	$this->data['buisness_availability']=$buisness_availability;
	
	if($id){
	//$this->parser->parse('include/header',$this->data);
	$this->data['role']="";
		 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  }else if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
		  $this->parser->parse('include/navbar',$this->data);
		  }
		  if(isset($users_id)){
		  $this->data['user_id'] = $users_id;
		  @session_start();
		  $this->data['role'] = $this->session->userdata['role'];	
		  }
		  
		  $filter=array('id'=>$id);
		  $where=" And user_business_details_id=".$id;
		  $classes=$this->common_model->getDDArray("user_business_classes","id","name",$where);
		  $classes[""]=" Select";
		  $this->data['classes']=$classes; 
		
		  $this->data['buisness_details'] = $this->business_profile_model->getProfileDetailsByfilter($filter);
		  $this->data['businessId']=$id;
		 
		}
		if(!empty($id)){
		 $bid=$id;
		}else{
		 $bid=$this->session->userdata['business_id'];
		}
		 $this->data['staffs']=$this->common_model->getAllRows('view_business_employees','user_business_details_id',$bid);
		$this->data['businessId']=$id;
		$status=$this->common_model->getRow("user_business_details","users_id",$users_id);
		
		$this->data['appointments'] = $this->business_profile_model->getpostedclasses($buisness_availability['start_time'],$buisness_availability['end_time'],$status->calendar_type,$id,$instructor='');
		
		
		 if(isset($this->session->userdata['business_id'])){
		 
		 if($status->status=='active'){
		 // $this->parser->parse('include/modal_popup',$this->data);
		 // $this->parser->parse('calendar',$this->data);
			if($this->session->userdata['role']=="manager"){
			$this->parser->parse('include/modal_classpopup',$this->data);
			$this->parser->parse('include/modal_busytime',$this->data);
			$this->parser->parse('calendar_classes',$this->data);
			}else{
			$this->parser->parse('include/modal_bookclass',$this->data);
			$this->parser->parse('include/modal_verifyphone',$this->data);	
			$this->parser->parse('calendar_bookclass',$this->data);
			}
		 }else{
		  $this->parser->parse('deactivated',$this->data);
		 }
		 }else{
		 $this->parser->parse('include/modal_bookclass',$this->data);
		 $this->parser->parse('include/modal_verifyphone',$this->data);	
		 $this->parser->parse('calendar_bookclass',$this->data);
		 }

		 $this->parser->parse('include/footer',$this->data);
	}
	 
	 
	function getpostedclassesAgenda(){
	  if($this->input->post('business_id')!=''){
	   $id=$this->input->post('business_id');
	   }else{
	    $id=$this->session->userdata['business_id'];
      }
	  if($this->input->post('staffsid')!=''){
	  $staffid=$this->input->post('staffsid');
	  //$filter1="employee_id = '".$this->input->post('staffsid')."'";
	  }else{
	  $staffid='';
		//$filter1="user_business_details_id = '".$id."' and type='service'";
	  }
	    $filter=array('id'=>$id);
		$buisness_details = $this->business_profile_model->getProfileDetailsByfilter($filter);
		$buisness_availability = $this->business_profile_model->user_business_availability($id,'business');
		
		$appointments = $this->business_profile_model->getpostedclasses($buisness_availability['start_time'],$buisness_availability['end_time'],$buisness_details[0]->calendar_type,$id,$staffid,'agenda',$this->input->post('statusType'),$this->input->post('startsfrom'),$this->input->post('stopsat'));
		
		 // $appointments = $this->business_profile_model->getappointments($buisness_availability['start_time'],$buisness_availability['end_time'],$buisness_details[0]->calendar_type,$filter1,'agenda',$this->input->post('statusType'),$this->input->post('startsfrom'),$this->input->post('stopsat'));
	  
	} 
	
	function getStaffClass(){
	 $detail="[";
	 $this->load->model("bprofile_model");
	 $details=$this->bprofile_model->getClassDetails("view_classes_posted_business","id",$_POST['classid']);
	 // $details=$this->common_model->getRow("view_classes_posted_business","id",$_POST['classid']);
	  $detail.=json_encode($details);
	  $detail.="]";
	  print_r($detail);
	}
	
	//get the  single class details
	function getClassDetails(){
	 $this->load->model("bprofile_model");
	 $values=$this->bprofile_model->getSingleClassDetails();
	 $detail="[";
	 $detail.=json_encode($values);
	  $detail.="]";
	 print_r($detail); 
	}
	
	function getSeriesid(){
	 $this->load->model("bprofile_model");
	  $values=$this->bprofile_model->maxEndDate();
	  $detail="[";
	  $detail.=json_encode($values);
	  $detail.="]";
	  print_r($detail); 
	}
	
	
	function getAllstaff(){
		//echo "Demo";
		$this->load->model("bprofile_model"); 
		$results=$this->bprofile_model->getStaffs();  
		foreach($results as $res){ 
		 if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$res['id'])){
			 $results1[]=$res;
		 } 
		}
        print_r(json_encode($results1));		
		//print_r(json_encode($this->data['tableList']));
	}
	
	function getAllclasses(){
		$this->load->model("bprofile_model"); 
		$this->data['tableList'] = $this->bprofile_model->getClasses();
		print_r(json_encode($this->data['tableList']));
	}
	
	function bookclass(){
	  if($this->checkdateTime(date('d-m-Y',strtotime($this->input->post('date'))),$this->input->post('businessid'),$this->input->post('starttime'),$action='schedule')){
		$val=$this->common_model->getRow("view_classes_posted_business","id",$this->input->post('classid')); 
		$fav =array("users_id"=>$this->session->userdata['id'],"user_business_details_id"=>$val->user_business_details_id);
		$where=" and users_id=".$this->session->userdata['id'];
		$checkClient=$this->common_model->getRow("business_clients_list","user_business_details_id",$this->input->post('businessid'),$where);
		$checkfav=$this->common_model->getRow("favourite_businesses","user_business_details_id",$this->input->post('businessid'),$where);
		if(empty($checkClient)){
		$this->business_profile_model->insertClient($fav);
		}
		if(empty($checkfav)){
		$this->business_profile_model->insertFav($fav);
		}
		// $checkfav=$this->common_model->getRow("business_clients_list","user_business_details_id",$val->user_business_details_id,$where);
		// if(empty($checkfav)){
		// $this->business_profile_model->insertFav($fav);
		// }
		$where=" and services_id=".$this->input->post('classid');
		$val=$this->common_model->getRow("client_service_appointments","users_id",$this->session->userdata['id'],$where);
		if($val){
		$val=1;
		echo $val;
		}else{
		$this->load->model("bprofile_model"); 
		$date=date("Y-m-d h:m:s");
		$starttime=$this->input->post('date')." ".$this->input->post('starttime');
		$endtime=$this->input->post('date')." ".$this->input->post('endtime');
		if($this->session->userdata['role']=='client'){
		 $booked_by='client';
		}else{
		 $booked_by='manager';
		}
		$input = array("employee_id"=>$this->input->post('employee_id'),"booked_by"=>$booked_by,"start_time"=>$starttime,"end_time"=>$endtime,"users_id"=>$this->session->userdata['id'],"services_id"=>$this->input->post('classid'),"note"=>$this->input->post('note'),'status'=>'booked','type'=>'class','appointment_date'=>$date,'user_business_details_id'=>$this->input->post('businessid'));
		$val=$this->bprofile_model->bookappointment($input);
		}
	 
	  }else{ 
	  echo 0;
	  }
	
	
		
		
	}
	
	function getClassfreeslotsbydate(){
   $where=1;
	if($this->input->post('date')){
		if($this->checkday($this->input->post('date'),$this->input->post('business_id'),$this->input->post('staff_id'))){
			 //echo "We work on selected day";
			 $day = $this->checkweekendDayName($this->input->post('date'));
			 if($this->input->post('staff_id')!=''){
			 $filter = array("users_id"=>$this->input->post('staff_id'),"name"=>$day,"type"=>'employee'); 
			 $where.=" AND instructor=".$this->input->post('staff_id');
			 }else{
			 $filter = array("user_business_details_id"=>$this->input->post('business_id'),"name"=>$day,"type"=>'business'); 
			 $where.=" AND user_business_details_id=".$this->input->post('business_id');
			 }
			 $this->data['slots'] = $this->common_model->getAllslots($filter);
			 //$where=1;
			 if($this->input->post('timeslot')!=''){
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			 }else{
			  $this->data['selectedTimeSlot']='';
			 }
			 if($this->input->post('eventId')!=''){ 
			 $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			  $where.=' AND id!='.$this->input->post('eventId');
			 }
			 if($this->input->post('seriesid')!=''){ 
			// $this->data['selectedTimeSlot']=date('H:i', strtotime($this->input->post('timeslot')));
			  $where.=' AND seriesid!='.$this->input->post('seriesid');
			 }
			 //else{
			// $where='1';
			
			 //}
			// print_r($this->data['selectedTimeSlot']); exit;
			 $this->data['booked_slots'] = $this->common_model->getClassBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))),$where);
			 //print_r($this->data['booked_slots']);
			 //exit;	
			 //print_r($this->data['slots']);
			 $this->data['businessid']=$this->input->post('business_id');
			 $this->data['appdate']= $this->input->post('date');
			 $this->data['type']= 'class';
			 $this->data['eventId']= $this->input->post('eventId');
			 $this->load->view("options",$this->data);
			 
		}else{
			echo 0;
		}
	}else{
		return false;
	}
	
}

function checkIfblocked(){
  if($this->input->post('employee_id')!=''){
    $staff=$this->input->post('employee_id');
  }else{
    $staff=0;
  }
  $where=" 1 AND user_business_details_id='".$this->input->post('business_id')."' and start_time='".$this->input->post('start_time')."' AND instructor='".$staff."'";
  
    $date1 = str_replace('-', '/', $this->input->post('date'));
    $date = date('Y-m-d',strtotime($date1 . "+1 days"));
  
  $booked_slots = $this->common_model->getClassBookedslotsByDate(date("Y-m-d",strtotime($this->input->post('date'))),$where);
  if($booked_slots){
  echo 0;
  }else{
  echo 1;
  }
}
	
	function checkClassAvailable($date,$business_id,$class_id,$staffid,$start_time,$end_time,$actual_endtime,$eventId=false,$seriesid=false){
	    $where=1;
		//$where1=1;
	    $day = $this->checkweekendDayName($date);
		if($staffid!=''){
		$filter = array("users_id"=>$staffid,"name"=>$day,"type"=>'employee');
		$where.=" AND instructor=".$staffid;
		$where1=' AND users_id="'.$staffid.'" and name="'.$day.'" and type="employee"';
		}else{
		$filter = array("user_business_details_id"=>$business_id); 
		$where.=" AND user_business_details_id=".$business_id;
		$where1=' AND user_business_details_id="'.$business_id.'"';
		}
		$getEndtime=$this->common_model->getRow('view_service_availablity','name',$day,$where1); 
		
		$slots = $this->common_model->getAllslots($filter); 
		//print_r("<pre>".$eventId."</pre>"); exit;
		if(!empty($eventId)){ 
		  $where.=' AND id!='.(!empty($eventId))?$eventId:''; //echo $where;
		}
		if(!empty($seriesid)){
		  $where.=' AND seriesid!='.(!empty($seriesid))?$seriesid:''; //echo $where;
		}
		
		$booked_slots = $this->common_model->getClassBookedslotsByDate(date("Y-m-d",strtotime($date)),$where);
		
		/*Get all empty slots*/
		
		$booked_container = array();
		//$slots = array();
		foreach($booked_slots as $key =>$booked){	
			$start_booked = strtotime($booked->start_time);
			$end_booked = strtotime($booked->end_time);
			for( $i = $start_booked; $i < $end_booked; $i += (60*15)){
				//$booked_container = date('g:iA', $i).",";
				$booked_container[] = date('g:iA', $i);
			}
		}
	
		
		$total_slotlist = array();
		$start = strtotime($slots->start_time);
		$end = strtotime($slots->end_time);
		for( $i = $start; $i <= $end; $i += (60*15)){
			$total_slotlist[] = date('g:iA', $i);
		}
	
		$option = array();
		foreach($total_slotlist as $single_total){
			if(in_array($single_total,$booked_container)){
				//echo "Not Availble Slots".$single_total;
			}else{
				$option[] = $single_total;
			}
		}
		
		
		
		
		$time_needed = array();
		$start = strtotime($start_time);
		$end = strtotime($end_time);
		for( $i = $start; $i <= $end; $i += (60*15)){
			$time_needed[] = date('g:iA', $i);
		}
		//print_r($time_needed);
		$returned = true;
		$total = count($time_needed); 
		$i=0;
		foreach($time_needed as $single_slots){	
			//echo $single_slots."Single Slots";
			//print_r($time_needed);
			$i++;
			if($total==$i){
				
			}else{ 
				if(in_array($single_slots,$booked_container)){
					//echo "Break";
					$returned = false;
					break;
				}
			}	
		}
		//print_r($returned); exit;
		if($returned){ 		
		  if(strtotime($end_time)>strtotime($getEndtime->end_time) || strtotime($start_time)<strtotime($getEndtime->start_time)){
		   echo -1;
		   }else{ 
		    echo $actual_endtime;
			//echo $end_time;
			}
		}else{
			echo 0;
		}
	}
	
	function endTimeClass(){
		$time = "";
		$Actualtime = "";
		$conversion = "";
			$info = array("id"=>$this->input->post('class_id'));	
			$times = $this->common_model->getclassTime($info);
			
			
			if($times[0]->time_type=="minutes"){
				$conversion = 1;
					
			}else if($times[0]->time_type=="hours"){
				$conversion = 60;
			}
			
			if($times[0]->padding_time_type=="Before & After"){
			  $twice=2;
			}else{
			  $twice=1;
			}
			$total = $times[0]->timelength * $conversion + $times[0]->padding_time * $twice;
			$Actualtotal = $times[0]->timelength * $conversion;
			$time = $time + $total;
			$Actualtime = $Actualtime + $Actualtotal;
			
		//}
		$t_time = $this->convertToHoursMins($time,'%d:%d');
		$t_Actualtime = $this->convertToHoursMins($Actualtime,'%d:%d');
		$t_time = $t_time.':0';
		$t_Actualtime = $t_Actualtime.':0';
		$start_time = $this->input->post('starttime');
		$t = $start_time.':0';
		
		$time = explode(":",$this->addTime($t_time,$t));
		$Actualtime = explode(":",$this->addTime($t_Actualtime,$t));
		$endtime = $time[0].':'.$time[1];
		$Actualendtime = $Actualtime[0].':'.$Actualtime[1];
		if($this->checkvaliddate($this->input->post('startdate'),$this->input->post('enddate'),$this->input->post('repeatStatus'))){
		$this->checkClassAvailable($this->input->post('date'),$this->input->post('business_id'),$this->input->post('class_id'),$this->input->post('staffid'),$this->input->post('starttime'),$endtime,$Actualendtime,$this->input->post('eventid'),$this->input->post('seriesid'));
		}else{
		 echo -2;
		}
		//echo $Actualtime;
	}
	
	
	function staffSchedule($id=false,$type=false){ 
	if($id){
	//$this->parser->parse('include/header',$this->data);
	if(isset($this->session->userdata['admin'])){
	  $users_id=$this->session->userdata['users_id'];
	  $this->data['switch']='switchbtn';
	  $this->parser->parse('include/admin_header',$this->data);
	}else{
	  $users_id=$this->session->userdata['id'];
	  $this->parser->parse('include/header',$this->data);
	}
	$this->parser->parse('include/modal_verifyphone',$this->data);	
	$this->data['role']="";
		 if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='manager'){
		  $this->parser->parse('include/dash_navbar',$this->data);
		  }else if(isset($this->session->userdata['role']) && $this->session->userdata['role']=='client'){
		  $this->parser->parse('include/navbar',$this->data);
		  }
		  if(isset($users_id)){
		  $this->data['user_id'] = $users_id;
		  @session_start();
		  $this->data['role'] = $this->session->userdata['role'];	
		  }
		  
		  $filter=array('users_id'=>$id);
		  $staffdetails = $this->business_profile_model->getstaffDetailsByfilter($filter);
		  $this->data['staff_details'] =$staffdetails;
		  $buisness_availability = $this->business_profile_model->user_business_availability($id,'employee');
		  $this->data['buisness_availability']=$buisness_availability;
		  $caltype=$this->common_model->getRow('user_business_details','id',$staffdetails[0]->user_business_details_id);
		}
		if($type=='Classes'){
		$this->data['staffs']=$this->common_model->getAllRows('view_business_employees','user_business_details_id',$staffdetails[0]->user_business_details_id);
		  $this->data['trainerid'] =$staffdetails[0]->users_id;
		  $this->data['firstname'] =$staffdetails[0]->first_name;
		  $this->data['lastname'] =$staffdetails[0]->last_name;
		  $this->data['appointments'] = $this->business_profile_model->getpostedclasses($buisness_availability['start_time'],$buisness_availability['end_time'],$caltype->calendar_type,$staffdetails[0]->user_business_details_id,$staffdetails[0]->users_id);
		  
		  
		if($this->session->userdata['role']=="manager"){
		  $where=" And business_id='".$staffdetails[0]->user_business_details_id."' and users_id='".$staffdetails[0]->users_id."'";
		  
		  $classes=$this->common_model->getDDArray("view_employee_classes","service_id","name",$where);
		  $classes[""]=" Select";
		  $this->data['classes']=$classes; 
		 $this->parser->parse('include/modal_classpopup',$this->data);
		 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
		 if($status->status=='active'){
		 $this->parser->parse('staffClassCalendar',$this->data);
		 }else{
		  $this->parser->parse('deactivated',$this->data);
		 }
		// $this->parser->parse('staffClassCalendar',$this->data);
		 }else{
		 $this->data['businessId']=$staffdetails[0]->user_business_details_id;
		 $this->data['type'] ='staffscalendar';
		 $this->parser->parse('include/modal_bookclass',$this->data);
		 $this->parser->parse('include/modal_verifyphone',$this->data);	
		 $this->parser->parse('calendar_bookclass',$this->data);
		 }
		 }else{
		 
		 
		 
		 $filter1="employee_id = '".$id."'";
		//$filter=array('id'=>$id);
		//$buisness_details = $this->business_profile_model->getProfileDetailsByfilter($filter);
		$this->data['appointments'] = $this->business_profile_model->getappointments($buisness_availability['start_time'],$buisness_availability['end_time'],$caltype->calendar_type,$filter1,'','','','','staff',$staffdetails[0]->user_business_details_id);
		 
		 
		 
		 $this->data['staffs']=$this->common_model->getAllRows('view_business_employees','user_business_details_id',$staffdetails[0]->user_business_details_id);
		 $this->data['trainerid'] ='';
		 $this->parser->parse('include/modal_popup',$this->data);
		 $this->parser->parse('include/modal_busytime',$this->data);
		 $status=$this->common_model->getRow("user_business_details","users_id",$users_id);
		// print_r($status->status); exit;
		if($this->session->userdata['role']=="manager"){
		if($status->status=='active'){
		 $this->parser->parse('staffCalendar',$this->data);
		 }else{
		   $this->parser->parse('deactivated',$this->data);
		 }
		 }else{
		  $this->parser->parse('staffCalendar',$this->data); }
		 }
		 $this->parser->parse('include/footer',$this->data);
	}
	
	function checkStatus(){
	 $val=$this->common_model->getRow("user_business_posted_class","id",$_POST['classID']); 
	// print_r($val); exit;
	$where=" and modifiedStatus='0'";
	 $res=$this->common_model->getAllRows("user_business_posted_class","seriesid",$val->seriesid,$where); 
	 if(count($res)==1){
	   echo 1;
	 }else{
	  print_r($val->modifiedStatus);
	 } 
	 
	}
	
	function getClients(){ 
	$this->bprofile_model->getClients();
	 // $val=$this->common_model->getAllRows("view_business_clients","user_business_details_id",$_POST['businessid']);
	  //print_r($val);
	}
	
	function getclientsList(){ 
	$this->bprofile_model->getclientsListauto();
	  //print_r($val);
	}
	
	function addClient(){
	if($this->input->post('classid')!=''){
	 $this->bprofile_model->addClient();
	 }
	 
	}
	
	function removeClient(){
     $input = array("users_id"=>$this->input->post('clientid'),"services_id"=>$this->input->post('classid'),"type"=>$this->input->post('type'));
	 $this->bprofile_model->removeClient($input);
	}
	
	function clientlist(){
	$val=$this->common_model->getAllRows("view_client_appoinment_details","services_id",$_POST['classid']);
	 print_r (json_encode($val));
	 //$this->bprofile_model->getClientlist();
	}
	
	function getclientdetails(){
	 $val=$this->common_model->getAllRows("view_client_appoinment_details","users_id",$_POST['userid']);
	 print_r (json_encode($val));
	}
	
	function getAppDetails(){
	 if($this->input->post('eventID')){
	  $details=$this->bprofile_model->getAppDetails();
	  $detail="[";
	  $detail.=json_encode($details);
	  $detail.="]";
	  print_r($detail);
	  }
      	// $val=$this->common_model->getRow("view_client_appoinment_details","id",$_POST['eventID']);
	}
	
	function checkClassdate(){
	 $val=$this->common_model->getRow("view_classes_posted_business",'id',$this->input->post('eventid'));
	 //print_r($val);
	 if(date("Y-m-d",strtotime($val->start_date)) < date("Y-m-d")){
	  echo 0;
	 }else{
	  echo 1;
	 }
	}
	
	function checkVerify(){
	 if($this->session->userdata['role']=='client'){
			   $val=$this->common_model->getRow("users","id",$this->session->userdata('id'));
			   if(!empty($val->phone_number) && $val->verify_phone=='inactive'){
			   echo '6';
			   }else if(empty($val->phone_number) && $val->verify_phone=='inactive'){
			   echo '7';
			   }else{
			   echo 1;
			   }
		  }else{
		  echo 1;
		  }
	
	}
	
	function checkCstartdate(){
		if($this->checkvaliddate($this->input->post('startdate'),$this->input->post('enddate'),$this->input->post('repeatStatus'))){
		echo 1;
		}else{
		echo -1;
		} 	
	}
	
	function checkvaliddate($startdate,$enddate,$repeatStatus){
	  if(strtotime($startdate)>strtotime($enddate) && $repeatStatus=='Remove Repeat'){
		   return false;
		 }else{
		   return true;
		 }
	}
	
	function insertPostedClass(){
	  $this->bprofile_model->insertscheduledclass();
	  $staffid=$this->common_model->getstaffid($this->session->userdata['business_id'],$this->session->userdata['id']);
      echo $staffid;
	}
	
	function editPostedClass(){
	 $this->bprofile_model->editscheduledclass();
	 $staffid=$this->common_model->getstaffid($this->session->userdata['business_id'],$this->session->userdata['id']);
      echo $staffid;
	}
	
	function deletePostedClass(){
	  $this->bprofile_model->deletePostedClass();
	  $staffid=$this->common_model->getstaffid($this->session->userdata['business_id'],$this->session->userdata['id']);
      echo $staffid;
	}
	
	// function showdiv(){ 
	  // $this->parser->parse('showdiv');
	// }
}

?>
