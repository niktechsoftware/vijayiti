
<form action="<?php echo base_url();?>index.php/feeControllers/enterDeufee" method="post" role="form" class="smart-wizard form-horizontal" id="form">
	<div class="row">
		<div class="col-md-12">
			<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading panel-orange">
					<i class="fa fa-external-link-square"></i> Define And Details Of
					Due fee:
					<div class="panel-tools">
						<div class="dropdown">
							<a data-toggle="dropdown"
								class="btn btn-xs dropdown-toggle btn-transparent-grey"> <i
								class="fa fa-cog"></i>
							</a>
							<ul class="dropdown-menu dropdown-light pull-right" role="menu">
								<li><a class="panel-collapse collapses" href="#"><i
										class="fa fa-angle-up"></i> <span>Collapse</span> </a></li>
								<li><a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i>
										<span>Refresh</span>
								</a></li>
								<li><a class="panel-config" href="#panel-config"
									data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
								</li>
								<li><a class="panel-expand" href="#"> <i class="fa fa-expand"></i>
										<span>Fullscreen</span></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="alert alert-info">
						<h4 class="center">
							<b>Important Instructions about Enter Due Fee</b>
						</h4>
						<br> This is Due fee Area. Here you have to enter Due Fee with the
						-sign and pay without sign.

					</div>
					<div id="msg"></div>
					<div class="col-md-5">
						<div class="panel">
							<div class="panel-heading panel-red border-light">
								<h4 class="panel-title">Fill Detail</h4>
							</div>
							<?php 
				// 			$this->db->where('school_code',$this->session->userdata('school_code'));
				// 			      $category = $this->db->get('fee_cat');
							?>
							<div class="panel-body">
							    
						
								
							    <div class="row space15">
									<div class="col-md-5">Student Id</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="studusername"
											name="studusername" placeholder="Student id" onkeyup="stuBirthPlace()" required>
									</div>
								</div>
								
								<input type="hidden" class="form-control" id="studentId"
									name="studentId">
								<?php
								// 	$studid=$this->input->post("studentId");
								// 	print_r($studid);
								?>
								<div class="row space15">
									<div class="col-md-5">Student name</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="studentName"
											name="studentName" pattern="[a-zA-Z ]+" title="Please input only character"required>
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Total Due</div>
									<div class="col-md-7">
										<input type="number" class="form-control" id="totdue"
											name="totdue" required>
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Paid</div>
									<div class="col-md-7">
										<input type="number" class="form-control" id="paid" name="paid"
											>
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Actual Remain</div>
									<div class="col-md-7">
										<input type="number" class="form-control" id="remain"
											name="remain" readonly>
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Descriptions</div>
									<div class="col-md-7">
										<textarea class="form-control" id="textarea" name="desc"
											></textarea>
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">
										<button type="submit" class="btn btn-red">
											Click to Save <i class="fa fa-save"></i>
										</button>
									</div>
									<div class="col-md-7">
										<button type="reset" class="btn btn-red">
											Reset Values <i class="fa fa-refresh"></i>
										</button>
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-7">
						<div class="panel">
							<div class="panel-heading panel-blue border-light">
								<h4 class="panel-title">Available Fee Due Details</h4>
							</div>
							<div class="panel-body panel-scroll height-450">
								<table class="table table-bordered table-hover " id="feeduelist">
									<thead>
									<tr style="background-color:#804c75; color:white;">
										
											<th>S.No.</th>
											<th>Student Usename</th>
											<th>Student Name</th>
											<th>Total due</th>
											<th>Mobile No.</th>
										</tr>
									</thead>
									<tbody>
											
											
												<tr>
											<td></td>
											<td></td>
										<td></td>
											<td></td>
											<td></td>
										</tr>
													</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</form>