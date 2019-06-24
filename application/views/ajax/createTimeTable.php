<?php $w=0; if($var1->num_rows()>0){
			?>	
			<form action ="<?php echo base_url();?>index.php/periodTimeControllers/periodsheduleinsert" method="post">
			<div class="row">
        		<div class="col-md-12 ">
					<div class="panel panel-white">
            			<div class="panel-heading">
	            			<i class="fa fa-external-link-square"></i>
								Time Scheduling :
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
							<h4 class="panel-title">
							<?php 
							if(strlen($monday)>0){
							
								$checkTB = $this->periodModel->checkvalue($monday);
									if($checkTB->num_rows()>0){
										echo "Scheduling for Monday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Monday";
										?><br><?php 
									}else 
										echo $monday;
									
								}
								if(strlen($tuesday)>0){
									
									$checkTB = $this->periodModel->checkvalue($tuesday);
									if($checkTB->num_rows()>0){
										
										echo "Scheduling for Tuesday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Tuesday";
										?><br><?php 
									}else 
										echo $tuesday;
								}
								if(strlen($wednesday)>0){
									
									$checkTB = $this->periodModel->checkvalue($wednesday);
									if($checkTB->num_rows()>0){
										echo "Scheduling for Wednesday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Wednessday";
										?><br><?php 
									}else 
										echo $wednesday;
								}
								if(strlen($thursday)>0){
									
									$checkTB = $this->periodModel->checkvalue($thursday);
									if($checkTB->num_rows()>0){
										echo "Scheduling for Thursday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Thursday";
										?><br><?php 
									}
									else 
										echo $thursday;
								}
								if(strlen($friday)>0){
									
									$checkTB = $this->periodModel->checkvalue($friday);
									if($checkTB->num_rows()>0){
										echo "Scheduling for Friday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Friday";
										?><br><?php 
									}else 
										echo $friday;
								}
								if(strlen($saturday)>0){
									
									$checkTB = $this->periodModel->checkvalue($saturday);
										if($checkTB->num_rows()>0){
											echo "Scheduling for Saturday Is Already Done fill all boxes given below if you want to change current Timle Table or UnCheck Saturday";
										?><br><?php 
										}else 
											echo $saturday;
								}
								?>
							<input type="hidden" name="days" value="<?php 
							if(strlen($monday)>0){
								echo $monday;}
								if(strlen($tuesday)>0){
									echo $tuesday.",";}
								if(strlen($wednesday)>0){
									echo $wednesday.",";}
								if(strlen($thursday)>0){
									echo $thursday.",";}
								if(strlen($friday)>0){
									echo $friday.",";}
								if(strlen($saturday)>0){
									echo $saturday.",";}
											 ?>"/>
						</h4>
						</div>
						<div class="panel-body" id ="createBody">
							<div class="row">
								<div class="col-sm-12">
									<!-- start: INLINE TABS PANEL -->
									<div class="panel panel-white">
										<table class="table table-hover" width ="100%">
			 								<tr>
			 									<td class ="center">
													PERIODS
												</td>
												<?php $lunch = 1; $c=1; foreach ($var1->result() as $pk){ ?>
												<td class ="center">
													<input type="hidden" name="from<?php echo $c?>" value="<?php echo $pk->from."-".$pk->to?>" />
													
													<?php
														if($lunch != $pk->lunch){
															echo $pk->period;
													?>
														<input type="hidden" name="period<?php echo $c?>" value="<?php echo $pk->period?>" />
													<?php 
													}
													else{ 
														echo "Lunch";?>
														<input type="hidden" name="period<?php echo $c?>" value="Lunch" />
														<?php }
												?></td>
												<?php $lunch++;$c++; } ?> 
											</tr> 
											<tr>
												<td class= "center">TIME SLOTS</td>
												<?php foreach ($var1->result() as $pk): ?>
												<td class = "center" ><?php echo $pk->from;?> - <?php echo $pk->to; ?></td>
												<?php endforeach; ?>
											</tr>
				  							<?php 
				  							$tbr=1;
				  							foreach($className->result() as $row){
				 							 ?>
				  							<tr>
				  								<td class= "center">
				  									<?php echo $row->class_name;?>-<?php echo $row->section;
				  										$data =array(
				  											"className"=>$row->class_name,
				  											"section"=>$row->section
				  										);
				  									?>
				  									<input type="hidden" name="class1<?php echo $tbr?>" value="<?php echo $row->class_name.",".$row->section;?>" />
				  									<?php
				  										$subject = $this->periodModel->getSubjectName($data);
				  									?>
				  								</td>
				  									<?php for($tbc = 1; $tbc <= $countPeriod; $tbc++){
				  												if($tbc != $dog->lunch){ 
				  									?>				
				  								<td>
				  									<select class="form-control" id="teacher<?php echo $tbr.$tbc;?>" name="teacher<?php echo $tbr.$tbc;?>" >
														<option value="N/A">-Select Teacher-</option>
														<?php foreach($teacher->result() as $tea):?>	
														<option value="<?php echo $tea->first_name.' '.$tea->mid_name ?>">
															<?php echo $tea->first_name.' '.$tea->mid_name ?>
														</option>
														<?php endforeach; ?>
													</select>
													<select class="form-control" id="subject<?php echo $tbr.$tbc;?>" name="subject<?php echo $tbr.$tbc;?>" >
														<option value="N/A">-Select Subject-</option>
														<?php foreach($subject->result() as $row):?>	
														<option value="<?php echo $row->subject?>">
															<?php echo $row->subject?>
														</option>
														<?php endforeach;?>
													</select>
									 			</td>
									 			<?php			} // End if condition of Lunch
										
				  												else{ ?> 
				  								<td class = "center"> <?php echo "Lunch";?></td>
				  								<?php
																} // End Else
				  									} // End For each
												?> 
											</tr>
												<?php  $tbr++;}?>
								<?php }
								 ?>
					</table>
					<input type="hidden" name="tbr" value="<?php echo $tbr;?>"/>
					<input type="hidden" name="tbc" value="<?php echo $tbc;?>"/>
				</div> 
				<div class="form-group center">
	       			<input class="submit btn btn-blue" type="submit" value="Save &amp; Print Slip" />
	        	</div>
       	   </div>
      	  </div>
     	  </div>
  		 </div>
	</div></div>
	</form>
	<script>
	<?php 
	for($i = 1; $i<=$tbr; $i++){
		for($j = 1; $j <= $tbc; $j++){
			?>
			$('select#teacher<?php echo $i. $j; ?>').change(
				function(){
					var val1 = $('#teacher<?php echo $i.$j; ?>').val()
			<?php
				for($k = 1; $k<=$tbr; $k++){				
					if($k != $i){
						?>
						var val<?php echo $k+1; ?> = $('#teacher<?php echo $k. $j; ?>').val()
						if(val1 == val<?php echo $k+1; ?>){
							alert("This teacher can't attend 2 class at same time.");
							document.getElementById('teacher<?php echo $i.$j; ?>').value = "";
						}
						<?php
					}
				}
		?>
				});
		<?php
		}
	} ?>
	</script>
	