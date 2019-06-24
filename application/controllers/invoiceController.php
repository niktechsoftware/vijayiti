<?php
class InvoiceController extends CI_Controller{
	function fee(){
		$data['pageTitle'] = 'Fee Invoice';
		$data['smallTitle'] = 'Fee Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Fee';
		
		$data['title'] = 'Print Fee Invoice';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'feeInvoice';
		$this->load->view("includes/mainContent", $data);
	}
	function feeInvoice(){
		$invoiceNo = $this->uri->segment(3);
		$studentId = $this->uri->segment(4);
		$isAdmission = $this->uri->segment(5);
		$this->db->where("invoice_no",$invoiceNo);
		$fee_deposit = $this->db->get("fee_deposit")->row();
		
		$this->db->where("invoice_no",$invoiceNo);
		$recieved_by = $this->db->get("day_book");
		if($recieved_by->num_rows() > 0){
			$emp = $recieved_by->row()->paid_by;
			$this->db->where("emp_no",$emp);
			$temp = $this->db->get("employee_info");
			if($temp->num_rows() > 0){
				$reciever_name = $temp->row()->first_name." ".$temp->row()->mid_name." ".$temp->row()->last_name;
			}else{
				$reciever_name = $this->db->get("general_settings")->row()->principle_name;
			}
		}else{
			$reciever_name = $this->session->userdata("name");
		}
		
		$this->db->where("invoice_no",$invoiceNo);
		$fee_bank_detail = $this->db->get("fee_bank_detail")->row();
		
		$this->db->where("student_id",$studentId);
		$fee_shedule = $this->db->get("fee_shedule")->row();
		
		$this->db->where("student_id",$studentId);
	
		$one_time_fee = $this->db->get("one_time_fee")->row();
		
		$this->db->where("enroll_num",$studentId);
		$stuInfo = $this->db->get("student_info")->row();
		
		$this->db->where("student_id",$studentId);
		$pInfo = $this->db->get("guardian_info")->row();
		
		$data['rowb'] = $fee_deposit;
		$data['fee_bank_detail'] = $fee_bank_detail;
		$data['fee_shedule'] = $fee_shedule;
		$data['one_time_fee'] = $one_time_fee;
		$data['isAdmission'] = $isAdmission;
		$data['reciever_name'] = $reciever_name;
		$data['rowc'] = $stuInfo;
		$data['pInfo'] = $pInfo;
		$data['title'] = "Fee reciept invoice";
		$this->load->view("invoice/feeInvoice",$data);
	}
	function printSaleReciept(){
		$data['pageTitle'] = 'Sale Invoice';
		$data['smallTitle'] = 'Sale Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Sale Invoice';
		
		$data['title'] = 'Print Sale Invoice';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'printSaleReciept';
		$this->load->view("includes/mainContent", $data);
	}
	
	function salaryReciept(){
		$data['pageTitle'] = 'Sale Invoice';
		$data['smallTitle'] = 'Sale Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Sale Invoice';
	
		$data['title'] = 'Print Sale Invoice';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'salaryReciept';
		$this->load->view("includes/mainContent", $data);
	}
	
	function salaryInvoice(){
		$data['title'] = "Fee reciept invoice";
		$this->load->view("invoice/salaryInvoice",$data);
	}
	
	function saleInvoice(){
		$data['title'] = "Fee reciept invoice";
		$this->load->view("invoice/saleInvoice",$data);
	}
	
	function invoiceCashPayment(){
		$data['title'] = "Fee reciept invoice";
		$this->load->view("invoice/invoiceCashPayment",$data);
	}
	
