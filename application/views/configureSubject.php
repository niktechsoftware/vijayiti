<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<div class="alert alert-info">
											<center><h3 class="media-heading"><b>Important Instructions about Adding Subjects To A Trade !</b></h3></center>
                    						<p class="media-timestamp">Welcome to Add Subject area where we can attach subjects belonging to a class. Please ensure that we have created Stream, class, and Section. After that we can able to take admission in any class.
                    						 to add subject choose class name, stream name and section name respectively from the drop down button and press Submit.</p>
                    						<p class="media-timestamp">
                    							Update your subjects in the boxes given in the chart and press save subjects button bellow the chart.
                    						</p>
										</div>
										<div class="row">
											<div class="col-sm-4">
												<div class="panel-heading panel-red border-light">
													<h4 class="panel-title">Shift</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="clname" class="form-control">
															<option value="">Select Timing</option>
															
															<?php if(isset($classList)):?>
															<?php foreach ($classList as $row):?>
															<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
															<?php endforeach; endif;?>
														</select>
													</div>
													<div class="text-red text-small">Please select a class, section and stream will automatically come select and add subject.</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-green border-light">
													<h4 class="panel-title">Trade</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="streamList" class="form-control">
															
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Unit</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="section" class="form-control">
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
		<div class="row" id="subjectBox">
		</div>
						
					
						<!-- end: PAGE CONTENT-->