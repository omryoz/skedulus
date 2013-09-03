<?php class Utilities {
		
		
		function language(){
		ob_start();
		$CI =&get_instance();
		#$CI->load->library('session');
		$language =  $CI->session->userdata('language');
		if(!empty($language)){
		$language =  $CI->session->userdata('language');
		}else{
		$language = "english";
		}		
			   $CI->config->set_item('language', $language);
               $CI->lang->load('translations', '');
               return  $language;  
       }
}
?>