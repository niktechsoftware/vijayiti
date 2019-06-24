<?php
class examControllers extends CI_Controller
{
	public function getData1()
	{
		$this->load->model("examModel");
		$data=array(
		'exam_name'=>$this->input->post("examName"),
		'exam_date'=>$this->input->post("datet")
				);
		
		$var=$this->examModel->insertexam($data);
		if(strlen($var)>0)
		{
			redirect("index.php/login/examsheduling");
		}	
	}
	
	public function updateData1()
	{
		$this->load->model("examModel");
		$data=array(
				'exam_name'=>$this->input->post("examName"),
				'exam_date'=>$this->input->post("datet")
		);
	
		$this->examModel->updateexam($data);
		redirect("index.php/login/examsheduling");
	}
	
	 function printDate()
	{
		$this->load->model("examModel");
		
		$en = $this->input->post("examName");
		$var=$this->examModel->gateDate1($en);
		if($var->num_rows()>0)
		{
			foreach($var->result() as $row):
			echo $row->exam_date;
			endforeach;
		}
	}
	
	function startScheduling()
	{ 	$exam_name = $this->input->post("examName");
	 	$edate = $this->input->post("edate");
	 	$this->load->model("examModel");
		$data['exam_name'] = $exam_name;
		$data['edate'] = $edate;
		$data['pageTitle'] = 'Exam Sheduling';
		$data['smallTitle'] = 'Exam Sheduling';
		$data['mainPage'] = 'Configuration';
		$data['subPage'] = 'Class, Section, Subject Stream';
		$this->load->model("examModel");
		$var=$this->examModel->getExamName();
		$data['request']=$var->result();
		$count = $this->db->count_all("exam_name");
		$data['i']=$count;
		$data['title'] = 'Configure Class/Section';
		$data['headerCss'] = 'headerCss/examCss';
		$data['footerJs'] = 'footerJs/examJs';
		$data['mainContent'] = 'startScheduling';
		$this->load->view("includes/mainContent", $data);
	}
	
function defineExam(){
	 	$num=$this->input->post("nos");
		$j = 1;
		$k = 1;
		?><div class="row">
		<?php
				$i = 1;
		?>  	<table class="table" style="width:700px;">
		                                    <tr>
		                                    	<th>#</th>
		                                        <th>Name Of Sift (Like First,Second)</th>
		                                        <th>Time Slots</th>
		                                    </tr>
		                                <input type="hidden" name="num" value="<?php echo $num; ?>" />
		                                <?php while($num >= $i){ ?>
		                                	<tr>
		                                    	<td><?php echo $i; ?></td>
		                                    	<td>
		                                        	<input type="text" class="form-control" value="<?php if($i==1){echo 'First'; }elseif($i==2){echo 'Second';}elseif($i==3){echo 'Third';} ?>" style="width:200px;" name="shift<?php echo $i; ?>" />
		                                        </td>
		                                        <td>
		                                        	<table>
		                                            	<tr>
		                                                	<td>
		                                                	<div class="input-group input-append bootstrap-timepicker">
		                                                    		<input type="time" class="form-control time-picker"  style="width:100px;" name="from<?php echo $i; ?>" id="from<?php echo $i; ?>"/>
																	<span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
		                                                	
		                                        	
		                                            		</td>
		                                                    <td>
		                                            	 &nbsp;&nbsp;to&nbsp;&nbsp; 
		                                                 	</td>
		                                                    <td>
		                                                    	<div class="input-group input-append bootstrap-timepicker">
		                                                    	<input type="time" class="form-control time-picker" style="width:100px;" name="to<?php echo $i; ?>" id="to<?php echo $i; ?>">
																	<span class="input-group-addon add-on"><i class="fa fa-clock-o"></i></span>
																</div>
		                                            
		                                            		</td>
		                                                 </tr>
		                                             </table>
		                                        </td>
		                                    </tr>
		                                <?php $i++; } ?>
		                            	</table>
		                            </div>
	<?php }
	
function defineExam1(){
	$num1=$this->input->post("nod");
	$j = 1;
	$k = 1;
	$i = 1;
	?> <div class="row">
	                            <table class="table" style="width:700px;">
	                                    <tr>
	                                    	<th>#</th>
	                                        <th>Select Date</th>
	                                        <th>Name Of Day</th>
	                                    </tr>
	                                <input type="hidden" name="num1" value="<?php echo $num1; ?>" />
	                                <?php while($num1 >= $i){ ?>
	                                	<tr>
	                                    	<td><?php echo $i; ?>
	                                    	</td>
	                                    	<td>
												<input  type="date" data-date-format="yyyy-mm-dd"style="width:200px;" id="date<?php echo $i; ?>" name="date<?php echo $i; ?>" class="form-control date-picker"/>
										 	</td>
	                                         <td>
	                                        	<input type="text" class="form-control" style="width:200px;" id="day<?php echo $i; ?>" name="day<?php echo $i; ?>" />
	                                        </td>
	                                    </tr>
	                                <?php $i++; } ?>
	                                	<tr>
	                                    	<td colspan="3"> <button class="btn btn-green">
                                                            Save <i class="fa fa-arrow-circle-right"></i>
                                                        </button></td>
	                                    </tr>
	                            	</table>
									<?php if(isset($_GET['i'])){
										if($_GET['i'] == 'true'){
											echo "<font color='#009900'>Data Saved Succefully.</font>";
										}
									}									
									?></div>
	<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/autosize/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery.maskedinput/src/jquery.maskedinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-inputlimiter/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jquery-maskmoney/jquery.maskMoney.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpicker/js/commits.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/jQuery-Tags-Input/jquery.tagsinput.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/ckeditor.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/ckeditor/adapters/jquery.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/form-elements.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
			jQuery(document).ready(function() {
				Main.init();
				SVExamples.init();
				FormElements.init();
					<?php
						$j = 1;
						$k = 1;
						while($num1 >= $j){
				?>		
					$('input#date<?php echo $j; ?>').change(
							function(){
								var d = $('#date<?php echo $j; ?>').val();
								var dArray = d.split("-");
								myDate=new Date(dArray[0],dArray[1]-1,dArray[2]);  
								var dayCode = myDate.getDay(); // dayCode 0-6
								var weekday = new Array(7);
								weekday[0]=  "Sunday";
								weekday[1] = "Monday";
								weekday[2] = "Tuesday";
								weekday[3] = "Wednesday";
								weekday[4] = "Thursday";
								weekday[5] = "Friday";
								weekday[6] = "Saturday";
								var a = weekday[dayCode];
								$('#day<?php echo $j; ?>').val(a);
							});
				<?php 
					$j++; 
				}
				?>
				});
				</script>
	<?php }
	
