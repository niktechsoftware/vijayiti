<?php 
$this->db->select("finance_start_date as fsd");
$fsd = $this->db->get("general_settings")->row()->fsd;
?>
				<div class="row">
					<div class="col-sm-12">
						<div class="panel panel-white">
							<div class="panel-heading panel-blue border-light">
								<h4 class="panel-title">Employee <span class="text-bold">List</span></h4>
							</div>
							<div class="panel-body">
								<div class="panel-scroll height-250">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th style="width: 5%;">SNo.</th>
												<th style="width: 10%;">Emp. ID.</th>
												<th style="width: 10%;">Name</th>
												<th style="width: 15%;">Configue Status</th>
												<th style="width: 60%;">Paid Status</th>
											</tr>
										</thead>
										<tbody id="classDetail">
											<?php $j = 1; ?>
											<?php if(isset($empList)):?>
											<?php foreach($empList as $row):?>
											<tr>
												<td>
													<?php echo $j;?>
												</td>
												<td>
													<?php echo $row->emp_no;?>
													<input type="hidden" id="id<?php echo $j;?>" value="<?php echo $row->emp_no;?>">
												</td>
												<td>
												
													<button class="btn btn-blue btn-sm" id="classSave<?php echo $j;?>" value="<?php echo $row->first_name." ".$row->mid_name." ".$row->last_name;?>">
							                    		<?php echo $row->first_name." ".$row->mid_name." ".$row->last_name;?>
							                    	</button>
												</td>
												<td>
													<?php 
														$this->load->model("employeeModel");
														$qres = $this->employeeModel->getSalaryDetail($row->emp_no);
														
														if($qres->num_rows()>0)
														{
															echo "<b style='color:green;'>Configured</b>";
														}
														else
														{
															echo "<b style='color:red;'>Not Configured</b>";
														}
													?>
												</td>
												<td>
												<?php 
												$this->db->select("SUM(monthNo) as month");
												$this->db->where("emp_id",$row->emp_no);
												$a = $this->db->get("emp_salary_info");
												if($a->num_rows() > 0):
												$month = $a->row()->month;
												else:
												$month = 0;
												endif;
							                         $color = array(
							                             "partition-purple",
							                             "progress-partition-green",
							                             "progress-bar-warning",
							                             "progress-bar-success",
							                             "progress-partition-green",
							                             "partition-azure",
							                             "partition-orange",
							                             "progress-bar-success",
							                             "partition-blue",
							                             "progress-bar-danger",
							                             "progress-bar-danger",
							                             "partition-purple",
							                         );
							                    ?>
								                    <div class="progress">
								                       	<input type="hidden" name="fsd" value="<?php echo $fsd; ?>" />
								                        <input type="hidden" name="month" value="<?php echo $month; ?>" />
								                        <?php for($i =0 ; $i<=$month-1; $i++):?>
								                        <div class="progress-bar <?php echo $color[$i];?>" style="width: 8.33%">
								                        	<?php echo date("M-y",strtotime("$fsd + $i month"));?>
								                        </div>
								                        <?php endfor; ?>
								                    </div>
												</td>
											</tr>
											<?php $j++; ?>
											<?php endforeach; ?>
											<?php endif; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
					<!-- end: INLINE TABS PANEL -->
<div class="row">
	<div class="col-md-12"  id="givenDetail">
		
	</div>
</div>

<!-- end: PAGE CONTENT-->