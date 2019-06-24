<?php
class noticeModel extends CI_Model{
	function getNotice(){
		$req = $this->db->get("notice");
		return $req;
	}
	
	function updateNotice($data,$id){
		$this->db->where("id",$id);
		$req = $this->db->update("notice",$data);
		return $req;
	}
	
	function insertNotice($insertData){
		$req = $this->db->insert("notice",$insertData);
		return $req;
	}
	
	
}