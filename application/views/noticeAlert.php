
<?php if(isset($editid))
{?>
	<form action="<?php echo base_url();?>index.php/noticeControllers/updateNotice1"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
	<div class="row">
	<div class="col-md-12">
	<!-- start: RESPONSIVE TABLE PANEL -->
	<div class="panel panel-white">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
							Notice And Alert Section :
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
							</div>
							<div class="panel-body">
									<div class="alert alert-info">
									<h4 class="center"><b> Notice/Alert for All</b></h4>
									</div>
									<div id="msg"></div>
									<div class="col-md-5">
									<div class="panel">
											<div class="panel-heading panel-red border-light">
											<h4 class="panel-title">Create Alert</h4>
											</div>
													<div class="panel-body">
													<div class="row space15">
													<div class="col-md-5">Select Category</div>
															<div class="col-sm-12">
															<?php foreach($editid->result() as $ed):?>
															<select class="form-control" id="category" name="category">
																			<option value="01">-Category-</option>
																			<option value="All Student" <?php if($ed->category == "All Student") echo 'selected=selected';?> >All Student</option>
																			<option value="All Employee" <?php if($ed->category == "All Employee") echo 'selected=selected';?>>All Employee</option>
																			<option value="Both" <?php if($ed->category == "Both") echo 'selected=selected';?>>Both</option>
																			</select>
																			</div>
																					</div>
																					<div class="row space15">
																							<div class="col-md-5">Subject</div>
																									<div class="col-md-12"><input type="text" class="form-control" id="sub" value="<?php echo $ed->subject;?>"name="sub" placeholder="Text Field"></div>
																											</div>
																													<div class="row space15">
																													<div class="col-md-5">Message</div>
																													<div class="col-md-12"><textarea rows="7" cols="8" class="form-control" id="msg" name="msg" placeholder="Text Field"><?php echo $ed->message;?></textarea></div>
																													</div>
																													<div class="row space15">
																													<div class="col-md-5">
																													<input type="hidden" name="id" value="<?php echo $ed->id;?>" />
																																			<button type="submit" class="btn btn-red">
																																			<?php endforeach;?>
																																					Click to Save <i class="fa fa-save"></i>
																																					</button>
																													</div>
																													</div>
																											</div>
																												</div>
																													
																												</div>
																												<div class="col-md-7">
																												<div class="panel">
																												<div class="panel-heading panel-blue border-light">
																												<h4 class="panel-title">Recent Alerts Table</h4>
																												</div>
																												<div class="panel-body panel-scroll height-450" >
																												<table class="table table-bordered table-hover ">
																												<thead>
																												<tr>
																												<th>#</th>
																												<th>Category</th>
																												<th>Subject</th>
																												<th>Action</th>
																
																												</tr>
																											</thead>
																											<tbody>
																						
																												<?php $i=1;
																												foreach($request as $row):
																												?><tr>
																													<td><?php echo $i;?></td>
																													<td><?php echo $row->category;?></td>
																													<td><?php echo $row->subject;?></td>
																													<td><a href="<?php echo base_url()?>/index.php/noticeControllers/updateNotice1/<?php echo $row->id;?>">Edit</a>
																                                    | <a href="<?php echo base_url()?>/index.php/msgNoticeControllers/delNotice/<?php echo $row->id;?>">Delete</a>
																                                    </td>
																													
																												</tr>	<?php $i++;endforeach; ?>
																											
																											
																											</tbody>
																												
																												</table>
																												</div>
																											</div>
																										</div>
																									
																									
																									</div>
																								</div>
																								
																							</div>
																						</div>
																					</form>
																				<?php 
																			}else {
																				?>
							<form action="<?php echo base_url();?>index.php/noticeControllers/updateNotice"  method ="post" role="form" class="smart-wizard form-horizontal" id="form">
													<div class="row">
														<div class="col-md-12">
															<!-- start: RESPONSIVE TABLE PANEL -->
															<div class="panel panel-white">
																<div class="panel-heading">
																	<i class="fa fa-external-link-square"></i>
																	Notice And Alert Section :
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
																</div>
																<div class="panel-body">
																	<div class="alert alert-info">
																		<h4 class="center"><b> Notice/Alert for All</b></h4>
																	</div>
																	<div id="msg"></div>
																	<div class="col-md-5">
																		<div class="panel">
																			<div class="panel-heading panel-red border-light">
																				<h4 class="panel-title">Create Alert</h4>
																			</div>
																			<div class="panel-body">
																				<div class="row space15">
																					<div class="col-md-5">Select Category</div>
																					<div class="col-sm-12">
																						<select class="form-control" id="category" name="category" >
																							<option value="01">-Category-</option>
																							<option value="All Student">All Student</option>
																							<option value="All Employee">All Employee</option>
																							<option value="Both">Both</option>
																						</select>
																					</div>
																				</div>
																				<div class="row space15">
																					<div class="col-md-5">Subject</div>
																					<div class="col-md-12"><input type="text" class="form-control" id="sub" name="sub" placeholder="Text Field"></div>
																				</div>
																				<div class="row space15">
																					<div class="col-md-5">Message</div>
																					<div class="col-md-12"><textarea rows="7" cols="8" class="form-control" id="msg" name="msg" placeholder="Text Field"></textarea></div>
																				</div>
																				<div class="row space15">
																					<div class="col-md-5">
																						<button type="submit" class="btn btn-red">
																							Click to Save <i class="fa fa-save"></i>
																						</button>
																					</div>
																					
																				</div>
																			</div>
																		</div>
																		
																	</div>
																	<div class="col-md-7">
																		<div class="panel">
																			<div class="panel-heading panel-blue border-light">
																				<h4 class="panel-title">Recent Alerts Table</h4>
																			</div>
																			<div class="panel-body panel-scroll height-450" >
																			<table class="table table-bordered table-hover ">
																			<thead>
																			<tr>
																			<th>#</th>
																			<th>Category</th>
																			<th>Subject</th>
																			<th>Action</th>
																			
																			</tr>
																		</thead>
																		<tbody>
																		
																			<?php $i=1;
																			foreach($request as $row):
																			?><tr>
																				<td><?php echo $i;?></td>
																				<td><?php echo $row->category;?></td>
																				<td><?php echo $row->subject;?></td>
																				<td>
																				<a href="<?php echo base_url()?>/index.php/login/noticeAlert/<?php echo $row->id;?>">Edit</a>
							                                    					| <a href="<?php echo base_url()?>/index.php/msgNoticeControllers/delNotice/<?php echo $row->id;?>">Delete</a>
													                                    </td>
													                               </tr>	<?php $i++;endforeach; ?>
																		</tbody>
																			
																			</table>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
										</form>
									<?php }?>	