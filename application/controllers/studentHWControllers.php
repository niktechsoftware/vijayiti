<?php
class studentHWControllers extends CI_Controller{
	
	
	public function defineHomeWork(){
		$data['pageTitle'] = 'Configuration';
		$data['smallTitle'] = 'Class, Section And Subject Stream';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Class, Section, Subject Stream';
		$res=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['noc'] = $res->result();
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/homeWorkCss';
		$data['footerJs'] = 'footerJs/homeWorkJs';
		$data['mainContent'] = 'studentHomeWork';
		$this->load->view("includes/mainContent", $data);
	}
	
	function addHomeWork(){
		$givenby=$this->session->userdata('username');
		$workfor=$this->input->post("homeworkfor");
		$this->load->model("homeWorkModel");
		if($workfor=="students")
		{
			$data=array(
					"workfor"=>$this->input->post("homeworkfor"),
					"work_name"=>$this->input->post("wsubjectname"),
					"maximam_marks"=>$this->input->post("mm"),
					"class"=>$this->input->post("classv"),
					"section"=>$this->input->post("section"),
					"subject"=>$this->input->post("subject"),
					"DueWorkDate"=>$this->input->post("sdate"),
					"givenWorkDate"=>$this->input->post("gdate"),
					"givenby"=>$givenby,
					"workID"=>10001,
					"workDiscription"=>$this->input->post("hwdefine"),
					"upload_filename"=>$this->input->post("filehomeWork"),
					"remark"=>$this->input->post("hwremark")
			);
			$var=$this->homeWorkModel->saveHomeWork($data);
			if($var)
				redirect("index.php/studentHWControllers/defineHomeWork/success");
		}else{
			$data=array(
					"workfor"=>$this->input->post("homeworkfor"),
					"work_name"=>$this->input->post("wsubjectname"),
			"maximam_marks"=>0,
			"class"=>"NotForClass",
			"section"=>"NotForSection",
			"subject"=>"NotForSubject",
			"DueWorkDate"=>$this->input->post("sdate"),
			"givenWorkDate"=>$this->input->post("gdate"),
			"givenby"=>$givenby,
			"workID"=>10001,
			"workDiscription"=>$this->input->post("hwdefine"),
			"upload_filename"=>$this->input->post("filehomeWork"),
			"remark"=>$this->input->post("hwremark")
					);
			$var=$this->homeWorkModel->saveHomeWork($data);
			if($var)
				redirect("index.php/studentHWControllers/defineHomeWork/success");
		}
		
	}
	function showHomeWork()
	{
		$this->load->model("homeWorkModel");
		$data['pageTitle'] = 'Configuration';
		$data['smallTitle'] = 'Class, Section And Subject Stream';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Class, Section, Subject Stream';
		$res=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$data['noc'] = $res->result();
		$va=$this->homeWorkModel->getHomeWorkDetail();
		$data['var1']=$va->result();
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/homeWorkCss';
		$data['footerJs'] = 'footerJs/showHomeWorkJs';
		$data['mainContent'] = 'showHomeWork';
		$this->load->view("includes/mainContent", $data);
	
		
	}
	
	function getTeacherWork()
	{	
		$this->load->model("homeWorkModel");
		$va=$this->homeWorkModel->getHomeWorkDetailTeacher();
		$var1=$va->result();
		
	?>
		<div class="table-responsive" id ="normal">
		<table class="table table-striped table-hover" id="sample-table-2">
		<thead>
		<tr>
		<th>S.no.</th>
		<th>Given By</th>
		<th>Assignment Title</th>
		<th>Work Description</th>
		<th>Given Date</th>
		<th>Submission Date</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$count = 1;
					foreach($var1 as $lv): ?>
						<tr>
				  			<td><?php echo $count;?></td>
				  			<td><?php echo $lv->givenby;?></td>
				  			<td><?php echo $lv->work_name;?></td>
				  			<td><?php echo $lv->workDiscription;?></td>
				  			<td>
								<?php echo $lv->givenWorkDate; ?>
							</td>
							<td>
								<?php echo $lv->DueWorkDate; ?>
							</td>
				  		</tr>
				  		<?php $count++; endforeach; ?>
					</tbody>
				</table>
				</div>
	<?php }
	
function getStudentWork(){
	$this->load->model("homeWorkModel");
	$va=$this->homeWorkModel->getHomeWorkDetailStudent();
	$var1=$va->result();
	?>
	<div class="table-responsive" id ="normal">
	<table class="table table-striped table-hover" id="sample-table-2">
	<thead>
	<tr>
	<th>S.no.</th>
	<th>Given By</th>
	<th>Assignment Title</th>
	<th>Class</th>
	<th>Section</th>
	<th>Marks & Grade</th>
	<th>Work Description</th>
	<th>Given Date</th>
	<th>Submission Date</th>
	</tr>
	</thead>
	<tbody>
	<?php
	$count = 1;
				foreach($var1 as $lv): ?>
					<tr>
			  			<td><?php echo $count;?></td>
			  			<td><?php echo $lv->givenby;?></td>
			  			<td><?php echo $lv->work_name;?></td>
			  			<td><?php echo $lv->class;?></td>
			  			<td><?php echo $lv->section;?></td>
			  			<td><?php echo $lv->maximam_marks;?></td>
			  			<td><?php echo $lv->workDiscription;?></td>
			  			<td>
							<?php echo $lv->givenWorkDate; ?>
						</td>
						<td>
							<?php echo $lv->DueWorkDate; ?>
						</td>
			  		</tr>
			  		<?php $count++; endforeach; ?>
				</tbody>
			</table>
			</div><?php 
	}
	
	

	function showHomeWork1(){
	$classt=$this->input->post("classv");
	$sec=$this->input->post("section");
	$this->load->model("homeWorkModel");
	$var=$this->homeWorkModel->getSectionWise($classt,$sec);
	?>
		<div class="table-responsive" id ="normal">
		<table class="table table-striped table-hover" id="sample-table-2">
		<thead>
		<tr>
		<th>S.no.</th>
		<th>Given By</th>
		<th>Assignment Title</th>
		<th>Class</th>
		<th>Section</th>
		<th>Marks & Grade</th>
		<th>Work Description</th>
		<th>Given Date</th>
		<th>Submission Date</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$count = 1;
					foreach($var->result() as $lv): ?>
						<tr>
				  			<td><?php echo $count;?></td>
				  			<td><?php echo $lv->givenby;?></td>
				  			<td><?php echo $lv->work_name;?></td>
				  			<td><?php echo $lv->class;?></td>
				  			<td><?php echo $lv->section;?></td>
				  			<td><?php echo $lv->maximam_marks;?></td>
				  			<td><?php echo $lv->workDiscription;?></td>
				  			<td>
								<?php echo $lv->givenWorkDate; ?>
							</td>
							<td>
								<?php echo $lv->DueWorkDate; ?>
							</td>
				  		</tr>
				  		<?php $count++; endforeach; ?>
					</tbody>
				</table>
				</div><?php 
	}
}