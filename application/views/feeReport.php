<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Student <span class="text-bold">Fee Report</span></h4>
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
					<a class="btn btn-xs btn-link panel-close" href="#">
						<i class="fa fa-times"></i>
					</a>
				</div>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<?php 
						$detail = $this->db->query("SELECT finance_start_date FROM `fee_deposit` GROUP BY finance_start_date");
						if($detail->num_rows() > 0){
					?>
					<label class="col-sm-1 control-label">
						Finance Start Date <span class="symbol required"></span>
					</label>
					<div class="col-sm-2">
						<select class="form-control" id="fsd" name = "fsd" style="width: 150px;">
							<option value="">-select FSD-</option>
		                      			<?php foreach($detail->result() as $row):?>
		                      				<option value="<?php echo $row->finance_start_date;?>">
		                      					<?php echo date("d-M-y", strtotime($row->finance_start_date));?>
		                      				</option>
		                      			<?php endforeach;?>
						</select>
					</div>
					<?php } ?>
					<label class="col-sm-1 control-label">
						Class <span class="symbol required"></span>
					</label>
					<div class="col-sm-2">
						<select class="form-control" id="classv" name="class" style="width: 150px;">
							<option value="">-Select Class-</option>
							<?php foreach($request as $row):?>
							<option value="<?php echo $row->streem;?>"><?php echo $row->streem;?></option>
							<?php endforeach; ?>
							<option value="all">All Class</option>
						</select>
					</div>
					<label class="col-sm-1 control-label">
						Section<span class="symbol required"></span>
					</label>
					
					<div class="col-sm-3"  >
						<select class="form-control" id="sectionId" name="section"></select>
					</div>
				</div>
				<div class="col-sm-12">				
					<div class="table-responsive" id="rahul"></div><!-- end: table-responsive -->
				</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
		
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
					