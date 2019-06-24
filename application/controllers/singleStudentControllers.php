<?php
class singleStudentControllers extends CI_Controller{
	function __construct()
		{
			parent::__construct();
			$this->is_login();
			$this->load->model("subjectModel");
			$this->load->model("singleStudentModel");
		}
		
		function is_login(){
			$is_login = $this->session->userdata('is_login');
			$is_lock = $this->session->userdata('is_lock');
			$logtype = $this->session->userdata('login_type');
			if(!$is_login){
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
		
			$data['title'] = 'Hgenesis Dashboard';
			$data['headerCss'] = 'headerCss/dashboardCss';
			$data['footerJs'] = 'footerJs/dashboardJs';
			$data['mainContent'] = 'dashboardStudent';
			$this->load->view("includes/mainContent", $data);
		
		}
		
		function studentProfile(){
			$this->load->model("allFormModel");
			$this->load->model("studentModel");
			$studentId = $this->session->userdata('username');
			$data['stu_id']=$studentId;
			$stDetail = $this->studentModel->getStudentDetail($studentId);
			$data['gurdianDetail'] = $this->studentModel->getGurdianDetail($studentId);
			$data['className'] = $this->allFormModel->getClass();
			$data['sectionName'] = $this->allFormModel->getSection();
			$personalInfo = $stDetail->row();
			$className = $personalInfo->class_id;
			$section = $personalInfo->section;
			$data['subjectList'] = $this->subjectModel->getSubjectByClassSection($className,$section);
			$data['studentsSubject'] = $this->subjectModel->isStudentSubject($studentId);
			$data['studentProfile'] = $stDetail;
			$data['pageTitle'] = 'Student Profile';
			$data['smallTitle'] = 'Student Personal Detail';
			$data['mainPage'] = 'Student Profile';
			$data['subPage'] = 'Student Personal Detail';
			
			$data['title'] = 'Student Personal Detail';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentProfile';
			$this->load->view("includes/mainContent", $data);
		}
		
		function feeReport(){
			$user = $this->session->userdata('username');
			$data['stu_id']=$user;
			$data['stuname']=$this->singleStudentModel->getStudentName($user)->row();
			
			$stuFatherName = $this->singleStudentModel->getStudentFatherName($user);
			$data['stuFatherName']=$stuFatherName->result();
			$stuFee = $this->singleStudentModel->getStudentFeeDetail($user);
			$data['stuFee']=$stuFee->result();
			
			$data['pageTitle'] = 'Fee Report';
			$data['smallTitle'] = 'Student Personal fee Detail';
			$data['mainPage'] = 'Fee';
			$data['subPage'] = 'Student Personal fee Detail';
			
			$data['title'] = 'Student Personal fee Detail';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentFeeReport';
			$this->load->view("includes/mainContent", $data);
		}
		
		
		function fullDetail()
		{
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
			$data['mainContent'] = 'personal';
			$this->load->view("includes/mainContent", $data);
		}
		
		function attendanceReport(){
			$user = $this->session->userdata('username');
			$data['stu_id']=$user;
			$data['pageTitle'] = 'Attendance Report';
			$data['smallTitle'] = 'Student Personal Attendance Report';
			$data['mainPage'] = 'Student';
			$data['subPage'] = 'Student Personal Attendance Report';
			
			$data['title'] = 'Student Personal Attendance Report';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentAttenReport';
			$this->load->view("includes/mainContent", $data);
		}
		function stuReport(){
			$stu_id = $this->session->userdata('username');
			$edate = $this->input->post("edate");
			$sdate = $this->input->post("sdate");
			$this->load->model("teacherModel");
			$var = $this->singleStudentModel->getStuReport($edate,$sdate,$stu_id);
			if($var->num_rows() > 0){
				$sr = 1;
				?>		<table class="table table-striped table-hover" id="sample_2">
									<thead>
										<tr>
											<th>S.no.</th>
											<th>Date</th>
											<th>Present/Absent/Leave</th>
										</tr>
									</thead>
									<tbody>
										<?php 
					  			 foreach ($var->result() as $row){	
					  				?><tr>
					  					<td><?php echo $sr;?></td>
					  					<td><?php $stuID = $row->a_date;  echo $stuID;?></td>
					  					
					  					<td>
					  					<?php 
					  					$atten=$row->attendance;
					  							if($atten=='P'){
					  							?><td><?php echo "Present";}
					  							else { if ($atten=='A'){ 
					  								echo "Absent";
					  							}else echo "Leave";}?></td>
						  			</tr>
						  			<?php 
					  		$sr++;	
					  			}?>
									</tbody>
								</table>
					  			<?php 
					  		}			  		
	}	
	
		function leave(){
			$data['pageTitle'] = 'Student Leave';
			$data['smallTitle'] = 'Student Personal Leave Detail';
			$data['mainPage'] = 'Student';
			$data['subPage'] = 'Student Personal Leave Detail';
			$data['title'] = 'Student Personal Leave Detail';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentLeave';
			$this->load->view("includes/mainContent", $data);
		}
		
		function timeScheduling(){
			$stu_id = $this->session->userdata('username');
			$var = $this->singleStudentModel->getclassAndStu($stu_id)->row();
			$section = $var->section;
			$data['section']=$section;
			$class = $var->class_id;
			$data['class']=$class;
			$var1 = $this->singleStudentModel->getTimeTable($class,$section);
			$data['timetable']=$var1->result();
			$data['pageTitle'] = 'Student Time Schedule';
			$data['smallTitle'] = 'Student Personal Time Table';
			$data['mainPage'] = 'Student';
			$data['subPage'] = 'Student Personal Time Table';
			
			$data['title'] = 'Student Personal Time Table';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentScheduling';
			$this->load->view("includes/mainContent", $data);
		}
		
		function examResult(){
			$data['pageTitle'] = 'Student Exam Result';
			$data['smallTitle'] = 'Personal Exam Result';
			$data['mainPage'] = 'Student';
			$data['subPage'] = 'Personal Exam Result';
			$data['title'] = 'Personal Exam Result';
			$data['headerCss'] = 'headerCss/studentExamCss';
			$data['footerJs'] = 'footerJs/studentExamJs';
			$data['mainContent'] = 'studentExamResult';
			$this->load->view("includes/mainContent", $data);
		}
		
		function stock(){
			$data['pageTitle'] = 'Student Stock Detail';
			$data['smallTitle'] = 'Stock purchesing detail';
			$data['mainPage'] = 'Student';
			$data['subPage'] = 'Stock purchesing detail';
			
			$data['title'] = 'Stock purchesing detail';
			$data['headerCss'] = 'headerCss/studentCss';
			$data['footerJs'] = 'footerJs/studentJs';
			$data['mainContent'] = 'studentStock';
			$this->load->view("includes/mainContent", $data);
		}
		
		function insertLeave(){
			$data =array(
		'stu_id'=>$this->session->userdata('username'),
		'start_date'=>$this->input->post("sdate"),
		'end_date'=>$this->input->post("edate"),
		'total_leave'=>$this->input->post("totalLeave"),
		'reason'=>$this->input->post("reason"),
		'approve'=>"NO"
		);
			$var=$this->singleStudentModel->insertLeave($data);
			if($var)
			{
				$msg="success";
				redirect("index.php/singleStudentControllers/leave/$msg");
			}
		}
		
		function stuReport1(){
			$stu_id = $this->input->post("stu_id");
			$edate = $this->input->post("edate");
			$sdate = $this->input->post("sdate");
			$this->load->model("singleStudentModel");
			$var = $this->singleStudentModel->getStuReport($edate,$sdate,$stu_id);
			if($var->num_rows() > 0){
				$sr = 1;
				?>		<table class="table table-striped table-hover" id="sample_2">
											<thead>
												<tr>
													<th>S.no.</th>
													<th>Date</th>
													<th>Present/Absent/Leave</th>
												
												</tr>
											</thead>
											<tbody>
												<?php 
							  			 foreach ($var->result() as $row){	
							  				?><tr>
							  					<td><?php echo $sr;?></td>
							  					<td><?php $stuID = $row->a_date;  echo $stuID;?></td>
							  					
							  					<td>
							  					<?php 
							  					$atten=$row->attendance;
							  							if($atten=='P'){
							  							?><td><?php echo "Present";}
							  							else { if ($atten=='A'){ 
							  								echo "Absent";
							  							}else echo "Leave";}?></td>
								  			</tr>
								  			<?php 
							  		$sr++;	
							  			}?>
											</tbody>
										</table>
							  			<?php 
							  		}	  		
			}
}