<?php
class SubjectController extends CI_Controller{
	function getSubject(){
		$clName = $this->input->post("className");
		$stream = $this->input->post("stream");
		$section = $this->input->post("section");
		$this->load->model("subjectModel");
		$result = $this->subjectModel->getSubject($clName,$stream,$section);
		?>
			<div class="col-sm-12">
				<!-- start: INLINE TABS PANEL -->
				<div class="panel panel-white">
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<div class="tab-pane fade in active" id="myTab_example1">
									<div class="row">
										<div class="col-sm-6">
											<div class="panel panel-calendar">
												<div class="panel-heading panel-grey border-light">
													<h4 class="panel-title">Subject Name</h4>
												</div>
												<div class="panel-body">
													<div class="text-white text-large">
														<input type="text" id="addSubject">
														<a href="#" class="btn btn-sm btn-light-blue" id="addSSubjectButton"><i class="fa fa-check"></i> Add Subject</a>
													</div>
													
													<div class="text-blue text-small">Please type Subject name make <strong>sure after admission Subject name cannot be Edited in any case </strong> if you change 
																		then the exam section, student section and time scheduling may be affected.Then press add subject button after added it will show you right side 
 																		side panel.		
												</div>
											</div>
										</div>
										</div>
										<script>
											 $("#addSSubjectButton").click(function(){
										            var clname = $("#clname").val();
										            var stream = $("#streamList").val();
										            var section = $("#section").val();
										            var subject = $("#addSubject").val();
										            //alert(clname+","+stream+","+section+","+subject);
										            $.post("<?php echo site_url('index.php/subjectController/addSubject') ?>", {className : clname, stream : stream, section : section, subject : subject}, function(data){
										                $("#subjectBox").html(data);
										                //alert(data);
										    		});
										        });
										</script>
										<div class="col-sm-6">
											<div class="panel panel-calendar">
												<div class="panel-heading panel-dark border-light">
													<h4 class="panel-title">Subject List</h4>
												</div>
												<div class="panel-body" id="subjectList">
													<?php 
													if(isset($result)){
														$i = 1;
														foreach ($result->result() as $row){
															echo '<div class="text-white text-sm pull-left space10">';
															echo '<input type="text" id="subjectValue'.$i.'" size="20" value="'.$row->subject.'">';
															echo '<input type="hidden" id="subjectId'.$i.'" size="20" value="'.$row->id.'">';
															echo ' <a href="#" class="btn btn-sm btn-dark-grey" id="edit'.$i.'"><i class="fa fa-edit"></i> Edit</a>';
															echo ' <a href="#" class="btn btn-sm btn-dark-grey" id="delete'.$i.'"><i class="fa fa-trash-o"></i> Delete</a>';
															echo '</div>';
															$i++;
														}
														?>
														<script>
															    <?php for($j = 1; $j < $i; $j++){ ?>
															    
															    $("#edit<?php echo $j; ?>").click(function(){
															    	var clname = $("#clname").val();
														            var stream = $("#streamList").val();
														            var section = $("#section").val();
														            var subject = $("#addSubject").val();
														            
														    		var subjectId = $('#subjectId<?php echo $j; ?>').val();	
														    		var subjectName = $('#subjectValue<?php echo $j; ?>').val();
														    		//alert(streamName);
														    		$.post("<?php echo site_url('index.php/subjectController/updateSubject') ?>", {subjectId : subjectId, subjectName : subjectName, className : clname, stream : stream, section : section, subject : subject}, function(data){
														                $("#subjectBox").html(data);
														                //alert(data);
														    		})
														        });
										
															    $("#delete<?php echo $j; ?>").click(function(){
															    	var clname = $("#clname").val();
														            var stream = $("#streamList").val();
														            var section = $("#section").val();
														            var subject = $("#addSubject").val();
														            
														    		var subjectId = $('#subjectId<?php echo $j; ?>').val();	
														    		//alert(streamName);
														    		$.post("<?php echo site_url('index.php/subjectController/deleteSubject') ?>", {subjectId : subjectId, className : clname, stream : stream, section : section, subject : subject}, function(data){
														                $("#subjectBox").html(data);
														                //alert(data);
														    		})
														        });
														        
															    <?php } ?> 
														</script>
													<?php
													}
													?>
												</div>
											</div>
										</div>
									</div>
								</div>														
							</div>
						</div>
					</div>
				</div>
				<!-- end: INLINE TABS PANEL -->
			</div>
		<?php 
	}
	
	function addSubject(){
		$clName = $this->input->post("className");
		$stream = $this->input->post("stream");
		$section = $this->input->post("section");
		$subject = $this->input->post("subject");
		
		$data = array(
				"class_id" => $clName,
				"stream" => $stream,
				"section" => $section,
				"subject" => $subject
		);
		
		$this->load->model("subjectModel");
		$result = $this->subjectModel->addSubject($data);
		$this->getSubject();
	}
	
	function updateSubject(){
		$clName = $this->input->post("className");
		$stream = $this->input->post("stream");
		$section = $this->input->post("section");
		$subject = $this->input->post("subject");
		
			$subjectId = $this->input->post("subjectId");
			$subjectName = $this->input->post("subjectName");
		
			$data = array(
					"subject" => $subjectName
			);
		
			$this->load->model("subjectModel");
			$result = $this->subjectModel->updateSubject($data,$subjectId);
			$this->getSubject();
	}
	
	function deleteSubject(){
		$clName = $this->input->post("className");
		$stream = $this->input->post("stream");
		$section = $this->input->post("section");
		$subject = $this->input->post("subject");
		
		$subjectId = $this->input->post("subjectId");
	
		$this->load->model("subjectModel");
		$result = $this->subjectModel->deleteSubject($subjectId);
		$this->getSubject();
	}
}
?>
