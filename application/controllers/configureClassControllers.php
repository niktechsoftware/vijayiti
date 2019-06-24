<?php
class ConfigureClassControllers extends CI_Controller{
	
function __construct()
	{
		parent::__construct();
		$this->is_login();
		
	}
	
	function is_login(){
		$is_login = $this->session->userdata('is_login');
		$is_lock = $this->session->userdata('is_lock');
		$logtype = $this->session->userdata('login_type');
		if($is_login != "admin"){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_login){
			//echo $is_login;
			redirect("index.php/homeController/index");
		}
		elseif(!$is_lock){
			redirect("index.php/homeController/lockPage");
		}
	}	
	public function addStream(){
		$this->input->post('streamName');
		$this->load->model('configureClassModel');
		$streamList = $this->configureClassModel->addStream($this->input->post("streamName"));
		//print_r($streamList);
		$data['streamList'] = $streamList;
		$this->load->view("ajax/addStream",$data);
	}
	public function updateStream(){
		$this->load->model('configureClassModel');
		if($query = $this->configureClassModel->updateStream($this->input->post("streamId"),$this->input->post("streamName"))){
			?>
			<script>
			        $.post("<?php echo site_url('index.php/configureClassControllers/addStream') ?>", function(data){
			            $("#streamList1").html(data);
					});
			</script>
			<?php 
		}	
		
	}
	
	public function getStream(){
		$className = $this->input->post("className");
		$this->load->model('configureClassModel');
		$query = $this->configureClassModel->getStreamByClassName($className);
		echo '<option value="" >Select Subject Stream</option>';
			foreach ($query->result() as $row){
				?>
					<option value="<?php echo $row->streem; ?>" ><?php echo $row->streem; ?></option>
				<?php 
			}
	}
	
	public function deleteStream(){
		$this->load->model('configureClassModel');
		if($query = $this->configureClassModel->deleteStream($this->input->post("streamId"))){
			?>
			<script>
			        $.post("<?php echo site_url('index.php/configureClassControllers/addStream') ?>", function(data){
			            $("#streamList1").html(data);
					});
			</script>
			<?php 
		}
	}
	
	
	//-------------------------------------------------- Add Section Code Start --------------------------------------------
	
	public function addSection(){
		$this->input->post('sectionName');
		$this->load->model('configureClassModel');
		$sectionList = $this->configureClassModel->addSection($this->input->post("sectionName"));
		$data['sectionList'] = $sectionList;
		$this->load->view("ajax/configureSectionList",$data);
		
		}
		public function updateSection(){
			$this->load->model('configureClassModel');
			if($query = $this->configureClassModel->updateSection($this->input->post("sectionId"),$this->input->post("sectionName"))){
				?>
				<script>
				    jQuery(document).ready(function() {
				        $.post("<?php echo site_url('index.php/configureClassControllers/addSection') ?>", function(data){
				            $("#sectionList").html(data);
						});
				    });
				</script>
				<?php 
			}		
		}
		
		public function getSection(){
			$className = $this->input->post("className");
			$stream = $this->input->post("stream");
			$this->load->model('configureClassModel');
			$query = $this->configureClassModel->getSectionByClassStream($className,$stream);
			echo '<option value="" >Select Section</option>';
			foreach ($query->result() as $row){
				?>
					<option value="<?php echo $row->section; ?>" ><?php echo $row->section; ?></option>
				<?php 
			}
		}
		
		public function deleteSection(){
			$this->load->model('configureClassModel');
			if($query = $this->configureClassModel->deleteSection($this->input->post("sectionId"))){
				?>
					<script>
					        $.post("<?php echo site_url('index.php/configureClassControllers/addSection') ?>", function(data){
					            $("#sectionList").html(data);
							});
					</script>
				<?php 
			}
		}
		
	//-------------------------------------------- add Class Code start -------------------------------------------------------
	
		//-------------------------------------------------- Add Section Code Start --------------------------------------------
		
		public function addClass(){
			$this->input->post('sectionName');
			$this->load->model('configureClassModel');
			$classData = array(
					"class_name" => $this->input->post("className"),
					"streem" => $this->input->post("classStream"),
					"section" => $this->input->post("classSection")
			);
			$sectionList = $this->configureClassModel->addClass($classData);
			if(isset($sectionList)){
				$i = 1;
				foreach ($sectionList->result() as $row){
					echo '<tr>';
					echo '<th>'.$i.'</th>';
					echo '<th>'.$row->class_name.'</th>';
					echo '<th>'.$row->section.'</th>';
					echo '<th>'.$row->streem.'</th>';
					echo '</tr>';
					$i++;
				}
			}
		}
		
		// this method call from updateClass.php for update class detail.
				public function updateClass(){
					
					$rowId = $this->input->post("id");
					$data = array(
							"class_name" => $this->input->post("clName"),
							"streem" => $this->input->post("stream"),
							"section" => $this->input->post("section"),
							"class_teacher_id" => $this->input->post("teacherId")
					);
					
					$this->load->model('configureClassModel');
					if($this->configureClassModel->updateClassDetail($data,$rowId)){
						?>
							<div class="alert alert-success">
								<button data-dismiss="alert" class="close">
								&times;
								</button>
								<strong>Well done!</strong> You successfully Update <a class="alert-link" href="#">
									<?php echo $this->input->post("clName")."-".$this->input->post("section"); ?></a>
								.			
							</div>
						<?php 
					}
					else{
						?>
							<div class="alert alert-danger">
								<button data-dismiss="alert" class="close">
									&times;
								</button>
								<strong>You can not update this class Info</strong> 
								because Teacher is not avaliable in 
								<a class="alert-link" href="<?php echo base_url();?>index.php/employee/employeeList">
								<strong>Employee List</strong></a>.
							</div>
						<?php 
					}	
				}
				public function deleteClass(){
					$this->load->model('configureClassModel');
					
					if($this->configureClassModel->deleteClassDetail($this->input->post("clName"),$this->input->post("section"),$this->input->post("rowId"))){
						?>
							<div class="alert alert-success">
								<button data-dismiss="alert" class="close">
								&times;
								</button>
								<strong>Done!</strong> You successfully Deleted ..<strong>Please Refresh the page to see efect of deleted class..</strong>
									<a class="alert-link" href="<?php echo base_url();?>index.php/student/studentList">
									<?php echo $this->input->post("clName")."-".$this->input->post("section"); ?></a>.
							</div>
						<?php 
					}
					else{
						?>
							<div class="alert alert-danger">
								<button data-dismiss="alert" class="close">
								&times;
								</button>
								<strong>You can not delete</strong> this class because students are avaliable in 
								<a class="alert-link" href="<?php echo base_url();?>index.php/student/studentList">
									<strong><?php echo $this->input->post("clName")."-".$this->input->post("section"); ?></strong></a>.
							</div>
						<?php 
					}
				}
}