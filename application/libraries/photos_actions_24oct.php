<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	
	
class Photos_actions extends CI_Controller {

public function __construct() {
         # parent::__construct();
		$CI =& get_instance();
			
	 }
	
	  /* function display_image($photo_id,$width=false,$hieght=false,$file=false){
	   
	   $CI = & get_instance();
		
		
		
                       $config['image_library'] = 'gd2';
					   $path_file = (!empty($file))?$file:"";
					   $global = "uploads";
                       //$config['source_image'] = 'uploads/'.$file.'/'.$photo_id;
					   $config['source_image'] = $global.'/'.$path_file.'/'.$photo_id;
                       //$config['source_image'] = "uploads/".$photo_id;
                       $config['maintain_ratio'] = TRUE;
                       $config['width'] = $width;
					   $config['quality'] = "100%"; 
                       $config['height'] = $hieght;
					  
					   //print_r($config); die;
                       $config['dynamic_output'] = TRUE;
                       $CI->load->library('image_lib', $config);
                       $CI->image_lib->initialize($config);
                       if ( ! $CI->image_lib->resize()){
                               echo $CI->image_lib->display_errors();
                       }
                       return $CI->image_lib->resize();
       } */
	   
	    function display_image($photo_id,$width=false,$hieght=false,$ratio=false,$file=false){
	   
	   $CI = & get_instance();
		
		
		
                       $config['image_library'] = 'gd2';
                       #$config['source_image'] = 'upload/'.$file;
                       //$config['source_image'] = "uploads/".$row[0]->name;
					   $path_file = (!empty($file))?$file:"";
					   $global = "uploads";
					   $config['source_image'] = $global.'/'.$path_file.'/'.$photo_id;
                       $config['maintain_ratio'] = TRUE;
                       $config['width'] = $width;
					   $config['quality'] = "100%"; 
                       $config['height'] = $hieght;
					   if($ratio){
						$config['master_dim'] = "width";
					   }
					   //print_r($config); die;
                       $config['dynamic_output'] = TRUE;
                       $CI->load->library('image_lib', $config);
                       $CI->image_lib->initialize($config);
                       if ( ! $CI->image_lib->resize()){
                               echo $CI->image_lib->display_errors();
                       }
                       return $CI->image_lib->resize();
       }
	   
	   function default_preview($width=false,$hieght=false,$file=false,$path=false){
				$CI = & get_instance();
				$config['image_library'] = 'gd2';
				#$config['source_image'] = 'upload/'.$file;
				$path_file = (!empty($path))?$path:"uploads";
				$config['source_image'] = $path_file.'/'.$file;
				//print_r($config['source_image']);
				$config['maintain_ratio'] = FALSE;
				$config['width'] = $width;
				$config['height'] = $hieght;
				$config['dynamic_output'] = TRUE;
				$CI->load->library('image_lib', $config);
				$CI->image_lib->initialize($config);
				if ( ! $CI->image_lib->resize()){
				echo $CI->image_lib->display_errors();
				}
				return $CI->image_lib->resize();
	   }
	  
	  
	
	// /* Function to  display image in requird dimensions*/
	// public function display_image($photo_id,$width = false,$height = false)
	// {
		// $CI = & get_instance();
		
		// $query = $CI->db->get_where('photos',array('id' => $photo_id));
		// $row = $query->result();
				
		// $config['image_library'] = 'gd2';
		// $config['source_image']	=  "uploads/".$row[0]->name; 
		
		// $config['maintain_ratio'] = TRUE;
		
		// /* Check if width and height is specified or not if not then take original from database*/
		// if($width=='' &&  $height=='' )
		// {
			// $width	= $row[0]->width;
			// $height = $row[0]->height;
		// }	
		
		// /*if width is grater then required then take original from database*/
		// if($width > $row[0]->width && $row[0]->width!=0)
			// $width	= $row[0]->width;
			
		// /*if height is grater then required then take original from database*/	
		// if($height > $row[0]->height  && $row[0]->height!=0)
			// $height	= $row[0]->height;	
			
		
		// $config['width']	= $width;
		// $config['height']	= $height;
		// $config['x_axis'] = $width;
		// $config['y_axis'] = $height;
		// $config['dynamic_output'] = TRUE;
		// $config['master_dim'] = "auto";
		
		// if($height > $width)
			// $config['master_dim'] = "height";
			
		// $CI->image_lib->initialize($config);
		
		// /*if (!$CI->image_lib->resize())
		// {
			// echo $CI->image_lib->display_errors();
		// } */
		
		// return $CI->image_lib->resize();
	// }	
	  
	  
	
}



?>