<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Home Work <span class="text-bold"> Detail</span></h4>
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
					
			<br/><br/>
			<div class="row">
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
		
		<div class="row space20">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Home Work For</label></div>
							<div class="col-sm-6">
							<div><?php $do=$this->uri->segment(3); 
								if($do)
								{echo "successfully home work is Given";
								}?></div>
								<select name="showhomeworkfor" id="showhomeworkfor">
								<option value="01">-Select-</option>
									<?php $logtype = $this->session->userdata('login_type');
											if($logtype == "admin"){
											?>
											<option value="employee">Employee</option>
											<option value="teachers">Teachers</option>
											<option value="students">Students</option>
											<?php 	
											}
											elseif($logtype == "teacher"){
											?>
											<option value="students">Students</option>
											<?php }
											elseif($logtype == "student"){
												?>
											<option value="students">Students</option>
											<?php }
											elseif($logtype == "accountent"){
											?>
											<option value="employee">Employee></option>
											<option value="teachers">Teachers</option>
											<option value="students">Students</option>
										<?php	}
											 ?>
								</select>
							</div>
						</div>
					</div>
					
				</div>	
		
			<div id="showStudent">	
				<div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Class Name</label></div>
							<div class="col-sm-6">
								<select name="classv" id="classv" class="form-control">
									<option value="01">-Select-</option>
									<?php foreach ($noc as $en):?>
									<option value="<?php echo $en->class_name?>"><?php echo $en->class_name?></option>
									<?php endforeach;?>
								</select></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">Section</div>
							<div class="col-sm-6"><select class="form-control" id="sectionId" name="section" style="width: 130px;"></select></div>
						</div>
					</div>
				</div>	
		
			</div>
			<div id="teacherWork"></div>
		<div id="studentWork"></div>
		<div id="subjecthomework"></div>
		
		
	</div>		
	</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
	</div>				