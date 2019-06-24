<?php
class SmsAjax extends CI_Controller{
	function smsSetting(){
		$msg = $this->input->post("message");
		
		$val = $this->db->get("sms")->row();
		
		$val1 = $val->$msg;
		
		if($val1 == "yes"){
			$data = array(
				"$msg" => "no"
			);
			?>
				<script>
					$("#<?php echo $msg;?>").removeClass("btn btn-sm btn-light-green").addClass("btn btn-sm btn-light-red");
					$("#<?php echo $msg;?>").removeClass("fa fa-check").addClass("fa fa-times fa fa-white");
					$("#<?php echo $msg;?>").html(" NO");
				</script>
			<?php
		}else{
			$data = array(
				"$msg" => "yes"
			);
			?>
				<script>
					$("#<?php echo $msg;?>").removeClass("btn btn-sm btn-light-red").addClass("btn btn-sm btn-light-green");
					$("#<?php echo $msg;?>").removeClass("fa fa-times fa fa-white").addClass("fa fa-check");
					$("#<?php echo $msg;?>").html(" YES");
				</script>		
			<?php
		}
		$this->db->update("sms",$data);
	}
	
	function sendNotice(){
	$this->load->helper("sms");
	$msg =	$this->input->post("meg");
	$fmobile = $this->input->post("m_number");
	sms($fmobile,$msg);
	
	redirect("index.php/login/mobileNotice/Notice");
	}
	
	function classwise(){
		$class_id = $this->input->post("class");
		$section = $this->input->post("section");
		$val=$this->db->get("sms_setting")->row();
		$a="8382829593";
		$this->load->helper("sms");
		$msg =	$this->input->post("meg");
		$isSMS = $this->db->get("sms")->row()->parent_message;
		if($isSMS=="yes")
		{
		$this->db->where("trade",$class_id);
		$this->db->where("status","Active");
		$this->db->where("fsd",$section);
		$std = $this->db->get("student_info");
		$i=0;
		if($std->num_rows() > 0)
		{   
			
		foreach($std->result() as $s):
		
		$fmobile = $s->mobile;
		if($fmobile){
		$a=$fmobile.",".$a;
		$i++;}
		endforeach;
		
		sms($a,$msg);
		}}
		redirect("index.php/login/mobileNotice/classwise/$i");
	} 
	
	function sendallParent(){
		$count=0;
	
		$this->load->helper("sms");
		$a="8382829593";
		$msg =$this->input->post("meg");
		$isSMS = $this->db->get("sms")->row()->parent_message;
		if($isSMS=="yes")
		{
		$this->db->where("status","Active");
		$std = $this->db->get("student_info");
		$i=0;
		if($std->num_rows() > 0)
		{   
		foreach($std->result() as $s):
		
		$fmobile = $s->mobile;
		if($fmobile){
		$a=$fmobile.",".$a;
		$i++;}
		
		endforeach;
		sms($a,$msg);
		}
		}
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	
	}
	
	function sendAnnuncement(){
		$count=0;
		$val=$this->db->get("sms_setting")->row();
		$senderiD=$val->sender_id;
		$authkey=$val->auth_key;
		$this->load->helper("sms");
		$msg =$this->input->post("meg");
		$var=$this->db->get("employee_info");
		$isSMS = $this->db->get("sms")->row()->announcement;
	
		if($isSMS=="yes")
		{
			foreach($var->result() as $mobile):
			$fmobile =$mobile->mobile;
			sms($authkey,$msg,$senderiD,$fmobile);
			$count=$count+1;
			endforeach;
		}
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	}
	
	function sendGreeting(){
		$count=0;
		$val=$this->db->get("sms_setting")->row();
		$senderiD=$val->sender_id;
		$authkey=$val->auth_key;
		$this->load->helper("sms");
		$msg =$this->input->post("meg");
		$var=$this->db->get("guardian_info");
		$isSMS = $this->db->get("sms")->row()->greeting;
	
		if($isSMS=="yes")
		{
			foreach($var->result() as $mobile):
			$fmobile =$mobile->f_mobile;
			sms($authkey,$msg,$senderiD,$fmobile);
			$count=$count+1;
			endforeach;
		}
		$var1=$this->db->get("employee_info");
		$isSMS = $this->db->get("sms")->row()->announcement;
		if($isSMS=="yes")
		{
			foreach($var1->result() as $mobile):
			$fmobile =$mobile->mobile;
			sms($authkey,$msg,$senderiD,$fmobile);
			$count=$count+1;
			endforeach;
		}
		
		redirect("index.php/login/mobileNotice/Parent%20Message/$count");
	}
	
	
}