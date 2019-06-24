<div class="row">
	<div class="col-sm-12">
	 <div class="padding-20 core-content">
         				<a href="<?php echo base_url(); ?>index.php/login/addemployee">
                  <button class="btn btn-dark-purple">Add Another New Employee right now <i class="fa fa-arrow-circle-right"></i></button>
                    </a>
                    </div>
		<?php 
			if(isset($profile)):
				$personalInfo = $profile->row();
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
				<li<?php if($this->uri->segment(4) == 'Attendance'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#attendance_report">
						Attendance Report
					</a>
				</li>
				<li<?php if($this->uri->segment(4) == 'Salary'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#salary_report">
						Salary Report
					</a>
				</li>
			</ul>
			<div class="tab-content">
				<div id="panel_overview" class="tab-pane fade <?php if(strlen($this->uri->segment(4)) <= 0){ echo "in active";}?>">
					<div class="row">
						<div class="col-sm-5 col-md-4">
							<div class="user-left">
								<div class="center">
									<h4><?php echo $personalInfo->first_name." ".$personalInfo->mid_name." ".$personalInfo->last_name; ?></h4>
									<div class="fileupload fileupload-new" data-provides="fileupload">
										<div style="width: 140px; height: 150px; border: 1px solid #000;">
											<?php if(strlen($personalInfo->photo > 0)):?>
												<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/<?php echo $personalInfo->photo;?>" />
											<?php else:?>
												<?php if($personalInfo->gender == 'Male'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empMale.png" />	
												<?php endif;?>
												<?php if($personalInfo->gender == 'Female'):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empFemale.png" />	
												<?php endif;?>
											<?php endif;?>
										</div>
									</div>
								</div>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">Professional information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Join Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->join_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Job Category</td>
											<td>
												<?php echo $personalInfo->job_category; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Job Title</td>
											<td>
												<?php echo $personalInfo->job_title; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Qualification</td>
											<td>
												<?php echo $personalInfo->qualification; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Experiance</td>
											<td>
												<?php echo $personalInfo->experiance; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $personalInfo->username; ?>
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
											<td>Employee ID</td>
											<td>
												<?php $var=$personalInfo->emp_no;  echo $personalInfo->emp_no; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Full Name</td>
											<td>
												<?php echo $personalInfo->first_name." ".$personalInfo->mid_name." ".$personalInfo->last_name; ?>
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
												<?php echo $personalInfo->category; ?>
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
						</div>
					</div>
				</div>
				<div id="panel_edit_account" class="tab-pane fade <?php if($this->uri->segment(4) == 'updateInfo'){ echo "in active";}?>">
						<div class="row">
							<div class="col-md-12">
								<h3>Account Info</h3>
								<div id="streamList"></div>
								<hr>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												First Name
											</label>
											<input type="hidden" id="empId" value="<?php echo $personalInfo->emp_no; ?>"/>
											<input type="text" class="form-control" value="<?php echo $personalInfo->first_name;?>" id="firstname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Middle Name
											</label>
											<input type="text" value="<?php echo $personalInfo->mid_name;?>" class="form-control" id="midname">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Last Name
											</label>
											<input type="text" value="<?php echo $personalInfo->last_name;?>" class="form-control" id="lastname">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Date Of Birth
											</label>
											<input type="text" data-date-format="yyyy-mm-dd" id="dob" value="<?php echo $personalInfo->dob;?>" data-date-viewmode="years" class="form-control date-picker">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12 text-bold">
												Gender
											</label>
											<label class="radio-inline">
												<input type="radio" value="Male" id="gender" name ="gender" class="grey" <?php if ($personalInfo->gender == "Male") { echo 'checked="checked"';	}?> >
												Male
											</label>
											<label class="radio-inline">
												<input type="radio" value="Female" id="gender1" name ="gender" class="grey" <?php if ($personalInfo->gender == "Female") { echo 'checked="checked"';	}?> >
												Female
											</label>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Category
											</label>
											<input type="text" class="form-control" value="<?php echo $personalInfo->category;?>" id="category">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Job Title
											</label>
											<input type="text" value="<?php echo $personalInfo->job_title;?>" class="form-control" id="job_title">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Qualification
											</label>
											<input type="text" value="<?php echo $personalInfo->qualification;?>" class="form-control" id="qualification">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Experiance
											</label>
											<input type="text" value="<?php echo $personalInfo->experiance;?>" class="form-control" id="experiance">
										</div>
									</div>
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
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Address
											</label>
											<input type="text" value="<?php echo $personalInfo->address1;?>" class="form-control" id="address1">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Area
											</label>
											<input type="text" value="<?php echo $personalInfo->address2;?>" class="form-control" id="address2">
										</div>
									</div>
								</div>
							</div>
							
							
	<!--  ------------------------------------------------------------------------ -->
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<form method="post" action="<?php echo base_url(); ?>employeeController/uploadEmployeeImage" enctype="multipart/form-data">
				                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
				                                <input type="hidden" name="old_img" value="<?php echo $personalInfo->photo; ?>">
				                                <input type="file" name="empImage" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Image">
				                            </form>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div style="width: 140px; height: 150px; border: 1px solid #000;">
												<?php if(strlen($personalInfo->photo > 0)):?>
													<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/<?php echo $personalInfo->photo;?>" />
												<?php else:?>
													<?php if($personalInfo->gender == 'Male'):?>
														<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empMale.png" />	
													<?php endif;?>
													<?php if($personalInfo->gender == 'Female'):?>
														<img alt="<?php echo $personalInfo->first_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/empFemale.png" />	
													<?php endif;?>
												<?php endif;?>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												City
											</label>
											<input type="text" value="<?php echo $personalInfo->city;?>" class="form-control" id="city">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												State
											</label>
											<input type="text" value="<?php echo $personalInfo->state;?>" class="form-control" id="state">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Pin Code
											</label>
											<input type="text" value="<?php echo $personalInfo->pin_code;?>" class="form-control" id="pincode">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Country
											</label>
											<input type="text" value="<?php echo $personalInfo->country;?>" class="form-control" id="country">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Land Line
											</label>
											<input type="text" value="<?php echo $personalInfo->phone;?>" class="form-control" id="phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Mobile
											</label>
											<input type="text" value="<?php echo $personalInfo->mobile;?>" class="form-control" id="mobile">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Email
											</label>
											<input type="text" value="<?php echo $personalInfo->email;?>" class="form-control" id="email">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Password
											</label>
											<input type="text" value="<?php echo $personalInfo->password;?>" class="form-control" id="password">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<p>
									click for UPDATE Profile.
								</p>
							</div>
							<div class="col-md-4">
								<button class="btn btn-green btn-block" id="editProfile">
									Update <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
					</div>	
<!-- ---------------------------------------------------------------------------------------------------------------------- -->	
				<div id="certificates" class="tab-pane fade <?php if($this->uri->segment(4) == 'certificate'){ echo "in active";}?>">
					<div class="panel-body">
						<ul id="Grid" class="list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->qualification_img > 0)):?>
										<a href="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->qualification_img;?>">
											<img src="<?php echo base_url(); ?>assets/images/empImage/Zip-File.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Educational Certificates </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/Zip-File.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/Zip-File.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Educational Certificates </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/employeeController/uploadEmployeeCertificates" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
		                                <input type="hidden" name="old_rar" value="<?php echo $personalInfo->qualification_img; ?>">
		                                Only RAR File lessthen 1 MB.
		                                <input type="file" name="employeeCertificates" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Educational Certificates">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->noc_latter > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->noc_latter;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->noc_latter;?>" class="img-responsive" alt="">
											<span class="thumb-info-title"> noc latter </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/noc.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/noc.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> noc latter </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/employeeController/uploadEmployeeNoc" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
		                                <input type="hidden" name="old_img" value="<?php echo $personalInfo->noc_latter; ?>">
		                                <input type="file" name="empImage" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload NOC Latter">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->exprience_certificate > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->exprience_certificate;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->exprience_certificate;?>" class="img-responsive" alt="">
											<span class="thumb-info-title"> Experience Certificate </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/experience.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/experience.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Experience Certificate </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/employeeController/uploadEmployeeExperience" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
		                                <input type="hidden" name="old_img" value="<?php echo $personalInfo->photo; ?>">
		                                <input type="file" name="empImage" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Experience Certificate">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->living_id > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->living_id;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->living_id;?>" class="img-responsive" alt="">
											<span class="thumb-info-title"> Address Proof </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/address.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/address.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Address Proof </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/employeeController/uploadEmployeeAddress" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
		                                <input type="hidden" name="old_img" value="<?php echo $personalInfo->photo; ?>">
		                                <input type="file" name="empImage" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Address Proof">
		                            </form>
								</div>
							</li>
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->photo_id > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->photo_id;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/<?php echo $personalInfo->photo_id;?>" class="img-responsive" alt="">
											<span class="thumb-info-title"> Photo Id </span>
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/images/empImage/photo_id.png" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/images/empImage/photo_id.png" class="img-responsive" alt="">
											<span class="thumb-info-title"> Photo Id </span>
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/employeeController/uploadEmployeePhoto" enctype="multipart/form-data">
		                                <input type="hidden" name="c_id" value="<?php echo $personalInfo->emp_no; ?>">
		                                <input type="hidden" name="old_img" value="<?php echo $personalInfo->photo; ?>">
		                                <input type="file" name="empImage" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Photo Id">
		                            </form>
								</div>
							</li>
							<li class="gap"></li>
							<!-- "gap" elements fill in the gaps in justified grid -->
						</ul>
					</div> <!-- End gallery div -->
				</div>
				<div id="attendance_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Attendance'){ echo "in active";}?>">
					<div class="panel-body">
						<h1>Attendance Report</h1>
					</div>
				</div>
				<div id="salary_report" class="tab-pane fade <?php if($this->uri->segment(4) == 'Salary'){ echo "in active";}?>">
					<div class="panel-body">
						<h1>Salary Report</h1>
					</div>
					
					<div style="width:100%; height:400px; overflow-x: scroll; overflow-y: scroll;">
								<div class="table-responsive">
								<?php  	
									$this->db->where("emp_id",$personalInfo->emp_no);
									$var = $this->db->get("emp_salary_info");
									if($var->num_rows() > 0):
								?>
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
									<?php
									$i=1; 
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
										
											<div class="col-sm-2">
													<input type="hidden" value="<?php echo $i; ?>" name="rows" />
															
											</div>
									<?php else:?>
										<div class="alert alert-block alert-danger fade in">
											<button data-dismiss="alert" class="close" type="button">
												&times;
											</button>
											<h4 class="alert-heading"><i class="fa fa-times"></i> Sorry!</h4>
											<p>
												You have not configured the salary of this employee. Or there is no salary report avaliable in the database. If you want to give salary to this employee please click on salary button given bellow... Thank you
											</p>
											<br/>
											<p>
												<a href="<?php echo base_url()?>login/employeeSalary" class="btn btn-red">
													Salary
												</a>
											</p>
										</div>
									<?php endif;?>
										</div>
										</div>
									</div>
								</div>
				</div>
			</div>
		</div>
		<?php 
			endif;
		?>
	</div>
</div>