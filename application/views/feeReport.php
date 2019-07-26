<div class="row">
	<div class="col-md-12">
		<!-- start: RESPONSIVE TABLE PANEL -->
		<div class="panel panel-white">
			<div class="panel-heading">
				<h4 class="panel-title">Student <span class="text-bold">Fee Report</span></h4>
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
				
				


				 <div class="col-sm-3">
				 	<?php 
						$detail = $this->db->query("SELECT * FROM fsd Order BY id");
						
						if(($detail->num_rows() > 0)){
							
					?>

                          <div class="panel">
                            <div class="panel-heading btn-dark-blue">
                              <h3 class="panel-title">Finance Start Date</h3>
                            </div>
                            <div class="panel-body">
                              <div class="form-group">
                               <select class="form-control" id="fsd" name = "fsd">
							<option value="">-select FSD-</option>
		                      			<?php 
		                      			
		                      			if(($detail->num_rows() > 0)){
		                      			foreach($detail->result() as $row):?>
		                      				
		                      			<option value="<?php echo $row->id;?>">
		                      			<?php echo date("d-M-y", strtotime($row->finance_start_date));?>
		                      		</option>
		                      		<?php endforeach;
		                      				
		                      			}
		                      			?>
						</select>
                              </div>
                            </div>
                          </div>

                        </div><?php } ?>

				 <div class="col-sm-3">

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

                         <div class="col-sm-3">
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

                         <div class="col-sm-3">
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
				<div class="col-sm-12">				
					<div class="table-responsive" id="rahul"></div><!-- end: table-responsive -->
				</div>
			</div><!-- end: panel Body -->
		</div><!-- end: panel panel-white -->
		
	</div><!-- end: MAIN PANEL COL-SM-12 -->
</div><!-- end: PAGE ROW-->
					