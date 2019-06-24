<script>
    function autoResize(id){
        var newheight;
        var newwidth;

        if(document.getElementById){
            newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
            newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
        }

        document.getElementById(id).height= (newheight) + "px";
        document.getElementById(id).width= (newwidth) + "px";
    }
</script>
<div class="row">
 
	<div class="col-sm-12">
	 <div class="padding-20 core-content">
         				<a href="<?php echo base_url(); ?>index.php/login/newAdmission">
                  <button class="btn btn-dark-purple">Take Another New Admission right now <i class="fa fa-arrow-circle-right"></i></button>
                    </a>
  </div>
		<?php 
			if(isset($studentProfile)):
				$personalInfo = $studentProfile->row();
			
		?>
		<div class="tabbable">
			<ul class="nav nav-tabs tab-padding tab-space-3 tab-blue" id="myTab4">
				<li<?php if(strlen($this->uri->segment(4)) <= 0){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_overview">
						Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'updateInfo'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#panel_edit_account">
						Edit Profile
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'certificate'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#certificates">
						Certificates
					</a>
				</li>
				<!--
				<li<?php if($this->uri->segment(4) == 'Subject'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#subject_area">
						Subject
					</a>
				</li>
				-->
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
									<h4><?php echo $personalInfo->name; ?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
											<?php if(strlen($personalInfo->stud_image > 0)):?>
												<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $personalInfo->photo;?>" />
											<?php else:?>
												<?php if($personalInfo->gender == 'Male'):?>
													<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
												<?php endif;?>
												<?php if($personalInfo->gender == 'Female'):?>
													<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
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
											<td>Enrollment No.</td>
											<td>
												<?php if(strlen($personalInfo->enroll_num) > 1) {echo $personalInfo->enroll_num; }else echo "N/A"; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Admission Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->admission_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>shift</td>
											<td>
												<?php echo $personalInfo->shift; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $personalInfo->enroll_num; ?>
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
												<?php echo $personalInfo->enroll_num; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Full Name</td>
											<td>
												<?php echo $personalInfo->name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Date Of Birth</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->dob)); ?>
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
										<tr>
											<td>Status</td>
											<td>
												<?php if(strlen($personalInfo->status) <= 0){ echo "N/A"; }else{ echo $personalInfo->status; } ?>
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
												<?php echo $personalInfo->father_full_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
									<tr>
											<td>MOther Name</td>
											<td>
												<?php echo $personalInfo->mother_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										
										
										
										<tr>
											<td>Father Cell-Number</td>
											<td>
												<?php echo $personalInfo->f_mobile; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										
									</tbody>
								</table>
						</div>
					</div>
				</div>
				<div id="panel_edit_account" class="tab-pane fade <?php if($this->uri->segment(4) == 'updateInfo'){ echo "in active";}?>">
						<div class="row">
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
												<?php if(strlen($personalInfo->stud_image > 0)):?>
													<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $personalInfo->photo;?>" />
												<?php else:?>
													<?php if($personalInfo->gender == 'Male'):?>
														<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuMale.png" />	
													<?php endif;?>
													<?php if($personalInfo->gender == 'Female'):?>
														<img alt="<?php echo $personalInfo->name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/stuFemale.png" />	
													<?php endif;?>
												<?php endif;?>
											</div>
										</div>
									</div>
									<div class="col-md-12 space20">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>index.php/studentController/updateStudentImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
				                                <input type="hidden" name="old_stuImg" value="<?php echo $personalInfo->stud_image; ?>">
				                                <input type="file" name="stuImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-red btn-sm pull-left" value="Upload Student Image">
				                            </form>
										</div>
									</div>
								</div>
							</div>
							
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<div style="width: 140px; height: 150px; border: 1px solid #ccc;">
												<?php if(strlen($personalInfo->stud_father > 0)):?>
													<img alt="<?php echo $personalInfo->stud_father;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/stuImage/<?php echo $personalInfo->stud_father;?>" />
												<?php else:?>
														<img alt="<?php echo $personalInfo->father_full_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empMale.png" />	
												<?php endif;?>
											</div>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>index.php/studentController/updateFatherImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
				                                <input type="hidden" name="old_f_image" value="<?php echo $personalInfo->stud_father; ?>">
				                                <input type="file" name="fatherImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-green btn-sm pull-left" value="Upload Father Image">
				                            </form>
										</div>
									</div>
								</div>
							</div>
							
											
						</div>
						
