<div class="row">
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading panel-yellow">
				<h4 class="panel-title">Update  <span class="text-bold">Trade Panel</span></h4>
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
			<div id="success">
					
			</div>
			<div class="panel-body">
			<div class="text-blue text-large"> <strong>Welcome to update Trade panel </strong> where we can edit and delete class one by one <strong>  make sure that admission 
			entry has not done in any case </strong> because it may affect student info. 
			You have to edit and delete class info before Admission of student.
			<strong>  Press Update Button for update a single class and Delete for Delete a single class.</strong> </div><br><br>
				<div class=" panel-scroll height-400">
					<table class="table table-striped table-hover center" id="sample-table-2" style="border:3px solid green;" >
						<thead class="text-blue text-large" style="border:3px solid green;">
							<tr>
								<th style="border:1px solid green;">SNo.</th>
								<th style="border:1px solid green;">Trade Name</th>
								<th style="border:1px solid green;">Unit</th>
								<th style="border:1px solid green;">Shift</th>
								<th style="border:1px solid green;">Teacher Id</th>
								<th style="border:1px solid green;">Action</th>
							</tr>
						</thead>
						<tbody style="border:3px solid green;">
							<?php if(isset($classList)): ?>
							<?php $i = 1; foreach($classList->result() as $row): ?>
							<tr>
								<td style="border:1px solid green;"><b><?php echo $i; ?></b><input type="hidden" id="id<?php echo $i; ?>" value="<?php echo $row->id; ?>" /></td>
								<td style="border:1px solid green;"><input type="text" id="stream<?php echo $i; ?>" value="<?php echo $row->streem;?>" size="10"></td>
								<td style="border:1px solid green;"><input type="text" id="section<?php echo $i; ?>" value="<?php echo $row->section;?>" size="2"></td>
								<td style="border:1px solid green;"><input type="text" id="clName<?php echo $i; ?>" value="<?php echo $row->class_name;?>"></td>
								<td style="border:1px solid green;"><input type="text" id="teacherId<?php echo $i; ?>" value="<?php echo $row->class_teacher_id;?>" size="5"></td>
								<td style="border:1px solid green;">
									<button class="btn btn-purple btn-sm" id="editClass<?php echo $i; ?>">
			                    		<i class="fa fa-edit"></i> &nbsp;Update
			                    	</button>
			                        <button class="btn btn-red btn-sm" id="deleteClass<?php echo $i; ?>">
			                    		<i class="fa fa-trash-o"></i> &nbsp;Delete
			                    	</button>
								</td>
							</tr>
							<?php $i++; endforeach; endif;?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>