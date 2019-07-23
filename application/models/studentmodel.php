<?php
class StudentModel extends CI_Model{
	function studentList(){
		$this->db->where("status",1);
		$result = $this->db->get("student_info");
		return $result;
	}
	function getStudentDetail1($studentId){
		//print_r($studentId);exit;
		$this->db->where("enroll_num",$studentId);
		$std= $this->db->get("student_info");
		return $std;
	}

	

	function getStudentDetail($studentId1){
		//$this->db->where("school_code",$this->session->userdata("school_code"));
		//$this->db->where("status",1);
		$this->db->where("s_no",$studentId1);
		$result = $this->db->get("student_info");
		return $result;
		
	
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