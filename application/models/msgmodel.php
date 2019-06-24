<?php
class msgModel extends CI_Model{
	public function delNotice($id){
		$query = $this->db->query("DELETE FROM notice WHERE id = $id");
		return true;
	}
	function getdetail($id){
		$this->db->where("id",$id);
		$query = $this->db->get("notice");
		return $query;
	}
	function sendSms($data){
		$query = $this->db->insert("message",$data);
		return $query;
	}
}