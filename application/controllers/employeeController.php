<?php
class EmployeeController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model("employeeModel");
	}
	function employeeList(){
		$data['result'] = $this->employeeModel->employeeList();
		$data['name'] = $this->input->post("name");
		$data['emp_no'] = $this->input->post("emp_no");
		$data['job_title'] = $this->input->post("job_title");
		$data['mobile'] = $this->input->post("mobile");
		$data['address'] = $this->input->post("address");
		$data['email'] = $this->input->post("email");
		$data['category'] = $this->input->post("category");
		$data['dob'] = $this->input->post("dob");
		$data['job_category'] = $this->input->post("job_category");
		$data['qualification'] = $this->input->post("qualification");
		$data['experiance'] = $this->input->post("experiance");
		$data['status'] = $this->input->post("status");
		$data['city'] = $this->input->post("city");
		$data['state'] = $this->input->post("state");
		$data['pin_code'] = $this->input->post("pin_code");
		$data['phone'] = $this->input->post("phone");
		$data['join_date'] = $this->input->post("join_date");
		$data['gender'] = $this->input->post("gender");
		
		$this->load->view("ajax/employeeList",$data);
	}
	
	function addEmpInfo(){
			
		$id = $this->db->query("SELECT id From employee_info order by id DESC Limit 1")->row();
		$eid = $id->id + 20001;
		
		$this->form_validation->set_error_delimiters('<div class="col-sm-12"><label class="text-danger">', '</label></div>');
		$this->form_validation->set_rules('jobTitle','Job Title', 'trim|required');
		$this->form_validation->set_rules('jobCategory','Job Category', 'trim|required');
		$this->form_validation->set_rules('empFirstName','First Name', 'trim|required');
		$this->form_validation->set_rules('empLastName','Last Name', 'trim|required');
		$this->form_validation->set_rules('empMiddleName','Middle Name', 'trim');
		$this->form_validation->set_rules('empDob','Date Of Birth', 'trim|required');
		$this->form_validation->set_rules('gender','Gender', 'trim|required');
		$this->form_validation->set_rules('experience','Experience', 'trim|required');
		$this->form_validation->set_rules('employeeAddLine1','Address', 'trim|required');
		$this->form_validation->set_rules('empState','State', 'trim|required');		
		$this->form_validation->set_rules('empCity','City', 'trim|required');
		$this->form_validation->set_rules('empPin','PIN', 'trim|required');
		$this->form_validation->set_rules('j_date','Joining Date', 'trim|required');
		$this->form_validation->set_rules('employeeAddLine2','Area', 'trim|required');
		$this->form_validation->set_rules('empmobileNumber','Mobile Number','trim|required|numeric|min_length[10]|max_length[10]');
		$this->form_validation->set_rules('password','Password', 'trim|required');
		$this->form_validation->set_rules('re-password','Re-Password', 'trim|required|matches[password]');
		
		$this->form_validation->set_rules("empBnakName",'Bnak Name','trim');
		$this->form_validation->set_rules("empAccountNumber",'Account Number', 'trim');
		$this->form_validation->set_rules("empIfscCode",'Ifsc Code', 'trim');
		$this->form_validation->set_rules("empBranchName",'Branch Name', 'trim');
		$this->form_validation->set_rules("empBankAddress",'Bank Address', 'trim');
		$this->form_validation->set_rules("empPayeeName",'Payee Name', 'trim');
		
		$this->form_validation->set_rules("empemail",'Email', 'trim');
		$this->form_validation->set_rules("empQualification",'Qualification', 'trim');
		$this->form_validation->set_rules("empPhoneNumber",'Phone Number', 'trim');
		
		if($this->form_validation->run() == FALSE){
			$this->addemployee();
		}
		else{
			$dataemp = array(
					"emp_no" => $eid,
					"job_title" => $this->input->post("jobTitle"),
					"job_category" => $this->input->post("jobCategory"),
					"first_name" => $this->input->post("empFirstName"),
					"mid_name" => $this->input->post("empMiddleName"),
					"last_name" => $this->input->post("empLastName"),
					"dob" => $this->input->post("empDob"),
					"gender" => $this->input->post("gender"),
					"category" => $this->input->post("empCategory"),
					"qualification" => $this->input->post("empQualification"),
					"experiance" => $this->input->post("experience"),
					"join_date" => $this->input->post("j_date"),
					"address1" => $this->input->post("employeeAddLine1"),
					"address2" => $this->input->post("employeeAddLine2"),
					"city" => $this->input->post("empCity"),
					"state" => $this->input->post("empState"),
					"pin_code" => $this->input->post("empPin"),
					"country" => $this->input->post("empCountry"),
					"phone" => $this->input->post("empPhoneNumber"),
					"mobile" => $this->input->post("empmobileNumber"),
					"status" => "Active",
					"email" => $this->input->post("empemail"),
					"username" => $eid,
					"password" =>$this->input->post("password")
			);
			$dataempbank = array(
					"employee_id" =>  $eid,
					"bank_name" => $this->input->post("empBnakName"),
					"account_number" => $this->input->post("empAccountNumber"),
					"ifsc_code" => $this->input->post("empIfscCode"),
					"branch_name" => $this->input->post("empBranchName"),
					"branch_address" => $this->input->post("empBankAddress"),
					"bank_payee_name" => $this->input->post("empPayeeName")
			);
			$this->load->Model("employeeModel");
			$addInfoConfirm = $this->employeeModel->addEmployeeInfo($dataemp);
			$addInfoConfirm1 = $this->employeeModel->addEmployeeBankDetail($dataempbank);
			if($addInfoConfirm && $addInfoConfirm1){
				redirect("index.php/employeeController/employeeProfile/$eid");
			}
		}
		
	
	}
	
	function addemployee(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Add employee';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Class, Section, Subject Stream';
	
		$this->load->model("allFormModel");
		$state = $this->allFormModel->getState()->result();
	
		$data['state'] = $state;
	
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/addEmployeeCss';
		$data['footerJs'] = 'footerJs/addEmployeeJs';
		$data['mainContent'] = 'addemployee';
		$this->load->view("includes/mainContent", $data);
	}

	function employeeProfile(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Profile';
		$data['mainPage'] = 'Employee Profile';
		$data['subPage'] = 'Manage or Print Profile';
		
		$empNo = $this->uri->segment(3);
	
		$this->load->model("employeeModel");
		$profile = $this->employeeModel->getEmployeProfile($empNo);
	
		$data['profile'] = $profile;
	
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/employeeProfileCss';
		$data['footerJs'] = 'footerJs/employeeProfileJs';
		$data['mainContent'] = 'employeeProfile';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateProfile(){
		$empNo = $this->input->post("empId");
		$data = array(
			'first_name' => $this->input->post("firstName"),
			'mid_name' => $this->input->post("midName"),
			'last_name' => $this->input->post("lastName"),
			'category' => $this->input->post("category"),
			'dob' => $this->input->post("dob"),
			'gender' => $this->input->post("gender"),
			'job_title' => $this->input->post("job_title"),
			'qualification' => $this->input->post("qualification"),
			'experiance' => $this->input->post("experiance"),
			'status' => $this->input->post("status"),
			'address1' => $this->input->post("address1"),
			'address2' => $this->input->post("address2"),
			'city' => $this->input->post("city"),
			'state' => $this->input->post("state"),
			'pin_code' => $this->input->post("pincode"),
			'country' => $this->input->post("country"),
			'phone' => $this->input->post("phone"),
			'mobile' => $this->input->post("mobile"),
			'email' => $this->input->post("email"),
			
			'password' => $this->input->post("password")
		);
		$result = $this->employeeModel->updateEmployeProfile($empNo,$data);
		if($result):
			echo '<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong><i class="fa fa-thumbs-o-up"></i> Done!</strong> You successfully Changed the profile... <i class="fa fa-smile-o"></i>
					.
				</div>';
		else:
			echo '<div class="alert alert-danger">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong><i class="fa fa-thumbs-o-down"></i> Oh Shit !</strong>
						Somthing is wrong ! contact your developer.... <i class="fa fa-meh-o"></i>
				 </div>';
		endif;
	}

	//----------------------------------------------- Upload Image of Employee ----------------------------------
	
	public function uploadEmployeeImage(){
		$id = $this->input->post('c_id');

        $photo_name = time().trim($_FILES['empImage']['name']);
        $new_img = array(
            "photo"=> $photo_name
        );
        $old_img = $this->input->post("old_img");
        @chmod("assets/images/empImage/" . $old_img, 0777);
        @unlink("assets/images/empImage/" . $old_img);

        if($query = $this->employeeModel->updateImage($new_img)){
            $this->load->library('upload');
            // Set configuration array for uploaded photo.
            $image_path = realpath(APPPATH . '../assets/images/empImage');
            $config['upload_path'] = $image_path;
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $config['max_size'] = '1024';
            $config['file_name'] = $photo_name;
            // Upload first photo and create a thumbnail of it.
            if (!empty($_FILES['empImage']['name'])) {
                $this->upload->initialize($config);
                if ($this->upload->do_upload('empImage')) {
                    // ---------------------------------- Redirect Success Page ----------------------
                	if(($this->session->userdata("login_type") != "admin") && ($this->session->userdata("login_type") != "student")){ 
                		$this->session->set_userdata("photo",$photo_name);
                	}
                    redirect("index.php/employeeController/employeeProfile/$id/updateInfo");
                }
            }
        }
	}

	public function uploadEmployeeCertificates(){
		$id = $this->input->post('c_id');
		
		$Certificate = time().trim($_FILES['employeeCertificates']['name']);
		$new_img = array(
				"qualification_img"=> $Certificate
		);
		$old_img = $this->input->post("old_rar");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
		
		if($query = $this->employeeModel->updateImage($new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'zip';
			$config['max_size'] = '1024';
			$config['file_name'] = $Certificate;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['employeeCertificates']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('employeeCertificates')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/employeeController/employeeProfile/$id/certificate");
				}
				else{
					$error = array('error' => $this->upload->display_errors());
					print_r($error);
				}
			}
		}
	}
	
	public function uploadEmployeeNoc(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['empImage']['name']);
		$new_img = array(
				"noc_latter"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
	
		if($query = $this->employeeModel->updateImage($new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['empImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('empImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/employeeController/employeeProfile/$id/certificate");
				}
			}
		}
	}
	
	//------------------------------------------------------------------
	
	public function uploadEmployeeExperience(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['empImage']['name']);
		$new_img = array(
				"exprience_certificate"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
	
		if($query = $this->employeeModel->updateImage($new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['empImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('empImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/employeeController/employeeProfile/$id/certificate");
				}
			}
		}
	}
	//------------------------------------------------------------------------------------
	public function uploadEmployeeAddress(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['empImage']['name']);
		$new_img = array(
				"living_id"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
	
		if($query = $this->employeeModel->updateImage($new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['empImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('empImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/employeeController/employeeProfile/certificate");
				}
			}
		}
	}
	//-------------------------------------------------------------------------
	function uploadEmployeePhoto(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['empImage']['name']);
		$new_img = array(
				"photo_id"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
	
		if($query = $this->employeeModel->updateImage($new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['empImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('empImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/employeeController/employeeProfile/$id/certificate");
				}
			}
		}
	}
	
	function salaryDetail(){
		$empId =$this->input->post("empId");
	}
	
	function givenDetail(){
		$enum = $this->input->post("cs");
		$ename = $this->input->post("name");
		$this->load->model("employeeModel");
		$qres = $this->employeeModel->getSalaryDetail($enum);
	
		if($qres->num_rows()>0)
		{
			$data['enum'] = $enum;
			$data['ename'] = $ename;
			$data['qres'] = $qres;
			$this->load->view("ajax/isSalConfigTrue",$data);
			}
		else
		{	
			$data['enum'] = $enum;
			$data['ename'] = $ename;
			$data['qres'] = $qres;
			$this->load->view("ajax/isSalConfigFalse",$data);
		}		
	}
	
	function configureSalary(){
		$data = array(
			"emp_id" => $this->input->post("empid"),
			"basicSalary" => $this->input->post("basicSalary"),
			"ProvidentFund" => $this->input->post("ProvidentFund"),
			"employeeStateInsurance" => $this->input->post("employeeStateInsurance"),
			"medicalAllowance" => $this->input->post("medicalAllowance"),
			"transportAllowance" => $this->input->post("transportAllowance"),
			"dearnessAllowance" => $this->input->post("dearnessAllowance"),
			"houseRentAllowance" => $this->input->post("houseRentAllowance"),
			"skillAllowance" => $this->input->post("skillAllowance"),
			"spcialAllowance" => $this->input->post("spcialAllowance"),
			"encentieve" => $this->input->post("encentieve"),
			"bonus" => $this->input->post("bonus"),
			"gross_s" => $this->input->post("gross_s"),
			"created" =>date("Y-m-d")
		);
		$this->db->insert("emp_salary_struct",$data);
		redirect("login/employeeSalary");
	}
	
	function saveSalary(){
		$abc = $this->input->post("diposit_month");
		foreach($abc as $a){
			if($a == 'advance'){
				$diposit_month = 0;
				continue;
			}else{
				$diposit_month = sizeof($this->input->post("diposit_month"));
			}
		}
		$this->db->select("SUM(monthNo) as month");
		$this->db->where("emp_id",$this->input->post("empid"));
		$month = $this->db->get("emp_salary_info")->row()->month;
		$fsd = $this->input->post("fsd");
		$totalMonth = $diposit_month + $month;
		$till_date = date("Y-m-d",strtotime("$fsd + $totalMonth month"));
	
		//invoice number logic start
		$invoice = $this->db->count_all("invoice_serial");
		$invoice_number = $invoice + 1000;
		$invoiceDetail = array(
				"invoice_no" => $invoice_number,
				"reason" => "Fee Deposit",
				"invoice_date" => date("Y-m-d")
		);
		$this->db->insert("invoice_serial",$invoiceDetail);
		//invoice number logic end
	
		$data = array(
				"emp_id" => $this->input->post("empid"),
				"provide_by" => $this->session->userdata("username"),
				"pay_mode"=>$this->input->post("payment_mode"),
				"basicSalary" => $this->input->post("basicSalary"),
				"ProvidentFund" => $this->input->post("ProvidentFund"),
				"employeeStateInsurance" => $this->input->post("employeeStateInsurance"),
				"medicalAllowance" => $this->input->post("medicalAllowance"),
				"transportAllowance" => $this->input->post("transportAllowance"),
				"dearnessAllowance" => $this->input->post("dearnessAllowance"),
				"houseRentAllowance" => $this->input->post("houseRentAllowance"),
				"skillAllowance" => $this->input->post("skillAllowance"),
				"spcialAllowance" => $this->input->post("spcialAllowance"),
				"encentieve" => $this->input->post("encentieve"),
				"bonus" => $this->input->post("bonus"),
				"gross_s" => $this->input->post("gross_s"),
				"currentAdvance" => $this->input->post("advance_amount"),
				"previousAdvance" => $this->input->post("previous_due_advance"),
				"transactionNo" => $this->input->post("transactionNo"),
				"empAccountNo" => $this->input->post("empAccountNo"),
				"transactDate" => $this->input->post("transactDate"),
				"chequeNo" => $this->input->post("chequeNo"),
				"payeeName" => $this->input->post("payeeName"),
				"created" =>date("Y-m-d"),
				"monthNo" => $diposit_month,
				"salaryInvoice" => $invoice_number,
				"till_date" => $till_date,
				"created" => date("Y-m-d")
		);
	
		$op1 = $this->db->query("select closing_balance from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();
		$balance = $op1->closing_balance;
		$close1 = $balance - $this->input->post("gross_s");
		
		$ocb = array("closing_balance"=>$close1);
		$this->db->where("opening_date",date('Y-m-d'));
		$this->db->update("opening_closing_balance",$ocb);
		
		$dayBook = array(
			"paid_to" =>$this->input->post("empid"),
			"paid_by" =>$this->session->userdata("username"),
			"reason" => "By Salary",
			"dabit_cradit" => "Debit",
			"amount" => $this->input->post("gross_s"),
			"closing_balance" => $close1,
			"pay_date" => date('Y-m-d'),
			"pay_mode" => $this->input->post("payment_mode")
		);
		
		$this->db->insert("emp_salary_info",$data);
		$this->db->insert("day_book",$dayBook);
		redirect("invoiceController/salaryReciept/$invoice_number");
	}
		
	function createdSalary(){ 
		$real=$this->input->post("real");
			
		$data['emp_id'] = $this->input->post("empid");
		$data['provide_by'] = $this->input->post("provide_by");
		$data['pay_mode'] = $this->input->post("pay_mode");
		$data['basicSalary'] = $this->input->post("basicSalary");
		$data['ProvidentFund'] = $this->input->post("ProvidentFund");
		$data['employeeStateInsurance'] = $this->input->post("employeeStateInsurance");
		$data['medicalAllowance'] = $this->input->post("medicalAllowance");
		$data['transportAllowance'] = $this->input->post("transportAllowance");
		$data['dearnessAllowance'] = $this->input->post("dearnessAllowance");
		$data['houseRentAllowance'] = $this->input->post("houseRentAllowance");
		$data['skillAllowance'] = $this->input->post("skillAllowance");
		$data['spcialAllowance'] = $this->input->post("spcialAllowance");
		$data['encentieve'] = $this->input->post("encentieve");
		$data['bonus'] = $this->input->post("bonus");
		$data['gross_s'] = $this->input->post("gross_s");
		$data['is_advance'] = $this->input->post("is_advance");
		$data['advance_month'] = $this->input->post("advance_month");
		$data['next_month'] = $this->input->post("next_month");
		$data['till_date'] = $this->input->post("till_date");
		$data['created'] = $this->input->post("created");
		$data['fsd'] = $this->session->userdata("fsd");
		
		$this->load->model("employeeModel");
		if($real=="Update")
		{$msg="success fully updated Salary of Employee";
			$qres = $this->employeeModel->updateSalary($data);
			redirect("index.php/login/employeeSalary/$msg");
		}
		else{
			$qres = $this->employeeModel->insertSalary($data);
				if($qres)
				{	$msg="success fully created Salary of Employee";
					redirect("index.php/login/employeeSalary/$msg");
					
				}
			}
	}

	function fullDetail(){
		$v = $this->uri->segment(3);
		$this->load->model("feeModel");
		$da=$this->feeModel->fulldetail($v);
		$data['request']=$da->result();
		$data['pageTitle'] = 'Fee Report';
		$data['smallTitle'] = 'Fee Report';
		$data['mainPage'] = 'Fee';
		$data['subPage'] = 'Fee Report';
		$data['title'] = 'Fee Report';
		$data['headerCss'] = 'headerCss/feeCss';
		$data['footerJs'] = 'footerJs/feeJs';
		$data['mainContent'] = 'personalSalaryReport';
		$this->load->view("includes/mainContent", $data);
	}
	
		function givenSummery(){
			$enum = $this->input->post("cs");
			$ename = $this->input->post("name");
			
			$this->load->model("employeeModel");
			$qres = $this->employeeModel->getSalaryDetail($enum);
			if($qres->num_rows()>0)
			{	?> 	<table class="table table-striped table-hover table-bordered">
						  	<thead>
					 			 <tr>
					 			 <th>S.no.</th>
					 			 <th>Employee ID</th>
					    			<th>Employee Name</th>
					    			<th>Basic</th>
					    			<th>PF</th>
					    			<th>SI</th>
					    			<th>MA</th>
					    			<th>TA</th>
					    			<th>DA</th>
					    			<th>HA</th>
					    			<th>SA</th>
					    			<th>SP A</th>
					    			<th>ENCENTIVE</th>
					    			<th>BONUS</th>
					    			<th>GROSS</th>
					    			<th>IS ADVANCE</th>
					    			<th>ADVANCE MONTH</th>
					    			<th>NEXT MONTH</th>
					    			<th>TILL DATE</th>
					    			<th>CREATED</th>
					  			</tr>
					  		</thead>
					  		<tbody> 
					  		<?php foreach($qres->result() as $qs): ?>
					  		<table class="table table-striped table-hover table-bordered center">
		 	<tr>
			  			<td>1</td>
			  			<td><?php echo $enum; ?></td>
			  			<td><input type="text" name="empname" id="empname" value ="<?php echo $ename;?>"/></td>
			    			<td><input type="text" style ="width: 60px"  name="basicSalary" id="basicSalary" value ="<?php echo $qs->basicSalary;?>"/></td>
			    			<td><input type="text" style ="width: 60px"  name="ProvidentFund" id="ProvidentFund" value ="<?php echo $qs->ProvidentFund;?>"/></td>
			    			<td><input type="text"  style ="width: 60px"  name="employeeStateInsurance" id="employeeStateInsurance" value ="<?php echo $qs->employeeStateInsurance;?>"/></td>
			    			<td><input type="text" style ="width: 60px"  name="medicalAllowance" id="medicalAllowance" value ="<?php echo $qs->medicalAllowance;?>"/></td>
			    			<td><input type="text" style ="width: 60px"  name="transportAllowance" id="transportAllowance" value ="<?php echo $qs->transportAllowance;?>"/></td>
			    			<td><input type="text" style ="width: 60px"  name="dearnessAllowance" id="dearnessAllowance" value ="<?php echo $qs->dearnessAllowance;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="houseRentAllowance" id="houseRentAllowance" value ="<?php echo $qs->houseRentAllowance;?>"/></td>
			    			<td> <input type="text" style ="width: 60px" name="skillAllowance" id="skillAllowance" value ="<?php echo $qs->skillAllowance;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="spcialAllowance" id="spcialAllowance" value ="<?php echo $qs->spcialAllowance;?>"/></td>
			    			<td><input type="text"  style ="width: 60px" name="encentieve" id="encentieve" value ="<?php echo $qs->encentieve;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="bonus" id="bonus" value ="<?php echo $qs->bonus;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="gross_s" id="gross_s" value ="<?php echo $qs->gross_s;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="is_advance" id="is_advance" value ="<?php echo $qs->is_advance;?>"/></td>
			    			<td><input type="text" style ="width: 60px" name="advance_month" id="advance_month" value ="<?php echo $qs->advance_month;?>"/></td>
			    			<td><input type="text" style ="width: 80px" name="next_month" id="next_month" value ="<?php echo $qs->next_month;?>"/></td>
			    			<td><input type="text" style ="width: 80px" name="till_date" id="till_date" value ="<?php echo $qs->till_date;?>"/></td>
			    		<td><input type="text" style ="width: 80px" name="created" id="created" value ="<?php echo $qs->created;?>"/></td>
			  			</tr> 
			  			<?php endforeach;?>
					 </tbody>
			  </table>
		<?php 
		}
		}
		
		function changeApprove()
		{
			
			$data = array(
					"approve" => $this->input->post("app")
			);
			$this->load->model("employeeModel");
			$qres = $this->employeeModel->updateApprove($this->input->post("id"),$this->input->post("total_leave"),$this->input->post("end_date"),$this->input->post("start_date"),$data);
		}

}
?>