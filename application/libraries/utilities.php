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
	   
	   function getPhotosLike($details_id=false,$type=false){
		$CI =&get_instance();
		$query =$CI->db->query("select count(*) as count from businesses_photos_likes where details_id=".$details_id." AND type='".$type."' group by details_id");
		if($query->num_rows()>0){
			//echo $CI->db->last_query();
			$result = $query->result_array();
			//print_r($result);
			return $result[0]['count']; 
		}else{
			return false;
		}
	   }
	   
	   
}
?>