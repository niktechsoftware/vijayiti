<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<div class="panel panel-white">
									<div class="panel-heading">
										<h4 class="panel-title">Enter <span class="text-bold"> Marks Detail</span></h4>
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
										<?php    	$v = $this->session->userdata('username'); 	
										$diExam = $this->db->query("SELECT DISTINCT exam_name FROM exam_info WHERE stu_id ='$v'")->result();
										 foreach($diExam as $dExam):?>
								          <div class="alert alert-block alert-success fade in"> <h4 class="alert-heading"><i class="fa fa-check"></i> <?php echo $dExam->exam_name." Exam"; ?> </h4> </div>
								             <?php    $var1 = $dExam->exam_name;
								                $dum=$this->db->query("SELECT * FROM exam_info WHERE stu_id ='$v' and exam_name='$var1' ")->result();
										?>
											  <table class="table table-hover" id="sample-table-1">
									                <thead>
									                  <tr>
									                    <th>#</th>
									                    <th>Subject</th>
									                    <th class="center">Attendance</th>
									                    <th class="center">M.M.</th>
									                    <th class="center">Marks Obtained</th>
									                  </tr>
									                </thead>
									                <tbody>
									               
									             <?php    $i = 1;?>
									                <?php foreach($dum as $dum1){?>
									                  <tr>
									                    <td><?php echo $i; ?>
									                    <td><?php echo $dum1->subject;?></td>
									                    <td class="center"> 
									  					<?php echo $dum1->Attendance; ?>
									                      </td>
									                    <td class="center"><?php echo $dum1->marks; ?></td>                  
									                    <td class="center"><?php echo $dum1->out_of; ?></td>
									                   </tr> 
									                  <?php $i++; }    
									                  ?>         
									                </tbody>
									              </table>
									              <br>
									              <br><br><br><?php  endforeach;    ?>
										</div>	
									</div>
								</div>
							</div>
						</div>