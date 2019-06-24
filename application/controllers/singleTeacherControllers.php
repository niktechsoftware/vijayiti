<?php class singleTeacherControllers extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("singleTeacherModel");
		$this->load->model("subjectModel");
		$this->load->model("singleStudentModel");
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
		}
		$data['pageTitle'] = 'Dashboard';
		$data['smallTitle'] = 'Overview of all Section';
		$data['mainPage'] = 'Dashboard';
		$data['subPage'] = 'dashboard';
		$data['title'] = 'Hgenesis Dashboard';
		$data['headerCss'] = 'headerCss/dashboardCss';
		$data['footerJs'] = 'footerJs/dashboardJs';
		$data['mainContent'] = 'teacherdashboard';
		$this->load->view("includes/mainContent", $data);
	
	}
	
	function viewProfile(){
		$this->load->model("allFormModel");
		$teacherID = $this->session->userdata('username');
		$stDetail = $this->singleTeacherModel->getTeacherDetail($teacherID);
		$data['teacherProfile'] = $stDetail->row();
		$data['pageTitle'] = 'Teacher Profile';
		$data['smallTitle'] = 'Teacher Personal Detail';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Personal Detail';
		$data['title'] = 'Teacher Personal Detail';
		$data['headerCss'] = 'headerCss/studentCss';
		$data['footerJs'] = 'footerJs/studentJs';
		$data['mainContent'] = 'teacherProfile';
		$this->load->view("includes/mainContent", $data);
	}
	
	
	function salarySummry(){
		$emp_id = $this->session->userdata("username");
		$data['var'] = $this->db->query("select * from emp_salary_info where  emp_id ='$emp_id' GROUP BY till_date DESC")->result();
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Summry';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Salary Summry';
		$data['title'] = 'Teacher Salary Summry';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'salarySummry';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherLeave(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Leave Details';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Leave Details';
		$data['title'] = 'Teacher Leave Details';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherLeave';
		$this->load->view("includes/mainContent", $data);
	}

	
	function classTaken(){
		$stu_id = $this->session->userdata('username');
		$var1 = $this->singleTeacherModel->time_Table($stu_id);
		$data['timetable']=$var1->result();
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Class Detail';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Class Detail';
		$data['title'] = 'Teacher Class Detail';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'classTaken';
		$this->load->view("includes/mainContent", $data);
	}
	
	function marksEntry(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Marks Entry';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Marks Entry';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$classes=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['classes']=$classes->result();
		$data['title'] = 'Teacher Marks Entry';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherExamJs';
		$data['mainContent'] = 'marksEntry';
		$this->load->view("includes/mainContent", $data);
	}
	
	function feeReport(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Fee Report';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Fee Report';
		$data['title'] = 'Fee Report';
		$this->load->model("configureClassModel");
		$req=$this->configureClassModel->getClassList();
		$data['request']=$req->result();
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'feeReport';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherStudentAttendance(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Attendance Sheet';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Attendance Sheet';
		$data['v']=false;
		$data['v'] = $this->uri->segment(3);
		$this->load->model("configureClassModel");
		$req=$this->configureClassModel->getClassList();
		$data['request']=$req->result();
		$data['title'] = 'Attendance Sheet';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherStudentAttendance';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherStuAttendanceReport(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Attendance Report';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Attendance Report';
		$data['title'] = 'Attendance Report';
		$this->load->model("configureClassModel");
		$req=$this->configureClassModel->getClassName();
		$data['request']=$req->result();
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherStuAttendanceReport';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherClasstimeTable(){
		$stu_id = $this->session->userdata('username');
		$var1 = $this->singleTeacherModel->time_Table($stu_id);
		
		$data['timetable']=$var1->result();
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Class Time Table';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Class Time Table';
		$data['title'] = 'Class Time Table';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherClasstimeTable';
		$this->load->view("includes/mainContent", $data);
	}
	function teacherExamDuty(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Exam Duty';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Exam Duty';
		$data['title'] = 'Teacher Exam Duty';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherExamDuty';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherTimeTable(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Time Table';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Time Table';
		$data['title'] = 'Teacher Time Table';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherTimeTable';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherExamDetail(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Exam Duty';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Exam Duty';
		$data['title'] = 'Teacher Exam Duty';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherExamDetail';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherResults(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Results Summry';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Results Summry';
		$data['title'] = 'Teacher Results Summry';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherResults';
		$this->load->view("includes/mainContent", $data);
	}
	
	function teacherStockDetail(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Stock Detail';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Stock Detail';
		$data['title'] = 'Stock Detail';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherStockDetail';
		$this->load->view("includes/mainContent", $data);
	}
	function teacherNoticeAlert(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Notice Alert';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Notice Alert';
		$data['title'] = 'Teacher Notice Alert';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherNoticeAlert';
		$this->load->view("includes/mainContent", $data);
	}
	function teacherMessage(){
		$data['pageTitle'] = 'Teacher Section';
		$data['smallTitle'] = 'Teacher Message';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Message';
		$data['title'] = 'Message';
		$data['headerCss'] = 'headerCss/singleTeacherCss';
		$data['footerJs'] = 'footerJs/singleTeacherJs';
		$data['mainContent'] = 'teacherMessage';
		$this->load->view("includes/mainContent", $data);
	}
	
	function insertLeave(){
		$data =array(
				'emp_id'=>$this->session->userdata('username'),
				'start_date'=>$this->input->post("sdate"),
				'end_date'=>$this->input->post("edate"),
				'total_leave'=>$this->input->post("totalLeave"),
				'reason'=>$this->input->post("reason"),
				'approve'=>"NO"
		);
		$var=$this->singleTeacherModel->insertLeave($data);
		if($var)
		{
			$msg="success";
			redirect("index.php/singleTeacherControllers/teacherLeave/$msg");
		}
	}
	
	function studentAtten()
	{
		$i = $this->input->post("rows");
		$this->load->model("teacherModel");
		$this->load->model("teacherModel");
		for($j=1; $j<$i; $j++){
			$data = array(
					"section" => $this->input->post("section"),
					"class" => $this->input->post("classv"),
					"teacher_id" => $this->session->userdata("userid"),
					"scholer_number" => $this->input->post("schno$j"),
					"stu_id" => $this->input->post("stuID$j"),
					"attendance" => $this->input->post("gender$j"),
					"a_date" => date("Y-m-d")
			);
			
			$this->teacherModel->addstuAttendance($data);
		}
		redirect("index.php/singleTeacherControllers/teacherStudentAttendance/Attendance Done");
	}
	
	function teacherAReport(){
		$v=$this->session->userdata('username');
		$start_date=$this->input->post("sdate");
		$end_date=$this->input->post("edate");
		$data['pageTitle'] = 'Teacher Attendance Report';
		$data['smallTitle'] = 'Attendance Report';
		$data['mainPage'] = 'Teacher';
		$data['subPage'] = 'Teacher Attendance Report';
		$data['title'] = 'Teacher Attendance Report';
		$data['request']=$this->db->query("SELECT * FROM teacher_attendance WHERE emp_no = '$v' AND a_date >'$start_date' AND a_date< '$end_date' ");
		$data['headerCss'] = 'headerCss/newAdmissionCss';
		$data['footerJs'] = 'footerJs/studentAttendanceJs';
		$data['mainContent'] = 'teacherAttendanceReport';
		$this->load->view("includes/mainContent", $data);
	}
	
}



