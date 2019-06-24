<?php
class searchController extends CI_Controller{
	public function searchStudent(){
	$keyword = '%'.$this->input->post("keyword").'%';
		$sql = "SELECT * FROM student_info WHERE first_name LIKE '$keyword' OR student_id LIKE '$keyword' ORDER BY first_name ASC LIMIT 0, 10";
		$query = $this->db->query($sql);
		foreach ($query->result() as $rs) {
			// put in bold the written text
			//$country_name = str_replace($this->input->post("keyword"), '<b>'.$this->input->post("keyword").'</b>', $rs->p_name);
			// add new option
		    echo '<li onclick="set_item(\''.str_replace("'", "\'", $rs->student_id." - ".$rs->first_name).'\')"><a href="#javascript();">'.$rs->student_id." - ".$rs->first_name.'</a></li>';
		}
	}
}