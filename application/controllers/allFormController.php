<?php
class AllFormController extends CI_Controller{
	
	
	
	
	function getCity(){
		$state = $this->input->post("state");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getCity($state);
		
			echo '<option value="">-City-</option>';
		foreach ($result->result() as $row):
			echo '<option value="'.$row->city.'">'.$row->city.'</option>';
		endforeach;
	}

	  function updatefsd(){
		$fsdid=$this->input->post('fsdid');
		 $fsdid1=array(

     'fsd_id' =>$fsdid, 

         );
		// $this->load->model("allFormModel");
		// $updatefsd=$this->allFormModel->updatefsd($fsdid);
		$updatefsd=$this->db->update('general_settings',$fsdid1);

		if($updatefsd)
		{ 
        $this->session->unset_userdata();
		$this->session->sess_destroy();
		?><script> window.location.reload();</script>
		<?php 
		//redirect(base_url()."index.php/homeController/login_check",'refresh');	
		redirect('index.php/homeController');
		}
  //       $data['title'] = $this->session->userdata("name");
		// $this->session->set_userdata('is_lock', false);
		// $this->load->view("lockPage", $data); 

	}



	
	function getArea(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getArea($state,$city);
	
		echo '<option value="">-City-</option>';
		foreach ($result->result() as $row):
		echo '<option value="'.$row->area.'">'.$row->area.'</option>';
		endforeach;
	}
	
	function getPin(){
		$state = $this->input->post("state");
		$city = $this->input->post("city");
		$area = $this->input->post("area");
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getPin($state,$city,$area);
		
		foreach ($result->result() as $row):
		echo $row->pin;
		endforeach;
	}
	
	function getSectionByclass(){
		$className = $this->input->post("className");
		
		$this->load->model("allFormModel");
		$result = $this->allFormModel->getSectionByClass($className)->result();
			echo "<option value=''>Select Section</option>";
		foreach($result as $section):
			echo "<option value='".$section->section."'>".$section->section."</option>";
		endforeach;
	}
	
	function getSubject(){
		$data['className'] = $this->input->post("className");
		$data['section'] = $this->input->post("section");
		$data['stream'] = $this->input->post("stream");
		$this->load->view("ajax/getAdmissionSubject",$data);
	}
}