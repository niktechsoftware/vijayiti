	
						<div class="row">
							<div class="col-md-12">
								<!-- start: DYNAMIC TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title"> Employee<span class="text-bold">Ledgure Table</span></h4>
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
										<button class="btn btn-orange add-row">
											Add New <i class="fa fa-plus"></i>
										</button>
										<div class="btn-group pull-right">
											<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
												Export <i class="fa fa-angle-down"></i>
											</button>
											<ul class="dropdown-menu dropdown-light pull-right">
												<li>
													<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as PDF
													</a>
												</li>
												<li>
													<a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as PNG
													</a>
												</li>
												<li>
													<a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as CSV
													</a>
												</li>
												<li>
													<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as TXT
													</a>
												</li>
												<li>
													<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as XML
													</a>
												</li>
												<li>
													<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as SQL
													</a>
												</li>
												<li>
													<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Save as JSON
													</a>
												</li>
												<li>
													<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Export to Excel
													</a>
												</li>
												<li>
													<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Export to Word
													</a>
												</li>
												<li>
													<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">
														Export to PowerPoint
													</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<div style="width:100%; height:400px; overflow-x: scroll; overflow-y: scroll;">
										<div class="table-responsive">
											<table class="table table-striped table-hover table-bordered" id="sample-table-2">
										<thead>
											<tr>
												<th class="center">#</th>
												<th class="center">provide by</th>
												<th class="center">Mode</th>
												<th class="center">BS</th>
												<th class="center">DA</th>
												<th class="center">PF</th>
												<th class="center">ESI</th>
												<th class="center">MA</th>
												<th class="center">TA</th>
												<th class="center">HRA</th>
												<th class="center">SA</th>
												<th class="center">Sp.A</th>
												<th class="center">Encentieve</th>
												<th class="center">Bonus</th>
												<th class="center">gross_s</th>
												
												<th class="center">till_date</th>
												<th class="center">monthNo</th>
												
											</tr>
										</thead>
									<tbody >
									<?php 	$i=1; 
									foreach ($var as $v):?>
											<tr>
											<td><?php echo $i?>	</td>
											<td><?php echo $v->provide_by;?></td>
											<td><?php echo $v->pay_mode;?></td>
											<td><?php echo $v->basicSalary;?></td>
											<td><?php echo $v->dearnessAllowance;?></td>
											<td><?php echo $v->ProvidentFund;?></td>
											<td><?php echo $v->employeeStateInsurance;?></td>
											<td><?php echo $v->medicalAllowance;?></td>
											<td><?php echo $v->transportAllowance;?></td>
											<td><?php echo $v->houseRentAllowance;?></td>
											<td><?php echo $v->skillAllowance;?></td>
											<td><?php echo $v->spcialAllowance;?></td>
											<td><?php echo $v->encentieve;?></td>
											<td><?php echo $v->bonus;?></td>
											<td><?php echo $v->gross_s;?></td>
											
											<td><?php echo $v->till_date;?></td>
											<td><?php echo $v->monthNo;?></td>
											<?php $i++;
											endforeach; ?>
										</tbody>
									</table>
											<div class="col-sm-2">
													<input type="hidden" value="<?php echo $i; ?>" name="rows" />
															
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
					</div>
						<!-- end: PAGE CONTENT-->
				