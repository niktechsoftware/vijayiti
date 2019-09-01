<?php $school_code = $this->session->userdata("school_code");?>
<style>
.highlight-error {
  border-color: red;
  body
{
  font-family: Arial, Sans-serif;
}
} 
</style>
<div class="container">
	<form action="<?php echo base_url(); ?>index.php/newAdmissionControllers/quickStureginsert" method="post" id="form">
	<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-yellow">
					<h4 class="panel-title">QUICK Student <span class="text-bold">Registration</span></h4>
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
											Name <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('firstName'); ?>" class="form-control" 
										onkeyup="stuFirstname()" id="firstName" name="firstName" required ="required" style='text-transform:uppercase'>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Father Name <span id="faname" Style="color:red;" class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('fatherName'); ?>" class="form-control" onkeyup="stuFathername()" id="fatherName" name="fatherName" required ="required" style='text-transform:uppercase'/>
									</div>
								</div>
									<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Mother Name <span id="faname" Style="color:red;" class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('motherName'); ?>" class="form-control" onkeyup="stuFathername()" id="motherName" name="motherName" required ="required" style='text-transform:uppercase'/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label for='mobvalid'>
											Mobile No. <span class="symbol required"></span>
										</label>
										<input type="text" value="<?php echo set_value('mobileNumber'); ?>" data-type="mobileNumber" maxLength="10" placeholder="mobile number for SMS" pattern="[6-9]{1}[0-9]{9}" class="form-control" id="mobileNumber" name="mobileNumber" required ="required">
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Date Of Birth <span class="symbol required">(yyyy-mm-dd)</span>
										</label>
										<input type="date" value="<?php echo set_value('dob'); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" min="1990-01-01" max="2017-12-31" onkeyup="checkDOB()"name="dob" id="dob" class="form-control date-picker" required ="required">
									</div>
								</div>
								<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Stream <span class="symbol required"></span>
											</label>
											<select class="form-control" id="stream" name="stream" required ="required">
												<option> SELECT STREAM</option>
												<?php
												$sub = $this->db->query("SELECT DISTINCT stream FROM class_info WHERE school_code='$school_code'");
												if($sub->num_rows()>0){
												foreach($sub->result() as $row):
												$this->db->where("id",$row->stream);
												$sname = $this->db->get("stream")->row();
												echo '<option value="'.$row->stream.'">'.$sname->stream.'</option>';
												endforeach;}
												?>
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Section <span id="sec" Style="color:red;" class="symbol required"></span>
											</label>
											<select class="form-control" id="section1" name="section">
											</select>
										</div>
									</div>
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Class  <span class="symbol required"></span>
											</label>
											<select class="form-control" id="classOfAdmission1" name="classOfAdmission" required ="required">
												
											</select>
										</div>
									</div>
										
							</div>
							<div class="row">
											
									<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Address <span id="stuadd" Style="color:red;" class="symbol required"></span>
											</label>
											<input type="text" value="<?php echo set_value('addLine1'); ?>" class="form-control" onkeyup="stuAddress()" id="addLine1" name="addLine1" required ="required"style='text-transform:uppercase'/>
										</div>
									</div>
										<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											E-mail Address <span id="emailID" Style="color:red;" class="symbol"></span>
										</label>
										<input type="text" value="<?php echo set_value('email'); ?>" class="form-control" onkeyup="stuEmailId()"  id="email1" name="emailAddress">
									</div>
								</div>								
							
								<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												 Admission Date<span class="symbol required">(yyyy-mm-dd)</span>
											</label>
											<input type="date" value="<?php echo set_value('dateOfAdmission'); ?>" data-date-format="yyyy-mm-dd" data-date-viewmode="years" min="2018-01-01" max="Date()"  name="dateOfAdmission" id="doa" class="form-control date-picker">
										</div>
									</div>
								<div class="col-md-3">
										<div class="form-group">
											<label class="control-label">
												Password <span class="symbol required"></span>
											</label>
											<input type="password" value="<?php echo set_value('password'); ?>" class="form-control" id="password" name="password" title="Please enter at least 5 or more characters" required/>
										</div>
									</div>
							
							</div>

						<!-- 6 row -->	
							<div class="row">

							
								<div class="col-md-3">
									<div class="form-group">
										<label for="ConfirmPassword" class="control-label">
											Confirm Password <span id="cpass" class="symbol required"></span>
										</label>
										<input type="password" value="<?php echo set_value('password_again'); ?>" class="form-control" onkeyup='check();' id="ConfirmPassword" name="password_again" />
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label">
											Gender  <span class="symbol required" required ="required"></span>
										</label>
										<div>
											<label class="radio-inline">
												<input type="radio" class="grey" value="0" name="gender" id="gender_female" >
												Female
											</label>
											<label class="radio-inline">
												<input type="radio" class="grey" value="1" name="gender"  id="gender_male">
												Male
											</label>
										</div>
									</div>
								</div>
							<?php	$fsdvalue=	$this->session->userdata('fsd');
										//echo $fsdvalue."fg";
											$this->db->where('school_code',$school_code);
											$this->db->where('id',$fsdvalue)	;
											$fsd1=	$this->db->get('fsd');?>
								<div class="col-md-3">
										<div class="form-group">
											<label class="control-label text-uppercase">
												Fsd <span id="fsd" Style="color:red;" class="symbol required"></span>
											</label>
											<select class="form-control" id="fsd" name="fsd" required ="required">
												<!--<option> Select Fsd</option>-->
												<?php
												
										
											//	$fsd1 = $this->db->query("SELECT * FROM fsd WHERE school_code='$school_code'");
											    if($fsd1->num_rows()>0){
													// $this->db->where("id",$row->finance_start_date);
												// $fsd2 = $this->db->get("fsd")->row();
												echo '<option value="'.$fsd1->row()->id.'">'.date("d-M-Y", strtotime($fsd1->row()->finance_start_date)).'</option>';
											}
												?>


											</select>
										</div>
									</div>
							</div>
						
						</div>	
						</div>
			</div>	
		</div>
	</div>
	</div>
						<!-- end row 6 -->
						<div class="row">
		<div class="col-sm-12">
			<!-- start: FORM WIZARD PANEL -->
			<div class="panel panel-white">
							<div class="panel-heading panel-green">
					<h4 class="panel-title text-uppercase">Term & Condition</span></h4>
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
							<div class="row">   
				
		         	<label for="inputEmail3" class="col-sm-1 control-label"></label>
			            <div class="col-sm-11">
			        	<input type="checkbox" id="terms" name="terms" value="Yes"> I accept the <a href="#" style="color: blue">Policy and Terms & Conditions. </a><br>
			        	<span class="symbol required"></span>Required Fields
			        	
			        		<p style="float:right;">
								    By click on REGISTER, Then you are accepted the Policy and Terms &amp; Conditions.
								</p>
		            	</div>
            	   			   
			    </div>	
			    	<div class="row">
							<div class="col-md-8">
							
							</div>
							<div class="col-md-4">
								<input type="submit" value="REGISTER" class="btn btn-yellow btn-block"/>
							</div>
						</div>
				</div>
			</div>
		</div>
	</div>
	
	</form>

</div>
<script> doa.max = new Date().toISOString().split("T")[0]; </script>