		<div class="row">
			<div class="col-sm-12">
				<div class="panel panel-white">
					<div class="panel-heading">
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
									<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
								</li>										
							</ul>
							</div>
						</div>
					</div>
					
					<div class="panel-body">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Day</th>
											<?php 
											$lunch = 0;
											$uniquePeriod=$this->db->query("SELECT * from period");
											foreach($uniquePeriod->result() as $row):?>
											<th>
												<?php 
													if($row->period == ''){
														echo "Lunch";
													}else{
														echo $row->period;
													}
													$lunch = $row->lunch;
												?>
											</th>
											<?php endforeach;?>
										</tr>
										<tr>
											<th></th>
											<?php
												foreach($uniquePeriod->result() as $row):
											?>
											<th>
												<?php 
													echo $row->to." - ".$row->from;
												?>
											</th>
											<?php 
												endforeach;
											?>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Monday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Monday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
										<tr>
											<td>Tuesday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Tuesday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
										<tr>
											<td>Wednesday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Wednesday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
										<tr>
											<td>Thursday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Thursday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
										<tr>
											<td>Friday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Friday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
										<tr>
											<td>Saturday</td>
											<?php $i = 1;?>
											<?php $timetable = $this->db->query("SELECT * FROM time_table WHERE teacher = '".$this->session->userdata('username')."' AND day LIKE '%Saturday%' ORDER BY id ASC");?>
											<?php foreach($timetable->result() as $row):?>
												<?php if($lunch == $i):?>
													<td><?php echo "Lunch";?></td>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php else:?>
													<td><?php echo $row->class1."<br/>".$row->subject;?></td>
												<?php endif;?>
											<?php $i++; endforeach;?>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
						<!-- end: PAGE CONTENT-->
					
					