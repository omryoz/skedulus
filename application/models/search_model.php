<?php 
class Search_model extends CI_Model {

function getFavBusiness(){
		$query = $this->db->query("select user_business_details_id from view_favourite_businesses where users_id=".$this->session->userdata('id'));
	    $data= $query->result();
		if($data){
		 foreach($data as $dataP){
				$values[] =$dataP->user_business_details_id;
			}
			//print_r($values); exit;
			return $values;
		}
	}
 
function insertFav($id,$action){
if($action=='add'){
  $this->db->query("insert into favourite_businesses(users_id,user_business_details_id) VALUES ('".$this->session->userdata('id')."','".$id."' )");
  }else{
  $this->db->query("delete from favourite_businesses where users_id= '".$this->session->userdata('id')."' and user_business_details_id='".$id."' ");
  }
  echo $id;
 }
 
 function searchResult($tablename="",$where="",$offset="",$limit=""){
			$query=$this->db->query("select * from `$tablename` where $where ORDER BY business_id ASC LIMIT $offset,$limit");
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
  }
 
}
?>