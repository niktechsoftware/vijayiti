<?php
class newAdmissionControllers extends CI_Controller{
	
	public function addinfo(){
		
             $s_no = $this->db->query("SELECT s_no From student_info order by s_no DESC Limit 1")->row()->s_no;
		$enroll_number= $s_no+2000;
$datastudent = array(
				"enroll_num" => $enroll_number,
				"name" => $this->input->post("name"),
				"dob" => $this->input->post("dob"),
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
				"password" =>$this->input->post("password"),
				"status"=>"Active",
				"mother_name"=>$this->input->post("mother_name"),
				
				"father_full_name" => $this->input->post("fatherName"),
				"f_mobile" => $this->input->post("fatherMobileNumber"),
				"admission_date" => $this->input->post("dateOfAdmission"),
				"shift" => $this->input->post("classOfAdmission"),
				"unit" => $this->input->post("section"),
				"trade" => $this->input->post("stream"),
				"qualification" => $this->input->post("qualification"),
				"board_uni_school" => $this->input->post("board_uni_school"),
				"pass_year" => $this->input->post("pass_year"),
				"dividion" => $this->input->post("dividion"),
				"marks" => $this->input->post("marks"),
				"subject" => $this->input->post("subject"),
				"stud_father" 			=> "stuMale.png",
				"quali_certificate"		=>"previousMarkSheet.png",
				"income_certificate"	=>"domicileCertificate.png",
				"cast_certificate"		=>"castCertificate.png",
				"stud_sign"				=>"tc.png",
				"stud_image"			=>"cc.png",
				"fsd"				=>$this->session->userdata("fsd")
				
		);
		
		$val1=$this->db->insert("student_info",$datastudent);
			//---------------------------------------------- CHECK SMS SETTINGS -----------------------------------------
			if($val1){	
			$val=$this->db->get("sms_setting")->row();
			$senderiD=$val->sender_id;
			$authkey=$val->auth_key;
			$isSMS = $this->db->get("sms")->row()->admission;
				if($isSMS=="yes")
				{
					$this->load->helper("sms");
					$f_name=$this->input->post("fatherName");
					$username = $enroll_num;
					$password = $this->input->post("password");
					$f_mobile = $this->input->post("fatherMobileNumber");
					
					sms($authkey,"Dear $f_name Admission is Success in ITI. Your Ward's Student ID= $username and Password=$password. Thanks for Reliance.",$senderiD,$f_mobile);
				}
					
					
			//---------------------------------------------- END CHECK SMS SETTINGS -----------------------------------------
			
			
				redirect(base_url()."index.php/studentController/admissionSuccess/$enroll_number");
			
			}
		
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
}