<div class="container">
	<form action="<?php echo base_url(); ?>index.php/newAdmissionControllers/addinfo" method="post" id="form">
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
						<div class="col-md-12">
							<div class="row">
							<div class="successHandler alert alert-success ">
							Enrollment Number is Unique Field filled by the Administrator and should not used  / ,$ , % ,!  and other special character.
							</div>
							</div>
						</div>	
						<div class="col-md-12">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Enrollment Number <span class="symbol"></span>
										</label>
										<input type="text" class="form-control" id="enroll_number" name="enroll_number" disabled="disabled">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Full Name <span class="symbol required"></span>
										</label>
										<input type="text"  class="form-control" id="name" name="name">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Date Of Birth <span class="symbol required">(yyyy-mm-dd)</span>
										</label>
										<input type="date"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dob" id="dob" class="form-control date-picker">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Gender  <span class="symbol required"></span>
										</label>
										<div>
											<label class="radio-inline">
												<input type="radio" class="grey" value="Female" name="gender" id="gender_female" >
												Female
											</label>
											<label class="radio-inline">
												<input type="radio" class="grey" value="Male" name="gender"  id="gender_male">
												Male
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Category <span class="symbol"></span>
										</label>
										<select class="form-control" id="category" name="category" >
											<option value="N/A"></option>
											<option value="GEN">GEN</option>
											<option value="OBC">OBC</option>
											<option value="SC">SC</option>
											<option value="ST">ST</option>
										</select>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Religion <span class="symbol"></span>
										</label>
										<input type="text"  class="form-control" id="religion" name="religion" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Address Line 1 <span class="symbol required"></span>
										</label>
										<input type="text"  class="form-control" id="addLine1" name="addLine1" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Address Line 2 <span class="symbol"></span>
										</label>
										<input type="text" class="form-control" id="addLine2" name="addLine2" />
									</div>
								</div>
							</div>
							<div class="row">
								
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											City <span class="symbol required"></span>
										</label>
										<input type="text"  class="form-control" id="city" name="city" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											State <span class="symbol required"></span>
										</label>
										<input type="text"  class="form-control" id="state" name="state">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Pin Code <span class="symbol required"></span>
										</label>
										<input type="text"  class="form-control" id="pinCode" name="pinCode">
									</div>
								</div>
									<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Country <span class="symbol"></span>
										</label>
										<input type="text"  value="India" class="form-control" id="country" name="country">
									</div>
								</div>
							</div>
							<div class="row">
							
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Mobile Number <span class="symbol required"></span>
										</label>
										<input type="text" class="form-control" id="mobileNumber" name="mobileNumber">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											E-mail Address <span class="symbol"></span>
										</label>
										<input type="email" class="form-control" id="email" name="emailAddress">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Mother Name <span class="symbol"></span>
										</label>
										<input type="text" class="form-control" id="mother_name" name="mother_name">
									</div>
								</div>
							</div>
							<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Father Name <span class="symbol required"></span>
											</label>
											<input type="text"  class="form-control" id="fatherName" name="fatherName" />
										</div>
									</div>
									<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">
													Father's Mobile Number <span class="symbol required"></span>
													<input type="checkbox" id="sameMobile" /> if same.
												</label>
												<input type="text"  class="form-control" id="fatherMobileNumber" name="fatherMobileNumber" />
											</div>
										</div>
										<div class="col-md-3">
											<div class="form-group">
												<label class="control-label">
													Password <span class="symbol required"></span>
												</label>
												<input type="password"  class="form-control" id="password" name="password" />
											</div>
										</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Confirm Password <span class="symbol required"></span>
											</label>
											<input type="password"  class="form-control" id="password_again" name="password_again" />
										</div>
									</div>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-yellow">
					<h4 class="panel-title">School  <span class="text-bold">Information</span></h4>
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
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												 Admission Date<span class="symbol required">(yyyy-mm-dd)</span>
											</label>
											<input type="date"  data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="dateOfAdmission" id="doa" class="form-control date-picker">
										</div>
									</div>
									
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Unit <span class="symbol required"></span>
											</label>
											<select class="form-control" id="section12" name="section">
											<option> Select Unit</option>
											<option value="1st">1st</option>
											<option value="2nd"> 2nd</option>
											

											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Trade <span class="symbol required"></span>
											</label>
											<select class="form-control" id="stream" name="stream">
												<option> Select Trade</option>
												<?php
												$sub = $this->db->query("SELECT DISTINCT stream FROM stream")->result();
												foreach($sub as $row):
												echo '<option value="'.$row->stream.'">'.$row->stream.'</option>';
												endforeach;
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="row" id="sub1234"></div>
								<br/>
								<h4 class="panel-title panel-yellow">Previous Qualification/class Detail....</h4>
								<div class="row">
									<div class="col-md-12">
										<table class="table">
											<thead><tr>
												<th>Qualification</th>
												<th>Board/University/School</th>
												
												<th>Passing Year</th>
												<th>Division</th>
												<th>Marks %</th>
												<th>Subject</th></tr>
											</thead>
											<tbody><tr>
												<td><input type="text" class="form-control" id="pClass" name="qualification" /></td>
												<td><input type="text" class="form-control" id="pSchool" name="board_uni_school" /></td>
												<td><input type="text" class="form-control" id="pYear" name="pass_year" /></td>
												<td><input type="text" class="form-control" id="pRoll" name="dividion" /></td>
												<td><input type="text" class="form-control" id="pMarks" name="marks" /></td>
												<td><input type="text" class="form-control" id="pPercentage" name="subject" /></td>
											</tr></tbody>
										</table>
									</div>
								</div>
							</div>
							
	<!-- --------------------------------------------------------------------------------------------------------------------- -->
							
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
							<div class="col-md-7">
								<p>
									By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
								</p>
							</div>
							<div class="col-md-3">
								<input type="submit" value="Register" class="btn btn-yellow btn-block"/>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	</form>
</div>