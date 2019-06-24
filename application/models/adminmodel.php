<?php
class Adminmodel extends CI_Model{
	function adminDetail(){
		$result = $this->db->get("general_settings");
		return $result;
	}
	
	function updateAdminProfile($data){
		if($this->db->update("general_settings",$data)){
			return true;
		}
		else{
			return false;
		}
	}
	
}