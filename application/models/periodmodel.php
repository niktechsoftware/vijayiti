<?php
class periodModel extends CI_Model{
function insertperiod($data)
{ 
	$query1 = $this->db->insert("period",$data);
	return true;
}

function getPeriodD()
{
	$query1 = $this->db->get("period");
	return $query1;
}

function getClass()
{
	$query1 = $this->db->get("class_info");
	return $query1;
}

function getTeacherName(){
	$this->db->where("status","Active");
	$this->db->where("job_category","teacher");
	$query1 = $this->db->get("employee_info");
	return $query1;
}

function getSubjectName($data)
{	$this->db->where("class_id",$data['className']);
$this->db->where("section",$data['section']);
$query1 = $this->db->get("subject");
return $query1;
}
function periodSchedule($data)
{
$query1 = $this->db->insert("time_table",$data);
return true;
}

	function uniqueClass()
	{
		$var = $this->db->query("SELECT DISTINCT class1 FROM time_table");
		return $var;
	}
	
	function uniquePeriod()
	{
		$var = $this->db->query("SELECT DISTINCT period,time FROM time_table");
		return $var;
	}
	
	function checkvalue($data)
	{	$query = $this->db->query("SELECT * FROM time_table WHERE day LIKE '%$data%'");
		return $query;
	}
	
	function deldaywise($data)
	{	$query = $this->db->query("DELETE FROM time_table WHERE day LIKE '%$data%'");
	return $query;
	}

}