<div class="row">
	<div class="col-md-12">
		<!-- start: EXPORT DATA TABLE PANEL  -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Day <span class="text-bold">Book</span> Report</h4>
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
										
				<?php $dt1=date("d-m-Y",strtotime($dt1));?>
				<?php $dt2=date("d-m-Y",strtotime($dt2));?>
				<div class = "center"><strong><h2 style="color: green"> Record From Date <?php echo $dt1;?> to <?php echo $dt2;?></h2></strong></div>
				<div class="table-responsive">
											<table class="table table-striped table-hover" id="sample-table-2">
				
				<?php if($condition=="Credit"){?>
					<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
		                	<tr>
		                    	<th>#</th>
		                    	<th>Paid To ID</th>
		                    	<th>Paid To Name</th>
		                        <th style="width:250px;">Reason</th>
		                        <th>Credit</th>
		                        <th>Closing Balance</th>
		                        <th>Pay Mode</th>
		                         <th>Pay Date</th>
		                    </tr>
		                </thead>
						<tbody>
		                <?php $sno = 1; while($row = mysql_fetch_object($a)){ 
		                	$dr_cr = $row->dabit_cradit; 
		                	if($dr_cr=="Credit"){?>
		                	<tr>
		                    	<td><?php echo $sno; ?></td>
		                        <td><?php echo $row->paid_to; ?></td>
		                       <?php $id = $this->db->query("SELECT name From student_info where enroll_num ='$row->paid_to'")->row();?>
		                       <td><?php if($id){ echo $id->name; }else{
		                       $eid = $this->db->query("SELECT first_name,mid_name,last_name From employee_info where emp_no ='$row->paid_to'")->row();
								if($eid){echo $eid->first_name." ".$eid->mid_name." ".$eid->last_name; } else {echo "Other";} 
		                       }?></td>
		                        <td><?php echo $row->reason; ?></td>
		                        <td style="color:green"><?php if($dr_cr == 'Cradit' || $dr_cr == 'Credit'){ $cradit = $cradit + $row->amount; echo $row->amount; } ?></td>
		                        <td><?php echo $row->closing_balance; ?></td>
		                          <td><?php echo $row->pay_mode; ?></td>
		                        <td><?php echo $row->pay_date; ?></td>
		                    </tr>
		                <?php $sno++; }} ?>
		                	<tr>
		                    	<td>----</td>
		                        <td>----------</td>
		                        <td align="right"><strong>Total</strong></td>
		                        <td><?php echo $cradit; ?></td>
		                        <td>----------</td>
		                        <td>----------</td>
		                        <td>----------</td>
		                    </tr>
		                </tbody>
					</table>
					<?php }else{
						if($condition=="Debit"){
					?>
						<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
						<tr>
						<th>#</th>
		                    	<th>Paid To</th>
		                    	<th>Paid To Name</th>
		                        <th style="width:250px;">Reason</th>
		                        <th>Debit</th>
		                        <th>Closing Balance</th>
		                        <th>Pay Mode</th>
		                        <th>Pay Date</th>
						</thead>
						<tbody>
						<?php $sno = 1; while($row = mysql_fetch_object($a)){
							$dr_cr = $row->dabit_cradit;
								                	if($dr_cr=="Debit"){?>
								                	<tr>
								                    	<td><?php echo $sno; ?></td>
								                        <td><?php echo $row->paid_to; ?></td>
								                         <?php $id = $this->db->query("SELECT name From student_info where enroll_num ='$row->paid_to'")->row();?>
		                       <td><?php if($id){ echo $id->name; }else{
		                       $eid = $this->db->query("SELECT first_name,mid_name,last_name From employee_info where emp_no ='$row->paid_to'")->row();
								if($eid){echo $eid->first_name." ".$eid->mid_name." ".$eid->last_name; } else {echo "Other";} 
		                       }?></td>
								                        <td><?php echo $row->reason; ?></td>
								                        <td style="color:red"><?php if($dr_cr == 'Dabit' || $dr_cr == 'Debit'){ $dabit = $dabit + $row->amount; echo $row->amount; } ?></td>
								                        <td><?php echo $row->closing_balance; ?></td>
								                        <td><?php echo $row->pay_mode; ?></td>
								                         <td><?php echo $row->pay_date; ?></td>
								                    </tr>
								                <?php $sno++; }} ?>
								                	<tr>
								                    	<td>----</td>
								                        <td>----------</td>
								                        <td align="right"><strong>Total</strong></td>
								                        <td><?php echo $dabit; ?></td>
								                       
								                        <td>----------</td>
								                        <td>----------</td>
								                        <td>----------</td>
								                    </tr>
								                </tbody>
											</table>
					<?php }else{?>
						<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
						<tr>
						<th>#</th>
						<th>Paid To</th>
						<th>Paid To Name</th>
						<th style="width:250px;">Reason</th>
						<th>Debit</th>
						<th>Credit</th>
						<th>Closing Balance</th>
						<th>Pay Mode</th>
						<th>Pay Date</th>
						</tr>
						</thead>
						<tbody>
								                <?php $sno = 1; while($row = mysql_fetch_object($a)){ $dr_cr = $row->dabit_cradit; ?>
								                	<tr>
								                    	<td><?php echo $sno; ?></td>
								                        <td><?php echo $row->paid_to; ?></td>
								                         <?php $id = $this->db->query("SELECT name From student_info where enroll_num ='$row->paid_to'")->row();?>
		                       <td><?php if($id){ echo $id->name; }else{
		                       $eid = $this->db->query("SELECT first_name,mid_name,last_name From employee_info where emp_no ='$row->paid_to'")->row();
								if($eid){echo $eid->first_name." ".$eid->mid_name." ".$eid->last_name; } else {echo "Other";} 
		                       }?></td>
								                        <td><?php echo $row->reason; ?></td>
								                        <td style="color:red"><?php if($dr_cr == 'Dabit' || $dr_cr == 'Debit'){ $dabit = $dabit + $row->amount; echo $row->amount; } ?></td>
								                        <td style="color:green"><?php if($dr_cr == 'Cradit' || $dr_cr == 'Credit'){ $cradit = $cradit + $row->amount; echo $row->amount; } ?></td>
								                       
								                        <td><?php echo $row->closing_balance; ?></td>
								                        <td><?php echo $row->pay_mode; ?></td>
								                         <td><?php echo $row->pay_date; ?></td>
								                    </tr>
								                <?php $sno++; } ?>
								                	<tr>
								                    	<td>----</td>
								                        <td>----------</td>
								                        <td align="right"><strong>Total</strong></td>
								                        <td><?php echo $dabit; ?></td>
								                        <td><?php echo $cradit; ?></td>
								                        <td>----------</td>
								                        <td>----------</td>
								                        <td>----------</td>
								                    </tr>
								                </tbody>
											</table>
					<?php }
					}	
					?>
				</div>
			</div>
		</div>
	</div>
</div>