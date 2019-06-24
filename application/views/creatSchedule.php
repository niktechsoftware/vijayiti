<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
<div class="row"> 
	<div class="col-sm-15">		
		<div class="panel panel-calendar">
			<div class="panel-heading panel-blue border-light">
				<h4 class="panel-title">Scheduling For <?php  echo $exam_name;?> </h4>
			</div>	
			<div class="row">
			<input type="hidden" name="exam_name" value="<?php echo $exam_name;?>"/>
			<input type="hidden" name="edate" value="<?php echo $edate;?>"/>
			<input type="hidden" name="nod" value="<?php echo $nod;?>"/>
				<table class="table table-responsive">
					<thead>
						<tr>
							<th class="center"style="width: 130px;">
									Date & Day<br>
									Class & Shift
							</th>
						<?php $j=1; foreach($days as $col):?>
							<th style="width: 100px;"><?php echo $col->date1;?>
							<input type="hidden" id="date<?php echo $j ?>" style="width: 90px;" name="date<?php echo $j ?>" value="<?php echo $col->date1;?>"/><br>
							<input type="hidden" id="day<?php echo $j ?>" style="width: 90px;" name="day<?php echo $j ?>" value="<?php echo $col->day1;?>"/>
							<?php echo $col->day1;?></th>
							<?php $j++; endforeach;?>
						</tr>	
					</thead>
					<tbody>
						<?php $i=1; $j=1; foreach ($classes as $row):?>
							<?php foreach ($shift as $sh):?>
						<tr>	
							<td class="center"> <?php $class=$row->class_name;
							 $j=1; ?><?php echo $row->class_name;?>
							<input type="hidden" style="width: 40px;" id="class<?php echo $i;?>" name="class<?php echo $i;?>" value="<?php echo $row->class_name;?>"  /> &
							<input type="hidden" style="width: 60px;" id="shift<?php echo $i;?>" name="shift<?php echo $i;?>" value="<?php echo $sh->shift?>" />
								<?php echo $sh->shift?>
							</td>
							<?php foreach($days as $col):?>
							<?php if($msg > 1)
							{
								?><td><?php 
								$sub = $this->db->query("SELECT subject FROM exam_time_table WHERE class1 ='$row->class_name' AND shift = '$sh->shift' AND date1 = '$col->date1' AND day1 = '$col->day1'");
								$subject = $sub->result();
								$sub = $this->db->query("SELECT * FROM exam_time_table WHERE exam_name ='$exam_name' AND shift = '$sh->shift' AND date1 = '$col->date1' AND day1 = '$col->day1' AND class1 = '$row->class_name'");
								$row1 = $sub->row();
								if($row1){
									$fs=$row1->subject;
								}
								else{
									$fs="none";
								}
								?>
								<select name="subject<?php echo $i.$j;?>" style="width: 100px;" id="subject<?php echo $i.$j;?>" value="3";>
									<option value="N/A">-Select Subject-</option>
									<?php foreach ($subject as $sub):?>
									<option value=<?php echo '"'.$sub->subject.'"'; if($fs == $sub->subject){ echo 'selected="selectd"'; } ?>><?php echo $sub->subject; ?></option>
									<?php endforeach;?>
								</select>	
						
								<script> 
				 						$(document).ready(function(){
											$("#subject<?php echo $i.$j;?>").change(function(){
												var exam_name = "<?php echo $exam_name;?>";
												var edate = "<?php echo $edate;?>";
												var classv = $("#class<?php echo $i;?>").val();
												var shift = $("#shift<?php echo $i;?>").val();
												var date1 = $("#date<?php echo $j ?>").val();
												var day1 = $("#day<?php echo $j ?>").val();
												var subject = $("#subject<?php echo $i.$j;?>").val();
												
										$.post("<?php echo site_url("index.php/examControllers/fullExam") ?>",{exam_name : exam_name,classv : classv,shift :shift,date1 : date1,day1 : day1,subject : subject,edate : edate}, function(data){
											$("#sectionId12").html(data);
											});
											});
					 					});
										</script>
								</td>
							<?php $j++; 
							}
							else 
							{
								?><td><?php
							$sub = $this->db->query("SELECT subject FROM subject WHERE class_id ='$class'");
							$subject = $sub->result();
							$sub2 = $this->db->query("SELECT * FROM exam_time_table WHERE exam_name ='$exam_name' AND shift = '$sh->shift' AND date1 = '$col->date1' AND day1 = '$col->day1' AND class1 = '$class'");
							$row1 = $sub2->row();
							if($row1){
								$fs=$row1->subject;
							}
							else{
								$fs="none";
							}
							?>
								<select name="subject<?php echo $i.$j;?>" style="width: 100px;" id="subject<?php echo $i.$j;?>">
									<option value="N/A">-Select Subject-</option>
									<?php foreach ($subject as $sub):?>
									<option value=<?php echo '"'.$sub->subject.'"'; if($fs == $sub->subject){ echo 'selected="selectd"'; } ?>><?php echo $sub->subject; ?></option>
									<?php endforeach;?>
								</select>	
								<script> 
				 						$(document).ready(function(){
											$("#subject<?php echo $i.$j;?>").change(function(){
												var exam_name = "<?php echo $exam_name;?>";
												var edate = "<?php echo $edate;?>";
												var classv = $("#class<?php echo $i;?>").val();
												var shift = $("#shift<?php echo $i;?>").val();
												var date1 = $("#date<?php echo $j ?>").val();
												var day1 = $("#day<?php echo $j ?>").val();
												var subject = $("#subject<?php echo $i.$j;?>").val();
										$.post("<?php echo site_url("index.php/examControllers/fullExam") ?>",{exam_name : exam_name,classv : classv,shift :shift,date1 : date1,day1 : day1,subject : subject, edate : edate}, function(data){
											$("#sectionId12").html(data);
											});
												
											});
					 					});
								</script></td>
							<?php        
							$j++;  
							} 
							endforeach;//days and column?>
						</tr>
						<?php $i++; ?>
						<?php endforeach;//shift?>
						<?php endforeach;//class?>
						
					</tbody>
				</table>
				<input type="hidden" name="nos" value="<?php echo $i;?>"/>
			</div>
		</div>
	</div>
</div>

