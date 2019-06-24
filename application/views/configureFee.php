<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading panel-orange">
					<h4 class="panel-title">Check Fee-type you want to recieve.</h4>
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
			<form method="post" action="<?php echo base_url()?>index.php/configureFeeController/saveFeeFields">
			<div class="panel-body">
				<div class="row  space15">
					<div class="col-md-4">
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th>Fee Type</th>
									<th class="center">Monthly</th>
									<th class="center">Annual</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="danger">Registration Fee</td>
									<td class="info center">
										<input type="checkbox" value="Registration_Fee" name="month[]" id="month1"/>
									</td>
									<td class="warning center">
										<input type="checkbox" value="Registration_Fee" name="annual[]" id="annual1"/>
									</td>
								</tr>
								<tr>
									<td class="danger">
											Tution Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Tution_Fee" id="month2">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Tution_Fee" id="annual2">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Admission Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Admission_Fee" id="month3">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Admission_Fee" id="annual3">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Exam Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Exam_Fee" id="month4">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Exam_Fee" id="annual4">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Games & Sports Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Games_&_Sports_Fee" id="month5">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Games_&_Sports_Fee" id="annual5">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Library Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Library_Fee" id="month6">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Library_Fee" id="annual6">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th>Fee Type</th>
									<th>Monthly</th>
									<th>Annual</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="danger">
											Security Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Security_Fee" id="month7">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Security_Fee" id="annual7">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Computer Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Computer_Fee" id="month8">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Computer_Fee" id="annual8">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Madical Services
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Madical_Services" id="month9">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Madical_Services" id="annual9">
									</td>
								</tr>
								<tr>
									<td class="danger">
										Play way / sciet Equipment
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Play_way_sciet_Equipment" id="month10">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Play_way_sciet_Equipment" id="annual10">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Celebration Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Celebration_Fee" id="month11">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Celebration_Fee" id="annual11">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Science Lab
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Science_Lab" id="month12">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Science_Lab" id="annual12">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="col-md-4">
						<table class="table table-hover" id="sample-table-1">
							<thead>
								<tr>
									<th>Fee Type</th>
									<th>Monthly</th>
									<th>Annual</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="danger">
											Chemestry Lab
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Chemestry_Lab" id="month13">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Chemestry_Lab" id="annual13">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Bio Lab
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Bio_Lab" id="month14">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Bio_Lab" id="annual14">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Magazine Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Magazine_Fee" id="month15">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Magazine_Fee" id="annual15">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Late Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Late_Fee" id="month16">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Late_Fee" id="annual16">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Prospectus Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Prospectus_Fee" id="month17">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Prospectus_Fee" id="annual17">
									</td>
								</tr>
								<tr>
									<td class="danger">
											Other_Fee
									</td>
									<td class="info center">
										<input type="checkbox" name="month[]" value="Others_Fee" id="month18">
									</td>
									<td class="warning center">
										<input type="checkbox" name="annual[]" value="Others_Fee" id="annual18">
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					
						<button type="submit" class="btn btn-orange">
							Save Fee type of your school &nbsp;<i class="fa fa-save"></i>
						</button>
					
				</div>
			</form>
		</div>
		<!-- end: INLINE TABS PANEL -->
		</div>
<!-- end: PAGE CONTENT-->
						
						
<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading panel-orange">
					<h4 class="panel-title">Avaliable Fee Fields</h4>
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
				<div class="row  space15">
				<?php foreach($column as $fields):?>
					<div class="col-md-2">
						<label class="checkbox-inline">
							<input type="checkbox" value="Registration_Fee" name="chk[]" id="Registration_Fee">
							<?php echo $fields;?>
						</label>
					</div>
				<?php endforeach;?>
				</div>
			</div>
		</div>
		<!-- end: INLINE TABS PANEL -->
	</div>
</div>