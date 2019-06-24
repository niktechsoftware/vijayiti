<div class="row">
	<div class="col-sm-12">
		
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
				<li<?php if(strlen($this->uri->segment(4)) <= 0){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_overview">
						Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Salary Report'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#salary_report">
						Salary Details
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Attendance'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#attendance_report">
						Attendance
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Print Profile'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#print_report">
						print Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Purchase Report'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#Purchase_report">
						Purchase Report
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="panel_overview" class="tab-pane fade <?php if(strlen($this->uri->segment(4)) <= 0){ echo "in active";}?>">
					<div class="row">
						<div class="col-sm-5 col-md-4">
							<div class="user-left">
								<div class="center">
									<h4><?php echo $teacherProfile->first_name." ".$teacherProfile->mid_name." ".$teacherProfile->last_name; ?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
											<?php if(strlen($teacherProfile->photo > 0)):?>
												<img alt="<?php echo $teacherProfile->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $teacherProfile->photo;?>" />
											<?php else:?>
												<?php if($teacherProfile->gender == 'Male'):?>
													<img alt="<?php echo $teacherProfile->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
												<?php endif;?>
												<?php if($teacherProfile->gender == 'Female'):?>
													<img alt="<?php echo $teacherProfile->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
												<?php endif;?>
											<?php endif;?>
										</div>
									</div>
								</div>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Job Category</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Category</td>
											<td>
												<?php if(strlen($teacherProfile->job_category) > 1) {echo $teacherProfile->job_category; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Joining Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($teacherProfile->join_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Job Title</td>
											<td>
												<?php echo $teacherProfile->job_title; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $teacherProfile->emp_no; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Password</td>
											<td>
												<?php echo $teacherProfile->password; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-sm-6 col-md-8">
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Personal Information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Teacher ID</td>
											<td>
												<?php echo $teacherProfile->emp_no; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Full Name</td>
											<td>
												<?php echo $teacherProfile->first_name." ".$teacherProfile->mid_name." ".$teacherProfile->last_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Date Of Birth</td>
											<td>
												<?php echo date("d-M-Y", strtotime($teacherProfile->dob)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td>
												<?php echo $teacherProfile->gender; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										
										<tr>
											<td>Nationality</td>
											<td>
												<?php echo  "Indian"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										
										<tr>
											<td>Category</td>
											<td>
												<?php if(strlen($teacherProfile->category) > 1) {echo $teacherProfile->category; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									
									</tbody>
								</table>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Contact information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Address</td>
											<td>
												<?php echo $teacherProfile->address1." ".$teacherProfile->address2; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $teacherProfile->city." / ".$teacherProfile->state." / ".$teacherProfile->pin_code; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $teacherProfile->country; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($teacherProfile->phone) <= 0){ echo "N/A"; }else{ echo $teacherProfile->phone; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Cell-Number</td>
											<td>
												<?php echo $teacherProfile->mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>E-Mail</td>
											<td>
												<?php if(strlen($teacherProfile->email) <= 0){ echo "N/A"; }else{ echo $teacherProfile->email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
								
						</div>
					</div>
				</div>
<!-- ---------------------------------------------------------------------------------------------------------------------- -->	
				<div id="attendance_report" class='tab-pane fade <?php if($this->uri->segment(4) == 'Attendance'){ echo "in active";}?>'>
					<div class="panel-body">
							<div class="col-sm-12">
									<div class="form-group col-sm-6">
										<label class="col-sm-3 control-label" for="form-field-20">
											Start Date<span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="sdate" name="startdate" class="form-control date-picker">
										</div>
									</div><?php $stu_id =$this->uri->segment(3);?>
									<input type = "hidden" value = "<?php echo $stu_id;?>" name = "stuid" id = "stuid"/>
									<div class="form-group col-sm-6">
										<label class="col-sm-3 control-label" for="form-field-20">
											End Date<span class="symbol required"></span>
										</label>
										<div class="col-sm-9">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="edate1" name="enddate" class="form-control date-picker">
										</div>
									</div>
							</div>
							<div class="table-responsive" id="rahul12">
							</div>
				</div>
			</div>
				<div id="salary_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Salary Report'){ echo "in active";}?>">
					<div class="panel-body">
						<div class="row">
								<div class="col-md-12">
						<!-- start: RESPONSIVE TABLE PANEL -->
						<div class="panel panel-white">
										<div class="panel-body">
											<div class="form-group">
											<div class="col-sm-12">		
										<br/><br/>
										<?php $emp_id = $this->session->userdata("username");
		$var = $this->db->query("select * from emp_salary_info where  emp_id ='$emp_id' GROUP BY till_date DESC");?>
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
												<th class="center">is_advance</th>
												<th class="center">pay_month</th>
												<th class="center">till_date</th>
												<th class="center">monthNo</th>
												
											</tr>
										</thead>
									<tbody >
									<?php 	$i=1; 
									foreach ($var->result() as $v):?>
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
										
										</div>
									</div>	
	   </div>
      </div><!-- end: panel Body -->
    </div><!-- end: panel panel-white -->
   </div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
</div>
</div>
</div>
				<div id="print_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Print Profile'){ echo "in active";}?>">
					<div class="panel-body">
						<h1>print Report</h1>
					</div>
				</div>
				<div id="Purchase_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Purchase Report'){ echo "in active";}?>">
					<div class="panel-body">
					<?php 	 $this->db->where("valid_id",$emp_id);
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
		
	</div>
	</div>
