<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
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
												<div class="tabbable">
													<ul id="myTab" class="nav nav-tabs">
														<li class="active">
															<a href="#myTab_example1" data-toggle="tab">
																<i class="green fa fa-home"></i> Add/Update Subject Stream
															</a>
														</li>
														<li>
															<a href="#myTab_example2" data-toggle="tab">
																<i class="green fa fa-home"></i> Add/Update Section
															</a>
														</li>
														<li>
															<a href="#myTab_example3" data-toggle="tab">
																<i class="green fa fa-home"></i> Add New Class
															</a>
														</li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane fade in active" id="myTab_example1">
															<div class="alert alert-info">
																<p>
																	<center><h4 class="media-heading">Welcome To Add or Update Stream Area !</h4></center>
                    <p class="media-timestamp">If you want to <strong>add</strong> a new stream to your school/college, Please type in the stream name into the box given below the stream name and press <strong>add stream</strong> button.<br>
                    To <strong>edit</strong> existing stream edit it's name and press <strong>edit</strong> button next to the row.<br>
                    And to <strong>delete</strong> a stream simply press <strong>delete</strong> button.  </p>
															</div>
															<div class="row">
																<div class="col-sm-5">
																	<div class="panel panel-blue panel-calendar">
																		<div class="panel-heading border-light">
																			<h4 class="panel-title">Subject Stream</h4>
																		</div>
																		<div class="panel-body">
																			<input type="text" id="addStream">
																			<div class="text-white text-large pull-right">
																				<a href="#" class="btn btn-xs btn-light-blue" id="addStreamButton"><i class="fa fa-check"></i> Add Stream</a>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-7">
																	<div class="panel panel-green panel-calendar">
																		<div class="panel-heading border-light">
																			<h4 class="panel-title">Stream List</h4>
																		</div>
																		<div class="panel-body" id="streamList1">
																			
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="myTab_example2">
															<div class="alert alert-info">
																<p>
																	<center><h4 class="media-heading">Welcome To Add or Update Section Area !</h4></center>
	                    <p class="media-timestamp">If you want to <strong>add</strong> a new section to your school/college, Please type in the<strong> section name</strong> into the box given below the <strong>section column</strong> and press <strong>add section</strong> button.<br>
	                    To <strong>edit</strong> existing section edit it's name and press <strong>edit</strong> button next to the row.<br>
	                    And to <strong>delete</strong> a section simply press <strong>delete</strong> button.  </p>
															</div>
															<div class="row">
																<div class="col-sm-5">
																	<div class="panel panel-red panel-calendar">
																		<div class="panel-heading border-light">
																			<h4 class="panel-title">Subject Section</h4>
																		</div>
																		<div class="panel-body">
																			<input type="text" id="addSection1">
																			<div class="text-white text-large pull-right">
																				<a href="#" class="btn btn-xs btn-light-red" id="addSectionButton"><i class="fa fa-check"></i> Add Section</a>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-7">
																	<div class="panel panel-blue panel-calendar">
																		<div class="panel-heading border-light">
																			<h4 class="panel-title">Section List</h4>
																		</div>
																		<div class="panel-body" id="sectionList">
																			
																		</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="myTab_example3">
															<div class="alert alert-info">
																<center><h4 class="media-heading">Important Instructions about class creation</h4></center>
                    <p class="media-timestamp">This is class creation area. You have to provide class name (Like 1st,8th,12th etc..) and select Class stream
               (Like : Science, Arts, Commerce etc.) If stream is not applicable then select (none of these). After this select 
               select section if applicable, otherwise none. Leave the <strong>teacher's id</strong> field blank. Update the <strong>teacher's id</strong> after it has been created. You can find the teacher's id in the employee detail section. </p>
																
															</div>
															<div class="row">
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-purple border-light">
																			<h4 class="panel-title">Add <span class="text-bold">New Class</span></h4>
																		</div>
																		<div class="panel-body" id="sectionList">
																			<form class="form-horizontal" action="add_class_db.php" method="post" role="form" onsubmit="return validateForm()">                    
															                    <div class="form-group">
															                      <label for="inputStandard" class="col-lg-4 control-label">Class Name <span style="color:#F00">*</span></label>
															                      <div class="col-lg-7">
															                        <input type="text" id="className" class="form-control" placeholder="like : 1st, 10th, etc..." required />
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="standard-list1" class="col-md-4 control-label">Select Stream <span style="color:#F00">*</span></label>
															                      <div class="col-md-7">
															                        <select class="form-control" id="classStream" required>
																                        <option value="">-Select Class Stream-</option>
									                                                    <option value="Art">Art</option>
									                                                    <option value="BIOLOGY">BIOLOGY</option>
									                                                    <option value="Math">Math</option>
									                                                    <option value="none">None</option>
															                        </select>
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="standard-list1" class="col-md-4 control-label">Select Section <span style="color:#F00">*</span></label>
															                      <div class="col-md-7">
															                        <select class="form-control" id="classSection" required>
															                          	<option value="">-Select Class Section-</option>
									                                                    <option value="A">A</option>
									                                                    <option value="B">B</option>
								                                                  	</select>
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="inputStandard" class="col-lg-6 control-label">
															                      	<button class="btn btn-purple btn-sm" id="showtoast">
															                    		<i class="fa fa-save"></i> &nbsp;Save
															                    	</button>
															                        <button class="btn btn-purple btn-sm" id="classReset">
															                    		<i class="fa fa-refresh"></i> &nbsp;Reset
															                    	</button>
															                      </label>
															                      <div class="col-lg-6">
															                    	&nbsp;
															                      </div>
															                   </div>
														                  </form>
																		</div>
																	</div>		
																</div>
																<div class="col-sm-6">
																	<div class="panel panel-white">
																		<div class="panel-heading panel-pink border-light">
																			<h4 class="panel-title">Class <span class="text-bold">List</span></h4>
																		</div>
																	<div class="panel-body">
																		<div class="panel-scroll height-200">
																			<table class="table table-hover" id="sample-table-1">
																				<thead>
																					<tr>
																						<th>SNo.</th>
																						<th>Class Name</th>
																						<th>Section</th>
																						<th>Subject Stream</th>
																					</tr>
																				</thead>
																				<tbody id="classDetail">
																					
																				</tbody>
																			</table>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<!-- end: INLINE TABS PANEL -->
							</div>
						</div>
						<!-- end: PAGE CONTENT-->