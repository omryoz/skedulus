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
	

function getProfileDetailsByfilter($filter=false,$limit=false,$offset=false,$orderBy=false){
		if($limit){	
			$this->db->limit($limit,$offset);
		}
		if($filter){
			$query = $this->db->get_where('user_business_details',$filter);
		}
		else{
			$query = $this->db->get('user_business_details');
		}
		if($this->db->affected_rows()){
			return $query->result();
		}else{
			return false;
		}	
}	

function getstaffDetailsByfilter($filter=false,$limit=false,$offset=false,$orderBy=false){
		if($limit){	
			$this->db->limit($limit,$offset);
		}
		if($filter){
			$query = $this->db->get_where('view_business_employees',$filter);
		}
		else{
			$query = $this->db->get('view_business_employees');
		}
		if($this->db->affected_rows()){
			return $query->result();
		}else{
			return false;
		}	
}	
 
 function insertFav($fav){
	if($fav){
	   $this->db->insert("business_clients_list",$fav);
	   return true;
	  }else{
		return false;
	}
 } 
	
	
	
	
	
}
?>