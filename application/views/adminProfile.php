<div class="row">
	<div class="col-sm-12">
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
				<li<?php if($this->uri->segment(4) == 'pass'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#pass">
						Change Password
					</a>
				</li>
				<!-- 
				<li<?php if($this->uri->segment(4) == 'logo'){ echo ' class="active"';}?>>
					<a data-toggle="tab" href="#logo">
						Change Favicon Icon
					</a>
				</li>
				-->
			</ul>
			<div class="tab-content">
				<div id="panel_overview" class="tab-pane fade <?php if(strlen($this->uri->segment(4)) <= 0){ echo "in active";}?>">
					<div class="row">
						<div class="col-sm-5 col-md-4">
							<div class="user-left">
								<div class="center">
									<h4><?php echo $personalInfo->your_school_name; ?></h4>
									<div class="fileupload fileupload-new center" data-provides="fileupload">
										<div style="width: 140px; border: 1px solid #CCC;">
											<?php if(strlen($personalInfo->logo > 0)):?>
												<img alt="<?php echo $personalInfo->your_school_name;?>" height="148" width="138" src="<?php echo base_url()?>assets/images/empImage/<?php echo $personalInfo->logo;?>" />
											<?php else:?>
												<img alt="<?php echo $personalInfo->your_school_name;?>" width="138" src="<?php echo base_url()?>assets/images/empImage/lo.png" />	
											<?php endif;?>
										</div>
									</div>
								</div>
								<table class="table table-condensed table-hover">
									<thead>
										<tr>
											<th colspan="3">School/College information</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Financial Year Start Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->finance_start_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Financial Year End Date</td>
											<td>
												<?php echo date("d-M-Y", strtotime($personalInfo->finance_end_date)); ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Principal_name</td>
											<td>
												<?php echo $personalInfo->principle_name; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Login ID</td>
											<td>
												<?php echo $personalInfo->admin_username; ?>
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
											<th colspan="3">School/College</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Your School Name</td>
											<td>
												<?php if(strlen($personalInfo->your_school_name) <= 0){ echo "N/A"; }else{ echo $personalInfo->your_school_name; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Attendance Type</td>
											<td>
												<?php if(strlen($personalInfo->attendance_type) <= 0){ echo "N/A"; }else{ echo $personalInfo->attendance_type; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Language</td>
											<td>
												<?php if(strlen($personalInfo->language) <= 0){ echo "N/A"; }else{ echo $personalInfo->language; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Wise Principal Name</td>
											<td>
												<?php if(strlen($personalInfo->wise_principle_name) <= 0){ echo "N/A"; }else{ echo $personalInfo->wise_principle_name; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Trusty Name 1</td>
											<td>
												<?php if(strlen($personalInfo->trusty_name_1) <= 0){ echo "N/A"; }else{ echo $personalInfo->trusty_name_1; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Trusty Name 2</td>
											<td>
												<?php if(strlen($personalInfo->trusty_name_2) <= 0){ echo "N/A"; }else{ echo $personalInfo->trusty_name_2; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Trusty Name 3</td>
											<td>
												<?php if(strlen($personalInfo->trusty_name_3) <= 0){ echo "N/A"; }else{ echo $personalInfo->trusty_name_3; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Trusty Name 4</td>
											<td>
												<?php if(strlen($personalInfo->trusty_name_4) <= 0){ echo "N/A"; }else{ echo $personalInfo->trusty_name_4; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>College Registration Number</td>
											<td>
												<?php if(strlen($personalInfo->collage_registration_number) <= 0){ echo "N/A"; }else{ echo $personalInfo->collage_registration_number; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Recognition Number</td>
											<td>
												<?php if(strlen($personalInfo->recognition_number) <= 0){ echo "N/A"; }else{ echo $personalInfo->recognition_number; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>School Code</td>
											<td>
												<?php if(strlen($personalInfo->school_code) <= 0){ echo "N/A"; }else{ echo $personalInfo->school_code; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Last Update</td>
											<td>
												<?php if(strlen($personalInfo->created) <= 0){ echo "N/A"; }else{ echo date("d-M-Y", strtotime($personalInfo->created)); } ?>
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
												<?php echo $personalInfo->address_1." ".$personalInfo->address_2; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>City / State / PIN</td>
											<td>
												<?php echo $personalInfo->city." / ".$personalInfo->state." / ".$personalInfo->pin; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Country</td>
											<td>
												<?php echo $personalInfo->nationality; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Land-line Number</td>
											<td>
												<?php if(strlen($personalInfo->phone_number) <= 0){ echo "N/A"; }else{ echo $personalInfo->phone_number; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>Cell-Number</td>
											<td>
												<?php echo $personalInfo->mobile_number; ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>FAX-Number</td>
											<td>
												<?php if(strlen($personalInfo->fax_number) <= 0){ echo "N/A"; }else{ echo $personalInfo->fax_number; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>E-Mail 1</td>
											<td>
												<?php if(strlen($personalInfo->email1) <= 0){ echo "N/A"; }else{ echo $personalInfo->email1; } ?>
											</td>
											<td><a href="#panel_edit_account" class="show-tab"><i class="fa fa-pencil edit-user-info"></i></a></td>
										</tr>
										<tr>
											<td>E-Mail 2</td>
											<td>
												<?php if(strlen($personalInfo->email2) <= 0){ echo "N/A"; }else{ echo $personalInfo->email2; } ?>
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
								<h3>Update Information</h3>
								<div id="adminProfileConfirm"></div>
								<hr>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Your School Name
											</label>
											<input type="text" class="form-control" value="<?php echo $personalInfo->your_school_name;?>" id="your_school_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Principal Name
											</label>
											<input type="text" class="form-control" value="<?php echo $personalInfo->principle_name;?>" id="principle_name">
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Language
											</label>
											<input type="text" value="<?php echo $personalInfo->language;?>" class="form-control" id="language">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Attendance Type
											</label>
											<input type="text" value="<?php echo $personalInfo->attendance_type;?>" class="form-control" id="attendance_type">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Finance Start Date (yyyy-mm-dd)
											</label>
											<input type="date" data-date-format="yyyy-mm-dd" id="finance_start_date" value="<?php echo $personalInfo->finance_start_date;?>" data-date-viewmode="years" class="form-control date-picker">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Financial Year End Date (yyyy-mm-dd)
											</label>
											<input type="date" data-date-format="yyyy-mm-dd" id="finance_end_date" value="<?php echo $personalInfo->finance_end_date;?>" data-date-viewmode="years" class="form-control date-picker">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Wise Principal Name
											</label>
											<input type="text" value="<?php echo $personalInfo->wise_principle_name;?>" class="form-control" id="wise_principle_name">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Trusty Name 1
											</label>
											<input type="text" value="<?php echo $personalInfo->trusty_name_1;?>" class="form-control" id="trusty_name_1">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Trusty Name 2
											</label>
											<input type="text" value="<?php echo $personalInfo->trusty_name_2;?>" class="form-control" id="trusty_name_2">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12 text-bold">
												Trusty Name 3
											</label>
											<input type="text" value="<?php echo $personalInfo->trusty_name_3;?>" class="form-control" id="trusty_name_3">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Trusty Name 4
											</label>
											<input type="text" value="<?php echo $personalInfo->trusty_name_4;?>" class="form-control" id="trusty_name_4">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												College Registration Number
											</label>
											<input type="text" value="<?php echo $personalInfo->collage_registration_number;?>" class="form-control" id="collage_registration_number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Recognition Number
											</label>
											<input type="text" value="<?php echo $personalInfo->recognition_number;?>" class="form-control" id="recognition_number">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												School Code
											</label>
											<input type="text" value="<?php echo $personalInfo->school_code;?>" class="form-control" id="school_code">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Address 1
											</label>
											<input type="text" value="<?php echo $personalInfo->address_1;?>" class="form-control" id="address_1">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Address 2
											</label>
											<input type="text" value="<?php echo $personalInfo->address_2;?>" class="form-control" id="address_2">
										</div>
									</div>
								</div>
							</div>
							
							
	<!--  ------------------------------------------------------------------------ -->
							
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<div style="width: 140px; height: 130px; border: 1px solid #000;">
												<?php if(strlen($personalInfo->ico_logo > 0)):?>
													<img alt="<?php echo $personalInfo->your_school_name;?>" height="128" width="138" src="<?php echo base_url()?>assets/images/empImage/<?php echo $personalInfo->ico_logo;?>" />
												<?php else:?>
													<img alt="<?php echo $personalInfo->your_school_name;?>" width="128" src="<?php echo base_url()?>assets/images/empImage/lo.png" />	
												<?php endif;?>
											</div>
										</div>
										<div class="form-group">
											<form method="post" action="<?php echo base_url()?>index.php/adminController/uploadAdminPicture" enctype="multipart/form-data">
												<input type="hidden" name="old_img" value="<?php echo $personalInfo->ico_logo;?>">
				                                <input type="file" name="logo" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Profile Picture">
				                            </form>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<div style="width: 140px; height: 130px; border: 1px solid #000;">
												<?php if(strlen($personalInfo->logo > 0)):?>
													<img alt="<?php echo $personalInfo->your_school_name;?>" height="128" width="138" src="<?php echo base_url()?>assets/images/empImage/<?php echo $personalInfo->logo;?>" />
												<?php else:?>
													<img alt="<?php echo $personalInfo->your_school_name;?>" width="138" src="<?php echo base_url()?>assets/images/empImage/lo.png" />	
												<?php endif;?>
											</div>
										</div>
										<div class="form-group">
											<form method="post" action="<?php echo base_url()?>index.php/adminController/uploadAdminlogo" enctype="multipart/form-data">
												<input type="hidden" name="old_img" value="<?php echo $personalInfo->logo;?>">
				                                <input type="file" name="logo" class="form-control input-sm" ><br/>
				                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload School Logo">
				                            </form>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">&nbsp;</div>
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
											<input type="text" value="<?php echo $personalInfo->pin;?>" class="form-control" id="pin">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Country
											</label>
											<input type="text" value="<?php echo $personalInfo->nationality;?>" class="form-control" id="nationality">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												Land Line
											</label>
											<input type="text" value="<?php echo $personalInfo->phone_number;?>" class="form-control" id="phone_number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												Mobile
											</label>
											<input type="text" value="<?php echo $personalInfo->mobile_number;?>" class="form-control" id="mobile_number">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												Fax Number
											</label>
											<input type="text" value="<?php echo $personalInfo->fax_number;?>" class="form-control" id="fax_number">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Email 1
											</label>
											<input type="text" value="<?php echo $personalInfo->email1;?>" class="form-control" id="email1">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label text-bold">
												Email 2
											</label>
											<input type="text" value="<?php echo $personalInfo->email2;?>" class="form-control" id="email2">
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
<!-- ---------------------------------------------------------------------------------------------------------------------- 	
				<div id="logo" class="tab-pane fade <?php if($this->uri->segment(4) == 'logo'){ echo "in active";}?>">
					<div class="panel-body">
						<ul id="Grid" class="list-unstyled">
							<li class="col-md-3 col-sm-6 col-xs-12">
								<div class="portfolio-item">
									<?php if(strlen($personalInfo->ico_logo > 0)):?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/<?php echo $personalInfo->ico_logo;?>" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/<?php echo $personalInfo->ico_logo;?>" width="100" class="img-responsive" alt="">
										</a>
									<?php else:?>
										<a class="thumb-info" href="<?php echo base_url(); ?>assets/favicon.ico" data-lightbox="gallery" data-title="Website">
											<img src="<?php echo base_url(); ?>assets/favicon.ico" width="100" class="img-responsive" alt="">
										</a>
									<?php endif;?>
								</div>
								<div class="form-group">
									<form method="post" action="<?php echo base_url()?>index.php/adminController/favicon" enctype="multipart/form-data">
		                               <input type="file" name="favicon" class="form-control input-sm" ><br/>
		                                <input id="submit" name="submit" type="submit" class="btn btn-primary btn-sm pull-left" value="Upload Favicon Icon">
		                            </form>
								</div>
							</li>
							<li class="gap"></li>
							
						</ul>
					</div> 
				</div>
				-->
				<div id="pass" class="tab-pane fade <?php if($this->uri->segment(4) == 'pass'){ echo "in active";}?>">
					<div class="panel-body">
						<h3>Change Login Password</h3>
						<div class="row">
							<div class="col-md-12" id="adminPasswordAlert"></div>
						</div>
						<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												Old Password
											</label>
											<input type="password" class="form-control" id="old_password">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												New Password
											</label>
											<input type="password" class="form-control" id="password">
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label text-bold">
												Confirm New Password
											</label>
											<input type="password" class="form-control" id="cPassword">
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-3">
										<button class="btn btn-green btn-block" id="changePassword">
											Change Password <i class="fa fa-arrow-circle-right"></i>
										</button>
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