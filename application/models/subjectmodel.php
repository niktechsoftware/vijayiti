<?php
class SubjectModel extends CI_Model{
	function getSubject($clName,$stream,$section){
		$this->db->where("class_id",$clName);
		$this->db->where("stream",$stream);
		$this->db->where("section",$section);
		$result = $this->db->get("subject");
		return $result;
	}
	
	function getSubjectByClassSection($clName,$section){
		$this->db->where("class_id",$clName);
		$this->db->where("section",$section);
		$result = $this->db->get("subject");
		return $result;
	}
	
	function addSubject($data){
		$result = $this->db->insert("subject",$data);
		return $result;
	}
	
	function updateSubject($data,$id){
		$this->db->where("id",$id);
		$result = $this->db->update("subject",$data);
		return $result;
	}
	
	function deleteSubject($id){
		$this->db->where("id",$id);
		$result = $this->db->delete("subject");
		return $result;
	}
	
	function isStudentSubject($studentId){
		$this->db->where("student_id",$studentId);
		$result = $this->db->get("students_subject");
		return $result;
	}
	
}