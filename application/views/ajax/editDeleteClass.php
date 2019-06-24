	<div class="alert alert-success">
		<button data-dismiss="alert" class="close">
		&times;
		</button>
		<strong>Done!</strong> You successfully Update <a class="alert-link" href="#">
			<?php echo $this->input->post("clName")."-".$this->input->post("section"); ?></a>
		.			
	</div>
	
	
	<div class="col-md-12">
		<div class="panel panel-white">
			<div class="panel-heading panel-yellow">
				<h4 class="panel-title">Scroll <span class="text-bold">Panel</span></h4>
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
				<div class=" panel-scroll height-400">
					<table class="table table-striped table-hover" id="sample-table-2">
						<thead>
							<tr>
								<th>SNo.</th>
								<th>Class Name</th>
								<th>Section</th>
								<th>Subject Stream</th>
								<th>Teacher Id</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php if(isset($classList)): ?>
							<?php $i = 1; foreach($classList->result() as $row): ?>
							<tr>
								<td><?php echo $i; ?><input type="hidden" id="id<?php echo $i; ?>" value="<?php echo $row->id; ?>" /></td>
								<td><input type="text" id="clName<?php echo $i; ?>" value="<?php echo $row->class_name;?>" size="10"></td>
								<td><input type="text" id="section<?php echo $i; ?>" value="<?php echo $row->section;?>" size="2"></td>
								<td><input type="text" id="stream<?php echo $i; ?>" value="<?php echo $row->streem;?>"></td>
								<td><input type="text" id="teacherId<?php echo $i; ?>" value="<?php echo $row->class_teacher_id;?>" size="5"></td>
								<td>
									<button class="btn btn-yellow btn-sm" id="editClass<?php echo $i; ?>">
			                    		<i class="fa fa-edit"></i> &nbsp;Edit
			                    	</button>
			                        <button class="btn btn-Yellow btn-sm" id="deleteClass<?php echo $i; ?>">
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