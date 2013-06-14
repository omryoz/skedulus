<?php 
class Business_profile_model extends CI_Model {

function getProfileDetails(){
		$sql="Select * from view_business_details where ";
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
			foreach($data as $dataP){
				$values[$i]['business_id'] =$dataP->business_id;
				$values[$i]['category_name']= $dataP->category_name;
				$values[$i]['image']= $dataP->image;
				$values[$i]['name']= $dataP->manager_firstname."".$dataP->manager_lastname;
				$values[$i]['mobile_number']= $dataP->mobile_number;
				$values[$i]['address']= $dataP->address;
				$values[$i]['business_description']= $dataP->business_description;
				$i++;
			}
			return $values;
		}
	}
 
	
	
	
	
	
}
?>