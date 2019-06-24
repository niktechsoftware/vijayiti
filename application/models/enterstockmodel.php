<?php
class enterStockModel extends CI_Model{
function checkStock($itemNo){
	$this->db->where("item_no",$itemNo);
	$req = $this->db->get("enter_stock");
	return $req;
}

function enterStock($stockData){
	$query1 = $this->db->insert("enter_stock2",$stockData);
	$this->db->where("item_no",$stockData['item_no']);
	$query = $this->db->get("enter_stock");
	if($query->num_rows() > 0){
		$this->db->where("item_no",$stockData['item_no']);
		$query = $this->db->update("enter_stock",$stockData);
		return true;
	}else{
		$query2 = $this->db->insert("enter_stock", $stockData);
		return true;
	}
}

function updateStock($stockData){
	$this->db->where("item_no",$itemNo);
	$query = $this->db->update("enter_stock", $stockData);
	return $query;
}
function getStock(){
	
	$query = $this->db->get("enter_stock");
	return $query;
}

function getItemName($itemNo){
	$this->db->where("item_no",$itemNo);
	$req = $this->db->get("enter_stock");
	return $req;
}

function saleEntry($data)
{
	$query2 = $this->db->insert("sale_info", $data);
	return true;
}
	
function getItemName1($data){
		$this->db->where("item_no",$data['item_no']);
		$req = $this->db->get("enter_stock");
		return $req;
}
function updateStock1($stockData){
	$this->db->where("item_no",$stockData['item_no']);
	$query = $this->db->update("enter_stock", $stockData);
	return true;
}

function updatebill($data2){
	$query2 = $this->db->insert("bill_number", $data2);
	return true;
}

}