	<form  action="<?php echo base_url();?>index.php/teacherController/teacherAtten" method="post">
	<div class="row">
							<div class="col-md-12">
								<!-- start: DYNAMIC TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title"> Teacher <span class="text-bold">Attendance Table</span></h4>
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
									<div class="row">
										<div class="col-sm-12" id="validId"></div>
									</div><?php 		if($v){?><div class="alert alert-success" id = "showmsg1">
										<?php echo "Successfully Attendance Done";?></div><?php }
										if($checkval->num_rows() > 0)
										{
										?><div class="alert alert-danger">
										<?php echo "Teacher Attendance is Done for today";?></div><?php 
											
										}
									else{
									?>
									<div class="row space20">
										<div class="col-sm-4">
											<div class="form-group">
												<div class="col-sm-5">
												<label class="control-label">
													<strong>Teacher ID</strong><span class="symbol required"></span>
												</label>
												</div>
												<div class="col-sm-7">
												<input type="text" size= "20" class="form-control" id="teacherid" name="teacherid"  required="required" placeholder="Text Field">
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<div class="col-sm-5">
												<label class="control-label">
													<strong>Select Date</strong> <span class="symbol required"></span>
												</label>
												</div>
												<div class="col-sm-7">
												<input type="date"  class="form-control"  name = "date1" id= "radate" required="required" >
												</div>
											</div>
										</div>
										<br>
										<br>
										<br>
										<br>
										<br>
										
										
										<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample_2">
												<thead >
												<tr class = "success">
														<th>S.No.</th>
														<th>Teacher ID </th>
														<th> Teacher Name</th>
														<th> Mobile Number</th>
													
														<th> Attendance <input type="hidden" value="300001" name="tID" /></th>
														</tr>
																								
												</thead>
												<tbody >
												<?php $i = 1; 
												//$var = $this->input->post("request");
												foreach ($request as $row){	
													
										?><tr class = "warning">
											<td> <?php echo $i;?> </td>
											<td> <input type="hidden" name="empID<?php echo $i;?>" value="<?php echo $row->emp_no;?>" /> <?php echo $row->emp_no;?> </td>
														
														<td> <strong><?php echo $row->first_name." ".$row->mid_name;?></strong></td>
														
														<td><strong> <?php echo $row->mobile;?></strong></td>
														<td> <strong><div class="form-group">
														
														
															<label class="radio-inline">
																<input type="radio" class="grey" value="P" name="gender<?php echo $i; ?>" id="gender_female" checked="checked">
																p
															</label>
															<label class="radio-inline">
																<input type="radio" class="grey" value="A" name="gender<?php echo $i; ?>"  id="gender_male">
																A
															</label>
															<label class="radio-inline">
																<input type="radio" class="grey" value="L" name="gender<?php echo $i; ?>"  id="gender_male">
																L
															</label>
													
														</div></strong></td>	
													</tr><?php 
												$i++;}
				 	?>								
				 								</tbody>
											</table>
											<div class="col-sm-2">
													<input type="hidden" value="<?php echo $i; ?>" name="rows" />
															<button class="btn btn-blue next-step btn-block">
															Submit <i class="fa fa-arrow-circle-right"></i>
															</button>
											</div>
										</div>
									</div>
								</div>
							</div>
					</div>
				</div>
				<?php }?>
	</form>
					
						<!-- end: PAGE CONTENT-->
				