<!-- ------------------------------ Student Profile -------------------------------------------- -->
<form action="<?php echo base_url(); ?>index.php/studentController/updateStuInfo" method="post" id="form">
<div class="row">
	<div class="col-sm-12">
		<!-- start: FORM WIZARD PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading panel-yellow">
				<h4 class="panel-title">Student  <span class="text-bold">Information</span></h4>
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
			</div> <!-- End Heading panel -->
			<div class="panel-body">
			<!-- --------------------------------------------Test Form Start ---------------------------------------- -->
				<div class="row">
					<div class="col-md-12">
						<div class="errorHandler alert alert-danger no-display">
							<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
						</div>
						<div class="successHandler alert alert-success no-display">
							<i class="fa fa-ok"></i> Your form validation is successful!
						</div>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Student ID <span class="symbol required"></span>
									</label>
									<input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
									<input type="text" value="<?php echo $personalInfo->enroll_num; ?>" class="form-control" id="scholerNumber"  name="scholerNumber">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Student Name <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->name; ?>" class="form-control" id="firstName" name="firstName">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Mother Name <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->mother_name; ?>" class="form-control" id="middleName" name="middleName">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Father Name <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->father_full_name; ?>" class="form-control" id="fatherName" name="fatherName">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Date Of Birth <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->dob; ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dob" id="dob" class="form-control date-picker">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Date Of Admission <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->admission_date; ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dateOfAdmission" id="doa" class="form-control date-picker">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Trade Of Admission <span class="symbol required"></span>
									</label>
									<select class="form-control" id="classOfAdmission" name="classOfAdmission">
										<option value=""></option>
										<?php  
										$this->db->select("streem");
										$this->db->distinct();
										$className = $this->db->get("class_info");?>
											<?php foreach ($className->result() as $row):?>
										<option value="<?php echo $row->streem;?>" <?php if($row->streem == $personalInfo->trade): echo 'selected="selected"'; endif; ?> >
											<?php echo $row->streem;?>
										</option>
											<?php endforeach;?>
										
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Section <span class="symbol required"></span>
									</label>
									<select class="form-control" id="section" name="section">
										<option value=""></option>
										<?php 
										$this->db->select("section");
										$this->db->distinct();
										$sectionName = $this->db->get("class_info");?>
											<?php foreach ($sectionName->result() as $row):?>
										<option value="<?php echo $row->section;?>" <?php if($row->section == $personalInfo->unit): echo 'selected="selected"'; endif; ?> >
											<?php echo $row->section;?>
										</option>
											<?php endforeach;?>
									
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Gender  <span class="symbol required"></span>
									</label>
									<div>
										<label class="radio-inline">
											<input type="radio" class="grey" value="Female" <?php if("Female" == $personalInfo->gender): echo 'checked="checked"'; endif; ?> name="gender" id="gender_female" >
											Female
										</label>
										<label class="radio-inline">
											<input type="radio" class="grey" value="Male" <?php if("Male" == $personalInfo->gender): echo 'checked="checked"'; endif; ?> name="gender"  id="gender_male">
											Male
										</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								
								<div class="form-group">
									<label class="control-label">
										E-mail Address <span class="symbol"></span>
									</label>
									<input type="email" value="<?php echo $personalInfo->email; ?>" class="form-control" id="email" name="emailAddress">
								</div>
							
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12 text-bold">
												Status
											</label>
											<label class="radio-inline">
												<input type="radio" value="Active" name = "status" id="status" class="grey" <?php if ($personalInfo->status == "Active") { echo 'checked="checked"';	}?> >
												Active
											</label>
											<label class="radio-inline">
												<input type="radio" value="Inactive" name = "status" id="status1" class="grey" <?php if ($personalInfo->status == "Inactive") { echo 'checked="checked"';	}?> >
												Inactive
											</label>
										</div>
							</div>
							<div class="col-md-6">
							
							<div class="form-group">
											<label class="control-label col-md-12 text-bold">
												Father Cell-Number
											</label>
											<input type="text" value="<?php echo $personalInfo->f_mobile; ?>"  name="fmobile" id="doa" class="form-control">
										</div>
							
							
							
								
								
							</div>
						</div>
					
					</div>
					
