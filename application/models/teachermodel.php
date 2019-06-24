<?php
class TeacherModel extends CI_Model{
	
	function getTeacherList(){
		$this->db->where("status","Active");
		$td = $this->db->get("employee_info");
		return $td;
	}
	
	function checkTeacherAtten($date1)
	{
		$this->db->where("a_date",$date1);
		$req = $this->db->get("teacher_attendance");
		return $req;
	
	}
	function getPresenti($section,$classv,$teacherid){
		$this->db->where("shift",$classv);
		$this->db->where("unit",$section);
		$this->db->where("trade",$teacherid);
		$this->db->where("status","Active");
		$req = $this->db->get("student_info");
		return $req;
	}
	function getPresentia2($section,$classv,$teacherid){
		$this->db->where("class_id",$classv);
		$this->db->where("section",$section);
		$this->db->where("status","Active");
		$req = $this->db->get("student_info");
		return $req;
	}
	function checkID($teacherId){
	$this->db->where("emp_no",$teacherId);
	$req=$this->db->get("employee_info");
	return $req;
	}
	
	function getSection($classv){
		$this->db->where("streem",$classv);
		$req=$this->db->get("class_info");
		return $req;
	}
	function addEmpAttendance($data){
		
			$query = $this->db->insert("teacher_attendance", $data);
			return $query;
	}
	function addstuAttendance($data){
		$query = $this->db->insert("attendance", $data);
		return $query;
		
	}
	function addstuAttendancea2($data){
		$query = $this->db->insert("attendance2", $data);
		return $query;
	
	}
	
	function checkPresenti($sec,$cla){
		$this->db->where("class",$cla);
		$this->db->where("section",$sec);
		$this->db->where("a_date",date("Y-m-d"));
		$query = $this->db->get("attendance");
		return $query;
	}
	function checkPresentia2($sec,$cla){
		$this->db->where("class",$cla);
		$this->db->where("section",$sec);
		$this->db->where("a_date",date("Y-m-d"));
		$query = $this->db->get("attendance2");
		return $query;
	}
	
	function getPramotion($sec,$cla){
		$this->db->where("status","Active");
		$this->db->where("class_id",$cla);
		$this->db->where("section",$sec);
		$query = $this->db->get("student_info");
		return $query;
	}
	
	
	
	function getStuReport($edate,$sec,$cla,$sdate){
		$query = $this->db->query("SELECT DISTINCT stu_id,class FROM attendance WHERE class='$cla' AND section='$sec' AND a_date >= '$sdate' and a_date <='$edate'");
		return $query;
	}
	
	
	function countAtt($edate,$sdate,$stuID){
		$resultP = $this->db->query("SELECT attendance FROM attendance WHERE attendance = 'P' AND stu_id='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$resultA = $this->db->query("SELECT attendance FROM attendance WHERE attendance = 'A' AND stu_id='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$resultL = $this->db->query("SELECT attendance FROM attendance WHERE attendance = 'L' AND stu_id='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$p = $resultP->num_rows();
		$a = $resultA->num_rows();
		$l = $resultL->num_rows();
		$res = array(
				"p" => $p,
				"a" => $a,
				"l" => $l
		);
		return $res;
	}
	function countAttTeacher($edate,$sdate,$stuID){
		$resultP = $this->db->query("SELECT attendance FROM teacher_attendance WHERE attendance = 'P' AND emp_no='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$resultA = $this->db->query("SELECT attendance FROM teacher_attendance WHERE attendance = 'A' AND emp_no='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$resultL = $this->db->query("SELECT attendance FROM teacher_attendance WHERE attendance = 'L' AND emp_no='$stuID' AND a_date >= '$sdate' and a_date <='$edate'");
		$p = $resultP->num_rows();
		$a = $resultA->num_rows();
		$l = $resultL->num_rows();
		$res = array(
				"p" => $p,
				"a" => $a,
				"l" => $l
		);
		return $res;
	}
	
	function checkStudID($stud){
		$this->db->where("student_id",$stud);
	$req=$this->db->get("student_info");
	return $req;
	}
	
	function checkBal($stud){
		$this->db->where("valid_id",$stud);
		$var=$this->db->get("sale_info");
		return $var;
	}
	
	function getteacherattenReport($edate,$sdate){
		$query = $this->db->query("SELECT * FROM teacher_attendance WHERE a_date >= '$sdate' and a_date <='$edate'");
		return $query;
	}
	
	
}