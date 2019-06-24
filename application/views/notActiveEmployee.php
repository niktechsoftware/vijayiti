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
											<div class="center"><strong>Not Active Employee List</strong></div>							
								<div class="table-responsive" style="width:100%; overflow-y: scroll;">
								
									<table class="table table-striped table-hover" id="sample-table-2">
										<thead>
											<tr>
												<th>SNo.</th>
												<th>Employee No.</th>
												<th>Employee Name</th>
												<th>Job Title</th>
												<th>Mobile Number</th>
												<th>View</th>
											</tr>
										</thead>
										<tbody><?php if($status){?>
										
											<?php $sno = 1; foreach ($status as $row): ?>
											
											<tr>
												<td><?php echo $sno; ?></td>
												<td><?php echo $row->emp_no; ?></td>
												<td><?php echo $row->first_name." ".$row->mid_name." ".$row->last_name; ?></td>
												<td><?php echo $row->job_title; ?></td>
												<td><?php echo $row->mobile; ?></td>
												<td><a href="<?php echo base_url(); ?>index.php/employeeController/employeeProfile/<?php echo $row->emp_no;?>">Full Profile</a></td>
											</tr><?php $sno++; endforeach; ?><?php 
								}else{
											?> <tr><td><?php echo "No record found......"?></td></tr>
											<?php }?>
											
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
			<script>
					TableExport.init();
			</script>