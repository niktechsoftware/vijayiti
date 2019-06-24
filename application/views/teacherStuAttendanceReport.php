						<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Student <span class="text-bold">Attendance Report</span></h4>
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
														<a class="panel-refresh" href="#">
															<i class="fa fa-refresh"></i> <span>Refresh</span>
														</a>
													</li>
													<li>
														<a class="panel-config" href="#panel-config" data-toggle="modal">
															<i class="fa fa-wrench"></i> <span>Configurations</span>
														</a>
													</li>
													<li>
														<a class="panel-expand" href="#">
															<i class="fa fa-expand"></i> <span>Fullscreen</span>
														</a>
													</li>
												</ul>
											</div>
											<a class="btn btn-xs btn-link panel-close" href="#">
												<i class="fa fa-times"></i>
											</a>
										</div>
									</div>
							<div class="panel-body">
								<div class="col-sm-12">
									<div class="form-group col-sm-3">
										<label class="col-sm-3 control-label" for="form-field-20">
											Class <span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<select class="form-control" id="classv" name="class">
												<?php foreach($request as $row):?>
													<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									
									<div class="form-group col-sm-3"">
										<label class="col-sm-3 control-label" for="form-field-20">
											Section<span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<select class="form-control" id="sectionId" name="section" >
											</select>
										</div>
									</div>
									
									<div class="form-group col-sm-3"">
										<label class="col-sm-3 control-label" for="form-field-20">
											Start Date<span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="sdate" name="startdate" class="form-control date-picker">
										</div>
									</div>
									
									<div class="form-group col-sm-3"">
										<label class="col-sm-3 control-label" for="form-field-20">
											End Date<span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="edate" name="enddate" class="form-control date-picker">
										</div>
									</div>
								</div>
								<div class="table-responsive" id="rahul">
											
								</div>
							</div>
					</div>