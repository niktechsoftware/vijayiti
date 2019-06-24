<?php
class feeModel extends CI_Model{
	function getStudData($data)
	{
		$this->db->where("enroll_num",$data);
		$query1 = $this->db->get("student_info");
	return $query1;
	}
	function getFname($data)
	{
		$this->db->where("student_id",$data);
		$query1 = $this->db->get("guardian_info");
		return $query1;
	}
	function getFeeDetail($data)
	{
		$query1 = $this->db->query("SELECT * FROM fee_deposit WHERE student_id='$data' ORDER BY id DESC LIMIT 1");
		return $query1;
	}
	function getHoliDay($data)
	{
		$query1 = $this->db->query("SELECT * FROM holiday WHERE date_f='$data'");
		return $query1;
	}
	function getfeeReport($sec,$class)
	{
		$query1 = $this->db->query("SELECT * FROM student_info WHERE class_id='$class' and section='$sec'");
		return $query1;
	}
	function fulldetail($id)
	{
		$query1 = $this->db->query("SELECT * FROM fee_deposit WHERE student_id='$id'");
		return $query1;
	}
	
		function feedetails($id)
	{
		$query1 = $this->db->query("SELECT SUM(diposit_month) as dm,SUM(total) as tt FROM fee_deposit where student_id='$id'");
		return $query1;
	}
	function lastpaid($id)
	{
		$query1 = $this->db->query("SELECT * FROM fee_deposit WHERE student_id='$id' ORDER BY id DESC LIMIT 1");
		return $query1;
	}
	
	
}
