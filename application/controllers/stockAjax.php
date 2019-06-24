<?php
class StockAjax extends CI_Controller{
	function editStock(){
		$billNo = $this->input->post("billNo");
		$this->db->where("bill_no",$billNo);
		$bill = $this->db->get("sale_info");
		$data['billNo'] = $billNo;
		$data['bill'] = $bill;
		
		if($bill->num_rows() > 0){
			$this->load->view("ajax/stockEditSale",$data);
		}else{
			echo "<font color='red'>Bill Number dose not matched...</font>";
		}
	}
}