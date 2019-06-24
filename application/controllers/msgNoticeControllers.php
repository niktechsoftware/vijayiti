<?php
class msgNoticeControllers extends CI_Controller{
	
	function __construct()
	{
		parent::__construct();
		
		$this->load->model("msgmodel");
	}
	public function delNotice(){
		$id = $this->uri->segment(3);
		$ans=$this->msgmodel->delNotice($id);
		if($ans)
			redirect("index.php/login/noticeAlert");
	}
	
	public function priveateNote(){
		$note = array(
		"user_id" => $this->input->post("username"),
		"title" => $this->input->post("noteTitle"),
		"note" => $this->input->post('noteEditor'),
		"date" => date("Y-m-d H:i:s")
		);
		if($this->db->insert("privatenote",$note)){
			redirect("index.php/login/index/noteTrue");
		}
		else{
			redirect("index.php/login/index/noteFalse");
		}
	}
	
	function delNotice1(){
		$id = $this->uri->segment(3);
		
		$this->db->where("id",$id);
		if($this->db->delete("privatenote")){
			redirect("index.php/login/index/noteDelTrue");
		}
		else{
			redirect("index.php/login/index/noteDelFalse");
		}
	}
	
	function saveEvent(){
		$event = array(
				"user_id" => $this->input->post("uid"),
				"title" => $this->input->post("title"),
				"eventDetail" => $this->input->post("detail"),
				"dateTime" => date("Y-m-d H:i:s")
		);
		if($this->db->insert("event",$note)){
			redirect("index.php/login/index/eventTrue");
		}
		else{
			redirect("index.php/login/index/eventFalse");
		}
	}
	
	function showAllNotice(){
		$data['pageTitle'] = 'All Notice';
		$data['smallTitle'] = 'Notice Details';
		$data['mainPage'] = 'View Notice';
		$data['subPage'] = 'Notice Details';
	
		$data['title'] = 'Notice Details';
		$data['headerCss'] = 'headerCss/noticeCss';
		$data['footerJs'] = 'footerJs/noticeJs';
		$data['mainContent'] = 'showAllNotice';
		$this->load->view("includes/mainContent", $data);
	}
	
	function sendMsg(){
		$data=array(
		'message'=> $this->input->post("message"),
		'subject'=>	$this->input->post("subject"),
		'reciever_id'=>	$this->input->post("reciever"),
		'sender_id'=>$this->session->userdata("username"),
		'open'=>"no",
		'send_date'=>date("y-m-d"),
		'send_time'=>date("Y-m-d H:i:s"),
		'delete'=>"no"
		);
		$var=$this->msgmodel->sendSms($data);
		if($var)
		echo "successfylly Sent";
}


		function showAllMessage(){
			$data['pageTitle'] = 'All Message';
			$data['smallTitle'] = 'Message Details';
			$data['mainPage'] = 'View Message';
			$data['subPage'] = 'Message Details';
		
			$data['title'] = 'Message Details';
			$data['headerCss'] = 'headerCss/noticeCss';
			$data['footerJs'] = 'footerJs/noticeJs';
			$data['mainContent'] = 'showAllMessage';
			$this->load->view("includes/mainContent", $data);
		}
		function countChar(){
		$var=	$this->input->post("totalc");
		$varchar=strlen($var);
		echo $varchar;
		}
}