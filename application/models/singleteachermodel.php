<?php
class singleTeacherModel extends CI_Model{
	function getTeacherLeave($v){
		$this->db->where("emp_id",$v);
		$query= $this->db->get("emp_leave");
		return $query;
	}
	function insertLeave($data){
		$query=	$this->db->insert("emp_leave",$data);
		return true;
	}
	
	function time_Table($teacher_id){
		$this->db->where("status","Active");
		$this->db->where("teacher",$teacher_id);
		$query= $this->db->get("time_table");
		return $query;
	}
	function getTeacherDetail($teacherID){
		$this->db->where("status","Active");
		$this->db->where("emp_no",$teacherID);
		$query= $this->db->get("employee_info");
		return $query;
	}
	
}