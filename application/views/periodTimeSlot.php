<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading panel-blue">
				<i class="fa fa-external-link-square"></i>
					Period Table :
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
								<a class="panel-config" href="#panel-config" data-toggle="modal"> <i class="fa fa-wrench"></i> <span>Configurations</span></a>
							</li>
							<li>
								<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
							</li>										
						</ul>
					</div>
				</div>
			</div> <!-- End Panel Heading -->
			<div class="panel-body">
				<div class="alert alert-info center">
					<h4><b>Note : Define Number of Period Including Lunch</b></h4>
				</div>
			<div>
			<?php if($v==2){
				echo '				
				<div class="alert alert-success">
					<button data-dismiss="alert" class="close">
						&times;
					</button>
					<strong>Well done!</strong> Successfully period created. 
				</div>';
					$v=false;
				}	
			?>
		</div>
		<div class="row space15">
			<div class="col-md-12">
				<div class="col-md-3"><h4><b>Number of Periods</b></h4></div>
					<div class="col-sm-3">
						<select class="form-control" id="nop" name="nop" >
							<option value="-nop-">-NOP-</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="07">7</option>
							<option value="08">8</option>
							<option value="09">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
						</select>
					</div>
				</div>
			</div>
												
				<div class="col-md-12">
					<div class="col-md-7" id="sectionList"></div>
					<div class="col-md-5">
						<div class="panel">
							<div class="panel-heading panel-blue border-light">
								<h4 class="panel-title">Present Number Of Period</h4>
							</div>
							<div class="panel-body panel-scroll height-700" >
								<table class="table table-bordered table-hover ">
									<thead>
										<tr>
											<th>#</th>
											<th>Period Name</th>
											<th>From</th>
											<th>To</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach($request as $row): ?><tr>
											<td><?php echo $i;?></td>
											<td><?php echo $row->period;?></td>
											<td><?php echo $row->from;?></td>
											<td><?php echo $row->to;?></td>
										</tr>
										<?php $i++;endforeach; ?>
									</tbody>	
								</table>
							</div> <!-- End Body scroll panel -->
						</div> <!-- End Panle -->
					</div> <!-- End Col 5 -->
				</div> <!-- End Main col 12 -->
			</div>
		</div>
	</div>
</div>