<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
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
							<a class="panel-refresh" href="#"> <i class="fa fa-refresh"></i> <span>Refresh</span> </a>
						</li>
						<li>
							<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
						</li>										
					</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
			
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-calendar">
						<div class="panel-heading panel-blue border-light">
							<h4 class="panel-title">SMS Setting Panel</h4>
						</div>
						<?php 
							$row = $this->db->get("sms")->row();
							$adm = $row->admission;
							$fee_submit = $row->fee_submit;
							$purchase = $row->purchase;
							$stu_attendance = $row->stu_attendance;
							$exam_report = $row->exam_report;
							$parent_message = $row->parent_message;
							$announcement = $row->announcement;
							$greeting = $row->greeting;
						?>
						<div class="panel-body">
							<table class="table">
								<thead>
									<tr>
										<th>Admission</th>
										<th>Fee Submit</th>
										<th>Purchase</th>
										<th>Attendance</th>
										<th>Exam Report</th>
										<th>Parent Message</th>
										<th>Announcement</th>
										<th>Greeting</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<button class="btn btn-sm <?php if($adm == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="admission" value="admission">
												<i class="<?php if($adm == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($adm == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($fee_submit == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="fee_submit" value="fee_submit">
												<i class="<?php if($fee_submit == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($fee_submit == 'yes'){echo "YES"; }else{echo "fa fa-times fa fa-white";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($purchase == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="purchase" value="purchase">
												<i class="<?php if($purchase == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($purchase == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($stu_attendance == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="stu_attendance" value="stu_attendance">
												<i class="<?php if($stu_attendance == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($stu_attendance == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($exam_report == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="exam_report" value="exam_report">
												<i class="<?php if($exam_report == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($exam_report == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($parent_message == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="parent_message" value="parent_message">
												<i class="<?php if($parent_message == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($parent_message == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($announcement == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="announcement" value="announcement">
												<i class="<?php if($announcement == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i> 
												<?php if($announcement == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
										<td>
											<button class="btn btn-sm <?php if($greeting == 'yes'){echo "btn-light-green"; }else{echo "btn-light-red";}?>" id="greeting" value="greeting">
												<i class="<?php if($greeting == 'yes'){echo "fa fa-check"; }else{echo "fa fa-times fa fa-white";}?>"></i>
												<?php if($greeting == 'yes'){echo "YES"; }else{echo "NO";}?>
											</button>
										</td>
									</tr>
								</tbody>
							</table>
							<div id="smsSetting"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end: INLINE TABS PANEL -->
	</div>
</div>
<!-- end: PAGE CONTENT-->