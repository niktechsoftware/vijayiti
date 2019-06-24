<?php
class StudentController extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("studentModel");
		$this->load->model("allFormModel");
		$this->load->model("subjectModel");
	}
	
	function admissionSuccess(){
		$data['pageTitle'] = 'Student Section';
		$data['smallTitle'] = 'Student Profile';
		$data['mainPage'] = 'Student';
		$data['subPage'] = 'Profile';
	
		$studentId = $this->uri->segment(3);
		
		$stDetail = $this->studentModel->getStudentDetail($studentId);
		
		
		$data['studentProfile'] = $stDetail;
		$data['title'] = 'Student Profile';
		$data['headerCss'] = 'headerCss/admissionSuccessCss';
		$data['footerJs'] = 'footerJs/admissionSuccessJs';
		$data['mainContent'] = 'admissionSuccess';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateStudentImage(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['stuImage']['name']);
		$new_img = array(
				"photo"=> $photo_name
		);
		$old_img = $this->input->post("old_stuImg");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['stuImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('stuImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	function updateFatherImage(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['fatherImage']['name']);
		$new_img = array(
				"f_photo"=> $photo_name
		);
		$old_img = $this->input->post("old_f_image");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateGurdianInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['fatherImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('fatherImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	function updateMotherImage(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['motherImage']['name']);
		$new_img = array(
				"m_photo"=> $photo_name
		);
		$old_img = $this->input->post("old_m_image");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateGurdianInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['motherImage']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('motherImage')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
				}
			}
		}
	}
	
	function updateStuInfo(){
		$id = $this->input->post('c_id');
		$datastudent = array(
			
				"name" => $this->input->post("firstName"),
				"mother_name" => $this->input->post("middleName"),
				"father_full_name" => $this->input->post("fatherName"),
				"dob" => $this->input->post("dob"),
				"admission_date" => $this->input->post("dateOfAdmission"),
				"trade" => $this->input->post("classOfAdmission"),
				"unit" => $this->input->post("section"),
				"gender" => $this->input->post("gender"),
				
				"category" => $this->input->post("category"),
				"religion" => $this->input->post("religion"),
				"address1" => $this->input->post("addLine1"),
				"address2" => $this->input->post("addLine2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin_code" => $this->input->post("pinCode"),
				"country" => $this->input->post("country"),
				
				"mobile" => $this->input->post("mobileNumber"),
				"email" => $this->input->post("emailAddress"),
				"f_mobile"=>$this->input->post("fmobile"),
				"status" => $this->input->post("status")
		);
		if($query = $this->studentModel->updateStudentInfo($datastudent,$id)){
			redirect(base_url()."index.php/studentController/admissionSuccess/$id/updateInfo");
		}
	}
	
	function updateParentInfo(){
		$id = $this->input->post('c_id');
		
		$dataparent = array(
				"father_full_name" => $this->input->post("fatherName"),
				"mother_full_name" => $this->input->post("motherName"),
				"caretaker_name" => $this->input->post("guardianName"),
				"caretaker_relation" => $this->input->post("guardianRelation"),
				"father_education" => $this->input->post("fatherEducation"),
				"mother_education" => $this->input->post("motherEducation"),
				"father_occupation" => $this->input->post("fatherOccupation"),
				"mother_occupation" => $this->input->post("motherOccupation"),
				"family_annual_income" => $this->input->post("familyAnnualIncome"),
				"address" => $this->input->post("parentAddress"),
				"city" => $this->input->post("parentCity"),
				"state" => $this->input->post("parentState"),
				"pin" => $this->input->post("parentPin"),
				"country" => $this->input->post("parentCountry"),
				"phone" => $this->input->post("parentPhoneNumber"),
				"f_mobile" => $this->input->post("fatherMobileNumber"),
				"m_mobile" => $this->input->post("motherMobileNumber"),
				"f_email" => $this->input->post("fatherEmailAddress"),
				"m_email" => $this->input->post("motherEmailAddress"),
		);
		
		if($query = $this->studentModel->updateGurdianInfo($dataparent,$id)){
			redirect("index.php/studentController/admissionSuccess/$id/updateInfo");
		}
	}
	
	function uploadCc(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['cc']['name']);
		$new_img = array(
				"cc"=> $photo_name
		);
		$old_img = $this->input->post("old_cc");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['cc']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('cc')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadTc(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['tc']['name']);
		$new_img = array(
				"tc"=> $photo_name
		);
		$old_img = $this->input->post("old_tc");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['tc']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('tc')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadCastCertificate(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['castCertificate']['name']);
		$new_img = array(
				"castCertificate"=> $photo_name
		);
		$old_img = $this->input->post("old_castCertificate");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['castCertificate']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('castCertificate')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadDomicileCertificate(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['domicileCertificate']['name']);
		$new_img = array(
				"domicileCertificate"=> $photo_name
		);
		$old_img = $this->input->post("old_domicileCertificate");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['domicileCertificate']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('domicileCertificate')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}

	function uploadPreviousMarkSheet(){
		$id = $this->input->post('c_id');
	
		$photo_name = time().trim($_FILES['previousMarkSheet']['name']);
		$new_img = array(
				"previousMarkSheet"=> $photo_name
		);
		$old_img = $this->input->post("old_previousMarkSheet");
		@chmod("assets/images/stuImage/" . $old_img, 0777);
		@unlink("assets/images/stuImage/" . $old_img);
	
		if($query = $this->studentModel->updateStudentInfo($new_img,$id)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/stuImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '1024';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['previousMarkSheet']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('previousMarkSheet')) {
					// ---------------------------------- Redirect Success Page ----------------------
					redirect("index.php/studentController/admissionSuccess/$id/certificate");
				}
			}
		}
	}
	
	function studentList(){
		$data['result'] = $this->studentModel->studentList();
		$data['enroll_num'] = $this->input->post("enroll_num");
		$data['name'] = $this->input->post("name");
		$data['unit'] = $this->input->post("unit");
		$data['address1'] = $this->input->post("address1");
		$data['dob'] = $this->input->post("dob");
		$data['date_ob'] = $this->input->post("date_ob");
		$data['registration_no'] = $this->input->post("registration_no");
		$data['gender'] = $this->input->post("gender");
		$data['admission_date'] = $this->input->post("admission_date");
		$data['category'] = $this->input->post("category");
		$data['religion'] = $this->input->post("religion");
		
		$data['city'] = $this->input->post("city");
		$data['state'] = $this->input->post("state");
		$data['pin_code'] = $this->input->post("pin_code");
		
		$data['mobile'] = $this->input->post("mobile");
		$data['shift'] = $this->input->post("shift");
		$data['father_full_name'] = $this->input->post("father_full_name");
		$data['mother_name'] = $this->input->post("mother_name");
		$data['trade'] = $this->input->post("trade");
		
		$data['f_mobile'] = $this->input->post("f_mobile");
		$data['m_mobile'] = $this->input->post("m_mobile");
		$data['f_email'] = $this->input->post("f_email");
		$data['m_email'] = $this->input->post("m_email");
		
		$this->load->view("ajax/studentList",$data);
		}
		
		public function checkID(){
			$tid = $this->input->post("student_id");
			$this->load->model("teacherModel");
			$var = $this->teacherModel->checkStudID($tid);
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					?>
							<div class="alert alert-success">
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								ID Found ! <strong><?php echo $row->first_name." ".$row->midd_name." ".$row->last_name; ?></strong>
							</div>
							<?php 
						}}
					else{
						?>
							<div class="alert alert-danger">
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								Sorry :( <strong><?php echo "Student ID Not Found ! Wrong Student Id"; ?></strong>
							</div>
						<?php
						
					}
				
			}
			
			function deleteStudent(){
				$studentId = $this->uri->segment(3);
				$this->db->where('enroll_num', $studentId);
				$this->db->delete('student_info');
				
				
			redirect(base_url()."index.php/login/simpleSearchStudent");
			}
	
}