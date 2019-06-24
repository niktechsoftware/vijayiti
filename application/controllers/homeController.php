<?php
class HomeController extends CI_Controller{
	function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	}
	function sendEmail(){
	$userid=$this->input->post("userID");
	$email1=$this->input->post("email1");
	$this->db->where("email",$email1);
	$this->db->where("emp_no",$userid);
	$this->db->from('employee_info');
	$count = $this->db->count_all_results();
	
	
	$this->db->where("email",$email1);
	$this->db->where("emp_no",$userid);
	$var = $this->db->get('employee_info');
	
	if($count>0)
	{  $pass=  $var->row()->password;
	
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your password is ".$pass." Thanks for using E-mail to password Recovery System";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
	}
	else
	{
	$this->db->where("email",$email1);
	$this->db->where("student_id",$userid);
	$this->db->from('student_info');
	$count = $this->db->count_all_results();
	
	
	$this->db->where("email",$email1);
	$this->db->where("student_id",$userid);
	$var = $this->db->get('student_info');
	if($count>0)
	{  $pass=  $var->row()->password;
	
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your password is ".$pass." Thanks for using E-mail to password Recovery System";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
	}
	else{
		$to      = $email1;
		$subject = 'Password recovery';
		$message = "Your sorry Please enter a valid E_mail";
		$headers = 'From: rahul@gfinch.in' . "\r\n" .
		    'Reply-To: rahul@gfinch.in' . "\r\n" .
		    'X-Mailer: PHP/' . phpversion();
		
		$succ = mail($to, $subject, $message, $headers);
		if($succ)
		{
		redirect("index.php/homeController/index/8");
		}
		else
		{
		echo "error";
		}
		}
	}
	
	}

		function index(){
		if($this->session->userdata("is_login") == true){
			$this->session->unset_userdata();
			$this->session->sess_destroy();
		}
		$data['title'] = 'Gfinch-School Login Area';
		$this->load->helper("sms");
		//sms("4947cf80573bb1b355d918ad91fe35fd","Hi pushpendra","GFINCH","7668538172");
		$this->load->view("login", $data);
	}
	
	function login_check(){
		$query = $this->loginModel->validate();
	
		if($query['is_login']){  //if user validation return true after validation
			
			if($query['login_type'] == "admin"):
				$this->session->set_userdata($query);
				//echo $query['login_type'];
				redirect("index.php/login/index");
			elseif($query['login_type'] == "student"):
				//echo $query['login_type'];
				$this->session->set_userdata($query);
				redirect("index.php/singleStudentControllers");
			elseif($query['login_type'] == "teacher"||$query['login_type'] == "employee"):
				//echo $query['login_type'];
				$this->session->set_userdata($query);
				redirect("index.php/singleTeacherControllers");
			elseif($query['login_type'] == "accountent"):
			//echo $query['login_type'];
			$this->session->set_userdata($query);
			redirect("index.php/login/index");
			else:
				redirect("index.php/login/index");
			endif;
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/index/authFalse");
		}
	}
	
	function unlock(){
		$query = $this->loginModel->validateLock();
		
		if($query){  //if user Lock validation return true after validation
			$this->session->set_userdata('is_lock',true);
			redirect("index.php/login/index");
		}
		else{ // if user not validate the credential ....
			redirect("index.php/homeController/lockPage/false");
		}
	}
	
	function logout()
	{	
		$this->session->unset_userdata();
		$this->session->sess_destroy();
		redirect('index.php/homeController');
	}
	
	function lockPage(){
		if($this->session->userdata("is_login") == false){
			redirect('index.php/homeController');
		}
		$data['title'] = $this->session->userdata("name");
		$this->session->set_userdata('is_lock', false);
		$this->load->view("lockPage", $data);
	}
	
	function recoverPassword(){
		
	}
	
	function test(){
		$this->load->view("test");
	}
	
	function testsms(){
		$this->load->view("testsms");
	}
	
}