<div class="row">
	<div class="col-md-12">
	<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<i class="fa fa-external-link-square"></i>
					Print Sale Reciept here :
			</div>
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
			<div class="panel-body">
				 <?php
					$check = mysql_query("select * from sale_info GROUP BY bill_no");
					$num = mysql_num_rows($check);
					if($num > 0){
				?>
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="sample_2">
						<thead>
					    	<tr>
					        	<th>Student Id/Employee Id : </th>
					            <th>Reciept No : </th>
					            <th>Purchase Date : </th>
					             <th>Balance : </th>
					            <th>Print Reciept : </th>
					        </tr>
				       	</thead>
				       	<tbody>
						<?php while($row = mysql_fetch_object($check)){ ?>
							<tr>
					        	<td><?php echo $row->valid_id; ?></td>
					            <td><?php echo $row->bill_no; ?></td>
					            <td><?php echo $row->date; ?></td>
					            <td><?php echo $row->balance; ?></td>
					            <td><a href="<?php echo base_url()?>index.php/invoiceController/printSaleReciept/<?php echo $row->bill_no; ?>" target="_blank" class="btn btn-green btn-gradient">Print</a></td>
					        </tr>
					<?php }
						}
					?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

