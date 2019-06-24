<?php 
class promotionControler extends CI_Controller{
	public static $sno = 0;
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model("teacherModel");
	}
	
	
	function presenti(){
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		$this->db->where("section",$sec);
		$this->db->where("class_id",$cla);
		$data['check'] = $this->db->get("student_info");
		$this->load->view("ajax/classPromotion",$data);
	}
	
	function presenti12(){
		$data['sec'] = $this->input->post("section");
		$sec = $this->input->post("section");
		$data['cla']  = $this->input->post("classv");
		$cla = $this->input->post("classv");
		
		$this->load->view("ajax/classPromotionList",$data);
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
	
	function pramoteClass(){
		$current = $this->input->post("class1");
		$section = $this->input->post("section");
		$student_id = $this->input->post("student_id");
		$changeClass = $this->input->post("changeClass");
		$data = array(
				'student_id' 	=>$student_id,
				'current_class' =>$current,
				'next_class'	=>$changeClass,
				'date1'			=> date('Y-m-d'),
				'section'		=>$section,
		);
		if($this->db->insert("pramoted",$data)){
		$dataup['class_id'] = $changeClass;
		$this->db->where("status","Active");
		$this->db->where("student_id",$student_id);
		$perInfo = $this->db->update("student_info",$dataup);
		
		 
		if($perInfo){
		echo "Promoted";
		}
		else {
			echo "Not Done";
		}
		
		}
		else{
			echo "Not Done";
		}
	}
}
?>