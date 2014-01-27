<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HAuth extends CI_Controller {

	public function index()
	{
		$this->load->view('hauth/home');
	}

	public function login(){
		
		$this->load->view("hauth/social_hub/profile.php");
	}
}

/* End of file hauth.php */
/* Location: ./application/controllers/hauth.php */
