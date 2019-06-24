
<!-- start: PAGE CONTENT -->
<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Define <span class="text-bold"> HomeWork Detail</span></h4>
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
				</div>
			</div>
	<div class="panel-body">
	<form action="<?php echo base_url();?>index.php/studentHWControllers/addHomeWork"  method ="post" >
		  <div class="row">
			<div class="col-sm-12">
				<div class="row space20">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Home Work For</label></div>
							<div class="col-sm-6">
							<div><?php $do=$this->uri->segment(3); 
								if($do)
								{echo "successfully home work is Given";
								}?></div>
								<select name="homeworkfor" id="homeworkfor">
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
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Work Subject Name</label></div>
							<div class="col-sm-6"><input type="text" name="wsubjectname" id="wsubject"/></div>
						</div>
					</div>
				</div>	
				
				<div class="row space20">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Define Work</label></div>
							<div class="col-sm-6">
								<textarea rows="5" cols="20" name="hwdefine" id="hw"></textarea>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Remark</label></div>
							<textarea rows="5" cols="20" name="hwremark" id="hw"></textarea>
						</div>
					</div>
				</div>	
				
				<div class="row space20">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Given Date</label></div>
							<div class="col-sm-6"><input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="gdate"  class="form-control date-picker" required="required"/></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Submittion Date</label></div>
							<div class="col-sm-6"><input type="date" data-date-format="yyyy-mm-dd" data-date-viewmode="years" name="sdate"  class="form-control date-picker" required="required"/></div>
						</div>
					</div>
				</div>	
			<div id="selectStudent">	
				<div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Maximam Marks</label></div>
							<div class="col-sm-6"><input type="text" name="mm" id="mm"/></div>
						</div>
					</div>
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
				</div>	
				
				<div class="row">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6">Section</div>
							<div class="col-sm-6"><select class="form-control" id="sectionId" name="section" style="width: 130px;"></select></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Subject</label></div>
							<div class="col-sm-6"><select class="form-control" id="subjectId" name="subject" style="width: 220px;"></select></div>
						</div>
					</div>
				</div>	
				
				<div class="row">
					
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"></div>
							<div class="col-sm-6"></div>
						</div>
					</div>
				</div>	
			</div>
				<div class="row space20">
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><label>Upload</label></div>
							<div class="col-sm-6"><input type="file" name="filehomeWork"/></div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="row">
							<div class="col-sm-6"><button class="btn btn-green pull-right" type="submit">Submit</button></div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>
</div>