<?php
class periodTimeControllers extends CI_Controller{
	function updatePeriod(){
		$i=1;
		$num=$this->input->post("nop");
		?>
		<form method="post" action="<?php echo base_url(); ?>index.php/periodTimeControllers/insertPeriod">	
			<div class="panel">
				<div class="panel-heading panel-blue border-light">
					<h4 class="panel-title">Create Periods Time Slot</h4>
				</div>
				<div class="panel-body" >
					<table class="table table-bordered table-hover ">
						<thead>
							<tr>
								<th>#</th>
								<th>Name Of Period (Like 1st,2nd,3rd)</th>
								<th>Time Slots</th>
							</tr>
						</thead>
		        		<?php while($num >= $i){ ?>
		        		<tbody>
		        			<tr>
		        				<td><?php echo $i; ?></td>
		            			<td>
		            				<table width="80%">
		                				<tr>
		                    				<td>
		                        			<input type="text" class="form-control" style="width:100px;" name="period<?php echo $i; ?>" />
	                            			</td>
                                			<?php 
											$a = $num / 2;
											if(($i >= $a) && ($i <= $a + 3)):
											?>
                                			<td  align="center">
		                        				<input type="radio" value="<?php echo $i; ?>" name="lunch" />Lunch
		                        			</td>
		                            		<?php endif; ?>
		                      			</tr>
		                  			 </table>
		               			 </td>
		                			<td>
		                   				 <table width="80%" >
		                        			 <tr>
		                            			 <td>
		                                 			<input type="time" class="form-control" style="width:100px;" name="from<?php echo $i; ?>" id="from<?php echo $i; ?>">
		                              			</td>
		                             			 <td> to </td>
		                             			 <td>
		                                   			<input type="time" class="form-control" style="width:100px;" name="to<?php echo $i; ?>" id="to<?php echo $i; ?>">
		                              			</td>
		                        			 </tr>
		                    			</table>
		               				 </td>
		           				</tr>
		      	  		 </tbody>
		           		 <?php $i++; } ?>
		     		</table>
				</div>
			</div>
				<div class="row space15">
					<div class="col-md-5">
						<input type="hidden" name="num" value="<?php echo $this->input->post("nop"); ?>" />
							<button type="submit" class="btn btn-blue">
							Click to Save <i class="fa fa-save"></i>
							</button>
					</div>										
				</div>
		</form>
<?php 
	}
	
	function insertPeriod(){
	$num = $this->input->post("num");	
	$this->load->model("periodModel");
		$this->db->empty_table("period");
		for($i=1;$i<=$num;$i++)
		{
			$data = array(
			"period" => $this->input->post("period$i"),
			"lunch" => $this->input->post("lunch"),
			"from" => $this->input->post("from$i"),
			"to" => $this->input->post("to$i")
			);
			$var = $this->periodModel->insertperiod($data);
		}
		redirect("index.php/login/periodTimeSlot/2");
	}
	
	function periodSchedule(){
		$data['monday'] = $this->input->post("monday");
		$data['tuesday'] = $this->input->post("tuesday");
		$data['wednesday'] = $this->input->post("wednesday");
		$data['thursday'] = $this->input->post("thursday");
		$data['friday'] = $this->input->post("friday");
		$data['saturday'] = $this->input->post("saturday");
		$this->load->model("periodModel");
		$data['var1'] = $this->periodModel->getPeriodD();
		$var1 = $this->periodModel->getPeriodD();
		$data['dog']=$var1->row();
		$data['countPeriod'] = $this->db->count_all("period");
		$this->load->model("periodModel");
		$data['className'] = $this->periodModel->getClass();
		$data['teacher'] = $this->periodModel->getTeacherName();
		$this->load->view('ajax/createTimeTable',$data);
		
	}
	function periodsheduleinsert(){
		$days = $this->input->post("days");
		$tbr = $this->input->post("tbr");
		$tbc = $this->input->post("tbc");
		$this->load->model("periodModel");
		$checkTB = $this->periodModel->checkvalue($days);
		if($checkTB->num_rows()>0)
		{
			$var = $this->periodModel->deldaywise($days);
		}
		for($i=1;$i<$tbr;$i++)
		{
			for($j=1;$j<$tbc;$j++)
			{
				$data = array(
				"day" => $this->input->post("days"),
				"period" => $this->input->post("period$j"),
				"time" => $this->input->post("from$j"),
				"class1" => $this->input->post("class1$i"),
				"teacher" => $this->input->post("teacher$i$j"),
				"subject" => $this->input->post("subject$i$j")
				);
				$this->periodModel->periodSchedule($data);
			}
		}	

	redirect("index.php/login/schedulingReport");
	}
	
