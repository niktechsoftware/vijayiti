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
																<i class="green fa fa-home"></i> Add Trade
															</a>
														</li>
														<li>
															<a href="#myTab_example2" data-toggle="tab">
																<i class="green fa fa-home"></i> Add Unit
															</a>
														</li>
														<li>
															<a href="#myTab_example3" data-toggle="tab">
																<i class="green fa fa-home"></i> Add Shift
															</a>
														</li>
													</ul>
													<div class="tab-content">
														<div class="tab-pane fade in active" id="myTab_example1">
															<div class="alert alert-info">
																<p>
																	<center><h3 class="media-heading"><b>Welcome To Add or Update Trade Area !</b></h3></center>
																	This is very important to create Stream first because subject and classes requires a valid stream.You should not change stream after creating and declare the subjects and classes.
																	 If you change it may affect your Exam and time table Section. 
                    <p class="media-timestamp">If you want to <strong>Add</strong> a new stream to your school/college, Please type in the stream name into the box given below the stream name and press <strong>Add Stream</strong> Button.<br>
                    To <strong>Edit</strong> existing stream edit it's name and press <strong>Edit</strong> Button next to the row. And to <strong>Delete</strong> a stream simply press <strong>Delete</strong> Button.  </p>
															</div>
															<div class="row">
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Trade</h4>
																		</div>
																		<div class="panel-body">
																			<div class="text-black text-large">
																				<input type="text" id="addStream">
																				<a href="#" class="btn btn-sm btn-light-blue" id="addStreamButton"><i class="fa fa-check"></i> Add Trade</a><br><br>
																				<div class="alert alert-warning"> Type a stream name and press Add Stream.If stream added successfuly then it show in right side panel where you can change the name and Delete it.</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-green border-light">
																			<h4 class="panel-title">Trade List</h4>
																		</div>
																		<div class="panel-body" id="streamList1">
																			
																		</div>
																		<div class="alert alert-success">You can <strong>edit </strong> or <strong>delete </strong> stream by press concern Button it sure that you have not created 
subject and classes depending edited or Deleted Stream.</div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="myTab_example2">
															<div class="alert alert-info">
																<p>
																	<center><h3 class="media-heading"><b>Welcome To Add or Update Section Area !</b></h3></center>
																	This is very important to create section after creating stream because subject and classes requires a valid section.You should not change section name after creating and declare the subjects and classes.
																	 If you change it may affect your Exam and time table Section.<p class="media-timestamp">If you want to <strong>Add</strong> a new section to your school/college, Please type in the<strong> Section Name</strong> into the box given below the <strong>section column</strong> and press <strong>Add Section</strong> Button.
	                    To <strong>Edit</strong> existing section edit it's name and press <strong>edit</strong> button next to the row.<br>
	                    And to <strong>Delete</strong> a section simply press <strong>delete</strong> button.  </p>
															</div>
															<div class="row">
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-red border-light">
																			<h4 class="panel-title">Add Unit</h4>
																		</div>
																		<div class="panel-body">
																			<div class="text-white text-large">
																				<input type="text" id="addSection1">
																				<a href="#" class="btn btn-sm btn-light-red" id="addSectionButton"><i class="fa fa-check"></i> Add Unit</a>
																			<br>
																			<br>
																			<div class="alert alert-warning"> Type a Section name and press Add Section.If Section added successfuly then it show in right side panel where you can change the name and Delete it.</div>
																			</div>
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-blue border-light">
																			<h4 class="panel-title">Unit List</h4>
																		</div>
																		<div class="panel-body" id="sectionList">
																			
																		</div>
																		<div class="alert alert-success"><p>You can <strong>edit </strong> or <strong> delete </strong>Section by press concern Button it sure that you have not created 
subject and classes depending Edited or Deleted Section.</p></div>
																	</div>
																</div>
															</div>
														</div>
														<div class="tab-pane fade" id="myTab_example3">
															<div class="alert alert-info">
																<center><h3 class="media-heading"><b>Important Instructions about class creation</b></h3></center>
                    <p class="media-timestamp">Please insure that you have created Stream and Section for Class. This is class creation area. You have to provide class name (Like 1st,8th,12th etc..) and select Class stream
               (Like : Science, Arts, Commerce etc.) If stream is not applicable then select (none of these). After this select 
               select section if applicable, otherwise none. Leave the <strong>teacher's id</strong> field blank. Update the <strong>teacher's id</strong> after it has been created. You can find the teacher's id in the employee detail section. </p>
																
															</div>
															<div class="row">
																<div class="col-sm-6">
																	<div class="panel panel-calendar">
																		<div class="panel-heading panel-purple border-light">
																			<h4 class="panel-title">Add <span class="text-bold">Shift</span></h4>
																		</div>
																		<div class="panel-body" id="sectionList">
																		<div class="alert alert-warning">Please type class name make <strong>sure after admission class name cannot be Edited in any case </strong> if you change 
																		then the exam section, student section and time scheduling may be affected.Then select Stream and section from list to attach the stream, section to your class.
Once a class is created it show in right side panel.<br><br>
																		</div>
																			<div class="form-horizontal" role="form">                    
															                    <div class="form-group">
															                      <label for="inputStandard" class="col-lg-4 control-label">Timing<span style="color:#F00">*</span></label>
															                      <div class="col-lg-7">
															                       <select class="form-control" id="className" required>
																                        <option value="">-Select Trade-</option>
																                         <option value="Morning">Morning</option>
																                     <option value="Evening">Evening</option>
									                                                 
															                        </select>
															                       
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="standard-list1" class="col-md-4 control-label">Select Trade <span style="color:#F00">*</span></label>
															                      <div class="col-md-7">
															                        <select class="form-control" id="classStream" required>
																                        <option value="">-Select Trade-</option>
																                        <?php $var=$this->db->get("stream");
																                        foreach($var->result() as $v):
																                        ?><option value="<?php echo $v->stream;?>"><?php echo $v->stream;?></option>
									                                                  <?php endforeach;?>
															                        </select>
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="standard-list1" class="col-md-4 control-label">Select Section <span style="color:#F00">*</span></label>
															                      <div class="col-md-7">
															                        <select class="form-control" id="classSection" required>
															                          	<option value="">-Select Unit-</option>
									                                                     <?php $var=$this->db->get("class_section");
																                        foreach($var->result() as $c):
																                        ?><option value="<?php echo $c->section;?>"><?php echo $c->section;?></option>
									                                                  <?php endforeach;?>
								                                                  	</select>
															                      </div>
															                    </div>
															                    <div class="form-group">
															                      <label for="inputStandard" class="col-lg-6 control-label">
															                      	<button class="btn btn-purple btn-sm" id="classSave">
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
														                  </div>
																		</div>
																	</div>		
																</div>
																<div class="col-sm-6">
																	<div class="panel panel-white">
																		<div class="panel-heading panel-pink border-light">
																			<h4 class="panel-title">Shift <span class="text-bold">List</span></h4>
																		</div>
																	<div class="panel-body">
																		<div class="panel-scroll height-200">
																			<table class="table table-hover" id="sample-table-1">
																				<thead>
																					<tr>
																						<th>SNo.</th>
																						<th>Timing</th>
																						<th>Unit</th>
																						<th>Trade</th>
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