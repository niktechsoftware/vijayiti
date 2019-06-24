<?php 
class TeacherController extends CI_Controller{
	public static $sno = 0;
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("teacherModel");
	}
	function presentiH(){
		$sec = $this->input->post("section");
		$cla = $this->input->post("classv");
		$check = $this->teacherModel->checkPresenti($sec,$cla);
		if($check->num_rows() > 0)
		{
		
		}else{
		if($sec)
		{?>
			<tr>
			<td>S.No.</td>
			<td>Enrollment no </td>
			<td> Registration No</td>
			<td> Student Name</td>
			<td> Mobile</td>
			<td> Attendance<input type="hidden" value="300001" name="tID" /></td>
			</tr>
			<?php 
		}
		}
	}
	function presentiHa2(){
		$sec = $this->input->post("section");
		$cla = $this->input->post("classv");
		$check = $this->teacherModel->checkPresenti($sec,$cla);
		if($check->num_rows() > 0)
		{
	
		}else{
			if($sec)
			{?>
				<tr>
				<td>S.No.</td>
				<td>Student ID </td>
				<td> Scholer No</td>
				<td> Student Name</td>
				<td> Mobile</td>
				<td> Attendance<input type="hidden" value="300001" name="tID" /></td>
				</tr>
				<?php 
			}
			}
		}
	
	
	
	function presenti(){
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		$data['tid'] = $this->input->post("teacherid");
		$tid= $this->input->post("teacherid");
		$data['check'] = $this->teacherModel->checkPresenti($sec,$cla);
		$data['var'] = $this->teacherModel->getPresenti($sec,$cla,$tid);
		$this->load->view("ajax/studenceAtten",$data);
	}
	
	
	function presentia2(){
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		$data['tid'] = $this->input->post("teacherid");
		$tid= $this->input->post("teacherid");
		$data['check'] = $this->teacherModel->checkPresentia2($sec,$cla);
		$data['var'] = $this->teacherModel->getPresentia2($sec,$cla,$tid);
		$this->load->view("ajax/studenceAtten2",$data);
	}
					
	    function getSection(){
		$tid = $this->input->post("classv");
		$this->load->model("teacherModel");
		$var = $this->teacherModel->getSection($tid);
			if($var->num_rows() > 0){
				echo '<option value="">-Select Section-</option>';
				foreach ($var->result() as $row){
					echo '<option value="'.$row->section.'">'.$row->section.'</option>';
				} 
				echo '<option value="all">All</option>';
			}
	    }
		function getSubject(){
		$this->db->where("class_id",$this->input->post("classv"));
		$this->db->where("section",$this->input->post("section"));
		$var = $this->db->get("subject");
			if($var->num_rows() > 0){
				echo '<option value="">-Select Subject-</option>';
				foreach ($var->result() as $row){
					echo '<option value="'.$row->subject.'">'.$row->subject.'</option>';
				} 
				echo '<option value="all">All</option>';
			}
		}
	
	function checkID(){
		$tid = $this->input->post("teacherid");
		$this->load->model("teacherModel");
		$var = $this->teacherModel->checkID($tid);
		if($var->num_rows() > 0){
			foreach ($var->result() as $row){
				?>
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					ID Found ! <strong><?php echo $row->first_name." ".$row->mid_name." ".$row->last_name; ?></strong>
				</div>
				<?php 
			}}
		else{
			?>
				<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					Sorry :( <strong><?php echo "Teacher Not Found ! Wrong teacher Id"; ?></strong>
				</div>
			<?php
			
		}
	
}

			  function teacherAtten()
			  {
			  	
			  	$i = $this->input->post("rows");
			  	$date1 = $this->input->post("date1");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"t_id" => $this->input->post("tID"),
			  				"emp_no" => $this->input->post("empID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => $date1
			  		);
			  		$this->db->where("emp_no",$this->input->post("empID$j"));
			  		$this->db->where("a_date",$date1);
			  		$req = $this->db->get("teacher_attendance");
			  		if($req->num_rows() > 0){
			  			$this->db->where("a_date",$date1);
			  			$this->db->where("emp_no",$this->input->post("empID$j"));
			  			$this->db->update("teacher_attendance",$data);
			  		}else{
			  			$this->teacherModel->addEmpAttendance($data);
			  		}
			  		echo $j;
			  	}
			 redirect("index.php/login/teacherAttendance/Attendance Done");
			  }

			  function studentAtten()
			  {
			  	$school_info = mysql_query("select * from general_settings");
			  	$info = mysql_fetch_object($school_info);
			  	$this->load->helper("sms");
			  	$i = $this->input->post("rows");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"section" => $this->input->post("section"),
			  				"class" => $this->input->post("classv"),
			  				"teacher_id" => $this->input->post("teacherid"),
			  				"scholer_number" => $this->input->post("schno$j"),
			  				"stu_id" => $this->input->post("stuID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => date("Y-m-d")
			  		);
			  		
			  		$val=$this->db->get("sms_setting")->row();
			  		$senderiD=$val->sender_id;
			  		$authkey=$val->auth_key;
			  		$isSMS = $this->db->get("sms")->row()->stu_attendance;
			  		$absent=$this->input->post("gender$j");
			  		$stu_id = $this->input->post("stuID$j");
			  		$this->db->where("enroll_num",$stu_id);
					$var=$this->db->get("student_info")->row();
					$fname=$var->father_full_name;
					$fmobile=$var->f_mobile;
					
					$sname=$var->name;
					
			  	if($isSMS=="yes")
			  		{	
			  			if($absent=='P')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is Present today ".date("d-M-Y H:i:s").". Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='L')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is on Leave today ".date("d-M-Y H:i:s")." with an application information.Please make sure. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='A')
			  			{
			  
			  			
			  				$msg="Dear parent your Child ".$sname." is Absent today ".date("d-M-Y H:i:s")." without any information.Please make sure & let us know. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  		}
			  		$this->teacherModel->addstuAttendance($data);
			  	}
			  	redirect("index.php/login/studentAttendance/Attendance Done");
			  }
			  
			  
			  function studentAtten2()
			  {
			  	$school_info = mysql_query("select * from general_settings");
			  	$info = mysql_fetch_object($school_info);
			  	$this->load->helper("sms");
			  	$i = $this->input->post("rows");
			  	$this->load->model("teacherModel");
			  	for($j=1; $j<$i; $j++){
			  		$data = array(
			  				"section" => $this->input->post("section"),
			  				"class" => $this->input->post("classv"),
			  				"teacher_id" => $this->input->post("teacherid"),
			  				"scholer_number" => $this->input->post("schno$j"),
			  				"stu_id" => $this->input->post("stuID$j"),
			  				"attendance" => $this->input->post("gender$j"),
			  				"a_date" => date("Y-m-d")
			  		);
			  		 
			  		$val=$this->db->get("sms_setting")->row();
			  		$senderiD=$val->sender_id;
			  		$authkey=$val->auth_key;
			  		$isSMS = $this->db->get("sms")->row()->stu_attendance;
			  		$absent=$this->input->post("gender$j");
			  		$stu_id = $this->input->post("stuID$j");
			  		$this->db->where("student_id",$stu_id);
			  		$var=$this->db->get("guardian_info")->row();
			  		$fname=$var->father_full_name;
			  		$fmobile=$var->f_mobile;
			  		$this->db->where("status","Active");
			  		$this->db->where("student_id",$stu_id);
			  		$stu=$this->db->get("student_info")->row();
			  		$sname=$stu->first_name;
			  		if($isSMS=="yes")
			  		{	
			  			if($absent=='P')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is Present today ".date("d-M-Y H:i:s").". Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='L')
			  			{
			  					
			  			
			  				$msg="Dear parent your Child ".$sname." is on Leave today ".date("d-M-Y H:i:s")." with an application information.Please make sure. Thanks ".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  			if($absent=='A')
			  			{
			  
			  			
			  				$msg="Dear parent your Child ".$sname." is Absent today ".date("d-M-Y H:i:s")." without any information.Please make sure & let us know. Thanks".$info->your_school_name;
			  				sms($authkey, $msg,$senderiD,$fmobile);
			  			}
			  		}
			  		$this->teacherModel->addstuAttendancea2($data);
			  	}
			  	redirect("index.php/login/studentAttendance2/Attendance Done");
			  }
			  
			  function stuReport(){
			  		$edate = $this->input->post("edate");
			  		$sec = $this->input->post("section");
			  		$cla = $this->input->post("classv");
			  		$sdate = $this->input->post("sdate");
			  		
			  		$this->load->model("singleStudentModel");
			  		$this->load->model("teacherModel");
			  		$this->load->model("searchStudentModel");
			  		
			  		$var = $this->teacherModel->getStuReport($edate,$sec,$cla,$sdate);
			  		if($var->num_rows() > 0){
			  			$sr = 1;
			  			TeacherController::$sno = $sr;
			  			?>
			  			<table class="table table-striped table-hover" id="sample_2">
							<thead>
								<tr>
									<th>S.no.</th>
									<th>Student Id</th>
									<th>Student Name</th>
									<th>Present</th>
									<th>Absent</th>
									<th>Leave</th>
									<!-- <th>Detail</th>  -->
								</tr>
							</thead>
							<tbody>
								<?php 
			  			 foreach ($var->result() as $row){	
			  				?><tr>
			  					<td><?php echo TeacherController::$sno;?></td>
			  					<td><?php $stuID = $row->stu_id;  echo $stuID;?></td>
			  					<?php $stuname=$this->singleStudentModel->getStudentName($stuID)->row();?>
			  					<td><?php echo $stuname->first_name."-".$stuname->midd_name."-".$stuname->last_name;?></td>
			  					<td>
			  						<?php 
			  							$absent = $this->teacherModel->countAtt($edate,$sdate,$stuID);
			  							echo $absent['p'];
			  						?> 
			  					</td>
				  				<td><?php echo $absent['a'];?></td>
				  				<td><?php echo $absent['l'];?></td>
				  				<!-- <td>
				  					<button data-target=".bs-example-modal-basic1" data-toggle="modal" class="btn btn-blue">
										View Detail
									</button>
				  				</td>
				  				-->
				  			</tr>
				  			<?php 
			  			TeacherController::$sno++;	
			  			}?>
							</tbody>
						</table>
			  			<?php 
			  		}			  		
				}
				
				function teacherReport(){
					
					$edate = $this->input->post("edate");
					$sdate = $this->input->post("sdate");
					$this->load->model("singleStudentModel");
					$this->load->model("teacherModel");
					$this->load->model("searchStudentModel");
					 
					$var = $this->teacherModel->getteacherattenReport($edate,$sdate);
					if($var->num_rows() > 0){
						$sr = 1;
						TeacherController::$sno = $sr;
						?>
								  			<table class="table table-striped table-hover" id="sample-table-2">
												<thead>
													<tr>
														<th>S.no.</th>
														<th>Employee Id</th>
														<th>Employee Name</th>
														<th>Present</th>
														<th>Absent</th>
														<th>Leave</th>
													
													</tr>
												</thead>
												<tbody>
													<?php 
								  			 foreach ($var->result() as $row){	
								  				?><tr>
								  					<td><?php echo TeacherController::$sno;?></td>
								  					<td><?php $stuID = $row->emp_no;  echo $stuID;?></td>
								  					<?php $empname=$this->singleStudentModel->getteacherName($stuID)->row();?>
								  					<td><?php echo $empname->first_name."-".$empname->mid_name."-".$empname->last_name;?></td>
								  					<td>
								  						<?php 
								  							$absent = $this->teacherModel->countAttTeacher($edate,$sdate,$stuID);
								  							echo $absent['p'];
								  						?> 
								  					</td>
									  				<td><?php echo $absent['a'];?></td>
									  				<td><?php echo $absent['l'];?></td>
									  				<!-- <td>
									  					<button data-target=".bs-example-modal-basic1" data-toggle="modal" class="btn btn-blue">
															View Detail
														</button>
									  				</td>
									  				-->
									  			</tr>
									  			<?php 
								  			TeacherController::$sno++;	
								  			}?>
												</tbody>
											</table>
								  			<?php 
								  		}			  	
					
					
					
					
					
					
					
					
				}	
				function attenMsg(){
					$date1 = $this->input->post("radate");
					$this->db->where("a_date",$date1);
					$req = $this->db->get("teacher_attendance");
					if($req->num_rows() > 0)
					{
						?><div class="alert alert-danger">
							<?php echo "Teacher Attendance is Done for Date ".$date1;?></div><?php 
																
															}
				}			
}
?>