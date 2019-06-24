<?php
class AdminController extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		$this->is_login();
		$this->load->model("teacherModel");
		$this->load->model("adminModel");
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
	
	function adminProfile(){
		$data['pageTitle'] = 'Admin Section';
		$data['smallTitle'] = 'Admin Profile';
		$data['mainPage'] = 'Admin Profile';
		$data['subPage'] = 'Edit or Update Profile';
		
		$profile = $this->adminModel->adminDetail();
		
		$data['profile'] = $profile;
		
		$data['title'] = 'Admin Profile';
		$data['headerCss'] = 'headerCss/adminProfileCss';
		$data['footerJs'] = 'footerJs/adminProfileJs';
		$data['mainContent'] = 'adminProfile';
		$this->load->view("includes/mainContent", $data);
	}
	
	function updateAdminProfile(){
		$data = array(
				"your_school_name" => $this->input->post("your_school_name"),
				"principle_name" => $this->input->post("principle_name"),
				"language" => $this->input->post("language"),
				"attendance_type" => $this->input->post("attendance_type"),
				"finance_start_date" => $this->input->post("finance_start_date"),
				"finance_end_date" => $this->input->post("finance_end_date"),
				"wise_principle_name" => $this->input->post("wise_principle_name"),
				"trusty_name_1" => $this->input->post("trusty_name_1"),
				"trusty_name_2" => $this->input->post("trusty_name_2"),
				"trusty_name_3" => $this->input->post("trusty_name_3"),
				"trusty_name_4" => $this->input->post("trusty_name_4"),
				"collage_registration_number" => $this->input->post("collage_registration_number"),
				"recognition_number" => $this->input->post("recognition_number"),
				"school_code" => $this->input->post("school_code"),
				"address_1" => $this->input->post("address_1"),
				"address_2" => $this->input->post("address_2"),
				"city" => $this->input->post("city"),
				"state" => $this->input->post("state"),
				"pin" => $this->input->post("pin"),
				"nationality" => $this->input->post("nationality"),
				"phone_number" => $this->input->post("phone_number"),
				"mobile_number" => $this->input->post("mobile_number"),
				"fax_number" => $this->input->post("fax_number"),
				"email1" => $this->input->post("email1"),
				"email2" => $this->input->post("email2")
		);
		if($this->adminModel->updateAdminProfile($data)):
			$loginData = array(
					"your_school_name" => $this->input->post("your_school_name"),
					"address_1" => $this->input->post("address_1"),
					"address_2" => $this->input->post("address_2"),
					"city" => $this->input->post("city"),
					"state" => $this->input->post("state"),
					"pin" => $this->input->post("pin"),
					"phone_number" => $this->input->post("phone_number"),
					"mobile_number" => $this->input->post("mobile_number"),
					"name" => $this->input->post("principle_name")
			);
			$this->session->set_userdata($loginData);
			echo '<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Done!</strong> Admin Profile successfully updated.
				</div>';
		else:
		echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Somthing goes wrong...!</strong> Contact site administator.
				</div>';
		endif;
	}
	
	function changeAdminPassword(){
		$old_password = $this->input->post("old_password");
		$password = $this->input->post("password");
		$cPassword = $this->input->post("cPassword");
		$this->db->where("admin_password",md5($old_password));
		$isPasswordMatched = $this->db->get("general_settings")->num_rows();
		if($cPassword != $password):
			echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Re-Password not matched...!</strong> Please correct it first.
				</div>';
		elseif((strlen($cPassword) <= 0) || (strlen($password) <= 0) || (strlen($old_password) <= 0)):
		echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Any field can not be blank...!</strong> Please correct it first.
				</div>';
		elseif($isPasswordMatched > 0):
			$data = array(
					"admin_password" => md5($password)
			);
			if($this->adminModel->updateAdminProfile($data)):
			echo '<div class="alert alert-success">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong>Done!</strong> Admin Password successfully updated.
					</div>';
			else:
			echo '<div class="alert alert-danger">
						<button data-dismiss="alert" class="close">
							&times;
						</button>
						<strong>Somthing goes wrong...!</strong> Contact site administator.
					</div>';
			endif;
		else:
			echo '<div class="alert alert-danger">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Password not matched...!</strong> Please try again.
				</div>';
		endif;
	}
	
	public function uploadAdminlogo(){
		$photo_name = time().trim($_FILES['logo']['name']);
		$new_img = array(
				"logo"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
	
		if($query = $this->db->update("general_settings",$new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '160';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['logo']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('logo')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("logo",$photo_name);
					redirect("index.php/adminController/adminProfile/true/updateInfo");
				}
			}
		}
	}
	
	public function uploadAdminPicture(){
		$photo_name = time().trim($_FILES['logo']['name']);
		$new_img = array(
				"ico_logo"=> $photo_name
		);
		$old_img = $this->input->post("old_img");
		@chmod("assets/images/empImage/" . $old_img, 0777);
		@unlink("assets/images/empImage/" . $old_img);
		
		if($query = $this->db->update("general_settings",$new_img)){
			$this->load->library('upload');
			// Set configuration array for uploaded photo.
			$image_path = realpath(APPPATH . '../assets/images/empImage');
			$config['upload_path'] = $image_path;
			$config['allowed_types'] = 'gif|jpg|jpeg|png';
			$config['max_size'] = '160';
			$config['file_name'] = $photo_name;
			// Upload first photo and create a thumbnail of it.
			if (!empty($_FILES['logo']['name'])) {
				$this->upload->initialize($config);
				if ($this->upload->do_upload('logo')) {
					// ---------------------------------- Redirect Success Page ----------------------
					$this->session->set_userdata("photo",$photo_name);
					redirect("index.php/adminController/adminProfile/true/updateInfo");
				}
			}
		}
	}
	
}