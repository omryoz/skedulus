<?php 
class businessregistration_model extends CI_Model {
 
	function insertBasicInfo(){
		$insertArray=array();
		$insertArray['users_id']= '64'; //$_SESSION['id'];
		if(isset($_POST['business_type']))$insertArray['business_type']= $_POST['business_type'];
		if(isset($_POST['category']))$insertArray['category_id']= $_POST['category'];
		if(isset($_POST['name']))$insertArray['name']= $_POST['name'];
		if(isset($_POST['mobile']))$insertArray['mobile_number']= $_POST['mobile'];
		if(isset($_POST['description']))$insertArray['description']= $_POST['description']; 
		if(isset($_POST['Postcode']))$insertArray['address']= $_POST['Postcode'];
		if(isset($_POST['hidLat']))$insertArray['map_latitude']= $_POST['hidLat']; 
		if(isset($_POST['hidLong']))$insertArray['map_longitude']= $_POST['hidLong'];
		$this->db->insert('user_business_details',$insertArray);
		$id=mysql_insert_id();
		
		return $id;
	}
	
	
}
?>