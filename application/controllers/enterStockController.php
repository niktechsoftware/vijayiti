<?php class enterStockController extends CI_Controller{
	
	function checkStock(){
		$msg = '<div class="alert alert-info"><button data-dismiss="alert" class="close">&times;</button><strong>New Item Entry :) </strong></div>';
		$itemNo = $this->input->post("itemNo");
		
		$this->load->model("enterStockModel");
		$var = $this->enterStockModel->checkStock($itemNo);
		if($var->num_rows() > 0){
			foreach ($var->result() as $row){
				$itemData = array(
						"itemName" =>$row->item_name,
						"itemCat" =>$row->item_cat,
						"itemsize" =>$row->item_size,
						"price" =>$row->item_price,
						"itemQuantity"=>$row->item_quantity,
						"msg" => ""
				);
			}
		}
		else{
			$itemData = array(
					"itemName" =>"",
					"itemCat" =>"",
					"itemsize" =>"",
					"price" =>"",
					"itemQuantity"=>"",
					"msg" => $msg
			);
		}
		
		echo (json_encode($itemData));
	}
	
	
	
	function enterStock(){
		$stockData = array(
				"item_no" => $this->input->post("itemNo"),
				"item_name" => $this->input->post("itemName"),
				"item_cat" => $this->input->post("itemCat"),
				"item_size" => $this->input->post("itemSize"),
				"item_price" => $this->input->post("price"),
				"item_quantity" => $this->input->post("itemQuantity"),
				"extraQuantity" => $this->input->post("extraQuantity"),
				"a_date" => date("Y-m-d")
		);
		
		$this->load->model("enterStockModel");
		$this->enterStockModel->enterStock($stockData);
		redirect("index.php/login/enterStock");
	}
	
		
	function checkStudID(){
			$pBalance = array();
			$tid = $this->input->post("cat");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkStudID($tid);
			if($var->num_rows() > 0){
				
				foreach ($var->result() as $row){
					
					$msg = '<div class="alert alert-success">ID Found ! <strong>'. $row->first_name.' '.$row->midd_name.' '.$row->last_name.' </strong></div>';
					$pBalance['msg'] = $msg;
					$pBalance['indicator'] = "true";
					}
					$valid_id = $this->teacherModel->checkBal($tid);
					if($valid_id->num_rows() > 0){
						foreach ($valid_id->result() as $row){
							$pBalance['balance'] = $row->balance;
						}
					}
					echo (json_encode($pBalance));
			}
			else{
				$msg = '<div class="alert alert-danger">Sorry :( <strong> Student Not Found ! Wrong Student Id !</strong></div>';
				$pBalance['msg'] = $msg;
				$pBalance['balance'] = '';
				$pBalance['indicator'] = "false";
				echo (json_encode($pBalance));
			}
			
		}
		function checkempID(){
			$pBalance = array();
			$tid = $this->input->post("teacherid");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkID($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					$msg = '<div class="alert alert-success">ID Found ! <strong>'. $row->first_name.' '.$row->mid_name.' '.$row->last_name.' </strong></div>';
					$pBalance['msg'] = $msg;
					$pBalance['indicator'] = "true";
					}
					$valid_id = $this->teacherModel->checkBal($tid);
					if($valid_id->num_rows() > 0){
						foreach ($valid_id->result() as $row){
							$pBalance['balance'] = $row->balance;
						}
					}
					echo (json_encode($pBalance));
			}
				else{
				$msg = '<div class="alert alert-danger">Sorry :( <strong> Employee Not Found ! Wrong Employee Id !</strong></div>';
				$pBalance['msg'] = $msg;
				$pBalance['balance'] = '';
				$pBalance['indicator'] = "false";
				echo (json_encode($pBalance));
			}
			
			
		}
		function getTData(){
			$tid = $this->input->post("name");
			$this->load->model("enterStockModel");
			$var = $this->enterStockModel->getItemName($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					$itemData = array(
							"itemName" =>$row->item_name,
							"itemCat" =>$row->item_cat,
							"itemsize" =>$row->item_size,
							"price" =>$row->item_price
							);
							
				}
							
				}
				echo (json_encode($itemData));
		}
		
		function saleStock(){
			
			$billno = $this->db->count_all("invoice_serial");
			$this->load->model("daybookModel");
			$this->load->model("enterStockModel");
			$billno = $billno + 1000;
				$validID = "";
				if(strlen($this->input->post("studID"))>0){
					$validID = $this->input->post("studID");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID
					);
					
					$this->enterStockModel->updatebill($data2);
				}
				else if(strlen($this->input->post("empID"))>0){
					$validID = $this->input->post("empID");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID
					);
					$this->enterStockModel->updatebill($data2);
				}else {
					$validID=$this->input->post("empFirstName");
					$emp_phone=$this->input->post("empphone");
					$data2 = array(
							"bill_num"=>$billno,
							"buyer_id"=>$validID,
							"buyer_phone"=>$emp_phone
					);
				}
				
				$this->db->select("closing_balance as cb");
				$this->db->where("opening_date",date("Y-m-d"));
				$cb = $this->db->get("opening_closing_balance")->row()->cb;
				
				$cl_balance = $cb + $this->input->post("paid");
				
				$cbData = array(
					"closing_balance" => $cl_balance
				);
				$this->db->where("opening_date",date("Y-m-d"));
				$this->db->update("opening_closing_balance",$cbData);
				
				$daybook=array(
						"amount" => $this->input->post("paid"),
						"pay_date"=> date("Y-m-d"),
						"reason" =>"From sale Stock",
						"pay_mode"=>"Cash, ".$billno,
						"closing_balance" => $cl_balance,
						"paid_to" => $validID,
						"paid_by"=> $this->session->userdata("username")
				);
				$daybook1 = $this->daybookModel->fromStock($daybook);
				
			for($i=1; $i<=15;$i++)
			{
				if(strlen($this->input->post("item_no$i")) > 0)
				{
				$data = array(
						"item_no" => $this->input->post("item_no$i"),
						"pries_per_item" => $this->input->post("item_price$i"),
						"item_quant" => $this->input->post("item_quantity$i"),
						"dis" => $this->input->post("item_discount$i"),
						"dis_rs" => $this->input->post("discount$i"),
						"total_price" => $this->input->post("total_price$i"),
						"sub_total" => $this->input->post("sub_total$i"),
						"total"=> $this->input->post("tt"),
						"paid" => $this->input->post("paid"),
						"previous_balance" => $this->input->post("p_balance"),
						"balance" =>  $this->input->post("balance"),
						"id_name" => $this->input->post("category"),
						"valid_id" => $validID,
						"name" => $this->input->post("empFirstName"),
						"phone_no"=> $this->input->post("empphone"),
						"date"=> date("Y-m-d"),
						"bill_no" =>$billno
					);
				$var1 = $this->enterStockModel->saleEntry($data);
					if($var1):
						$var = $this->enterStockModel->getItemName1($data);
						if($var->num_rows() > 0):
							foreach ($var->result() as $row):
								$q = $row->item_quantity;
								$data1 = array(
									"item_quantity" => ($q - $data["item_quant"]),
									"item_no" =>  $data["item_no"]
								);
								$this->enterStockModel->updateStock1($data1);
							endforeach;
						endif;
					endif;
			}
		}
		
					if($var1||$var)
					{
					$invoiceData = array(
						"invoice_no" => $billno,
						"reason" => "Sale Invoice",
						"invoice_date" => date("Y-m-d")
					);
						$this->db->insert("invoice_serial",$invoiceData);
						
						//---------------------------------------------- CHECK SMS SETTINGS -----------------------------------------
						$paid1 = $this->input->post("paid");
						$total= $this->input->post("tt");
						$balance =  $this->input->post("balance");
						
						$val=$this->db->get("sms_setting")->row();
						$senderiD=$val->sender_id;
						$authkey=$val->auth_key;
						
						$isSMS = $this->db->get("sms")->row()->purchase;
						
						if($isSMS=="yes")
						{
							$this->load->helper("sms");
							if(strlen($this->input->post("studID"))>0){
								$validID = $this->input->post("studID");
								$this->db->where("student_id",$validID);
								$var=$this->db->get("guardian_info")->row();
								
								$this->db->where("student_id",$validID);
								$this->db->where("status","Active");
								$stu=$this->db->get("student_info")->row();
								
								$fname=$var->father_full_name;
								$fmobile=$var->f_mobile;
								$msg="Hi ".$stu->first_name.". Thank you for purchasing. Your total bill is Rs.".$total."/- and paid Rs.".$paid1." with balance Rs.".$balance."/-. For more information. Please logon to Your Account : ".$val->web_url;
								sms($authkey, $msg,$senderiD,$fmobile);
								
							}
							else if(strlen($this->input->post("empID"))>0){
								$validID = $this->input->post("empID");
								$this->db->where("emp_no",$validID);
								$stu =$this->db->get("employee_info")->row();
								$fmobile=$stu->mobile;
								$msg="Hi ".$stu->first_name.". Thank you for purchasing. Your total bill is Rs.".$total."/- and paid Rs.".$paid1." with balance Rs.".$balance."/-. For more information. Please logon to Your Account : ".$val->web_url;
								sms($authkey, $msg,$senderiD,$fmobile);
							
							
							}else {
								$empname1=$this->input->post("empFirstName");
								$emp_phone=$this->input->post("empphone");
								$msg="Hi ".$empname1.". Thank you for purchasing. Your total bill is Rs.".$total."/- and paid Rs.".$paid1." with balance Rs.".$balance."/-. For more information. Please logon to Your Account : ".$val->web_url;
								sms($authkey, $msg,$senderiD,$emp_phone);
							}
							
						//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
						}
						
							redirect("index.php/invoiceController/printSaleReciept/$billno");
						
					}
	}
	
	function editSaleStock(){
			
		$billno = $this->db->count_all("invoice_serial");
		$this->load->model("daybookModel");
		$this->load->model("enterStockModel");
		$billno = $billno + 1000;
		$validID = "";
		if($this->input->post("id_name") == "Student Id"){
			$validID = $this->input->post("valid_id");
			$data2 = array(
					"bill_num"=>$billno,
					"buyer_id"=>$validID
			);
				
			$this->enterStockModel->updatebill($data2);
		}
		else if($this->input->post("id_name") == "Employee Id"){
			$validID = $this->input->post("empID");
			$data2 = array(
					"bill_num"=>$billno,
					"buyer_id"=>$validID
			);
			$this->enterStockModel->updatebill($data2);
		}else {
			$validID=$this->input->post("empFirstName");
			$emp_phone=$this->input->post("empphone");
			$data2 = array(
					"bill_num"=>$billno,
					"buyer_id"=>$validID,
					"buyer_phone"=>$emp_phone
			);
			$this->enterStockModel->updatebill($data2);
		}
		$paid = $this->input->post("paid");
		if($paid > 0){
			$msg = "Cradit from Edit sale bill.";
		}
		if($Paid == 0){
			$msg = "Edit sale bill.";
		}else{
			$msg = "Dabit from Edit sale bill.";
		}
	
		$this->db->select("closing_balance as cb");
		$this->db->where("opening_date",date("Y-m-d"));
		$cb = $this->db->get("opening_closing_balance")->row()->cb;
	
		$cl_balance = $cb - ($paid);
	
		$cbData = array(
				"closing_balance" => $cl_balance
		);
		$this->db->where("opening_date",date("Y-m-d"));
		$this->db->update("opening_closing_balance",$cbData);
	
		$daybook=array(
				"amount" => $paid,
				"pay_date"=> date("Y-m-d"),
				"reason" =>$msg,
				"pay_mode"=>"Cash, ".$billno,
				"closing_balance" => $cl_balance,
				"paid_to" => $validID,
				"paid_by"=> $this->session->userdata("username")
		);
		$daybook1 = $this->daybookModel->fromStock($daybook);
	
		for($i=1; $i<=$this->input->post("rows"); $i++)
		{
		if(strlen($this->input->post("item_no$i")) > 0)
		{
		$data = array(
				"item_no" => $this->input->post("item_no$i"),
				"pries_per_item" => $this->input->post("item_price$i"),
				"item_quant" => $this->input->post("item_quantity$i"),
				"dis" => $this->input->post("item_discount$i"),
				"dis_rs" => $this->input->post("discount$i"),
				"total_price" => $this->input->post("total_price$i"),
				"sub_total" => $this->input->post("sub_total$i"),
				"total"=> $this->input->post("tt"),
				"paid" => $paid,
				"previous_balance" => $this->input->post("p_balance"),
				"balance" =>  $this->input->post("balance"),
				"id_name" => $this->input->post("id_name"),
				"valid_id" => $validID,
				"name" => $this->input->post("empFirstName"),
				"phone_no"=> $this->input->post("empphone"),
				"date"=> date("Y-m-d"),
				"bill_no" =>$billno
				);
		$var1 = $this->enterStockModel->saleEntry($data);
		if($var1):
			$var = $this->enterStockModel->getItemName1($data);
			if($var->num_rows() > 0):
				$row = $var->row();
				$q = $row->item_quantity;
				
				if(strlen($this->input->post("item_quantity$i")) > 0){
					$quant = $this->input->post("item_quantity$i");
				}
				else{
					$quant = 0;
				}
				$old_quant = $this->input->post("old_item_quantity$i");
				
				$newQuant = $old_quant - $quant;
				
				$data1 = array(
					"item_quantity" => ($q - ($newQuant)),
					"item_no" =>  $data["item_no"]
				);
				$this->enterStockModel->updateStock1($data1);
			endif;
		endif;
		}
	}
	
	if($var1||$var)
	{
		redirect("index.php/invoiceController/printSaleReciept/$billno");
	
	}
	}
}
?>