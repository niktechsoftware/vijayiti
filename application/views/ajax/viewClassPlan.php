<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading panel-blue">
				<i class="fa fa-external-link-square"></i>
					Define Lession Plan :
				<div class="panel-tools">										
					<div class="dropdown">
						<a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
							<i class="fa fa-cog"></i>
						</a>
						<ul class="dropdown-menu dropdown-light pull-right" role="menu">
							<li>
								<a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
							</li>
							<li>
								<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
							</li>
							<li>
								<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
							</li>
							<li>
								<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
							</li>										
						</ul>
					</div>
				</div>
			</div> <!-- End Panel Heading -->
			<div class="panel-body">
				
		<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<th id="test">Day/period</th>
				<?php 	
				$logtype = $this->session->userdata('login_type');
				if($logtype == "admin"){
					
				}else{
					$username= $this->session->userdata("username");
				}
					$period=$this->db->get("period");
					foreach($period->result() as $row):
				?>
				<th><?php echo $row->period;?></th>
				<?php 
					endforeach;
				?>
				
			</thead>
			<tbody>
				<?php 
					$i = 1;
					$j = 1;
					$sdate = date("Y-m-d",strtotime("$sdate"));
					$s1date=$sdate;
					?><?php
					$e1date = date("Y-m-d",strtotime("$edate"));
					?><?php
					while($sdate <= $edate){
				?>
				<form method="post" action="<?php echo base_url();?>periodTimeControllers/saveLessonPlan">
				<tr>
					<td><input type="hidden" name="s1date" value="<?php echo $s1date;?>"/>
					<input type="hidden" name="edate" value="<?php echo $edate;?>"/>
					<?php 
						$weekday = date('l', strtotime($sdate));
						echo $weekday;
						?><input type="hidden" name="weekday" value="<?php echo $weekday;?>"/><?php 
						echo "</br>";
						echo $sdate;
						?><input type="hidden" name="date1" value="<?php echo $sdate;?>"/><?php 
						if($weekday=="Sunday"){
							
					?>
					</td>
					
					<?php 
					
					foreach($period->result() as $row):?>
					<td>
						<input type="text" style="width: 100px;" value="Sunday" name="lp<?php echo $j;?>" disabled="disabled">
					</td>
					<?php $j++; endforeach; ?>
				
				</tr>
				<?php $sdate = date("Y-m-d",strtotime("$sdate  + 1 day"));
						}
						else{
							
					$guru = $this->db->query("SELECT * FROM lesson_plan WHERE teacher_id = '".$username."' AND date1='".$sdate."' AND dayname = '".$weekday."'");
					if($guru->num_rows()>0)
					{
						$period1=$row->period;?><input type="hidden" name="period" value="<?php echo $period1?>"/><?php
							$result1=$this->db->query("SELECT * FROM time_table WHERE teacher = '".$username."' AND period = '$period1' And day LIKE '%$weekday%'");
							foreach($result1->result() as $row1):
								?><input type="hidden" name="subject" value="<?php echo $row1->subject;?>"/><?php 
							 
							endforeach;
						foreach($guru->result() as $row):?>
					<td>
					<?php echo $row1->subject." ";
					$r=	$row1->class1;
							 echo $row1->class1;?><input type="hidden" name="class1" value="<?php if(strlen($r)==0){echo "Lunch"; }else{ echo $row1->class1;}?>"/>
						<textarea style="width: 100px;" value="<?php echo $row->class_work;?>" name="lp<?php echo $j;?>" disabled="disabled"><?php echo $row->class_work;?></textarea>
					</td>
					<?php  $j++; endforeach;
					}
					else {
				?>
					</td>
					<?php foreach($period->result() as $row):?>
					<td style="color:grean">
					<?php 
						$period1=$row->period;?><input type="hidden" name="period" value="<?php echo $period1?>"/><?php
						$result1=$this->db->query("SELECT * FROM time_table WHERE teacher = '".$username."' AND period = '$period1' And day LIKE '%$weekday%'");
						foreach($result1->result() as $row1):
							echo $row1->subject." ";?><input type="hidden" name="subject" value="<?php echo $row1->subject;?>"/><?php 
							$r=	$row1->class1;
							echo $row1->class1;?><input type="hidden" name="class1" value="<?php if(strlen($r)<1){echo "Lunch"; }else{ echo $row1->class1;}?>"/><?php 
						endforeach;
					?>
						<textarea  style="width: 100px" style="color:red" Value ="Not Define" name="lp<?php echo $j;?>" disabled="disabled"><?php echo "Not Define";?></textarea>
					</td>
					<?php $j++; endforeach; }?>
					
				</tr>
				<?php $sdate = date("Y-m-d",strtotime("$sdate  + 1 day"));} // End else condition
				$j = 1;
				echo "</form>";
				$i++;
			} // End while loop
			?>
			
		</table>	
		</div>
		
	</div>
</div>
</div>
</div>
		
			