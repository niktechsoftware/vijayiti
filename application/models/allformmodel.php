<?php
class AllFormModel extends CI_Model{
	function getState(){
		$result = $this->db->query("SELECT DISTINCT state FROM city_state ORDER BY state");
		return $result;
	}
	
	function getCity($state){
		$result = $this->db->query("SELECT DISTINCT city FROM city_state WHERE state = '$state' ORDER BY city");
		return $result;
	}
	
	function getArea($state,$city){
		$result = $this->db->query("SELECT DISTINCT area FROM city_state WHERE city = '$city' AND state = '$state' ORDER BY area");
		return $result;
	}
	
	function getPin($state,$city,$area){
		$result = $this->db->query("SELECT DISTINCT pin FROM city_state WHERE city = '$city' AND state = '$state' AND area = '$area' ORDER BY area LIMIT 1");
		return $result;
	}
	
	function getClass(){
		$result = $this->db->query("SELECT DISTINCT streem FROM class_info");
		return $result;
	}
	
	function getSection(){
		$result = $this->db->query("SELECT DISTINCT section FROM class_info");
		return $result;
	}
	
	function getEmployeeID(){
		$result = $this->db->query("SELECT emp_no FROM employee_info ORDER BY emp_no DESC LIMIT 1");
			foreach($result->result() as $row):
				$id = $row->emp_no;
			endforeach;
		return $id;
	}
	
	function getSectionByClass($className){
		$result = $this->db->query("SELECT section FROM class_info WHERE class_name = '$className'");
		return $result;
	}
}