<?php
class StudentModel extends CI_Model{
	function studentList(){
		$this->db->where("status","Active");
		$result = $this->db->get("student_info");
		return $result;
	}
	function getStudentDetail($studentId){
		$this->db->where("enroll_num",$studentId);
		return $this->db->get("student_info");
	}
	function getGurdianDetail($studentId){
		$this->db->where("enroll_num",$studentId);
		return $this->db->get("guardian_info");
	}
	
	function updateStudentInfo($new_img,$id){
		$this->db->where("enroll_num",$id);
		$this->db->update("student_info",$new_img);
		return true;
	}
	
	function updateGurdianInfo($new_img,$id){
		$this->db->where("enroll_num",$id);
		$this->db->update("guardian_info",$new_img);
		return true;
	}
	
}