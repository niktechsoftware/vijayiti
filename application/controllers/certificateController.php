<?php
class CertificateController extends CI_Controller{
	
	public function checkTc(){
		$stud_id = $this->input->post("stud_id");
		$this->db->where("student_id",$stud_id);
		$var= $this->db->get("student_info");
		
		$this->db->where("student_id",$stud_id);
		if($this->db->get("tc_certificate")->row())
		{
			$val=$this->db->get("tc_certificate")->row();
			
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					?>
												<div class="alert alert-success">
													<button data-dismiss="alert" class="close">
														&times;
													</button>
													ID Found ! <strong><?php echo $row->first_name." ".$row->midd_name." ".$row->last_name; ?>
													TC is already Generated and given date <?php echo $val->tc_date;?>do you want to print again it.Please click Proceed for Reprint otherwise leaveit
												</strong></div>
												<button id = "pro" class="btn btn-dark-purple">
												Print Again <i class="fa fa-arrow-circle-right"></i>
												</button>
												<?php 
												
											}}
										else{
											?>
												<div class="alert alert-danger">
													<button data-dismiss="alert" class="close">
														&times;
													</button>
													Sorry :( <strong><?php echo "Student Not Found ! Wrong Student Id"; ?></strong>
												</div>
											<?php
										}
			
		}
		else{
			
			if($var->num_rows() > 0){
				foreach ($var->result() as $row){
					?>
									<div class="alert alert-success">
										<button data-dismiss="alert" class="close">
											&times;
										</button>
										ID Found ! <strong><?php echo $row->first_name." ".$row->midd_name." ".$row->last_name; ?></strong>
									</div>
									<button id = "pro" class="btn btn-dark-purple">
									Get Certificate <i class="fa fa-arrow-circle-right"></i>
									</button>
									<?php 
									
								}}
							else{
								?>
									<div class="alert alert-danger">
										<button data-dismiss="alert" class="close">
											&times;
										</button>
										Sorry :( <strong><?php echo "Student Not Found ! Wrong Student Id"; ?></strong>
									</div>
								<?php
								
							}
		}
	}
}