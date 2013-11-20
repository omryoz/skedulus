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
	   $this->db->insert("favourite_businesses",$fav);
	   return true;
	  }else{
		return false;
	}
 } 
 
  function insertClient($fav){
	if($fav){
	   $this->db->insert("business_clients_list",$fav);
	   return true;
	  }else{
		return false;
	}
 } 
	
	
function getClasses($id){
		$sql="Select DISTINCT(user_business_classes_id), name,price,timelength,time_type from view_classes_posted_business where user_business_details_id =".$id;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		if($data){
		return $data;
		}
	}
	
	function user_business_availability($id,$type){
	if($type=='employee'){
	 $where = "users_id ='".$id."' and type='".$type."'";
	}else{
	$where="user_business_details_id ='".$id."' and type='".$type."'";
	}
	    $sql="Select users_id,user_business_details_id,type,start_time FROM `user_business_availability` WHERE ".$where;
		$query=$this->db->query($sql);
		$data= $query->result();
		$i=0;
		$values=''; 
		if($data){
		if($sql_num_rows<1){ 
		$start_time=date('H',strtotime($data[0]->start_time));
		}else{
			foreach($data as $dataP){
				$values[$i]= "'".$dataP->start_time."'";
				$i++;
			}	
			$val= implode(',',$values);
			$sql1="Select LEAST(".$val.") As least";
			$query1=$this->db->query($sql1);
		    $data1= $query1->result(); 
			$start_time=date('H',strtotime($data1[0]->least));	
			}
			$sql2="Select max(end_time) as end_time FROM `user_business_availability` WHERE ".$where;
		    $query2=$this->db->query($sql2);
		    $data2= $query2->result();
			
			return array('start_time'=>$start_time,'end_time'=>date('H',strtotime($data2[0]->end_time)));
		}
	}
	
	
}
?>