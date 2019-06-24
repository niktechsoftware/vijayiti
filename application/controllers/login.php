<?php

class Login extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("teacherModel");
                $this->load->model("allFormModel");
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}
	
	function index(){
		// Opening balance closing balance code start
		$clo = $this->db->query("select * from opening_closing_balance ORDER BY id DESC LIMIT 1")->row();
		if($this->db->count_all("opening_closing_balance") <=0 ){
			$balance = array(
				"opening_balance" => 0,
				"closing_balance" => 0,
				"opening_date" => date("Y-m-d"),
				"closing_date" => date("Y-m-d")			);
			$this->db->insert('opening_closing_balance',$balance);
		}else{
			$cl_date = $clo->closing_date;
			$cl_balance = $clo->closing_balance;
			$cr_date = date('Y-m-d');
			if($cl_date != $cr_date)
			{
				$balance = array(
						"opening_balance" => $cl_balance,
						"closing_balance" => $cl_balance,
						"opening_date" => $cr_date,
						"closing_date" => $cr_date
				);
				$this->db->insert('opening_closing_balance',$balance);
			}
			// Opening balance closing balance code end
		}
		$data['pageTitle'] = 'Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';
		
		$data['title'] = 'Gfinch Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'dashboard';
		$this->load->view("includes/mainContent", $data);
	
	}	
	
	function configureClass(){
		$data['pageTitle'] = 'Configuration';
		$data['smallTitle'] = 'Class, Section And Subject Stream';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Class, Section, Subject Stream';
		
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'configureClass';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateClass(){
		$this->load->model('configureClassModel');
		$res = $this->configureClassModel->getClassList();
		$data['classList'] = $res;
		$data['pageTitle'] = 'Class Updation';
		$data['smallTitle'] = 'Update Class';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Classes Update';
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/updateClassCss';
		$data['footerJs'] = 'footerJs/updateClassJs';
		$data['mainContent'] = 'updateClass';
		$this->load->view("includes/mainContent", $data);
	}
	
	function configureSubject(){
		$data['pageTitle'] = 'Subject Configration';
		$data['smallTitle'] = 'Assign Subject to class';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Subject Configration';
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/subjectJs';
		$data['mainContent'] = 'configureSubject';
		$this->load->model("configureClassModel");
		$result = $this->configureClassModel->getClassList();
		$data['classList'] = $result->result();
		$this->load->view("includes/mainContent", $data);
	}
	
	function addemployee(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Add employee';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Registration';
		
		$this->load->model("allFormModel");
		$state = $this->allFormModel->getState()->result();
		
		$data['state'] = $state;
		
		$data['title'] = 'Add Employee';
		$data['headerCss'] = 'headerCss/addEmployeeCss';
		$data['footerJs'] = 'footerJs/addEmployeeJs';
		$data['mainContent'] = 'addemployee';
		$this->load->view("includes/mainContent", $data);
	}
	
	function advencedEmployeeList(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee List';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee List';
		
		$data['title'] = 'Employee List';
		$data['headerCss'] = 'headerCss/employeeListCss';
		$data['footerJs'] = 'footerJs/employeeListJs';
		$data['mainContent'] = 'employeeList';
		$this->load->view("includes/mainContent", $data);
	}
	
	function employeeList(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee List';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee List';
		$data['title'] = 'Employee List';
		$data['headerCss'] = 'headerCss/employeeListCss';
		$data['footerJs'] = 'footerJs/simpleEmployeeList';
		$data['mainContent'] = 'simpleEmployeeList';
		$this->load->view("includes/mainContent", $data);
	}
	
	function employeeSalary(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Salary details';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Salary';
		
		$this->load->model("employeeModel");
		$data['empList'] = $this->employeeModel->employeeList()->result();
	
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/employeeSalaryCss';
		$data['footerJs'] = 'footerJs/employeeSalaryJs';
		$data['mainContent'] = 'employeeSalary';
		$this->load->view("includes/mainContent", $data);
	}
	
	function employeeSalaryReport(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Salary Report';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Salary Report';
		
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/employeeSalaryCss';
		$data['footerJs'] = 'footerJs/employeeSalaryJs';
		$data['mainContent'] = 'employeeSalaryReport';
		$this->load->view("includes/mainContent", $data);
	}
	
	function employeeSummry(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Summry';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Summry';
	
		$data['title'] = 'Employee Summry';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'employeeSummry';
		$this->load->view("includes/mainContent", $data);
	}
	
	function employeeLeave(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Leave Details';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Leave Details';
	
		$data['title'] = 'Employee Leave Details';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'employeeLeave';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateProfile(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Update Existing Employee Details';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Profile';
	
		$data['title'] = 'Employee Profile';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'updateProfile';
		$this->load->view("includes/mainContent", $data);
	}
	function oldEmployeed(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Old Employee Details';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Old Employee Details';
	
		$data['title'] = 'Old Employee Details';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'oldEmployeed';
		$this->load->view("includes/mainContent", $data);
	}
	
	function newAdmission(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'New Admission';
		$data['mainPage'] = 'Students';
		$data['subPage'] = 'New Admission';
		$this->load->model("allFormModel");
		$data['className'] = $this->allFormModel->getClass()->result();
		$data['title'] = 'New Admission';
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/newAdmission';
		$data['mainContent'] = 'newAdmission';
		$this->load->view("includes/mainContent", $data);
	}
	
	function simpleSearchStudent(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$this->load->model("searchStudentModel");
		$req=$this->searchStudentModel->getValue();
		$data['request']=$req->result();
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		
		$data['mainContent'] = 'simpleSearchStudent';
		$this->load->view("includes/mainContent", $data);
	}
	
	function searchStudent(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Search Student';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Search Student';
		$this->load->model("searchStudentModel");
		$req=$this->searchStudentModel->getValue();
		$data['request']=$req->result();
		$data['title'] = 'Search Student';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/studentListJs';
		$data['mainContent'] = 'searchStudent';
		$this->load->view("includes/mainContent", $data);
	}
	function oldStudentsDetails(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Old Students Details';
		$data['mainPage'] = 'Old Student';
		$data['subPage'] = 'Old Students Details';
	
		$data['title'] = 'Old Students Details';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'oldStudentsDetails';
		$this->load->view("includes/mainContent", $data);
	}
	
	function collectFee(){
		$cdate=date("Y-m-d");
		/*
		$this->load->model("feeModel");
		$req=$this->feeModel->getHoliDay($cdate);
		if($req->num_rows() > 0)
		{
			$data['request']=$req;
			$data['pageTitle'] = 'Fee collection';
			$data['smallTitle'] = 'Student Fee Collection';
			$data['mainPage'] = 'Configuration';
			$data['subPage'] = 'Class, Section, Subject Stream';
		
			$data['title'] = 'Configure Class/Section';
			$data['headerCss'] = 'headerCss/errorCss';
			$data['footerJs'] = 'footerJs/errorJs';
			$data['mainContent'] = 'errorView';
			$this->load->view("includes/mainContent", $data);
		}
		else 
		{ */
			//$data['request']=$req->result();
			$data['pageTitle'] = 'Fee collection';
			$data['smallTitle'] = 'Student Fee Collection';
			$data['mainPage'] = 'Fee';
			$data['subPage'] = 'Fee collection';
			
		
			$data['title'] = 'Fee collection';
			$data['headerCss'] = 'headerCss/feeCss';
			$data['footerJs'] = 'footerJs/feeJs';
			$data['mainContent'] = 'collectFee';
			$this->load->view("includes/mainContent", $data);
		//}
	}
	
	function feeReport(){
		$data['pageTitle'] = 'Fee Report';
		$data['smallTitle'] = 'Fee Report';
		$data['mainPage'] = 'Fee';
		$data['subPage'] = 'Fee Report';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		
		$data['title'] = 'Fee Report';
		$data['headerCss'] = 'headerCss/feeCss';
		$data['footerJs'] = 'footerJs/feeJs';
		$data['mainContent'] = 'feeReport';
		$this->load->view("includes/mainContent", $data);
	}
	function transport(){
		$data['pageTitle'] = 'Transport Fee ';
		$data['smallTitle'] = 'Transport Fee Area';
		$data['mainPage'] = 'Fee';
		$data['subPage'] = 'Fee Report';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
	
		$data['title'] = 'Fee Report';
		$data['headerCss'] = 'headerCss/transportCss';
		$data['footerJs'] = 'footerJs/transportJs';
		$data['mainContent'] = 'transport';
		$this->load->view("includes/mainContent", $data);
	}
	
	function feedue(){
		$data['pageTitle'] = 'Fee Due Details';
		$data['smallTitle'] = 'Fee Details';
		$data['mainPage'] = 'Fee due Details';
		$data['subPage'] = 'Fee Details';
		$this->load->model("feeduemodel");
		$var= $this->feeduemodel->getDueDetail();
		$data['request']=$var->result();
		$data['title'] = 'Enter Stock';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/feedueJs';
		$data['mainContent'] = 'feedue';
		$this->load->view("includes/mainContent", $data);
	}
	
	function studentAttendance(){
		$data['pageTitle'] = 'Student Attendance';
		$data['smallTitle'] = 'Attendance Sheet';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Attendance Sheet';
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$data['title'] = 'Attendance Sheet';
		$data['headerCss'] = 'headerCss/studentAttendanceCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'studentAttendance';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		
		$this->load->view("includes/mainContent", $data);
	}
	function studentAttendance1(){
		$data['pageTitle'] = 'Student Attendance';
		$data['smallTitle'] = 'Attendance Sheet';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Attendance Sheet';
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$data['title'] = 'Attendance Sheet';
		$data['headerCss'] = 'headerCss/studentAttendanceCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'studentAttendance1';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
	
		$this->load->view("includes/mainContent", $data);
	}
	function studentAttendance2(){
		$data['pageTitle'] = 'Student Attendance';
		$data['smallTitle'] = 'Attendance Sheet';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Attendance Sheet';
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$data['title'] = 'Attendance Sheet';
		$data['headerCss'] = 'headerCss/studentAttendanceCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'studentAttendance2';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
	
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherAttendance(){
		$date1 = date("Y-m-d");
		$data['checkval'] = $this->teacherModel->checkTeacherAtten($date1);
		$data['pageTitle'] = 'Teacher Attendance';
		$data['smallTitle'] = 'Teacher Attendance';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Attendance';
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$data['title'] = 'Teacher Attendance';
		$data['headerCss'] = 'headerCss/studentAttendanceCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$this->load->model("teacherModel");
		$req=$this->teacherModel->getTeacherList();
		$data['request']=$req->result();
		
		$data['mainContent'] = 'teacherAttendance';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	function defineLessonPlan(){
	
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Teacher Lesson Plan';
		$data['subPage'] = 'Teacher Lesson Plan';
		$data['title'] = 'Teacher Lesson Plan';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'defineLessonPlan';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	function viewLessonPlan(){
	
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Teacher Lesson Plan';
		$data['subPage'] = 'Teacher Lesson Plan';
		$data['title'] = 'Teacher Lesson Plan';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'viewLessonPlan';
		$this->load->view("includes/mainContent", $data);
	}
	
	function stuAttendanceReport(){
		$data['pageTitle'] = 'Attendance Report';
		$data['smallTitle'] = 'Attendance Report';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Attendance Report';
		$data['title'] = 'Attendance Report';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'stuAttendanceReport';
		$this->load->view("includes/mainContent", $data);
	}
	function empAttendanceReport(){
		$data['pageTitle'] = 'Attendance Report';
		$data['smallTitle'] = 'Attendance Report';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Attendance Report';
		$data['title'] = 'Attendance Reportn';
		$data['headerCss'] = 'headerCss/studentAttendanceCss';
		$data['footerJs'] = 'footerJs/empAttendanceJs';
		$data['mainContent'] = 'empAttendanceReport';
		$this->load->view("includes/mainContent", $data);
	}
	
function periodTimeSlot(){
		$data['pageTitle'] = 'Time table';
		$data['smallTitle'] = 'Time table';
		$data['mainPage'] = 'Period Time Scheduling';
		$data['subPage'] = 'Time table';
		$this->load->model("periodModel");
		$req=$this->periodModel->getPeriodD();
		$data['request']=$req->result();
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$data['title'] = 'Period Time Scheduling';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'periodTimeSlot';
		$this->load->view("includes/mainContent", $data);
	}
	
	function timeScheduling(){
		
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Period Time Scheduling';
		$data['subPage'] = 'Time Scheduling';
		$data['title'] = 'Period Time Scheduling';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'timeScheduling';
		$this->load->view("includes/mainContent", $data);
	}
	
	function tc(){
	
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Period Time Scheduling';
		$data['subPage'] = 'Time Scheduling';
		$data['title'] = 'Period Time Scheduling';
		$data['headerCss'] = 'headerCss/tcCss';
		$data['footerJs'] = 'footerJs/tcJs';
		$data['mainContent'] = 'tc';
		$this->load->view("includes/mainContent", $data);
	}
	
	function charc(){
	
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Period Time Scheduling';
		$data['subPage'] = 'Time Scheduling';
		$data['title'] = 'Period Time Scheduling';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'charc';
		$this->load->view("includes/mainContent", $data);
	}
	
	function schedulingReport(){
		$data['pageTitle'] = 'Schedule Report';
		$data['smallTitle'] = 'Schedule Report';
		$data['mainPage'] = 'Scheduling';
		$data['subPage'] = 'Schedule Report';
		$this->load->model("periodModel");
		$var = $this->periodModel->uniqueClass();
		$data['uniqueClass']=$var->result();
		$var = $this->periodModel->uniquePeriod();
		$data['uniquePeriod']=$var->result();
		$data['title'] = 'Schedule Report';
		$data['headerCss'] = 'headerCss/periodTimeCss';
		$data['footerJs'] = 'footerJs/periodTimeJs';
		$data['mainContent'] = 'schedulingReport';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	
	function examsheduling(){
		$data['pageTitle'] = 'Exam Sheduling';
		$data['smallTitle'] = 'Exam Sheduling';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Exam Sheduling';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$count = $this->db->count_all("exam_name");
		$data['i']=$count;
		$data['title'] = 'Exam Sheduling';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/examJs';
		$data['mainContent'] = 'examsheduling';
		$this->load->view("includes/mainContent", $data);
	}
	
	function createSchedule()
	{
		$exam_name = $this->uri->segment(3);
		$edate = $this->uri->segment(4);
		$data['nos'] = $this->uri->segment(5);
		$data['nod'] = $this->uri->segment(6);
		$data['msg'] = 1;
		$data['msg'] = $this->uri->segment(7);
		$this->load->model("examModel");
		$data['exam_name'] = $exam_name;
		$data['edate'] = $edate;
		$data['pageTitle'] = 'Exam Sheduling';
		$data['smallTitle'] = 'Exam Sheduling';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Exam Sheduling';
		$this->load->model("examModel");
		$classes=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['classes']=$classes->result();
		$data['exam_name']=$exam_name;
		$data['edate']=$edate;
		$shift=$this->examModel->getshift($exam_name,$edate);
		$data['shift']=$shift->result();
		$day=$this->examModel->getday($exam_name,$edate);
		$data['days']=$day->result();
		$data['title'] = 'Exam Sheduling';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/createExamJs';
		$data['mainContent'] = 'creatSchedule';
		$this->load->view("includes/mainContent", $data);
	}
	
	function examTimeTable(){
		$data['pageTitle'] = 'Exam Time Table';
		$data['smallTitle'] = 'Exam Time Table';
		$data['mainPage'] = 'Exam';
		$this->load->model("examModel");
		$data['subPage'] = 'Exam Time Table';
		$res=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['noc'] = $res->result(); 
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$data['title'] = 'Exam Time Table';
		$data['headerCss'] = 'headerCss/examTimeTableCss';
		$data['footerJs'] = 'footerJs/examTimeTableJs';
		$data['mainContent'] = 'examTimeTable';
		$this->load->view("includes/mainContent", $data);
	}
	
	function examDetail(){
		$data['pageTitle'] = 'Exam Details';
		$data['smallTitle'] = 'Exam Details';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Exam Details';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$classes=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['classes']=$classes->result();
		$data['title'] = 'Exam Details';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/examJs';
		$data['mainContent'] = 'examDetail';
		$this->load->view("includes/mainContent", $data);
	}
	
	function results(){
		$data['pageTitle'] = 'Results Summry';
		$data['smallTitle'] = 'Results Summry';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Results Summry';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$classes=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['classes']=$classes->result();
		$data['title'] = 'Results Summry';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/examJs';
		$data['mainContent'] = 'results';
		$this->load->view("includes/mainContent", $data);
	}
	
	function editUpdateDetail(){
		$data['pageTitle'] = 'Exam Details';
		$data['smallTitle'] = 'Exam Details';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Exam Details';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$classes=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['classes']=$classes->result();
		$data['title'] = 'Exam Details';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/examJs';
		$data['mainContent'] = 'editUpdateDetail';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	function enterStock(){
		$data['pageTitle'] = 'Stock Management';
		$data['smallTitle'] = 'Enter Stock';
		$data['mainPage'] = 'Stock Section';
		$data['subPage'] = 'Enter Stock';
	    $this->load->model("enterStockModel");
	   	$var= $this->enterStockModel->getStock();
	   	$data['request']=$var->result();
		$data['title'] = 'Enter Stock';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJS';
		$data['mainContent'] = 'enterStock';
		$this->load->view("includes/mainContent", $data);
	}
	
function saleStock(){
		$data['pageTitle'] = 'Stock Management';
		$data['smallTitle'] = 'Sale Stock';
		$data['mainPage'] = 'Stock';
		$data['subPage'] = 'Sale Stock';
	
		$data['title'] = 'Sale Stock';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJS';
		$data['mainContent'] = 'saleStock';
		$this->load->view("includes/mainContent", $data);
	}
	
	function printReceipt(){
		$data['pageTitle'] = 'Stock Management';
		$data['smallTitle'] = 'Stock Report';
		$data['mainPage'] = 'Stock';
		$data['subPage'] = 'Stock Report';
		$data['title'] = 'Stock Report';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockJS';
		$data['mainContent'] = 'printReceipt';
		$this->load->view("includes/mainContent", $data);
	}
	
	function stockReport(){
		$data['pageTitle'] = 'Stock Management';
		$data['smallTitle'] = 'Stock Report';
		$data['mainPage'] = 'Stock';
		$data['subPage'] = 'Stock Report';
	
		$data['title'] = 'Stock Report';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'stockReport';
		$this->load->view("includes/mainContent", $data);
	}
	
	function noticeAlert(){
		$do=$this->uri->segment(3);
		if(strlen($do) > 0){
			$this->load->model("msgModel");
			$data['editid']=$this->msgModel->getdetail($do);
			$data['pageTitle'] = 'Notice & Message Alert';
			$data['smallTitle'] = 'notice';
			$data['mainPage'] = 'Notice';
			$data['subPage'] = 'Notice & Message Alert';
			$this->load->model("noticeModel");
			$var = $this->noticeModel->getNotice();
			$data['request']=$var->result();
			$data['title'] = 'Notice & Message Alert';
			$data['headerCss'] = 'headerCss/noticeCss';
			$data['footerJs'] = 'footerJs/noticeJs';
			$data['mainContent'] = 'noticeAlert';
			$this->load->view("includes/mainContent", $data);
		}
		else{
		$data['pageTitle'] = 'Notice & Message Alert';
		$data['smallTitle'] = 'notice';
		$data['mainPage'] = 'Notice';
		$data['subPage'] = 'Notice & Message Alert';
		$this->load->model("noticeModel");
		$var = $this->noticeModel->getNotice();
		$data['request']=$var->result();
		$data['title'] = 'Notice & Message Alert';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'noticeAlert';
		$this->load->view("includes/mainContent", $data);}
	}
	
	function message(){
		$data['pageTitle'] = 'Notice & Message Alert';
		$data['smallTitle'] = 'massage';
		$data['mainPage'] = 'Message';
		$data['subPage'] = 'Notice & Message Alert';
		$data['title'] = 'Notice & Message Alert';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'message';
		$this->load->view("includes/mainContent", $data);
	}
	
	function mobileNotice(){
		$data['pageTitle'] = 'Mobile Message And Notice';
		$data['smallTitle'] = 'Mobile Notice';
		$data['mainPage'] = 'Message';
		$data['subPage'] = 'Mobile Notice';
		$data['title'] = 'Mobile Message';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'mobileNotice';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	function smssetting(){
		$data['pageTitle'] = 'Mobile Message And Notice';
		$data['smallTitle'] = 'Sms Setting';
		$data['mainPage'] = 'SMS';
		$data['subPage'] = 'Mobile Message And Notice';
		$data['title'] = 'Mobile Message And Notice';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'smssetting';
		$this->load->view("includes/mainContent", $data);
	}
	
	
function dayBook(){
		$v=1;
		$v = $this->uri->segment(3);
		if($v==9)
		{
			$data['msg']="No Record Found";
			$data['pageTitle'] = 'Account Management';
			$data['smallTitle'] = 'Day Book';
			$data['mainPage'] = 'Day Book';
			$data['subPage'] = 'Account Management';
			$total = mysql_query("select SUM(amount) from day_book where pay_date='".date('Y-m-d')."' ORDER by id");
			$no = mysql_fetch_array($total);
			$data['sale']=$no['SUM(amount)'];
			$total = mysql_query("select SUM(amount) from cash_payment where date='".date('Y-m-d')."' ORDER by sno");
			$no = mysql_fetch_array($total);
			$data['cash']=$no['SUM(amount)'];
			$total = mysql_query("select SUM(amount) from director_transaction where date='".date('Y-m-d')."'&& action='taken'  ORDER by sno");
			$no = mysql_fetch_array($total);
			$data['dt']=$no['SUM(amount)'];
			$total = mysql_query("select SUM(amount) from bank_transaction where date='".date('Y-m-d')."'&& id_name='receive'  ORDER by sno");
			$no = mysql_fetch_array($total);
			$data['bt']=$no['SUM(amount)'];
			$total = mysql_query("select SUM(paid) from fee_deposit where diposit_date='".date('Y-m-d')."' ORDER by id");
			$no = mysql_fetch_array($total);
			$sale=$no['SUM(paid)'];
			$total2 = mysql_query("select SUM(amount) from day_book where reason = 'Admission Fee + 1 Month Fee' AND pay_date='".date('Y-m-d')."'");
			$no2 = mysql_fetch_array($total2);
			$sale1=$no2['SUM(amount)'];
			$data['admin']=$sale + $sale1;
			
			$total = mysql_query("select SUM(gross_s) from emp_salary_info where created='".date('Y-m-d')."' ORDER by id");
			$no = mysql_fetch_array($total);
			$data['salary']=$no['SUM(gross_s)'];
			
			$total = mysql_query("select SUM(amount) from bank_transaction where date='".date('Y-m-d')."'&& id_name='deposite'  ORDER by sno");
			$no = mysql_fetch_array($total);
			$data['banktransaction']=$no['SUM(amount)'];
			$total = mysql_query("select SUM(amount) from director_transaction where date='".date('Y-m-d')."'&& action='given'  ORDER by sno");
			$no = mysql_fetch_array($total);
			$data['htd']=$no['SUM(amount)'];
			
			$clos_opening = mysql_query("select * from opening_closing_balance where opening_date='".date('Y-m-d')."'");
			$r = mysql_fetch_object($clos_opening);
			$data['closing'] = $r->closing_balance;
			$data['opening'] = $r->opening_balance;
			
			$data['title'] = 'Account Management';
			$data['headerCss'] = 'headerCss/daybookCss';
			$data['footerJs'] = 'footerJs/daybookJs';
			$data['mainContent'] = 'dayBook';
			$this->load->view("includes/mainContent", $data);
			$v=1;
		}else{
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Day Book';
		$data['mainPage'] = 'Day Book';
		$data['subPage'] = 'Account Management';
		$total = mysql_query("select SUM(amount) from day_book where pay_date='".date('Y-m-d')."' ORDER by id");
		 $no = mysql_fetch_array($total); 
		  $data['sale']=$no['SUM(amount)']; 
		  $total = mysql_query("select SUM(amount) from cash_payment where date='".date('Y-m-d')."' ORDER by sno");
		  $no = mysql_fetch_array($total);
		  $data['cash']=$no['SUM(amount)'];
		  $total = mysql_query("select SUM(amount) from director_transaction where date='".date('Y-m-d')."'&& action='taken'  ORDER by sno");
		  $no = mysql_fetch_array($total);
		  $data['dt']=$no['SUM(amount)'];
		  $total = mysql_query("select SUM(amount) from bank_transaction where date='".date('Y-m-d')."'&& id_name='receive'  ORDER by sno");
		  $no = mysql_fetch_array($total);
		  $data['bt']=$no['SUM(amount)'];
		  $total = mysql_query("select SUM(paid) from fee_deposit where diposit_date='".date('Y-m-d')."' ORDER by id");
		  $no = mysql_fetch_array($total);
		  $sale=$no['SUM(paid)'];
		  $total2 = mysql_query("select SUM(amount) from day_book where reason = 'Admission Fee + 1 Month Fee' AND pay_date='".date('Y-m-d')."'");
		  $no2 = mysql_fetch_array($total2);
		  $sale1=$no2['SUM(amount)'];
		  $data['admin']=$sale + $sale1;
		  
		  $total = mysql_query("select SUM(gross_s) from emp_salary_info where created='".date('Y-m-d')."' ORDER by id");
		  if($total){
		  $no = mysql_fetch_array($total);
		 
		  $data['salary']=$no['SUM(gross_s)'];
		  }
		  else{
		  	$data['salary']=0.00;
		  }
		  
		  $total = mysql_query("select SUM(amount) from bank_transaction where date='".date('Y-m-d')."'&& id_name='deposite'  ORDER by sno");
		  $no = mysql_fetch_array($total);
		  $data['banktransaction']=$no['SUM(amount)'];
		  $total = mysql_query("select SUM(amount) from director_transaction where date='".date('Y-m-d')."'&& action='given'  ORDER by sno");
		  $no = mysql_fetch_array($total);
		  $data['htd']=$no['SUM(amount)'];
		  
		  $r = $this->db->query("select * from opening_closing_balance where opening_date='".date('Y-m-d')."'")->row();		
		  $data['closing'] = $r->closing_balance;
		  $data['opening'] = $r->opening_balance;
		  
		$data['msg']="";
		$data['title'] = 'Account Management';
		$data['headerCss'] = 'headerCss/daybookCss';
		$data['footerJs'] = 'footerJs/daybookJs';
		$data['mainContent'] = 'dayBook';
		$this->load->view("includes/mainContent", $data);
	}
	}
	
	function cashPayment(){
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Cash Payment';
		$data['mainPage'] = 'Cash Payment';
		$data['subPage'] = 'Account Management';
		$data['title'] = 'Account Management';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/transactionJs';
		$data['mainContent'] = 'cashPayment';
		$this->load->view("includes/mainContent", $data);
	}
	
	function bankTransaction(){
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Bank Transaction';
		$data['mainPage'] = 'Bank Transaction';
		$data['subPage'] = 'Bank Transaction / Account Management';
	
		$data['title'] = 'Bank Transaction / Account Management';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'bankTransaction';
		$this->load->view("includes/mainContent", $data);
	}
	
	function directorTransaction(){
		$data['pageTitle'] = 'Account Management';
		$data['smallTitle'] = 'Director Transaction';
		$data['mainPage'] = 'Bank Transaction';
		$data['subPage'] = 'Director Transaction';
	
		$data['title'] = 'irector Transaction';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'directorTransaction';
		$this->load->view("includes/mainContent", $data);
	}
	
	function gallery(){
		$data['pageTitle'] = 'Gallery';
		$data['smallTitle'] = 'Gallery Photo';
		$data['mainPage'] = 'Gallery';
		$data['subPage'] = 'Gallery Photo';
	
		$data['title'] = 'Gallery Photo';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'gallery';
		$this->load->view("includes/mainContent", $data);
	}
	function success(){
		$data['pageTitle'] = 'success';
		$data['smallTitle'] = 'Gallery Photo';
		$data['mainPage'] = 'Gallery';
		$data['subPage'] = 'Gallery Photo';
	
		$data['title'] = 'Gallery Photo';
		$data['headerCss'] = 'headerCss/configureClassCss';
		$data['footerJs'] = 'footerJs/configureClassJs';
		$data['mainContent'] = 'success';
		$this->load->view("includes/mainContent", $data);
	}
	
	function notActiveEmployee(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Status';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Registration';
		$this->db->where("status","Inactive");
		$state=$this->db->get("employee_info");
		$state=$state->result();
		$data['status'] = $state;
		$data['title'] = 'Add Employee';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		$data['mainContent'] = 'notActiveEmployee';
		$this->load->view("includes/mainContent", $data);
	}
	function notActiveStudent(){
		$data['pageTitle'] = 'Employee Section';
		$data['smallTitle'] = 'Employee Status';
		$data['mainPage'] = 'Employee';
		$data['subPage'] = 'Employee Registration';
		
		$data['title'] = 'Add Employee';
		$data['headerCss'] = 'headerCss/studentListCss';
		$data['footerJs'] = 'footerJs/simpleStudentListJs';
		$data['mainContent'] = 'notActiveStudent';
		$this->load->view("includes/mainContent", $data);
	}
	
	function stockEdit(){
		$data['pageTitle'] = 'Edit Stock Sale';
		$data['smallTitle'] = 'Edit';
		$data['mainPage'] = 'Stock';
		$data['subPage'] = 'Edit Stock Sale';
		
		$data['title'] = 'Edit Stock Sale';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockSaleEditJs';
		$data['mainContent'] = 'stockEdit';
		$this->load->view("includes/mainContent", $data);
	}
	
	function printDeuFee(){
		$data['pageTitle'] = 'Print Due Fee';
		$data['smallTitle'] = 'Print';
		$data['mainPage'] = 'Due Fee area';
		$data['subPage'] = 'Print Due Fee';
	
		$data['title'] = 'Print Due Fee';
		$data['headerCss'] = 'headerCss/stockCss';
		$data['footerJs'] = 'footerJs/stockSaleEditJs';
		$data['mainContent'] = 'printDeuFee';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	
	function generateResult(){
		$data['pageTitle'] = 'Generate Result';
		$data['smallTitle'] = 'Select Exam Name';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Generate Result';
		
		$data['title'] = 'Generate Result';
		$data['headerCss'] = 'headerCss/generateResultCss';
		$data['footerJs'] = 'footerJs/generateResultJs';
		$data['mainContent'] = 'generateResult';
		$this->load->view("includes/mainContent", $data);
	}
	
	function classPromotion(){
		
			$data['pageTitle'] = 'Promotion';
			$data['smallTitle'] = 'Class Promotion';
			$data['mainPage'] = 'Promotion';
			$data['subPage'] = 'Class Promotion';
			$data['title'] = 'Class Promotion';
			$this->load->model("configureClassModel");
			$data['request'] = $this->allFormModel->getClass()->result();
			$data['headerCss'] = 'headerCss/newAdmissionCss';
			$data['footerJs'] = 'footerJs/studentAttendanceJs';
			$data['mainContent'] = 'classPromotion';
			$this->load->view("includes/mainContent", $data);
		
	}
	function pramoted_list(){
		$data['pageTitle'] = 'Promotion List';
		$data['smallTitle'] = 'Class Promotion List';
		$data['mainPage'] = 'Promotion';
		$data['subPage'] = 'Class Promotion';
		$data['title'] = 'Class Promotion';
		$this->load->model("configureClassModel");
		$data['request'] = $this->allFormModel->getClass()->result();
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'classPromotionList';
		$this->load->view("includes/mainContent", $data);
	}
	
}
?>