	function defineclassplan(){
		$uri1=$this->uri->segment(3);
		$uri2=$this->uri->segment(4);
		if((strlen($uri1) > 0) && (strlen($uri2) > 0))
		{
			$data['sdate']=$uri1;
			$data['edate']=$uri2;
		}
		else
		{	
		$data['sdate']= $this->input->post("sdate");
		$data['edate']= $this->input->post("edate");
		}
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Teacher Lesson Plan';
		$data['subPage'] = 'Teacher Lesson Plan';
		$data['title'] = 'Teacher Lesson Plan';
		$data['headerCss'] = 'headerCss/lessonPlanCss';
		$data['footerJs'] = 'footerJs/lessonPlanJs';
		$data['mainContent'] = 'ajax/defineclassplan';
		$this->load->view("includes/mainContent", $data);
	}
	function saveLessonPlan(){
		$i=1;
		$s1date =$this->input->post("s1date");
		$edate =$this->input->post("edate");
		$userid = $this->session->userdata("username");
		$period=$this->db->get("period");
		foreach($period->result() as $row):
		echo $row->period;
		$date1=$this->input->post("date1");
		$dayname=$this->input->post("weekday");
		$class_sec=$this->input->post("class1$i");
		$sno=$this->input->post("sno$i");
		$subject=$this->input->post("subject$i");
		$data=array(
				'dayname'=>$this->input->post("weekday"),
				'date1'=>$this->input->post("date1"),
				'class_sec'=>$this->input->post("class1$i"),
				'subject'=>$this->input->post("subject$i"),
				'period'=>$this->input->post("period$i"),
				'class_work'=>$this->input->post("lp$i"),
				'teacher_id'=>$userid
				
		);
		//$guru = $this->db->query("SELECT * FROM lesson_plan WHERE subject='".$subject."' AND class_sec ='".$class_sec."' AND teacher_id = '".$userid."' AND date1='".$date1."' AND dayname = '".$dayname."'");
		if(strlen($sno)>0)	
		{
			$this->db->where("date1",$date1);
			$this->db->where("dayname",$dayname);
			$this->db->where("teacher_id",$userid);
			$this->db->where("subject",$subject);
			$this->db->where("class_sec",$class_sec);
			$this->db->update("lesson_plan",$data);
			$i++;
		}
		else {
		$this->db->insert("lesson_plan",$data);
			$i++;
		}
		endforeach;
			redirect("periodTimeControllers/defineclassplan/$s1date/$edate");
		
	}
	function viewclassplan(){
		$logtype = $this->session->userdata('login_type');
				if($logtype == "admin"){
				$data['username']=$this->input->post("teacherid");
			}
			
			$data['sdate']= $this->input->post("sdate");
			$data['edate']= $this->input->post("edate");
		$data['pageTitle'] = 'Time Schedule';
		$data['smallTitle'] = 'Time Schedule';
		$data['mainPage'] = 'Teacher Lesson Plan';
		$data['subPage'] = 'Teacher Lesson Plan';
		$data['title'] = 'Teacher Lesson Plan';
		$data['headerCss'] = 'headerCss/lessonPlanCss';
		$data['footerJs'] = 'footerJs/lessonPlanJs';
		$data['mainContent'] = 'ajax/viewClassPlan';
		$this->load->view("includes/mainContent", $data);
	}
}
?>