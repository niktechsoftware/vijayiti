						<form action="<?php echo base_url();?>index.php/employeeController/addEmpInfo"  method ="post" role="form" class="form-horizontal" id="form">
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
										<div id="wizard" class="swMain">
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Job Title  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" value="<?php echo set_value('jobTitle'); ?>" class="form-control" id="jobTitle" name="jobTitle" required="required" />
													</div>
													<?php echo form_error('jobTitle'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
													Address <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="employeeAddLine1" name="employeeAddLine1" value="<?php echo set_value('employeeAddLine1'); ?>" required="required" />
													</div>
													<?php echo form_error('employeeAddLine1'); ?>
												</div>
											</div>
												
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Job Category  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="jobCategory" name="jobCategory" value="<?php echo set_value('jobCategory'); ?>" required="required">
															<option value="">-Category-</option>
															<option value="accountent">Accountent</option>
															<option value="employee">Employee</option>
															<option value="teacher">Teacher</option>
														</select>
													</div>
													<?php echo form_error('jobCategory'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														State  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="empState" name="empState" value="<?php echo set_value('empState'); ?>" required="required">
															<option value="">-State-</option>
															<?php foreach($state as $row):?>
															<option value="<?php echo $row->state; ?>"><?php echo $row->state; ?></option>
															<?php endforeach; ?>
														</select>
													</div>
													<?php echo form_error('empState'); ?>
												</div>
											</div>
												
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Fast Name  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empFirstName" name="empFirstName" value="<?php echo set_value('empFirstName'); ?>" required="required" >
													</div>
													<?php echo form_error('empFirstName'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														City  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="empCity" name="empCity" value="<?php echo set_value('empCity'); ?>" required="required">
														</select>
													</div>
													<?php echo form_error('empCity'); ?>
												</div>
											</div>
												
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Middle Name 
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empMiddleName" value="<?php echo set_value('empMiddleName'); ?>" name="empMiddleName" >
													</div>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Street/Area <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="area" name="employeeAddLine2" value="<?php echo set_value('employeeAddLine2'); ?>" required="required">
														</select>
													</div>
													<?php echo form_error('employeeAddLine2'); ?>
												</div>
											</div>
												
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Last Name  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empLastName" name="empLastName" value="<?php echo set_value('empLastName'); ?>" required="required" >
													</div>
													<?php echo form_error('empLastName'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Pin  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empPin" name="empPin" value="<?php echo set_value('empPin'); ?>" required="required" >
													</div>
													<?php echo form_error('empPin'); ?>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Date Of Birth  <span class="symbol required">(yyyy-mm-dd)</span>
													</label>
													<div class="col-sm-7">
														<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="empDob" value="<?php echo set_value('empDob'); ?>" class="form-control date-picker" required="required"/>
													</div>
													<?php echo form_error('empDob'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Country  
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empCountry" name="empCountry" value="India" value="<?php echo set_value('empCountry'); ?>" />
													</div>
												</div>
											</div>
												
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Gender <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<label class="radio-inline">
															<input type="radio" class="grey" value="Female" name="gender" value="<?php echo set_value('gender'); ?>" id="gender_female" required="required" >
															Female
														</label>
														<label class="radio-inline">
															<input type="radio" class="grey" value="Male" name="gender" value="<?php echo set_value('gender'); ?>"  id="gender_male" required="required">
															Male
														</label>
													</div>
													<?php echo form_error('gender'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Phone Number  
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empPhoneNumber" name="empPhoneNumber" value="<?php echo set_value('empPhoneNumber'); ?>" >
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Category 
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="empCategory" name="empCategory" style="width: 210px;">
															<option value="GEN">GEN</option>
															<option value="OBC">OBC</option>
															<option value="SC">SC</option>
															<option value="ST">ST</option>
															
														</select>
													</div>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
													Mobile Number  <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empmobileNumber" value="<?php echo set_value('empmobileNumber'); ?>" name="empmobileNumber" required="required" >
													</div>
												<?php echo form_error('empmobileNumber'); ?>
												</div>
											</div>
													
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Highest Qualification  
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empQualification" name="empQualification" value="<?php echo set_value('empQualification'); ?>" >
													</div>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Experience (Years) <span class="symbol required"></span>
													</label>
													<div class="col-sm-7">
														<select class="form-control" id="experience" name="experience" value="<?php echo set_value('experience'); ?>" style="width: 210px;">
															<option value="">-Experience-</option>
															<?php for($i = 1;$i<=10; $i++): ?>
															<option value="<?php if($i == 1){echo $i." Year";}else{echo $i." Years";}?>"><?php if($i == 1){echo $i." Year";}else{echo $i." Years";}?></option>
															<?php endfor; ?>
														</select>
													</div>
													<?php echo form_error('experience'); ?>
												</div>
											</div>
											
											<div class="form-group">
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Joining Date <span class="symbol required">(yyyy-mm-dd)</span>
													</label>
													<div class="col-sm-7">
														<input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="j_date" value="<?php echo set_value('j_date'); ?>" class="form-control date-picker" required="required"/>
													</div>
													<?php echo form_error('j_date'); ?>
												</div>
												<div class="col-sm-5">
													<label class="col-sm-5 control-label">
														Email 
													</label>
													<div class="col-sm-7">
														<input type="text" class="form-control" id="empemail" name="empemail" value="<?php echo set_value('empemail'); ?>" >
													</div>
												</div>
											</div>
										</div>
									</div><!-- end: BODY PANEL -->
								</div>
								<!-- end: FORM WIZARD PANEL -->
							</div>
						</div>
<!-- ------------------------------------------------ BANK DETAIL --------------------------------------------- -->													
					<div class="row">
						<div class="col-sm-12">
							<!-- start: FORM WIZARD PANEL -->
							<div class="panel panel-white">
								<div class="panel-heading panel-blue">
									<h4 class="panel-title">Bank <span class="text-bold">Detail</span> (Optional Update Later) </h4>
								</div>
								<div class="panel-body">
									<div class="form-group">
										<label class="col-sm-2 control-label">
											Bank Name
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control"  id="empBnakName" name="empBnakName" value="<?php echo set_value('empBnakName'); ?>" >
										</div>
										<label class="col-sm-2 control-label">
											Account Number
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="empAccountNumber" name="empAccountNumber"  value="<?php echo set_value('empAccountNumber'); ?>" >
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">
											IFSC Code
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="empIfscCode" name="empIfscCode"  value="<?php echo set_value('empIfscCode'); ?>" >
											</div>
										<label class="col-sm-2 control-label">
											Branch Name
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="empBranchName" name="empBranchName"  value="<?php echo set_value('empBranchName'); ?>" >
									
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-2 control-label">
											Bank Address
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="empBankAddress" name="empBankAddress"  value="<?php echo set_value('empBankAddress'); ?>" >
											</div>
										<label class="col-sm-2 control-label">
											Payee Name
										</label>
										<div class="col-sm-3">
											<input type="text" class="form-control" id="empPayeeName" name="empPayeeName"  value="<?php echo set_value('empPayeeName'); ?>" >
									
										</div>
									</div>
								</div>
								<!-- end: FORM WIZARD PANEL -->
							</div>
						</div>
					</div>
<!-- ------------------------------------------------ LOGIN INFORMATION --------------------------------------------- -->							
						<div class="row">
							<div class="col-sm-12">
								<!-- start: FORM WIZARD PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading panel-blue">
										<h4 class="panel-title"><span class="text-bold">Login Information</span></h4>
									</div>
									<div class="panel-body">
										<div class="form-group">
											<div class="col-sm-5">
												<label class="col-sm-5 control-label">
													Password <span class="symbol required"></span>
												</label>
												<div class="col-sm-7">
													<input type="password" class="form-control" id="password" name="password" required="required" >
												</div>
												<?php echo form_error('password'); ?>
											</div>
											<div class="col-sm-5">
												<label class="col-sm-5 control-label">
													Re-Password <span class="symbol required"></span>
												</label>
												<div class="col-sm-7">
													<input type="password" class="form-control" id="re-password" name="re-password" required="required" >
												</div>
												<?php echo form_error('re-password'); ?>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-2 col-sm-offset-8">
												<button type="submit" class="btn btn-blue next-step btn-block">
													Save Employee <i class="fa fa-arrow-circle-left"></i>
												</button>
											</div>
										</div>
									</div>
								</div>
							</div>
								<!-- end: FORM WIZARD PANEL -->
						</div>				
					</form>
			