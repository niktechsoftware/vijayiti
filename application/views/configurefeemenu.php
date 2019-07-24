<!-- start: PAGE CONTENT -->
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.1.1.min.js"></script>
<div class="row">
  <div class="col-sm-12">
    <!-- start: INLINE TABS PANEL -->
    <div class="panel panel-white">
    
      <div class="panel-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="tabbable">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active">
                  <a href="#myTab_example1" data-toggle="tab">
                    <i class="green fa fa-home"></i> Define Date Of Deposit Fee
                  </a>
                </li>
                <li>
                  <a href="#myTab_example2" data-toggle="tab">
                    <i class="green fa fa-home"></i> Fee Head & Amount Configure
                  </a>
                </li>
               
              </ul>
              <div class="tab-content">
                 <div class="tab-pane fade in active" id="myTab_example1">
                    
                                      <div class="panel panel-white ">
               
                    <div class="panel-body">
                    
                  <div class="alert btn-azure">
                    <button data-dismiss="alert" class="close">×</button>
                    <h3 class="media-heading text-center">Welcome to Fee Configuration Area.</h3>
                    </center>
                    This is very important area to define date for deposit month fee.You Can change
                    Date in any time.
                    Note:-Define deposite Date for every Month .One row or Month will
                        save at a Time on click <strong>SAVE </strong> Button.
                      

                  </div>
                  <div class="panel-body">

                   <?php  //$this->db->where('school_code',$this->session->userdata('school_code'));

                                                $row= $this->db->get('late_fees');
                                                if($row->num_rows()>0)
                                                {
                                                $row =$row->row();
                                                $mgap=$row->apply_method;
                                                $fee=$row->late_fee;
                                        ?>
                                        <div class="row">
                                           <div class="col-sm-4"><b>Apply Method &nbsp;</b>
                                           <input type="text" id="applymethod" readonly value="<?php echo $mgap;?>">
                                          </div>
                                         <!--  <div class="col-sm-4"><b>Late Fee Amount &nbsp;</b>
                                           <input type="text" id="feecharge" name="feecharge" value="<?php echo $fee;?>" readonly />
                                          </div> -->
                                          <!--   <div class="col-sm-4">
                                              <button type="reset" id="reset" onClick="Refresh()" value="reset" style="color:white;background-color:blue; height:30px;">Reset</button> 
                                              Reset Your Fee apply Method
                                            </div> -->
                                                </div>
                                        <div id="demo"></div>
                                         <script>
                                        function Refresh() {
                                            window.parent.location = window.parent.location.href;
                                        }
                                       </script>
                                        
                    <table class="table table-bordered table-hover" id="subhead">
                      <thead>
                        <tr style="background-color: #337ab7; color:white;">
                          <th width="15%">Sno</th>
                          <th width="15%">Month</th>
                          <th width="20%">Deposit Date</th>
                          <!--   <th width="20%">Late Fee</th>  -->
                          <th width="20%">Status</th>
                        </tr>
                      </thead>
                      <tbody>


                        <?php 



$fsdval=$this->session->userdata('fsd');

$this->db->where('id',$fsdval);
$fsd_id=$this->db->get('fsd')->row();
$startdate=$fsd_id->finance_start_date;
$enddate=$fsd_id->finance_end_date;
 $tdate=(int)(date('m', strtotime($startdate)));

 $edate=(int)(date('m', strtotime($enddate)));

 


                        $ft=$tdate;  $loop  = 12/$mgap ; 
                        for($j = 1 ; $j<= $loop; $j++)
                          {

                              ?>
                        <form action="<?php echo base_url();?>index.php/configureFeeController/update_fee_deposit"
                          method="post" role="form" class="form-horizontal" id="form">
                          <tr>

                            <td><?php echo $j;?></td>
                            <?php
                                if($ft>12){
                                 $ft=$ft-12;}
                                 $month_name = date("F",mktime(0,0,0,$ft,1,date("Y")));
                                  $result =  $this->configurefeemodel->check_fee_deposit($ft);

                                 if($result->num_rows()>0){
                                 $fd = $result->row();  ?>

                            <td>
                              <?php  $month_name1 = date("F",mktime(0,0,0,$fd->month_number,1,date("Y")));

                                    echo $month_name1; ?>
                              <input type="hidden" name="month_number" value="<?php echo $fd->month_number;?>">
                            </td>
                            <td> <input type="date" name="dddate" style="font-size: 10pt; height: 34px;"
                                class="form-control" value="<?php echo date('Y-m-d',strtotime($fd->deposite_date))?>" />
                            </td>
                            <!-- <td><input type="text" class="form-control" name="latefee" id="latefee" value = "<?php //echo $fd->late_fee;?>"></td>-->
                            <td><button type="submit" class="btn btn-primary"> Save
                              </button></td>
                            <?php  }else{
                                 ?>
                            <td><?php  echo $month_name ?>

                              <input type="hidden" name="month_number" value="<?php echo $ft;?>"></td>
                            <td> <input type="date" name="dddate" style="font-size: 10pt; height: 34px;"
                                class="form-control" /> </td>
                            <!-- <td><input type="text" class="form-control" name="latefee" id="latefee"></td> -->
                            <td><button type="submit" class="btn btn-primary"> Save
                              </button></td>
                            <?php
              }   $ft = $mgap+$ft;

                                ?>

                          </tr>
                        </form>
                        <?php }?>

                      </tbody>
                    </table>
                    <?php }else{?>
                                
                    <h2>Fee Collect Apply Method</h2>
                    <form action="<?php echo base_url() ?>configureFeeController/apply_method"
                          method="post">
                    <div class="row">
                    <div class="col-md-3">
                      <h4 style="color:red;"><b>
                          Choose Method:</b></h4>
                    </div>
                    <div class="col-md-4">
                      <select class="form-control" name="head" required>
                        <option value="">--select--</option>
                        <option value="1" id="1">Monthly</option>
                        <option value="2" id="2">Two Month</option>
                        <option value="3" id="3">Three month</option>
                        <option value="4" id="4">Four Month</option>
                        <option value="6" id="5">Half Yearly</option>
                        <option value="12" id="6">Yearly</option>
                      </select>
                    </div> <div class="col-sm-4">
                      <input type="submit" class="form-control btn-primary" id="submit" name="submit" value="Submit"/>
                    </div>
                    </div>    
                  <!--   <div class="row"> -->
                   <!--  <div class="col-md-4">
                      <h4 style="color:red;"><b>
                      Late Fee Charge Type:</b></h4>
                    </div> -->
                   <!--  <div class="col-md-4">
                      <select class="form-control" name="latefee" required>
                        <option value="">--select--</option>
                        <option value="1">Monthly Charge</option>
                        <option value="2">Day Wise Charge</option>
                        <option value="0">None</option>
                      </select>
                    </div>
                    -->
                   <!--  </div> -->
                   <!--  <div class="row"> -->
                   <!--  <div class="col-md-4">
                      <h4 style="color:red;"><b>
                      Late Fee Amount:</b></h4>
                    </div> -->
                    <!-- <div class="col-sm-4">
                      <input type="text" class="form-control" id="lateamt" name="lateamt" placeholder="Enter Amount" required/>
                    </div> -->
                   
                   <!--  </div> -->
                    </form>
                    <?php }?>
                  </div>
                </div>
                </div>
                </div>
              
                <div class="tab-pane fade" id="myTab_example2">

                	<div class="row">
							<div class="col-sm-12">
								<!-- start: INLINE TABS PANEL -->
								<div class="panel panel-white">
									<div class="panel-body">
										<div class="alert alert-info">
											<center><h3 class="media-heading"><b>Important Instructions about Adding Subjects To A Trade !</b></h3></center>
                    						<p class="media-timestamp">Welcome to Add Subject area where we can attach subjects belonging to a class. Please ensure that we have created Trade, Unit, and Shift. After that we can able to take admission in any class.
                    						 to add subject choose Trade name, Unit name and Shift name respectively from the drop down button and press Submit.</p>
                    						<p class="media-timestamp">
                    							Update your subjects in the boxes given in the chart and press save subjects button bellow the chart.
                    						</p>
										</div>
										<!-- <div class="row">
											<div class="col-sm-4">
												<div class="panel-heading panel-red border-light">
													<h4 class="panel-title">Shift</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="clname" class="form-control">
															<option value="">Select Timing</option>
															
															<?php if(isset($classList)):?>
															<?php foreach ($classList as $row):?>
															<option value="<?php echo $row->class_name;?>"><?php echo $row->class_name;?></option>
															<?php endforeach; endif;?>
														</select>
													</div>
													<div class="text-red text-small">Please select a class, section and stream will automatically come select and add subject.</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-green border-light">
													<h4 class="panel-title">Trade</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="streamList" class="form-control">
															
														</select>
													</div>
												</div>
											</div>
											<div class="col-sm-4">
												<div class="panel-heading panel-blue border-light">
													<h4 class="panel-title">Unit</h4>
												</div>
												<div class="panel-body">
													<div class="form-group">
														<select id="section" class="form-control">
														</select>
													</div>
												</div>
											</div>
										</div> -->

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
						
					

                  </div>
               
                

                        </div>
                      </div>

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
  </div>
  <!-- end: PAGE CONTENT