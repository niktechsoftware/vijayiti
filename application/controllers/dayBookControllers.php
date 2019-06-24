<?php
class dayBookControllers extends CI_Controller
{
	function daybook()
	{
		
		$condition=$this->input->post("value1");
		$dt1=$this->input->post("st_date");
		$dt2=$this->input->post("end_date");
		$q=$this->input->post("check_list");
		
		if(strlen($q) > 0){
			$a = mysql_query("select * from day_book where reason = '$q' AND pay_date >= '$dt1' AND pay_date <= '$dt2'");
		}
		else{	
			$a = mysql_query("select * from day_book where pay_date >= '$dt1' AND pay_date <= '$dt2'");
		}
		$b = mysql_num_rows($a);
		$dabit = 0;
		$cradit = 0;
		if($b > 0){
			$data['dt1']=$dt1;
			$data['dt2']=$dt2;
			$data['pageTitle'] = 'Day Book Report';
			$data['smallTitle'] = 'Day Book Report';
			$data['mainPage'] = 'Configuration';
			$data['subPage'] = 'Class, Section, Subject Stream';
			$data['condition'] = $condition;
			$data['title'] = 'Configure Class/Section';
			$data['headerCss'] = 'headerCss/daybookCss';
			$data['footerJs'] = 'footerJs/daybookJs';
			$data['mainContent'] = 'dayBook2';
			$data['a']=$a;
			$data['b']=$b;
			$data['dabit']=0;
			$data['cradit']=0;
			$this->load->view("includes/mainContent", $data);
		}
		else 
			redirect("index.php/login/dayBook/9");
	}
	
	function checkBalance(){
		$scholer_no = $this->input->post('q1');
		$balance1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date = '".date('Y-m-d')."'")->row();
		$balance = $balance1->closing_balance;
		if($balance < $scholer_no){
			echo '<font color="#FF0000">There is not enough avilable. Avl bal : Rs.'.$balance.'/-</font>';
		}
		else{
			echo '<font color="#006600">Avilable bal : Rs.'.$balance.'/-</font>';
		}
	}
	function empValidId(){
		$stu_id = $this->input->post('q1');
		$streem1 = $this->db->query("select * from employee_info where emp_no='$stu_id'");
		$no = $streem1->num_rows();
		if($no > 0){ 
			$streem = $streem1->row(); ?>
			<table>
		    	<tr>
		        	<td><font color="#006600"><?php echo $streem->first_name." ".$streem->mid_name." ".$streem->last_name; ?></font></td>
		        </tr>
		    </table>
		<?php 
		}
		else{
		?><font color="#FF0000">Wrong Employee Id</font><?php
		}
	}
	
