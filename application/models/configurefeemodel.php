<?php
class ConfigureFeeModel extends CI_Model{
	function feeColumnLIst(){
		$fields = $this->db->list_fields('fee_deposit');
		return $fields;
	}

	function update_School_Detail($dbfield,$updatevalue,$scode){
		$data =array(
				$dbfield	=> $updatevalue
		);
		$this->db->where("school_code",$scode);
		$this->db->update("general_settings",$data);
		return true;
	}
	
	function getStream(){
		
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$stream = $this->db->get("stream");
		return $stream;
	}
	public function addStream($stream){
		$db = array(
				"school_code"=>$this->session->userdata('school_code'),
				"stream" => $stream
		);
		if(strlen($stream) > 1){
			$this->db->insert("stream",$db);
		}
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->get("stream");
		return $query;
	}
	function update1($tablename,$data,$rowSno){
		//$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("id",$rowSno
	);
		$result = $this->db->update($tablename,$data);
		return $result;
	}
	public function updateStream($streamId,$streamName){
		$val = array(
				"stream" => $streamName
		);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("id",$streamId);
		$query = $this->db->update("stream",$val);
		return true;
	}
	public function deleteStream($streamId){
		$this->db->where("id",$streamId);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->delete("stream");
		return $query;
	}
	//---------------------------------------- Add Section code Start Here ------------------------------------
	
	public function addSection($section){
		$db = array(
				"section" => $section,
				"school_code"=>$this->session->userdata('school_code')
		);
		if(strlen($section) > 1){
				
			$this->db->insert("class_section",$db);
		}
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->get("class_section");
		return $query;
	}
	
	public function updateSection($sectionId,$sectionName){
		$val = array(
				"section" => $sectionName
				
		);
		$this->db->where("id",$sectionId);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->update("class_section",$val);
		return $query;
	}
	
	public function deleteSection($sectionId){
		$this->db->where("id",$sectionId);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->delete("class_section");
		return $query;
	}
	public function getSectionByClassStream($className,$stream){
		$sc = $this->session->userdata('school_code');
		$query = $this->db->query("SELECT DISTINCT section FROM class_info WHERE class_name = '$className' AND streem = '$stream' AND school_code='$sc' ");
		return $query;
	}
	public function getStreamByClassName($className){
		$sc = $this->session->userdata('school_code');
		$query = $this->db->query("SELECT DISTINCT streem FROM class_info WHERE class_name = '$className' and school_code='$sc' ");
		return $query;
	}
	public function addClass($section){
		if((strlen($this->input->post("className")) > 0) && (strlen($this->input->post("classStream")) > 0) && (strlen($this->input->post("classSection")) > 0)){
				
			$this->db->insert("class_info",$section);
				
		}
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->get("class_info");
		return $query;
	}
	
	public function updateClass($sectionId,$sectionName){
		$val = array(
				"section" => $sectionName
		);
		$this->db->where("id",$sectionId);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->update("class_section",$val);
		return $query;
	}
	
	public function deleteClass($sectionId){
		$this->db->where("id",$sectionId);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$query = $this->db->delete("class_section");
		return $query;
	}
	
	public function getClassList(){
		$sc = $this->session->userdata('school_code');
		//$query = $this->db->query("SELECT * from class_info where school_code = $sc ORDER BY id");
		$query = $this->db->query("select distinct section FROM class_info WHERE school_code='$sc'");
		return $query;
	
	}
	public function getStreamList(){
		//$sc = $this->session->userdata('school_code');
		$query = $this->db->query("SELECT DISTINCT streem from class_info ORDER BY id");
		return $query;
	}
	public function getSectionList()
	{
		$sc = $this->session->userdata('school_code');
		$query = $this->db->query("SELECT * from class_section where school_code = $sc ORDER BY id");
		return $query;

	}
	
	public function getClassName(){
		$sc = $this->session->userdata('school_code');
		$query = $this->db->query("SELECT DISTINCT class_name from class_info school_code = $sc ORDER BY id");
		return $query;
	}
	function updateClassDetail($data,$rowId){
		$teacherId = $this->input->post("teacherId");
		if(strlen($teacherId) > 2){
			$this->db->where("username",$teacherId);
			$this->db->where("school_code",$this->session->userdata('school_code'));
			$result = $this->db->get("employee_info");
			if($result->num_rows() > 0){
				$this->db->where("id",$rowId);
				$this->db->where("school_code",$this->session->userdata('school_code'));
				$result = $this->db->update("class_info",$data);
				return true;
			}
			else{
				return false;
			}
		}
		else{
			$this->db->where("id",$rowId);
			$this->db->where("school_code",$this->session->userdata('school_code'));
			$result = $this->db->update("class_info",$data);
			return true;
		}
	
		return $result;
	}
	
	function deleteClassDetail($classId,$section,$rowId){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("status","Active");
		$this->db->where("class_id",$classId);
		$this->db->where("section",$section);
		$result = $this->db->get("student_info");
		if($result->num_rows() > 0){
			return false;
		}
		else{
			$this->db->where("school_code",$this->session->userdata('school_code'));
			$this->db->where("id",$rowId);
			$this->db->delete("class_info");
			return true;
		}
	}
	
	function getSubject($clName,$stream,$section){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("class_id",$clName);
		$this->db->where("stream",$stream);
		$this->db->where("section",$section);
		$result = $this->db->get("subject");
		return $result;
	}
	function addSubject($data){
		$result = $this->db->insert("subject",$data);
		return $result;
	}
	function updateSubject($data,$id){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("id",$id);
		$result = $this->db->update("subject",$data);
		return $result;
	}
	
	function deleteSubject($id){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("id",$id);
		$result = $this->db->delete("subject");
		return $result;
	}
	
	function save_fee_deposit($data,$month_number,$dd){
		$this->db->where("month_number",$month_number);
		//$this->db->where("month_name",$month_name);
		//$this->db->where("school_code",$this->session->userdata('school_code'));
		
		$result = $this->db->get("fee_card_detail");
		if($result->num_rows()>0){
			$r=$result->row();
			$this->db->where("id",$r->id);
			$this->db->update("fee_card_detail",$data);
			//$this->db->where("school_code",$this->session->userdata('school_code'));
			//$this->db->where("month_number",$month_number);
			//$this->db->where("finance_start_date",$this->session->userdata("fsd"));
			//$this->db->update("fee_deposit",$dd);
		}
		else{
			$this->db->insert("fee_card_detail",$data);
		}
		return true;
	}

	
	function check_fee_deposit($month_number){
		$this->db->where("month_number",$month_number);
		//$this->db->where("month_name",$month_name);
		$this->db->where("school_code",$this->session->userdata('school_code'));
		//$this->db->where("fsd",$this->session->userdata("fsd_id"));
		$result = $this->db->get("fee_card_detail");
		return $result;
	}
	
	function addfeeDetails($data){
		$result = $this->db->insert("class_fees",$data);
		return true;
	}
	 function apply_method($data)
	 {
		
		$result = $this->db->insert("late_fees",$data);
		return $result;
	 }
	
	function getfeeDetails($classid){
		$fsd = $this->session->userdata("fsd");
	$query = $this->db->query("SELECT *  FROM class_fees WHERE  class_id='$classid' and fsd = '$fsd'");
		return $query;
	}
	function updatefeedetail($data,$rowSno){
		//$this->db->where("school_code",$this->session->userdata('school_code'));
		//$this->db->where("fsd",$this->session->userdata('fsd'));
		$this->db->where("id",$rowSno);
		$result = $this->db->update('class_fees',$data);	
		return $result;
	}
	
	function deletefeedetail($rowSno){
		//$this->db->where("school_code",$this->session->userdata('school_code'));
		//$this->db->where("fsd",$this->session->userdata('fsd'));
		$this->db->where("id",$rowSno);
		$result = $this->db->delete('class_fees');
		return $result;
	}
	function delete1($tablename,$rowSno){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		
		$this->db->where("id",$rowSno);
		$result = $this->db->delete($tablename);
		return $result;
	}
	function deletetransport($tablename,$rowSno){
		
		$this->db->where("v_id",$rowSno);
		$this->db->delete("transport_root_amount");
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$this->db->where("id",$rowSno);
		$result1 = $this->db->delete($tablename);
		return $result1;
	}
	function insert_transport($data){
		$this->db->insert('transport',$data);
		return true;
	}
	function getvehicle(){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$result = $this->db->get("transport");
		return $result;
	}
	function getroot(){
		$this->db->where("school_code",$this->session->userdata('school_code'));
		$findtrans  = $this->db->get("transport");
		
		return $findtrans;
	}
}