
<form action="<?php echo base_url();?>index.php/feeControllers/enterDeufee"
	method="post" role="form" class="smart-wizard form-horizontal"
	id="form">
	<div class="row">
		<div class="col-md-12">
			<!-- start: RESPONSIVE TABLE PANEL -->
			<div class="panel panel-white">
				<div class="panel-heading">
					<i class="fa fa-external-link-square"></i> Define And Details Of
					Admission fee:
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
						<br> This is Admission fee Area. Here you have to enter Admission Fee with the
						-sign and pay without sign.

					</div>
					<div id="msg"></div>
					<div class="col-md-5">
						<div class="panel">
							<div class="panel-heading panel-red border-light">
								<h4 class="panel-title">Fill Detail</h4>
							</div>
							<div class="panel-body">
								<div class="row space15">
									<div class="col-md-5">Enroll id</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="studentId"
											name="studentId" placeholder="Student Id">
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Student name</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="studentName"
											name="studentName" placeholder="Student Name">
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Total Due</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="totdue"
											name="totdue" placeholder="Total Due">
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Paid</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="paid" name="paid"
											placeholder="Paid">
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Actual Remain</div>
									<div class="col-md-7">
										<input type="text" class="form-control" id="remain"
											name="remain" placeholder="Remain">
									</div>
								</div>
								<div class="row space15">
									<div class="col-md-5">Descriptions</div>
									<div class="col-md-7">
										<textarea class="form-control" id="textarea" name="desc"
											placeholder="description"></textarea>
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
								<h4 class="panel-title">Avaliable Fee Due Detail</h4>
							</div>
							<div class="panel-body panel-scroll height-450">
								<table class="table table-bordered table-hover ">
									<thead>
										<tr>
											<th>S.No.</th>
											<th>Enroll Id</th>
											<th>Student Name</th>
											<th>Total due</th>
											<th>Mobile No.</th>
										</tr>
									</thead>
									<tbody>
											
												<?php $i=1;foreach($request as $row):?><tr>
											<td><?php echo $i?></td>
											<td><?php $sid=$row->student_id;  echo $row->student_id;?></td>
											<td><?php echo $row->student_name;?></td>
											<td><?php echo $row->total_due;?></td>
													<?php
													
													$this->db->where ("enroll_num",$row->student_id );
													$var1 = $this->db->get ("student_info")->row ();
													?>
													<td><?php if($var1->mobile){echo $var1->mobile;}?></td>
										</tr><?php $i++; endforeach; ?>
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