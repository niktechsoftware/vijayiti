<div class="col-md-12">
											<div class="panel">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Student Fee Detail</h4>
												</div>
												<div class="panel-body panel-scroll height-450" >
												<table class="table table-bordered table-hover ">
												<thead>
												<tr>
												<th>S No.</th>
												<th>student_id</th>
												<th>total</th>
												<th>paid</th>
												<th>current_balance</th>
												<th>diposit_month</th>
												<th>diposit_date</th>
												<th>till_diposit</th>
												<th>Activity</th>
												</tr>
											</thead>
											<tbody>
												<?php $id = 0; ; $fsd = $this->db->get("general_settings")->row()->finance_start_date;?>
												<?php $fsd1 = date("Y-m-d", strtotime("$fsd + 1 month")); ?>
												<?php $v=1; foreach($request as $row):
												?><tr>
												<td><?php echo $v; $id=$row->student_id;?> </td>
													<td><?php echo $row->student_id;?></td>
													<td><?php echo $row->total;?></td>
													<td><?php echo $row->paid;?></td>
													<td><?php echo $row->current_balance;?></td>
													<td><?php echo $row->diposit_month;?></td>
													<td><?php echo $row->diposit_date;?></td>
													<td><?php echo $row->till_diposit;?></td>
													<td>
														<a href="<?php echo base_url()?>index.php/invoiceController/fee/<?php echo $row->invoice_no;?>/<?php echo $row->student_id;?>/<?php if($v == 1){echo "true"; } ?>" class="btn btn-blue">
															Print Slip
														</a>
															<?php if($this->session->userdata('login_type') == 'admin'){ ?>
														<a href="<?php echo base_url()?>index.php/feeControllers/deleteFee/<?php echo $row->invoice_no;?>/<?php echo $row->student_id;?>/<?php if($v == 1){echo "true"; } ?>" class="btn btn-warning">
															Delete Fee
														</a>
														<?php }?>
													</td>
												</tr>	<?php $v++; endforeach; ?>
												<?php $query1 = $this->db->query("SELECT * FROM feedue2 WHERE student_id='$id'")->result();
												foreach($query1 as $v1):?>
												<tr>
												<td><?php echo $v;?></td>
												<td><?php echo $row->student_id;?></td>
												<td><?php echo $v1->total_due;?></td>
																									<td><?php echo $v1->paid;?></td>
																									<td><?php echo $v1->remain;?></td>
																									<td>Due Fee</td>
																									<td><?php echo $v1->ddate;?></td>
																									<td>Due Fee</td>
																									<td>
														<a href="<?php echo base_url()?>index.php/invoiceController/printDueFee/<?php echo $v1->invoice_no;?>" class="btn btn-blue">
															Print Slip
														</a>
														<?php if($this->session->userdata('login_type') == 'admin'){ ?>
														<a href="<?php echo base_url()?>index.php/feeControllers/deleteFeedue2/<?php echo $v1->invoice_no;?>/<?php echo $v1->student_id;?>" class="btn btn-warning">
															Delete Fee
														</a>
														<?php }?>
													</td></tr>
												<?php endforeach;?>
													</tbody>
												</table>
												</div>
											</div>
										</div>
									