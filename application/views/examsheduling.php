<!-- start: PAGE CONTENT -->
<div class="row">
	 <div class="col-sm-12">
		<!-- start: INLINE TABS PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
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
								<a class="panel-expand" href="#"> <i class="fa fa-expand"></i> <span>Fullscreen</span></a>
							</li>										
						</ul>
					</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-12">
				
									<div class="alert alert-info center">
									<p><h4 class="media-heading">Important Instructions about exam type creation</h4>
                    <p class="media-timestamp">This is exam creation area. Type in the name of exam (exam type e.g. : Half yearly, Annual, Unit Test etc. ) in the box given below the exam name. Also select start date from the dropdown given below the exam month tab.
You can also edit/delete the exam type and date from the options given in the right.  </p>
									</div>
									<div class="row">
										<div class="col-sm-5">
										
											<div class="panel panel-blue panel-calendar">
											
												<div class="panel-heading border-light">
													<h4 class="panel-title">Enter Test Name And Starting Date</h4>
												</div>
												<form action="<?php echo base_url();?>index.php/examControllers/getData1"  method ="post"  id="form">
												<div class="panel-body space10">
													<div class="row col-sm-12">
													<div class="space10" >
														<label class="panel-title">Test Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;&nbsp;&nbsp;</label>
																<input type="text" name="examName" style="width: 180px;" id="examName" />
													</div>
													<label class="panel-title">Starting Date&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> 
															<input  type="date" data-date-format="yyyy-mm-dd"  id= "printDate" name ="datet" data-date-viewmode="years"  style="width: 180px;" class="date-picker"> 
												
												 <button class="btn btn-red ">
                                                            Submit <i class="fa fa-arrow-circle-right"></i>
                                                        </button>
												
												</div>	
												
												</div>
												</form>
											</div>
											<div class="col-sm-15">
										
											<div class="panel panel-blue panel-calendar">
											
												<div class="panel-heading border-light">
													<h4 class="panel-title">Edit Exam Details</h4>
												</div>
												<form action="<?php echo base_url();?>index.php/examControllers/updateData1"  method ="post"  id="form">
												<div class="panel-body space10">
												<div class="input-group" >
													<select class="form-control space10" id="examName1" name="examName" style="width: 160px;">
															<option value="01">-Select Exam-</option>
															<?php foreach ($request as $row):
															$ds= $row->exam_date;
															$ename=$row->exam_name;
															$cd=date("Y-m-d");
															if(($ename=="Class Test")||($ename=="Other Exam"))
																	{?>
															<option  value="<?php echo $row->exam_name?>"><?php echo $row->exam_name?></option>
															<?php }
																elseif($ds>=$cd)
																{
																	?><option  value="<?php echo $row->exam_name?>"><?php echo $row->exam_name?></option><?php
																}endforeach;?>
														</select>
												</div>
											<div class="input-group" >
												<input  type="text" data-date-format="yyyy-mm-dd" id = "printDate1" name ="datet" data-date-viewmode="years"  style="width: 160px;" class="form-control date-picker">
												<div class="col-sm-4 ">
															
															<button class="btn btn-red ">
																Update <i class="fa fa-arrow-circle-right"></i>
															</button>
														</div>
													</div>
												</div>
												</form>
											</div>
										</div>
										</div>
										
										
										<div class="col-sm-7">
										<div class="panel panel-calendar">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Settings</h4>
												</div>
											<div class="panel-body" id="examsetting">
											<table class="table table-responsive">
												<thead>
													<tr>	
														<th> 
															Exam Name										
														</th>
													
														<th> 
															Exam Month
														</th>
														
														<th>
															Setting
														</th>
													</tr>
											</thead>
											<tbody>
											
											<?php $i=1; foreach ($request as $row):
											 ?><form action="<?php echo base_url();?>index.php/examControllers/startScheduling" method="post" >
													
													<tr>
														<td>	
															
															<input type="text" style="width: 160px;" name="examName<?php echo $i;?>" value="<?php echo $row->exam_name;?>" id="ename<?php echo $i;?>" disabled="disabled"/>									
																<input type="hidden" name="examName" value="<?php echo $row->exam_name;?>"/>
														</td>
														
													
														<td>
															<input  type="text" style="width: 160px;" data-date-format="yyyy-mm-dd" id="edate<?php echo $i;?>" data-date-viewmode="years" value="<?php echo $row->exam_date;?>" disabled="disabled"/>
															<input type="hidden" name="edate" value="<?php echo $row->exam_date;?>"/>		
														</td>
														
														<td >
													<?php 	$ds= $row->exam_date;
															$ename=$row->exam_name;
															$cd=date("Y-m-d");
															if(($ename=="Class Test")||($ename=="Other Exam"))
																	{?>
																	<button type='submit' style="width: 160px;" class="btn btn-xs btn-light-blue" id="scheduling<?php echo $i;?>"><i class="fa fa-check"></i>Go For Scheduling</button>
															
															<?php }else
															{
																if($ds<$cd)
															{?><button type='submit' disabled="disabled"  style="width: 160px;" class="btn btn-xs btn-light-blue" id="scheduling1"><i class="fa fa-check"></i>Exam Done </button> 
														<?php }else{ ?> <button type='submit' style="width: 160px;" class="btn btn-xs btn-light-blue" id="scheduling<?php echo $i;?>"><i class="fa fa-check"></i>Go For Scheduling</button>
														</td>
													</tr></form>
													<?php }} $i++;endforeach;?>
													
											   </tbody>
											</table>
											
											</div>
										</div>
									</div>
								</div>
								
							</div>		
							</div>
									</div>
								</div>
								<!-- end: INLINE TABS PANEL -->
							</div>
						</div>
						
						
						<!-- end: PAGE CONTENT-->