	function printProfile(){
		$data['title'] = "Student Profile";
		$this->load->view("invoice/printProfile",$data);
	}
	
function result(){
		$id = $this->uri->segment(3);
		$fsd = $this->uri->segment(4);
		
		$this->db->where("student_id",$id);
		$stuDetail = $this->db->get("student_info");
		$data['rowc'] = $stuDetail->row();
		
		$id = $this->uri->segment(3);
		$this->db->where("student_id",$id);
		$stuDetail = $this->db->get("guardian_info");
		$data['pInfo'] = $stuDetail->row();
		$futureDate=date('Y-m-d', strtotime('+1 year', strtotime($fsd)) );
		$data['fsd']=$fsd;
		$data['futureDate'] = $futureDate;
		$this->db->where("exam_date > ",$fsd);
		$this->db->where("exam_date < ",$futureDate);
		if($this->db->get("exam_name")->result()){
		$data['examName'] = $this->db->get("exam_name")->result();
		$data['title'] = "Mark Sheet";
		$this->load->view("invoice/result",$data);
		}
		else{
			echo "<div class='alert alert-warning'> No Record Found Please Select Valid FSD and Student ID.
					Please insure possible mistakes.<br>1. Selected Financial Start Date have no exam conducted in current date.
					<br>2.You have inserted wrong student ID please check it befoure generating Exam result.<br>
					3. May be Student is Inactive so please conform it...
					<br>
					<br>
					<br>
					Sorry !!!!!!!!!</div>";
		}
	}
	function result_extra(){
		$id = $this->uri->segment(3);
		$this->db->where("student_id",$id);
		$this->db->where("status","Active");
		$stuDetail = $this->db->get("student_info");
		$data['rowc'] = $stuDetail->row();
	
		$id = $this->uri->segment(3);
		$this->db->where("student_id",$id);
		$stuDetail = $this->db->get("guardian_info");
		$data['pInfo'] = $stuDetail->row();
	
		$data['title'] = "Mark Sheet";
		$this->load->view("invoice/result_extra",$data);
	}
	
	function invoiceCashDueFee(){
		$data['invoiceId']=$this->uri->segment(3);
		$data['title'] = "Fee reciept invoice";
		$this->load->view("invoice/invoiceCashDue",$data);
	}
	
	function printDueFee(){
		$data['pageTitle'] = 'Due Fee Invoice';
		$data['smallTitle'] = 'Due Fee Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Due Fee Invoice';
	
		$data['title'] = 'Due Fee Invoice';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'printDueFee';
		$this->load->view("includes/mainContent", $data);
	}
	function printTC(){
		$stud_id = $this->input->post("stud_id");
		$this->db->where("student_id",$stud_id);
		if($this->db->get("tc_certificate")->row())
		{
			$v=$this->db->get("tc_certificate")->row();
			$data['tcnumber'] = $v->tc_number;
			$data['tcdate'] = $v->tc_date;
		}
		else {
			 $value=$this->db->count_all("tc_certificate");
			 $number = 100+$value;
			 $tcnum = "TC".$number;
			 $data['tcnumber'] = $tcnum;
			 $this->db->where("student_id",$stud_id);
			 
			 $var= $this->db->get("student_info")->row();
			 $p1 = array(
			 		'tc_number' =>$tcnum,
			 		'tc_date' =>date('Y-m-d'),
			 		'book_no' =>2,
			 		'scholar_no'=> $var->scholer_no,
			 		'student_id'=> $stud_id
			 		
			 );
			 $this->db->insert("tc_certificate",$p1);
			
			 
		}
		
		
		$data['pageTitle'] = 'Due Fee Invoice';
		$data['smallTitle'] = 'Due Fee Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Due Fee Invoice';
		$data['title'] = 'printTC';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'printTC';
		$this->load->view("includes/mainContent", $data);
	}
	function printTC1(){
		$data['stud_id']=$this->uri->segment(3);
		$data['title'] = "printTcFinal";
		$this->load->view("invoice/printTCFinal",$data);
	}
	function printcC(){
		$data['pageTitle'] = 'Due Fee Invoice';
		$data['smallTitle'] = 'Due Fee Invoice';
		$data['mainPage'] = 'invoice';
		$data['subPage'] = 'Print Due Fee Invoice';
	
		$data['title'] = 'print Character Certificate';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'printcC';
		$this->load->view("includes/mainContent", $data);
	}
	function printcC1(){
		$data['stud_id']=$this->uri->segment(3);
		$data['title'] = "printccFinal";
		$this->load->view("invoice/printcCFinal",$data);
	}
}