<!-- --------------------------------------------------------------------------------------------------------------------- -->
					
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Category <span class="symbol"></span>
									</label>
									<select class="form-control" id="category" name="category" >
										<option value="N/A" <?php if("N/A" == $personalInfo->category): echo 'selected="selected"'; endif; ?>></option>
										<option value="GEN" <?php if("GEN" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>GEN</option>
										<option value="OBC" <?php if("OBC" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>OBC</option>
										<option value="SC" <?php if("SC" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>SC</option>
										<option value="ST" <?php if("ST" == $personalInfo->category): echo 'selected="selected"'; endif; ?>>ST</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Religion <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->religion; ?>" class="form-control" id="religion" name="religion" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Address Line 1 <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->address1; ?>" class="form-control" id="addLine1" name="addLine1" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Address Line 2 <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->address2; ?>" class="form-control" id="addLine2" name="addLine2" />
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										City <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->city; ?>" class="form-control" id="city" name="city" />
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										State <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->state; ?>" class="form-control" id="state" name="state">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Pin Code <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->pin_code; ?>" class="form-control" id="pinCode" name="pinCode">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Country <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->country; ?>" value="India" class="form-control" id="country" name="country">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Phone Number <span class="symbol"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->mobile; ?>" class="form-control" id="phonenumbar" name="phonenumbar">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										Mobile Number <span class="symbol required"></span>
									</label>
									<input type="text" value="<?php echo $personalInfo->mobile; ?>" class="form-control" id="mobileNumber" name="mobileNumber">
								</div>
							</div>
						</div>
						<div class="row">
							
							
						</div>
					</div>
						
							</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div>
								<span class="symbol required"></span>Required Fields
								<hr>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<p>
								By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
							</p>
						</div>
						<div class="col-md-4">
							<input type="submit" value="Update Gurdian Information" class="btn btn-blue btn-block"/>
						</div>
					</div>
			</div>
	
	
</div>
</form>
</div>					
					
<!-- ---------------------------------------------------------------------------------------------------------------------- -->	
				<div id="certificates" class="tab-pane fade <?php if($this->uri->segment(4) == 'certificate'){ echo "in active";}?>">
					<div class="panel-body">
						<ul id="Grid" class="list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->cast_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/cc.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/cc.png" class="img-responsive" alt=" Character Certificates ">
											<span class="thumb-info-title"> Character Certificates </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadCc" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
		                                <input type="hidden" name="old_cc" value="<?php echo $personalInfo->cast_certificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="cc" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-red btn-sm pull-left" value="Upload Character Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->cast_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/tc.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/tc.png" class="img-responsive" alt="Transfer Certificate">
											<span class="thumb-info-title"> Transfer Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadTc" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
		                                <input type="hidden" name="old_tc" value="<?php echo $personalInfo->cast_certificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="tc" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Transfer Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->cast_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->cast_certificate;?>" height="200" class="img-responsive" alt="Cast Certificate">
											<span class="thumb-info-title"> Cast Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/castCertificate.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/castCertificate.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Cast Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadCastCertificate" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
		                                <input type="hidden" name="old_castCertificate" value="<?php echo $personalInfo->cast_certificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="castCertificate" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-orange btn-sm pull-left" value="Upload Cast Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->income_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->income_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->income_certificate;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Domicile Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/domicileCertificate.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/domicileCertificate.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Domicile Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadDomicileCertificate" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
		                                <input type="hidden" name="old_domicileCertificate" value="<?php echo $personalInfo->income_certificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="domicileCertificate" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-success btn-sm pull-left" value="Upload Domicile Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->quali_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->quali_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/<?php echo $personalInfo->quali_certificate;?>" height="200" class="img-responsive" alt="">
											<span class="thumb-info-title"> Previous Marksheet </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/stuImage/previousMarkSheet.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/stuImage/previousMarkSheet.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Previous Marksheet </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/studentController/uploadPreviousMarkSheet" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->enroll_num; ?>">
		                                <input type="hidden" name="old_previousMarkSheet" value="<?php echo $personalInfo->quali_certificate; ?>">
		                                Only png,jpg File lessthen 1 MB.
		                                <input type="file" name="previousMarkSheet" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-dark-grey btn-sm pull-left" value="Upload Previous Certificates">
		                            </form>
								</div>
							</li>
							<li class="gap"></li>
							<!-- "gap" elements fill in the gaps in justified grid -->
						</ul>
					</div> <!-- End gallery div -->
				</div>
				
				<div id="salary_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Salary'){ echo "in active";}?>">
					<div class="panel-body">
						<h1>Salary Report</h1>
					</div>
				</div>
				
				
				<div id="attendance_report" class='tab-pane fade <?php if($this->uri->segment(4) == 'Attendance'){ echo "in active";}?>'>
					<div class="panel-body">
							<div class="col-sm-12">
									<div class="form-group col-sm-6">
										<label class="col-sm-5 control-label" for="form-field-20">
											Start Date (yyyy-mm-dd)<span class="symbol required"></span>
										</label>
										<div class="col-sm-7">
											<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" id="sdate" name="startdate" class="form-control date-picker">
										</div>
									</div><?php $stu_id =$this->uri->segment(3);?>
									<input type = "hidden" value = "<?php echo $stu_id;?>" name = "stuid" id = "stuid"/>
									<div class="form-group col-sm-6">
										<label class="col-sm-5 control-label" for="form-field-20">
											End Date (yyyy-mm-dd)<span class="symbol required"></span>
										</label>
										<div class="col-sm-7">
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
						<IFRAME SRC="<?php echo base_url(); ?>index.php/invoiceController/printProfile/<?php echo $stu_id; ?>" width="100%" height="200px" id="iframe1" style="border: 0px;" onLoad="autoResize('iframe1');"></iframe>
					</div>
				</div>
				<div id="Purchase_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Purchase Report'){ echo "in active";}?>">
					<div class="panel-body">
					</div>
				</div>
			</div>
		</div>
		<?php 
			endif;
		?>
	</div>
	</div>
	