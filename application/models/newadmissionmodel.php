<?php class NewAdmissionModel extends CI_Model{
	
	public function addInfo($stream){
		$query = $this->db->insert("student_info", $stream);
		return $query;
	}
	
	public function addInfo1($stream){
		$query = $this->db->insert("guardian_info", $stream);
		return $query;
	}
	
	public function updateInfo($streamId,$streamName){
		$val = array(
				"stream" => $streamName
		);
		$this->db->where("id",$streamId);
		$query = $this->db->update("stream",$val);
		return $query;
	}
	
	public function deleteInfo($streamId){
		$this->db->where("id",$streamId);
		$query = $this->db->delete("stream");
		return $query;
	}
	
	//---------------------------------------- Add Section code Start Here ------------------------------------
	
	
	
	
}
?>
