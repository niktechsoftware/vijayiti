<?php
class noticeControllers extends CI_Controller{

	function updateNotice(){
		$insertData=array(
				"category" => $this->input->post("category"),
				"subject" => $this->input->Post("sub"),
				"message" => $this->input->Post("msg"),
				"date" => date("y-m-d"),
				"time" =>date("h:i:s")
		);
		$this->load->model("noticeModel");
	$var =	$this->noticeModel->insertNotice($insertData);
		if($var)
		{
			redirect("index.php/login/noticeAlert");
			
		}
		
	}
	
	function updateNotice1(){
		$id=$this->input->post("id");
		$insertData=array(
				"id"=>$id,
				"category" => $this->input->post("category"),
				"subject" => $this->input->Post("sub"),
				"message" => $this->input->Post("msg"),
				"date" => date("y-m-d"),
				"time" =>date("h:i:s")
		);
		$this->load->model("noticeModel");
		$var =	$this->noticeModel->updateNotice($insertData,$id);
		if($var)
		{
			redirect("index.php/login/noticeAlert");
				
		}
	}
}