	function createExam()
	{
		$this->load->model("examModel");
		$exam_name=	$this->input->post("exam_name");
		$edate=$this->input->post("edate");
		$nos = 	$this->input->post("nos");
		$nod =	$this->input->post("nod");
		
		for($i=1;$i<$nos+1;$i++)
		{
		$data=array(
				'exam_name'=>$exam_name,
				'shift'=>$this->input->post("shift$i"),
				'start_date'=>	$edate,
				'to1'=>	$this->input->post("to$i"),
						'from1'=> $this->input->post("from$i")
						);
						$this->examModel->ensertshift($data);
		}
			
		for($i=1;$i<$nod+1;$i++)
		{
		$data1 = array(
		'exam_name'=>$exam_name,
		'start_date'=>	$edate,
		'date1'=>	$this->input->post("date$i"),
		'day1'=> $this->input->post("day$i")
		);
		$this->examModel->ensertdays1($data1);
		}
		redirect("index.php/login/createSchedule/$exam_name/$edate/$nos/$nod");
	}
	
	
	
	function fullExam(){
	$exam_name = $this->input->post("exam_name");
	$edate = $this->input->post("edate");
	$date1 = $this->input->post("date1");
	$class1= $this->input->post("classv");
	$day1 = $this->input->post("day1");
	$shift=$this->input->post("shift");
	$this->load->model("examModel");
			$data = array(
				'exam_name' => $exam_name,
				'class1'=> $this->input->post("classv"),
				'shift' => $this->input->post("shift"),
				'date1' => $this->input->post("date1"),
				'day1' => $this->input->post("day1"),
				'subject' => $this->input->post("subject"),
				'start_date' => $edate
			);
			
			$sub = $this->db->query("SELECT * FROM exam_time_table WHERE exam_name ='$exam_name' AND shift = '$shift' AND date1 = '$date1' AND day1 = '$day1' AND class1 = '$class1'");
			$row1 = $sub->row();
			if($row1)
			{
			$this->db->where('id',$row1->id);
			$this->db->update('exam_time_table',$data); 
			}
			else {
				$this->examModel->insertExamData($data);
			}
		
			echo "Inserted";
	
	
}

function printSub()
		{?>
				
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/select2/select2.css" />
		<!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles-responsive.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/plugins.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themes/theme-default.css" type="text/css" id="skin_color">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/print.css" type="text/css" media="print"/>
		<!-- end: CORE CSS -->
		<link rel="shortcut icon" href="favicon.ico" />
			
			
		<?php 	
		$m=1;
		$this->load->model("examModel");
		$exam_name=$this->input->post("examName");
		$shift = $this->examModel->getshift1($exam_name);
		$res=$this->db->query("SELECT DISTINCT class_name FROM class_info");
		$getClass = $res->result();
		$dad=$this->db->query("SELECT day1,date1 FROM exam_day where exam_name='$exam_name'");
		?><table class="table table-striped table-hover" id="sample-table-2">
												<thead>
				<tr>
					<th class="column-left"> Class & Shift</th>
				<?php foreach ($dad->result() as $col):?>
				<th><?php echo $col->date1?><br><?php echo $col->day1?></th>
			<?php endforeach;?>
			<th>Activity</th>
		</thead>
		<tbody><?php $i=1;foreach ($getClass as $rowClass):
		?>
		<?php 
		foreach ($shift->result() as $rowShift):
		
			?><tr><td class="column-left"><?php
			echo $rowClass->class_name;?>-<?php
			echo $rowShift->shift;
			?></td><?php 
			foreach ($dad->result() as $col):
			$j=1;
			?><td class="column-right"><?php
				$subject=$this->db->query("SELECT subject,id FROM exam_time_table where date1='$col->date1' AND day1 = '$col->day1' AND shift='$rowShift->shift' AND class1='$rowClass->class_name'");
				foreach ($subject->result() as $sub):
				?> <input type="text" name = "id<?php echo $i.$j;?>" value = "<?php echo $sub->id; ?>" id="id<?php $i.$j;?>"/>
				
				<a href="#" id="username<?php $i.$j?>"  data-type="text" data-pk="1" data-original-title="Enter username">
				<input type="text" name = "<?php echo $sub->subject; ?>" value = "<?php echo $sub->subject; ?>" id="sub<?php $i.$j?>"/>
				
				
				</a>
					
				<?php $m = $j++;
				endforeach;
				?></td>
				
				
							<?php
			endforeach;
			?>
			<td><button class = "btn btn-default" id= "edit<?php echo $i;?>">Edit</button>
			
			<button class="btn btn-default">Delete</button>
			</td>
			<?php 
			endforeach;//claas print loop
			?><script>
			$('#edit<?php echo $i;?>').click(function(){
				
					<?php for($d=1;$d<10;$d++){?>
					var id = $('#id<?php $i.$d;?>').val();
					var sub = $('#sub<?php $i.$d;?>').val();
				$.post("<?php echo site_url('index.php/examControllers/updateSub') ?>",{id : id,sub : sub},function(data){
					$('#edit<?php echo $i;?>').html(data);
				});
				<?php }?>
				});
			</script></tr><?php $i++;
		endforeach;//shift print loops
		
		?></tbody></table>
				
		
		
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/select2/select2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/tableExport.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/html2canvas.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jquery.base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/sprintf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/jspdf.js"></script>
		<script src="<?php echo base_url(); ?>assets/plugins/tableExport/jspdf/libs/base64.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/table-export.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CORE JAVASCRIPTS  -->
		<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
		<!-- end: CORE JAVASCRIPTS  -->
		<script>
				TableExport.init();
			
		</script>							
		<?php 

	}
	