	function cashPaymentDb(){
		$id_name = $this->input->post('id_name');
		$emp_id = $this->input->post('emp_id');
		$name = $this->input->post('name');
		$phone_no = $this->input->post('phone_no');
		$reason = $this->input->post('reason');
		$amount = $this->input->post('amount');
		$date = date('Y-m-d');
		
		// Calculat and update Invoice serial start
		$num1 = $this->db->count_all("invoice_serial") + 1000;
		$invoice = array(
				"invoice_no" =>$num1,
				"reason" => "Cash Payment handover",
				"invoice_date" => date('Y-m-d')
		);
		$this->db->insert("invoice_serial",$invoice);
		// Calculat and update Invoice serial end
		
		if($id_name == 'other'):
			$nm = $name;
		else:
			$nm = $emp_id;
		endif;
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		
		if($balance < $amount)
		{
			redirect("login/cashPayment/cash/balanceFalse");
		}
		else
		{	
			$close1 = $balance - $amount;
			$bal = array(
				"closing_balance" => $close1
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
			
			$cashPayment = array(
					"id_name" =>$id_name,
					"valid_id" =>$emp_id,
					"name" => $name,
					"phone_no" => $phone_no,
					"reason" => $reason,
					"amount" => $amount,
					"date" => date('Y-m-d'),
					"receipt_no" => $num1
			);
			
			$dayBook = array(
					"paid_to" =>$nm,
					"paid_by" =>$this->session->userdata("username"),
					"reason" => $reason,
					"dabit_cradit" => "Debit",
					"amount" => $amount,
					"closing_balance" => $close1,
					"pay_date" => date('Y-m-d'),
					"pay_mode" => "Cash"
			);
			
			if($this->db->insert('cash_payment',$cashPayment) && $this->db->insert('day_book',$dayBook)):
				redirect("dayBookControllers/invoiceCashPayment/$num1");
			else:
				redirect("login/cashPayment/cash/balanceFalse");
			endif;
		}
	}
	
	function invoiceCashPayment(){
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Cash Payment';
		$data['mainPage'] = 'Cash Payment';
		$data['subPage'] = 'Cash Invoice';
		
		$data['title'] = 'Accounts Cash Payment';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/transactionJs';
		$data['mainContent'] = 'invoiceCashPayment';
		$this->load->view("includes/mainContent", $data);
	}
	
	function bankTransactionDb(){
		$id_name = $this->input->post('id_name');
		$bank_name = $this->input->post('bank_name');
		$account_no = $this->input->post('account_no');
		$amount = $this->input->post('amount');
		$chequeTran_no = $this->input->post('chequeTranNum');
		$remark = $this->input->post('remark');
		$date = date('Y-m-d');
		
		$num1 = $this->db->count_all("invoice_serial") + 1000;
		$invoice = array(
				"invoice_no" =>$num1,
				"reason" => "Bank Transaction",
				"invoice_date" => date('Y-m-d')
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		
		if($id_name == 'deposite')
		{
			
			if($balance < $amount){
				redirect("login/cashPayment/bank/balanceFalse");
			}
			else{
				$close1 = $balance - $amount;
				$bal = array(
					"closing_balance" => $close1
				);
				$this->db->where("opening_date",date('Y-m-d'));
				$this->db->update("opening_closing_balance",$bal);
				
				$cashPayment = array(
					"id_name" =>$id_name,
					"bank_name" =>$bank_name,
					"account_no" => $account_no,
					"amount" => $amount,
					"date" => date('Y-m-d'),
					"receipt_no" => $num1,
					"chequeTran_no"=>$chequeTran_no,
					"remark"=>$remark
				);
				
				$dayBook = array(
						"paid_to" =>$id_name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Diposit To Bank",
						"dabit_cradit" => "Debit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"pay_mode" => "Cash"
				);
				
				if($this->db->insert('bank_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
					redirect("index.php/login/cashPayment/bank/bankTrue");
				else:
					redirect("index.php/login/cashPayment/bank/bankFalse");
				endif;
			}
		}
		elseif($id_name == 'receive'){
			$close1 = $balance + $amount;
				$bal = array(
					"closing_balance" => $close1
				);
				$this->db->where("opening_date",date('Y-m-d'));
				$this->db->update("opening_closing_balance",$bal);
				
				$cashPayment = array(
					"id_name" =>$id_name,
					"bank_name" =>$bank_name,
					"account_no" => $account_no,
					"amount" => $amount,
					"date" => date('Y-m-d'),
					"receipt_no" => $num1,
					"chequeTran_no"=>$chequeTran_no,
					"remark"=>$remark
				);
				
				$dayBook = array(
						"paid_to" =>$id_name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Receive From Bank",
						"dabit_cradit" => "Credit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"pay_mode" => "Cash"
				);
				
				if($this->db->insert('bank_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
					redirect("index.php/login/cashPayment/bankTrue");
				else:
					redirect("index.php/login/cashPayment/bankFalse");
				endif;
		}
	}
	
	function directorTransaction(){
		$action_transaction = $this->input->post('action_transaction');
		$amount = $this->input->post('amount');
		$name = $this->input->post('name');
		$disc = $this->input->post('disc');
		$date = date('Y-m-d');
		
		$num1 = $this->db->count_all("invoice_serial") + 1000;
		$invoice = array(
				"invoice_no" =>$num1,
				"reason" => "Director Transaction",
				"invoice_date" => date('Y-m-d')
		);
		$this->db->insert("invoice_serial",$invoice);
		
		
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		
				
		
		
			if($action_transaction == 'Diposited'):
			if($balance < $amount){
				redirect("login/cashPayment/director/balanceFalse");
			}
				$close1 = $balance - $amount;
				$cashPayment = array(
						"transaction_mode" =>"Cash Diposit",
						"action" =>$action_transaction,
						"applicant_name" => $name,
						"amount" => $amount,
						"reason"=>$disc,
						"date" => date('Y-m-d'),
						"receipt_no" => $num1
				);
				$dayBook = array(
						"paid_to" =>$name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Diposti to Director",
						"dabit_cradit" => "Debit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"pay_mode" => "Cash"
				);
			else:
				$close1 = $balance + $amount;
				$cashPayment = array(
						"transaction_mode" =>"Cash Recieve",
						"action" =>$action_transaction,
						"applicant_name" => $name,
						"amount" => $amount,
						"reason"=>$disc,
						"date" => date('Y-m-d'),
						"receipt_no" => $num1
				);
				$dayBook = array(
						"paid_to" =>$name,
						"paid_by" =>$this->session->userdata("username"),
						"reason" => "Recieve From Director",
						"dabit_cradit" => "Credit",
						"amount" => $amount,
						"closing_balance" => $close1,
						"pay_date" => date('Y-m-d'),
						"pay_mode" => "Cash"
				);
			endif;
			$bal = array(
					"closing_balance" => $close1
			);
			$this->db->where("opening_date",date('Y-m-d'));
			$this->db->update("opening_closing_balance",$bal);
	
					
			if($this->db->insert('director_transaction',$cashPayment) && $this->db->insert('day_book',$dayBook)):
			redirect("index.php/login/cashPayment/director/directorTrue");
			else:
			redirect("index.php/login/cashPayment/director/directorFalse");
			endif;
		
	}
	
	function transactionDetail(){		
		$seg3 = $this->uri->segment(3);
		$seg4 = $this->uri->segment(4);
		
		$data['pageTitle'] = 'Transaction Detail';
		if(($seg3 == "bank") && ($seg4 == "deposit")):
			$data['smallTitle'] = 'Bank Deposit';
			$data['mainPage'] = 'Bank Transation';
			$data['subPage'] = 'Bank Deposit Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "bank") && ($seg4 == "withdrwal")):
			$data['smallTitle'] = 'Bank Withdrwal';
			$data['mainPage'] = 'Bank Transation';
			$data['subPage'] = 'Bank Withdrwal Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "director") && ($seg4 == "deposit")):
			$data['smallTitle'] = 'Withdrwal from Director';
			$data['mainPage'] = 'Withdrwal from Director';
			$data['subPage'] = 'Withdrwal from Director Detail';
			$data['title'] = 'Transaction Detail';
		elseif(($seg3 == "director") && ($seg4 == "withdrwal")):
			$data['smallTitle'] = 'Received from Director';
			$data['mainPage'] = 'Received from Director';
			$data['subPage'] = 'Received from Director Detail';
			$data['title'] = 'Transaction Detail';
		endif;
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/daybookJs';
		$data['mainContent'] = 'transactionDetail';
		$this->load->view("includes/mainContent", $data);
	}

}
?>
