<?php
class homeWorkModel extends CI_Model{
	function saveHomeWork($data){
		$this->db->insert("homework",$data);
		return true;
	}
	function getHomeWorkList(){
		$var = $this->db->get("homework");
		return $var;
	}
	function getHomeWorkDetail(){
		$var = $this->db->get("homework");
		return $var;
	}
	function getHomeWorkDetailTeacher(){
		$var = $this->db->query("SELECT * FROM homework WHERE class = 'NotForClas'");
		
		return $var;
	}
	function getHomeWorkDetailStudent(){
		$var = $this->db->query("SELECT * FROM homework WHERE class != 'NotForClas'");
	
		return $var;
	}
	function updateHomeWork($data,$sno){
		$this->db->where("s_no",$sno);
		$var = $this->db->update("homework",$data);
		return TRUE;
	}
	function getClassWise($classv){
		$this->db->where("class1",$classv);
		$var = $this->db->get("homework");
		return $var;
	}
	function getSectionWise($classv,$section){
		$this->db->where("class",$classv);
		$this->db->where("section",$section);
		$var = $this->db->get("homework");
		return $var;
	}
	
	
}