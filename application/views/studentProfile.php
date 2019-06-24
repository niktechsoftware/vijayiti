<div class="row">
	<div class="col-sm-12">
		<?php 
			if(isset($studentProfile)):
				$personalInfo = $studentProfile->row();
				$gurdianInfo = $gurdianDetail->row();
		?>
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
				<li<?php if(strlen($this->uri->segment(4)) <= 0){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_overview">
						Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Fee Report'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#fee_report">
						Fee Report
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
									<h4><?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
											<?php if(strlen($personalInfo->photo > 0)):?>
												<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $personalInfo->photo;?>" />
											<?php else:?>
												<?php if($personalInfo->gender == 'Male'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
												<?php endif;?>
												<?php if($personalInfo->gender == 'Female'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
												<?php endif;?>
											<?php endif;?>
										</div>
									</div>
								</div>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">School information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Scholer No.</td>
											<td>
												<?php if(strlen($personalInfo->scholer_no) > 1) {echo $personalInfo->scholer_no; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Admission Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->adm_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Class</td>
											<td>
												<?php echo $personalInfo->class_id." - ".$personalInfo->section; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $personalInfo->student_id; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Password</td>
											<td>
												<?php echo $personalInfo->password; ?>
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
											<td>Student ID</td>
											<td>
												<?php echo $personalInfo->student_id; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Full Name</td>
											<td>
												<?php echo $personalInfo->first_name." ".$personalInfo->midd_name." ".$personalInfo->last_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Date Of Birth</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->date_ob)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Gender</td>
											<td>
												<?php echo $personalInfo->gender; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Blood Group</td>
											<td>
												<?php if(strlen($personalInfo->bloodgp) > 1) {echo $personalInfo->bloodgp; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Birth Place</td>
											<td>
												<?php if(strlen($personalInfo->birth_place) > 1) {echo $personalInfo->birth_place; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Nationality</td>
											<td>
												<?php if(strlen($personalInfo->nationality) > 1) {echo $personalInfo->nationality; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Tongue</td>
											<td>
												<?php if(strlen($personalInfo->mother_tongue) > 1) {echo $personalInfo->mother_tongue; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Category</td>
											<td>
												<?php if(strlen($personalInfo->category) > 1) {echo $personalInfo->category; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Religion</td>
											<td>
												<?php if(strlen($personalInfo->religion) > 1) {echo $personalInfo->religion; }else echo "N/A"; ?>
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
												<?php echo $personalInfo->address1." ".$personalInfo->address2; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $personalInfo->city." / ".$personalInfo->state." / ".$personalInfo->pin_code; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $personalInfo->country; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($personalInfo->phone) <= 0){ echo "N/A"; }else{ echo $personalInfo->phone; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Cell-Number</td>
											<td>
												<?php echo $personalInfo->mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>E-Mail</td>
											<td>
												<?php if(strlen($personalInfo->email) <= 0){ echo "N/A"; }else{ echo $personalInfo->email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									</tbody>
								</table>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Guardian information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Father Name</td>
											<td>
												<?php echo $gurdianInfo->father_full_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Name</td>
											<td>
												<?php echo $gurdianInfo->mother_full_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Caretaker Name</td>
											<td>
												<?php echo $gurdianInfo->caretaker_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Caretaker Relation</td>
											<td>
												<?php if(strlen($gurdianInfo->caretaker_relation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->caretaker_relation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Education</td>
											<td>
												<?php if(strlen($gurdianInfo->father_education) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->father_education; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Education</td>
											<td>
												<?php if(strlen($gurdianInfo->mother_education) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->mother_education; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Occupation</td>
											<td>
												<?php if(strlen($gurdianInfo->father_occupation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->father_occupation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Occupation</td>
											<td>
												<?php if(strlen($gurdianInfo->mother_occupation) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->mother_occupation; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Family Annual Income</td>
											<td>
												<?php if(strlen($gurdianInfo->family_annual_income) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->family_annual_income; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Address</td>
											<td>
												<?php echo $gurdianInfo->address; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $gurdianInfo->city." / ".$gurdianInfo->state." / ".$gurdianInfo->pin; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $gurdianInfo->country; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($gurdianInfo->phone) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->phone; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father Cell-Number</td>
											<td>
												<?php echo $gurdianInfo->f_mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother Cell-Number</td>
											<td>
												<?php if(strlen($gurdianInfo->m_mobile) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->m_mobile; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Father E-Mail</td>
											<td>
												<?php if(strlen($gurdianInfo->f_email) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->f_email; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Mother E-Mail</td>
											<td>
												<?php if(strlen($gurdianInfo->m_email) <= 0){ echo "N/A"; }else{ echo $gurdianInfo->m_email; } ?>
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
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="edate" name="enddate" class="form-control date-picker">
										</div>
									</div>
							</div>
							<div class="table-responsive" id="rahul">
							</div>
				</div>
			</div>
				<div id="fee_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Fee Report'){ echo "in active";}?>">
					<div class="panel-body">
						<div class="row">
								<div class="col-md-12">
						<!-- start: RESPONSIVE TABLE PANEL -->
						<div class="panel panel-white">
							
										<div class="panel-body">
											<div class="form-group">
												
											<div class="col-sm-12">				
												
										<br/><br/>
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					<th>Student Id</th>
					<th>Student Name</th>
					<th>Father Name</th>
					<th>Father Mobile</th>
					<td>Fee line</td>
					<th>Total Paid</th>
					<th>Total Due</th>
					<th>Full Detail</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			
			$this->db->select("finance_start_date as fsd");
			$fsd = $this->db->get("general_settings")->row()->fsd;
			    $color = array(
				    "progress-bar-danger",
				    "progress-bar-success",
				    "progress-bar-warning",
				    "progress-partition-green",
				    "partition-azure",
				    "partition-blue",
				    "partition-orange",
				    "partition-purple",
				    "progress-bar-danger",
				    "progress-bar-success",
				    "progress-partition-green",
				    "partition-purple"
			    );
			    $count = 1;
			    $v=$this->session->userdata('username');
			    $this->db->where("student_id", $v);
			    $rows = $this->db->get("guardian_info")->row();
			    $this->db->where("student_id",$v);
			    $stuname=$this->db->get("student_info")->row();
			    $total = $this->db->query("SELECT SUM(diposit_month) as totalMonth, SUM(paid) as totalPaid from fee_deposit WHERE student_id = '$v'")->row();
			    $lastfeeDate=$this->db->query("select till_diposit,current_balance from fee_deposit where student_id=$v GROUP BY diposit_date DESC limit 1")->row();
			    $currentDate=date("Y-m-d");
			   $lastfeeDate1= $lastfeeDate->till_diposit;
				$lastfeeMonth=date("m", strtotime($lastfeeDate1));
			    $currentMonth=date("m",strtotime($currentDate));
			if( $currentMonth<$lastfeeMonth)
			{$currentMonth=$currentMonth+12;}
			$remainingMonth = ($currentMonth+1) - ($lastfeeMonth);

			$singleStu = $this->db->query("SELECT * from fee_shedule WHERE student_id = '$v'")->row();
			 
			$fields1 = $this->db->list_fields('fee_shedule');
			$oneMonthFee=0;
			foreach($fields1 as $fields):
			if($fields != "id" && $fields != 'student_id')
			{
				$oneMonthFee=$oneMonthFee + $singleStu->$fields;
			}
			endforeach;
			$totRemaining= $remainingMonth*$oneMonthFee + $lastfeeDate->current_balance;
			?> 
				<tr>
		  			<td><?php echo $count;?></td>
		  			<td><?php echo $v;?>
		  			<td><?php echo $stuname->first_name.$stuname->midd_name.$stuname->last_name;?></td>
		  			<td><?php echo $rows->father_full_name;?></td>
		  			<td><?php echo $rows->f_mobile;?></td>
		  			<td>
						<?php $month = $total->totalMonth;?>
		                <?php for($i = 0; $i<=$month-1; $i++):?>
			               <span class="label label-success" style="line-height:20px;">
			               		<?php echo date("M-y",strtotime("$fsd + $i month"));?>
			               </span>
		                <?php endfor; ?>
					</td>
		  			<td><?php echo $total->totalPaid;?></td>
		  			<td><?php echo $totRemaining;?></td>
		  			<td>
						<a href="<?php echo base_url()?>index.php/feeControllers/fullDetail/<?php echo $stu_id;?>" target="_blank" class="btn btn-blue">
							View Detail
						</a>
		  			</td>
		  		</tr>
		  		<?php $count++; ?>
		  		
			</tbody>
		</table>
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
					<?php 	 $this->db->where("valid_id",$v);
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
		<?php 
			endif;
		?>
	</div>
	</div>
