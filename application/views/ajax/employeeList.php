<div class="col-md-12">
	<!-- start: EXPORT DATA TABLE PANEL  -->
	<div class="panel panel-white">
		<div class="panel-heading">
			<h4 class="panel-title">Employee <span class="text-bold">List</span> Table</h4>
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
			<div class="table-responsive" style="width : 100%; overflow-y: scroll;">
				<table class="table table-striped table-hover" id="sample-table-2">
					<thead>
						<tr>
							<th>SNo.</th>
							
							<?php if(strlen($emp_no) > 1):?>
							<th>Employee ID</th>
							<?php endif; ?>
							
							<?php if(strlen($name) > 1):?>
							<th>Full Name</th>
							<?php endif; ?>
							
							<?php if(strlen($job_title) > 1):?>
							<th>Job Title</th>
							<?php endif; ?>
							
							<?php if(strlen($mobile) > 1):?>
							<th>Mobile</th>
							<?php endif; ?>
							
							<?php if(strlen($address) > 1):?>
							<th>Address</th>
							<?php endif; ?>
							
							<?php if(strlen($email) > 1):?>
							<th>Email</th>
							<?php endif; ?>
							
							<?php if(strlen($category) > 1):?>
							<th>Category</th>
							<?php endif; ?>
							
							<?php if(strlen($dob) > 1):?>
							<th>Date Of Birth</th>
							<?php endif; ?>
							
							<?php if(strlen($job_category) > 1):?>
							<th>Job Category</th>
							<?php endif; ?>
							
							<?php if(strlen($qualification) > 1):?>
							<th>Qualification</th>
							<?php endif; ?>
							
							<?php if(strlen($experiance) > 1):?>
							<th>Experience</th>
							<?php endif; ?>
							
							<?php if(strlen($status) > 1):?>
							<th>Status</th>
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
							
							<?php if(strlen($phone) > 1):?>
							<th>Phone No.</th>
							<?php endif; ?>
							
							<?php if(strlen($join_date) > 1):?>
							<th>Joine Date</th>
							<?php endif; ?>
							
							<?php if(strlen($gender) > 1):?>
							<th>Gender</th>
							<?php endif; ?>
							
							
							<th>Settings</th>
						</tr>
					</thead>
					<tbody>
						<?php $sno = 1; foreach ($result->result() as $row): ?>
						<tr>
							<td><?php echo $sno; ?></td>
							
							<?php if(strlen($emp_no) > 1):?>
							<td><?php echo $row->emp_no; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($name) > 1):?>
							<td><?php echo $row->first_name." ".$row->last_name; ?></td>
							<?php endif; ?>											
							
							<?php if(strlen($job_title) > 1):?>
							<td><?php echo $row->job_title; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($mobile) > 1):?>
							<td><?php echo $row->mobile; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($address) > 1):?>
							<td><?php echo $row->address1." ".$row->address2; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($email) > 1):?>
							<td><?php echo $row->email; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($category) > 1):?>
							<td><?php echo $row->category; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($dob) > 1):?>
							<td><?php echo $row->dob; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($job_category) > 1):?>
							<td><?php echo $row->job_category; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($qualification) > 1):?>
							<td><?php echo $row->qualification; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($experiance) > 1):?>
							<td><?php echo $row->experiance; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($status) > 1):?>
							<td><?php echo $row->status; ?></td>
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
							
							<?php if(strlen($phone) > 1):?>
							<td><?php echo $row->phone; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($join_date) > 1):?>
							<td><?php echo $row->join_date; ?></td>
							<?php endif; ?>
							
							<?php if(strlen($gender) > 1):?>
							<td><?php echo $row->gender; ?></td>
							<?php endif;  ?>
							
							<td><a href="<?php echo base_url(); ?>index.php/employeeController/employeeProfile/<?php echo $row->emp_no;?>">Full Profile</a></td>
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