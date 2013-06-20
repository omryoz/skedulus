<?php
class common_model extends CI_Model{
	/* This function fetches single row from table name provided in first parameter based on fieldname 
		and its value provided in second and third parameter respectively from database*/	
	function getRow($tableName="", $fieldName="", $value="", $where=""){
		$sql = sprintf("SELECT * FROM `%s` WHERE %s = '%s' %s",$tableName,$fieldName,mysql_real_escape_string($value),$where);
		$query=$this->db->query($sql);			 			
		$data=$query->result();	
		if($data) {
			return $data[0];
		}
		return false;
	}	
	
	
	
	/* This function returns the data in the form of array can be used for dropdown.
		This second parameter will be as array index and third parameter as array value in the result.  */	
	
	function getDDArray($table="",$indexField="",$valueField="",$where=""){
		$options = "";
		$arrTemp=array();
		$sql = "SELECT $indexField,$valueField FROM $table WHERE 1";
		$query=$this->db->query($sql);			 			
		$data=$query->result();
		if($data) {
			$arrTemp[""] ="Select";
			foreach($data as $arrV) {
				$arrTemp[$arrV->$indexField] =  $arrV->$valueField;
			}
			
		}	
		return $arrTemp;
	}
	
    /* This function returns all specified records */
	function getAllRows($tableName="", $fieldName="", $value="", $where=""){
		$sql = sprintf("SELECT * FROM `%s` WHERE %s = '%s' %s",$tableName,$fieldName,mysql_real_escape_string($value),$where);
		$query=$this->db->query($sql);			 			
		$data=$query->result();	
		if($data) {
			return $data;
		}
		return false;
	}
	
	
	
	/* The function returns records in order by specified field  */
	function getDataArray($tableName="", $fieldKey="", $fieldValue="", $where="") {
		$arrData = array();
		if($tableName && $fieldKey && $fieldValue) {
			$sql = sprintf("SELECT `$fieldKey`,`$fieldValue` FROM `$tableName` WHERE 1 ".$where." ORDER BY `$fieldValue`");		
			$query=$this->db->query($sql);			 			
			$data=$query->result();	
			if($data) {
			$i=0;
				foreach($data as $v) {
					$arrData[$v->$fieldKey] = $v->$fieldValue;
				}			
			}
		}
		$arrData[0]="-- Select--";
		ksort($arrData);
		return $arrData;
	}     
     
	 function getCount($tableName="", $fieldName="", $where=""){
		if($where!=""){ $where="1  ".$where; }else{ $where="1"; }
		$sql = sprintf("SELECT COUNT(%s) as cnt FROM %s WHERE %s",$fieldName,$tableName,$where); 
		$query=$this->db->query($sql);			 			
		$data=$query->result();	
		if($data) {
			return $data[0]->cnt;
		}
		return false;
	}	
	 
/* The function to delete record */
		function deleteRow($tablename="",$id=""){
			$sql=sprintf("delete from `$tablename` where id='".$id."' ");
			$query=$this->db->query($sql);
			return true;
		}
		
	function uploadFile($foldername){
	
			$config['upload_path'] = './uploads/'.$foldername.'/'; 
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = '100';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';

			$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload("userfile"))
			{
				$error = array('error' => $this->upload->display_errors());
			}
			else
			{
				$data = array('upload_data' => $this->upload->data());
				return $data;
			}
		}
		
		
/* function to send email */

public function mail($emailTo,$subject,$message){
	    $this->load->library( 'email' );
		$config['mailtype'] = 'html';
		$config['protocol'] = 'sendmail';
	   // $userdetails= $this->common_model->getRow("users","id",$id);
	   // $this->data['name'] = $userdetails->first_name." ".$userdetails->last_name;
		//$this->data['activation_key'] = $userdetails->activationkey;
		//$this->data['email'] = $userdetails->email; 
		
		//Get email 
		$this->email->initialize($config);
		$this->email->from('swathi.n@eulogik.com', 'admin');
		$this->email->to($emailTo); 
		$this->email->subject($subject);
        $this->email->message($message);  		
		$this->email->send();
		$this->email->print_debugger();
	}
	
	
	/* to generate random password */
	function random_password( $length = 8 ) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}	
	
}

?>
