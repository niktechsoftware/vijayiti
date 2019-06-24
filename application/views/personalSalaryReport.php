<div class="col-md-12">
	<div class="panel">
		<div class="panel-heading panel-blue border-light">
			<h4 class="panel-title">Employee Salary Detail (<?php echo $this->uri->segment(3); ?>)</h4>
		</div>
		<div class="panel-body panel-scroll height-450" >
			<table class="table table-bordered table-hover ">
				<thead>
					<tr>
						<th>S.no.</th>
						<td>Month</td>
						<th>Paid Date</th>
						<th>Total Paid</th>
						<th>Full Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$v = 1;
						$this->db->where("emp_id",$this->uri->segment(3));
						$sal = $this->db->get("emp_salary_info");
						foreach($sal->result() as $row):
					?>
					<tr>
						<td><?php echo $v;?></td>
						<td><?php $till = $row->till_date; echo date("M-Y",strtotime("$till - 1 month"));?></td>
						<td><?php echo $row->created;?></td>
						<td><?php echo $row->gross_s;?></td>
						<td>
							<a href="<?php echo base_url()?>invoiceController/salaryReciept/<?php echo $row->salaryInvoice;?>" class="btn btn-blue">
								Print Slip
							</a>
						</td>
					</tr>	
					<?php 
						$v++; 
						endforeach; 
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
									