		<div class="row">
			<div class="col-sm-12">
					<div class="tabbable">
									<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
										<li class="active">
											<a data-toggle="tab" href="#monday">
												Monday
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#tuesday">
												Tuesday
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#wednesday">
												Wednesday
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#thursday">
												Thursday
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#friday">
												Friday
											</a>
										</li>
										<li>
											<a data-toggle="tab" href="#saturday">
												Saturday
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<div id="monday" class="tab-pane fade in active">
											
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):
														?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<?php foreach($timetable as $row):
														 if($row->day == "Monday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->class1."<br/>".$row->subject;?></td>
															<?php endif;}?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
								
										</div>
										<!-- for Tuesday -->
										<div id="tuesday" class="tab-pane">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
															<td></td>
														<?php foreach($timetable as $row): 
														if($row->day == "Tuesday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->teacher."<br/>".$row->subject;?></td>
															<?php endif;}?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
										</div>
										<!-- end for Tuesday -->
										<!-- for Wednesday -->
										<div id="wednesday" class="tab-pane">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
															<td></td>
														<?php foreach($timetable as $row): 
														if($row->day == "Wednesday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->teacher."<br/>".$row->subject;?></td>
															<?php endif;}?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
										</div>
										
										<!-- end for Wednesday -->
										<!-- for thursday -->
										<div id="thursday" class="tab-pane">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<?php foreach($timetable as $row):
														 if($row->day == "Thursday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->teacher."<br/>".$row->subject;?></td>
															<?php endif;}?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
										</div>
										
										<!-- end for Thursday -->
										<!-- for Friday -->
										<div id="friday" class="tab-pane">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
															<td></td>
														<?php foreach($timetable as $row): 
														if($row->day == "Friday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->teacher."<br/>".$row->subject;?></td>
															<?php endif; }?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
										</div>
										
										<!-- end for Friday -->
										<div id="saturday" class="tab-pane">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php 
														$uniquePeriod=$this->db->query("SELECT * from period");
														foreach($uniquePeriod->result() as $row):?>
														<th>
															<?php 
																if($row->period == ''){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th></th>
														<?php foreach($timetable as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td></td>
														<?php foreach($timetable as $row):
														 if($row->day == "Saturday")
															{?>
															<?php if($row->teacher == ''):?>
																<td><?php echo "Lunch";?></td>
															<?php else:?>
																<td><?php echo $row->teacher."<br/>".$row->subject;?></td>
															<?php endif;}?>
													<?php endforeach;?>
													</tr>
													
												</tbody>
											</table>
										</div>
										
										<!-- for Saturday -->
									</div>
								</div>
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
					
					