								<div class="col-md-12">
									<!-- start: EXPORT DATA TABLE PANEL  -->
									<div class="panel panel-white">
										<div class="panel-heading panel-green">
											<h4 class="panel-title">List of all Students &amp; <span class="text-bold">Export Student Data List</span></h4>
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
												<div class="col-md-12 space20">
													<div class="btn-group pull-right">
															<a href="#" class="export-excel btn btn-green" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																	Export to Excel
															</a>
															<a href="#" class="export-pdf btn btn-green" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																	Save as PDF
															</a>
															<a href="#" class="export-txt btn btn-green" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as TXT
															</a>
															<a href="#" class="export-sql btn btn-green" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as SQL
															</a>
															<a href="#" class="export-doc btn btn-green" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Word
															</a>
													</div>
												</div>
											</div>									
								<div class="table-responsive" style="width:100%; overflow-y: scroll;">
									<table class="table table-striped table-hover" id="sample-table-2">
										<thead>
											<tr>
												<th>SNo.</th>
												
												<?php if(strlen($enroll_num) > 1):?>
												<th>Enrollment ID</th>
												<?php endif; ?>
												
												<?php if(strlen($name) > 1):?>
												<th>Full Name</th>
												<?php endif; ?>
												
												<?php if(strlen($unit) > 1):?>
												<th>Unit</th>
												<?php endif; ?>
												
												<?php if(strlen($address1) > 1):?>
												<th>Address</th>
												<?php endif; ?>
												
												<?php if(strlen($dob) > 1):?>
												<th>Date Of Birth</th>
												<?php endif; ?>
												
												<?php if(strlen($registration_no) > 1):?>
												<th>Registration</th>
												<?php endif; ?>
												
												<?php if(strlen($gender) > 1):?>
												<th>Gender</th>
												<?php endif; ?>
												
												<?php if(strlen($admission_date) > 1):?>
												<th>Admission Date</th>
												<?php endif; ?>
												
												<?php if(strlen($category) > 1):?>
												<th>Category</th>
												<?php endif; ?>
												
												<?php if(strlen($religion) > 1):?>
												<th>Religion</th>
												<?php endif; ?>
												
												
												<?php if(strlen($city) > 1):?>
												<th>City</th>
												<?php endif; ?>
												
												<?php if(strlen($state) > 1):?>
												<th>State</th>
												<?php endif; ?>
												
												<?php if(strlen($pin_code) > 1):?>
												<th>Pin Code</th>
												<?php endif; ?>
												
											
												<?php if(strlen($shift) > 1):?>
												<th>Shift</th>
												<?php endif; ?>
												
												<?php if(strlen($trade) > 1):?>
												<th>Trade</th>
												<?php endif; ?>
												
												<?php if(strlen($father_full_name) > 1):?>
												<th>Father Name</th>
												<?php endif; ?>
												
												<?php if(strlen($mother_name) > 1):?>
												<th>Mother Name</th>
												<?php endif; ?>
												
												<?php if(strlen($trade) > 1):?>
												<th>Trade</th>
												<?php endif; ?>
												
												
												
												<?php if(strlen($f_mobile) > 1):?>
												<th>Father Mobile</th>
												<?php endif; ?>
												
												<th>Settings</th>
											</tr>
										</thead>
										<tbody>
											<?php $sno = 1; foreach ($result->result() as $row): ?>
											<?php $stuId = $row->enroll_num; ?>
											<?php  ?>
											<tr>
												<td><?php echo $sno; ?></td>
												
												<?php if(strlen($enroll_num) > 1):?>
												<td><?php echo $row->enroll_num; ?></td>
												<?php endif; ?>
												
											
												<?php if(strlen($name) > 1):?>
												<td><?php echo $row->name; ?></td>
												<?php endif; ?>											
												
												<?php if(strlen($unit) > 1):?>
												<td><?php echo $row->unit; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($address1) > 1):?>
												<td><?php echo $row->address1; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($dob) > 1):?>
												<td><?php echo $row->dob; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($registration_no) > 1):?>
												<td><?php echo $row->registration_no; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($gender) > 1):?>
												<td><?php echo $row->gender; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($admission_date) > 1):?>
												<td><?php echo $row->admission_date; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($category) > 1):?>
												<td><?php echo $row->category; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($religion) > 1):?>
												<td><?php echo $row->religion; ?></td>
												<?php endif; ?>
												
												
												
												<?php if(strlen($city) > 1):?>
												<td><?php echo $row->city; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($state) > 1):?>
												<td><?php echo $row->state; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($pin_code) > 1):?>
												<td><?php echo $row->pin_code; ?></td>
												<?php endif; ?>
												
											
												
												<?php if(strlen($mobile) > 1):?>
												<td><?php echo $row->mobile; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($shift) > 1):?>
												<td><?php echo $row->shift; ?></td>
												<?php endif;  ?>
												
													<?php if(strlen($trade) > 1):?>
												<td><?php echo $row->trade; ?></td>
												<?php endif; ?>
												
												<?php if(strlen($father_full_name) > 1):?>
												<td><?php echo $row->father_full_name; ?></td>
												<?php endif;  ?>
												
												<?php if(strlen($mother_name) > 1):?>
												<td><?php echo $row->mother_name; ?></td>
												<?php endif;  ?>
												
											
											
												<?php if(strlen($f_mobile) > 1):?>
												<td><?php echo $row->f_mobile; ?></td>
												<?php endif;  ?>
												
												
												
												<td><a href="<?php echo base_url(); ?>index.php/studentController/admissionSuccess/<?php echo $row->enroll_num;?>">Full Profile</a></td>
											</tr>
											<?php $sno++; endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			<script>
					TableExport.init();
			</script>