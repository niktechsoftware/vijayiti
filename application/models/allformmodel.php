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


function updatefsd($fsdid){

    $fsdid1=array(

     'fsd_id' =>$fsdid, 

         );
//       $this->db->where('fsd',$fsdid);
//      $result=$this->db->get('class_fees');
    
//       if($result->num_rows()>0)
//         {
    
//         }
//          else 
//          {

//              $this->db->where('fsd',$this->session->userdata("fsd"));
//             $result21=$this->db->get('class_fees');
//              if($result21->num_rows()>0)
//         {
//             foreach($result21->result() as $value):
//         $data=array(
//             'fsd' =>$fsdid, 
//             'class_id'=>$value->class_id,
//             'taken_month'=>$value->taken_month,
//             'fee_head_name'=>$value->fee_head_name,
//             'fee_head_amount'=>$value->fee_head_amount,
//             'update_date'=>date('d-m-y'),
//          );
//          $insert=$this->db->insert('class_fees',$data);
//             endforeach;
    
//         }
//             }
        
    

// $this->db->WHERE('school_code', $this->session->userdata("school_code"));
$result=$this->db->update('general_settings',$fsdid1);
return $result;
}


        
    
?>