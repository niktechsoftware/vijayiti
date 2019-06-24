<?php
class LoginModel extends CI_Model{
	
	function validate(){
		// get username password and check is it for admin,employee or student.
		
		// check is it for admin
        $this->db->where("admin_username", $this->input->post("username"));
        $this->db->where("admin_password", md5($this->input->post("password")));
        $general = $this->db->get("general_settings");
        $res = $general->row();
        if($general->num_rows >= 1){
        	$loginData = array(
        			"login_type" => "admin",
        			"your_school_name" => $res->your_school_name,
        			"address_1" => $res->address_1,
        			"address_2" => $res->address_2,
        			"city" => $res->city,
        			"state" => $res->state,
        			"pin" => $res->pin,
        			"phone_number" => $res->phone_number,
        			"mobile_number" => $res->mobile_number,
        			"username" => $res->admin_username,
        			"name" => $res->principle_name,
        			"photo" => $res->ico_logo,
        			"logo" => $res->logo,
        			"fsd" => $res->finance_start_date,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
        
        // check is it for employee
        $this->db->where("emp_no",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        $query = $this->db->get("employee_info");
        $res = $query->row();
        if($query->num_rows >= 1){
        	$school = $general->row();
        	$loginData = array(
        			"login_type" => $res->job_category,
        			"job_category" => $res->job_category,
        			"address_1" => $res->address1,
        			"address_2" => $res->address2,
        			"city" => $res->city,
        			"state" => $res->state,
        			"pin" => $res->pin_code,
        			"mobile_number" => $res->mobile,
        			"email" => $res->email,
        			"username" => $res->emp_no,
        			"name" => $res->first_name.$res->mid_name.$res->last_name,
        			"photo" => $res->photo,
        			"logo" => $school->logo,
        			"fsd" => $school->finance_start_date,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
        
        // check is it for student
        $this->db->where("status","Active");
        $this->db->where("enroll_num",$this->input->post("username"));
        $this->db->where("password",$this->input->post("password"));
        $query = $this->db->get("student_info");
        $res = $query->row();
        if($query->num_rows >= 1){
        	$school = $general->row();
        	$loginData = array(
        			"login_type" => "student",
        			"username" => $res->student_id,
        			"name" => $res->first_name.$res->midd_name.$res->last_name,
        			"class_id" => $res->class_id,
        			"section" => $res->section,
        			"address_1" => $res->address1,
        			"address_2" => $res->address2,
        			"city" => $res->city,
        			"state" => $res->state,
        			"pin" => $res->pin_code,
        			"mobile_number" => $res->mobile,
        			"email" => $res->email,
        			"photo" => $res->photo,
        			"logo" => $school->logo,
        			"fsd" => $school->finance_start_date,
        			"is_login" => true,
        			"is_lock" => true,
        			"login_date" => date("d-M-Y"),
        			"login_time" => date("H:i:s")
        	);
            return $loginData;
        }
    }
    
    function validateLock(){
    	$login_type = $this->input->post('logintype');
    	//echo $login_type;
    	//die();
    	if($login_type == 'admin'){
    		$this->db->where("admin_username", $this->input->post("username"));
    		$this->db->where("admin_password", md5($this->input->post("password")));
    		$result = $this->db->get('general_settings');
    		if($result->num_rows() > 0){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	elseif($login_type == "student"){
    		$this->db->where("status","Active");
    		$this->db->where("student_id", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('student_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    	else{
    		$this->db->where("status","Active");
    		$this->db->where("emp_no", $this->input->post("username"));
    		$this->db->where("password", $this->input->post("password"));
    		$result = $this->db->get('employee_info');
    		if($result->num_rows() > 1){
    			return true;
    		}
    		else{
    			return false;
    		}
    	}
    }
    
}