	function updateSub(){
		$id = $this->input->post("id");
		$sub = $this->input->post("sub");
		$data = array(
			'subject' => $sub
		);
		$this->db->where("id",$id);
		$this->db->update("exam_time_table",$data);
		echo "Edited";
	}
	
	function enterMarks()
	{ 	
		$class = $this->input->post("classv");
		$section = $this->input->post("section");
		$data['t_id'] = $this->input->post("teacherid");
		$data['class_section'] = $this->input->post("classv");
		$data['section'] = $this->input->post("section");
		$data['subject'] = $this->input->post("subject");
		$data['exam_name'] = $this->input->post("exam_name");
		$data['out_of'] = $this->input->post("mm");
		$result = $this->db->query("select * from student_info where class_id='$class' and section='$section' and status = 'Active' ORDER BY first_name");		
		$data['class_info'] = $result;
		$data['num_row1'] = $result->num_rows();
		$this->load->view("ajax/examMarksDetail",$data);		
	}
	
	function editMarks()
	{
		$data['section'] = $this->input->post("section");
		$data['subject'] = $this->input->post("subject");
		$data['exam_name'] = $this->input->post("exam_name");
		$data['out_of'] = $this->input->post("mm");
		$result = $this->db->query("select * from student_info where class_id='$class' and section='$section' and status = 'Active' ORDER BY first_name");
		$data['class_info'] = $result;
		$data['num_row1'] = $result->num_rows();
		$this->load->view("ajax/editExamMarks",$data);
	}
	
