
<div class="row">
	<div class="col-md-12">
		<!-- start: EXPORT DATA TABLE PANEL  -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<?php 
					$seg3 = $this->uri->segment(3);
					$seg4 = $this->uri->segment(4);
					if(($seg3 == "bank") && ($seg4 == "deposit")):
						echo '<h4 class="panel-title"><span class="text-bold">Bank</span> Deposit Detail</h4>';
					elseif(($seg3 == "bank") && ($seg4 == "withdrwal")):
						echo '<h4 class="panel-title"><span class="text-bold">Bank</span> Withdrwal Detail</h4>';
					elseif(($seg3 == "director") && ($seg4 == "deposit")):
						echo '<h4 class="panel-title">Deposit to <span class="text-bold">Director</span>  Detail</h4>';
					elseif(($seg3 == "director") && ($seg4 == "withdrwal")):
						echo '<h4 class="panel-title">Withdrwal to <span class="text-bold">Director</span>  Detail</h4>';
					endif;
				?>
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
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="sample-table-2">
					<?php 
					if(($seg3 == "bank") && ($seg4 == "deposit")):
					?>	
						<thead>
		                	<tr>
		                    	<th>#</th>
		                    	<th>Action</th>
		                        <th>Bank Name</th>
		                        <th>Account No</th>
		                        <th>Amount</th>
		                        <th>Date</th>
		                        <th>Transaction No.</th>
		                    </tr>
		                </thead>
						<tbody>
		                <?php 
		                $sno = 1;
		                	foreach($this->db->query("SELECT * FROM bank_transaction WHERE id_name='deposite'")->result() as $row):
		                	?>
		                	<tr>
		                    	<td><?php echo $sno; ?></td>
		                        <td><?php echo $row->id_name; ?></td>
		                        <td><?php echo $row->bank_name; ?></td>
		                        <td><?php echo $row->account_no; ?></td>
		                        <td><?php echo $row->amount; ?></td>
		                        <td><?php echo date("d-M-Y", strtotime($row->date)); ?></td>
		                        <td><?php echo $row->receipt_no; ?></td>
		                    </tr>
		                <?php $sno++; endforeach; ?>
		                </tbody>
					<?php
					elseif(($seg3 == "bank") && ($seg4 == "withdrwal")):
					?>
						<thead>
		                	<tr>
		                    	<th>#</th>
		                    	<th>Action</th>
		                        <th>Bank Name</th>
		                        <th>Account No</th>
		                        <th>Amount</th>
		                        <th>Date</th>
		                        <th>Transaction No.</th>
		                    </tr>
		                </thead>
						<tbody>
		                <?php 
		                $sno = 1;
		                	foreach($this->db->query("SELECT * FROM bank_transaction WHERE id_name='receive'")->result() as $row):
		                	?>
		                	<tr>
		                    	<td><?php echo $sno; ?></td>
		                        <td><?php echo $row->id_name; ?></td>
		                        <td><?php echo $row->bank_name; ?></td>
		                        <td><?php echo $row->account_no; ?></td>
		                        <td><?php echo $row->amount; ?></td>
		                        <td><?php echo date("d-M-Y", strtotime($row->date)); ?></td>
		                        <td><?php echo $row->receipt_no; ?></td>
		                    </tr>
		                <?php $sno++; endforeach; ?>
		                </tbody>
					<?php
					elseif(($seg3 == "director") && ($seg4 == "deposit")):
					?>
						<thead>
		                	<tr>
		                    	<th>#</th>
		                    	<th>Action</th>
		                        <th>Transaction Mode</th>
		                        <th>Dipositer/Receiver Name</th>
		                        <th>Amount</th>
		                        <th>Date</th>
		                        <th>Transaction No.</th>
		                    </tr>
		                </thead>
						<tbody>
		                <?php 
		                $sno = 1;
		                	foreach($this->db->query("SELECT * FROM director_transaction WHERE action='Diposited'")->result() as $row):
		                	?>
		                	<tr>
		                    	<td><?php echo $sno; ?></td>
		                        <td><?php echo $row->action; ?></td>
		                        <td><?php echo $row->transaction_mode; ?></td>
		                        <td><?php echo $row->applicant_name; ?></td>
		                        <td><?php echo $row->amount; ?></td>
		                        <td><?php echo date("d-M-Y", strtotime($row->date)); ?></td>
		                        <td><?php echo $row->receipt_no; ?></td>
		                    </tr>
		                <?php $sno++; endforeach; ?>
		                </tbody>
					<?php
					elseif(($seg3 == "director") && ($seg4 == "withdrwal")):
					?>
						<thead>
		                	<tr>
		                    	<th>#</th>
		                    	<th>Action</th>
		                        <th>Transaction Mode</th>
		                        <th>Dipositer/Receiver Name</th>
		                        <th>Amount</th>
		                        <th>Date</th>
		                        <th>Transaction No.</th>
		                    </tr>
		                </thead>
						<tbody>
		                <?php 
		                $sno = 1;
		                	foreach($this->db->query("SELECT * FROM director_transaction WHERE action='Receive'")->result() as $row):
		                	?>
		                	<tr>
		                    	<td><?php echo $sno; ?></td>
		                        <td><?php echo $row->action; ?></td>
		                        <td><?php echo $row->transaction_mode; ?></td>
		                        <td><?php echo $row->applicant_name; ?></td>
		                        <td><?php echo $row->amount; ?></td>
		                        <td><?php echo date("d-M-Y", strtotime($row->date)); ?></td>
		                        <td><?php echo $row->receipt_no; ?></td>
		                    </tr>
		                <?php $sno++; endforeach; ?>
		                </tbody>
					<?php
					endif;
					?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>