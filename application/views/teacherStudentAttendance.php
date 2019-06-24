	<form  action="<?php echo base_url();?>index.php/singleTeacherControllers/studentAtten" method="post">
		<div class="row">
							<div class="col-md-12">
								<!-- start: DYNAMIC TABLE PANEL -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Attendance <span class="text-bold">Table</span></h4>
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
									<div class="row">
										<div class="col-sm-12" id="validId"></div>
									</div><?php 		if($v){
										?><div class="alert alert-success">
										<?php echo "Successfully Attendance Done";?></div><?php 
									}
									
									$v=0;?>
									<div class="row space20">
										<div class="col-sm-4">
											<div class="form-group">
												<div class="col-sm-4">
												<label class=" control-label">
													Class <span class="symbol required"></span>
												</label>
												</div>
												<div class="col-sm-5">
												<select class="form-control" id="classv" name="class" style="width: 140px;">
												<option value="no">-Select Class-</option>
												<?php foreach($request as $row):?>
													<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
													<?php endforeach; ?>
												</select>
											
												</div>
											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">
												<div class="col-sm-4">				
												<label class=" control-label">
													Section <span class="symbol required"></span>
												</label>
												</div>
												<div class="col-sm-7"  >
													<select class="form-control" id="sectionId" name="section" style="width: 140px;">
														
													</select>
												</div>
											</div>
										</div>
									</div>
										<div class="table-responsive">
											<table class="table table-striped table-hover" >
												<thead id="sample_rahul1">
													
												</thead>
												<tbody id=sample_rahul>
													
												</tbody>
											</table>
										</div>
							
												
									</div>
								</div>
							</div>
							</div>
							</form>
					
						<!-- end: PAGE CONTENT-->
				