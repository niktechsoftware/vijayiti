<?php class examModel extends CI_Model{
public function getExamInfo($data)
{ 
	$query1 = $this->db->get("period");
	return true;
}

function getPeriodD()
{
	$query1 = $this->db->get("period");
	return $query1;
}

function getExamName()
{
	$query1 = $this->db->get("exam_name");
	return $query1;
}
function insertexam($data)
{
	$query1 = $this->db->insert("exam_name",$data);
	return $query1;
}
function updateexam($data)
{   $this->db->where("exam_name",$data['exam_name']);
	$query1 = $this->db->update("exam_name",$data);
	return $query1;
}
function gateDate1($data)
{   $this->db->where("exam_name",$data);
$query1 = $this->db->get("exam_name");
return $query1;
}
function ensertdays1($data)
{   
	$query1 = $this->db->insert("exam_day",$data);
	return $query1;

}
function ensertshift($data)
{  
	$query1 = $this->db->insert("exam_shift",$data);
	return $query1;
}

function updatedays1($data)
{ 	$this->db->where("exam_name",$data['exam_name']);
	$this->db->where("start_date",$data['start_date']);
	$query1 = $this->db->insert("exam_day",$data);
	return $query1;

}
function updateshift($data)
{ 	$this->db->where("exam_name",$data['exam_name']);
	$this->db->where("start_date",$data['start_date']);
	$query1 = $this->db->insert("exam_shift",$data);
	return $query1;
}


function getshift($exam_name,$edate)
{ 	$this->db->where("exam_name",$exam_name);
	$this->db->where("start_date",$edate);
	$query1 = $this->db->get("exam_shift");
	return $query1;
}
function getshift1($exam_name)
{ 	$this->db->where("exam_name",$exam_name);

$query1 = $this->db->get("exam_shift");
return $query1;
}
function getday($exam_name,$edate)
{ 	$this->db->where("exam_name",$exam_name);
$this->db->where("start_date",$edate);
$query1 = $this->db->get("exam_day");
return $query1;
}
function insertExamData($data)
{
	$query1 = $this->db->insert("exam_time_table",$data);
	return $query1;
}
function checkExam($exam_name,$edate)
{
	$this->db->where("exam_name",$exam_name);
$this->db->where("start_date",$edate);
$query1 = $this->db->get("exam_day");
return $query1;
}

	function getExamDetail($examName,$edate){
		$this->db->where("exam_name",$examName);
		$this->db->where("start_date",$edate);
		$query1 = $this->db->get("exam_day");
		return $query1;
	}
	function getExamDetail1($examName,$edate){
		$this->db->where("exam_name",$examName);
		$this->db->where("start_date",$edate);
		$query1 = $this->db->get("exam_shift");
		return $query1;
	}
	
	
	function getExamMarks($data){
		$val=$this->db->get("general_settings")->row();
		$fsd = $val->finance_start_date;
		$this->db->where("fsd",$fsd);
		$this->db->where("exam_name",$data['exam_name']);
		$this->db->where("class1",$data['class1']);
		$this->db->where("subject",$data['subject']);
		$this->db->where("section",$data['section']);
		$query1 = $this->db->get("exam_info");
		return $query1;
	}

}
?>