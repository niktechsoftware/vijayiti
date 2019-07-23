<!-- start: PAGE CONTENT -->
						<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<div class="alert alert-info">
											<center><h3 class="media-heading"><b>Important Instructions about Adding Subjects To A Trade !</b></h3></center>
                    						<p class="media-timestamp">Welcome to Add Subject area where we can attach subjects belonging to a class. Please ensure that we have created Stream, class, and Section. After that we can able to take admission in any class.
                    						 to add subject choose class name, stream name and section name respectively from the drop down button and press Submit.</p>
                    						<p class="media-timestamp">
                    							Update your subjects in the boxes given in the chart and press save subjects button bellow the chart.
                    						</p>
										</div>
										<div class="row">
											<div class="col-sm-4">

                          <div class="panel">
                            <div class="panel-heading btn-dark-green">
                              <h3 class="panel-title">Trade</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="streamListshow" class="form-control">
                                  <option value="">Select Trade Name</option>
                                  <?php
                                          $this->load->model("configurefeemodel");
                                        $result = $this->configurefeemodel->getStreamList();
                                        $streamList = $result->result();
                                        if(isset($streamList)):?>
                                  <?php foreach ($streamList as $row):?>
                                  <?php //$this->db->where("school_code",$this->session->userdata("school_code"));
                                                                    $this->db->where('id',$row->streem);
                                                          $row1=$this->db->get('stream');
                                                          if($row1->num_rows()>0){
                                                              $row2 =$row1->row();
                                                                    ?>

                                  <option value="<?php echo $row2->id;?>">
                                    <?php echo $row2->stream;?></option>
                                  <?php } endforeach; endif;?>
                                </select>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="col-sm-4">
                          <div class="panel">
                            <div class="panel-heading btn-dark-red">
                              <h3 class="panel-title">Unit</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="sectionshow" class="form-control">

                                </select>
                              </div>
                            </div>
                          </div>
                        </div>

                         <div class="col-sm-4">
                          <div class="panel">
                            <div class="panel-heading btn-dark-purple">
                              <h3 class="panel-title">Shift</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                                <select id="classshow" class="form-control">


                                </select>
                              </div>

                            </div>
                          </div>
                        </div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
		<div class="row" id="subjectBox">
		</div>
						
					
						<!-- end: PAGE CONTENT-->