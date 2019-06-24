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
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Monday%'"); ?>														
														<?php while($res = mysql_fetch_object($query )):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
									
										</div>
													
										<div id="tuesday" class="tab-pane fade">
											<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Tuesday%'"); ?>														
														<?php while($res = mysql_fetch_object($query )):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
										<div id="wednesday" class="tab-pane fade">
										<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Wednesday%'"); ?>														
														<?php while($res = mysql_fetch_object($query )):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
										<div id="thursday" class="tab-pane fade">
										<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Thursday%'"); ?>														
														<?php while($res = mysql_fetch_object($query )):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
										<div id="friday" class="tab-pane fade">
										<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Friday%'"); ?>														
														<?php while($res = mysql_fetch_object($query)):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
										<div id="saturday" class="tab-pane fade">
										<table class="table table-hover">
												<thead>
													<tr>
														<th>Period</th>
														<?php foreach($uniquePeriod as $row):?>
														<th>
															<?php 
																if($row->period == '0'){
																	echo "Lunch";
																}else{
																	echo $row->period;
																}
															?>
														</th>
														<?php endforeach;?>
													</tr>
													<tr>
														<th>Time Slot</th>
														<?php foreach($uniquePeriod as $row):?>
														<th><?php echo $row->time; ?>
														</th>
														<?php endforeach;?>
													</tr>
												</thead>
												<tbody>
													<?php foreach($uniqueClass as $row):?>
													<tr>
														<th><?php $class = $row->class1; echo $class;?></th>
														<?php $query = mysql_query("SELECT * FROM time_table WHERE class1 = '$class' AND day LIKE '%Saturday%'"); ?>														
														<?php while($res = mysql_fetch_object($query )):?>
														<td>
															<?php if($res->teacher == '0'):?>
																<?php echo "Lunch";?>
															<?php else:?>
																<?php echo $res->teacher."<br/>".$res->subject;?>
															<?php endif;?>
														</td>
														<?php endwhile; ?>
													</tr>
													<?php endforeach;?>
												</tbody>
											</table>
										</div>
									
									</div>
								</div>
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
					
					