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
					
				<div class="col-sm-12">				
					
			<br/><br/><div class="row">
				<div class="col-md-12 space20">
				<div class="btn-group pull-right">
				<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
					Export <i class="fa fa-angle-down"></i>
				</button>
				<ul class="dropdown-menu dropdown-light pull-right">
					<li>
						<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
							Export to Excel
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover" id="sample-table-2">
			<thead>
				<tr>
					<th>S.no.</th>
					<th>Student Id</th>
					<th>Student Name</th>
					<th>Father Name</th>
					<th>Father Mobile</th>
					<td>Fee line</td>
					<th>Total Paid</th>
					<th>Total Due</th>
					<th>Full Detail</th>
				</tr>
			</thead>
			<tbody>
			<?php 
			$v=$this->session->userdata('username');
			$this->db->where("student_id", $v);
			$rows = $this->db->get("guardian_info")->row();
			$this->db->where("student_id",$v);
			$stuname=$this->db->get("student_info")->row();
			$total = $this->db->query("SELECT SUM(diposit_month) as totalMonth, SUM(paid) as totalPaid from fee_deposit WHERE student_id = '$v'")->row();
			$lastfeeDate=$this->db->query("select till_diposit,current_balance from fee_deposit where student_id=$v GROUP BY diposit_date DESC limit 1")->row();
			$currentDate=date("Y-m-d");
			$lastfeeDate1= $lastfeeDate->till_diposit;
			$lastfeeMonth=date("m", strtotime($lastfeeDate1));
			$currentMonth=date("m",strtotime($currentDate));
			if( $currentMonth<$lastfeeMonth)
			{$currentMonth=$currentMonth+12;}
			$remainingMonth = ($currentMonth+1) - ($lastfeeMonth);
			
			$singleStu = $this->db->query("SELECT * from fee_shedule WHERE student_id = '$v'")->row();
			
			$fields1 = $this->db->list_fields('fee_shedule');
			$oneMonthFee=0;
			foreach($fields1 as $fields):
			if($fields != "id" && $fields != 'student_id')
			{
				$oneMonthFee=$oneMonthFee + $singleStu->$fields;
			}
			endforeach;
			$totRemaining= $remainingMonth*$oneMonthFee + $lastfeeDate->current_balance;
			$this->db->select("finance_start_date as fsd");
			$fsd = $this->db->get("general_settings")->row()->fsd;
			    $color = array(
				    "progress-bar-danger",
				    "progress-bar-success",
				    "progress-bar-warning",
				    "progress-partition-green",
				    "partition-azure",
				    "partition-blue",
				    "partition-orange",
				    "partition-purple",
				    "progress-bar-danger",
				    "progress-bar-success",
				    "progress-partition-green",
				    "partition-purple"
			    );
			    $count = 1;
			   
			    $this->db->where("student_id",$stu_id);
			    $rows = $this->db->get("guardian_info")->row();
			   
			    $total = $this->db->query("SELECT SUM(diposit_month) as totalMonth, SUM(paid) as totalPaid from fee_deposit WHERE student_id = '$stu_id'")->row(); ?>
				<tr>
		  			<td><?php echo $count;?></td>
		  			<td><?php echo $stu_id;?>
		  			<td><?php echo $stuname->first_name.$stuname->midd_name.$stuname->last_name;?></td>
		  			<td><?php echo $rows->father_full_name;?></td>
		  			<td><?php echo $rows->f_mobile;?></td>
		  			<td>
						<?php $month = $total->totalMonth;?>
		                <?php for($i = 0; $i<=$month-1; $i++):?>
			               <span class="label label-success" style="line-height:20px;">
			               		<?php echo date("M-y",strtotime("$fsd + $i month"));?>
			               </span>
		                <?php endfor; ?>
					</td>
		  			<td><?php echo $total->totalPaid;?></td>
		  			<td><?php echo $totRemaining;?></td>
		  			<td>
						<a href="<?php echo base_url()?>index.php/feeControllers/fullDetail/<?php echo $stu_id;?>" target="_blank" class="btn btn-blue">
							View Detail
						</a>
		  			</td>
		  		</tr>
		  		<?php $count++; ?>
		  		
			</tbody>
		</table>
	</div>

				</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
		
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
	</div>				