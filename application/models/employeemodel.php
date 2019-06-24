<?php
class EmployeeModel extends CI_Model{
	function employeeList(){
		$this->db->where("status","Active");
		$result = $this->db->get("employee_info");
		return $result;
	}
	public function addEmployeeInfo($stream){
		$query = $this->db->insert("employee_info", $stream);
		return $query;
	}
	public function addEmployeeBankDetail($stream){
		$query = $this->db->insert("bank_account_detail", $stream);
		return $query;
	}
	public function addEmployeeSalaryStructure($stream){
		$query = $this->db->insert("emp_salary_struct", $stream);
		return $query;
	}
	public function getEmployeProfile($empNo){
		$this->db->where("emp_no",$empNo);
		$result = $this->db->get("employee_info");
		return $result;
	}
	public function updateEmployeProfile($empNo,$data){
		$this->db->where("emp_no",$empNo);
		$result = $this->db->update("employee_info",$data);
		if($result):
			return true;
		endif;
	}
	public function updateImage($data){
		$this->db->where('emp_no',$this->input->post('c_id'));
		$this->db->update('employee_info',$data);
		return true;
	}
	
	public function getSalaryDetail($enum){
		$this->db->where('emp_id',$enum);
		$detail = $this->db->get('emp_salary_struct');
		return $detail;
	}
	public function insertSalary($data){
		$query = $this->db->insert("emp_salary_info", $data);
		return true;
	}
	public function updateSalary($data){
		$this->db->where('emp_id',$data['emp_id']);
		$query = $this->db->update("emp_salary_info", $data);
		return true;
	}
	function employeeLeaveApprove()
	{
		$this->db->where('approve',"NO");
		$query = $this->db->get("emp_leave");
		return $query;
	}
	function updateApprove($emp_id,$total_leave,$end_date,$start_date,$data)
	{
		$this->db->where('emp_id',$emp_id);
		$this->db->where('total_leave',$total_leave);
		$this->db->where('end_date',$end_date);
		$this->db->where('start_date',$start_date);
		$this->db->update("emp_leave",$data);
		return true;
	}
	
}