<?php
class singleStudentModel extends CI_Model{
	
	function getStudentName($id){
	$this->db->where("student_id",$id);
	$query=$student = $this->db->get("student_info");
	return $query;
	}
	
	function getStudentFatherName($id){
		$this->db->where("student_id",$id);
		$query=$student = $this->db->get("guardian_info");
		return $query;
	}
	
	function getStudentFeeDetail($id){
		$this->db->where("student_id",$id);
		$query=$student = $this->db->get("fee_deposit");
		return $query;
	}
	
	function getStuReport($edate,$sdate,$stu_id){
		$query = $this->db->query("SELECT * FROM attendance WHERE stu_id='$stu_id' AND  a_date >= '$sdate' and a_date <='$edate'");
		return $query;
	}
	
	function getStuLeave($v){
		$this->db->where("stu_id",$v);
		$query= $this->db->get("stu_leave");
		return $query;
	}
	
	function insertLeave($data){
		$query=	$this->db->insert("stu_leave",$data);
		return true;
	}
	function getclassAndStu($stu_id){
		$this->db->where("student_id",$stu_id);
		$query= $this->db->get("student_info");
		return $query;
	}
	function getTimeTable($class,$section){
		$clasec=$class."-".$section;
		$this->db->where("class1",$clasec);
		$query=$this->db->get("time_table");
		return $query;
		}
		function getteacherName($eid){
			$this->db->where("emp_no",$eid);
			$query= $this->db->get("employee_info");
			return $query;
		}
	
}