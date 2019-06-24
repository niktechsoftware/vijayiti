						<div class="row">
							<div class="col-sm-12">
								<!-- start: FORM WIZARD PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading panel-blue">
										<h4 class="panel-title">Employee  <span class="text-bold">Information</span></h4>
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
										</div>
									</div>
									<div class="panel-body">
										<?php $v=$this->session->userdata('username'); 	
										 $this->db->where("valid_id",$v);
								   				 $row = $this->db->get("sale_info"); ?>
								    		<table class="table table-striped table-hover" id="sample-table-2"> 
								    				<thead><tr>
								    				<th>S.no</th>
								    				<th>Item No.</th>
								    				<th>Purchase Date</th>
								    				<th>Balance</th>
								    				<th>total Paid</th>
								    				<th>Bill No.</th>
								    				</tr>
								    			</thead>
								    			<tbody>	
								    		<?php		$i=1; 	
								    		foreach($row->result() as $rows):?>
								
								    				<tr>
								    				<td> <?php echo $i;?> </td>
								    				<td> <?php echo $rows->item_no;?> </td>
								    				<td> <?php echo $rows->date;?> </td>
								    				<td> <?php echo $rows->balance;?> </td>
								    				<td> <?php echo $rows->paid;?> </td>
								    				<td> <?php echo $rows->bill_no;?> </td>
								    				</tr>
								    				<?php $i++; 
								    				endforeach; ?>
								    			</tbody>	
								    		</table>
										</div>
								</div>
							</div>
						</div>
								