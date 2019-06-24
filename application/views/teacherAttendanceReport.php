<table class="table table-striped table-hover" id="sample_2">
							<thead>
								<tr>
									<th>S.no.</th>
									<th>attendance</th>
									<th>a_date</th>
									
									<th>Leave</th>
									<!-- <th>Detail</th>  -->
								</tr>
							</thead>
							<tbody>
								<?php $i=1;
			  			 foreach ($request->result() as $row){	
			  				?><tr>
			  					<td><?php echo $i;?></td>
			  					<td><?php echo $row->attendance; ?></td>
			  					
				  				<td><?php echo $row->a_date;?></td>
				  				<td><?php ?></td>
				  				<!-- <td>
				  					<button data-target=".bs-example-modal-basic1" data-toggle="modal" class="btn btn-blue">
										View Detail
									</button>
				  				</td>
				  				-->
				  			</tr>
				  			<?php 
			  			}?>
							</tbody>
						</table>