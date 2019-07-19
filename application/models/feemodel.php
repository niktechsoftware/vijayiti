<?php
class feeModel extends CI_Model{

		function getstugurboth($stuid_id){
	    //echo $stuid_id;exit;
		$query = $this->db->select('student_info.s_no,
			student_info.address1,guardian_info.father_full_name,
			student_info.class_id,student_info.gender,student_info.stud_image,
			student_info.name,student_info.enroll_num,student_info.city,
			student_info.state,student_info.pin_code,student_info.mobile')
		->from('student_info')
		->join('guardian_info', 'guardian_info.student_id = student_info.enroll_num')
		->where("student_info.enroll_num",$stuid_id)
		->where("student_info.status",1)
		->get();
		//echo $query->row()->id ;
		return $query->row();
	}

		function getperfeerecord($stuid_id){
			//print_r($stuid_id);exit;
		//$this->db->where("school_code", $this->session->userdata("school_code"));
		$this->db->where("student_id", $stuid_id);
		$val = $this->db->get("fee_deposit");
		return $val;
	}

		function getFeeSlab() {
		//$this->db->where("school_code", $schoolCode);
		$val = $this->db->get("late_fees");
		return $val;
	}

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
