<?php
class ConfigureFeeModel extends CI_Model{
	function feeColumnLIst(){
		$fields = $this->db->list_fields('fee_deposit');
		return $fields;
	}
}