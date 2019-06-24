<?php
class SearchStudentModel extends CI_Model{
	
	function getValue(){
		$this->db->where("status","Active");
        $query = $this->db->get("student_info");
        return $query;
    }
    
    function getValue1($temps){
    	$this->db->where("status","Active");
    	$this->db->where("student_id",$temps);
    	$dam = $this->db->get("student_info");
    	return $dam;
    }
}