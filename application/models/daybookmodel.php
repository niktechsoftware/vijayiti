<?php
class daybookModel extends CI_Model{

	public function fromStock($stream){
		$query = $this->db->insert("day_book", $stream);
		return $query;
	}
	function cash_pay($stream){
		$query = $this->db->insert("cash_payment", $stream);
		return $query;
	}

}
