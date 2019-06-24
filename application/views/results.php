<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Enter <span class="text-bold"> Marks Detail</span></h4>
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
										</div>
									</div>
									<div class="panel-body">
										<h5>Entered Marks</h5>
										<div><div id="validId"></div>
										<div class="alert alert-warning"> <div class="text-blue text-large"> <strong><strong>Welcome to Marks Updation Page. Now You can update pre entered Marks details  </strong>First of all select dropdown menus and wait Click Update Marks Button for update.</strong>After Clicking update button marks will be updated now you can refresh this page and check it. </div></div>
											<label>
												Select Exam Name
												<select name="exam_name" id="exam_name" class="form-control">
													<option value="01">-Select-</option>
													<?php foreach ($request as $en):?>
													<option value="<?php echo $en->exam_name?>"><?php echo $en->exam_name?></option>
													<?php endforeach;?>
												</select>
											</label>
											
											<label>
												Class Name
												<select name="classv" id="classv" class="form-control">
													<option value="01">-Select-</option>
													<?php foreach ($classes as $en):?>
													<option value="<?php echo $en->class_name?>"><?php echo $en->class_name?></option>
													<?php endforeach;?>
												</select>
											</label>
										
											<label>
												Section
												<select class="form-control" id="sectionId" name="section" style="width: 130px;"></select>
											</label>
											<label>
												Subject
												<select class="form-control" id="subjectIdresult" name="section" style="width: 220px;"></select>
											</label>
										</div>	
										<div id="result123"></div>
									</div>
								</div>
							</div>
						</div>