<?php
class ConfigureClassModel extends CI_Model{
	
	public function addStream($stream){
		$db = array(
			"stream" => $stream	
		);
		if(strlen($stream) > 1){
			$this->db->insert("stream",$db);
		}
		$query = $this->db->get("stream");
		return $query;
	}
	
	public function updateStream($streamId,$streamName){
		$val = array(
				"stream" => $streamName
		);
		$this->db->where("id",$streamId);
		$query = $this->db->update("stream",$val);
		return true;
	}
	
	public function deleteStream($streamId){
		$this->db->where("id",$streamId);
		$query = $this->db->delete("stream");
		return $query;
	}
	
	//---------------------------------------- Add Section code Start Here ------------------------------------
	
	public function addSection($section){
		$db = array(
				"section" => $section
		);
		if(strlen($section) > 1){
			$this->db->insert("class_section",$db);
		}
		$query = $this->db->get("class_section");
		return $query;
	}
	
	public function updateSection($sectionId,$sectionName){
		$val = array(
				"section" => $sectionName
		);
		$this->db->where("id",$sectionId);
		$query = $this->db->update("class_section",$val);
		return $query;
	}
	
	public function deleteSection($sectionId){
		$this->db->where("id",$sectionId);
		$query = $this->db->delete("class_section");
		return $query;
	}
	
	//---------------------------------------- Add Class code Start Here ------------------------------------
	
	public function addClass($section){
		if((strlen($this->input->post("className")) > 0) && (strlen($this->input->post("classStream")) > 0) && (strlen($this->input->post("classSection")) > 0)){
			$this->db->where("class_name",$section->class_name);
			$this->db->where("stream",$section->stream);
			$this->db->where("section",$section->section);
			$val=$this->db->get(class_info);
			if($val->num_rows()>0){
				
			}else{
						$this->db->insert("class_info",$section);
			}
			
		}
		$query = $this->db->get("class_info");
		return $query;
		
	}
	
	public function updateClass($sectionId,$sectionName){
		$val = array(
				"section" => $sectionName
		);
		$this->db->where("id",$sectionId);
		$query = $this->db->update("class_section",$val);
		return $query;
	}
	
	public function deleteClass($sectionId){
		$this->db->where("id",$sectionId);
		$query = $this->db->delete("class_section");
		return $query;
	}
	
	public function getClassList(){
		$query = $this->db->query("SELECT * from class_info ORDER BY id");
		return $query;
	}
	
	public function getClassName(){
		$query = $this->db->query("SELECT DISTINCT class_name from class_info ORDER BY id");
		return $query;
	}
	
	public function getStreamByClassName($className){
		$query = $this->db->query("SELECT DISTINCT streem FROM class_info WHERE class_name = '$className' ");
		return $query;
	}
	
	public function getSectionByClassStream($className,$stream){
		$query = $this->db->query("SELECT DISTINCT section FROM class_info WHERE class_name = '$className' AND streem = '$stream' ");
		return $query;
	}
	
	//------------------------------------------------- Edit Class Detail -------------------------------
	
	function updateClassDetail($data,$rowId){
		$teacherId = $this->input->post("teacherId");
		if(strlen($teacherId) > 2){
			$this->db->where("emp_no",$teacherId);
			$result = $this->db->get("employee_info");
			if($result->num_rows() > 0){
				$this->db->where("id",$rowId);
				$result = $this->db->update("class_info",$data);
				return true;
			}
			else{
				return false;
			}
		}
		else{
			$this->db->where("id",$rowId);
			$result = $this->db->update("class_info",$data);
			return true;
		}
	}
	
	function deleteClassDetail($classId,$section,$rowId){
		$this->db->where("status","Active");
		$this->db->where("class_id",$classId);
		$this->db->where("section",$section);
		$result = $this->db->get("student_info");
		if($result->num_rows() > 0){
			return false;
		}
		else{
			$this->db->where("id",$rowId);
			$this->db->delete("class_info");
			return true;
		}
	}
	
}