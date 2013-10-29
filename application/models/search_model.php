<?php 
class Search_model extends CI_Model {

function getFavBusiness(){
		$query = $this->db->query("select user_business_details_id from view_business_clients where users_id=".$this->session->userdata('id'));
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
  $this->db->query("insert into business_clients_list(users_id,user_business_details_id) VALUES ('".$this->session->userdata('id')."','".$id."' )");
  }else{
  $this->db->query("delete from business_clients_list where users_id= '".$this->session->userdata('id')."' and user_business_details_id='".$id."' ");
  }
  echo $id;
 }
 
}
?>