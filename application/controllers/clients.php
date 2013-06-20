<?php
/* Manage Business registration Controller */
class Clients extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('parser');
		$this->load->model('bprofile_model');
		$this->load->model('common_model');
		$this->load->library('upload');
		$this->load->library('form_validation');
		$this->data['bodyclass']='index';
    }
	
	public function list_clients(){
	 $this->parser->parse('include/header',$this->data);
	 $this->parser->parse('include/dash_navbar',$this->data);
	 $this->data['tableList']=$this->bprofile_model->getclientsList();
	 $this->parser->parse('clients',$this->data);
	 $this->parser->parse('include/footer',$this->data);
	}
	
	public function manage_clients(){
		if(isset($_POST['insert'])){ 
			$this->bprofile_model->insertClient();
			redirect('clients/list_clients');
		 }
		 if(isset($_GET['id'])){
			$val= $this->bprofile_model->getClientdetails();
			echo($val);
		 }
		 if(isset($_GET['delete'])){
		 $val= $this->common_model->deleteRow("users",$_GET['id']);
		 echo $val;
		 }
	}	
	
	
	public function checkEmail(){
		    if(isset($_POST['id']) && $_POST['id']!="") {
			$where=" and id!=".$_POST['id'];
			$duplicate=$this->common_model->getRow("users","email",$_POST['email'],$where);
			}else{
			$duplicate=$this->common_model->getRow("users","email",$_POST['email']);
			}
			if($duplicate){
			echo "false";
			}else{
			echo "true";
			}
	}
	
	function favourite(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->load->view('favourite',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	function settings(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->load->view('settings',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
	function offers(){
		$this->load->view('include/header',$this->data);
		$this->load->view('include/navbar',$this->data);
		$this->load->view('offer',$this->data);
		$this->load->view('include/footer',$this->data);
	}
	
}
?>