	function marksSave(){
		$val=$this->db->get("general_settings")->row();
		$fsd = $val->finance_start_date;
		$row = $this->input->post("row");
		$successData = array();
		$failData = array();
		for($i = 1; $i<=$row; $i++)
		{
			$data = array(
					"teacher_id" => $this->input->post("teacher_id"),
					"exam_name" => $this->input->post("exam_name"),
					"class1" => $this->input->post("class"),
					"section" => $this->input->post("section"),
					"subject" => $this->input->post("subject"),
					"stu_id" => $this->input->post("stu_id$i"),
					"Attendance" => $this->input->post("Attendance$i"),
					"out_of" => $this->input->post("out_of"),
					"marks" => $this->input->post("marks$i"),
					"created" => date('Y-m-d'),
					"fsd" => $fsd
			);
			
			if($this->db->insert("exam_info",$data))
			{
				$successData[] = $this->input->post("stu_id$i");
			}
			else{
				$failData[] = $this->input->post("stu_id$i");
			}
		}
		if($query['login_type'] == "Teacher"){
			redirect("index.php/singleTeacherControllers/marksEntry/$successData/$failData");
		}else{
		redirect("index.php/login/examDetail/$successData/$failData");
		}
	}
	
	function resultMarks()
	{	$stuid =$this->input->post("stuid");
		$marks = $this->input->post("marks");
		$class = $this->input->post("classv");
		$section = $this->input->post("section");
		$exam_name = $this->input->post("exam_name");
		$subject = $this->input->post("subject");
		$data3=array(
				'exam_name' => $this->input->post("exam_name"),
				'section'=> $this->input->post("section"),
				'subject' =>$this->input->post("subject"),
				'class1' => $this->input->post("classv")
		);
	
		$data['class_section'] = $this->input->post("classv");
		$data['section'] = $this->input->post("section");
		$data['subject'] = $this->input->post("subject");
		$data['exam_name'] = $this->input->post("exam_name");
		$val=$this->db->get("general_settings")->row();
		$fsd = $val->finance_start_date;
		$this->db->query("UPDATE exam_info SET marks = '$marks' WHERE exam_name = '$exam_name' 
				AND class1='$class' AND section ='$section' AND subject='$subject' AND stu_id = '$stuid' AND fsd = '$fsd'");
		$this->load->model("examModel");
		$result=$this->examModel->getExamMarks($data3);
		$data['dum'] = $result->result();
		$this->load->view("ajax/examResult",$data);
	}
	
	function resultRender(){
		$data['examName'] = $this->input->post("examName");
		$data['student_id'] = $this->input->post("student_id");
		$data['fsd'] = $this->input->post("fsd");
		
		$data['pageTitle'] = 'Result';
		$data['smallTitle'] = 'Result';
		$data['mainPage'] = 'Exam';
		$data['subPage'] = 'Result';
		
		$data['title'] = 'Result';
		$data['headerCss'] = 'headerCss/generateResultCss';
		$data['footerJs'] = 'footerJs/generateResultJs';
		$data['mainContent'] = 'resultGenerate';
		$this->load->view("includes/mainContent", $data);
	}
}