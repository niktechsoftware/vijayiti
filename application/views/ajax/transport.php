<?php 
if($cla == "all" && $sec == "all"):
$this->db->where("fsd",$fsd);
$this->db->where("status","Active");
$student = $this->db->get("student_info");
elseif($cla != "all" && $sec == "all"):
$this->db->where("status","Active");
		$this->db->where("fsd",$fsd);
		$this->db->where("trade",$cla);
$student = $this->db->get("student_info");
else:
$this->db->where("status","Active");
		$this->db->where("fsd",$fsd);
		$this->db->where("trade",$cla);
		$this->db->where("unit",$sec);
$student = $this->db->get("student_info");
endif;
?>
<?php if($student->num_rows() > 0): 
	$isData = $this->db->count_all("fee_shedule"); 
	if($isData > 0):
?>

						<div class="row">
							<div class="col-md-12">
								<!-- start: EXPORT DATA TABLE PANEL  -->
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title"><span class="text-bold"></span></h4>
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
											<div class="col-md-12 space20">
												
												<div class="btn-group pull-right">
													<button data-toggle="dropdown" class="btn btn-green dropdown-toggle">
														Export <i class="fa fa-angle-down"></i>
													</button>
													<ul class="dropdown-menu dropdown-light pull-right">
														<li>
															<a href="#" class="export-pdf" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as PDF
															</a>
														</li>
														<li>
															<a href="#" class="export-png" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as PNG
															</a>
														</li>
														<li>
															<a href="#" class="export-csv" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as CSV
															</a>
														</li>
														<li>
															<a href="#" class="export-txt" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as TXT
															</a>
														</li>
														<li>
															<a href="#" class="export-xml" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as XML
															</a>
														</li>
														<li>
															<a href="#" class="export-sql" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as SQL
															</a>
														</li>
														<li>
															<a href="#" class="export-json" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Save as JSON
															</a>
														</li>
														<li>
															<a href="#" class="export-excel" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Excel
															</a>
														</li>
														<li>
															<a href="#" class="export-doc" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to Word
															</a>
														</li>
														<li>
															<a href="#" class="export-powerpoint" data-table="#sample-table-2" data-ignoreColumn ="3,4">
																Export to PowerPoint
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
														<th>Enroll Num</th>
														<th>Student Name</th>
														<th>Tution_Fee</th>
														<th>Library_Fee</th>
														<th>Practical_Fee</th>
														<th>Examination_Fee</th>
														<th>Activity</th>
														
													</tr>
												</thead>
											
													<tbody>
													<?php 
													    $count = 1;
													    $tot=0.00;
													    foreach($student->result() as $stuDetail):
													    $stu_id = $stuDetail->enroll_num;
													    $this->db->where("student_id",$stu_id);
													    $rows = $this->db->get("fee_shedule")->row();
																						?><tr>
																					  			<td><?php echo $count;?></td>
																					  			<td><?php if($rows){?><button class="btn btn-green" id= "stdid<?php echo $count?>" value="<?php echo $stu_id;?>"><?php echo $stu_id;?></button><?php } else{?><button class="btn btn-red" id= "stdid<?php echo $count?>"><?php echo $stu_id;?></button><?php }?></td>
																					  			<td><?php echo $stuDetail->name;?></td>
																					  			
																					  			<td><input type="text" name ="tutionfee<?php echo $count?>" style="width:60px;" value="<?php  if($rows){ echo $rows->Tution_Fee;}else {echo "NA";}?>" id="tutionfee<?php echo $count?>" <?php if(!$rows){?> disabled="disabled" <?php }?>/></td>
																					  			<td><input type="text" name ="computer_fee<?php echo $count?>" style="width:60px;" value="<?php if($rows){ echo $rows->Library_Fee;}else {echo "NA";}?>" id="computer_fee<?php echo $count?>" <?php if(!$rows){?> disabled="disabled" <?php }?>/></td>
																					  			<td><input type="text" name ="examination_fee<?php echo $count?>"  style="width:60px;" value="<?php if($rows){ echo $rows->Practical_Fee;}else {echo "NA";}?>" id="examination_fee<?php echo $count?>" <?php if(!$rows){?> disabled="disabled" <?php }?>/></td>
																					  			<td><input type="text" name ="tranport_fee<?php echo $count?>" style="width:60px;" value="<?php if($rows){ echo $rows->Examination_Fee;}else {echo "NA";}?>" id="tranport_fee<?php echo $count?>" <?php if(!$rows){?> disabled="disabled" <?php }?>/></td>
																					  			<td><input type="text" name ="other_fee<?php echo $count?>" style="width:60px;" value="<?php if($rows){ echo $rows->Others_Fee;}else {echo "NA";}?>" id="other_fee<?php echo $count?>" <?php if(!$rows){?> disabled="disabled" <?php }?>/></td>
																					  			<td><button class="btn btn-purple"  id= "update<?php echo $count?>">Update</button></td>
																						</tr>
																						<?php $count++; endforeach;?>
														</tbody>
											</table>
										</div>
									</div>
								</div>
								<!-- end: EXPORT DATA TABLE PANEL -->
							</div>
						</div>
						<!-- end: PAGE CONTENT-->
				<?php 	else: ?>
				<br/><br/>
			<div class="alert alert-block alert-danger fade in">
				<button data-dismiss="alert" class="close" type="button">
					&times;
				</button>
				<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
				<p>
					No record found from Fee database please submit fee first of this class &amp; section... 
				</p>
			</div>
		<?php endif; ?>
<?php else: // if student_info not return any value... ?>
	<br/><br/>
	<div class="alert alert-block alert-danger fade in">
		<button data-dismiss="alert" class="close" type="button">
			&times;
		</button>
		<h4 class="alert-heading"><i class="fa fa-times"></i> Error! <?php echo $student->num_rows();?></h4>
		<p>
			No record found from this class and section... 
		</p>
		<p>
			Make sure students are avaliable in this class section... :)
		</p>
	</div>
<?php endif; ?>
					
		<script>
	<?php for($i=1;$i<$count;$i++){?>
	$("#update<?php echo $i;?>").click(function(){
		var stuid = $("#stdid<?php echo $i;?>").val();
		var tutionfee = $("#tutionfee<?php echo $i;?>").val();
		var computer_fee = $("#computer_fee<?php echo $i;?>").val();
		var transport_fee = $("#tranport_fee<?php echo $i;?>").val();
		var other_fee = $("#other_fee<?php echo $i;?>").val();
			$.post("<?php echo site_url("index.php/feeControllers/updateFeeS") ?>",{stuid : stuid,tutionfee : tutionfee,computer_fee : computer_fee,transport_fee : transport_fee,other_fee : other_fee}, function(data){
				$("#update<?php echo $i;?>").html(data);
			});
		
	});
	
		<?php }?>
	TableExport.init();
</script>		
			